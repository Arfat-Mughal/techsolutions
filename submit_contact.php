<?php
session_start();
require_once 'config.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Check CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
    exit;
}

// Rate limiting
if (RATE_LIMIT_ENABLED && !check_rate_limit()) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Too many requests. Please try again later.']);
    exit;
}

// Honeypot check
if (!empty($_POST['website'])) {
    // This is likely a bot - silently fail
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Thank you for your message!']);
    exit;
}

// Validate and sanitize input
$errors = [];
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');
$preferred_language = trim($_POST['preferred_language'] ?? 'en');
$consent = isset($_POST['consent']) && $_POST['consent'] === 'on';

// Validate required fields
if (empty($name)) {
    $errors['name'] = 'Name is required';
}

if (empty($email)) {
    $errors['email'] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
}

if (empty($subject)) {
    $errors['subject'] = 'Subject is required';
}

if (empty($message)) {
    $errors['message'] = 'Message is required';
} elseif (strlen($message) > 1000) {
    $errors['message'] = 'Message must be less than 1000 characters';
}

if (!$consent) {
    $errors['consent'] = 'You must consent to our privacy policy';
}

// If there are errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Sanitize data for storage
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
$preferred_language = htmlspecialchars($preferred_language, ENT_QUOTES, 'UTF-8');
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Save to database if configured
$db_saved = false;
$pdo = get_db_connection();
if ($pdo) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO contact_submissions 
            (name, email, phone, subject, message, preferred_language, ip_address, user_agent) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $db_saved = $stmt->execute([$name, $email, $phone, $subject, $message, $preferred_language, $ip_address, $user_agent]);
    } catch (PDOException $e) {
        error_log("Database save failed: " . $e->getMessage());
    }
}

// Save to CSV (always attempt to save)
$csv_saved = save_to_csv($name, $email, $phone, $subject, $message, $preferred_language, $ip_address, $user_agent);

// Email sending disabled
$email_sent = false;

// Return success response
http_response_code(200);
echo json_encode([
    'success' => true, 
    'message' => 'Thank you for your message! We will get back to you soon.',
    'saved_to_db' => $db_saved,
    'saved_to_csv' => $csv_saved,
    'email_sent' => $email_sent
]);
exit;

/**
 * Check rate limit based on IP address
 */
function check_rate_limit() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $file_path = __DIR__ . '/storage/rate_limit_' . md5($ip) . '.txt';
    
    $current_time = time();
    $window_start = $current_time - RATE_LIMIT_TIME_WINDOW;
    
    // Read existing requests
    $requests = [];
    if (file_exists($file_path)) {
        $data = file_get_contents($file_path);
        $requests = array_filter(explode(',', $data), function($time) use ($window_start) {
            return $time > $window_start;
        });
    }
    
    // Check if limit exceeded
    if (count($requests) >= RATE_LIMIT_MAX_REQUESTS) {
        return false;
    }
    
    // Add current request
    $requests[] = $current_time;
    file_put_contents($file_path, implode(',', $requests));
    
    return true;
}

/**
 * Save submission to CSV file
 */
function save_to_csv($name, $email, $phone, $subject, $message, $preferred_language, $ip_address, $user_agent) {
    $file_path = __DIR__ . '/storage/contacts.csv';
    $data = [
        date('Y-m-d H:i:s'),
        $name,
        $email,
        $phone,
        $subject,
        $message,
        $preferred_language,
        $ip_address,
        $user_agent
    ];
    
    // Add headers if file doesn't exist
    $write_headers = !file_exists($file_path);
    
    if (($handle = fopen($file_path, 'a')) !== false) {
        if ($write_headers) {
            fputcsv($handle, [
                'Timestamp', 'Name', 'Email', 'Phone', 'Subject', 
                'Message', 'Preferred Language', 'IP Address', 'User Agent'
            ]);
        }
        fputcsv($handle, $data);
        fclose($handle);
        return true;
    }
    
    return false;
}

/**
 * Send email notification
 */
function send_email($name, $email, $phone, $subject, $message, $preferred_language) {
    $to = EMAIL_TO;
    $email_subject = EMAIL_SUBJECT_PREFIX . $subject . ' - From: ' . $name;
    
    $email_body = "
        New contact form submission:\n\n
        Name: $name\n
        Email: $email\n
        Phone: " . ($phone ?: 'Not provided') . "\n
        Subject: $subject\n
        Preferred Language: $preferred_language\n\n
        Message:\n$message\n\n
        IP Address: {$_SERVER['REMOTE_ADDR']}\n
        User Agent: {$_SERVER['HTTP_USER_AGENT']}\n
        Time: " . date('Y-m-d H:i:s') . "
    ";
    
    $headers = "From: " . EMAIL_FROM . "\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    // Try to send using mail() function
    if (mail($to, $email_subject, $email_body, $headers)) {
        return true;
    }
    
    // Alternative: Use PHPMailer with SMTP (commented out - uncomment and configure for your cPanel)
    /*
    try {
        require_once 'PHPMailer/PHPMailerAutoload.php';
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'your_smtp_host'; // e.g., mail.yourdomain.com
        $mail->SMTPAuth = true;
        $mail->Username = 'your_smtp_username';
        $mail->Password = 'your_smtp_password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        
        $mail->setFrom(EMAIL_FROM, 'Website Contact Form');
        $mail->addAddress(EMAIL_TO);
        $mail->addReplyTo($email, $name);
        
        $mail->isHTML(false);
        $mail->Subject = $email_subject;
        $mail->Body = $email_body;
        
        return $mail->send();
    } catch (Exception $e) {
        error_log("PHPMailer Error: " . $e->getMessage());
        return false;
    }
    */
    
    return false;
}
?>
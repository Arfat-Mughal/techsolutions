<?php
// Site configuration
define('SITE_URL', 'http://localhost/techsolutions'); // Change to your actual domain

// Database configuration (update these values for your environment)
define('DB_HOST', 'localhost');
define('DB_NAME', 'irfanqut_techsolutions_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Email configuration
define('EMAIL_TO', 'arfat.bjs@gmail.com');
define('EMAIL_FROM', 'noreply@yourdomain.com');
define('EMAIL_SUBJECT_PREFIX', 'Contact Form: ');

// Rate limiting configuration
define('RATE_LIMIT_ENABLED', true);
define('RATE_LIMIT_MAX_REQUESTS', 5); // Max submissions per hour
define('RATE_LIMIT_TIME_WINDOW', 3600); // Time window in seconds (1 hour)

// Security settings
define('CSRF_TOKEN_EXPIRY', 3600); // CSRF token expiry in seconds

// Check if database credentials are set and valid
function is_db_configured() {
    return !empty(DB_HOST) && !empty(DB_NAME) && !empty(DB_USER);
}

// Create database connection if configured
function get_db_connection() {
    if (!is_db_configured()) {
        return null;
    }

    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        return null;
    }
}

// Get company configuration values
function get_company_config($key) {
    // Load translations if not already loaded
    global $translations;

    if (!isset($translations)) {
        // Fallback to English if translations not loaded
        $translations = require_once 'lang/en.php';
    }

    // Map configuration keys to translation keys
    $key_mapping = [
        'company.name' => $translations['company_info']['name'] ?? 'TechSolutions',
        'seo.og_image' => $translations['company_info']['seo']['og_image'] ?? '/assets/images/og-image.jpg',
        'seo.twitter_image' => $translations['company_info']['seo']['twitter_image'] ?? '/assets/images/twitter-image.jpg',
        'address.street' => $translations['company_info']['address']['street'] ?? 'Flat 14E, 4 Mann Island',
        'address.city' => $translations['company_info']['address']['city'] ?? 'Liverpool',
        'address.region' => $translations['company_info']['address']['region'] ?? 'Merseyside',
        'contact.email' => $translations['company_info']['email'] ?? 'info@techsolutions.co.uk',
        'social.facebook' => $translations['company_info']['social']['facebook'] ?? '#',
        'social.twitter' => $translations['company_info']['social']['twitter'] ?? '#',
        'social.instagram' => $translations['company_info']['social']['instagram'] ?? '#',
        'social.linkedin' => $translations['company_info']['social']['linkedin'] ?? '#',
        'whatsapp.button_text' => $translations['company_info']['whatsapp']['button_text'] ?? 'Chat with us on WhatsApp'
    ];

    return $key_mapping[$key] ?? 'TechSolutions';
}
?>
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
?>
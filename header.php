<?php
// Include company configuration
require_once 'company_config.php';

// Start session for CSRF token and language
session_start();

// Language handling
$supported_languages = ['en', 'ur', 'ar', 'es', 'fr'];
$default_language = 'en';

// Get language from query parameter or browser preference
if (isset($_GET['lang']) && in_array($_GET['lang'], $supported_languages)) {
    $language = $_GET['lang'];
    $_SESSION['lang'] = $language;
} elseif (isset($_SESSION['lang'])) {
    $language = $_SESSION['lang'];
} else {
    // Detect browser language
    $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $language = in_array($browser_lang, $supported_languages) ? $browser_lang : $default_language;
    $_SESSION['lang'] = $language;
}

// Load translations
$translations = require_once "lang/{$language}.php";

// Set page metadata
$page_title = htmlspecialchars($translations['meta']['title']);
$page_description = htmlspecialchars($translations['meta']['description']);
$page_keywords = htmlspecialchars($translations['meta']['keywords']);

// Generate CSRF token if not exists
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo SITE_URL; ?>">

    <!-- hreflang tags for multilingual support -->
    <link rel="alternate" hreflang="en" href="<?php echo SITE_URL; ?>?lang=en">
    <link rel="alternate" hreflang="ur" href="<?php echo SITE_URL; ?>?lang=ur">
    <link rel="alternate" hreflang="ar" href="<?php echo SITE_URL; ?>?lang=ar">
    <link rel="alternate" hreflang="es" href="<?php echo SITE_URL; ?>?lang=es">
    <link rel="alternate" hreflang="fr" href="<?php echo SITE_URL; ?>?lang=fr">
    <link rel="alternate" hreflang="x-default" href="<?php echo SITE_URL; ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="<?php echo $page_title; ?>">
    <meta property="og:description" content="<?php echo $page_description; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?><?php echo get_company_config('seo.og_image'); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
    <meta property="twitter:title" content="<?php echo $page_title; ?>">
    <meta property="twitter:description" content="<?php echo $page_description; ?>">
    <meta property="twitter:image" content="<?php echo SITE_URL; ?><?php echo get_company_config('seo.twitter_image'); ?>">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "<?php echo htmlspecialchars($translations['company']['name']); ?>",
      "url": "<?php echo SITE_URL; ?>",
      "logo": "<?php echo SITE_URL; ?>/assets/images/logo.png",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "<?php echo get_formatted_phone(); ?>",
        "contactType": "customer service"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo get_company_config('address.street'); ?>",
        "addressLocality": "<?php echo get_company_config('address.city'); ?>",
        "addressRegion": "<?php echo get_company_config('address.region'); ?>",
        "addressCountry": "GB"
      }
    }
    </script>

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'fade-in-up': 'fadeInUp 0.8s ease-out',
                        'fade-in-left': 'fadeInLeft 0.8s ease-out',
                        'fade-in-right': 'fadeInRight 0.8s ease-out',
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 4s infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        fadeInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        fadeInRight: {
                            '0%': { opacity: '0', transform: 'translateX(30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-gray-900 bg-white scroll-smooth">

    <!-- Language Switcher -->
    <div class="bg-gray-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end py-2">
                <div class="flex items-center space-x-4">
                    <span class="text-xs text-gray-600"><?php echo $translations['language']['change']; ?>:</span>
                    <div class="flex space-x-2">
                        <a href="?lang=en" class="text-xs font-medium <?php echo $language === 'en' ? 'text-primary-600 font-bold' : 'text-gray-500 hover:text-primary-600'; ?> transition-colors">EN</a>
                        <a href="?lang=ur" class="text-xs <?php echo $language === 'ur' ? 'text-primary-600 font-bold' : 'text-gray-500 hover:text-primary-600'; ?> transition-colors">UR</a>
                        <a href="?lang=ar" class="text-xs <?php echo $language === 'ar' ? 'text-primary-600 font-bold' : 'text-gray-500 hover:text-primary-600'; ?> transition-colors">AR</a>
                        <a href="?lang=es" class="text-xs <?php echo $language === 'es' ? 'text-primary-600 font-bold' : 'text-gray-500 hover:text-primary-600'; ?> transition-colors">ES</a>
                        <a href="?lang=fr" class="text-xs <?php echo $language === 'fr' ? 'text-primary-600 font-bold' : 'text-gray-500 hover:text-primary-600'; ?> transition-colors">FR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="glass-effect fixed w-full top-0 z-50 border-b border-gray-100/20" style="top: 32px;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center animate-fade-in-left">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold gradient-text">TechSolutions</h1>
                </div>

                <div class="hidden lg:flex items-center space-x-8 animate-fade-in">
                    <a href="#home" class="text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['home']; ?></a>
                    <a href="#services" class="text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['services']; ?></a>
                    <a href="#portfolio" class="text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['portfolio']; ?></a>
                    <a href="#testimonials" class="text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['testimonials']; ?></a>
                    <a href="#pricing" class="text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['pricing']; ?></a>
                    <a href="#contact" class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition-all hover-scale font-medium"><?php echo $translations['navigation']['contact']; ?></a>
                </div>

                <button class="lg:hidden text-gray-700 hover:text-primary-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
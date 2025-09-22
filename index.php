<?php
// Start session and set default language
session_start();

// Load configuration
require_once 'config.php';

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

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Set page metadata
$page_title = htmlspecialchars($translations['meta']['title']);
$page_description = htmlspecialchars($translations['meta']['description']);
$page_keywords = htmlspecialchars($translations['meta']['keywords']);
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
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
    <meta property="twitter:title" content="<?php echo $page_title; ?>">
    <meta property="twitter:description" content="<?php echo $page_description; ?>">
    <meta property="twitter:image" content="<?php echo SITE_URL; ?>/assets/images/twitter-image.jpg">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
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
        "telephone": "+92-300-1234567",
        "contactType": "customer service"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "123 Main Boulevard",
        "addressLocality": "Lahore",
        "addressRegion": "Punjab",
        "postalCode": "54000",
        "addressCountry": "PK"
      }
    }
    </script>
</head>
<body class="font-sans antialiased text-gray-800 bg-white">
    <!-- Language Switcher -->
    <div class="bg-gray-100 py-2 px-4 flex justify-end">
        <div class="flex space-x-2">
            <span class="text-sm"><?php echo $translations['language']['change']; ?>:</span>
            <a href="?lang=en" class="text-sm hover:text-blue-600 <?php echo $language === 'en' ? 'font-bold text-blue-600' : 'text-gray-600'; ?>">EN</a>
            <a href="?lang=ur" class="text-sm hover:text-blue-600 <?php echo $language === 'ur' ? 'font-bold text-blue-600' : 'text-gray-600'; ?>">UR</a>
            <a href="?lang=ar" class="text-sm hover:text-blue-600 <?php echo $language === 'ar' ? 'font-bold text-blue-600' : 'text-gray-600'; ?>">AR</a>
            <a href="?lang=es" class="text-sm hover:text-blue-600 <?php echo $language === 'es' ? 'font-bold text-blue-600' : 'text-gray-600'; ?>">ES</a>
            <a href="?lang=fr" class="text-sm hover:text-blue-600 <?php echo $language === 'fr' ? 'font-bold text-blue-600' : 'text-gray-600'; ?>">FR</a>
        </div>
    </div>

    <!-- Header / Navigation -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-blue-600"><?php echo htmlspecialchars($translations['company']['name']); ?></h1>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="#home" class="text-gray-600 hover:text-blue-600 transition"><?php echo $translations['navigation']['home']; ?></a></li>
                    <li><a href="#services" class="text-gray-600 hover:text-blue-600 transition"><?php echo $translations['navigation']['services']; ?></a></li>
                    <li><a href="#portfolio" class="text-gray-600 hover:text-blue-600 transition"><?php echo $translations['navigation']['portfolio']; ?></a></li>
                    <li><a href="#testimonials" class="text-gray-600 hover:text-blue-600 transition"><?php echo $translations['navigation']['testimonials']; ?></a></li>
                    <li><a href="#pricing" class="text-gray-600 hover:text-blue-600 transition"><?php echo $translations['navigation']['pricing']; ?></a></li>
                    <li><a href="#contact" class="text-gray-600 hover:text-blue-600 transition"><?php echo $translations['navigation']['contact']; ?></a></li>
                </ul>
            </nav>
            <button class="md:hidden text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6"><?php echo $translations['hero']['title']; ?></h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto"><?php echo $translations['hero']['description']; ?></p>
            <a href="#contact" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-block"><?php echo $translations['hero']['cta']; ?></a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12"><?php echo $translations['services']['title']; ?></h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Web Development -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2"><?php echo $translations['services']['web_dev']['title']; ?></h3>
                    <p class="text-gray-600"><?php echo $translations['services']['web_dev']['description']; ?></p>
                </div>
                
                <!-- Mobile App Development -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2"><?php echo $translations['services']['mobile_dev']['title']; ?></h3>
                    <p class="text-gray-600"><?php echo $translations['services']['mobile_dev']['description']; ?></p>
                </div>
                
                <!-- SEO -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2"><?php echo $translations['services']['seo']['title']; ?></h3>
                    <p class="text-gray-600"><?php echo $translations['services']['seo']['description']; ?></p>
                </div>
                
                <!-- ASO -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2"><?php echo $translations['services']['aso']['title']; ?></h3>
                    <p class="text-gray-600"><?php echo $translations['services']['aso']['description']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12"><?php echo $translations['portfolio']['title']; ?></h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Portfolio items would go here -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500"><?php echo $translations['portfolio']['project_image']; ?></span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2"><?php echo $translations['portfolio']['project1']['title']; ?></h3>
                        <p class="text-gray-600"><?php echo $translations['portfolio']['project1']['description']; ?></p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500"><?php echo $translations['portfolio']['project_image']; ?></span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2"><?php echo $translations['portfolio']['project2']['title']; ?></h3>
                        <p class="text-gray-600"><?php echo $translations['portfolio']['project2']['description']; ?></p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500"><?php echo $translations['portfolio']['project_image']; ?></span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2"><?php echo $translations['portfolio']['project3']['title']; ?></h3>
                        <p class="text-gray-600"><?php echo $translations['portfolio']['project3']['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12"><?php echo $translations['testimonials']['title']; ?></h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-semibold"><?php echo $translations['testimonials']['testimonial1']['name']; ?></h4>
                            <p class="text-gray-600 text-sm"><?php echo $translations['testimonials']['testimonial1']['position']; ?></p>
                        </div>
                    </div>
                    <p class="text-gray-600">"<?php echo $translations['testimonials']['testimonial1']['content']; ?>"</p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-semibold"><?php echo $translations['testimonials']['testimonial2']['name']; ?></h4>
                            <p class="text-gray-600 text-sm"><?php echo $translations['testimonials']['testimonial2']['position']; ?></p>
                        </div>
                    </div>
                    <p class="text-gray-600">"<?php echo $translations['testimonials']['testimonial2']['content']; ?>"</p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-semibold"><?php echo $translations['testimonials']['testimonial3']['name']; ?></h4>
                            <p class="text-gray-600 text-sm"><?php echo $translations['testimonials']['testimonial3']['position']; ?></p>
                        </div>
                    </div>
                    <p class="text-gray-600">"<?php echo $translations['testimonials']['testimonial3']['content']; ?>"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12"><?php echo $translations['pricing']['title']; ?></h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Basic Plan -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <h3 class="text-2xl font-semibold mb-4"><?php echo $translations['pricing']['basic']['title']; ?></h3>
                    <div class="text-4xl font-bold text-blue-600 mb-6">$<?php echo $translations['pricing']['basic']['price']; ?></div>
                    <ul class="mb-8 space-y-2">
                        <?php foreach ($translations['pricing']['basic']['features'] as $feature): ?>
                        <li class="text-gray-600"><?php echo $feature; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="#contact" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition inline-block w-full"><?php echo $translations['pricing']['cta']; ?></a>
                </div>
                
                <!-- Professional Plan -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center border-2 border-blue-600 relative">
                    <div class="absolute top-0 right-0 bg-blue-600 text-white px-4 py-1 text-sm font-semibold"><?php echo $translations['pricing']['popular']; ?></div>
                    <h3 class="text-2xl font-semibold mb-4"><?php echo $translations['pricing']['professional']['title']; ?></h3>
                    <div class="text-4xl font-bold text-blue-600 mb-6">$<?php echo $translations['pricing']['professional']['price']; ?></div>
                    <ul class="mb-8 space-y-2">
                        <?php foreach ($translations['pricing']['professional']['features'] as $feature): ?>
                        <li class="text-gray-600"><?php echo $feature; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="#contact" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition inline-block w-full"><?php echo $translations['pricing']['cta']; ?></a>
                </div>
                
                <!-- Enterprise Plan -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <h3 class="text-2xl font-semibold mb-4"><?php echo $translations['pricing']['enterprise']['title']; ?></h3>
                    <div class="text-4xl font-bold text-blue-600 mb-6">$<?php echo $translations['pricing']['enterprise']['price']; ?></div>
                    <ul class="mb-8 space-y-2">
                        <?php foreach ($translations['pricing']['enterprise']['features'] as $feature): ?>
                        <li class="text-gray-600"><?php echo $feature; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="#contact" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition inline-block w-full"><?php echo $translations['pricing']['cta']; ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12"><?php echo $translations['contact']['title']; ?></h2>
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-xl font-semibold mb-4"><?php echo $translations['contact']['info_title']; ?></h3>
                    <p class="text-gray-600 mb-6"><?php echo $translations['contact']['info_description']; ?></p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="text-blue-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold"><?php echo $translations['contact']['address_title']; ?></h4>
                                <p class="text-gray-600"><?php echo $translations['company']['address']; ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-blue-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold"><?php echo $translations['contact']['phone_title']; ?></h4>
                                <p class="text-gray-600">+92-300-1234567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-blue-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold"><?php echo $translations['contact']['email_title']; ?></h4>
                                <p class="text-gray-600">info@example.com</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="font-semibold mb-4"><?php echo $translations['contact']['social_title']; ?></h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 hover:text-blue-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-blue-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div>
                    <form id="contactForm" action="submit_contact.php" method="POST" class="space-y-6">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1"><?php echo $translations['contact_form']['name']; ?> *</label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1"><?php echo $translations['contact_form']['email']; ?> *</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1"><?php echo $translations['contact_form']['phone']; ?></label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1"><?php echo $translations['contact_form']['subject']; ?> *</label>
                            <select id="subject" name="subject" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value=""><?php echo $translations['contact_form']['select_option']; ?></option>
                                <option value="web_development"><?php echo $translations['services']['web_dev']['title']; ?></option>
                                <option value="mobile_development"><?php echo $translations['services']['mobile_dev']['title']; ?></option>
                                <option value="seo"><?php echo $translations['services']['seo']['title']; ?></option>
                                <option value="aso"><?php echo $translations['services']['aso']['title']; ?></option>
                                <option value="other"><?php echo $translations['contact_form']['other']; ?></option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1"><?php echo $translations['contact_form']['message']; ?> *</label>
                            <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                        
                        <div>
                            <label for="preferred_language" class="block text-sm font-medium text-gray-700 mb-1"><?php echo $translations['contact_form']['preferred_language']; ?></label>
                            <select id="preferred_language" name="preferred_language" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="en">English</option>
                                <option value="ur">Urdu</option>
                                <option value="ar">Arabic</option>
                                <option value="es">Spanish</option>
                                <option value="fr">French</option>
                            </select>
                        </div>
                        
                        <!-- Honeypot field for spam protection -->
                        <div class="hidden">
                            <label for="website">Website</label>
                            <input type="text" id="website" name="website" tabindex="-1">
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="consent" name="consent" type="checkbox" required class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="consent" class="text-gray-700"><?php echo $translations['contact_form']['consent']; ?></label>
                            </div>
                        </div>
                        
                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <?php echo $translations['contact_form']['submit']; ?>
                            </button>
                        </div>
                        
                        <div id="formMessage" class="hidden py-3 px-4 rounded-md"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4"><?php echo htmlspecialchars($translations['company']['name']); ?></h3>
                    <p class="text-gray-400"><?php echo $translations['footer']['description']; ?></p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4"><?php echo $translations['footer']['quick_links']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition"><?php echo $translations['navigation']['home']; ?></a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition"><?php echo $translations['navigation']['services']; ?></a></li>
                        <li><a href="#portfolio" class="text-gray-400 hover:text-white transition"><?php echo $translations['navigation']['portfolio']; ?></a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white transition"><?php echo $translations['navigation']['testimonials']; ?></a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition"><?php echo $translations['navigation']['contact']; ?></a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4"><?php echo $translations['footer']['services']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-gray-400 hover:text-white transition"><?php echo $translations['services']['web_dev']['title']; ?></a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition"><?php echo $translations['services']['mobile_dev']['title']; ?></a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition"><?php echo $translations['services']['seo']['title']; ?></a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition"><?php echo $translations['services']['aso']['title']; ?></a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4"><?php echo $translations['contact']['address_title']; ?></h4>
                    <address class="text-gray-400 not-italic">
                        <?php echo $translations['company']['address']; ?><br>
                        Lahore, Pakistan<br>
                        <abbr title="Phone">P:</abbr> +92-300-1234567
                    </address>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm"><?php echo $translations['footer']['copyright']; ?></p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
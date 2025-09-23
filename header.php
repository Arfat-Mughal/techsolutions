<?php
// Include company configuration
require_once 'config.php';

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
<html lang="<?php echo $language; ?>" dir="<?php echo ($language === 'ar' || $language === 'ur') ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo $translations['company_info']['website']; ?>">

    <!-- hreflang tags for multilingual support -->
    <link rel="alternate" hreflang="en" href="<?php echo $translations['company_info']['website']; ?>?lang=en">
    <link rel="alternate" hreflang="ur" href="<?php echo $translations['company_info']['website']; ?>?lang=ur">
    <link rel="alternate" hreflang="ar" href="<?php echo $translations['company_info']['website']; ?>?lang=ar">
    <link rel="alternate" hreflang="es" href="<?php echo $translations['company_info']['website']; ?>?lang=es">
    <link rel="alternate" hreflang="fr" href="<?php echo $translations['company_info']['website']; ?>?lang=fr">
    <link rel="alternate" hreflang="x-default" href="<?php echo $translations['company_info']['website']; ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $translations['company_info']['website']; ?>">
    <meta property="og:title" content="<?php echo $page_title; ?>">
    <meta property="og:description" content="<?php echo $page_description; ?>">
    <meta property="og:image" content="<?php echo $translations['company_info']['website']; ?><?php echo $translations['company_info']['seo']['og_image']; ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $translations['company_info']['website']; ?>">
    <meta property="twitter:title" content="<?php echo $page_title; ?>">
    <meta property="twitter:description" content="<?php echo $page_description; ?>">
    <meta property="twitter:image" content="<?php echo $translations['company_info']['website']; ?><?php echo $translations['company_info']['seo']['twitter_image']; ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "<?php echo htmlspecialchars($translations['company_info']['name']); ?>",
      "url": "<?php echo $translations['company_info']['website']; ?>",
      "logo": "<?php echo $translations['company_info']['website']; ?><?php echo $translations['company_info']['logo']; ?>",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "<?php echo $translations['company_info']['phone']; ?>",
        "contactType": "customer service"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo $translations['company_info']['address']['street']; ?>",
        "addressLocality": "<?php echo $translations['company_info']['address']['city']; ?>",
        "addressRegion": "<?php echo $translations['company_info']['address']['region']; ?>",
        "addressCountry": "<?php echo $translations['company_info']['address']['country']; ?>"
      }
    }
    </script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

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
    <div id="language-switcher" class="bg-gray-50 border-b border-gray-100 relative z-30" style="top: 80px;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end py-3">
                <div class="flex items-center space-x-4">
                    <span class="text-xs text-gray-600"><?php echo $translations['language']['change']; ?>:</span>
                    <div class="flex space-x-3">
                        <a href="?lang=en" class="text-xs font-medium px-2 py-1 rounded <?php echo $language === 'en' ? 'text-primary-600 bg-primary-50 font-bold' : 'text-gray-500 hover:text-primary-600 hover:bg-gray-100'; ?> transition-colors">EN</a>
                        <a href="?lang=ur" class="text-xs px-2 py-1 rounded <?php echo $language === 'ur' ? 'text-primary-600 bg-primary-50 font-bold' : 'text-gray-500 hover:text-primary-600 hover:bg-gray-100'; ?> transition-colors">UR</a>
                        <a href="?lang=ar" class="text-xs px-2 py-1 rounded <?php echo $language === 'ar' ? 'text-primary-600 bg-primary-50 font-bold' : 'text-gray-500 hover:text-primary-600 hover:bg-gray-100'; ?> transition-colors">AR</a>
                        <a href="?lang=es" class="text-xs px-2 py-1 rounded <?php echo $language === 'es' ? 'text-primary-600 bg-primary-50 font-bold' : 'text-gray-500 hover:text-primary-600 hover:bg-gray-100'; ?> transition-colors">ES</a>
                        <a href="?lang=fr" class="text-xs px-2 py-1 rounded <?php echo $language === 'fr' ? 'text-primary-600 bg-primary-50 font-bold' : 'text-gray-500 hover:text-primary-600 hover:bg-gray-100'; ?> transition-colors">FR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav id="main-navigation" class="glass-effect fixed w-full z-50 border-b border-gray-100/20" style="top: 0">
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
                    <a href="#home" class="nav-link text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['home']; ?></a>
                    <a href="#services" class="nav-link text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['services']; ?></a>
                    <a href="#portfolio" class="nav-link text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['portfolio']; ?></a>
                    <a href="#testimonials" class="nav-link text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['testimonials']; ?></a>
                    <a href="#pricing" class="nav-link text-gray-700 hover:text-primary-600 transition-colors font-medium"><?php echo $translations['navigation']['pricing']; ?></a>
                    <a href="#contact" class="btn-primary text-white px-6 py-2 rounded-xl hover-scale font-medium"><?php echo $translations['navigation']['contact']; ?></a>
                </div>

                <button id="mobile-menu-btn" class="lg:hidden p-2 text-gray-700 hover:text-primary-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="mobile-menu lg:hidden">
                <div class="py-4 space-y-2">
                    <a href="#home" class="mobile-nav-link block py-2 text-gray-700 hover:text-primary-600 transition-colors"><?php echo $translations['navigation']['home']; ?></a>
                    <a href="#services" class="mobile-nav-link block py-2 text-gray-700 hover:text-primary-600 transition-colors"><?php echo $translations['navigation']['services']; ?></a>
                    <a href="#portfolio" class="mobile-nav-link block py-2 text-gray-700 hover:text-primary-600 transition-colors"><?php echo $translations['navigation']['portfolio']; ?></a>
                    <a href="#testimonials" class="mobile-nav-link block py-2 text-gray-700 hover:text-primary-600 transition-colors"><?php echo $translations['navigation']['testimonials']; ?></a>
                    <a href="#pricing" class="mobile-nav-link block py-2 text-gray-700 hover:text-primary-600 transition-colors"><?php echo $translations['navigation']['pricing']; ?></a>
                    <a href="#contact" class="mobile-nav-link block py-2 mt-4 btn-primary text-white text-center rounded-xl"><?php echo $translations['navigation']['contact']; ?></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- JavaScript -->
    <script>
        // Dynamic header positioning
        function positionNavigation() {
            const navigation = document.getElementById('main-navigation');
            const languageSwitcher = document.getElementById('language-switcher');

            if (!navigation) {
                console.log('Navigation element not found, retrying...');
                setTimeout(positionNavigation, 100);
                return;
            }

            // Position navigation at the very top
            const navTopPosition = 0;
            navigation.style.top = navTopPosition + 'px';
            navigation.style.width = '100%';

            // Position language switcher below navigation
            if (languageSwitcher) {
                const navHeight = navigation.offsetHeight;
                const switcherTopPosition = navHeight;
                languageSwitcher.style.top = switcherTopPosition + 'px';

                console.log('Header positioning updated:');
                console.log('- Navigation positioned at top:', navTopPosition + 'px');
                console.log('- Navigation height:', navHeight + 'px');
                console.log('- Language switcher positioned at top:', switcherTopPosition + 'px');
            } else {
                console.log('Header positioning updated:');
                console.log('- Navigation positioned at top:', navTopPosition + 'px');
                console.log('- Navigation width:', navigation.style.width);
            }
        }

        // Position navigation when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                // Small delay to ensure all styles are applied
                setTimeout(positionNavigation, 50);
            });
        } else {
            // DOM is already loaded
            setTimeout(positionNavigation, 50);
        }

        // Reposition navigation on window resize with debounce
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(positionNavigation, 150);
        });

        // Reposition elements when language is changed
        document.addEventListener('click', function(e) {
            if (e.target.closest('a[href*="lang="]')) {
                // Delay to allow language switcher height to update
                setTimeout(positionNavigation, 100);
            }
        });

        // Debug header positioning
        console.log('=== HEADER DEBUG INFO ===');
        const nav = document.querySelector('nav');
        if (nav) {
            const navStyles = window.getComputedStyle(nav);
            console.log('Navigation element found:', nav);
            console.log('Position:', navStyles.position);
            console.log('Top:', navStyles.top);
            console.log('Z-index:', navStyles.zIndex);
            console.log('Width:', navStyles.width);
            console.log('Display:', navStyles.display);
            console.log('Visibility:', navStyles.visibility);

            // Check if there are any transforms
            const transform = navStyles.transform;
            if (transform && transform !== 'none') {
                console.log('Transform applied:', transform);
            }

            // Check parent elements
            let parent = nav.parentElement;
            let level = 0;
            while (parent && level < 3) {
                const parentStyles = window.getComputedStyle(parent);
                console.log(`Parent ${level} (${parent.tagName}):`, {
                    position: parentStyles.position,
                    zIndex: parentStyles.zIndex,
                    overflow: parentStyles.overflow
                });
                parent = parent.parentElement;
                level++;
            }
        } else {
            console.log('Navigation element NOT found!');
        }

        // Check for conflicting CSS rules
        console.log('=== CSS RULES CHECK ===');
        const allElements = document.querySelectorAll('*');
        let highZIndexElements = [];
        allElements.forEach(el => {
            const styles = window.getComputedStyle(el);
            const zIndex = parseInt(styles.zIndex);
            if (!isNaN(zIndex) && zIndex > 40) { // Higher than our nav z-index
                highZIndexElements.push({
                    element: el.tagName + (el.className ? '.' + el.className : ''),
                    zIndex: zIndex,
                    position: styles.position
                });
            }
        });
        if (highZIndexElements.length > 0) {
            console.log('Elements with z-index > 40:', highZIndexElements);
        } else {
            console.log('No elements found with z-index higher than navigation (40)');
        }

        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('active');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbar = document.querySelector('nav');
                    const navbarHeight = navbar.offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    mobileMenu.classList.remove('active');
                }
            });
        });

        // Active nav link highlighting
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 200;
                if (window.scrollY >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-primary-600');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-primary-600');
                }
            });
        });
    </script>
</body>
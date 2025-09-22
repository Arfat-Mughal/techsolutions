<?php
// Include company configuration
require_once 'company_config.php';

// Start session for CSRF token
session_start();

// Generate CSRF token if not exists
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Software Solutions - Professional Development Services</title>
    <meta name="description" content="Leading software development company specializing in web development, mobile apps, SEO, and ASO services">
    <meta name="keywords" content="software development, web development, mobile apps, SEO, ASO">
    <meta name="robots" content="index, follow">

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
    <div class="bg-gray-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end py-2">
                <div class="flex items-center space-x-4">
                    <span class="text-xs text-gray-600">Language:</span>
                    <div class="flex space-x-2">
                        <a href="#" class="text-xs font-medium text-primary-600 hover:text-primary-700 transition-colors">EN</a>
                        <a href="#" class="text-xs text-gray-500 hover:text-primary-600 transition-colors">UR</a>
                        <a href="#" class="text-xs text-gray-500 hover:text-primary-600 transition-colors">AR</a>
                        <a href="#" class="text-xs text-gray-500 hover:text-primary-600 transition-colors">ES</a>
                        <a href="#" class="text-xs text-gray-500 hover:text-primary-600 transition-colors">FR</a>
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
                    <a href="#home" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Home</a>
                    <a href="#services" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Services</a>
                    <a href="#portfolio" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Portfolio</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Testimonials</a>
                    <a href="#pricing" class="text-gray-700 hover:text-primary-600 transition-colors font-medium">Pricing</a>
                    <a href="#contact" class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition-all hover-scale font-medium">Contact</a>
                </div>

                <button class="lg:hidden text-gray-700 hover:text-primary-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
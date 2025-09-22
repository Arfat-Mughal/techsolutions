<?php
// Include company configuration
require_once 'company_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - <?php echo get_company_config('company.name'); ?></title>
    <meta name="description" content="Privacy Policy for <?php echo get_company_config('company.name'); ?> - Learn how we collect, use, and protect your personal information.">
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
<body class="font-sans antialiased text-gray-900 bg-white">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold gradient-text"><?php echo get_company_config('company.name'); ?></h1>
                </div>
                <a href="index.php" class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition-all font-medium">
                    Back to Home
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen bg-gradient-to-br from-gray-50 to-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl lg:text-5xl font-bold mb-6 gradient-text">Privacy Policy</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Last updated: <?php echo date('F j, Y'); ?>
                </p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-12">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Introduction</h2>
                    <p class="text-gray-600 mb-6">
                        At <?php echo get_company_config('company.name'); ?>, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Information We Collect</h2>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Personal Information</h3>
                    <p class="text-gray-600 mb-4">
                        We may collect personal information that you voluntarily provide to us, including:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Name and contact information (email, phone number)</li>
                        <li>Company information and job title</li>
                        <li>Project requirements and preferences</li>
                        <li>Communication preferences</li>
                        <li>Any other information you choose to provide</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Automatically Collected Information</h3>
                    <p class="text-gray-600 mb-4">
                        When you visit our website, we may automatically collect certain information, including:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>IP address and location information</li>
                        <li>Browser type and version</li>
                        <li>Operating system</li>
                        <li>Referring website URLs</li>
                        <li>Pages visited and time spent on our site</li>
                        <li>Device information</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. How We Use Your Information</h2>
                    <p class="text-gray-600 mb-4">
                        We use the collected information for the following purposes:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>To provide and maintain our services</li>
                        <li>To communicate with you about projects and inquiries</li>
                        <li>To improve our website and services</li>
                        <li>To send you relevant updates and marketing materials (with consent)</li>
                        <li>To comply with legal obligations</li>
                        <li>To protect our rights and prevent fraud</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Information Sharing and Disclosure</h2>
                    <p class="text-gray-600 mb-4">
                        We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>With your explicit consent</li>
                        <li>With trusted service providers who assist our operations</li>
                        <li>When required by law or legal process</li>
                        <li>To protect our rights, property, or safety</li>
                        <li>In connection with a business transfer or acquisition</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Data Security</h2>
                    <p class="text-gray-600 mb-6">
                        We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Your Rights</h2>
                    <p class="text-gray-600 mb-4">
                        Depending on your location, you may have the following rights regarding your personal information:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Right to access your personal information</li>
                        <li>Right to rectify inaccurate information</li>
                        <li>Right to erase your personal information</li>
                        <li>Right to restrict processing of your information</li>
                        <li>Right to data portability</li>
                        <li>Right to object to processing</li>
                        <li>Right to withdraw consent</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Cookies and Tracking</h2>
                    <p class="text-gray-600 mb-4">
                        Our website may use cookies and similar tracking technologies to enhance your browsing experience. You can control cookie preferences through your browser settings. For more information, please see our Cookie Policy.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Third-Party Links</h2>
                    <p class="text-gray-600 mb-6">
                        Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Children's Privacy</h2>
                    <p class="text-gray-600 mb-6">
                        Our services are not intended for individuals under the age of 18. We do not knowingly collect personal information from children under 18. If you become aware that a child has provided us with personal information, please contact us immediately.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Changes to This Policy</h2>
                    <p class="text-gray-600 mb-6">
                        We may update this Privacy Policy from time to time. We will notify you of any material changes by posting the new policy on this page and updating the "Last updated" date. Your continued use of our services after any changes constitutes acceptance of the updated policy.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Contact Us</h2>
                    <p class="text-gray-600 mb-6">
                        If you have any questions about this Privacy Policy or our data practices, please contact us:
                    </p>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <p class="text-gray-600 mb-2"><strong>Email:</strong> <?php echo get_company_config('contact.email'); ?></p>
                        <p class="text-gray-600 mb-2"><strong>Phone:</strong> <?php echo get_formatted_phone(); ?></p>
                        <p class="text-gray-600 mb-2"><strong>Address:</strong> <?php echo get_full_address(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold"><?php echo get_company_config('company.name'); ?></h3>
                    </div>
                    <p class="text-gray-300">
                        Professional software development services tailored to your business needs.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
                        <li><a href="index.php#services" class="text-gray-300 hover:text-white transition-colors">Services</a></li>
                        <li><a href="index.php#contact" class="text-gray-300 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="privacy-policy.php" class="text-gray-300 hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="terms-of-service.php" class="text-gray-300 hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="cookie-policy.php" class="text-gray-300 hover:text-white transition-colors">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    © <?php echo date('Y'); ?> <?php echo get_company_config('company.name'); ?>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
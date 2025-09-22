<?php
// Include company configuration
require_once 'company_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Policy - <?php echo get_company_config('company.name'); ?></title>
    <meta name="description" content="Cookie Policy for <?php echo get_company_config('company.name'); ?> - Learn about how we use cookies on our website.">
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
                <h1 class="text-4xl lg:text-5xl font-bold mb-6 gradient-text">Cookie Policy</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Last updated: <?php echo date('F j, Y'); ?>
                </p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-12">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. What Are Cookies</h2>
                    <p class="text-gray-600 mb-6">
                        Cookies are small text files that are stored on your computer or mobile device when you visit our website. They allow us to remember your preferences, analyze site traffic, and provide a better user experience.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. How We Use Cookies</h2>
                    <p class="text-gray-600 mb-4">
                        <?php echo get_company_config('company.name'); ?> uses cookies for the following purposes:
                    </p>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">2.1 Essential Cookies</h3>
                    <p class="text-gray-600 mb-4">
                        These cookies are necessary for the website to function properly. They enable core functionality such as:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Security and authentication</li>
                        <li>Form submissions and data processing</li>
                        <li>Language preferences</li>
                        <li>Session management</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">2.2 Analytics Cookies</h3>
                    <p class="text-gray-600 mb-4">
                        These cookies help us understand how visitors interact with our website by collecting and reporting information anonymously. This includes:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Page views and user journeys</li>
                        <li>Traffic sources and user demographics</li>
                        <li>Popular content and user behavior</li>
                        <li>Website performance metrics</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">2.3 Functional Cookies</h3>
                    <p class="text-gray-600 mb-4">
                        These cookies enable enhanced functionality and personalization, such as:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Remembering your preferences and settings</li>
                        <li>Saving form data to improve user experience</li>
                        <li>Customizing content based on your interests</li>
                        <li>Providing social media integration</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Third-Party Cookies</h2>
                    <p class="text-gray-600 mb-4">
                        We may use third-party services that place cookies on your device. These include:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li><strong>Google Analytics:</strong> For website analytics and performance monitoring</li>
                        <li><strong>Social Media Platforms:</strong> For social sharing functionality</li>
                        <li><strong>CDN Services:</strong> For faster content delivery</li>
                        <li><strong>Security Services:</strong> For protection against malicious attacks</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Cookie Management</h2>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">4.1 Browser Settings</h3>
                    <p class="text-gray-600 mb-4">
                        You can control and manage cookies through your browser settings. Most browsers allow you to:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>View what cookies are stored</li>
                        <li>Delete existing cookies</li>
                        <li>Block cookies from specific sites</li>
                        <li>Block all cookies from being set</li>
                        <li>Receive notifications before cookies are set</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">4.2 Cookie Preferences</h3>
                    <p class="text-gray-600 mb-6">
                        You can manage your cookie preferences by adjusting your browser settings or using our cookie preference tool if available. Please note that disabling certain cookies may affect the functionality of our website.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Types of Cookies We Use</h2>
                    <div class="bg-gray-50 p-6 rounded-lg mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Cookie Categories</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-2">Category</th>
                                        <th class="text-left py-2">Purpose</th>
                                        <th class="text-left py-2">Duration</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600">
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 font-medium">Essential</td>
                                        <td class="py-3">Website functionality and security</td>
                                        <td class="py-3">Session to 1 year</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 font-medium">Analytics</td>
                                        <td class="py-3">Understanding user behavior</td>
                                        <td class="py-3">1 day to 2 years</td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 font-medium">Functional</td>
                                        <td class="py-3">Enhanced user experience</td>
                                        <td class="py-3">Session to 1 year</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 font-medium">Marketing</td>
                                        <td class="py-3">Personalized content and ads</td>
                                        <td class="py-3">1 day to 2 years</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Your Consent</h2>
                    <p class="text-gray-600 mb-4">
                        By using our website, you consent to the use of cookies as described in this policy. You can withdraw your consent at any time by:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Adjusting your browser settings to block cookies</li>
                        <li>Using our cookie preference tool (if available)</li>
                        <li>Contacting us to request cookie removal</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Updates to This Policy</h2>
                    <p class="text-gray-600 mb-6">
                        We may update this Cookie Policy from time to time to reflect changes in our practices or for legal reasons. We will notify you of any material changes by updating the "Last updated" date at the top of this page.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Data Protection</h2>
                    <p class="text-gray-600 mb-6">
                        Information collected through cookies is processed in accordance with our Privacy Policy and applicable data protection laws. We ensure that appropriate security measures are in place to protect your data.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Contact Us</h2>
                    <p class="text-gray-600 mb-6">
                        If you have any questions about our use of cookies or this Cookie Policy, please contact us:
                    </p>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <p class="text-gray-600 mb-2"><strong>Email:</strong> <?php echo get_company_config('contact.email'); ?></p>
                        <p class="text-gray-600 mb-2"><strong>Phone:</strong> <?php echo get_formatted_phone(); ?></p>
                        <p class="text-gray-600 mb-2"><strong>Address:</strong> <?php echo get_full_address(); ?></p>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Additional Resources</h2>
                    <p class="text-gray-600 mb-4">
                        For more information about cookies and online privacy, you may wish to visit:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li><a href="https://www.allaboutcookies.org" class="text-primary-600 hover:text-primary-700" target="_blank" rel="noopener">All About Cookies</a></li>
                        <li><a href="https://ico.org.uk/for-the-public/online/cookies/" class="text-primary-600 hover:text-primary-700" target="_blank" rel="noopener">ICO Cookie Guidance</a></li>
                        <li><a href="https://www.youronlinechoices.com" class="text-primary-600 hover:text-primary-700" target="_blank" rel="noopener">Your Online Choices</a></li>
                    </ul>
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
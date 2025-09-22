<?php
// Include company configuration
require_once 'company_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - <?php echo get_company_config('company.name'); ?></title>
    <meta name="description" content="Terms of Service for <?php echo get_company_config('company.name'); ?> - Read our terms and conditions for using our services.">
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
                <h1 class="text-4xl lg:text-5xl font-bold mb-6 gradient-text">Terms of Service</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Last updated: <?php echo date('F j, Y'); ?>
                </p>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-12">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Acceptance of Terms</h2>
                    <p class="text-gray-600 mb-6">
                        By accessing and using the services provided by <?php echo get_company_config('company.name'); ?>, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Services</h2>
                    <p class="text-gray-600 mb-4">
                        <?php echo get_company_config('company.name'); ?> provides software development services including but not limited to:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Web development and design</li>
                        <li>Mobile application development</li>
                        <li>Search Engine Optimization (SEO)</li>
                        <li>App Store Optimization (ASO)</li>
                        <li>Consulting and technical support</li>
                        <li>Maintenance and updates</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Project Development</h2>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">3.1 Project Scope</h3>
                    <p class="text-gray-600 mb-4">
                        All projects will be clearly defined in a written agreement or proposal that outlines the scope of work, deliverables, timeline, and costs. Any changes to the project scope must be agreed upon in writing by both parties.
                    </p>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">3.2 Client Responsibilities</h3>
                    <p class="text-gray-600 mb-4">
                        Clients are responsible for:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Providing accurate and complete project requirements</li>
                        <li>Timely provision of content, materials, and feedback</li>
                        <li>Reviewing and approving deliverables within agreed timeframes</li>
                        <li>Ensuring they have rights to all provided materials</li>
                        <li>Payment of fees according to the agreed schedule</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">3.3 Development Process</h3>
                    <p class="text-gray-600 mb-4">
                        Our development process typically includes:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Requirements gathering and analysis</li>
                        <li>Design and prototyping</li>
                        <li>Development and implementation</li>
                        <li>Testing and quality assurance</li>
                        <li>Deployment and launch</li>
                        <li>Post-launch support and maintenance</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Intellectual Property</h2>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">4.1 Ownership</h3>
                    <p class="text-gray-600 mb-4">
                        Upon full payment of all fees, clients will own the final deliverables. However, <?php echo get_company_config('company.name'); ?> retains ownership of:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>Development tools and methodologies</li>
                        <li>Reusable code components and libraries</li>
                        <li>Pre-existing materials and templates</li>
                        <li>Third-party software and licenses</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">4.2 Usage Rights</h3>
                    <p class="text-gray-600 mb-6">
                        Clients grant <?php echo get_company_config('company.name'); ?> a limited license to use the completed work for portfolio purposes, marketing materials, and case studies, unless otherwise agreed in writing.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Payment Terms</h2>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">5.1 Pricing</h3>
                    <p class="text-gray-600 mb-4">
                        All prices are quoted in the agreed currency and are valid for 30 days from the date of quotation. Prices may be subject to change based on project scope modifications.
                    </p>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">5.2 Payment Schedule</h3>
                    <p class="text-gray-600 mb-4">
                        Payment terms will be specified in the project agreement. Typically:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                        <li>50% deposit before project commencement</li>
                        <li>25% upon completion of development phase</li>
                        <li>25% upon project completion and delivery</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">5.3 Late Payments</h3>
                    <p class="text-gray-600 mb-6">
                        Late payments may incur interest charges of 1.5% per month. <?php echo get_company_config('company.name'); ?> reserves the right to suspend services for overdue accounts.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Warranties and Limitations</h2>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">6.1 Service Warranty</h3>
                    <p class="text-gray-600 mb-4">
                        <?php echo get_company_config('company.name'); ?> warrants that services will be performed in a professional manner and in accordance with industry standards. We will correct any defects in our work at no additional cost within 30 days of delivery.
                    </p>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">6.2 Limitation of Liability</h3>
                    <p class="text-gray-600 mb-6">
                        <?php echo get_company_config('company.name'); ?> shall not be liable for any indirect, incidental, special, or consequential damages arising from the use of our services or any delay in delivery.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Confidentiality</h2>
                    <p class="text-gray-600 mb-6">
                        Both parties agree to maintain the confidentiality of proprietary information shared during the course of the project. This obligation continues for a period of 2 years after project completion.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Termination</h2>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">8.1 Termination by Client</h3>
                    <p class="text-gray-600 mb-4">
                        Clients may terminate a project at any time. Upon termination, clients will be billed for work completed up to the termination date.
                    </p>

                    <h3 class="text-xl font-semibold text-gray-900 mb-3">8.2 Termination by <?php echo get_company_config('company.name'); ?></h3>
                    <p class="text-gray-600 mb-6">
                        <?php echo get_company_config('company.name'); ?> may terminate services if clients breach these terms, fail to provide required materials, or engage in illegal activities.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Dispute Resolution</h2>
                    <p class="text-gray-600 mb-6">
                        Any disputes arising from these terms shall be resolved through mediation in <?php echo get_company_config('company.city'); ?>, <?php echo get_company_config('company.country'); ?>. If mediation fails, disputes will be subject to the exclusive jurisdiction of the courts in <?php echo get_company_config('company.city'); ?>.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Force Majeure</h2>
                    <p class="text-gray-600 mb-6">
                        Neither party shall be liable for delays or failures in performance resulting from acts beyond their reasonable control, including but not limited to natural disasters, war, terrorism, or government actions.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Governing Law</h2>
                    <p class="text-gray-600 mb-6">
                        These terms shall be governed by and construed in accordance with the laws of <?php echo get_company_config('company.country'); ?>, without regard to its conflict of law provisions.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">12. Contact Information</h2>
                    <p class="text-gray-600 mb-6">
                        If you have any questions about these Terms of Service, please contact us:
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
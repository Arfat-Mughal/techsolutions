    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-8 mb-12">
                <div class="lg:col-span-2">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold">TechSolutions</h3>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6 max-w-lg">
                        <?php echo $translations['footer']['description']; ?>
                    </p>
                    <div class="flex space-x-4">
                        <a href="<?php echo $translations['company_info']['social']['facebook']; ?>" class="w-10 h-10 bg-gray-800 text-gray-300 rounded-lg flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="<?php echo $translations['company_info']['social']['twitter']; ?>" class="w-10 h-10 bg-gray-800 text-gray-300 rounded-lg flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="<?php echo $translations['company_info']['social']['linkedin']; ?>" class="w-10 h-10 bg-gray-800 text-gray-300 rounded-lg flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="<?php echo $translations['company_info']['social']['instagram']; ?>" class="w-10 h-10 bg-gray-800 text-gray-300 rounded-lg flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4"><?php echo $translations['footer']['quick_links']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['navigation']['home']; ?></a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['navigation']['services']; ?></a></li>
                        <li><a href="#portfolio" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['navigation']['portfolio']; ?></a></li>
                        <li><a href="#testimonials" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['navigation']['testimonials']; ?></a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['navigation']['contact']; ?></a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4"><?php echo $translations['footer']['services']; ?></h4>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['contact_form']['web_development']; ?></a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['contact_form']['mobile_development']; ?></a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['contact_form']['seo_services']; ?></a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors"><?php echo $translations['contact_form']['aso_services']; ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-8 flex flex-col lg:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm mb-4 lg:mb-0">
                <?php echo $translations['footer']['copyright']; ?>
            </p>
            <div class="flex space-x-6 text-sm">
                <a href="privacy-policy.php" class="text-gray-400 hover:text-white transition-colors"><?php echo $translations['policy_pages']['learn_about_privacy']; ?></a>
                <a href="terms-of-service.php" class="text-gray-400 hover:text-white transition-colors"><?php echo $translations['policy_pages']['read_our_terms']; ?></a>
                <a href="cookie-policy.php" class="text-gray-400 hover:text-white transition-colors"><?php echo $translations['policy_pages']['learn_about_cookies']; ?></a>
            </div>
        </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollTop" class="fixed bottom-8 left-8 z-50 bg-primary-600 hover:bg-primary-700 text-white p-3 rounded-full shadow-2xl transition-all duration-300 hover-scale opacity-0 pointer-events-none">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <!-- Custom JavaScript -->
    <script src="assets/js/custom.js"></script>

    <!-- WhatsApp Chat Button -->
    <div id="whatsapp-button" class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/<?php echo $translations['company_info']['whatsapp']; ?>?text=<?php echo urlencode($translations['company_info']['whatsapp']['default_message']); ?>"
           target="_blank"
           class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-110 flex items-center justify-center whatsapp-button"
           aria-label="<?php echo $translations['company_info']['whatsapp']['button_text']; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.516"/>
            </svg>
        </a>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollTop" class="fixed bottom-6 left-6 z-50 bg-primary-600 hover:bg-primary-700 text-white p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 opacity-0 pointer-events-none">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>
</body>
</html>
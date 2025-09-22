<?php
/**
 * TechSolutions Company Configuration
 *
 * This file contains all company-specific information used throughout the website.
 * Update these values to customize the website for your company.
 */

// Company Information
$config = [
    // Basic Company Details
    'company' => [
        'name' => 'TechSolutions',
        'email' => 'info@techsolutions.co.uk',
        'website' => 'https://techsolutions.co.uk',
        'logo' => '/assets/images/logo.png'
    ],

    // Contact Information
    'contact' => [
        'phone' => '+44 7521 605342',
        'whatsapp' => '+447521605342', // Number without spaces for WhatsApp URL
        'email' => 'info@techsolutions.co.uk'
    ],

    // Address Information
    'address' => [
        'street' => 'Flat 14E, 4 Mann Island',
        'city' => 'Liverpool',
        'region' => 'Merseyside',
        'country' => 'United Kingdom',
        'postal_code' => '',
        'full_address' => 'Flat 14E, 4 Mann Island, Liverpool, Merseyside, United Kingdom'
    ],

    // Social Media Links
    'social' => [
        'facebook' => '#',
        'twitter' => '#',
        'instagram' => '#',
        'linkedin' => '#'
    ],

    // WhatsApp Configuration
    'whatsapp' => [
        'default_message' => 'Hello TechSolutions, I would like to inquire about your services',
        'button_text' => 'Chat with us on WhatsApp',
        'enabled' => true
    ],

    // SEO Configuration
    'seo' => [
        'og_image' => '/assets/images/og-image.jpg',
        'twitter_image' => '/assets/images/twitter-image.jpg',
        'default_description' => 'Leading software solutions provider offering web development, mobile apps, SEO, and ASO services.',
        'default_keywords' => 'web development, mobile apps, SEO, ASO, software solutions, TechSolutions'
    ],

    // Business Hours (if needed)
    'business_hours' => [
        'monday_friday' => '9:00 AM - 6:00 PM',
        'saturday' => '10:00 AM - 4:00 PM',
        'sunday' => 'Closed',
        'timezone' => 'Europe/London'
    ],

    // Services (for reference)
    'services' => [
        'web_development' => 'Custom website development and e-commerce solutions',
        'mobile_development' => 'iOS and Android app development',
        'seo' => 'Search engine optimization services',
        'aso' => 'App Store optimization services'
    ]
];

// Helper function to get config values
function get_company_config($key = null) {
    global $config;

    if ($key === null) {
        return $config;
    }

    $keys = explode('.', $key);
    $value = $config;

    foreach ($keys as $k) {
        if (isset($value[$k])) {
            $value = $value[$k];
        } else {
            return null;
        }
    }

    return $value;
}

// Helper function to get full address
function get_full_address() {
    return get_company_config('address.full_address');
}

// Helper function to get WhatsApp URL
function get_whatsapp_url() {
    $phone = get_company_config('contact.whatsapp');
    $message = urlencode(get_company_config('whatsapp.default_message'));
    return "https://wa.me/{$phone}?text={$message}";
}

// Helper function to get formatted phone number for display
function get_formatted_phone() {
    return get_company_config('contact.phone');
}

// Helper function to get phone number for links (without spaces)
function get_phone_for_links() {
    return get_company_config('contact.whatsapp');
}
?>
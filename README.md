# TechSolutions - Professional IT Services Website

## Overview

TechSolutions is a comprehensive, multilingual business website built with PHP that showcases professional IT services including web development, mobile app development, SEO, and ASO. The website features a modern, responsive design with advanced functionality and security features.

## About TechSolutions

TechSolutions is a professional software solutions provider based in Liverpool, United Kingdom. We specialize in delivering cutting-edge technology solutions to help businesses thrive in the digital world.

### Our Mission

To empower businesses with innovative technology solutions that drive growth, enhance efficiency, and create exceptional digital experiences.

### Our Vision

To be the preferred technology partner for businesses seeking reliable, scalable, and cost-effective software solutions.

## Services Offered

### 🌐 Web Development
- Custom website development and design
- E-commerce platforms with secure payment integration
- Content Management Systems (CMS) integration
- Progressive Web Applications (PWA)
- API development and third-party integrations
- Responsive design for all devices

### 📱 Mobile App Development
- Native iOS application development
- Native Android application development
- Cross-platform mobile solutions
- App Store Optimization (ASO) services
- Mobile UI/UX design and optimization
- App analytics and performance monitoring

### 🔍 Search Engine Optimization (SEO)
- On-page SEO optimization and content strategy
- Off-page SEO and link building strategies
- Technical SEO audits and website optimization
- Local SEO services for regional targeting
- SEO performance monitoring and reporting
- Keyword research and competitive analysis

### 📈 App Store Optimization (ASO)
- App store keyword research and optimization
- Conversion rate optimization for app stores
- App store listing optimization and A/B testing
- User acquisition and retention strategies
- App analytics, reviews, and ratings management
- Competitor analysis and market research

## Key Features

### 🌍 Multilingual Support
The website supports 5 languages with automatic browser language detection:
- **English (EN)** - Primary language
- **Urdu (UR)** - Right-to-left language support
- **Arabic (AR)** - RTL with proper text direction
- **Spanish (ES)** - European language support
- **French (FR)** - European language support

### 📞 Advanced Contact System
- **Contact Form**: Multi-field form with validation
- **CSRF Protection**: Secure token-based form protection
- **Spam Protection**: Honeypot fields and rate limiting
- **WhatsApp Integration**: Floating button with pre-filled messages
- **Email Integration**: Direct email notifications
- **Data Storage**: CSV-based contact storage system

### 🔒 Security Features
- **CSRF Token Protection**: Prevents cross-site request forgery
- **Rate Limiting**: Prevents spam and abuse
- **Input Validation**: Server-side and client-side validation
- **SQL Injection Prevention**: Prepared statements and sanitization
- **XSS Protection**: Output escaping and content sanitization
- **Session Security**: Secure session management

### 📱 Responsive Design
- **Mobile-First Approach**: Optimized for mobile devices
- **Tailwind CSS**: Modern utility-first CSS framework
- **Responsive Layout**: Adapts to all screen sizes
- **Touch-Friendly**: Optimized for touch interactions
- **Fast Loading**: Optimized assets and performance

### 📄 Legal Pages
- **Terms of Service**: Comprehensive service terms
- **Privacy Policy**: GDPR-compliant privacy policy
- **Cookie Policy**: Detailed cookie usage information
- **Multi-language Support**: All legal pages in 5 languages

## Technical Architecture

### Frontend Technologies
- **HTML5**: Semantic markup with accessibility features
- **Tailwind CSS**: Utility-first CSS framework
- **Vanilla JavaScript**: Modern ES6+ JavaScript
- **Responsive Design**: Mobile-first responsive layout
- **Progressive Enhancement**: Works without JavaScript

### Backend Technologies
- **PHP 7.4+**: Server-side scripting language
- **Session Management**: Secure user session handling
- **File-Based Configuration**: Easy-to-modify configuration system
- **CSV Data Storage**: Simple contact data management
- **Error Handling**: Comprehensive error logging and handling

### Project Structure

```
techsolutions/
├── assets/
│   ├── css/
│   │   └── custom.css          # Custom styles and overrides
│   └── js/
│       ├── main.js             # Main JavaScript functionality
│       └── custom.js           # Custom JavaScript features
├── lang/                       # Translation files
│   ├── en.php                  # English translations
│   ├── ur.php                  # Urdu translations
│   ├── ar.php                  # Arabic translations
│   ├── es.php                  # Spanish translations
│   └── fr.php                  # French translations
├── sql/
│   └── contact_submissions.sql # Database schema (optional)
├── storage/                    # Data storage
│   ├── contacts.csv            # Contact form submissions
│   └── rate_limit_*.txt        # Rate limiting data
├── config.php                  # Main configuration file
├── cookie-policy.php           # Cookie policy page
├── footer.php                  # Footer component
├── header.php                  # Header component
├── index.php                   # Homepage
├── privacy-policy.php          # Privacy policy page
├── submit_contact.php          # Contact form handler
├── terms-of-service.php        # Terms of service page
├── LICENSE                     # License file
├── old_index.php               # Backup of original index
├── README.md                   # This documentation
├── robots.txt                  # SEO robots file
└── sitemap.xml                 # XML sitemap
```

## Configuration Files

### `config.php`
Main configuration file containing:
- Database settings (MySQL connection)
- Email configuration (SMTP settings)
- Security settings (CSRF, rate limiting)
- Company configuration function
- Database connection functions

### Language Files (`lang/[lang].php`)
Each language file contains comprehensive translations for:
- Navigation menus
- Hero sections
- Services descriptions
- Contact forms
- Policy pages
- Company information
- Footer content

## Installation & Setup

### Prerequisites
- **PHP 7.4 or higher** with session support
- **Web server** (Apache, Nginx, or XAMPP)
- **Modern browser** for development
- **Text editor** for code modifications

### Quick Start
1. **Download/Clone** the project files
2. **Upload** to your web server's public directory
3. **Start** your web server (Apache/Nginx) or use XAMPP
4. **Access** the website through your browser
5. **Configure** settings in `config.php` if needed

### Configuration Options

#### Database Configuration (Optional)
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
```

#### Email Configuration
```php
define('EMAIL_TO', 'your-email@example.com');
define('EMAIL_FROM', 'noreply@yourdomain.com');
```

#### Rate Limiting
```php
define('RATE_LIMIT_ENABLED', true);
define('RATE_LIMIT_MAX_REQUESTS', 5);
define('RATE_LIMIT_TIME_WINDOW', 3600);
```

## Language System

### Automatic Language Detection
The website automatically detects the user's browser language and serves content in:
1. User's preferred language (if supported)
2. English (default fallback)

### Manual Language Switching
Users can manually switch languages using the language selector in the navigation menu.

### Adding New Languages
1. Create a new file in the `lang/` directory (e.g., `de.php`)
2. Copy the structure from an existing language file
3. Translate all text strings
4. Add the language code to the supported languages array in PHP files

## Contact System

### Contact Form Features
- **Multi-field validation**: Name, email, phone, subject, message
- **Service selection**: Dropdown with predefined services
- **Language preference**: User's communication language choice
- **GDPR compliance**: Consent checkbox for data processing
- **Spam protection**: Honeypot fields and rate limiting
- **File attachment**: Optional file upload capability

### WhatsApp Integration
- **Floating button**: Always visible on all pages
- **Pre-filled message**: Automatic message composition
- **Mobile optimization**: Direct WhatsApp opening on mobile
- **Customizable message**: Configurable default inquiry text

### Data Storage
- **CSV format**: Human-readable contact storage
- **Automatic headers**: Column headers for easy data management
- **Timestamp tracking**: Submission date and time logging
- **Export capability**: Easy data export for CRM integration

## SEO Features

### Technical SEO
- **Meta tags**: Comprehensive title and description tags
- **Open Graph**: Social media sharing optimization
- **Twitter Cards**: Enhanced Twitter sharing
- **JSON-LD**: Structured data markup
- **XML Sitemap**: Search engine indexing
- **Robots.txt**: Search engine crawling instructions

### Performance Optimization
- **Fast loading**: Optimized CSS and JavaScript
- **Image optimization**: Responsive images with proper sizing
- **Caching headers**: Browser caching optimization
- **Minified assets**: Compressed CSS and JavaScript files

## Security Measures

### Form Security
- **CSRF Protection**: Token-based request validation
- **Input Sanitization**: XSS and injection prevention
- **Rate Limiting**: Prevents spam and abuse
- **Honeypot Fields**: Hidden spam detection
- **File Upload Security**: Restricted file types and sizes

### Session Security
- **Secure Sessions**: HTTP-only session cookies
- **Session Timeout**: Automatic session expiration
- **Session Regeneration**: Prevents session fixation
- **IP Tracking**: Optional IP address logging

## Browser Compatibility

### Supported Browsers
- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Mobile Safari (iOS 14+)
- ✅ Chrome Mobile (Android 10+)

### Responsive Breakpoints
- **Mobile**: 320px - 768px
- **Tablet**: 768px - 1024px
- **Desktop**: 1024px+

## Development Features

### Code Organization
- **Modular structure**: Separate files for different sections
- **Reusable components**: Header, footer, and navigation
- **Configuration-driven**: Easy customization through config files
- **Error handling**: Comprehensive error logging and display

### Customization Options
- **Company branding**: Easy logo and color scheme changes
- **Content management**: Text changes through language files
- **Layout modifications**: CSS-based layout adjustments
- **Feature toggles**: Enable/disable features through configuration

## Troubleshooting

### Common Issues

#### PHP Errors
- **Solution**: Check PHP version (7.4+ required)
- **Solution**: Ensure all files have proper permissions
- **Solution**: Check error logs for detailed information

#### Language Issues
- **Solution**: Verify language files exist and are properly formatted
- **Solution**: Check file encoding (UTF-8 required)
- **Solution**: Ensure session support is enabled

#### Contact Form Issues
- **Solution**: Check file permissions on storage directory
- **Solution**: Verify email configuration in config.php
- **Solution**: Check rate limiting settings

## Support & Contact

### Technical Support
For technical issues or questions about the codebase:
- **Email**: info@techsolutions.co.uk
- **Phone**: +44 7521 605342
- **WhatsApp**: +44 7521 605342

### Business Inquiries
For business partnerships or service inquiries:
- **Email**: info@techsolutions.co.uk
- **Phone**: +44 7521 605342
- **WhatsApp**: +44 7521 605342

## Company Information

**Company Name**: TechSolutions
**Address**: Flat 14E, 4 Mann Island, Liverpool, Merseyside, United Kingdom
**Phone**: +44 7521 605342
**Email**: info@techsolutions.co.uk
**Website**: https://techsolutions.co.uk

## License

This project is proprietary software developed by TechSolutions. All rights reserved.

## Version History

### v1.0.0 (Current)
- Complete multilingual website with 5 languages
- Advanced contact system with WhatsApp integration
- Comprehensive legal pages (Terms, Privacy, Cookies)
- Modern responsive design with Tailwind CSS
- Security features including CSRF protection and rate limiting
- SEO optimization with meta tags and structured data

---

*© 2024 TechSolutions. All rights reserved. Built with ❤️ using PHP and modern web technologies.*
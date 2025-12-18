# WordPress Integration Guide for My QRcode Tool Theme

## Overview

This guide explains how to convert your static QR Code Generator website to a fully functional WordPress theme. The theme preserves all JavaScript functionality while adding WordPress CMS capabilities.

## Table of Contents

1. [Quick Start](#quick-start)
2. [Theme Installation](#theme-installation)
3. [Creating Pages](#creating-pages)
4. [JavaScript Integration](#javascript-integration)
5. [SEO Configuration](#seo-configuration)
6. [Customization](#customization)
7. [Troubleshooting](#troubleshooting)

---

## Quick Start

### Step 1: Upload Theme
1. Download the `myqrcodetool` folder
2. Upload to `/wp-content/themes/` on your WordPress server
3. Go to **Appearance > Themes** and activate "My QRcode Tool"

### Step 2: Create Required Pages
Create pages with the following slugs:
- `url-to-qr`, `text-to-qr`, `wifi-to-qr`, `whatsapp-to-qr`
- `email-to-qr`, `phone-to-qr`, `sms-to-qr`, `contact-to-qr`
- `v-card-to-qr`, `event-to-qr`, `image-to-qr`, `paypal-to-qr`, `zoom-to-qr`
- `scanner`, `faq`, `support`, `privacy`, `download`

### Step 3: Configure Settings
Go to **Appearance > Customize > QR Code Tool Settings** to configure:
- Google Tag Manager ID
- Benefits section content
- Use cases text

---

## Theme Installation

### Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- Modern web browser for QR code generation

### Files Structure
```
myqrcodetool/
├── style.css                 # Theme info and main styles
├── functions.php             # Theme functions and hooks
├── header.php               # Site header template
├── footer.php               # Site footer template
├── index.php                # Default template
├── page.php                 # Single page template
├── front-page.php           # Homepage template
├── 404.php                  # 404 error page
├── assets/
│   ├── css/
│   │   └── main.css         # Tailwind CSS styles
│   ├── js/
│   │   ├── vendor.js        # Third-party libraries
│   │   ├── app.js           # Main application
│   │   └── [component].js   # Individual components
│   └── images/
│       ├── favicon.ico
│       ├── og-image.png
│       └── [other images]
├── page-templates/
│   ├── template-qr-generator.php
│   ├── template-scanner.php
│   ├── template-faq.php
│   ├── template-support.php
│   ├── template-privacy.php
│   └── template-download.php
└── inc/
    └── seo-data.php         # SEO data for all pages
```

---

## Creating Pages

### For Each QR Generator Page

1. **Create New Page**: Go to **Pages > Add New**
2. **Set Page Title**: Use the SEO title from `inc/seo-data.php`
3. **Set Page Slug**: Use the appropriate slug (e.g., `url-to-qr`)
4. **Select Template**: Choose "QR Code Generator" from Page Attributes
5. **Add Excerpt**: Use the meta description for SEO
6. **Publish**

### Page Slugs Reference

| Slug | Title | Template |
|------|-------|----------|
| url-to-qr | Create QR Code for Any URL | QR Code Generator |
| text-to-qr | Text to QR Code | QR Code Generator |
| wifi-to-qr | WiFi QR Code Generator | QR Code Generator |
| whatsapp-to-qr | WhatsApp QR Code Generator | QR Code Generator |
| email-to-qr | Email QR Code Generator | QR Code Generator |
| phone-to-qr | Phone Number QR Code | QR Code Generator |
| sms-to-qr | SMS QR Code Generator | QR Code Generator |
| contact-to-qr | Contact QR Code Generator | QR Code Generator |
| v-card-to-qr | vCard QR Code Generator | QR Code Generator |
| event-to-qr | Event QR Code Generator | QR Code Generator |
| image-to-qr | Image to QR Code | QR Code Generator |
| paypal-to-qr | PayPal QR Code Generator | QR Code Generator |
| zoom-to-qr | Zoom Meeting QR Code | QR Code Generator |
| scanner | QR Code Scanner | QR Scanner |
| faq | FAQ | FAQ Page |
| support | Support | Support Page |
| privacy | Privacy Policy | Privacy Policy |
| download | Download | Download Page |

---

## JavaScript Integration

### How It Works

The original React application is preserved in the theme's JavaScript files. The WordPress theme loads the main entry script as an ES module (`type="module"`), which allows the browser to automatically resolve and load all dependencies.

### Key JavaScript Files

1. **app.js**: ES module entry point that imports all dependencies
2. **vendor-*.js**: Contains all third-party libraries (React, QR generation libraries, etc.)
3. **index-*.js**: Main application bundle with React components
4. **Component files**: Individual page components (Scanner, FAQ, etc.)

### ES Module Loading

The theme uses native ES modules. When `app.js` is loaded:
1. The browser sees `import './vendor-CMjGaeKf.js'` and `import './index-B65U0c70.js'`
2. It automatically fetches these modules from the `/assets/js/` directory
3. All React components and QR functionality are initialized

**Important**: All JS files in `/assets/js/` must be accessible via HTTP for the module loading to work.

### Mounting Points

Each template includes a container div where the React app mounts:

```html
<div id="qr-generator-container" data-qr-type="url">
    <!-- React app mounts here -->
</div>
```

### Adding Custom JavaScript

To add custom JS, use WordPress enqueue system in `functions.php`:

```php
wp_enqueue_script(
    'myqrcodetool-custom',
    MYQRCODETOOL_URI . '/assets/js/custom.js',
    array('myqrcodetool-app'),
    MYQRCODETOOL_VERSION,
    true
);
```

---

## SEO Configuration

### Built-in SEO Features

1. **Title Tags**: Managed by WordPress with `title-tag` support
2. **Meta Descriptions**: Set via page excerpts
3. **Open Graph**: Automatic OG tags for social sharing
4. **Twitter Cards**: Automatic Twitter card meta tags
5. **Structured Data**: JSON-LD schemas for:
   - WebApplication
   - BreadcrumbList
   - FAQPage

### Adding Custom SEO Data

Use the `myqrcodetool_get_page_seo()` function to get SEO data:

```php
$seo = myqrcodetool_get_page_seo('url-to-qr');
echo $seo['title'];
echo $seo['description'];
echo $seo['keywords'];
```

### FAQ Schema

Add FAQs with structured data support:

```php
$faqs = array(
    array(
        'question' => 'How do I create a QR code?',
        'answer' => 'Simply enter your content and click Generate.'
    )
);
myqrcodetool_faq_schema($faqs, $title, $url);
```

---

## Customization

### Theme Customizer Options

Go to **Appearance > Customize > QR Code Tool Settings**:

- **Google Tag Manager ID**: Your GTM container ID
- **Benefits Section Title**: Heading for benefits section
- **Use Cases Title**: Heading for use cases section
- **Use Cases Text**: Description of use cases

### Changing Colors

The theme uses Tailwind CSS. To customize colors:

1. Modify `assets/css/main.css`
2. Or add custom CSS in **Appearance > Customize > Additional CSS**

### Theme Color Palette

```css
:root {
    --primary: #10b981;      /* Emerald green */
    --blue: #3B82F6;         /* Blue */
    --pink: #EC4899;         /* Pink */
    --amber: #F59E0B;        /* Amber */
    --slate-800: #1e293b;    /* Dark text */
}
```

---

## Troubleshooting

### QR Generator Not Working

1. **Check Console**: Open browser developer tools and check for JavaScript errors
2. **Script Loading**: Ensure all JS files are loading correctly
3. **Container Missing**: Verify the mounting container div exists

### Styles Not Loading

1. **Clear Cache**: Clear browser cache and any caching plugins
2. **File Paths**: Verify CSS files exist in `assets/css/`
3. **Enqueue Order**: Check that Tailwind loads before custom styles

### SEO Issues

1. **Duplicate Titles**: Disable other SEO plugins or modify `myqrcodetool_seo_meta()`
2. **Missing Schema**: Check if structured data is being output in page source

### Performance

1. **Enable Caching**: Use a caching plugin like WP Super Cache
2. **Optimize Images**: Compress images in `assets/images/`
3. **CDN**: Consider using a CDN for static assets

---

## Additional Resources

### Files to Copy to WordPress

1. **Theme folder**: `myqrcodetool/` → `/wp-content/themes/`
2. **Favicon files**: Copy to theme's `assets/images/` folder
3. **OG Image**: Copy `og-image.png` to `assets/images/`

### Recommended Plugins

- **Yoast SEO** or **Rank Math**: For advanced SEO (disable duplicate meta output)
- **WP Super Cache**: For caching
- **Wordfence**: For security

### Support

For issues with this theme conversion, refer to:
- WordPress Codex: https://developer.wordpress.org/
- Theme Development: https://developer.wordpress.org/themes/

---

## Version History

### 1.0.0 (Initial Release)
- Converted static HTML to WordPress theme
- Added all QR generator page templates
- Implemented SEO features and structured data
- Added customizer options
- Preserved all JavaScript functionality

# My QRcode Tool - WordPress Theme Conversion

## Project Overview

This project converts a static React-based QR Code Generator website into a WordPress-ready theme. The original site was built with React + Vite and has been transformed into a complete WordPress theme package.

## Current Setup

The project runs a **PHP-based preview** that renders the WordPress theme templates directly in Replit's internal browser - no full WordPress installation required.

## Project Structure

```
├── preview/                               # PHP preview server
│   ├── index.php                          # Entry point
│   ├── wp-stubs.php                       # WordPress function stubs
│   └── theme/                             # Symlink to theme folder
├── wordpress-theme/
│   ├── myqrcodetool/                      # WordPress theme source
│   │   ├── style.css                      # Theme info and styles
│   │   ├── functions.php                  # Theme functions
│   │   ├── header.php                     # Site header template
│   │   ├── footer.php                     # Site footer template
│   │   ├── index.php                      # Default template
│   │   ├── page.php                       # Page template
│   │   ├── front-page.php                 # Homepage template
│   │   ├── 404.php                        # 404 error page
│   │   ├── assets/                        # CSS/JS/Images
│   │   ├── page-templates/                # Custom page templates
│   │   └── inc/                           # Include files
│   └── WORDPRESS-INTEGRATION-GUIDE.md     # Detailed documentation
├── extracted_site/                        # Original static site files
├── myqrcodetool-wordpress-theme.zip       # Ready-to-install WordPress theme
└── server.js                              # Legacy Node.js server (backup)
```

## Features Implemented

1. **WordPress Theme Structure**: Complete theme with all required files
2. **17 QR Code Generator Pages**: URL, Text, WiFi, WhatsApp, Email, Phone, SMS, Contact, vCard, Event, Image, PayPal, Zoom, Scanner, FAQ, Support, Privacy
3. **SEO Optimization**: JSON-LD structured data, Open Graph, Twitter Cards
4. **Google Tag Manager**: Integrated with customizer settings
5. **JavaScript Preservation**: All original React functionality preserved
6. **Tailwind CSS**: Complete styling included

## How to Use

### Preview (Current Setup)
- The PHP preview is running with your theme active
- Visit the webview to see how your theme looks
- Edit files in wordpress-theme/myqrcodetool/ to make changes

### Download for Production
- Download `myqrcodetool-wordpress-theme.zip`
- Install on any WordPress site via Appearance > Themes > Add New > Upload Theme
- Follow the installation guide in WORDPRESS-INTEGRATION-GUIDE.md

## Recent Changes

- **2025-12-15**: Footer Cleanup & Dynamic QR Links Update
  - **FOOTER CLEANUP**:
    - Removed duplicate colorful "Popular QR Code Types" gradient section
    - Removed separate footer credits section
    - Removed "Benefits" and "Use Cases" sections from PHP footer
  - **DYNAMIC QR LINKS**:
    - Added JavaScript to dynamically replace the 4 hardcoded "POPULAR QR TYPES" links
    - Links now randomize from 13 QR generator pages on each page load
    - Excludes current page from rotation
    - Excludes scanner page from the link pool

- **2024-12-15**: Comprehensive Performance, SEO & Footer Update
  - **PERFORMANCE FIX**: 
    - Removed duplicate vendor.js (862KB savings)
    - Added modulepreload for both vendor and index JS files
    - Fixed structured data to use SEO dataset instead of raw excerpt
  - **SEO FIX**: 
    - contact-to-qr: "Simple Contact QR Code Maker - Quick MeCard Generator Free"
    - v-card-to-qr: "Professional vCard QR Code Generator - Complete Digital Business Card"
  - **ACCESSIBILITY**: Added noscript fallback for JavaScript-disabled users
  - **FOOTER IMPROVEMENTS**:
    - Dynamic random QR links (4 random from 14 pages, changes on reload)
    - Customizer-editable benefits section
    - New footer credits section
  - **HELPER FUNCTIONS ADDED**:
    - myqrcodetool_get_random_qr_pages() - Random QR links for footer
    - myqrcodetool_get_page_faqs() - FAQ data from seo-data.php
    - myqrcodetool_get_page_benefits() - Benefits from seo-data.php
  - Theme ZIP: 390KB

- **2024-12-15**: Multi-page SEO & JS Optimization
  - Auto-creates 18 QR pages on theme activation
  - Each page has unique SEO meta (description, keywords, canonical)
  - Conditional JS loading - only loads page-specific scripts
  - Added defer attribute for faster page loads
  - Removed unwanted code (Favicon, GTM, PWA meta)

- **2024-12-15**: PHP-based preview setup
  - Created lightweight PHP preview with WordPress stubs
  - Theme renders correctly in Replit internal browser
  - No full WordPress installation required
  
- **2024-12-12**: Initial WordPress theme conversion complete
  - Created all PHP template files
  - Organized CSS and JavaScript assets
  - Added SEO data and structured markup
  - Created comprehensive documentation
  - Built downloadable ZIP package

## User Preferences

- Language: Bengali (বাংলা)
- Focus: SEO optimization for individual pages
- Goal: WordPress theme conversion for better hosting compatibility

# My QRcode Tool - WordPress Theme

## Project Overview

This project is a complete WordPress-based QR Code Generator website. The myqrcodetool theme is fully functional and running on WordPress with SQLite database.

## Current Setup

The project runs a **full WordPress installation** with SQLite database in Replit. The myqrcodetool theme is activated and fully functional.

## Project Structure

```
├── wordpress/                             # Full WordPress installation
│   ├── wp-config.php                      # WordPress configuration (SQLite)
│   ├── wp-content/
│   │   ├── db.php                         # SQLite database driver
│   │   ├── themes/
│   │   │   └── myqrcodetool/              # Active WordPress theme
│   │   │       ├── style.css              # Theme info and styles
│   │   │       ├── functions.php          # Theme functions
│   │   │       ├── header.php             # Site header template
│   │   │       ├── footer.php             # Site footer template
│   │   │       ├── index.php              # Default template
│   │   │       ├── assets/                # CSS/JS/Images
│   │   │       └── page-templates/        # Custom page templates
│   │   └── database/                      # SQLite database files
│   └── wp-admin/                          # WordPress admin panel
├── myqrcodetool/                          # Theme source backup
├── extracted static html_site/            # Static HTML version backup
└── attached_assets/                       # Uploaded files
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
- The WordPress site is running with your theme active
- Visit the webview to see the live WordPress website
- Edit theme files in wordpress/wp-content/themes/myqrcodetool/ to make changes

### WordPress Admin Access
- Visit /wp-admin/ in the webview
- Username: admin
- Password: admin123

### Download for Production
- You can export the theme from wordpress/wp-content/themes/myqrcodetool/
- Install on any WordPress site via Appearance > Themes > Add New > Upload Theme

## Recent Changes

- **2025-12-18**: Full WordPress Setup with SQLite
  - Installed complete WordPress 6.9
  - Configured SQLite database for WordPress
  - Activated myqrcodetool theme
  - Added proxy detection for Replit environment

- **2025-12-17**: Enhanced Dark Theme with Aurora Effects
  - **TOGGLE VISIBILITY FIX**:
    - Toggle button now stays visible in header area
    - Hides only when large content sections (>=300px) overlap
    - Smart detection filters out small UI elements like buttons/badges
  - **ICON COLOR PRESERVATION**:
    - How to Use section icons stay same color in both themes
    - Share button maintains consistent emerald color
    - QR icons in header/footer preserve original gradient colors
  - **AURORA HEADER ANIMATION**:
    - Added subtle aurora gradient animation to header in dark mode
    - Colors: indigo, purple, emerald, and blue blend
    - Animated glowing border at header bottom
  - **DARK THEME COLOR PALETTE**:
    - Changed from pure black to dark blue shades (#0b1120, #131c31)
    - Improved color combinations with purple/blue/white accents

- **2025-12-17**: Dark Theme Support Added
  - **DARK THEME TOGGLE**:
    - Added sun/moon toggle button (fixed position, next to menu button)
    - Smooth CSS transitions when switching themes
    - localStorage persistence - remembers user preference
    - Respects system preference (prefers-color-scheme) on first visit
  - **CSS VARIABLES**:
    - Light theme: White backgrounds, dark text, emerald accents
    - Dark theme: Slate backgrounds (#0f172a, #1e293b), light text, teal accents (#34d399)
  - **STYLED ELEMENTS**:
    - Backgrounds, cards, text, borders, inputs, header, shadows
  - **TOGGLE BUTTON DESIGN**:
    - Rounded button with gradient background
    - Animated sun icon (light mode) / moon icon (dark mode)
    - Hover effects with emerald glow
  - Theme ZIP updated with dark mode support

- **2025-12-17**: Admin Page for Auto-Create Pages
  - Added admin menu: Appearance → Create QR Pages
  - One-click button to create all 17 pages automatically
  - Pages created with proper SEO, templates, and canonical URLs

- **2025-12-15**: Performance Optimization & Black Footer
  - **OPTIMIZATIONS**:
    - Removed unused NotFound.js (779 bytes saved)
    - Removed unused app.js (61 bytes saved)
    - Added router.php for proper /assets/ path handling
  - **FOOTER STYLING**:
    - Added black background (#000000) to footer
    - White text and links for better contrast
  - **ZIP UPDATE**: Final optimized ZIP size: 389KB

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

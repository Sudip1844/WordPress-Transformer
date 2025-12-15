# My QRcode Tool - WordPress Theme Conversion

## Project Overview

This project converts a static React-based QR Code Generator website into a WordPress-ready theme. The original site was built with React + Vite and has been transformed into a complete WordPress theme package.

## Current Setup

The project now runs a **live WordPress preview** with the theme activated. You can see exactly how your theme will look when installed on a WordPress site.

## Project Structure

```
├── wordpress-preview/                     # Live WordPress installation (SQLite)
│   ├── wp-content/
│   │   ├── themes/myqrcodetool/          # Your WordPress theme (active)
│   │   └── plugins/sqlite-database-integration/
│   ├── wp-config.php                      # WordPress configuration
│   └── router.php                         # PHP built-in server router
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
└── server.js                              # Legacy Node.js server (not used)
```

## WordPress Admin Access

- URL: /wp-admin/
- Username: admin
- Password: admin123

## Features Implemented

1. **WordPress Theme Structure**: Complete theme with all required files
2. **17 QR Code Generator Pages**: URL, Text, WiFi, WhatsApp, Email, Phone, SMS, Contact, vCard, Event, Image, PayPal, Zoom, Scanner, FAQ, Support, Privacy
3. **SEO Optimization**: JSON-LD structured data, Open Graph, Twitter Cards
4. **Google Tag Manager**: Integrated with customizer settings
5. **JavaScript Preservation**: All original React functionality preserved
6. **Tailwind CSS**: Complete styling included
7. **SQLite Database**: No MySQL required for preview

## How to Use

### Preview (Current Setup)
- The WordPress preview is running with your theme active
- Visit the site to see how it looks
- Access /wp-admin/ to customize settings

### Download for Production
- Download `myqrcodetool-wordpress-theme.zip`
- Install on any WordPress site via Appearance > Themes > Add New > Upload Theme
- Follow the installation guide in WORDPRESS-INTEGRATION-GUIDE.md

## Recent Changes

- **2024-12-15**: WordPress live preview setup
  - Installed WordPress with SQLite database
  - Activated myqrcodetool theme
  - Configured PHP server for preview
  
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

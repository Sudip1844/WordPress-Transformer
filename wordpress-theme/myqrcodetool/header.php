<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo esc_js(get_theme_mod('gtm_id', 'GTM-MJRZ7GJ6')); ?>');</script>
    <!-- End Google Tag Manager -->
    
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Favicon - Complete Setup for All Devices -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-16x16.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-32x32.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png" />
    
    <!-- PWA Meta Tags -->
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>" />
    <meta name="application-name" content="<?php bloginfo('name'); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="mobile-web-app-capable" content="yes" />
    
    <!-- Microsoft Tiles -->
    <meta name="msapplication-TileColor" content="#10b981" />
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/android-chrome-192x192.png" />
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#10b981" />
    
    <!-- Performance Optimizations -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    <!-- Critical CSS for above-the-fold content -->
    <style>
        body { margin: 0; font-family: system-ui, -apple-system, sans-serif; }
        #root { min-height: 100vh; }
        .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
        .md\:text-6xl { font-size: 3.75rem; line-height: 1; }
        .font-bold { font-weight: 700; }
        .text-slate-800 { color: rgb(30 41 59); }
        .mb-6 { margin-bottom: 1.5rem; }
        .leading-tight { line-height: 1.25; }
        .dynamic-neon-title {
            background: linear-gradient(45deg, #3B82F6, #EC4899, #10B981, #F59E0B);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: neonGradient 4s ease-in-out infinite;
        }
        @keyframes neonGradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .container { max-width: 1280px; margin: 0 auto; padding: 0 1rem; }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr(get_theme_mod('gtm_id', 'GTM-MJRZ7GJ6')); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <?php wp_body_open(); ?>
    
    <div id="root">

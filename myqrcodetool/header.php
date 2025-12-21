<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#10b981" />
    
    <!-- Performance Optimizations -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    <!-- Preload Critical Resources for LCP Optimization -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" as="style" />
    <link rel="modulepreload" href="<?php echo get_template_directory_uri(); ?>/assets/js/vendor-CMjGaeKf.js" />
    <link rel="modulepreload" href="<?php echo get_template_directory_uri(); ?>/assets/js/index-B65U0c70.js" />
    
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
    <?php wp_body_open(); ?>
    
    <div id="root">

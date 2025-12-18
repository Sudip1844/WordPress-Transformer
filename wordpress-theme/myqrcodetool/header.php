<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <meta name="theme-color" content="#10b981" />
    
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" as="style" />
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; line-height: 1.6; }
        
        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --bg-light: #ffffff;
            --bg-dark: #0f172a;
            --text-light: #1e293b;
            --text-dark: #f1f5f9;
            --card-light: #f8fafc;
            --card-dark: #1e293b;
            --border-light: #e2e8f0;
            --border-dark: #334155;
        }
        
        [data-theme="dark"] {
            --bg: var(--bg-dark);
            --text: var(--text-dark);
            --card: var(--card-dark);
            --border: var(--border-dark);
        }
        
        body {
            background: var(--bg-light);
            color: var(--text-light);
            transition: background 0.3s, color 0.3s;
        }
        
        [data-theme="dark"] body {
            background: var(--bg-dark);
            color: var(--text-dark);
        }
        
        .container { max-width: 1280px; margin: 0 auto; padding: 0 1rem; }
        
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
        
        /* Header Styles */
        .site-header {
            background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 50%, #ecfdf5 100%);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid #d1fae5;
        }
        
        [data-theme="dark"] .site-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            border-bottom-color: #334155;
        }
        
        .header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .site-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--text-light);
        }
        
        [data-theme="dark"] .site-logo {
            color: var(--text-dark);
        }
        
        .site-logo svg {
            width: 32px;
            height: 32px;
            color: #10b981;
        }
        
        .main-nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .nav-link {
            text-decoration: none;
            color: #475569;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }
        
        .nav-link:hover {
            color: #10b981;
            background: rgba(16, 185, 129, 0.1);
        }
        
        [data-theme="dark"] .nav-link {
            color: #94a3b8;
        }
        
        [data-theme="dark"] .nav-link:hover {
            color: #10b981;
        }
        
        .nav-link.active {
            color: #10b981;
            background: rgba(16, 185, 129, 0.1);
        }
        
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }
        
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #f1f5f9;
            color: #475569;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
            border: 1px solid #e2e8f0;
        }
        
        .btn-secondary:hover {
            background: #e2e8f0;
        }
        
        [data-theme="dark"] .btn-secondary {
            background: #334155;
            color: #f1f5f9;
            border-color: #475569;
        }
        
        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
        }
        
        .mobile-menu-btn svg {
            width: 24px;
            height: 24px;
            color: #475569;
        }
        
        [data-theme="dark"] .mobile-menu-btn svg {
            color: #94a3b8;
        }
        
        .mobile-nav {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        [data-theme="dark"] .mobile-nav {
            background: #1e293b;
            border-bottom-color: #334155;
        }
        
        .mobile-nav.active {
            display: block;
        }
        
        .mobile-nav a {
            display: block;
            padding: 0.75rem 1rem;
            text-decoration: none;
            color: #475569;
            border-radius: 0.5rem;
        }
        
        .mobile-nav a:hover {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }
        
        [data-theme="dark"] .mobile-nav a {
            color: #94a3b8;
        }
        
        @media (max-width: 768px) {
            .main-nav {
                display: none;
            }
            .mobile-menu-btn {
                display: block;
            }
        }
        
        /* Theme Toggle */
        .theme-toggle {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            color: #475569;
            transition: all 0.2s;
        }
        
        .theme-toggle:hover {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }
        
        [data-theme="dark"] .theme-toggle {
            color: #94a3b8;
        }
        
        .theme-toggle svg {
            width: 20px;
            height: 20px;
        }
        
        .sun-icon { display: none; }
        .moon-icon { display: block; }
        
        [data-theme="dark"] .sun-icon { display: block; }
        [data-theme="dark"] .moon-icon { display: none; }
    </style>
    
    <script>
        (function() {
            var savedTheme = localStorage.getItem('theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            var theme = savedTheme || (prefersDark ? 'dark' : 'light');
            if (theme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    </script>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="site-header">
        <div class="container">
            <div class="header-inner">
                <a href="<?php echo home_url('/'); ?>" class="site-logo">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                    <span>My Qrcode Tool</span>
                </a>
                
                <nav class="main-nav">
                    <a href="<?php echo home_url('/'); ?>" class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>">Home</a>
                    <a href="<?php echo home_url('/scanner/'); ?>" class="nav-link <?php echo is_page('scanner') ? 'active' : ''; ?>">Scanner</a>
                    <a href="<?php echo home_url('/faq/'); ?>" class="nav-link <?php echo is_page('faq') ? 'active' : ''; ?>">FAQ</a>
                    <a href="<?php echo home_url('/support/'); ?>" class="nav-link <?php echo is_page('support') ? 'active' : ''; ?>">Support</a>
                    
                    <button class="theme-toggle" id="theme-toggle" aria-label="Toggle dark mode">
                        <svg class="sun-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="5"/>
                            <line x1="12" y1="1" x2="12" y2="3"/>
                            <line x1="12" y1="21" x2="12" y2="23"/>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                            <line x1="1" y1="12" x2="3" y2="12"/>
                            <line x1="21" y1="12" x2="23" y2="12"/>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                        </svg>
                        <svg class="moon-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                        </svg>
                    </button>
                    
                    <a href="<?php echo home_url('/'); ?>#generator" class="btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                        </svg>
                        Start Creating
                    </a>
                </nav>
                
                <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Toggle menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                        <line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>
            </div>
            
            <nav class="mobile-nav" id="mobile-nav">
                <a href="<?php echo home_url('/'); ?>">Home</a>
                <a href="<?php echo home_url('/scanner/'); ?>">Scanner</a>
                <a href="<?php echo home_url('/faq/'); ?>">FAQ</a>
                <a href="<?php echo home_url('/support/'); ?>">Support</a>
                <a href="<?php echo home_url('/'); ?>#generator" class="btn-primary" style="margin-top: 1rem; justify-content: center;">Start Creating</a>
            </nav>
        </div>
    </header>
    
    <main id="main-content">

<?php
/**
 * My QRcode Tool Theme Functions
 *
 * @package MyQrcodeTool
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('MYQRCODETOOL_VERSION', '1.0.0');
define('MYQRCODETOOL_DIR', get_template_directory());
define('MYQRCODETOOL_URI', get_template_directory_uri());

require_once MYQRCODETOOL_DIR . '/inc/seo-data.php';

/**
 * Theme Setup
 */
function myqrcodetool_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'myqrcodetool'),
        'footer'  => __('Footer Menu', 'myqrcodetool'),
    ));
}
add_action('after_setup_theme', 'myqrcodetool_setup');

/**
 * Automatically create pages on theme activation
 */
function myqrcodetool_create_pages_on_activation() {
    require_once MYQRCODETOOL_DIR . '/inc/seo-data.php';
    
    $pages = myqrcodetool_get_all_qr_pages();
    
    // Map pages to their templates
    $page_templates = array(
        'url-to-qr' => 'page-templates/template-qr-generator.php',
        'text-to-qr' => 'page-templates/template-qr-generator.php',
        'wifi-to-qr' => 'page-templates/template-qr-generator.php',
        'whatsapp-to-qr' => 'page-templates/template-qr-generator.php',
        'email-to-qr' => 'page-templates/template-qr-generator.php',
        'phone-to-qr' => 'page-templates/template-qr-generator.php',
        'sms-to-qr' => 'page-templates/template-qr-generator.php',
        'contact-to-qr' => 'page-templates/template-qr-generator.php',
        'v-card-to-qr' => 'page-templates/template-qr-generator.php',
        'event-to-qr' => 'page-templates/template-qr-generator.php',
        'image-to-qr' => 'page-templates/template-qr-generator.php',
        'paypal-to-qr' => 'page-templates/template-qr-generator.php',
        'zoom-to-qr' => 'page-templates/template-qr-generator.php',
        'scanner' => 'page-templates/template-scanner.php',
        'download' => 'page-templates/template-download.php',
        'faq' => 'page-templates/template-faq.php',
        'privacy' => 'page-templates/template-privacy.php',
        'support' => 'page-templates/template-support.php',
    );
    
    // Create each page
    foreach ($page_templates as $slug => $template) {
        // Check if page already exists by slug
        $existing = get_page_by_path($slug);
        
        // Also check for common duplicates (e.g., privacy vs privacy-policy)
        if (!$existing && $slug === 'privacy') {
            $existing = get_page_by_path('privacy-policy');
        }
        
        if ($existing) {
            continue; // Skip if page already exists
        }
        
        $page_title = '';
        if (isset($pages[$slug]['title'])) {
            $page_title = $pages[$slug]['title'];
        }
        
        // Create the page
        $page_data = array(
            'post_title'    => $page_title,
            'post_name'     => $slug,
            'post_content'  => '',
            'post_type'     => 'page',
            'post_status'   => 'publish',
            'comment_status' => 'closed',
            'ping_status'   => 'closed',
        );
        
        $page_id = wp_insert_post($page_data);
        
        if ($page_id) {
            // Assign page template
            update_post_meta($page_id, '_wp_page_template', $template);
        }
    }
}

// Hook for theme activation
add_action('after_switch_theme', 'myqrcodetool_create_pages_on_activation');

/**
 * Create and set Homepage on theme activation
 */
function myqrcodetool_setup_homepage() {
    // Check if homepage already exists
    $homepage = get_page_by_path('');
    
    if (!$homepage) {
        // Create homepage
        $home_page = array(
            'post_title'    => 'QR Code Generator - Free, Custom Logo & Many More',
            'post_name'     => 'qrcode-home',
            'post_content'  => '',
            'post_type'     => 'page',
            'post_status'   => 'publish',
            'comment_status' => 'closed',
            'ping_status'   => 'closed',
        );
        
        $home_page_id = wp_insert_post($home_page);
        
        if ($home_page_id && !is_wp_error($home_page_id)) {
            // Set this page as the static front page
            update_option('show_on_front', 'page');
            update_option('page_on_front', $home_page_id);
            
            // Assign template
            update_post_meta($home_page_id, '_wp_page_template', 'page-templates/template-qr-generator.php');
        }
    }
}

add_action('after_switch_theme', 'myqrcodetool_setup_homepage', 11);

/**
 * Add admin menu to manually create pages
 */
function myqrcodetool_add_admin_menu() {
    add_theme_page(
        'Create QR Pages',
        'Create QR Pages',
        'manage_options',
        'myqrcodetool_create_pages',
        'myqrcodetool_create_pages_admin_page'
    );
}
add_action('admin_menu', 'myqrcodetool_add_admin_menu');

/**
 * Admin page to create pages manually
 */
function myqrcodetool_create_pages_admin_page() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }
    
    echo '<div class="wrap">';
    echo '<h1>Create QR Code Pages</h1>';
    echo '<p>Click the button below to create all QR code pages automatically.</p>';
    echo '<form method="post">';
    wp_nonce_field('myqrcodetool_create_pages_nonce');
    echo '<button type="submit" name="myqrcodetool_create_pages_submit" class="button button-primary">Create All Pages</button>';
    echo '</form>';
    echo '</div>';
}

/**
 * Handle page creation form submission
 */
function myqrcodetool_handle_page_creation() {
    if (isset($_POST['myqrcodetool_create_pages_submit'])) {
        check_admin_referer('myqrcodetool_create_pages_nonce');
        myqrcodetool_create_pages_on_activation();
        wp_die('<h2>Pages Created Successfully!</h2><p><a href="' . admin_url('edit.php?post_type=page') . '">View All Pages</a></p>');
    }
}
add_action('admin_init', 'myqrcodetool_handle_page_creation');

/**
 * Enqueue Scripts and Styles - Optimized for per-page loading
 */
function myqrcodetool_scripts() {
    wp_enqueue_style(
        'myqrcodetool-tailwind',
        MYQRCODETOOL_URI . '/assets/css/main.css',
        array(),
        MYQRCODETOOL_VERSION
    );
    
    wp_enqueue_style(
        'myqrcodetool-style',
        get_stylesheet_uri(),
        array('myqrcodetool-tailwind'),
        MYQRCODETOOL_VERSION
    );
    
    wp_enqueue_script(
        'myqrcodetool-vendor',
        MYQRCODETOOL_URI . '/assets/js/vendor-CMjGaeKf.js',
        array(),
        MYQRCODETOOL_VERSION,
        true
    );
    
    wp_enqueue_script(
        'myqrcodetool-header',
        MYQRCODETOOL_URI . '/assets/js/Header-D99lOBCF.js',
        array('myqrcodetool-vendor'),
        MYQRCODETOOL_VERSION,
        true
    );
    
    wp_enqueue_script(
        'myqrcodetool-index',
        MYQRCODETOOL_URI . '/assets/js/index-B65U0c70.js',
        array('myqrcodetool-vendor', 'myqrcodetool-header'),
        MYQRCODETOOL_VERSION,
        true
    );
    
    wp_enqueue_script(
        'myqrcodetool-header-button-sync',
        MYQRCODETOOL_URI . '/assets/js/header-button-sync.js',
        array('myqrcodetool-index'),
        MYQRCODETOOL_VERSION,
        true
    );
    
    if (is_page()) {
        $template = get_page_template_slug();
        
        if ($template === 'page-templates/template-scanner.php' || is_page('scanner')) {
            wp_enqueue_script(
                'myqrcodetool-scanner',
                MYQRCODETOOL_URI . '/assets/js/Scanner-DV43weYr.js',
                array('myqrcodetool-index'),
                MYQRCODETOOL_VERSION,
                true
            );
        }
        
        if ($template === 'page-templates/template-faq.php' || is_page('faq')) {
            wp_enqueue_script(
                'myqrcodetool-faq',
                MYQRCODETOOL_URI . '/assets/js/FAQ-D6MABQM8.js',
                array('myqrcodetool-index'),
                MYQRCODETOOL_VERSION,
                true
            );
        }
        
        if ($template === 'page-templates/template-privacy.php' || is_page('privacy')) {
            wp_enqueue_script(
                'myqrcodetool-privacy',
                MYQRCODETOOL_URI . '/assets/js/Privacy-D7SuySko.js',
                array('myqrcodetool-index'),
                MYQRCODETOOL_VERSION,
                true
            );
        }
        
        if ($template === 'page-templates/template-support.php' || is_page('support')) {
            wp_enqueue_script(
                'myqrcodetool-support',
                MYQRCODETOOL_URI . '/assets/js/Support-CSl2T0Fe.js',
                array('myqrcodetool-index'),
                MYQRCODETOOL_VERSION,
                true
            );
        }
        
        if ($template === 'page-templates/template-download.php' || is_page('download')) {
            wp_enqueue_script(
                'myqrcodetool-download',
                MYQRCODETOOL_URI . '/assets/js/Download-CZOGZnml.js',
                array('myqrcodetool-index'),
                MYQRCODETOOL_VERSION,
                true
            );
        }
    }
    
    wp_localize_script('myqrcodetool-index', 'myqrcodetool_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('myqrcodetool_nonce'),
        'site_url' => home_url('/'),
        'assets_url' => MYQRCODETOOL_URI . '/assets/',
    ));
}
add_action('wp_enqueue_scripts', 'myqrcodetool_scripts');

/**
 * Add type="module" and defer attributes for optimized loading
 */
function myqrcodetool_script_type_module($tag, $handle, $src) {
    $module_scripts = array(
        'myqrcodetool-vendor',
        'myqrcodetool-header',
        'myqrcodetool-index',
        'myqrcodetool-scanner',
        'myqrcodetool-faq',
        'myqrcodetool-privacy',
        'myqrcodetool-support',
        'myqrcodetool-download',
    );
    
    if (in_array($handle, $module_scripts)) {
        $tag = str_replace('<script ', '<script type="module" defer ', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'myqrcodetool_script_type_module', 10, 3);

/**
 * Add Structured Data (JSON-LD) Support
 */
function myqrcodetool_structured_data() {
    global $post;
    
    $site_name = get_bloginfo('name');
    $site_url = home_url('/');
    
    $description = get_bloginfo('description');
    if (is_singular() && $post) {
        $page_slug = $post->post_name;
        $seo_data = myqrcodetool_get_page_seo($page_slug);
        if ($seo_data && !empty($seo_data['description'])) {
            $description = wp_strip_all_tags($seo_data['description']);
        } elseif (has_excerpt()) {
            $description = wp_strip_all_tags(get_the_excerpt());
        }
    }
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'WebApplication',
        'name' => get_the_title() ?: $site_name,
        'description' => $description,
        'url' => get_permalink() ?: $site_url,
        'applicationCategory' => 'UtilityApplication',
        'operatingSystem' => 'Web Browser',
        'offers' => array(
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'USD'
        ),
        'creator' => array(
            '@type' => 'Organization',
            'name' => $site_name
        )
    );
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    
    $breadcrumb = array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array(
            array(
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => $site_url
            )
        )
    );
    
    if (is_singular() && !is_front_page()) {
        $breadcrumb['itemListElement'][] = array(
            '@type' => 'ListItem',
            'position' => 2,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    }
    
    echo '<script type="application/ld+json">' . wp_json_encode($breadcrumb, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'myqrcodetool_structured_data');

/**
 * Custom SEO Meta Tags
 */
function myqrcodetool_seo_meta() {
    global $post;
    
    $site_name = get_bloginfo('name');
    $url = is_singular() ? get_permalink() : home_url('/');
    $title = is_singular() ? get_the_title() : $site_name;
    
    $description = get_bloginfo('description');
    if (is_singular() && $post) {
        $page_slug = $post->post_name;
        $seo_data = myqrcodetool_get_page_seo($page_slug);
        if ($seo_data && !empty($seo_data['description'])) {
            $description = wp_strip_all_tags($seo_data['description']);
        } elseif (has_excerpt()) {
            $description = wp_strip_all_tags(get_the_excerpt());
        }
    }
    $og_image = MYQRCODETOOL_URI . '/assets/images/og-image.png';
    
    if (has_post_thumbnail()) {
        $og_image = get_the_post_thumbnail_url(null, 'large');
    }
    ?>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo esc_attr($title); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($description); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo esc_url($url); ?>" />
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>" />
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>" />
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>" />
    <?php
}
add_action('wp_head', 'myqrcodetool_seo_meta', 5);

/**
 * Customizer Settings
 */
function myqrcodetool_customizer($wp_customize) {
    $wp_customize->add_section('myqrcodetool_settings', array(
        'title'    => __('QR Code Tool Settings', 'myqrcodetool'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('gtm_id', array(
        'default'           => 'GTM-MJRZ7GJ6',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('gtm_id', array(
        'label'   => __('Google Tag Manager ID', 'myqrcodetool'),
        'section' => 'myqrcodetool_settings',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('benefits_title', array(
        'default'           => 'Benefits',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('benefits_title', array(
        'label'   => __('Benefits Section Title', 'myqrcodetool'),
        'section' => 'myqrcodetool_settings',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('use_cases_title', array(
        'default'           => 'Use Cases',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('use_cases_title', array(
        'label'   => __('Use Cases Section Title', 'myqrcodetool'),
        'section' => 'myqrcodetool_settings',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('use_cases_text', array(
        'default'           => 'Perfect for businesses, events, restaurants, education, marketing campaigns, product packaging, social media, business cards, menus, contact information sharing, and promotional materials.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('use_cases_text', array(
        'label'   => __('Use Cases Text', 'myqrcodetool'),
        'section' => 'myqrcodetool_settings',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'myqrcodetool_customizer');

/**
 * NOTE: Yoast SEO plugin handles robots.txt and sitemap.xml generation.
 * Custom sitemap and robots files removed to avoid conflicts.
 * Let Yoast manage SEO files for better compatibility.
 * 
 * All page SEO data is defined in /inc/seo-data.php
 */

/**
 * Wrapper function to get page-specific SEO data from seo-data.php
 */
function myqrcodetool_get_page_seo($page_slug) {
    $all_pages = myqrcodetool_get_all_qr_pages();
    if (isset($all_pages[$page_slug])) {
        return array(
            'title' => $all_pages[$page_slug]['title'] ?? '',
            'description' => $all_pages[$page_slug]['description'] ?? '',
            'keywords' => $all_pages[$page_slug]['keywords'] ?? ''
        );
    }
    return array(
        'title' => '',
        'description' => '',
        'keywords' => ''
    );
}

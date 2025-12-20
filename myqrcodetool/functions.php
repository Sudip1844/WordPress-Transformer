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
            'keywords' => 'vcard qr code, vcf qr generator, digital business card, professional contact qr'
        ),
        'event-to-qr' => array(

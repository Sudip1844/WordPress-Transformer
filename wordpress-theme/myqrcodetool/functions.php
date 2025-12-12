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
 * Enqueue Scripts and Styles
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
        'myqrcodetool-app',
        MYQRCODETOOL_URI . '/assets/js/app.js',
        array(),
        MYQRCODETOOL_VERSION,
        true
    );
    
    wp_localize_script('myqrcodetool-app', 'myqrcodetool_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('myqrcodetool_nonce'),
        'site_url' => home_url('/'),
        'assets_url' => MYQRCODETOOL_URI . '/assets/',
    ));
}
add_action('wp_enqueue_scripts', 'myqrcodetool_scripts');

/**
 * Add type="module" attribute to ES module scripts
 * This allows the browser to properly load ES modules and handle imports
 */
function myqrcodetool_script_type_module($tag, $handle, $src) {
    if ($handle === 'myqrcodetool-app') {
        $tag = str_replace('<script ', '<script type="module" ', $tag);
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
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'WebApplication',
        'name' => get_the_title() ?: $site_name,
        'description' => get_the_excerpt() ?: get_bloginfo('description'),
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
    $description = get_the_excerpt() ?: get_bloginfo('description');
    $url = is_singular() ? get_permalink() : home_url('/');
    $title = is_singular() ? get_the_title() : $site_name;
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
 * Helper function to get page-specific SEO data
 */
function myqrcodetool_get_page_seo($page_slug) {
    $seo_data = array(
        'url-to-qr' => array(
            'title' => 'Create QR Code for Any URL - Instant & Free',
            'description' => 'Convert any URL or link into a scannable QR code instantly. Just paste your link and share QR codes easily for websites, social media, promotions, and more.',
            'keywords' => 'url to qr code, link qr generator, free qr code, qr code generator free'
        ),
        'text-to-qr' => array(
            'title' => 'Text to QR Code - Share Notes, Info, or Secret Messages',
            'description' => 'Easily convert plain text into QR codes. Perfect for sharing notes, messages, codes, or instructions via scannable QR codes.',
            'keywords' => 'text to qr code, text qr generator, message qr code'
        ),
        'wifi-to-qr' => array(
            'title' => 'WiFi QR Code Generator - Share Network Access Instantly',
            'description' => 'Create QR codes for WiFi network access. Let guests connect instantly without typing passwords.',
            'keywords' => 'wifi qr code, wifi qr generator, share wifi'
        ),
        'whatsapp-to-qr' => array(
            'title' => 'WhatsApp QR Code Generator - Direct Message Link',
            'description' => 'Generate QR codes that open WhatsApp conversations directly. Perfect for business and customer support.',
            'keywords' => 'whatsapp qr code, whatsapp link generator'
        ),
        'email-to-qr' => array(
            'title' => 'Email QR Code Generator - Quick Contact Made Easy',
            'description' => 'Create QR codes that compose emails instantly. Perfect for business cards and contact sharing.',
            'keywords' => 'email qr code, email link generator, contact qr'
        ),
        'phone-to-qr' => array(
            'title' => 'Phone Number QR Code Generator - One Scan to Call',
            'description' => 'Generate QR codes for phone numbers. Let customers call you with a single scan.',
            'keywords' => 'phone qr code, call qr generator, tel qr'
        ),
        'sms-to-qr' => array(
            'title' => 'SMS QR Code Generator - Text Message Made Easy',
            'description' => 'Create QR codes that open SMS with pre-filled messages. Perfect for marketing and support.',
            'keywords' => 'sms qr code, text message qr, sms generator'
        ),
        'contact-to-qr' => array(
            'title' => 'Contact QR Code Generator - Share Your Details',
            'description' => 'Generate QR codes with complete contact information. Easy sharing for business networking.',
            'keywords' => 'contact qr code, mecard generator, contact sharing'
        ),
        'v-card-to-qr' => array(
            'title' => 'vCard QR Code Generator - Digital Business Card',
            'description' => 'Create professional vCard QR codes with all your contact details for easy networking.',
            'keywords' => 'vcard qr code, business card qr, digital card'
        ),
        'event-to-qr' => array(
            'title' => 'Event QR Code Generator - Calendar Integration',
            'description' => 'Generate QR codes for events that add directly to calendars. Perfect for invitations and scheduling.',
            'keywords' => 'event qr code, calendar qr, ics qr generator'
        ),
        'image-to-qr' => array(
            'title' => 'Image to QR Code - Embed Pictures in QR',
            'description' => 'Create QR codes that link to images. Share photos, artwork, and visual content easily.',
            'keywords' => 'image qr code, photo qr, picture qr generator'
        ),
        'paypal-to-qr' => array(
            'title' => 'PayPal QR Code Generator - Easy Payment Links',
            'description' => 'Generate PayPal payment QR codes for easy transactions. Perfect for businesses and freelancers.',
            'keywords' => 'paypal qr code, payment qr, paypal link generator'
        ),
        'zoom-to-qr' => array(
            'title' => 'Zoom Meeting QR Code Generator - Join Meetings Instantly',
            'description' => 'Create QR codes for Zoom meetings. Let participants join with a single scan.',
            'keywords' => 'zoom qr code, meeting qr, zoom link generator'
        ),
    );
    
    return isset($seo_data[$page_slug]) ? $seo_data[$page_slug] : null;
}

/**
 * Register Custom Post Type for QR Pages (optional)
 */
function myqrcodetool_register_post_types() {
    register_post_type('qr_page', array(
        'labels' => array(
            'name'          => __('QR Pages', 'myqrcodetool'),
            'singular_name' => __('QR Page', 'myqrcodetool'),
        ),
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => array('slug' => 'qr'),
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'    => 'dashicons-qrcode',
        'show_in_rest' => true,
    ));
}
add_action('init', 'myqrcodetool_register_post_types');

/**
 * Add FAQ Schema Support
 */
function myqrcodetool_faq_schema($faqs, $page_title, $page_url) {
    if (empty($faqs)) {
        return;
    }
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'name' => $page_title . ' - FAQ',
        'description' => 'Frequently asked questions',
        'url' => $page_url,
        'mainEntity' => array()
    );
    
    foreach ($faqs as $faq) {
        $schema['mainEntity'][] = array(
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $faq['answer']
            )
        );
    }
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

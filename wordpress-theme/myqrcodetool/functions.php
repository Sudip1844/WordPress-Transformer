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

/**
 * Auto-create QR pages on theme activation
 */
function myqrcodetool_create_pages_on_activation() {
    $pages_to_create = array(
        array(
            'slug' => 'url-to-qr',
            'title' => 'URL to QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Convert any URL or link into a scannable QR code instantly. Just paste your link and share QR codes easily for websites, social media, promotions, and more.',
            'meta_keywords' => 'url to qr code, link qr generator, free qr code, qr code generator free'
        ),
        array(
            'slug' => 'text-to-qr',
            'title' => 'Text to QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Easily convert plain text into QR codes. Perfect for sharing notes, messages, codes, or instructions via scannable QR codes.',
            'meta_keywords' => 'text to qr code, text qr generator, message qr code'
        ),
        array(
            'slug' => 'wifi-to-qr',
            'title' => 'WiFi QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Create QR codes for WiFi network access. Let guests connect instantly without typing passwords.',
            'meta_keywords' => 'wifi qr code, wifi qr generator, share wifi'
        ),
        array(
            'slug' => 'whatsapp-to-qr',
            'title' => 'WhatsApp QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Generate QR codes that open WhatsApp conversations directly. Perfect for business and customer support.',
            'meta_keywords' => 'whatsapp qr code, whatsapp link generator'
        ),
        array(
            'slug' => 'email-to-qr',
            'title' => 'Email QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Create QR codes that compose emails instantly. Perfect for business cards and contact sharing.',
            'meta_keywords' => 'email qr code, email link generator, contact qr'
        ),
        array(
            'slug' => 'phone-to-qr',
            'title' => 'Phone Number QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Generate QR codes for phone numbers. Let customers call you with a single scan.',
            'meta_keywords' => 'phone qr code, call qr generator, tel qr'
        ),
        array(
            'slug' => 'sms-to-qr',
            'title' => 'SMS QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Create QR codes that open SMS with pre-filled messages. Perfect for marketing and support.',
            'meta_keywords' => 'sms qr code, text message qr, sms generator'
        ),
        array(
            'slug' => 'contact-to-qr',
            'title' => 'Contact QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Generate QR codes with complete contact information. Easy sharing for business networking.',
            'meta_keywords' => 'contact qr code, mecard generator, contact sharing'
        ),
        array(
            'slug' => 'v-card-to-qr',
            'title' => 'vCard QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Create professional vCard QR codes with all your contact details for easy networking.',
            'meta_keywords' => 'vcard qr code, business card qr, digital card'
        ),
        array(
            'slug' => 'event-to-qr',
            'title' => 'Event QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Generate QR codes for events that add directly to calendars. Perfect for invitations and scheduling.',
            'meta_keywords' => 'event qr code, calendar qr, ics qr generator'
        ),
        array(
            'slug' => 'image-to-qr',
            'title' => 'Image to QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Create QR codes that link to images. Share photos, artwork, and visual content easily.',
            'meta_keywords' => 'image qr code, photo qr, picture qr generator'
        ),
        array(
            'slug' => 'paypal-to-qr',
            'title' => 'PayPal QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Generate PayPal payment QR codes for easy transactions. Perfect for businesses and freelancers.',
            'meta_keywords' => 'paypal qr code, payment qr, paypal link generator'
        ),
        array(
            'slug' => 'zoom-to-qr',
            'title' => 'Zoom Meeting QR Code Generator',
            'template' => 'page-templates/template-qr-generator.php',
            'meta_description' => 'Create QR codes for Zoom meetings. Let participants join with a single scan.',
            'meta_keywords' => 'zoom qr code, meeting qr, zoom link generator'
        ),
        array(
            'slug' => 'scanner',
            'title' => 'QR Code Scanner',
            'template' => 'page-templates/template-scanner.php',
            'meta_description' => 'Free online QR code scanner. Scan any QR code using your camera or upload an image.',
            'meta_keywords' => 'qr code scanner, scan qr, qr reader online'
        ),
        array(
            'slug' => 'download',
            'title' => 'Download QR Code',
            'template' => 'page-templates/template-download.php',
            'meta_description' => 'Download your generated QR codes in multiple formats. High quality PNG, SVG and PDF exports.',
            'meta_keywords' => 'download qr code, qr code png, qr code svg'
        ),
        array(
            'slug' => 'faq',
            'title' => 'Frequently Asked Questions',
            'template' => 'page-templates/template-faq.php',
            'meta_description' => 'Common questions about QR codes, how to create them, customize them, and use them for your business.',
            'meta_keywords' => 'qr code faq, qr code questions, how to create qr code'
        ),
        array(
            'slug' => 'privacy',
            'title' => 'Privacy Policy',
            'template' => 'page-templates/template-privacy.php',
            'meta_description' => 'Our privacy policy explains how we handle your data when using our QR code generator service.',
            'meta_keywords' => 'privacy policy, data protection'
        ),
        array(
            'slug' => 'support',
            'title' => 'Support',
            'template' => 'page-templates/template-support.php',
            'meta_description' => 'Get help with our QR code generator. Contact support for any questions or issues.',
            'meta_keywords' => 'qr code support, help, contact'
        ),
    );
    
    $pages_created = 0;
    
    foreach ($pages_to_create as $page_data) {
        $existing_page = get_posts(array(
            'name'        => $page_data['slug'],
            'post_type'   => 'page',
            'post_status' => array('publish', 'draft', 'trash', 'pending', 'private'),
            'numberposts' => 1,
        ));
        
        if (empty($existing_page)) {
            $page_id = wp_insert_post(array(
                'post_title'   => $page_data['title'],
                'post_name'    => $page_data['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ));
            
            if ($page_id && !is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                update_post_meta($page_id, '_myqrcodetool_meta_description', $page_data['meta_description']);
                update_post_meta($page_id, '_myqrcodetool_meta_keywords', $page_data['meta_keywords']);
                $pages_created++;
            }
        }
    }
    
    if ($pages_created > 0) {
        update_option('myqrcodetool_pages_created', $pages_created);
    }
    
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'myqrcodetool_create_pages_on_activation');

/**
 * Output page-specific SEO meta tags (only for pages with custom meta)
 */
function myqrcodetool_page_seo_meta() {
    if (!is_page() || is_front_page()) {
        return;
    }
    
    global $post;
    
    $description = get_post_meta($post->ID, '_myqrcodetool_meta_description', true);
    $keywords = get_post_meta($post->ID, '_myqrcodetool_meta_keywords', true);
    
    if (!$description && !$keywords) {
        return;
    }
    
    if ($description) {
        echo '<meta name="description" content="' . esc_attr($description) . '" />' . "\n";
    }
    
    if ($keywords) {
        echo '<meta name="keywords" content="' . esc_attr($keywords) . '" />' . "\n";
    }
    
    echo '<link rel="canonical" href="' . esc_url(get_permalink()) . '" />' . "\n";
    echo '<meta name="robots" content="index, follow" />' . "\n";
}
add_action('wp_head', 'myqrcodetool_page_seo_meta', 1);

/**
 * Add admin notice after theme activation
 */
function myqrcodetool_admin_notice() {
    $pages_created = get_option('myqrcodetool_pages_created');
    if ($pages_created) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>My QRcode Tool Theme:</strong> <?php echo intval($pages_created); ?> QR generator pages have been created automatically! Your multi-page website is ready for Google indexing.</p>
        </div>
        <?php
        delete_option('myqrcodetool_pages_created');
    }
}
add_action('admin_notices', 'myqrcodetool_admin_notice');

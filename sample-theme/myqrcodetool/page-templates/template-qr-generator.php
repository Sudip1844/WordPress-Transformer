<?php
/**
 * Template Name: QR Code Generator
 * Template Post Type: page
 *
 * Generic QR Code Generator template for all QR types
 *
 * @package MyQrcodeTool
 */

get_header();

$qr_type = get_post_meta(get_the_ID(), '_qr_type', true) ?: 'url';
$page_slug = get_post_field('post_name', get_the_ID());
$seo_data = myqrcodetool_get_page_seo($page_slug);
?>

<main id="primary" class="site-main">
    <div id="qr-generator-container" data-qr-type="<?php echo esc_attr($qr_type); ?>">
        <!-- The React/JS QR Generator app will mount here -->
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="text-align: center; padding: 2rem 1rem;">
                <?php the_title('<h1 class="entry-title text-4xl md:text-6xl font-bold mb-6 leading-tight dynamic-neon-title">', '</h1>'); ?>
                
                <?php if (has_excerpt()) : ?>
                    <p class="entry-excerpt" style="font-size: 1.25rem; color: #64748b; max-width: 800px; margin: 0 auto;">
                        <?php echo esc_html(get_the_excerpt()); ?>
                    </p>
                <?php endif; ?>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</main>

<?php
$faqs = get_post_meta(get_the_ID(), '_qr_faqs', true);
if (!empty($faqs) && is_array($faqs)) {
    myqrcodetool_faq_schema($faqs, get_the_title(), get_permalink());
}

get_footer();

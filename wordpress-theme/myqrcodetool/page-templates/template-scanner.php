<?php
/**
 * Template Name: QR Scanner
 * Template Post Type: page
 *
 * QR Code Scanner template
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<main id="primary" class="site-main">
    <div id="qr-scanner-container">
        <!-- The QR Scanner JS app will mount here -->
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="text-align: center; padding: 2rem 1rem;">
                <?php the_title('<h1 class="entry-title text-4xl md:text-6xl font-bold mb-6 leading-tight dynamic-neon-title">', '</h1>'); ?>
                
                <p class="entry-excerpt" style="font-size: 1.25rem; color: #64748b; max-width: 800px; margin: 0 auto;">
                    <?php echo esc_html(get_the_excerpt() ?: 'Scan any QR code using your device camera. Fast, free, and works on all devices.'); ?>
                </p>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();

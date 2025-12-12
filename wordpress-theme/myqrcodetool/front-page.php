<?php
/**
 * Front Page Template
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- QR Code Generator App Container -->
    <div id="qr-app-container">
        <!-- The React/JS app will mount here -->
        <!-- WordPress content below as fallback -->
    </div>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>
</main>

<?php
get_footer();

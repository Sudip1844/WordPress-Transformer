<?php
/**
 * Template Name: Support Page
 * Template Post Type: page
 *
 * Support/Contact Page template
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<main id="primary" class="site-main">
    <div id="support-container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="text-align: center; padding: 2rem 1rem;">
                <?php the_title('<h1 class="entry-title text-4xl md:text-6xl font-bold mb-6 leading-tight dynamic-neon-title">', '</h1>'); ?>
            </header>
            
            <div class="entry-content" style="max-width: 800px; margin: 0 auto; padding: 0 1rem;">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();

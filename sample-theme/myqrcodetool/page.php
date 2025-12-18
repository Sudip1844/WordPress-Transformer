<?php
/**
 * Page Template
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title text-4xl md:text-6xl font-bold text-slate-800 mb-6 leading-tight dynamic-neon-title">', '</h1>'); ?>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();

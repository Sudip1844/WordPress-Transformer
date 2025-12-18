<?php
/**
 * Main Template File
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    else :
        ?>
        <section class="no-results not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Nothing here', 'myqrcodetool'); ?></h1>
            </header>
        </section>
        <?php
    endif;
    ?>
</main>

<?php
get_footer();

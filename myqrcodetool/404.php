<?php
/**
 * 404 Page Template
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found" style="text-align: center; padding: 4rem 1rem;">
        <header class="page-header">
            <h1 class="page-title text-4xl md:text-6xl font-bold dynamic-neon-title" style="font-size: 3rem; margin-bottom: 1rem;">
                <?php esc_html_e('Page Not Found', 'myqrcodetool'); ?>
            </h1>
        </header>
        
        <div class="page-content">
            <p style="font-size: 1.25rem; color: #64748b; margin-bottom: 2rem;">
                <?php esc_html_e('Sorry, the page you are looking for does not exist.', 'myqrcodetool'); ?>
            </p>
            
            <a href="<?php echo esc_url(home_url('/')); ?>" 
               style="display: inline-block; background: linear-gradient(45deg, #3B82F6, #10B981); color: white; padding: 0.75rem 2rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600;">
                <?php esc_html_e('Go to Homepage', 'myqrcodetool'); ?>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();

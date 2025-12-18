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
        <!-- Noscript fallback for users with JavaScript disabled -->
        <noscript>
            <div style="text-align: center; padding: 3rem 1rem; max-width: 800px; margin: 0 auto;">
                <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 1rem;">Free QR Code Generator</h1>
                <p style="margin-bottom: 2rem; color: #64748b;">Create professional QR codes for URLs, WiFi, contacts, and more. JavaScript is required to use this tool.</p>
                <p style="background: #fef3c7; padding: 1rem; border-radius: 0.5rem; color: #92400e;">
                    Please enable JavaScript in your browser to use the QR Code Generator.
                </p>
            </div>
        </noscript>
    </div>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>
</main>

<?php
get_footer();

    </div><!-- #root -->
    
    <div style="padding: 2rem 1rem; background: #f9fafb;">
        <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
            <?php echo esc_html(get_theme_mod('benefits_title', 'Benefits')); ?>
        </h2>
        <ul style="list-style: disc; padding-left: 2rem;">
            <?php
            $benefits = get_theme_mod('benefits_list', array(
                'Generate professional QR codes in seconds - no design skills needed',
                'Customize colors, add logos, and choose from multiple frame styles',
                'Support for 15+ QR code types: URLs, emails, WiFi, vCard, and more',
                'High-quality export options - PNG, SVG, PDF with custom sizes',
                'Track QR code scans and analytics with URL shorteners',
                'Completely free - no registration or watermarks required'
            ));
            if (is_array($benefits)) {
                foreach ($benefits as $benefit) {
                    echo '<li>' . esc_html($benefit) . '</li>';
                }
            }
            ?>
        </ul>
    </div>
    
    <div style="padding: 2rem 1rem;">
        <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
            <?php echo esc_html(get_theme_mod('use_cases_title', 'Use Cases')); ?>
        </h2>
        <p><?php echo esc_html(get_theme_mod('use_cases_text', 'Perfect for businesses, events, restaurants, education, marketing campaigns, product packaging, social media, business cards, menus, contact information sharing, and promotional materials.')); ?></p>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>

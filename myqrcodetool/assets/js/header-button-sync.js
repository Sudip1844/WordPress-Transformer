/**
 * Synchronize Dark Theme Button with Header Visibility
 * Ensures button hide/show is perfectly timed with header
 */
(function() {
    'use strict';

    const syncHeaderButtonVisibility = () => {
        // Get header and button elements
        const header = document.querySelector('header');
        const themeButton = document.querySelector('[class*="theme-toggle"], button[title*="theme"], button[aria-label*="theme"], [class*="dark-toggle"]');

        if (!header || !themeButton) {
            // Try again in 500ms if elements not found yet
            setTimeout(syncHeaderButtonVisibility, 500);
            return;
        }

        // Get computed styles to check visibility
        const getHeaderVisible = () => {
            const style = window.getComputedStyle(header);
            return style.display !== 'none' && style.visibility !== 'hidden' && style.opacity !== '0';
        };

        const getButtonVisible = () => {
            const style = window.getComputedStyle(themeButton);
            return style.display !== 'none' && style.visibility !== 'hidden' && style.opacity !== '0';
        };

        // Sync visibility on scroll and window events
        const synchronizeVisibility = () => {
            const headerVisible = getHeaderVisible();
            const buttonVisible = getButtonVisible();

            if (headerVisible !== buttonVisible) {
                if (headerVisible) {
                    // Show button with header
                    themeButton.style.display = '';
                    themeButton.style.visibility = '';
                    themeButton.style.opacity = '';
                } else {
                    // Hide button with header
                    themeButton.style.display = 'none';
                    themeButton.style.visibility = 'hidden';
                    themeButton.style.opacity = '0';
                }
            }
        };

        // Listen to scroll events (header typically hides on scroll)
        window.addEventListener('scroll', synchronizeVisibility, { passive: true });

        // Listen to resize events
        window.addEventListener('resize', synchronizeVisibility, { passive: true });

        // Initial sync
        synchronizeVisibility();

        // Also sync on any DOM mutations in header
        const observer = new MutationObserver(() => {
            synchronizeVisibility();
        });

        observer.observe(header, {
            attributes: true,
            attributeFilter: ['style', 'class'],
            subtree: false
        });
    };

    // Start syncing when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', syncHeaderButtonVisibility);
    } else {
        syncHeaderButtonVisibility();
    }

    // Also run after a short delay to catch dynamically rendered elements
    setTimeout(syncHeaderButtonVisibility, 1000);
    setTimeout(syncHeaderButtonVisibility, 2000);
})();

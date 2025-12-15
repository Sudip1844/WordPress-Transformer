    </div><!-- #root -->
    
    <script>
    // Dynamic QR Links - Replace hardcoded footer links with random ones
    document.addEventListener('DOMContentLoaded', function() {
        // All 13 QR generator pages (no scanner)
        const allQRPages = [
            { slug: 'url-to-qr', title: 'URL QR Code', icon: 'link' },
            { slug: 'text-to-qr', title: 'Text QR Code', icon: 'file-text' },
            { slug: 'wifi-to-qr', title: 'WiFi QR Code', icon: 'wifi' },
            { slug: 'whatsapp-to-qr', title: 'WhatsApp QR Code', icon: 'message-circle' },
            { slug: 'email-to-qr', title: 'Email QR Code', icon: 'mail' },
            { slug: 'phone-to-qr', title: 'Phone QR Code', icon: 'phone' },
            { slug: 'sms-to-qr', title: 'SMS QR Code', icon: 'message-square' },
            { slug: 'contact-to-qr', title: 'Contact QR Code', icon: 'user' },
            { slug: 'v-card-to-qr', title: 'vCard QR Code', icon: 'credit-card' },
            { slug: 'event-to-qr', title: 'Event QR Code', icon: 'calendar' },
            { slug: 'image-to-qr', title: 'Image QR Code', icon: 'image' },
            { slug: 'paypal-to-qr', title: 'PayPal QR Code', icon: 'dollar-sign' },
            { slug: 'zoom-to-qr', title: 'Zoom QR Code', icon: 'video' }
        ];
        
        // Get current page slug to exclude it
        const currentPath = window.location.pathname.replace(/\//g, '');
        const availablePages = allQRPages.filter(page => page.slug !== currentPath);
        
        // Shuffle and pick 4 random pages
        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }
        
        const randomPages = shuffle([...availablePages]).slice(0, 4);
        
        // Find and update the POPULAR QR TYPES section
        setTimeout(function() {
            // Look for the footer section with "POPULAR QR TYPES" text
            const footerSections = document.querySelectorAll('footer, [class*="footer"], div');
            footerSections.forEach(section => {
                const headings = section.querySelectorAll('h3, h4, h5, p, span');
                headings.forEach(heading => {
                    if (heading.textContent && heading.textContent.toUpperCase().includes('POPULAR QR TYPES')) {
                        // Found the section, now find the links container
                        const parent = heading.parentElement;
                        if (parent) {
                            const linksContainer = parent.querySelector('div') || parent.nextElementSibling;
                            if (linksContainer) {
                                const links = linksContainer.querySelectorAll('a');
                                if (links.length >= 4) {
                                    // Update each link with random page
                                    links.forEach((link, index) => {
                                        if (index < 4 && randomPages[index]) {
                                            link.href = '/' + randomPages[index].slug + '/';
                                            // Update the text content (keep any icons)
                                            const textNode = Array.from(link.childNodes).find(node => node.nodeType === 3);
                                            if (textNode) {
                                                textNode.textContent = randomPages[index].title;
                                            } else {
                                                // If no text node, check for span
                                                const span = link.querySelector('span');
                                                if (span) {
                                                    span.textContent = randomPages[index].title;
                                                } else {
                                                    link.textContent = randomPages[index].title;
                                                }
                                            }
                                        }
                                    });
                                }
                            }
                        }
                    }
                });
            });
        }, 500); // Wait for React to render
    });
    </script>
    
    <?php wp_footer(); ?>
</body>
</html>

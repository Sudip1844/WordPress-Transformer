    </main>
    
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="<?php echo home_url('/'); ?>" class="footer-logo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28">
                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                        </svg>
                        <span>My Qrcode Tool</span>
                    </a>
                    <p class="footer-desc">Create professional QR codes for business, events, and personal use. Free, fast, and customizable.</p>
                </div>
                
                <div class="footer-section">
                    <h4>QR Code Types</h4>
                    <ul>
                        <li><a href="<?php echo home_url('/url-to-qr/'); ?>">URL QR Code</a></li>
                        <li><a href="<?php echo home_url('/text-to-qr/'); ?>">Text QR Code</a></li>
                        <li><a href="<?php echo home_url('/wifi-to-qr/'); ?>">WiFi QR Code</a></li>
                        <li><a href="<?php echo home_url('/whatsapp-to-qr/'); ?>">WhatsApp QR Code</a></li>
                        <li><a href="<?php echo home_url('/email-to-qr/'); ?>">Email QR Code</a></li>
                        <li><a href="<?php echo home_url('/phone-to-qr/'); ?>">Phone QR Code</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>More QR Types</h4>
                    <ul>
                        <li><a href="<?php echo home_url('/sms-to-qr/'); ?>">SMS QR Code</a></li>
                        <li><a href="<?php echo home_url('/contact-to-qr/'); ?>">Contact QR Code</a></li>
                        <li><a href="<?php echo home_url('/v-card-to-qr/'); ?>">vCard QR Code</a></li>
                        <li><a href="<?php echo home_url('/event-to-qr/'); ?>">Event QR Code</a></li>
                        <li><a href="<?php echo home_url('/paypal-to-qr/'); ?>">PayPal QR Code</a></li>
                        <li><a href="<?php echo home_url('/zoom-to-qr/'); ?>">Zoom QR Code</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="<?php echo home_url('/scanner/'); ?>">QR Code Scanner</a></li>
                        <li><a href="<?php echo home_url('/download/'); ?>">Download App</a></li>
                        <li><a href="<?php echo home_url('/faq/'); ?>">FAQ</a></li>
                        <li><a href="<?php echo home_url('/support/'); ?>">Support</a></li>
                        <li><a href="<?php echo home_url('/privacy/'); ?>">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> My Qrcode Tool. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <style>
        .site-footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 4rem 0 2rem;
            margin-top: 4rem;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
        }
        
        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
            
            .footer-brand {
                grid-column: span 2;
            }
        }
        
        @media (max-width: 480px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-brand {
                grid-column: span 1;
            }
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        
        .footer-logo svg {
            color: #10b981;
        }
        
        .footer-desc {
            font-size: 0.9rem;
            line-height: 1.6;
            max-width: 280px;
        }
        
        .footer-section h4 {
            color: white;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }
        
        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-section li {
            margin-bottom: 0.5rem;
        }
        
        .footer-section a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }
        
        .footer-section a:hover {
            color: #10b981;
        }
        
        .footer-bottom {
            border-top: 1px solid #1e293b;
            margin-top: 3rem;
            padding-top: 2rem;
            text-align: center;
            font-size: 0.875rem;
        }
    </style>
    
    <script>
    (function() {
        var themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                var currentTheme = document.documentElement.getAttribute('data-theme');
                var newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                if (newTheme === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                } else {
                    document.documentElement.removeAttribute('data-theme');
                }
                
                localStorage.setItem('theme', newTheme);
            });
        }
        
        var mobileMenuBtn = document.getElementById('mobile-menu-btn');
        var mobileNav = document.getElementById('mobile-nav');
        if (mobileMenuBtn && mobileNav) {
            mobileMenuBtn.addEventListener('click', function() {
                mobileNav.classList.toggle('active');
            });
        }
    })();
    </script>
    
    <?php wp_footer(); ?>
</body>
</html>

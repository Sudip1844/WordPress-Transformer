<?php
/**
 * Front Page Template
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <div class="hero-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 4rem 2rem; text-align: center;">
        <div style="max-width: 900px; margin: 0 auto;">
            <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 1rem; line-height: 1.2;">Free QR Code Generator</h1>
            <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.95;">Create QR codes for URLs, WiFi, Contacts, Events, Payments, and more. Completely free!</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo home_url('/url-to-qr'); ?>" style="background: white; color: #667eea; padding: 0.75rem 2rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600; display: inline-block;">Get Started</a>
                <a href="<?php echo home_url('/scanner'); ?>" style="background: rgba(255,255,255,0.2); color: white; padding: 0.75rem 2rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600; display: inline-block; border: 2px solid white;">Scan QR Code</a>
            </div>
        </div>
    </div>

    <!-- QR Code Generators Section -->
    <div style="padding: 3rem 2rem; background: #f8fafc;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h2 style="font-size: 2rem; font-weight: bold; text-align: center; margin-bottom: 3rem; color: #1e293b;">All QR Code Generators</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                
                <!-- URL to QR -->
                <a href="<?php echo home_url('/url-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">🔗</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">URL to QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Convert any URL or link into a scannable QR code instantly.</p>
                </a>

                <!-- Text to QR -->
                <a href="<?php echo home_url('/text-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">📝</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Text to QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Easily convert plain text into QR codes for notes and messages.</p>
                </a>

                <!-- WiFi to QR -->
                <a href="<?php echo home_url('/wifi-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">📶</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">WiFi QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Share network access instantly without typing passwords.</p>
                </a>

                <!-- WhatsApp to QR -->
                <a href="<?php echo home_url('/whatsapp-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">💬</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">WhatsApp QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Generate QR codes that open WhatsApp conversations directly.</p>
                </a>

                <!-- Email to QR -->
                <a href="<?php echo home_url('/email-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">✉️</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Email QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Create QR codes that compose emails instantly.</p>
                </a>

                <!-- Phone to QR -->
                <a href="<?php echo home_url('/phone-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">☎️</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Phone Number QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Generate QR codes for phone numbers. Let customers call you with a single scan.</p>
                </a>

                <!-- SMS to QR -->
                <a href="<?php echo home_url('/sms-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">💌</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">SMS QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Create QR codes that open SMS with pre-filled messages.</p>
                </a>

                <!-- Contact to QR -->
                <a href="<?php echo home_url('/contact-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">👤</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Contact QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Create simple contact QR codes instantly with MeCard format.</p>
                </a>

                <!-- vCard to QR -->
                <a href="<?php echo home_url('/v-card-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">💼</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">vCard QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Create professional digital business cards with full details.</p>
                </a>

                <!-- Event to QR -->
                <a href="<?php echo home_url('/event-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">📅</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Event QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Generate QR codes for events that add to calendars instantly.</p>
                </a>

                <!-- Image to QR -->
                <a href="<?php echo home_url('/image-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">🖼️</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Image to QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Create QR codes that link to images and photos easily.</p>
                </a>

                <!-- PayPal to QR -->
                <a href="<?php echo home_url('/paypal-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">💳</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">PayPal QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Generate PayPal payment QR codes for easy transactions.</p>
                </a>

                <!-- Zoom to QR -->
                <a href="<?php echo home_url('/zoom-to-qr'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">📹</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Zoom Meeting QR Code</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Create QR codes for Zoom meetings. Join instantly with one scan.</p>
                </a>

            </div>
        </div>
    </div>

    <!-- Tools Section -->
    <div style="padding: 3rem 2rem;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h2 style="font-size: 2rem; font-weight: bold; text-align: center; margin-bottom: 3rem; color: #1e293b;">Other Tools</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                
                <!-- QR Scanner -->
                <a href="<?php echo home_url('/scanner'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 2px solid #667eea; transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">📱</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">QR Code Scanner</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Fast & secure online QR code scanner. Scan or upload QR codes instantly.</p>
                </a>

                <!-- Download App -->
                <a href="<?php echo home_url('/download'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 2px solid #667eea; transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">⬇️</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">Download App</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Download the QR Code Scanner app for mobile devices.</p>
                </a>

                <!-- FAQ -->
                <a href="<?php echo home_url('/faq'); ?>" style="background: white; padding: 2rem; border-radius: 0.75rem; text-decoration: none; color: inherit; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 2px solid #667eea; transition: all 0.3s;">
                    <div style="font-size: 2rem; margin-bottom: 1rem;">❓</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; color: #1e293b;">FAQ</h3>
                    <p style="color: #64748b; font-size: 0.95rem;">Frequently asked questions about QR codes and our tools.</p>
                </a>

            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div style="padding: 3rem 2rem; background: #f8fafc;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h2 style="font-size: 2rem; font-weight: bold; text-align: center; margin-bottom: 3rem; color: #1e293b;">Why Choose Us?</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚡</div>
                    <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Fast & Instant</h3>
                    <p style="color: #64748b;">Generate QR codes instantly without any delay or registration.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">🆓</div>
                    <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Completely Free</h3>
                    <p style="color: #64748b;">No hidden fees, no premium plans, no watermarks ever.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">🔒</div>
                    <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Secure</h3>
                    <p style="color: #64748b;">Your data is processed locally. We don't store your information.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">📱</div>
                    <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Mobile Friendly</h3>
                    <p style="color: #64748b;">Works perfectly on smartphones, tablets, and desktop devices.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">🎨</div>
                    <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">High Quality</h3>
                    <p style="color: #64748b;">Generate high-resolution QR codes for professional use.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">🚀</div>
                    <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem;">Multiple Formats</h3>
                    <p style="color: #64748b;">Generate QR codes for URLs, WiFi, contacts, payments, and more.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 3rem 2rem; text-align: center;">
        <div style="max-width: 600px; margin: 0 auto;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 1rem;">Ready to Create Your First QR Code?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem; opacity: 0.95;">Choose a generator above and start creating QR codes now. Completely free, no registration required!</p>
            <a href="<?php echo home_url('/url-to-qr'); ?>" style="background: white; color: #667eea; padding: 0.75rem 2rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600; display: inline-block; font-size: 1.1rem;">Start Now</a>
        </div>
    </div>

    <!-- Footer Links -->
    <div style="padding: 2rem; background: #f1f5f9; text-align: center; border-top: 1px solid #e2e8f0;">
        <p style="color: #64748b; margin-bottom: 1rem;">
            <a href="<?php echo home_url('/privacy'); ?>" style="color: #667eea; text-decoration: none; margin-right: 2rem;">Privacy Policy</a>
            <a href="<?php echo home_url('/support'); ?>" style="color: #667eea; text-decoration: none;">Support & Contact</a>
        </p>
    </div>

</main>

<?php
get_footer();

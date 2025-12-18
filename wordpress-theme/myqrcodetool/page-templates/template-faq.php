<?php
/**
 * Template Name: FAQ Page
 * Template Post Type: page
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<style>
    .faq-hero { background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 50%, #ecfdf5 100%); padding: 3rem 0; text-align: center; }
    [data-theme="dark"] .faq-hero { background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%); }
    .faq-title { font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; }
    @media (max-width: 768px) { .faq-title { font-size: 1.75rem; } }
    .faq-desc { color: #64748b; font-size: 1.125rem; max-width: 600px; margin: 0 auto; }
    [data-theme="dark"] .faq-desc { color: #94a3b8; }
    
    .faq-container { padding: 4rem 0; }
    .faq-wrapper { max-width: 800px; margin: 0 auto; }
    
    .faq-item {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        margin-bottom: 1rem;
        overflow: hidden;
    }
    
    [data-theme="dark"] .faq-item {
        background: #1e293b;
        border-color: #334155;
    }
    
    .faq-question {
        padding: 1.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        font-size: 1.125rem;
    }
    
    .faq-question:hover { color: #10b981; }
    
    .faq-question svg {
        width: 20px;
        height: 20px;
        transition: transform 0.3s;
        flex-shrink: 0;
        margin-left: 1rem;
    }
    
    .faq-item.open .faq-question svg { transform: rotate(180deg); }
    
    .faq-answer {
        padding: 0 1.5rem;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s, padding 0.3s;
        color: #64748b;
        line-height: 1.7;
    }
    
    [data-theme="dark"] .faq-answer { color: #94a3b8; }
    
    .faq-item.open .faq-answer {
        padding: 0 1.5rem 1.5rem;
        max-height: 500px;
    }
    
    .cta-section {
        padding: 4rem 0;
        background: linear-gradient(135deg, #10b981, #059669);
        text-align: center;
        color: white;
    }
    
    .cta-title { font-size: 2rem; font-weight: 700; margin-bottom: 1rem; }
    .cta-desc { font-size: 1.125rem; margin-bottom: 2rem; opacity: 0.9; }
    
    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: white;
        color: #10b981;
        padding: 1rem 2rem;
        border-radius: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
    }
    
    .cta-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
</style>

<section class="faq-hero">
    <div class="container">
        <h1 class="faq-title">
            <span class="dynamic-neon-title">Frequently Asked Questions</span>
        </h1>
        <p class="faq-desc">
            Find answers to common questions about QR codes and our generator.
        </p>
    </div>
</section>

<section class="faq-container">
    <div class="container">
        <div class="faq-wrapper">
            <div class="faq-item">
                <div class="faq-question">
                    What is a QR code?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    A QR code (Quick Response code) is a two-dimensional barcode that can store various types of information such as URLs, text, contact details, WiFi credentials, and more. When scanned with a smartphone camera, it quickly provides access to the encoded information.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Is the QR code generator free to use?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    Yes! Our QR code generator is completely free to use. There are no hidden fees, no registration required, and no watermarks on your generated QR codes. You can create unlimited QR codes and download them in high quality.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    What types of QR codes can I create?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    You can create many types of QR codes including: URL/Website links, Plain text, WiFi credentials, WhatsApp messages, Email addresses, Phone numbers, SMS messages, vCards (digital business cards), Calendar events, PayPal payments, Zoom meeting links, and Image links.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Can I customize my QR code?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    Yes! You can customize your QR codes by changing the foreground and background colors. This helps you match your brand identity while maintaining scannability. Just make sure there's enough contrast between the colors.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    What format should I download my QR code in?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    We offer two formats: PNG and SVG. PNG is perfect for most uses like websites, social media, and small prints. SVG is a vector format that can be scaled to any size without losing quality - ideal for large prints, billboards, and professional printing.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    How do I scan a QR code?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    Most modern smartphones can scan QR codes using the built-in camera app. Simply open your camera and point it at the QR code. A notification will appear with the content or a link to open. You can also use our online QR Code Scanner on this website.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Do QR codes expire?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    Static QR codes (like ours) never expire. The information is encoded directly in the QR pattern, so as long as the QR code is intact and scannable, it will work forever. However, if the content it links to (like a website) goes offline, the QR code won't be useful.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Can I use these QR codes for commercial purposes?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    Absolutely! All QR codes generated on our platform are free to use for both personal and commercial purposes. Use them on business cards, product packaging, marketing materials, menus, or anywhere else you need.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    What size should my QR code be for printing?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    The minimum recommended size for a printed QR code is 2cm x 2cm (about 0.8 inches). For best scanning results, especially from a distance, make them larger. Download the SVG format for the highest quality prints at any size.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Why isn't my QR code scanning?
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
                <div class="faq-answer">
                    Common issues include: insufficient contrast between colors, QR code is too small or damaged, poor lighting conditions, or the camera needs to focus. Make sure there's good contrast, adequate size, proper lighting, and try holding your phone steady.
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2 class="cta-title">Ready to Create Your QR Code?</h2>
        <p class="cta-desc">Start generating professional QR codes for free - no signup required!</p>
        <a href="<?php echo home_url('/'); ?>#generator" class="cta-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Start Creating QR Codes
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const wasOpen = item.classList.contains('open');
            faqItems.forEach(i => i.classList.remove('open'));
            if (!wasOpen) item.classList.add('open');
        });
    });
});
</script>

<?php get_footer(); ?>

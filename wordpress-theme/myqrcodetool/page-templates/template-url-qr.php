<?php
/**
 * Template Name: URL QR Code Generator
 * Template Post Type: page
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<style>
    .qr-page-hero {
        background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 50%, #ecfdf5 100%);
        padding: 3rem 0;
        text-align: center;
    }
    
    [data-theme="dark"] .qr-page-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
    }
    
    .qr-page-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }
    
    @media (max-width: 768px) {
        .qr-page-title { font-size: 1.75rem; }
    }
    
    .qr-page-desc {
        color: #64748b;
        font-size: 1.125rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    [data-theme="dark"] .qr-page-desc { color: #94a3b8; }
    
    .qr-generator-container {
        padding: 3rem 0;
    }
    
    .generator-wrapper {
        background: #0f172a;
        border-radius: 1.5rem;
        padding: 2rem;
        max-width: 900px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 2rem;
    }
    
    @media (max-width: 768px) {
        .generator-wrapper {
            grid-template-columns: 1fr;
            padding: 1.5rem;
        }
    }
    
    .form-section { color: white; }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #e2e8f0;
    }
    
    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        background: #1e293b;
        border: 1px solid #334155;
        border-radius: 0.5rem;
        color: white;
        font-size: 1rem;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #10b981;
    }
    
    .form-input::placeholder { color: #64748b; }
    
    .preview-section {
        background: #1e293b;
        border-radius: 1rem;
        padding: 1.5rem;
        text-align: center;
    }
    
    .qr-preview {
        background: white;
        padding: 1.5rem;
        border-radius: 0.75rem;
        margin-bottom: 1rem;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .qr-preview canvas,
    .qr-preview img,
    .qr-preview svg {
        max-width: 100%;
        height: auto;
    }
    
    .download-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .download-btn {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
        text-align: center;
        text-decoration: none;
        display: block;
    }
    
    .download-btn.primary {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }
    
    .download-btn.secondary {
        background: #334155;
        color: white;
    }
    
    .download-btn:hover {
        transform: translateY(-2px);
    }
    
    .customization-section {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #334155;
    }
    
    .customization-title {
        color: #e2e8f0;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    
    .color-options {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .color-option {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .color-option label {
        font-size: 0.875rem;
        color: #94a3b8;
    }
    
    .color-option input[type="color"] {
        width: 50px;
        height: 40px;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
    }
    
    .info-section {
        padding: 4rem 0;
        background: #f8fafc;
    }
    
    [data-theme="dark"] .info-section {
        background: #1e293b;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    
    .info-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px solid #e2e8f0;
    }
    
    [data-theme="dark"] .info-card {
        background: #0f172a;
        border-color: #334155;
    }
    
    .info-card h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #10b981;
    }
    
    .info-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .info-card li {
        padding: 0.5rem 0;
        color: #64748b;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    [data-theme="dark"] .info-card li {
        color: #94a3b8;
    }
    
    .info-card li::before {
        content: "✓";
        color: #10b981;
        font-weight: bold;
    }
    
    .faq-section {
        padding: 4rem 0;
    }
    
    .faq-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }
    
    .faq-list {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .faq-item {
        border-bottom: 1px solid #e2e8f0;
        padding: 1.5rem 0;
    }
    
    [data-theme="dark"] .faq-item {
        border-color: #334155;
    }
    
    .faq-question {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        cursor: pointer;
    }
    
    .faq-answer {
        color: #64748b;
        line-height: 1.6;
    }
    
    [data-theme="dark"] .faq-answer {
        color: #94a3b8;
    }
    
    .other-types-section {
        padding: 4rem 0;
        background: #f8fafc;
    }
    
    [data-theme="dark"] .other-types-section {
        background: #0f172a;
    }
    
    .other-types-title {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }
    
    .other-types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .other-type-link {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 0.75rem;
        text-decoration: none;
        color: #475569;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    [data-theme="dark"] .other-type-link {
        background: #1e293b;
        border-color: #334155;
        color: #e2e8f0;
    }
    
    .other-type-link:hover {
        border-color: #10b981;
        color: #10b981;
        transform: translateY(-2px);
    }
    
    .other-type-link svg {
        width: 20px;
        height: 20px;
    }
</style>

<section class="qr-page-hero">
    <div class="container">
        <h1 class="qr-page-title">
            <span class="dynamic-neon-title">URL QR Code Generator</span>
        </h1>
        <p class="qr-page-desc">
            Convert any website URL or link into a scannable QR code instantly. 
            Perfect for sharing websites, social media profiles, and online content.
        </p>
    </div>
</section>

<section class="qr-generator-container">
    <div class="container">
        <div class="generator-wrapper">
            <div class="form-section">
                <form id="url-qr-form">
                    <div class="form-group">
                        <label for="url-input">Enter Your URL</label>
                        <input type="url" id="url-input" class="form-input" placeholder="https://example.com" required>
                    </div>
                    
                    <div class="customization-section">
                        <h3 class="customization-title">Customize Your QR Code</h3>
                        <div class="color-options">
                            <div class="color-option">
                                <label for="qr-color">QR Color</label>
                                <input type="color" id="qr-color" value="#000000">
                            </div>
                            <div class="color-option">
                                <label for="bg-color">Background</label>
                                <input type="color" id="bg-color" value="#ffffff">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="preview-section">
                <div class="qr-preview" id="qr-preview">
                    <p style="color: #64748b;">Enter a URL to generate QR code</p>
                </div>
                <div class="download-buttons">
                    <button class="download-btn primary" id="download-png" disabled>Download PNG</button>
                    <button class="download-btn secondary" id="download-svg" disabled>Download SVG</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="info-section">
    <div class="container">
        <div class="info-grid">
            <div class="info-card">
                <h3>Benefits</h3>
                <ul>
                    <li>Share any website or web page instantly with a scan</li>
                    <li>Perfect for marketing materials, business cards, and flyers</li>
                    <li>Track engagement with URL shorteners</li>
                    <li>No app required - works with any smartphone camera</li>
                    <li>Customize colors to match your brand</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Use Cases</h3>
                <ul>
                    <li>Link to your website on printed materials</li>
                    <li>Share social media profiles easily</li>
                    <li>Add to product packaging for more info</li>
                    <li>Include in presentations and slides</li>
                    <li>Restaurant menus linking to online ordering</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="faq-section">
    <div class="container">
        <h2 class="faq-title">Frequently Asked Questions</h2>
        <div class="faq-list">
            <div class="faq-item">
                <h3 class="faq-question">How do I create a QR code for a URL?</h3>
                <p class="faq-answer">Simply paste your URL in the input field above. The QR code will be generated automatically. You can then customize the colors and download it in PNG or SVG format.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">Can I use the QR code for commercial purposes?</h3>
                <p class="faq-answer">Yes! All QR codes generated on our platform are completely free to use for both personal and commercial purposes. There are no watermarks or restrictions.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">What format should I download?</h3>
                <p class="faq-answer">For most uses, PNG is perfect. If you need to scale the QR code for large prints or want infinite scalability, choose SVG format.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">Does the URL need to start with https?</h3>
                <p class="faq-answer">We recommend using URLs that start with https:// or http:// for best compatibility. If you enter a URL without the protocol, we'll add https:// automatically.</p>
            </div>
        </div>
    </div>
</section>

<section class="other-types-section">
    <div class="container">
        <h2 class="other-types-title">Try Other QR Code Types</h2>
        <div class="other-types-grid">
            <a href="<?php echo home_url('/text-to-qr/'); ?>" class="other-type-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                Text
            </a>
            <a href="<?php echo home_url('/wifi-to-qr/'); ?>" class="other-type-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg>
                WiFi
            </a>
            <a href="<?php echo home_url('/whatsapp-to-qr/'); ?>" class="other-type-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                WhatsApp
            </a>
            <a href="<?php echo home_url('/email-to-qr/'); ?>" class="other-type-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Email
            </a>
            <a href="<?php echo home_url('/phone-to-qr/'); ?>" class="other-type-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72"/></svg>
                Phone
            </a>
            <a href="<?php echo home_url('/v-card-to-qr/'); ?>" class="other-type-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><circle cx="8" cy="10" r="2"/></svg>
                vCard
            </a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlInput = document.getElementById('url-input');
    const qrPreview = document.getElementById('qr-preview');
    const qrColor = document.getElementById('qr-color');
    const bgColor = document.getElementById('bg-color');
    const downloadPng = document.getElementById('download-png');
    const downloadSvg = document.getElementById('download-svg');
    
    let currentQRData = null;
    
    function generateQR() {
        let url = urlInput.value.trim();
        if (!url) {
            qrPreview.innerHTML = '<p style="color: #64748b;">Enter a URL to generate QR code</p>';
            downloadPng.disabled = true;
            downloadSvg.disabled = true;
            return;
        }
        
        if (!url.match(/^https?:\/\//)) {
            url = 'https://' + url;
        }
        
        currentQRData = url;
        
        qrPreview.innerHTML = '';
        const canvas = document.createElement('canvas');
        qrPreview.appendChild(canvas);
        
        QRCode.toCanvas(canvas, url, {
            width: 200,
            margin: 2,
            color: {
                dark: qrColor.value,
                light: bgColor.value
            }
        }, function(error) {
            if (error) {
                qrPreview.innerHTML = '<p style="color: #ef4444;">Error generating QR code</p>';
                return;
            }
            downloadPng.disabled = false;
            downloadSvg.disabled = false;
        });
    }
    
    urlInput.addEventListener('input', generateQR);
    qrColor.addEventListener('input', generateQR);
    bgColor.addEventListener('input', generateQR);
    
    downloadPng.addEventListener('click', function() {
        if (!currentQRData) return;
        
        const canvas = document.createElement('canvas');
        QRCode.toCanvas(canvas, currentQRData, {
            width: 1024,
            margin: 4,
            color: {
                dark: qrColor.value,
                light: bgColor.value
            }
        }, function(error) {
            if (error) return;
            
            const link = document.createElement('a');
            link.download = 'qrcode.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
    });
    
    downloadSvg.addEventListener('click', function() {
        if (!currentQRData) return;
        
        QRCode.toString(currentQRData, {
            type: 'svg',
            width: 1024,
            margin: 4,
            color: {
                dark: qrColor.value,
                light: bgColor.value
            }
        }, function(error, svg) {
            if (error) return;
            
            const blob = new Blob([svg], {type: 'image/svg+xml'});
            const link = document.createElement('a');
            link.download = 'qrcode.svg';
            link.href = URL.createObjectURL(blob);
            link.click();
        });
    });
});
</script>

<?php get_footer(); ?>

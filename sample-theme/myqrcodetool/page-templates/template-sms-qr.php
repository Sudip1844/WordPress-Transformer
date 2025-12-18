<?php
/**
 * Template Name: SMS QR Code Generator
 * Template Post Type: page
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<style>
    .qr-page-hero { background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 50%, #ecfdf5 100%); padding: 3rem 0; text-align: center; }
    [data-theme="dark"] .qr-page-hero { background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%); }
    .qr-page-title { font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; }
    @media (max-width: 768px) { .qr-page-title { font-size: 1.75rem; } }
    .qr-page-desc { color: #64748b; font-size: 1.125rem; max-width: 600px; margin: 0 auto; }
    [data-theme="dark"] .qr-page-desc { color: #94a3b8; }
    .qr-generator-container { padding: 3rem 0; }
    .generator-wrapper { background: #0f172a; border-radius: 1.5rem; padding: 2rem; max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: 1fr 320px; gap: 2rem; }
    @media (max-width: 768px) { .generator-wrapper { grid-template-columns: 1fr; padding: 1.5rem; } }
    .form-section { color: white; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; color: #e2e8f0; }
    .form-input, .form-textarea { width: 100%; padding: 0.875rem 1rem; background: #1e293b; border: 1px solid #334155; border-radius: 0.5rem; color: white; font-size: 1rem; }
    .form-textarea { min-height: 100px; resize: vertical; }
    .form-input:focus, .form-textarea:focus { outline: none; border-color: #10b981; }
    .form-input::placeholder, .form-textarea::placeholder { color: #64748b; }
    .preview-section { background: #1e293b; border-radius: 1rem; padding: 1.5rem; text-align: center; }
    .qr-preview { background: white; padding: 1.5rem; border-radius: 0.75rem; margin-bottom: 1rem; min-height: 200px; display: flex; align-items: center; justify-content: center; }
    .download-buttons { display: flex; flex-direction: column; gap: 0.5rem; }
    .download-btn { padding: 0.75rem 1rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: all 0.2s; border: none; text-align: center; }
    .download-btn.primary { background: linear-gradient(135deg, #10b981, #059669); color: white; }
    .download-btn.secondary { background: #334155; color: white; }
    .download-btn:hover { transform: translateY(-2px); }
    .info-section { padding: 4rem 0; background: #f8fafc; }
    [data-theme="dark"] .info-section { background: #1e293b; }
    .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; }
    .info-card { background: white; border-radius: 1rem; padding: 1.5rem; border: 1px solid #e2e8f0; }
    [data-theme="dark"] .info-card { background: #0f172a; border-color: #334155; }
    .info-card h3 { font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem; color: #10b981; }
    .info-card ul { list-style: none; padding: 0; margin: 0; }
    .info-card li { padding: 0.5rem 0; color: #64748b; display: flex; align-items: flex-start; gap: 0.5rem; }
    [data-theme="dark"] .info-card li { color: #94a3b8; }
    .info-card li::before { content: "✓"; color: #10b981; font-weight: bold; }
</style>

<section class="qr-page-hero">
    <div class="container">
        <h1 class="qr-page-title">
            <span class="dynamic-neon-title">SMS QR Code Generator</span>
        </h1>
        <p class="qr-page-desc">
            Create a QR code that opens SMS with a pre-filled phone number and message.
        </p>
    </div>
</section>

<section class="qr-generator-container">
    <div class="container">
        <div class="generator-wrapper">
            <div class="form-section">
                <form id="sms-qr-form">
                    <div class="form-group">
                        <label for="phone-input">Phone Number</label>
                        <input type="tel" id="phone-input" class="form-input" placeholder="+1 234 567 8900" required>
                    </div>
                    <div class="form-group">
                        <label for="message-input">Message (Optional)</label>
                        <textarea id="message-input" class="form-textarea" placeholder="Pre-filled SMS message..."></textarea>
                    </div>
                </form>
            </div>
            
            <div class="preview-section">
                <div class="qr-preview" id="qr-preview">
                    <p style="color: #64748b;">Enter a phone number to generate QR code</p>
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
                    <li>Pre-fill SMS with phone number and message</li>
                    <li>Perfect for marketing campaigns</li>
                    <li>Easy opt-in for subscriptions</li>
                    <li>Quick support requests</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Use Cases</h3>
                <ul>
                    <li>SMS marketing campaigns</li>
                    <li>Text-to-subscribe services</li>
                    <li>Customer support shortcuts</li>
                    <li>Contest and giveaway entries</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone-input');
    const messageInput = document.getElementById('message-input');
    const qrPreview = document.getElementById('qr-preview');
    const downloadPng = document.getElementById('download-png');
    const downloadSvg = document.getElementById('download-svg');
    let currentQRData = null;
    
    function generateQR() {
        const phone = phoneInput.value.trim().replace(/\s+/g, '');
        if (!phone) {
            qrPreview.innerHTML = '<p style="color: #64748b;">Enter a phone number to generate QR code</p>';
            downloadPng.disabled = true;
            downloadSvg.disabled = true;
            return;
        }
        
        let smsUri = 'sms:' + phone;
        if (messageInput.value.trim()) {
            smsUri += '?body=' + encodeURIComponent(messageInput.value.trim());
        }
        
        currentQRData = smsUri;
        qrPreview.innerHTML = '';
        const canvas = document.createElement('canvas');
        qrPreview.appendChild(canvas);
        
        QRCode.toCanvas(canvas, currentQRData, { width: 200, margin: 2 }, function(error) {
            if (error) { qrPreview.innerHTML = '<p style="color: #ef4444;">Error generating QR code</p>'; return; }
            downloadPng.disabled = false;
            downloadSvg.disabled = false;
        });
    }
    
    phoneInput.addEventListener('input', generateQR);
    messageInput.addEventListener('input', generateQR);
    
    downloadPng.addEventListener('click', function() {
        if (!currentQRData) return;
        const canvas = document.createElement('canvas');
        QRCode.toCanvas(canvas, currentQRData, { width: 1024, margin: 4 }, function(error) {
            if (error) return;
            const link = document.createElement('a');
            link.download = 'sms-qrcode.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
    });
    
    downloadSvg.addEventListener('click', function() {
        if (!currentQRData) return;
        QRCode.toString(currentQRData, { type: 'svg', width: 1024, margin: 4 }, function(error, svg) {
            if (error) return;
            const blob = new Blob([svg], {type: 'image/svg+xml'});
            const link = document.createElement('a');
            link.download = 'sms-qrcode.svg';
            link.href = URL.createObjectURL(blob);
            link.click();
        });
    });
});
</script>

<?php get_footer(); ?>

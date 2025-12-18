<?php
/**
 * Template Name: Contact QR Code Generator
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
    .form-input { width: 100%; padding: 0.875rem 1rem; background: #1e293b; border: 1px solid #334155; border-radius: 0.5rem; color: white; font-size: 1rem; }
    .form-input:focus { outline: none; border-color: #10b981; }
    .form-input::placeholder { color: #64748b; }
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
            <span class="dynamic-neon-title">Simple Contact QR Code</span>
        </h1>
        <p class="qr-page-desc">
            Create a simple MeCard QR code with basic contact info - name, phone, and email.
        </p>
    </div>
</section>

<section class="qr-generator-container">
    <div class="container">
        <div class="generator-wrapper">
            <div class="form-section">
                <form id="contact-qr-form">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" class="form-input" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-input" placeholder="+1 234 567 8900">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-input" placeholder="john@example.com">
                    </div>
                </form>
            </div>
            
            <div class="preview-section">
                <div class="qr-preview" id="qr-preview">
                    <p style="color: #64748b;">Enter contact details to generate QR code</p>
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
                    <li>Simple and quick contact sharing</li>
                    <li>MeCard format - widely compatible</li>
                    <li>Saves to contacts with one scan</li>
                    <li>No complex forms needed</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Use Cases</h3>
                <ul>
                    <li>Quick personal contact sharing</li>
                    <li>Basic business cards</li>
                    <li>Event name badges</li>
                    <li>Simple contact stickers</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const phoneInput = document.getElementById('phone');
    const emailInput = document.getElementById('email');
    const qrPreview = document.getElementById('qr-preview');
    const downloadPng = document.getElementById('download-png');
    const downloadSvg = document.getElementById('download-svg');
    let currentQRData = null;
    
    function generateMeCard() {
        const name = nameInput.value.trim();
        if (!name) return null;
        
        let mecard = 'MECARD:N:' + name + ';';
        if (phoneInput.value.trim()) mecard += 'TEL:' + phoneInput.value.trim() + ';';
        if (emailInput.value.trim()) mecard += 'EMAIL:' + emailInput.value.trim() + ';';
        mecard += ';';
        return mecard;
    }
    
    function generateQR() {
        const mecard = generateMeCard();
        if (!mecard) {
            qrPreview.innerHTML = '<p style="color: #64748b;">Enter contact details to generate QR code</p>';
            downloadPng.disabled = true;
            downloadSvg.disabled = true;
            return;
        }
        
        currentQRData = mecard;
        qrPreview.innerHTML = '';
        const canvas = document.createElement('canvas');
        qrPreview.appendChild(canvas);
        
        QRCode.toCanvas(canvas, currentQRData, { width: 200, margin: 2 }, function(error) {
            if (error) { qrPreview.innerHTML = '<p style="color: #ef4444;">Error generating QR code</p>'; return; }
            downloadPng.disabled = false;
            downloadSvg.disabled = false;
        });
    }
    
    nameInput.addEventListener('input', generateQR);
    phoneInput.addEventListener('input', generateQR);
    emailInput.addEventListener('input', generateQR);
    
    downloadPng.addEventListener('click', function() {
        if (!currentQRData) return;
        const canvas = document.createElement('canvas');
        QRCode.toCanvas(canvas, currentQRData, { width: 1024, margin: 4 }, function(error) {
            if (error) return;
            const link = document.createElement('a');
            link.download = 'contact-qrcode.png';
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
            link.download = 'contact-qrcode.svg';
            link.href = URL.createObjectURL(blob);
            link.click();
        });
    });
});
</script>

<?php get_footer(); ?>

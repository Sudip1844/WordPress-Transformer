<?php
/**
 * Template Name: Text QR Code Generator
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
    .qr-page-title { font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; }
    @media (max-width: 768px) { .qr-page-title { font-size: 1.75rem; } }
    .qr-page-desc { color: #64748b; font-size: 1.125rem; max-width: 600px; margin: 0 auto; }
    [data-theme="dark"] .qr-page-desc { color: #94a3b8; }
    .qr-generator-container { padding: 3rem 0; }
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
    @media (max-width: 768px) { .generator-wrapper { grid-template-columns: 1fr; padding: 1.5rem; } }
    .form-section { color: white; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; color: #e2e8f0; }
    .form-textarea {
        width: 100%;
        padding: 0.875rem 1rem;
        background: #1e293b;
        border: 1px solid #334155;
        border-radius: 0.5rem;
        color: white;
        font-size: 1rem;
        min-height: 150px;
        resize: vertical;
    }
    .form-textarea:focus { outline: none; border-color: #10b981; }
    .form-textarea::placeholder { color: #64748b; }
    .char-count { font-size: 0.875rem; color: #94a3b8; margin-top: 0.5rem; }
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
    .download-buttons { display: flex; flex-direction: column; gap: 0.5rem; }
    .download-btn {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
        text-align: center;
    }
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
            <span class="dynamic-neon-title">Text QR Code Generator</span>
        </h1>
        <p class="qr-page-desc">
            Convert any text into a QR code. Perfect for sharing notes, messages, 
            codes, instructions, or secret messages.
        </p>
    </div>
</section>

<section class="qr-generator-container">
    <div class="container">
        <div class="generator-wrapper">
            <div class="form-section">
                <form id="text-qr-form">
                    <div class="form-group">
                        <label for="text-input">Enter Your Text</label>
                        <textarea id="text-input" class="form-textarea" placeholder="Type or paste your text here..." maxlength="2000"></textarea>
                        <p class="char-count"><span id="char-count">0</span> / 2000 characters</p>
                    </div>
                </form>
            </div>
            
            <div class="preview-section">
                <div class="qr-preview" id="qr-preview">
                    <p style="color: #64748b;">Enter text to generate QR code</p>
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
                    <li>Share text without needing internet connection</li>
                    <li>Perfect for instructions, notes, and codes</li>
                    <li>Supports up to 2000 characters</li>
                    <li>Works offline once scanned</li>
                    <li>Great for secret messages and games</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Use Cases</h3>
                <ul>
                    <li>Product assembly instructions</li>
                    <li>Event details and schedules</li>
                    <li>Coupon codes and discount messages</li>
                    <li>Emergency contact information</li>
                    <li>Educational materials and quizzes</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const textInput = document.getElementById('text-input');
    const charCount = document.getElementById('char-count');
    const qrPreview = document.getElementById('qr-preview');
    const downloadPng = document.getElementById('download-png');
    const downloadSvg = document.getElementById('download-svg');
    
    let currentQRData = null;
    
    function generateQR() {
        const text = textInput.value;
        charCount.textContent = text.length;
        
        if (!text.trim()) {
            qrPreview.innerHTML = '<p style="color: #64748b;">Enter text to generate QR code</p>';
            downloadPng.disabled = true;
            downloadSvg.disabled = true;
            return;
        }
        
        currentQRData = text;
        qrPreview.innerHTML = '';
        const canvas = document.createElement('canvas');
        qrPreview.appendChild(canvas);
        
        QRCode.toCanvas(canvas, text, { width: 200, margin: 2 }, function(error) {
            if (error) {
                qrPreview.innerHTML = '<p style="color: #ef4444;">Text too long for QR code</p>';
                return;
            }
            downloadPng.disabled = false;
            downloadSvg.disabled = false;
        });
    }
    
    textInput.addEventListener('input', generateQR);
    
    downloadPng.addEventListener('click', function() {
        if (!currentQRData) return;
        const canvas = document.createElement('canvas');
        QRCode.toCanvas(canvas, currentQRData, { width: 1024, margin: 4 }, function(error) {
            if (error) return;
            const link = document.createElement('a');
            link.download = 'text-qrcode.png';
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
            link.download = 'text-qrcode.svg';
            link.href = URL.createObjectURL(blob);
            link.click();
        });
    });
});
</script>

<?php get_footer(); ?>

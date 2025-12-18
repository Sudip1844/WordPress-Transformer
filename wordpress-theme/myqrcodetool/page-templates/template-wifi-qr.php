<?php
/**
 * Template Name: WiFi QR Code Generator
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
    @media (max-width: 768px) { .qr-page-title { font-size: 1.75rem; } }
    .qr-page-desc {
        color: #64748b;
        font-size: 1.125rem;
        max-width: 600px;
        margin: 0 auto;
    }
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
    @media (max-width: 768px) {
        .generator-wrapper { grid-template-columns: 1fr; padding: 1.5rem; }
    }
    .form-section { color: white; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #e2e8f0;
    }
    .form-input, .form-select {
        width: 100%;
        padding: 0.875rem 1rem;
        background: #1e293b;
        border: 1px solid #334155;
        border-radius: 0.5rem;
        color: white;
        font-size: 1rem;
    }
    .form-input:focus, .form-select:focus {
        outline: none;
        border-color: #10b981;
    }
    .form-input::placeholder { color: #64748b; }
    .form-select option { background: #1e293b; }
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #e2e8f0;
    }
    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #10b981;
    }
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
    .download-btn.primary {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }
    .download-btn.secondary { background: #334155; color: white; }
    .download-btn:hover { transform: translateY(-2px); }
    .info-section { padding: 4rem 0; background: #f8fafc; }
    [data-theme="dark"] .info-section { background: #1e293b; }
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
    .info-card ul { list-style: none; padding: 0; margin: 0; }
    .info-card li {
        padding: 0.5rem 0;
        color: #64748b;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }
    [data-theme="dark"] .info-card li { color: #94a3b8; }
    .info-card li::before { content: "✓"; color: #10b981; font-weight: bold; }
    .faq-section { padding: 4rem 0; }
    .faq-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }
    .faq-list { max-width: 800px; margin: 0 auto; }
    .faq-item { border-bottom: 1px solid #e2e8f0; padding: 1.5rem 0; }
    [data-theme="dark"] .faq-item { border-color: #334155; }
    .faq-question { font-size: 1.125rem; font-weight: 600; margin-bottom: 0.75rem; }
    .faq-answer { color: #64748b; line-height: 1.6; }
    [data-theme="dark"] .faq-answer { color: #94a3b8; }
</style>

<section class="qr-page-hero">
    <div class="container">
        <h1 class="qr-page-title">
            <span class="dynamic-neon-title">WiFi QR Code Generator</span>
        </h1>
        <p class="qr-page-desc">
            Share your WiFi network credentials securely with a QR code. 
            Guests can connect instantly by scanning - no typing passwords required!
        </p>
    </div>
</section>

<section class="qr-generator-container">
    <div class="container">
        <div class="generator-wrapper">
            <div class="form-section">
                <form id="wifi-qr-form">
                    <div class="form-group">
                        <label for="ssid-input">Network Name (SSID)</label>
                        <input type="text" id="ssid-input" class="form-input" placeholder="Your WiFi Network Name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password-input">Password</label>
                        <input type="text" id="password-input" class="form-input" placeholder="WiFi Password">
                    </div>
                    
                    <div class="form-group">
                        <label for="encryption-select">Encryption Type</label>
                        <select id="encryption-select" class="form-select">
                            <option value="WPA">WPA/WPA2/WPA3</option>
                            <option value="WEP">WEP</option>
                            <option value="nopass">No Password (Open)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-group">
                            <input type="checkbox" id="hidden-network">
                            Hidden Network
                        </label>
                    </div>
                </form>
            </div>
            
            <div class="preview-section">
                <div class="qr-preview" id="qr-preview">
                    <p style="color: #64748b;">Enter WiFi details to generate QR code</p>
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
                    <li>Guests connect instantly without typing long passwords</li>
                    <li>Perfect for cafes, hotels, offices, and home guests</li>
                    <li>Secure - password is embedded but not visible</li>
                    <li>Works with all modern smartphones</li>
                    <li>Supports WPA, WPA2, WPA3, and WEP encryption</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Use Cases</h3>
                <ul>
                    <li>Restaurants and cafes for customer WiFi access</li>
                    <li>Hotels and Airbnb for guest networks</li>
                    <li>Office reception areas for visitors</li>
                    <li>Home WiFi sharing with friends and family</li>
                    <li>Events and conferences for attendees</li>
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
                <h3 class="faq-question">Is it safe to share WiFi via QR code?</h3>
                <p class="faq-answer">Yes, the QR code contains the same information you would normally share verbally. For guest networks, this is perfectly safe. For secure networks, use a dedicated guest network.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">What happens if I change my WiFi password?</h3>
                <p class="faq-answer">You'll need to generate a new QR code with the updated password. The old QR code will no longer work.</p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">Does it work with all phones?</h3>
                <p class="faq-answer">Yes! All modern iPhones and Android phones can scan WiFi QR codes natively using their camera app.</p>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ssidInput = document.getElementById('ssid-input');
    const passwordInput = document.getElementById('password-input');
    const encryptionSelect = document.getElementById('encryption-select');
    const hiddenNetwork = document.getElementById('hidden-network');
    const qrPreview = document.getElementById('qr-preview');
    const downloadPng = document.getElementById('download-png');
    const downloadSvg = document.getElementById('download-svg');
    
    let currentQRData = null;
    
    function generateWifiString() {
        const ssid = ssidInput.value.trim();
        if (!ssid) return null;
        
        const password = passwordInput.value;
        const encryption = encryptionSelect.value;
        const hidden = hiddenNetwork.checked;
        
        let wifiString = 'WIFI:';
        wifiString += 'T:' + encryption + ';';
        wifiString += 'S:' + ssid.replace(/[\\;,:\"]/g, '\\$&') + ';';
        
        if (encryption !== 'nopass' && password) {
            wifiString += 'P:' + password.replace(/[\\;,:\"]/g, '\\$&') + ';';
        }
        
        if (hidden) {
            wifiString += 'H:true;';
        }
        
        wifiString += ';';
        return wifiString;
    }
    
    function generateQR() {
        const wifiString = generateWifiString();
        if (!wifiString) {
            qrPreview.innerHTML = '<p style="color: #64748b;">Enter WiFi details to generate QR code</p>';
            downloadPng.disabled = true;
            downloadSvg.disabled = true;
            return;
        }
        
        currentQRData = wifiString;
        qrPreview.innerHTML = '';
        const canvas = document.createElement('canvas');
        qrPreview.appendChild(canvas);
        
        QRCode.toCanvas(canvas, wifiString, {
            width: 200,
            margin: 2,
            color: { dark: '#000000', light: '#ffffff' }
        }, function(error) {
            if (error) {
                qrPreview.innerHTML = '<p style="color: #ef4444;">Error generating QR code</p>';
                return;
            }
            downloadPng.disabled = false;
            downloadSvg.disabled = false;
        });
    }
    
    ssidInput.addEventListener('input', generateQR);
    passwordInput.addEventListener('input', generateQR);
    encryptionSelect.addEventListener('change', generateQR);
    hiddenNetwork.addEventListener('change', generateQR);
    
    downloadPng.addEventListener('click', function() {
        if (!currentQRData) return;
        const canvas = document.createElement('canvas');
        QRCode.toCanvas(canvas, currentQRData, { width: 1024, margin: 4 }, function(error) {
            if (error) return;
            const link = document.createElement('a');
            link.download = 'wifi-qrcode.png';
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
            link.download = 'wifi-qrcode.svg';
            link.href = URL.createObjectURL(blob);
            link.click();
        });
    });
});
</script>

<?php get_footer(); ?>

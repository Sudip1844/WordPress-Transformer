<?php
/**
 * Template Name: QR Scanner
 * Template Post Type: page
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<style>
    .scanner-hero { background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 50%, #ecfdf5 100%); padding: 3rem 0; text-align: center; }
    [data-theme="dark"] .scanner-hero { background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%); }
    .scanner-title { font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; }
    @media (max-width: 768px) { .scanner-title { font-size: 1.75rem; } }
    .scanner-desc { color: #64748b; font-size: 1.125rem; max-width: 600px; margin: 0 auto; }
    [data-theme="dark"] .scanner-desc { color: #94a3b8; }
    
    .scanner-container { padding: 3rem 0; }
    .scanner-wrapper { max-width: 600px; margin: 0 auto; }
    
    .scanner-box {
        background: #0f172a;
        border-radius: 1.5rem;
        padding: 2rem;
        text-align: center;
    }
    
    .camera-area {
        background: #1e293b;
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 1.5rem;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    #video-container {
        width: 100%;
        max-width: 400px;
        border-radius: 0.75rem;
        overflow: hidden;
        display: none;
    }
    
    #video-container video {
        width: 100%;
        display: block;
    }
    
    .camera-placeholder {
        color: #94a3b8;
    }
    
    .camera-placeholder svg {
        width: 64px;
        height: 64px;
        margin-bottom: 1rem;
        color: #10b981;
    }
    
    .scan-btn {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }
    
    .scan-btn:hover { transform: translateY(-2px); }
    .scan-btn:disabled { opacity: 0.5; cursor: not-allowed; }
    
    .result-area {
        background: #1e293b;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-top: 1.5rem;
        display: none;
    }
    
    .result-area.show { display: block; }
    
    .result-label {
        color: #10b981;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .result-text {
        color: white;
        word-break: break-all;
        padding: 1rem;
        background: #334155;
        border-radius: 0.5rem;
        font-family: monospace;
    }
    
    .result-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }
    
    .result-btn {
        flex: 1;
        min-width: 120px;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all 0.2s;
    }
    
    .result-btn.primary { background: #10b981; color: white; }
    .result-btn.secondary { background: #334155; color: white; }
    
    .upload-section {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #334155;
    }
    
    .upload-section p { color: #94a3b8; margin-bottom: 1rem; }
    
    .upload-btn {
        background: #334155;
        color: white;
        border: 2px dashed #475569;
        padding: 1.5rem 2rem;
        border-radius: 0.75rem;
        cursor: pointer;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }
    
    .upload-btn:hover { border-color: #10b981; color: #10b981; }
    
    #file-input { display: none; }
    
    .info-section { padding: 4rem 0; background: #f8fafc; }
    [data-theme="dark"] .info-section { background: #1e293b; }
    .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; max-width: 900px; margin: 0 auto; }
    .info-card { background: white; border-radius: 1rem; padding: 1.5rem; border: 1px solid #e2e8f0; }
    [data-theme="dark"] .info-card { background: #0f172a; border-color: #334155; }
    .info-card h3 { font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem; color: #10b981; }
    .info-card ul { list-style: none; padding: 0; margin: 0; }
    .info-card li { padding: 0.5rem 0; color: #64748b; display: flex; align-items: flex-start; gap: 0.5rem; }
    [data-theme="dark"] .info-card li { color: #94a3b8; }
    .info-card li::before { content: "✓"; color: #10b981; font-weight: bold; }
</style>

<section class="scanner-hero">
    <div class="container">
        <h1 class="scanner-title">
            <span class="dynamic-neon-title">QR Code Scanner</span>
        </h1>
        <p class="scanner-desc">
            Scan any QR code using your device camera or upload an image. Fast, free, and works on all devices.
        </p>
    </div>
</section>

<section class="scanner-container">
    <div class="container">
        <div class="scanner-wrapper">
            <div class="scanner-box">
                <div class="camera-area">
                    <div id="camera-placeholder" class="camera-placeholder">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                            <circle cx="12" cy="13" r="4"/>
                        </svg>
                        <p>Click the button below to start scanning</p>
                    </div>
                    <div id="video-container">
                        <video id="video" playsinline></video>
                    </div>
                </div>
                
                <button id="start-scan" class="scan-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                        <circle cx="12" cy="13" r="4"/>
                    </svg>
                    Start Camera Scan
                </button>
                
                <div id="result-area" class="result-area">
                    <p class="result-label">Scan Result:</p>
                    <p id="result-text" class="result-text"></p>
                    <div class="result-actions">
                        <button id="copy-result" class="result-btn primary">Copy</button>
                        <button id="open-result" class="result-btn secondary">Open Link</button>
                    </div>
                </div>
                
                <div class="upload-section">
                    <p>Or upload a QR code image</p>
                    <label class="upload-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/>
                            <line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                        Upload Image
                        <input type="file" id="file-input" accept="image/*">
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="info-section">
    <div class="container">
        <div class="info-grid">
            <div class="info-card">
                <h3>How It Works</h3>
                <ul>
                    <li>Click "Start Camera Scan" to use your camera</li>
                    <li>Point your camera at any QR code</li>
                    <li>Or upload an image containing a QR code</li>
                    <li>Results appear instantly</li>
                </ul>
            </div>
            <div class="info-card">
                <h3>Supported QR Types</h3>
                <ul>
                    <li>URLs and website links</li>
                    <li>WiFi network credentials</li>
                    <li>Contact information (vCard, MeCard)</li>
                    <li>Text, email, phone, and more</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('video');
    const videoContainer = document.getElementById('video-container');
    const placeholder = document.getElementById('camera-placeholder');
    const startBtn = document.getElementById('start-scan');
    const resultArea = document.getElementById('result-area');
    const resultText = document.getElementById('result-text');
    const copyBtn = document.getElementById('copy-result');
    const openBtn = document.getElementById('open-result');
    const fileInput = document.getElementById('file-input');
    
    let scanning = false;
    let stream = null;
    
    function showResult(text) {
        resultText.textContent = text;
        resultArea.classList.add('show');
        
        if (text.startsWith('http://') || text.startsWith('https://')) {
            openBtn.style.display = 'block';
        } else {
            openBtn.style.display = 'none';
        }
    }
    
    startBtn.addEventListener('click', async function() {
        if (scanning) {
            stopScanning();
            return;
        }
        
        try {
            stream = await navigator.mediaDevices.getUserMedia({ 
                video: { facingMode: 'environment' } 
            });
            video.srcObject = stream;
            video.play();
            
            placeholder.style.display = 'none';
            videoContainer.style.display = 'block';
            startBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg> Stop Scanning';
            
            scanning = true;
            scanFrame();
        } catch (err) {
            alert('Could not access camera. Please check permissions.');
        }
    });
    
    function stopScanning() {
        scanning = false;
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
        videoContainer.style.display = 'none';
        placeholder.style.display = 'flex';
        startBtn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg> Start Camera Scan';
    }
    
    function scanFrame() {
        if (!scanning) return;
        
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0);
            
            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height);
            
            if (code) {
                showResult(code.data);
                stopScanning();
                return;
            }
        }
        
        requestAnimationFrame(scanFrame);
    }
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        const img = new Image();
        img.onload = function() {
            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            
            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height);
            
            if (code) {
                showResult(code.data);
            } else {
                alert('No QR code found in image. Please try another image.');
            }
        };
        img.src = URL.createObjectURL(file);
    });
    
    copyBtn.addEventListener('click', function() {
        navigator.clipboard.writeText(resultText.textContent);
        copyBtn.textContent = 'Copied!';
        setTimeout(() => { copyBtn.textContent = 'Copy'; }, 2000);
    });
    
    openBtn.addEventListener('click', function() {
        window.open(resultText.textContent, '_blank');
    });
});
</script>

<?php get_footer(); ?>

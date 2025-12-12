const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 5000;

const html = `
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My QRcode Tool - WordPress Theme</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
            color: #1e293b;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(45deg, #3B82F6, #EC4899, #10B981, #F59E0B);
            background-size: 400% 400%;
            animation: gradient 4s ease infinite;
            padding: 2rem;
            text-align: center;
            color: white;
        }
        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .header p {
            opacity: 0.9;
        }
        .content {
            padding: 2rem;
        }
        .section {
            margin-bottom: 2rem;
        }
        .section h2 {
            color: #10b981;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 0.5rem;
        }
        .section ul {
            list-style: none;
            padding: 0;
        }
        .section li {
            padding: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
        }
        .section li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #10b981;
            font-weight: bold;
        }
        .files-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        .file-card {
            background: #f1f5f9;
            padding: 1rem;
            border-radius: 0.5rem;
            font-family: monospace;
            font-size: 0.875rem;
        }
        .download-btn {
            display: inline-block;
            background: linear-gradient(45deg, #10b981, #3b82f6);
            color: white;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.125rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }
        .instructions {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0 0.5rem 0.5rem 0;
        }
        .instructions h3 {
            color: #92400e;
            margin-bottom: 0.5rem;
        }
        .instructions ol {
            margin-left: 1.5rem;
            color: #78350f;
        }
        .instructions li {
            margin: 0.5rem 0;
        }
        .badge {
            display: inline-block;
            background: #10b981;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            margin-left: 0.5rem;
        }
        .center { text-align: center; }
        .mt-2 { margin-top: 2rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔲 My QRcode Tool</h1>
            <p>WordPress Theme Conversion Complete!</p>
        </div>
        
        <div class="content">
            <div class="section">
                <h2>📦 WordPress Theme Ready</h2>
                <p>আপনার static QR Code Generator website সফলভাবে WordPress theme-এ রূপান্তর করা হয়েছে!</p>
                
                <div class="center mt-2">
                    <a href="/download-theme" class="download-btn">
                        📥 Download WordPress Theme ZIP
                    </a>
                </div>
            </div>
            
            <div class="section">
                <h2>✨ Theme Features</h2>
                <ul>
                    <li>17টি QR Code Generator page templates</li>
                    <li>SEO-optimized with structured data (JSON-LD)</li>
                    <li>Google Tag Manager integration</li>
                    <li>Open Graph & Twitter Card meta tags</li>
                    <li>WordPress Customizer settings</li>
                    <li>All JavaScript functionality preserved</li>
                    <li>Tailwind CSS styling included</li>
                    <li>Custom Post Type for QR Pages</li>
                </ul>
            </div>
            
            <div class="section">
                <h2>📄 Included Page Templates</h2>
                <div class="files-grid">
                    <div class="file-card">url-to-qr</div>
                    <div class="file-card">text-to-qr</div>
                    <div class="file-card">wifi-to-qr</div>
                    <div class="file-card">whatsapp-to-qr</div>
                    <div class="file-card">email-to-qr</div>
                    <div class="file-card">phone-to-qr</div>
                    <div class="file-card">sms-to-qr</div>
                    <div class="file-card">contact-to-qr</div>
                    <div class="file-card">v-card-to-qr</div>
                    <div class="file-card">event-to-qr</div>
                    <div class="file-card">image-to-qr</div>
                    <div class="file-card">paypal-to-qr</div>
                    <div class="file-card">zoom-to-qr</div>
                    <div class="file-card">scanner</div>
                    <div class="file-card">faq</div>
                    <div class="file-card">support</div>
                    <div class="file-card">privacy</div>
                </div>
            </div>
            
            <div class="instructions">
                <h3>📋 Installation Instructions</h3>
                <ol>
                    <li>Download the ZIP file using the button above</li>
                    <li>Go to your WordPress admin panel → <strong>Appearance → Themes</strong></li>
                    <li>Click <strong>"Add New"</strong> → <strong>"Upload Theme"</strong></li>
                    <li>Select the downloaded ZIP file and click <strong>"Install Now"</strong></li>
                    <li>After installation, click <strong>"Activate"</strong></li>
                    <li>Create pages with the slugs listed above</li>
                    <li>Go to <strong>Appearance → Customize → QR Code Tool Settings</strong> to configure</li>
                </ol>
            </div>
            
            <div class="section">
                <h2>📁 Theme File Structure</h2>
                <pre style="background: #1e293b; color: #e2e8f0; padding: 1rem; border-radius: 0.5rem; overflow-x: auto; font-size: 0.875rem;">
myqrcodetool/
├── style.css           # Theme styles
├── functions.php       # Theme functions
├── header.php          # Site header
├── footer.php          # Site footer
├── index.php           # Default template
├── page.php            # Page template
├── front-page.php      # Homepage
├── 404.php             # Error page
├── assets/
│   ├── css/main.css    # Tailwind CSS
│   └── js/             # JavaScript files
├── page-templates/     # Custom templates
└── inc/seo-data.php    # SEO data
                </pre>
            </div>
            
            <div class="section">
                <h2>📖 Documentation</h2>
                <p>A comprehensive <code>WORDPRESS-INTEGRATION-GUIDE.md</code> file is included in the download with detailed instructions for:</p>
                <ul>
                    <li>Theme installation and activation</li>
                    <li>Creating all required pages</li>
                    <li>JavaScript integration details</li>
                    <li>SEO configuration</li>
                    <li>Customization options</li>
                    <li>Troubleshooting common issues</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
`;

const server = http.createServer((req, res) => {
    if (req.url === '/download-theme' || req.url === '/download-theme/') {
        const filePath = path.join(__dirname, 'myqrcodetool-wordpress-theme.zip');
        
        if (fs.existsSync(filePath)) {
            const stat = fs.statSync(filePath);
            res.writeHead(200, {
                'Content-Type': 'application/zip',
                'Content-Length': stat.size,
                'Content-Disposition': 'attachment; filename=myqrcodetool-wordpress-theme.zip'
            });
            fs.createReadStream(filePath).pipe(res);
        } else {
            res.writeHead(404, { 'Content-Type': 'text/plain' });
            res.end('Theme ZIP file not found');
        }
    } else {
        res.writeHead(200, { 
            'Content-Type': 'text/html; charset=utf-8',
            'Cache-Control': 'no-cache'
        });
        res.end(html);
    }
});

server.listen(PORT, '0.0.0.0', () => {
    console.log(`WordPress Theme Download Server running at http://0.0.0.0:${PORT}`);
    console.log('Visit the page to download your WordPress theme!');
});

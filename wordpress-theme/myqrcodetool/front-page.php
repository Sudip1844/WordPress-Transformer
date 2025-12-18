<?php
/**
 * Front Page Template
 * Static HTML homepage with QR code generator
 *
 * @package MyQrcodeTool
 */

get_header();
?>

<style>
    .hero-section {
        background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 50%, #ecfdf5 100%);
        padding: 4rem 0;
        text-align: center;
    }
    
    [data-theme="dark"] .hero-section {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
    }
    
    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        max-width: 700px;
        margin: 0 auto 2rem;
    }
    
    [data-theme="dark"] .hero-subtitle {
        color: #94a3b8;
    }
    
    .hero-features {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }
    
    .hero-feature {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #059669;
        font-weight: 500;
    }
    
    .hero-feature::before {
        content: "●";
        font-size: 0.5rem;
    }
    
    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .generator-card {
        background: #0f172a;
        border-radius: 1.5rem;
        padding: 2rem;
        color: white;
        max-width: 1000px;
        margin: 0 auto;
    }
    
    .generator-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .generator-header h2 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .generator-header p {
        color: #94a3b8;
    }
    
    .qr-type-tabs {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 0.75rem;
        margin-bottom: 2rem;
    }
    
    .qr-type-tab {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem;
        background: #1e293b;
        border: 2px solid transparent;
        border-radius: 0.75rem;
        color: #94a3b8;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        font-size: 0.875rem;
    }
    
    .qr-type-tab:hover,
    .qr-type-tab.active {
        border-color: #10b981;
        color: white;
        background: #334155;
    }
    
    .qr-type-tab svg {
        width: 24px;
        height: 24px;
    }
    
    .qr-types-section {
        padding: 4rem 0;
        background: #f8fafc;
    }
    
    [data-theme="dark"] .qr-types-section {
        background: #1e293b;
    }
    
    .section-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .section-subtitle {
        text-align: center;
        color: #64748b;
        margin-bottom: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    [data-theme="dark"] .section-subtitle {
        color: #94a3b8;
    }
    
    .qr-types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }
    
    .qr-type-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        text-decoration: none;
        color: inherit;
        transition: all 0.2s;
        border: 1px solid #e2e8f0;
    }
    
    [data-theme="dark"] .qr-type-card {
        background: #0f172a;
        border-color: #334155;
    }
    
    .qr-type-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-color: #10b981;
    }
    
    .qr-type-card-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #10b981, #059669);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        color: white;
    }
    
    .qr-type-card h3 {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .qr-type-card p {
        color: #64748b;
        font-size: 0.9rem;
    }
    
    [data-theme="dark"] .qr-type-card p {
        color: #94a3b8;
    }
    
    .benefits-section {
        padding: 4rem 0;
    }
    
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }
    
    .benefit-item {
        text-align: center;
        padding: 1.5rem;
    }
    
    .benefit-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #ecfdf5, #d1fae5);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: #10b981;
    }
    
    [data-theme="dark"] .benefit-icon {
        background: linear-gradient(135deg, #064e3b, #065f46);
    }
    
    .benefit-item h3 {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .benefit-item p {
        color: #64748b;
        font-size: 0.9rem;
    }
    
    [data-theme="dark"] .benefit-item p {
        color: #94a3b8;
    }
    
    .qr-generator-section {
        padding: 4rem 0;
    }
</style>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">
            <span class="dynamic-neon-title">Create Professional QR Codes</span><br>
            in Seconds
        </h1>
        <p class="hero-subtitle">
            Generate custom QR codes for your business, events, and personal use. 
            Add logos, customize colors, choose frames, and track performance - all for free!
        </p>
        <div class="hero-features">
            <span class="hero-feature">Free Forever</span>
            <span class="hero-feature">No Registration Required</span>
            <span class="hero-feature">Unlimited Downloads</span>
        </div>
        <div class="hero-buttons">
            <a href="#generator" class="btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Start Creating QR Codes
            </a>
            <a href="<?php echo home_url('/scanner/'); ?>" class="btn-secondary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                    <circle cx="12" cy="13" r="4"/>
                </svg>
                Scan QR Code
            </a>
        </div>
    </div>
</section>

<section id="generator" class="qr-generator-section">
    <div class="container">
        <div class="generator-card">
            <div class="generator-header">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                <h2>Welcome! Which type of QR code would you like to generate?</h2>
                <p>Start by choosing your QR type below</p>
            </div>
            
            <div class="qr-type-tabs">
                <a href="<?php echo home_url('/url-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                    </svg>
                    URL
                </a>
                <a href="<?php echo home_url('/text-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                    Text
                </a>
                <a href="<?php echo home_url('/wifi-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12.55a11 11 0 0 1 14.08 0"/>
                        <path d="M1.42 9a16 16 0 0 1 21.16 0"/>
                        <path d="M8.53 16.11a6 6 0 0 1 6.95 0"/>
                        <line x1="12" y1="20" x2="12.01" y2="20"/>
                    </svg>
                    WiFi
                </a>
                <a href="<?php echo home_url('/whatsapp-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                    WhatsApp
                </a>
                <a href="<?php echo home_url('/email-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    Email
                </a>
                <a href="<?php echo home_url('/phone-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    Phone
                </a>
                <a href="<?php echo home_url('/sms-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    SMS
                </a>
                <a href="<?php echo home_url('/v-card-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <circle cx="8" cy="10" r="2"/>
                        <path d="M8 14a4 4 0 0 1 4-4"/>
                        <line x1="14" y1="8" x2="20" y2="8"/>
                        <line x1="14" y1="12" x2="20" y2="12"/>
                    </svg>
                    vCard
                </a>
                <a href="<?php echo home_url('/event-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    Event
                </a>
                <a href="<?php echo home_url('/paypal-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"/>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                    PayPal
                </a>
                <a href="<?php echo home_url('/zoom-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="23 7 16 12 23 17 23 7"/>
                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
                    </svg>
                    Zoom
                </a>
                <a href="<?php echo home_url('/image-to-qr/'); ?>" class="qr-type-tab">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                    Image
                </a>
            </div>
            
            <p style="text-align: center; color: #94a3b8; margin-top: 1rem;">
                Click on any QR type above to start generating!
            </p>
        </div>
    </div>
</section>

<section class="qr-types-section">
    <div class="container">
        <h2 class="section-title">All QR Code Types</h2>
        <p class="section-subtitle">Choose from our collection of QR code generators for every need</p>
        
        <div class="qr-types-grid">
            <a href="<?php echo home_url('/url-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                    </svg>
                </div>
                <h3>URL QR Code</h3>
                <p>Convert any website URL or link into a scannable QR code instantly.</p>
            </a>
            
            <a href="<?php echo home_url('/text-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <h3>Text QR Code</h3>
                <p>Share notes, messages, or secret codes via scannable QR codes.</p>
            </a>
            
            <a href="<?php echo home_url('/wifi-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12.55a11 11 0 0 1 14.08 0"/>
                        <path d="M1.42 9a16 16 0 0 1 21.16 0"/>
                        <path d="M8.53 16.11a6 6 0 0 1 6.95 0"/>
                        <line x1="12" y1="20" x2="12.01" y2="20"/>
                    </svg>
                </div>
                <h3>WiFi QR Code</h3>
                <p>Let guests connect to WiFi instantly without typing passwords.</p>
            </a>
            
            <a href="<?php echo home_url('/whatsapp-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                </div>
                <h3>WhatsApp QR Code</h3>
                <p>Start WhatsApp conversations directly with a single scan.</p>
            </a>
            
            <a href="<?php echo home_url('/email-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                <h3>Email QR Code</h3>
                <p>Create QR codes that compose emails instantly.</p>
            </a>
            
            <a href="<?php echo home_url('/phone-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                </div>
                <h3>Phone QR Code</h3>
                <p>Generate QR codes for phone numbers - one scan to call.</p>
            </a>
            
            <a href="<?php echo home_url('/sms-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
                <h3>SMS QR Code</h3>
                <p>Create QR codes that open SMS with pre-filled messages.</p>
            </a>
            
            <a href="<?php echo home_url('/v-card-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <circle cx="8" cy="10" r="2"/>
                        <path d="M8 14a4 4 0 0 1 4-4"/>
                        <line x1="14" y1="8" x2="20" y2="8"/>
                        <line x1="14" y1="12" x2="20" y2="12"/>
                    </svg>
                </div>
                <h3>vCard QR Code</h3>
                <p>Create professional digital business cards with all contact info.</p>
            </a>
            
            <a href="<?php echo home_url('/event-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <h3>Event QR Code</h3>
                <p>Generate QR codes for events that add directly to calendars.</p>
            </a>
            
            <a href="<?php echo home_url('/paypal-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"/>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                </div>
                <h3>PayPal QR Code</h3>
                <p>Generate PayPal payment QR codes for easy transactions.</p>
            </a>
            
            <a href="<?php echo home_url('/zoom-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="23 7 16 12 23 17 23 7"/>
                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>
                    </svg>
                </div>
                <h3>Zoom QR Code</h3>
                <p>Create QR codes for Zoom meetings - join with a single scan.</p>
            </a>
            
            <a href="<?php echo home_url('/image-to-qr/'); ?>" class="qr-type-card">
                <div class="qr-type-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
                <h3>Image QR Code</h3>
                <p>Create QR codes that link to images and visual content.</p>
            </a>
        </div>
    </div>
</section>

<section class="benefits-section">
    <div class="container">
        <h2 class="section-title">Why Choose Our QR Generator?</h2>
        <p class="section-subtitle">Everything you need to create professional QR codes</p>
        
        <div class="benefits-grid">
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <h3>Instant Generation</h3>
                <p>Create QR codes in seconds - no waiting, no delays.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3>100% Free</h3>
                <p>No registration, no watermarks, no hidden fees.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                    </svg>
                </div>
                <h3>Fully Customizable</h3>
                <p>Add logos, change colors, and choose frame styles.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </div>
                <h3>High Quality Downloads</h3>
                <p>Export in PNG, SVG, or PDF with custom sizes.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
                        <line x1="12" y1="18" x2="12.01" y2="18"/>
                    </svg>
                </div>
                <h3>Mobile Friendly</h3>
                <p>Works perfectly on all devices - desktop, tablet, phone.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </div>
                <h3>15+ QR Types</h3>
                <p>URLs, WiFi, vCards, events, payments, and more.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

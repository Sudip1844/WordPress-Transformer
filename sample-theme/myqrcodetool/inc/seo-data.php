<?php
/**
 * SEO Data for QR Code Pages
 *
 * This file contains all the SEO meta data for each QR code type page.
 * Use this data when creating pages in WordPress.
 *
 * @package MyQrcodeTool
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get all QR page types with their SEO data
 */
function myqrcodetool_get_all_qr_pages() {
    return array(
        'url-to-qr' => array(
            'title' => 'Create QR Code for Any URL - Instant & Free',
            'description' => 'Convert any URL or link into a scannable QR code instantly. Just paste your link and share QR codes easily for websites, social media, promotions, and more.',
            'keywords' => 'url to qr code, link qr generator, free qr code, qr code generator free, create qr code online, qr code from link, website qr code generator',
            'benefits' => array(
                'Share website links instantly without typing',
                'Perfect for marketing materials and business cards',
                'Track clicks with URL shorteners integration',
                'Works with any web address or landing page'
            ),
            'use_cases' => 'Ideal for social media profiles, product pages, portfolio websites, online stores, event registrations, and promotional campaigns.',
            'faqs' => array(
                array(
                    'question' => 'How do I create a URL QR code?',
                    'answer' => 'Simply paste or type your website URL into the input field, click \'Generate QR Code\', customize colors and style if desired, and download your QR code in PNG or SVG format.'
                ),
                array(
                    'question' => 'Can I shorten my long URLs before creating QR codes?',
                    'answer' => 'Yes! While our generator accepts URLs of any length, using a URL shortener like bit.ly or TinyURL before creating your QR code results in a simpler, less dense QR code that scans faster.'
                )
            )
        ),
        'text-to-qr' => array(
            'title' => 'Text to QR Code - Share Notes, Info, or Secret Messages',
            'description' => 'Easily convert plain text into QR codes. Perfect for sharing notes, messages, codes, or instructions via scannable QR codes.',
            'keywords' => 'text to qr code, text qr generator, message qr code, qr code generator free, qr code text maker',
            'benefits' => array(
                'Share messages, codes, and instructions without manual typing',
                'Perfect for password sharing, serial numbers, and access codes',
                'Display long text content in a compact, scannable format',
                'Ideal for educational materials, treasure hunts, and secret messages'
            ),
            'use_cases' => 'Great for sharing WiFi passwords temporarily, product serial numbers, coupon codes, exam hall instructions, scavenger hunt clues.',
            'faqs' => array(
                array(
                    'question' => 'What\'s the maximum length of text I can encode?',
                    'answer' => 'QR codes can store up to 4,296 alphanumeric characters. However, we recommend keeping text under 300 characters for optimal scanning.'
                )
            )
        ),
        'wifi-to-qr' => array(
            'title' => 'WiFi QR Code Generator - Share Network Access Instantly',
            'description' => 'Create QR codes for WiFi network access. Let guests connect instantly without typing passwords.',
            'keywords' => 'wifi qr code, wifi qr generator, share wifi, wifi password qr',
            'benefits' => array(
                'Let guests connect to WiFi without sharing passwords verbally',
                'Perfect for cafes, hotels, offices, and events',
                'Supports WPA, WPA2, WEP, and open networks',
                'No more typing long complicated passwords'
            ),
            'use_cases' => 'Ideal for restaurants, hotels, Airbnb listings, office guest networks, event venues, and home guest access.'
        ),
        'whatsapp-to-qr' => array(
            'title' => 'WhatsApp QR Code Generator - Direct Message Link',
            'description' => 'Generate QR codes that open WhatsApp conversations directly. Perfect for business and customer support.',
            'keywords' => 'whatsapp qr code, whatsapp link generator, wa.me qr code',
            'benefits' => array(
                'Start WhatsApp conversations with a single scan',
                'Perfect for customer support and business inquiries',
                'Include pre-filled messages for quick responses',
                'Works on all devices with WhatsApp installed'
            ),
            'use_cases' => 'Great for business cards, storefronts, customer service desks, marketing materials, and product support.'
        ),
        'email-to-qr' => array(
            'title' => 'Email QR Code Generator - Quick Contact Made Easy',
            'description' => 'Create QR codes that compose emails instantly. Perfect for business cards and contact sharing.',
            'keywords' => 'email qr code, mailto qr generator, contact qr code',
            'benefits' => array(
                'Compose emails with pre-filled recipient, subject, and body',
                'Perfect for business cards and promotional materials',
                'Works with any email client on any device',
                'Eliminate typing errors in email addresses'
            ),
            'use_cases' => 'Ideal for business cards, event feedback, customer support, newsletter signups, and job applications.'
        ),
        'phone-to-qr' => array(
            'title' => 'Phone Number QR Code Generator - One Scan to Call',
            'description' => 'Generate QR codes for phone numbers. Let customers call you with a single scan.',
            'keywords' => 'phone qr code, tel qr generator, call qr code',
            'benefits' => array(
                'Make phone calls with a single scan',
                'Perfect for business cards and marketing materials',
                'Works on all smartphones',
                'No need to manually type phone numbers'
            ),
            'use_cases' => 'Great for business cards, storefronts, emergency contacts, customer service, and advertising.'
        ),
        'sms-to-qr' => array(
            'title' => 'SMS QR Code Generator - Text Message Made Easy',
            'description' => 'Create QR codes that open SMS with pre-filled messages. Perfect for marketing and support.',
            'keywords' => 'sms qr code, text message qr, sms generator',
            'benefits' => array(
                'Open SMS app with pre-filled recipient and message',
                'Perfect for marketing campaigns and voting systems',
                'Works on all smartphones',
                'Great for opt-in campaigns and feedback'
            ),
            'use_cases' => 'Ideal for SMS marketing, voting systems, feedback collection, appointment reminders, and customer engagement.'
        ),
        'contact-to-qr' => array(
            'title' => 'Simple Contact QR Code Maker - Quick MeCard Generator Free',
            'description' => 'Create simple contact QR codes instantly with MeCard format. Share basic name, phone & email info with one scan. Fast, free, no signup required.',
            'keywords' => 'contact qr code, mecard generator, mecard qr code, simple contact sharing, quick contact qr, basic contact card qr',
            'benefits' => array(
                'Create quick MeCard format contact codes in seconds',
                'Share basic contact details: name, phone, email',
                'Recipients save your info to phone instantly',
                'Lightweight QR codes that scan faster'
            ),
            'use_cases' => 'Perfect for quick personal introductions, casual networking, event attendees, students, and anyone needing fast contact sharing.'
        ),
        'v-card-to-qr' => array(
            'title' => 'Professional vCard QR Code Generator - Complete Digital Business Card',
            'description' => 'Create full-featured vCard QR codes with job title, company, address, website & social links. Premium digital business card for executives & professionals.',
            'keywords' => 'vcard qr code, vcf qr generator, digital business card, professional contact qr, executive business card qr, complete vcard maker',
            'benefits' => array(
                'Include complete professional details: title, company, department',
                'Add full address, multiple phone numbers, website URLs',
                'Include social media profiles and company logo',
                'Industry-standard vCard 3.0 format for maximum compatibility'
            ),
            'use_cases' => 'Essential for executives, sales professionals, real estate agents, consultants, and corporate networking events.'
        ),
        'event-to-qr' => array(
            'title' => 'Event QR Code Generator - Calendar Integration',
            'description' => 'Generate QR codes for events that add directly to calendars. Perfect for invitations and scheduling.',
            'keywords' => 'event qr code, calendar qr, ics qr generator, invitation qr',
            'benefits' => array(
                'Add events directly to any calendar app',
                'Include date, time, location, and description',
                'Perfect for invitations and reminders',
                'Works with Google Calendar, Apple Calendar, Outlook'
            ),
            'use_cases' => 'Ideal for wedding invitations, conference schedules, appointment reminders, class schedules, and event marketing.'
        ),
        'image-to-qr' => array(
            'title' => 'Image to QR Code - Embed Pictures in QR',
            'description' => 'Create QR codes that link to images. Share photos, artwork, and visual content easily.',
            'keywords' => 'image qr code, photo qr, picture qr generator',
            'benefits' => array(
                'Share images via QR code',
                'Perfect for portfolios and galleries',
                'Link to hosted images',
                'Great for artwork and photography'
            ),
            'use_cases' => 'Great for photographers, artists, product catalogs, menus with images, and visual portfolios.'
        ),
        'paypal-to-qr' => array(
            'title' => 'PayPal QR Code Generator - Easy Payment Links',
            'description' => 'Generate PayPal payment QR codes for easy transactions. Perfect for businesses and freelancers.',
            'keywords' => 'paypal qr code, payment qr, paypal link generator, paypal.me qr',
            'benefits' => array(
                'Accept PayPal payments via QR code',
                'Perfect for small businesses and freelancers',
                'Include payment amount and description',
                'Secure and trusted payment method'
            ),
            'use_cases' => 'Ideal for freelancers, small businesses, market vendors, tip jars, and donation collection.'
        ),
        'zoom-to-qr' => array(
            'title' => 'Zoom Meeting QR Code Generator - Join Meetings Instantly',
            'description' => 'Create QR codes for Zoom meetings. Let participants join with a single scan.',
            'keywords' => 'zoom qr code, meeting qr, zoom link generator, video call qr',
            'benefits' => array(
                'Join Zoom meetings with a single scan',
                'Perfect for conference rooms and meeting invites',
                'Include meeting ID and passcode',
                'Works on all devices with Zoom installed'
            ),
            'use_cases' => 'Great for conference rooms, event schedules, training sessions, webinar promotions, and remote team meetings.'
        )
    );
}

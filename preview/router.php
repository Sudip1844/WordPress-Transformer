<?php
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

$mimeTypes = [
    'js' => 'application/javascript',
    'css' => 'text/css',
    'png' => 'image/png',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'gif' => 'image/gif',
    'svg' => 'image/svg+xml',
    'woff' => 'font/woff',
    'woff2' => 'font/woff2',
    'ttf' => 'font/ttf',
    'eot' => 'application/vnd.ms-fontobject',
    'ico' => 'image/x-icon',
    'webp' => 'image/webp',
    'json' => 'application/json',
];

function serveFile($file, $mimeTypes) {
    if (file_exists($file) && !is_dir($file)) {
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $mime = isset($mimeTypes[$ext]) ? $mimeTypes[$ext] : 'application/octet-stream';
        header('Content-Type: ' . $mime);
        header('Cache-Control: no-cache');
        readfile($file);
        exit;
    }
    return false;
}

// Redirect /assets/* to /theme/assets/*
if (preg_match('#^/assets/(.+)$#', $path, $matches)) {
    $file = __DIR__ . '/theme/assets/' . $matches[1];
    if (serveFile($file, $mimeTypes)) {
        exit;
    }
    // Return 404 for missing assets (don't fallback to HTML)
    http_response_code(404);
    header('Content-Type: application/javascript');
    echo '// File not found: ' . $matches[1];
    exit;
}

// Serve static files from theme directory
if (preg_match('#^/theme/(.+)$#', $path, $matches)) {
    $file = __DIR__ . '/theme/' . $matches[1];
    if (file_exists($file) && !is_dir($file)) {
        return false; // Let PHP built-in server handle it
    }
}

// Default: serve index.php
require_once __DIR__ . '/index.php';

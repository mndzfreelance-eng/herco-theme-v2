<?php
/**
 * Shared site copy — single source for theme templates and mockup sync.
 */
if (!defined('ABSPATH')) exit;

function herco_site_content_path() {
    return HERCO_DIR . '/content/site-content.json';
}

function herco_site_content() {
    static $content = null;
    if ($content !== null) {
        return $content;
    }

    $path = herco_site_content_path();
    if (!is_readable($path)) {
        $content = [];
        return $content;
    }

    $json = json_decode(file_get_contents($path), true);
    $content = is_array($json) ? $json : [];

    return $content;
}

function herco_site_content_get($key, $default = null) {
    $data = herco_site_content();
    $parts = explode('.', $key);
    $node = $data;

    foreach ($parts as $part) {
        if (!is_array($node) || !array_key_exists($part, $node)) {
            return $default;
        }
        $node = $node[$part];
    }

    return $node;
}

/** Hero copy defaults — synced with content/site-content.json & mockup. */
function herco_hero_default($key) {
    $defaults = [
        'badge' => 'Trusted Hardware Distributor since 1908',
        'title' => 'Built on Trust.<br><em>Delivering</em> Quality.',
        'desc'  => "Herco Trading is the Philippines' most established distributor of industrial tools, hardware, and 50+ global brands. Nationwide reach. Century of excellence.",
    ];
    $from_json = herco_site_content_get("hero.{$key}");
    return ($from_json !== null && $from_json !== '') ? $from_json : ($defaults[$key] ?? '');
}

function herco_theme_version() {
    return defined('HERCO_VER') ? HERCO_VER : '1.4.0';
}

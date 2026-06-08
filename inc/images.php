<?php
/**
 * Image placeholders & Customizer media helpers
 */
if (!defined('ABSPATH')) exit;

/** Bundled placeholder filenames keyed by slug */
function herco_placeholder_map() {
    return [
        'hero'           => 'hero.svg',
        'dist-1'         => 'dist-traditional.svg',
        'dist-2'         => 'dist-retail.svg',
        'dist-3'         => 'dist-ecommerce.svg',
        'dist-4'         => 'dist-industrial.svg',
        'about'          => 'about.svg',
        'affiliate-1'    => 'affiliate.svg',
        'affiliate-2'    => 'affiliate.svg',
        'affiliate-3'    => 'affiliate.svg',
        'brand-logo'     => 'brand-logo.svg',
        'product'        => 'product.svg',
        'page-banner'    => 'page-banner.svg',
        'generic'        => 'generic.svg',
    ];
}

function herco_placeholder_url($key = 'generic') {
    $map = herco_placeholder_map();
    $file = $map[$key] ?? $map['generic'];
    return HERCO_URI . '/assets/images/placeholders/' . $file;
}

/** Sanitize Customizer media (attachment ID or URL) */
function herco_sanitize_image($value) {
    if ($value === '' || $value === false || $value === null) {
        return '';
    }
    if (is_numeric($value)) {
        return absint($value);
    }
    return esc_url_raw($value);
}

/**
 * Resolve theme_mod to image URL.
 * Falls back to bundled placeholder when empty or attachment missing.
 */
function herco_image_url($mod, $placeholder_key = 'generic') {
    $val = get_theme_mod($mod, '');
    $url = '';

    if (!empty($val)) {
        if (is_numeric($val)) {
            $url = wp_get_attachment_image_url((int) $val, 'large') ?: '';
        } else {
            $url = esc_url($val);
        }
    }

    if ($url) {
        return $url;
    }

    return herco_placeholder_url($placeholder_key);
}

/** URL + whether the bundled placeholder is in use */
function herco_get_image($mod, $placeholder_key = 'generic') {
    $val = get_theme_mod($mod, '');
    $has_custom = false;
    $url = '';

    if (!empty($val)) {
        if (is_numeric($val)) {
            $url = wp_get_attachment_image_url((int) $val, 'large') ?: '';
        } else {
            $url = esc_url($val);
        }
        $has_custom = (bool) $url;
    }

    if (!$has_custom) {
        return [
            'url'            => herco_placeholder_url($placeholder_key),
            'is_placeholder' => true,
            'mod'            => $mod,
        ];
    }

    return [
        'url'            => $url,
        'is_placeholder' => false,
        'mod'            => $mod,
    ];
}

/**
 * Output an <img> (or background-friendly data) with optional placeholder badge.
 *
 * @param array $args mod, placeholder, alt, class, size (WP image size), lazy
 */
function herco_render_image($args) {
    $mod         = $args['mod'] ?? '';
    $placeholder = $args['placeholder'] ?? 'generic';
    $alt         = $args['alt'] ?? '';
    $class       = $args['class'] ?? 'herco-img';
    $badge       = $args['badge'] ?? true;
    $size        = $args['size'] ?? 'large';

    $img = $mod ? herco_get_image($mod, $placeholder) : [
        'url'            => herco_placeholder_url($placeholder),
        'is_placeholder' => true,
        'mod'            => '',
    ];

    $classes = $class;
    if ($img['is_placeholder']) {
        $classes .= ' herco-img--placeholder';
    }

    $label = '';
    if ($img['is_placeholder'] && $badge && current_user_can('edit_theme_options')) {
        $label = '<span class="herco-img__badge">' . esc_html__('Replace in Customizer', 'herco') . '</span>';
    }

    printf(
        '<span class="herco-img-wrap%s"><img src="%s" alt="%s" class="%s" loading="lazy" decoding="async">%s</span>',
        $img['is_placeholder'] ? ' herco-img-wrap--placeholder' : '',
        esc_url($img['url']),
        esc_attr($alt),
        esc_attr($classes),
        $label
    );
}

<?php
/**
 * Brands archive / page — replaces old Impreza shortcode page at /brands/.
 */
if (!defined('ABSPATH')) exit;

function herco_brands_page_title() {
    $title = herco_site_content_get('brandsPage.title', 'Our Principals');
    return $title ? __($title, 'herco') : __('Our Principals', 'herco');
}

function herco_brands_page_intro() {
    $intro = herco_site_content_get('brandsPage.intro', '');
    if ($intro) {
        return __($intro, 'herco');
    }
    return __('Over 50 globally recognized brands available through authorized Herco channels.', 'herco');
}

function herco_brands_fallback_names() {
    $names = herco_site_content_get('brandsFallback', []);
    return is_array($names) ? $names : [];
}

/** Remove legacy Impreza shortcodes from existing /brands/ page. */
function herco_fix_brands_page() {
    $page = get_page_by_path('brands');
    if (!$page) {
        return;
    }

    $content = $page->post_content;
    if ($content === '' || strpos($content, '[us_') === false) {
        return;
    }

    wp_update_post([
        'ID'           => $page->ID,
        'post_content' => '',
    ]);
}
add_action('after_switch_theme', 'herco_fix_brands_page');
add_action('admin_init', 'herco_fix_brands_page');

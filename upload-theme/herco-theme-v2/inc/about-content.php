<?php
/**
 * Default About page copy — loaded from content/site-content.json.
 */
if (!defined('ABSPATH')) exit;

function herco_about_who_we_are_paragraphs() {
    $paragraphs = herco_site_content_get('about.whoWeAre');
    if (is_array($paragraphs) && $paragraphs) {
        return $paragraphs;
    }

    return [];
}

function herco_about_mission_items() {
    $items = herco_site_content_get('about.mission');
    if (is_array($items) && $items) {
        return array_map(function ($item) {
            return __($item, 'herco');
        }, $items);
    }

    return [];
}

function herco_about_vision_text() {
    $vision = herco_site_content_get('about.vision', '');
    return $vision ? __($vision, 'herco') : '';
}

function herco_render_about_who_we_are() {
    if (!have_posts()) {
        herco_render_default_about_who_we_are();
        return;
    }

    while (have_posts()) {
        the_post();
        $raw = get_post()->post_content;
        if (trim(wp_strip_all_tags($raw))) {
            the_content();
        } else {
            herco_render_default_about_who_we_are();
        }
    }
}

function herco_render_default_about_who_we_are() {
    $allowed = [
        'p'      => [],
        'strong' => [],
        'em'     => [],
        'br'     => [],
        'a'      => ['href' => [], 'title' => [], 'target' => [], 'rel' => []],
    ];
    foreach (herco_about_who_we_are_paragraphs() as $paragraph) {
        echo '<p>' . wp_kses($paragraph, $allowed) . '</p>';
    }
}

function herco_about_affiliates() {
    $items = herco_site_content_get('about.affiliates');
    if (!is_array($items) || !$items) {
        return [];
    }

    $affiliates = [];
    foreach ($items as $index => $item) {
        $n = $index + 1;
        $affiliates[] = [
            'mod'      => "herco_affiliate_image_{$n}",
            'ph'       => $item['key'] ?? "affiliate-{$n}",
            'fallback' => $item['fallback'] ?? '',
            'alt'      => $item['alt'] ?? '',
        ];
    }

    return $affiliates;
}

function herco_create_about_page() {
    $existing = get_page_by_path('about');
    if ($existing) {
        update_option('herco_about_page_created', (int) $existing->ID);
        return (int) $existing->ID;
    }

    if (get_option('herco_about_page_created')) {
        return (int) get_option('herco_about_page_created');
    }

    $page_id = wp_insert_post([
        'post_title'   => 'About',
        'post_name'    => 'about',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '',
    ], true);

    if (!is_wp_error($page_id) && $page_id) {
        update_option('herco_about_page_created', (int) $page_id);
        return (int) $page_id;
    }

    return 0;
}
add_action('after_switch_theme', 'herco_create_about_page');
add_action('admin_init', 'herco_create_about_page');

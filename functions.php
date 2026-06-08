<?php
/**
 * functions.php — Herco Trading WordPress Theme
 */
if (!defined('ABSPATH')) exit;

define('HERCO_VER', '1.4.0');
define('HERCO_DIR', get_template_directory());
define('HERCO_URI', get_template_directory_uri());
require_once HERCO_DIR . '/inc/content-loader.php';
require_once HERCO_DIR . '/inc/images.php';
require_once HERCO_DIR . '/inc/about-content.php';
require_once HERCO_DIR . '/inc/brands-page.php';
require_once HERCO_DIR . '/inc/form-pages.php';
require_once HERCO_DIR . '/inc/customizer.php';
require_once HERCO_DIR . '/inc/icons.php';

/* ── Theme Setup ─────────────────────────────────────────── */
function herco_setup() {
    load_theme_textdomain('herco', HERCO_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', ['height'=>60,'width'=>200,'flex-height'=>true,'flex-width'=>true]);
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','script','style']);
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'herco_setup');

/* ── Enqueue Assets ──────────────────────────────────────── */
function herco_enqueue() {
    wp_enqueue_style('herco-fonts', 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Source+Sans+3:wght@400;500;600;700&display=swap', [], null);
    wp_enqueue_style('herco-style', get_stylesheet_uri(), ['herco-fonts'], HERCO_VER);
    wp_enqueue_script('herco-main', HERCO_URI . '/js/main.js', [], HERCO_VER, true);
    wp_localize_script('herco-main', 'hercoAjax', ['url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('herco_nonce')]);
}
add_action('wp_enqueue_scripts', 'herco_enqueue');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/* ── Menus ───────────────────────────────────────────────── */
function herco_menus() {
    register_nav_menus([
        'primary'  => 'Primary Navigation',
        'footer-1' => 'Footer: Brands',
        'footer-2' => 'Footer: Support',
        'footer-3' => 'Footer: Partner',
    ]);
}
add_action('init', 'herco_menus');

/* ── Custom Post Types ───────────────────────────────────── */
function herco_cpts() {
    // Brands
    register_post_type('brand', [
        'labels'        => ['name'=>'Brands','singular_name'=>'Brand','add_new_item'=>'Add New Brand','edit_item'=>'Edit Brand'],
        'public'        => true, 'show_in_rest' => true, 'has_archive' => true,
        'rewrite'       => ['slug'=>'brands'],
        'menu_icon'     => 'dashicons-store',
        'supports'      => ['title','editor','thumbnail','excerpt','custom-fields'],
    ]);
    // Products
    register_post_type('herco_product', [
        'labels'        => ['name'=>'Products','singular_name'=>'Product','add_new_item'=>'Add New Product'],
        'public'        => true, 'show_in_rest' => true, 'has_archive' => true,
        'rewrite'       => ['slug'=>'products'],
        'menu_icon'     => 'dashicons-hammer',
        'supports'      => ['title','editor','thumbnail','excerpt','custom-fields'],
    ]);
    // Dealers
    register_post_type('dealer', [
        'labels'        => ['name'=>'Dealers','singular_name'=>'Dealer','add_new_item'=>'Add New Dealer'],
        'public'        => false, 'show_ui' => true, 'show_in_rest' => true,
        'menu_icon'     => 'dashicons-location',
        'supports'      => ['title','custom-fields'],
    ]);
    // FAQs
    register_post_type('faq', [
        'labels'        => ['name'=>'FAQs','singular_name'=>'FAQ','add_new_item'=>'Add New FAQ'],
        'public'        => false, 'show_ui' => true, 'show_in_rest' => true,
        'menu_icon'     => 'dashicons-editor-help',
        'supports'      => ['title','editor'],
    ]);
}
add_action('init', 'herco_cpts');

/* ── Taxonomies ──────────────────────────────────────────── */
function herco_taxonomies() {
    register_taxonomy('brand_category', 'brand', [
        'labels'       => ['name'=>'Brand Categories','singular_name'=>'Brand Category'],
        'hierarchical' => true, 'show_in_rest' => true, 'show_admin_column' => true,
        'rewrite'      => ['slug'=>'brand-category'],
    ]);
    register_taxonomy('product_category', ['herco_product','faq'], [
        'labels'       => ['name'=>'Product Categories','singular_name'=>'Product Category'],
        'hierarchical' => true, 'show_in_rest' => true, 'show_admin_column' => true,
        'rewrite'      => ['slug'=>'product-category'],
    ]);
    register_taxonomy('dealer_type', 'dealer', [
        'labels'            => ['name'=>'Dealer Types','singular_name'=>'Dealer Type'],
        'hierarchical'      => false, 'show_in_rest' => true, 'show_admin_column' => true,
    ]);
}
add_action('init', 'herco_taxonomies');

/* ── CF7 Email Routing ───────────────────────────────────── */
function herco_cf7_routing($cf7) {
    $routes = [
        'Request for Quotation'   => 'sales@herco.com.ph',
        'Warranty Claim'          => 'aftersales@herco.com.ph',
        'After-Sales Support'     => 'service@herco.com.ph',
        'Retailer Application'    => 'bizdev@herco.com.ph',
        'Supplier Partnership'    => 'sourcing@herco.com.ph',
        'Schedule a Call'         => 'sales@herco.com.ph',
    ];
    if (isset($routes[$cf7->title()])) {
        $mail = $cf7->prop('mail');
        $mail['recipient'] = $routes[$cf7->title()];
        $cf7->set_properties(['mail' => $mail]);
    }
}
add_action('wpcf7_before_send_mail', 'herco_cf7_routing');

/* ── Structured Data (SEO) ───────────────────────────────── */
function herco_structured_data() {
    if (is_front_page()) {
        echo '<script type="application/ld+json">' . wp_json_encode([
            '@context'  => 'https://schema.org',
            '@type'     => 'Organization',
            'name'      => 'Herco Trading Inc.',
            'url'       => 'https://herco.com.ph',
            'logo'      => 'https://herco.com.ph/wp-content/uploads/herco-logo.png',
            'description' => "Philippines' most trusted hardware distributor since 1908.",
            'address'   => ['@type'=>'PostalAddress','streetAddress'=>'8F Herco Center, 114 Benavidez St., Legaspi Village','addressLocality'=>'Makati City','postalCode'=>'1229','addressCountry'=>'PH'],
            'telephone' => '+63-2-8818-7736',
            'email'     => 'info@herco.com.ph',
            'sameAs'    => ['https://www.facebook.com/HercoTradingPHOfficial/'],
        ]) . '</script>';
    }
    if (is_singular('brand')) {
        echo '<script type="application/ld+json">' . wp_json_encode([
            '@context' => 'https://schema.org',
            '@type'    => 'Brand',
            'name'     => get_the_title(),
            'url'      => get_permalink(),
            'distributor' => ['@type'=>'Organization','name'=>'Herco Trading Inc.','url'=>'https://herco.com.ph'],
        ]) . '</script>';
    }
}
add_action('wp_head', 'herco_structured_data');

/* ── Flush Rewrite on Activate ───────────────────────────── */
function herco_flush() { herco_cpts(); flush_rewrite_rules(); }
add_action('after_switch_theme', 'herco_flush');

/** Mark theme version after upload/activate (v1.4+). */
function herco_record_theme_version() {
    update_option('herco_theme_version', herco_theme_version());
}
add_action('after_switch_theme', 'herco_record_theme_version');

/** One-time notice after activating v1.4 — confirms upload is current. */
function herco_admin_welcome_notice() {
    if (!current_user_can('edit_theme_options') || get_option('herco_welcome_v1_3_seen')) {
        return;
    }
    $ver = get_option('herco_theme_version');
    if ($ver !== '1.4.0') {
        return;
    }
    update_option('herco_welcome_v1_3_seen', 1);
    $about = get_page_by_path('about');
    $about_url = $about ? get_permalink($about) : admin_url('edit.php?post_type=page');
    echo '<div class="notice notice-success"><p><strong>Herco Theme v' . esc_html($ver) . ' is active.</strong> ';
    echo '<a href="' . esc_url(home_url('/')) . '">Homepage</a> · ';
    echo '<a href="' . esc_url($about_url) . '">About page</a> · ';
    echo '<a href="' . esc_url(admin_url('customize.php')) . '">Customizer (upload images)</a>';
    echo '</p></div>';
}
add_action('admin_notices', 'herco_admin_welcome_notice');

/* ── Helper: get brand meta (ACF) ───────────────────────── */
function herco_brand_meta($id = null) {
    $id = $id ?: get_the_ID();
    if (!function_exists('get_field')) return [];
    return [
        'tagline'  => get_field('brand_tagline', $id),
        'logo'     => get_field('brand_logo', $id),
        'brochure' => get_field('brand_brochure', $id),
        'featured' => get_field('brand_featured', $id),
    ];
}

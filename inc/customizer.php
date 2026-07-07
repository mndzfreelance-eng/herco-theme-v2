<?php
/**
 * Theme Customizer — dynamic replaceable images & copy
 */
if (!defined('ABSPATH')) exit;

/** Instructions block at top of image sections */
if ( ! function_exists( 'herco_customize_register' ) ) {
    function herco_customize_register($wp_customize) {
        if ( ! class_exists( 'WP_Customize_Control' ) || ! class_exists( 'WP_Customize_Media_Control' ) ) {
            return;
        }

        if ( ! class_exists( 'Herco_Customize_Note_Control' ) ) {
            class Herco_Customize_Note_Control extends WP_Customize_Control {
                public $type = 'herco_note';

                protected function render_content() {
                    if (!empty($this->label)) {
                        echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
                    }
                    if (!empty($this->description)) {
                        echo '<p class="description" style="margin-top:6px;line-height:1.55">' . wp_kses_post($this->description) . '</p>';
                    }
                }
            }
        }


    /* ── Homepage images & text ───────────────────────────── */
    $wp_customize->add_section('herco_home', [
        'title'       => __('Herco Homepage', 'herco'),
        'description' => __('Upload photos here — they replace the grey placeholders on the live site instantly.', 'herco'),
        'priority'    => 30,
    ]);

    $wp_customize->add_setting('herco_home_note', ['sanitize_callback' => '__return_empty_string']);
    $wp_customize->add_control(new Herco_Customize_Note_Control($wp_customize, 'herco_home_note', [
        'label'       => __('How to replace images', 'herco'),
        'description' => __('<strong>Appearance → Customize → Herco Homepage</strong><br>Click each image control → Upload or Select from Media Library → Publish.<br>Placeholders show until you upload. Logged-in admins see a small “Replace in Customizer” hint on placeholders.', 'herco'),
        'section'     => 'herco_home',
    ]));

    herco_add_image_control($wp_customize, 'herco_hero_image', __('Hero background photo', 'herco'), 'herco_home', __('Wide landscape photo (building, warehouse, or team). Min. 1600×900 recommended.', 'herco'));
    herco_add_image_control($wp_customize, 'herco_home_about_image', __('Homepage who-we-are image', 'herco'), 'herco_home', __('Portrait or landscape image for the Who We Are section.', 'herco'));

    foreach ([
        'herco_hero_badge' => ['label' => __('Hero eyebrow text', 'herco'), 'default' => herco_hero_default('badge')],
        'herco_hero_desc'  => ['label' => __('Hero description', 'herco'), 'default' => herco_hero_default('desc')],
    ] as $id => $f) {
        $wp_customize->add_setting($id, [
            'default'           => $f['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control($id, [
            'label'   => $f['label'],
            'section' => 'herco_home',
            'type'    => 'text',
        ]);
    }

    $wp_customize->add_setting('herco_hero_title', [
        'default'           => herco_hero_default('title'),
        'sanitize_callback' => 'wp_kses_post',
    ]);
    $wp_customize->add_control('herco_hero_title', [
        'label'   => __('Hero headline (use &lt;br&gt; and &lt;em&gt;)', 'herco'),
        'section' => 'herco_home',
        'type'    => 'textarea',
    ]);

    $dist_labels = [
        1 => __('Distribution — Traditional Stores photo', 'herco'),
        2 => __('Distribution — Modern Retail photo', 'herco'),
        3 => __('Distribution — E-Commerce photo', 'herco'),
        4 => __('Distribution — Industrial photo', 'herco'),
    ];
    foreach ($dist_labels as $i => $label) {
        herco_add_image_control($wp_customize, "herco_dist_image_{$i}", $label, 'herco_home');
    }

    /* ── About & affiliates ───────────────────────────────── */
    $wp_customize->add_section('herco_about', [
        'title'       => __('Herco About Page', 'herco'),
        'description' => __('Images for the About Us template and affiliate logos.', 'herco'),
        'priority'    => 32,
    ]);

    herco_add_image_control($wp_customize, 'herco_about_image', __('About page main photo', 'herco'), 'herco_about');
    herco_add_image_control($wp_customize, 'herco_affiliate_image_1', __('Affiliate logo 1 (e.g. Handyman)', 'herco'), 'herco_about');
    herco_add_image_control($wp_customize, 'herco_affiliate_image_2', __('Affiliate logo 2 (e.g. True Value)', 'herco'), 'herco_about');
    herco_add_image_control($wp_customize, 'herco_affiliate_image_3', __('Affiliate logo 3 (e.g. Fedchem)', 'herco'), 'herco_about');
    herco_add_image_control($wp_customize, 'herco_about_banner', __('About page hero image', 'herco'), 'herco_about');
    herco_add_image_control($wp_customize, 'herco_core_value_image_1', __('Core value image 1', 'herco'), 'herco_about', __('Optional image for the True Partnership flip card.', 'herco'));
    herco_add_image_control($wp_customize, 'herco_core_value_image_2', __('Core value image 2', 'herco'), 'herco_about', __('Optional image for the Operational Excellence flip card.', 'herco'));
    herco_add_image_control($wp_customize, 'herco_core_value_image_3', __('Core value image 3', 'herco'), 'herco_about', __('Optional image for the Stewardship flip card.', 'herco'));
    herco_add_image_control($wp_customize, 'herco_core_value_image_4', __('Core value image 4', 'herco'), 'herco_about', __('Optional image for the Market Understanding flip card.', 'herco'));

    /* ── Global / inner pages ─────────────────────────────── */
    $wp_customize->add_section('herco_global', [
        'title'       => __('Herco Site Images', 'herco'),
        'description' => __('Default banner for inner pages (optional).', 'herco'),
        'priority'    => 33,
    ]);

    herco_add_image_control($wp_customize, 'herco_page_banner', __('Default page banner (inner pages)', 'herco'), 'herco_global');
    herco_add_image_control($wp_customize, 'herco_brands_banner', __('Brands page hero image', 'herco'), 'herco_global');
    herco_add_image_control($wp_customize, 'herco_brands_feature_image', __('Brands page partnership image', 'herco'), 'herco_global');
    herco_add_image_control($wp_customize, 'herco_distribution_banner', __('Distribution page hero image', 'herco'), 'herco_global');
    herco_add_image_control($wp_customize, 'herco_contact_banner', __('Contact page hero image', 'herco'), 'herco_global');
    herco_add_image_control($wp_customize, 'herco_faq_banner', __('FAQs page hero image', 'herco'), 'herco_global');

    /* ── Contact ──────────────────────────────────────────── */
    $wp_customize->add_section('herco_contact', [
        'title'    => __('Herco Contact & Social', 'herco'),
        'priority' => 35,
    ]);
    foreach ([
        'herco_email'    => ['label' => 'Email', 'default' => 'info@herco.com.ph'],
        'herco_phone'    => ['label' => 'Phone', 'default' => '(02) 8818-7736'],
        'herco_phone_secondary' => ['label' => 'Secondary phone', 'default' => '(02) 8818-7331'],
        'herco_address'  => ['label' => 'Address', 'default' => '8F Herco Center, 114 Benavidez Street, Legaspi Village, Makati City 1229'],
        'herco_facebook' => ['label' => 'Facebook URL', 'default' => 'https://www.facebook.com/HercoTradingPHOfficial/'],
        'herco_lazada'   => ['label' => 'Lazada URL', 'default' => 'https://www.lazada.com.ph/shop/herco'],
        'herco_shopee'   => ['label' => 'Shopee URL', 'default' => 'https://shopee.ph/hercotradingofficial'],
    ] as $id => $f) {
        $wp_customize->add_setting($id, [
            'default'           => $f['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control($id, [
            'label'   => $f['label'],
            'section' => 'herco_contact',
            'type'    => 'text',
        ]);
    }
    }
    add_action('customize_register', 'herco_customize_register');
}

/** Register a media control with correct attachment-ID sanitization */
function herco_add_image_control($wp_customize, $id, $label, $section, $description = '') {
    $wp_customize->add_setting($id, [
        'default'           => '',
        'sanitize_callback' => 'herco_sanitize_image',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $id, [
        'label'       => $label,
        'description' => $description,
        'section'     => $section,
        'mime_type'   => 'image',
    ]));
}

function herco_dist_cards() {
    $cards = herco_site_content_get('distCards');
    $icons = ['store', 'retail', 'cart', 'factory'];
    $mods = ['herco_dist_image_1', 'herco_dist_image_2', 'herco_dist_image_3', 'herco_dist_image_4'];

    if (!is_array($cards) || !$cards) {
        return [];
    }

    $out = [];
    foreach ($cards as $i => $card) {
        $out[] = [
            'icon'        => $icons[$i] ?? 'store',
            'placeholder' => $card['placeholder'] ?? 'dist-' . ($i + 1),
            'mod'         => $mods[$i] ?? "herco_dist_image_{$i}",
            'title'       => $card['title'] ?? '',
            'desc'        => $card['desc'] ?? '',
        ];
    }

    return $out;
}

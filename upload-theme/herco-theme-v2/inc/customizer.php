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

	// --- Marquee Speed ---.
	$wp_customize->add_setting(
		'herco_marquee_speed',
		array(
			'default'           => 40,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'herco_marquee_speed',
		array(
			'label'       => __( 'Brand Marquee Speed (seconds)', 'herco' ),
			'description' => __( 'The time it takes for the brand marquee on the homepage to complete one cycle. Higher is slower.', 'herco' ),
			'section'     => 'herco_home',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 200,
				'step' => 5,
			),
		)
	);

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
        'title'    => __('Herco Contact Info', 'herco'),
        'priority' => 34,
    ]);
    foreach ([
        'herco_email'    => ['label' => 'Email', 'default' => 'info@herco.com.ph'],
        'herco_phone'    => ['label' => 'Phone', 'default' => '(02) 8818-7736'],
        'herco_phone_secondary' => ['label' => 'Secondary phone', 'default' => '(02) 8818-7331'],
        'herco_address'  => ['label' => 'Address', 'default' => '8F Herco Center, 114 Benavidez Street, Legaspi Village, Makati City 1229'],
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

if ( ! function_exists( 'herco_add_social_links_customizer' ) ) {
	/**
	 * Adds social media link settings to the Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function herco_add_social_links_customizer( $wp_customize ) {
		$wp_customize->add_section(
			'herco_social_links_section',
			array(
				'title'       => __( 'Social & Marketplace Links', 'herco' ),
				'priority'    => 35,
				'description' => __( 'URLs for social media and marketplace icons in the footer and other parts of the site.', 'herco' ),
			)
		);

		$socials = array(
			'facebook_url' => array(
				'label'   => __( 'Facebook URL', 'herco' ),
				'default' => 'https://www.facebook.com/HercoTradingPHOfficial',
			),
			'lazada_url'   => array(
				'label'   => __( 'Lazada URL', 'herco' ),
				'default' => 'https://www.lazada.com.ph/shop/herco-shop',
			),
			'shopee_url'   => array(
				'label'   => __( 'Shopee URL', 'herco' ),
				'default' => 'https://shopee.ph/hercotradingofficial',
			),
			'tiktok_url'   => array(
				'label'   => __( 'TikTok URL', 'herco' ),
				'default' => '',
			),
		);

		foreach ( $socials as $key => $details ) {
			$setting_id = 'herco_' . $key;

			$wp_customize->add_setting( $setting_id, array( 'default' => $details['default'], 'sanitize_callback' => 'esc_url_raw' ) );

			$wp_customize->add_control( $setting_id, array( 'label' => $details['label'], 'section' => 'herco_social_links_section', 'type' => 'url' ) );
		}
	}
	add_action( 'customize_register', 'herco_add_social_links_customizer', 20 );
}

if ( ! function_exists( 'herco_add_marketplace_controls' ) ) {
	function herco_add_marketplace_controls( $wp_customize ) {
		$wp_customize->add_section(
			'herco_marketplaces',
			array(
				'title'       => __( 'Marketplace Stats', 'herco' ),
				'description' => __( 'Update ratings and links for Lazada, Shopee, and TikTok Shop sections.', 'herco' ),
				'priority'    => 36,
			)
		);

		$marketplaces = array(
			'lazada' => array( 'label' => 'Lazada', 'rating' => '4.8', 'followers' => '45K+', 'reviews' => '12K+', 'percent' => '96%', 'url' => 'https://www.lazada.com.ph/shop/herco-shop' ),
			'shopee' => array( 'label' => 'Shopee', 'rating' => '4.9', 'followers' => '38K+', 'reviews' => '9K+', 'percent' => '98%', 'url' => 'https://shopee.ph/hercotradingofficial' ),
			'tiktok' => array( 'label' => 'TikTok Shop', 'rating' => '4.7', 'followers' => '22K+', 'reviews' => '5K+', 'percent' => '94%', 'url' => '' ),
		);

		foreach ( $marketplaces as $id => $details ) {
			// Heading for each marketplace
			$wp_customize->add_setting( "herco_{$id}_heading", array( 'sanitize_callback' => '__return_empty_string' ) );
			$wp_customize->add_control(
				new Herco_Customize_Note_Control(
					$wp_customize,
					"herco_{$id}_heading",
					array(
						'label'   => $details['label'] . ' Store',
						'section' => 'herco_marketplaces',
					)
				)
			);

			// URL
			$wp_customize->add_setting( "herco_{$id}_url", array( 'default' => $details['url'], 'sanitize_callback' => 'esc_url_raw' ) );
			$wp_customize->add_control( "herco_{$id}_url", array( 'label' => $details['label'] . ' Store URL', 'section' => 'herco_marketplaces', 'type' => 'url' ) );

			// Rating
			$wp_customize->add_setting( "herco_{$id}_rating", array( 'default' => $details['rating'], 'sanitize_callback' => 'sanitize_text_field' ) );
			$wp_customize->add_control( "herco_{$id}_rating", array( 'label' => $details['label'] . ' Rating (e.g., 4.8)', 'section' => 'herco_marketplaces', 'type' => 'text' ) );

			// Followers
			$wp_customize->add_setting( "herco_{$id}_followers", array( 'default' => $details['followers'], 'sanitize_callback' => 'sanitize_text_field' ) );
			$wp_customize->add_control( "herco_{$id}_followers", array( 'label' => $details['label'] . ' Followers (e.g., 45K+)', 'section' => 'herco_marketplaces', 'type' => 'text' ) );

			// Reviews
			$wp_customize->add_setting( "herco_{$id}_reviews", array( 'default' => $details['reviews'], 'sanitize_callback' => 'sanitize_text_field' ) );
			$wp_customize->add_control( "herco_{$id}_reviews", array( 'label' => $details['label'] . ' Reviews (e.g., 12K+)', 'section' => 'herco_marketplaces', 'type' => 'text' ) );

			// Rating Percent for stars
			$wp_customize->add_setting( "herco_{$id}_rating_percent", array( 'default' => $details['percent'], 'sanitize_callback' => 'sanitize_text_field' ) );
			$wp_customize->add_control( "herco_{$id}_rating_percent", array( 'label' => $details['label'] . ' Star Rating Width (e.g., 96%)', 'section' => 'herco_marketplaces', 'type' => 'text' ) );
		}
	}
	add_action( 'customize_register', 'herco_add_marketplace_controls' );
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

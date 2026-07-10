<?php
/**
 * Herco Theme bootstrap.
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HERCO_VER', '2.0.6' );
define( 'HERCO_DIR', get_template_directory() );
define( 'HERCO_URI', get_template_directory_uri() );

require_once HERCO_DIR . '/inc/content-loader.php';
require_once HERCO_DIR . '/inc/brands-cpt.php';
require_once HERCO_DIR . '/inc/editor-content.php';
require_once HERCO_DIR . '/inc/images.php';
require_once HERCO_DIR . '/inc/customizer.php';
require_once HERCO_DIR . '/inc/icons.php';
require_once HERCO_DIR . '/inc/about-content.php';
require_once HERCO_DIR . '/inc/brands-page.php';
require_once HERCO_DIR . '/inc/form-pages.php';

function herco_setup() {
	load_theme_textdomain( 'herco', HERCO_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 61,
			'width'       => 276,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'herco' ),
			'footer'  => __( 'Footer Menu', 'herco' ),
		)
	);

	add_image_size( 'herco-banner', 1600, 900, true );
}
add_action( 'after_setup_theme', 'herco_setup' );

function herco_scripts() {
	wp_enqueue_style( 'herco-google-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Hanken+Grotesk:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap', array(), null );
	wp_enqueue_style( 'herco-theme', HERCO_URI . '/assets/theme.css', array( 'herco-google-fonts' ), HERCO_VER );
	wp_enqueue_style( 'herco-style', get_stylesheet_uri(), array( 'herco-theme' ), HERCO_VER );
	wp_enqueue_script( 'herco-app', HERCO_URI . '/assets/app.js', array(), HERCO_VER, true );
}
add_action( 'wp_enqueue_scripts', 'herco_scripts' );

function herco_ensure_core_pages() {
	$pages = function_exists( 'herco_core_page_blueprints' ) ? herco_core_page_blueprints() : array();

	foreach ( $pages as $slug => $page_config ) {
		$page = get_page_by_path( $slug );

		if ( ! $page ) {
			$page_id = wp_insert_post(
				array(
					'post_title'   => $page_config['title'],
					'post_name'    => $slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				)
			);

			if ( is_wp_error( $page_id ) || ! $page_id ) {
				continue;
			}
		} else {
			$page_id = (int) $page->ID;
		}

		$current_template = get_page_template_slug( $page_id );
		if ( empty( $current_template ) || 'default' === $current_template ) {
			update_post_meta( $page_id, '_wp_page_template', $page_config['template'] );
		}

		$current_content = get_post_field( 'post_content', $page_id );
		if ( '' === trim( (string) $current_content ) && ! empty( $page_config['content'] ) ) {
			wp_update_post(
				array(
					'ID'           => $page_id,
					'post_content' => $page_config['content'],
				)
			);
		}
	}
}
add_action( 'after_switch_theme', 'herco_ensure_core_pages' );
add_action( 'admin_init', 'herco_ensure_core_pages' );

function herco_page_url( $slug ) {
	if ( '' === $slug || '/' === $slug ) {
		return home_url( '/' );
	}

	$page = get_page_by_path( trim( $slug, '/' ) );
	if ( $page ) {
		return get_permalink( $page );
	}

	return home_url( '/' . trim( $slug, '/' ) . '/' );
}

function herco_asset_exists( $relative_path ) {
	return file_exists( HERCO_DIR . '/' . ltrim( $relative_path, '/' ) );
}

function herco_asset_url( $relative_path ) {
	return HERCO_URI . '/' . ltrim( $relative_path, '/' );
}

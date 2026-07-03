<?php
/**
 * Brands custom post type and taxonomy.
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function herco_brand_category_map() {
	return array(
		'power'    => __( 'Power Tools', 'herco' ),
		'hand'     => __( 'Hand Tools', 'herco' ),
		'auto'     => __( 'Automotive Care', 'herco' ),
		'security' => __( 'Security & Access', 'herco' ),
		'chem'     => __( 'Adhesives & Chemicals', 'herco' ),
	);
}

function herco_default_brands_seed() {
	return array(
		array( 'name' => '3M', 'slug' => '3m', 'category' => 'chem', 'label' => 'Adhesives & Chemicals' ),
		array( 'name' => 'WD-40', 'slug' => 'wd-40', 'category' => 'chem', 'label' => 'Lubricants' ),
		array( 'name' => '3-IN-ONE', 'slug' => '3-in-one', 'category' => 'chem', 'label' => 'Lubricants' ),
		array( 'name' => 'Bosch', 'slug' => 'bosch', 'category' => 'power', 'label' => 'Power Tools' ),
		array( 'name' => 'DeWalt', 'slug' => 'dewalt', 'category' => 'power', 'label' => 'Power Tools' ),
		array( 'name' => 'Black+Decker', 'slug' => 'black-decker', 'category' => 'power', 'label' => 'Power Tools' ),
		array( 'name' => 'Stanley', 'slug' => 'stanley', 'category' => 'hand', 'label' => 'Hand Tools' ),
		array( 'name' => 'Bahco', 'slug' => 'bahco', 'category' => 'hand', 'label' => 'Hand Tools' ),
		array( 'name' => 'Bondhus', 'slug' => 'bondhus', 'category' => 'hand', 'label' => 'Hand Tools' ),
		array( 'name' => 'Armor All', 'slug' => 'armor-all', 'category' => 'auto', 'label' => 'Automotive Care' ),
		array( 'name' => 'Yale', 'slug' => 'yale', 'category' => 'security', 'label' => 'Locks & Security' ),
		array( 'name' => 'Dorma', 'slug' => 'dorma', 'category' => 'security', 'label' => 'Door Hardware' ),
		array( 'name' => 'Devcon', 'slug' => 'devcon', 'category' => 'chem', 'label' => 'Adhesives' ),
		array( 'name' => 'Briggs & Stratton', 'slug' => 'briggs-stratton', 'category' => 'power', 'label' => 'Engines' ),
		array( 'name' => 'California Scents', 'slug' => 'california-scents', 'category' => 'auto', 'label' => 'Automotive Care' ),
		array( 'name' => 'Campbell', 'slug' => 'campbell', 'category' => 'hand', 'label' => 'Chain & Hardware' ),
		array( 'name' => 'Crescent Nicholson', 'slug' => 'crescent-nicholson', 'category' => 'hand', 'label' => 'Hand Tools' ),
		array( 'name' => 'Clayton Mark', 'slug' => 'clayton-mark', 'category' => 'hand', 'label' => 'Hardware' ),
	);
}

function herco_register_brand_content_types() {
	register_taxonomy(
		'brand_category',
		array( 'brand' ),
		array(
			'labels'            => array(
				'name'          => __( 'Brand Categories', 'herco' ),
				'singular_name' => __( 'Brand Category', 'herco' ),
			),
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'brand-category' ),
			'show_in_rest'      => true,
		)
	);

	register_post_type(
		'brand',
		array(
			'labels' => array(
				'name'               => __( 'Brands', 'herco' ),
				'singular_name'      => __( 'Brand', 'herco' ),
				'add_new_item'       => __( 'Add New Brand', 'herco' ),
				'edit_item'          => __( 'Edit Brand', 'herco' ),
				'new_item'           => __( 'New Brand', 'herco' ),
				'view_item'          => __( 'View Brand', 'herco' ),
				'search_items'       => __( 'Search Brands', 'herco' ),
				'not_found'          => __( 'No brands found.', 'herco' ),
				'not_found_in_trash' => __( 'No brands found in Trash.', 'herco' ),
			),
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_position'      => 21,
			'menu_icon'          => 'dashicons-tag',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			'has_archive'        => false,
			'publicly_queryable' => false,
			'show_in_rest'       => true,
			'rewrite'            => false,
		)
	);
}
add_action( 'init', 'herco_register_brand_content_types' );

function herco_ensure_brand_terms() {
	$categories = herco_brand_category_map();
	foreach ( $categories as $slug => $label ) {
		if ( ! term_exists( $slug, 'brand_category' ) ) {
			wp_insert_term(
				$label,
				'brand_category',
				array(
					'slug' => $slug,
				)
			);
		}
	}
}
add_action( 'init', 'herco_ensure_brand_terms', 20 );

function herco_seed_default_brands() {
	if ( ! post_type_exists( 'brand' ) ) {
		return;
	}

	$existing = get_posts(
		array(
			'post_type'      => 'brand',
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);

	if ( ! empty( $existing ) ) {
		return;
	}

	foreach ( herco_default_brands_seed() as $brand ) {
		$post_id = wp_insert_post(
			array(
				'post_type'    => 'brand',
				'post_status'  => 'publish',
				'post_title'   => $brand['name'],
				'post_name'    => $brand['slug'],
				'post_excerpt' => $brand['label'],
			)
		);

		if ( ! is_wp_error( $post_id ) && $post_id ) {
			wp_set_object_terms( $post_id, array( $brand['category'] ), 'brand_category', false );
		}
	}
}
add_action( 'after_switch_theme', 'herco_seed_default_brands' );
add_action( 'admin_init', 'herco_seed_default_brands' );

function herco_get_brand_tiles() {
	$posts = get_posts(
		array(
			'post_type'      => 'brand',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
		)
	);

	if ( empty( $posts ) ) {
		return array();
	}

	$brands = array();
	foreach ( $posts as $post ) {
		$terms = get_the_terms( $post, 'brand_category' );
		$term  = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? array_shift( $terms ) : null;
		$logo  = get_the_post_thumbnail_url( $post, 'medium' );

		$brands[] = array(
			'id'       => (int) $post->ID,
			'name'     => get_the_title( $post ),
			'category' => $term ? $term->slug : 'all',
			'label'    => $post->post_excerpt ? $post->post_excerpt : ( $term ? $term->name : __( 'Brand', 'herco' ) ),
			'logo'     => $logo ? $logo : '',
		);
	}

	return $brands;
}

function herco_get_brand_filter_terms() {
	$terms = get_terms(
		array(
			'taxonomy'   => 'brand_category',
			'hide_empty' => true,
		)
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return array();
	}

	return array_map(
		static function ( $term ) {
			return array(
				'slug' => $term->slug,
				'name' => $term->name,
			);
		},
		$terms
	);
}

function herco_brand_filter_options() {
	$map      = herco_brand_category_map();
	$existing = herco_get_brand_filter_terms();
	$by_slug  = array();

	foreach ( $existing as $term ) {
		$by_slug[ $term['slug'] ] = $term['name'];
	}

	$options = array();
	foreach ( $map as $slug => $label ) {
		if ( isset( $by_slug[ $slug ] ) ) {
			$options[] = array(
				'slug' => $slug,
				'name' => $label,
			);
		}
	}

	return $options;
}

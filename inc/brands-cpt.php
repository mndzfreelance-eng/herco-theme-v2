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
				'menu_name'          => __( 'Brands', 'herco' ),
				'all_items'          => __( 'All Brands', 'herco' ),
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
			'publicly_queryable' => true,
			'query_var'          => true,
			'show_in_rest'       => true,
			'rewrite'            => array(
				'slug'       => 'brand',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'herco_register_brand_content_types' );

function herco_brand_logo_meta_key() {
	return '_herco_brand_logo';
}

function herco_brand_resolve_attachment_url( $attachment_id, $size = 'full' ) {
	$mime = get_post_mime_type( $attachment_id );
	if ( 'image/svg+xml' === $mime ) {
		return wp_get_attachment_url( $attachment_id );
	}

	return wp_get_attachment_image_url( $attachment_id, $size );
}

function herco_brand_logo_raw( $post_id ) {
	$value = get_post_meta( $post_id, herco_brand_logo_meta_key(), true );
	if ( '' === $value || null === $value ) {
		return '';
	}

	return is_numeric( $value ) ? absint( $value ) : esc_url_raw( $value );
}

function herco_brand_logo_url( $post_id, $size = 'full', $placeholder = 'brand-logo' ) {
	$value = herco_brand_logo_raw( $post_id );
	$url   = '';

	if ( $value ) {
		if ( is_numeric( $value ) ) {
			$url = herco_brand_resolve_attachment_url( (int) $value, $size );
		} else {
			$url = esc_url( $value );
		}
	}

	if ( ! $url && has_post_thumbnail( $post_id ) ) {
		$url = get_the_post_thumbnail_url( $post_id, $size );
	}

	return $url ? $url : herco_placeholder_url( $placeholder );
}

function herco_brand_has_custom_logo( $post_id ) {
	return (bool) herco_brand_logo_raw( $post_id ) || has_post_thumbnail( $post_id );
}

function herco_brand_primary_category( $post_id ) {
	$terms = get_the_terms( $post_id, 'brand_category' );
	return ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? array_shift( $terms ) : null;
}

function herco_brand_logo_attachment_id() {
	return 'herco-brand-logo-media-frame';
}

function herco_allow_admin_svg_uploads( $mimes ) {
	if ( current_user_can( 'manage_options' ) ) {
		$mimes['svg']  = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
	}

	return $mimes;
}
add_filter( 'upload_mimes', 'herco_allow_admin_svg_uploads' );

function herco_fix_svg_filetype_check( $data, $file, $filename, $mimes ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		return $data;
	}

	$wp_filetype = wp_check_filetype( $filename, $mimes );
	if ( 'svg' === ( $wp_filetype['ext'] ?? '' ) ) {
		$data['ext']             = 'svg';
		$data['type']            = 'image/svg+xml';
		$data['proper_filename'] = $filename;
	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'herco_fix_svg_filetype_check', 10, 4 );

function herco_brand_logo_metabox() {
	add_meta_box(
		'herco-brand-logo',
		__( 'Brand Logo Override', 'herco' ),
		'herco_render_brand_logo_metabox',
		'brand',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_brand', 'herco_brand_logo_metabox' );

function herco_render_brand_logo_metabox( $post ) {
	$value   = herco_brand_logo_raw( $post->ID );
	$logo    = herco_brand_logo_url( $post->ID, 'full' );
	$has_set = (bool) $value;
	wp_nonce_field( 'herco_save_brand_logo', 'herco_brand_logo_nonce' );
	?>
	<p><?php esc_html_e( 'Use this field when the Featured Image is too limiting, especially for SVG logos. The selected media item will override the Featured Image on the site.', 'herco' ); ?></p>
	<input type="hidden" id="herco-brand-logo-field" name="herco_brand_logo" value="<?php echo esc_attr( $value ); ?>">
	<div id="herco-brand-logo-preview" style="margin:12px 0; padding:12px; border:1px solid #dcdcde; background:#fff; text-align:center;<?php echo $has_set ? '' : ' display:none;'; ?>">
		<img src="<?php echo esc_url( $logo ); ?>" alt="" style="max-width:100%; max-height:120px; width:auto; height:auto; object-fit:contain;">
	</div>
	<p style="display:flex; gap:8px; flex-wrap:wrap; margin:0;">
		<button type="button" class="button button-secondary" data-herco-brand-logo-select><?php esc_html_e( 'Select Logo', 'herco' ); ?></button>
		<button type="button" class="button" data-herco-brand-logo-remove<?php echo $has_set ? '' : ' style="display:none;"'; ?>><?php esc_html_e( 'Remove Override', 'herco' ); ?></button>
	</p>
	<?php
}

function herco_save_brand_logo_meta( $post_id ) {
	if ( ! isset( $_POST['herco_brand_logo_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['herco_brand_logo_nonce'] ) ), 'herco_save_brand_logo' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$value = isset( $_POST['herco_brand_logo'] ) ? wp_unslash( $_POST['herco_brand_logo'] ) : '';
	$value = is_numeric( $value ) ? absint( $value ) : esc_url_raw( $value );

	if ( empty( $value ) ) {
		delete_post_meta( $post_id, herco_brand_logo_meta_key() );
		return;
	}

	update_post_meta( $post_id, herco_brand_logo_meta_key(), $value );
}
add_action( 'save_post_brand', 'herco_save_brand_logo_meta' );

function herco_enqueue_brand_admin_media( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || 'brand' !== $screen->post_type ) {
		return;
	}

	wp_enqueue_media();
	wp_add_inline_script(
		'jquery-core',
		"document.addEventListener('DOMContentLoaded', function () {\n  var field = document.getElementById('herco-brand-logo-field');\n  var preview = document.getElementById('herco-brand-logo-preview');\n  var selectButton = document.querySelector('[data-herco-brand-logo-select]');\n  var removeButton = document.querySelector('[data-herco-brand-logo-remove]');\n  var frame;\n\n  if (!field || !selectButton || !removeButton || typeof wp === 'undefined' || !wp.media) {\n    return;\n  }\n\n  function setPreview(url) {\n    if (!url) {\n      preview.style.display = 'none';\n      preview.innerHTML = '';\n      removeButton.style.display = 'none';\n      return;\n    }\n\n    preview.innerHTML = '<img src="' + url + '" alt="" style="max-width:100%; max-height:120px; width:auto; height:auto; object-fit:contain;">';\n    preview.style.display = 'block';\n    removeButton.style.display = '';\n  }\n\n  selectButton.addEventListener('click', function (event) {\n    event.preventDefault();\n\n    if (!frame) {\n      frame = wp.media({\n        title: 'Select brand logo',\n        button: { text: 'Use this logo' },\n        library: { type: 'image' },\n        multiple: false\n      });\n\n      frame.on('select', function () {\n        var attachment = frame.state().get('selection').first().toJSON();\n        field.value = attachment.id || attachment.url || '';\n        setPreview(attachment.url || '');\n      });\n    }\n\n    frame.open();\n  });\n\n  removeButton.addEventListener('click', function (event) {\n    event.preventDefault();\n    field.value = '';\n    setPreview('');\n  });\n});",
		'after'
	);
}
add_action( 'admin_enqueue_scripts', 'herco_enqueue_brand_admin_media' );

function herco_register_brand_admin_shortcuts() {
	add_submenu_page(
		'edit.php?post_type=page',
		__( 'Brand Library', 'herco' ),
		__( 'Brand Library', 'herco' ),
		'edit_pages',
		'edit.php?post_type=brand'
	);

	add_submenu_page(
		'edit.php?post_type=page',
		__( 'Add Brand', 'herco' ),
		__( 'Add Brand', 'herco' ),
		'edit_pages',
		'post-new.php?post_type=brand'
	);
}
add_action( 'admin_menu', 'herco_register_brand_admin_shortcuts' );

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

	$seeded_flag = (bool) get_option( 'herco_brands_seeded', false );
	$existing = get_posts(
		array(
			'post_type'      => 'brand',
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);

	if ( ! empty( $existing ) ) {
		if ( ! $seeded_flag ) {
			update_option( 'herco_brands_seeded', 1, false );
		}
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

	update_option( 'herco_brands_seeded', 1, false );
}
add_action( 'after_switch_theme', 'herco_seed_default_brands' );
add_action( 'admin_init', 'herco_seed_default_brands' );
add_action( 'init', 'herco_seed_default_brands', 30 );

function herco_maybe_flush_brand_rewrite_rules() {
	$version = 'brand-single-v1';
	if ( get_option( 'herco_brand_rewrite_version' ) === $version ) {
		return;
	}

	flush_rewrite_rules( false );
	update_option( 'herco_brand_rewrite_version', $version, false );
}
add_action( 'init', 'herco_maybe_flush_brand_rewrite_rules', 40 );

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
		$term = herco_brand_primary_category( $post->ID );
		$logo = herco_brand_logo_url( $post->ID, 'medium' );

		$brands[] = array(
			'id'       => (int) $post->ID,
			'name'     => get_the_title( $post ),
			'url'      => get_permalink( $post ),
			'category' => $term ? $term->slug : 'all',
			'label'    => $post->post_excerpt ? $post->post_excerpt : ( $term ? $term->name : __( 'Brand', 'herco' ) ),
			'logo'     => herco_brand_has_custom_logo( $post->ID ) ? $logo : '',
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

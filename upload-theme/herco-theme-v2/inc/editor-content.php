<?php
/**
 * Editor-managed template copy helpers.
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function herco_editor_heading_block( $text, $level, $class_name = '' ) {
	$attrs = array( 'level' => (int) $level );

	if ( '' !== $class_name ) {
		$attrs['className'] = $class_name;
	}

	$tag = 'h' . (int) $level;

	return sprintf(
		"<!-- wp:heading %s --><%s class=\"wp-block-heading%s\">%s</%s><!-- /wp:heading -->",
		wp_json_encode( $attrs ),
		$tag,
		$class_name ? ' ' . esc_attr( $class_name ) : '',
		esc_html( $text ),
		$tag
	);
}

function herco_editor_paragraph_block( $text, $class_name = '' ) {
	$attrs = array();

	if ( '' !== $class_name ) {
		$attrs['className'] = $class_name;
	}

	return sprintf(
		"<!-- wp:paragraph %s --><p%s>%s</p><!-- /wp:paragraph -->",
		wp_json_encode( $attrs ),
		$class_name ? ' class="' . esc_attr( 'wp-block-paragraph ' . $class_name ) . '"' : '',
		nl2br( esc_html( $text ) )
	);
}

function herco_editor_list_block( $items, $class_name = '' ) {
	$attrs = array();

	if ( '' !== $class_name ) {
		$attrs['className'] = $class_name;
	}

	$list_items = '';
	foreach ( $items as $item ) {
		$list_items .= '<li>' . esc_html( $item ) . '</li>';
	}

	return sprintf(
		"<!-- wp:list %s --><ul%s>%s</ul><!-- /wp:list -->",
		wp_json_encode( $attrs ),
		$class_name ? ' class="' . esc_attr( 'wp-block-list ' . $class_name ) . '"' : '',
		$list_items
	);
}

function herco_editor_area_block( $area_class, $inner_blocks ) {
	$attrs = array(
		'className' => 'herco-editor-area ' . $area_class,
	);

	return sprintf(
		"<!-- wp:group %s --><div class=\"wp-block-group herco-editor-area %s\">%s</div><!-- /wp:group -->",
		wp_json_encode( $attrs ),
		esc_attr( $area_class ),
		$inner_blocks
	);
}

function herco_core_page_blueprints() {
	return array(
		'about'        => array(
			'title'    => 'About',
			'template' => 'page-about.php',
			'content'  => herco_about_editor_default_content(),
		),
		'brands'       => array(
			'title'    => 'Brands',
			'template' => 'page-brands.php',
			'content'  => herco_brands_editor_default_content(),
		),
		'distribution' => array(
			'title'    => 'Distribution',
			'template' => 'page-distribution.php',
			'content'  => herco_distribution_editor_default_content(),
		),
		'faqs'         => array(
			'title'    => 'FAQs',
			'template' => 'page-faqs.php',
			'content'  => herco_faqs_editor_default_content(),
		),
		'contact'      => array(
			'title'    => 'Contact',
			'template' => 'page-contact.php',
			'content'  => herco_contact_editor_default_content(),
		),
	);
}

function herco_find_editor_area_block( $blocks, $area_class ) {
	foreach ( $blocks as $block ) {
		$class_name = $block['attrs']['className'] ?? '';
		$classes    = preg_split( '/\s+/', trim( (string) $class_name ) );

		if ( in_array( $area_class, $classes, true ) ) {
			return $block;
		}

		if ( ! empty( $block['innerBlocks'] ) ) {
			$found = herco_find_editor_area_block( $block['innerBlocks'], $area_class );
			if ( $found ) {
				return $found;
			}
		}
	}

	return null;
}

function herco_get_editor_area_html( $area_class, $post_id = 0 ) {
	$post_id = $post_id ?: get_the_ID();
	if ( ! $post_id ) {
		return '';
	}

	$post = get_post( $post_id );
	if ( ! $post || 'page' !== $post->post_type || '' === trim( (string) $post->post_content ) ) {
		return '';
	}

	$block = herco_find_editor_area_block( parse_blocks( $post->post_content ), $area_class );
	if ( ! $block ) {
		return '';
	}

	$html = '';
	foreach ( $block['innerBlocks'] as $inner_block ) {
		$html .= render_block( $inner_block );
	}

	return $html;
}

function herco_render_editor_area( $area_class, $default_html = '', $post_id = 0 ) {
	$html = herco_get_editor_area_html( $area_class, $post_id );
	echo '' !== $html ? $html : $default_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function herco_get_editor_area_list_items( $area_class, $default_items = array(), $post_id = 0 ) {
	$html = herco_get_editor_area_html( $area_class, $post_id );
	if ( '' === $html ) {
		return $default_items;
	}

	if ( preg_match_all( '/<li[^>]*>(.*?)<\/li>/is', $html, $matches ) ) {
		return array_values(
			array_filter(
				array_map( 'wp_strip_all_tags', $matches[1] )
			)
		);
	}

	return $default_items;
}

function herco_about_editor_default_content() {
	return implode(
		"\n\n",
		array(
			herco_editor_area_block( 'herco-about-hero-title', herco_editor_heading_block( 'A family business that helped build the Filipino home.', 1, 'font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6' ) ),
			herco_editor_area_block( 'herco-about-hero-desc', herco_editor_paragraph_block( 'Since 1908, Herco Trading has put trusted tools and hardware within reach of every Filipino - across five generations of stewardship.', 'font-body-lg text-body-lg text-stucco-white/80 max-w-2xl' ) ),
			herco_editor_area_block( 'herco-about-story-title', herco_editor_heading_block( 'From one Binondo storefront to a nationwide network.', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6' ) ),
			herco_editor_area_block( 'herco-about-story-copy', herco_editor_paragraph_block( 'Herco Trading began in 1908 as a single hardware store in Binondo, Manila. More than a century later, it has grown into one of the country\'s most established distribution companies - yet it remains family-owned, now guided by its fifth generation of leadership.', 'font-body-lg text-body-lg text-on-surface-variant mb-5' ) . herco_editor_paragraph_block( 'That continuity is our advantage. The relationships we hold with global principals and Filipino retailers are measured in decades, not quarters - and every brand we take on inherits a century of distribution know-how.', 'font-body-md text-body-md text-on-surface-variant' ) ),
			herco_editor_area_block( 'herco-about-mission-items', herco_editor_list_block( array( 'Grow the brands entrusted to us by our principals.', 'Help customers grow with the best products, prices and service.', 'Offer employees worthwhile and fulfilling employment.', 'Deliver a respectable return to our stockholders.' ), 'space-y-6 font-body-lg text-on-surface-variant' ) ),
			herco_editor_area_block( 'herco-about-vision-quote', herco_editor_paragraph_block( '"To be the #1 hardware distribution company in the Philippines in terms of revenue, income and breadth of brand portfolio."', 'font-display-lg text-2xl text-industrial-gold leading-relaxed italic mb-6' ) ),
			herco_editor_area_block( 'herco-about-vision-copy', herco_editor_paragraph_block( 'Maintaining true partnerships with our principals and customers - the best at what we do, and easy to work with at the same time.', 'font-body-lg text-stucco-white/80' ) ),
			herco_editor_area_block( 'herco-about-core-title', herco_editor_heading_block( 'Trust is built through how we work.', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4' ) ),
			herco_editor_area_block( 'herco-about-core-desc', herco_editor_paragraph_block( 'Our values are practical, visible and measured over time. They shape how we serve principals, support customers and protect a name that has been trusted since 1908.', 'font-body-lg text-body-lg text-on-surface-variant mt-6' ) ),
			herco_editor_area_block( 'herco-about-affiliates-title', herco_editor_heading_block( 'A group with reach across industries.', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6' ) ),
			herco_editor_area_block( 'herco-about-affiliates-desc', herco_editor_paragraph_block( 'Herco maintains strategic partnerships with major Philippine companies in plastic manufacturing, consumer chemicals and financial services - strengthening the network behind every delivery.', 'font-body-lg text-body-lg text-on-surface-variant' ) ),
			herco_editor_area_block( 'herco-about-cta-title', herco_editor_heading_block( '117 years in, we\'re still looking for the next great partnership.', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mb-6' ) ),
			herco_editor_area_block( 'herco-about-cta-desc', herco_editor_paragraph_block( 'Talk to the team about distributing your brand - or stocking the brands Filipinos trust.', 'font-body-lg text-body-lg text-stucco-white/80 mb-10' ) ),
		)
	);
}

function herco_brands_editor_default_content() {
	$intro = function_exists( 'herco_brands_page_intro' ) ? herco_brands_page_intro() : 'We represent trusted global brands across tools, hardware, security, automotive care, and industrial supply.';

	return implode(
		"\n\n",
		array(
			herco_editor_area_block( 'herco-brands-hero-title', herco_editor_heading_block( 'The brands behind every Filipino toolbox.', 1, 'font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6' ) ),
			herco_editor_area_block( 'herco-brands-hero-desc', herco_editor_paragraph_block( wp_strip_all_tags( $intro ), 'font-body-lg text-body-lg text-stucco-white/80 max-w-2xl' ) ),
			herco_editor_area_block( 'herco-brands-portfolio-title', herco_editor_heading_block( 'Filter by category', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4' ) ),
			herco_editor_area_block( 'herco-brands-partnership-title', herco_editor_heading_block( 'Looking for a distribution partner in the Philippines?', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6' ) ),
			herco_editor_area_block( 'herco-brands-partnership-desc', herco_editor_paragraph_block( 'Manufacturers trust Herco to grow their brands in the Philippine market through logistics, marketing and nationwide channel execution.', 'font-body-lg text-body-lg text-on-surface-variant mb-8' ) ),
		)
	);
}

function herco_distribution_editor_default_content() {
	return implode(
		"\n\n",
		array(
			herco_editor_area_block( 'herco-distribution-hero-title', herco_editor_heading_block( 'One partner. Four channels. Every Filipino market.', 1, 'font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6' ) ),
			herco_editor_area_block( 'herco-distribution-hero-desc', herco_editor_paragraph_block( 'From a neighborhood hardware store to the country\'s largest retail chains, online marketplaces and industrial job sites - Herco gets trusted brands where they need to be.', 'font-body-lg text-body-lg text-stucco-white/80 max-w-2xl' ) ),
			herco_editor_area_block( 'herco-distribution-traditional-desc', herco_editor_paragraph_block( 'Herco has built strong partnerships with hundreds of traditional hardware stores across the Philippines - ensuring reliable distribution of trusted tools and building materials to local communities.', 'font-body-lg text-body-lg text-on-surface-variant mb-8' ) ),
			herco_editor_area_block( 'herco-distribution-modern-desc', herco_editor_paragraph_block( 'Herco partners with the country\'s leading modern hardware retailers - supporting 200+ locations with delivery, marketing and in-store training.', 'font-body-lg text-body-lg text-on-surface-variant mb-6' ) ),
			herco_editor_area_block( 'herco-distribution-ecommerce-desc', herco_editor_paragraph_block( 'Herco expanded into e-commerce in 2020, making trusted hardware products available nationwide through the Philippines\' top platforms - integrated with advanced logistics and inventory systems.', 'font-body-lg text-body-lg text-on-surface-variant mb-6' ) ),
			herco_editor_area_block( 'herco-distribution-industrial-desc', herco_editor_paragraph_block( 'Herco is a trusted supplier to the industrial sector - providing high-quality hardware, tools and construction materials to manufacturing companies, contractors and government projects across the Philippines.', 'font-body-lg text-body-lg text-on-surface-variant mb-8' ) ),
			herco_editor_area_block( 'herco-distribution-logistics-title', herco_editor_heading_block( 'Owned logistics across every channel.', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mt-4 mb-6' ) ),
			herco_editor_area_block( 'herco-distribution-logistics-desc', herco_editor_paragraph_block( 'A single logistics and inventory backbone serves all four channels - so principals get consistent reach, and partners get consistent service.', 'font-body-lg text-body-lg text-stucco-white/80' ) ),
			herco_editor_area_block( 'herco-distribution-cta-title', herco_editor_heading_block( 'Which channel fits your brand?', 2, 'font-headline-lg text-headline-lg text-heritage-navy mb-4' ) ),
			herco_editor_area_block( 'herco-distribution-cta-desc', herco_editor_paragraph_block( 'Tell us about your products and target markets - we\'ll map the right route to shelf.', 'font-body-md text-body-md text-on-surface-variant' ) ),
		)
	);
}

function herco_faqs_editor_default_content() {
	return implode(
		"\n\n",
		array(
			herco_editor_area_block( 'herco-faqs-hero-desc', herco_editor_paragraph_block( 'Find quick answers to common questions about our products, services, and partnerships.', 'font-body-lg text-body-lg text-stucco-white/80 max-w-2xl' ) ),
			herco_editor_area_block( 'herco-faqs-intro-title', herco_editor_heading_block( 'Browse our knowledge base.', 2, 'font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4' ) ),
		)
	);
}

function herco_contact_editor_default_content() {
	return implode(
		"\n\n",
		array(
			herco_editor_area_block( 'herco-contact-hero-title', herco_editor_heading_block( 'Let\'s build something that lasts.', 1, 'font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6' ) ),
			herco_editor_area_block( 'herco-contact-hero-desc', herco_editor_paragraph_block( 'Whether you\'re a global principal, a retailer or an industrial buyer - our team is ready to help.', 'font-body-lg text-body-lg text-stucco-white/80 max-w-2xl' ) ),
			herco_editor_area_block( 'herco-contact-info-title', herco_editor_heading_block( 'Reach the Herco team', 2, 'font-headline-lg text-headline-lg text-heritage-navy mt-4 mb-8' ) ),
			herco_editor_area_block( 'herco-contact-form-title', herco_editor_heading_block( 'Send us a message', 3, 'font-subheading text-subheading text-heritage-navy mb-1' ) ),
			herco_editor_area_block( 'herco-contact-form-desc', herco_editor_paragraph_block( 'We welcome customers, suppliers and partnership inquiries.', 'text-body-md font-body-md text-on-surface-variant mb-8' ) ),
			herco_editor_area_block( 'herco-contact-form-note', herco_editor_paragraph_block( 'Thanks - your message has been noted. (Demo form - wire to email/CRM on build.)', 'form-note text-body-md font-body-md text-heritage-navy mt-4 text-center' ) ),
		)
	);
}

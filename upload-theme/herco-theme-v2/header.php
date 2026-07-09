<?php
/**
 * Theme header.
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_front_page   = is_front_page();
$is_about_page   = is_page( 'about' );
$is_brands_page  = is_page( 'brands' ) || is_singular( 'brand' );
$is_dist_page    = is_page( 'distribution' );
$is_faq_page     = is_page( 'faqs' );
$is_support_page = is_page(
	array(
		'contact',
		'request-quote',
		'warranty-claim',
		'after-sales-support',
		'retailer-application',
		'supplier-partnership',
		'schedule-a-call',
	)
);

$all_brands           = function_exists( 'herco_get_brand_tiles' ) ? herco_get_brand_tiles() : array();
$brand_count          = count( $all_brands );

$brand_categories = function_exists( 'herco_brand_filter_options' ) ? herco_brand_filter_options() : array();
$category_count   = count( $brand_categories );
$category_icons   = array(
	'power'    => 'bolt',
	'hand'     => 'build',
	'auto'     => 'directions_car',
	'security' => 'lock',
	'chem'     => 'science',
);
$displayed_categories = array_slice( $brand_categories, 0, 6 );
$has_more_categories  = $category_count > 6;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'font-body-md text-on-background antialiased bg-background selection:bg-industrial-gold selection:text-white' ); ?>>
	<?php wp_body_open(); ?>
	<a class="sr-only focus:not-sr-only focus:absolute focus:z-[100] focus:top-2 focus:left-2 focus:bg-heritage-navy focus:text-white focus:px-4 focus:py-2 focus:rounded" href="#main"><?php esc_html_e( 'Skip to content', 'herco' ); ?></a>

	<header data-header class="bg-surface/95 border-b border-border-gray sticky top-0 z-50 backdrop-blur-sm transition-shadow">
		<div class="flex justify-between items-center h-20 w-full px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php elseif ( herco_asset_exists( 'assets/herco-logo.png' ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home"><img src="<?php echo esc_url( herco_asset_url( 'assets/herco-logo.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-9 w-auto" width="276" height="61"></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="font-headline-lg text-2xl text-heritage-navy"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
			<nav class="hidden lg:flex items-center gap-8">
				<a class="text-label-md font-label-md <?php echo $is_front_page ? 'text-heritage-navy border-b-2 border-industrial-gold pb-1 font-semibold' : 'text-on-surface-variant font-medium hover:text-industrial-gold transition-colors'; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a>
				<a class="text-label-md font-label-md <?php echo $is_about_page ? 'text-heritage-navy border-b-2 border-industrial-gold pb-1 font-semibold' : 'text-on-surface-variant font-medium hover:text-industrial-gold transition-colors'; ?>" href="<?php echo esc_url( herco_page_url( 'about' ) ); ?>"><?php esc_html_e( 'About', 'herco' ); ?></a>
				<a class="text-label-md font-label-md <?php echo $is_dist_page ? 'text-heritage-navy border-b-2 border-industrial-gold pb-1 font-semibold' : 'text-on-surface-variant font-medium hover:text-industrial-gold transition-colors'; ?>" href="<?php echo esc_url( herco_page_url( 'distribution' ) ); ?>"><?php esc_html_e( 'Distribution', 'herco' ); ?></a>
				<div class="relative mega-nav-item" data-mega-menu>
					<button class="mega-trigger flex items-center gap-1 text-label-md font-label-md <?php echo $is_brands_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant font-medium hover:text-industrial-gold transition-colors'; ?>" aria-expanded="false">
						<span><?php esc_html_e( 'Brands', 'herco' ); ?></span>
						<span class="material-symbols-outlined mega-trigger-icon text-base transition-transform">expand_more</span>
					</button>
					<div class="mega-panel p-8 border border-border-gray bg-white" style="width: 640px; left: 50%; transform: translateX(-50%);">
						<div class="grid <?php echo empty( $brand_categories ) ? 'grid-cols-1' : 'grid-cols-2'; ?> gap-8">
							<?php if ( ! empty( $brand_categories ) ) : ?>
								<div>
									<h4 class="text-technical-caps font-technical-caps text-heritage-navy/70 uppercase tracking-widest mb-4"><?php esc_html_e( 'By Category', 'herco' ); ?></h4>
									<ul class="space-y-3">
										<?php foreach ( $displayed_categories as $category ) : ?>
											<?php $icon = $category_icons[ $category['slug'] ] ?? 'category'; ?>
											<li><a href="<?php echo esc_url( add_query_arg( 'filter', $category['slug'], herco_page_url( 'brands' ) ) ); ?>" class="flex items-center gap-3 text-body-md font-body-md text-on-surface-variant hover:text-industrial-gold transition-colors"><span class="material-symbols-outlined text-industrial-gold text-base"><?php echo esc_html( $icon ); ?></span><?php echo esc_html( $category['name'] ); ?></a></li>
										<?php endforeach; ?>
									</ul>
									<?php if ( $has_more_categories ) : ?>
										<div class="mt-4 pt-3 border-t border-border-gray">
											<a href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>" class="inline-flex items-center gap-2 text-industrial-gold text-label-md font-label-md hover:gap-3 transition-all">
												<?php
												// translators: %d is the number of categories.
												printf( esc_html__( 'View All %d Categories', 'herco' ), $category_count );
												?>
												<span class="material-symbols-outlined text-base">arrow_forward</span>
											</a>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div>
								<h4 class="text-technical-caps font-technical-caps text-heritage-navy/70 uppercase tracking-widest mb-4"><?php esc_html_e( 'Featured Brands', 'herco' ); ?></h4>
								<div class="grid grid-cols-3 gap-4">
									<?php
									$featured_brands = function_exists( 'herco_get_featured_brands' ) ? herco_get_featured_brands( 6 ) : array();
									if ( ! empty( $featured_brands ) ) :
										foreach ( $featured_brands as $brand ) :
											?>
											<a href="<?php echo esc_url( $brand['url'] ); ?>" class="ecosystem-logo-tile h-16" title="<?php echo esc_attr( $brand['name'] ); ?>">
												<?php if ( ! empty( $brand['logo'] ) ) : ?>
													<img src="<?php echo esc_url( $brand['logo'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" class="max-h-12 w-auto object-contain">
												<?php else : ?>
													<?php echo esc_html( $brand['name'] ); ?>
												<?php endif; ?>
											</a>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>
						</div>
						<div class="mt-6 pt-6 border-t border-border-gray">
							<a href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>" class="inline-flex items-center gap-2 text-industrial-gold text-label-md font-label-md hover:gap-3 transition-all">
								<?php
								if ( $brand_count > 0 ) {
									// translators: %d is the approximate number of brands, rounded down to the nearest 10.
									printf( esc_html__( 'View All %d+ Brands', 'herco' ), floor( $brand_count / 10 ) * 10 );
								} else {
									esc_html_e( 'View All Brands', 'herco' );
								}
								?>
								<span class="material-symbols-outlined text-base">arrow_forward</span>
							</a>
						</div>
					</div>
				</div>
				<div class="relative mega-nav-item" data-mega-menu>
					<button class="mega-trigger flex items-center gap-1 text-label-md font-label-md <?php echo $is_support_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant font-medium hover:text-industrial-gold transition-colors'; ?>" aria-expanded="false">
						<span><?php esc_html_e( 'Customer Support', 'herco' ); ?></span>
						<span class="material-symbols-outlined mega-trigger-icon text-base transition-transform">expand_more</span>
					</button>
					<div class="mega-panel p-8 border border-border-gray bg-white" style="width: 580px; left: 50%; transform: translateX(-50%);">
						<div class="grid grid-cols-2 gap-8">
							<div>
								<h4 class="text-technical-caps font-technical-caps text-heritage-navy/70 uppercase tracking-widest mb-4"><?php esc_html_e( 'Partner with Herco', 'herco' ); ?></h4>
								<ul class="space-y-1">
									<li><a href="<?php echo esc_url( herco_page_url( 'retailer-application' ) ); ?>" class="flex items-start gap-3 p-3 rounded-lg hover:bg-surface-container-lowest transition-colors"><span class="material-symbols-outlined text-industrial-gold mt-1">storefront</span><span><strong class="block text-label-md font-label-md text-heritage-navy"><?php esc_html_e( 'Retailer Application', 'herco' ); ?></strong><span class="text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'Become an authorized dealer.', 'herco' ); ?></span></span></a></li>
									<li><a href="<?php echo esc_url( herco_page_url( 'supplier-partnership' ) ); ?>" class="flex items-start gap-3 p-3 rounded-lg hover:bg-surface-container-lowest transition-colors"><span class="material-symbols-outlined text-industrial-gold mt-1">handshake</span><span><strong class="block text-label-md font-label-md text-heritage-navy"><?php esc_html_e( 'Supplier Partnership', 'herco' ); ?></strong><span class="text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'Distribute your brand with us.', 'herco' ); ?></span></span></a></li>
								</ul>
							</div>
							<div>
								<h4 class="text-technical-caps font-technical-caps text-heritage-navy/70 uppercase tracking-widest mb-4"><?php esc_html_e( 'Get Support', 'herco' ); ?></h4>
								<ul class="space-y-1">
									<li><a href="<?php echo esc_url( herco_page_url( 'request-quote' ) ); ?>" class="flex items-start gap-3 p-3 rounded-lg hover:bg-surface-container-lowest transition-colors"><span class="material-symbols-outlined text-industrial-gold mt-1">request_quote</span><span><strong class="block text-label-md font-label-md text-heritage-navy"><?php esc_html_e( 'Request a Quotation', 'herco' ); ?></strong><span class="text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'Get pricing for bulk orders.', 'herco' ); ?></span></span></a></li>
									<li><a href="<?php echo esc_url( herco_page_url( 'warranty-claim' ) ); ?>" class="flex items-start gap-3 p-3 rounded-lg hover:bg-surface-container-lowest transition-colors"><span class="material-symbols-outlined text-industrial-gold mt-1">verified_user</span><span><strong class="block text-label-md font-label-md text-heritage-navy"><?php esc_html_e( 'Warranty & Service', 'herco' ); ?></strong><span class="text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'File a claim or request support.', 'herco' ); ?></span></span></a></li>
									<li><a href="<?php echo esc_url( herco_page_url( 'faqs' ) ); ?>" class="flex items-start gap-3 p-3 rounded-lg hover:bg-surface-container-lowest transition-colors"><span class="material-symbols-outlined text-industrial-gold mt-1">help_center</span><span><strong class="block text-label-md font-label-md text-heritage-navy"><?php esc_html_e( 'FAQs', 'herco' ); ?></strong><span class="text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'Find answers to common questions.', 'herco' ); ?></span></span></a></li>
								</ul>
							</div>
						</div>
						<div class="mt-6 pt-6 border-t border-border-gray flex items-center justify-between gap-4">
							<p class="text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'For other inquiries, visit our main contact page.', 'herco' ); ?></p>
							<a href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>" class="inline-flex items-center gap-2 text-industrial-gold text-label-md font-label-md hover:gap-3 transition-all"><?php esc_html_e( 'Contact Us', 'herco' ); ?> <span class="material-symbols-outlined text-base">arrow_forward</span></a>
						</div>
					</div>
				</div>
			</nav>
			<div class="flex items-center gap-3">
				<a class="hidden sm:inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-6 py-2.5 hover:bg-heritage-navy/90 transition-colors" href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Partner With Us', 'herco' ); ?></a>
				<button id="navToggle" class="lg:hidden text-heritage-navy p-2" aria-label="<?php esc_attr_e( 'Toggle menu', 'herco' ); ?>" aria-expanded="false"><span class="material-symbols-outlined">menu</span></button>
			</div>
		</div>
		<div id="mobileMenu" class="lg:hidden hidden border-t border-border-gray bg-surface">
			<nav class="flex flex-col px-margin-mobile py-3">
				<a class="py-3 text-label-md font-label-md <?php echo $is_front_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant hover:text-industrial-gold transition-colors'; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a>
				<a class="py-3 text-label-md font-label-md <?php echo $is_about_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant hover:text-industrial-gold transition-colors'; ?>" href="<?php echo esc_url( herco_page_url( 'about' ) ); ?>"><?php esc_html_e( 'About', 'herco' ); ?></a>
				<a class="py-3 text-label-md font-label-md <?php echo $is_dist_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant hover:text-industrial-gold transition-colors'; ?>" href="<?php echo esc_url( herco_page_url( 'distribution' ) ); ?>"><?php esc_html_e( 'Distribution', 'herco' ); ?></a>
				<a class="py-3 text-label-md font-label-md <?php echo $is_faq_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant hover:text-industrial-gold transition-colors'; ?>" href="<?php echo esc_url( herco_page_url( 'faqs' ) ); ?>"><?php esc_html_e( 'FAQs', 'herco' ); ?></a>
				<div class="py-3 border-b border-border-gray">
					<button class="mobile-mega-toggle w-full flex justify-between items-center text-label-md font-label-md <?php echo $is_brands_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant'; ?>" aria-expanded="false">
						<span><?php esc_html_e( 'Brands', 'herco' ); ?></span>
						<span class="material-symbols-outlined text-lg transition-transform">expand_more</span>
					</button>
					<div class="mobile-mega-panel hidden">
						<div class="pt-3 flex flex-col items-start">
							<?php if ( ! empty( $displayed_categories ) ) : ?>
								<?php foreach ( $displayed_categories as $category ) : ?>
									<a href="<?php echo esc_url( add_query_arg( 'filter', $category['slug'], herco_page_url( 'brands' ) ) ); ?>" class="py-2 pl-4 text-label-md font-label-md text-on-surface-variant w-full text-left"><?php echo esc_html( $category['name'] ); ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
							<a href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>" class="py-2 pl-4 text-label-md font-label-md text-on-surface-variant w-full text-left"><?php esc_html_e( 'View All Brands', 'herco' ); ?></a>
						</div>
					</div>
				</div>
				<div class="py-3">
					<button class="mobile-mega-toggle w-full flex justify-between items-center text-label-md font-label-md <?php echo $is_support_page ? 'text-heritage-navy font-semibold' : 'text-on-surface-variant'; ?>" aria-expanded="false">
						<span><?php esc_html_e( 'Customer Support', 'herco' ); ?></span>
						<span class="material-symbols-outlined text-lg transition-transform">expand_more</span>
					</button>
					<div class="mobile-mega-panel hidden">
						<div class="pt-3 flex flex-col items-start">
							<a href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>" class="py-2 pl-4 text-label-md font-label-md text-on-surface-variant w-full text-left"><?php esc_html_e( 'Contact Us', 'herco' ); ?></a>
							<a href="<?php echo esc_url( herco_page_url( 'request-quote' ) ); ?>" class="py-2 pl-4 text-label-md font-label-md text-on-surface-variant w-full text-left"><?php esc_html_e( 'Request a Quotation', 'herco' ); ?></a>
							<a href="<?php echo esc_url( herco_page_url( 'warranty-claim' ) ); ?>" class="py-2 pl-4 text-label-md font-label-md text-on-surface-variant w-full text-left"><?php esc_html_e( 'Warranty & Service', 'herco' ); ?></a>
							<a href="<?php echo esc_url( herco_page_url( 'retailer-application' ) ); ?>" class="py-2 pl-4 text-label-md font-label-md text-on-surface-variant w-full text-left"><?php esc_html_e( 'Retailer Application', 'herco' ); ?></a>
							<a href="<?php echo esc_url( herco_page_url( 'supplier-partnership' ) ); ?>" class="py-2 pl-4 text-label-md font-label-md text-on-surface-variant w-full text-left"><?php esc_html_e( 'Supplier Partnership', 'herco' ); ?></a>
						</div>
					</div>
				</div>
				<a class="mt-3 mb-2 inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-6 py-3" href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Partner With Us', 'herco' ); ?></a>
			</nav>
		</div>
	</header>

	<main id="main">

<?php
/**
 * Template Name: Herco Brands Page
 * Template Post Type: page
 *
 * Brands page.
 *
 * @package Herco_Theme
 */

get_header();

$banner_url = herco_page_banner_url( 'herco_brands_banner', 'assets/media/brands-hero.jpg', 'page-banner' );
$feature_image = herco_theme_image_url( 'herco_brands_feature_image', 'generic', '' );
$brands = function_exists( 'herco_get_brand_tiles' ) ? herco_get_brand_tiles() : array();
$filters = function_exists( 'herco_brand_filter_options' ) ? herco_brand_filter_options() : array();
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/70"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>"><a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a><span>/</span><span class="text-industrial-gold"><?php esc_html_e( 'Brands', 'herco' ); ?></span></nav>
		<?php herco_render_editor_area( 'herco-brands-hero-title', '<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6">' . esc_html__( 'The brands behind every Filipino toolbox.', 'herco' ) . '</h1>' ); ?>
		<?php herco_render_editor_area( 'herco-brands-hero-desc', '<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl">' . esc_html( function_exists( 'herco_brands_page_intro' ) ? herco_brands_page_intro() : '' ) . '</p>' ); ?>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="text-center max-w-2xl mx-auto mb-12">
			<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Our portfolio', 'herco' ); ?></span>
			<?php herco_render_editor_area( 'herco-brands-portfolio-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4">' . esc_html__( 'Filter by category', 'herco' ) . '</h2>' ); ?>
		</div>
		<div class="flex flex-wrap justify-center gap-3 mb-12" role="group" aria-label="<?php esc_attr_e( 'Filter brands by category', 'herco' ); ?>">
			<button class="chip bg-heritage-navy text-white border border-heritage-navy text-label-md font-label-md px-5 py-2 rounded transition-colors" data-filter="all" aria-pressed="true"><?php esc_html_e( 'All brands', 'herco' ); ?></button>
			<?php foreach ( $filters as $filter ) : ?>
				<button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-filter="<?php echo esc_attr( $filter['slug'] ); ?>" aria-pressed="false"><?php echo esc_html( $filter['name'] ); ?></button>
			<?php endforeach; ?>
		</div>
		<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-gutter">
			<?php if ( ! empty( $brands ) ) : ?>
				<?php foreach ( $brands as $brand ) : ?>
					<a href="<?php echo esc_url( herco_page_url( 'contact' ) . '?brand=' . rawurlencode( $brand['name'] ) ); ?>" class="brand-tile group bg-surface-container-lowest border border-border-gray p-6 flex flex-col items-center justify-center text-center aspect-[4/3] hover:border-industrial-gold transition-colors" data-cat="<?php echo esc_attr( $brand['category'] ); ?>">
						<?php if ( ! empty( $brand['logo'] ) ) : ?>
							<div class="w-full flex items-center justify-center mb-5 min-h-[72px]"><img src="<?php echo esc_url( $brand['logo'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" class="max-h-16 w-auto object-contain"></div>
						<?php endif; ?>
						<span class="font-headline-lg text-2xl font-bold text-heritage-navy"><?php echo esc_html( $brand['name'] ); ?></span>
						<small class="font-technical-caps text-technical-caps text-on-surface-variant uppercase mt-2"><?php echo esc_html( $brand['label'] ); ?></small>
					</a>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="col-span-full border border-border-gray bg-surface-container-lowest p-10 text-center text-on-surface-variant"><?php esc_html_e( 'No brands have been added yet. Add them from the Brands menu in WordPress admin.', 'herco' ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface-container-lowest border-y border-border-gray">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
		<div>
			<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'For global principals', 'herco' ); ?></span>
			<?php herco_render_editor_area( 'herco-brands-partnership-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6">' . esc_html__( 'Looking for a distribution partner in the Philippines?', 'herco' ) . '</h2>' ); ?>
			<?php herco_render_editor_area( 'herco-brands-partnership-desc', '<p class="font-body-lg text-body-lg text-on-surface-variant mb-8">' . esc_html__( 'Manufacturers trust Herco to grow their brands in the Philippine market through logistics, marketing and nationwide channel execution.', 'herco' ) . '</p>' ); ?>
			<ul class="space-y-5">
				<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Full-market coverage', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Traditional, modern retail, e-commerce and industrial under one partner.', 'herco' ); ?></p></div></li>
				<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Brand-building support', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Marketing, training and merchandising to grow long-term market share.', 'herco' ); ?></p></div></li>
			</ul>
			<a class="inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-8 py-3.5 hover:bg-heritage-navy/90 transition-colors mt-8" href="<?php echo esc_url( herco_page_url( 'supplier-partnership' ) ); ?>"><?php esc_html_e( 'Discuss a partnership', 'herco' ); ?></a>
		</div>
		<div class="relative aspect-[4/3] border border-border-gray overflow-hidden bg-surface-container-lowest">
			<?php if ( herco_is_placeholder_src( $feature_image ) ) : ?>
				<div class="w-full h-full technical-grid flex items-center justify-center text-center p-8 text-on-surface-variant/60"><span><span class="material-symbols-outlined text-5xl text-heritage-navy/30 block">public</span><span class="text-technical-caps font-technical-caps uppercase mt-4 block"><?php esc_html_e( 'Upload a partnership image in the Customizer', 'herco' ); ?></span></span></div>
			<?php else : ?>
				<img src="<?php echo esc_url( $feature_image ); ?>" alt="<?php esc_attr_e( 'Global principals and distribution partnerships', 'herco' ); ?>" class="w-full h-full object-cover">
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer();
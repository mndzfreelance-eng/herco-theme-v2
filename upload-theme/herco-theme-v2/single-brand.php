<?php
/**
 * Single brand template.
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

the_post();

$brand_id      = get_the_ID();
$brand_name    = get_the_title();
$brand_logo    = function_exists( 'herco_brand_logo_url' ) ? herco_brand_logo_url( $brand_id, 'full' ) : '';
$brand_term    = function_exists( 'herco_brand_primary_category' ) ? herco_brand_primary_category( $brand_id ) : null;
$brand_excerpt = has_excerpt() ? get_the_excerpt() : '';
$banner_url    = herco_page_banner_url( 'herco_brands_banner', 'assets/media/brands-hero.jpg', 'page-banner' );
$content       = apply_filters( 'the_content', get_the_content() );
$has_content   = '' !== trim( wp_strip_all_tags( get_the_content() ) );
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/78"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>"><a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a><span>/</span><a class="hover:text-industrial-gold" href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>"><?php esc_html_e( 'Brands', 'herco' ); ?></a><span>/</span><span class="text-industrial-gold"><?php echo esc_html( $brand_name ); ?></span></nav>
		<?php if ( $brand_term ) : ?>
			<span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-technical-caps font-technical-caps uppercase tracking-widest text-stucco-white/85"><?php echo esc_html( $brand_term->name ); ?></span>
		<?php endif; ?>
		<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-4xl mt-6 mb-6"><?php echo esc_html( $brand_name ); ?></h1>
		<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl"><?php echo esc_html( $brand_excerpt ? $brand_excerpt : __( 'Distributed by Herco Trading across the Philippines through trusted retail, industrial, and channel networks.', 'herco' ) ); ?></p>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 lg:grid-cols-[minmax(0,0.8fr)_minmax(0,1.2fr)] gap-12 items-start">
		<div class="border border-border-gray bg-surface-container-lowest p-8 md:p-10 sticky top-28">
			<div class="aspect-[4/3] border border-border-gray bg-white flex items-center justify-center p-6 overflow-hidden">
				<?php if ( $brand_logo ) : ?>
					<img src="<?php echo esc_url( $brand_logo ); ?>" alt="<?php echo esc_attr( $brand_name ); ?>" class="max-h-full w-auto object-contain">
				<?php endif; ?>
			</div>
			<div class="mt-8 space-y-4 text-body-md font-body-md text-on-surface-variant">
				<?php if ( $brand_term ) : ?>
					<p><strong class="text-heritage-navy"><?php esc_html_e( 'Category:', 'herco' ); ?></strong> <?php echo esc_html( $brand_term->name ); ?></p>
				<?php endif; ?>
				<p><strong class="text-heritage-navy"><?php esc_html_e( 'Partner with Herco:', 'herco' ); ?></strong> <?php esc_html_e( 'Nationwide distribution, trade execution, and channel support for growth in the Philippine market.', 'herco' ); ?></p>
			</div>
			<div class="mt-8 flex flex-col sm:flex-row gap-4">
				<a class="inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-6 py-3.5 hover:bg-heritage-navy/90 transition-colors" href="<?php echo esc_url( herco_page_url( 'contact' ) . '?brand=' . rawurlencode( $brand_name ) ); ?>"><?php esc_html_e( 'Inquire About This Brand', 'herco' ); ?></a>
				<a class="inline-flex items-center justify-center border border-border-gray text-heritage-navy text-label-md font-label-md rounded px-6 py-3.5 hover:border-industrial-gold transition-colors" href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>"><?php esc_html_e( 'Back to All Brands', 'herco' ); ?></a>
			</div>
		</div>
		<div>
			<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Brand Profile', 'herco' ); ?></span>
			<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6"><?php esc_html_e( 'Overview', 'herco' ); ?></h2>
			<?php if ( $has_content ) : ?>
				<div class="prose prose-slate max-w-none text-on-surface-variant"><?php echo $content; ?></div>
			<?php else : ?>
				<div class="border border-border-gray bg-surface-container-lowest p-8 text-on-surface-variant">
					<p class="font-body-lg text-body-lg"><?php esc_html_e( 'Add brand-specific information in the Brand editor to show a company overview, product strengths, market positioning, or support notes on this page.', 'herco' ); ?></p>
				</div>
			<?php endif; ?>

			<div class="mt-12 border border-border-gray bg-surface-container-lowest p-8 md:p-10">
				<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Distribution with Herco', 'herco' ); ?></span>
				<h3 class="font-headline-lg text-3xl text-heritage-navy mt-4 mb-4"><?php esc_html_e( 'Built for long-term market growth', 'herco' ); ?></h3>
				<p class="text-body-md font-body-md text-on-surface-variant mb-6"><?php esc_html_e( 'Herco supports global principals with coordinated logistics, retail coverage, trade relationships, and channel execution across the Philippines.', 'herco' ); ?></p>
				<ul class="space-y-4 text-body-md font-body-md text-on-surface-variant">
					<li class="flex items-start gap-3"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><span><?php esc_html_e( 'Traditional hardware, modern retail, e-commerce, and industrial channels.', 'herco' ); ?></span></li>
					<li class="flex items-start gap-3"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><span><?php esc_html_e( 'Brand-building support for merchandising, training, and market development.', 'herco' ); ?></span></li>
					<li class="flex items-start gap-3"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><span><?php esc_html_e( 'A dedicated contact path for sourcing, dealership, and customer inquiries.', 'herco' ); ?></span></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
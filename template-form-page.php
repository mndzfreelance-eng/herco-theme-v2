<?php
/**
 * Template Name: Herco Form Page
 * Template Post Type: page
 *
 * Form page template.
 *
 * @package Herco_Theme
 */

get_header();

$slug   = function_exists( 'herco_current_form_slug' ) ? herco_current_form_slug() : '';
$config = function_exists( 'herco_get_form_page' ) ? herco_get_form_page( $slug ) : null;

if ( ! $config ) {
	get_template_part( 'index' );
	return;
}

$banner_url = herco_page_banner_url( 'herco_contact_banner', 'assets/media/contact-hero.jpg', 'page-banner' );
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/76"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>"><a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a><span>/</span><span class="text-industrial-gold"><?php echo esc_html( $config['title'] ); ?></span></nav>
		<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6"><?php echo esc_html( $config['title'] ); ?></h1>
		<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl"><?php echo esc_html( $config['intro'] ); ?></p>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 lg:grid-cols-[minmax(0,0.7fr)_minmax(0,1.3fr)] gap-12">
		<div class="border border-border-gray bg-surface-container-lowest p-8 md:p-10 h-fit"><span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php echo esc_html( $config['label'] ); ?></span><h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-4"><?php esc_html_e( 'Send your request', 'herco' ); ?></h2><p class="text-body-md font-body-md text-on-surface-variant"><?php echo esc_html( $config['intro'] ); ?></p><div class="mt-8 space-y-4 text-body-md font-body-md text-on-surface-variant"><p><strong class="text-heritage-navy"><?php esc_html_e( 'Destination:', 'herco' ); ?></strong> <?php echo esc_html( $config['email'] ); ?></p><p><strong class="text-heritage-navy"><?php esc_html_e( 'Template:', 'herco' ); ?></strong> <?php echo esc_html( $config['cf7_title'] ); ?></p></div></div>
		<div class="border border-border-gray bg-surface-container-lowest p-8 md:p-10">
			<?php if ( ! function_exists( 'herco_render_cf7_form' ) || ! herco_render_cf7_form( $config['cf7_title'] ) ) : ?>
				<?php herco_render_native_form( $slug, $config ); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer();
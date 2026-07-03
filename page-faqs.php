<?php
/**
 * Template Name: Herco FAQs Page
 * Template Post Type: page
 *
 * FAQs page.
 *
 * @package Herco_Theme
 */

get_header();

$banner_url = herco_page_banner_url( 'herco_faq_banner', 'assets/media/contact-hero.jpg', 'page-banner' );
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/76"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>"><a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a><span>/</span><span class="text-industrial-gold"><?php the_title(); ?></span></nav>
		<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6"><?php the_title(); ?>.</h1>
		<?php herco_render_editor_area( 'herco-faqs-hero-desc', '<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl">' . esc_html__( 'Find quick answers to common questions about our products, services, and partnerships.', 'herco' ) . '</p>' ); ?>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="text-center max-w-2xl mx-auto mb-12"><span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Need help?', 'herco' ); ?></span><?php herco_render_editor_area( 'herco-faqs-intro-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4">' . esc_html__( 'Browse our knowledge base.', 'herco' ) . '</h2>' ); ?></div>
		<div class="flex flex-wrap justify-center gap-3 mb-12" role="group" aria-label="<?php esc_attr_e( 'Filter FAQs by category', 'herco' ); ?>">
			<button class="chip bg-heritage-navy text-white border border-heritage-navy text-label-md font-label-md px-5 py-2 rounded transition-colors" data-faq-filter="all" aria-pressed="true"><?php esc_html_e( 'All Topics', 'herco' ); ?></button>
			<button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="general" aria-pressed="false"><?php esc_html_e( 'General', 'herco' ); ?></button>
			<button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="products" aria-pressed="false"><?php esc_html_e( 'Products', 'herco' ); ?></button>
			<button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="distribution" aria-pressed="false"><?php esc_html_e( 'Distribution', 'herco' ); ?></button>
			<button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="support" aria-pressed="false"><?php esc_html_e( 'Support', 'herco' ); ?></button>
		</div>
		<div class="max-w-3xl mx-auto space-y-4" data-faq-container>
			<?php $faqs = array(
				array( 'general', 'What is Herco Trading Inc.?', 'Herco Trading Inc. is one of the Philippines\' most established distributors of industrial tools, hardware, and globally trusted brands, serving the market since 1908.' ),
				array( 'products', 'What types of products do you distribute?', 'We distribute power tools, hand tools, automotive care products, security and access solutions, and adhesives and chemicals from world-renowned brands.' ),
				array( 'distribution', 'How can I become a retailer or partner with Herco?', 'Visit our contact and application pages to submit a retailer application, quotation request, or supplier partnership inquiry.' ),
				array( 'support', 'What is your warranty and service policy?', 'Warranty and service policies vary by brand and product. Use the Warranty & Service form so our team can assist with the specific item.' ),
				array( 'products', 'Where can I find product catalogs?', 'Catalogs can be requested through our sales team or by inquiring about a specific brand through the contact forms.' ),
			); foreach ( $faqs as $faq ) : ?>
			<div class="faq-item border border-border-gray bg-surface-container-lowest rounded-lg overflow-hidden" data-faq-category="<?php echo esc_attr( $faq[0] ); ?>"><button class="faq-question w-full text-left p-5 flex justify-between items-center text-subheading font-subheading text-heritage-navy hover:text-industrial-gold transition-colors" aria-expanded="false"><span><?php echo esc_html( $faq[1] ); ?></span><span class="material-symbols-outlined faq-icon text-lg transition-transform">expand_more</span></button><div class="faq-answer hidden px-5 pb-5 text-body-md text-on-surface-variant"><p><?php echo esc_html( $faq[2] ); ?></p></div></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_footer();
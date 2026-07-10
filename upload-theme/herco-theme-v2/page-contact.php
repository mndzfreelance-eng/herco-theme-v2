<?php
/**
 * Template Name: Herco Contact Page
 * Template Post Type: page
 *
 * Contact page.
 *
 * @package Herco_Theme
 */

get_header();

$banner_url      = herco_page_banner_url( 'herco_contact_banner', 'assets/media/contact-hero.jpg', 'page-banner' );
$email           = get_theme_mod( 'herco_email', 'info@herco.com.ph' );
$phone           = get_theme_mod( 'herco_phone', '(02) 8818-7736' );
$secondary_phone = get_theme_mod( 'herco_phone_secondary', '(02) 8818-7331' );
$address         = get_theme_mod( 'herco_address', "8F Herco Center, 114 Benavidez Street,\nLegaspi Village, Makati City 1229, Philippines" );
$facebook_url    = get_theme_mod( 'herco_facebook_url', get_theme_mod( 'herco_facebook', 'https://www.facebook.com/HercoTradingPHOfficial' ) );
$lazada_url      = get_theme_mod( 'herco_lazada_url', get_theme_mod( 'herco_lazada', 'https://www.lazada.com.ph/shop/herco-shop' ) );
$shopee_url      = get_theme_mod( 'herco_shopee_url', get_theme_mod( 'herco_shopee', 'https://shopee.ph/hercotradingofficial' ) );
$tiktok_url      = get_theme_mod( 'herco_tiktok_url', '' );
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/70"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>"><a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a><span>/</span><span class="text-industrial-gold"><?php the_title(); ?></span></nav>
		<?php herco_render_editor_area( 'herco-contact-hero-title', '<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6">' . esc_html__( 'Let\'s build something that lasts.', 'herco' ) . '</h1>' ); ?>
		<?php herco_render_editor_area( 'herco-contact-hero-desc', '<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl">' . esc_html__( 'Whether you\'re a global principal, a retailer or an industrial buyer - our team is ready to help.', 'herco' ) . '</p>' ); ?>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
			<div>
				<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Get in touch', 'herco' ); ?></span>
				<?php herco_render_editor_area( 'herco-contact-info-title', '<h2 class="font-headline-lg text-headline-lg text-heritage-navy mt-4 mb-8">' . esc_html__( 'Reach the Herco team', 'herco' ) . '</h2>' ); ?>
				<div class="space-y-6">
					<div class="flex items-start gap-4"><span class="w-11 h-11 shrink-0 bg-surface-container flex items-center justify-center rounded"><span class="material-symbols-outlined text-heritage-navy">location_on</span></span><div><h4 class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Head Office', 'herco' ); ?></h4><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php echo nl2br( esc_html( $address ) ); ?></p></div></div>
					<div class="flex items-start gap-4"><span class="w-11 h-11 shrink-0 bg-surface-container flex items-center justify-center rounded"><span class="material-symbols-outlined text-heritage-navy">call</span></span><div><h4 class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Phone', 'herco' ); ?></h4><p class="text-body-md font-body-md text-on-surface-variant mt-1"><a class="hover:text-industrial-gold transition-colors" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a> &nbsp;&middot;&nbsp; <a class="hover:text-industrial-gold transition-colors" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $secondary_phone ) ); ?>"><?php echo esc_html( $secondary_phone ); ?></a></p></div></div>
					<div class="flex items-start gap-4"><span class="w-11 h-11 shrink-0 bg-surface-container flex items-center justify-center rounded"><span class="material-symbols-outlined text-heritage-navy">mail</span></span><div><h4 class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Email', 'herco' ); ?></h4><p class="text-body-md font-body-md text-on-surface-variant mt-1"><a class="hover:text-industrial-gold transition-colors" href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p></div></div>
					<div class="flex items-start gap-4"><span class="w-11 h-11 shrink-0 bg-surface-container flex items-center justify-center rounded"><span class="material-symbols-outlined text-heritage-navy">public</span></span><div><h4 class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Find us online', 'herco' ); ?></h4><p class="text-body-md font-body-md text-on-surface-variant mt-1">
						<?php
						$online_links = array();
						if ( ! empty( $facebook_url ) ) {
							$online_links[] = '<a class="hover:text-industrial-gold transition-colors" href="' . esc_url( $facebook_url ) . '" target="_blank" rel="noopener">Facebook</a>';
						}
						if ( ! empty( $lazada_url ) ) {
							$online_links[] = '<a class="hover:text-industrial-gold transition-colors" href="' . esc_url( $lazada_url ) . '" target="_blank" rel="noopener">Lazada</a>';
						}
						if ( ! empty( $shopee_url ) ) {
							$online_links[] = '<a class="hover:text-industrial-gold transition-colors" href="' . esc_url( $shopee_url ) . '" target="_blank" rel="noopener">Shopee</a>';
						}
						if ( ! empty( $tiktok_url ) ) {
							$online_links[] = '<a class="hover:text-industrial-gold transition-colors" href="' . esc_url( $tiktok_url ) . '" target="_blank" rel="noopener">TikTok</a>';
						}
						echo implode( ' &nbsp;&middot;&nbsp; ', $online_links );
						?>
					</p></div></div>
				</div>
				<div class="mt-8 border border-border-gray overflow-hidden aspect-[16/10]"><iframe title="Herco Trading Inc. location map" class="w-full h-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=114+Benavidez+Street+Legaspi+Village+Makati+City&output=embed"></iframe></div>
			</div>
			<div>
				<div class="bg-surface-container-lowest border border-border-gray p-8 md:p-10">
				<?php herco_render_editor_area( 'herco-contact-form-title', '<h3 class="font-subheading text-subheading text-heritage-navy mb-1">' . esc_html__( 'Send us a message', 'herco' ) . '</h3>' ); ?>
					<?php herco_render_editor_area( 'herco-contact-form-desc', '<p class="text-body-md font-body-md text-on-surface-variant mb-8">' . esc_html__( 'We welcome customers, suppliers and partnership inquiries.', 'herco' ) . '</p>' ); ?>
					<?php
					herco_render_native_form(
						'contact',
						function_exists( 'herco_contact_form_config' ) ? herco_contact_form_config() : array(
							'submit' => __( 'Send Message', 'herco' ),
						),
						array(
							'form_id'             => 'contact-form',
							'show_topic'          => true,
							'topic_options'       => function_exists( 'herco_contact_form_topics' ) ? herco_contact_form_topics() : array(),
							'message_placeholder' => __( 'Tell us a little about what you need...', 'herco' ),
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
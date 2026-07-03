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
$facebook        = get_theme_mod( 'herco_facebook', 'https://www.facebook.com/HercoTradingPHOfficial/' );
$lazada          = get_theme_mod( 'herco_lazada', 'https://www.lazada.com.ph/shop/herco-shop' );
$shopee          = get_theme_mod( 'herco_shopee', 'https://shopee.ph/hercotradingofficial' );
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
					<div class="flex items-start gap-4"><span class="w-11 h-11 shrink-0 bg-surface-container flex items-center justify-center rounded"><span class="material-symbols-outlined text-heritage-navy">public</span></span><div><h4 class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Find us online', 'herco' ); ?></h4><p class="text-body-md font-body-md text-on-surface-variant mt-1"><a class="hover:text-industrial-gold transition-colors" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener">Facebook</a> &nbsp;·&nbsp; <a class="hover:text-industrial-gold transition-colors" href="<?php echo esc_url( $lazada ); ?>" target="_blank" rel="noopener">Lazada</a> &nbsp;·&nbsp; <a class="hover:text-industrial-gold transition-colors" href="<?php echo esc_url( $shopee ); ?>" target="_blank" rel="noopener">Shopee</a></p></div></div>
				</div>
				<div class="mt-8 border border-border-gray overflow-hidden aspect-[16/10]"><iframe title="Herco Trading Inc. location map" class="w-full h-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=114+Benavidez+Street+Legaspi+Village+Makati+City&output=embed"></iframe></div>
			</div>
			<div>
				<form class="bg-surface-container-lowest border border-border-gray p-8 md:p-10" id="contact-form" novalidate>
				<?php herco_render_editor_area( 'herco-contact-form-title', '<h3 class="font-subheading text-subheading text-heritage-navy mb-1">' . esc_html__( 'Send us a message', 'herco' ) . '</h3>' ); ?>
					<?php herco_render_editor_area( 'herco-contact-form-desc', '<p class="text-body-md font-body-md text-on-surface-variant mb-8">' . esc_html__( 'We welcome customers, suppliers and partnership inquiries.', 'herco' ) . '</p>' ); ?>
					<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
						<div><label class="block text-label-md font-label-md text-on-surface mb-2" for="name"><?php esc_html_e( 'Full name', 'herco' ); ?></label><input class="w-full bg-surface border border-border-gray rounded px-4 py-2.5 text-body-md focus:outline-none focus:border-industrial-gold focus:ring-1 focus:ring-industrial-gold transition-all" id="name" name="name" type="text" required autocomplete="name"></div>
						<div><label class="block text-label-md font-label-md text-on-surface mb-2" for="company"><?php esc_html_e( 'Company', 'herco' ); ?></label><input class="w-full bg-surface border border-border-gray rounded px-4 py-2.5 text-body-md focus:outline-none focus:border-industrial-gold focus:ring-1 focus:ring-industrial-gold transition-all" id="company" name="company" type="text" autocomplete="organization"></div>
						<div><label class="block text-label-md font-label-md text-on-surface mb-2" for="email"><?php esc_html_e( 'Email', 'herco' ); ?></label><input class="w-full bg-surface border border-border-gray rounded px-4 py-2.5 text-body-md focus:outline-none focus:border-industrial-gold focus:ring-1 focus:ring-industrial-gold transition-all" id="email" name="email" type="email" required autocomplete="email"></div>
						<div><label class="block text-label-md font-label-md text-on-surface mb-2" for="phone"><?php esc_html_e( 'Phone', 'herco' ); ?></label><input class="w-full bg-surface border border-border-gray rounded px-4 py-2.5 text-body-md focus:outline-none focus:border-industrial-gold focus:ring-1 focus:ring-industrial-gold transition-all" id="phone" name="phone" type="tel" autocomplete="tel"></div>
				</div>
					<div class="mt-5"><label class="block text-label-md font-label-md text-on-surface mb-2" for="topic"><?php esc_html_e( 'I\'m reaching out as a...', 'herco' ); ?></label>
						<select class="w-full bg-surface border border-border-gray rounded px-4 py-2.5 text-body-md focus:outline-none focus:border-industrial-gold focus:ring-1 focus:ring-industrial-gold transition-all" id="topic" name="topic">
							<option value=""><?php esc_html_e( 'Select an option', 'herco' ); ?></option>
							<option><?php esc_html_e( 'Warranty Claim Form', 'herco' ); ?></option>
							<option><?php esc_html_e( 'Aftersales Request Form', 'herco' ); ?></option>
							<option><?php esc_html_e( 'RFQ (Request for Quote) Form', 'herco' ); ?></option>
							<option><?php esc_html_e( 'Retailer Application Form', 'herco' ); ?></option>
							<option><?php esc_html_e( 'Supplier Partnership Form', 'herco' ); ?></option>
							<option><?php esc_html_e( 'Other inquiry', 'herco' ); ?></option>
						</select>
					</div>
					<div class="mt-5"><label class="block text-label-md font-label-md text-on-surface mb-2" for="message"><?php esc_html_e( 'Message', 'herco' ); ?></label><textarea class="w-full bg-surface border border-border-gray rounded px-4 py-2.5 text-body-md focus:outline-none focus:border-industrial-gold focus:ring-1 focus:ring-industrial-gold transition-all min-h-[140px]" id="message" name="message" required placeholder="<?php esc_attr_e( 'Tell us a little about what you need...', 'herco' ); ?>"></textarea></div>
					<button class="w-full mt-6 inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-8 py-3.5 hover:bg-heritage-navy/90 transition-colors" type="submit"><?php esc_html_e( 'Send message', 'herco' ); ?></button>
					<p class="form-note text-body-md font-body-md text-heritage-navy mt-4 text-center" role="status" hidden><?php echo wp_strip_all_tags( herco_get_editor_area_html( 'herco-contact-form-note' ) ?: esc_html__( 'Thanks - your message has been noted. (Demo form - wire to email/CRM on build.)', 'herco' ) ); ?></p>
				</form>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
<?php
/**
 * Theme footer.
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</main>

	<footer class="bg-primary text-stucco-white">
		<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-20 grid grid-cols-1 md:grid-cols-4 gap-gutter">
			<div class="md:col-span-1">
				<span class="inline-flex bg-white rounded px-3 py-2">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php elseif ( herco_asset_exists( 'assets/herco-logo.png' ) ) : ?>
						<img src="<?php echo esc_url( herco_asset_url( 'assets/herco-logo.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-8 w-auto" width="276" height="61">
					<?php else : ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				</span>
				<p class="text-body-md font-body-md text-on-primary-fixed-variant mt-6 leading-relaxed"><?php esc_html_e( 'The Philippines\' trusted hardware and houseware distribution partner since 1908. Building the brands entrusted to us, nationwide.', 'herco' ); ?></p>
				<div class="flex gap-3 mt-6">
					<a class="w-10 h-10 border border-white/20 flex items-center justify-center hover:bg-industrial-gold hover:border-industrial-gold transition-all text-on-primary" href="https://www.facebook.com/HercoTradingPHOfficial" target="_blank" rel="noopener" aria-label="Facebook"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M14 9h3l.5-3H14V4.2c0-.9.3-1.5 1.6-1.5H17V.1C16.7 0 15.6 0 14.4 0 11.8 0 10 1.6 10 4.5V6H7v3h3v9h4V9Z"/></svg></a>
					<a class="w-10 h-10 border border-white/20 flex items-center justify-center hover:bg-industrial-gold hover:border-industrial-gold transition-all text-on-primary" href="https://www.lazada.com.ph/shop/herco-shop" target="_blank" rel="noopener" aria-label="Lazada"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 4 6v8l8 8 8-8V6l-8-4Zm0 3 4 2-4 2-4-2 4-2Z"/></svg></a>
					<a class="w-10 h-10 border border-white/20 flex items-center justify-center hover:bg-industrial-gold hover:border-industrial-gold transition-all text-on-primary" href="https://shopee.ph/hercotradingofficial" target="_blank" rel="noopener" aria-label="Shopee"><svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 8h14l-1 13H6L5 8Zm4 0a3 3 0 0 1 6 0" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
				</div>
			</div>
			<div>
				<h4 class="text-technical-caps font-technical-caps text-industrial-gold uppercase mb-6"><?php esc_html_e( 'Company', 'herco' ); ?></h4>
				<ul class="space-y-3">
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'about' ) ); ?>"><?php esc_html_e( 'About Us', 'herco' ); ?></a></li>
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'distribution' ) ); ?>"><?php esc_html_e( 'Distribution', 'herco' ); ?></a></li>
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>"><?php esc_html_e( 'Brands', 'herco' ); ?></a></li>
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Contact', 'herco' ); ?></a></li>
				</ul>
			</div>
			<div>
				<h4 class="text-technical-caps font-technical-caps text-industrial-gold uppercase mb-6"><?php esc_html_e( 'Channels', 'herco' ); ?></h4>
				<ul class="space-y-3">
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'distribution' ) . '#traditional' ); ?>"><?php esc_html_e( 'Traditional Stores', 'herco' ); ?></a></li>
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'distribution' ) . '#modern' ); ?>"><?php esc_html_e( 'Modern Retail', 'herco' ); ?></a></li>
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'distribution' ) . '#ecommerce' ); ?>"><?php esc_html_e( 'E-Commerce', 'herco' ); ?></a></li>
					<li><a class="text-body-md font-body-md text-on-primary-fixed-variant hover:text-white transition-colors" href="<?php echo esc_url( herco_page_url( 'distribution' ) . '#industrial' ); ?>"><?php esc_html_e( 'Industrial', 'herco' ); ?></a></li>
				</ul>
			</div>
			<div>
				<h4 class="text-technical-caps font-technical-caps text-industrial-gold uppercase mb-6"><?php esc_html_e( 'Get in touch', 'herco' ); ?></h4>
				<ul class="space-y-4">
					<li class="flex gap-3 text-body-md font-body-md text-on-primary-fixed-variant"><span class="material-symbols-outlined text-sm mt-0.5 text-industrial-gold">location_on</span><a class="hover:text-white transition-colors" href="https://maps.google.com/?q=Herco+Center+114+Benavidez+Makati" target="_blank" rel="noopener">8F Herco Center, 114 Benavidez St, Legaspi Village, Makati City 1229</a></li>
					<li class="flex gap-3 text-body-md font-body-md text-on-primary-fixed-variant"><span class="material-symbols-outlined text-sm mt-0.5 text-industrial-gold">call</span><a class="hover:text-white transition-colors" href="tel:+63288187736">(02) 8818-7736</a></li>
					<li class="flex gap-3 text-body-md font-body-md text-on-primary-fixed-variant"><span class="material-symbols-outlined text-sm mt-0.5 text-industrial-gold">mail</span><a class="hover:text-white transition-colors" href="mailto:info@herco.com.ph">info@herco.com.ph</a></li>
				</ul>
			</div>
		</div>
		<div class="border-t border-white/10">
			<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-6 flex flex-col md:flex-row justify-between items-center gap-3">
				<span class="text-body-md font-body-md text-on-primary-fixed-variant">&copy; <span data-year><?php echo esc_html( date_i18n( 'Y' ) ); ?></span> <?php esc_html_e( 'Herco Trading Inc. All rights reserved.', 'herco' ); ?></span>
				<span class="text-technical-caps font-technical-caps text-outline uppercase"><?php esc_html_e( 'Established 1908 · Makati City, Philippines', 'herco' ); ?></span>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>

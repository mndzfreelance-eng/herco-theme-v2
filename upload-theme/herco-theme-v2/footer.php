<?php
/**
 * Theme footer.
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$social_icons = array(
	'facebook' => array(
		'url'   => get_theme_mod( 'herco_facebook_url', get_theme_mod( 'herco_facebook', 'https://www.facebook.com/HercoTradingPHOfficial' ) ),
		'label' => __( 'Facebook', 'herco' ),
	),
	'lazada'   => array(
		'url'   => get_theme_mod( 'herco_lazada_url', get_theme_mod( 'herco_lazada', 'https://www.lazada.com.ph/shop/herco-shop' ) ),
		'label' => __( 'Lazada', 'herco' ),
	),
	'shopee'   => array(
		'url'   => get_theme_mod( 'herco_shopee_url', get_theme_mod( 'herco_shopee', 'https://shopee.ph/hercotradingofficial' ) ),
		'label' => __( 'Shopee', 'herco' ),
	),
	'tiktok'   => array(
		'url'   => get_theme_mod( 'herco_tiktok_url', '' ),
		'label' => __( 'TikTok', 'herco' ),
	),
);

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
					<?php foreach ( $social_icons as $name => $icon ) : ?>
						<?php
						$tag   = ! empty( $icon['url'] ) ? 'a' : 'div';
						$attrs = 'class="w-10 h-10 border border-white/20 flex items-center justify-center transition-all text-on-primary"';
						if ( 'a' === $tag ) {
							$attrs .= ' hover:bg-industrial-gold hover:border-industrial-gold';
							$attrs .= ' href="' . esc_url( $icon['url'] ) . '" target="_blank" rel="noopener" aria-label="' . esc_attr( $icon['label'] ) . '"';
						} else {
							$attrs .= ' opacity-50';
						}
						?>
						<<?php echo $tag; ?> <?php echo $attrs; ?>>
							<?php
							if ( function_exists( 'herco_render_social_icon' ) ) {
								herco_render_social_icon( $name );
							}
							?>
						</<?php echo $tag; ?>>
					<?php endforeach; ?>
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

<?php
/**
 * Template Name: Herco Distribution Page
 * Template Post Type: page
 *
 * Distribution page.
 *
 * @package Herco_Theme
 */

get_header();

$banner_url = herco_page_banner_url( 'herco_distribution_banner', 'assets/media/distribution-hero.jpg', 'page-banner' );
$cards      = function_exists( 'herco_dist_cards' ) ? herco_dist_cards() : array();
$images     = array();

foreach ( $cards as $card ) {
	$images[ $card['title'] ] = herco_get_image( $card['mod'], $card['placeholder'] );
}

$render_channel_visual = static function ( $image, $label ) {
	if ( empty( $image['is_placeholder'] ) ) {
		?>
		<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $label ); ?>" class="w-full h-full object-cover">
		<?php
		return;
	}
	?>
	<div class="w-full h-full bg-surface technical-grid flex flex-col items-center justify-center text-center p-4 text-on-surface-variant/50"><span class="material-symbols-outlined text-3xl text-heritage-navy/30">image</span><span class="text-technical-caps font-technical-caps uppercase mt-1"><?php echo esc_html( $label ); ?></span></div>
	<?php
};
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/70"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>"><a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a><span>/</span><span class="text-industrial-gold"><?php the_title(); ?></span></nav>
		<?php herco_render_editor_area( 'herco-distribution-hero-title', '<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6">' . esc_html__( 'One partner. Four channels. Every Filipino market.', 'herco' ) . '</h1>' ); ?>
		<?php herco_render_editor_area( 'herco-distribution-hero-desc', '<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl">' . esc_html__( 'From a neighborhood hardware store to the country\'s largest retail chains, online marketplaces and industrial job sites - Herco gets trusted brands where they need to be.', 'herco' ) . '</p>' ); ?>
	</div>
</section>

<section class="bg-surface pt-16 md:pt-20 px-margin-mobile md:px-margin-desktop">
	<div class="max-w-container-max mx-auto grid grid-cols-2 lg:grid-cols-4 gap-gutter">
		<a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#traditional"><h3 class="font-subheading text-subheading text-heritage-navy"><?php esc_html_e( 'Traditional Stores', 'herco' ); ?></h3><span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span></a>
		<a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#modern"><h3 class="font-subheading text-subheading text-heritage-navy"><?php esc_html_e( 'Modern Retail', 'herco' ); ?></h3><span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span></a>
		<a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#ecommerce"><h3 class="font-subheading text-subheading text-heritage-navy"><?php esc_html_e( 'E-Commerce', 'herco' ); ?></h3><span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span></a>
		<a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#industrial"><h3 class="font-subheading text-subheading text-heritage-navy"><?php esc_html_e( 'Industrial', 'herco' ); ?></h3><span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span></a>
	</div>
</section>

<section class="py-section-gap bg-surface hairline-grid" id="traditional" style="scroll-margin-top:90px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
			<div>
				<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mb-6"><?php esc_html_e( 'Traditional Stores', 'herco' ); ?></h2>
				<?php herco_render_editor_area( 'herco-distribution-traditional-desc', '<p class="font-body-lg text-body-lg text-on-surface-variant mb-8">' . esc_html__( 'Herco has built strong partnerships with hundreds of traditional hardware stores across the Philippines - ensuring reliable distribution of trusted tools and building materials to local communities.', 'herco' ) . '</p>' ); ?>
				<ul class="space-y-5">
					<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Competitive trade pricing', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Margins that keep neighborhood stores profitable and competitive.', 'herco' ); ?></p></div></li>
					<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Reliable resupply', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Consistent stock of fast-moving SKUs, delivered on schedule.', 'herco' ); ?></p></div></li>
				</ul>
			</div>
			<div class="relative aspect-[4/3] border border-border-gray overflow-hidden">
				<?php $render_channel_visual( $images['Traditional Stores'] ?? array( 'is_placeholder' => true ), __( 'Traditional hardware store', 'herco' ) ); ?>
			</div>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface-container-lowest border-y border-border-gray" id="modern" style="scroll-margin-top:90px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
			<div class="relative aspect-[4/3] border border-border-gray overflow-hidden order-2 lg:order-1">
				<?php $render_channel_visual( $images['Modern Retail'] ?? array( 'is_placeholder' => true ), __( 'Modern retail aisle', 'herco' ) ); ?>
			</div>
			<div class="order-1 lg:order-2">
				<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mb-6"><?php esc_html_e( 'Modern Retail', 'herco' ); ?></h2>
				<?php herco_render_editor_area( 'herco-distribution-modern-desc', '<p class="font-body-lg text-body-lg text-on-surface-variant mb-6">' . esc_html__( 'Herco partners with the country\'s leading modern hardware retailers - supporting 200+ locations with delivery, marketing and in-store training.', 'herco' ) . '</p>' ); ?>
				<p class="font-subheading text-subheading text-heritage-navy mb-4"><?php esc_html_e( 'Retail partners include:', 'herco' ); ?></p>
				<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
					<?php
					$retail_partners = array(
						array(
							'name'     => 'Wilcon Depot',
							'logo_mod' => 'herco_partner_logo_wilcon',
						),
						array(
							'name'     => 'Handyman',
							'logo_mod' => 'herco_partner_logo_handyman',
						),
						array(
							'name'     => 'Do-it-Best',
							'logo_mod' => 'herco_partner_logo_doitbest',
						),
						array(
							'name'     => 'True Value',
							'logo_mod' => 'herco_partner_logo_truevalue',
						),
						array(
							'name'     => 'Robinsons Builders',
							'logo_mod' => 'herco_partner_logo_robinsons',
						),
					);
					foreach ( $retail_partners as $partner ) :
						$logo_id  = get_theme_mod( $partner['logo_mod'] );
						$logo_url = $logo_id ? wp_get_attachment_image_url( (int) $logo_id, 'medium' ) : '';
						?>
						<div class="bg-white border border-border-gray rounded-lg p-4 flex items-center justify-center h-24 text-center">
							<?php if ( $logo_url ) : ?>
								<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>" class="max-h-10 w-auto object-contain" title="<?php echo esc_attr( $partner['name'] ); ?>">
							<?php else : ?>
								<span class="text-label-md font-label-md text-on-surface"><?php echo esc_html( $partner['name'] ); ?></span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface" id="ecommerce" style="scroll-margin-top:90px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
			<div>
				<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mb-6"><?php esc_html_e( 'E-Commerce', 'herco' ); ?></h2>
				<?php herco_render_editor_area( 'herco-distribution-ecommerce-desc', '<p class="font-body-lg text-body-lg text-on-surface-variant mb-6">' . esc_html__( 'Herco expanded into e-commerce in 2020, making trusted hardware products available nationwide through the Philippines\' top platforms - integrated with advanced logistics and inventory systems.', 'herco' ) . '</p>' ); ?>
				<div class="mb-8">
					<p class="font-subheading text-subheading text-heritage-navy mb-4"><?php esc_html_e( 'Platforms we operate', 'herco' ); ?></p>
					<div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
						<a class="group border border-border-gray bg-surface-container-lowest p-4 hover:border-industrial-gold transition-colors" href="https://www.lazada.com.ph/shop/herco-shop" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Visit Herco on Lazada', 'herco' ); ?>">
							<div class="flex items-center justify-between gap-3 mb-5">
								<span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[linear-gradient(135deg,#5f33ff,#ff8a00)] text-white font-semibold">L</span>
								<span class="material-symbols-outlined text-industrial-gold text-base group-hover:translate-x-0.5 transition-transform">north_east</span>
							</div>
							<strong class="block text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Lazada', 'herco' ); ?></strong>
							<span class="block text-body-sm font-body-sm text-on-surface-variant mt-1"><?php esc_html_e( 'Official storefront', 'herco' ); ?></span>
						</a>
						<a class="group border border-border-gray bg-surface-container-lowest p-4 hover:border-industrial-gold transition-colors" href="https://shopee.ph/hercotradingofficial" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Visit Herco on Shopee', 'herco' ); ?>">
							<div class="flex items-center justify-between gap-3 mb-5">
								<span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[linear-gradient(135deg,#ff6a00,#f39221)] text-white font-semibold">S</span>
								<span class="material-symbols-outlined text-industrial-gold text-base group-hover:translate-x-0.5 transition-transform">north_east</span>
							</div>
							<strong class="block text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Shopee', 'herco' ); ?></strong>
							<span class="block text-body-sm font-body-sm text-on-surface-variant mt-1"><?php esc_html_e( 'Official storefront', 'herco' ); ?></span>
						</a>
						<div class="border border-border-gray bg-surface-container-lowest p-4">
							<div class="flex items-center justify-between gap-3 mb-5">
								<span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[linear-gradient(135deg,#0f172a,#384252)] text-white font-semibold">T</span>
								<span class="material-symbols-outlined text-industrial-gold text-base">storefront</span>
							</div>
							<strong class="block text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'TikTok Shop', 'herco' ); ?></strong>
							<span class="block text-body-sm font-body-sm text-on-surface-variant mt-1"><?php esc_html_e( 'Marketplace channel', 'herco' ); ?></span>
						</div>
					</div>
				</div>
				<ul class="space-y-5">
					<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Official storefronts', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Authentic products, sold and fulfilled by Herco - protecting brand integrity online.', 'herco' ); ?></p></div></li>
					<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Integrated fulfilment', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'One inventory backbone across marketplace, retail and trade.', 'herco' ); ?></p></div></li>
				</ul>
			</div>
			<div class="border border-border-gray bg-surface-container-lowest p-6 md:p-7 self-stretch flex flex-col justify-between">
				<div>
					<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
						<div>
							<p class="font-subheading text-subheading text-heritage-navy"><?php esc_html_e( 'Social proof and reviews', 'herco' ); ?></p>
							<p class="text-body-sm font-body-sm text-on-surface-variant mt-1"><?php esc_html_e( 'Mockup only. These figures can later be populated dynamically in PHP.', 'herco' ); ?></p>
						</div>
						<span class="inline-flex items-center gap-2 text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><span class="w-1.5 h-1.5 rounded-full bg-industrial-gold"></span> <?php esc_html_e( 'Placeholder data', 'herco' ); ?></span>
					</div>
					<div class="space-y-3">
						<div class="border border-border-gray bg-surface px-4 py-4">
							<div class="flex items-center justify-between gap-3">
								<strong class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Lazada', 'herco' ); ?></strong>
								<span class="inline-flex items-center gap-1 text-industrial-gold text-body-sm font-body-sm"><span class="material-symbols-outlined text-base">star</span>4.8</span>
							</div>
							<p class="text-body-sm font-body-sm text-on-surface-variant mt-3"><?php esc_html_e( '52k followers - 12.4k reviews - verified storefront', 'herco' ); ?></p>
						</div>
						<div class="border border-border-gray bg-surface px-4 py-4">
							<div class="flex items-center justify-between gap-3">
								<strong class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Shopee', 'herco' ); ?></strong>
								<span class="inline-flex items-center gap-1 text-industrial-gold text-body-sm font-body-sm"><span class="material-symbols-outlined text-base">star</span>4.9</span>
							</div>
							<p class="text-body-sm font-body-sm text-on-surface-variant mt-3"><?php esc_html_e( '68k followers - 18.1k reviews - mall verified', 'herco' ); ?></p>
						</div>
						<div class="border border-border-gray bg-surface px-4 py-4">
							<div class="flex items-center justify-between gap-3">
								<strong class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'TikTok Shop', 'herco' ); ?></strong>
								<span class="inline-flex items-center gap-1 text-industrial-gold text-body-sm font-body-sm"><span class="material-symbols-outlined text-base">favorite</span>4.7</span>
							</div>
							<p class="text-body-sm font-body-sm text-on-surface-variant mt-3"><?php esc_html_e( '41k followers - 7.6k reviews - live-selling ready', 'herco' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface-container-lowest border-y border-border-gray" id="industrial" style="scroll-margin-top:90px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
			<div class="relative aspect-[4/3] border border-border-gray overflow-hidden order-2 lg:order-1">
				<?php $render_channel_visual( $images['Industrial'] ?? array( 'is_placeholder' => true ), __( 'Industrial supply', 'herco' ) ); ?>
			</div>
			<div class="order-1 lg:order-2">
				<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mb-6"><?php esc_html_e( 'Industrial', 'herco' ); ?></h2>
				<?php herco_render_editor_area( 'herco-distribution-industrial-desc', '<p class="font-body-lg text-body-lg text-on-surface-variant mb-8">' . esc_html__( 'Herco is a trusted supplier to the industrial sector - providing high-quality hardware, tools and construction materials to manufacturing companies, contractors and government projects across the Philippines.', 'herco' ) . '</p>' ); ?>
				<ul class="space-y-5">
					<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Project-scale supply', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Bulk fulfilment and dependable lead times for contractors and manufacturers.', 'herco' ); ?></p></div></li>
					<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Government-ready', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Compliant sourcing and documentation for public-sector projects.', 'herco' ); ?></p></div></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="bg-heritage-navy py-section-gap text-white relative overflow-hidden">
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10 text-center max-w-3xl">
		<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'The backbone', 'herco' ); ?></span>
		<?php herco_render_editor_area( 'herco-distribution-logistics-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mt-4 mb-6">' . esc_html__( 'Owned logistics across every channel.', 'herco' ) . '</h2>' ); ?>
		<?php herco_render_editor_area( 'herco-distribution-logistics-desc', '<p class="font-body-lg text-body-lg text-stucco-white/80">' . esc_html__( 'A single logistics and inventory backbone serves all four channels - so principals get consistent reach, and partners get consistent service.', 'herco' ) . '</p>' ); ?>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="bg-surface-container-lowest border border-border-gray p-12 md:p-20 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-10" data-reveal>
			<div class="absolute top-0 right-0 opacity-5 pointer-events-none"><span class="material-symbols-outlined text-[120px] text-heritage-navy">conveyor_belt</span></div>
			<div class="max-w-xl relative z-10">
				<?php herco_render_editor_area( 'herco-distribution-cta-title', '<h2 class="font-headline-lg text-headline-lg text-heritage-navy mb-4">' . esc_html__( 'Which channel fits your brand?', 'herco' ) . '</h2>' ); ?>
				<?php herco_render_editor_area( 'herco-distribution-cta-desc', '<p class="font-body-md text-body-md text-on-surface-variant">' . esc_html__( 'Tell us about your products and target markets - we\'ll map the right route to shelf.', 'herco' ) . '</p>' ); ?>
			</div>
			<div class="flex flex-col sm:flex-row gap-4 relative z-10">
				<a class="inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-8 py-3.5 hover:bg-heritage-navy/90 transition-colors" href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Talk to our team', 'herco' ); ?></a>
				<a class="inline-flex items-center justify-center border border-border-gray text-on-surface text-label-md font-label-md rounded px-8 py-3.5 hover:bg-surface transition-colors" href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>"><?php esc_html_e( 'See who we represent', 'herco' ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
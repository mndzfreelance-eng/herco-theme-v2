<?php
/**
 * Front page template based on the mockup index.html design.
 *
 * @package Herco_Theme
 */

get_header();

$marquee_brands = array();
$all_brands     = array();
if ( function_exists( 'herco_get_brand_tiles' ) ) {
	$all_brands = herco_get_brand_tiles();
	if ( ! empty( $all_brands ) ) {
		$marquee_brands = array_filter(
			$all_brands,
			function( $brand ) {
				return ! empty( $brand['logo'] ) && function_exists( 'herco_is_placeholder_src' ) && ! herco_is_placeholder_src( $brand['logo'] );
			}
		);
	}
}
$brand_count = ! empty( $all_brands ) ? count( $all_brands ) : 50;

// Fallback to names if no logos are available.
$brand_names = array();
if ( empty( $marquee_brands ) ) {
	$brand_names = function_exists( 'herco_brands_fallback_names' ) ? herco_brands_fallback_names() : array( '3M', 'WD-40', 'Bosch', 'DeWalt', 'Stanley', 'Bahco', 'Yale', 'Briggs & Stratton', 'Black+Decker', 'Armor All', 'Devcon', 'Dorma' );
}
$dist_cards  = function_exists( 'herco_dist_cards' ) ? herco_dist_cards() : array();
?>

<section class="bg-heritage-navy relative overflow-hidden">
	<div class="absolute inset-0 bg-slate-black">
		<?php if ( herco_asset_exists( 'assets/media/home-banner.mp4' ) ) : ?>
			<video class="h-full w-full object-cover object-center" autoplay muted loop playsinline preload="metadata" <?php if ( herco_asset_exists( 'assets/media/about-hero.jpg' ) ) : ?>poster="<?php echo esc_url( herco_asset_url( 'assets/media/about-hero.jpg' ) ); ?>"<?php endif; ?> aria-hidden="true">
				<source src="<?php echo esc_url( herco_asset_url( 'assets/media/home-banner.mp4' ) ); ?>" type="video/mp4">
			</video>
		<?php endif; ?>
		<div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(247,148,30,0.22),transparent_26%),linear-gradient(100deg,rgba(14,15,15,0.52),rgba(14,15,15,0.28)_36%,rgba(14,15,15,0.6)_100%),linear-gradient(135deg,rgba(37,39,107,0.54),rgba(26,27,75,0.74))]"></div>
		<div class="absolute inset-0 technical-grid opacity-15 mix-blend-screen"></div>
	</div>
	<div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-heritage-navy/70 to-transparent"></div>
	<div class="relative z-10 w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-28 md:py-36 lg:py-40">
		<div class="max-w-[48rem] text-center lg:text-left">
			<span class="inline-block text-industrial-gold text-technical-caps font-technical-caps mb-6 tracking-widest uppercase"><?php esc_html_e( 'Trusted Distribution Partner Since 1908', 'herco' ); ?></span>
			<h1 class="text-headline-lg-mobile md:text-display-lg lg:text-[64px] lg:leading-[1.05] font-display-lg text-on-primary mb-7 md:mb-8 max-w-4xl mx-auto lg:mx-0"><?php esc_html_e( 'The hardware brands the Philippines trusts', 'herco' ); ?> <span class="text-industrial-gold"><?php esc_html_e( 'delivered nationwide.', 'herco' ); ?></span></h1>
			<p class="text-body-lg font-body-lg text-stucco-white/90 max-w-2xl mx-auto lg:mx-0 mb-8 md:mb-9"><?php esc_html_e( 'Herco Trading helps global hardware brands win in the Philippines through nationwide distribution, modern retail coverage, and dependable channel execution.', 'herco' ); ?></p>
			<div class="flex flex-col sm:flex-row items-center lg:items-start justify-center lg:justify-start gap-4">
				<a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-industrial-gold text-heritage-navy text-label-md font-label-md rounded px-8 py-3.5 hover:bg-industrial-gold/90 transition-colors" href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Become a partner', 'herco' ); ?> <span class="material-symbols-outlined text-base">arrow_forward</span></a>
				<a class="w-full sm:w-auto inline-flex items-center justify-center bg-transparent border border-on-primary/40 text-on-primary text-label-md font-label-md rounded px-8 py-3.5 hover:bg-on-primary/10 transition-colors" href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>"><?php esc_html_e( 'Explore our brands', 'herco' ); ?></a>
			</div>
			<div class="mt-12 inline-flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-8 border border-white/10 bg-white/8 backdrop-blur-sm rounded-xl px-6 py-4 text-left shadow-lg shadow-black/10"></div>
		</div>
	</div>
</section>

<section class="relative z-20 -mt-20 px-margin-mobile md:px-margin-desktop">
	<div class="stat-band max-w-container-max mx-auto overflow-hidden rounded-[1.1rem] border border-heritage-navy/10 bg-white shadow-[0_18px_52px_rgba(26,27,75,0.10)]" data-reveal data-counter-group>
		<div class="stat-band-accent h-1 bg-gradient-to-r from-industrial-gold/90 via-heritage-navy/60 to-industrial-gold/90"></div>
		<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4">
			<div class="stat-cell p-8 md:p-9 border-b sm:border-r xl:border-b-0 border-border-gray text-left"><p class="text-technical-caps font-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Brands', 'herco' ); ?></p><div class="mt-5 font-display-lg text-[52px] leading-none text-heritage-navy tracking-[-0.04em] tabular-nums"><span data-counter-target="<?php echo esc_attr( $brand_count ); ?>">0</span><span class="text-industrial-gold">+</span></div><div class="metric-divider w-10 h-px bg-heritage-navy/20 mt-5"></div><p class="text-body-md font-body-md text-on-surface-variant mt-4 max-w-[15rem]"><?php esc_html_e( 'Global brands carried across hardware and home improvement.', 'herco' ); ?></p></div>
			<div class="stat-cell p-8 md:p-9 border-b xl:border-b-0 xl:border-r border-border-gray text-left"><p class="text-technical-caps font-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Experience', 'herco' ); ?></p><div class="mt-5 font-display-lg text-[52px] leading-none text-heritage-navy tracking-[-0.04em] tabular-nums"><span data-counter-target="117">0</span><span class="text-industrial-gold">+</span></div><div class="metric-divider w-10 h-px bg-heritage-navy/20 mt-5"></div><p class="text-body-md font-body-md text-on-surface-variant mt-4 max-w-[15rem]"><?php esc_html_e( 'Years building distribution relationships in the Philippine market.', 'herco' ); ?></p></div>
			<div class="stat-cell p-8 md:p-9 border-b sm:border-r sm:border-b-0 xl:border-r border-border-gray text-left"><p class="text-technical-caps font-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Employees', 'herco' ); ?></p><div class="mt-5 font-display-lg text-[52px] leading-none text-heritage-navy tracking-[-0.04em] tabular-nums"><span data-counter-target="300">0</span><span class="text-industrial-gold">+</span></div><div class="metric-divider w-10 h-px bg-heritage-navy/20 mt-5"></div><p class="text-body-md font-body-md text-on-surface-variant mt-4 max-w-[15rem]"><?php esc_html_e( 'Teams across sales, logistics, warehousing, and customer support.', 'herco' ); ?></p></div>
			<div class="stat-cell p-8 md:p-9 text-left"><p class="text-technical-caps font-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Retail Locations', 'herco' ); ?></p><div class="mt-5 font-display-lg text-[52px] leading-none text-heritage-navy tracking-[-0.04em] tabular-nums"><span data-counter-target="200">0</span><span class="text-industrial-gold">+</span></div><div class="metric-divider w-10 h-px bg-heritage-navy/20 mt-5"></div><p class="text-body-md font-body-md text-on-surface-variant mt-4 max-w-[15rem]"><?php esc_html_e( 'Modern retail doors supported by nationwide fulfillment.', 'herco' ); ?></p></div>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface-container-lowest relative">
	<div class="absolute inset-0 who-we-are-proof-pattern pointer-events-none"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1.02fr)_minmax(0,0.98fr)] gap-12 xl:gap-16 who-we-are-proof items-center">
			<div class="who-we-are-proof-media" data-reveal>
				<div class="who-we-are-proof-frame technical-grid">
					<div class="who-we-are-proof-frame-line"></div>
					<div class="who-we-are-proof-placeholder">
						<img class="who-we-are-proof-image" src="<?php echo esc_url( herco_theme_image_url( 'herco_home_about_image', 'about', 'assets/media/who-we-are.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Herco Trading operations and distribution network', 'herco' ); ?>">
						<div class="who-we-are-proof-placeholder-meta"><span class="text-technical-caps font-technical-caps uppercase text-white/75"><?php esc_html_e( 'Since 1908', 'herco' ); ?></span><span class="text-technical-caps font-technical-caps uppercase text-white/75">Herco Trading</span></div>
					</div>
					<div class="who-we-are-proof-frame-bottom"><p class="text-technical-caps font-technical-caps uppercase text-heritage-navy/70"><?php esc_html_e( 'Heritage, distribution and trade relationships', 'herco' ); ?></p><p class="text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'A long-standing business built around dependable delivery, practical support and continuity across generations.', 'herco' ); ?></p></div>
				</div>
			</div>
			<div class="who-we-are-proof-content" data-reveal>
				<span class="text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Who we are', 'herco' ); ?></span>
				<h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-heritage-navy mt-4 mb-5"><?php esc_html_e( 'From one Binondo storefront to a nationwide distribution network.', 'herco' ); ?></h2>
				<p class="text-body-lg font-body-lg text-on-surface-variant max-w-2xl"><?php esc_html_e( 'Herco Trading began in 1908 as a single hardware store in Binondo, Manila. More than a century later, we remain family-led and hands-on, helping global brands reach traditional trade, modern retail and industrial customers across the country.', 'herco' ); ?></p>
				<div class="who-we-are-proof-footer mt-8">
					<div class="who-we-are-proof-stats" aria-label="<?php esc_attr_e( 'Herco company highlights', 'herco' ); ?>">
						<div class="who-we-are-proof-stat"><span class="who-we-are-proof-stat-value">1908</span><span class="who-we-are-proof-stat-label"><?php esc_html_e( 'Established in Binondo, Manila', 'herco' ); ?></span></div>
						<div class="who-we-are-proof-stat"><span class="who-we-are-proof-stat-value">5th Gen</span><span class="who-we-are-proof-stat-label"><?php esc_html_e( 'Family-led continuity', 'herco' ); ?></span></div>
						<div class="who-we-are-proof-stat"><span class="who-we-are-proof-stat-value"><?php esc_html_e( 'Across PH', 'herco' ); ?></span><span class="who-we-are-proof-stat-label"><?php esc_html_e( 'Serving trade, retail and industrial customers', 'herco' ); ?></span></div>
					</div>
					<div class="who-we-are-ceo-perspective"><p class="who-we-are-ceo-label text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'CEO Perspective', 'herco' ); ?></p><p class="who-we-are-ceo-quote text-body-md font-body-md text-heritage-navy"><?php esc_html_e( '"Our history matters because it has taught us how to build lasting relationships, serve customers well and grow with the brands that trust us."', 'herco' ); ?></p><div class="flex flex-wrap items-center gap-4 justify-between"><p class="who-we-are-proof-note text-body-sm font-body-sm text-on-surface-variant"><?php esc_html_e( 'A heritage business shaped by continuity, practical leadership and long-term partnership.', 'herco' ); ?></p><a class="inline-flex items-center gap-2 text-industrial-gold text-label-md font-label-md hover:gap-3 transition-all" href="<?php echo esc_url( herco_page_url( 'about' ) ); ?>"><?php esc_html_e( 'Learn More About Us', 'herco' ); ?> <span class="material-symbols-outlined text-base">arrow_forward</span></a></div></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="max-w-2xl mb-16" data-reveal>
			<span class="text-technical-caps font-technical-caps text-heritage-navy uppercase tracking-widest"><?php esc_html_e( 'Distribution channels', 'herco' ); ?></span>
			<h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-heritage-navy mt-4 mb-4"><?php esc_html_e( 'Four routes to every Filipino market.', 'herco' ); ?></h2>
			<div class="w-16 h-1 bg-industrial-gold mb-6"></div>
			<p class="text-body-lg font-body-lg text-on-surface-variant"><?php esc_html_e( 'Whatever your retail footprint, Herco has a proven channel to move your products backed by the same logistics, marketing and service standard.', 'herco' ); ?></p>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
			<?php foreach ( $dist_cards as $index => $card ) : ?>
				<div class="group bg-surface-container-lowest border border-border-gray relative overflow-hidden hover:border-industrial-gold transition-colors duration-300 flex flex-col" data-reveal>
					<div class="aspect-[4/5] overflow-hidden relative">
						<img src="<?php echo esc_url( herco_theme_image_url( $card['mod'], $card['placeholder'], '' ) ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" class="w-full h-full object-cover">
						<?php if ( herco_is_placeholder_src( herco_theme_image_url( $card['mod'], $card['placeholder'], '' ) ) ) : ?>
							<div class="absolute inset-0 bg-heritage-navy/10 technical-grid"></div>
						<?php endif; ?>
					</div>
					<div class="p-6 flex-1 flex flex-col"><h3 class="text-subheading font-subheading text-heritage-navy mb-3"><?php echo esc_html( $card['title'] ); ?></h3><p class="text-body-md font-body-md text-on-surface-variant flex-1"><?php echo esc_html( $card['desc'] ); ?></p><a class="mt-6 flex items-center text-industrial-gold text-label-md font-label-md group-hover:gap-2 transition-all" href="<?php echo esc_url( herco_page_url( 'distribution' ) . '#' . sanitize_title( str_replace( ' ', '-', strtolower( $card['title'] ) ) ) ); ?>"><span><?php esc_html_e( 'Learn more', 'herco' ); ?></span><span class="material-symbols-outlined text-sm ml-1">arrow_forward</span></a></div>
					<div class="absolute top-0 left-0 w-2 h-2 border-t-2 border-l-2 border-industrial-gold opacity-0 group-hover:opacity-100 transition-opacity"></div><div class="absolute bottom-0 right-0 w-2 h-2 border-b-2 border-r-2 border-industrial-gold opacity-0 group-hover:opacity-100 transition-opacity"></div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="mt-12"><a class="inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-8 py-3.5 hover:bg-heritage-navy/90 transition-colors" href="<?php echo esc_url( herco_page_url( 'distribution' ) ); ?>"><?php esc_html_e( 'See how each channel works', 'herco' ); ?></a></div>
	</div>
</section>

<section class="py-section-gap bg-surface-container-lowest border-y border-border-gray">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center mb-12">
		<span class="text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Our principals', 'herco' ); ?></span>
		<h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-heritage-navy mt-4"><?php esc_html_e( '50+ world-class brands under one roof.', 'herco' ); ?></h2>
	</div>
	<?php if ( ! empty( $marquee_brands ) ) : ?>
		<div class="marquee" aria-label="<?php esc_attr_e( 'Brands distributed by Herco', 'herco' ); ?>">
			<div class="marquee-track">
				<?php for ( $i = 0; $i < 2; $i++ ) : ?>
					<?php foreach ( $marquee_brands as $brand ) : ?>
						<a href="<?php echo esc_url( $brand['url'] ); ?>" title="<?php echo esc_attr( $brand['name'] ); ?>" class="marquee-item">
							<img src="<?php echo esc_url( $brand['logo'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" class="h-10 lg:h-12 w-auto object-contain">
						</a>
					<?php endforeach; ?>
				<?php endfor; ?>
			</div>
		</div>
	<?php elseif ( ! empty( $brand_names ) ) : ?>
		<div class="marquee" aria-label="<?php esc_attr_e( 'Brands distributed by Herco', 'herco' ); ?>">
			<div class="marquee-track text-2xl font-bold tracking-tight text-slate-black/70">
				<?php for ( $i = 0; $i < 2; $i++ ) : ?>
					<?php foreach ( $brand_names as $brand_name ) : ?>
						<span class="marquee-item"><?php echo esc_html( $brand_name ); ?></span>
					<?php endforeach; ?>
				<?php endfor; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center mt-12"><a class="inline-flex items-center gap-2 text-industrial-gold text-label-md font-label-md hover:gap-3 transition-all" href="<?php echo esc_url( herco_page_url( 'brands' ) ); ?>"><?php esc_html_e( 'View the full brand portfolio', 'herco' ); ?> <span class="material-symbols-outlined text-base">arrow_forward</span></a></div>
</section>

<section class="py-section-gap bg-surface-container-lowest">
	<h2 class="sr-only"><?php esc_html_e( 'Customer rating cards and sample reviews for Lazada, Shopee and TikTok Shop showing star ratings, follower counts and review counts.', 'herco' ); ?></h2>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<p class="text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Where to find us', 'herco' ); ?></p>
		<h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-heritage-navy mt-4"><?php esc_html_e( 'Your gateway to the Philippines\' leading marketplaces.', 'herco' ); ?></h2>
		<p class="text-body-lg font-body-lg text-on-surface-variant mt-6"><?php esc_html_e( 'Herco gives partner brands direct access to Filipino consumers through established official stores on Lazada, Shopee, and TikTok Shop.', 'herco' ); ?></p>
		<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mt-12">
			<?php foreach ( array(
				array( 'Lazada', 'LazMall Official Store', '4.8', '45K+', '12K+', '96%', 'linear-gradient(135deg,#5f33ff,#ff8a00)' ),
				array( 'Shopee', 'Shopee Mall Official', '4.9', '38K+', '9K+', '98%', 'linear-gradient(135deg,#ff6a00,#f39221)' ),
				array( 'TikTok Shop', 'Verified Seller', '4.7', '22K+', '5K+', '94%', 'linear-gradient(135deg,#0f172a,#384252)' ),
			) as $card ) : ?>
				<article class="bg-surface-container-lowest border border-border-gray p-8 group hover:border-industrial-gold transition-colors"><div class="flex items-center justify-between gap-4 mb-6"><div class="flex items-center gap-4"><div class="w-12 h-12 flex items-center justify-center rounded-full text-white" style="background:<?php echo esc_attr( $card[6] ); ?>" aria-hidden="true"><span class="font-headline-lg text-lg"><?php echo esc_html( substr( $card[0], 0, 1 ) ); ?></span></div><div><div class="text-subheading font-subheading text-heritage-navy"><?php echo esc_html( $card[0] ); ?></div><div class="text-body-sm font-body-sm text-on-surface-variant"><?php echo esc_html( $card[1] ); ?></div></div></div><span class="inline-flex items-center gap-2 text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest border border-industrial-gold/25 bg-industrial-gold/5 px-3 py-2"><?php esc_html_e( 'Official store', 'herco' ); ?></span></div><div><div class="flex items-baseline gap-1"><span class="text-display-lg text-heritage-navy"><?php echo esc_html( $card[2] ); ?></span><span class="text-body-md font-body-md text-on-surface-variant">/ 5.0</span></div><div class="relative w-24 h-4 overflow-hidden" role="img" aria-label="<?php echo esc_attr( $card[2] . ' out of 5 stars' ); ?>" style="margin-top:10px;"><span class="absolute top-0 left-0 text-border-gray text-xl leading-none">&#9733;&#9733;&#9733;&#9733;&#9733;</span><span class="absolute top-0 left-0 text-industrial-gold text-xl leading-none overflow-hidden" style="width:<?php echo esc_attr( $card[5] ); ?>;">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div></div><div class="w-full h-px bg-border-gray my-6"></div><div class="flex justify-between items-center"><div class="text-center"><div class="text-headline-lg-mobile font-headline-lg text-heritage-navy"><?php echo esc_html( $card[3] ); ?></div><div class="text-body-md font-body-md text-on-surface-variant"><?php esc_html_e( 'Followers', 'herco' ); ?></div></div><div class="text-center"><div class="text-headline-lg-mobile font-headline-lg text-heritage-navy"><?php echo esc_html( $card[4] ); ?></div><div class="text-body-md font-body-md text-on-surface-variant"><?php esc_html_e( 'Reviews', 'herco' ); ?></div></div></div></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="testimonial-section py-section-gap bg-surface-container-lowest border-y border-border-gray overflow-hidden relative">
	<div class="testimonial-section-orb testimonial-section-orb--gold" aria-hidden="true"></div>
	<div class="testimonial-section-orb testimonial-section-orb--navy" aria-hidden="true"></div>
	<div class="testimonial-section-pattern" aria-hidden="true"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop"><div class="grid grid-cols-1 lg:grid-cols-[minmax(0,0.8fr)_minmax(0,1.2fr)] gap-10 xl:gap-14 items-start"><div class="max-w-xl relative z-10" data-reveal><span class="text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Partner and channel quotes', 'herco' ); ?></span><h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-heritage-navy mt-4 mb-5"><?php esc_html_e( 'What our partners say about working with Herco.', 'herco' ); ?></h2><p class="text-body-lg font-body-lg text-on-surface-variant"><?php esc_html_e( 'A mockup section for distributor and retail-partner testimonials, designed to become dynamic later without changing the layout pattern.', 'herco' ); ?></p></div><div class="testimonial-slider-shell border border-border-gray bg-surface p-6 md:p-8 relative overflow-hidden z-10" data-reveal data-testimonial-slider><div class="absolute inset-0 opacity-[0.07] pointer-events-none hairline-grid"></div><div class="relative z-10"><div class="flex items-center justify-between gap-4 mb-8"><p class="text-technical-caps font-technical-caps text-heritage-navy/70 uppercase tracking-widest"><?php esc_html_e( 'Partner voices', 'herco' ); ?></p><div class="flex items-center gap-2"><button type="button" class="testimonial-slider-button w-11 h-11 border border-border-gray bg-surface-container-lowest text-heritage-navy hover:border-industrial-gold transition-colors" data-testimonial-prev aria-label="<?php esc_attr_e( 'Previous quote', 'herco' ); ?>"><span class="material-symbols-outlined text-base">west</span></button><button type="button" class="testimonial-slider-button w-11 h-11 border border-border-gray bg-surface-container-lowest text-heritage-navy hover:border-industrial-gold transition-colors" data-testimonial-next aria-label="<?php esc_attr_e( 'Next quote', 'herco' ); ?>"><span class="material-symbols-outlined text-base">east</span></button></div></div><div class="space-y-6"><article class="testimonial-slide-frame" data-testimonial-slide><div class="flex items-start justify-between gap-4 mb-6"><span class="testimonial-quote-mark text-industrial-gold text-5xl leading-none font-display-lg">“</span><span class="inline-flex items-center gap-2 text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest border border-industrial-gold/25 bg-industrial-gold/5 px-3 py-2"><?php esc_html_e( 'Modern Retail', 'herco' ); ?></span></div><p class="text-[1.55rem] leading-[1.5] md:text-[1.8rem] font-display-lg text-heritage-navy max-w-3xl"><?php esc_html_e( 'Herco is one of the few distribution partners that combines steady supply, responsive account management and real follow-through at store level.', 'herco' ); ?></p></article><article class="testimonial-slide-frame hidden" data-testimonial-slide><div class="flex items-start justify-between gap-4 mb-6"><span class="testimonial-quote-mark text-industrial-gold text-5xl leading-none font-display-lg">“</span><span class="inline-flex items-center gap-2 text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest border border-industrial-gold/25 bg-industrial-gold/5 px-3 py-2"><?php esc_html_e( 'Traditional Trade', 'herco' ); ?></span></div><p class="text-[1.55rem] leading-[1.5] md:text-[1.8rem] font-display-lg text-heritage-navy max-w-3xl"><?php esc_html_e( 'Our branches trust Herco because commitments are clear, deliveries are dependable and the brands they carry continue to move well in the market.', 'herco' ); ?></p></article><article class="testimonial-slide-frame hidden" data-testimonial-slide><div class="flex items-start justify-between gap-4 mb-6"><span class="testimonial-quote-mark text-industrial-gold text-5xl leading-none font-display-lg">“</span><span class="inline-flex items-center gap-2 text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest border border-industrial-gold/25 bg-industrial-gold/5 px-3 py-2"><?php esc_html_e( 'E-Commerce', 'herco' ); ?></span></div><p class="text-[1.55rem] leading-[1.5] md:text-[1.8rem] font-display-lg text-heritage-navy max-w-3xl"><?php esc_html_e( 'When we evaluate marketplace execution, Herco stands out for keeping inventory disciplined while still moving quickly on promotions and customer demand.', 'herco' ); ?></p></article></div><div class="mt-8 flex items-center gap-2" aria-label="<?php esc_attr_e( 'Testimonial slide controls', 'herco' ); ?>"><button type="button" class="testimonial-slider-dot w-10 h-1.5 bg-heritage-navy" data-testimonial-dot aria-label="<?php esc_attr_e( 'Show first quote', 'herco' ); ?>" aria-current="true"></button><button type="button" class="testimonial-slider-dot w-10 h-1.5 bg-border-gray" data-testimonial-dot aria-label="<?php esc_attr_e( 'Show second quote', 'herco' ); ?>" aria-current="false"></button><button type="button" class="testimonial-slider-dot w-10 h-1.5 bg-border-gray" data-testimonial-dot aria-label="<?php esc_attr_e( 'Show third quote', 'herco' ); ?>" aria-current="false"></button></div></div></div></div></div>
</section>

<section class="py-section-gap bg-surface"><div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop"><div class="bg-heritage-navy relative overflow-hidden p-12 md:p-20 text-center" data-reveal><div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div><div class="relative z-10 max-w-3xl mx-auto"><span class="text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'WORK WITH HERCO', 'herco' ); ?></span><h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-white mt-4 mb-6"><?php esc_html_e( 'Your distribution partner for growth in the Philippines.', 'herco' ); ?></h2><p class="text-body-lg font-body-lg text-stucco-white/80 mb-10"><?php esc_html_e( 'Whether you\'re a global principal seeking distribution or a retailer building your shelves, Herco is ready to partner.', 'herco' ); ?></p><div class="flex flex-col sm:flex-row items-center justify-center gap-4"><a class="w-full sm:w-auto inline-flex items-center justify-center bg-industrial-gold text-heritage-navy text-label-md font-label-md rounded px-8 py-3.5 hover:bg-industrial-gold/90 transition-colors" href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Start a conversation', 'herco' ); ?></a><a class="w-full sm:w-auto inline-flex items-center justify-center border border-white/40 text-white text-label-md font-label-md rounded px-8 py-3.5 hover:bg-white/10 transition-colors" href="<?php echo esc_url( herco_page_url( 'distribution' ) ); ?>"><?php esc_html_e( 'Explore channels', 'herco' ); ?></a></div></div></div></div></section>

<?php
get_footer();

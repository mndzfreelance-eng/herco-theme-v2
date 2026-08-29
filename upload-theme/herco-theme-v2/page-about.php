<?php
/**
 * Template Name: Herco About Page
 * Template Post Type: page
 *
 * About page.
 *
 * @package Herco_Theme
 */

get_header();

$banner_url = herco_page_banner_url( 'herco_about_banner', 'assets/media/about-hero.jpg', 'page-banner' );
$affiliates = function_exists( 'herco_about_affiliates' ) ? herco_about_affiliates() : array();

$all_brands      = function_exists( 'herco_get_brand_tiles' ) ? herco_get_brand_tiles() : array();
$brand_count_raw = ! empty( $all_brands ) ? count( $all_brands ) : 50;
$brand_count     = $brand_count_raw < 10 ? $brand_count_raw : floor( $brand_count_raw / 10 ) * 10;

$mission_items = array(
	__( 'Grow the brands entrusted to us by our principals.', 'herco' ),
	__( 'Help customers grow with the best products, prices and service.', 'herco' ),
	__( 'Offer employees worthwhile and fulfilling employment.', 'herco' ),
	__( 'Deliver a respectable return to our stockholders.', 'herco' ),
);

$core_values = array(
	array(
		'icon'        => 'favorite',
		'mod'         => 'herco_core_value_image_1',
		'title'       => __( 'True partnership', 'herco' ),
		'description' => __( 'We treat every brand and customer relationship as long-term work. We do not chase short wins at the expense of trust, continuity or channel health.', 'herco' ),
	),
	array(
		'icon'        => 'precision_manufacturing',
		'mod'         => 'herco_core_value_image_2',
		'title'       => __( 'Operational excellence', 'herco' ),
		'description' => __( 'Dependability comes from disciplined execution. Our logistics, inventory control and service teams keep products moving consistently across the country.', 'herco' ),
	),
	array(
		'icon'        => 'verified_user',
		'mod'         => 'herco_core_value_image_3',
		'title'       => __( 'Stewardship', 'herco' ),
		'description' => __( 'A century-old company carries obligations. We protect our reputation by acting responsibly toward employees, principals, customers and communities.', 'herco' ),
	),
	array(
		'icon'        => 'insights',
		'mod'         => 'herco_core_value_image_4',
		'title'       => __( 'Market understanding', 'herco' ),
		'description' => __( 'We pair global brands with local knowledge, helping principals navigate channels, retail realities and customer demand in the Philippine market.', 'herco' ),
	),
);

$affiliate_cards = array(
	array(
		'title'       => __( 'Plastic Manufacturing', 'herco' ),
		'description' => __( 'Supporting the industrial ecosystem with durable, high-spec technical components and products.', 'herco' ),
	),
	array(
		'title'       => __( 'Consumer Chemicals', 'herco' ),
		'description' => __( 'Specialized chemical production for residential and commercial infrastructure maintenance.', 'herco' ),
	),
	array(
		'title'       => __( 'Financial Services', 'herco' ),
		'description' => __( 'Providing robust fiscal foundations to ensure operational stability and long-term stakeholder value.', 'herco' ),
	),
);

$mission_items = herco_get_editor_area_list_items(
	'herco-about-mission-items',
	$mission_items
);
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/70"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>"><a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a><span>/</span><span class="text-industrial-gold"><?php the_title(); ?></span></nav>
		<?php herco_render_editor_area( 'herco-about-hero-title', '<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6">' . esc_html__( 'A family business that helped build the Filipino home.', 'herco' ) . '</h1>' ); ?>
		<?php herco_render_editor_area( 'herco-about-hero-desc', '<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl">' . esc_html__( 'Since 1908, Herco Trading has put trusted tools and hardware within reach of every Filipino - across five generations of stewardship.', 'herco' ) . '</p>' ); ?>
	</div>
</section>

<div class="bg-surface border-b border-border-gray sticky top-20 z-40">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex gap-8 md:gap-12 h-14 items-center overflow-x-auto">
		<a class="font-label-md text-label-md text-on-surface-variant hover:text-heritage-navy transition-colors whitespace-nowrap" href="#story"><?php esc_html_e( 'Our Story', 'herco' ); ?></a>
		<a class="font-label-md text-label-md text-on-surface-variant hover:text-heritage-navy transition-colors whitespace-nowrap" href="#mission"><?php esc_html_e( 'Mission & Vision', 'herco' ); ?></a>
		<a class="font-label-md text-label-md text-on-surface-variant hover:text-heritage-navy transition-colors whitespace-nowrap" href="#core-values"><?php esc_html_e( 'Core Values', 'herco' ); ?></a>
		<a class="font-label-md text-label-md text-on-surface-variant hover:text-heritage-navy transition-colors whitespace-nowrap" href="#affiliates"><?php esc_html_e( 'Affiliates', 'herco' ); ?></a>
	</div>
</div>

<section class="py-section-gap bg-white technical-grid" id="story" style="scroll-margin-top:140px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
			<div>
				<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Our story', 'herco' ); ?></span>
				<?php herco_render_editor_area( 'herco-about-story-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6">' . esc_html__( 'From one Binondo storefront to a nationwide network.', 'herco' ) . '</h2>' ); ?>
				<?php herco_render_editor_area( 'herco-about-story-copy', '<p class="font-body-lg text-body-lg text-on-surface-variant mb-5">' . esc_html__( 'Herco Trading began in 1908 as a single hardware store in Binondo, Manila. More than a century later, it has grown into one of the country\'s most established distribution companies - yet it remains family-owned, now guided by its fifth generation of leadership.', 'herco' ) . '</p><p class="font-body-md text-body-md text-on-surface-variant">' . esc_html__( 'That continuity is our advantage. The relationships we hold with global principals and Filipino retailers are measured in decades, not quarters - and every brand we take on inherits a century of distribution know-how.', 'herco' ) . '</p>' ); ?>
			</div>
			<div>
				<ol class="relative border-l border-border-gray ml-2 space-y-10">
					<li class="pl-8 relative">
						<span class="absolute -left-[7px] top-1 w-3 h-3 bg-heritage-navy rounded-full ring-4 ring-surface"></span>
						<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( '1908', 'herco' ); ?></span>
						<h3 class="font-subheading text-subheading text-heritage-navy mt-1"><?php esc_html_e( 'The first store opens', 'herco' ); ?></h3>
						<p class="font-body-md text-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'A single hardware store is founded in Binondo, Manila - the heart of Philippine commerce.', 'herco' ); ?></p>
					</li>
					<li class="pl-8 relative">
						<span class="absolute -left-[7px] top-1 w-3 h-3 bg-heritage-navy rounded-full ring-4 ring-surface"></span>
						<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( '20th century', 'herco' ); ?></span>
						<h3 class="font-subheading text-subheading text-heritage-navy mt-1"><?php esc_html_e( 'From retail to distribution', 'herco' ); ?></h3>
						<p class="font-body-md text-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'The business evolves into a distributor, representing international hardware principals nationwide.', 'herco' ); ?></p>
					</li>
					<li class="pl-8 relative">
						<span class="absolute -left-[7px] top-1 w-3 h-3 bg-heritage-navy rounded-full ring-4 ring-surface"></span>
						<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( '2020', 'herco' ); ?></span>
						<h3 class="font-subheading text-subheading text-heritage-navy mt-1"><?php esc_html_e( 'Going digital', 'herco' ); ?></h3>
						<p class="font-body-md text-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Herco launches official e-commerce operations on Lazada, Shopee and TikTok Shop.', 'herco' ); ?></p>
					</li>
					<li class="pl-8 relative">
						<span class="absolute -left-[7px] top-1 w-3 h-3 bg-industrial-gold rounded-full ring-4 ring-surface"></span>
						<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Today', 'herco' ); ?></span>
						<h3 class="font-subheading text-subheading text-heritage-navy mt-1"><?php esc_html_e( 'Fifth-generation leadership', 'herco' ); ?></h3>
						<p class="font-body-md text-body-md text-on-surface-variant mt-1"><?php printf( esc_html__( '%d+ global brands, 200+ modern retail locations and an owned logistics fleet serving the whole archipelago.', 'herco' ), esc_html( $brand_count ) ); ?></p>
					</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="relative z-20 -mt-20 px-margin-mobile md:px-margin-desktop">
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div>
	<div class="max-w-container-max mx-auto overflow-hidden rounded-[1.1rem] border border-heritage-navy/10 bg-white shadow-[0_18px_52px_rgba(26,27,75,0.1)] grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-gutter">
		<div class="bg-surface border border-border-gray rounded-lg overflow-hidden" data-reveal>
			<div class="h-1 bg-industrial-gold"></div>
			<div class="p-8 md:p-9">
				<div class="font-display-lg text-[52px] leading-none mb-2 text-heritage-navy">1908</div><span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Year founded', 'herco' ); ?></span>
			</div>
		</div>
		<div class="bg-surface border border-border-gray rounded-lg overflow-hidden">
			<div class="h-1 bg-industrial-gold"></div>
			<div class="p-8 md:p-9">
				<div class="font-display-lg text-[52px] leading-none mb-2 text-heritage-navy">5<span class="text-industrial-gold">th</span></div><span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Generation leadership', 'herco' ); ?></span>
			</div>
		</div>
		<div class="bg-surface border border-border-gray rounded-lg overflow-hidden">
			<div class="h-1 bg-industrial-gold"></div>
			<div class="p-8 md:p-9">
				<div class="font-display-lg text-[52px] leading-none mb-2 text-heritage-navy">6</div><span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Sourcing countries', 'herco' ); ?></span>
			</div>
		</div>
		<div class="bg-surface border border-border-gray rounded-lg overflow-hidden">
			<div class="h-1 bg-industrial-gold"></div>
			<div class="p-8 md:p-9">
				<div class="font-display-lg text-[52px] leading-none mb-2 text-heritage-navy"><?php echo esc_html( $brand_count ); ?><span class="text-industrial-gold">+</span></div><span class="font-technical-caps text-technical-caps text-industrial-gold uppercase"><?php esc_html_e( 'Principal brands', 'herco' ); ?></span>
			</div>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface hairline-grid" id="mission" style="scroll-margin-top:140px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
			<div class="bg-surface-container-lowest border border-border-gray p-10 md:p-12">
				<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Our mission', 'herco' ); ?></span>
				<h3 class="font-headline-lg text-headline-lg text-heritage-navy mt-3 mb-8"><?php esc_html_e( 'To build the brands entrusted to us.', 'herco' ); ?></h3>
				<ul class="space-y-6 font-body-lg text-on-surface-variant">
					<?php foreach ( $mission_items as $item ) : ?>
						<li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">trending_up</span><span><?php echo esc_html( $item ); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="bg-heritage-navy p-10 md:p-12 relative overflow-hidden flex flex-col justify-center">
				<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div>
				<div class="relative z-10">
					<span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Our vision', 'herco' ); ?></span>
					<h3 class="font-headline-lg text-headline-lg text-white mt-3 mb-6"><?php esc_html_e( 'The #1 hardware distributor in the Philippines.', 'herco' ); ?></h3>
					<?php herco_render_editor_area( 'herco-about-vision-quote', '<p class="font-display-lg text-2xl text-industrial-gold leading-relaxed italic mb-6">' . esc_html__( '"To be the #1 hardware distribution company in the Philippines in terms of revenue, income and breadth of brand portfolio."', 'herco' ) . '</p>' ); ?>
					<?php herco_render_editor_area( 'herco-about-vision-copy', '<p class="font-body-lg text-stucco-white/80">' . esc_html__( 'Maintaining true partnerships with our principals and customers - the best at what we do, and easy to work with at the same time.', 'herco' ) . '</p>' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.flip-card-wrapper {
		perspective: 1000px;
		min-height: 400px; /* Adjust if content on the back of the card is taller */
	}
	.flip-card {
		position: relative;
		width: 100%;
		height: 100%;
		transition: transform 0.7s;
		transform-style: preserve-3d;
	}
	.flip-card-wrapper:hover .flip-card {
		transform: rotateY(180deg);
	}
	.flip-card-front,
	.flip-card-back {
		position: absolute;
		width: 100%;
		height: 100%;
		-webkit-backface-visibility: hidden;
		backface-visibility: hidden;
		display: flex;
		flex-direction: column;
	}
	.flip-card-back {
		transform: rotateY(180deg);
	}
</style>
<section class="py-section-gap bg-surface-container-lowest" id="core-values" style="scroll-margin-top:140px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="text-center max-w-2xl mx-auto mb-16" data-reveal>
			<span class="font-technical-caps text-technical-caps text-heritage-navy uppercase tracking-widest"><?php esc_html_e( 'Core values', 'herco' ); ?></span>
			<?php herco_render_editor_area( 'herco-about-core-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4">' . esc_html__( 'Trust is built through how we work.', 'herco' ) . '</h2>' ); ?>
			<?php herco_render_editor_area( 'herco-about-core-desc', '<p class="font-body-lg text-body-lg text-on-surface-variant mt-6">' . esc_html__( 'Our values are practical, visible and measured over time. They shape how we serve principals, support customers and protect a name that has been trusted since 1908.', 'herco' ) . '</p>' ); ?>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-gutter">
			<?php foreach ( $core_values as $value ) : ?>
				<?php $core_value_image = herco_get_image( $value['mod'], 'generic' ); ?>
				<div class="flip-card-wrapper border border-border-gray group hover:border-industrial-gold transition-colors" data-reveal>
					<div class="flip-card">
						<?php if ( empty( $core_value_image['is_placeholder'] ) ) : ?>
							<div class="flip-card-front bg-cover bg-center relative" style="background-image: url('<?php echo esc_url( $core_value_image['url'] ); ?>');">
								<div class="absolute inset-0 bg-heritage-navy/70"></div>
								<div class="relative z-10 p-8 flex flex-col justify-center items-center text-center h-full text-white">
									<h3 class="font-subheading text-subheading"><?php echo esc_html( $value['title'] ); ?></h3>
								</div>
							</div>
							<div class="flip-card-back bg-heritage-navy p-8 text-white justify-center">
								<h3 class="font-subheading text-subheading mb-3"><?php echo esc_html( $value['title'] ); ?></h3>
								<p class="font-body-md text-body-md"><?php echo esc_html( $value['description'] ); ?></p>
							</div>
						<?php else : ?>
							<div class="flip-card-front bg-surface p-8">
								<div class="w-12 h-12 bg-surface-container flex items-center justify-center mb-6 rounded group-hover:bg-industrial-gold transition-colors"><span class="material-symbols-outlined text-heritage-navy group-hover:text-white"><?php echo esc_html( $value['icon'] ); ?></span></div>
								<h3 class="font-subheading text-subheading text-heritage-navy mb-3"><?php echo esc_html( $value['title'] ); ?></h3>
							</div>
							<div class="flip-card-back bg-surface p-8">
								<h3 class="font-subheading text-subheading text-heritage-navy mb-3"><?php echo esc_html( $value['title'] ); ?></h3>
								<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( $value['description'] ); ?></p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface border-y border-border-gray" id="affiliates" style="scroll-margin-top:140px">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="text-center max-w-3xl mx-auto mb-16" data-reveal>
			<span class="font-technical-caps text-technical-caps text-heritage-navy uppercase tracking-widest"><?php esc_html_e( 'Beyond hardware', 'herco' ); ?></span>
			<?php herco_render_editor_area( 'herco-about-affiliates-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6">' . esc_html__( 'A group with reach across industries.', 'herco' ) . '</h2>' ); ?>
			<?php herco_render_editor_area( 'herco-about-affiliates-desc', '<p class="font-body-lg text-body-lg text-on-surface-variant">' . esc_html__( 'Herco maintains strategic partnerships with major Philippine companies in plastic manufacturing, consumer chemicals and financial services - strengthening the network behind every delivery.', 'herco' ) . '</p>' ); ?>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
			<?php foreach ( $affiliate_cards as $index => $card ) : ?>
				<?php $affiliate = $affiliates[ $index ] ?? array( 'mod' => 'herco_affiliate_image_' . ( $index + 1 ), 'ph' => 'affiliate-' . ( $index + 1 ), 'alt' => $card['title'] ); ?>
				<?php $img = herco_get_image( $affiliate['mod'], $affiliate['ph'] ); ?>
				<div class="bg-surface-container-lowest border border-border-gray p-8 group hover:border-industrial-gold transition-colors" data-reveal>
					<div class="w-20 h-20 bg-surface-container flex items-center justify-center mb-6 rounded group-hover:bg-industrial-gold transition-colors overflow-hidden">
						<?php if ( ! empty( $img['is_placeholder'] ) ) : ?>
							<span class="material-symbols-outlined text-7xl text-heritage-navy group-hover:text-white">domain</span>
						<?php else : ?>
							<img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $affiliate['alt'] ?? $card['title'] ); ?>" class="h-full w-full object-contain p-2 bg-white">
						<?php endif; ?>
					</div>
					<h4 class="font-subheading text-subheading text-heritage-navy mb-3"><?php echo esc_html( $card['title'] ); ?></h4>
					<p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html( $card['description'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<div class="bg-heritage-navy relative overflow-hidden p-12 md:p-20 text-center" data-reveal>
			<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div>
			<div class="relative z-10 max-w-3xl mx-auto">
				<?php herco_render_editor_area( 'herco-about-cta-title', '<h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mb-6">' . esc_html__( '120 years in, we\'re still looking for the next great partnership.', 'herco' ) . '</h2>' ); ?>
				<?php herco_render_editor_area( 'herco-about-cta-desc', '<p class="font-body-lg text-body-lg text-stucco-white/80 mb-10">' . esc_html__( 'Talk to the team about distributing your brand - or stocking the brands Filipinos trust.', 'herco' ) . '</p>' ); ?>
				<a class="inline-flex items-center justify-center bg-industrial-gold text-heritage-navy text-label-md font-label-md rounded px-8 py-3.5 hover:bg-industrial-gold/90 transition-colors" href="<?php echo esc_url( herco_page_url( 'contact' ) ); ?>"><?php esc_html_e( 'Contact Herco', 'herco' ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

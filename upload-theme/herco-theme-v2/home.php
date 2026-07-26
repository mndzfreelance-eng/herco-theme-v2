<?php
/**
 * The template for displaying the blog posts index.
 *
 * @package Herco_Theme
 */

get_header();

$banner_url = herco_page_banner_url( 'herco_news_banner', 'assets/media/contact-hero.jpg', 'page-banner' );
$page_for_posts_id = get_option( 'page_for_posts' );
?>

<section class="py-20 md:py-28 relative overflow-hidden">
	<div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $banner_url ); ?>')"></div>
	<div class="absolute inset-0 bg-heritage-navy/70"></div>
	<div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
		<nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>">
			<a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a>
			<span>/</span>
			<span class="text-industrial-gold"><?php echo esc_html( get_the_title( $page_for_posts_id ) ); ?></span>
		</nav>
		<h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6"><?php echo esc_html( get_the_title( $page_for_posts_id ) ); ?></h1>
		<?php if ( $page_for_posts_id && has_excerpt( $page_for_posts_id ) ) : ?>
			<p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl"><?php echo esc_html( get_the_excerpt( $page_for_posts_id ) ); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<?php if ( have_posts() ) : ?>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'bg-surface-container-lowest border border-border-gray flex flex-col group' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" class="aspect-[16/9] block overflow-hidden">
								<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300' ) ); ?>
							</a>
						<?php endif; ?>
						<div class="p-6 flex-1 flex flex-col">
							<h2 class="text-subheading font-subheading text-heritage-navy mb-3">
								<a href="<?php the_permalink(); ?>" class="hover:text-industrial-gold transition-colors"><?php the_title(); ?></a>
							</h2>
							<div class="text-body-md font-body-md text-on-surface-variant flex-1 mb-6">
								<?php the_excerpt(); ?>
							</div>
							<div class="text-body-sm font-body-sm text-on-surface-variant/70">
								<time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="mt-12">
				<?php the_posts_pagination(); ?>
			</div>

		<?php else : ?>
			<div class="border border-border-gray bg-surface-container-lowest p-12 text-center">
				<h2 class="text-headline-lg font-headline-lg text-heritage-navy"><?php esc_html_e( 'No Posts Found', 'herco' ); ?></h2>
				<p class="text-body-lg font-body-lg text-on-surface-variant mt-4"><?php esc_html_e( 'There are no news articles yet. Please check back later.', 'herco' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
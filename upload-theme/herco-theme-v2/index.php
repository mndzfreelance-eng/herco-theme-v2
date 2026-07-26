<?php
/**
 * Main template file.
 *
 * @package Herco_Theme
 */

get_header();
?>

<section class="py-section-gap bg-surface">
	<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'bg-surface-container-lowest border border-border-gray p-8 md:p-12' ); ?>>
					<h1 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-heritage-navy mb-6"><?php the_title(); ?></h1>
					<div class="text-body-md font-body-md text-on-surface-variant space-y-5"><?php the_content(); ?></div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
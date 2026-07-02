<?php
/**
 * The front page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Herco_Theme
 */

get_header();
?>

<main id="main">
    <!-- HERO (Placeholder for actual hero content from index.html) -->
    <section class="bg-heritage-navy relative overflow-hidden py-20 md:py-28">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10 text-white">
            <h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg">Welcome to Herco Trading Inc.</h1>
            <p class="font-body-lg text-stucco-white/80 max-w-2xl mt-4">The Philippines' trusted hardware distribution partner since 1908.</p>
        </div>
    </section>

    <!-- BRANDS SECTION -->
    <section class="py-section-gap bg-surface-container-lowest border-y border-border-gray">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center mb-12">
            <span class="text-technical-caps font-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e('Our principals', 'herco'); ?></span>
            <h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg text-heritage-navy mt-4"><?php esc_html_e('50+ world-class brands under one roof.', 'herco'); ?></h2>
        </div>
        <div class="marquee" aria-label="<?php esc_attr_e('Brands distributed by Herco', 'herco'); ?>">
            <div class="marquee-track text-2xl font-bold tracking-tight text-slate-black/70">
                <?php
                $marquee_brands = herco_site_content_get('brandsFallback', []);
                // Output the brands twice for the continuous marquee effect
                for ($i = 0; $i < 2; $i++) {
                    foreach ($marquee_brands as $brand_name) :
                ?>
                        <span><?php echo esc_html($brand_name); ?></span>
                <?php
                    endforeach;
                }
                ?>
            </div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center mt-12">
            <a class="inline-flex items-center gap-2 text-industrial-gold text-label-md font-label-md hover:gap-3 transition-all" href="<?php echo esc_url(home_url('/brands')); ?>"><?php esc_html_e('View the full brand portfolio', 'herco'); ?> <span class="material-symbols-outlined text-base">arrow_forward</span></a>
        </div>
    </section>
</main>

<?php
get_footer();
<?php
/**
 * Template Name: Distribution Channels Page
 *
 * This is the template for the Distribution Channels page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Herco_Theme
 */

get_header();
?>

<main id="main">
    <!-- PAGE HEADER -->
    <section class="py-20 md:py-28 relative overflow-hidden">
        <?php
        $page_banner_id = get_theme_mod('herco_page_banner');
        $page_banner_url = $page_banner_id ? wp_get_attachment_image_url($page_banner_id, 'full') : get_template_directory_uri() . '/assets/media/distribution-hero.jpg';
        ?>
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($page_banner_url); ?>');"></div>
        <div class="absolute inset-0 bg-heritage-navy/70"></div>
        <div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid z-[1]"></div>
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
            <nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>">
                <a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a>
                <span>/</span>
                <span class="text-industrial-gold"><?php the_title(); ?></span>
            </nav>
            <h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6"><?php the_title(); ?>.</h1>
            <p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl"><?php esc_html_e( 'From a neighborhood hardware store to the country\'s largest retail chains, online marketplaces and industrial job sites — Herco gets trusted brands where they need to be.', 'herco' ); ?></p>
        </div>
    </section>

    <!-- CHANNEL NAV CARDS -->
    <section class="bg-surface pt-16 md:pt-20 px-margin-mobile md:px-margin-desktop">
        <div class="max-w-container-max mx-auto grid grid-cols-2 lg:grid-cols-4 gap-gutter">
            <a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#traditional">
                <span class="font-technical-caps text-technical-caps text-on-surface-variant uppercase">01</span>
                <h3 class="font-subheading text-subheading text-heritage-navy mt-2"><?php esc_html_e( 'Traditional Stores', 'herco' ); ?></h3>
                <span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span>
            </a>
            <a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#modern">
                <span class="font-technical-caps text-technical-caps text-on-surface-variant uppercase">02</span>
                <h3 class="font-subheading text-subheading text-heritage-navy mt-2"><?php esc_html_e( 'Modern Retail', 'herco' ); ?></h3>
                <span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span>
            </a>
            <a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#ecommerce">
                <span class="font-technical-caps text-technical-caps text-on-surface-variant uppercase">03</span>
                <h3 class="font-subheading text-subheading text-heritage-navy mt-2"><?php esc_html_e( 'E-Commerce', 'herco' ); ?></h3>
                <span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span>
            </a>
            <a class="group bg-surface-container-lowest border border-border-gray p-6 hover:border-industrial-gold transition-colors" href="#industrial">
                <span class="font-technical-caps text-technical-caps text-on-surface-variant uppercase">04</span>
                <h3 class="font-subheading text-subheading text-heritage-navy mt-2"><?php esc_html_e( 'Industrial', 'herco' ); ?></h3>
                <span class="inline-flex items-center gap-1 text-industrial-gold text-label-md font-label-md mt-3 group-hover:gap-2 transition-all"><?php esc_html_e( 'Learn more', 'herco' ); ?> <span class="material-symbols-outlined text-sm">arrow_forward</span></span>
            </a>
        </div>
    </section>

    <!-- TRADITIONAL -->
    <section class="py-section-gap bg-surface hairline-grid" id="traditional" style="scroll-margin-top:90px">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Channel 01', 'herco' ); ?></span>
                    <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6"><?php esc_html_e( 'Traditional Stores', 'herco' ); ?></h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-8"><?php esc_html_e( 'Herco has built strong partnerships with hundreds of traditional hardware stores across the Philippines — ensuring reliable distribution of trusted tools and building materials to local communities.', 'herco' ); ?></p>
                    <ul class="space-y-5">
                        <li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Competitive trade pricing', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Margins that keep neighborhood stores profitable and competitive.', 'herco' ); ?></p></div></li>
                        <li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Reliable resupply', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Consistent stock of fast-moving SKUs, delivered on schedule.', 'herco' ); ?></p></div></li>
                    </ul>
                </div>
                <div class="relative aspect-[4/3] border border-border-gray overflow-hidden">
                    <?php
                    $traditional_image_id = get_theme_mod('herco_dist_image_1');
                    $traditional_image_url = $traditional_image_id ? wp_get_attachment_image_url($traditional_image_id, 'full') : get_template_directory_uri() . '/assets/images/placeholders/distribution-traditional-placeholder.svg';
                    ?>
                    <img src="<?php echo esc_url($traditional_image_url); ?>" alt="<?php esc_attr_e( 'Traditional hardware store', 'herco' ); ?>" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- MODERN -->
    <section class="py-section-gap bg-surface-container-lowest border-y border-border-gray" id="modern" style="scroll-margin-top:90px">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative aspect-[4/3] border border-border-gray overflow-hidden order-2 lg:order-1">
                    <?php
                    $modern_image_id = get_theme_mod('herco_dist_image_2');
                    $modern_image_url = $modern_image_id ? wp_get_attachment_image_url($modern_image_id, 'full') : get_template_directory_uri() . '/assets/images/placeholders/distribution-modern-placeholder.svg';
                    ?>
                    <img src="<?php echo esc_url($modern_image_url); ?>" alt="<?php esc_attr_e( 'Modern retail aisle', 'herco' ); ?>" class="w-full h-full object-cover">
                </div>
                <div class="order-1 lg:order-2">
                    <span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Channel 02', 'herco' ); ?></span>
                    <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6"><?php esc_html_e( 'Modern Retail', 'herco' ); ?></h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-6"><?php esc_html_e( 'Herco partners with the country\'s leading modern hardware retailers — supporting 200+ locations with delivery, marketing and in-store training.', 'herco' ); ?></p>
                    <p class="font-subheading text-subheading text-heritage-navy mb-4"><?php esc_html_e( 'Retail partners include:', 'herco' ); ?></p>
                    <div class="flex flex-wrap gap-3">
                        <?php
                        $modern_retail_logos = [
                            'herco_modern_retail_logo_wilcon' => 'Wilcon Depot',
                            'herco_modern_retail_logo_handyman' => 'Handyman',
                            'herco_modern_retail_logo_doitbest' => 'Do-it-Best',
                            'herco_modern_retail_logo_truevalue' => 'True Value',
                            'herco_modern_retail_logo_robinsons' => 'Robinsons Builders',
                        ];
                        foreach ($modern_retail_logos as $mod_id => $alt_text) :
                            $logo_id = get_theme_mod($mod_id);
                            $logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'full') : get_template_directory_uri() . '/assets/images/placeholders/retail-partner-placeholder.svg';
                            ?>
                            <span class="inline-flex items-center gap-2 bg-surface border border-border-gray px-4 py-2 text-label-md font-label-md text-on-surface">
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="h-4 w-auto object-contain" style="max-height: 1rem;">
                                <?php echo esc_html($alt_text); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ECOMMERCE -->
    <section class="py-section-gap bg-surface" id="ecommerce" style="scroll-margin-top:90px">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Channel 03', 'herco' ); ?></span>
                    <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6"><?php esc_html_e( 'E-Commerce', 'herco' ); ?></h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-6"><?php esc_html_e( 'Herco expanded into e-commerce in 2020, making trusted hardware products available nationwide through the Philippines\' top platforms — integrated with advanced logistics and inventory systems.', 'herco' ); ?></p>
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
                </div>
                <ul class="space-y-5">
                    <li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Official storefronts', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Authentic products, sold and fulfilled by Herco — protecting brand integrity online.', 'herco' ); ?></p></div></li>
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
                            <p class="text-body-sm font-body-sm text-on-surface-variant mt-3"><?php esc_html_e( '52k followers · 12.4k reviews · verified storefront', 'herco' ); ?></p>
                        </div>
                        <div class="border border-border-gray bg-surface px-4 py-4">
                            <div class="flex items-center justify-between gap-3">
                                <strong class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Shopee', 'herco' ); ?></strong>
                                <span class="inline-flex items-center gap-1 text-industrial-gold text-body-sm font-body-sm"><span class="material-symbols-outlined text-base">star</span>4.9</span>
                            </div>
                            <p class="text-body-sm font-body-sm text-on-surface-variant mt-3"><?php esc_html_e( '68k followers · 18.1k reviews · mall verified', 'herco' ); ?></p>
                        </div>
                        <div class="border border-border-gray bg-surface px-4 py-4">
                            <div class="flex items-center justify-between gap-3">
                                <strong class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'TikTok Shop', 'herco' ); ?></strong>
                                <span class="inline-flex items-center gap-1 text-industrial-gold text-body-sm font-body-sm"><span class="material-symbols-outlined text-base">favorite</span>4.7</span>
                            </div>
                            <p class="text-body-sm font-body-sm text-on-surface-variant mt-3"><?php esc_html_e( '41k followers · 7.6k reviews · live-selling ready', 'herco' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INDUSTRIAL -->
    <section class="py-section-gap bg-surface-container-lowest border-y border-border-gray" id="industrial" style="scroll-margin-top:90px">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative aspect-[4/3] border border-border-gray overflow-hidden order-2 lg:order-1">
                    <?php
                    $industrial_image_id = get_theme_mod('herco_dist_image_4');
                    $industrial_image_url = $industrial_image_id ? wp_get_attachment_image_url($industrial_image_id, 'full') : get_template_directory_uri() . '/assets/images/placeholders/distribution-industrial-placeholder.svg';
                    ?>
                    <img src="<?php echo esc_url($industrial_image_url); ?>" alt="<?php esc_attr_e( 'Industrial supply', 'herco' ); ?>" class="w-full h-full object-cover">
                </div>
                <div class="order-1 lg:order-2">
                    <span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Channel 04', 'herco' ); ?></span>
                    <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4 mb-6"><?php esc_html_e( 'Industrial', 'herco' ); ?></h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-8"><?php esc_html_e( 'Herco is a trusted supplier to the industrial sector — providing high-quality hardware, tools and construction materials to manufacturing companies, contractors and government projects across the Philippines.', 'herco' ); ?></p>
                    <ul class="space-y-5">
                        <li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Project-scale supply', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Bulk fulfilment and dependable lead times for contractors and manufacturers.', 'herco' ); ?></p></div></li>
                        <li class="flex items-start gap-4"><span class="material-symbols-outlined text-industrial-gold mt-0.5">check_circle</span><div><p class="text-subheading font-subheading text-heritage-navy"><?php esc_html_e( 'Government-ready', 'herco' ); ?></p><p class="text-body-md font-body-md text-on-surface-variant mt-1"><?php esc_html_e( 'Compliant sourcing and documentation for public-sector projects.', 'herco' ); ?></p></div></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- LOGISTICS BAND -->
    <section class="bg-heritage-navy py-section-gap text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div>
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10 text-center max-w-3xl">
            <span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'The backbone', 'herco' ); ?></span>
            <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mt-4 mb-6"><?php esc_html_e( 'Owned logistics across every channel.', 'herco' ); ?></h2>
            <p class="font-body-lg text-body-lg text-stucco-white/80"><?php esc_html_e( 'A single logistics and inventory backbone serves all four channels — so principals get consistent reach, and partners get consistent service.', 'herco' ); ?></p>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-section-gap bg-surface">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="bg-surface-container-lowest border border-border-gray p-12 md:p-20 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-10" data-reveal>
                <div class="absolute top-0 right-0 opacity-5 pointer-events-none"><span class="material-symbols-outlined text-[120px] text-heritage-navy">conveyor_belt</span></div>
                <div class="max-w-xl relative z-10">
                    <h2 class="font-headline-lg text-headline-lg text-heritage-navy mb-4"><?php esc_html_e( 'Which channel fits your brand?', 'herco' ); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant"><?php esc_html_e( 'Tell us about your products and target markets — we\'ll map the right route to shelf.', 'herco' ); ?></p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 relative z-10">
                    <a class="inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-8 py-3.5 hover:bg-heritage-navy/90 transition-colors" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Talk to our team', 'herco' ); ?></a>
                    <a class="inline-flex items-center justify-center border border-border-gray text-on-surface text-label-md font-label-md rounded px-8 py-3.5 hover:bg-surface transition-colors" href="<?php echo esc_url( home_url( '/brands' ) ); ?>"><?php esc_html_e( 'See who we represent', 'herco' ); ?></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
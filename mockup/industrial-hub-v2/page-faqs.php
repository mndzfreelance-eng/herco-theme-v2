<?php
/**
 * Template Name: FAQs Page
 *
 * This is the template for the FAQs page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Herco_Theme
 */

get_header();
?>

<main id="main">
    <!-- PAGE HEADER -->
    <section class="bg-heritage-navy py-20 md:py-28 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div>
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">
            <nav class="flex items-center gap-2 text-technical-caps font-technical-caps text-stucco-white/50 uppercase mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'herco' ); ?>">
                <a class="hover:text-industrial-gold" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'herco' ); ?></a>
                <span>/</span>
                <span class="text-industrial-gold"><?php the_title(); ?></span>
            </nav>
            <h1 class="font-display-lg text-headline-lg-mobile md:text-display-lg text-white max-w-3xl mb-6"><?php the_title(); ?>.</h1>
            <p class="font-body-lg text-body-lg text-stucco-white/80 max-w-2xl"><?php esc_html_e( 'Find quick answers to common questions about our products, services, and partnerships.', 'herco' ); ?></p>
        </div>
    </section>

    <!-- FAQs SECTION -->
    <section class="py-section-gap bg-surface">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="font-technical-caps text-technical-caps text-industrial-gold uppercase tracking-widest"><?php esc_html_e( 'Need help?', 'herco' ); ?></span>
                <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-heritage-navy mt-4"><?php esc_html_e( 'Browse our knowledge base.', 'herco' ); ?></h2>
            </div>

            <div class="flex flex-wrap justify-center gap-3 mb-12" role="group" aria-label="<?php esc_attr_e( 'Filter FAQs by category', 'herco' ); ?>">
                <button class="chip bg-heritage-navy text-white border border-heritage-navy text-label-md font-label-md px-5 py-2 rounded transition-colors" data-faq-filter="all" aria-pressed="true"><?php esc_html_e( 'All Topics', 'herco' ); ?></button>
                <button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="general" aria-pressed="false"><?php esc_html_e( 'General', 'herco' ); ?></button>
                <button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="products" aria-pressed="false"><?php esc_html_e( 'Products', 'herco' ); ?></button>
                <button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="distribution" aria-pressed="false"><?php esc_html_e( 'Distribution', 'herco' ); ?></button>
                <button class="chip bg-surface-container-lowest text-on-surface-variant border border-border-gray text-label-md font-label-md px-5 py-2 rounded hover:border-industrial-gold transition-colors" data-faq-filter="support" aria-pressed="false"><?php esc_html_e( 'Support', 'herco' ); ?></button>
            </div>

            <div class="max-w-3xl mx-auto space-y-4" data-faq-container>
                <!-- FAQ Item 1 -->
                <div class="faq-item border border-border-gray bg-surface-container-lowest rounded-lg overflow-hidden" data-faq-category="general">
                    <button class="faq-question w-full text-left p-5 flex justify-between items-center text-subheading font-subheading text-heritage-navy hover:text-industrial-gold transition-colors" aria-expanded="false">
                        <span><?php esc_html_e( 'What is Herco Trading Inc.?', 'herco' ); ?></span>
                        <span class="material-symbols-outlined faq-icon text-lg transition-transform">expand_more</span>
                    </button>
                    <div class="faq-answer hidden px-5 pb-5 text-body-md text-on-surface-variant">
                        <p><?php esc_html_e( 'Herco Trading Inc. is the Philippines\' most established distributor of industrial tools, hardware, and over 50 global brands. We have been serving the Philippine market since 1908, providing nationwide distribution to traditional stores, modern retail, e-commerce, and industrial clients.', 'herco' ); ?></p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item border border-border-gray bg-surface-container-lowest rounded-lg overflow-hidden" data-faq-category="products">
                    <button class="faq-question w-full text-left p-5 flex justify-between items-center text-subheading font-subheading text-heritage-navy hover:text-industrial-gold transition-colors" aria-expanded="false">
                        <span><?php esc_html_e( 'What types of products do you distribute?', 'herco' ); ?></span>
                        <span class="material-symbols-outlined faq-icon text-lg transition-transform">expand_more</span>
                    </button>
                    <div class="faq-answer hidden px-5 pb-5 text-body-md text-on-surface-variant">
                        <p><?php esc_html_e( 'We distribute a wide range of hardware products, including power tools, hand tools, automotive care products, security and access solutions, and adhesives & chemicals from world-renowned brands like Bosch, DeWalt, Stanley, 3M, WD-40, and Yale.', 'herco' ); ?></p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item border border-border-gray bg-surface-container-lowest rounded-lg overflow-hidden" data-faq-category="distribution">
                    <button class="faq-question w-full text-left p-5 flex justify-between items-center text-subheading font-subheading text-heritage-navy hover:text-industrial-gold transition-colors" aria-expanded="false">
                        <span><?php esc_html_e( 'How can I become a retailer or partner with Herco?', 'herco' ); ?></span>
                        <span class="material-symbols-outlined faq-icon text-lg transition-transform">expand_more</span>
                    </button>
                    <div class="faq-answer hidden px-5 pb-5 text-body-md text-on-surface-variant">
                        <p><?php printf( esc_html__( 'We are always looking for new partners. You can visit our %s page and fill out the "Retailer Application" or "Supplier Partnership" form, or reach out to our business development team directly.', 'herco' ), '<a href="' . esc_url( home_url( '/contact' ) ) . '" class="text-industrial-gold hover:underline">' . esc_html__( 'Contact Us', 'herco' ) . '</a>' ); ?></p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item border border-border-gray bg-surface-container-lowest rounded-lg overflow-hidden" data-faq-category="support">
                    <button class="faq-question w-full text-left p-5 flex justify-between items-center text-subheading font-subheading text-heritage-navy hover:text-industrial-gold transition-colors" aria-expanded="false">
                        <span><?php esc_html_e( 'What is your warranty and service policy?', 'herco' ); ?></span>
                        <span class="material-symbols-outlined faq-icon text-lg transition-transform">expand_more</span>
                    </button>
                    <div class="faq-answer hidden px-5 pb-5 text-body-md text-on-surface-variant">
                        <p><?php printf( esc_html__( 'Warranty and service policies vary by brand and product. Please visit our %s page and use the "Warranty & Service" form to file a claim or request support. Our team will assist you with the specific details for your product.', 'herco' ), '<a href="' . esc_url( home_url( '/contact' ) ) . '" class="text-industrial-gold hover:underline">' . esc_html__( 'Contact Us', 'herco' ) . '</a>' ); ?></p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item border border-border-gray bg-surface-container-lowest rounded-lg overflow-hidden" data-faq-category="products">
                    <button class="faq-question w-full text-left p-5 flex justify-between items-center text-subheading font-subheading text-heritage-navy hover:text-industrial-gold transition-colors" aria-expanded="false">
                        <span><?php esc_html_e( 'Where can I find product catalogs?', 'herco' ); ?></span>
                        <span class="material-symbols-outlined faq-icon text-lg transition-transform">expand_more</span>
                    </button>
                    <div class="faq-answer hidden px-5 pb-5 text-body-md text-on-surface-variant">
                        <p><?php printf( esc_html__( 'Product catalogs for individual brands can often be found on their respective brand detail pages. You can navigate to our %s section and select a brand to view its dedicated page, which may include a downloadable catalog.', 'herco' ), '<a href="' . esc_url( home_url( '/brands' ) ) . '" class="text-industrial-gold hover:underline">' . esc_html__( 'Brands', 'herco' ) . '</a>' ); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-section-gap bg-surface-container-lowest">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="bg-heritage-navy relative overflow-hidden p-12 md:p-20 text-center">
                <div class="absolute inset-0 opacity-5 pointer-events-none hairline-grid"></div>
                <div class="relative z-10 max-w-3xl mx-auto">
                    <h2 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-white mb-6"><?php esc_html_e( 'Still have questions?', 'herco' ); ?></h2>
                    <p class="font-body-lg text-body-lg text-stucco-white/80 mb-10"><?php esc_html_e( 'Our customer support team is ready to assist you with any inquiries.', 'herco' ); ?></p>
                    <a class="inline-flex items-center justify-center bg-industrial-gold text-heritage-navy text-label-md font-label-md rounded px-8 py-3.5 hover:bg-industrial-gold/90 transition-colors" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact Support', 'herco' ); ?></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
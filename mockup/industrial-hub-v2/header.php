<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'font-body-md text-on-background antialiased bg-background selection:bg-industrial-gold selection:text-white' ); ?>>
    <?php wp_body_open(); ?>
    <a class="sr-only focus:not-sr-only focus:absolute focus:z-[100] focus:top-2 focus:left-2 focus:bg-heritage-navy focus:text-white focus:px-4 focus:py-2 focus:rounded" href="#main"><?php esc_html_e( 'Skip to content', 'herco' ); ?></a>

    <!-- HEADER -->
    <header data-header class="bg-surface/95 border-b border-border-gray sticky top-0 z-50 backdrop-blur-sm transition-shadow">
        <div class="flex justify-between items-center h-20 w-full px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( has_custom_logo() ) {
                echo '<a href="' . esc_url( home_url( '/' ) ) . '" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . ' home"><img src="' . esc_url( $logo[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="h-9 w-auto" width="' . esc_attr( $logo[1] ) . '" height="' . esc_attr( $logo[2] ) . '"/></a>';
            } else {
                echo '<a href="' . esc_url( home_url( '/' ) ) . '" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . ' home"><img src="' . esc_url( get_template_directory_uri() . '/assets/herco-logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="h-9 w-auto" width="276" height="61"/></a>';
            }
            ?>
            <nav class="hidden lg:flex items-center gap-8">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex items-center gap-8',
                    'fallback_cb'    => false,
                    'walker'         => new Herco_Primary_Nav_Walker(), // Custom walker for mega menus
                ) );
                ?>
            </nav>
            <div class="flex items-center gap-3">
                <a class="hidden sm:inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-6 py-2.5 hover:bg-heritage-navy/90 transition-colors" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Partner With Us', 'herco' ); ?></a>
                <button id="navToggle" class="lg:hidden text-heritage-navy p-2" aria-label="<?php esc_attr_e( 'Toggle menu', 'herco' ); ?>" aria-expanded="false"><span class="material-symbols-outlined">menu</span></button>
            </div>
        </div>
        <div id="mobileMenu" class="lg:hidden hidden border-t border-border-gray bg-surface">
            <nav class="flex flex-col px-margin-mobile py-3">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex flex-col',
                    'fallback_cb'    => false,
                    'walker'         => new Herco_Mobile_Nav_Walker(), // Custom walker for mobile menu
                ) );
                ?>
                <a class="mt-3 mb-2 inline-flex items-center justify-center bg-heritage-navy text-on-primary text-label-md font-label-md rounded px-6 py-3" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Partner With Us', 'herco' ); ?></a>
            </nav>
        </div>
    </header>

    <main id="main">
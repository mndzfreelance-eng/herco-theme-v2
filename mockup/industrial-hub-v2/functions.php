<?php
/**
 * Herco Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Herco_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function herco_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'herco', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'herco' ),
        'footer'  => esc_html__( 'Footer', 'herco' ),
    ) );

    // Switch default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 61,
        'width'       => 276,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
add_action( 'after_setup_theme', 'herco_setup' );

/**
 * Enqueue scripts and styles.
 */
function herco_scripts() {
    wp_enqueue_style( 'herco-google-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Hanken+Grotesk:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap', array(), null );
    wp_enqueue_style( 'herco-style', get_stylesheet_uri(), array(), '1.0.0' ); // style.css will import theme.css

    // Tailwind CDN is for mockup only. For production, compile Tailwind to a static stylesheet.
    // wp_enqueue_script( 'herco-tailwind-cdn', 'https://cdn.tailwindcss.com?plugins=forms,container-queries', array(), null, true );

    wp_enqueue_script( 'herco-theme-js', get_template_directory_uri() . '/assets/theme.js', array(), '1.0.0', true );
    wp_enqueue_script( 'herco-app-js', get_template_directory_uri() . '/assets/app.js', array(), '1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'herco_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Form pages.
 */
require get_template_directory() . '/inc/form-pages.php';

/**
 * About page content.
 */
require get_template_directory() . '/inc/about-content.php';

/**
 * Helper function to get content from site-content.json
 */
function herco_site_content_get($key, $default = null) {
    static $content = null;

    if (is_null($content)) {
        $file_path = get_template_directory() . '/content/site-content.json';
        if (file_exists($file_path)) {
            $content = json_decode(file_get_contents($file_path), true);
        } else {
            $content = [];
        }
    }

    $value = $content;
    foreach (explode('.', $key) as $segment) {
        if (isset($value[$segment])) {
            $value = $value[$segment];
        } else {
            return $default;
        }
    }
    return $value;
}

/**
 * Sanitize image ID from customizer.
 */
function herco_sanitize_image($image_id) {
    return absint($image_id);
}

/**
 * Get hero default values.
 */
function herco_hero_default($key) {
    $defaults = herco_site_content_get('hero', []);
    return $defaults[$key] ?? '';
}

/**
 * Placeholder for custom primary nav walker.
 * This would be implemented to match the mega menu structure.
 */
class Herco_Primary_Nav_Walker extends Walker_Nav_Menu {
    // Implement methods as needed for mega menu.
}

/**
 * Placeholder for custom mobile nav walker.
 * This would be implemented to match the mobile menu structure.
 */
class Herco_Mobile_Nav_Walker extends Walker_Nav_Menu {
    // Implement methods as needed for mobile menu.
}
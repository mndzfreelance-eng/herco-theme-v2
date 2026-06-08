<?php
/**
 * header.php — Herco Theme Header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="hercoLoader" class="page-loader" aria-hidden="true" role="status">
  <div class="page-loader__inner">
    <?php if (has_custom_logo()) : ?>
      <div class="page-loader__brand"><?php the_custom_logo(); ?></div>
    <?php else : ?>
      <div class="page-loader__wordmark">HERCO<span>.</span></div>
    <?php endif; ?>
    <div class="page-loader__track"><span></span></div>
  </div>
</div>

<div class="topbar">
  <span class="topbar__tag">Serving the Philippines since 1908</span>
  <div class="topbar__links">
    <a href="mailto:<?php echo esc_attr(get_theme_mod('herco_email','info@herco.com.ph')); ?>"><?php echo esc_html(get_theme_mod('herco_email','info@herco.com.ph')); ?></a>
    <span class="topbar__sep" aria-hidden="true"></span>
    <a href="tel:<?php echo esc_attr(get_theme_mod('herco_phone','+63288187736')); ?>"><?php echo esc_html(get_theme_mod('herco_phone','(02) 8818-7736')); ?></a>
  </div>
</div>

<header class="site-header">
  <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
    <?php if (has_custom_logo()) { the_custom_logo(); } else { echo 'HERCO<span>.</span>'; } ?>
  </a>

  <?php wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'main-navigation','fallback_cb'=>false,'depth'=>2]); ?>

  <div class="nav-cta">
    <a href="<?php echo esc_url(home_url('/request-quote')); ?>" class="btn btn--outline btn--sm"><?php esc_html_e('Request Quote','herco'); ?></a>
    <a href="<?php echo esc_url(home_url('/schedule-a-call')); ?>" class="btn btn--primary btn--sm"><?php esc_html_e('Schedule a Call','herco'); ?></a>
  </div>

  <button class="nav-toggle" id="navToggle" aria-label="<?php esc_attr_e('Open menu','herco'); ?>"><?php echo herco_icon('menu'); ?></button>
</header>


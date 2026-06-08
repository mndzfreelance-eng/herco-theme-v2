<?php
/**
 * Form page body — intro + CF7 or built-in form.
 */
if (!defined('ABSPATH')) exit;

$slug   = herco_current_form_slug();
$config = herco_get_form_page($slug);

if (!$config) {
    echo '<section class="section"><div class="section-inner"><p>' . esc_html__('Page not found.', 'herco') . '</p></div></section>';
    return;
}
?>
<section class="section">
  <div class="section-inner">
    <nav class="breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'herco'); ?>">
      <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'herco'); ?></a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <span><?php echo esc_html($config['title']); ?></span>
    </nav>

    <div class="herco-form-wrap">
      <?php if (!empty($config['label'])) : ?>
        <p class="section-label" style="margin-bottom:8px"><?php echo esc_html($config['label']); ?></p>
      <?php endif; ?>
      <h1 class="section-heading" style="font-size:32px;margin-bottom:12px"><?php echo esc_html($config['title']); ?></h1>
      <p class="herco-form-desc"><?php echo esc_html($config['intro']); ?></p>

      <?php
      if (!herco_render_cf7_form($config['cf7_title'])) {
          herco_render_native_form($slug, $config);
      }
      ?>
    </div>
  </div>
</section>

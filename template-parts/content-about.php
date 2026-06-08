<?php
/**
 * About page body — Who We Are, Mission, Vision, Affiliates.
 */
if (!defined('ABSPATH')) exit;

$about_img = herco_get_image('herco_about_image', 'about');
$affiliates = herco_about_affiliates();
?>
<section class="section">
  <div class="section-inner">
    <header class="section-hd">
      <p class="section-label"><?php esc_html_e('Our Story', 'herco'); ?></p>
      <h1 class="section-heading"><?php esc_html_e('About Herco Trading', 'herco'); ?></h1>
    </header>
    <header class="section-hd section-hd--left" style="margin-top:8px;margin-bottom:20px">
      <h2 class="section-heading" style="font-size:28px"><?php esc_html_e('Who We Are', 'herco'); ?></h2>
    </header>
    <div class="about-grid">
      <div class="about-body"><?php herco_render_about_who_we_are(); ?></div>
      <div class="about-visual<?php echo $about_img['is_placeholder'] ? ' is-placeholder' : ''; ?>">
        <?php
        herco_render_image([
            'mod'         => 'herco_about_image',
            'placeholder' => 'about',
            'alt'         => __('About Herco Trading', 'herco'),
            'class'       => 'herco-img about-visual__img',
            'badge'       => true,
        ]);
        ?>
      </div>
    </div>
    <div class="about-mv">
      <div class="mv-card navy">
        <h3><?php esc_html_e('Mission Statement', 'herco'); ?></h3>
        <ul class="mv-list">
          <?php foreach (herco_about_mission_items() as $item) : ?>
            <li><?php echo esc_html($item); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="mv-card light">
        <h3><?php esc_html_e('Vision Statement', 'herco'); ?></h3>
        <p><?php echo esc_html(herco_about_vision_text()); ?></p>
      </div>
    </div>
    <header class="section-hd" style="margin-top:48px">
      <p class="section-label"><?php esc_html_e('Affiliates', 'herco'); ?></p>
      <h2 class="section-heading" style="font-size:28px"><?php esc_html_e('Strategic Partners', 'herco'); ?></h2>
    </header>
    <div class="affiliates-row">
      <?php foreach ($affiliates as $a) :
        $logo = herco_get_image($a['mod'], $a['ph']);
      ?>
        <div class="affiliate-badge<?php echo $logo['is_placeholder'] ? ' is-placeholder' : ''; ?>">
          <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($a['alt']); ?>">
          <?php if ($logo['is_placeholder']) : ?>
            <span class="affiliate-badge__fallback"><?php echo esc_html($a['fallback']); ?></span>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

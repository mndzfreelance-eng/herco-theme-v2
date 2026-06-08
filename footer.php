<?php
/**
 * footer.php — Herco Theme Footer
 */
?>
<footer class="site-footer">
  <div class="footer-grid">
    <div>
      <div class="footer-logo">
        <?php if (has_custom_logo()) { the_custom_logo(); } else { echo 'HERCO<span>.</span>'; } ?>
      </div>
      <p class="footer-desc"><?php esc_html_e("The Philippines' most trusted hardware distributor since 1908. Representing 50+ global brands across thousands of trade and retail partners nationwide.",'herco'); ?></p>
      <div class="social-row">
        <a class="social-btn" href="<?php echo esc_url(get_theme_mod('herco_facebook','https://www.facebook.com/HercoTradingPHOfficial/')); ?>" target="_blank" rel="noopener">f</a>
        <a class="social-btn" href="<?php echo esc_url(get_theme_mod('herco_lazada','https://www.lazada.com.ph/shop/herco')); ?>" target="_blank" rel="noopener">L</a>
        <a class="social-btn" href="<?php echo esc_url(get_theme_mod('herco_shopee','https://shopee.ph/hercotradingofficial')); ?>" target="_blank" rel="noopener">S</a>
      </div>
    </div>
    <div class="footer-col">
      <h4><?php esc_html_e('Brands','herco'); ?></h4>
      <?php wp_nav_menu(['theme_location'=>'footer-1','container'=>false,'fallback_cb'=>false]); ?>
    </div>
    <div class="footer-col">
      <h4><?php esc_html_e('Support','herco'); ?></h4>
      <?php wp_nav_menu(['theme_location'=>'footer-2','container'=>false,'fallback_cb'=>false]); ?>
    </div>
    <div class="footer-col">
      <h4><?php esc_html_e('Partner','herco'); ?></h4>
      <?php wp_nav_menu(['theme_location'=>'footer-3','container'=>false,'fallback_cb'=>false]); ?>
    </div>
  </div>
  <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.','herco'); ?></span>
    <div class="footer-legal">
      <?php if ($p = get_privacy_policy_url()) echo '<a href="'.esc_url($p).'">Privacy Policy</a>'; ?>
      <a href="<?php echo esc_url(home_url('/terms-of-use')); ?>">Terms of Use</a>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

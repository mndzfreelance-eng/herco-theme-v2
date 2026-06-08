<?php
/**
 * Brands page body — grid of principal logos.
 */
if (!defined('ABSPATH')) exit;

$brands_query = new WP_Query([
    'post_type'      => 'brand',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
]);
?>
<section class="section">
  <div class="section-inner">
    <nav class="breadcrumb" aria-label="<?php esc_attr_e('Breadcrumb', 'herco'); ?>">
      <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'herco'); ?></a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <span><?php esc_html_e('Brands', 'herco'); ?></span>
    </nav>

    <header class="section-hd">
      <p class="section-label"><?php esc_html_e('Brand Portfolio', 'herco'); ?></p>
      <h1 class="section-heading"><?php echo esc_html(herco_brands_page_title()); ?></h1>
      <p class="section-sub"><?php echo esc_html(herco_brands_page_intro()); ?></p>
    </header>

    <div class="filter-chips" id="brandFilters">
      <button type="button" class="chip active" data-cat="all"><?php esc_html_e('All Brands', 'herco'); ?></button>
      <?php foreach ((array) get_terms(['taxonomy' => 'brand_category', 'hide_empty' => true]) as $cat) : ?>
        <button type="button" class="chip" data-cat="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></button>
      <?php endforeach; ?>
    </div>

    <div class="brands-grid" id="brandsGrid">
      <?php
      $has_brands = $brands_query->have_posts();
      if ($has_brands) :
        while ($brands_query->have_posts()) : $brands_query->the_post();
          $cats  = wp_get_post_terms(get_the_ID(), 'brand_category');
          $slugs = implode(' ', array_column((array) $cats, 'slug'));
          $logo  = get_the_post_thumbnail_url(get_the_ID(), 'medium');
      ?>
        <div class="brand-tile" data-cats="<?php echo esc_attr($slugs); ?>">
          <a href="<?php the_permalink(); ?>">
            <?php if ($logo) : ?>
              <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>">
            <?php else : ?>
              <span class="brand-tile-name"><?php the_title(); ?></span>
            <?php endif; ?>
          </a>
        </div>
      <?php endwhile;
        wp_reset_postdata();
      else :
        foreach (herco_brands_fallback_names() as $name) : ?>
        <div class="brand-tile brand-tile--fallback" data-cats="all">
          <span class="brand-tile-name"><?php echo esc_html($name); ?></span>
        </div>
      <?php endforeach;
      endif; ?>
    </div>

    <?php if (!$has_brands) : ?>
      <p class="brands-empty-note"><?php esc_html_e('Add brands in WP Admin → Brands → set Featured Image on each.', 'herco'); ?></p>
    <?php endif; ?>
  </div>
</section>
<script>
document.querySelectorAll('#brandFilters .chip').forEach(function (btn) {
  btn.addEventListener('click', function () {
    document.querySelectorAll('#brandFilters .chip').forEach(function (b) { b.classList.remove('active'); });
    btn.classList.add('active');
    var cat = btn.dataset.cat;
    document.querySelectorAll('#brandsGrid .brand-tile').forEach(function (tile) {
      tile.style.display = (cat === 'all' || (tile.dataset.cats || '').includes(cat)) ? '' : 'none';
    });
  });
});
</script>

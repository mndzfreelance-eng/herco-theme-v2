<?php get_header();
while (have_posts()) : the_post();
  $meta = herco_brand_meta();
  $cats = wp_get_post_terms(get_the_ID(),'brand_category');
  $prods = new WP_Query(['post_type'=>'herco_product','posts_per_page'=>6,'meta_query'=>[['key'=>'product_brand','value'=>get_the_ID()]]]);
?>
<section class="section">
  <div class="breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span class="breadcrumb-sep">›</span>
    <a href="<?php echo esc_url(get_post_type_archive_link('brand')); ?>">Brands</a><span class="breadcrumb-sep">›</span>
    <span><?php the_title(); ?></span>
  </div>
  <div class="brand-hdr">
    <div class="brand-hdr-logo">
      <?php if (has_post_thumbnail()) :
        the_post_thumbnail('medium', ['style' => 'max-height:44px;width:auto;object-fit:contain;']);
      else : ?>
        <img src="<?php echo esc_url(herco_placeholder_url('brand-logo')); ?>" alt="<?php the_title_attribute(); ?>" style="max-height:44px;width:auto;opacity:.85">
        <span style="font-family:var(--font-display);font-weight:700"><?php the_title(); ?></span>
      <?php endif; ?>
    </div>
    <div class="brand-hdr-info">
      <h1><?php the_title(); ?></h1>
      <?php if ($meta['tagline']) echo '<p>'.esc_html($meta['tagline']).'</p>'; ?>
      <?php if ($cats) : ?><div class="brand-cats"><?php foreach ($cats as $c) echo '<span class="brand-cat">'.esc_html($c->name).'</span>'; ?></div><?php endif; ?>
    </div>
  </div>
  <div class="about-body" style="max-width:640px;margin-bottom:28px"><?php the_content(); ?></div>
  <?php if ($prods->have_posts()) : ?>
    <div class="section-label">Featured Products</div>
    <div class="section-heading" style="font-size:28px;margin-bottom:20px">Product Highlights</div>
    <div class="products-grid">
      <?php while ($prods->have_posts()) : $prods->the_post();
        $pcat = wp_get_post_terms(get_the_ID(),'product_category'); ?>
        <div class="product-card">
          <div class="product-cat"><?php echo $pcat ? esc_html($pcat[0]->name) : ''; ?></div>
          <h3><?php the_title(); ?></h3>
          <p><?php echo esc_html(wp_trim_words(get_the_excerpt(),15,'…')); ?></p>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>
  <div style="margin-top:28px;display:flex;gap:12px;flex-wrap:wrap">
    <a href="<?php echo esc_url(home_url('/request-quote/?brand='.urlencode(get_the_title()))); ?>" class="btn-navy">Request Quote for <?php the_title(); ?></a>
    <?php if ($meta['brochure']) echo '<a href="'.esc_url($meta['brochure']).'" class="btn-outline-dark" target="_blank" download>↓ Download Catalog</a>'; ?>
  </div>
  <div class="seo-chips">
    <?php foreach ([get_the_title().' Authorized Distributor Philippines',get_the_title().' Price List PH','Where to buy '.get_the_title().' in Philippines','Official '.get_the_title().' dealer Philippines'] as $s) : ?>
      <span class="seo-chip"><?php echo esc_html($s); ?></span>
    <?php endforeach; ?>
  </div>
</section>
<?php endwhile; get_footer(); ?>

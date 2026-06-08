<?php /* Template Name: Product Catalog */ get_header(); ?>
<section class="section">
  <div class="section-label">Downloads</div>
  <div class="section-heading">Product Catalog</div>
  <div class="section-sub">Download official product catalogs and brand guides. Updated for 2026.</div>
  <div class="catalog-grid">
    <?php foreach([['Power Tools','Bosch Power Tools Catalog 2026','Full line of drills, grinders, saws, and accessories.','#'],['Hand Tools','Stanley Hand Tools Guide','Measuring, cutting, fastening, and storage solutions.','#'],['Safety','3M Safety Solutions 2026','PPE, respiratory protection, and industrial safety.','#'],['Automotive','WD-40 Full Product Range','Lubricants, cleaners, degreasers, and rust removers.','#'],['Construction','DeWalt Construction Series','Heavy-duty tools for professional construction sites.','#'],['Herco','Herco Full Portfolio 2026','Master catalog across all 50+ brands and product lines.','#']] as $c): ?>
      <a class="catalog-card" href="<?php echo esc_url($c[3]); ?>"><div class="catalog-badge"><?php echo esc_html($c[0]); ?></div><h3><?php echo esc_html($c[1]); ?></h3><p><?php echo esc_html($c[2]); ?></p><div class="catalog-dl">↓ PDF</div></a>
    <?php endforeach; ?>
  </div>
  <div class="crm-note"><div class="crm-note__dot"></div>Catalog downloads are tracked. A sales representative may follow up within 2 business days.</div>
</section>
<?php get_footer(); ?>

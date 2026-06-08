<?php get_header();

$hero = herco_get_image('herco_hero_image', 'hero');
?>
<section class="hero">
  <div class="hero__bg<?php echo $hero['is_placeholder'] ? ' hero__bg--placeholder' : ''; ?>" style="background-image:url('<?php echo esc_url($hero['url']); ?>')"></div>
  <div class="hero__scrim"></div>
  <div class="hero__inner section-inner">
    <p class="hero__eyebrow"><?php echo esc_html(get_theme_mod('herco_hero_badge', herco_hero_default('badge'))); ?></p>
    <h1 class="hero__title"><?php echo wp_kses_post(get_theme_mod('herco_hero_title', herco_hero_default('title'))); ?></h1>
    <p class="hero__desc"><?php echo esc_html(get_theme_mod('herco_hero_desc', herco_hero_default('desc'))); ?></p>
    <div class="hero__btns">
      <a href="<?php echo esc_url(get_post_type_archive_link('brand')); ?>" class="btn btn--primary">Browse All Brands</a>
      <a href="<?php echo esc_url(home_url('/request-quote')); ?>" class="btn btn--ghost-light">Request a Quote</a>
    </div>
  </div>
  <div class="hero__stats section-inner">
    <div class="hero__stat"><span class="hero__stat-num">50+</span><span class="hero__stat-label">Global Brands</span></div>
    <div class="hero__stat"><span class="hero__stat-num">500+</span><span class="hero__stat-label">Trade Partners</span></div>
    <div class="hero__stat"><span class="hero__stat-num">117</span><span class="hero__stat-label">Years in Business</span></div>
  </div>
</section>

<section class="section section--brands" id="brands">
  <div class="section-inner">
    <header class="section-hd">
      <p class="section-label">Our Principals</p>
      <h2 class="section-heading">Trusted Global Brands</h2>
      <p class="section-sub">Over 50 world-class manufacturers across hardware, home improvement, and consumer products.</p>
    </header>
    <div class="brands-scroll-wrap">
      <div class="brands-scroll-fade brands-scroll-fade--l"></div>
      <div class="brands-scroll" tabindex="0" aria-label="<?php esc_attr_e('Scroll to browse partner brands','herco'); ?>">
        <?php
        $brands = new WP_Query(['post_type'=>'brand','posts_per_page'=>-1,'meta_key'=>'brand_featured','meta_value'=>'1','orderby'=>'menu_order','order'=>'ASC']);
        if ($brands->have_posts()) :
          while ($brands->have_posts()) : $brands->the_post();
            $logo = get_the_post_thumbnail_url(get_the_ID(),'medium');
        ?>
          <div class="brand-scroll-item">
            <?php if ($logo) : ?>
              <img src="<?php echo esc_url($logo); ?>" alt="<?php the_title_attribute(); ?>">
            <?php else : ?>
              <img src="<?php echo esc_url(herco_placeholder_url('brand-logo')); ?>" alt="<?php the_title_attribute(); ?>" class="herco-img--placeholder">
              <span class="brand-scroll-name"><?php the_title(); ?></span>
            <?php endif; ?>
          </div>
        <?php endwhile; wp_reset_postdata(); else :
          foreach (['BOSCH','DEWALT','STANLEY','3M','WD-40','YALE','IRWIN','BLACK+DECKER','BAHCO','DEVCON','OXO','BONDHUS','DORMA','BRIGGS & STRATTON','ARMOR ALL'] as $b) :
        ?>
          <div class="brand-scroll-item"><span class="brand-scroll-name"><?php echo esc_html($b); ?></span></div>
        <?php endforeach; endif; ?>
      </div>
      <div class="brands-scroll-fade brands-scroll-fade--r"></div>
    </div>
    <div class="brands-foot">
      <p class="brands-foot__hint">Drag or scroll to browse partner logos</p>
      <a href="<?php echo esc_url(get_post_type_archive_link('brand')); ?>" class="btn btn--secondary">View all brands <?php echo herco_icon('arrow','icon icon--sm'); ?></a>
    </div>
  </div>
</section>

<section class="section">
  <div class="section-inner">
    <header class="section-hd">
      <p class="section-label">Distribution Network</p>
      <h2 class="section-heading">Where We Deliver</h2>
      <p class="section-sub">A scalable nationwide network across all major trade channels.</p>
    </header>
    <div class="dist-grid">
      <?php foreach (herco_dist_cards() as $c) :
        $img = herco_get_image($c['mod'], $c['placeholder']);
      ?>
        <article class="dist-card">
          <div class="dist-card__media<?php echo $img['is_placeholder'] ? ' is-placeholder' : ''; ?>">
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($c['title']); ?>">
          </div>
          <h3><?php echo esc_html($c['title']); ?></h3>
          <p><?php echo esc_html($c['desc']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section--alt">
  <div class="section-inner">
    <header class="section-hd">
      <p class="section-label">Quick Access</p>
      <h2 class="section-heading">What can we help with?</h2>
    </header>
    <div class="actions-grid">
      <?php
      $actions = [
        ['quote','Request a Quotation','Get pricing for bulk orders or specific product inquiries.','/request-quote'],
        ['shield','Warranty Claim','File a product warranty claim and track its resolution.','/warranty-claim'],
        ['wrench','After-Sales Support','Request service, repair, or replacement for purchased products.','/after-sales-support'],
        ['handshake','Retailer Application','Apply to become an authorized Herco retailer.','/retailer-application'],
        ['globe','Supplier Partnership','Introduce your brand to the Philippine market through Herco.','/supplier-partnership'],
        ['calendar','Schedule a Call','Book a consultation with our business development team.','/schedule-a-call'],
      ];
      foreach ($actions as $n => $a) :
      ?>
        <a class="action-card" href="<?php echo esc_url(home_url($a[3])); ?>">
          <span class="action-card__num"><?php echo sprintf('%02d', $n + 1); ?></span>
          <span class="action-card__icon"><?php echo herco_icon($a[0]); ?></span>
          <span class="action-card__body">
            <span class="action-card__title"><?php echo esc_html($a[1]); ?></span>
            <span class="action-card__desc"><?php echo esc_html($a[2]); ?></span>
          </span>
          <span class="action-card__go"><?php echo herco_icon('chev'); ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="section-inner">
    <header class="section-hd">
      <p class="section-label">Support Center</p>
      <h2 class="section-heading">We're Here to Help</h2>
    </header>
    <div class="support-layout">
      <div class="support-stack">
        <a class="support-card" href="<?php echo esc_url(home_url('/warranty-claim')); ?>">
          <span class="support-card__icon"><?php echo herco_icon('shield'); ?></span>
          <span class="support-card__text">
            <strong>Warranty Claims</strong>
            <span class="support-card__desc">Submit a claim for any Herco-distributed product. Response within 3–5 business days.</span>
          </span>
        </a>
        <a class="support-card" href="<?php echo esc_url(home_url('/after-sales-support')); ?>">
          <span class="support-card__icon"><?php echo herco_icon('wrench'); ?></span>
          <span class="support-card__text">
            <strong>After-Sales &amp; Repair</strong>
            <span class="support-card__desc">Servicing, replacement parts, and technical assistance.</span>
          </span>
        </a>
        <a class="support-card" href="<?php echo esc_url(home_url('/faq')); ?>">
          <span class="support-card__icon"><?php echo herco_icon('help'); ?></span>
          <span class="support-card__text">
            <strong>FAQs by Category</strong>
            <span class="support-card__desc">Power tools, safety, hardware, ordering, and more.</span>
          </span>
        </a>
      </div>
      <aside class="contact-panel">
        <h3>Get in Touch</h3>
        <ul class="contact-list">
          <li><?php echo herco_icon('pin'); ?><span><?php echo esc_html(get_theme_mod('herco_address','8F Herco Center, 114 Benavidez Street, Legaspi Village, Makati City 1229')); ?></span></li>
          <li><?php echo herco_icon('phone'); ?><span><a href="tel:<?php echo esc_attr(preg_replace('/\D+/','',get_theme_mod('herco_phone','0288187736'))); ?>"><?php echo esc_html(get_theme_mod('herco_phone','(02) 8818-7736')); ?></a></span></li>
          <li><?php echo herco_icon('mail'); ?><span><a href="mailto:<?php echo esc_attr(get_theme_mod('herco_email','info@herco.com.ph')); ?>"><?php echo esc_html(get_theme_mod('herco_email','info@herco.com.ph')); ?></a></span></li>
          <li><?php echo herco_icon('clock'); ?><span>Mon–Fri, 8:00 AM – 5:30 PM</span></li>
        </ul>
        <div class="contact-panel__btns">
          <a href="<?php echo esc_url(home_url('/schedule-a-call')); ?>" class="btn btn--primary btn--sm">Schedule a Call</a>
          <a href="<?php echo esc_url(home_url('/request-quote')); ?>" class="btn btn--ghost-light btn--sm">Request Quote</a>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php get_footer(); ?>

<?php /* Template Name: Where to Buy */ get_header(); ?>
<section class="section">
  <div class="section-label">Authorized Dealers</div>
  <div class="section-heading">Where to Buy</div>
  <div class="section-sub">Find Herco-authorized retailers and official online stores near you.</div>
  <div class="dealer-search">
    <input type="text" id="dealerSearch" placeholder="Search by city or store name…" oninput="filterDealers()">
    <select id="dealerType" onchange="filterDealers()">
      <option value="all">All Channels</option>
      <option value="hardware">Hardware Stores</option>
      <option value="online">Online Stores</option>
    </select>
  </div>
  <div class="dealer-grid" id="dealerGrid">
    <?php $q=new WP_Query(['post_type'=>'dealer','posts_per_page'=>-1]);
    if ($q->have_posts()) while ($q->have_posts()) : $q->the_post();
      $types=wp_get_post_terms(get_the_ID(),'dealer_type');
      $type=$types?$types[0]->slug:'hardware'; ?>
      <div class="dealer-card" data-type="<?php echo esc_attr($type); ?>" data-city="<?php echo esc_attr(strtolower(get_post_meta(get_the_ID(),'dealer_city',true))); ?>" data-region="<?php echo esc_attr(strtolower(get_post_meta(get_the_ID(),'dealer_region',true))); ?>">
        <span class="dealer-badge <?php echo esc_attr($type); ?>"><?php echo $type==='online'?'Online Store':'Hardware Store'; ?></span>
        <h4><?php the_title(); ?></h4>
        <p><?php echo esc_html(get_post_meta(get_the_ID(),'dealer_address',true)); ?></p>
        <p style="color:var(--subtle);font-size:11px;margin-top:4px"><?php echo esc_html(get_post_meta(get_the_ID(),'dealer_region',true)); ?></p>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <div class="crm-note" style="margin-top:20px"><div class="crm-note__dot"></div>Can't find a dealer near you? <a href="<?php echo esc_url(home_url('/request-quote')); ?>" style="color:var(--navy);font-weight:600;margin-left:4px">Request a quote directly →</a></div>
</section>
<script>function filterDealers(){const q=document.getElementById('dealerSearch').value.toLowerCase(),t=document.getElementById('dealerType').value;document.querySelectorAll('#dealerGrid .dealer-card').forEach(c=>{const mT=t==='all'||c.dataset.type===t,mQ=!q||c.querySelector('h4').textContent.toLowerCase().includes(q)||c.dataset.city.includes(q)||c.dataset.region.includes(q);c.style.display=mT&&mQ?'':'none';});}</script>
<?php get_footer(); ?>

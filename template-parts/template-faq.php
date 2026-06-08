<?php /* Template Name: FAQ Page */ get_header(); ?>
<section class="section">
  <div class="section-label">Help Center</div>
  <div class="section-heading">Frequently Asked Questions</div>
  <div class="filter-chips" id="faqFilters">
    <button class="chip active" data-cat="all">All Categories</button>
    <?php foreach ((array)get_terms(['taxonomy'=>'product_category','hide_empty'=>true]) as $c) : ?>
      <button class="chip" data-cat="<?php echo esc_attr($c->slug); ?>"><?php echo esc_html($c->name); ?></button>
    <?php endforeach; ?>
  </div>
  <div class="faq-list" id="faqList">
    <?php $q=new WP_Query(['post_type'=>'faq','posts_per_page'=>-1]);
    if ($q->have_posts()) while ($q->have_posts()) : $q->the_post();
      $fc=wp_get_post_terms(get_the_ID(),'product_category');
      $sl=implode(' ',array_column((array)$fc,'slug')); ?>
      <div class="faq-item" data-cats="<?php echo esc_attr($sl); ?>">
        <div class="faq-q"><span><?php the_title(); ?></span><span class="faq-toggle">+</span></div>
        <div class="faq-a"><p><?php echo wp_kses_post(get_the_content()); ?></p></div>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</section>
<script>
document.querySelectorAll('.faq-q').forEach(q=>{q.addEventListener('click',()=>{const a=q.nextElementSibling,t=q.querySelector('.faq-toggle'),o=a.classList.contains('open');document.querySelectorAll('.faq-a').forEach(x=>x.classList.remove('open'));document.querySelectorAll('.faq-toggle').forEach(x=>x.textContent='+');if(!o){a.classList.add('open');t.textContent='−';}});});
document.querySelectorAll('#faqFilters .chip').forEach(b=>{b.addEventListener('click',()=>{document.querySelectorAll('#faqFilters .chip').forEach(x=>x.classList.remove('active'));b.classList.add('active');const cat=b.dataset.cat;document.querySelectorAll('#faqList .faq-item').forEach(i=>{i.style.display=(cat==='all'||i.dataset.cats.includes(cat))?'':'none';});});});
</script>
<?php get_footer(); ?>

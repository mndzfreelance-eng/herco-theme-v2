<?php get_header(); ?>
<div class="section">
  <?php while (have_posts()) : the_post(); ?>
    <div class="section-heading"><?php the_title(); ?></div>
    <div class="about-body" style="max-width:720px;margin-top:24px"><?php the_content(); ?></div>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>

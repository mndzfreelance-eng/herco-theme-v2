<?php get_header(); ?>
<div class="section">
  <?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div><?php the_excerpt(); ?></div>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>

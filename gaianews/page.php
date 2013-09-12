<?php get_header(); ?>

<div class="page_body">
  <div class="dettaglio">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     
    <h1><?php the_title(); // titolo pagina ?></h1>
    
    <div class="testo"><?php the_content(); ?></div>
    
    <?php endwhile; else: ?>
      <p><?php _e('Pagina in costruzione'); ?></p>
    <?php endif; ?>
    
  </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
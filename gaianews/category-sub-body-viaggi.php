<?php
	// Modify the default loop, include custom post types
	global $wp_query;
	$args = array_merge( $wp_query->query, array( 'post_type' => 'any' ) );
	query_posts( $args );
?>

<div class="page_body">
  <div class="home">
  
  <h1><?php single_cat_title() ?></h1>
  
  <ul class="sottocategoria">  
  
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <li>  
   
  <?php if ( has_post_thumbnail() ) : ?> 
    <div class="immagine">
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    </div>   
  <?php endif; ?>  
     
    <div class="testo">  
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?> 
  
  </div>
  
  <br clear="all" />
  
	<?php if(function_exists('wp_paginate')) {
      wp_paginate();
  } ?>
  
  </div>
</div>
    
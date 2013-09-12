<?php get_header('viaggi'); ?>

<?php 
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		
?> 

<div class="page_body">
  <div class="home">
  
  <h1>Offerte turistiche</h1>
  
  <h1><?php $term_name ?></h1>
  
  <ul class="sottocategoria">  
  
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <li>  
   
  <?php if ( has_post_thumbnail() ) : ?> 
    <div class="immagine">
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    </div>   
  <?php endif; ?>  
     
    <div class="testo">  
        <h2>
        	<a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a>
        </h2>
        <div class="infos">
					 <?php
            echo "<span>Prezzo:" . get_post_meta(get_the_ID() , 'prezzo', true) . "€ </span>";
            $da_post = get_post_meta(get_the_ID() , 'da', true);
            $da_post = date("d/m/Y", strtotime($da_post));
            $a_post  = get_post_meta(get_the_ID() , 'a',  true);
            $a_post = date("d/m/Y", strtotime($a_post));
            echo ' | Periodo: ' . $da_post . ' - ' . $a_post;
          ?> 
          <div class="addthis_container">
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style" addthis:url="<?php the_permalink()?>" addthis:title="<?php the_title(); ?>" >
              <a class="addthis_button_preferred_1"></a>
              <a class="addthis_button_preferred_2"></a>
              <a class="addthis_button_preferred_3"></a>
              <a class="addthis_button_preferred_4"></a>
              <a class="addthis_button_compact"></a>
              <a class="addthis_counter addthis_bubble_style"></a>
            </div>
            <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
            <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50895e5117edc597"></script>
            <!-- AddThis Button END --> 
          </div>
        </div>  
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

<?php include ('sidebar-viaggi.php'); ?>

<?php get_footer(); ?>
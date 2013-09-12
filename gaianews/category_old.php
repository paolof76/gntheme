<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="page_body">
  <div class="home">
  
	<?php
    $thisCat = get_category(get_query_var('cat'),false);
    $thisCatSlug = ( $thisCat->slug );
  ?>
  
  <!-- ********** primo piano vertical slider ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => 'hp-'.$thisCatSlug.'-primo-piano-vertical-slider'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <div class="primo_piano_vertical_slider">
  <!-- *** IMG PLACEHOLDER *** -->
  <!-- *** IMG PLACEHOLDER *** -->
  <a class="txt">
    <span class="titolo"></span>
    <span class="excerpt"></span>
  </a>
  <ul>
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li>
    <?php echo get_the_post_thumbnail($page->ID, 'large', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
    <a href="javascript:void(0)" rel="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a>
    <div class="excerpt"><?php the_excerpt(); ?></div>
  </li>  
  <?php endwhile; ?>  
  </ul>
  </div>
  <?php endif; ?>  
  <?php wp_reset_query();?>  

  <!-- ********** primo piano titolo sovrapposto ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => 'hp-'.$thisCatSlug.'-primo-piano-titolo-sovrapposto'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="primo_piano_tit_sovrapposto">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li>   
    <div class="immagine">
      <?php echo get_the_post_thumbnail($page->ID, 'large', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
    </div>    
    <a class="testo" href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">      
        <h2><?php the_title(); ?></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div>
    </a>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
  <!-- ********** primo piano titolo sopra ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => 'hp-'.$thisCatSlug.'-primo-piano-titolo-sopra'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="primo_piano_tit_sopra">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li> 
    <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>                  
    <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    <div class="excerpt">
       <?php the_excerpt(); ?> 
    </div>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
  <!-- ********** secondo piano ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => 'hp-'.$thisCatSlug.'-secondo-piano'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="secondo_piano">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li>   
    <div class="immagine">
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    </div>    
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
  
  <!-- ********** terzo piano ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => 'hp-'.$thisCatSlug.'-terzo-piano'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="terzo_piano">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
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
  
  <!-- ********** quarto piano Sx ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => 'hp-'.$thisCatSlug.'-quarto-piano-sx'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="quarto_piano_sx">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>     
    <div class="testo">      
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div>    
  </li>  
  <?php endwhile; ?>
  <div class="box_banner"> 
    <img src="/wp-content/themes/gaianews/images/banners/adsense_300x250.jpg" width="300" height="250" />
  </div>
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?> 
  
  <!-- ********** quarto piano Dx ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => 'hp-'.$thisCatSlug.'-quarto-piano-dx'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="quarto_piano_dx">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>         
    <div class="testo">      
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
    </div>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
  <br clear="all" />
  
  <div class="categorie">  
  <?php 
	$listaCategorie = array("alimentazione", "ambiente", "attualita", "cultura-e-societa");
	while ( $categoria = each($listaCategorie) ) : 	
	?>   
  
		<?php query_posts(array( 'category_name' => $categoria[1], 'posts_per_page' => '4' )); 
		$catObj = get_category_by_slug( $categoria[1] );
		$catLink = get_category_link( $catObj->cat_ID );
		$catName = $catObj->cat_name;
		?>  
    <ul class="box_categorie">
    <h2><a href="<?php echo $catLink; ?>"><?php echo $catName; ?> &raquo;</a></h2>  
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
      <li>
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
        <?php the_title()?>
      </a>
      </li>	
      <?php endwhile; ?>
      <?php endif; ?>    
    </ul>  
    <?php wp_reset_query();?>
  
  <?php endwhile; ?>  
  </div>
  
  <br clear="all" />
  <br /><br /><br /><br />
  
  </div>
</div>
    
<?php get_footer(); ?>
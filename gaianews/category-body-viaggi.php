<?php 
	if (is_home()) {
		$thisCatSlug = 'homepage';
	} else {
		$thisCatId = get_query_var('cat');
		$thisCat = get_category($thisCatId,false);
		$thisCatSlug = 'hp-'.$thisCat->slug;
	}
	echo '<!--thisCatId:'.$thisCatId.'-->'; 
	//echo '<!--thisCat:'.$thisCat.'-->'; 
	echo '<!--thisCatSlug:'.$thisCatSlug.'-->'; 
?>

<div class="page_body">
  <div class="home">

  <!-- ********** primo piano titolo sovrapposto ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-primo-piano-titolo-sovrapposto'
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
      <?php echo get_the_post_thumbnail($page->ID, 'original', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
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
  
  <!-- ********** primo piano vertical slider ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-primo-piano-vertical-slider'
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
    <?php echo get_the_post_thumbnail($page->ID, 'original', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
    <span class="titolo_orig"><?php the_title(); ?></span>
    <a class="titolo" href="javascript:void(0)" rel="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
			<?php		
      if ($thisCatSlug == 'homepage') {
        echo '<div class="categoria">';
        foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
        echo '</div>';
      };		
      ?>
			<?php 
      $titolo =  the_title('','',false); 
      $titolo_notizia = substr($titolo ,0 ,40); 
      if($titolo != $titolo_notizia){$titolo_notizia .= "...";}
      echo $titolo_notizia;				
      ?>
    </a>
    <div class="excerpt"><?php the_field('sottotitolo-viaggi'); ?></div>
  </li>  
  <?php endwhile; ?>  
  </ul>
  </div>
  <?php endif; ?>  
  <?php wp_reset_query();?> 
  
  <!-- ********** primo piano titolo sopra ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-primo-piano-titolo-sopra'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="primo_piano_tit_sopra">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li> 
		<?php		
		if ($thisCatSlug == 'homepage') {
			echo '<div class="categoria">';
		  foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
			echo '</div>';
		};		
		?>
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
				'terms' => $thisCatSlug.'-secondo-piano'
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
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>  
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
  

    
  <!-- ********** terzo piano stretto ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-terzo-piano-stretto'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="terzo_piano_stretto">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>  
   
  <?php if ( has_post_thumbnail() ) : ?> 
    <div class="immagine">
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    </div>   
  <?php endif; ?>  
     
    <div class="testo">
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
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

    
  <!-- ********** terzo piano Blog ********** -->
  <?php $post_count = 0; ?>
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-terzo-piano-blog'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
	<?php
    $category_id = get_cat_ID( 'Blog Viaggi' );
	$category_link = get_category_link( $category_id );
	?>
  <ul class="terzo_piano_blog">
	<h2>
		<div class="testata"><a href="<?php echo $category_link ?>">Blog Viaggi</a></div>
	</h2>
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>  
   
	<?php if (++$post_count == 1) : ?>
		<div class="immagine">
			<a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
				<?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
            </a>
		</div>
	<?php endif; ?>  
     
    <div class="testo">
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
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
				'terms' => $thisCatSlug.'-terzo-piano'
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
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
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
				'terms' => $thisCatSlug.'-quarto-piano-sx'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="quarto_piano_sx">
    <div class="box_banner"> 
			<script type="text/javascript">
			<!--
      google_ad_client = "ca-pub-9411647215177959";
      /* HOME PAGE SOTTO */
      google_ad_slot = "8136851180";
      google_ad_width = 300;
      google_ad_height = 250;
      //-->
      </script>
      <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
    </div>
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
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?> 
  
  <!-- ********** quarto piano Dx ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-quarto-piano-dx'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="quarto_piano_dx">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>    
		<?php		
		if ($thisCatSlug == 'homepage') {
			echo '<div class="categoria">';
		  foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
			echo '</div>';
		};		
		?>
    <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>                
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
  <br clear="all" />
  
  </div>
</div>
    
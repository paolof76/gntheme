<div class="col_dx">

<?php 
  if (is_home()) {
     $thisCatSlug = 'homepage';
	} elseif (is_single()) {
		$thisCatArray = get_the_category();
		// se l'articolo è assegnato a più categorie 
		// sarà necessario scegliere opportunamente la categoria
		$thisCat = $thisCatArray[0];		
		if ($thisCat != ''){		
			$thisCatId	= $thisCat->cat_ID;
			if (cat_has_parent($thisCatId)){
				$thisCatSlug = get_parent_cat_slug($thisCatId);
			} else {
				$thisCatSlug = $thisCat->slug;
			}
		} else {
			// se non ha categoria prende la coldx di home
			$thisCatSlug = 'homepage';			
		}			
	} elseif (is_page()) {	
			$thisCatSlug = 'homepage';		
	} else {
		$thisCatId = get_query_var('cat');
		$thisCat = get_category($thisCatId,false);
		if (cat_has_parent($thisCatId)){
			$thisCatSlug = get_parent_cat_slug($thisCatId);		
		} else {
			$thisCatSlug = $thisCat->slug;	
		}		
	}	
?>
  
  <!-- ********** flash news ********** -->
    
  <?php
		$args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'pubblicazione',
					'field' => 'slug',
					'terms' => 'colonna-dx-flash-news'
				)
			)
		);
		$myquery = new WP_Query( $args );
		query_posts($myquery);
	?>  
  <ul class="widgets flash_news_widget">
    <li>  
    <h3>Flash news</h3>
    <div class="flash_news_wrapper">
      <div class="flash_news">
      <ul>
        <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
        <li>
          <div>
          <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">      
              <?php 
              $titolo =  the_title('','',false); 
              $titolo_notizia = substr($titolo ,0 ,75); 
              if($titolo != $titolo_notizia){$titolo_notizia .= "...";}
              echo $titolo_notizia;				
              ?>
          </a>
          <span class="relative_time"> <?php echo vsrp_relative_time(get_the_time('U')) ?></span>
          </div>
        </li>  
        <?php endwhile; ?> 
      </ul>
      </div>
    </div>
    </li>
  </ul>
  
  <?php
  	  wp_reset_query();
  ?>
  
	<div class="box_banner"> 
	  <script type="text/javascript">
	  <!--
      google_ad_client = "ca-pub-9411647215177959";
      /* BOX COLONNA DX */
      google_ad_slot = "2529673370";
      google_ad_width = 300;
      google_ad_height = 250;
      //-->
      </script>
      <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
    </div>
  
  
  <ul class="widgets">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($thisCatSlug.' - Colonna Dx')) : ?>
  <?php endif; ?>
  </ul>
  
  <p />
    
  
  <a class="twitter-timeline" href="https://twitter.com/Gaianews" data-widget-id="271010627122761728">Tweets di @Gaianews</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  
</div>
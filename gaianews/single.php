<?php get_header(); ?>

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
			// echo 'categoria: '.$thisCat->slug;
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
		// echo 'categoria: '.$thisCat->slug;
		if (cat_has_parent($thisCatId)){
			$thisCatSlug = get_parent_cat_slug($thisCatId);		
		} else {
			$thisCatSlug = $thisCat->slug;	
		}		
	}	
?>

<div class="page_body">
  <div class="dettaglio">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     
    <h1><?php the_title() ?></h1>
    <h2><?php the_field('Sottotitolo'); ?></h2>

    <div class="banner">
            <script type="text/javascript">
      <!--
      google_ad_client = "ca-pub-9411647215177959";
      /* BANNER DETTAGLIO ARTICOLI */
      google_ad_slot = "0169006282";
      google_ad_width = 468;
      google_ad_height = 60;
      //-->
      </script>
      <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
    </div>
    
    <div class="testo">

      <div class="col_servizi">
      
        <!-- AddThis Button BEGIN -->
        <div class="socialbar">
        <div class="item"><a class="addthis_button_facebook_like" fb:like:action="recommend" fb:like:layout="box_count" fb:like:width="70"></a></div>
        <div class="item"><a class="addthis_button_tweet" tw:count="vertical"></a></div>
        <div class="item gp"><a class="addthis_button_google_plusone" g:plusone:size="tall"></a></div>
        </div>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-50895e5117edc597"></script>
        <!-- AddThis Button END -->
        
        <ul class="widgets">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Dettaglio - Colonna di servizio')) : ?>
        <?php endif; ?>
        </ul>
          
      </div>
        
      <div class="autore_data">Scritto da <?php the_author(); ?> il <?php the_date(); ?></div>
      
            
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
      
      <div class="contenuto_testuale"><?php the_content(); ?></div>
      
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
      
      <div class="tags"><?php the_tags("Tag: ", ", ", ""); ?></div>
      <div class="autore_data">© RIPRODUZIONE RISERVATA</div>

      
         
      <?php comments_template(); ?> 
    
    </div>
    
    <?php endwhile; else: ?>
      <p><?php _e('Pagina in costruzione'); ?></p>
    <?php endif; ?>
    
  </div>
</div>
    
<?php get_sidebar(); ?>

<?php get_footer(); ?>
     

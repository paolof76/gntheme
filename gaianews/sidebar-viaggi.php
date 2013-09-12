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

  <!-- #######  RICERCA VIAGGI  ####### -->
  <form method="get" action="<?php bloginfo('home'); ?>">
  <input type="hidden" value=" " name="s" />
  <input type="hidden" name="post_type[]" value="offerta-turistica" /> 
   
  <ul class="widgets">
    <li class="widget ricerca_viaggi">
       <h3>Cerca viaggi</h3>
       
       <ul>
         <li>
           <label>Partenza</label>
           <input type="text" name="da" class="tcal" />
         </li>
         <li>
           <label>Ritorno</label>
           <input type="text" name="a" class="tcal" />
         </li>
         <li>
           <label>A partire da</label>
           <select name="prezzo" data-placeholder="Seleziona prezzo minimo">
            <option value=""></option>
            <option value="100">100€</option>
            <option value="300">300€</option>
            <option value="500">500€</option>
            <option value="600">600€</option>
            <option value="700">700€</option>
            <option value="800">800€</option>
            <option value="900">900€</option>
            <option value="1000">1000€</option>
            <option value="2000">2000€</option>
            <option value="5000">5000€</option>
	         </select>
         </li>
         <li>
           <label>Prezzo max</label>
           <select name="prezzo_max" data-placeholder="Seleziona prezzo massimo">
            <option value=""></option>
            <option value="100">100€</option>
            <option value="300">300€</option>
            <option value="500">500€</option>
            <option value="600">600€</option>
            <option value="700">700€</option>
            <option value="800">800€</option>
            <option value="900">900€</option>
            <option value="1000">1000€</option>
            <option value="2000">2000€</option>
            <option value="5000">5000€</option>
	         </select>
         </li>
         <li>
           <label>Destinazione</label>           
           <select name="destinazioni[]" multiple data-placeholder="Seleziona le destinazioni">
            <option value=""></option>            
						<?php
              $taxonomy_terms = get_terms('destinazioni');
							foreach ($taxonomy_terms as $taxonomy_term) {
							  echo '<option value="'.$taxonomy_term->slug.'">'.$taxonomy_term->name.'</option>';
							}
            ?>
	         </select>       
         </li>
         <li>
           <input type="submit" value="Cerca" />
         </li>  
       </ul>
      
    </li>
  </ul>
  </form>
  
  <div class="tag_cloud"> 
	<?php
    wp_tag_cloud(
				array(
						'taxonomy' => 'destinazioni',
						'format' => 'flat',
						'separator' => ' ',
						'smallest' => 1,
						'largest' => 2,
						'unit' => 'em', 
						'number' => 45,  
					)
				);
  ?> 
  </div>
  
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
  
</div>
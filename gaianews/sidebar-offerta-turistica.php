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
  <input type="text" value=" " name="s" id="s" />
  <input type="hidden" name="post_type[]" value="offerta-turistica" /> 
   
  <ul class="widgets">
    <li class="widget ricerca_viaggi">
       <h3>Cerca viaggi</h3>
       
       <ul>
         <li>
           <label>Prezzo min</label>
           <select name="prezzo_min" data-placeholder="Seleziona prezzo min">
            <option value=""></option>
            <option value="100€">100€</option>
            <option value="300€">300€</option>
            <option value="500€">500€</option>
            <option value="1000€">1000€</option>
	         </select>
         </li>
         <li>
           <label>Prezzo max</label>
           <select name="prezzo_max" data-placeholder="Seleziona prezzo max">
            <option value=""></option>
            <option value="100€">100€</option>
            <option value="300€">300€</option>
            <option value="500€">500€</option>
            <option value="1000€">1000€</option>
	         </select>
         </li>
         <li>
           <label>Destinazione</label>           
           <select name="destinazioni[]" multible data-placeholder="Seleziona le destinazioni">
            <option value=""></option>            
						<?php
              $tax_terms = get_terms('destinazioni');
							foreach ($tax_terms as $tax_term) {
							  echo '<option value="'.$tax_term->name.'">'.$tax_term->name.'</option>';
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
  
	<?php
    wp_tag_cloud( array( 'taxonomy' => 'destinazioni', format => 'list' ) );
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
  
</div>
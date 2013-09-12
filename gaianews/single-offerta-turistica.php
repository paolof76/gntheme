<?php get_header('viaggi'); ?>

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

<div class="page_body">
  <div class="dettaglio">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     
    <h1><?php the_title() ?></h1> 
		<h2><?php the_field('sottotitolo-viaggi'); ?></h2>    
    
    <div class="testo">

    <?php	//inserisco la immagine testata del viaggio
	  	$foto_testata = get_post_meta(get_the_ID() , 'immagine_testata', true);
		?>
    <br /><img src="<?php echo wp_get_attachment_url( $foto_testata ); ?>" />			
			 
      
    <div class="contenuto_testuale">		
		<?php the_content(); ?>
    </div>
    
    <p><?php echo get_the_term_list( $post->ID, 'destinazioni', 'Destinazioni: ', ', ', '' ); ?></p>
  
    <!-- CREO l'elenco dei dati dell'offerta turistica-->
      
      <?php
						
			$da = get_post_meta(get_the_ID() , 'da', true);
			$da = date("d/m/Y", strtotime($da));
			$a = get_post_meta(get_the_ID() , 'a', true);
			$a = date("d/m/Y", strtotime($a));
			
			$prezzo = get_post_meta(get_the_ID() , 'prezzo', true);
					
			$guida = get_post_meta(get_the_ID() , 'guida', true);
			$come = get_post_meta(get_the_ID() , 'come', true);
			$cosa = get_post_meta(get_the_ID() , 'cosa_facciamo', true);
			$dove_dormiamo = get_post_meta(get_the_ID() , 'dove_dormiamo', true);
			$pasti = get_post_meta(get_the_ID() , 'pasti', true);
			$come_si_raggiunge = get_post_meta(get_the_ID() , 'come_si_raggiunge', true);
			$attrezzatura = get_post_meta(get_the_ID() , 'attrezzatura', true);
			$trasporti_locali = get_post_meta(get_the_ID() , 'trasporti_locali', true);
			$documenti = get_post_meta(get_the_ID() , 'documenti', true);
						  
	  ?>
      		            
      <table class="features-table">
        <thead>
					<tr>
						<th colspan="2">Informazioni sul viaggio</th>		
					</tr>
				</thead>
				<tbody>
                <?php if ($da != ''){ ?>
					<tr>
						<td>Quando partire</td>
						<td><?php echo $da; ?></td>			
					</tr> 
                <?php } ?>
                <?php if ($a != ''){ ?>
					<tr>
						<td>Ritorno</td>
						<td><?php echo $a; ?></td>			
					</tr> 
                <?php } ?>
                <?php if ($prezzo != ''){ ?>
					<tr>
						<td>Prezzo</td>
						<td><?php echo $prezzo; ?></td>			
					</tr> 
                <?php } ?>
                <!--
				<?php if ($guida != ''){ ?>
					<tr>
						<td>La vostra guida</td>
						<td><?php //echo $guida; ?></td>			
					</tr> 
                <?php } ?>
                -->
                <?php if ($come != ''){ ?>
					<tr>
						<td>Come arrivare</td>
						<td><?php echo $come; ?></td>			
					</tr> 
                <?php } ?>
                <?php if ($cosa != ''){ ?>
					<tr>
						<td>Cosa facciamo</td>
						<td><?php echo $cosa; ?></td>			
					</tr> 
                <?php } ?>
				<?php if ($dove_dormiamo != ''){ ?>
					<tr>
						<td>Dove dormiamo</td>
						<td><?php echo $dove_dormiamo; ?></td>			
					</tr> 
                <?php } ?>
				<?php if ($pasti != ''){ ?>
					<tr>
						<td>Pasti</td>
						<td><?php echo $pasti; ?></td>			
					</tr> 
      			<?php } ?>
				</tbody>
	  	</table>
            
      <?php echo do_shortcode('[contact-form-7 id="29971" title="Prenota questa offerta"]') ?>
      
      <div class="tags"><?php the_tags("Tag: ", ", ", ""); ?></div>   
    
    </div>
    
    <?php endwhile; else: ?>
      <p><?php _e('Pagina in costruzione'); ?></p>
    <?php endif; ?>
    
  </div>
</div>
    
<?php include ('sidebar-viaggi.php'); ?>

<?php get_footer(); ?>
     

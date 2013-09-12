<?php

  //variabili d'ambiente
	//$currentCatSlug = '';	
  $listaCategorie = array("ambiente", "attualita", "cultura-e-societa", "green-economy", "salute", "scienza-e-tecnologia");

	register_nav_menus(array(
		'navigazione' => 'Menu di navigazione',
		'footer' => 'Menu di navigazione footer',
	));
	
	register_sidebar(array(
		'name' => 'dettaglio - Colonna di servizio',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'homepage - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'ambiente - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'attualita - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'cultura-e-societa - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'green-economy - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'salute - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'scienza-e-tecnologia - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	
	register_sidebar(array(
		'name' => 'viaggi - Colonna Dx',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',	
	));
	

	function cat_has_parent($catid){
		$category = get_category($catid);
		if ($category->category_parent > 0){
				return true;
		}
		return false;
	}

	function get_parent_cat_slug($catid){
		$category = get_category($catid);
	  $parentCatId = $category->category_parent;
		if ($parentCatId > 0){
			$parentCat = get_category($parentCatId);
			return $parentCat->slug;
		}
		return '';
	}
	
	add_theme_support( 'post-thumbnails');
	
	// tassonomia punti di pubblicazione
	add_action( 'init', 'crea_tassonomia_pubblicazione', 0 );
	function crea_tassonomia_pubblicazione() {
		$labels = array(
			'name' => _x( 'Punto di pubblicazione', 'taxonomy general name' ),
			'singular_name' => _x( 'Punto di pubblicazione', 'taxonomy singular name' ),
			'search_items' =>  __( 'Cerca punto di pubblicazione' ),
			'all_items' => __( 'Tutti i punti di pubblicazione' ),
			'parent_item' => __( 'Punto di pubblicazione padre' ),
			'parent_item_colon' => __( 'Punto di pubblicazione padre:' ),
			'edit_item' => __( 'Modifica punto di pubblicazione' ), 
			'update_item' => __( 'Aggiorna punto di pubblicazione' ),
			'add_new_item' => __( 'Aggiungi punto di pubblicazione' ),
			'new_item_name' => __( 'Nuovo punto di pubblicazione' ),
			'menu_name' => __( 'Punti di pubblicazione' ),
		);		
		register_taxonomy('pubblicazione',array('post','page', 'offerta-turistica'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'pubblicazione' ),
		));
	}
	
	// inserisco colonna per tassonomia pubblicazione in elenco posts
	add_filter('manage_edit-post_columns', 'manage_edit_post_columns');
	function manage_edit_post_columns($columns) {	
		$columns['pubblicazione'] = __('Pubblicato in');	
		return $columns;
	}	
	
	// popolo colonna per tassonomia pubblicazione in elenco posts
	add_action( 'manage_posts_custom_column', 'manage_edit_post_column', 10, 2);
	function manage_edit_post_column($column_name, $post_id ) {
		$post = get_post($post_id);	
		switch ($column_name) {
			
			case 'pubblicazione':
				unset($medgadget_display_term_links);
				$my_custom_taxonomy_terms = get_the_terms( $post_id, 'pubblicazione' );	
				if ( !empty($my_custom_taxonomy_terms) ) {
					$out = array();
					foreach ($my_custom_taxonomy_terms as $term) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'pubblicazione' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'pubblicazione', 'display' ) )
						);
					}
					echo join( '<br />', $out );
				}
				else {
					echo 'Nessun punto';
				}
				break;
				
			default:
				break;
		}
	}
	
	// inserisco colonna per tassonomia pubblicazione in elenco pagine
	add_filter('manage_edit-page_columns', 'manage_edit_page_columns');
	function manage_edit_page_columns($columns) {	
		$columns['pubblicazione'] = __('Pubblicato in');	
		return $columns;
	}	
	
	// popolo colonna per tassonomia pubblicazione in elenco pagine
	add_action( 'manage_pages_custom_column', 'manage_edit_page_column', 10, 2);
	function manage_edit_page_column($column_name, $post_id ) {
		$post = get_post($post_id);	
		switch ($column_name) {
			
			case 'pubblicazione':
				unset($medgadget_display_term_links);
				$my_custom_taxonomy_terms = get_the_terms( $post_id, 'pubblicazione' );	
				if ( !empty($my_custom_taxonomy_terms) ) {
					$out = array();
					foreach ($my_custom_taxonomy_terms as $term) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'pubblicazione' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'pubblicazione', 'display' ) )
						);
					}
					echo join( '<br />', $out );
				}
				else {
					echo 'Nessun punto';
				}
				break;
				
			default:
				break;
		}
	}	
	
	// determino quanto tempo è passato dalla notizia
	function vsrp_relative_time( $timestamp ){	
			if( !is_numeric( $timestamp ) ){	
					$timestamp = strtotime( $timestamp );	
					if( !is_numeric( $timestamp ) ){	
							return "";	
					}	
			}		
			$difference = time() - $timestamp + 3600;	
			$ttt=$difference;	
			$periods = array( "sec", "min", "or", "giorn", "settiman", "mes", "ann", "decad" );	
			$lengths = array( "60","60","24","7","4.35","12","10");		
			if ($difference >= 0) {
					$ending = "fa";	
			} else {
					$difference = - $difference;	
					$ending = "fa";	
			}	
			for( $j=0; $difference>=$lengths[$j] and $j < 7; $j++ )	
					$difference /= $lengths[$j];	
			$difference = round($difference);				
			if( $difference == 1 ){			
				$periods[2].= "a";			
				$periods[3].= "o";			
				$periods[4].= "a";			
				$periods[5].= "e";			
				$periods[6].= "o";			
				$periods[7].= "e";		
			}		
			if( $difference != 1 ){		
				$periods[2].= "e";			
				$periods[3].= "i";			
				$periods[4].= "e";			
				$periods[5].= "i";			
				$periods[6].= "i";			
				$periods[7].= "i";	
			}	
			$text = " $difference $periods[$j] $ending";	
			return $text;
	}
	
	// custom post types
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		
		// offerte turistiche
		register_post_type( 'offerta-turistica',
			array(
				'labels' => array(
					'name' => __( 'Offerte turistiche' ),
					'singular_name' => __( 'Offerta turistica' )
				),
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('category'),
			'supports' => array('title','editor','author','thumbnail','excerpt','comments')
			//,'rewrite' => array('slug' => 'offerte','with_front' => FALSE)
			)
		);
		
		// destinazioni turistiche
		register_post_type( 'destinazioni-turisti',
			array(
				'labels' => array(
					'name' => __( 'Destinazioni turistiche' ),
					'singular_name' => __( 'Destinazione turistica' )
				),
			'public' => true,
			'has_archive' => true,
			'taxonomies' => array('category'),
			'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
			//,'rewrite' => array('slug' => 'offerte','with_front' => FALSE)
			)
		);
		
	}
	  
	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name' => _x( 'Destinazioni', 'Destinazioni turistiche, plurale' ),
		'singular_name' => _x( 'Destinazione', 'Destinazione turistica, singolare' ),
		'search_items' =>  __( 'Cerca destinazioni' ),
		'popular_items' => __( 'Destinazioni popolari' ),
		'all_items' => __( 'Tutte le destinazioni' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edita Destinazione' ), 
		'update_item' => __( 'Aggiorna Destinazione' ),
		'add_new_item' => __( 'Aggiungi Nuova Destinazione' ),
		'new_item_name' => __( 'Nuovo Nome Destinazione' ),
		'separate_items_with_commas' => __( 'Separa Destinazioni con virgola' ),
		'add_or_remove_items' => __( 'Aggiungi o rimuovi Destinazione' ),
		'choose_from_most_used' => __( 'Scegli dalle Destinazioni piu usate' ),
		'menu_name' => __( 'Destinazioni' ),
	  ); 
	
	  register_taxonomy('destinazioni','offerta-turistica',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'destinazioni' ),
	  ));

?>
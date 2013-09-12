<?php 
		$cat = get_query_var('cat');
		$category = get_category($cat);
		$category->parent;
		if ($category->parent > '0'){
			$parent_category = get_category($category->parent);
			if ($parent_category->name == 'Viaggi') {
				get_header('viaggi');
        get_sidebar('viaggi');
			  get_template_part( 'category-sub', 'body-viaggi' );
			}else {
				get_header();
				get_sidebar();
			  get_template_part( 'category-sub', 'body' );
			}
		} else {
			if ($category->name == 'Viaggi') {
				get_header('viaggi');
        get_sidebar('viaggi');
			  get_template_part( 'category', 'body-viaggi' );
			}else {
				get_header();
				get_sidebar();
			  get_template_part( 'category', 'body' );
			}
		}
?>   

<?php get_footer(); ?>
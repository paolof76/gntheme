<?php get_header('viaggi'); ?>
<?php include ('sidebar-viaggi.php'); ?>

<?php 
		$cat = get_query_var('cat');
		$category = get_category($cat);
		$category->parent;
		if ($category->parent > '0'){
			get_template_part( 'category-sub', 'body-viaggi' );
		} else {
			get_template_part( 'category', 'body-viaggi' );
		}
?>

<?php get_footer(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="robot" content="all">
<meta name="robots" content="index,follow">
<meta name="location" content="bologna,emilia romagna,italia">
<meta name="revisit-after" content="7 days">
<meta name="distribution" content="Global">
<meta name="language" content="it">
<meta name="audience" content="all">
<meta name="viewport" content="width=device-width">

<?php if (is_single() || is_page()){ 
	$postthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
	if ($postthumb['0']) {
		$postthumburl = $postthumb['0'];
	} else {
		$postthumburl = get_bloginfo('template_url').'/images/logos/logo.jpg';
	}
?>
<link rel="image_src" href="<?php echo $postthumburl; ?>" />
<?php } else { ?>
<link rel="image_src" href="<?php bloginfo('template_url'); ?>/images/logos/logo.jpg" />
<?php } ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="icon" href="http://www.gaianews.it/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<title><?php wp_title(); ?></title>

<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.vticker.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lightbox.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/tcal.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/gaianews.js"></script>

<script type="text/javascript">
$j(document).ready(function(){	
  $j(".header .menu_nav > ul > li#menu-item-31214").addClass('current-menu-item');
});
</script>

<meta name="google-site-verification" content="YAj_TcQC0dTqqT64CutWbkvWxN4TvYca02t2qdrFTf0" />

</head>
<body>

<img src="images/struttura/sfondo_header.jpg" width="960" height="100" alt="Gaianews" class="header_print" />
<div class="page_wrapper">

<div class="header header_viaggi">
  <a class="home" href="/" title="homepage"></a>
  <div class="menu_nav">
      <?php wp_nav_menu(array(
				'theme_location' => 'navigazione',
				'container' => false, 
			)); ?> 
  </div>
  <div class="banner">
		<script type="text/javascript">
		<!--
    google_ad_client = "ca-pub-1417052182885260";
    /* BANNER HEADER */
    google_ad_slot = "2757807039";
    google_ad_width = 728;
    google_ad_height = 90;
    //-->
    </script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
    <a href="https://www.facebook.com/Gaianews.it" class="social fb" title="Seguici su Facebook" target="_blank"></a>
    <a href="https://twitter.com/Gaianews" class="social tw" title="Seguici su Twitter" target="_blank"></a>
    <a href="https://plus.google.com/u/0/104688499858525986145" class="social gp" title="Seguici su Google+" target="_blank"></a>
    <a href="http://www.youtube.com/user/gaianewsitalia" class="social yt" title="Seguici su YouTube" target="_blank"></a>
    <div class="ricerca">
      <form action="http://www.google.it" id="cse-search-box">
        <div>
          <input type="hidden" name="cx" value="partner-pub-9411647215177959:6546513870" />
          <input type="hidden" name="ie" value="UTF-8" />
          <input type="text" name="q" size="40" />
          <input type="submit" name="sa" value="Cerca" />
        </div>
      </form>      
      <script type="text/javascript" src="http://www.google.it/coop/cse/brand?form=cse-search-box&amp;lang="></script>
    </div>
  </div>
  
</div>
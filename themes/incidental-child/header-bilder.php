<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8" />
	<title><?php echo $GLOBALS['adress'] . ', ' . $GLOBALS['omrade'] .', ' . $GLOBALS['kommun'] . ' | ' . 'Fantastic Frank'; ?></title>
	<meta name="keywords" content="<?php echo $GLOBALS['adress'] . ', ' . $GLOBALS['omrade'] .', ' . $GLOBALS['kommun'] . ', fastighetsmäklare, Fantastic Frank'; ?>" />
	<meta name="description" content="Genom Fantastic Frank förmedlas - <?php echo $GLOBALS['saljbeskrivning']; ?>" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="image_src" href="<?php echo $GLOBALS['image'];?>">
	<?php global $gdl_is_responsive ?>
	<?php if( $gdl_is_responsive ){ ?>
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/skeleton-responsive.css">
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/layout-responsive.css">	
	<?php }else{ ?>
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/skeleton.css">
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/layout.css">	
	<?php } ?>
	
	<script type="text/javascript" src="http://fast.fonts.com/jsapi/a8947e9a-9ac3-4058-aaa1-c0e53efd2446.js"></script>
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/ie-style.php?path=<?php echo GOODLAYERS_PATH; ?>" type="text/css" media="screen, projection" /> 
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/ie7-style.css" /> 
	<![endif]-->	
	
	<!-- Favicon
   ================================================== -->
	<?php 
		if(get_option( THEME_SHORT_NAME.'_enable_favicon','disable') == "enable"){
			$gdl_favicon = get_option(THEME_SHORT_NAME.'_favicon_image');
			if( $gdl_favicon ){
				$gdl_favicon = wp_get_attachment_image_src($gdl_favicon, 'full');
				echo '<link rel="shortcut icon" href="' . $gdl_favicon[0] . '" type="image/x-icon" />';
			}
		} 
	?>

	<!-- Start WP_HEAD
   ================================================== -->
		
	<?php wp_head(); ?>
	
	<!-- FB Thumbnail
   ================================================== -->
	<?php
	if( is_single() ){
		$thumbnail_id = get_post_meta($post->ID,'post-option-inside-thumbnial-image', true);
		if( !empty($thumbnail_id) ){
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
			echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';
		}
	} else{
		$thumbnail_id = get_post_thumbnail_id();
		if( !empty($thumbnail_id) ){
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
			echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';		
		}
	}
	?>
	<meta property="og:image" content="<?php echo $GLOBALS['image'];?>" />	
</head>
<body <?php echo body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/sv_SE/all.js#xfbml=1&appId=221471901270497";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
	global $gdl_page_slider_thumbnail, $gdl_page_slider_nav, $gdl_page_content_area, $gdl_page_first_stage;
	if( is_page() || is_front_page() ){
		$gdl_page_first_stage = get_post_meta( $post->ID, 'page-option-first-state', true); 
		if( !empty( $gdl_page_first_stage ) ){
			$gdl_page_slider_nav = (get_post_meta( $post->ID, 'page-option-enable-nav', true) != 'No')? true: false;
			$gdl_page_slider_thumbnail = (get_post_meta( $post->ID, 'page-option-enable-thumbnail', true) != 'No')? true: false;
			$gdl_page_content_area = get_post_meta( $post->ID, 'page-option-enable-content-area', true);
		}else{
			$gdl_page_slider_nav = (get_option( THEME_SHORT_NAME.'_page_caption_nav', 'Yes') != 'No')? true: false;
			$gdl_page_slider_thumbnail = (get_option( THEME_SHORT_NAME.'_page_bg_thumbnail', 'Yes') != 'No')? true: false;
			$gdl_page_content_area = get_option( THEME_SHORT_NAME.'_page_content_area', 'On');
			$gdl_page_first_stage = get_option( THEME_SHORT_NAME.'_page_bg_first_state', 'Content');				
		}
	}else if( is_single() ){
		$gdl_page_slider_nav = (get_option( THEME_SHORT_NAME.'_single_caption_nav', 'Yes') != 'No')? true: false;
		$gdl_page_slider_thumbnail = (get_option( THEME_SHORT_NAME.'_single_bg_thumbnail', 'Yes') != 'No')? true: false;
		$gdl_page_content_area = get_option( THEME_SHORT_NAME.'_single_content_area', 'On');
		$gdl_page_first_stage = get_option( THEME_SHORT_NAME.'_single_bg_first_state', 'Content');		
	}else if( is_search() || is_archive() ){
		$gdl_page_slider_nav = (get_option( THEME_SHORT_NAME.'_search_caption_nav', 'Yes') != 'No')? true: false;
		$gdl_page_slider_thumbnail = (get_option( THEME_SHORT_NAME.'_search_bg_thumbnail', 'Yes') != 'No')? true: false;
		$gdl_page_content_area = get_option( THEME_SHORT_NAME.'_search_content_area', 'On');
		$gdl_page_first_stage = get_option( THEME_SHORT_NAME.'_search_bg_first_state', 'Content');			
	}else{
		$gdl_page_slider_nav = (get_option( THEME_SHORT_NAME.'_page_caption_nav', 'Yes') != 'No')? true: false;
		$gdl_page_slider_thumbnail = (get_option( THEME_SHORT_NAME.'_page_bg_thumbnail', 'Yes') != 'No')? true: false;
		$gdl_page_content_area = get_option( THEME_SHORT_NAME.'_page_content_area', 'On');
		$gdl_page_first_stage = get_option( THEME_SHORT_NAME.'_page_bg_first_state', 'Content');		
	}
?>

<div class='gdl-slider-overlay-3'></div>
<div class="container center">	
	<div class="content-wrapper">
		<div class="page-wrapper">		
			<div class="clear"></div>
			<!-- Area of the left navigation -->
			<div class="header-wrapper-2 sixteen" id="header-wrapper-2" >
				
			<!-- Navigation -->
			<?php if( $gdl_is_responsive ){ dropdown_menu( array('dropdown_title' => '-- Main Menu --', 'indent_string' => '- ', 'indent_after' => '','container' => 'div', 'container_class' => 'responsive-menu-wrapper', 'theme_location'=>'main_menu') ); } ?>
				<div class="navigation-wrapper">
			<!-- Get Navigation -->
				<?php wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'container_id' => 'main-superfish-wrapper-full', 'menu_class'=> 'sf-menu-norm',  'theme_location' => 'main_menu',  'walker' => new description_walker() ) ); ?>
				<div style="float: left; height:30px;width:140px;"><a href="http://www.fantasticfrank.se/" alt="Fantastic Frank Hem"><img src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" style="border: none; width: 100%; height: 30px; postion: relative;" /></a></div>
				</div>									
			 </div> <!-- Header Wrapper -->		
			<div class="clear"></div>


			<?php 
				$hide_content = '';
				if( $gdl_page_content_area == 'Off' || $gdl_page_first_stage == 'Thumbnail' ){ $hide_content = " style='margin-left: -100%; display:none;' "; } 
			?>			
			<div class='gdl-page-item' id='gdl-page-item'>
				<div class='gdl-inner-page-item gdl-inner-page-item-2' id='gdl-inner-page-item' <?php echo $hide_content ?> style="background-color: #bbb !important;">
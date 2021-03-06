<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8" />
	<title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
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
</head>
<body <?php echo body_class(); ?>>

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

<div class='gdl-slider-overlay'></div>
<div class="container">	
	<div class="content-wrapper sidebar-included left-sidebar">
		<div class="page-wrapper">		
			<div class="clear"></div>
			<div class='gdl-left-sidebar four columns wrapper mb0'>
				
				<!-- Area of the left navigation -->
				<div class="header-wrapper four columns mb0" id="header-wrapper" >
					<div class='left-sidebar-wrapper gdl-divider'>
					
						<!-- Get Logo -->
						<!--<div class="logo-wrapper">
							<?php
								echo '<a href="' . home_url( '/' ) . '">';
								$logo_id = get_option(THEME_SHORT_NAME.'_logo');
								$logo_attachment = wp_get_attachment_image_src($logo_id, 'full');
								$alt_text = get_post_meta($logo_id , '_wp_attachment_image_alt', true);
								if( !empty($logo_attachment) ){
									$logo_attachment = $logo_attachment[0];
								}else{
									$logo_attachment = GOODLAYERS_PATH . '/images/default-logo.png';
									$alt_text = 'default logo';
								}
								echo '<img src="' . $logo_attachment . '" alt="' . $alt_text . '"/>';
								echo '</a>';
							?>
						</div>-->
						<div class="logo-wrapper-transparent">
							<?php
								echo '<a href="' . home_url( '/' ) . '">';
								echo '<img src="' . home_url( '/' ) . 'wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $alt_text . '" width="200" height="66"/>';
								echo '</a>';
							?>
						</div>
						
						<!-- Navigation -->
						<?php if( $gdl_is_responsive ){ dropdown_menu( array('dropdown_title' => '-- Main Menu --', 'indent_string' => '- ', 'indent_after' => '','container' => 'div', 'container_class' => 'responsive-menu-wrapper', 'theme_location'=>'main_menu') ); } ?>
						<div class="navigation-wrapper">
							<!-- Get Navigation -->
							<?php wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'container_id' => 'main-superfish-wrapper', 'menu_class'=> 'sf-menu',  'theme_location' => 'main_menu',  'walker' => new description_walker() ) ); ?>
						</div>			
						
						<!-- Sidebar -->
						<?php
							if( is_page() || is_front_page() ){
								$gdl_sidebar = get_post_meta( $post->ID, 'page-option-choose-sidebar', true); 
							}else if( is_search() || is_archive() ){
								$gdl_sidebar = 'Search/Archive Sidebar';
							}else if( is_single() ){
								$gdl_sidebar = get_post_meta( $post->ID, 'post-option-choose-sidebar', true); 
								if( empty($gdl_sidebar) ){
									$gdl_sidebar = get_option( THEME_SHORT_NAME . '_default_post_right_sidebar');
								}
								
							} 
							if( !empty($gdl_sidebar) || $gdl_sidebar != 'None' ){
								dynamic_sidebar($gdl_sidebar);
							}
						?>
						
						<!-- Get Social Icons -->
						<div class="social-wrapper">
							<div class="social-inner-wrapper">
								<?php /*
									global $gdl_sidebar_icon_type;
									$nav_icon_type = $gdl_sidebar_icon_type;
									
									$gdl_social_icon = array(
										'delicious'=> array('name'=>THEME_SHORT_NAME.'_delicious', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/delicious.png'),
										'deviantart'=> array('name'=>THEME_SHORT_NAME.'_deviantart', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/deviantart.png'),
										'digg'=> array('name'=>THEME_SHORT_NAME.'_digg', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/digg.png'),
										'facebook' => array('name'=>THEME_SHORT_NAME.'_facebook', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/facebook.png'),
										'flickr' => array('name'=>THEME_SHORT_NAME.'_flickr', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/flickr.png'),
										'lastfm'=> array('name'=>THEME_SHORT_NAME.'_lastfm', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/lastfm.png'),
										'linkedin' => array('name'=>THEME_SHORT_NAME.'_linkedin', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/linkedin.png'),
										'picasa'=> array('name'=>THEME_SHORT_NAME.'_picasa', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/picasa.png'),
										'rss'=> array('name'=>THEME_SHORT_NAME.'_rss', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/rss.png'),
										'stumble-upon'=> array('name'=>THEME_SHORT_NAME.'_stumble_upon', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/stumble-upon.png'),
										'tumblr'=> array('name'=>THEME_SHORT_NAME.'_tumblr', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/tumblr.png'),
										'twitter' => array('name'=>THEME_SHORT_NAME.'_twitter', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/twitter.png'),
										'vimeo' => array('name'=>THEME_SHORT_NAME.'_vimeo', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/vimeo.png'),
										'youtube' => array('name'=>THEME_SHORT_NAME.'_youtube', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/youtube.png'),
										'google_plus' => array('name'=>THEME_SHORT_NAME.'_google_plus', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/google-plus.png'),
										'email' => array('name'=>THEME_SHORT_NAME.'_email', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $nav_icon_type . '/social/email.png')
										);
									
									foreach( $gdl_social_icon as $social_name => $social_icon ){
									
										$social_link = get_option($social_icon['name']);
										if( !empty($social_link) ){
										
											echo '<div class="social-icon"><a target="_blank" href="' . $social_link . '">' ;
											echo '<img src="' . $social_icon['url'] . '" alt="' . $social_name . '"/>';
											echo '</a></div>';
										
										}
									}
							*/	?>
								<a target="_blank" href="http://www.facebook.com/fantasticfrankfastighetsmakleri">Facebook</a>&nbsp;&nbsp;&nbsp;
								<a target="_blank" href="http://fantasticfrank.wordpress.com">Blogg</a>&nbsp;&nbsp;&nbsp;
								<a target="_blank" href="http://fantasticfrankblogg.tumblr.com/">Mer!</a>&nbsp;&nbsp;&nbsp;
							</div>
							<div class="clear"></div>	
						</div>
						
						<!-- Get Copyright Text -->
						<div class="copyright-wrapper">
							<div class="copyright-area">
								<?php echo do_shortcode( __(get_option(THEME_SHORT_NAME.'_copyright_area'), 'gdl_front_end') ); ?>
								<br>Norr Mälarstrand 10
								<br>info@fantasticfrank.se
								<br>08-120 45 100
							</div> 
							<div class="clear"></div>
						</div>					
						<div class="clear"></div>		
						
					</div> <!-- Left Sidebar Wrapper -->
				</div> <!-- Header Wrapper -->
			</div> <!-- Gdl Left Sidebar -->

			<?php 
				$hide_content = '';
				if( $gdl_page_content_area == 'Off' || $gdl_page_first_stage == 'Thumbnail' ){ $hide_content = " style='margin-left: -100%; display:none;' "; } 
			?>			
			<div class='gdl-page-item' id='gdl-page-item'>
				<div class='gdl-inner-page-item' id='gdl-inner-page-item' <?php echo $hide_content ?>>
<?php

	/*	
	*	Goodlayers Option File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Goodlayers
	* 	@link		http://goodlayers.com
	* 	@copyright	Copyright (c) Goodlayers
	*	---------------------------------------------------------------------
	*	This file contains the goodlayers panel elements and create the 
	*	goodlayers panel to the back-end of the framework
	*	---------------------------------------------------------------------
	*/
	
	// goodlayers panel navigation elements
	$goodlayers_menu = array(			
		__('General', 'gdl_back_office') => array(
			__('Page Style', 'gdl_back_office')=>'gdl_panel_page_style',
			__('Background Style', 'gdl_back_office')=>'gdl_panel_background_style',
			__('Sidebar', 'gdl_back_office')=>'gdl_panel_sidebar',
			__('Google Analytics', 'gdl_back_office')=>'gdl_panel_google_analytics',
			__('Favicon', 'gdl_back_office')=>'gdl_panel_favicon',
			__('Disable Right Click', 'gdl_back_office')=>'gdl_panel_disable_right_click'),
			
		__('Font Style', 'gdl_back_office') => array(
			__('Font Size', 'gdl_back_office')=>'gdl_panel_font_size',
			__('Font Family', 'gdl_back_office')=>'gdl_panel_font',
			__('Upload Font', 'gdl_back_office')=>'gdl_panel_upload_font'),
			
		__('Overall Elements', 'gdl_back_office') => array(
			__('Logo', 'gdl_back_office')=>'gdl_panel_logo',
			__('Social Network', 'gdl_back_office')=>'gdl_panel_social_network',
			__('Social Shares', 'gdl_back_office')=>'gdl_panel_social_shares',
			__('Copyright Area', 'gdl_back_office')=>'gdl_panel_copyright_area',
			__('Slider Pattern Overlay', 'gdl_back_office')=>'gdl_panel_slider_pattern_overlay'),
			//__('Dummy Data', 'gdl_back_office')=>'gdl_panel_dummy_data' ),	
			
		__('Elements Color', 'gdl_back_office') => array(
			__('Menu Navigation', 'gdl_back_office')=>'gdl_panel_navigation',
			__('Sidebar ( Navigation )', 'gdl_back_office')=>'gdl_panel_sidebar_color',
			__('Body', 'gdl_back_office')=>'gdl_panel_body',
			__('Blog / Portfolio', 'gdl_back_office')=>'gdl_panel_blog_port',
			__('Price Item', 'gdl_back_office')=>'gdl_panel_price_item',
			__('Additional Elements', 'gdl_back_office')=>'gdl_panel_additional_elements',
			__('Additional Elements 2', 'gdl_back_office')=>'gdl_panel_additional_elements2',
			__('Load Default Color', 'gdl_back_office')=>'gdl_panel_load_default_color'),
			
		__('Translator','gdl_back_office')=> array(
			__('Enable Admin Translator', 'gdl_back_office')=>'gdl_panel_enable_admin_translator',
			__('Blog/Portfolio', 'gdl_back_office')=>'gdl_panel_blog_port_translator',
			__('Contact Form', 'gdl_back_office')=>'gdl_panel_contact_form_translator',
			__('Contact Widget', 'gdl_back_office')=>'gdl_panel_contact_widget_translator',
			__('Additional Elements', 'gdl_back_office')=>'gdl_panel_additional_elements_translator',
			),
		
		__('Slider Setting', 'gdl_back_office') => array(
			__('Nivo Slider', 'gdl_back_office')=>'gdl_panel_nivo_slider',
			__('Flex Slider', 'gdl_back_office')=>'gdl_panel_flex_slider',
			__('Anything Slider', 'gdl_back_office')=>'gdl_panel_anything_slider',
			__('Background Slider', 'gdl_back_office')=>'gdl_panel_background_slider')
	);
	
	// goodlayers panel elements ( the head of array links to the menu of navigation elements )
	$goodlayers_element = array(
		//General

		'gdl_panel_page_style' => array(
			__('ENABLE RESPONSIVE', 'gdl_back_office')=>array(
				'type'=>'radioenabled',
				'name'=>THEME_SHORT_NAME.'_enable_responsive',
				'default'=>'disable',
				'description'=>' *** Flex slider is only slider that supports the responsive mode.'
			),
			__('DEFAULT DATE FORMAT', 'gdl_back_office')=>array(
				'type'=>'inputtext',
				'name'=>THEME_SHORT_NAME.'_default_date_format',
				'default'=>'M d Y'),			
			__('DEFAULT WIDGET DATE FORMAT', 'gdl_back_office')=>array(
				'type'=>'inputtext',
				'name'=>THEME_SHORT_NAME.'_default_widget_date_format',
				'default'=>'M d, Y'),						
			__('USE PORTFOLIO PAGE AS', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_use_portfolio_as',
				'options'=>array('1'=>'portfolio style', '2'=>'blog style'),
				'description'=>'You can choose the portfolio page style to be the portfolio style or the same as blog style.'),
			__('CHANGE PORTFOLIO SLUG', 'gdl_back_office')=>array(
				'type'=>'inputtext',
				'name'=>THEME_SHORT_NAME.'_gdl_portfolio_slug',
				'default'=>'portfolio',
				'description'=>'Change/Rewrite the permalink when you use the permalink type as %postname%.'
			),	
			__('SEARCH/ARCHIVE BLOG EXCERPT NUM', 'gdl_back_office')=>array(
				'type'=>'inputtext',
				'name'=>THEME_SHORT_NAME.'_search_archive_num_excerpt',
				'default'=>'430',
				'description'=>'Input the number of character you want to cut from the content to be the excerpt of search and archive page.'),
			__('SEARCH/ARCHIVE BLOG ITEM SIZE', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_archive_item_size',
				'options'=>array('1/1 Full Thumbnail', '1/1 Medium Thumbnail')
			),	
			__('SEARCH/ARCHIVE FULL BLOG CONTENT', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_archive_full_blog_content',
				'options'=>array('No', 'Yes'),
				'description'=>'Use this to show full content of the blog in search/archive page. Only use with 1/1 Full Thumbnail'
			),	
			__('SEARCH/ARCHIVE PORTFOLIO SIZE', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_archive_portfolio_size',
				'options'=>array('1/2', '1/3', '1/4')
			),	
			__('SEARCH/ARCHIVE PORTFOLIO SHOW TITLE', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_archive_portfolio_show_title',
				'options'=>array('Yes', 'No')
			),
			__('SEARCH/ARCHIVE PORTFOLIO SHOW TAGS', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_archive_portfolio_show_tag',
				'options'=>array('Yes', 'No')
			),			
			__('DEFAULT POST SIDEBAR', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_default_post_right_sidebar',
				'options'=> array_merge( array('None'), get_sidebar_name()),
				'body'=>'gdl-default-post-right-sidebar'),							
		),
		
		'gdl_panel_background_style' => array(	
			__('SINGLE BACKGROUND GALLERY', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_single_bg_gallery',
				'options'=>get_title_list('gallery')
			),	
			__('SINGLE CONTENT AREA', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_single_content_area',
				'options'=>array('On', 'On-Off' ,'Off')
			),	
			__('SINGLE BG CAPTION NAV', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_single_caption_nav',
				'options'=>array('Yes', 'No')
			),	
			__('SINGLE BG THUMBNAIL', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_single_bg_thumbnail',
				'options'=>array('Yes', 'No')
			),				
			__('SINGLE PAGE FIRST STATE', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_single_bg_first_state',
				'options'=>array('Content', 'Thumbnail')
			),			

			__('SEARCH/ARCHIVE BACKGROUND GALLERY', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_bg_gallery',
				'options'=>get_title_list('gallery')
			),	
			__('SEARCH/ARCHIVE CONTENT AREA', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_content_area',
				'options'=>array('On', 'On-Off' ,'Off')
			),	
			__('SEARCH/ARCHIVE BG CAPTION NAV', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_caption_nav',
				'options'=>array('Yes', 'No')
			),	
			__('SEARCH/ARCHIVE BG THUMBNAIL', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_bg_thumbnail',
				'options'=>array('Yes', 'No')
			),				
			__('SEARCH/ARCHIVE PAGE FIRST STATE', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_search_bg_first_state',
				'options'=>array('Content', 'Thumbnail')
			),

			__('PAGE BACKGROUND GALLERY', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_page_bg_gallery',
				'options'=>get_title_list('gallery'),
				'description'=>'This is the page background when you haven\'t set that page yet ( since you activate the theme ).'
			),	
			__('PAGE CONTENT AREA', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_page_content_area',
				'options'=>array('On', 'On-Off' ,'Off')
			),	
			__('PAGE BG CAPTION NAV', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_page_caption_nav',
				'options'=>array('Yes', 'No')
			),	
			__('PAGE BG THUMBNAIL', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_page_bg_thumbnail',
				'options'=>array('Yes', 'No')
			),				
			__('PAGE PAGE FIRST STATE', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'name'=>THEME_SHORT_NAME.'_page_bg_first_state',
				'options'=>array('Content', 'Thumbnail')
			),			
		),
		
		'gdl_panel_sidebar' => array(
			__('CREATE SIDEBAR', 'gdl_back_office')=>array('type'=>'sidebar','name'=>THEME_SHORT_NAME.'_create_sidebar')
		),
		
		'gdl_panel_google_analytics' => array(
			__('ENABLE GOOGLE ANALYTICS', 'gdl_back_office')=>array('type'=>'radioenabled', 'name'=> THEME_SHORT_NAME.'_enable_analytics', 'default'=>'disable'),
			__('GOOGLE ANALYTICS CODE', 'gdl_back_office')=>array('type'=>'textarea', 'name'=> THEME_SHORT_NAME.'_analytics_code',
				'description'=>'Place the code you get from google here. This should be something like <br>' . 
				htmlspecialchars('<script type="text/javascript">') . '<br> ... <br>' .
				htmlspecialchars('</script>'))
		),
		
		'gdl_panel_favicon' => array(
			__('ENABLE FAVICON', 'gdl_back_office')=>array('type'=>'radioenabled','name'=> THEME_SHORT_NAME.'_enable_favicon', 'default'=>'disable'),
			__('UPLOAD FAVICON ICON', 'gdl_back_office')=>array('type'=>'upload','name'=> THEME_SHORT_NAME.'_favicon_image'),
		),
		
		'gdl_panel_disable_right_click' => array(
			__('DISABLE RIGHT CLICK', 'gdl_back_office')=>array('type'=>'radioenabled','name'=> THEME_SHORT_NAME.'_disable_right_click', 'default'=>'disable'),
			__('ALERT MSG', 'gdl_back_office')=>array('type'=>'textarea','name'=> THEME_SHORT_NAME.'_right_click_alert'),
		),
		
		//Theme Style
		'gdl_panel_font_size' => array(
			__('H1 SIZE', 'gdl_back_office')=>array('type'=>'sliderbar','name'=>THEME_SHORT_NAME.'_h1_size','default'=>'30'),
			__('H2 SIZE', 'gdl_back_office')=>array('type'=>'sliderbar','name'=>THEME_SHORT_NAME.'_h2_size','default'=>'25'),
			__('H3 SIZE', 'gdl_back_office')=>array('type'=>'sliderbar','name'=>THEME_SHORT_NAME.'_h3_size','default'=>'20'),
			__('H4 SIZE', 'gdl_back_office')=>array('type'=>'sliderbar','name'=>THEME_SHORT_NAME.'_h4_size','default'=>'18'),
			__('H5 SIZE', 'gdl_back_office')=>array('type'=>'sliderbar','name'=>THEME_SHORT_NAME.'_h5_size','default'=>'16'),
			__('H6 SIZE', 'gdl_back_office')=>array('type'=>'sliderbar','name'=>THEME_SHORT_NAME.'_h6_size','default'=>'15'),
			__('CONTENT SIZE', 'gdl_back_office')=>array('type'=>'sliderbar','name'=>THEME_SHORT_NAME.'_content_size','default'=>'12')
		),

		'gdl_panel_font' => array(
			__('HEADER FONT', 'gdl_back_office')=>array('type'=>'font-combobox','name'=>THEME_SHORT_NAME.'_header_font',
				'description'=>'Choose the header font of this theme. This font will be used in all title and header elements including the slider title.'),
			__('CONTENT FONT', 'gdl_back_office')=>array('type'=>'font-combobox','name'=>THEME_SHORT_NAME.'_content_font',
				'description'=>'Choose the font to use with content. We are highly NOT recommended to use CUFON as a content font.'),
			__('STUNNING TEXT FONT', 'gdl_back_office')=>array('type'=>'font-combobox','name'=>THEME_SHORT_NAME.'_stunning_text_font',
				'description'=>'Choose the font to use with stunning text title.'),
			__('SLIDER TITLE FONT', 'gdl_back_office')=>array('type'=>'font-combobox','name'=>THEME_SHORT_NAME.'_slider_title_font')				
		),
				
			
		'gdl_panel_upload_font' => array(
			__('UPLOAD FONT', 'gdl_back_office')=>array(
				'type'=>'uploadfont',
				'name'=>THEME_SHORT_NAME.'_upload_font',
				'file'=>THEME_SHORT_NAME.'_upload_font_file')
		),
		
		//Overall Elements
		'gdl_panel_logo' => array( 
			__('LOGO', 'gdl_back_office')=>array('type'=>'upload','name'=>THEME_SHORT_NAME.'_logo'), 
			__('LOGO TOP MARGIN', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_logo_top_margin','default'=>'40',
				'description'=>'Input number to set the top space of the logo. The minimum value is 1.'), 
			__('LOGO LEFT MARGIN', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_logo_left_margin','default'=>'24'),
			__('LOGO BOTTOM MARGIN', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_logo_bottom_margin','default'=>'30',
				'description'=>'Input number to set the bottom space of the logo. The minimum value is 1.')
		),
		
		'gdl_panel_social_network' => array( 
			__('DELICIOUS', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_delicious',
				'description'=>'Place the link you want and delicious icon will appear. To remove it, just leave it blank.'),	
			__('DEVIANTART', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_deviantart',
				'description'=>'Place the link you want and deviantart icon will appear. To remove it, just leave it blank.'),	
			__('DIGG', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_digg',
				'description'=>'Place the link you want and digg icon will appear. To remove it, just leave it blank.'),					
			__('FACEBOOK', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_facebook',
				'description'=>'Place the link you want and facebook icon will appear. To remove it, just leave it blank.'),
			__('FLICKR', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_flickr',
				'description'=>'Place the link you want and flickr icon will appear. To remove it, just leave it blank.'),
			__('LASTFM', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_lastfm',
				'description'=>'Place the link you want and lastfm icon will appear. To remove it, just leave it blank.'),
			__('LINKEDIN', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_linkedin',
				'description'=>'Place the link you want and linkedin icon will appear. To remove it, just leave it blank.'),			
			__('PICASA', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_picasa',
				'description'=>'Place the link you want and picasa icon will appear. To remove it, just leave it blank.'),
			__('RSS', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_rss',
				'description'=>'Place the link you want and feed icon will appear. To remove it, just leave it blank.'),
			__('STUMBLE UPON', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_stumble_upon',
				'description'=>'Place the link you want and stumble upon icon will appear. To remove it, just leave it blank.'),
			__('TUMBLR', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_tumblr',
				'description'=>'Place the link you want and tumblr icon will appear. To remove it, just leave it blank.'),	
			__('TWITTER', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_twitter',
				'description'=>'Place the link you want and twitter icon will appear. To remove it, just leave it blank.'),
			__('VIMEO', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_vimeo',
				'description'=>'Place the link you want and vimeo icon will appear. To remove it, just leave it blank.'),
			__('YOUTUBE', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_youtube',
				'description'=>'Place the link you want and youtube icon will appear. To remove it, just leave it blank.'),
			__('GOOGLE PLUS', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_google_plus',
				'description'=>'Place the link you want and google plus icon will appear. To remove it, just leave it blank.'),		
			__('EMAIL', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_email',
				'description'=>'Place the link you want and email icon will appear. To remove it, just leave it blank.'),				
		),		
		
		'gdl_panel_social_shares' => array(
			__('FACEBOOK', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_facebook_share',
				'description'=>'Toggle to enable/disable the facebook shares in blog and portfolio page.'),
			__('TWITTER', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_twitter_share',
				'description'=>'Toggle to enable/disable the twitter shares in blog and portfolio page.'),
			__('GOOGLE', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_google_share',
				'description'=>'Toggle to enable/disable the google shares in blog and portfolio page.'),
			__('STUMBLE UPON', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_stumble_upon_share',
				'description'=>'Toggle to enable/disable the stumble upon shares in blog and portfolio page.'),
			__('MY SPACE', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_my_space_share',
				'description'=>'Toggle to enable/disable the my spce shares in blog and portfolio page.'),
			__('DELICIOUS', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_delicious_share',
				'description'=>'Toggle to enable/disable the delicious shares in blog and portfolio page.'),
			__('DIGG', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_digg_share',
				'description'=>'Toggle to enable/disable the digg shares in blog and portfolio page.'),
			__('REDDIT', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_reddit_share',
				'description'=>'Toggle to enable/disable the reddit shares in blog and portfolio page.'),
			__('LINKEDIN', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_linkedin_share',
				'description'=>'Toggle to enable/disable the linkedin shares in blog and portfolio page.'),
			__('GOOGLE PLUS', 'gdl_back_office')=>array('type'=>'radioenabled','name'=>THEME_SHORT_NAME.'_google_plus_share',
				'description'=>'Toggle to enable/disable the linkedin shares in blog and portfolio page.'),				
				
		),
			
		'gdl_panel_copyright_area' => array( 
			__('COPYRIGHT AREA', 'gdl_back_office')=>array('type'=>'textarea','name'=>THEME_SHORT_NAME.'_copyright_area'), 
		),
		
		'gdl_panel_slider_pattern_overlay' => array(
			__('CHOOSE PATTERN','gdl_back_office')=>array(
				'type'=>'radioimage',
				'body_class'=>'gdl_background_pattern',
				'name'=>THEME_SHORT_NAME.'_background_pattern',
				'default'=>'3',
				'options'=>array(
					'1'=>array('value'=>'1','image'=>'/include/images/pattern/pattern1.png'),
					'2'=>array('value'=>'2','image'=>'/include/images/pattern/pattern2.png'),
					'3'=>array('value'=>'3','image'=>'/include/images/pattern/pattern3.png'),
					'4'=>array('value'=>'4','image'=>'/include/images/pattern/pattern4.png'),
					'5'=>array('value'=>'5','image'=>'/include/images/pattern/pattern5.png'),
					'6'=>array('value'=>'6','image'=>'/include/images/pattern/pattern6.png'),
					'7'=>array('value'=>'7','image'=>'/include/images/pattern/pattern7.png'),
					'8'=>array('value'=>'8','image'=>'/include/images/pattern/pattern8.png'),
					'9'=>array('value'=>'9','image'=>'/include/images/pattern/pattern9.png')
				)
			)
		),
		
		// 'gdl_panel_dummy_data' => array( 
		// 	__('LOAD DUMMY DATA', 'gdl_back_office')=>array('type'=>'dummy')
		// ),
			
		// Elements Color
		
		'gdl_panel_navigation' => array(
			__('MAIN NAVIGATION BORDER', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_main_navigation_border','default'=>'#ececec'),
			__('MAIN NAVIGATION TEXT', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_main_navigation_text','default'=>'#a1a1a1',
				'description'=>'This is the text color of the main navigation in the normal state.'),
			__('MAIN NAVIGATION DESCRIPTION', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_main_navigation_description','default'=>'#b0b0b0',
				'description'=>'This is the text color of the main navigation in the normal state.'),	
			__('MAIN NAVIGATION TEXT HOVER', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_main_navigation_text_hover','default'=>'#3d3d3d',
				'description'=>'This is the text color of the main navigation in "hover" state.'),
			__('MAIN NAVIGATION TEXT CURRENT', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_main_navigation_text_current','default'=>'#3d3d3d',
				'description'=>'This is the text color of the main navigation in "current page" state.'),				
			__('SUB NAVIGATION BACKGROUND', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sub_navigation_background','default'=>'#ffffff'),
			__('SUB NAVIGATION BORDER', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sub_navigation_border','default'=>'#ececec'),
			__('SUB NAVIGATION TEXT', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sub_navigation_text','default'=>'#999999'),
			__('SUB NAVIGATION TEXT HOVER', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sub_navigation_text_hover','default'=>'#3d3d3d'),
			__('SUB NAVIGATION TEXT CURRENT', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sub_navigation_text_current','default'=>'#3d3d3d'),
			
		),		
		
		'gdl_panel_sidebar_color' => array(
			__('NAVIGATION ICON STYLE','gdl_back_office')=>array( 'type'=>'combobox', 'name'=>THEME_SHORT_NAME.'_navigation_icon_type', 'options'=>array('1'=>'dark','2'=>'light')),		
			__('NAVIGATION LEFT BAR','gdl_back_office')=>array( 'type'=>'combobox', 'name'=>THEME_SHORT_NAME.'_navigation_left_bar', 'options'=>array('1'=>'light','2'=>'dark')),		
			__('NAVIGATION BACKGROUND COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_main_navigation_background','default'=>'#ffffff'),			
			__('COPYRIGHT TEXT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_copyright_text', 'default'=>'#a5a5a5'),
			__('SIDEBAR TITLE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_title_color','default'=>'#494949'),
			__('SIDEBAR TEXT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_text_color','default'=>'#aaaaaa'),
			__('SIDEBAR BORDER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_border_color','default'=>'#ececec'),
			__('SIDEBAR LINK COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_link_color','default'=>'#202020'),
			__('SIDEBAR LINK COLOR HOVER', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_link_color_hover','default'=>'#303030'),
			__('INPUT BOX TEXT', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_input_box_text','default'=>'#999999'),
			__('INPUT BOX BORDER', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_input_box_border','default'=>'#eeeeee'),
			__('INPUT BOX BACKGROUND', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_sidebar_input_box_background','default'=>'#eeeeee'),
		),
		
		'gdl_panel_body' => array(	
			__('ICON STYLE','gdl_back_office')=>array( 'type'=>'combobox', 'name'=>THEME_SHORT_NAME.'_icon_type', 'options'=>array('1'=>'light','2'=>'dark'),
				'description'=>'This option will change all of the icon in this theme to use dark/light version.'),
			__('CONTENT BACKGROUND STYLE','gdl_back_office')=>array( 'type'=>'combobox', 'name'=>THEME_SHORT_NAME.'_content_bg_type', 'options'=>array('1'=>'dark','2'=>'light')),
			__('TITLE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_title_color','default'=>'#ffffff',
				'description'=>'Change this title color wil effects all title in this theme except sidebar title, blog thumbnail title and portolio thumbnail title color.'),
			__('PAGE CAPTION COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_page_caption_color','default'=>'#b2b2b2'),
			__('CONTENT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_content_color','default'=>'#f0f0f0'),
			__('BODY BACKGROUND', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_body_background','default'=>'#000000',
				'description'=>'Body background color will be shown before the background slider is loaded.'),
			__('LINK COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_link_color','default'=>'#ffffff',
				'description'=>'This color effects all of the link color in this theme.'),
			__('LINK HOVER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_link_hover_color','default'=>'#bababa',
				'description'=>'This color effects all of the link color on "hover" state in this theme.'),
			__('TABLE BORDER (TABLE TAG)', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_table_border','default'=>'#e5e5e5'),
			__('TABLE TITLE TEXT COLOR (TH TAG)', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_table_text_title','default'=>'#666666'),
			__('TABLE TITLE BACKGROUND (TH TAG)', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_table_title_background','default'=>'#f7f7f7'),

			),
			
		'gdl_panel_blog_port' => array(
			__('PORT TITLE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_port_title_color','default'=>'#ffffff',
				'description'=>'This is the portfolio thumbnail title color.'),
			__('PORT TITLE HOVER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_port_title_hover_color','default'=>'#ffffff',
				'description'=>'This is the portfolio thumbnail title color in "hover" state.'),
			__('FILTER PORT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_port_filter_color','default'=>'#d0d0d0'),
			__('FILTER PORT COLOR HOVER', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_port_filter_color_hover','default'=>'#ffffff'),
			__('FILTER PORT COLOR CURRENT', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_port_filter_color_current','default'=>'#ffffff'),
			__('PORT TAGS COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_port_tags_color','default'=>'#d0d0d0'),
			__('BLOG TITLE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_title_color','default'=>'#ffffff',
				'description'=>'This is the blog thumbnail title color.'),
			__('BLOG TITLE HOVER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_title_hover_color','default'=>'#ffffff',
				'description'=>'This is the blog thumbnail title color in "hover" state.'),
			__('BLOG INFO COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_info_color','default'=>'#a1a1a1',
				'description'=>"This is the blog informateion color. It's include the color of blog date, blog comments number and blog author."),
			__('BLOG(/PORT) THUMBNAIL INFO BACKGROUND', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_thumbnail_info_bg','default'=>'#ffffff',
				'description'=>"This is the background color of the blog info that resides in the image thumbnail."),
			__('BLOG(/PORT) THUMBNAIL INFO DATE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_thumbnail_info_date','default'=>'#0c0c0c'),				
			__('BLOG(/PORT) THUMBNAIL INFO HEAD', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_thumbnail_info_head','default'=>'#212121'),				
			__('BLOG(/PORT) THUMBNAIL INFO COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_thumbnail_info','default'=>'#a2a2a2'),				
			__('BLOG(/PORT) THUMBNAIL INFO ICON', 'gdl_back_office')=>array('type'=>'combobox','name'=>THEME_SHORT_NAME.'_post_thumbnail_info_icon','options'=>array('dark', 'light')),				
			__('BLOG ABOUT AUTHOR BACKGROUND', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_post_about_author_color','default'=>'#333333',
				'description'=>'The author item is located in the blog page, you can enable/disable it using the post/portfolio options.'),
			__('PAGINATION NORMAL STATE', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_pagination_normal_state','default'=>'#303030',
				'description'=>'A paginaltion background color in non-hover and not-current page state.'),
		),			

		'gdl_panel_price_item' => array(
			__('PRICE TEXT COLOR', 'gdl_back_office') => array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_price_item_price_color', 'default'=>'#ffffff',
				'description'=>'This color is the color of price at the top of price item with normal price.'),
			__('BEST PRICE TEXT COLOR', 'gdl_back_office') => array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_price_item_best_price_color', 'default'=>'#ffffff',
				'description'=>'This color is the color of price at the top of price item with best price.' . " It's also effect the top border of the best price item."),
			__('PRICE TITLE COLOR', 'gdl_back_office') => array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_price_item_price_title_color', 'default'=>'#ffffff',
				'description'=>'Price title is located below the price text. You can change it color as you want.'),
			__('BEST PRICE TITLE COLOR', 'gdl_back_office') => array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_price_item_best_price_title_color', 'default'=>'#ffffff',
				'description'=>'This color has effect to the best price title color( The price title is located below the price text. ).'),
			__('PRICE TITLE BACKGROUND', 'gdl_back_office') => array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_price_item_price_title_background', 'default'=>'#333333'),
			__('BEST PRICE TITLE BACKGROUND', 'gdl_back_office') => array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_price_item_best_price_title_background', 'default'=>'#5f5f5f'),
			__('PRICE ITEM BORDER', 'gdl_back_office') => array('type'=>'colorpicker', 'name'=>THEME_SHORT_NAME.'_price_item_border', 'default'=>'#333333',
				'description'=>'This color is the price item border color. This color will have no effects with best price item top border.'),
		),
		
		'gdl_panel_additional_elements' => array(
			__('SLIDER TITLE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_slider_title_color','default'=>'#ffffff'),
			__('SLIDER CAPTION COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_slider_caption_color','default'=>'#ffffff'),		
			__('DIVIDER LINE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_divider_line','default'=>'#303030',
				'description'=>'This is the color of all divider inside the container.'),
			__('DIVIDER ITEM BACK TO TOP TEXT', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_back_to_top_text_color','default'=>'#7c7c7c',
				'description'=>'This is the back to top text color of the divider item ( create from page items or shortcode ).'),		
			__('TAB BACKGROUND', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_tab_background_color','default'=>'#333333',
				'description'=>'This is the tab header background in "non-active" state.'),
			__('TAB TEXT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_tab_text_color','default'=>'#b8b8b8'),
			__('TAB ACTIVE BACKGROUND', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_tab_active_background_color','default'=>'#525252',
				'description'=>'This is the tab header background in "active" state.'),		
			__('TAB ACTIVE TEXT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_tab_active_text_color','default'=>'#ffffff'),
			__('TAB BORDER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_tab_border_color','default'=>'#333333'),
			__('TESTIMONIAL TEXT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_testimonial_text','default'=>'#cccccc'),
			__('TESTIMONIAL TEXT AUTHOR COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_testimonial_author','default'=>'#ffffff'),
			__('TESTIMONIAL TEXT POSITION COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_testimonial_position','default'=>'#b8b8b8b'),					
		),
		
		'gdl_panel_additional_elements2' => array(
			__('STUNNING TEXT TITLE COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_stunning_text_title_color','default'=>'#ffffff'),
			__('STUNNING TEXT CAPTION COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_stunning_text_caption_color','default'=>'#dbdbdb'),
			__('STUNNING TEXT BACKGROUND COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_stunning_text_background_color','default'=>'#303030'),		
			__('CONTACT FORM/COMMENT BACKGROUND COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_contact_form_background_color','default'=>'#2b2b2b',
				'description'=>'This is a background color of textbox and textarea in contact form and comments area.'),
			__('CONTACT FORM/COMMENT TEXT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_contact_form_text_color','default'=>'#888888',
				'description'=>'This is a text color of textbox and textarea in contact form and comments area.'),
			__('CONTACT FORM/COMMENT BORDER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_contact_form_border_color','default'=>'#2b2b2b'),
			__('BUTTON BACKGROUND COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_button_background_color','default'=>'#f1f1f1',
				'description'=>'This color will changes all of the button background color in this theme except the button from shortcode and stunning text.'),			
			__('BUTTON BORDER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_button_border_color','default'=>'#2b2b2b',
				'description'=>'This color will changes all of the button border color in this theme except the button from shortcode and stunning text.'),			
			__('BUTTON TEXT COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_button_text_color','default'=>'#d9d9d9',
				'description'=>'This color will changes all of the button text color in this theme except the button from shortcode and stunning text.'),			
			__('BUTTON TEXT HOVER COLOR', 'gdl_back_office')=>array('type'=>'colorpicker','name'=>THEME_SHORT_NAME.'_button_text_hover_color','default'=>'#7a7a7a',
				'description'=>'This color will changes all of the button text color of "hover" state in this theme except the button from shortcode and stunning text.'),	
		),
		
		'gdl_panel_load_default_color' => array(
			__('LOAD DEFAULT ELEMENTS COLOR','gdl_back_office')=>array('type'=>'button','text'=>'Load Default','id'=>'gdl_load_default_color_button',
				'description'=>'Click this button to load the default elements color of this theme. Then click save changes to save the default value. <br><br> ' .
				'WARNING : All of settings cannot be undo after you click save changes button.')
		),
		
		// Translator
		'gdl_panel_enable_admin_translator' => array(
			__('ENABLE ADMIN TRANSLATOR', 'gdl_back_office')=>array('type'=>'radioenabled', 'name'=>THEME_SHORT_NAME.'_enable_admin_translator')
		),
		
		'gdl_panel_blog_port_translator' => array(
			__('BLOG DEFAULT HEADER (BLOG)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_blog_header','default'=>'Blog'),
			__('BLOG DEFAULT CAPTION (BLOG)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_blog_caption','default'=>'Default blog caption'),
			__('LEAVE A REPLY (BLOG)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_leave_reply','default'=>'Leave a Reply'),
			__('ABOUT THE AUTHOR (BLOG)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_about_author','default'=>'About the Author'),
			__('CONTINUE READING (BLOG)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_continue_reading','default'=>'Continue Reading →'),
			__('SOCIAL SHARE (BLOG/PORTFOLIO)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_social_shares','default'=>'Social Share'),
			__('PORFOLIO DEFAULT HEADER (BLOG)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_port_header','default'=>'Portfolio'),
			__('PORFOLIO DEFAULT CAPTION (BLOG)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_port_caption','default'=>'Default portfolio caption'),
			__('CLIENT (PORTFOLIO)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_client','default'=>'Client'),
			__('VISIT WEBSITE (PORTFOLIO)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_visit_website','default'=>'Visit Website'),
			
		),
		
		'gdl_panel_contact_form_translator' => array(
			__('NAME (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_name_contact_form','default'=>'Name'),
			__('NAME ERROR (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_name_error_contact_form','default'=>'Please enter your name'),
			__('EMAIL (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_email_contact_form','default'=>'Email'),
			__('EMAIL ERROR (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_email_error_contact_form','default'=>'Please enter a valid email address'),
			__('MESSAGE (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_message_contact_form','default'=>'Message'),
			__('MESSAGE ERROR (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_message_error_contact_form','default'=>'Please enter message'),
			__('SUBMIT BUTTON (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_submit_contact_form','default'=>'Submit'),
			__('SEND ERROR (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_contact_send_error','default'=>'Message cannot be sent to destination'),
			__('SEND COMPLETE (CONTACT FORM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_contact_send_complete','default'=>'The e-mail was sent successfully'),
		),
		
		'gdl_panel_contact_widget_translator' => array(
			__('NAME (CONTACT WIDGET)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_name_contact_widget','default'=>'Name'),
			__('EMAIL (CONTACT WIDGET)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_email_contact_widget','default'=>'Email'),
			__('MESSAGE (CONTACT WIDGET)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_message_contact_widget','default'=>'Message'),
			__('REQUIRE (CONTACT WIDGET)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_require_contact_widget','default'=>'* Require'),
			__('PLEASE WAIT (CONTACT WIDGET)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_please_wait_contact_widget','default'=>'Please Wait...'),
			__('SENDING COMPLETE (CONTACT WIDGET)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_sending_complete_contact_widget','default'=>'Thanks! Your email was sent'),
			__('SUBMIT BUTTON (CONTACT WIDGET)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_submit_contact_widget','default'=>'Submit'),
		),

		'gdl_panel_additional_elements_translator' => array(
			__('READ MORE (PRICE ITEM)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_translator_read_more_price','default'=>'Read More'),
			__('404 TITLE (404 PAGE)', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_404_title','default'=>'Sorry'),
			__('404 CONTENT (404 PAGE)', 'gdl_back_office')=>array('type'=>'textarea','name'=>THEME_SHORT_NAME.'_404_content','default'=>"The page you are finding seem doesn't exist."),
			__('SEARCH NOT FOUND (SEARCH PAGE)', 'gdl_back_office')=>array('type'=>'textarea','name'=>THEME_SHORT_NAME.'_search_not_found','default'=>"Sorry, but nothing matched your search criteria. Please try again with some different keywords."),
		),
		
		// Slider Setting
		'gdl_panel_nivo_slider' => array(
			__('SLIDER EFFECTS', 'gdl_back_office')=>array(
				'type'=>'combobox',
				'oldname'=>'effect',
				'name'=>THEME_SHORT_NAME.'_nivo_slider_effect',
				'options'=>array(
					'0'=>'sliceDown', '1'=>'sliceDownLeft', '2'=>'sliceUp',
					'3'=>'sliceUpLeft', '4'=>'sliceUpDown', '5'=>'sliceUpDownLeft',
					'6'=>'fold', '7'=>'fade', '8'=>'random',
					'9'=>'slideInRight', '10'=>'slideInLeft', '11'=>'boxRandom',
					'12'=>'boxRain', '13'=>'boxRainReverse', '14'=>'boxRainGrow',
					'15'=>'boxRainGrowReverse')),
			__('PAUSE ON HOVER', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'pauseOnHover','name'=>THEME_SHORT_NAME.'_nivo_slider_pause_on_hover',
				'description'=>'Pause the nivo slider when user hover at the slider.'),
			__('SHOW BULLETS', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'controlNav','default'=>'disable','name'=>THEME_SHORT_NAME.'_nivo_slider_show_bullets',
				'description'=>'Enable to show the nivo slider navigation bullets.'),
			__('SHOW LEFT/RIGHT NAVIGATION', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'directionNav','name'=>THEME_SHORT_NAME.'_nivo_slider_show_navigation',
				'description'=>'Enable left/right navigation of the nivo slider.'),
			__('ONLY SHOW NAVIGATION WHEN HOVER', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'directionNavHide','name'=>THEME_SHORT_NAME.'_nivo_slider_hover_navigation',
				'description'=>'If the left/right navigation is enabled, enable this option will hide the left/right navigation when the mouse cursor is outside the nivo slider frame.'),
			__('ANIMATION SPEED', 'gdl_back_office')=>array('type'=>'inputtext','oldname'=>'animSpeed','name'=>THEME_SHORT_NAME.'_nivo_slider_animation_speed','default'=>'500',
				'description'=>'This is the animation speed during the change of each slide.'),
			__('PAUSE TIME', 'gdl_back_office')=>array('type'=>'inputtext','oldname'=>'pauseTime','name'=>THEME_SHORT_NAME.'_nivo_slider_pause_time','default'=>'11000',
				'description'=>'This option is the pause time of each slider.'),
			__('CAPTION OPACITY', 'gdl_back_office')=>array('type'=>'inputtext','oldname'=>'captionOpacity','name'=>THEME_SHORT_NAME.'_nivo_slider_caption_opacity','default'=>'0.8'),
		),
		
		'gdl_panel_flex_slider' => array(
			__('SLIDER EFFECTS', 'gdl_back_office')=>array('type'=>'combobox','oldname'=>'animation'
				,'name'=>THEME_SHORT_NAME.'_flex_slider_effect', 'options'=>array('0'=>'fade', '1'=>'slide')),
			__('PAUSE ON HOVER', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'pauseOnHover','name'=>THEME_SHORT_NAME.'_flex_slider_pause_on_hover','default'=>'disable',
				'description'=>'Pause the flex slider when user hover at the slider.'),
			__('SHOW BULLETS', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'controlNav','default'=>'disable','name'=>THEME_SHORT_NAME.'_flex_slider_show_bullets',
				'description'=>'Enable to show the flex slider navigation bullets.'),
			__('SHOW NAVIGATION', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'directionNav','name'=>THEME_SHORT_NAME.'_flex_slider_show_navigation',
				'description'=>'Enable left/right navigation of the flex slider.'),
			__('ANIMATION SPEED', 'gdl_back_office')=>array('type'=>'inputtext','oldname'=>'animationDuration','name'=>THEME_SHORT_NAME.'_flex_slider_animation_speed','default'=>'600',
				'description'=>'This is the animation speed during the change of each slide.'),
			__('PAUSE TIME', 'gdl_back_office')=>array('type'=>'inputtext','oldname'=>'slideshowSpeed','name'=>THEME_SHORT_NAME.'_flex_slider_pause_time','default'=>'11000',
				'description'=>'This option is the pause time of each slider.'),
			__('PAUSE ON ACTION', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'pauseOnAction','name'=>THEME_SHORT_NAME.'_flex_slider_pause_on_action','default'=>'false'),
		),
		
		'gdl_panel_anything_slider' => array(
			__('PAUSE ON HOVER', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'pauseOnHover','name'=>THEME_SHORT_NAME.'_anything_slider_pause_on_hover',
				'description'=>'Pause the anything slider when user hover at the slider.'),
			__('SHOW BULLETS', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'buildNavigation','default'=>'disable','name'=>THEME_SHORT_NAME.'_anything_slider_show_bulltes',
				'description'=>'Enable to show the anything slider navigation bullets.'),
			__('ONLY SHOW BULLETS WHEN HOVER', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'toggleControls','name'=>THEME_SHORT_NAME.'_anything_slider_hover_bulltes',
				'description'=>'If the bullets navigation is enabled, enable this option will hide the bullets navigation when the mouse cursor is outside the nivo slider frame.'),
			__('SHOW NAVIGATION', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'buildArrows','name'=>THEME_SHORT_NAME.'_anything_slider_show_navigation',
				'description'=>'Enable left/right navigation of the anything slider.'),
			__('ONLY SHOW NAVIGATION WHEN HOVER', 'gdl_back_office')=>array('type'=>'radioenabled','oldname'=>'toggleArrows','name'=>THEME_SHORT_NAME.'_anything_slider_hover_navigation',
				'description'=>'If the left/right navigation is enabled, enable this option will hide the left/right navigation when the mouse cursor is outside the nivo slider frame.'),
			__('ANIMATION SPEED', 'gdl_back_office')=>array('type'=>'inputtext','oldname'=>'animationTime','name'=>THEME_SHORT_NAME.'_anything_slider_animation_speed','default'=>'600',
				'description'=>'This is the animation speed during the change of each slide.'),
			__('PAUSE TIME', 'gdl_back_office')=>array('type'=>'inputtext','oldname'=>'delay','name'=>THEME_SHORT_NAME.'_anything_slider_pause_time','default'=>'11000',
				'description'=>'This option is the pause time of each slider.'),
		),

		'gdl_panel_background_slider' => array(
			__('TRANSITION', 'gdl_back_office')=>array('type'=>'combobox','name'=>THEME_SHORT_NAME.'_supersized_transition',
				'options'=> array( 'Fade', 'Slide Top', 'Slide Right', 'Slide Bottom', 'Slide Left', 'Carousel Right', 'Carousel Left'),
				'description'=>'This option is the pause time of each slider.'),
			__('ANIMATION SPEED', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_supersized_animation_speed','default'=>'700',
				'description'=>'This is the animation speed during the change of each slide.'),
			__('PAUSE TIME', 'gdl_back_office')=>array('type'=>'inputtext','name'=>THEME_SHORT_NAME.'_supersized_pause_time','default'=>'5000',
				'description'=>'This option is the pause time of each slider.'),
		)
		
	);
	
	// add action to embeded the panel in to dashboard
	add_action('admin_menu','add_goodlayers_panel');
	function add_goodlayers_panel(){
	
		$page = add_menu_page('GoodLayers Option', THEME_FULL_NAME, 'administrator', plugin_basename(__FILE__), 'create_goodlayers_panel' /*,  GOODLAYERS_PATH.'/include/images/portfolio-icon.png' */);
		
		add_action('admin_print_scripts-' . $page,'register_goodlayers_panel_scripts');
		add_action('admin_print_styles-' . $page,'register_goodlayers_panel_styles');
		
	}
	
	// add ajax action to hook the functions when save button is pressed 
	add_action('wp_ajax_save_goodlayers_panel','save_goodlayers_panel');
	function save_goodlayers_panel(){
	
		check_ajax_referer(plugin_basename(__FILE__),'security');
		
		global $goodlayers_element;
		
		$return_data = array('success'=>'-1', 'alert'=>'Save option failed, please try contacting your host provider to increase the post_max_size and suhosin.post.max_vars varialble on the server.');
		
		foreach($goodlayers_element as $elements){
		
			foreach($elements as $element){
			
				// when save sidebar
				if($element['type'] == 'sidebar'){
				
					$sidebar_xml = '<sidebar>';
					if( !empty( $_POST[$element['name']] ) ){
						$sidebar = $_POST[$element['name']];     
					}else{
						$sidebar = array();
					}
					
					foreach($sidebar as $sidebar_name){
					
						$sidebar_xml = $sidebar_xml . create_xml_tag('name',$sidebar_name);
						
					}
					
					$sidebar_xml = $sidebar_xml . '</sidebar>';
					
					if(!save_option($element['name'], get_option($element['name']), $sidebar_xml)){
					
						die( json_encode($return_data) );
						
					}
					
				// when save uploaded font
				}else if($element['type'] == 'uploadfont'){
				
					$uploadfont_xml = '<uploadfont>';
					if( !empty($_POST[$element['name']]) && !empty($_POST[$element['file']]) ){
						$uploadfont = $_POST[$element['name']];
						$uploadfont_file = $_POST[$element['file']];
						$num = sizeof($uploadfont);
						
						for($i=0; $i<$num; $i++){
						
							$uploadfont_xml = $uploadfont_xml . '<font>';
							$uploadfont_xml = $uploadfont_xml . create_xml_tag('name', $uploadfont[$i]);
							$uploadfont_xml = $uploadfont_xml . create_xml_tag('file', $uploadfont_file[$i]);
							$uploadfont_xml = $uploadfont_xml . '</font>';
							
						}
					}
					
					$uploadfont_xml = $uploadfont_xml . '</uploadfont>';
					
					if(!save_option($element['name'], get_option($element['name']), $uploadfont_xml)){
					
						die( json_encode($return_data) );
						
					}
					
				// do nothing with dummy button
				}else if($element['type'] == 'dummy'){
				
				}else if( !empty($element['name']) ){
					if( !empty( $_POST[$element['name']] ) ){
						$new_option_value = str_replace( "\'" , "'", $_POST[$element['name']]);
						$new_option_value = str_replace( '\"' , '"', $new_option_value);
						$new_option_value = str_replace( '\\\\' , '\\' , $new_option_value);
					}else{
						$new_option_value = '';
					}
					
					if(!save_option($element['name'], get_option($element['name']), $new_option_value)){
					
						die( json_encode($return_data) );
						
					}
					
				}
				
			}
			
		}
		
		// call the function to generate the style-custom.css file.
		gdl_generate_style_custom();
		
		die( json_encode( array('success'=>'0') ) );
		
	}
	
	// update the option if new value is exists and not equal to old one 
	function save_option($name, $old_value, $new_value){
	
		if(empty($new_value) && !empty($old_value)){
		
			if(!delete_option($name)){
			
				return false;
				
			}
			
		}else if($old_value != $new_value){
		
			if(!update_option($name, $new_value)){
			
				return false;
				
			}
			
		}
		
		return true;
		
	}
	
	// start creating the goodlayers panel ( by calling function to create menu and elements )
	function create_goodlayers_panel(){
	
		global $goodlayers_menu;
		global $goodlayers_element;		
		
		?>
		
		<form name="goodlayer-panel-form" id="goodlayer-panel-form">
			<div class="goodlayers-panel-wrapper">
			<?php
				
				echo '<div class="panel-menu">';
				echo '<div class="panel-menu-header"><div class="panel-menu-header-strap"></div>';
				echo '<img src="' . GOODLAYERS_PATH . '/include/images/admin-panel-logo.png" alt="goodlayers"/>';
				echo '</div>';
				
					create_goodlayers_menu($goodlayers_menu);
					
				echo '</div>';
				echo '<div class="panel-elements" id="panel-elements">';
				echo '<div class="panel-element-head"><div class="panel-element-header-strap"></div>';
				
				echo '<div class="panel-header-left-text">';
				echo '<div class="panel-goodlayers-text">goodlayers</div>';
				echo '<div class="panel-admin-panel-text">admin panel</div>';
				echo '</div>';
				
				echo '<div class="head-save-changes"><div class="loading-save-changes"></div>';
				echo '<input type="submit" value="' . __('Save Changes','gdl_back_office') . '">';
				echo '</div>';	
				echo '</div>';	
				
				echo '<div class="panel-element" id="panel-element-save-complete">';
				echo '<div class="panel-element-save-text">Save Options Complete.</div>';
				echo '<div class="panel-element-save-arrow"></div></div>';
			
					create_goodlayers_elements($goodlayers_element);
				
				echo '<div class="panel-element-tail">';
				echo '<div class="tail-save-changes"><div class="loading-save-changes"></div>';
				echo '<input type="submit" value="' . __('Save Changes','gdl_back_office') . '">';
				echo '</div>';						
				echo '</div>';						
				echo '<input type="hidden" name="action" value="save_goodlayers_panel">';
				echo '<input type="hidden" name="security" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '">';
				echo '</div>';	
				
			?>

			</div>
		</form>
		
		<?php
	}
	
	// Create accordion menu
	function create_goodlayers_menu($menu){
	
		echo '<div id="panel-nav"><ul>';
		
		foreach($menu as $title=>$sub_menu){ 
		
			echo '<li>';
			echo '<a id="parent" href="#" >';
			echo '<div class="top-menu-bar"></div>';
			echo '<div class="top-menu-image"><img src="' . GOODLAYERS_PATH . '/include/images/admin-panel/' . str_replace(' ', '', $title) . '.png"/></div>';
			echo '<span class="top-menu-text">' . __($title, 'gdl_back_office') . '</span>';
			echo '</a>';
			echo '<ul>';
			
			foreach($sub_menu as $sub_title=>$name){
			
				echo '<li>';
				echo '<a id="children" href="#" rel=' . $name . '>';
				echo '<div class="child-menu-image"></div>';
				echo '<span class="child-menu-text">' . __($sub_title, 'gdl_back_office') . '</span>';
				echo '</a>';
				echo '</li>';
				
			}
			
			echo '</ul>';
			echo '</li>';
			
		}
		
		echo '</ul></div>';
		
	}
	
	// decide to create each input element base on the receiving key of elements
	function create_goodlayers_elements($elements){
	
		foreach($elements as $key => $element){
		
			echo '<div class="panel-element" id=' . $key . '>';

				foreach($element as $key => $values){
				
					if( !empty($values['name']) ){
						$values['value'] = get_option($values['name']);
						$values['default'] = (isset($values['default']))? $values['default']: '';
					}
					
					switch($values['type']){
					
						case 'upload': print_panel_upload($key, $values); break;
						case 'inputtext': print_panel_input_text($key, $values); break;
						case 'textarea': print_panel_input_textarea($key, $values); break;
						case 'radioenabled': print_panel_radio_enabled($key, $values); break;
						case 'radioimage' : print_panel_radioimage($key, $values); break;
						case 'combobox': print_panel_combobox($key, $values); break;
						case 'font-combobox': print_panel_font_combobox($key, $values); break;
						case 'colorpicker': print_panel_color_picker($key, $values); break;
						case 'sliderbar': print_panel_sliderbar($key, $values); break;
						case 'sidebar': print_panel_sidebar($key, $values); break;
						case 'uploadfont': print_panel_upload_font($key, $values); break;
						case 'button': print_panel_button($key, $values); break;
						case 'dummy': print_panel_dummy(); break;
						
					}
					
				}
			
			echo '</div>';
			
		}
		
	}
	
	/*  ---------------------------------------------------------------------
	*	The following section is the template of input elements
	*	---------------------------------------------------------------------
	*/
	
	// Upload => name, value, default
	function print_panel_upload($title, $values){
	
		extract($values);
		if( empty( $body_class ) ){ $body_class = $name; }
		
		?>
			<div class="panel-body body-<?php echo $body_class; ?>">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>" > <?php _e($title, 'gdl_back_office'); ?> </label>
				</div>
				<div class="panel-input">	
					<div class="input-example-image" id="input-example-image">
					<?php 
					
						$image_src = '';
						
						if(!empty($value)){ 
						
							$image_src = wp_get_attachment_image_src( $value, 'full' );
							$image_src = (empty($image_src))? '': $image_src[0];
							$thumb_src_preview = wp_get_attachment_image_src( $value, '150x150');
							echo '<img src="' . $thumb_src_preview[0] . '" />';
							
						} 
						
					?>			
					</div>
					<input name="<?php echo $name; ?>" type="hidden" id="upload_image_attachment_id" value="<?php 
					
						echo ($value == '')? esc_html($default): esc_html($value);
						
					?>" />
					<input id="upload_image_text" class="upload_image_text" type="text" value="<?php echo $image_src; ?>" />
					<input class="upload_image_button" type="button" value="Upload" />
				</div>
				<br class="clear">
			</div>
			
		<?php
		
	}
	
	// text => name, value, default
	function print_panel_input_text($title, $values){
	
		extract($values);
		
		?>
			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>" > <?php _e($title, 'gdl_back_office'); ?> </label>
				</div>
				<div class="panel-input">
					<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php 
						
						echo ($value == '')? esc_html($default): esc_html($value);
						
						 ?>" />
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>
			
		<?php
	
	}
	
	// textarea => name, value, default
	function print_panel_input_textarea($title, $values){
	
		extract($values);
		
		?>
		
			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>"><?php _e($title, 'gdl_back_office'); ?></label>
				</div>
				<div class="panel-input">
					<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" ><?php
						
						echo ($value == '')? esc_html($default): esc_html($value);
						
					?></textarea>
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>
			
		<?php
		
	}
	
	// radioenabled => name, value
	function print_panel_radio_enabled($title, $values){
	
		extract($values);
		
		?>
		
			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>"><?php _e($title, 'gdl_back_office'); ?></label>
				</div>
				<div class="panel-input">
					<label for="<?php echo $name; ?>"><div class="checkbox-switch <?php
						
						echo ($value=='enable' || ($value=='' && empty($default)))? 'checkbox-switch-on': 'checkbox-switch-off'; 

					?>"></div></label>
					<input type="checkbox" name="<?php echo $name; ?>" class="checkbox-switch" value="disable" checked>
					<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="checkbox-switch" value="enable" <?php 
						
						echo ($value=='enable' || ($value=='' && empty($default)))? 'checked': ''; 
					
					?>>
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>
			
		<?php
		
	}
	
	function print_panel_radioimage($title, $values){
		
		extract($values);
		
		if( empty( $body_class ) ){ $body_class = $name; }
		
		?>
		
			<div class="panel-body body-<?php echo $body_class; ?>">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>"><?php _e($title, 'gdl_back_office'); ?></label>
				</div>
				<div class="panel-radioimage">
				
					<?php foreach( $options as $option ){ ?>
					
						<div class='radio-image-wrapper'>
							<label for="<?php echo $option['value']; ?>">
								<img src=<?php echo GOODLAYERS_PATH.$option['image']?> alt=<?php echo $name;?>>
								<div id="check-list"></div>
							</label>
							<input type="radio" name="<?php echo $name; ?>" value="<?php echo $option['value'];?>" <?php 
								if($value == $option['value']){
									echo 'checked';
								}else if($value == '' && $default == $option['value']){
									echo 'checked';
								}
							?> id="<?php echo $option['value']; ?>" class="<?php echo $name; ?>" > 
						</div>
						
					<?php } ?>
					<br class="clear">	
				</div>
			</div>		
		
		<?php
		
	}
	
	// combobox => name, value, options[]
	function print_panel_combobox($title, $values){
	
		extract($values);
		
		if( empty($body) ) $body = "";
		if( empty($id) ) $id = $name;
		
		?>
		
			<div class="panel-body <?php echo $body; ?>">	
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>"><?php _e($title, 'gdl_back_office'); ?></label>
				</div>
				<div class="panel-input">	
					<div class="combobox">
						<select name="<?php echo $name; ?>" id="<?php echo $id; ?>">
						
							<?php foreach($options as $option){ ?>
							
								<option <?php if( $option == esc_html($value) ){ echo 'selected'; }?>><?php echo $option; ?></option>
							
							<?php } ?>
							
						</select>
					</div>
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>
			
		<?php
		
	}	
	
	// font-combobox => name, value, options[]
	function print_panel_font_combobox($title, $values){
	
		extract($values);
		if(empty($value)){ $value = $default; } 
		$elements = get_font_array();
		
		?>
		
			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>"><?php _e($title, 'gdl_back_office'); ?></label>
				</div>
				<div class="panel-input">	
					<div class="panel-font-sample" id="panel-font-sample"><?php echo FONT_SAMPLE_TEXT; ?></div> 
					<div class="combobox" id="combobox-font-sample">
						<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="gdl-panel-select-font-family">
						
							<?php foreach($elements as $option_name => $status){ ?>
							
								<option <?php if( $option_name==substr(esc_html($value),2) ){ echo 'selected'; }?> <?php echo $status; ?>><?php 
										
										echo ($status=='enabled')?  '- ':'';
										echo $option_name; 
									
									?></option>
							
							<?php } ?>
							
						</select>
					</div>
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>
			
		<?php
		
	}	
	
	// colorpicker => name, value, default
	function print_panel_color_picker($title, $values){
	
		extract($values);
		
		?>
		
			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>" > <?php _e($title, 'gdl_back_office'); ?> </label>
				</div>
				<div class="panel-input">
					<input type="text" name="<?php echo $name; ?>" class="color-picker" value="<?php 
												
						echo ($value == '')? esc_html($default): esc_html($value);
						
						?>" default="<?php echo $default; ?>" />
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>
			
		<?php
	}
	
	// sliderbar => name, value, default
	function print_panel_sliderbar($title, $values){
	
		extract($values);
		
		?>
		
			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label for="<?php echo $name; ?>" > <?php _e($title, 'gdl_back_office'); ?> </label>
				</div>
				<div class="panel-input">
					<div id="<?php echo $name; ?>" class="sliderbar" rel="sliderbar"></div>
					<input type="hidden" name="<?php echo $name; ?>" value="<?php echo ($value == '')? esc_html($default): esc_html($value); ?>" >
					<div id="slidertext"><?php echo ($value == '')? esc_html($default): esc_html($value); ?> px</div>
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>
			
		<?php
		
	}
	
	// sidebar => name, value
	function print_panel_sidebar($title, $values){
	
		extract($values);
		
		?>
		
		<div class="panel-body" id="panel-body">
			<div class="panel-body-gimmick"></div>
			<div class="panel-title">
				<label> <?php _e($title, 'gdl_back_office'); ?> </label>
			</div>
			<div class="panel-input">
				<input type="text" id="add-more-sidebar" value="type title here" rel="type title here">
				<div id="add-more-sidebar" class="add-more-sidebar"></div>
			</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					
				<?php } ?>
			<br class="clear">
			<div id="selected-sidebar" class="selected-sidebar">
				<div class="default-sidebar-item" id="sidebar-item">
					<div class="panel-delete-sidebar"></div>
					<div class="slider-item-text"></div>
					<input type="hidden" id="<?php echo $name; ?>">
				</div>
				
				<?php 
				
				if(!empty($value)){
					
					$xml = new DOMDocument();
					$xml->loadXML($value);
					
					foreach( $xml->documentElement->childNodes as $sidebar_name ){
					
				?>
						<div class="sidebar-item" id="sidebar-item">
							<div class="panel-delete-sidebar"></div>
							<div class="slider-item-text"><?php echo $sidebar_name->nodeValue; ?></div>
							<input type="hidden" name="<?php echo $name; ?>[]" id="<?php echo $name; ?>" value="<?php echo $sidebar_name->nodeValue; ?>">
						</div>
					
				<?php 
					} 
					
				} 
				
				?>
				
			</div>
		</div>
		<?php 
		
	}
	
	// uploadfont => name, value
	function print_panel_upload_font($title, $values){
	
		extract($values);
		
		?>
		
		<div class="panel-body" id="panel-body">
			<div class="panel-body-gimmick"></div>
			<div class="panel-title panel-add-more-title">
				<?php _e($title, 'gdl_back_office'); ?>
			</div>
			<div id="add-more-font" class="add-more-font"></div>
			<br class="clear">
			<div id="added-font" class="added-font">
				<div class="default-font-item" id="font-item">
					<div class="inner-font-item">
						<div class="panel-font-title"><?php _e('Font Name','gdl_back_office'); ?></div>
						<input type="text" id="<?php echo $name; ?>" class="gdl_upload_font_name" readonly>
					</div>
					<div class="inner-font-item">
						<div class="panel-font-title"><?php _e('Font File','gdl_back_office'); ?></div>
						<input type="hidden" id="<?php echo $file; ?>"  class="font-attachment-id">
						<input type="text" class="upload-font-text" readonly>
						<input class="upload-font-button" type="button" value="Upload" />
					</div>
					<div class="panel-delete-font"></div>
				</div>
				<?php 
				
					if(!empty($value)){
						
						$xml = new DOMDocument();
						$xml->loadXML($value);
						
						foreach( $xml->documentElement->childNodes as $each_font ){
						
				?>
				
					<div class="font-item" id="font-item">
						<div class="inner-font-item">
							<div class="panel-font-title"><?php _e('Font Name','gdl_back_office'); ?></div>
							<input type="text" name="<?php echo $name; ?>[]" id="<?php echo $name; ?>" value="<?php echo find_xml_value($each_font, 'name'); ?>" class="gdl_upload_font_name" readonly>
						</div>
						<div class="inner-font-item">
							<div class="panel-font-title"><?php _e('Font File','gdl_back_office'); ?></div>
							<input type="hidden" name="<?php echo $file; ?>[]" id="<?php echo $file; ?>" class="font-attachment-id" value="<?php 
									$attachment_id = find_xml_value($each_font, 'file'); 
									echo $attachment_id;
								?>" >
							<input type="text" class="upload-font-text" value="<?php echo (empty($attachment_id))? '': wp_get_attachment_url( $attachment_id ); ?>" readonly>
							<input class="upload-font-button" type="button" value="Upload" />
						</div>
						<div class="panel-delete-font"></div>
					</div>
					
				<?php 
				
						}
						
					}
					
				?>
				
			</div>
		</div>
		<?php
		
	}
	
	// print normal button
	function print_panel_button($title, $values){
	
		extract($values);
	
		?>

			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label> <?php _e($title, 'gdl_back_office'); ?> </label>
				</div>
				<div class="panel-input">
					<input type="button" value="<?php echo $text; ?>" id="<?php echo $id; ?>" />
				</div>
				<?php if(isset($description)){ ?>
				
					<div class="panel-description"><?php _e($description, 'gdl_back_office'); ?></div>
					<div class="panel-description-info-img"></div>
					
				<?php } ?>
				<br class="clear">
			</div>		
		
		<?php	
	}
	
	// upload dummy data (from xml file)
	function print_panel_dummy(){
		?>

			<div class="panel-body">
				<div class="panel-body-gimmick"></div>
				<div class="panel-title">
					<label> DUMMIES DATA </label>
				</div>
				<div class="panel-input">
					<input type="button" value="Import Dummies Data" id="import-dummies-data" />
					<div id="import-now-loading" class="now-loading"></div>
				</div>
				<div class="panel-description">
					By clicking this button, you can import the dummy post and page to help 
					you create a site that look like theme preview to help you understand the
					function of this theme better. <br><br>
					*** It may takes a while during importing process, make sure not to reload
					the page or make any changes to the database.
				</div>
				<div class="panel-description-info-img"></div>
				<br class="clear">
			</div>		
		
		<?php
	}
?>
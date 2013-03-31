<?php
	/*	
	*	Goodlayers Custom Style File
	*	---------------------------------------------------------------------
	*	This file fetch all style options in admin panel to generate the 
	*	style-custom.css file
	*	---------------------------------------------------------------------
	*/
	gdl_generate_style_custom();
	// This function is called when user save the option ( admin panel )
	function gdl_generate_style_custom(){

		global $gdl_fh;
		
		$return_data = array('success'=>'-1', 'alert'=>'Cannot write style-custom.css file, you may try setting the style-custom.css file permission to 755 or 777 to solved this.');
		
		// initial the value of the style
		$file_path = SERVER_PATH . "/style-custom.css";
		$gdl_fh = @fopen($file_path, 'w');
		
		if( !$gdl_fh ){ die( json_encode($return_data) ); }
		
		gdl_get_style_custom_content();
		
		// close data
		fclose($gdl_fh);	
	}
	
	// This function write the files to the admin panel
	function gdl_write_data( $string ){
		global $gdl_fh;
		fwrite( $gdl_fh, $string . "\r\n" );
	}
	
	// help print the css easier
	function gdl_print_style( $selector, $content ){
		gdl_write_data( $selector . '{ ' . $content  . '} ');
	}
	
	// help to print the attribute easier
	function gdl_style_att( $attribute, $value ){
		return $attribute . ': ' . $value . '; ';
	}
	
	function gdl_get_style_custom_content(){
		
		$temp_val = '';
		$temp_sel = '';
		$temp_att = '';
		
		// Background Style
		/*$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME . "_body_background", '#000000') );
		gdl_print_style( 'html', $temp_att );*/	
		
		// Logo Margin
		/*$temp_att = gdl_style_att( 'margin-top', get_option(THEME_SHORT_NAME . "_logo_top_margin", '40') . 'px' );
		$temp_att = $temp_att . gdl_style_att( 'margin-left', get_option(THEME_SHORT_NAME . "_logo_left_margin", '24') . 'px' );
		$temp_att = $temp_att . gdl_style_att( 'margin-bottom', get_option(THEME_SHORT_NAME . "_logo_bottom_margin", '30') . 'px' );
		gdl_print_style( '.logo-wrapper', $temp_att );*/
		
		// Header Font
		/*$temp_att = gdl_style_att( 'font-size', get_option(THEME_SHORT_NAME . "_h1_size", '30') . 'px' );
		gdl_print_style( 'h1', $temp_att );	
		$temp_att = gdl_style_att( 'font-size', get_option(THEME_SHORT_NAME . "_h2_size", '25') . 'px' );
		gdl_print_style( 'h2', $temp_att );	
		$temp_att = gdl_style_att( 'font-size', get_option(THEME_SHORT_NAME . "_h3_size", '20') . 'px' );
		gdl_print_style( 'h3', $temp_att );	
		$temp_att = gdl_style_att( 'font-size', get_option(THEME_SHORT_NAME . "_h4_size", '18') . 'px' );
		gdl_print_style( 'h4', $temp_att );	
		$temp_att = gdl_style_att( 'font-size', get_option(THEME_SHORT_NAME . "_h5_size", '16') . 'px' );
		gdl_print_style( 'h5', $temp_att );	
		$temp_att = gdl_style_att( 'font-size', get_option(THEME_SHORT_NAME . "_h6_size", '15') . 'px' );
		gdl_print_style( 'h6', $temp_att );			
		$temp_att = gdl_style_att( 'font-size', get_option(THEME_SHORT_NAME . "_content_size", '12') . 'px' );
		gdl_print_style( 'body', $temp_att );	*/
		
		//$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_title_color", '#ffffff') );
		//gdl_print_style( 'h1, h2, h3, h4, h5, h6, .title-color, .Rubrik', $temp_att );	/* MaKa */
		//$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_page_caption_color", '#b2b2b2') );
		//gdl_print_style( '.gdl-page-caption', $temp_att );	
		
		// Font Family
		//$temp_att = gdl_style_att( 'font-family', substr(get_option(THEME_SHORT_NAME . "_content_font"), 2) );
		//gdl_print_style( 'body', $temp_att );	
		//$temp_att = gdl_style_att( 'font-family', substr(get_option(THEME_SHORT_NAME . "_header_font"), 2) );
		//gdl_print_style( 'h1, h2, h3, h4, h5, h6, .gdl-title, .Rubrik', $temp_att );				
		//$temp_att = gdl_style_att( 'font-family', substr(get_option(THEME_SHORT_NAME . "_stunning_text_font"), 2) );
		//gdl_print_style( 'h1.stunning-text-title', $temp_att );	
		//$temp_att = gdl_style_att( 'font-family', substr(get_option(THEME_SHORT_NAME . "_slider_title_font"), 2) );
		//gdl_print_style( '.gdl-slider-title', $temp_att );
		
		// Divider
		$temp_val = get_option(THEME_SHORT_NAME . "_divider_line", '#303030');
		$temp_att = gdl_style_att( 'border-bottom', '1px solid ' . $temp_val );
		gdl_print_style( 'div.divider', $temp_att );	
		
		$temp_sel = ".gdl-divider ";
		$temp_att = gdl_style_att( 'border-color', $temp_val . ' !important' );
		gdl_print_style( $temp_sel, $temp_att );
		
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_back_to_top_text_color", '#7c7c7c') . ' !important' );
		gdl_print_style( '.scroll-top', $temp_att );	
		
		// Stunning Text 
		$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME . "_stunning_text_background_color", '#303030') . ' !important' );
		gdl_print_style( '.stunning-text-wrapper', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_stunning_text_title_color", '#ffffff') );
		gdl_print_style( 'h1.stunning-text-title', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_stunning_text_caption_color", '#dbdbdb') );
		gdl_print_style( '.stunning-text-caption', $temp_att );						
		
		// Font Color
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_content_color", '#f0f0f0') . ' !important' );
		gdl_print_style( 'body', $temp_att );			

		$temp_val = get_option(THEME_SHORT_NAME . "_link_color", '#ffffff');
		
		$temp_att = gdl_style_att( 'color', $temp_val );
		gdl_print_style( 'a', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_link_hover_color", '#bababa') );
		gdl_print_style( 'a:hover', $temp_att );		
	
		$temp_att = gdl_style_att( 'color', $temp_val . ' !important' );
		gdl_print_style( '.gdl-link-title', $temp_att );		
		
		// Slider
		//$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_slider_title_color", '#ffffff') . ' !important' );
		//gdl_print_style( '.gdl-slider-title, .gdl-slider-title a', $temp_att );		
		//$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_slider_caption_color", '#ffffff') . ' !important' );
		//gdl_print_style( '.gdl-slider-caption, .nivo-caption', $temp_att );			
		//$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH .  '/images/pattern/pattern' . get_option(THEME_SHORT_NAME . "_background_pattern", '3') . '.png)' );
		//gdl_print_style( 'div.gdl-slider-overlay', $temp_att );				
	
		// Post - Port Color
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_port_title_color", '#ef7f2c') . ' !important' );
		gdl_print_style( '.port-title-color, .port-title-color a', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_port_title_hover_color", '#ef7f2c') . ' !important' );
		gdl_print_style( '.port-title-color a:hover', $temp_att );			
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_port_tags_color", '#d0d0d0') . ' !important' );
		gdl_print_style( '.portfolio-thumbnail-tag, .portfolio-thumbnail-tag a', $temp_att );		
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_port_filter_color", '#d0d0d0') . ' !important' );
		gdl_print_style( '#portfolio-item-filter a', $temp_att );
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_port_filter_color_hover", '#ffffff') . ' !important' );
		gdl_print_style( '#portfolio-item-filter a:hover', $temp_att );
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_port_filter_color_current", '#ffffff') . ' !important' );
		gdl_print_style( '#portfolio-item-filter a.active', $temp_att );

		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_post_title_color", '#ffffff') . ' !important' );
		gdl_print_style( '.post-title-color', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_post_title_hover_color", '#ffffff') . ' !important' );
		gdl_print_style( '.post-title-color a:hover', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_post_info_color", '#a1a1a1') . ' !important' );
		gdl_print_style( '.post-info-color, .post-info-color a', $temp_att );	
		$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME . "_pagination_normal_state", '#303030') );
		gdl_print_style( 'div.pagination a', $temp_att );
		$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME . "_post_about_author_color", '#333333') . ' !important' );
		gdl_print_style( '.about-author-wrapper', $temp_att );		
		$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME . "_post_thumbnail_info_bg", '#ffffff') );
		gdl_print_style( '.blog-thumbnail-inner-info', $temp_att );			
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_post_thumbnail_info_date", '#0c0c0c') );
		gdl_print_style( '.blog-thumbnail-inner-info .blog-thumbnail-date', $temp_att );			
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_post_thumbnail_info", '#a2a2a2') );
		gdl_print_style( '.blog-thumbnail-inner-info, .blog-thumbnail-inner-info a', $temp_att );			
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_post_thumbnail_info_head", '#212121') );
		gdl_print_style( '.blog-thumbnail-inner-info span.head', $temp_att );			
		
		// Testimonial
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_testimonial_text", '#cccccc') . ' !important' );
		gdl_print_style( '.testimonial-content', $temp_att );			
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_testimonial_author", '#ffffff') . ' !important' );
		gdl_print_style( '.testimonial-author-name', $temp_att );		
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_testimonial_position", '#b8b8b8') . ' !important' );
		gdl_print_style( '.testimonial-author-position', $temp_att );		
		
		// Table /* MaKa */
/* 		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME . "_table_text_title", '#666666') );
		$temp_att = $temp_att . gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME . "_table_title_background", '#f7f7f7') );
		gdl_print_style( 'table th', $temp_att );		
		$temp_att = gdl_style_att( 'border-color', get_option(THEME_SHORT_NAME . "_table_border", '#e5e5e5') );
		gdl_print_style( 'table, table tr, table tr td, table tr th', $temp_att );	*/				
		
		// Navigation
		$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_main_navigation_background', '#ffffff'));
		gdl_print_style( 'div.gdl-left-sidebar .header-wrapper.five.columns', $temp_att );	
		$temp_att = gdl_style_att( 'border-color', get_option(THEME_SHORT_NAME.'_main_navigation_border', '#ececec') . ' !important' );
		gdl_print_style( '.navigation-wrapper .sf-menu li', $temp_att );		
		$temp_att = gdl_style_att( 'border-color', get_option(THEME_SHORT_NAME.'_sub_navigation_border', '#ececec') . ' !important' );
		gdl_print_style( '.navigation-wrapper .sf-menu ul, .navigation-wrapper .sf-menu ul li', $temp_att );
		$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_sub_navigation_background', '#ffffff') . ' !important' );
		gdl_print_style( '.sf-menu li li', $temp_att );			

		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_main_navigation_text', '#a1a1a1') . ' !important' );
		gdl_print_style( '.navigation-wrapper .sf-menu li a, span.sf-sub-indicator', $temp_att );		
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_main_navigation_description', '#b0b0b0') . ' !important' );
		gdl_print_style( 'ul.sf-menu li span', $temp_att );			
		
		$temp_sel = ".navigation-wrapper .sf-menu ul a, .navigation-wrapper .sf-menu ul .current-menu-ancestor ul a, .navigation-wrapper .sf-menu ul .current-menu-item ul a, ";
		$temp_sel = $temp_sel . ".navigation-wrapper .sf-menu .current-menu-ancestor ul a, .navigation-wrapper .sf-menu .current-menu-item ul a,";
		$temp_sel = $temp_sel . ".navigation-wrapper .sf-menu ul span.sf-sub-indicator";
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sub_navigation_text', '#999999') . ' !important' );
		gdl_print_style( $temp_sel, $temp_att );	

		$temp_sel = ".navigation-wrapper .sf-menu ul a:hover, .navigation-wrapper .sf-menu ul .current-menu-item ul a:hover, ";
		$temp_sel = $temp_sel . ".navigation-wrapper .sf-menu .current-menu-item ul a:hover";
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sub_navigation_text_hover', '#3d3d3d') . ' !important' );
		gdl_print_style( $temp_sel, $temp_att );			

		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_main_navigation_text_hover', '#3d3d3d') . ' !important' );
		gdl_print_style( '.navigation-wrapper .sf-menu a:hover', $temp_att );				
	
		$temp_sel = ".navigation-wrapper .sf-menu .current-menu-ancestor a, .navigation-wrapper .sf-menu .current-menu-item a";
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_main_navigation_text_current', '#3d3d3d') . ' !important' );
		gdl_print_style( $temp_sel, $temp_att );	

		$temp_sel = ".navigation-wrapper .sf-menu ul .current-menu-ancestor a, ";
		$temp_sel = $temp_sel . ".navigation-wrapper .sf-menu ul .current-menu-ancestor ul .current-menu-item a, ";
		$temp_sel = $temp_sel . ".navigation-wrapper .sf-menu ul .current-menu-item a";
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sub_navigation_text_current', '#3d3d3d') . ' !important' );
		gdl_print_style( $temp_sel, $temp_att );		
		
		// Search Box
		$temp_att = gdl_style_att( 'border-left', '1px solid ' . get_option(THEME_SHORT_NAME.'_main_navigation_border_right', '#dbdbdb') );
		gdl_print_style( '.search-wrapper', $temp_att );	
		$temp_att = gdl_style_att( 'border-left', '1px solid ' . get_option(THEME_SHORT_NAME.'_main_navigation_border_left', '#ffffff') );
		gdl_print_style( '.search-wrapper form', $temp_att );			

		// Price Item
		$temp_att = gdl_style_att( 'border-color', get_option(THEME_SHORT_NAME.'_price_item_border', '#333333') . ' !important' );
		gdl_print_style( 'div.gdl-price-item .gdl-divider', $temp_att );		
		
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_price_item_price_title_color', '#ffffff') . ' !important' );
		$temp_att = $temp_att . gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_price_item_price_title_background', '#333333') . ' !important' );
		gdl_print_style( 'div.gdl-price-item .price-title', $temp_att );	
		
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_price_item_best_price_title_color', '#ffffff') . ' !important' );
		$temp_att = $temp_att . gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_price_item_best_price_title_background', '#5f5f5f') . ' !important' );
		gdl_print_style( 'div.gdl-price-item .price-item.active .price-title', $temp_att );			
		
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_price_item_price_color', '#ffffff') . ' !important' );
		gdl_print_style( 'div.gdl-price-item .price-tag', $temp_att );
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_price_item_best_price_color', '#ffffff') . ' !important' );
		gdl_print_style( 'div.gdl-price-item .price-item.active .price-tag', $temp_att );
		$temp_att = gdl_style_att( 'border-top', '1px solid ' . get_option(THEME_SHORT_NAME.'_price_item_best_price_color', '#ffffff') . ' !important' );
		gdl_print_style( 'div.gdl-price-item .price-item.active', $temp_att );	
		
		// Tabs Color
		$temp_val = get_option(THEME_SHORT_NAME.'_tab_border_color', '#333333');
		
		$temp_att = gdl_style_att( 'border-color', $temp_val . ' !important' );
		gdl_print_style( 'ul.tabs', $temp_att );

		$temp_att = gdl_style_att( 'border-color', $temp_val . ' !important' );
		$temp_att = $temp_att . gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_tab_background_color', '#333333') . ' !important' );
		$temp_att = $temp_att . gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_tab_text_color', '#b8b8b8') . ' !important' );
		gdl_print_style( 'ul.tabs li a', $temp_att );		

		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_tab_active_text_color', '#ffffff') . ' !important' );
		$temp_att = $temp_att . gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_tab_active_background_color', '#525252') . ' !important' );
		gdl_print_style( 'ul.tabs li a.active', $temp_att );	
	
		// Sidebar
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sidebar_title_color', '#494949') . ' !important' );
		gdl_print_style( '.sidebar-title-color, #wp-calendar th', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sidebar_text_color', '#aaaaaa') . ' !important' );
		gdl_print_style( '.custom-sidebar', $temp_att );	
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sidebar_link_color', '#202020') . ' !important' );
		gdl_print_style( '.custom-sidebar a', $temp_att );
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sidebar_link_color_hover', '#303030') . ' !important' );
		gdl_print_style( '.custom-sidebar a:hover', $temp_att );
		
		$temp_sel = ".custom-sidebar.gdl-divider, ";
		$temp_sel = $temp_sel . ".custom-sidebar.gdl-divider div, ";
		$temp_sel = $temp_sel . ".custom-sidebar.gdl-divider .custom-sidebar-title, ";
		$temp_sel = $temp_sel . ".custom-sidebar.gdl-divider ul li";		
		$temp_att = gdl_style_att( 'border-color', get_option(THEME_SHORT_NAME.'_sidebar_border_color', '#ececec') . ' !important' );
		gdl_print_style( $temp_sel, $temp_att );		

		// Copyright
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_copyright_text', '#a5a5a5') . ' !important' );
		gdl_print_style( 'div.copyright-wrapper', $temp_att );	

		// Contact Form
		$temp_sel = 'div.contact-form-wrapper input[type="text"], div.contact-form-wrapper input[type="password"], ';
		$temp_sel = $temp_sel . 'div.contact-form-wrapper textarea, ';
		$temp_sel = $temp_sel . 'div.comment-wrapper input[type="text"], ';
		$temp_sel = $temp_sel . 'input[type="password"], div.comment-wrapper textarea, ';
		$temp_sel = $temp_sel . 'span.wpcf7-form-control-wrap input[type="text"], span.wpcf7-form-control-wrap input[type="password"], ';
		$temp_sel = $temp_sel . 'span.wpcf7-form-control-wrap textarea';
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_contact_form_text_color', '#888888') );
		$temp_att = $temp_att . gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_contact_form_background_color', '#2b2b2b') );
		$temp_att = $temp_att . gdl_style_att( 'border', '1px solid ' . get_option(THEME_SHORT_NAME.'_contact_form_border_color', '#2b2b2b') );
		gdl_print_style( $temp_sel, $temp_att );
		
		// Button
		//$temp_sel = 'a.button, button, input[type="submit"], input[type="reset"], ';
		//$temp_sel = $temp_sel . 'input[type="button"], a.gdl-button';
		//$temp_att = gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_button_background_color', '#f1f1f1') );
		//$temp_att = $temp_att . gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_button_text_color', '#d9d9d9') );
		//$temp_att = $temp_att . gdl_style_att( 'border', '1px solid ' . get_option(THEME_SHORT_NAME.'_button_border_color', '#2b2b2b') );
		//gdl_print_style( $temp_sel, $temp_att );	

		$temp_sel = 'a.button:hover, button:hover, input[type="submit"]:hover, input[type="reset"]:hover, ';
		$temp_sel = $temp_sel . 'input[type="button"]:hover, a.gdl-button:hover';
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_button_text_hover_color', '#7a7a7a') );
		gdl_print_style( $temp_sel, $temp_att );
		
		// Thumbnail Info Icon
		$gdl_thumbnail_info_icon = get_option(THEME_SHORT_NAME.'_post_thumbnail_info_icon','dark');
		
		$temp_sel = "div.blog-item-holder .blog-item1 .blog-thumbnail-inner-info .blog-thumbnail-author, ";
		$temp_sel = $temp_sel . "div.blog-thumbnail-inner-info .blog-thumbnail-author ";
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_thumbnail_info_icon . '/author.png) no-repeat 0px 3px' );
		gdl_print_style( $temp_sel, $temp_att );

		$temp_sel = "div.blog-item-holder .blog-item1 .blog-thumbnail-inner-info .blog-thumbnail-comment, ";
		$temp_sel = $temp_sel . "div.blog-thumbnail-inner-info .blog-thumbnail-comment";
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_thumbnail_info_icon . '/comment.png) no-repeat 0px 3px' );
		gdl_print_style( $temp_sel, $temp_att );	

		$temp_sel = "div.blog-item-holder .blog-item1 .blog-thumbnail-inner-info .blog-thumbnail-tag, ";
		$temp_sel = $temp_sel . "div.blog-thumbnail-inner-info .blog-thumbnail-tag ";
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_thumbnail_info_icon . '/tag.png) no-repeat 0px 3px' );
		gdl_print_style( $temp_sel, $temp_att );			

		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_thumbnail_info_icon . '/link-small.png) no-repeat 0px 3px' );
		gdl_print_style( 'div.single-port-visit-website', $temp_att );	
		
		// Icon Type
		global $gdl_icon_type;
		
		$temp_val = get_option( THEME_SHORT_NAME . '_content_bg_type', 'dark' );
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $temp_val . '/content-bg.png)' );
		//gdl_print_style( "div.gdl-inner-page-item", $temp_att );	
		
		
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/header-gimmick.png)' );
		/* MaKa - tar bort */
		//gdl_print_style( "div.gdl-header-gimmick-right, div.gdl-header-gimmick-left", $temp_att );
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/arrow-right.png) no-repeat' );
		gdl_print_style( "div.single-port-next-nav .right-arrow", $temp_att );
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/arrow-left.png) no-repeat' );
		gdl_print_style( "div.single-port-prev-nav .left-arrow", $temp_att );		

		$temp_sel = "div.single-thumbnail-author, ";
		$temp_sel = $temp_sel . "div.archive-wrapper .blog-item .blog-thumbnail-author, ";
		$temp_sel = $temp_sel . "div.blog-item-holder .blog-item1 .blog-thumbnail-author";
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/author.png) no-repeat 0px 3px' );
		gdl_print_style( $temp_sel, $temp_att );

		$temp_sel = "div.single-thumbnail-date, ";
		$temp_sel = $temp_sel . "div.blog-item-holder .blog-item1 .blog-thumbnail-date, ";
		$temp_sel = $temp_sel . "div.archive-wrapper .blog-item .blog-thumbnail-date";
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/calendar.png) no-repeat 0px 1px' );
		gdl_print_style( $temp_sel, $temp_att );		
		
		$temp_sel = "div.single-thumbnail-comment, div.archive-wrapper .blog-item .blog-thumbnail-comment, ";
		$temp_sel = $temp_sel . "div.blog-item-holder .blog-item1 .blog-thumbnail-comment ";
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/comment.png) no-repeat 0px 3px' );
		gdl_print_style( $temp_sel, $temp_att );	

		$temp_sel = "div.single-thumbnail-tag, div.archive-wrapper .blog-item .blog-thumbnail-tag, ";
		$temp_sel = $temp_sel . "div.blog-item-holder .blog-item1 .blog-thumbnail-tag";
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/tag.png) no-repeat 0px 3px' );
		gdl_print_style( $temp_sel, $temp_att );		
		
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/minus-24px.png) no-repeat' );
		gdl_print_style( 'span.accordion-head-image.active, span.toggle-box-head-image.active', $temp_att );			
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/plus-24px.png) no-repeat' );
		gdl_print_style( 'span.accordion-head-image, span.toggle-box-head-image', $temp_att );		
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/navigation-20px.png)' );
		gdl_print_style( 'div.jcarousellite-nav .prev, div.jcarousellite-nav .next', $temp_att );	
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_icon_type . '/quotes-18px.png)' );
		gdl_print_style( 'div.testimonial-icon', $temp_att );	
		
		// Navigation Icon type
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . get_option(THEME_SHORT_NAME.'_navigation_left_bar', 'light') . '/navigation-left-bar.png)');
		gdl_print_style( 'div.gdl-left-sidebar.five.columns', $temp_att );		
				
		global $gdl_sidebar_icon_type;

		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_sidebar_icon_type . '/comment.png) no-repeat 0px 3px' );
		gdl_print_style( 'div.custom-sidebar .recent-post-widget-comment-num', $temp_att );		
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_sidebar_icon_type . '/arrow4.png) no-repeat 0px 14px' );
		gdl_print_style( 'div.custom-sidebar ul li', $temp_att );		
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_sidebar_icon_type . '/find-17px.png) no-repeat center' );
		gdl_print_style( 'div.custom-sidebar #searchsubmit', $temp_att );	
		$temp_att = gdl_style_att( 'background', 'url(' . GOODLAYERS_PATH . '/images/icon/' . $gdl_sidebar_icon_type . '/calendar.png) no-repeat 0px 5px' );
		gdl_print_style( 'div.custom-sidebar .recent-post-widget-date', $temp_att );			

		$temp_sel = 'div.custom-sidebar #search-text input[type="text"], ';
		$temp_sel = $temp_sel . 'div.custom-sidebar .contact-widget-whole input, ';
		$temp_sel = $temp_sel . 'div.custom-sidebar .contact-widget-whole textarea';
		$temp_att = gdl_style_att( 'color', get_option(THEME_SHORT_NAME.'_sidebar_input_box_text', '#999999') );
		$temp_att = $temp_att . gdl_style_att( 'border', '1px solid ' . get_option(THEME_SHORT_NAME.'_sidebar_input_box_border', '#eeeeee') );		
		$temp_att = $temp_att . gdl_style_att( 'background-color', get_option(THEME_SHORT_NAME.'_sidebar_input_box_background', '#eeeeee') );
		gdl_print_style( $temp_sel, $temp_att );
		
	}
	
?>

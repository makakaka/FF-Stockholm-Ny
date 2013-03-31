jQuery(document).ready(function(){
	jQuery.supersized({
		
		<?php
			$transition_arr = array(
				'Fade' => 1, 'Slide Top' => 2, 'Slide Right' => 3, 
				'Slide Bottom' => 4, 'Slide Left' => 5, 'Carousel Right' => 6, 
				'Carousel Left' => 7
			);
			
			$transition_speed = get_option( THEME_SHORT_NAME.'_supersized_animation_speed' , '700');
			$transition = get_option( THEME_SHORT_NAME.'_supersized_transition' , 'Fade');
			$slide_interval = get_option( THEME_SHORT_NAME.'_supersized_pause_time' , '5000');
		?>
		
		// Functionality
		slide_interval          :   <?php echo $slide_interval; ?>,		// Length between transitions
		transition              :   <?php echo $transition_arr[ $transition ]; ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	<?php echo $transition_speed; ?>,		// Speed of transition	
		performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
		
		//Size  Position
		min_width		        :   0,		//Min width allowed (in pixels)
		min_height		        :   0,		//Min height allowed (in pixels)
		vertical_center         :   1,		//Vertically center background
		horizontal_center       :   1,		//Horizontally center background
		fit_portrait         	:   0,		//Portrait images will not exceed browser height
		fit_landscape			:   0,		//Landscape images will not exceed browser width
		
		// Components							
		thumb_links				:	1,			// Individual thumb links for each slide	
		thumbnail_navigation    :   0,			// Thumbnail navigation		
		slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		slides 					:  	[			// Slideshow Images	
										<?php 
											wp_reset_query();
											
											if( is_single() ){
												$bg_fetch_page = get_option(THEME_SHORT_NAME.'_single_bg_gallery');
												$slider_page = get_page_by_title($bg_fetch_page, null, 'gallery');
												$bg_slider_xml = get_post_meta($slider_page->ID,'post-option-gallery-xml', true);
											}else if( is_search() || is_archive() ){
												$bg_fetch_page = get_option(THEME_SHORT_NAME.'_search_bg_gallery');
												$slider_page = get_page_by_title($bg_fetch_page, null, 'gallery');
												$bg_slider_xml = get_post_meta($slider_page->ID,'post-option-gallery-xml', true);											
											}else{
												if( !empty($post->ID) ){
													$bg_fetch_page = get_post_meta($post->ID,'page-option-top-slider-types', true);
												}
												
												if( !empty($bg_fetch_page) && $bg_fetch_page == 'Current Page'){
													$bg_slider_xml = get_post_meta($post->ID,'page-option-top-slider-xml', true);
												}else if( !empty($bg_fetch_page) ){
													$slider_page = get_page_by_title($bg_fetch_page, null, 'gallery');
													$bg_slider_xml = get_post_meta($slider_page->ID,'post-option-gallery-xml', true);
												}else{
													$bg_fetch_page = get_option(THEME_SHORT_NAME.'_page_bg_gallery');
													$slider_page = get_page_by_title($bg_fetch_page, null, 'gallery');
													$bg_slider_xml = get_post_meta($slider_page->ID,'post-option-gallery-xml', true);							
												}												
											}												
											$slider_index = false;
											if( !empty($bg_slider_xml) ){
												$slider_xml_dom = new DOMDocument();
												$slider_xml_dom->loadXML($bg_slider_xml);
												foreach( $slider_xml_dom->documentElement->childNodes as $slider_item ){
													$thumbnail_id = find_xml_value($slider_item, 'image');
													$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'full' );
													$slide_link = find_xml_value($slider_item, 'link');
													$thumbnail_thumb = wp_get_attachment_image_src( $thumbnail_id , '72x50' );
													$title = str_replace('\'','\\\'',find_xml_value($slider_item, 'title'));
													$caption = str_replace('\'','\\\'',find_xml_value($slider_item, 'caption'));
													
													if( !empty($slide_link) ){ $title = '<a href="'. $slide_link . '">' . $title . '</a>'; }
													if( $slider_index ){ echo ","; }
													else{ $slider_index = true; }
													
													echo '{ image: \'' . $thumbnail[0] . '\', title: \'' . $title . '\' , caption: \'' . $caption . '\' , ';
													echo ' thumb: \'' . $thumbnail_thumb[0] . '\'}';
												}
											}

										?>
									]	

	});
});
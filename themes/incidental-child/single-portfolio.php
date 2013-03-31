<?php get_header(); ?>
	<?php
		// Translator words
		global $gdl_admin_translator;	
		if( $gdl_admin_translator == 'enable' ){
			$translator_port_header = get_option(THEME_SHORT_NAME.'_translator_port_header', 'Portfolio');
			$translator_port_caption = get_option(THEME_SHORT_NAME.'_translator_port_caption', 'Default portfolio caption');
			$translator_client = get_option(THEME_SHORT_NAME.'_translator_client', 'Client');
			$translator_visit_website = get_option(THEME_SHORT_NAME.'_translator_visit_website', 'Visit Website');
			$translator_about_author = get_option(THEME_SHORT_NAME.'_translator_about_author', 'About the Author');
			$translator_social_share = get_option(THEME_SHORT_NAME.'_translator_social_shares', 'Social Share');
		}else{
			$translator_port_header = __('Portfolio','gdl_front_end');
			$translator_port_caption = __('Default portfolio caption','gdl_front_end');
			$translator_client =  __('Client','gdl_front_end');
			$translator_visit_website = __('Visit Website','gdl_front_end');		
			$translator_about_author = __('About the Author','gdl_front_end');
			$translator_social_share = __('Social Share','gdl_front_end');
		}		
		
		$item_size = '720x420'; /* 660x320 */
		
		if ( have_posts() ){
			while (have_posts()){
				the_post();

				if( get_option(THEME_SHORT_NAME.'_use_portfolio_as') == 'portfolio style' ){

					// Single header
					$caption = get_post_meta($post->ID, 'post-option-caption', true);
					$header = get_post_meta($post->ID, 'post-option-header', true);
					echo '<div class="gdl-page-header-area" id="gdl-page-header-area" >';
					echo '<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>';
					echo '<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>';					
					echo '<h1 class="gdl-page-title gdl-title title-color">';
					echo get_the_title();
					echo '</h1>';
					//if( !empty($caption) ){
					//	echo '<div class="gdl-page-caption">' . $caption . '</div>';
					//}else{
					//	echo '<div class="gdl-page-caption">' .  $translator_port_caption . '</div>';
					//}
					echo '</div>';			
					
					// Inside Thumbnail
					$inside_thumbnail_type = get_post_meta($post->ID, 'post-option-inside-thumbnail-types', true);
					
					switch($inside_thumbnail_type){
					
						case "Image" : 
						
							$thumbnail_id = get_post_meta($post->ID,'post-option-inside-thumbnial-image', true);
							$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
							$thumbnail_full = wp_get_attachment_image_src( $thumbnail_id , 'full' );
							$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
							
							if( !empty($thumbnail) ){
								echo '<div class="blog-thumbnail-wrapper">';
								echo '<div class="blog-thumbnail-image">';
								echo '<a href="' . $thumbnail_full[0] . '" data-rel="prettyPhoto" title="' . get_the_title() . '" ><img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/></a>'; 
								echo '</div>';

								/* MaKa */
								/*echo '<div class="blog-thumbnail-inner-info">';					
								$client_name = get_post_meta($post->ID, 'post-option-clients-name', true);
								if(!empty($client_name)){
									$client_head = $translator_client;
									echo '<div class="single-port-client"><span class="head">' . $client_head . ': </span>' . $client_name . '</div>';
								}
								
								
								$portfolio_tag = get_the_term_list( $post->ID, 'portfolio-tag', '', ', ' , '' );
								if(!empty($portfolio_tag)){
								echo '<div class="single-port-tag"><span class="head">' . __('Tags: ','gdl_front_end') . '</span>';
								echo $portfolio_tag;
								echo '</div>';
								}
								
								$website_link = get_post_meta( $post->ID, 'post-option-website-url', true); 
								if(!empty($website_link)){
									$visit_site_head = $translator_visit_website;
									echo '<div class="single-port-visit-website"><a target="_blank" href="' . $website_link . '">' . $visit_site_head . '</a></div>';
								}		
								echo '</div>'; */ //blog-thumbnail-inner-info 			
								echo '</div>'; // blog-thumbnail-wrapper
							}
							break;
							
						case "Video" : 
						
							$video_link = get_post_meta($post->ID,'post-option-inside-thumbnail-video', true);
							echo '<div class="blog-thumbnail-video">';
							echo get_video($video_link, gdl_get_width($item_size), gdl_get_height($item_size));
							echo '</div>';							
							break;
							
						case "Slider" : 
						
							$slider_xml = get_post_meta( $post->ID, 'post-option-inside-thumbnail-xml', true); 
							$slider_xml_dom = new DOMDocument();
							$slider_xml_dom->loadXML($slider_xml);
							
							echo '<div class="blog-thumbnail-slider">';
							echo print_flex_slider($slider_xml_dom->documentElement, $item_size);
							echo '</div>';					
							break;
							
					}
					
					echo "<div class='clear'></div>";
					
					echo "<div class='blog-thumbnail-context'>";

					echo '<h1 class="single-thumbnail-title post-title-color gdl-title">';
					echo '<a href="' . get_permalink() . '">';
					if( !empty( $header ) ){
						echo $header;
					}else{
						echo $translator_port_header;
					}
					echo '</a>';
					echo '</h1>';
					
					echo "<div class='single-content'>";
					echo the_content();
					wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'gdl_front_end' ) . '</span>', 'after' => '</div>' ) );
					echo "</div>";
					
					echo '<div class="clear"></div>';
					
					// Include Social Shares
					if(get_post_meta($post->ID, 'post-option-social-enabled', true) == "Yes"){
						echo "<div class='social-share-title gdl-link-title gdl-title'>";
						echo $translator_social_share;
						echo "</div>";
						include_social_shares();
						echo "<div class='clear'></div>";
					}
					
					echo '</div>'; // blog-thumbnail-context				
					
				}else{
				
					// Single header
					$caption = get_post_meta($post->ID, 'post-option-caption', true);
					$header = get_post_meta($post->ID, 'post-option-header', true);
					echo '<div class="gdl-page-header-area">';
					echo '<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>';
					echo '<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>';					
					echo '<h1 class="gdl-page-title gdl-title title-color">';
					if( !empty( $header ) ){
						echo $header;
					}else{
						echo $translator_port_header;
					}
					echo '</h1>';
					if( !empty($caption) ){
						echo '<div class="gdl-page-caption">' . $caption . '</div>';
					}else{
						echo '<div class="gdl-page-caption">' .  $translator_port_caption . '</div>';
					}
					echo '</div>';			
					
					// Inside Thumbnail
					$inside_thumbnail_type = get_post_meta($post->ID, 'post-option-inside-thumbnail-types', true);
					
					switch($inside_thumbnail_type){
					
						case "Image" : 
						
							$thumbnail_id = get_post_meta($post->ID,'post-option-inside-thumbnial-image', true);
							$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '720x420' ); /* 660 x 320 */
							$thumbnail_full = wp_get_attachment_image_src( $thumbnail_id , 'full' );
							$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
							
							if( !empty($thumbnail) ){
								echo '<div class="blog-thumbnail-wrapper">';
								echo '<div class="blog-thumbnail-image">';
								echo '<a href="' . $thumbnail_full[0] . '" data-rel="prettyPhoto" title="' . get_the_title() . '" ><img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/></a>'; 
								echo '</div>';

								echo '<div class="blog-thumbnail-inner-info">';					
								echo '<div class="blog-thumbnail-date">' . get_the_time( GDL_DATE_FORMAT ) . '</div>';		
								echo '<div class="blog-thumbnail-author"> ' . __('by','gdl_front_end') . ' ' . get_the_author_link() . '</div>';				
								the_tags('<div class="blog-thumbnail-tag">', ', ', '</div>');		
								echo '<div class="blog-thumbnail-comment">';
								comments_popup_link( __('0','gdl_front_end'),
									__('1','gdl_front_end'),
									__('%','gdl_front_end'), '',
									__('Comments are off','gdl_front_end') );
								echo '</div>';				
								echo '</div>';//blog-thumbnail-inner-info			
								echo '</div>'; // blog-thumbnail-wrapper
							}
							break;
							
						case "Video" : 
						
							$video_link = get_post_meta($post->ID,'post-option-inside-thumbnail-video', true);
							echo '<div class="blog-thumbnail-video">';
							echo get_video($video_link, gdl_get_width($item_size), gdl_get_height($item_size));
							echo '</div>';							
							break;
							
						case "Slider" : 
						
							$slider_xml = get_post_meta( $post->ID, 'post-option-inside-thumbnail-xml', true); 
							$slider_xml_dom = new DOMDocument();
							$slider_xml_dom->loadXML($slider_xml);
							
							echo '<div class="blog-thumbnail-slider">';
							echo print_flex_slider($slider_xml_dom->documentElement, $item_size);
							echo '</div>';					
							break;
							
					}
					
					echo "<div class='clear'></div>";
					
					echo "<div class='blog-thumbnail-context'>";

					echo '<h1 class="single-thumbnail-title post-title-color gdl-title">';
					echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
					echo '</h1>';
					
					echo "<div class='single-content'>";
					echo the_content();
					wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'gdl_front_end' ) . '</span>', 'after' => '</div>' ) );
					echo "</div>";
					
					echo '<div class="clear"></div>';
					
					// About Author
					if(get_post_meta($post->ID, 'post-option-author-info-enabled', true) == "Yes"){
						echo "<div class='about-author-wrapper'>";
						echo "<div class='about-author-avartar'>" . get_avatar( get_the_author_meta('ID'), 90 ) . "</div>";
						echo "<div class='about-author-info'>";
						echo "<div class='about-author-title gdl-link-title gdl-title'>" . $translator_about_author . "</div>";
						echo get_the_author_meta('description');
						echo "</div>";
						echo "<div class='clear'></div>";
						echo "</div>";
					}
					
					// Include Social Shares
					if(get_post_meta($post->ID, 'post-option-social-enabled', true) == "Yes"){
						echo "<div class='social-share-title gdl-link-title gdl-title'>";
						echo $translator_social_share;
						echo "</div>";
						include_social_shares();
						echo "<div class='clear'></div>";
					}
				
					echo '<div class="comment-wrapper">';
					comments_template(); 
					echo '</div>';
					
					echo '</div>'; // blog-thumbnail-context			
				
				}
			}
		}
	?>

<?php get_footer(); ?>
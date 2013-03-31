<?php get_header(); ?>

<?php
	// Translator words
	if( $gdl_admin_translator == 'enable' ){
		$translator_blog_header = get_option(THEME_SHORT_NAME.'_translator_blog_header', 'Blog');
		$translator_blog_caption = get_option(THEME_SHORT_NAME.'_translator_blog_caption', 'Default blog caption');
		$translator_about_author = get_option(THEME_SHORT_NAME.'_translator_about_author', 'About the Author');
		$translator_social_share = get_option(THEME_SHORT_NAME.'_translator_social_shares', 'Social Share');
	}else{
		$translator_blog_header = __('Blog','gdl_front_end');
		$translator_blog_caption = __('Default blog caption','gdl_front_end');
		$translator_about_author = __('About the Author','gdl_front_end');
		$translator_social_share = __('Social Share','gdl_front_end');
	}

	if ( have_posts() ){
		while (have_posts()){
			the_post();
			
			// Single header
			$header = get_post_meta($post->ID, 'post-option-header', true);
			$caption = get_post_meta($post->ID, 'post-option-caption', true);
			echo '<div class="gdl-page-header-area" id="gdl-page-header-area" >';
			echo '<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>';
			echo '<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>';			
			echo '<h1 class="gdl-page-title gdl-title title-color">';
			if( !empty( $header ) ){
				echo $header;
			}else{
				echo $translator_blog_header;
			}
			echo '</h1>';
			if( !empty($caption) ){
				echo '<div class="gdl-page-caption">' . $caption . '</div>';
			}else{
				echo '<div class="gdl-page-caption">' . $translator_blog_caption . '</div>';
			}
			echo '</div>';			
			
			// Inside Thumbnail
			$item_size = '720x420'; /* MaKa 660x320 */
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

?>
		
<?php get_footer(); ?>
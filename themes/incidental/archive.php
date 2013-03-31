<?php get_header(); ?>

<div class="archive-wrapper">
	<?php	
		// print header
		echo '<div class="gdl-page-header-area" id="gdl-page-header-area" >';
		echo '<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>';
		echo '<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>';			
		echo '<h1 class="gdl-page-title gdl-title title-color">';
		if( is_category() || is_tax('portfolio-category') ){
			_e('Category','gdl_front_end');
		}else if( is_tag() || is_tax('portfolio-tag') ){
			_e('Tag','gdl_front_end');
		}else if( is_day() ){
			_e('Day','gdl_front_end');
		}else if( is_month() ){
			_e('Month','gdl_front_end');
		}else if( is_year() ){
			_e('Year','gdl_front_end');
		}
		echo '</h1>';
		echo '<div class="gdl-page-caption">';
		if(is_category() || is_tag() || is_tax('portfolio-category') || is_tax('portfolio-tag') ){
			echo single_cat_title('', false);
		}else if( is_day() ){
			echo get_the_date( 'F j, Y' );
		}else if( is_month() ){
			echo get_the_date( 'F Y' );
		}else if( is_year() ){
			echo get_the_date( 'Y' );
		}		
		echo '</div>';
		echo '</div>';	
		
		if( is_tax('portfolio-tag') || is_tax('portfolio-category') ){
			$portfolio_size = get_option(THEME_SHORT_NAME.'_search_archive_portfolio_size', '1/2');
			$show_title = get_option(THEME_SHORT_NAME.'_search_archive_portfolio_show_title', 'Yes');
			$show_tag = get_option(THEME_SHORT_NAME.'_search_archive_portfolio_show_tag', 'Yes');
			
			global $port_div_size_num_class;
			$item_class = $port_div_size_num_class[$portfolio_size]['class'];
			$item_size = $port_div_size_num_class[$portfolio_size]['size'];			
			
			echo '<div id="portfolio-item-holder" class="portfolio-item-holder">';
			while( have_posts() ){
				
				the_post();
						
				// start printing data
				echo '<div class="' . $item_class . ' mb0 portfolio-item">'; 

				$thumbnail_types = get_post_meta( $post->ID, 'post-option-thumbnail-types', true);
				
				if( $thumbnail_types == "Image" ){
					
					$image_type = get_post_meta( $post->ID, 'post-option-featured-image-type', true);
					$image_type = empty($image_type)? "Link to Current Post": $image_type; 
					$thumbnail_id = get_post_thumbnail_id();
					$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
					$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
					
					if( $image_type == "Link to Current Post" ){
						$hover_thumb = "hover-link";
						$pretty_photo = "";
						$permalink = get_permalink();
					}else if( $image_type == "Link to URL"){
						$hover_thumb = "hover-link";
						$pretty_photo = "";
						$permalink = __(get_post_meta( $post->ID, 'post-option-featured-image-url', true ), 'gdl_front_end');
					}else if( $image_type == "Lightbox to Current Thumbnail" ){	
						$hover_thumb = "hover-zoom";
						$pretty_photo = ' data-rel="prettyPhoto" ';
						$permalink = wp_get_attachment_image_src( $thumbnail_id, 'full' );
						$permalink = $permalink[0];
					}else if( $image_type == "Lightbox to Picture" ){
						$hover_thumb = "hover-zoom";
						$pretty_photo = ' data-rel="prettyPhoto" ';
						$permalink = __(get_post_meta( $post->ID, 'post-option-featured-image-url', true ), 'gdl_front_end');	
						$permalink = $permalink;
					}else{
						$hover_thumb = "hover-video";
						$pretty_photo = ' data-rel="prettyPhoto" ';
						$permalink = __(get_post_meta( $post->ID, 'post-option-featured-image-url', true ), 'gdl_front_end');	
						$permalink = $permalink;				
					}
					
					if( !empty($thumbnail[0]) ){
						echo '<div class="portfolio-thumbnail-image">';
						echo '<div class="overflow-hidden">';
						echo '<a href="' . $permalink . '" ' . $pretty_photo . ' title="' . get_the_title() . '">';
						echo '<span class="portfolio-thumbnail-image-hover">';
						echo '<span class="' . $hover_thumb . '"></span>';
						echo '</span>';
						echo '</a>';
						echo '<img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
						echo '</div>'; //overflow hidden
						echo '</div>'; //portfolio thumbnail image						
					}
					
				
				}else if( $thumbnail_types == "Video" ){
					
					$video_link = get_post_meta( $post->ID, 'post-option-thumbnail-video', true); 
					echo '<div class="portfolio-thumbnail-video">';
					echo get_video($video_link, gdl_get_width($item_size), gdl_get_height($item_size));
					echo '</div>';
				
				}else if ( $thumbnail_types == "Slider" ){

					$slider_xml = get_post_meta( $post->ID, 'post-option-thumbnail-xml', true); 
					$slider_xml_dom = new DOMDocument();
					$slider_xml_dom->loadXML($slider_xml);
					
					echo '<div class="portfolio-thumbnail-slider">';
					echo print_flex_slider($slider_xml_dom->documentElement, $item_size);
					echo '</div>';			
				
				}
				
				
				if( $show_title == "Yes" || $show_tag == "Yes" ){
					echo '<div class="portfolio-thumbnail-context">';
					// portfolio title
					if( $show_title == "Yes" ){
						echo '<h2 class="portfolio-thumbnail-title port-title-color gdl-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
					}
					// portfolio excerpt
					if( $show_tag == "Yes" ){			
						$portfolio_tag = get_the_term_list( $post->ID, 'portfolio-tag', '', ', ' , '' );
						echo '<div class="portfolio-thumbnail-tag">' . $portfolio_tag . '</div>';
					}
					echo '</div>';
				}
				
				echo '</div>';
				
			}
			echo "</div>";			
		
		}else{
			$item_type = get_option(THEME_SHORT_NAME.'_search_archive_item_size', '1/1 Full Thumbnail');
			$num_excerpt = get_option(THEME_SHORT_NAME.'_search_archive_num_excerpt', 430);
			$full_content = get_option(THEME_SHORT_NAME.'_search_archive_full_blog_content', 'No');

			global $blog_div_size_num_class;
			$item_class = $blog_div_size_num_class[$item_type]['class'];
			$item_index = $blog_div_size_num_class[$item_type]['index'];
			$item_size = $blog_div_size_num_class[$item_type]['size'];
			
			echo '<div id="blog-item-holder" class="blog-item-holder">';
			
			if( $item_type == '1/1 Full Thumbnail' ){	
				print_blog_full($item_class, $item_size, $item_index, $num_excerpt, $full_content);
			}else if( $item_type == '1/1 Medium Thumbnail' ){
				print_blog_medium($item_class, $item_size, $item_index, $num_excerpt);
			}
				
			echo '</div>'; // blog-item-holder
		}
		echo '<div class="clear"></div>';
		
		pagination();
	?>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>

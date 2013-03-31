<?php get_header(); ?>
	
<?php
	// Page title and content
	while (have_posts()){ the_post(); 
		
		$caption = get_post_meta($post->ID, 'page-option-caption', true);
		echo '<div class="gdl-page-header-area" id="gdl-page-header-area">';
		echo '<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>';
		echo '<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>';
		echo '<h1 class="gdl-page-title gdl-title title-color">';
		the_title();
		echo '</h1>';
		if( !empty($caption) ){
			echo '<div class="gdl-page-caption">' . $caption . '</div>';
		}
		echo '</div>';
		
		$content = get_the_content();
		if( !empty( $content ) ){
			echo '<div class="gdl-page-content">';
			the_content();
			wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'gdl_front_end' ) . '</span>', 'after' => '</div>' ) );
			echo '</div>';
		}
		
	}

	global $gdl_item_row_size;
	$gdl_item_row_size = 0;
	// Page Item Part
	if(!empty($gdl_page_xml)){
		$page_xml_val = new DOMDocument();
		$page_xml_val->loadXML($gdl_page_xml);
		foreach( $page_xml_val->documentElement->childNodes as $item_xml){
			switch($item_xml->nodeName){
				case 'Accordion' :
					print_item_size(find_xml_value($item_xml, 'size'));
					print_accordion_item($item_xml);
					break;
				case 'Blog' :
					print_item_size(find_xml_value($item_xml, 'size'), 'wrapper mt0');
					print_blog_item($item_xml);
					break;
				case 'Contact-Form' :
					print_item_size(find_xml_value($item_xml, 'size'));
					print_contact_form($item_xml);
					break;
				case 'Column':
					print_item_size(find_xml_value($item_xml, 'size'));
					print_column_item($item_xml);
					break;
				case 'Divider' :
					print_item_size(find_xml_value($item_xml, 'size'));
					print_divider($item_xml);
					break;
				case 'Gallery' :
					print_item_size(find_xml_value($item_xml, 'size'), 'wrapper');
					print_gallery_item($item_xml);
					break;								
				case 'Message-Box' :
					print_item_size(find_xml_value($item_xml, 'size'));
					print_message_box($item_xml);
					break;
				case 'Page':
					print_item_size(find_xml_value($item_xml, 'size'), 'wrapper gdl-portfolio-item');
					print_page_item($item_xml);
					break;
				case 'Price-Item':
					print_item_size(find_xml_value($item_xml, 'size'), 'gdl-price-item');
					print_price_item($item_xml);
					break;
				case 'Portfolio' :
					print_item_size(find_xml_value($item_xml, 'size'), 'wrapper gdl-portfolio-item');
					print_portfolio($item_xml);
					break;
				case 'Slider' : 
					print_item_size(find_xml_value($item_xml, 'size'));
					print_slider_item($item_xml);
					break;
				case 'Stunning-Text' :
					print_item_size(find_xml_value($item_xml, 'size'));
					print_stunning_text($item_xml);
					break;
				case 'Tab' :
					print_item_size(find_xml_value($item_xml, 'size'));
					print_tab_item($item_xml);
					break;
				case 'Testimonial' :
					print_item_size(find_xml_value($item_xml, 'size'), 'wrapper mb0');
					print_testimonial($item_xml);
					break;
				case 'Toggle-Box' :
					print_item_size(find_xml_value($item_xml, 'size'));
					print_toggle_box_item($item_xml);
					break;
				default: 
					print_item_size(find_xml_value($item_xml, 'size'));
					break;
			}
			echo "</div>";
		}
	}
?>
	
<?php get_footer(); ?>
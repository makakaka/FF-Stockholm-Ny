<?php get_header(); ?>

<div class="archive-wrapper">
	<?php	
		// print header
		echo '<div class="gdl-page-header-area" id="gdl-page-header-area" >';
		echo '<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>';
		echo '<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>';			
		echo '<h1 class="gdl-page-title gdl-title title-color">';
		_e('Search', 'gdl_front_end');
		echo '</h1>';
		echo '<div class="gdl-page-caption">';
		the_search_query();	
		echo '</div>';
		echo '</div>';	
		
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
		echo '<div class="clear"></div>';
		
		pagination();
	?>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>

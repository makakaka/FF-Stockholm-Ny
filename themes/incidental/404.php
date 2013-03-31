<?php 
/**
 * 404 ( Not fount page )
 */
get_header();

global $gdl_admin_translator;
if( $gdl_admin_translator == 'enable' ){
	$translator_404_title = get_option(THEME_SHORT_NAME.'_404_title', 'Sorry');
	$translator_404_content = get_option(THEME_SHORT_NAME.'_404_content', 'The page you are finding seem doesn\'t exist.');
}else{
	$translator_404_title = __('Sorry','gdl_front_end');		
	$translator_404_content = __('The page you are finding seem doesn\'t exist.','gdl_front_end');
}	

?>

	<div class="gdl-page-content pt20">
		<div class="message-box-wrapper red">
			<div class="message-box-title">
				<?php echo $translator_404_title; ?>
			</div>
			<div class="message-box-content">
				<?php echo $translator_404_content; ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>

<?php get_footer();?>
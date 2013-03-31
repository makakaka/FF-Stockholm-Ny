<?php global $gdl_page_slider_thumbnail, $gdl_page_slider_nav, $gdl_page_content_area, $gdl_page_first_stage; ?>

				<div class="clear gdl-clear-bottom"></div>
				</div> <!-- gdl-inner-page-item -->
			</div> <!-- gdl-page-item -->			
			<div class="clear"></div>
		</div> <!-- page-wrapper -->
	</div> <!-- content-wrapper -->
</div> <!-- container -->

<?php
	$hide_thumbnail = '';
	if( $gdl_page_first_stage == 'Content' ){ 
		$hide_thumbnail = " style='display: none;' "; 
		$active_content = "active";
	} 
?>


	<div class="supersized-caption-wrapper" id="supersized-caption-wrapper" <?php echo $hide_thumbnail; ?> >
		<?php if( $gdl_page_slider_nav ){ ?>
		<div class="supersized-navigation">
			<div id="prevslide"></div>
			<div id="nextslide"></div>
		</div>
		<div class="clear"></div>
		<?php } ?>
		<div class="supersized-caption-description">
			<div id="slidecaption" class="gdl-slider-title"></div>
			<div id="slidecaption2" class="gdl-slider-caption"></div>
		</div>
	</div>


<div class="gdl-style-switch-wrapper">
	<?php if( $gdl_page_slider_thumbnail ){ ?>
		<div class="supersized-thumbnail-wrapper" id="supersized-thumbnail-wrapper" <?php echo $hide_thumbnail; ?> >
			<div id="thumb-back"></div>
			<div id="thumb-tray"></div>
			<div id="thumb-forward"></div>
			<div class="clear"></div>
		</div>
	<?php } ?>
	
	<?php if( (($gdl_page_slider_thumbnail || $gdl_page_slider_nav) && $gdl_page_content_area != 'Off' ) || $gdl_page_content_area == 'On-Off' ){ ?>
		<div class="gdl-style-switch <?php echo $active_content; ?>" id="gdl-style-switch" style="background-color: #fff;"></div>
	<?php } ?>
</div>

	
<?php wp_footer(); ?>

<script type="text/javascript"> 	
	<?php include ( SERVER_PATH . "/javascript/cufon-replace.php" ); ?>
	<?php include ( SERVER_PATH . "/javascript/supersized.php" ); ?>	
	
	<?php
		$enable_right_click = get_option(THEME_SHORT_NAME.'_disable_right_click','disable');
		$right_click_text = get_option(THEME_SHORT_NAME.'_right_click_alert','');
	?>
	<?php if( $enable_right_click == 'enable' ){ ?>
    jQuery(function() {
		jQuery(this).bind("contextmenu", function(e) {
			<?php if( !empty($right_click_text) ){ ?>
				alert("<?php echo $right_click_text ?>");
				e.preventDefault();
			<?php }else{ ?>
				e.preventDefault();
			<?php } ?>
		});
    }); 
	<?php } ?>
</script>
</body>
</html>
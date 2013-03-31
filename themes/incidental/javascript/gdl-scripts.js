var gdl_first = true;
var page_header_area = jQuery('#gdl-page-header-area');

var wp_offset = jQuery('html').filter(':first').offset().top;
var my_window = jQuery(window);
var header_wrapper = jQuery('#header-wrapper');
var content_wrapper = jQuery('#gdl-inner-page-item');

var gdl_page_item = jQuery("#gdl-page-item");
var gdl_thumbnail_wrapper = jQuery("#supersized-thumbnail-wrapper");
var gdl_caption_wrapper = jQuery('#supersized-caption-wrapper');
	
function set_page_header(){
	var temp_height = page_header_area.children('h1').height();
	var temp_width = page_header_area.width() - page_header_area.children('h1').width() - 0;
	
	if( temp_width > 0 ){ 
		page_header_area.children('.gdl-header-gimmick').css({ 'width': temp_width / 2, 'height': temp_height});
	}else{
		page_header_area.children('.gdl-header-gimmick').css({ 'width': '0px'});
	}
}
function set_screen_height(){
	/* MaKa */
	var new_height_maka = my_window.height() - 100;
	header_wrapper.css( 'min-height', new_height_maka );
	header_wrapper.parent().css( 'min-height', new_height_maka );
 	if( content_wrapper.height() <= header_wrapper.height() ){
		//content_wrapper.css('min-height', header_wrapper.height())
	}else{
		//content_wrapper.css('min-height', my_window.height());
	 }
	
	// mobile version
	if( my_window.width() < 767 ){
		gdl_page_item.css('min-height', my_window.height());
	// if not mobile
	}else{
		gdl_page_item.css('min-height', 0);
	}		
}

/* MaKa */
function sticky_koll(){
	/* Maka */
	// Sticky window 
	var left_sidebar = jQuery('.gdl-left-sidebar.four.columns');
	var stickyTop = header_wrapper.offset().top; // returns number  
   	var windowTop = my_window.scrollTop(); // returns number
   	if (stickyTop < windowTop) {
      	left_sidebar.css({ position: 'fixed', top: 0 });
    	//alert("1");
    }
    else {
   		left_sidebar.css('position','static');
    	//alert("2");
    }
} 

function left_scroll_position(){
/* MaKa */	
	if( (my_window.scrollTop() + (my_window.height() - wp_offset)) > header_wrapper.height() ){
		header_wrapper.css('position','relative');
		header_wrapper.parent().css('position','relative');	
		//header_wrapper.css('position','fixed'); 
		//header_wrapper.parent().css('position','fixed');
	}else{
		header_wrapper.css('position','relative');
		header_wrapper.parent().css('position','relative');
	}
}


jQuery(document).ready(function(){

	// Menu Navigation
	jQuery('#main-superfish-wrapper ul.sf-menu').supersubs({
		minWidth: 14.5,
		maxWidth: 27,
		extraWidth: 1
	}).superfish({
		delay: 100,
		speed: 'fast',
		animation: {opacity:'show',height:'show'}
	});
	
	// Accordion
	jQuery("ul.gdl-accordion li").each(function(){
		if(jQuery(this).index() > 0){
			jQuery(this).children(".accordion-content").css('display','none');
		}else{
			jQuery(this).find(".accordion-head-image").addClass('active');
		}
		
		jQuery(this).children(".accordion-head").bind("click", function(){
			jQuery(this).children().addClass(function(){
				if(jQuery(this).hasClass("active")) return "";
				return "active";
			});
			jQuery(this).siblings(".accordion-content").slideDown();
			jQuery(this).parent().siblings("li").children(".accordion-content").slideUp();
			jQuery(this).parent().siblings("li").find(".active").removeClass("active");
		});
	});
	
	// Toggle Box
	jQuery("ul.gdl-toggle-box li").each(function(){
		jQuery(this).children(".toggle-box-content").not(".active").css('display','none');
		
		jQuery(this).children(".toggle-box-head").bind("click", function(){
			jQuery(this).children().addClass(function(){
				if(jQuery(this).hasClass("active")){
					jQuery(this).removeClass("active");
					return "";
				}
				return "active";
			});
			jQuery(this).siblings(".toggle-box-content").slideToggle();
		});
	});
	
	// Social Hover
	jQuery(".social-icon").hover(function(){
		jQuery(this).animate({ opacity: 1 }, 150);
	}, function(){
		jQuery(this).animate({ opacity: 0.55 }, 150);
	});
	
	// Scroll Top
	jQuery('div.scroll-top').click(function() {
		  jQuery('html, body').animate({ scrollTop:0 }, { duration: 600, easing: "easeOutExpo"});
		  return false;
	});
	
	// Blog Hover
	jQuery(".blog-thumbnail-image img").hover(function(){
		jQuery(this).animate({ opacity: 0.55 }, 150);
	}, function(){
		jQuery(this).animate({ opacity: 1 }, 150);
	});
	
	// Gallery Hover
	jQuery(".gallery-thumbnail-image img").hover(function(){
		jQuery(this).animate({ opacity: 0.55 }, 150);
	}, function(){
		jQuery(this).animate({ opacity: 1 }, 150);
	});
	
	// Port Hover
	jQuery("#portfolio-item-holder .portfolio-thumbnail-image-hover").hover(function(){
		jQuery(this).animate({ opacity: 1 }, 400, 'easeOutExpo');
	}, function(){
		jQuery(this).animate({ opacity: 0 }, 400, 'easeInExpo');
	});
	
	// Price Table
	jQuery(".gdl-price-item").each(function(){
		var max_height = 0;
		jQuery(this).find('.price-item').each(function(){
			if( max_height < jQuery(this).height()){
				max_height = jQuery(this).height();
			}
		});
		jQuery(this).find('.price-item').height(max_height);
		
	});
	
	// Incidental Container	
	set_screen_height();
	left_scroll_position();				
		// mobile version
		if( my_window.width() < 981 ){ /* 767 gamla värdet nexus 4 980 */
			// do nothing
		// if not mobile
		}else{
			sticky_koll(); /* MaKa */
		}	
		
	my_window.resize(function(){
		set_screen_height();
		set_page_header();
		left_scroll_position();
	});
	my_window.scroll(function(){
		left_scroll_position();
			
		// mobile version
		if( my_window.width() < 767 ){
			// do nothing
		// if not mobile
		}else{
			sticky_koll(); /* MaKa */
		}	
		//sticky_koll(); /* MaKa */
	});
	

	// Style switch
	jQuery('#gdl-style-switch').click(function(){
		// content off
		if( jQuery(this).hasClass('active') ){
			gdl_caption_wrapper.fadeIn();
			gdl_thumbnail_wrapper.fadeIn();
			
			// mobile version
			if( my_window.width() < 767 ){
				content_wrapper.fadeOut(function(){
					jQuery(this).css('margin-left', '-100%');
				});
			// if not mobile
			}else{
				content_wrapper.animate({'margin-left': '-100%'}, 600, 'easeOutExpo', function(){
					jQuery(this).css('display', 'none');
				});
			}
			
			jQuery(this).animate({'opacity': '1'}, function(){
				jQuery(this).removeClass('active');
			});
			
		// content on
		}else{
			gdl_caption_wrapper.fadeOut();
			gdl_thumbnail_wrapper.fadeOut();
			
			// mobile version
			if( my_window.width() < 767 ){
				content_wrapper.css('margin-left', '0%');
				content_wrapper.fadeIn();
				
			// if not mobile
			}else{
				content_wrapper.css('display', 'block');
				content_wrapper.animate({'margin-left' : '0%'}, 600, 'easeOutExpo');
			}
			
			jQuery(this).animate({'opacity': '1'}, function(){
				jQuery(this).addClass('active');
			});
			
		}
		
		if( gdl_first ){ jQuery(window).trigger('resize'); }
		
		gdl_first = false;
	});
	
});

/* Tabs Activiation
================================================== */
jQuery(document).ready(function() {

	var tabs = jQuery('ul.tabs');

	tabs.each(function(i) {

		//Get all tabs
		var tab = jQuery(this).find('> li > a');
		var tab_content = jQuery(this).next('ul.tabs-content')
		tab.click(function(e) {

			//Get Location of tab's content
			var contentLocation = jQuery(this).attr('data-href');
			
			//Let go if not a hashed one
			if(typeof( contentLocation ) != 'undefined') {

				e.preventDefault();

				//Make Tab Active
				tab.removeClass('active');
				jQuery(this).addClass('active');

				//Show Tab Content & add active class
				tab_content.children('li[data-href='+ contentLocation +']').fadeIn(200).addClass('active').siblings().hide().removeClass('active');

			}
		});
	});
});

/* Equal Height Function
================================================== */
(function($) {
	$.fn.equalHeights = function(px) {
		$(this).each(function(){
			var currentTallest = 0;
			$(this).children().each(function(i){
				if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
			});
			$(this).children().css({'height': currentTallest}); 
		});
		return this;
	};
})(jQuery);

jQuery(window).load(function(){
	
	// Set Page Header Gimmick
	set_page_header();
	set_screen_height();
	
	jQuery(window).resize(function(){
		set_page_header();
	});
	
	// Set Portfolio Max Height
	var port_item_holder = jQuery('div#portfolio-item-holder');
	port_item_holder.equalHeights();
	jQuery(window).resize(function(){
		port_item_holder.children().css('height','auto');
		port_item_holder.equalHeights();
	});

});
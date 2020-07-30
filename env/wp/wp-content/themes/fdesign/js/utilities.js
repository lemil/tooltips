(function($) {

	"use strict";

	$( document ).ready(function() {

		if ($('#wpadminbar').length > 0) {
		
			$('#header-main-fixed').css('top', $('#wpadminbar').height() + 'px');
			$('#wpadminbar').css('position', 'fixed');
		}

		$('#header-spacer').height( $('#header-main-fixed').height() );

		$(window).scroll(function () {

			if ($(this).scrollTop() > 100) {

				$('.scrollup').fadeIn();

			} else {

				$('.scrollup').fadeOut();

			}
		});

		$('.scrollup').click(function () {
			
			$("html, body").animate({
				  scrollTop: 0
			  }, 600);

			return false;
		});

		fdesign_mainMenuInit();

		if ( $(window).width() < 800 ) {
		
			$('#navmain > div > ul > li').each(
		       function() {
		         if ($(this).find('> ul.sub-menu').length > 0) {

		           $(this).prepend('<span class="sub-menu-item-toggle"></span>');
		         }
		       }
		     );

		   $('.sub-menu-item-toggle').on('click', function(e) {

		     e.stopPropagation();

		     var subMenu = $(this).parent().find('> ul.sub-menu');

		     $('#navmain ul ul.sub-menu').not(subMenu).hide();
		     $(this).toggleClass('sub-menu-item-toggle-expanded');
		     subMenu.toggle();
		     subMenu.find('ul.sub-menu').toggle();
		   });

		}

		$('#navmain > div').on('click', function(e) {

			e.stopPropagation();

			// toggle main menu
			if ( $(window).width() < 800 ) {

				var parentOffset = $(this).parent().offset(); 
				
				var relY = e.pageY - parentOffset.top;
			
				if (relY < 36) {
				
					$('ul:first-child', this).toggle(400).parent().toggleClass('mobile-menu-expanded');
				}
			}
		});

		// re-init main menu on screen resize
		$(window).resize(function () {
	       
	    	fdesign_mainMenuClear();
	    	fdesign_mainMenuInit();
		});

		var unslider = $( '.slider' ).unslider({
						speed: 500,               //  The speed to animate each slide (in milliseconds)
						delay: 3000,              //  The delay between slide animations (in milliseconds)
						complete: function() {},  //  A function that gets called after every slide animation
						keys: true,               //  Enable keyboard (left, right) arrow shortcuts
						dots: true,               //  Display dot navigation
						fluid: true              //  Support responsive design. May break non-responsive designs
					});
	
		$('.unslider-arrow').click(function() {
				var fn = this.className.split(' ')[1];
			
				//  Either do unslider.data('unslider').next() or .prev() depending on the className
				unslider.data('unslider')[fn]();
				
				unslider.data('unslider').stop();
		});
	});

	function fdesign_mainMenuClear() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').removeClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').removeClass('level-two-sub-menu');										
		}

		if ( $('ul:first-child', $('#navmain > div') ).is( ":visible" ) ) {

			$('ul:first-child', $('#navmain > div') ).css('display', '');
		}
	}

	function fdesign_mainMenuInit() {

		if ( $(window).width() >= 800 ) {
		
			$('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
			$('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
		}
	}

})(jQuery);
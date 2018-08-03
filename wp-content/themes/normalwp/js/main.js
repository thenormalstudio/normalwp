(function($) {

	var scrollTimer = null;
	var resizeTimer = null;

	function isScrolledIntoView(elem) {
	    var $elem = $(elem);
	    var $window = $(window);

	    var docViewTop = $window.scrollTop();
	    var docViewBottom = docViewTop + $window.height();

	    var elemTop = $elem.offset().top;
	    var elemBottom = elemTop + $elem.height();

	    return ((elemTop <= docViewBottom) && (elemBottom >= docViewTop));
	}

	function showinfo() {
		$('.about').fadeIn('fast');
	}

	function hideinfo() {
		$('.about').fadeOut('fast');
	}

	function setVideo() {
		$(".video").each(function(){
			if(isScrolledIntoView($(this))){
				$(this).addClass("visible");
			} else {
				$(this).removeClass("visible");
			}
		});
	}

	$(document).ready( function() {
		setVideo();

		$('.opennav').on( "click", function() {
			showinfo();
		});

		$('.closenav').on( "click", function() {
			hideinfo();
		});

	});

	$(window).load(function(){
		setVideo();
	});

	$(window).resize(function(){
		// Timer increases RAM effiency
		// Resize actions are in handleResize()
	    if (resizeTimer) {
	        clearTimeout(resizeTimer);   // clear any previous pending timer
	    }
	    resizeTimer = setTimeout(setVideo, 25);   // set new timer

	});

	$(window).scroll(function(){
		// Timer increases RAM effiency
		// Resize actions are in handleScroll()

	    if (scrollTimer) {
	        clearTimeout(scrollTimer);   // clear any previous pending timer
	    }
	    scrollTimer = setTimeout(setVideo, 1);   // set new timer

	});

})(jQuery);

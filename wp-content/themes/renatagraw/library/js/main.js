jQuery(document).ready(function($){
	
	checkAspectRatios();
	$(window).resize(function(){checkAspectRatios()});
	
	var touchStartT = 0;
	var touchEndT = 0;
	var touchStartY = 0;
	var touchEndY = 0;
	var tapThresh = 225;
	var swipeThresh = 1;
	
	$(window).scroll(function(){
		$(".video").each(function(){
			if(isScrolledIntoView($(this))){
				$(this).addClass("visible");
			} else {
				$(this).removeClass("visible");
			}
		});
	});
	
	$(document).on("click", "body", function(e){
		console.log("click body");
		if(e.target.tagName.toLowerCase() !== 'a' && e.target.tagName.toLowerCase() !== 'svg'){
			$("#card").toggleClass("visible");
		}
	});

	$(document).on("touchstart", function(e){
		touchStartT = Date.now();
		touchStartY = e.originalEvent.touches[0].pageX;
	});
	
	$(document).on("touchend", function(e){
		console.log(e.target.tagName.toLowerCase());
		touchEndT = Date.now();
		touchEndY = e.originalEvent.pageX;
		if(touchEndT-touchStartT <= tapThresh && Math.abs(touchEndY-touchStartY) <= swipeThresh && e.target.tagName.toLowerCase() !== 'a' && e.target.tagName.toLowerCase() !== 'svg'){
			console.log("register tap");
			$("#card").toggleClass("visible");
		}
	});
	
	$(document).on("click tap", "a.to-info", function(e){
		console.log("click info");
		$("#card").toggleClass("visible");
		return false;
	});

	$(document).on("click tap", "a.to-top", function(e){
		console.log("click top");
		$("#card").removeClass("visible");
		$("body, html").animate({scrollTop: 0}, 1000);
		return false;
	});
	
	$(document).on("scroll", function(){
		if( $(window).scrollTop() >= $(window).height()*.5 ){
			$("#nav").addClass("visible");
		} else{
			$("#nav").removeClass("visible");			
		}
	});
		
	function checkAspectRatios(){
		$(".image").each(function(){
			var $img =  $(this).children("img").first();
			var imgRatio = $img.attr("width") / $img.attr("height");
			var winRatio = $(window).width() / $(window).height();
			var imgClass = "";
			if( imgRatio <= winRatio && imgRatio > 1 ) imgClass = "bg-cover";
			if( imgRatio > winRatio && imgRatio > 1 ) imgClass = "bg-cover";	
			if( imgRatio > winRatio && imgRatio <= 1 ) imgClass = "bg-cover";		
			if( imgRatio <= winRatio && imgRatio <= 1 ) imgClass = "bg-contain";		
			$(this).removeClass(function (index, css) {
			    return (css.match (/(^|\s)bg-\S+/g) || []).join(' ');
			}).addClass(imgClass);
		});		
	}

	function isScrolledIntoView(elem)
	{
	    var $elem = $(elem);
	    var $window = $(window);
	
	    var docViewTop = $window.scrollTop();
	    var docViewBottom = docViewTop + $window.height();
	
	    var elemTop = $elem.offset().top;
	    var elemBottom = elemTop + $elem.height();
	
	    return ((elemTop <= docViewBottom) && (elemBottom >= docViewTop));
	}

});


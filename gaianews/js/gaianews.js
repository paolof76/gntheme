var $j = jQuery.noConflict();

$j(document).ready(function(){
	
	////////// vertical scroller
	// VS init
  var firstImgSrc = $j('.primo_piano_vertical_slider > ul > li:first-child > img').attr('src');
  $j('.primo_piano_vertical_slider').prepend('<img src="'+firstImgSrc+'" width="450" class="current" />');
  $j('.primo_piano_vertical_slider').prepend('<img src="'+firstImgSrc+'" width="450" class="next" />'); 
	$j('.primo_piano_vertical_slider > ul > li:first-child').addClass('current');
	mainTitle = $j('.primo_piano_vertical_slider > ul > li:first-child .titolo_orig').html();
	mainLink = $j('.primo_piano_vertical_slider > ul > li:first-child .titolo').attr('rel');
	mainExrpt = $j('.primo_piano_vertical_slider > ul > li:first-child .excerpt').html();
	$j('.primo_piano_vertical_slider > a ').attr('href', mainLink);
	$j('.primo_piano_vertical_slider > a > .titolo').html(mainTitle);
	$j('.primo_piano_vertical_slider > a > .excerpt').html(mainExrpt);

	// VS news shift function
	function newsShift(currentObj,nextObj){
    currentObj.removeClass('current');
	  nextObj.addClass('current');
		var nextImgSrc = nextObj.children('img').attr('src');
		$j('.primo_piano_vertical_slider > img.next').attr('src', nextImgSrc);		
		$j('.primo_piano_vertical_slider > img.current').fadeOut(400, function () {
		  $j('.primo_piano_vertical_slider > img.current').attr('src', nextImgSrc);
		  $j('.primo_piano_vertical_slider > img.current').show();
		});
		mainTitle = nextObj.children('.titolo_orig').html();
		mainLink = nextObj.children('.titolo').attr('rel');
		mainExrpt = nextObj.children('.excerpt').html();
		$j('.primo_piano_vertical_slider > a ').attr('href', mainLink);
		$j('.primo_piano_vertical_slider > a > .titolo').html(mainTitle);
		$j('.primo_piano_vertical_slider > a > .excerpt').html(mainExrpt);
	}
	// VS news cycle function
	intervalFn = window.setInterval(sliderCycle, 5000);	
	function sliderCycle() { 
	  var currentObj = 	$j('.primo_piano_vertical_slider > ul > li.current');
		var nextObj;
		if (currentObj.next('li').length > 0) {
		  nextObj = $j('.primo_piano_vertical_slider > ul > li.current').next('li');
		} else {
		  nextObj = $j('.primo_piano_vertical_slider > ul > li:first-child');	
		}
		newsShift(currentObj,nextObj);		
	}
	// VS over
	$j('.primo_piano_vertical_slider').hover(
		function () {
			window.clearInterval(intervalFn);
		}, 
		function () {
	    intervalFn = window.setInterval(sliderCycle, 5000);	
		}
	);
	// VS news click
	$j('.primo_piano_vertical_slider > ul > li').click(
		function () {
	    var currentObj = 	$j('.primo_piano_vertical_slider > ul > li.current');
		  var nextObj = $j(this);			
      newsShift(currentObj,nextObj);			
		}
	);
														
	// flash news ticker
	$j('.flash_news').vTicker({
		speed: 500,
		pause: 3000,
		showItems: 5,
		animation: 'fade',
		mousePause: true,
		height: 0,
		direction: 'up'
	});
	
	// chosen
	$j('.col_dx ul.widgets li.ricerca_viaggi ul li select').chosen();
	$j('.chzn-search').hide();
})


var $j = jQuery.noConflict();
var $scroll = 0;
var logo_height;
var menu_dropdown_height_set = false;
var sticky_amount;

var min_w = 1500; // minimum video width allowed
var video_width_original = 1280;  // original video dimensions
var video_height_original = 720;
var vid_ratio = 1280/720;
var skrollr_slider;

var $window = $j(window),carousel_flexslider,portfolio_flexslider;

function getFullWidthSize() {
	return  (window.innerWidth <= 480) ? 1 :
			(window.innerWidth <= 768) ? 2 : 
			(window.innerWidth <= 1400) ? 3 : 4;
}

function getGridSize() {
	return	(window.innerWidth <= 480) ? 1 : 
			(window.innerWidth <= 1000) ? 3 : 5;
}

$j(document).ready(function() {
	"use strict";
		
	$j('.content').css('min-height',$j(window).height()-$j('header').height()-$j('footer').height()); 
	$j('.q_logo a').css('visibility','visible');
	initQodeSlider();
	initSideMenu();
	initToCounter();
	initCounter();
	initProgressBars();
	initListAnimation();
	initPieChart();
	initPieChartWithIcon();
	initServiceAnimation();
	initParallaxTitle();
	initParallax(parallax_speed);
	initNiceScroll();
	initSideAreaScroll();
	loadMore();
	prettyPhoto();
	initMobileMenu();
	initFlexSlider();
	fitVideo();
	initAccordion();
	initAccordionContentLink();
	initMessages();
	fitAudio();
	addPlaceholderSearchWidget();
	initProgressBarsIcon();
	initMoreFacts();
	socialShare();
	placeholderReplace();
	backButtonShowHide();
	backToTop();
	initSteps();
	initProgressBarsVertical();
	initElementsAnimation();
	initHashClick();
	checkAnchorOnScroll();
	initImageHover();
	initIconWithTextAnimation();
	initQodeCarousel();
	initPortfolioSlider();
	initVideoBackground();
	initCheckSafariBrowser();
	languageMenu();
	updateShoppingCart();
	ajaxSubmitCommentForm();

	if($j(window).width() > 1000){
		headerSize($scroll);
	}else{
		logoSizeOnSmallScreens();
	}
	// if($j('.centered_logo').length){
		// $j('.content').css('margin-top',-(header_height+logo_height+20)); //20 is top/bottom margin of logo wrapper
	// }
    
	$j([
		theme_root+'css/img/social_share_purple.png',
		theme_root+'img/logo.png']).preload();

	$j('.widget #searchform').mousedown(function(){$j(this).addClass('form_focus');}).focusout(function(){$j(this).removeClass('form_focus');});
	
});

$j(window).load(function(){
	"use strict";
	
	$j('.main_menu li:has(div.second)').doubleTapToGo(); // load script to close menu on touch devices
    
	setDropDownMenuPosition();
	initDropDownMenu();
	initShopDropDownHeight();
	initPortfolio();
	initPortfolioHover();
	initPortfolioSliderHover();
	initPortfolioSingleInfo();
	initTestimonials();
	initVideoBackgroundSize();
	initBlog();
	initTabs();
	setFooterHeight();
	showBottomTitle();
	
	$j('.side_menu').css({'right':'0px'});
	checkAnchorOnLoad(); // it has to be after content top margin initialization to know where to scroll
});

$j(window).scroll(function() {
	"use strict";
	
	$scroll = $j(window).scrollTop();
	if($j(window).width() > 1000){
		headerSize($scroll);
	}
	
	$j('.touch .drop_down > ul > li').mouseleave();
	$j('.touch .drop_down > ul > li').blur();
});

$j(window).resize(function() {
	"use strict";
	
	if($j(window).width() > 1000){
		headerSize($scroll);
	}else{
		logoSizeOnSmallScreens();
	}
	initTestimonials();
	fitAudio();
	initBlog();
	initMoreFacts();
	initVideoBackgroundSize();
	initPortfolioSliderHover();

	if($j('.qode_carousels').length){
		var gridSize = getGridSize();
	 
		carousel_flexslider.vars.minItems = gridSize;
		carousel_flexslider.vars.maxItems = gridSize;
	}
	if($j('.portfolio_slider').length){
		var fullWidthSize = getFullWidthSize();
	 
		portfolio_flexslider.vars.minItems = fullWidthSize;
		portfolio_flexslider.vars.maxItems = fullWidthSize;
	}
});

/*
**	Calculating header size on page load and page scroll
*/
var sticky_animate;
function headerSize($scroll){
	"use strict";
	
	if($j('.carousel.full_screen').length){
		sticky_amount = $j('.carousel').height();
	}else{
		if(typeof page_scroll_amount_for_sticky !== 'undefined'){
			sticky_amount = page_scroll_amount_for_sticky;
		}else{
			sticky_amount = scroll_amount_for_sticky;
		}
	}
	
	if($scroll > sticky_amount){
		
		if($j('header').hasClass('sticky') == false && $j('.no_sticky').length == 0){
			var padding_top = $j('header').hasClass('centered_logo') ? $j('header').height() : header_height;
			
			$j('header').addClass('sticky');
			$j('.content').css('padding-top',padding_top);
			
			window.clearTimeout(sticky_animate);
			sticky_animate = window.setTimeout(function(){$j('header').addClass('sticky_animate');},100);
		}
		
		if(min_header_height - logo_height >= 10){
			$j('.q_logo a').height(logo_height);
		}else{
			$j('.q_logo a').height(min_header_height - 10);
		}
		
	}else{
		if($j('header').hasClass('sticky') == true && $j('.no_sticky').length == 0){
			$j('header').removeClass('sticky_animate');
			$j('header').removeClass('sticky');
			$j('.content').css('padding-top','0px');
		}
		
		if(header_height - logo_height >= 10){
			$j('.q_logo a').height(logo_height);
		}else{
			$j('.q_logo a').height(header_height - 10);
		}
		
	}
	
	if(!$j('header').hasClass('centered_logo')){
		if($scroll > sticky_amount){
			if(min_header_height - logo_height >= 10){
				$j('.q_logo a').height(logo_height);
			}else{
				$j('.q_logo a').height(min_header_height - 10);
			}
		}else{

			if(header_height - logo_height >= 10){
				$j('.q_logo a').height(logo_height);
			}else{
				$j('.q_logo a').height(header_height - 10);
			}	
		}
		$j('.q_logo a img').css('height','100%');
	}else{
		$j('.q_logo a').height(logo_height);
		$j('.q_logo a').width(logo_width);
		$j('.q_logo img').height('auto');
	}
	
}

/*
**	Calculating logo size on smaller screens
*/
function logoSizeOnSmallScreens(){
	"use strict";
	// 100 is height of header on small screens
	
	if((100 - 20 < logo_height)){
		$j('.q_logo a').height(100 - 20);
	}else{
		$j('.q_logo a').height(logo_height);
	}
	$j('.q_logo a img').css('height','100%');
	
	$j('header').removeClass('sticky_animate sticky');
	$j('.content').css('padding-top','0px');
	
}

/*
**	Initialize Qode Slider
*/
var default_header_style;
var mobile_header;
function initQodeSlider(){
	"use strict";
	
	default_header_style = "";
	if($j('header').hasClass('light')){ default_header_style = 'light';}
	if($j('header').hasClass('dark')){ default_header_style = 'dark';}
	
	if($j('.carousel').length){
		$j('.carousel').each(function(){
			var $this = $j(this);

			if($this.hasClass('full_screen')){
				mobile_header = $j(window).width() < 1000 ? $j('header').height() - 6 : 0; // 6 is because of the display: inline-block
				$this.css({'height': ($j(window).height() - mobile_header) + 'px'});
				$this.find('.qode_slider_preloader').css({'height': ($j(window).height() - mobile_header) + 'px'});
				$this.find('.item').css({'height': ($j(window).height() - mobile_header) + 'px'});
				$j(window).resize(function() {
					mobile_header = $j(window).width() < 1000 ? $j('header').height() - 6 : 0; // 6 is because of the display: inline-block
					$this.css({'height': ($j(window).height() - mobile_header) + 'px'});
					$this.find('.item').css({'height': ($j(window).height() - mobile_header) + 'px'});
				});
			} else {
				mobile_header = $j(window).width() < 1000 ? $j('header').height() - 6 : 0; // 6 is because of the display: inline-block
				$this.find('.qode_slider_preloader').css({'height': ($this.height() - mobile_header) + 'px', 'display': 'block'});
			}
			
			$j.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()); 
			$j(window).scroll(function() {
				if($j.browser.chrome && ($scroll > 150)){
					$this.css('z-index','-1');
				}else{
					$this.css('z-index','0');
				}

				if($scroll > $j(window).height() && $j(window).width() > 1000){
					$this.find('.carousel-inner, .carousel-indicators, button').css('visibility','hidden');
				}else{
					$this.find('.carousel-inner, .carousel-indicators, button').css('visibility','visible');
				}
			});

			$j('.ajax_loader_slider').show();

			var $slide_animation = $this.data('slide_animation');
			if($slide_animation === ""){
				$slide_animation = 6000;
			}
			
			$this.waitForImages(function() {
				$this.find('.carousel-inner .item:first-child').addClass('active');
				checkSliderForHeaderStyle($j('.carousel .active'));
				$j('.qode_slider_preloader').fadeOut(200);
				if($this.hasClass('q_auto_start')){
					$this.carousel({
						interval: $slide_animation,
						pause: false
					});	
				} else {
					$this.carousel({
						interval: 0,
						pause: false
					});
				}
				
			});
			
			$this.on('slide.bs.carousel', function () {
				$this.find('.active .slider_content_outer').fadeTo(800,0);
			});
			$this.on('slid.bs.carousel', function () {
				
				$this.find('.active .slider_content_outer').fadeTo(0,1);
			});
			
			$this.touchwipe({
				wipeLeft: function() { $this.carousel('next'); },
				wipeRight: function() { $this.carousel('left'); },
				min_move_x: 20,
				preventDefaultEvents: false
			});

		});

		if ($j('.no-touch .carousel').length) {
			skrollr_slider = skrollr.init({
				edgeStrategy: 'set',
				smoothScrolling: true,
				forceHeight: false
			});
			skrollr_slider.refresh();
		}
	}	
}

function checkSliderForHeaderStyle($this){
	"use strict";
	
	var slide_header_style = "";
	if($this.hasClass('light')){ slide_header_style = 'light';}
	if($this.hasClass('dark')){ slide_header_style = 'dark';}
	if( slide_header_style !== ""){
		$j('header').removeClass('dark light').addClass(slide_header_style);
		$j('.carousel .carousel-control, .carousel .carousel-indicators').removeClass('dark light').addClass(slide_header_style);
	}else{
		$j('header').removeClass('dark light').addClass(default_header_style);
		$j('.carousel .carousel-control, .carousel .carousel-indicators').removeClass('dark light').addClass(default_header_style);
	}
}

/*
** Init Qode Carousel
*/
function initQodeCarousel(){
	"use strict";

	if($j('.qode_carousels').length){
		$j('.qode_carousels').flexslider({
			animationLoop: true,
			controlNav: true,
			useCSS: false,
			pauseOnAction: true,
			pauseOnHover: true,
			slideshow: true,
			animation: 'slides',
			itemWidth: 220,
			itemMargin: 2,
			minItems: getGridSize(),
			maxItems: getGridSize(),
			animationSpeed: 600,
			slideshowSpeed: 8000,
			start: function(slider){
				carousel_flexslider = slider;
			}
		});
	}
}

/*
** Init Portfolio Slider
*/
function initPortfolioSlider(){
	"use strict";
	
	if($j('.portfolio_slider').length){
		$j('.portfolio_slider').flexslider({
			animationLoop: true,
			controlNav: true,
			useCSS: false,
			pauseOnAction: true,
			pauseOnHover: true,
			slideshow: true,
			selector: ".portfolio_slides > li",
			animation: "slide",
			prevText: "<div><i class='fa fa-angle-left'></i></div>",
			nextText: "<div><i class='fa fa-angle-right'></i></div>",
			itemWidth: 475,
			itemMargin: 0,
			minItems: getFullWidthSize(),
			maxItems: getFullWidthSize(),
			animationSpeed: 600,
			slideshowSpeed: 8000,
			start: function(slider){
				portfolio_flexslider = slider;
			}
		});
		
		$j('.portfolio_slider .flex-direction-nav a').click(function(e){
			e.preventDefault();
			e.stopImmediatePropagation();
			e.stopPropagation();
		});
	}
}

/*
**	Opening side menu on "menu button" click
*/
var current_scroll;
function initSideMenu(){
	"use strict";

	$j('.side_menu_button_wrapper a').click(function(e){
		e.preventDefault();
		if(!$j(this).hasClass('opened')){
			$j('.side_menu').css({'visibility':'visible'});
			$j(this).addClass('opened');
			$j('body').addClass('right_side_menu_opened');
			current_scroll = $j(window).scrollTop();
			
			$j(window).scroll(function() {
				if(Math.abs($scroll - current_scroll) > 400){
					$j('body').removeClass('right_side_menu_opened');
					$j('.side_menu_button_wrapper a').removeClass('opened');
					var hide_side_menu = setTimeout(function(){
						$j('.side_menu').css({'visibility':'hidden'});
						clearTimeout(hide_side_menu);
					},400);
				}
			});
		}else{
			$j(this).removeClass('opened');
			$j('body').removeClass('right_side_menu_opened');
			var hide_side_menu = setTimeout(function(){
				$j('.side_menu').css({'visibility':'hidden'});
				clearTimeout(hide_side_menu);
			},400);
		}
	});
}

function setDropDownMenuPosition(){
	"use strict";

	var menu_items = $j(".drop_down > ul > li.narrow");
	menu_items.each( function(i) {

		var browser_width = $j(window).width()-16; // 16 is width of scroll bar
		var menu_item_position = $j(menu_items[i]).offset().left;
		var sub_menu_width = $j(menu_items[i]).find('.second .inner ul').width();
		var menu_item_from_left = browser_width - menu_item_position + 25; // 25 is right padding between menu elements
		var sub_menu_from_left;
			
		if($j(menu_items[i]).find('li.sub').length > 0){
			sub_menu_from_left = browser_width - menu_item_position - sub_menu_width + 20; // 20 is right padding between menu elements
		}
		
		if(menu_item_from_left < sub_menu_width || sub_menu_from_left < sub_menu_width){
			$j(menu_items[i]).find('.second').addClass('right');
			$j(menu_items[i]).find('.second .inner ul').addClass('right');
		}
	});
}

function initDropDownMenu(){
	"use strict";
	
	var menu_items = $j('.drop_down > ul > li');
	
	menu_items.each( function(i) {
		if ($j(menu_items[i]).find('.second').length > 0) {
			if($j(menu_items[i]).hasClass('wide')){
				if(!$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')){
					$j(this).find('.second').css('left',0);
				}

				var tallest = 0;
				$j(this).find('.second > .inner > ul > li').each(function() {
					var thisHeight = $j(this).height();
					if(thisHeight > tallest) {
						tallest = thisHeight;
					}
				});
				$j(this).find('.second > .inner > ul > li').height(tallest);
				
				
				var row_number;
				if($j(this).find('.second > .inner > ul > li').length > 4){
					row_number = 4;
				}else{
					row_number = $j(this).find('.second > .inner > ul > li').length;
				} 

				var width = row_number*($j(this).find('.second > .inner > ul > li').width()) + 2;
				$j(this).find('.second > .inner > ul').width(width);

				if(!$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')){
					var left_position = ($j(window).width() - 2 * ($j(window).width()-$j(this).find('.second').offset().left))/2 + (width+30)/2;

					$j(this).find('.second').css('left',-left_position);
				}
			}
			
			if(!menu_dropdown_height_set){
				$j(menu_items[i]).data('original_height', $j(menu_items[i]).find('.second').height() + 'px');
				$j(menu_items[i]).find('.second').height(0);
			}
			
			if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
				$j(menu_items[i]).on("touchstart mouseenter",function(){
					$j(menu_items[i]).find('.second').css({'height': $j(menu_items[i]).data('original_height'), 'overflow': 'visible', 'visibility': 'visible', 'opacity': '1'});
				}).on("mouseleave", function(){
					$j(menu_items[i]).find('.second').css({'height': '0px','overflow': 'hidden', 'visivility': 'hidden', 'opacity': '0'});
				});
			
			}else{
				$j(menu_items[i]).mouseenter(function(){
					$j(menu_items[i]).find('.second').addClass('drop_down_start');
					$j(menu_items[i]).find('.second').stop().animate({'height': $j(menu_items[i]).data('original_height')}, 150);
				}).mouseleave( function(){
					$j(menu_items[i]).find('.second').stop().animate({'height': '0px'}, 100, function() {
						$j(menu_items[i]).find('.second').removeClass('drop_down_start');			
					});
				});
			}	
		}
	});
	
	$j('.drop_down ul li.wide ul li a').on('click',function(){
		var $this = $j(this);
		setTimeout(function() {
			$this.mouseleave();
		}, 500);
		
	});
	
	menu_dropdown_height_set = true;
}

function initShopDropDownHeight(){
	"use strict";

	/* shopping cart dropdown - start */
	$j('.shopping_cart_header').find('.shopping_cart_dropdown').height('auto');
	$j('.shopping_cart_header').data('original_cart_height', $j('.shopping_cart_header').find('.shopping_cart_dropdown').height() + 'px');
	$j('.shopping_cart_header').find('.shopping_cart_dropdown').height(0);
	
	$j('.shopping_cart_header').mouseenter(function(){
		$j('.shopping_cart_header').find('.shopping_cart_dropdown').addClass('drop_down_start');
		$j('.shopping_cart_header').find('.shopping_cart_dropdown').stop().animate({'height': $j('.shopping_cart_header').data('original_cart_height')}, 150);
	}).mouseleave( function(){
		$j('.shopping_cart_header').find('.shopping_cart_dropdown').stop().animate({'height': '0px'}, 100, function() {
			$j('.shopping_cart_header').find('.shopping_cart_dropdown').removeClass('drop_down_start');			
		});
	});
	
	/* shopping cart dropdown - end */
}

function languageMenu(){
	"use strict";
	
	var lang_item = $j('.header_top #lang_sel_click > ul > li, .header_top #lang_sel > ul > li');
	
		if ($j(lang_item).find('ul').length > 0) {
			
			$j(lang_item).data('original_height', $j(lang_item).find('ul').height() + 'px');
			$j(lang_item).find('ul').hide();
			
			$j(lang_item).mouseenter(function(){
				$j(lang_item).find('ul').css({'visibility': 'visible','height': '0px', 'opacity': '0', 'display': 'block'});
				$j(lang_item).find('ul').stop().animate({'height': $j(lang_item).data('original_height'),opacity:1}, 400);
			}).mouseleave( function(){
				$j(lang_item).find('ul').stop().animate({'height': '0px'},0, function() {
					$j(lang_item).find('ul').css({'overflow': 'hidden', 'visivility': 'hidden', 'display': 'none'});				
				});
			});
		}
	
}

/*
**	Plugin for counter shortcode
*/
(function($) {
	"use strict";

	$.fn.countTo = function(options) {
		// merge the default plugin settings with the custom options
		options = $.extend({}, $.fn.countTo.defaults, options || {});

		// how many times to update the value, and how much to increment the value on each update
		var loops = Math.ceil(options.speed / options.refreshInterval),
		increment = (options.to - options.from) / loops;

		return $(this).each(function() {
			var _this = this,
			loopCount = 0,
			value = options.from,
			interval = setInterval(updateTimer, options.refreshInterval);

			function updateTimer() {
				value += increment;
				loopCount++;
				$(_this).html(value.toFixed(options.decimals));

				if (typeof(options.onUpdate) === 'function') {
					options.onUpdate.call(_this, value);
				}

				if (loopCount >= loops) {
					clearInterval(interval);
					value = options.to;

					if (typeof(options.onComplete) === 'function') {
						options.onComplete.call(_this, value);
					}
				}
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,  // the number the element should start at
		to: 100,  // the number the element should end at
		speed: 1000,  // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,  // the number of decimal places to show
		onUpdate: null,  // callback method for every time the element is updated,
		onComplete: null,  // callback method for when the element finishes updating
	};
})(jQuery);

/*
**	Counter from zero to defined number
*/
function initToCounter(){
	"use strict";
	
	if($j('.counter.zero').length){
		$j('.counter.zero').each(function() {
			if(!$j(this).hasClass('executed')){
				$j(this).addClass('executed');
				$j(this).appear(function() {
					$j(this).parent().css('opacity', '1');
					var $max = parseFloat($j(this).text());
					$j(this).countTo({
						from: 0,
						to: $max,
						speed: 1500,
						refreshInterval: 100
					});
				},{accX: 0, accY: -200});
			}	
		});
	}
}

/*
**	Counter with random effect
*/
function initCounter(){
	"use strict";
	
	if($j('.counter.random').length){
		$j('.counter.random').each(function() {
			if(!$j(this).hasClass('executed')){
				$j(this).addClass('executed');
				$j(this).appear(function() {
					$j(this).parent().css('opacity', '1');
					$j(this).absoluteCounter({
						speed: 2000,
						fadeInDelay: 1000
					});
				},{accX: 0, accY: -200});
			}
		});
	}
}

/*
**	Horizontal progress bars shortcode
*/
function initProgressBars(){
	"use strict";

	if($j('.q_progress_bar').length){
		$j('.q_progress_bar').each(function() {
			$j(this).appear(function() {
				initToCounterHorizontalProgressBar($j(this));				
				var percentage = $j(this).find('.progress_content').data('percentage');
				$j(this).find('.progress_content').css('width', '0%');
				$j(this).find('.progress_content').animate({'width': percentage+'%'}, 1500);
				$j(this).find('.progress_number_wrapper').css('width', '0%');
                $j(this).find('.progress_number_wrapper').animate({'width': percentage+'%'}, 1500);
                
				
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Counter for horizontal progress bars percent from zero to defined percent
*/
function initToCounterHorizontalProgressBar($this){
	"use strict";

	if($this.find('.progress_number span').length){
		$this.find('.progress_number span').each(function() {
			$j(this).parents('.progress_number_wrapper').css('opacity', '1');
			var $max = parseFloat($j(this).text());
			$j(this).countTo({
				from: 0,
				to: $max,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

/*
**	Unordered list animation effect
*/
function initListAnimation(){
	"use strict";
	
	if($j('.animate_list').length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.animate_list').each(function(){
			$j(this).appear(function() {
				$j(this).find("li").each(function (l) {
					var k = $j(this);
					setTimeout(function () {
						k.animate({
							opacity: 1,
							top: 0
						}, 1500);
					}, 100*l);
				});
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Pie Chart shortcode
*/
function initPieChart(){
	"use strict";
 
	if($j('.q_percentage').length){
		$j('.q_percentage').each(function() {

			var $barColor = '#eb005d';

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = '#f7f7f7';

			if($j(this).data('noactive') !== ""){
				$trackColor = $j(this).data('noactive');
			}

			var $line_width = 10;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}
			
			var $size = 140;

			$j(this).appear(function() {
				initToCounterPieChart($j(this));
				$j(this).parent().css('opacity', '1');
				
				$j(this).easyPieChart({
					barColor: $barColor,
					trackColor: $trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: $line_width,
					animate: 1500,
					size: $size
				}); 
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Pie Chart shortcode
*/
function initPieChartWithIcon(){
	"use strict";
 
	if($j('.q_percentage_with_icon').length){
		$j('.q_percentage_with_icon').each(function() {

			var $barColor = '#dcdcdc';

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = '#f7f7f7';

			if($j(this).data('noactive') !== ""){
				$trackColor = $j(this).data('noactive');
			}

			var $line_width = 10;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}
			
			var $size = 220;

			$j(this).appear(function() {
				$j(this).parent().css('opacity', '1');
				$j(this).css('opacity', '1');
				$j(this).easyPieChart({
					barColor: $barColor,
					trackColor: $trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: $line_width,
					animate: 1500,
					size: $size
				}); 
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Counter for pie chart number from zero to defined number
*/
function initToCounterPieChart($this){
	"use strict";

	$j($this).css('opacity', '1');
	var $max = parseFloat($j($this).find('.tocounter').text());
	$j($this).find('.tocounter').countTo({
		from: 0,
		to: $max,
		speed: 1500,
		refreshInterval: 50
	});
}

/*
**	Init Portfolio list and Portfolio Filter
*/
function initPortfolio(){
	"use strict";
	
	if($j('.projects_holder_outer').length){
		$j('.projects_holder_outer').each(function(){
			$j(this).find('.projects_holder').mixitup({
				showOnLoad: 'all',
				transitionSpeed: 600,
				minHeight: 150,
				onMixEnd: function(){
					initPortfolioHover();
				}
			});
		});
	}
}

function initPortfolioHover(){
	"use strict";

	if($j('.projects_holder.hover_text article').length){
		$j('.projects_holder.hover_text article').each(function(){
			var $this = $j(this);

			var bottom = $this.find('.image').height();
			var bottom_text = $this.find('.hover_feature_holder_title').height();
			$this.find('.hover_feature_holder_title').css('bottom', -bottom_text);

			$this.mouseenter(function(){
				$this.find('.hover_feature_holder').css('visibility', 'visible');
				$this.find('.hover_feature_holder').addClass('start_ph_animation');
				$this.find('.hover_feature_holder_icons').addClass('start_ph_animation');
				$this.find('.image').stop().animate({'top': -bottom_text}, 400);
				$this.find('.hover_feature_holder_title').stop().animate({'bottom': '0px'}, 400);
			}).mouseleave(function(){
				$this.find('.hover_feature_holder').removeClass('start_ph_animation');
				$this.find('.image').stop().animate({'top': '0px'}, 300, function(){
					$this.find('.hover_feature_holder_icons').removeClass('start_ph_animation');
					$this.find('.hover_feature_holder').css('visibility', 'hidden');
				});
				$this.find('.hover_feature_holder_title').stop().animate({'bottom': -bottom_text}, 300);
			});
		});
	}
}

function initPortfolioSliderHover(){
	"use strict";

	if($j('.portfolio_slider_holder .portfolio_slider').length){
		$j('.portfolio_slider_holder .portfolio_slider ul li').each(function(){
			var $this = $j(this);

			var bottom = $this.find('.image').height();
			var bottom_text = $this.find('.hover_feature_holder_title').height();
			$this.find('.hover_feature_holder_title').css('bottom', -bottom_text);

			$this.mouseenter(function(){
				$this.find('.hover_feature_holder').css('visibility', 'visible');
				$this.find('.hover_feature_holder').addClass('start_ph_animation');
				$this.find('.hover_feature_holder_icons').addClass('start_ph_animation');
				$this.find('.image').stop().animate({'top': -bottom_text}, 400);
				$this.find('.hover_feature_holder_title').stop().animate({'bottom': '0px'}, 400);
			}).mouseleave(function(){
				$this.find('.hover_feature_holder').removeClass('start_ph_animation');
				$this.find('.image').stop().animate({'top': '0px'}, 300, function(){
					$this.find('.hover_feature_holder_icons').removeClass('start_ph_animation');
					$this.find('.hover_feature_holder').css('visibility', 'hidden');
				});
				$this.find('.hover_feature_holder_title').stop().animate({'bottom': -bottom_text}, 300);
			});
		});
	}
}

function initServiceAnimation(){
	"use strict";
	
	if($j(".fade_in_circle_holder").length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.fade_in_circle_holder').each(function(){
			$j(this).appear(function(){
				$j(this).addClass('animate_circle');
//				$j(this).find('.fade_in_content').addClass('animate_content');
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Title image with parallax effect
*/
function initParallaxTitle(){
	"use strict";

	if(($j('.title').length > 0) && ($j('.touch').length === 0)){		
		
		if($j('.title.has_fixed_background').length){
			
			var $background_size_width = parseInt($j('.title.has_fixed_background').css('background-size').match(/\d+/));
			
			var title_holder_height = $j('.title.has_fixed_background').height();
			var title_rate = (title_holder_height / 10000) * 7;
			
			var title_distance = $scroll - $j('.title.has_fixed_background').offset().top;
			var title_bpos = -(title_distance * title_rate);
			$j('.title.has_fixed_background').css({'background-position': 'center 0px' });
			if($j('.title.has_fixed_background').hasClass('zoom_out')){
				$j('.title.has_fixed_background').css({'background-size': $background_size_width-$scroll + 'px auto'});
			}
			
			if(!$j('.title').hasClass('title_on_bottom')){ 
				$j('.title_holder').css({ 'opacity' : (1 - $scroll/($j('.title').height()*0.6)), 'top': $scroll/2});
			}
		}
		
		
		$j(window).on('scroll', function() {
			if($j('.title.has_fixed_background').length){
				if(!$j('.title').hasClass('title_on_bottom')){ 
					$j('.title_holder').css({ 'opacity' : (1 - $scroll/($j('.title').height()*0.6)), 'top': $scroll/2 });
				}
				
				var title_distance = $scroll - $j('.title.has_fixed_background').offset().top;
				var title_bpos = -(title_distance * title_rate);
				$j('.title.has_fixed_background').css({'background-position': 'center ' + title_bpos + 'px' });
				if($j('.title.has_fixed_background').hasClass('zoom_out')){
					$j('.title.has_fixed_background').css({'background-size': $background_size_width-$scroll + 'px auto'});
				}
			}
		});
	
	}
}

/*
**	Sections with parallax background image
*/
function initParallax(speed){
	"use strict";
	
	if($j('.parallax section').length){
		if($j('html').hasClass('touch')){
			$j('.parallax section').each(function() {
				var $self = $j(this);
				var section_height = $self.data('height');
				$self.height(section_height);
				var rate = 0.5;
				
				var bpos = (- $j(this).offset().top) * rate;
				$self.css({'background-position': 'center ' + bpos  + 'px' });
				
				$j(window).bind('scroll', function() {
					var bpos = (- $self.offset().top + $j(window).scrollTop()) * rate;
					$self.css({'background-position': 'center ' + bpos  + 'px' });
				});
			});
		}else{
		
			$j('.parallax section').each(function() {
				var $self = $j(this);
				var section_height = $self.data('height');
				$self.height(section_height);
				var rate = (section_height / $j(document).height()) * speed;
				
				var distance = $scroll - $self.offset().top + 104;
				var bpos = - (distance * rate);
				$self.css({'background-position': 'center ' + bpos  + 'px' });
				$j(window).bind('scroll', function() {
					var distance = $scroll - $self.offset().top + 104;
					var bpos = - (distance * rate);
					$self.css({'background-position': 'center ' + bpos  + 'px' });
				});
			});
		}
		return this;
	}
}

/*
**	Smooth scroll functionality
*/
function initNiceScroll(){
	"use strict";

	if($j('.smooth_scroll').length){	
		$j("html").niceScroll({ 
			enabletranslate3d: 0,
			scrollspeed: 30,
			mousescrollstep: 30,
			cursorwidth: 8, 
			cursorborder: 0,
			cursorborderradius: 7,
			cursorcolor: "#ffffff",
			autohidemode: false, 
			horizrailenabled: false 
		});
	}
}

/*
**	Smooth scroll functionality for Side Area
*/
function initSideAreaScroll(){
	"use strict";

	if($j('.side_menu').length){	
		$j(".side_menu").niceScroll({ 
			scrollspeed: 60,
			mousescrollstep: 40,
			cursorwidth: 0, 
			cursorborder: 0,
			cursorborderradius: 0,
			cursorcolor: "transparent",
			autohidemode: false, 
			horizrailenabled: false 
		});
	}
}

/*
**	Load more portfolios
*/
function loadMore(){
	"use strict";
	
	var i = 1;
	
	$j('.load_more a').on('click', function(e)  {
		e.preventDefault();
		
		var link = $j(this).attr('href');
		var $content = '.projects_holder';
		var $anchor = '.portfolio_paging .load_more a';
		var $next_href = $j($anchor).attr('href'); // Get URL for the next set of posts
		var filler_num = $j('.projects_holder .filler').length;
		$j.get(link+'', function(data){
			$j('.projects_holder .filler').slice(-filler_num).remove();
			var $new_content = $j($content, data).wrapInner('').html(); // Grab just the content
			$next_href = $j($anchor, data).attr('href'); // Get the new href
			$j('article.mix:last').after($new_content); // Append the new content
			
			var min_height = $j('article.mix:first').height();
			$j('article.mix').css('min-height',min_height);
			
			$j('.projects_holder').mixitup('remix','all');
			prettyPhoto();
			if($j('.load_more').attr('rel') > i) {
				$j('.load_more a').attr('href', $next_href); // Change the next URL
			} else {
				$j('.load_more').remove(); 
			}
			$j('.projects_holder .portfolio_paging:last').remove(); // Remove the original navigation
			$j('article.mix').css('min-height',0);
			
		});
		i++;
	});
}

/*
**	Picture popup for portfolio lists and portfolio single 
*/
function prettyPhoto(){
	"use strict";		

	$j('a[data-rel]').each(function() {
		$j(this).attr('rel', $j(this).data('rel'));
	});

	$j("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'normal', /* fast/slow/normal */
		slideshow: false, /* false OR interval time in ms */
		autoplay_slideshow: false, /* true/false */
		opacity: 0.80, /* Value between 0 and 1 */
		show_title: true, /* true/false */
		allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		default_width: 650,
		default_height: 400,
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
		wmode: 'opaque', /* Set the flash wmode attribute */
		autoplay: true, /* Automatically start videos: True/False */
		modal: false, /* If set to true, only the close button will close the window */
		overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
		keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
		deeplinking: false,
		social_tools: false
	});
}

/*
**	Show/Hide Mobile menu
*/
function initMobileMenu(){
	"use strict";
	
	$j(".mobile_menu_button span").click(function () {
		if ($j(".mobile_menu > ul").is(":visible")){
			$j(".mobile_menu > ul").slideUp(200);
		} else {
			$j(".mobile_menu > ul").slideDown(200);
		}
	});
	
	$j(".mobile_menu > ul > li.has_sub > a > span.mobile_arrow, .mobile_menu > ul > li.has_sub > h3 > span.mobile_arrow").click(function () {
		if ($j(this).closest('li.has_sub').find("> ul.sub_menu").is(":visible")){
			$j(this).closest('li.has_sub').find("> ul.sub_menu").slideUp(200);
			$j(this).closest('li.has_sub').removeClass('open_sub');
		} else {
			$j(this).closest('li.has_sub').addClass('open_sub');
			$j(this).closest('li.has_sub').find("> ul.sub_menu").slideDown(200);
		}
	});

	$j(".mobile_menu > ul > li.has_sub > ul.sub_menu > li.has_sub > a > span.mobile_arrow, .mobile_menu > ul > li.has_sub > ul.sub_menu > li.has_sub > h3 > span.mobile_arrow").click(function () {
		if ($j(this).parent().parent().find("ul.sub_menu").is(":visible")){
			$j(this).parent().parent().find("ul.sub_menu").slideUp(200);
			$j(this).parent().parent().removeClass('open_sub');
		} else {
			$j(this).parent().parent().addClass('open_sub');
			$j(this).parent().parent().find("ul.sub_menu").slideDown(200);
		}
	});
	
	$j(".mobile_menu ul li a").click(function () {
		if(($j(this).attr('href') !== "http://#") && ($j(this).attr('href') !== "#")){
			$j(".mobile_menu > ul").slideUp();
		}else{
			return false;
		}
	});

	$j(".mobile_menu ul li a span.mobile_arrow").click(function () {
		return false;
	});
}

/*
**	Init flexslider for portfolio single
*/
function initFlexSlider(){
	"use strict";
	
	$j('.flexslider').flexslider({
		animationLoop: true,
		controlNav: false,
		useCSS: false,
		pauseOnAction: true,
		pauseOnHover: true,
		slideshow: true,
		animation: 'slides',
		prevText: "<div><i class='fa fa-angle-left'></i></div>",
			nextText: "<div><i class='fa fa-angle-right'></i></div>",
		animationSpeed: 600,
		slideshowSpeed: 8000,
		start: function(){
			setTimeout(function(){$j(".flexslider").fitVids(); initNiceScroll();},100);
		}
	});
	
	$j('.flex-direction-nav a').click(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		e.stopPropagation();
	});
}

/*
**	Init fitVideo function for responsive video files
*/
function fitVideo(){
	"use strict";
	
	$j(".portfolio_images").fitVids();
	$j(".video_holder").fitVids();
	$j(".format-video .post_image").fitVids();
}

/*
**	Function for follow portfolio single descripton
*/
var $scrollHeight;
function initPortfolioSingleInfo(){
	"use strict";

	var $sidebar = $j(".portfolio_single_follow");
	if($j(".portfolio_single_follow").length > 0){
	
		var offset = $sidebar.offset();
		$scrollHeight = $j(".portfolio_container").height();
		var $scrollOffset = $j(".portfolio_container").offset();
		var $window = $j(window);
		
		var $headerHeight = parseInt($j('header').css('height'), 10);
		
		$window.scroll(function() {
			if($window.width() > 960){
				if ($window.scrollTop() + $headerHeight + 3 > offset.top) {
					if ($window.scrollTop() + $headerHeight + $sidebar.height() + 24 < $scrollOffset.top + $scrollHeight) {
						$sidebar.stop().animate({
							marginTop: $window.scrollTop() - offset.top + $headerHeight
						});
					} else {
						$sidebar.stop().animate({
							marginTop: $scrollHeight - $sidebar.height() - 24
						});
					}
				} else {
					$sidebar.stop().animate({
						marginTop: 0
					});
				}		
			}else{
				$sidebar.css('margin-top',0);
			}
		});
	}
}

/*
**	Plugin for preload hover image
*/
$j.fn.preload = function() {
	"use strict";

	this.each(function(){
		$j('<img/>')[0].src = this;
	});
};

/*
**	Init tabs shortcodes
*/
function initTabs(){
	"use strict";
	if($j('.q_tabs').length){
		$j('.q_tabs').appear(function() {
			$j('.q_tabs').css('visibility', 'visible');
		},{accX: 0, accY: -100});
		var $tabsNav = $j('.tabs-nav');
		var $tabsNavLis = $tabsNav.children('li');
		$tabsNav.each(function() {
			var $this = $j(this);
			$this.next().children('.tab-content').stop(true,true).hide().first().show();
			$this.children('li').first().addClass('active').stop(true,true).show();
		});
		$tabsNavLis.on('click', function(e) {
			var $this = $j(this);
			$this.siblings().removeClass('active').end().addClass('active');
			$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
			e.preventDefault();
		}); 
	}
}

/*
 **	Init accordion and toogle shortcodes
 */
function initAccordion() {
	"use strict";

	if($j(".q_accordion_holder").length){
		$j(".q_accordion_holder").appear(function() {
			$j(".q_accordion_holder").css('visibility', 'visible');
		},{accX: 0, accY: -100});

		if ($j(".accordion").length) {
			$j(".accordion").accordion({
				animate: "swing",
				collapsible: true,
				active: false,
				icons: "",
				heightStyle: "content"
			});
		}
		$j(".toggle").addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
		.find("h5")
		.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
		.hover(function() {
			$j(this).toggleClass("ui-state-hover");
		})
		.click(function() {
			$j(this)
				.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
				.next().toggleClass("ui-accordion-content-active").slideToggle(400);
			return false;
		})
		.next()
		.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
		.hide();
	}    
}

/*
**	Function to enable link in accordion
*/
function initAccordionContentLink(){
	"use strict";
	
	if($j(".accordion").length){
		$j('.accordion_holder .accordion_inner .accordion_content a').click(function(){
			if($j(this).attr('target') === '_blank'){
				window.open($j(this).attr('href'),'_blank');
			}else{
				window.open($j(this).attr('href'),'_self');
			}
			return false;
		});
	}
}

/*
**	Init testimonial shortcode
*/
function initTestimonials(){
	"use strict";

	if($j('.testimonials').length){
		$j('.testimonials').each(function(){
			$j(this).css('visibility','visible');
			var $tabsNav = $j(this).find('.testimonial_nav');
			var $tabsNavLis = $tabsNav.children('li');
			$tabsNav.each(function() {
				var $this = $j(this);
				$this.prev().children('.testimonial_content').stop(true,true).hide().first().show();
				$this.children('li').first().addClass('active').stop(true,true).show();
			});
			$tabsNavLis.on('click', function(e) {
				var $this = $j(this);
				if(!$this.hasClass('active')){
					$this.siblings().removeClass('active').end().addClass('active');
					$this.parent().prev().children('.testimonial_content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
				}
				e.preventDefault();
			});
		});
	}
}

/*
**	Function to close message shortcode
*/
function initMessages(){
	"use strict";
	
	if($j('.q_message').length){
		$j('.q_message').each(function(){
			$j(this).find('.close').click(function(e){
				e.preventDefault();
				$j(this).parent().fadeOut(500);
			});
		});
	}
}
/*
**	Init Element Animations
*/
function initElementsAnimation(){
	"use strict";

	if($j(".element_from_fade").length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.element_from_fade').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_fade_on');	
			},{accX: 0, accY: -100});
		});
	}
	
	if($j(".element_from_left").length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.element_from_left').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_left_on');	
			},{accX: 0, accY: -100});		
		});
	}
	
	if($j(".element_from_right").length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.element_from_right').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_right_on');	
			},{accX: 0, accY: -100});
		});
	}
	
	if($j(".element_from_top").length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.element_from_top').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_top_on');	
			},{accX: 0, accY: -100});
		});
	}
	
	if($j(".element_from_bottom").length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.element_from_bottom').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_bottom_on');	
			},{accX: 0, accY: -100});			
		});
	}
	
	if($j(".element_transform").length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.element_transform').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_transform_on');	
			},{accX: 0, accY: -100});	
		});
	}	
}

/*
**	Init audio player for blog layout
*/
function fitAudio(){
	"use strict";
	
	$j('audio').mediaelementplayer({
		audioWidth: '100%'
	});
}

/*
**	Init masonry layout for blog template
*/
function initBlog(){
	"use strict";
	
	if($j('.masonry').length){
		var width_blog = $j('.container_inner').width();
		if($j('.masonry').closest(".column_inner").length) {
			width_blog = $j('.masonry').closest(".column_inner").width();
		}
		$j('.masonry').width(width_blog);
		var $container = $j('.masonry');
		var $cols = 3;
			
		if($container.width() < 420) {
			$cols = 1;
		} else if($container.width() <= 785) {
			$cols = 2;
		}
		
		$container.isotope({
			itemSelector: 'article',
			resizable: false,
			masonry: { columnWidth: $j('.masonry').width() / $cols }
		});

		$j(window).resize(function(){
			if($container.width() < 420) {
				$cols = 1;
			} else if($container.width() <= 785) {
				$cols = 2;
			} else {
				$cols = 3;
			}
		});
		
		$j(window).smartresize(function(){
			$container.isotope({
				masonry: { columnWidth: $j('.masonry').width() / $cols}
			});
		});
	$j('.masonry').animate({opacity: "1"}, 500);
	}	
}

/*
**	Init footer height for left border line
*/
function setFooterHeight(){
	"use strict";
	
	var maxHeight = Math.max.apply(null, $j(".footer_top .column_inner").map(function (){
		return $j(this).height();
	}).get());

	$j('.footer_top .column_inner').css('min-height', maxHeight);
}

/*
**	Add class to show bottom title
*/
function showBottomTitle(){
	"use strict";
	
	if($j('.title_on_bottom_wrap').length){
		$j('.title').find('.title_on_bottom_wrap').addClass('show_title_on_bottom');
	}
}

/*
**	Init progress bar with icon
*/
var timeOuts = []; 
function initProgressBarsIcon(){
	"use strict";

	if($j('.q_progress_bars_icons_holder').length){
		$j('.q_progress_bars_icons_holder').each(function() {
			var $this = $j(this);
			$this.appear(function() {
				$this.find('.q_progress_bars_icons').css('opacity','1');
				$this.find('.q_progress_bars_icons').each(function() {
					var number = $j(this).find('.q_progress_bars_icons_inner').data('number');
					var size = $j(this).find('.q_progress_bars_icons_inner').data('size');

					if(size !== ""){
						$j(this).find('.q_progress_bars_icons_inner.custom_size .bar').css({'width': size+'px','height':size+'px'});
						$j(this).find('.q_progress_bars_icons_inner.custom_size .bar .fa-stack').css({'font-size': size/2+'px'});
					} 

					var bars = $j(this).find('.bar');

					bars.each(function(i){
						if(i < number){
							var time = (i + 1)*150;
							timeOuts[i] = setTimeout(function(){
								$j(bars[i]).addClass('active');
							},time);
						}
					});
				});
			},{accX: 0, accY: -200});
		});
	}
}

/*
**	Init more facts shortcode
*/
function initMoreFacts(){
	"use strict";
	
	if($j('.more_facts_holder').length){
		$j('.more_facts_holder').each(function(){
			var $more_label = 'More Facts';

			if($j(this).find('.more_facts_button').data('morefacts') !== ""){
				$more_label = $j(this).find('.more_facts_button').data('morefacts');
			}

			var $less_label = 'Less Facts';

			if($j(this).find('.more_facts_button').data('lessfacts') !== ""){
				$less_label = $j(this).find('.more_facts_button').data('lessfacts');
			}

			var height = $j(this).find('.more_facts_inner').height();

			var speed;
			if(height > 0 && height < 601){
				speed = 800;
			} else if(height > 600 && height < 1201){
				speed = 1600;
			} else{
				speed = 2200;
			}
			$j(this).find('.more_facts_inner').css({'height':'0px','display':'none'});	

			$j(this).find('.more_facts_button').click(function(){
				if(!$j(this).hasClass('facts_opened')){
					$j(this).parent().parent().find('.more_facts_inner').css({'display':'block','opacity':'1'}).stop().animate({'height': height+30}, speed);
					$j(this).text($less_label);
					$j(this).addClass('facts_opened');
				} else {
					$j(this).parent().parent().find('.more_facts_inner').stop().animate({'height': '0px'}, speed,function(){
						$j(this).css({'display':'none','opacity':'0'});
					});
					$j(this).text($more_label);
					$j(this).removeClass('facts_opened');
				}
			});
		});
	}
}

/*
**	Init social share
*/
function socialShare(){
	"use strict";
    
	
	var menu_item = $j('.social_share_dropdown');

	if ($j(menu_item).length > 0) {
		menu_item.each( function(i) {
			$j(menu_item[i]).parent().mouseenter(function(){
				$j(menu_item[i]).parent().addClass('hover');
				$j(menu_item[i]).css({'visibility':'visible','overflow': 'visible','display': 'block'});
                
			}).mouseleave( function(){
				$j(menu_item[i]).parent().removeClass('hover');
				$j(menu_item[i]).css({'overflow':'hidden','visibility': 'hidden','display':'none'});
			});
          
		});
	}
}

/*
**	Replace plceholder
*/
function placeholderReplace(){
	"use strict";

	$j('[placeholder]').focus(function() {
		var input = $j(this);
		if (input.val() === input.attr('placeholder')) {
			if (this.originalType) {
				this.type = this.originalType;
				delete this.originalType;
			}
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $j(this);
		if (input.val() === '') {
			if (this.type === 'password') {
				this.originalType = this.type;
				this.type = 'text';
			}
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();

	$j('[placeholder]').parents('form').submit(function () {
		$j(this).find('[placeholder]').each(function () {
			var input = $j(this);
			if (input.val() === input.attr('placeholder')) {
				input.val('');
			}
		});
	});
}

function totop_button(a) {
	"use strict";

	var b = $j("#back_to_top");
	b.removeClass("off on");
	if (a === "on") { b.addClass("on"); } else { b.addClass("off"); }
}

function backButtonShowHide(){
	"use strict";

	$j(window).scroll(function () {
		var b = $j(this).scrollTop();
		var c = $j(this).height();
		var d;
		if (b > 0) { d = b + c / 2; } else { d = 1; }
		if (d < 1e3) { totop_button("off"); } else { totop_button("on"); }
	});
}

function backToTop(){
	"use strict";
	
	$j(document).on('click','#back_to_top',function(e){
		e.preventDefault();
		
		$j('body,html').animate({scrollTop: 0}, $j(window).scrollTop()/3, 'linear');
	});
}

/*
**	Init steps 
*/
function initSteps(){
	"use strict";
	if($j('.q_steps_holder').length){
		$j('.q_steps_holder').each(function(){
			$j(this).appear(function() {
				$j(this).addClass('show');
			},{accX: 0, accY: -200});
		});
	}
}

/**
 * Init image hover
 */
function initImageHover() {
    "use strict";
	if($j('.image_hover').length){
		$j('.image_hover').each(function(){
			$j(this).appear(function() {
				
                var default_visible_time = 300;
                var transition_delay = $j(this).attr('data-transition-delay');
                var real_transition_delay = default_visible_time + parseFloat(transition_delay);
                var object = $j(this);
                
                //wait for other hovers to complete
                setTimeout(function() {
                    object.addClass('show');
                }, parseFloat(transition_delay));
                
                //hold that image a little, than remove class
                setTimeout(function() {
                    object.removeClass('show');
                }, real_transition_delay);
                
			},{accX: 0, accY: -200});
		});
	}
}

/*
 * Initializes vertical progress bars
 */
function initProgressBarsVertical(){
	"use strict";

	if($j('.q_progress_bars_vertical').length){
		$j('.q_progress_bars_vertical').each(function() {
			$j(this).appear(function() {
				initToCounterVerticalProgressBar($j(this));
					var percentage = $j(this).find('.progress_content').data('percentage');
					$j(this).find('.progress_content').css('height', '0%');
					$j(this).find('.progress_content').animate({
						height: percentage+'%'
					}, 1500);	
			},{accX: 0, accY: -200});
		});
	}
}

/*
 * Initializes vertical progress bar count to max value
 */
function initToCounterVerticalProgressBar($this){
	"use strict";

	if($this.find('.progress_number span').length){
		$this.find('.progress_number span').each(function() {
			var $max = parseFloat($j(this).text());
			$j(this).countTo({
				from: 0,
				to: $max,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

/*
*	Check if there is anchor on load and scroll to it
*/
function checkAnchorOnLoad(){
	"use strict";
	
	var hash = window.location.hash;
	if(hash !== "" && $j('[data-q_id="'+hash+'"]').length > 0){
		$j('html, body').animate({
			scrollTop: $j('[data-q_id="'+hash+'"]').offset().top - $j('header').height()
		}, 1500);
	}
			
}

/*
*	Check active state of anchor links on scroll
*/

function checkAnchorOnScroll(){
	if($j('[data-q_id]').length){
		var offset = $j('header').height();
		
		$j('[data-q_id]').waypoint( function(direction) {
			var id = $j(this).data("id");
			
			$j(".main_menu a").each(function(){
				var i = $j(this).prop("hash");
				if(i === id){
					$j('.main_menu a').parent().removeClass('active');
					if($j(this).closest('.second').length === 0){
						$j(this).parent().addClass('active');
					}else{
						$j(this).closest('.second').parent().addClass('active');
					}
					$j('.main_menu a').removeClass('current');
					$j(this).addClass('current');
				}
			});	
		}, { offset: offset });
	}
}

/*
*	Init scroll to section link if that link has hash value
*/
function initHashClick(){
	"use strict";
	
	var $doc = $j('html, body');
	$j(document).on( "click", ".main_menu a, .qbutton, .anchor", function(){
			var hash = $j(this).prop("hash");
			if((hash !== "" && $j(this).attr('href').split('#')[0] === "") || (hash !== "" && $j(this).attr('href').split('#')[0] !== "" && hash === window.location.hash) || ($j(this).attr('href').split('#')[0] == window.location.href.split('#')[0])){
				
				if($j('[data-q_id="'+hash+'"]').length > 0){
					$doc.animate({
						scrollTop: $j('[data-q_id="'+hash+'"]').offset().top - $j('header').height()
					}, 1500);
					anchorActiveState($j(this));
				}
				if(history.pushState) {
					history.pushState(null, null, hash);
				}
				return false;
			}
			
	});
	$j(document).on( "click", ".mobile_menu a", function(){
		var hash = $j(this).prop("hash");
		if((hash !== "" && $j(this).attr('href').split('#')[0] === "") || (hash !== "" && $j(this).attr('href').split('#')[0] !== "" && hash === window.location.hash) || ($j(this).attr('href').split('#')[0] == window.location.href.split('#')[0])){
			
			if($j('[data-q_id="'+hash+'"]').length > 0){
				$doc.animate({
					scrollTop: $j('[data-q_id="'+hash+'"]').offset().top - $j('.mobile_menu').height()
				}, 500);
				anchorActiveState($j(this));
			}
			if(history.pushState) {
					history.pushState(null, null, hash);
			}
			return false;
		}
		
	});
}

/*
*	Set active state in maim menu on anchor click
*/

function anchorActiveState(me){
	if(me.closest('.main_menu').length > 0){
		$j('.main_menu a').parent().removeClass('active');
	}
	if(me.closest('.second').length === 0){
		me.parent().addClass('active');
	}else{
		me.closest('.second').parent().addClass('active');
	}
	if(me.closest('.mobile_menu').length > 0){
		$j('.mobile_menu a').parent().removeClass('active');
		me.parent().addClass('active');
	}
	
	$j('.mobile_menu a, .main_menu a').removeClass('current');
	me.addClass('current');
}

/*
**	Video background initialization
*/
function initVideoBackground(){
	"use strict";
	
	$j('.video-wrap .video').mediaelementplayer({
		enableKeyboard: false,
		iPadUseNativeControls: false,
		pauseOtherPlayers: false,
		iPhoneUseNativeControls: false,
		AndroidUseNativeControls: false
	});
	
	if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
		initVideoBackgroundSize();
		$j('.mobile-video-image').show();
		$j('.video-wrap').remove();
	}
}

/*
**	Calculate video background size
*/
function initVideoBackgroundSize(){
	"use strict";
	
	$j('.section .video-wrap').each(function(i){
		
		var $sectionWidth = $j(this).closest('.section').outerWidth();
		$j(this).width($sectionWidth);
		
		var $sectionHeight = $j(this).closest('.section').outerHeight();
		min_w = vid_ratio * ($sectionHeight+20);
		$j(this).height($sectionHeight);
	
		var scale_h = $sectionWidth / video_width_original;
		var scale_v = ($sectionHeight - header_height) / video_height_original; 
		var scale =  scale_v;
		if (scale_h > scale_v)
			scale =  scale_h;
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}
				
		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
		$j(this).scrollLeft(($j(this).find('video').width() - $sectionWidth) / 2);
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($sectionHeight)) / 2);
		$j(this).scrollTop(($j(this).find('video').height() - ($sectionHeight)) / 2);
	});
	
	$j('.carousel .item .video .video-wrap').each(function(i){
		
		var $slideWidth = $j(window).width();
		$j(this).width($slideWidth);
		
		var mob_header = $j(window).width() < 1000 ? $j('header').height() - 6 : 0; // 6 is because of the display: inline-block
		var $slideHeight = $j(window).height() - mob_header;
		
		min_w = vid_ratio * ($slideHeight+20);
		$j(this).height($slideHeight);
	
		var scale_h = $slideWidth / video_width_original;
		var scale_v = ($slideHeight - header_height) / video_height_original; 
		var scale =  scale_v;
		if (scale_h > scale_v)
			scale =  scale_h;
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}
				
		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
		$j(this).scrollLeft(($j(this).find('video').width() - $slideWidth) / 2);
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($slideHeight)) / 2);
		$j(this).scrollTop(($j(this).find('video').height() - ($slideHeight)) / 2);
	});
}

/*
**	Icon With Text animation effect
*/
function initIconWithTextAnimation(){
	"use strict";
	if($j('.q_icon_animation').length > 0 && $j('.no_animation_on_touch').length == 0){
		$j('.q_icon_animation').each(function(){
			$j(this).appear(function() {
				$j(this).addClass('q_show_animation');
			},{accX: 0, accY: -200});	
		});	
	}
}

/*
**	Add class on body if browser is Safari
*/
function initCheckSafariBrowser(){
	"use strict";

	if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
		$j('body').addClass('safari_browser');
	}
}

/*
**	Init update Shopping Cart
*/
function updateShoppingCart(){
	"use strict";

	$j('body').bind('added_to_cart', add_to_cart);
	function add_to_cart(event, parts, hash) {
		var miniCart = $j('.shopping_cart_header');
		if ( parts['div.widget_shopping_cart_content'] ) {
			var $cartContent = jQuery(parts['div.widget_shopping_cart_content']),
			$itemsList = $cartContent .find('.cart_list'),
			$total = $cartContent.find('.total').contents(':not(strong)').text();
		miniCart.find('.shopping_cart_dropdown_inner').html('').append($itemsList);
		miniCart.find('.total span').html('').append($total);
		initShopDropDownHeight();
		}
	}
}
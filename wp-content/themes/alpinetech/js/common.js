/* GLOBAL */
var viewportW = jQuery(window).width(),
		viewportH = jQuery(window).height(),
		documentH = 0,
		viewportSP = 750,
		opacity = "opacity:0";

$(document).ready(function () {
	//FIX IE
	0 < function () {
		var a = window.navigator.userAgent,
			b = a.indexOf("MSIE");
		return 0 < b ? parseInt(a.substring(b + 5, a.indexOf(".", b))) : navigator.userAgent.match(/Trident\/7\./) ? 11 : 0
	}() && $("html").addClass("fixie");
	// OBJECT FIT IE
	$(".fixie .obj-img").each(function () {
		var a = $(this),
			b = a.find("img").prop("src");
			a.find("img").hide();
		b && a.css("backgroundImage", "url(" + b + ")").addClass("custom-object-fit");
	});
	$(".fixie .obj-contain").each(function () {
		var a = $(this),
			b = a.find("img").prop("src");
			a.find("img").hide();
		b && a.css("backgroundImage", "url(" + b + ")").addClass("custom-object-contain");
	});
	//END FIX IE

	//DETECT
	var userAgent = window.navigator.userAgent;
	userAgent.match(/iPhone/i) && $("body").addClass("ios");
	"6" === iPhoneVersion() && $("body").addClass("iphone6");
	"X" === iPhoneVersion() && $("body").addClass("iphoneX");
	"Plus" === iPhoneVersion() && $("body").addClass("iphonePlus");
	var isChrome = !!window.chrome,
			isFirefox = userAgent.toLowerCase().indexOf('firefox') > -1;
			isSafari = !!window.safari;
			isEdge = window.navigator.userAgent.indexOf("Edge") > -1
	isChrome && !$("body").hasClass("ios") && $("body").addClass("chrome");
	isSafari && !$("body").hasClass("android") && $("body").addClass("safari");
	isFirefox && !$("body").hasClass("android") && $("body").addClass("firefox");
	if (isEdge && $("body").hasClass("chrome")) {
		$("body").removeClass("chrome");
		$("body").addClass("edge");
	}
	//END DETECT

	//LOAD FUNCTION
	load_function();
	jQuery(window).resize(function () {
		viewportW = jQuery(window).width();
		viewportH = jQuery(window).height()
	}).resize();
	//END LOAD FUNCTION

	//WINDOW SCROLL ADD CLASS
	$(window).scroll(function () {
		var a = $(window).scrollTop();
		150 < a ? $("body").addClass("over_150") : $("body").removeClass("over_150");
		1400 > $(window).width() ? 250 < a ? $("body").addClass("over_500") : $("body").removeClass("over_500") : 250 < a ? $("body").addClass("over_500") : $("body").removeClass("over_500")
	});
	//END WINDOW SCROLL ADD CLASS

	//ICON NAV MENU
	$(".hamburger").click(function (a) {
		a.stopPropagation()
		$("body").toggleClass("menu-open");
		$("body").hasClass("menu-open") ?
			($("body").addClass("menu_fixed"), $(document).height(), $("body.menu-open").css({
				height: "100%"
			})) : ($("body").removeClass("menu_fixed"), $("body").css({
				height: "auto"
			}))
	});

	//ADD CLICK OUTSIDE MENU
	// $(window).click(function () {
	// 	$("body").removeClass("menu-open");
	// 	$(".nav").removeClass("show")
	// });
	//END ICON NAV MENU

	//LINK PAGE
	$(".linkto").click(function (a) {
		a = $(this).attr("data-to");
		$("body").hasClass("menu-open") && $("body").removeClass("menu-open");
		$("html,body").animate({
			scrollTop: $("#" + a).offset().top
		}, 0)
	});
	//END LINK PAGE

	//HIDDEN SEARCH AREA
	$(".i_search a").click(function () {
		$(this).toggleClass("search_active");
		$(".form_search").slideToggle("fast");
		$("input").css({
			opacity: "1"
		})
	});
	//END HIDDEN SEARCH AREA

	//MINUS AND PLUS ICON INPUT
	$(".number_quantity").each(function () {
		function a() {
			1 == b ? $(c).find(".minus").addClass("m_disabled") : $(c).find(".minus").removeClass("m_disabled")
		}
		var b = $(this).find(".quantity").val(),
				c = $(this);
		a();
		$(c).find(".minus").click(function () {
			1 < b && (--b, $(c).find(".quantity").attr("value", b));
			a()
		});
		$(c).find(".plus").click(function () {
			b++;
			$(c).find(".quantity").attr("value", b);
			a()
		})
	});
	//END MINUS AND PLUS ICON INPUT

	//SPLIT TEXT
	jQuery.fn.extend({gonoSplitFn:function(b){var a=this;a.init=function(){if("split"==b){var c="",d=$(this).html().split("<br>");for(i=0;i<d.length;i++)c+=d[i].trim().replace(/[\S\s]/g,' <span style="'+opacity+'">$&</span>')+"<br>";return $(a).html(c)}"slowDown"==b&&($(a).attr("data-ani","zoomFlexibility"),$(a).AniView({animateThreshold:100,scrollPollInterval:50}))};a.init()}});
	//$(".element_need_split").gonoSplitFn("split");
	//END SPLIT TEXT

	//CHANGE COLOR IMG .SVG
	jQuery("img.svg").each(function() {
		var b = jQuery(this),
			c = b.attr("id"),
			d = b.attr("class"),
			e = b.attr("src");
		jQuery.get(e, function(a) {
			a = jQuery(a).find("svg");
			"undefined" !== typeof c && (a = a.attr("id", c));
			"undefined" !== typeof d && (a = a.attr("class", d + " replaced-svg"));
			a = a.removeAttr("xmlns:a");
			!a.attr("viewBox") && a.attr("height") && a.attr("width") && a.attr("viewBox", "0 0 " + a.attr("height") + " " + a.attr("width"));
			b.replaceWith(a)
		}, "xml")
	});
	//END CHANGE COLOR IMG .SVG

	//HIDDEN INPUT
	$(".checkboxct input").change(function (a) {
		if ($(this).is(":checked")) $(".showinput").slideDown("fast");
		else {
			var b = $(".checkboxct input").size(),
				c = 0;
			$(".checkboxct input").each(function (a) {
				$(this).is(":checked") ? $(".showinput").slideDown("fast") : c++;
				b == c && $(".showinput").slideUp("fast")
			})
		}
	});
	//END HIDDEN INPUT

	//HOVER CHANGE IMG
	$(".hoverimg > li a").mouseover(function (a) {
		$(this).find("img").attr("src", $(this).find("img").attr("src").replace("_off", "_on"))
	}).mouseout(function (a) {
		$(this).find("img").attr("src", $(this).find("img").attr("src").replace("_on", "_off"))
	});
	//END HOVER CHANGE IMG

	//SWAP_IMAGE
	$(".pagiclick li img").each(function(b){$(this).on("click",function(){$(window).scrollTop();$("#offsettop");var a=$(this).attr("id");$(this).parent().addClass("active").siblings().removeClass("active");$(".fade"+a).attr("src")!==$(this).attr("src")&&$(".fade"+a).css("display","none").attr("src",$(this).attr("src")).fadeIn(700)})});
	//END SWAP_IMAGE

	//FIX SCROLL WHEN HEADER FIX
	var heightHD = $('header').outerHeight();
	$('.archorlink').each(function(){
		$(this).css({
			'padding-top' : heightHD+10,
			'margin-top'  : -heightHD
		});
	})
	//END FIX SCROLL WHEN HEADER FIX

	//BACKTO TOP
	if ($('.page_top_cont').length) {
		var scrollTrigger = 300, // px
		// scroll to display and automatic hide BACK TO TOP after (x) second
		hideTimeout = 0,
		backToTop = function (second) {
		var scrollTop = $(window).scrollTop();
			if (scrollTop > scrollTrigger) {
				if (second && second > 0) {
					clearTimeout(hideTimeout);
					hideTimeout = setTimeout(function(){
						$('.page_top_cont').fadeOut();
					}, second * 1000);
				}
				$('.page_top_cont').fadeIn();
			} else {
				$('.page_top_cont').fadeOut();
			}
		};
		backToTop(5);
		$(window).on('scroll', function () {
			backToTop(5);
		});
		$('.page_top_cont').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
	//END BACKTO TOP
});

//LOAD FUNCTION ------------------------------------------------
function load_function() {
	pageReload();
	smartRollover();
	flexFont();
	accordion();
	linkAnchor();
	menuTrigger()
};

//CREAT FUNCTION ------------------------------------------------

//RELOAD PAGE WHEN CHANGE VIEWPORT PC <=> SP
function pageReload() {
	var a;
	var b = viewportW > viewportSP ? "is_pc" : "is_smp";
	jQuery(window).resize(function () {
		viewportW = jQuery(window).width();
		a = viewportW > viewportSP ? "is_pc" : "is_smp";
		b != a && (window.location.href = window.location.href)
	}).resize()
}
//END RELOAD PAGE WHEN CHANGE VIEWPORT PC <=> SP	

//CHANGE IMG WHEN HOVER
function smartRollover() {
	if (document.getElementsByTagName)
		for (var a = document.getElementsByTagName("img"), b = 0; b < a.length; b++) a[b].src.match("_off.") && (a[b].onmouseover = function () {
			this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."))
		}, a[b].onmouseout = function () {
			this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."))
		})
}
window.addEventListener ? window.addEventListener("load", smartRollover, !1) : window.attachEvent && window.attachEvent("onload", smartRollover);
//END CHANGE IMG WHEN HOVER

//FLEXIBLE FONTSIZE
function flexFont() {
	for (var a = $(".flexFont"), b = 0; b < a.length; b++) a[b].style.fontSize = .05 * a[b].offsetWidth + "px"
}
//END FLEXIBLE FONTSIZE

//LINK ANCHOR
function linkAnchor() {
	$("a[href*=#]:not([href=#]).anchor").click(function () {
		if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var a = $(this.hash);
			a = a.length ? a : $("[name=" + this.hash.slice(1) + "]");
			if (a.length) return $("html,body").animate({
				scrollTop: a.offset().top
			}, 300), !1
		}
	})
}
//END LINK ANCHOR

//ACCORDION BOX
function accordion() {
	$(".acr_title").on("click", function (a) {
    a.preventDefault();
    a = $(this);
    var b = a.next(".acr_con");
    a.toggleClass("open");
    b.slideToggle(250);
  });
}
//END ACCORDION BOX

//MENU CLICK
function menuTrigger() {
	$(".hamburger").click(function () {
		$(this).toggleClass("active");
		$(".nav").toggleClass("show")
	})
}
//END MENU CLICK

//FIX HEIGHT ELEMENT
//use element.tile(columns)
(function (a) {
	a.fn.tile = function (b) {
		var c, e, f, g, h = this.length - 1, d;
		b || (b = this.length);
		this.each(function () {
			d = this.style;
			d.removeProperty && d.removeProperty("height");
			d.removeAttribute && d.removeAttribute("height")
		});
		return this.each(function (d) {
			f = d % b;
			0 == f && (c = []);
			c[f] = a(this);
			g = c[f].height();
			if (0 == f || g > e) e = g;
			d != h && f != b - 1 || a.each(c, function () {
				this.height(e)
			})
		})
	}
})(jQuery);
//END FIX HEIGHT ELEMENT

//DETECT IHONE VERSION
function iPhoneVersion() {
	var a = window.screen.height,
			b = window.screen.width;
	return 320 === b && 480 === a ? "4" : 320 === b && 568 === a ? "5" : 375 === b && 667 === a ? "6" : 414 === b && 736 === a ? "Plus" : 375 === b && 812 === a ? "X" : "none"
};
//END DETECT IHONE VERSION

//NAV MENU
function navmenu(parentClass, type) {
	if (type == 'click') {
		var navClass = parentClass + ' .menu-item-has-children > a';
		if (viewportW > 961){
			$(navClass).eq(0).addClass('open');
		}
		$(navClass).on("click", function (a) {
			a.preventDefault();
			a = $(this);
			var b = a.next(".childmenu");
			$(navClass).not(a).removeClass("open");
			$(".childmenu").not(a.next()).slideUp("fast");
			a.toggleClass("open");
			b.slideToggle(250)
		});

		windowheight = $(window).height();
		eleh = $('.nav__inside__list').height();
		$('.nav__inside__list').css({'overflow-y':'scroll', 'height':windowheight});
	} else if (type == 'hover'){
		var navClass = parentClass + ' .menu-item-has-children';
		$(navClass).on({
			mouseenter: function () {
				var e = $("#nav").outerHeight();
				$(this).find(".childmenu").css("top", e).stop(!0, !0).delay(100).slideDown(200), $(this).addClass("is-act")
			},
			mouseleave: function () {
				$(this).find(".childmenu").stop(!0, !0).delay(100).slideUp(200), $(this).removeClass("is-act")
			}
		})
	}
}

if (viewportW > 751){
	// navmenu('.navaside', 'click');
	if( $('body').hasClass('navstate_show') ){
		navmenu('.navstate_show .navheader', 'hover');
	} else {
		navmenu('.navstate_hide .navheader', 'click');
	}
}

if (viewportW < 750){
	// navmenu('.navaside', 'click');
	navmenu('.navheader', 'click');
}
//END NAV MENU

$('.colsame h3').click(function(){
	if($(this).next('ul').hasClass('opendi')){
		$('.colsame ul').removeClass('opendi');
	   $(this).next('ul').removeClass('opendi');
		$(this).removeClass('minusdi');
	}else {
		$('.colsame ul').removeClass('opendi');
		$(this).next('ul').addClass('opendi'); 
		$('.colsame h3').removeClass('minusdi');
		$(this).addClass('minusdi');
	}
});

//FIX SQUARE
jQuery(window).resize(function () {
	$('.boxsquare').each(function(){
		var wbox = $(this).outerWidth();	
		$(this).css({'height':wbox}); 
	})
}).resize();
//END FIX SQUARE

//DETECT SRCOLL FOOTER
// $(window).bind('scroll', function(e){
// 	var htmlheight = Math.max($(document).height(), $(window).height());
// 	if ($(window).scrollTop() == 0) {
// 		$('.flowbrn_sp').css('bottom','-100%');
// 	} else {
// 		$('.over_500 .flowbrn_sp').css('bottom','10px');
// 	}
// 	if($(window).scrollTop() + window.innerHeight >= htmlheight){
// 		$('.over_500 .flowbrn_sp').css('bottom','60px');
// 	}
// });
//END DETECT SRCOLL FOOTER


//Tabs

$('.tabs').each(function(i, element){
	var thiz = $(this);
	thiz.find('.nav-item a').click(function(e){
		e.preventDefault();
		const href = $(this).attr('href');
		thiz.find('.nav-item a').removeClass('active');
		$(this).addClass('active');
		thiz.find('.tab-pane').removeClass('active');
		$(href).addClass('active');
	})
})


//custom
$(document).ready(function(){
	setTimeout(() => {
		$('body').addClass('nav-active');
	}, 1000);
	$('.vusion01-section .row h2').tile(4);
})




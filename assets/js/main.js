/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start 
/*-----------------------------------------------------------------------------------*/
$(document).ready(function($) {
	
	"use strict"
	/*-----------------------------------------------------------------------------------*/
	/* 	LOADER
	/*-----------------------------------------------------------------------------------*/
	
	$("#loader").delay(500).fadeOut("slow");
	
	/*-----------------------------------------------------------------------------------*/
	/* 		WORK FILTER
	/*-----------------------------------------------------------------------------------*/
	
	var $container = $('.portfolio-wrapper .items');
	   $container.imagesLoaded(function () {
	   $container.isotope({
	   itemSelector: '.item',
	   layoutMode: 'fitRows'
	  });
	});
	$('.filter li a').on("click",function () {
	   $('.filter li a').removeClass('active');
	   $(this).addClass('active');
	   var selector = $(this).attr('data-filter');
	   $container.isotope({
	   filter: selector
	   });
	   return false;
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* 	SLIDER REVOLUTION
	/*-----------------------------------------------------------------------------------*/
	
	jQuery('.tp-banner').show().revolution({
		dottedOverlay:"none",
		delay:10000,
		/* startwidth:1920,
		startheight:800, */
		navigationType:"bullet",
		navigationArrows:"solo",
		navigation: {
			keyboardNavigation:"off",
			keyboard_direction: "horizontal",
			mouseScrollNavigation:"off",
			onHoverStop:"off",
			arrows: {
				style:"erinyen",
				enable:true,
				hide_onmobile:true,
				hide_under:600,
				hide_onleave:true,
				hide_delay:200,
				hide_delay_mobile:1200,
				tmp:'',
				left: {
					h_align:"left",
					v_align:"center",
					h_offset:0,
					v_offset:0
				},
				right: {
					h_align:"right",
					v_align:"center",
					h_offset:0,
					v_offset:0
				}
			}
		},
		navigationStyle:"preview4",
		parallax:"mouse",
		parallaxBgFreeze:"on",
		parallaxLevels:[7,4,3,2,5,4,3,2,1,0],												
		keyboardNavigation:"on",						
		shadow:0,
		fullWidth:"on",
		fullScreen:"off",
		shuffle:"off",						
		autoHeight:"off",						
		forceFullWidth:"off",	
		fullScreenOffsetContainer:"",
		responsiveLevels:[1920,1025,768,480],
		gridwidth:[1920,1025,768,480],
		gridheight:[800,700,550,400]
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* Pretty Photo
	/*-----------------------------------------------------------------------------------*/
	
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		theme: "light_square"
	});

	/*-----------------------------------------------------------------------------------*/
	/* 	TESTIMONIAL SLIDER
	/*-----------------------------------------------------------------------------------*/
	
	$(".single-slide").owlCarousel({ 
		items : 1,
		autoplay:true,
		loop:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		singleItem	: true,
		navigation : true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		pagination : true,
		animateOut: 'fadeOut'	
	});

	$('.testi-two').owlCarousel({
		loop:true,
		margin:30,
		nav:true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			800:{
				items:2
			},
			1000:{
				items:2
			}
		}
	});
	
	/*-----------------------------------------------------------------------------------*/
	/* 		Active Menu Item on Page Scroll
	/*-----------------------------------------------------------------------------------*/
	
	$(window).scroll(function(event) {
		Scroll();
	});	
	
	$('.scroll a').on("click",function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top -0}, 1000);
			return false;
	});
	
	// User define function
	function Scroll() {
		var contentTop      =   [];
		var contentBottom   =   [];
		var winTop      =   $(window).scrollTop();
		var rangeTop    =   0;
		var rangeBottom =   1000;
		$('nav').find('.scroll a').each(function(){
			contentTop.push( $( $(this).attr('href') ).offset().top);
				contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
		})
		$.each( contentTop, function(i){
			if ( winTop > contentTop[i] - rangeTop ){
				$('nav li.scroll')
				  .removeClass('active')
					.eq(i).addClass('active');			
			}
		}  
	)};
	
});

/*-----------------------------------------------------------------------------------*/
/*    CONTACT FORM
/*-----------------------------------------------------------------------------------*/

	function checkmail(input){
	  var pattern1=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(pattern1.test(input)){ return true; }else{ return false; }
	}
	
    function proceed(){
    	var name = document.getElementById("name");
		var email = document.getElementById("email");
		var company = document.getElementById("company");
		var web = document.getElementById("website");
		var msg = document.getElementById("message");
		var errors = "";
		
		if(name.value == ""){ 
			name.className = 'error';
			return false;
		} else if(email.value == ""){
			email.className = 'error';
			return false;
		} else if(checkmail(email.value)==false){
		    alert('Please provide a valid email address.');
		    return false;}
		    else if(company.value == ""){
		        company.className = 'error';
		        return false;}
		   else if(web.value == ""){
		        web.className = 'error';
		        return false;}
		   else if(msg.value == ""){
		        msg.className = 'error';
		        return false;}
		   else 
		  {
$.ajax({
	type: "POST",
	url: "php/submit.php",
	data: $("#contact_form").serialize(),
	success: function(msg){
	//alert(msg);
    if(msg){
		$('#contact_form').fadeOut(1000);
        $('#contact_message').fadeIn(1000);
        	document.getElementById("contact_message");
         return true;
        }}});
}};


/*-----------------------------------------------------------------------------------*/
/*    CONTACT Map
/*-----------------------------------------------------------------------------------*/
var map;
function initialize_map() {
if ($('#map').length) {
  var myLatLng = new google.maps.LatLng(28.477879,-81.397057);
  var mapOptions = {
    zoom: 17,
    center: myLatLng,
    scrollwheel: false,
    panControl: false,
    zoomControl: true,
    scaleControl: false,
    mapTypeControl: false,
    streetViewControl: false
};
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    tittle: 'Movers',
    icon: './images/map-locator.png'
});} 
else {
  return false;
}}
google.maps.event.addDomListener(window, 'load', initialize_map);



/*-----------------------------------------------------------------------------------*/
/*    Add Review
/*-----------------------------------------------------------------------------------*/

(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

	$('#new-review').autosize({append: "\n"});

	var reviewBox = $('#post-review-box');
	var newReview = $('#new-review');
	var openReviewBtn = $('#open-review-box');
	var closeReviewBtn = $('#close-review-box');
	var ratingsField = $('#ratings-hidden');

	openReviewBtn.click(function(e)
	{
		reviewBox.slideDown(400, function()
		{
			$('#new-review').trigger('autosize.resize');
			newReview.focus();
		});
		openReviewBtn.fadeOut(100);
		closeReviewBtn.show();
	});

	closeReviewBtn.click(function(e)
	{
		e.preventDefault();
		reviewBox.slideUp(300, function()
		{
			newReview.focus();
			openReviewBtn.fadeIn(200);
		});
		closeReviewBtn.hide();

	});
});

/*-----------------------------------------------------------------------------------*/
/*    Add Rating
/*-----------------------------------------------------------------------------------*/

!function (e) {
	"use strict";
	"function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof module && module.exports ? module.exports = e(require("jquery")) : e(window.jQuery)
}

(function (e) {
	"use strict";
	e.fn.ratingLocales = {}, e.fn.ratingThemes = {};
	var t, a;
	t = {
		NAMESPACE: ".rating", DEFAULT_MIN: 0, DEFAULT_MAX: 5, DEFAULT_STEP: .5, isEmpty: function (t, a) {
			return null === t || void 0 === t || 0 === t.length || a && "" === e.trim(t)
		}, getCss: function (e, t) {
			return e ? " " + t : ""
		}, addCss: function (e, t) {
			e.removeClass(t).addClass(t)
		}, getDecimalPlaces: function (e) {
			var t = ("" + e).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
			return t ? Math.max(0, (t[1] ? t[1].length : 0) - (t[2] ? +t[2] : 0)) : 0
		}, applyPrecision: function (e, t) {
			return parseFloat(e.toFixed(t))
		}, handler: function (e, a, n, r, i) {
			var l = i ? a : a.split(" ").join(t.NAMESPACE + " ") + t.NAMESPACE;
			r || e.off(l), e.on(l, n)
		}
	}, a = function (t, a) {
		var n = this;
		n.$element = e(t), n._init(a)
	}, a.prototype = {
		constructor: a, _parseAttr: function (e, a) {
			var n, r, i, l, s = this, o = s.$element, c = o.attr("type");
			if ("range" === c || "number" === c) {
				switch (r = a[e] || o.data(e) || o.attr(e), e) {
					case"min":
						i = t.DEFAULT_MIN;
						break;
					case"max":
						i = t.DEFAULT_MAX;
						break;
					default:
						i = t.DEFAULT_STEP
				}
				n = t.isEmpty(r) ? i : r, l = parseFloat(n)
			} else l = parseFloat(a[e]);
			return isNaN(l) ? i : l
		}, _parseValue: function (e) {
			var t = this, a = parseFloat(e);
			return isNaN(a) && (a = t.clearValue), !t.zeroAsNull || 0 !== a && "0" !== a ? a : null
		}, _setDefault: function (e, a) {
			var n = this;
			t.isEmpty(n[e]) && (n[e] = a)
		}, _initSlider: function (e) {
			var a = this, n = a.$element.val();
			a.initialValue = t.isEmpty(n) ? 0 : n, a._setDefault("min", a._parseAttr("min", e)), a._setDefault("max", a._parseAttr("max", e)), a._setDefault("step", a._parseAttr("step", e)), (isNaN(a.min) || t.isEmpty(a.min)) && (a.min = t.DEFAULT_MIN), (isNaN(a.max) || t.isEmpty(a.max)) && (a.max = t.DEFAULT_MAX), (isNaN(a.step) || t.isEmpty(a.step) || 0 === a.step) && (a.step = t.DEFAULT_STEP), a.diff = a.max - a.min
		}, _initHighlight: function (e) {
			var t, a = this, n = a._getCaption();
			e || (e = a.$element.val()), t = a.getWidthFromValue(e) + "%", a.$filledStars.width(t), a.cache = {
				caption: n,
				width: t,
				val: e
			}
		}, _getContainerCss: function () {
			var e = this;
			return "rating-container" + t.getCss(e.theme, "theme-" + e.theme) + t.getCss(e.rtl, "rating-rtl") + t.getCss(e.size, "rating-" + e.size) + t.getCss(e.animate, "rating-animate") + t.getCss(e.disabled || e.readonly, "rating-disabled") + t.getCss(e.containerClass, e.containerClass)
		}, _checkDisabled: function () {
			var e = this, t = e.$element, a = e.options;
			e.disabled = void 0 === a.disabled ? t.attr("disabled") || !1 : a.disabled, e.readonly = void 0 === a.readonly ? t.attr("readonly") || !1 : a.readonly, e.inactive = e.disabled || e.readonly, t.attr({
				disabled: e.disabled,
				readonly: e.readonly
			})
		}, _addContent: function (e, t) {
			var a = this, n = a.$container, r = "clear" === e;
			return a.rtl ? r ? n.append(t) : n.prepend(t) : r ? n.prepend(t) : n.append(t)
		}, _generateRating: function () {
			var a, n, r, i = this, l = i.$element;
			n = i.$container = e(document.createElement("div")).insertBefore(l), t.addCss(n, i._getContainerCss()), i.$rating = a = e(document.createElement("div")).attr("class", "rating-stars").appendTo(n).append(i._getStars("empty")).append(i._getStars("filled")), i.$emptyStars = a.find(".empty-stars"), i.$filledStars = a.find(".filled-stars"), i._renderCaption(), i._renderClear(), i._initHighlight(), n.append(l), i.rtl && (r = Math.max(i.$emptyStars.outerWidth(), i.$filledStars.outerWidth()), i.$emptyStars.width(r)), l.appendTo(a)
		}, _getCaption: function () {
			var e = this;
			return e.$caption && e.$caption.length ? e.$caption.html() : e.defaultCaption
		}, _setCaption: function (e) {
			var t = this;
			t.$caption && t.$caption.length && t.$caption.html(e)
		}, _renderCaption: function () {
			var a, n = this, r = n.$element.val(), i = n.captionElement ? e(n.captionElement) : "";
			if (n.showCaption) {
				if (a = n.fetchCaption(r), i && i.length) return t.addCss(i, "caption"), i.html(a), void (n.$caption = i);
				n._addContent("caption", '<div class="caption">' + a + "</div>"), n.$caption = n.$container.find(".caption")
			}
		}, _renderClear: function () {
			var a, n = this, r = n.clearElement ? e(n.clearElement) : "";
			if (n.showClear) {
				if (a = n._getClearClass(), r.length) return t.addCss(r, a), r.attr({title: n.clearButtonTitle}).html(n.clearButton), void (n.$clear = r);
				n._addContent("clear", '<div class="' + a + '" title="' + n.clearButtonTitle + '">' + n.clearButton + "</div>"), n.$clear = n.$container.find("." + n.clearButtonBaseClass)
			}
		}, _getClearClass: function () {
			var e = this;
			return e.clearButtonBaseClass + " " + (e.inactive ? "" : e.clearButtonActiveClass)
		}, _toggleHover: function (e) {
			var t, a, n, r = this;
			e && (r.hoverChangeStars && (t = r.getWidthFromValue(r.clearValue), a = e.val <= r.clearValue ? t + "%" : e.width, r.$filledStars.css("width", a)), r.hoverChangeCaption && (n = e.val <= r.clearValue ? r.fetchCaption(r.clearValue) : e.caption, n && r._setCaption(n + "")))
		}, _init: function (t) {
			var a, n = this, r = n.$element.addClass("rating-input");
			return n.options = t, e.each(t, function (e, t) {
				n[e] = t
			}), (n.rtl || "rtl" === r.attr("dir")) && (n.rtl = !0, r.attr("dir", "rtl")), n.starClicked = !1, n.clearClicked = !1, n._initSlider(t), n._checkDisabled(), n.displayOnly && (n.inactive = !0, n.showClear = !1, n.showCaption = !1), n._generateRating(), n._initEvents(), n._listen(), a = n._parseValue(r.val()), r.val(a), r.removeClass("rating-loading")
		}, _initEvents: function () {
			var e = this;
			e.events = {
				_getTouchPosition: function (a) {
					var n = t.isEmpty(a.pageX) ? a.originalEvent.touches[0].pageX : a.pageX;
					return n - e.$rating.offset().left
				}, _listenClick: function (e, t) {
					return e.stopPropagation(), e.preventDefault(), e.handled === !0 ? !1 : (t(e), void (e.handled = !0))
				}, _noMouseAction: function (t) {
					return !e.hoverEnabled || e.inactive || t && t.isDefaultPrevented()
				}, initTouch: function (a) {
					var n, r, i, l, s, o, c, u, d = e.clearValue || 0,
						p = "ontouchstart" in window || window.DocumentTouch && document instanceof window.DocumentTouch;
					p && !e.inactive && (n = a.originalEvent, r = t.isEmpty(n.touches) ? n.changedTouches : n.touches, i = e.events._getTouchPosition(r[0]), "touchend" === a.type ? (e._setStars(i), u = [e.$element.val(), e._getCaption()], e.$element.trigger("change").trigger("rating.change", u), e.starClicked = !0) : (l = e.calculate(i), s = l.val <= d ? e.fetchCaption(d) : l.caption, o = e.getWidthFromValue(d), c = l.val <= d ? o + "%" : l.width, e._setCaption(s), e.$filledStars.css("width", c)))
				}, starClick: function (t) {
					var a, n;
					e.events._listenClick(t, function (t) {
						return e.inactive ? !1 : (a = e.events._getTouchPosition(t), e._setStars(a), n = [e.$element.val(), e._getCaption()], e.$element.trigger("change").trigger("rating.change", n), void (e.starClicked = !0))
					})
				}, clearClick: function (t) {
					e.events._listenClick(t, function () {
						e.inactive || (e.clear(), e.clearClicked = !0)
					})
				}, starMouseMove: function (t) {
					var a, n;
					e.events._noMouseAction(t) || (e.starClicked = !1, a = e.events._getTouchPosition(t), n = e.calculate(a), e._toggleHover(n), e.$element.trigger("rating.hover", [n.val, n.caption, "stars"]))
				}, starMouseLeave: function (t) {
					var a;
					e.events._noMouseAction(t) || e.starClicked || (a = e.cache, e._toggleHover(a), e.$element.trigger("rating.hoverleave", ["stars"]))
				}, clearMouseMove: function (t) {
					var a, n, r, i;
					!e.events._noMouseAction(t) && e.hoverOnClear && (e.clearClicked = !1, a = '<span class="' + e.clearCaptionClass + '">' + e.clearCaption + "</span>", n = e.clearValue, r = e.getWidthFromValue(n) || 0, i = {
						caption: a,
						width: r,
						val: n
					}, e._toggleHover(i), e.$element.trigger("rating.hover", [n, a, "clear"]))
				}, clearMouseLeave: function (t) {
					var a;
					e.events._noMouseAction(t) || e.clearClicked || !e.hoverOnClear || (a = e.cache, e._toggleHover(a), e.$element.trigger("rating.hoverleave", ["clear"]))
				}, resetForm: function (t) {
					t && t.isDefaultPrevented() || e.inactive || e.reset()
				}
			}
		}, _listen: function () {
			var a = this, n = a.$element, r = n.closest("form"), i = a.$rating, l = a.$clear, s = a.events;
			return t.handler(i, "touchstart touchmove touchend", e.proxy(s.initTouch, a)), t.handler(i, "click touchstart", e.proxy(s.starClick, a)), t.handler(i, "mousemove", e.proxy(s.starMouseMove, a)), t.handler(i, "mouseleave", e.proxy(s.starMouseLeave, a)), a.showClear && l.length && (t.handler(l, "click touchstart", e.proxy(s.clearClick, a)), t.handler(l, "mousemove", e.proxy(s.clearMouseMove, a)), t.handler(l, "mouseleave", e.proxy(s.clearMouseLeave, a))), r.length && t.handler(r, "reset", e.proxy(s.resetForm, a), !0), n
		}, _getStars: function (e) {
			var t, a = this, n = '<span class="' + e + '-stars">';
			for (t = 1; t <= a.stars; t++) n += '<span class="star">' + a[e + "Star"] + "</span>";
			return n + "</span>"
		}, _setStars: function (e) {
			var t = this, a = arguments.length ? t.calculate(e) : t.calculate(), n = t.$element,
				r = t._parseValue(a.val);
			return n.val(r), t.$filledStars.css("width", a.width), t._setCaption(a.caption), t.cache = a, n
		}, showStars: function (e) {
			var t = this, a = t._parseValue(e);
			return t.$element.val(a), t._setStars()
		}, calculate: function (e) {
			var a = this, n = t.isEmpty(a.$element.val()) ? 0 : a.$element.val(),
				r = arguments.length ? a.getValueFromPosition(e) : n, i = a.fetchCaption(r),
				l = a.getWidthFromValue(r);
			return l += "%", {caption: i, width: l, val: r}
		}, getValueFromPosition: function (e) {
			var a, n, r = this, i = t.getDecimalPlaces(r.step), l = r.$rating.width();
			return n = r.diff * e / (l * r.step), n = r.rtl ? Math.floor(n) : Math.ceil(n), a = t.applyPrecision(parseFloat(r.min + n * r.step), i), a = Math.max(Math.min(a, r.max), r.min), r.rtl ? r.max - a : a
		}, getWidthFromValue: function (e) {
			var t, a, n = this, r = n.min, i = n.max, l = n.$emptyStars;
			return !e || r >= e || r === i ? 0 : (a = l.outerWidth(), t = a ? l.width() / a : 1, e >= i ? 100 : (e - r) * t * 100 / (i - r))
		}, fetchCaption: function (e) {
			var a, n, r, i, l, s = this, o = parseFloat(e) || s.clearValue, c = s.starCaptions,
				u = s.starCaptionClasses;
			return o && o !== s.clearValue && (o = t.applyPrecision(o, t.getDecimalPlaces(s.step))), i = "function" == typeof u ? u(o) : u[o], r = "function" == typeof c ? c(o) : c[o], n = t.isEmpty(r) ? s.defaultCaption.replace(/\{rating}/g, o) : r, a = t.isEmpty(i) ? s.clearCaptionClass : i, l = o === s.clearValue ? s.clearCaption : n, '<span class="' + a + '">' + l + "</span>"
		}, destroy: function () {
			var a = this, n = a.$element;
			return t.isEmpty(a.$container) || a.$container.before(n).remove(), e.removeData(n.get(0)), n.off("rating").removeClass("rating rating-input")
		}, create: function (e) {
			var t = this, a = e || t.options || {};
			return t.destroy().rating(a)
		}, clear: function () {
			var e = this, t = '<span class="' + e.clearCaptionClass + '">' + e.clearCaption + "</span>";
			return e.inactive || e._setCaption(t), e.showStars(e.clearValue).trigger("change").trigger("rating.clear")
		}, reset: function () {
			var e = this;
			return e.showStars(e.initialValue).trigger("rating.reset")
		}, update: function (e) {
			var t = this;
			return arguments.length ? t.showStars(e) : t.$element
		}, refresh: function (t) {
			var a = this, n = a.$element;
			return t ? a.destroy().rating(e.extend(!0, a.options, t)).trigger("rating.refresh") : n
		}
	}, e.fn.rating = function (n) {
		var r = Array.apply(null, arguments), i = [];
		switch (r.shift(), this.each(function () {
			var l, s = e(this), o = s.data("rating"), c = "object" == typeof n && n,
				u = c.theme || s.data("theme"), d = c.language || s.data("language") || "en", p = {}, h = {};
			o || (u && (p = e.fn.ratingThemes[u] || {}), "en" === d || t.isEmpty(e.fn.ratingLocales[d]) || (h = e.fn.ratingLocales[d]), l = e.extend(!0, {}, e.fn.rating.defaults, p, e.fn.ratingLocales.en, h, c, s.data()), o = new a(this, l), s.data("rating", o)), "string" == typeof n && i.push(o[n].apply(o, r))
		}), i.length) {
			case 0:
				return this;
			case 1:
				return void 0 === i[0] ? this : i[0];
			default:
				return i
		}
	}, e.fn.rating.defaults = {
		theme: "",
		language: "en",
		stars: 5,
		filledStar: '<i class="glyphicon glyphicon-star"></i>',
		emptyStar: '<i class="glyphicon glyphicon-star-empty"></i>',
		containerClass: "",
		size: "md",
		animate: !0,
		displayOnly: !1,
		rtl: !1,
		showClear: !0,
		showCaption: !0,
		starCaptionClasses: {
			.5: "label label-danger",
			1: "label label-danger",
			1.5: "label label-warning",
			2: "label label-warning",
			2.5: "label label-info",
			3: "label label-info",
			3.5: "label label-primary",
			4: "label label-primary",
			4.5: "label label-success",
			5: "label label-success"
		},
		clearButton: '<i class="glyphicon glyphicon-minus-sign"></i>',
		clearButtonBaseClass: "clear-rating",
		clearButtonActiveClass: "clear-rating-active",
		clearCaptionClass: "label label-default",
		clearValue: null,
		captionElement: null,
		clearElement: null,
		hoverEnabled: !0,
		hoverChangeCaption: !0,
		hoverChangeStars: !0,
		hoverOnClear: !0,
		zeroAsNull: !0
	}, e.fn.ratingLocales.en = {
		defaultCaption: "{rating} Stars",
		starCaptions: {
			.5: "Half Star",
			1: "One Star",
			1.5: "One & Half Star",
			2: "Two Stars",
			2.5: "Two & Half Stars",
			3: "Three Stars",
			3.5: "Three & Half Stars",
			4: "Four Stars",
			4.5: "Four & Half Stars",
			5: "Five Stars"
		},
		clearButtonTitle: "Clear",
		clearCaption: "Not Rated"
	}, e.fn.rating.Constructor = a, e(document).ready(function () {
		var t = e("input.rating");
		t.length && t.removeClass("rating-loading").addClass("rating-loading").rating()
	})
});


/*-----------------------------------------------------------------------------------*/
/*    Added Rating
/*-----------------------------------------------------------------------------------*/
/*Ratings*/
!function(t){function a(a,r){t('.raterater-input[data-id="'+a+'"]').data("input").val(r).change()}function r(){g.each(function(){var a=t(this);if(p.mode==u&&("INPUT"==a.prop("tagName")||"SELECT"==a.prop("tagName"))){var r="input-"+y++,e=t('<div class="raterater-input"></div>').attr("data-id",r).attr("data-rating",a.val()).data("input",a);a.attr("data-id",r).attr("data-id",r).attr("data-rating",a.val()).data("input",a).after(e).hide(),l=a=e}l=a;var s=c(a);if(!s)throw"Error: Each raterater element needs a unique data-id attribute.";f[s]={state:"inactive",stars:null},"static"===a.css("position")&&a.css("position","relative"),a.addClass("raterater-wrapper"),a.html(""),t.each(["bg","hover","rating","outline","cover"],function(){a.append(' <div class="raterater-layer raterater-'+this+'-layer"></div>')});for(var n=0;n<p.numStars;n++)a.children(".raterater-bg-layer").first().append('<i class="fa fa-star"></i>'),a.children(".raterater-outline-layer").first().append('<i class="fa fa-star-o"></i>'),a.children(".raterater-hover-layer").first().append('<i class="fa fa-star"></i>'),a.children(".raterater-rating-layer").first().append('<i class="fa fa-star"></i>');p.isStatic||(a.find(".raterater-cover-layer").hover(o,h),a.find(".raterater-cover-layer").mousemove(d),a.find(".raterater-cover-layer").click(i))})}function e(){g.each(function(){var a;a=p.mode==u?t(this).parent().find('.raterater-input[data-id="'+c(this)+'"]'):t(this);var r=(c(a),p.width+"px"),e=Math.floor(p.starWidth/p.starAspect)+"px";a.css("width",r).css("height",e),a.find(".raterater-layer").each(function(){t(this).css("width",r).css("height",e)});for(var i=0;i<p.numStars;i++)t.each(["bg","hover","rating","outline"],function(){a.children(".raterater-"+this+"-layer").first().children("i").eq(i).css("left",i*(p.starWidth+p.spaceWidth)+"px").css("font-size",Math.floor(p.starWidth/p.starAspect)+"px")});var s=parseFloat(a.attr("data-rating")),d=Math.floor(s),o=s-d;n(a.find(".raterater-rating-layer").first(),d,o)})}function i(r){var e=t(r.target).parent(),i=c(e),s=f[i].whole_stars_hover+f[i].partial_star_hover;s=Math.round(100*s)/100,f[i].state="rated",f[i].stars=s,e.find(".raterater-hover-layer").addClass("rated"),"input"!=p.mode&&void 0!==window[p.submitFunction]&&"function"==typeof window[p.submitFunction]?window[p.submitFunction](i,s):a(i,s)}function s(t,a){var r=Math.floor(t/(p.starWidth+p.spaceWidth)),e=t-r*(p.starWidth+p.spaceWidth);if(e>p.starWidth&&(e=p.starWidth),e/=p.starWidth,p.step!==!1){var i=1/p.step;e=Math.round(e*i)/i}f[a].whole_stars_hover=r,f[a].partial_star_hover=e}function n(t,a,r){for(var e=(c(t.parent()),0);a>e;e++)t.find("i").eq(e).css("width",p.starWidth+"px");t.find("i").eq(a).css("width",p.starWidth*r+"px");for(var e=a+1;e<p.numStars;e++)t.find("i").eq(e).css("width","0px")}function d(a){var r=c(t(a.target).parent());if("hover"===f[r].state){var e=a.offsetX;void 0===e&&(e=a.pageX-t(a.target).offset().left),f[r].stars=s(e,r);var i=t(a.target).parent().children(".raterater-hover-layer").first();n(i,f[r].whole_stars_hover,f[r].partial_star_hover)}}function o(a){var r=c(t(a.target).parent());("rated"!==f[r].state||p.allowChange)&&(f[r].state="hover",t(a.target).parent().children(".raterater-rating-layer").first().css("display","none"),t(a.target).parent().children(".raterater-hover-layer").first().css("display","block"))}function h(a){var r=t(a.target).parent(),e=c(r);if(t(a.target).parent().children(".raterater-hover-layer").first().css("display","none"),t(a.target).parent().children(".raterater-rating-layer").first().css("display","block"),"rated"===f[e].state){var i=parseFloat(f[e].stars),s=Math.floor(i),d=i-s;return void n(r.find(".raterater-rating-layer").first(),s,d)}f[e].state="inactive"}function c(a){return t(a).attr("data-id")}var l,f={},p={},u="input",v="callback",g=null,y=0;t.fn.raterater=function(a){if(t.fn.raterater.defaults={submitFunction:"",allowChange:!1,starWidth:20,spaceWidth:5,numStars:5,isStatic:!1,mode:v,step:!1},p=t.extend({},t.fn.raterater.defaults,a),p.width=p.numStars*(p.starWidth+p.spaceWidth),p.starAspect=.9226,p.step!==!1&&(p.step=parseFloat(p.step),p.step<=0||p.step>1))throw"Error: step must be between 0 and 1";return g=this,r(),e(),this}}(jQuery);

$(document).ready(function() {
	$('.ratebox').raterater({
		submitFunction: 'rateAlert',
		allowChange: false,
		starWidth: 15,
		spaceWidth: 2,
		numStars: 5
	});

});

/*-----------------------------------------------------------------------------------*/
/*    File Uploader
/*-----------------------------------------------------------------------------------*/
function readURL(input) {
	if (input.files && input.files[0]) {

		var reader = new FileReader();

		reader.onload = function(e) {
			$('.image-upload-wrap').hide();

			$('.file-upload-image').attr('src', e.target.result);
			$('.file-upload-content').show();

			$('.image-title').html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);

	} else {
		removeUpload();
	}
}

function removeUpload() {
	$('.file-upload-input').replaceWith($('.file-upload-input').clone());
	$('.file-upload-content').hide();
	$('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
	$('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
	$('.image-upload-wrap').removeClass('image-dropping');
});
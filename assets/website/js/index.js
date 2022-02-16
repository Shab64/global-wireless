(function($) {

	"use strict";

	// $('nav .dropdown').hover(function(){
	// 	var $this = $(this);
	// 	$this.addClass('show');
	// 	$this.find('> a').attr('aria-expanded', true);
	// 	$this.find('.dropdown-menu').addClass('show');
	// }, function(){
	// 	var $this = $(this);
	// 		$this.removeClass('show');
	// 		$this.find('> a').attr('aria-expanded', false);
	// 		$this.find('.dropdown-menu').removeClass('show');
	// });
})(jQuery);
$(document).ready(function(){
	var isWebkit = navigator && navigator.userAgent.match(/webkit/i);
	var $root = $(isWebkit ? 'body' : 'html');
	var elements = $('div'), elcount = elements.length;
	var scrolling = false;
	// Replacing the CSS attr(... url)
	// elements.css('background-image', function(i){
	//   return 'url('+$(this).data('img')+')';
	// });
	//Add permalinks
	elements.each(function(i){
	  var $t = $(this);
	  var id = $t.attr('id');
	  if(!id) return;
	  $('<a>').addClass('permalink')
			  .attr('href', '#'+id)
			  .appendTo($t);
	});
	$root.keydown(function(e){
	  if(e.keyCode != 37 && e.keyCode != 39) return;
	  var current = scrolling || 0;
	  if(scrolling === false)
	  {
		var bsT = $root.scrollTop(), t;
		while(current < elcount && (t = elements.eq(current).offset().top) < bsT)
		  current++;
	  }
	  if(e.keyCode == 37) current--;
	  else if(scrolling !== false || t == bsT) current++;
	  current = (current + elcount) % elcount;
	  $root.stop().animate({scrollTop: elements.eq(current).offset().top}, function(){scrolling = false;});
	  scrolling = current;
	});
  });



  const items = document.querySelectorAll(".accordion a");
 
  function toggleAccordion(){
	this.classList.toggle('active');
	this.nextElementSibling.classList.toggle('active');
  }
   
  items.forEach(item => item.addEventListener('click', toggleAccordion));



  $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
	var $this = $(this),
		label = $this.prev('label');

		if (e.type === 'keyup') {
			  if ($this.val() === '') {
			label.removeClass('active highlight');
		  } else {
			label.addClass('active highlight');
		  }
	  } else if (e.type === 'blur') {
		  if( $this.val() === '' ) {
			  label.removeClass('active highlight');
			  } else {
			  label.removeClass('highlight');
			  }
	  } else if (e.type === 'focus') {

		if( $this.val() === '' ) {
			  label.removeClass('highlight');
			  }
		else if( $this.val() !== '' ) {
			  label.addClass('highlight');
			  }
	  }
  
  });
  
  $('.tab a').on('click', function (e) {
	
	e.preventDefault();
	
	$(this).parent().addClass('active');
	$(this).parent().siblings().removeClass('active');
	
	target = $(this).attr('href');
  
	$('.tab-content > div').not(target).hide();
	
	$(target).fadeIn(600);
	
  });

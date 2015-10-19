$(function(){
	$('#mostrar-menu').on('click' , function(){
		$(this).next().slideToggle();
	});
});//fin




///colapsable

$(document).ready(function() {
	var hideWidth = '-550px'; //width that will be hidden
	var collapsibleEl = $('.collapsible'); //collapsible element
	var buttonEl =  $(".collapsible button"); //button inside element

	collapsibleEl.css({'margin-left': hideWidth}); //on page load we'll move and hide part of elements
	
	$(buttonEl).click(function()
	{
		var curwidth = $(this).parent().offset(); //get offset value of the element
		if(curwidth.left>-20) //compare margin-left value
		{
			//animate margin-left value to -490px
			$(this).parent().animate({marginLeft: hideWidth}, 300 );
			$(this).html('&raquo;'); //change text of button
		}else{
			//animate margin-left value 0px
			$(this).parent().animate({marginLeft: "-20"}, 100 );	
			$(this).html('&laquo;'); //change text of button
		}
	});

});


//owl

$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      slideSpeed : 300,
      paginationSpeed : 400,
      stopOnHover: true,
      autoPlay: true,
      responsive: true,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});



$(document).ready(function() {
 
  $("#owl-demo2").owlCarousel({
    items : 4,
    lazyLoad : true,
    navigation : false,
  }); 
 
});

//sort element

       /* $(window).load(function(){
            var $container = $('.portfolioContenedor');
            $container.isotope({
                filter: '.*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
         
            $('.filtrar a').click(function(){
                $('.filtrar .actual').removeClass('actual');
                $(this).addClass('actual');
         
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                 });
                 return false;
            }); 
        });*/

//linea de tiempo

    $(function(){
      $().timelinr({
        arrowKeys: 'true'
      });
    });

//tabbs


//accordeon

$(document).ready(function() {
    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
 
    $('.accordion-section-title').click(function(e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
 
        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();
 
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }
 
        e.preventDefault();
    });
});


//Styky menu

$(window).scroll(function() {
if ($(this).scrollTop() > 1){  
    $('header').addClass("sticky");
    $('.banner').addClass("sticky-banner");
    $('#logos_juntos').addClass("sticky-logos_juntos");
  }
  else{
    $('header').removeClass("sticky");
    $('.banner').removeClass("sticky-banner");
    $('#logos_juntos').removeClass("sticky-logos_juntos");
  }
});


  
// jQuery


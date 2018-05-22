/*$(window).scroll(function() {
  
  var viewportHeight = $(".hero").outerHeight();
  var scroll = $(window).scrollTop();
  if (scroll >= viewportHeight) {
    $("header").addClass("show");
  }
  else {
    $("header").removeClass("show");
  }

});*/


jQuery(document).ready(function($){

    $('.menu-toggle').on('click', function() {
        $('body').toggleClass('menu-open');
    });

    $('a[href*=\\#]:not(.accordion__state-button)').on('click', function(event){

        if($(this.hash).length != 0){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top - 60}, 1500);
        }
    });

  $('.akkordeon-open').on('click', function() {
    $(this).closest('.collapse-wrapper').toggleClass('open');
  });

  // Image object-fit
  if ( ! Modernizr.objectfit ) {
    $('.img-object-fit').each(function () {
      var $container = $(this),
        imgUrl = $container.find('img').prop('src');
      if (imgUrl) {
        $container
          .css('backgroundImage', 'url(' + imgUrl + ')')
          .addClass('compat-object-fit');
      }  
    });
  }

});
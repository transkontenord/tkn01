var vdj = jQuery;
vdj.noConflict();

vdj(document).ready(function($) {
  // sticky: Inicio
  $('#main-menu').sticky({topSpacing:0});

  // sticky: Recalculo altura al cambiar de tamaño.
  $(window).resize(function() {
    var stickyElement = $('#main-menu');
    var stickyWrapper = stickyElement.parent();
    stickyWrapper.css('height', stickyElement.outerHeight());
  });

  // Back to top
  var offset = 50;
  var duration = 1500;
  jQuery(window).scroll(function() {
    if (vdj(this).scrollTop() > offset) {
      vdj('.back-to-top').fadeIn(duration);
      $('#main-menu').css('border-bottom', '1px solid #efefef');
    } else {
      vdj('.back-to-top').fadeOut(duration);
      $('#main-menu').css('border-bottom', 'none');
    }
  });
    
  vdj('.back-to-top').click(function(event) {
    event.preventDefault();
    vdj('html, body').animate({scrollTop: 0}, duration);
    return false;
  })

  // OwlCarousel2
  vdj('.owl-carousel').owlCarousel({
    items: 3,
    nav: true,
    navRewind: true,
    dots: false,
    loop: false,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
  });
});

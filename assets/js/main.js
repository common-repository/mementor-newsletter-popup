jQuery(function($) {

  $(window).load(function() {
    var reserved = localStorage.getItem('mementor-newsletter-popup-reservation');
    var lastpopup = localStorage.getItem('mementor-newsletter-popup-lastpopup');
    if (lastpopup == (new Date()).toDateString()) {
      console.log('I already popped up earlier today');
    } else if (!reserved) {
      setTimeout(function() {
        $('body').addClass('mementor-newsletter-noscroll');
        $('.mementor-newsletter-popup').show();
        setTimeout(function() {
          $('.mementor-newsletter-popup .newsletter-container').css('opacity', 1);
        }, 100);
        $('.mementor-newsletter-popup').find('input[type=email]').focus();
      }, 3000);
      localStorage.setItem('mementor-newsletter-popup-lastpopup', (new Date()).toDateString());
    }
  });

  $(document).on('touchstart click', '.mementor-newsletter-popup', function() {
    $('body').removeClass('mementor-newsletter-noscroll');
    $('.mementor-newsletter-popup').css('opacity', 0).hide();
  });

  $(document).on('touchstart click', '.mementor-newsletter-popup .newsletter-row', function(e) {
    e.stopPropagation();
  });

  $(document).on('touchstart click', '.mementor-newsletter-popup .no-thank-you', function() {
    localStorage.setItem('mementor-newsletter-popup-reservation', true);
    $('body').removeClass('mementor-newsletter-noscroll');
    $('.mementor-newsletter-popup').css('opacity', 0).hide();
  });

});

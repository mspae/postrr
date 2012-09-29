function MobileInfo() {
  if ( $(window).width() < 900) {
    $('.infotext').hide;
  }
};


  $(window).resize(function() {
    MobileInfo()
  });

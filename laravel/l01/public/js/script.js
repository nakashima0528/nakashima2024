$(function(){
  $('.flashMessage button').click(function() {
    $(this).parent().fadeOut();
  });
  // HEADER SCROOL
  var fix_point = $('#spFixPoint'),
  offset = fix_point.offset();
  $(window).scroll(function () {
    if($(window).scrollTop() > 30) {
      $('body').addClass('fixed');
    } else {
      $('body').removeClass('fixed');
    }
    if($(window).scrollTop() > offset.top) {
      $('body').addClass('fixedSP');
    } else {
      $('body').removeClass('fixedSP');
    }
  });

});

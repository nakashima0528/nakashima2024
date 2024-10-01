$(function(){
  $(".menuBtn").click(function () {
    $("body").toggleClass('open');
    $('.spMenu').slideToggle();
  });
});

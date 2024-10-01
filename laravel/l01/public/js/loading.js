$(function(){
  $(window).on('load', function(){
    $('#loading').fadeOut(800);
  });
  $(function(){
    setTimeout(stopload, 2000);
  })
  function stopload(){
    $('#loading').fadeOut(800);
  }
});

jQuery(function($){

  // スマホメニューオープン処理
  $(".menuButton").on("click",function(){
    $("body").toggleClass("menuOpen");
  });
  $("#g-nav a").click(function () {
    $("body").removeClass("menuOpen");
  });

  // CATEGORY open
  $(".termParent__button").on("click",function(){
    $(this).toggleClass("is-open");
    $(this).parent().next().slideToggle();
  });

  // アンカーリンクスライド
  $('a[href^="#"]').click(function(){
    var speed = 1000;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
  
});

$(window).on('mousemove', function(e) {
  var w = $(window).width();
  var h = $(window).height();
  var offsetX = 0.5 - e.pageX / w;
  var offsetY = 0.5 - e.pageY / h;

  $(".holiday-face__item").each(function(i, el) {
    var offset = parseInt($(el).data('offset'));
    var transGor = "translate3d("+ Math.round(offsetX * offset) + "px," +"0px," + "0px)";
    var transVert = "translate3d(0px," + Math.round(offsetY * offset) + "px, 0px)";
    $(el).css({
    '-webkit-transform': transVert + transGor + "scale(1.04)",
    'transform': transVert + transGor + "scale(1.04)",
    'moz-transform': transVert + transGor + "scale(1.04)"
    });
  });
});
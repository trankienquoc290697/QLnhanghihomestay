$ShowHideMore = $('.post_wrap');

$ShowHideMore.each(function() {
    var $times = $(this).children('.pst');
    if ($times.length >= 4) {
        $ShowHideMore.children(':nth-of-type(n+5)').addClass('moreShown');
        $(this).find('#message').addClass('more-times').html('+ Xem thêm sản phẩm');
    }
});

$(document).on('click', '.bpost_wrap > a', function() {
  var that = $(this);
  var thisParent = that.closest('.bpost_wrap');
  if (that.hasClass('more-times')) {
    thisParent.find('.moreShown').show();
    that.toggleClass('more-times', 'less-times').html('- Thu gọn');
  }else {
    thisParent.find('.moreShown').hide();
    that.toggleClass('more-times', 'less-times').html('+ Xem thêm sản phẩm');
  }  
});

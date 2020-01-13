function visible(partial) {
  var $t = partial,
    $w = jQuery(window),
    viewTop = $w.scrollTop(),
    viewBottom = viewTop + $w.height(),
    _top = $t.offset().top,
    _bottom = _top + $t.height(),
    compareTop = partial === true ? _bottom : _top,
    compareBottom = partial === true ? _top : _bottom;

  return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));

}

jQuery(window).scroll(function() {

  if (visible(jQuery('.count-digit'))) {
    if (jQuery('.count-digit').hasClass('counter-loaded')) return;
    jQuery('.count-digit').addClass('counter-loaded');

    jQuery('.count-digit').each(function() {
      var $this = jQuery(this);
      jQuery({
        Counter: 0
      }).animate({
        Counter: $this.text()
      }, {
        duration: 1200,
        easing: 'swing',
        step: function() {
          $this.text(Math.ceil(this.Counter));
        }
      });
    });
  }
})

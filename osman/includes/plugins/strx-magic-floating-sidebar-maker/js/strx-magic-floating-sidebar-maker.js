strx = {};

(function () {
  strx.start = function (opts) {
    jQuery(function () {
		console.log(opts);
      opts = jQuery.extend({}, {
        content: '#primary',
        sidebar: '#sidebar',
        wait: 3000,
        debounce: 500,
        animate: 3000,
        offsetTop: 0,
        offsetBottom: 0,
        outline: 0,
		dynamicTop:false,
        minHDiff:0
      }, opts);

      setTimeout(function(){
	      var $w = jQuery(window),
	        $c = jQuery(opts.content),
	        $ss = jQuery(opts.sidebar),
	        $b = jQuery('body');

	      if (opts.outline) {
	        $ss.add($c).css('outline', 'none');
	      }

	      if ($c.length && $ss.length) {
	        $ss.each(function () {
	          (function ($s) {
	            if ( $c.height() - $s.height() > opts.minHDiff || opts.dynamicTop) {
                $s.parent().css('position', 'relative');
                var initialSPos=$s.position(),
                		initialSOff=$s.offset();

                //Recupero Top e Left iniziali di tutte le sidebar prima di iniziare il posizionamento
                setTimeout(function(){
	                $s.css({
	                  position: 'absolute',
	                  left: initialSPos.left + 'px',
	                  top:  initialSPos.top  + 'px'
	                }).find('.widget').css('position', 'relative');

	                var lastScrollY = -1,
	                  sidebarTop = initialSPos.top,
	                  offsetTop = initialSOff.top - sidebarTop,
	                  maxTop = sidebarTop + $c.height() - $s.outerHeight(),
	                  onScroll = function (e) {
	                    var scrollY = $w.scrollTop(),
	                      t, scrollingDown = scrollY > lastScrollY;

	                    if ((scrollingDown && scrollY > sidebarTop + offsetTop && scrollY + $w.height() > $s.position().top + $s.height() + offsetTop - sidebarTop) || (!scrollingDown && scrollY < $s.position().top + offsetTop)) {
	                      if (e.type === 'scroll' && ($w.height() > $s.height() || !scrollingDown)) {
	                        //Scorrimento verso l'alto
	                        t = Math.max(sidebarTop, scrollY - (offsetTop) + (~~opts.offsetTop));
	                      } else {
	                        //Scorrimento verso il basso o resize
	                        t = Math.max(sidebarTop, scrollY + $w.height() - $s.outerHeight() - offsetTop - (~~opts.offsetBottom));
	                      }

	                      t = Math.min(t, opts.dynamicTop ? (sidebarTop + $c.height() - $s.outerHeight()) : maxTop);
	                      $s.stop().animate({
	                        top: t + 'px'
	                      }, ~~opts.animate);	        
	                    }
	                    lastScrollY = scrollY;
	                  };
	               
	                if (opts.debounce && Function.prototype.debounce) {
	                  onScroll = onScroll.debounce(opts.debounce);
	                }

	                $w.scroll(onScroll).resize(onScroll);
	                onScroll({
	                  type: 'scroll'
	                });

	                $w.scroll(function(){
	                	$s.stop();
	                });
                },0);

	            }
	          })(jQuery(this));
	        });

	      } else {
	        if ($c.length === 0) {
	          console.log(opts.content + ' not found');
	        }
	        if ($ss.length === 0) {
	          console.log(opts.sidebar + ' not found');
	        }
	      }

    	}, opts.wait);

    });
  };
 
})();
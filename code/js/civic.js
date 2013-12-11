jQuery(function() {
	function CivciBgRezise(el){
		el.css({
			'background-image' : 'url(' + el.attr('data-bg-grid-top')+ ')'
		});
	}
	/* Resize background in each position */
	CivciBgRezise(jQuery('#grid-top'));
	CivciBgRezise(jQuery('#grid-top2'));
	CivciBgRezise(jQuery('#grid-top3'));
	CivciBgRezise(jQuery('#grid-bottom'));
	CivciBgRezise(jQuery('#grid-bottom2'));
	CivciBgRezise(jQuery('#grid-bottom3'));



	// Video Slider

    // Use Modernizr to detect for touch devices,
    // which don't support autoplay and may have less bandwidth,
    // so just give them the poster images instead
    var screenIndex = 1,
        numScreens = jQuery('.screen').length,
        isTransitioning = false,
        transitionDur = 1000,
        BV,
        videoPlayer,
        isTouch = Modernizr.touch,
        $bigImage = jQuery('.big-image'),
        $window = jQuery(window);

    if (!isTouch) {
        // initialize BigVideo
        BV = new jQuery.BigVideo({forceAutoplay:isTouch});
        BV.init();
        showVideo();

        BV.getPlayer().on('loadeddata', function() {
            onVideoLoaded();
        });

        // adjust image positioning so it lines up with video
        $bigImage
            .css('position','relative')
            .imagesLoaded(adjustImagePositioning);
        // and on window resize
        $window.on('resize', adjustImagePositioning);
    }

    // Next button click goes to next div
    jQuery('#next-btn').on('click', function(e) {
        e.preventDefault();
        if (!isTransitioning) {
            next();
        }
    });

    function showVideo() {
        BV.show(jQuery('#screen-'+screenIndex).attr('data-video'),{ambient:true});
    }

    function next() {
        isTransitioning = true;

        // update video index, reset image opacity if starting over
        if (screenIndex === numScreens) {
            $bigImage.css('opacity',1);
            screenIndex = 1;
        } else {
            screenIndex++;
        }

        if (!isTouch) {
            jQuery('#big-video-wrap').transit({'left':'-100%'},transitionDur)
        }

        (Modernizr.csstransitions)?
            jQuery('.wrapper').transit(
                {'left':'-'+(100*(screenIndex-1))+'%'},
                transitionDur,
                onTransitionComplete):
            onTransitionComplete();
    }

    function onVideoLoaded() {
        jQuery('#screen-'+screenIndex).find('.big-image').transit({'opacity':0},500)
    }

    function onTransitionComplete() {
        isTransitioning = false;
        if (!isTouch) {
            jQuery('#big-video-wrap').css('left',0);
            showVideo();
        }
    }

    function adjustImagePositioning() {
        $bigImage.each(function(){
            var $img = jQuery(this),
                img = new Image();

            img.src = $img.attr('src');

            var windowWidth = $window.width(),
                windowHeight = $window.height(),
                r_w = windowHeight / windowWidth,
                i_w = img.width,
                i_h = img.height,
                r_i = i_h / i_w,
                new_w, new_h, new_left, new_top;

            if( r_w > r_i ) {
                new_h   = windowHeight;
                new_w   = windowHeight / r_i;
            }
            else {
                new_h   = windowWidth * r_i;
                new_w   = windowWidth;
            }

            $img.css({
                width   : new_w,
                height  : new_h,
                left    : ( windowWidth - new_w ) / 2,
                top     : ( windowHeight - new_h ) / 2
            })

        });

    }

    var featured = jQuery('#featured');
    var header = jQuery('#header');

    function FeaturedHeight(){
        featured.css({
            'height': jQuery(window).height() - (header.height() + 20 + jQuery('.wrapper-toolbar').height()) + 'px',
            'width': jQuery(window).width() + 'px'
        });

        if (jQuery(window).width() < 979 ){
            featured.css({
                'height': jQuery(window).height() - (header.height() + jQuery('.wrapper-toolbar').height()) + 'px',
            });
        }
    }

    FeaturedHeight();

    jQuery(window).resize(function() {
        FeaturedHeight();
    });

});
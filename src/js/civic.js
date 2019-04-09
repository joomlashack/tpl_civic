function civicVideos($) {

    // Use Modernizr to detect for touch devices,
    // which don't support autoplay and may have less bandwidth,
    // so just give them the poster images instead
    var screenIndex = 1,
        numScreens = $('.screen').length,
        isTransitioning = false,
        transitionDur = 1000,
        BV, videoPlayer, isTouch = Modernizr.touch,
        $bigImage = $('.big-image'),
        $bigLoader = $('.big-loader'),
        $window = $(window);

    if (!isTouch) {
        // initialize BigVideo
        BV = new $.BigVideo({
            forceAutoplay: isTouch
        });
        BV.init();
        showVideo();

        BV.getPlayer().on('loadeddata', function() {
            onVideoLoaded();
        });

        BV.getPlayer().on('ended', function() {
            if (!isTransitioning) {
                next();
            }
        })

        // adjust image positioning so it lines up with video
        $bigImage.css('position', 'relative').imagesLoaded(adjustImagePositioning);
        // and on window resize
    }
    else {
        setTimeout(function () {
            touchNext();
        }, 5000);
    }

    function touchNext() {
        if (!isTransitioning) {
            next();
        }
        setTimeout(function () {
            touchNext();
        }, 5000);
    }

    // Next button click goes to next div
    $('#next-btn').on('click', function(e) {
        e.preventDefault();
        if (!isTransitioning) {
            next();
        }
    });

    // Prev button click goes to previous div
    $('#prev-btn').on('click', function(e) {
        e.preventDefault();
        if (!isTransitioning) {
            previous();
        }
    });

    function showVideo() {
        BV.show($('#screen-' + screenIndex).attr('data-video'), {
            ambient: true
        });
    }

    function next() {
        isTransitioning = true;
        // update video index, reset image opacity if starting over
        if (screenIndex === numScreens) {
            screenIndex = 1;
        } else {
            screenIndex++;
        }
        if (!isTouch) {
            $('#big-video-wrap').transit({
                'left': '-100%'
            }, transitionDur)
        }
        $bigImage.css('opacity', 1);
        $bigLoader.css('opacity', 1);
        $('.wrapper').transit({
            'left': '-' + (100 * (screenIndex - 1)) + '%'
        }, transitionDur, onTransitionComplete);
    }

    function previous() {
        isTransitioning = true;
        // update video index, reset image opacity if starting over
        if (screenIndex === 1) {
            screenIndex = numScreens;
        } else {
            screenIndex--;
        }
        if (!isTouch) {
            $('#big-video-wrap').transit({
                'left': '100%'
            }, transitionDur)
        }
        $bigImage.css('opacity', 1);
        $bigLoader.css('opacity', 1);
        $('.wrapper').transit({
            'left': '-' + (100 * (screenIndex - 1)) + '%'
        }, transitionDur, onTransitionComplete);
    }

    function onVideoLoaded() {
        $('#screen-' + screenIndex).find('.big-image').transit({
            'opacity': 0
        }, 3000);
        $bigLoader.transit({
            'opacity': 0
        }, 1000);
    }

    function onTransitionComplete() {
        isTransitioning = false;
        if (!isTouch) {
            $('#big-video-wrap').css('left', 0);
            showVideo();
        }
    }

    function adjustImagePositioning() {
        $bigImage.each(function() {
            var $img = $(this),
                img = new Image();

            img.src = $img.attr('src');

            var windowWidth = $window.width(),
                windowHeight = $window.height(),
                r_w = windowHeight / windowWidth,
                i_w = img.width,
                i_h = img.height,
                r_i = i_h / i_w,
                new_w, new_h, new_left, new_top;

            if (r_w > r_i) {
                new_h = windowHeight;
                new_w = windowHeight / r_i;
            } else {
                new_h = windowWidth * r_i;
                new_w = windowWidth;
            }

            $img.css({
                width: new_w,
                height: new_h,
                left: (windowWidth - new_w) / 2,
                top: (windowHeight - new_h) / 2
            })

        });

    }
}


function FeaturedHeight() {
    var featured = jQuery('#featured');
    var header = jQuery('#header');

    if (window.outerWidth > 767) {
        // In desktop
        featured.css({
            'height': jQuery(window).height() - (header.height() + jQuery('.wrapper-toolbar').height()) + 'px',
            'width': jQuery(window).width() + 'px'
        });
    } else {
        // In mobile
        featured.removeAttr('style');
    }
}

// Move menu and logo over the video embed when there is a module in video position
function relocateMenu() {

    var container   = jQuery('#video');
    var module      = jQuery('#video .moduletable');
    var menu        = jQuery('#header');

    if(container.length) {

        // Move main menu over the video embed
        menu.css('margin-top', -menu.height());

        // Set a height to the #video container
        container.css('height', jQuery(window).height());

        // Set a height to the .moduletable container
        module.css('height', module.outerHeight);

        if(module.height() < container.height()) {
            container.css({
                'height': 'auto'
            });
        }
    }
}

jQuery(function() {

    jQuery(window).on('resize', function () {
        relocateMenu();
    }).resize();

    if (civicSlider)
        civicVideos(jQuery);

    jQuery(window).resize(function() {
        FeaturedHeight();
    });

    jQuery(window).load(function() {
        FeaturedHeight();
    });

    FeaturedHeight();

    var htoolbar = jQuery('div.wrapper-toolbar').height();
    jQuery('.civic-scroll').click(function () {
        if (jQuery(this).attr('rel') != '')
            jQuery('html, body').animate({
                scrollTop: (jQuery(this).attr('rel') == 'top' ? 0 : jQuery('#' + jQuery(this).attr('rel')).offset().top) - htoolbar
            }, 2000);
        return false;
    });
});
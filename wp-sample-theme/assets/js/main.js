const $ = jQuery.noConflict();

jQuery(document).ready(function ($) {
    $('.init-hidden-sm').removeClass('init-hidden-sm');

    // On scroll actions
    window.onscroll = function () {
        if ($(window).scrollTop() > 0) {
            $('body').addClass('show-overlay');
        } else {
            $('body').removeClass('show-overlay');
        }
    };
    // End On scroll actions

    $(window).scroll();

});

$(function () {
    // Scroll to item if hash was presented in the URL
    if (window.location.hash) {
        const scrollCallback = function () {
            const hash = window.location.hash;
            if (!$(hash).length) {
                return;
            }
            scrollToObj(hash, '#sticky_bar');
        };
        setTimeout(scrollCallback, 300);
    }

    // On link click actions
    $('a')
        .not('.carousel-control-prev, .carousel-control-next')
        .on('click', function (event) {
            // Scroll to fix
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== '') {
                // Store hash
                const hash = this.hash;

                if (!$(hash).length) {
                    return;
                }

                // Prevent default anchor click behavior
                event.preventDefault();

                scrollToObj(hash, '#sticky_bar');
            }
            // End scroll to fix
        });
    // End On link click actions

    // 'Carousel jumping' fix
    $('a[class^=carousel-control-]').click(function (event) {
        event.preventDefault();
    });
    $('a[class^=carousel-control-]').off('click');
});

// Masonry grid + Infinite scroll
$(function () {
    let msnry, imgLoad;
    if (typeof Masonry !== 'undefined') {
        msnry = new Masonry('.posts_container', {
            itemSelector: '.post'
        });
        imgLoad = imagesLoaded($('.posts_container'));
        // Reloads masonry grid after image loads. Lazyload fix.
        imgLoad.on('progress', function () {
            msnry.layout();
        });
    } else {
        msnry = null;
    }

    if (typeof InfiniteScroll !== 'undefined' &&
        $('.infinite_next_link').length) {

        // make imagesLoaded available for InfiniteScroll
        InfiniteScroll.imagesLoaded = imagesLoaded;

        // init Infinite Scroll
        const postsInfinite = new InfiniteScroll('#infinite_scroll_container', {
            path: '.infinite_next_link',
            loadOnScroll: true,
            prefill: false,
            append: '.posts_container .post',
            history: false,
            outlayer: msnry
        });

        // Triggers when new page loaded and appended
        postsInfinite.on('append', function () {
            // 	Reloads masonry grid after image loads. Lazyload fix.
            $('.posts_container .post-thumbnail img')
                .on('load', function () {
                    // $grid.masonry( 'layout' );
                    msnry.layout();
                });
        });
    }
});

$(function () {
    const lazyFunctions = function () {
        $('.lazycss').each(function () {
            const lazy = $(this);
            const css = lazy.attr('data-css');
            lazy.attr('style', css);
        });

        $('.lazysrc').each(function () {
            const lazy = $(this);
            const src = lazy.attr('data-src');
            lazy.attr('src', src);
        });

        $('.lazycontent').each(function () {
            const lazy = $(this);
            const lazyId = lazy.attr('id');
            // lazy.load( " #"+lazy_id );
            $.get('?lazycontent=1', function (data) {
                const content = $('#' + lazyId, data)[0].innerHTML;
                lazy.html(content);
            });
        });
    };
    setTimeout(lazyFunctions, 500);
});

function scrollToObj(selector, correction) {
    const p = $(selector);
    const position = p.offset();
    let correctionValue = 0;
    if (parseInt(correction) > 0) {
        correctionValue = correction;
    } else if ($(correction).length > 0) {
        correctionValue = $(correction).outerHeight();
    }
    const y = position.top - correctionValue;
    $('html, body').animate({
        scrollTop: y
    }, 100);
}

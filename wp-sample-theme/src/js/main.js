import Masonry from 'masonry-layout';
import imagesLoaded from 'imagesloaded';

let $ = jQuery.noConflict();

jQuery(document).ready(function() {
    // $('.init-hidden-sm').removeClass('init-hidden-sm')

    $('.navbar-mobile').ThemeMobileNav({
        menuActiveClass: 'navbar-mobile-active',
        menuOpener: '.navbar-opener',
        menuCloser: '.navbar-closer',
        menuOpenerOutside: true,
        hasChildrenSelector: '.menu-item-has-children',
        hideOnClickOutside: true
    });

    // On scroll actions
    window.onscroll = function() {
        // Adds a class in case of scroll.
        if ($(window).scrollTop() > 0) {
            $('body').addClass('page-scrolled');
        } else {
            $('body').removeClass('page-scrolled');
        }
    };
    // End On scroll actions

    $(window).scroll();
});

$(function() {
    // Scroll to item if hash was presented in the URL
    if (window.location.hash) {
        let scroll_callback = function() {
            let hash = window.location.hash;
            if (!$(hash).length) {
                return;
            }
            scrollToObj(hash, '.scroll-offset-src');
        };
        setTimeout(scroll_callback, 300);
    }

    // On link click actions
    $('a')
        .not('.carousel-control-prev, .carousel-control-next')
        .on('click', function(event) {
            // Scroll to fix
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== '') {
                // Store hash
                let hash = this.hash;

                if (!$(hash).length) {
                    return;
                }

                // Prevent default anchor click behavior
                event.preventDefault();

                scrollToObj(hash, '.scroll-offset-src');
            }
            // End scroll to fix
        });
    // End On link click actions

    // 'Carousel jumping' fix
    $('a[class^=carousel-control-]').click(function(event) {
        event.preventDefault();
    });
    $('a[class^=carousel-control-]').off('click');
});

// Masonry grid + Infinite scroll
$(function() {
    let msnry, imgLoad;
    if (typeof Masonry !== 'undefined') {
        // ski if container is not present.
        if (!$('.masonry-listing').length) {
            return;
        }
        msnry = new Masonry('.masonry-listing', {
            itemSelector: '.post'
        });
        imgLoad = imagesLoaded($('.masonry-listing'));
        // Reloads masonry grid after image loads. Lazyload fix.
        imgLoad.on('progress', function() {
            msnry.layout();
        });
    } else {
        msnry = null;
    }

    if (typeof InfiniteScroll !== 'undefined' && $('.infinite_next_link').length) {
        // make imagesLoaded available for InfiniteScroll
        InfiniteScroll.imagesLoaded = imagesLoaded;

        // init Infinite Scroll
        let postsInfinite = new InfiniteScroll('#infinite_scroll_container', {
            path: '.infinite_next_link',
            loadOnScroll: true,
            prefill: false,
            append: '.masonry-listing .post',
            history: false,
            outlayer: msnry
        });

        // Triggers when new page loaded and appended
        postsInfinite.on('append', function() {
            // 	Reloads masonry grid after image loads. Lazyload fix.
            $('.masonry-listing .post-thumbnail img').on('load', function() {
                // $grid.masonry( 'layout' );
                msnry.layout();
            });
        });
    }
});

$(function() {
    const lazyFunctions = () => {
        $('.lazycss').each(function() {
            let lazy = $(this);
            let css = lazy.attr('data-css');
            lazy.attr('style', css);
        });

        $('.lazysrc').each(function() {
            let lazy = $(this);
            let src = lazy.attr('data-src');
            lazy.attr('src', src);
        });

        $('.lazycontent').each(function() {
            let lazy = $(this);
            let lazy_id = lazy.attr('id');
            // lazy.load( " #"+lazy_id );
            $.get('?lazycontent=1', function(data) {
                let content = $('#' + lazy_id, data)[0].innerHTML;
                lazy.html(content);
            });
        });
    };
    // setTimeout(lazyFunctions, 500);
    lazyFunctions();
});

function scrollToObj(selector, correction) {
    let p = $(selector).first();
    let position = p.offset();
    let correction_value = 0;
    if (parseInt(correction) > 0) {
        correction_value = correction;
    } else if ($(correction).length > 0) {
        correction_value = $(correction).outerHeight();
    }
    let y = position.top - correction_value;
    $('html, body').animate(
        {
            scrollTop: y
        },
        100
    );
}

// Set a CSS variable for scrollbar width. This is a workaround for `100vw = 100% + scrollbar width` issue.
function calculateScrollbarWidth() {
    document.documentElement.style.setProperty('--scrollbar-width', window.innerWidth - document.documentElement.clientWidth + 'px');
}

// recalculate on resize
// window.addEventListener('resize', calculateScrollbarWidth, false);
// recalculate on dom load
document.addEventListener('DOMContentLoaded', calculateScrollbarWidth, false);
// recalculate on load (assets loaded as well)
window.addEventListener('load', calculateScrollbarWidth);

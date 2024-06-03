export default function Parallax(args) {
    (function($) {
        $.fn.parallax = function(options) {
            const settings = $.extend({
                speed: args.speed || 0.5,
                startImagePosition: args.startImagePosition || 0,
                visibleHeight: args.visibleHeight || 200
            }, options);

            let windowHeight = $(window).height();

            return this.each(function() {
                let $container = $(this);
                let $img = $container.find('img');
                let imgHeight = $img.height();

                let containerTop = $container.offset().top;
                let containerBottom = containerTop + settings.visibleHeight;

                // Position of the image when it is at the top of the container.
                let startImagePosition = imgHeight - settings.visibleHeight;
                // Position of the image when it is at the bottom of the container.
                let endImagePosition = 0;

                // Update the start and end position based on the options.
                const updateStartEndPosition = () => {
                    // Calculate start position based on the options.
                    if (settings.startImagePosition > 0 && settings.startImagePosition <= 100) {
                        let startPositionOffset = startImagePosition * (settings.startImagePosition / 100);
                        startImagePosition = startImagePosition - startPositionOffset;
                    }
                }
                // Initial update.
                updateStartEndPosition();

                // Position (px) of the window scroll at which the parallax effect should start.
                let startScrollPosition = containerTop - windowHeight;
                // Total portion (px) from parallax start to end.
                let maxScrollPortion = containerBottom - startScrollPosition;

                // Set the container height to the options visible height.
                $container
                    .css('height', settings.visibleHeight + 'px')
                    .css('overflow', 'hidden');

                const updateParallax = () => {
                    let scrollTop = $(window).scrollTop();

                    // If container is not visible, do nothing.
                    if (scrollTop + windowHeight < containerTop || scrollTop > containerBottom) {
                        return;
                    }

                    // Current scrolled portion of possible visible portion.
                    let scrolledPortion = scrollTop - startScrollPosition;

                    // Calculate the parallax amount.
                    let parallaxAmount = calculateImagePosition(
                        startImagePosition,
                        endImagePosition,
                        maxScrollPortion,
                        scrolledPortion
                    );

                    // Apply the parallax effect.
                    $img.css('transform', 'translateY(-' + parallaxAmount + 'px)');
                };

                const calculateImagePosition = (startPosition, endPosition, maxScrollPortion, scrolledPosition) => {
                    // Calculate the range of positions.
                    let positionRange = startPosition - endPosition;

                    // Accelerate the parallax effect.
                    scrolledPosition = Math.min( scrolledPosition * settings.speed, maxScrollPortion );

                    // Calculate the ratio of scrolled position to max scroll portion.
                    let scrollRatio = scrolledPosition / maxScrollPortion;

                    // Calculate the image position based on the ratio.
                    let imagePosition = startPosition - (positionRange * scrollRatio);

                    // Ensure the image position does not exceed the end position.
                    imagePosition = Math.max(endPosition, imagePosition);

                    return imagePosition;
                }

                // Apply the parallax effect
                $(window)
                    .on('scroll', updateParallax)
                    .on('resize', () => {
                        // Update values which are changes on load or resize.
                        windowHeight = $(window).height();
                        containerTop = $container.offset().top;
                        containerBottom = containerTop + settings.visibleHeight;
                        startScrollPosition = containerTop - windowHeight;
                        maxScrollPortion = containerBottom - startScrollPosition;
                        updateStartEndPosition();
                        updateParallax();
                    });

                // Update the parallax effect on page load.
                updateParallax();
            });
        };

        $(document).ready(function() {
            $('.parallax-image').parallax(args);
        });
    })(jQuery);
}
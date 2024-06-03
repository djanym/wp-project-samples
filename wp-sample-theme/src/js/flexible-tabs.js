/**
 * This script is used to handle the tab switching functionality in the custom media text block.
 * It listens for a click event on the tab titles and replaces the image in the media text block with the corresponding tab image.
 * When adding content to the tabs, make sure to add an image with the class 'tab-img-src' inside each tab content block.
 * This script automatically replaces the image in the media text block with the image from the active tab with .tab-img-src class.
 */
jQuery(document).ready(function ($) {
    // Functionality for image switching in the media text block.
    $('.tabs-titles .tab-title').on('click', function () {
        let tab = $(this);
        let tabsContainer = tab.closest('.tabs-container');
        // Get the image container in the media text.
        let mediaImageContainer = $(this).closest('.wp-block-theme-custom-media-text-container').find('.wp-block-media-text__media').first();
        // Get the data-tab-id of the clicked tab.
        let tabId = tab.attr('data-title-tab-id');

        // Get the corresponding tab content image.
        let tabImage = tabsContainer.find('.tabs-content .single-tab[data-tab-id="' + tabId + '"] .tab-img-src img').first();

        // Clone the tab image.
        let clonedImage = tabImage.clone();

        // Retain original classes and add them to the cloned image.
        clonedImage.addClass(mediaImageContainer.find('img').first().attr('class'));

        // Add a class to the cloned image to trigger the animation
        mediaImageContainer.fadeOut(100, function () {
            mediaImageContainer.empty().append(clonedImage).fadeIn(100);
        });
    });

    // Floating background for the tabs.
    let $bg = $('<div class="floatingBg">');

    // Set the initial width and position of the background.
    let $activeTab = $('.tabs-titles .tab-title.active');
    let initialWidth = $activeTab.outerWidth();
    $bg.css('width', initialWidth + 'px');

    $('.tabs-titles').append($bg);

    $('.tabs-titles .tab-title').on('click', function () {
        let $newActiveTab = $(this);
        let newWidth = $newActiveTab.outerWidth();
        $bg.css('transform', 'translateX(' + $newActiveTab.position().left + 'px)');
        $bg.css('width', newWidth + 'px');
    });
});

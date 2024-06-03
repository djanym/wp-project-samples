// Mobile navigation
require('./mobile-navigation.js');

// Custom theme JS
require('./main.js');

// Import parallax JS for core/image parallax variation
import Parallax from './parallax';
Parallax({
    speed: 1.2,
    startImagePosition: 20, // 0 means bottom of the image, 100 means top of the image.
    visibleHeight: 180
});

// Optional feature: flexible tabs image change on click
// require('./flexible-tabs.js');

// Optional hero slider JS
// require('./hero-slider.js');
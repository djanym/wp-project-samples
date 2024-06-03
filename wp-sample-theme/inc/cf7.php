<?php
/**
 * Additional functions for Contact Form 7.
 */

/**
 * Addon for Contact Form 7.
 * Adds optgroup support for select fields.
 * How to use:
 * 1. Add optgroup- prefix to the option value.
 * 2. Add endoptgroup to the option value where you want to end the optgroup.
 */
add_action( 'wp_head',
    static function() {
        ?>
        <script>
            jQuery(function($) {
                let sel = $('#interested-in').first(); // Custom selector ID.
                let foundin = sel.find('option:contains("optgroup-")');
                $.each(foundin, function(value) {
                    let updated = $(this).val().replace('optgroup-', '');
                    $(this).nextUntil('option:contains("endoptgroup")').wrapAll('<optgroup label="' + updated + '"></optgroup>');
                });
                sel.find('option:contains("optgroup-")').remove();
                sel.find('option:contains("endoptgroup")').remove();
            });
        </script>
        <?php
    }
);

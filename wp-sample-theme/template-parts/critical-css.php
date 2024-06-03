<style type="text/css">
<?php
if( is_front_page() ){
    echo "/* Front page */ \n";
    include get_stylesheet_directory() . '/assets/critical/front-page.css';
} else if( is_archive() || is_home() || is_post_type_archive('post') ){
    echo "/* Archive page */ \n";
    include get_stylesheet_directory() . '/assets/critical/archive.css';
} else if( is_single() ){
    echo "/* Single page */ \n";
    include get_stylesheet_directory() . '/assets/critical/single.css';
} else if( is_page('projects-gallery') ){
    echo "/* Gallery album page */ \n";
    include get_stylesheet_directory() . '/assets/critical/gallery.css';
} else {
    echo "/* Default */ \n";
    include get_stylesheet_directory() . '/assets/critical/default.css';

}

?>
</style>

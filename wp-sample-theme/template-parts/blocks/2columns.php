<?php
/**
 * Block Name: Homepage 2 Columns
 *
 * This is the template that displays the homepage 2 columns block.
 *
 * @var array $block
 */

// get image field (array)
$text = get_field('text');
$image_url = get_field('image');
$image_position = get_field('image_position');
$slide_down_button = get_field('services_list_block_button_text');
$redirect_button = get_field('redirect_button');
$redirect_button_title = isset($redirect_button['title']) ? $redirect_button['title'] : '';
$redirect_button_url = isset($redirect_button['url']) ? $redirect_button['url'] : '';
$blockClass = isset($block['className']) ? $block['className'] : '';

// create id attribute for specific styling
$block_id = get_field('section_id') ? get_field('section_id') : $block['id'];

if( $image_position == 'left' ){
    $text_col_order_class = 'order-12';
    $image_col_order_class = 'order-1';
} else {
    $text_col_order_class = 'order-1';
    $image_col_order_class = 'order-12';
}

?>

<div id="<?php echo $block_id; ?>" class="container-fluid gray-box <?php echo esc_attr($blockClass); ?>">
    <div class="row site-container">
        <div class="col-sm-12 col-md-12 col-lg-6 <?php echo $text_col_order_class; ?>">
            <?php echo apply_filters( 'wp_kses', $text ) ?>
            <div class="text-center">
                <a href="#" onclick="scrollToObj( '#' + $(this).closest('.container-fluid').next('.container-fluid').attr('id') , '#sticky_bar'); return false;"
                   title="<?php echo esc_attr($slide_down_button); ?>"
                   class="button button-green my-1 mx-1"><?php echo esc_html($slide_down_button); ?></a>
                <?php if($redirect_button_title) : ?>
                <a href="<?php echo esc_attr($redirect_button_url); ?>"
                   title="<?php echo esc_attr($redirect_button_title); ?>"
                   class="button my-1 mx-1"><?php echo esc_html($redirect_button_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 <?php echo $image_col_order_class; ?> text-center">
            <img src="<?php echo esc_attr($image_url); ?>" alt="Section image">
        </div>
    </div>
</div>

<?php

/**
 * Add "Formats" dropdown to the first row of the WordPress Classic Editor.
 *
 * @param array $buttons
 *
 * @return array
 */
function commtask_mce_buttons( array $buttons ) {
	// Add the 'styleselect' button to the first row.
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}
add_filter( 'mce_buttons', 'commtask_mce_buttons' );

/**
 * Add custom styles to the WordPress Classic Editor.
 *
 * @param array $tinymce_settings Classic Editor settings array.
 *
 * @return array
 */
function commtask_editor_style_formats( $tinymce_settings ) : array {
	// Define custom styles.
	$style_formats = array(
		array(
			'title'    => 'Green Button',
			'selector' => 'a',
			'classes'  => 'button-color-1',
		),
		array(
			'title'    => 'Orange Button',
			'selector' => 'a',
			'classes'  => 'button-color-3',
		),
		array(
			'title'    => 'H1-Like',
			'selector' => 'p',
			'classes'  => 'h1',
		),
		array(
			'title'    => 'H2-Like',
			'selector' => 'p',
			'classes'  => 'h2',
		),
		array(
			'title'    => 'H3-Like',
			'selector' => 'p',
			'classes'  => 'h3',
		),
		array(
			'title'    => 'H4-Like',
			'selector' => 'p',
			'classes'  => 'h4',
		),
		array(
			'title'    => 'H5-Like',
			'selector' => 'p',
			'classes'  => 'h5',
		),
		array(
			'title'    => 'H6-Like',
			'selector' => 'p',
			'classes'  => 'h6',
		),
	);

	// Add custom styles to the 'style_formats' array.
	$tinymce_settings['style_formats'] = wp_json_encode( $style_formats );

	return $tinymce_settings;
}
add_filter( 'tiny_mce_before_init', 'commtask_editor_style_formats' );

/**
 * Add custom styles to the WordPress Classic Editor.
 *
 * @return void
 */
function commtask_editor_styles() : void {
	add_editor_style( 'assets/css/wp-editor-style.css' );
}
add_action( 'admin_init', 'commtask_editor_styles' );

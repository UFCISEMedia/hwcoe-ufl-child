<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
	//enqueue parent styles
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	
    wp_enqueue_style( 'style', get_template_directory_uri() . '/editor-style.css' );

	//enqueue child styles
	wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'hwcoe-ufl-style' ),
        wp_get_theme()->get('Version')
    );
}
?>
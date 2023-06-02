<?php
add_action( 'wp_enqueue_scripts', 'Hestiathemeenfant_enqueue_child_theme_styles', PHP_INT_MAX);

function Hestiathemeenfant_enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css', array('parent-style') );
}
function my_wp_nav_menu_args( $args = '' ) {
    if( is_user_logged_in() ) {
    // Logged in menu to display
    $args['menu'] = 2;
     
    } else {
    // Non-logged-in menu to display
    $args['menu'] = 7;
    }
    return $args;
    }
    add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
?>
<?php
function my_theme_enqueue_scripts() {
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/common.css' );
    
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), null, true );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

function register_my_menu() {
    register_nav_menus(array(
        'hamburger-menu' => 'ハンバーガーメニュー',
    ));
}
add_action( 'init', 'register_my_menu' );
?>

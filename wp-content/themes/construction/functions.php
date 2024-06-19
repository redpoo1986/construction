<?php
function my_theme_enqueue_scripts() {
	$template_url = get_template_directory_uri();
	$theme = wp_get_theme( get_template() );
	$version = $theme->Version;
	wp_enqueue_style( 'theme-style', $template_url . '/assets/css/common.css', array(), $version );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

register_nav_menus(array(
	'hamburger-menu' => 'ハンバーガーメニュー',
)
);
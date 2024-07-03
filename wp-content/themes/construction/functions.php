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


function my_theme_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'text_domain'),
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

function create_custom_links() {
    $page1_id = 3; // 最初の固定ページのID
    $page2_id = 19; // 二つ目の固定ページのID

    $page1_link = get_permalink($page1_id);
    $page1_title = get_the_title($page1_id);

    $page2_link = get_permalink($page2_id);
    $page2_title = get_the_title($page2_id);

    return '<a href="' . $page1_link . '">' . $page1_title . '</a><br><a href="' . $page2_link . '">' . $page2_title . '</a>';
}
add_shortcode('custom_links', 'create_custom_links');

function custom_page_template_redirect() {
    global $wp;
    
    // 現在のURLを取得
    $current_url = home_url(add_query_arg(array(), $wp->request));
    
    // パーマリンクの条件に基づいてテンプレートファイルを読み込む
    if (strpos($current_url, '/info/') !== false) {
        // テンプレートファイルのパス
        $template = locate_template('page-info.php');
        
        // テンプレートファイルが存在する場合、読み込む
        if ($template) {
            load_template($template);
            exit;
        }
    } elseif (strpos($current_url, '/privacy-policy/') !== false) {
        // テンプレートファイルのパス
        $template = locate_template('privacy-policy.php');
        
        // テンプレートファイルが存在する場合、読み込む
        if ($template) {
            load_template($template);
            exit;
        }
    } elseif (strpos($current_url,'/corporate-info/') !== false){

		$template = locate_template('corporate-info.php');

		if($template){
			load_template($template);
			exit;
		}
	} elseif (strpos($current_url,'/company-profile/') !==false){

		$template = locate_template('company-profile.php');

		if($template){
			load_template($template);
			exit;
		}
	}
}
add_action('template_redirect', 'custom_page_template_redirect');


/**次この上に追加 */

?>
<?php
function my_theme_enqueue_scripts() {
    // CSSの読み込み
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/common.css');

    // デバッグ用にパスを表示
    error_log('Smart Slider 3 CSS Path: ' . plugins_url('smart-slider-3/public/assets/css/smartslider.min.css'));
    error_log('Smart Slider 3 JS Path: ' . plugins_url('smart-slider-3/public/assets/js/smartslider.min.js'));

    // Smart Slider 3のCSS
    wp_enqueue_style('smart-slider-3-css', plugins_url('smart-slider-3/public/assets/css/smartslider.min.css'));

    // JSの読み込み
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), null, true);

    // Smart Slider 3のJS
    wp_enqueue_script('smart-slider-3', plugins_url('smart-slider-3/public/assets/js/smartslider.min.js'), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

function register_my_menu() {
    register_nav_menus(array(
        'hamburger-menu' => 'ハンバーガーメニュー',
    ));
}
add_action('init', 'register_my_menu');

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
    } elseif (strpos($current_url, '/corporate-info/') !== false) {
        $template = locate_template('corporate-info.php');

        if ($template) {
            load_template($template);
            exit;
        }
    } elseif (strpos($current_url, '/company-profile/') !== false) {
        $template = locate_template('company-profile.php');

        if ($template) {
            load_template($template);
            exit;
        }
    }elseif (strpos($current_url, '/news/') !== false) {
        $template = locate_template('news.php');

        if ($template) {
            load_template($template);
            exit;
        }
    }elseif (strpos($current_url, '/privacy-policy/') !== false) {
        $template = locate_template('page-privacy-policy.php');

        if ($template) {
            load_template($template);
            exit;
        }
    }
}
add_action('template_redirect', 'custom_page_template_redirect');

// カスタム投稿タイプ「news」のタイトルとエディタを非表示にする
function remove_title_editor_from_news() {
    $post_type = 'news-post'; // カスタム投稿タイプのスラッグ
    remove_post_type_support($post_type, 'title');
    remove_post_type_support($post_type, 'editor');
}
add_action('init', 'remove_title_editor_from_news');



// ACFフィールドの日付を投稿のタイトルに設定する
// カスタム投稿タイプ「news-post」のタイトルとエディタを非表示にする
function remove_title_editor_from_news_post() {
    $post_type = 'news-post'; // カスタム投稿タイプのスラッグ
    remove_post_type_support($post_type, 'title');
    remove_post_type_support($post_type, 'editor');
}
add_action('init', 'remove_title_editor_from_news_post');

function set_title_from_acf_date($post_id) {
    // 自動保存の場合は処理しない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // カスタム投稿タイプが「news-post」でない場合は処理しない
    if (get_post_type($post_id) !== 'news-post') {
        return;
    }

    // ACFのグループフィールドからデータを取得
    $group_field = get_field('group', $post_id);

    // グループフィールドがnullでないことを確認
    if ($group_field && isset($group_field['date'])) {
        // グループフィールドから日付を取得
        $news_date = $group_field['date'];

        // 日付が設定されている場合は、タイトルを日付に設定
        if ($news_date) {
            // 日付を適切な形式にフォーマット
            $formatted_date = date('Y年n月j日 H:i', strtotime($news_date));

            // タイトルを更新
            remove_action('save_post', 'set_title_from_acf_date'); // 無限ループを防ぐために一時的にフックを削除
            wp_update_post(array(
                'ID' => $post_id,
                'post_title' => $formatted_date,
            ));
            add_action('save_post', 'set_title_from_acf_date'); // フックを再度追加
        }
    }
}
add_action('save_post', 'set_title_from_acf_date');
?>

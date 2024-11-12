<?php wp_head(); ?>

<?php get_header(); ?>

<div class="content">
<?php
the_title('<h1>', '</h1>');
// カスタム投稿タイプ 'news-post' の最新10件を取得
$args = array(
    'post_type'      => 'news-post', // カスタム投稿タイプのスラッグ
    'posts_per_page' => 10,          // 表示する投稿数
    'orderby'        => 'date',      // 日付で並び替え
    'order'          => 'ASC'       // 降順で並び替え
);

$news_query = new WP_Query($args);

if ($news_query->have_posts()) : ?>
    <ul class="page-news-ul">
        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
            <?php
            // ACFのグループフィールドからデータを取得
            $group_field = get_field('group');
            if ($group_field) {
                $news_date = $group_field['date'];
                $news_content = $group_field['content'];
            }
            ?>
            <li class="page-news-li">
                <?php if ($news_date): ?>
                    <p class="page-news-li__date"><?php echo date('Y年m月d日', strtotime($news_date)); ?></p>
                <?php endif; ?>
                <?php if ($news_content): ?>
                    <p class="page-news-li__content"><?php echo esc_html($news_content); ?></p>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
    <?php
    // ページネーションが必要な場合はここに追加します
    the_posts_pagination(array(
        'prev_text' => __('« Previous'),
        'next_text' => __('Next »'),
    ));
    ?>
<?php else : ?>
    <p><?php _e('No news found'); ?></p>
<?php endif;

// クエリをリセット
wp_reset_postdata();
?>
        </div>

    <?php get_footer(); ?>

<?php wp_footer(); ?>
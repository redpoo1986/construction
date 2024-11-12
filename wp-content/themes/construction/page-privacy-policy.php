<?php wp_head(); ?>

    <?php get_header(); ?>

        <div class="content">
                    <?php
                    // 固定ページの内容をループで取得
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            // タイトルの表示
                            the_title('<h1>', '</h1>');

                            // 固定ページのコンテンツを表示
                            the_content();
                        endwhile;
                    endif;
                    ?>
        </div>

    <?php get_footer(); ?>

<?php wp_footer(); ?>
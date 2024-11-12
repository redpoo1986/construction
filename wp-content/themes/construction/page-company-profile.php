<?php wp_head(); ?>

<?php get_header(); ?>

<div class="content">
            <?php
            // 固定ページの内容をループで取得
            if (have_posts()) :
              while (have_posts()) : the_post();
                    // タイトルの表示
                the_title('<h1>', '</h1>');
                the_content();
                    // 固定ページのコンテンツを表示
                endwhile;
            endif;
            ?>
        </div>

        <div class="company-profile__info">
            <div class="company-profile__info-left">
                <p class="company-profile__info-left__1">お問い合わせ</p>
                <p class="company-profile__info-left__2">お仕事、その他に関するお問い合わせは、電話または フォームからお気軽にご連絡ください。</p>
            </div>
            <div class="company-profile__info-right">
                <div class="company-profile__info-right__left">
                    <p class="company-profile__info-right__1">お電話でのお問い合わせ</p>    
                    <p class="company-profile__info-right__2">03-0000-0000</p>    
                </div>
                <div class="company-profile__info-right__right">
                    <p class="company-profile__info-right__3">フォームでのお問い合わせ</p>    
                    <a class="company-profile__info-right__4">お問い合わせ</a>    
                </div>    
            </div>
        </div>

        <?php get_footer(); ?>

<?php wp_footer(); ?>
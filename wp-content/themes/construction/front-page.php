<?php get_header(); ?>
<main id="main">
    <img class="main__image--sp" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mainvisual-sp.jpg" alt="">
    <img class="main__image--pc" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/mainvisual-pc.jpg" alt="">

    <div class="main-post">
        <?php
// 投稿数を3件に制限するカスタムクエリ
            $args = array(
                'posts_per_page' => 3,
            );
            $custom_query = new WP_Query($args);

            if ($custom_query->have_posts()) :
                while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    <article class="post">
                        <dl class="post__meta">
                            <dd class="post__date"><?php echo get_the_date('Y年n月j日'); ?></dd>
                            <dt class="post__title"><?php the_title(); ?></dt>
                        </dl>
                    </article>
                    <?php endwhile;
                wp_reset_postdata(); // クエリをリセット
            endif;
            ?>
    </div>
    
    <div class="thumbnail">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/top-company.jpg" alt="" class="thumbnail__sp">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/top-work.jpg" alt="" class="thumbnail__sp">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/top-company.jpg" alt="" class="thumbnail__pc">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/top-work.jpg" alt="" class="thumbnail__pc">
    </div>
    
</main>
    

<?php get_footer(); ?>
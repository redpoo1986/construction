<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt="">
        <div class="container">
            <div class="menu-toggle" id="menu-toggle">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <nav class="nav" id="nav">
                <?php wp_nav_menu(array('theme_location' => 'hamburger-menu')); ?>
            </nav>
        </div>
    </header>

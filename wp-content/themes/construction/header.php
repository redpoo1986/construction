<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="header__ham-container">
        <div class="header__ham-menu-toggle" id="menu-toggle">
            <div class="header__ham-menu-toggle__bar"></div>
            <div class="header__ham-menu-toggle__bar"></div>
            <div class="header__ham-menu-toggle__bar"></div>
        </div>
        <nav class="header__ham-nav" id="nav">
		<div class="header__close" id="close-menu">&times;</div>
            <?php wp_nav_menu(array('theme_location' => 'hamburger-menu')); ?>
        </nav>
    </div>
    <img class="header__img" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt="">
    <nav class="header__glo-nav" id="nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'header__glo-nav__menu',
            'container' => false,
            'menu_class' => 'header__glo-nav__ul'
        ));
        ?>
    </nav>
</header>


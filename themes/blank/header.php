<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <title>
        <?php wp_title(); ?>
    </title>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="site-header">
        <div class="site-branding">
            <!-- Add your logo or site title here -->
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
        </div>

        <!-- Navigation menu -->
        <?php
        $menu_location = is_home() || is_front_page() ? 'header-menu' : 'home-menu';
        wp_nav_menu(array('theme_location' => $menu_location));
        ?>

    </header>
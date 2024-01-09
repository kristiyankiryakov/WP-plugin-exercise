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




            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
        </div>

        <!-- Navigation menu -->
        <?php
        // $menu_location = is_home() || is_front_page() ? 'header-menu' : 'home-menu';
        wp_nav_menu(array('theme_location' => 'home-menu'));
        ?>

        <?php
        // Check if not on the root or "/contact" page
        if (!is_front_page() && !is_page('contact')) {
            ?>
            <div class="search-form-container">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <label>
                        <span class="screen-reader-text">
                            <?php echo _x('Search for:', 'label', 'blank'); ?>
                        </span>
                        <input type="search" class="search-field"
                            placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'blank'); ?>"
                            value="<?php echo get_search_query(); ?>" name="s" />
                    </label>
                    <button type="submit" class="search-submit">&#128269;</button>
                </form>
            </div>
            <?php
        }
        ?>


    </header>
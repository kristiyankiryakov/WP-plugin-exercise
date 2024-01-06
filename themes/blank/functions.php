<?php
function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
function enqueue_theme_styles()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('after_setup_theme', 'register_my_menu');
add_theme_support('post-thumbnails');
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');


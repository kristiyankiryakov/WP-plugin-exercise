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

// Posts content view
function custom_excerpt_length($length)
{
    return 10;
}

function custom_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_length', 'custom_excerpt_length');
add_filter('excerpt_more', 'custom_excerpt_more');


// resolves sidebar error

function theme_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Main Sidebar', 'blank'),
            'id' => 'blank_sidebar',
            'description' => esc_html__('Add widgets here.', 'blank'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'theme_widgets_init');



function change_wp_search_size($query) {
    if ( $query->is_search ) // Make sure it is a search page
        $query->query_vars['posts_per_page'] = 10; // Change 10 to the number of posts you would like to show

    return $query; // Return our modified query variables
}

add_filter('pre_get_posts','change_wp_search_size');


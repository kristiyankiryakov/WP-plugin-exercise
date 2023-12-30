<?php

/**
 * @package KrisPlugin
 */
/*
Plugin Name: Kris Plugin
Plugin URI: http://kris.com
Description: This is my first plugin
Version: 1.0.0
Author Kristiyan Kiryakov
Author URI: http://kris.com
License: GPLv2 or later
Text Domain: kris-plugin 
*/

if (!defined('ABSPATH')) {
    die;
}

class KrisPlugin
{
    function __construct()
    {
        // adds the function to the class otherwise you can't access it
        add_action('init', array($this, 'custom_post_type'));
    }

    function activate()
    {
        $this->custom_post_type();
        flush_rewrite_rules();
    }
    function register()
    {
        // admin_enqueue_scripts for backend and wp_enqueue_scripts for frontend
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    function deactivate()
    {
        flush_rewrite_rules();
    }
    function uninstall()
    {
        // delete CPT
        // delete all plugin data from the DB
    }
    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
    function enqueue()
    {
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('myscript', plugins_url('/assets/myscript.js', __FILE__));
    }
}

if (class_exists('KrisPlugin')) {
    $krisPlugin = new KrisPlugin();
    $krisPlugin->register();
}


// activation
register_activation_hook(__FILE__, array($krisPlugin, 'activate'));

// deactivate
register_deactivation_hook(__FILE__, array($krisPlugin, 'deactivate'));

// uninstall

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
}

if (class_exists('KrisPlugin')) {
    $krisPlugin = new KrisPlugin();
}


// activation
register_activation_hook(__FILE__, array($krisPlugin, 'activate'));

// deactivate
register_deactivation_hook(__FILE__, array($krisPlugin, 'deactivate'));

// uninstall

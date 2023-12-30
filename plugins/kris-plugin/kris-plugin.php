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

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;

class KrisPlugin
{
    public $plugin;
    public function __construct()
    {
        $this->plugin = plugin_basename(__FILE__);
    }
    public function register()
    {
        // admin_enqueue_scripts for backend and wp_enqueue_scripts for frontend
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

        add_action('admin_menu', array($this, 'add_admin_pages'));

        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }
    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=kris_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
    public function add_admin_pages()
    {
        add_menu_page('Kris Plugin', 'Kris', 'manage_options', 'kris_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }
    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }
    protected function create_post_type()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
    function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('myscript', plugins_url('/assets/myscript.js', __FILE__));
        // syntax to enqueue async script
        // wp_enqueue_script('myscript', plugins_url('/assets/myscript.js', __FILE__), null, null, ['strategy' => 'async']);
    }
    function activate()
    {
        Activate::activate();
    }
    function deactivate(){
        Deactivate::deactivate();
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

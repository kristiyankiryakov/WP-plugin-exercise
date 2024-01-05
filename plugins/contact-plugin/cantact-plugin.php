<?php
/**
 *  
 * Plugin Name: Contact Plugin
 * Description" Test plugin
 * Version : 1.0.0
 * Text Domain: options-plugin
 */

if (!defined('ABSPATH')) {
    die('');
}


class ContactPlugin
{
    public function __construct()
    {
        define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
        require_once(MY_PLUGIN_PATH . '/vendor/autoload.php');
    }

    public function initialize()
    {
        include_once(MY_PLUGIN_PATH . 'includes/utilities.php');
        include_once(MY_PLUGIN_PATH . 'includes/options-page.php');
        include_once(MY_PLUGIN_PATH . 'includes/contact-form.php');

    }

    function add_my_script()
    {
        wp_enqueue_script('jquery');
    }

}

$contact_plugin = new ContactPlugin();

$contact_plugin->initialize();

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

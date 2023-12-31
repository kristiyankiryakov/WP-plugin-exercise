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

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}

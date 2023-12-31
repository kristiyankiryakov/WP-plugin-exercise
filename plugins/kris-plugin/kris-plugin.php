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

use Inc\Base\Activate;
use Inc\Base\Deactivate;

if (!defined('ABSPATH')) {
    die;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activate()
{
    Activate::activate();
}

function deactivate()
{
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate');
register_deactivation_hook(__FILE__, 'deactivate');

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}

<?php
/**
 * @package KrisPlugin
 */

namespace Inc\Base;


class Enqueue
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

    }
    public function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assets/mystyle.css');
        wp_enqueue_script('myscript', PLUGIN_URL . '/assets/myscript.js');
        // syntax to enqueue async script
        // wp_enqueue_script('myscript', plugins_url('/assets/myscript.js', __FILE__), null, null, ['strategy' => 'async']);
    }
}
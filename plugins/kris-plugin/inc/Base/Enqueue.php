<?php
/**
 * @package KrisPlugin
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

    }
    public function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('mypluginstyle', $this->plugin_url . '/assets/mystyle.css');
        wp_enqueue_script('myscript', $this->plugin_url . '/assets/myscript.js');
        // syntax to enqueue async script
        // wp_enqueue_script('myscript', plugins_url('/assets/myscript.js', __FILE__), null, null, ['strategy' => 'async']);
    }
}
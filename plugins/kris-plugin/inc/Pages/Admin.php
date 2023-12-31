<?php
/**
 * @package KrisPlugin
 */

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\Settings;

class Admin extends BaseController
{
    public $pages = array();
    public $settings;

    public function __construct()
    {
        $this->settings = new Settings();
        array_push($this->pages, [
            'page_title' => 'Kris Plugin',
            'menu_title' => 'Kris',
            'capability' => 'manage_options',
            'menu_slug' => 'kris_plugin',
            'callback' => function () {
                echo '<h1>Kris pluggiin</h1>';
            },
            'icon_url' => 'dashicons-store',
            'position' => 110
        ]);
    }
    public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
    }

}
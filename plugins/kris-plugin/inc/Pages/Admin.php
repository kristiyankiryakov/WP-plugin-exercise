<?php
/**
 * @package KrisPlugin
 */

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\Settings;

class Admin extends BaseController
{
    public $settings;

    public function __construct()
    {
        $this->settings = new Settings();
    }
    public function register()
    {
        $pages = [
            [
                'page_title' => 'Kris Plugin',
                'menu_title' => 'Kris',
                'capability' => 'manage_options',
                'menu_slug' => 'kris_plugin',
                'callback' => function () {
                    echo '<h1>Kris pluggiin</h1>';
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]
        ];
        $this->settings->addPages($pages)->register();
    }
    
}
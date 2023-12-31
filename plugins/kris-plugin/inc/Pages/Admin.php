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
    public $sub_pages = array();

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

        array_push(
            $this->sub_pages,
            [
                'parent_slug' => 'kris_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'kris_cpt',
                'callback' => function () {
                    echo '<h1>CPT Manager</h1>';
                },
            ],
            [
                'parent_slug' => 'kris_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'kris_taxonomies',
                'callback' => function () {
                    echo '<h1>Taxonomies Manager</h1>';
                },
            ],
            [
                'parent_slug' => 'kris_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'kris_widgets',
                'callback' => function () {
                    echo '<h1>Widgets Manager</h1>';
                },
            ]
        );
    }
    public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->sub_pages)->register();
    }

}
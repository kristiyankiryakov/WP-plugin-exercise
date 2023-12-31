<?php
/**
 * @package KrisPlugin
 */

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Base\BaseController;
use Inc\Api\Settings;

class Admin extends BaseController
{
    public $pages = array();
    public $sub_pages = array();
    public $callbacks;
    public $settings;

    public function register()
    {
        $this->settings = new Settings();

        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubPages();

        $this->settings->addPages($this->pages)->addSubPages($this->sub_pages)->register();
    }
    public function setPages()
    {
        $this->pages =
            [
                [
                    'page_title' => 'Kris Plugin',
                    'menu_title' => 'Kris',
                    'capability' => 'manage_options',
                    'menu_slug' => 'kris_plugin',
                    'callback' => array($this->callbacks, 'adminDashboard'),
                    'icon_url' => 'dashicons-store',
                    'position' => 110
                ]
            ];
    }

    public function setSubPages()
    {
        $this->sub_pages = [
            [
                'parent_slug' => 'kris_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'kris_cpt',
                'callback' => array($this->callbacks, 'cpt'),
            ],
            [
                'parent_slug' => 'kris_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'kris_taxonomies',
                'callback' => array($this->callbacks, 'taxonomies'),
            ],
            [
                'parent_slug' => 'kris_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'kris_widgets',
                'callback' => array($this->callbacks, 'widgets'),
            ]
        ];
    }

}
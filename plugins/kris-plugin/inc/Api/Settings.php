<?php
/**
 * @package KrisPlugin
 */

namespace Inc\Api;

class Settings
{
    public $admin_pages = array();
    public $admin_sub_pages = array();
    public $settings = array();
    public $sections = array();
    public $fields = array();

    public function register()
    {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', array($this, 'addAdminMenu'));
        }

        if (!empty($this->settings)) {
            add_action('admin_init', array($this, 'registerCustomFields'));
        }
    }

    public function addPages(array $pages)
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function addSubPages(array $sub_pages)
    {
        $this->admin_sub_pages = array_merge($this->admin_sub_pages, $sub_pages);
        return $this;
    }
    public function withSubPage(string $title = null)
    {
        if (empty($this->admin_pages)) {  // so we don't break the chaining
            return $this;
        }

        $admin_page = $this->admin_pages[0];
        $sub_page =
            [
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => function () {
                    echo '<h1>Kris pluggiin subpage</h1>';
                },
            ];

        array_push($this->admin_sub_pages, $sub_page);
        return $this;
    }
    public function addAdminMenu()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon_url'],
                $page['position']
            );
        }
        foreach ($this->admin_sub_pages as $page) {
            add_submenu_page(
                $page['parent_slug'],
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback']
            );
        }
    }
    public function setSettings(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    public function setSections(array $sections)
    {
        $this->sections = $sections;
        return $this;
    }
    public function setFields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function registerCustomFields()
    {
        foreach ($this->settings as $setting) {
            register_setting($setting['option_group'], $setting['option_name'], $setting['callback'] ?? '');
        }
        foreach ($this->sections as $section) {
            add_settings_section($section['id'], $section['title'], $section['callback'] ?? '', $section['page']);
        }
        foreach ($this->fields as $field) {
            add_settings_field($field['id'], $field['title'], $field['callback'] ?? '', $field['page'], $field['section'], $field['args'] ?? '');
        }
    }

}

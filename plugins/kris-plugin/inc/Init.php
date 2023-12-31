<?php
/**
 * @package KrisPlugin
 */

namespace Inc;


final class Init
{
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
        ];
    }
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = new $class();

            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

}

// class KrisPlugin
// {
//     public $plugin;
//     public function __construct()
//     {
//         $this->plugin = plugin_basename(__FILE__);
//     }
//     public function register()
//     {
//         // admin_enqueue_scripts for backend and wp_enqueue_scripts for frontend
//       
//         add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
//     }
//     public function settings_link($links)
//     {
//         $settings_link = '<a href="admin.php?page=kris_plugin">Settings</a>';
//         array_push($links, $settings_link);
//         return $links;
//     }
//    
//     protected function create_post_type()
//     {
//         add_action('init', array($this, 'custom_post_type'));
//     }

//     function custom_post_type()
//     {
//         register_post_type('book', ['public' => true, 'label' => 'Books']);
//     }
//    
//     function activate()
//     {
//         Activate::activate();
//     }
//     function deactivate()
//     {
//         Deactivate::deactivate();
//     }
// }

// if (class_exists('KrisPlugin')) {
//     $krisPlugin = new KrisPlugin();
//     $krisPlugin->register();
// }


// // activation
// register_activation_hook(__FILE__, array($krisPlugin, 'activate'));

// // deactivate
// register_deactivation_hook(__FILE__, array($krisPlugin, 'deactivate'));

// // uninstall

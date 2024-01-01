<?php
/**
 * @package KrisPlugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;


class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }
    public function cpt()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }
    public function taxonomies()
    {
        return require_once("$this->plugin_path/templates/taxonomies.php");
    }
    public function widgets()
    {
        return require_once("$this->plugin_path/templates/widgets.php");
    }
    public function krisOptionsGroup($input)
    {
        return $input;
    }
    public function krisAdminSection()
    {
        echo 'Check this section';
    }
    public function krisTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value=" '. $value .' " placeholder="test" />';
    }
}
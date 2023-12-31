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
}
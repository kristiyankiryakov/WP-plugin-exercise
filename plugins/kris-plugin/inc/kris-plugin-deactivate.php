<?php
/**
 * @package KrisPlugin
 */

class KrisPluginDeactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
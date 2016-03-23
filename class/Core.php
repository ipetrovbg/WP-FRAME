<?php
/**
* @author
 */

namespace IP_WP_FRAME;


class Core
{
    private static $_instance   = null;

    private function __construct()
    {
        \IP_WP_FRAME\Loader::registerNamespace('IP_WP_FRAME_CORE', get_stylesheet_directory() . '/frame/core');
    }

    /**
     * @return \IP_WP_FRAME\Core
     *
     * singleton
     * */
    public static function getInstance()
    {
        if (self::$_instance == null) {

            self::$_instance = new \IP_WP_FRAME\Core();

        }
        return self::$_instance;
    }
}
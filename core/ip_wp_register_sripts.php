<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 3/15/16
 * Time: 10:17 PM
 */

namespace IP_WP_FRAME_CORE;


class ip_wp_register_sripts
{
    public $scriptname;

    public function __construct( $scriptName )
    {
        $this->scriptname = $scriptName;

        add_action('wp_enqueue_scripts', array($this, 'theme_enqueue_styles'));
    }

    public function theme_enqueue_styles()
    {
        $themeStile = get_stylesheet_directory_uri() . $this->scriptname;

        wp_enqueue_style($this->scriptname, $themeStile);
    }
}
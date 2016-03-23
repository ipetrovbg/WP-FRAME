<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 3/15/16
 * Time: 10:17 PM
 */

namespace IP_WP_FRAME_CORE;


class IP_WP_LOAD_STYLE
{
    public $scriptname;
    public $id;
    public $version;
    public $dependency;

    public function __construct( $scriptName, $id, $version )
    {
        $this->scriptname   = $scriptName;
        $this->id           = $id;
        $this->version      = $version;

        add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_styles' ) );

    }

    public function theme_enqueue_styles()
    {
        wp_enqueue_style( $this->id, get_stylesheet_directory_uri() . $this->scriptname, false, $this->version, 'all' );
    }
}
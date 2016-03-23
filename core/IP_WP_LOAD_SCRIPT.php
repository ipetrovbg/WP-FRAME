<?php

namespace IP_WP_FRAME_CORE;


class IP_WP_LOAD_SCRIPT
{
    public $name, $path, $dependency, $vertion;

    public function __construct($name, $path, $dependency, $vertion = false, $localize , $localize_array)
    {
        $this->name             = $name;
        $this->path             = $path;
        $this->dependency       = $dependency;
        $this->vertion          = $vertion;
        $this->localize         = $localize;
        $this->localize_array   = $localize_array;

        add_action( 'wp_footer', array( $this, 'theme_enqueue_scripts' ) );
    }

    public function theme_enqueue_scripts()
    {
        wp_enqueue_script( $this->name,  $this->path, $this->dependency, $this->vertion, TRUE );

        if($this->localize === true){
            if(is_array($this->localize_array)){
                wp_localize_script( $this->name, 'WP_VAR', $this->localize_array);
            }
        }

    }
}
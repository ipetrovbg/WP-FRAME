<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ip_wp_core
 *
 * @author petar
 */
class ip_wp_core {

    public function ip_wp_load_cripts($script_name) {

        return  $script_name; 

    }

    public function load($file_path)
    {
        require_once ( $file_path );
    }

}


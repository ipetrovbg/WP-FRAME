<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 3/15/16
 * Time: 7:59 AM
 */

namespace IP_WP_FRAME_CORE;
//defined('BASEPATH') OR exit('No direct script access allowed');


class IP_WP_OPTIONS
{

    private $optionName;
    private $core;

    public function __construct()
    {
        if( ! $this->optionName){

            $this->core = new \IP_WP_FRAME_CORE\IP_WP_CORE();

            $this->optionName = 'siteurl';


        }
    }

    public function getOption($optionName = false)
    {
        if( ! $optionName ){
            $optionName = $this->optionName;
        }
        $options =$this->core->getOptions($optionName); /*'ping_sites'*/

       return $options[$optionName];
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: User-02
 * Date: 23.3.2016 г.
 * Time: 15:27
 */

namespace IP_WP_FRAME_CORE;


class IP_WP_CREATE_ADMIN_SUB_PAGE
{
    public $parent_url, $admin_name, $title_name, $option, $page_url, $callback_function;
    public function __construct($parent_url, $admin_name, $title_name, $option, $page_url, $callback_function)
    {
        $this->parent_url           = $parent_url;
        $this->admin_name           = $admin_name;
        $this->title_name           = $title_name;
        $this->option               = $option;
        $this->page_url             = $page_url;
        $this->callback_function    = $callback_function;


        /**
         *  call function register_page, witch create page in admin panel
         **/
        add_action('admin_menu', array( $this, 'register_sub_page' ));

    }

    /**
     *  register sub page
     * */
    public function register_sub_page()
    {
        add_submenu_page($this->parent_url, $this->admin_name, $this->title_name, $this->option, $this->page_url, $this->callback_function);
    }

}
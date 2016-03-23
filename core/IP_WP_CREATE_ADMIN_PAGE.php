<?php
/**
 * Created by PhpStorm.
 * User: User-02
 * Date: 23.3.2016 г.
 * Time: 14:56
 */

namespace IP_WP_FRAME_CORE;


class IP_WP_CREATE_ADMIN_PAGE
{

    public $admin_name, $title_name, $option, $page_url, $callback_function, $dashicon;

    public function __construct($admin_name, $title_name, $option, $page_url, $callback_function, $dashicon = false)
    {
        $this->admin_name           = $admin_name;
        $this->title_name           = $title_name;
        $this->option               = $option;
        $this->page_url             = $page_url;
        $this->callback_function    = $callback_function;
        $this->dashicon             = $dashicon;

        /**
         *  call function register_page, witch create page in admin panel
         **/
        add_action('admin_menu', array( $this, 'register_page' ));
    }

    public function register_page()
    {
        add_menu_page($this->admin_name, $this->title_name, $this->option, $this->page_url, $this->callback_function, $this->dashicon);
    }


}
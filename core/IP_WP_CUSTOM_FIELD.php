<?php
/**
 * Created by PhpStorm.
 * User: User-02
 * Date: 23.3.2016 г.
 * Time: 15:41
 */

namespace IP_WP_FRAME_CORE;


class IP_WP_CUSTOM_FIELD
{
    public $field_name, $value;

    public function __construct()
    {

        /*
         *  saving data from youtube meta box
         * */
        add_action('save_post', array($this, 'save_post_meta'));
    }

    public function create_custom_field($field_name, $value = false)
    {
        $ID = \IP_WP_FRAME_CORE\IP_WP_CORE::getCurrentId();
        $meta = get_post_meta($ID, $field_name);

        if(!$meta){

            $this->field_name   = $field_name;

            if($value) {
                $this->value = $value;
            }else{
                $this->value = '';
            }

            /**
             *  registering custom field
             * */
            add_post_meta($ID, $field_name, $value);
        }

    }


    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save_post_meta($post_id)
    {
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if (!isset($_POST['myplugin_inner_custom_box_nonce'])) {
            return $post_id;
        }
        $nonce = $_POST['myplugin_inner_custom_box_nonce'];
        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'myplugin_inner_custom_box')) {
            return $post_id;
        }
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }
        $value = get_post_meta($post_id, $this->field_name, true);
        /* OK, it's safe for us to save the data now. */

        // Update the meta field.
        update_post_meta($post_id, $this->field_name, $value);
    }

}
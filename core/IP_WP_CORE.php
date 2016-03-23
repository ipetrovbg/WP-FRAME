<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 3/15/16
 * Time: 8:01 AM
 */

namespace IP_WP_FRAME_CORE;


class IP_WP_CORE
{

    public function __construct()
    {
    }

    public function getOptions($ontionName = false)
    {
        global $wpdb;

        $connect = new \IP_WP_FRAME_CORE\IP_WP_DB_CONNECT();

        $optionsTable = $wpdb->prefix . 'options';

        $query = "SELECT * FROM $optionsTable WHERE option_name = '$ontionName'";

        if ($result = mysqli_query($connect->dbConnect(), $query)) {

            $arrayStore = array();

            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {
                $arrayStore[$row["option_name"]] = $row["option_value"];
            }
//            print_r($arrayStore);
            if (is_serialized($arrayStore[$ontionName])) {
                $arrayStore[$ontionName] = unserialize($arrayStore[$ontionName]);
            }
            return $arrayStore;

            /* free result set */
            mysqli_free_result($result);
        }


    }

    /**
     * @return int
     * */
    public static function getCurrentId(){
        $url = explode('?', 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        $ID = url_to_postid($url[0]);

        return $ID;
    }

}
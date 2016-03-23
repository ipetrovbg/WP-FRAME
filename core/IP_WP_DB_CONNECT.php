<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 3/15/16
 * Time: 9:36 PM
 */

namespace IP_WP_FRAME_CORE;


class IP_WP_DB_CONNECT
{

    public function __construct()
    {
//        $this->dbConnect();
    }

    public function dbConnect(){

        $mysqli = mysqli_init();


        $localhost      = \IP_WP_FRAME\Confiq::getInstance()->db['localhost'];
        $username       = \IP_WP_FRAME\Confiq::getInstance()->db['username'];
        $password       = \IP_WP_FRAME\Confiq::getInstance()->db['password'];
        $db             = \IP_WP_FRAME\Confiq::getInstance()->db['db'];



        if (!$mysqli) {
            die('mysqli_init failed');
        }
        if (!$mysqli->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
            die('Setting MYSQLI_INIT_COMMAND failed');
        }
        if (!$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
            die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
        }
        if (!$mysqli->real_connect($localhost, $username, $password, $db)) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        return $mysqli;

//        $mysqli->close();
    }


}
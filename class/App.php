<?php

/**.
* @author ipetrovbg
 */
namespace IP_WP_FRAME;

require_once 'Loader.php';

class App
{

    private static $_instance = null;

    private $_confiq = null;
    private $_core = null;


    private function __construct()
    {
        \IP_WP_FRAME\Loader::registerNamespace('IP_WP_FRAME', dirname(__FILE__) . DIRECTORY_SEPARATOR);
        \IP_WP_FRAME\Loader::registerAutoload();
        $this->_confiq = \IP_WP_FRAME\Confiq::getInstance();
        $this->_core = \IP_WP_FRAME\Core::getInstance();
    }

    /**
     * @return \IP_WP_FRAME\App
     *
     * singleton
     * */
    public static function getInstance()
    {
        if (self::$_instance == null) {

            self::$_instance = new \IP_WP_FRAME\App();

        }
        return self::$_instance;
    }

    public function getConfiqFolder()
    {
        return $this->_confiqFolder;
    }

    /**
     *  starting framework
     * */
    public function run()
    {
        if ($this->_confiq->getConfiqFolder() == null) {
            /**
             *  setting confiq folder as default once
             * */
            $this->setConfiqFolder(dirname( realpath( __FILE__ ) ) . DIRECTORY_SEPARATOR .'../confiq');
        }
    }
    /**
     * @return \IP_WP_FRAME\Confiq
     * */
    public function getConfiq()
    {
        return $this->_confiq;
    }

    public function setConfiqFolder($path)
    {
        $this->_confiq->setConfiqFolder($path);
    }

}
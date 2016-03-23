<?php
/**
* @author ipetrovbg
 */

namespace IP_WP_FRAME;


class Confiq {

    private static $_instance   = null;
    private $_cofiqArray        = array();
    private $_confiqFolder      = null;

    private function __construct()
    {

    }

    public function getConfiqFolder()
    {
        return $this->_confiqFolder;
    }

    public function setConfiqFolder( $confiqFolder ){

        if( ! $confiqFolder ){
            throw new \Exception( 'Empty confiq folder path:' );
        }
        $_confiqFolder = realpath( $confiqFolder );

        if( $_confiqFolder != false && is_dir( $_confiqFolder ) && is_readable( $_confiqFolder ) ){
            $this->_cofiqArray = array();
            $this->_confiqFolder = $_confiqFolder . DIRECTORY_SEPARATOR;

            $ns = $this->app['namespace'];
            if(is_array( $ns )){
                \IP_WP_FRAME\Loader::registerNamespace( $ns );
            }

        }else{
            throw new \Exception( 'Confiq directory reed error: '. $confiqFolder );
        }

    }

    public function includeConfiqFile( $path ){

        if( ! $path ){

            /*TODO*/
            throw new \Exception( '' );
        }
        $_file = realpath( $path );
        if( $_file != false && is_readable( $_file ) && is_file( $_file )){
            $_basename = explode('.php', basename( $_file ))[0];
            $this->_cofiqArray[$_basename] = include $_file;
        }else{
            /*TODO*/
            throw new \Exception( 'Confiq file read error: '. $path );
        }

    }

    public function __get( $name )
    {
        if( !$this->_cofiqArray[ $name ] ){
            $this->includeConfiqFile( $this->_confiqFolder . $name . '.php' );
        }
        if( array_key_exists( $name, $this->_cofiqArray )){
            return $this->_cofiqArray[ $name ];
        }
        return null;
    }

    /**
     * @return \IP_WP_FRAME\Confiq
     *
     * singleton
     * */
    public static function getInstance()
    {
        if (self::$_instance == null) {

            self::$_instance = new \IP_WP_FRAME\Confiq();

        }
        return self::$_instance;
    }
}
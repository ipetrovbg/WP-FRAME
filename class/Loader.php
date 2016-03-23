<?php
/**
 * @author ipetrovbg
 *
 * Loader Class
 */

namespace IP_WP_FRAME;


final class Loader
{
    /**
     *  storing namespaces
     * */
    private static $namespace = array();

    private function __construct()
    {

    }

    public static function registerAutoload(){
        spl_autoload_register( array( '\IP_WP_FRAME\Loader', 'autoload' ) );
    }

    public static function autoload( $class ){
        self::loadClass( $class );
    }

    public static function loadClass( $class )
    {
         foreach( self::$namespace as $k => $v ){
            if( strpos( $class, $k ) === 0 ){
                $file = realpath( substr_replace( str_replace( '\\', DIRECTORY_SEPARATOR, $class ), $v, 0, strlen( $k ) ). '.php' );
                if( $file && is_readable( $file ) ){
                        include $file;
                }else{
                    /*TODO*/
                    throw new \Exception( 'File cannot be included'. $file );
                }
                break;
            }
         }
    }
    
    public static function registerNamespace( $namespace, $path ){

        $namespace = trim( $namespace );

        if(strlen( $namespace ) > 0 ){

            if( ! $path ){
                throw new \Exception( 'Invalid path '. $path );
            }

            $_path = realpath( $path );

            if( $_path && is_readable( $_path ) && is_dir( $_path ) ){

                self::$namespace[ $namespace.'\\' ] = $path . DIRECTORY_SEPARATOR;

            }else{
                /*TODO*/
                throw new \Exception( 'Namespace directory reed error: '. $path );
            }

        }else{
            /*TODO*/
            throw new \Exception( 'Invalid namespace '. $namespace );
        }

    }

}
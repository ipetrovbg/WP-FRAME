# Simple WP framework
# INSTALATION
require_once( path-to '/class/App.php');

now navigate to class/Core and give path to core folder
\IP_WP_FRAME\Loader::registerNamespace('IP_WP_FRAME_CORE', get_stylesheet_directory() . '/frame/core');

in my case is "/frame/core"

$app = \IP_WP_FRAME\App::getInstance();

$app->run();

Then in core folder can create new class with namespace IP_WP_FRAME_CORE

# ex:
if you want to load style just write:
just give path to your style, give the name and give the version of your style

new \IP_WP_FRAME_CORE\IP_WP_LOAD_STYLE( '/css/default.css', 'default', '1.0' );

done

#ex:
if you want some WordPress option just create new instance of IP_WP_OPTION class
and call "echo $option->getOption('ping_sites');"

Before that you must navigate to confiq/db.php and set your confiq data

$option = new \IP_WP_FRAME_CORE\IP_WP_OPTIONS();
echo $option->option('ping_sites');
# Simple WP framework
# INSTALATION
require_once( path-to '/class/App.php');

$app = \IP_WP_FRAME\App::getInstance();

$app->run();

Then in core folder can create new class with namespace IP_WP_FRAME_CORE

# ex:
if you want to load style just write:
just give path to your styleр give the name and give version of your style

new \IP_WP_FRAME_CORE\IP_WP_LOAD_STYLE( '/css/default.css', 'default', '1.0' );

done

# new ex:
if you want some WordPress option just create new instance of IP_WP_OPTION class
and call "echo $option->getOption('ping_sites');"

$option = new \IP_WP_FRAME_CORE\IP_WP_OPTIONS();
echo $option->option('ping_sites');
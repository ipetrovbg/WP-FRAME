# WP-FRAME
# INSTALATION
require_once( path-to '/frame/class/App.php');

$app = \IP_WP_FRAME\App::getInstance();

$app->run();

Then in core folder can create now class with namespace IP_WP_FRAME_CORE

#ex:
if you want to load style just write:
give it the path to you style, give it the name and give it version
new \IP_WP_FRAME_CORE\IP_WP_LOAD_STYLE( '/css/default.css', 'default', '1.0' );

done

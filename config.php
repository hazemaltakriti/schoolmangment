<?php
ob_start();
session_start();


define('DS',DIRECTORY_SEPARATOR);

define('APP_NAME',basename(__DIR__));

define( 'APP_PATH',realpath( dirname(__FILE__) ) );

define('WEBSITE_NAME', 'http://localhost:10080/databaseite/');

define( 'ASSET', WEBSITE_NAME  . DS . 'assets' . DS);

define('LAYOUTS_DIR_HEADER', APP_PATH .  DS . 'view' .   DS . 'layouts' . DS .'header' . DS );    

define('LAYOUTS_DIR_NAVBAR', APP_PATH .  DS . 'view' .   DS . 'layouts' . DS . 'navbar' . DS );

define('LAYOUTS_DIR_FOOTER', APP_PATH .  DS . 'view' .   DS . 'layouts' . DS .'footer' . DS);

/* UPLOADS SAVES path where user save his files */
define('UPLOADSSAVES', APP_PATH . DS . 'uploads' . DS . 'saves' . DS);

/**/
/*  DATA BASE parameter configuration  */
define('SERVER_NAME','localhost');
define('USER_NAME','root');
define('PASSWORD','');
define('DATABASE_NAME','databaseite');
/*end database configuration*/

require APP_PATH .  DS . 'lib' . DS . 'autoload.php'; 

?>
<?php
/* 
 * includes/config.php
 * Application Deployment information and Autoload functions
 */

// ------------- Define Constants -------------
define('PATH_DEPLOY', $_SERVER['DOCUMENT_ROOT'].'/'); // with trailing slash
define('LOG_FILE_FOLDER', 'logs');
define('LOG_FILE_PATH', PATH_DEPLOY.LOG_FILE_FOLDER.'/');

define('URL_WEB', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('URL_STATIC', 'http://'.$_SERVER['HTTP_HOST'].'/static/');
define('URL_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/static/images/');
define('URL_JS', 'http://'.$_SERVER['HTTP_HOST'].'/static/js/');
define('URL_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/static/css/');
define('URL_FILES', 'http://'.$_SERVER['HTTP_HOST'].'/static/files/');

define('WEBSITE_TITLE', 'EasyApp - Web Application Template');
define('WEBSITE_VERSION', '0.1');
define('WEBSITE_VERSION_RELEASE', '&alpha;');


define('DEBUG', 1); // 0 = debugging off, 1 = debugging on

// ------------- Databases configurations -------------
$databases = array();
$databases['mysql'] = array(
	'driver' => 'mysqli',
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'database' => 'easyapp'
);
$databases['mongo'] = array(
	'driver' => 'mongo',
	'host' => 'localhost',
	'port' => '27017',
	'user' => '',
	'password' => '',
	'database' => 'easyapp'
);

// ------------- Autoload and Important functions -------------
// Set Autoload
function __autoload($sClassName) {
    if (file_exists(PATH_DEPLOY . 'classes/' . $sClassName . '.php')) {
        require_once(PATH_DEPLOY . 'classes/' . $sClassName . '.php');
    }
}
// Close DB Connections
function closeDBConnections() {
    DbConnection::closeConnections();
}
register_shutdown_function('closeDBConnections');
?>
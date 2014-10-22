<?php
/* 
 * app_inilialize.php
 * Sets autoload, includes configurations, closes DB Connections, Common Code, etc
 */
require_once("includes/config.php");
require_once("includes/constants.php");


// common code

// get action for switch cases inside controller
$easyApp['action'] = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

// Set Default Layout
$easyApp['layout'] = 'default'; // overwrite it in your controller file

// Set Default View file
$easyApp['view'] = ''; // overwrite it in your controller file

// Set Default View type (html, json, xml)
$easyApp['view_type'] = 'html'; // overwrite it in your controller file

// Set data for view
$easyApp['view_data'] = array(); // add your data with new jey in this array in your controller file, make sure same key is not used
$easyApp['view_data']["website"]["title"] = WEBSITE_TITLE;
$easyApp['view_data']["website"]["keywords"] = 'easyapp, application template, web application, extendable, spa, ria, html5, css3, responsive, php, mysql, mongodb, nosql, angularjs, skeleton css, jquery';
$easyApp['view_data']["website"]["description"] = 'An easy, flexible, very light weight, extendable, small to medium scale application template. Recommended for beginners exploring web technologies. Best suited for SPAs and RIAs.';

$_INPUT = array();
if(file_get_contents("php://input")) {
    $_INPUT = json_decode(file_get_contents("php://input"), true);
}

?>
<?php
/* 
 * index.php
 * controller for index page
 */
require_once("app_initialize.php");

$easyApp['layout'] = 'default';

switch ($easyApp['action']) {
    default:
        break;
}

require_once("app_render.php");
?>
<?php
/* 
 * app_render.php
 * renders output depending upon view_type
 */

if($easyApp['view_type'] == 'json') { // JSON
    Util::renderJson($easyApp['view_data']);
} else if($easyApp['view_type'] == 'xml') { // XML
    Util::renderXml($easyApp['view_data']);
} else { // HTML
    Util::renderView($easyApp['layout'], $easyApp['view'], $easyApp['view_data']);
}
?>
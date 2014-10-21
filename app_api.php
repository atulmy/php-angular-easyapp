<?php
/* 
 * api.php
 * controller for api
 */
require_once("app_initialize.php");

$easyApp['layout'] = '';
$easyApp['view_type'] = 'json';

switch ($easyApp['action']) {
    
    // Database Mongo
    case 'mongo_insert':
        $data = array();
        $data['name'] = isset($_INPUT['name']) ? Util::cleanInputData($_INPUT['name']) : '';
        $data['email'] = isset($_INPUT['email']) ? Util::cleanInputData($_INPUT['email']) : '';
        $customers = new Customers('mongo');
        $easyApp['view_data']['customers'] = $customers->addCustomersMongo($data);
        break;
    
    case 'mongo_select':
        $customers = new Customers('mongo');
        $easyApp['view_data']['customers'] = $customers->getCustomersMongo();
        break;
    
    
    // Database Mysql
    case 'mysql_insert':
        $data = array();
        $data['name'] = isset($_INPUT['name']) ? Util::cleanInputData($_INPUT['name']) : '';
        $data['email'] = isset($_INPUT['email']) ? Util::cleanInputData($_INPUT['email']) : '';
        $customers = new Customers();
        $easyApp['view_data']['customers'] = $customers->addCustomers($data);
        break;
    
    case 'mysql_select':
        $customers = new Customers();
        $easyApp['view_data']['customers'] = $customers->getCustomers();
        break;
    
    
    // Sampe Form
    case 'form_ajax':
        $easyApp['view_data'] = array('GET' => $_GET, 'POST' => $_POST, 'INPUT' => $_INPUT);
        break;
    
    case 'form_file_upload':
        $easyApp['view_data'] = array('GET' => $_GET, 'POST' => $_POST, 'INPUT' => $_INPUT, 'FILES' => $_FILES);
        break;
    
    default:
        break;
    
}
require_once("app_render.php");
?>
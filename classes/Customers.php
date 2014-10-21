<?php

class Customers extends DbOperations {

	private $dbConn = 'mysql';
	
	public function __construct($db = '') {
        if($db != '') {
            $this->dbConn = $db;
        }
	}
	
	public function __deconstruct() {
	
	}

// Functions

    // Get Customers [cRud]
	public function getCustomers() {
        $returnArray = array('success' => false, 'message' => 'Error getting Customers', 'data' => array());
		$querySelect = 'select * from customers';
		$result = $this->select($querySelect, array(), $this->dbConn);
        if($result) {
            $returnArray['success'] = true;
            $returnArray['data'] = $result;
        }
		return $returnArray;
	}
    public function getCustomersMongo() {
        $returnArray = array('success' => false, 'message' => 'Error getting Customers', 'data' => array());
		$collection = 'customers';
		$result = $this->select($collection, array(), $this->dbConn);
        if($result) {
            $returnArray['success'] = true;
            $returnArray['data'] = $result;
        }
		return $returnArray;
	}
	
    // Get Customers By Id [cRud]
	public function getCustomersById($id = 0) {
        $returnArray = array('success' => false, 'message' => 'Error getting Customers', 'data' => array());
		$querySelect = 'select * from customers where id = ?';
		$result = $this->select($querySelect, array($id), $this->dbConn);
        if($result) {
            $returnArray['success'] = true;
            $returnArray['data'] = $result;
        }
		return $returnArray;
	}
    
    // Add Customers [Crud]
	public function addCustomers($data = array()) {
        $returnArray = array('success' => false, 'message' => 'Error saving Customer', 'data' => array());
        if(!empty($data) && isset($data['name']) && isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $querySelect = 'insert into customers (name, email) values (?, ?)';
            $result = $this->insert($querySelect, array($data['name'], $data['email']), $this->dbConn);
            if($result) {
                $returnArray['success'] = true;
                $returnArray['message'] = 'Customer was added successfully.';
                $returnArray['data'] = $result;
            }
        }
		return $returnArray;
	}
    public function addCustomersMongo($data = array()) {
        $returnArray = array('success' => false, 'message' => 'Error saving Customer', 'data' => array());
        if(!empty($data) && isset($data['name']) && isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $collection = 'customers';
            $result = $this->insert($collection, array('name' => $data['name'], 'email' => $data['email']), $this->dbConn);
            if($result) {
                $returnArray['success'] = true;
                $returnArray['message'] = 'Customer was added successfully.';
                $returnArray['data'] = $result;
            }
        }
		return $returnArray;
	}
    
    // Delete Customers [cruD]
	public function deleteCustomers($id = 0) {
        $returnArray = array('success' => false, 'message' => 'Error deleting Customer', 'data' => array());
        if($id > 0) {
            $queryDelete = 'delete from customers where id = ?';
            $result = $this->delete($queryDelete, array($id), $this->dbConn);
            if($result) {
                $returnArray['success'] = true;
                $returnArray['message'] = 'Customer was deleted successfully.';
                $returnArray['data'] = $result;
            }
        }
		return $cubesId;
	}
	
    // Update Customers [crUd]
	public function updateCustomers($data = array()) {
        $returnArray = array('success' => false, 'message' => 'Error updating Customer', 'data' => array());
        if(!empty($data) && isset($data['id']) && isset($data['name']) && isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $querySelect = 'update customers set name = ?, email = ? where id = ?';
            $result = $this->insert($querySelect, array($data['name'], $data['email'], $data['id']), $this->dbConn);
            if($result) {
                $returnArray['success'] = true;
                $returnArray['message'] = 'Customer was updated successfully.';
                $returnArray['data'] = $result;
            }
        }
		return $returnArray;
	}
}

?>
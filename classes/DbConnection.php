<?php

final class DbConnection {

	private static $connections = array();

	/**
	 *  _construct don't permit an explicit call of the constructor! (like $v = new Singleton())
	 */
    private function __construct() # we don't permit an explicit call of the constructor! (like $v = new Singleton())
    { }

	/**
	 *  _clone don't permit cloning the singleton (like $x = clone $v)
	 */
    private function __clone() # we don't permit cloning the singleton (like $x = clone $v)
    { }

	/**
	 * getDBObject gets connection object to create link with database
	 * @param Array $database contains the details of the database
	 * <p> This function checks that already connected with database or not, otherwise calls createDBObject method to create connection</p>
	 * @return Connection Object.
	 */
	public static function getDBObject($database){
		if(empty(self::$connections[$database])){
			self::$connections[$database] = self::createDBObject($database);
		}
		return self::$connections[$database];
	}

	/**
	 * createDBObject creates connection object to create link with database
	 * @param Array $database contains the details of the database
	 * <p> This function create connection with database by using mysqli method</p>
	 * @return Connection Object if successfully connected.
	 */
    private static function createDBObject($database) {
        $databaseConnection = null;
		global $databases;
        if(isset($databases[$database])) {
            if($databases[$database]['driver'] == 'mysqli') {
                try {
                    $databaseConnection = new mysqli($databases[$database]['host'], $databases[$database]['user'], $databases[$database]['password'], $databases[$database]['database']);
                } catch (Exception $err){
                    $sysErr = 'Message: ' .$err->getMessage();
                    $custErr = 'Error in file: '.__FILE__.', Line: '.__LINE__;
                }
            } else if($databases[$database]['driver'] == 'mongo') {
                try {
                    $connection = null;
                    $serverSettings =  sprintf('mongodb://%s:%d/%s', $databases[$database]['host'], $databases[$database]['port'], $databases[$database]['database']); // Default Port: 27017
                    if($databases[$database]['user'] != '' && $databases[$database]['password'] != '') {
                        $connection = new Mongo($serverSettings, array('username' => $databases[$database]['user'], 'password' => $databases[$database]['password']));
                    } else {
                        $connection = new Mongo($serverSettings);
                    }
                    if($connection) {
                        $databaseConnection = $connection->selectDB($databases[$database]['database']);
                    }
                } catch (Exception $err){
                    $sysErr = 'Message: ' .$err->getMessage();
                    $custErr = 'Error in file: '.__FILE__.', Line: '.__LINE__;
                }
            }
		}
        return $databaseConnection;
    }

	/**
	 * closeConnections closes database connection
	 * @param : No parameters
	 * <p> This function closes database connection</p>
	 * @return void
	 */
	public static function closeConnections() {
		try {
			foreach(self::$connections as $connection) {
                $className = get_class($connection);
				try {
                    if($className == 'mysqli') {
                        $connection->close();
                    } if($className == 'MongoDB') {
                        //MongoClient::close($connection);
                    }
				} catch(Exception $closeErr) {}
			}
			self::$connections = null;
		} catch(Exception $err) {
			echo $err->getMessage();
		}
	}
}
?>
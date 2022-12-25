<?php
require 'config.php';

class ConnectServer {

    public static function connect() {
        // Establish MySQL connection
        $db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        // Check for connection error
        if ($db->connect_error) {
            die('Connection failed: ' . $db->connect_error);
        }
        return $db;
    }
}
?>
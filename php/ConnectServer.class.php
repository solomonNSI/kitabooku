<?php
require 'config.php';

class ConnectServer {

    public static function connect() {
        // Establish MySQL connection
        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        // Check for connection error
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        return $conn;
    }
}
?>
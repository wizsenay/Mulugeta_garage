<?php

class Database {
    private $host = "localhost";
    private $db_name = "mulugetagarage";
    private $username = "root";
    private $password = "0901916679_Senay";
    private $port = 3306;
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli(
                $this->host, 
                $this->username, 
                $this->password, 
                $this->db_name, 
                $this->port
            );

            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }

            $this->conn->set_charset("utf8mb4");
            
        } catch (Exception $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            header('Content-Type: application/json');
            die(json_encode(['success' => false, 'message' => 'Database connection failed']));
        }

        return $this->conn;
    }
}
?>
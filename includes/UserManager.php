<?php
// includes/UserManager.php
require_once 'config/database.php';

class UserManager {
    private $conn;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    
    // Create new customer
    public function createCustomer($data) {
        $query = "INSERT INTO customers (full_name, username, email, phone, address, password_hash) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $stmt->bind_param(
            "ssssss", 
            $data['full_name'],
            $data['username'],
            $data['email'],
            $data['phone'],
            $data['address'],
            $password_hash
        );
        
        if ($stmt->execute()) {
            $customer_id = $this->conn->insert_id;
            
            // Also create a vehicle if provided
            if (!empty($data['vehicle_plate'])) {
                $this->addVehicle($customer_id, $data);
            }
            
            return $customer_id;
        }
        
        return false;
    }
    
    // Add vehicle for customer
    private function addVehicle($customer_id, $data) {
        $query = "INSERT INTO vehicles (customer_id, plate_number, vehicle_type, brand, model, year) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $year = !empty($data['vehicle_year']) ? $data['vehicle_year'] : date('Y');
        
        $stmt->bind_param(
            "issssi",
            $customer_id,
            $data['vehicle_plate'],
            $data['vehicle_type'],
            $data['vehicle_brand'],
            $data['vehicle_model'],
            $year
        );
        
        return $stmt->execute();
    }
    
    // Create staff user
    public function createStaff($data) {
        $query = "INSERT INTO users (full_name, username, email, phone, password_hash, role_id, department_id) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $stmt->bind_param(
            "sssssii",
            $data['full_name'],
            $data['username'],
            $data['email'],
            $data['phone'],
            $password_hash,
            $data['role_id'],
            $data['department_id']
        );
        
        return $stmt->execute();
    }
    
    // Get all users (staff)
    public function getAllStaff() {
        $query = "SELECT u.*, r.role_name, d.department_name 
                  FROM users u
                  LEFT JOIN roles r ON u.role_id = r.role_id
                  LEFT JOIN departments d ON u.department_id = d.department_id
                  ORDER BY u.created_at DESC";
        
        $result = $this->conn->query($query);
        $users = [];
        
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        
        return $users;
    }
    
    // Get all customers
    public function getAllCustomers() {
        $query = "SELECT c.*, 
                         COUNT(v.vehicle_id) as vehicle_count,
                         MAX(v.plate_number) as latest_plate
                  FROM customers c
                  LEFT JOIN vehicles v ON c.customer_id = v.customer_id
                  GROUP BY c.customer_id
                  ORDER BY c.created_at DESC";
        
        $result = $this->conn->query($query);
        $customers = [];
        
        while ($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }
        
        return $customers;
    }
    
    // Get user by ID
    public function getUserById($id, $type = 'staff') {
        if ($type === 'customer') {
            $query = "SELECT c.*, 
                             GROUP_CONCAT(v.plate_number) as vehicles,
                             GROUP_CONCAT(v.vehicle_type) as vehicle_types
                      FROM customers c
                      LEFT JOIN vehicles v ON c.customer_id = v.customer_id
                      WHERE c.customer_id = ?
                      GROUP BY c.customer_id";
        } else {
            $query = "SELECT u.*, r.role_name, d.department_name 
                      FROM users u
                      LEFT JOIN roles r ON u.role_id = r.role_id
                      LEFT JOIN departments d ON u.department_id = d.department_id
                      WHERE u.user_id = ?";
        }
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }
    
    public function __destruct() {
        $this->conn->close();
    }
}
?>
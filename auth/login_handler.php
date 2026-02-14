<?php

require_once '../config/database.php';
require_once '../includes/session.php';

header('Content-Type: application/json');
SessionManager::startSession();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$role = trim($_POST['role'] ?? '');

// Validation
if (empty($username) || empty($password) || empty($role)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit();
}

$database = new Database();
$conn = $database->getConnection();

try {
    // Common user data array
    $userData = null;
    
    if ($role === 'customer') {
        // Check in customers table
        $query = "SELECT 
                    customer_id as id,
                    full_name,
                    email,
                    phone,
                    address,
                    password_hash,
                    'customer' as role,
                    'customer' as user_type,
                    NULL as role_id,
                    NULL as department_id,
                    created_at
                  FROM customers 
                  WHERE (email = ? OR phone = ?) 
                  AND password_hash IS NOT NULL";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();
        }
        $stmt->close();
        
    } else {
        // Check in users table (staff)
        // First get role_id from roles table based on role name
        $roleMap = [
            'reception' => 'Reception',
            'technician' => 'Technician',
            'inventory' => 'Inventory Staff', // Adjust based on your actual role names
            'admin' => 'Administrator'
        ];
        
        $roleName = $roleMap[$role] ?? ucfirst($role);
        
        // First, get the role_id
        $roleQuery = "SELECT role_id FROM roles WHERE role_name LIKE ?";
        $roleStmt = $conn->prepare($roleQuery);
        $searchRole = "%" . $roleName . "%";
        $roleStmt->bind_param("s", $searchRole);
        $roleStmt->execute();
        $roleResult = $roleStmt->get_result();
        
        if ($roleResult->num_rows > 0) {
            $roleRow = $roleResult->fetch_assoc();
            $role_id = $roleRow['role_id'];
            
            // Now check users table
            $query = "SELECT 
                        u.user_id as id,
                        u.full_name,
                        u.email,
                        u.phone,
                        u.password_hash,
                        r.role_name as role,
                        'staff' as user_type,
                        u.role_id,
                        u.department_id,
                        u.status,
                        u.created_at,
                        d.department_name
                      FROM users u
                      LEFT JOIN roles r ON u.role_id = r.role_id
                      LEFT JOIN departments d ON u.department_id = d.department_id
                      WHERE (u.email = ? OR u.username = ?) 
                      AND u.role_id = ?
                      AND u.status = 'active'";
            
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $username, $username, $role_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();
                
                // Update last login
                $updateQuery = "UPDATE users SET last_login = NOW() WHERE user_id = ?";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bind_param("i", $userData['id']);
                $updateStmt->execute();
                $updateStmt->close();
            }
            $stmt->close();
        }
        $roleStmt->close();
    }
    
    // Check if user found
    if (!$userData) {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials or role']);
        exit();
    }
    
    // Verify password
    if (!password_verify($password, $userData['password_hash'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid password']);
        exit();
    }
    
    // Password needs rehash?
    if (password_needs_rehash($userData['password_hash'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($password, PASSWORD_DEFAULT);
        
        if ($role === 'customer') {
            $updateQuery = "UPDATE customers SET password_hash = ? WHERE customer_id = ?";
        } else {
            $updateQuery = "UPDATE users SET password_hash = ? WHERE user_id = ?";
        }
        
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("si", $newHash, $userData['id']);
        $updateStmt->execute();
        $updateStmt->close();
    }
    
    // Set session
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['full_name'] = $userData['full_name'];
    $_SESSION['email'] = $userData['email'];
    $_SESSION['phone'] = $userData['phone'];
    $_SESSION['role'] = $userData['role'];
    $_SESSION['user_type'] = $userData['user_type'];
    $_SESSION['role_id'] = $userData['role_id'];
    $_SESSION['department_id'] = $userData['department_id'] ?? null;
    $_SESSION['logged_in'] = true;
    $_SESSION['login_time'] = time();
    
    // Redirect URL based on role
    $redirectUrl = getRedirectUrl($role);
    
    echo json_encode([
        'success' => true,
        'message' => 'Login successful!',
        'redirect' => $redirectUrl,
        'user' => [
            'name' => $userData['full_name'],
            'email' => $userData['email'],
            'role' => $userData['role']
        ]
    ]);
    
} catch (Exception $e) {
    error_log("Login error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
} finally {
    $conn->close();
}

function getRedirectUrl($role) {
    $redirects = [
        'customer' => 'customer/dashboard.php',
        'reception' => 'reception/dashboard.php',
        'technician' => 'technician/dashboard.php',
        'inventory' => 'inventory/dashboard.php',
        'admin' => 'admin/dashboard.php'
    ];
    return $redirects[$role] ?? 'dashboard.php';
}




function booking_handler() {
require_once '../config/database.php';
try {
    $database = new Database();
    $pdo = $database->getPDOConnection();
    
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Validate and sanitize input data
        $vehicleid = filter_input(INPUT_POST, 'vehicleid', FILTER_SANITIZE_NUMBER_INT);
        $serviceType = filter_input(INPUT_POST, 'serviceType', FILTER_SANITIZE_STRING);
        $problemDescription = filter_input(INPUT_POST, 'problemDiscription', FILTER_SANITIZE_STRING);
        $selectDateTime = filter_input(INPUT_POST, 'selectDateTime', FILTER_SANITIZE_STRING);
        
        // Additional validation
        if (empty($vehicleid) || empty($serviceType) || empty($problemDescription) || empty($selectDateTime)) {
            throw new Exception("All fields are required!");
        }
        
        // Validate date format (optional, adjust format as needed)
        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $selectDateTime);
        if (!$dateTime || $dateTime->format('Y-m-d H:i:s') !== $selectDateTime) {
            throw new Exception("Invalid date format! Use YYYY-MM-DD HH:MM:SS");
        }
        
        // Prepare SQL statement with placeholders to prevent SQL injection
        $sql = "INSERT INTO book (vehicleid, serviceType, problemDiscription, selctDateTime) 
                VALUES (:vehicleid, :serviceType, :problemDescription, :selectDateTime)";
        
        $stmt = $database->prepare($sql);
        
        // Bind parameters with explicit types
        $stmt->bindParam(':vehicleid', $vehicleid, PDO::PARAM_INT);
        $stmt->bindParam(':serviceType', $serviceType, PDO::PARAM_STR);
        $stmt->bindParam(':problemDescription', $problemDescription, PDO::PARAM_STR);
        $stmt->bindParam(':selectDateTime', $selectDateTime, PDO::PARAM_STR);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Record inserted successfully!";
            // Optionally get the last inserted ID
            $lastId = $pdo->lastInsertId();
            echo " Booking ID: " . $lastId;
        } else {
            echo "Error inserting record.";
        }
    }
    
} catch (PDOException $e) {
    // Log the error (don't display raw error messages to users in production)
    error_log("Database Error: " . $e->getMessage());
    echo "A database error occurred. Please try again.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection (optional as PDO closes automatically at script end)
$pdo = null;
}





?>


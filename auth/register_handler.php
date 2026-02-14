<?php
// auth/register_handler.php
require_once '../config/database.php';
require_once '../includes/session.php';
require_once '../includes/UserManager.php';

header('Content-Type: application/json');
SessionManager::startSession();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

// Get data
$data = [
    'full_name' => trim($_POST['full_name'] ?? ''),
    'username' => trim($_POST['username'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'phone' => trim($_POST['phone'] ?? ''),
    'address' => trim($_POST['address'] ?? ''),
    'password' => $_POST['password'] ?? '',
    'confirm_password' => $_POST['confirm_password'] ?? '',
    'vehicle_plate' => trim($_POST['vehicle_plate'] ?? ''),
    'vehicle_type' => trim($_POST['vehicle_type'] ?? ''),
    'vehicle_brand' => trim($_POST['vehicle_brand'] ?? ''),
    'vehicle_model' => trim($_POST['vehicle_model'] ?? '')
];

// Validate
$errors = [];

if (empty($data['full_name'])) $errors[] = 'Full name is required';
if (empty($data['username'])) $errors[] = 'Username is required';
if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
if (empty($data['phone'])) $errors[] = 'Phone number is required';
if (empty($data['password'])) $errors[] = 'Password is required';
if (strlen($data['password']) < 6) $errors[] = 'Password must be at least 6 characters';
if ($data['password'] !== $data['confirm_password']) $errors[] = 'Passwords do not match';

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit();
}

$userManager = new UserManager();
$database = new Database();
$conn = $database->getConnection();

try {
    // Check if username or email already exists
    $checkQuery = "SELECT customer_id FROM customers WHERE email = ? OR username = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $data['email'], $data['username']);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    
    if ($checkResult->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Username or email already exists']);
        exit();
    }
    
    // Create customer
    $customer_id = $userManager->createCustomer($data);
    
    if ($customer_id) {
        // Set session for auto-login
        $_SESSION['user_id'] = $customer_id;
        $_SESSION['full_name'] = $data['full_name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['phone'] = $data['phone'];
        $_SESSION['role'] = 'customer';
        $_SESSION['user_type'] = 'customer';
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
        
        echo json_encode([
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => 'customer/dashboard.php',
            'customer_id' => $customer_id
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Registration failed']);
    }
    
} catch (Exception $e) {
    error_log("Registration error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Registration error: ' . $e->getMessage()]);
}
?>
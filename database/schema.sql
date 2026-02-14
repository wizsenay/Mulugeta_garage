-- File: database/schema.sql
CREATE DATABASE IF NOT EXISTS mulugeta_garage;
USE mulugeta_garage;

-- Users table
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('customer', 'reception', 'technician', 'inventory', 'admin') NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Departments table
CREATE TABLE departments (
    department_id INT PRIMARY KEY AUTO_INCREMENT,
    department_name VARCHAR(50) UNIQUE NOT NULL
);

-- Vehicles table
CREATE TABLE vehicles (
    vehicle_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    plate_number VARCHAR(20) UNIQUE NOT NULL,
    vehicle_model VARCHAR(50) NOT NULL,
    vehicle_type VARCHAR(30) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Service requests table
CREATE TABLE service_requests (
    request_id INT PRIMARY KEY AUTO_INCREMENT,
    vehicle_id INT NOT NULL,
    user_id INT NOT NULL,
    service_type ENUM('problem', 'regular') NOT NULL,
    problem_description TEXT,
    current_department_id INT,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    request_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(vehicle_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (current_department_id) REFERENCES departments(department_id) ON DELETE SET NULL
);

-- Service records table
CREATE TABLE service_records (
    record_id INT PRIMARY KEY AUTO_INCREMENT,
    request_id INT NOT NULL,
    department_id INT NOT NULL,
    work_description TEXT NOT NULL,
    service_date DATE NOT NULL,
    labor_cost DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (request_id) REFERENCES service_requests(request_id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE CASCADE
);

-- Inventory items table
CREATE TABLE inventory_items (
    item_id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(100) NOT NULL,
    category ENUM('spare_part', 'tool') NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    unit_price DECIMAL(10,2) NOT NULL,
    min_quantity INT NOT NULL DEFAULT 5,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inventory usage table
CREATE TABLE inventory_usage (
    usage_id INT PRIMARY KEY AUTO_INCREMENT,
    item_id INT NOT NULL,
    request_id INT NOT NULL,
    quantity_used INT NOT NULL,
    usage_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES inventory_items(item_id) ON DELETE CASCADE,
    FOREIGN KEY (request_id) REFERENCES service_requests(request_id) ON DELETE CASCADE
);

-- Payments table
CREATE TABLE payments (
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    request_id INT NOT NULL,
    payment_type ENUM('initial', 'final') NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('cash', 'online') NOT NULL,
    payment_date DATE NOT NULL,
    status ENUM('pending', 'paid') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (request_id) REFERENCES service_requests(request_id) ON DELETE CASCADE
);

-- Appointments table
CREATE TABLE appointments (
    app_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    vehicle_id INT,
    preferred_date DATE NOT NULL,
    service_type ENUM('problem', 'regular') NOT NULL,
    description VARCHAR(255) NOT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(vehicle_id) ON DELETE SET NULL
);

-- Insert default departments
INSERT INTO departments (department_name) VALUES 
('Reception'),
('Diagnosis'),
('Mechanical'),
('Electrical'),
('Body Repair'),
('Service'),
('Inventory');

-- Insert default admin user (password: admin123)
INSERT INTO users (username, password, full_name, role, phone, email) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Admin', 'admin', '+251911111111', 'admin@mulugetagarage.com');

-- Insert default inventory items
INSERT INTO inventory_items (item_name, category, quantity, unit_price, min_quantity) VALUES
('Brake Pads (Standard)', 'spare_part', 15, 45.00, 10),
('Engine Oil 5W-30', 'spare_part', 8, 35.00, 15),
('Air Filter', 'spare_part', 3, 25.00, 20),
('Spark Plugs Set', 'spare_part', 20, 30.00, 10),
('Car Battery 12V', 'spare_part', 5, 120.00, 3);
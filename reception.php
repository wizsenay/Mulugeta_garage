 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reception Dashboard - Mulugeta Garage</title>
    <link rel="stylesheet" href="style/reception.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="user-info">
                    <div class="avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <h4>Reception Staff</h4>
                        <p class="role-badge">Reception</p>
                    </div>
                </div>
            </div>
            
            <nav class="sidebar-menu">
                <a href="#dashboard" class="menu-item active">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                
                <div class="menu-section">Customer Management</div>
                <a href="#new-customer" class="menu-item">
                    <i class="fas fa-user-plus"></i> New Customer
                </a>
                <a href="#customers" class="menu-item">
                    <i class="fas fa-users"></i> All Customers
                </a>
                
                <div class="menu-section">Service Management</div>
                <a href="#new-service" class="menu-item">
                    <i class="fas fa-tools"></i> New Service Request
                </a>
                <a href="#pending-services" class="menu-item">
                    <i class="fas fa-clock"></i> Pending Services
                </a>
                <a href="#assign-department" class="menu-item">
                    <i class="fas fa-exchange-alt"></i> Assign to Dept
                </a>
                
                <div class="menu-section">Appointments</div>
                <a href="#today-appointments" class="menu-item">
                    <i class="fas fa-calendar-day"></i> Today's Appointments
                </a>
                <a href="#all-appointments" class="menu-item">
                    <i class="fas fa-calendar-alt"></i> All Appointments
                </a>
                
                <div class="menu-section">Payments</div>
                <a href="#record-payment" class="menu-item">
                    <i class="fas fa-money-bill-wave"></i> Record Payment
                </a>
                <a href="#payment-history" class="menu-item">
                    <i class="fas fa-history"></i> Payment History
                </a>
                
                <div class="menu-section">Reports</div>
                <a href="#daily-report" class="menu-item">
                    <i class="fas fa-chart-bar"></i> Daily Report
                </a>
                
                <div class="logout-section">
                    <a href="index.php" class="menu-item logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <header class="top-bar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search customer, vehicle, or service...">
                </div>
                <div class="top-bar-actions">
                    <button class="btn-notification">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="current-time">
                        <i class="fas fa-clock"></i>
                        <span id="currentTime">Loading...</span>
                    </div>
                </div>
            </header>
            
            <!-- Dashboard Content -->
            <section id="dashboard" class="content-section active">
                <div class="section-header">
                    <h1>Reception Dashboard</h1>
                    <p>Welcome back! Here's today's overview.</p>
                </div>
                
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #3498db;">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>25</h3>
                            <p>Customers Today</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #2ecc71;">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="stat-info">
                            <h3>18</h3>
                            <p>Active Services</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #e74c3c;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>7</h3>
                            <p>Pending Assignments</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #f39c12;">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-info">
                            <h3>$2,450</h3>
                            <p>Today's Revenue</p>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions-grid">
                    <h3>Quick Actions</h3>
                    <div class="actions-container">
                        <button class="quick-action-btn" onclick="showSection('new-customer')">
                            <i class="fas fa-user-plus"></i>
                            <span>New Customer</span>
                        </button>
                        
                        <button class="quick-action-btn" onclick="showSection('new-service')">
                            <i class="fas fa-tools"></i>
                            <span>New Service</span>
                        </button>
                        
                        <button class="quick-action-btn" onclick="showSection('today-appointments')">
                            <i class="fas fa-calendar-day"></i>
                            <span>Today's Appointments</span>
                        </button>
                        
                        <button class="quick-action-btn" onclick="showSection('record-payment')">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Record Payment</span>
                        </button>
                    </div>
                </div>
                
                <!-- Recent Activities -->
                <div class="recent-activities">
                    <h3>Recent Activities</h3>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <div class="activity-details">
                                <p><strong>Toyota Corolla (3ABC123)</strong> assigned to Mechanical Dept</p>
                                <small>10 minutes ago</small>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-details">
                                <p>New customer <strong>John Smith</strong> registered</p>
                                <small>25 minutes ago</small>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="activity-details">
                                <p>Initial payment of <strong>$50</strong> received for Service #1025</p>
                                <small>1 hour ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- New Customer Form Section -->
            <section id="new-customer" class="content-section">
                <div class="section-header">
                    <h1>Register New Customer</h1>
                    <p>Add new customer to the system</p>
                </div>
                
                <div class="form-container">
                    <form id="customerForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="custFullName">
                                    <i class="fas fa-user"></i> Full Name *
                                </label>
                                <input type="text" id="custFullName" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="custPhone">
                                    <i class="fas fa-phone"></i> Phone Number *
                                </label>
                                <input type="tel" id="custPhone" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="custEmail">
                                    <i class="fas fa-envelope"></i> Email
                                </label>
                                <input type="email" id="custEmail">
                            </div>
                            
                            <div class="form-group">
                                <label for="custAddress">
                                    <i class="fas fa-map-marker-alt"></i> Address
                                </label>
                                <input type="text" id="custAddress">
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Save Customer
                            </button>
                            <button type="button" class="btn-secondary" onclick="showSection('dashboard')">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </section>
            
            <!-- New Service Request Section -->
            <section id="new-service" class="content-section">
                <div class="section-header">
                    <h1>New Service Request</h1>
                    <p>Create service request for customer</p>
                </div>
                
                <div class="form-container">
                    <div class="form-tabs">
                        <button class="form-tab active" onclick="switchServiceTab('existing')">
                            Existing Customer
                        </button>
                        <button class="form-tab" onclick="switchServiceTab('new')">
                            New Customer
                        </button>
                    </div>
                    
                    <!-- Existing Customer Form -->
                    <form id="serviceFormExisting" class="service-form active">
                        <div class="form-group">
                            <label for="searchCustomer">
                                <i class="fas fa-search"></i> Search Customer *
                            </label>
                            <input type="text" id="searchCustomer" 
                                   placeholder="Search by name, phone, or email..."
                                   onkeyup="searchCustomers(this.value)">
                            <div class="search-results" id="customerResults">
                                <!-- Search results will appear here -->
                            </div>
                        </div>
                        
                        <div id="customerDetails" style="display: none;">
                            <!-- Customer details will appear here -->
                        </div>
                        
                        <div class="form-group">
                            <label for="vehicleSelect">
                                <i class="fas fa-car"></i> Select Vehicle *
                            </label>
                            <select id="vehicleSelect" required>
                                <option value="">Select vehicle</option>
                            </select>
                            <button type="button" class="btn-small" onclick="addNewVehicle()">
                                <i class="fas fa-plus"></i> Add New Vehicle
                            </button>
                        </div>
                        
                        <!-- New Vehicle Form (Hidden by default) -->
                        <div id="newVehicleForm" style="display: none;">
                            <h4>Add New Vehicle</h4>
                            <!-- Vehicle form fields -->
                        </div>
                        
                        <div class="form-group">
                            <label for="serviceType">
                                <i class="fas fa-cogs"></i> Service Type *
                            </label>
                            <select id="serviceType" required>
                                <option value="regular">Regular Maintenance</option>
                                <option value="problem">Problem/Repair</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="problemDesc">
                                <i class="fas fa-file-alt"></i> Problem Description
                            </label>
                            <textarea id="problemDesc" rows="3" 
                                      placeholder="Describe the problem (if any)"></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-plus-circle"></i> Create Service Request
                            </button>
                            <button type="button" class="btn-secondary" onclick="showSection('dashboard')">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </section>
            
            <!-- Pending Services Section -->
            <section id="pending-services" class="content-section">
                <div class="section-header">
                    <h1>Pending Services</h1>
                    <p>Services waiting for department assignment</p>
                </div>
                
                <div class="table-container">
                    <div class="table-header">
                        <div class="table-actions">
                            <select id="filterStatus">
                                <option value="all">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                            </select>
                            <select id="filterDepartment">
                                <option value="all">All Departments</option>
                                <option value="diagnosis">Diagnosis</option>
                                <option value="mechanical">Mechanical</option>
                                <option value="electrical">Electrical</option>
                                <option value="body">Body Repair</option>
                            </select>
                        </div>
                    </div>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Service ID</th>
                                <th>Customer</th>
                                <th>Vehicle</th>
                                <th>Service Type</th>
                                <th>Arrival Time</th>
                                <th>Current Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1025</td>
                                <td>John Doe</td>
                                <td>Toyota Corolla (3ABC123)</td>
                                <td><span class="badge regular">Regular</span></td>
                                <td>09:30 AM</td>
                                <td><span class="status pending">Pending Assignment</span></td>
                                <td>
                                    <button class="btn-action" onclick="assignService(1025)">
                                        <i class="fas fa-exchange-alt"></i> Assign
                                    </button>
                                    <button class="btn-action" onclick="viewDetails(1025)">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                            <!-- More rows will be loaded from database -->
                        </tbody>
                    </table>
                </div>
            </section>
            
            <!-- Assign to Department Section -->
            <section id="assign-department" class="content-section">
                <div class="section-header">
                    <h1>Assign to Department</h1>
                    <p>Assign service requests to appropriate departments</p>
                </div>
                
                <div class="assign-container">
                    <div class="assign-left">
                        <h3>Service Details</h3>
                        <div class="service-details-card">
                            <p><strong>Service ID:</strong> #1025</p>
                            <p><strong>Customer:</strong> John Doe</p>
                            <p><strong>Vehicle:</strong> Toyota Corolla (3ABC123)</p>
                            <p><strong>Issue:</strong> Brake noise when stopping</p>
                            <p><strong>Arrived:</strong> Today, 09:30 AM</p>
                        </div>
                    </div>
                    
                    <div class="assign-right">
                        <h3>Assign to Department</h3>
                        <div class="department-options">
                            <div class="dept-option" onclick="selectDepartment('diagnosis')">
                                <div class="dept-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="dept-info">
                                    <h4>Diagnosis Department</h4>
                                    <p>For initial inspection and problem identification</p>
                                </div>
                            </div>
                            
                            <div class="dept-option" onclick="selectDepartment('mechanical')">
                                <div class="dept-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <div class="dept-info">
                                    <h4>Mechanical Department</h4>
                                    <p>Engine, transmission, brakes, suspension</p>
                                </div>
                            </div>
                            
                            <div class="dept-option" onclick="selectDepartment('electrical')">
                                <div class="dept-icon">
                                    <i class="fas fa-bolt"></i>
                                </div>
                                <div class="dept-info">
                                    <h4>Electrical Department</h4>
                                    <p>Battery, wiring, lights, electronics</p>
                                </div>
                            </div>
                            
                            <div class="dept-option" onclick="selectDepartment('body')">
                                <div class="dept-icon">
                                    <i class="fas fa-car-crash"></i>
                                </div>
                                <div class="dept-info">
                                    <h4>Body Repair Department</h4>
                                    <p>Dents, painting, windshield, structure</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="assign-actions">
                            <button class="btn-primary" onclick="confirmAssignment()">
                                <i class="fas fa-check"></i> Confirm Assignment
                            </button>
                            <button class="btn-secondary" onclick="showSection('pending-services')">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Add more sections for Appointments, Payments, etc. -->
            
        </main>
    </div>
    
    <script src="js/reception.js"></script>
</body>
</html>
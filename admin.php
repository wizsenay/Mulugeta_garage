<!-- admin_dashboard.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Mulugeta Garage</title>
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Admin Top Navigation -->
    <header class="admin-header">
        <div class="header-container">
            <div class="header-left">
                <div class="admin-logo">
                    <div class="logo-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="logo-text">
                        <h1>Admin Panel</h1>
                        <p>Mulugeta Garage System</p>
                    </div>
                </div>
            </div>
            
            <div class="header-center">
                <div class="system-status">
                    <div class="status-item">
                        <span class="status-dot online"></span>
                        <span>System: <strong>Online</strong></span>
                    </div>
                    <div class="status-item">
                        <i class="fas fa-database"></i>
                        <span>Storage: <strong>78%</strong></span>
                    </div>
                    <div class="status-item">
                        <i class="fas fa-users"></i>
                        <span>Users: <strong>24</strong> Active</span>
                    </div>
                </div>
            </div>
            
            <div class="header-right">
                <div class="admin-controls">
                    <button class="control-btn" onclick="toggleDarkMode()" title="Dark Mode">
                        <i class="fas fa-moon"></i>
                    </button>
                    
                    <button class="control-btn" onclick="showSystemLogs()" title="System Logs">
                        <i class="fas fa-history"></i>
                    </button>
                    
                    <div class="admin-profile">
                        <div class="profile-avatar">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="profile-dropdown">
                            <button class="dropdown-btn">
                                <span>System Admin</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#profile"><i class="fas fa-user-cog"></i> Admin Profile</a>
                                <a href="#settings"><i class="fas fa-sliders-h"></i> System Settings</a>
                                <a href="#backup"><i class="fas fa-database"></i> Backup System</a>
                                <div class="divider"></div>
                                <a href="index.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Quick Admin Bar -->
    <nav class="admin-quickbar">
        <div class="quickbar-container">
            <button class="quick-action" onclick="showSection('dashboard')">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </button>
            
            <button class="quick-action" onclick="showSection('users')">
                <i class="fas fa-users-cog"></i>
                <span>User Management</span>
            </button>
            
            <button class="quick-action" onclick="showSection('reports')">
                <i class="fas fa-chart-line"></i>
                <span>Analytics</span>
            </button>
            
            <button class="quick-action" onclick="showSection('system')">
                <i class="fas fa-cogs"></i>
                <span>System Control</span>
            </button>
            
            <button class="quick-action urgent" onclick="showAlerts()">
                <i class="fas fa-exclamation-circle"></i>
                <span>Alerts</span>
                <span class="badge">3</span>
            </button>
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="admin-container">
        <!-- Admin Sidebar -->
        <aside class="admin-sidebar">
            <nav class="admin-menu">
                <div class="menu-section">
                    <h4><i class="fas fa-eye"></i> Overview</h4>
                </div>
                <a href="#dashboard" class="menu-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                
                <div class="menu-section">
                    <h4><i class="fas fa-user-lock"></i> User Management</h4>
                </div>
                <a href="#users" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>All Users</span>
                    <span class="menu-badge">24</span>
                </a>
                <a href="#roles" class="menu-item">
                    <i class="fas fa-user-tag"></i>
                    <span>Roles & Permissions</span>
                </a>
                <a href="#activity" class="menu-item">
                    <i class="fas fa-history"></i>
                    <span>User Activity Logs</span>
                </a>
                
                <div class="menu-section">
                    <h4><i class="fas fa-chart-network"></i> System Management</h4>
                </div>
                <a href="#departments" class="menu-item">
                    <i class="fas fa-building"></i>
                    <span>Departments</span>
                </a>
                <a href="#services" class="menu-item">
                    <i class="fas fa-tools"></i>
                    <span>Service Management</span>
                </a>
                <a href="#inventory" class="menu-item">
                    <i class="fas fa-warehouse"></i>
                    <span>Inventory Control</span>
                </a>
                
                <div class="menu-section">
                    <h4><i class="fas fa-chart-bar"></i> Analytics & Reports</h4>
                </div>
                <a href="#reports" class="menu-item">
                    <i class="fas fa-file-alt"></i>
                    <span>Reports</span>
                </a>
                <a href="#analytics" class="menu-item">
                    <i class="fas fa-chart-pie"></i>
                    <span>Analytics Dashboard</span>
                </a>
                <a href="#finance" class="menu-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Financial Reports</span>
                </a>
                
                <div class="menu-section">
                    <h4><i class="fas fa-cog"></i> System Configuration</h4>
                </div>
                <a href="#settings" class="menu-item">
                    <i class="fas fa-sliders-h"></i>
                    <span>System Settings</span>
                </a>
                <a href="#backup" class="menu-item">
                    <i class="fas fa-database"></i>
                    <span>Backup & Restore</span>
                </a>
                <a href="#security" class="menu-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Security Settings</span>
                </a>
                <a href="#logs" class="menu-item">
                    <i class="fas fa-clipboard-list"></i>
                    <span>System Logs</span>
                </a>
                
                <div class="menu-section">
                    <h4><i class="fas fa-bell"></i> Notifications</h4>
                </div>
                <a href="#notifications" class="menu-item">
                    <i class="fas fa-bell"></i>
                    <span>Notification Center</span>
                    <span class="menu-badge">12</span>
                </a>
                <a href="#alerts" class="menu-item">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>System Alerts</span>
                    <span class="menu-badge urgent">3</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <div class="system-info">
                    <h4>System Information</h4>
                    <div class="info-item">
                        <i class="fas fa-server"></i>
                        <span>Version: 2.1.0</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Last Backup: Today 02:00</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Security: High</span>
                    </div>
                </div>
                <button class="btn-system-health" onclick="checkSystemHealth()">
                    <i class="fas fa-heartbeat"></i> Check System Health
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section active">
                <div class="dashboard-header">
                    <h1>Admin Dashboard</h1>
                    <div class="header-actions">
                        <div class="date-filter">
                            <i class="fas fa-calendar"></i>
                            <select id="timePeriod">
                                <option value="today">Today</option>
                                <option value="week" selected>This Week</option>
                                <option value="month">This Month</option>
                                <option value="year">This Year</option>
                            </select>
                        </div>
                        <button class="btn-refresh" onclick="refreshDashboard()">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
                    </div>
                </div>
                
                <!-- System Overview -->
                <div class="system-overview">
                    <div class="overview-card">
                        <div class="card-header">
                            <h3><i class="fas fa-chart-line"></i> System Performance</h3>
                            <span class="status-indicator healthy">Healthy</span>
                        </div>
                        <div class="performance-metrics">
                            <div class="metric">
                                <div class="metric-label">Server Load</div>
                                <div class="metric-bar">
                                    <div class="bar-fill" style="width: 65%"></div>
                                </div>
                                <span class="metric-value">65%</span>
                            </div>
                            <div class="metric">
                                <div class="metric-label">Database Usage</div>
                                <div class="metric-bar">
                                    <div class="bar-fill" style="width: 78%"></div>
                                </div>
                                <span class="metric-value">78%</span>
                            </div>
                            <div class="metric">
                                <div class="metric-label">Response Time</div>
                                <div class="metric-bar">
                                    <div class="bar-fill" style="width: 92%"></div>
                                </div>
                                <span class="metric-value">92ms</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overview-card">
                        <div class="card-header">
                            <h3><i class="fas fa-user-shield"></i> Security Status</h3>
                            <span class="status-indicator secure">Secure</span>
                        </div>
                        <div class="security-status">
                            <div class="security-item">
                                <i class="fas fa-check-circle safe"></i>
                                <span>Firewall Active</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-check-circle safe"></i>
                                <span>SSL Enabled</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-exclamation-triangle warning"></i>
                                <span>2 Failed Login Attempts</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-check-circle safe"></i>
                                <span>Backup Scheduled</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Key Metrics -->
                <div class="key-metrics">
                    <h2>Key Metrics</h2>
                    <div class="metrics-grid">
                        <div class="metric-card">
                            <div class="metric-icon users">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="metric-content">
                                <h3>42</h3>
                                <p>Total Users</p>
                                <div class="metric-trend up">
                                    <i class="fas fa-arrow-up"></i> 12% increase
                                </div>
                            </div>
                            <a href="#users" class="metric-link">View Users</a>
                        </div>
                        
                        <div class="metric-card">
                            <div class="metric-icon services">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="metric-content">
                                <h3>156</h3>
                                <p>Services This Month</p>
                                <div class="metric-trend up">
                                    <i class="fas fa-arrow-up"></i> 8% increase
                                </div>
                            </div>
                            <a href="#services" class="metric-link">View Services</a>
                        </div>
                        
                        <div class="metric-card">
                            <div class="metric-icon revenue">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="metric-content">
                                <h3>$24,580</h3>
                                <p>Monthly Revenue</p>
                                <div class="metric-trend up">
                                    <i class="fas fa-arrow-up"></i> 15% increase
                                </div>
                            </div>
                            <a href="#finance" class="metric-link">View Finance</a>
                        </div>
                        
                        <div class="metric-card">
                            <div class="metric-icon inventory">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <div class="metric-content">
                                <h3>245</h3>
                                <p>Inventory Items</p>
                                <div class="metric-trend down">
                                    <i class="fas fa-arrow-down"></i> 3 items low
                                </div>
                            </div>
                            <a href="#inventory" class="metric-link">View Inventory</a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Admin Actions -->
                <div class="admin-actions">
                    <h2>Quick Actions</h2>
                    <div class="actions-grid">
                        <button class="admin-action-btn" onclick="showSection('users')">
                            <div class="action-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h3>Add New User</h3>
                            <p>Create staff accounts</p>
                        </button>
                        
                        <button class="admin-action-btn" onclick="generateReport()">
                            <div class="action-icon">
                                <i class="fas fa-file-export"></i>
                            </div>
                            <h3>Generate Report</h3>
                            <p>Create system report</p>
                        </button>
                        
                        <button class="admin-action-btn" onclick="showSection('backup')">
                            <div class="action-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <h3>Backup System</h3>
                            <p>Create system backup</p>
                        </button>
                        
                        <button class="admin-action-btn" onclick="showSection('settings')">
                            <div class="action-icon">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            <h3>System Settings</h3>
                            <p>Configure system</p>
                        </button>
                        
                        <button class="admin-action-btn" onclick="showAuditLog()">
                            <div class="action-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <h3>Audit Log</h3>
                            <p>View system logs</p>
                        </button>
                        
                        <button class="admin-action-btn" onclick="showAlerts()">
                            <div class="action-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <h3>View Alerts</h3>
                            <p>System notifications</p>
                        </button>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="recent-activity">
                    <div class="section-header">
                        <h2>Recent System Activity</h2>
                        <a href="#activity" class="view-all">View All Logs</a>
                    </div>
                    
                    <div class="activity-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>IP Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10:30 AM</td>
                                    <td>
                                        <div class="user-cell">
                                            <div class="user-avatar small">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <span>Reception Staff</span>
                                        </div>
                                    </td>
                                    <td>Created new service request</td>
                                    <td>192.168.1.105</td>
                                    <td><span class="status-badge success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>10:15 AM</td>
                                    <td>
                                        <div class="user-cell">
                                            <div class="user-avatar small">
                                                <i class="fas fa-user-hard-hat"></i>
                                            </div>
                                            <span>Technician</span>
                                        </div>
                                    </td>
                                    <td>Updated service status</td>
                                    <td>192.168.1.110</td>
                                    <td><span class="status-badge success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>09:45 AM</td>
                                    <td>
                                        <div class="user-cell">
                                            <div class="user-avatar small">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <span>Customer</span>
                                        </div>
                                    </td>
                                    <td>Booked service online</td>
                                    <td>41.155.76.123</td>
                                    <td><span class="status-badge success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>09:30 AM</td>
                                    <td>
                                        <div class="user-cell">
                                            <div class="user-avatar small">
                                                <i class="fas fa-user-shield"></i>
                                            </div>
                                            <span>Admin</span>
                                        </div>
                                    </td>
                                    <td>Added new staff user</td>
                                    <td>192.168.1.100</td>
                                    <td><span class="status-badge success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>02:00 AM</td>
                                    <td>
                                        <div class="user-cell">
                                            <div class="user-avatar small">
                                                <i class="fas fa-robot"></i>
                                            </div>
                                            <span>System</span>
                                        </div>
                                    </td>
                                    <td>Automatic backup completed</td>
                                    <td>SYSTEM</td>
                                    <td><span class="status-badge info">Info</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- System Status -->
                <div class="system-status-widget">
                    <h2>System Components Status</h2>
                    <div class="components-grid">
                        <div class="component-card">
                            <div class="component-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="component-info">
                                <h4>Database Server</h4>
                                <p>MySQL 8.0</p>
                            </div>
                            <span class="component-status online">Online</span>
                        </div>
                        
                        <div class="component-card">
                            <div class="component-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <div class="component-info">
                                <h4>Web Server</h4>
                                <p>Apache 2.4</p>
                            </div>
                            <span class="component-status online">Online</span>
                        </div>
                        
                        <div class="component-card">
                            <div class="component-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="component-info">
                                <h4>Email Service</h4>
                                <p>SMTP Server</p>
                            </div>
                            <span class="component-status warning">Warning</span>
                        </div>
                        
                        <div class="component-card">
                            <div class="component-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="component-info">
                                <h4>Security Module</h4>
                                <p>Firewall & SSL</p>
                            </div>
                            <span class="component-status online">Online</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- User Management Section -->
            <section id="users" class="content-section">
                <div class="section-header">
                    <h1>User Management</h1>
                    <div class="header-actions">
                        <button class="btn-primary" onclick="showAddUserModal()">
                            <i class="fas fa-user-plus"></i> Add New User
                        </button>
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Search users..." onkeyup="searchUsers(this.value)">
                        </div>
                    </div>
                </div>
                
                <!-- User Filters -->
                <div class="user-filters">
                    <div class="filter-group">
                        <label>Filter by Role:</label>
                        <div class="filter-buttons">
                            <button class="filter-btn active" onclick="filterUsers('all')">All</button>
                            <button class="filter-btn" onclick="filterUsers('admin')">Admin</button>
                            <button class="filter-btn" onclick="filterUsers('reception')">Reception</button>
                            <button class="filter-btn" onclick="filterUsers('technician')">Technician</button>
                            <button class="filter-btn" onclick="filterUsers('inventory')">Inventory</button>
                            <button class="filter-btn" onclick="filterUsers('customer')">Customer</button>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <label>Filter by Status:</label>
                        <select id="statusFilter" onchange="filterUsers()">
                            <option value="all">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                </div>
                
                <!-- Users Table -->
                <div class="users-table-container">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            <!-- Users will be loaded here -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Add User Modal -->
                <div class="modal-overlay" id="addUserModal">
                    <div class="modal">
                        <div class="modal-header">
                            <h2>Add New User</h2>
                            <button class="close-modal" onclick="hideAddUserModal()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm" onsubmit="saveNewUser(event)">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="newFullName">Full Name *</label>
                                        <input type="text" id="newFullName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="newEmail">Email Address *</label>
                                        <input type="email" id="newEmail" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="newPhone">Phone Number</label>
                                        <input type="tel" id="newPhone">
                                    </div>
                                    <div class="form-group">
                                        <label for="newUsername">Username *</label>
                                        <input type="text" id="newUsername" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="newPassword">Initial Password *</label>
                                        <div class="password-input">
                                            <input type="password" id="newPassword" required>
                                            <button type="button" class="show-password" onclick="togglePassword('newPassword')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <small>User will be asked to change on first login</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm Password *</label>
                                        <input type="password" id="confirmPassword" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="userRole">User Role *</label>
                                        <select id="userRole" required onchange="toggleDepartmentField()">
                                            <option value="">Select Role</option>
                                            <option value="admin">Administrator</option>
                                            <option value="reception">Reception Staff</option>
                                            <option value="technician">Technician</option>
                                            <option value="inventory">Inventory Staff</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="departmentField" style="display: none;">
                                        <label for="userDepartment">Department *</label>
                                        <select id="userDepartment">
                                            <option value="">Select Department</option>
                                            <option value="diagnosis">Diagnosis</option>
                                            <option value="mechanical">Mechanical</option>
                                            <option value="electrical">Electrical</option>
                                            <option value="body">Body Repair</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="userPermissions">Additional Permissions</label>
                                    <div class="permissions-grid">
                                        <label class="permission-checkbox">
                                            <input type="checkbox" name="permissions[]" value="reports">
                                            <span>View Reports</span>
                                        </label>
                                        <label class="permission-checkbox">
                                            <input type="checkbox" name="permissions[]" value="export">
                                            <span>Export Data</span>
                                        </label>
                                        <label class="permission-checkbox">
                                            <input type="checkbox" name="permissions[]" value="manage_users">
                                            <span>Manage Users</span>
                                        </label>
                                        <label class="permission-checkbox">
                                            <input type="checkbox" name="permissions[]" value="system_settings">
                                            <span>System Settings</span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn-primary">
                                        <i class="fas fa-save"></i> Create User
                                    </button>
                                    <button type="button" class="btn-secondary" onclick="hideAddUserModal()">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Roles & Permissions Section -->
            <section id="roles" class="content-section">
                <div class="section-header">
                    <h1>Roles & Permissions</h1>
                    <p>Manage user roles and their permissions</p>
                </div>
                
                <div class="roles-container">
                    <div class="roles-list">
                        <div class="role-card">
                            <div class="role-header">
                                <div class="role-icon">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <div class="role-info">
                                    <h3>Administrator</h3>
                                    <p>Full system access</p>
                                </div>
                                <span class="users-count">2 users</span>
                            </div>
                            
                            <div class="role-permissions">
                                <h4>Permissions:</h4>
                                <div class="permissions-list">
                                    <span class="permission-tag">All Permissions</span>
                                </div>
                            </div>
                            
                            <div class="role-actions">
                                <button class="btn-edit" onclick="editRole('admin')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </div>
                        </div>
                        
                        <div class="role-card">
                            <div class="role-header">
                                <div class="role-icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="role-info">
                                    <h3>Reception Staff</h3>
                                    <p>Customer & service management</p>
                                </div>
                                <span class="users-count">3 users</span>
                            </div>
                            
                            <div class="role-permissions">
                                <h4>Permissions:</h4>
                                <div class="permissions-list">
                                    <span class="permission-tag">Manage Customers</span>
                                    <span class="permission-tag">Manage Services</span>
                                    <span class="permission-tag">View Reports</span>
                                    <span class="permission-tag">Process Payments</span>
                                </div>
                            </div>
                            
                            <div class="role-actions">
                                <button class="btn-edit" onclick="editRole('reception')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </div>
                        </div>
                        
                        <!-- More role cards -->
                    </div>
                    
                    <div class="permissions-editor">
                        <h3>Permission Categories</h3>
                        <div class="permissions-categories">
                            <div class="category">
                                <h4>User Management</h4>
                                <div class="permission-item">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span>View Users</span>
                                    </label>
                                </div>
                                <div class="permission-item">
                                    <label>
                                        <input type="checkbox">
                                        <span>Create Users</span>
                                    </label>
                                </div>
                                <div class="permission-item">
                                    <label>
                                        <input type="checkbox">
                                        <span>Edit Users</span>
                                    </label>
                                </div>
                                <div class="permission-item">
                                    <label>
                                        <input type="checkbox">
                                        <span>Delete Users</span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- More permission categories -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- System Settings Section -->
            <section id="settings" class="content-section">
                <div class="section-header">
                    <h1>System Settings</h1>
                    <p>Configure system parameters and preferences</p>
                </div>
                
                <div class="settings-container">
                    <div class="settings-tabs">
                        <button class="tab-btn active" onclick="showSettingsTab('general')">
                            <i class="fas fa-cog"></i> General
                        </button>
                        <button class="tab-btn" onclick="showSettingsTab('email')">
                            <i class="fas fa-envelope"></i> Email
                        </button>
                        <button class="tab-btn" onclick="showSettingsTab('security')">
                            <i class="fas fa-shield-alt"></i> Security
                        </button>
                        <button class="tab-btn" onclick="showSettingsTab('backup')">
                            <i class="fas fa-database"></i> Backup
                        </button>
                        <button class="tab-btn" onclick="showSettingsTab('notifications')">
                            <i class="fas fa-bell"></i> Notifications
                        </button>
                    </div>
                    
                    <div class="settings-content">
                        <!-- General Settings -->
                        <div id="generalSettings" class="settings-tab active">
                            <form id="generalSettingsForm">
                                <div class="form-group">
                                    <label for="systemName">System Name</label>
                                    <input type="text" id="systemName" value="Mulugeta Garage System">
                                </div>
                                
                                <div class="form-group">
                                    <label for="timezone">Timezone</label>
                                    <select id="timezone">
                                        <option value="Africa/Addis_Ababa" selected>Addis Ababa (GMT+3)</option>
                                        <!-- More timezones -->
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="dateFormat">Date Format</label>
                                    <select id="dateFormat">
                                        <option value="Y-m-d">YYYY-MM-DD</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="itemsPerPage">Items Per Page</label>
                                    <input type="number" id="itemsPerPage" value="25" min="10" max="100">
                                </div>
                                
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="maintenanceMode">
                                        <span>Maintenance Mode</span>
                                    </label>
                                    <small>When enabled, only admins can access the system</small>
                                </div>
                                
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-save"></i> Save Settings
                                </button>
                            </form>
                        </div>
                        
                        <!-- Email Settings -->
                        <div id="emailSettings" class="settings-tab">
                            <form id="emailSettingsForm">
                                <!-- Email configuration form -->
                            </form>
                        </div>
                        
                        <!-- More settings tabs -->
                    </div>
                </div>
            </section>

            <!-- Reports Section -->
            <section id="reports" class="content-section">
                <div class="section-header">
                    <h1>Reports & Analytics</h1>
                    <div class="header-actions">
                        <button class="btn-primary" onclick="generateReport()">
                            <i class="fas fa-file-export"></i> Generate Report
                        </button>
                        <button class="btn-secondary" onclick="exportData()">
                            <i class="fas fa-download"></i> Export Data
                        </button>
                    </div>
                </div>
                
                <div class="reports-dashboard">
                    <div class="report-filters">
                        <div class="filter-row">
                            <div class="filter-group">
                                <label>Report Type:</label>
                                <select id="reportType">
                                    <option value="services">Services Report</option>
                                    <option value="financial">Financial Report</option>
                                    <option value="inventory">Inventory Report</option>
                                    <option value="users">Users Report</option>
                                </select>
                            </div>
                            
                            <div class="filter-group">
                                <label>Date Range:</label>
                                <div class="date-range">
                                    <input type="date" id="startDate">
                                    <span>to</span>
                                    <input type="date" id="endDate">
                                </div>
                            </div>
                            
                            <div class="filter-group">
                                <label>Format:</label>
                                <select id="reportFormat">
                                    <option value="pdf">PDF</option>
                                    <option value="excel">Excel</option>
                                    <option value="csv">CSV</option>
                                </select>
                            </div>
                            
                            <button class="btn-generate" onclick="generateCustomReport()">
                                <i class="fas fa-chart-bar"></i> Generate
                            </button>
                        </div>
                    </div>
                    
                    <div class="report-preview">
                        <h3>Report Preview</h3>
                        <div class="preview-content">
                            <!-- Report preview will be loaded here -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- System Logs Section -->
            <section id="logs" class="content-section">
                <div class="section-header">
                    <h1>System Logs</h1>
                    <div class="header-actions">
                        <button class="btn-secondary" onclick="clearLogs()">
                            <i class="fas fa-trash"></i> Clear Logs
                        </button>
                        <button class="btn-secondary" onclick="downloadLogs()">
                            <i class="fas fa-download"></i> Download Logs
                        </button>
                    </div>
                </div>
                
                <div class="logs-container">
                    <div class="logs-filters">
                        <div class="filter-group">
                            <label>Log Type:</label>
                            <select id="logType" onchange="filterLogs()">
                                <option value="all">All Logs</option>
                                <option value="error">Errors</option>
                                <option value="warning">Warnings</option>
                                <option value="info">Info</option>
                                <option value="security">Security</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label>Date:</label>
                            <input type="date" id="logDate" onchange="filterLogs()">
                        </div>
                    </div>
                    
                    <div class="logs-list" id="logsList">
                        <!-- Logs will be loaded here -->
                    </div>
                </div>
            </section>

            <!-- More sections would follow similar pattern -->
            
        </main>
    </div>

    <!-- Alert Panel -->
    <div class="alert-panel" id="alertPanel">
        <div class="panel-header">
            <h3><i class="fas fa-exclamation-triangle"></i> System Alerts</h3>
            <button class="close-panel" onclick="hideAlerts()">&times;</button>
        </div>
        <div class="panel-content">
            <div class="alert-item critical">
                <div class="alert-icon">
                    <i class="fas fa-server"></i>
                </div>
                <div class="alert-content">
                    <h4>Database Backup Failed</h4>
                    <p>Scheduled backup at 02:00 AM failed</p>
                    <small>2 hours ago</small>
                </div>
                <button class="btn-resolve" onclick="resolveAlert(1)">
                    Resolve
                </button>
            </div>
            
            <div class="alert-item warning">
                <div class="alert-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="alert-content">
                    <h4>Multiple Failed Logins</h4>
                    <p>5 failed login attempts detected</p>
                    <small>30 minutes ago</small>
                </div>
                <button class="btn-resolve" onclick="resolveAlert(2)">
                    Resolve
                </button>
            </div>
        </div>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>
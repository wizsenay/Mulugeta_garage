<!-- department_dashboard.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Dashboard - Mulugeta Garage</title>
    <link rel="stylesheet" href="style/department.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body data-department="mechanical"> <!-- Change this based on logged in user -->
    
    <!-- Top Bar -->
    <div class="department-topbar">
        <div class="topbar-left">
            <div class="department-badge">
                <div class="dept-icon" id="deptIcon">
                    <!-- Icon changes based on department -->
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="dept-info">
                    <h2 id="deptName">Mechanical Department</h2>
                    <p id="deptDescription">Engine, transmission, brakes, suspension systems</p>
                </div>
            </div>
        </div>
        
        <div class="topbar-center">
            <div class="current-user">
                <div class="user-avatar">
                    <i class="fas fa-user-hard-hat"></i>
                </div>
                <div class="user-details">
                    <h4 id="techName">Alex Johnson</h4>
                    <p class="user-role">Senior Technician</p>
                </div>
            </div>
        </div>
        
        <div class="topbar-right">
            <div class="topbar-actions">
                <button class="action-btn" id="clockInBtn" onclick="clockInOut()">
                    <i class="fas fa-clock"></i>
                    <span>Clock In</span>
                </button>
                
                <button class="action-btn" onclick="requestParts()">
                    <i class="fas fa-tools"></i>
                    <span>Request Parts</span>
                </button>
                
                <div class="notification-area">
                    <button class="notification-btn" onclick="toggleNotifications()">
                        <i class="fas fa-bell"></i>
                        <span class="notification-count">3</span>
                    </button>
                </div>
                
                <div class="logout-btn">
                    <a href="index.php">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Layout -->
    <div class="department-container">
        <!-- Sidebar -->
        <nav class="department-sidebar">
            <ul class="sidebar-menu">
                <li>
                    <a href="#dashboard" class="menu-item active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="#assigned-services" class="menu-item">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Assigned Services</span>
                        <span class="badge" id="assignedCount">5</span>
                    </a>
                </li>
                
                <li>
                    <a href="#active-work" class="menu-item">
                        <i class="fas fa-tools"></i>
                        <span>Active Work</span>
                        <span class="badge" id="activeCount">2</span>
                    </a>
                </li>
                
                <li>
                    <a href="#parts-needed" class="menu-item">
                        <i class="fas fa-box-open"></i>
                        <span>Parts Needed</span>
                        <span class="badge" id="partsCount">3</span>
                    </a>
                </li>
                
                <li>
                    <a href="#service-history" class="menu-item">
                        <i class="fas fa-history"></i>
                        <span>Service History</span>
                    </a>
                </li>
                
                <li>
                    <a href="#time-tracking" class="menu-item">
                        <i class="fas fa-stopwatch"></i>
                        <span>Time Tracking</span>
                    </a>
                </li>
                
                <li>
                    <a href="#quality-check" class="menu-item">
                        <i class="fas fa-check-double"></i>
                        <span>Quality Checks</span>
                    </a>
                </li>
                
                <li class="menu-section">Tools</li>
                
                <li>
                    <a href="#diagnosis-tool" class="menu-item">
                        <i class="fas fa-search"></i>
                        <span>Diagnosis Tool</span>
                    </a>
                </li>
                
                <li>
                    <a href="#manual" class="menu-item">
                        <i class="fas fa-book"></i>
                        <span>Service Manual</span>
                    </a>
                </li>
            </ul>
            
            <div class="sidebar-footer">
                <div class="shift-info">
                    <h4>Current Shift</h4>
                    <p id="shiftTime">08:00 AM - 05:00 PM</p>
                    <p id="clockStatus">Status: <span class="status-off">Not Clocked In</span></p>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="department-main">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section active">
                <div class="dashboard-header">
                    <h1>Department Dashboard</h1>
                    <p id="dashboardTime">Monday, January 15, 2024 | 09:30 AM</p>
                </div>
                
                <!-- Department Stats -->
                <div class="dept-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="totalAssigned">12</h3>
                            <p>Total Assigned</p>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 15%
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="inProgress">5</h3>
                            <p>In Progress</p>
                        </div>
                        <div class="stat-trend down">
                            <i class="fas fa-arrow-down"></i> 10%
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="completedToday">3</h3>
                            <p>Completed Today</p>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 25%
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="avgCompletion">2.5</h3>
                            <p>Avg Hours/Service</p>
                        </div>
                        <div class="stat-trend neutral">
                            <i class="fas fa-minus"></i> 0%
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions-dept">
                    <h3>Quick Actions</h3>
                    <div class="action-buttons">
                        <button class="action-btn-dept" onclick="startNewService()">
                            <i class="fas fa-play-circle"></i>
                            <span>Start New Service</span>
                        </button>
                        
                        <button class="action-btn-dept" onclick="updateServiceStatus()">
                            <i class="fas fa-edit"></i>
                            <span>Update Service Status</span>
                        </button>
                        
                        <button class="action-btn-dept" onclick="requestParts()">
                            <i class="fas fa-box-open"></i>
                            <span>Request Parts</span>
                        </button>
                        
                        <button class="action-btn-dept" onclick="logWorkHours()">
                            <i class="fas fa-stopwatch"></i>
                            <span>Log Work Hours</span>
                        </button>
                        
                        <button class="action-btn-dept" onclick="callReception()">
                            <i class="fas fa-phone"></i>
                            <span>Call Reception</span>
                        </button>
                        
                        <button class="action-btn-dept" onclick="escalateProblem()">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Escalate Problem</span>
                        </button>
                    </div>
                </div>
                
                <!-- Currently Working On -->
                <div class="current-work">
                    <div class="section-header">
                        <h3>Currently Working On</h3>
                        <a href="#active-work" class="view-all">View All</a>
                    </div>
                    
                    <div class="work-list">
                        <div class="work-card">
                            <div class="work-header">
                                <h4>Toyota Corolla - Brake Repair</h4>
                                <span class="service-id">#1025</span>
                            </div>
                            
                            <div class="work-details">
                                <div class="detail-item">
                                    <i class="fas fa-user"></i>
                                    <span>Customer: John Doe</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-car"></i>
                                    <span>Vehicle: 3ABC123</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span>Started: 09:00 AM</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-hourglass-half"></i>
                                    <span>Elapsed: 30 mins</span>
                                </div>
                            </div>
                            
                            <div class="work-progress">
                                <div class="progress-label">
                                    <span>Diagnosis</span>
                                    <span>60%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 60%"></div>
                                </div>
                            </div>
                            
                            <div class="work-actions">
                                <button class="btn-update" onclick="updateWork(1025)">
                                    <i class="fas fa-edit"></i> Update
                                </button>
                                <button class="btn-complete" onclick="completeWork(1025)">
                                    <i class="fas fa-check"></i> Complete
                                </button>
                                <button class="btn-need-help" onclick="requestHelp(1025)">
                                    <i class="fas fa-hands-helping"></i> Need Help
                                </button>
                            </div>
                        </div>
                        
                        <!-- More work cards -->
                    </div>
                </div>
                
                <!-- Parts Needed -->
                <div class="parts-needed">
                    <div class="section-header">
                        <h3>Parts Needed</h3>
                        <a href="#parts-needed" class="view-all">View All</a>
                    </div>
                    
                    <div class="parts-list">
                        <div class="part-item urgent">
                            <div class="part-icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="part-details">
                                <h4>Brake Pads Set</h4>
                                <p>For: Toyota Corolla #1025</p>
                                <small>Requested: 30 mins ago</small>
                            </div>
                            <div class="part-status">
                                <span class="status-pending">Pending</span>
                            </div>
                        </div>
                        
                        <div class="part-item">
                            <div class="part-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="part-details">
                                <h4>Engine Oil 5W-30</h4>
                                <p>For: Honda CR-V #1026</p>
                                <small>Requested: 1 hour ago</small>
                            </div>
                            <div class="part-status">
                                <span class="status-approved">Approved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Assigned Services Section -->
            <section id="assigned-services" class="content-section">
                <div class="section-header">
                    <h1>Assigned Services</h1>
                    <div class="header-actions">
                        <select id="filterPriority" onchange="filterServices()">
                            <option value="all">All Priorities</option>
                            <option value="high">High Priority</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                        
                        <select id="filterStatus" onchange="filterServices()">
                            <option value="all">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="on_hold">On Hold</option>
                        </select>
                    </div>
                </div>
                
                <div class="assigned-services-container">
                    <div class="services-grid">
                        <!-- Service Card Template -->
                        <div class="service-assigned-card">
                            <div class="service-card-header">
                                <div class="service-id">#1025</div>
                                <div class="service-priority high">
                                    <i class="fas fa-exclamation-circle"></i> High
                                </div>
                            </div>
                            
                            <div class="service-info">
                                <h3>Toyota Corolla</h3>
                                <p class="plate-number">3ABC123</p>
                                
                                <div class="service-details">
                                    <div class="detail-row">
                                        <i class="fas fa-user"></i>
                                        <span>John Doe</span>
                                    </div>
                                    <div class="detail-row">
                                        <i class="fas fa-phone"></i>
                                        <span>0912 345 678</span>
                                    </div>
                                    <div class="detail-row">
                                        <i class="fas fa-calendar"></i>
                                        <span>Assigned: Today, 08:30 AM</span>
                                    </div>
                                    <div class="detail-row">
                                        <i class="fas fa-wrench"></i>
                                        <span>Brake System Repair</span>
                                    </div>
                                </div>
                                
                                <div class="problem-description">
                                    <h4>Problem Description:</h4>
                                    <p>Customer reports squeaking noise when braking, especially at low speeds.</p>
                                </div>
                                
                                <div class="diagnosis-info">
                                    <h4>Diagnosis Notes:</h4>
                                    <p>Front brake pads worn out (80% worn), rotors need resurfacing.</p>
                                </div>
                            </div>
                            
                            <div class="service-actions">
                                <button class="btn-start" onclick="startService(1025)">
                                    <i class="fas fa-play"></i> Start Service
                                </button>
                                <button class="btn-view" onclick="viewServiceDetails(1025)">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn-transfer" onclick="transferService(1025)">
                                    <i class="fas fa-exchange-alt"></i> Transfer
                                </button>
                            </div>
                        </div>
                        
                        <!-- More service cards -->
                    </div>
                </div>
            </section>

            <!-- Service Details Modal -->
            <div class="modal-overlay" id="serviceModal">
                <div class="modal">
                    <div class="modal-header">
                        <h2>Service Details - #1025</h2>
                        <button class="close-modal" onclick="closeModal()">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <!-- Service details form -->
                        <form id="serviceForm">
                            <!-- Form will be loaded dynamically -->
                        </form>
                    </div>
                </div>
            </div>

            <!-- Update Service Status Section -->
            <section id="update-status" class="content-section">
                <div class="section-header">
                    <h1>Update Service Status</h1>
                    <p>Record work done and update service progress</p>
                </div>
                
                <div class="status-update-container">
                    <div class="update-form">
                        <div class="form-group">
                            <label for="selectService">
                                <i class="fas fa-wrench"></i> Select Service
                            </label>
                            <select id="selectService" onchange="loadServiceDetails(this.value)">
                                <option value="">Choose a service...</option>
                                <option value="1025">#1025 - Toyota Corolla (Brake Repair)</option>
                                <option value="1026">#1026 - Honda CR-V (Oil Change)</option>
                            </select>
                        </div>
                        
                        <div id="serviceUpdateForm" style="display: none;">
                            <div class="form-group">
                                <label for="workDone">
                                    <i class="fas fa-tasks"></i> Work Done
                                </label>
                                <textarea id="workDone" rows="4" 
                                          placeholder="Describe what work was performed..."></textarea>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="hoursWorked">
                                        <i class="fas fa-clock"></i> Hours Worked
                                    </label>
                                    <input type="number" id="hoursWorked" step="0.5" min="0.5" max="24">
                                </div>
                                
                                <div class="form-group">
                                    <label for="statusUpdate">
                                        <i class="fas fa-flag"></i> Update Status
                                    </label>
                                    <select id="statusUpdate">
                                        <option value="in_progress">In Progress</option>
                                        <option value="on_hold">On Hold (Waiting for Parts)</option>
                                        <option value="completed">Completed</option>
                                        <option value="transferred">Transferred to Another Dept</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="partsUsed">
                                    <i class="fas fa-box-open"></i> Parts Used
                                </label>
                                <div class="parts-used-container">
                                    <!-- Parts will be added here -->
                                </div>
                                <button type="button" class="btn-add-part" onclick="addPartUsed()">
                                    <i class="fas fa-plus"></i> Add Part
                                </button>
                            </div>
                            
                            <div class="form-group">
                                <label for="nextSteps">
                                    <i class="fas fa-forward"></i> Next Steps / Recommendations
                                </label>
                                <textarea id="nextSteps" rows="3" 
                                          placeholder="Any recommendations for customer or next service..."></textarea>
                            </div>
                            
                            <div class="form-actions">
                                <button type="button" class="btn-save" onclick="saveServiceUpdate()">
                                    <i class="fas fa-save"></i> Save Update
                                </button>
                                <button type="button" class="btn-cancel" onclick="showSection('dashboard')">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Parts Request Section -->
            <section id="parts-request" class="content-section">
                <div class="section-header">
                    <h1>Request Parts</h1>
                    <p>Request spare parts from inventory</p>
                </div>
                
                <div class="parts-request-container">
                    <div class="request-form">
                        <div class="form-group">
                            <label for="requestService">
                                <i class="fas fa-wrench"></i> For Service
                            </label>
                            <select id="requestService" required>
                                <option value="">Select service...</option>
                                <option value="1025">#1025 - Toyota Corolla</option>
                                <option value="1026">#1026 - Honda CR-V</option>
                            </select>
                        </div>
                        
                        <div class="parts-search">
                            <h3>Search Parts</h3>
                            <div class="search-bar">
                                <i class="fas fa-search"></i>
                                <input type="text" id="searchParts" placeholder="Search by part name or code..."
                                       onkeyup="searchParts(this.value)">
                            </div>
                            <div class="search-results" id="partsResults"></div>
                        </div>
                        
                        <div class="requested-parts">
                            <h3>Requested Parts</h3>
                            <div class="parts-list" id="requestedPartsList">
                                <!-- Requested parts will appear here -->
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="urgencyLevel">
                                <i class="fas fa-exclamation-triangle"></i> Urgency Level
                            </label>
                            <select id="urgencyLevel">
                                <option value="normal">Normal (Within 24 hours)</option>
                                <option value="urgent">Urgent (Within 2 hours)</option>
                                <option value="emergency">Emergency (Immediate)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="requestNotes">
                                <i class="fas fa-sticky-note"></i> Notes
                            </label>
                            <textarea id="requestNotes" rows="3" 
                                      placeholder="Any special notes about the parts needed..."></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn-submit-request" onclick="submitPartsRequest()">
                                <i class="fas fa-paper-plane"></i> Submit Request
                            </button>
                        </div>
                    </div>
                    
                    <div class="inventory-status">
                        <h3>Inventory Status</h3>
                        <div class="inventory-list">
                            <div class="inventory-item">
                                <div class="item-name">Brake Pads (Standard)</div>
                                <div class="item-stock">
                                    <span class="stock-level high">In Stock: 15</span>
                                </div>
                            </div>
                            <div class="inventory-item">
                                <div class="item-name">Engine Oil 5W-30</div>
                                <div class="item-stock">
                                    <span class="stock-level medium">In Stock: 8</span>
                                </div>
                            </div>
                            <div class="inventory-item">
                                <div class="item-name">Air Filter</div>
                                <div class="item-stock">
                                    <span class="stock-level low">In Stock: 2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- More sections would follow similar pattern -->
            
        </main>
    </div>

    <!-- Notification Panel -->
    <div class="notification-panel" id="notificationPanel">
        <div class="panel-header">
            <h3>Notifications</h3>
            <button class="close-panel" onclick="toggleNotifications()">&times;</button>
        </div>
        <div class="panel-content">
            <div class="notification-item">
                <div class="notification-icon info">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="notification-content">
                    <p>New service assigned: #1027 - Toyota Hilux</p>
                    <small>5 minutes ago</small>
                </div>
            </div>
            <div class="notification-item">
                <div class="notification-icon warning">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="notification-content">
                    <p>Parts request approved: Brake Pads</p>
                    <small>30 minutes ago</small>
                </div>
            </div>
        </div>
    </div>

    <script src="js/department.js"></script>
</body>
</html>
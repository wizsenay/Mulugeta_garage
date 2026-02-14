<!-- customer_dashboard.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard - Mulugeta Garage</title>
    <link rel="stylesheet" href="style/customer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Top Navigation -->
    <nav class="customer-nav">
        <div class="nav-container">
            <div class="nav-left">
                <div class="logo">
                    <i class="fas fa-car"></i>
                    <span>Mulugeta Garage</span>
                </div>
            </div>
            
            <div class="nav-center">
                <div class="welcome-message">
                    <h3>Welcome back, <span class="customer-name">John Doe</span>!</h3>
                    <p class="customer-email">john@example.com</p>
                </div>
            </div>
            
            <div class="nav-right">
                <div class="notification-bell">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </div>
                <div class="user-profile">
                    <div class="avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="dropdown">
                        <button class="dropdown-btn">
                            <span>John Doe</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#profile"><i class="fas fa-user-circle"></i> My Profile</a>
                            <a href="#settings"><i class="fas fa-cog"></i> Settings</a>
                            <a href="index.php" class="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="customer-container">
        <!-- Sidebar -->
        <aside class="customer-sidebar">
            <nav class="sidebar-menu">
                <a href="#dashboard" class="menu-item active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="#book-service" class="menu-item">
                    <i class="fas fa-calendar-plus"></i>
                    <span>Book Service</span>
                </a>
                
                <a href="#my-appointments" class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>My Appointments</span>
                    <span class="notification-count">2</span>
                </a>
                
                <a href="#service-status" class="menu-item">
                    <i class="fas fa-tasks"></i>
                    <span>Service Status</span>
                    <span class="notification-count">1</span>
                </a>
                
                <a href="#my-vehicles" class="menu-item">
                    <i class="fas fa-car"></i>
                    <span>My Vehicles</span>
                </a>
                
                <a href="#payments" class="menu-item">
                    <i class="fas fa-credit-card"></i>
                    <span>Payments</span>
                    <span class="notification-count payment-alert">$320</span>
                </a>
                
                <a href="#history" class="menu-item">
                    <i class="fas fa-history"></i>
                    <span>Service History</span>
                </a>
                
                <a href="#profile" class="menu-item">
                    <i class="fas fa-user-circle"></i>
                    <span>My Profile</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <div class="support-card">
                    <i class="fas fa-headset"></i>
                    <h4>Need Help?</h4>
                    <p>Contact our support</p>
                    <button class="btn-support">
                        <i class="fas fa-phone"></i> Call Now
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="customer-main">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section active">
                <div class="dashboard-header">
                    <h1>My Dashboard</h1>
                    <p>Overview of your vehicles and services</p>
                </div>
                
                <!-- Quick Stats -->
                <div class="quick-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="stat-content">
                            <h3>3</h3>
                            <p>Registered Vehicles</p>
                        </div>
                        <a href="#my-vehicles" class="stat-link">View All</a>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="stat-content">
                            <h3>15</h3>
                            <p>Total Services</p>
                        </div>
                        <a href="#history" class="stat-link">View History</a>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-content">
                            <h3>2</h3>
                            <p>Active Services</p>
                        </div>
                        <a href="#service-status" class="stat-link">Track Now</a>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-content">
                            <h3>$320</h3>
                            <p>Pending Payment</p>
                        </div>
                        <a href="#payments" class="stat-link">Pay Now</a>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <h2>Quick Actions</h2>
                    <div class="actions-grid">
                        <button class="action-btn" onclick="showSection('book-service')">
                            <div class="action-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <h3>Book New Service</h3>
                            <p>Schedule maintenance or repair</p>
                        </button>
                        
                        <button class="action-btn" onclick="showSection('my-vehicles')">
                            <div class="action-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3>Add Vehicle</h3>
                            <p>Register a new vehicle</p>
                        </button>
                        
                        <button class="action-btn" onclick="showSection('payments')">
                            <div class="action-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <h3>Make Payment</h3>
                            <p>Pay for services online</p>
                        </button>
                        
                        <button class="action-btn" onclick="showSection('service-status')">
                            <div class="action-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h3>Track Service</h3>
                            <p>Check service progress</p>
                        </button>
                    </div>
                </div>
                
                <!-- Active Services -->
                <div class="active-services">
                    <div class="section-header">
                        <h2>Active Services</h2>
                        <a href="#service-status" class="view-all">View All</a>
                    </div>
                    
                    <div class="services-list">
                        <div class="service-card">
                            <div class="service-header">
                                <h3>Toyota Corolla</h3>
                                <span class="service-id">#1025</span>
                            </div>
                            <div class="service-details">
                                <p><i class="fas fa-wrench"></i> Brake System Repair</p>
                                <p><i class="fas fa-calendar"></i> Started: Jan 15, 2024</p>
                                <p><i class="fas fa-map-marker-alt"></i> Current: Mechanical Department</p>
                            </div>
                            <div class="service-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 60%"></div>
                                </div>
                                <span class="progress-text">60% Complete</span>
                            </div>
                            <div class="service-actions">
                                <button class="btn-track" onclick="trackService(1025)">
                                    <i class="fas fa-eye"></i> Track Details
                                </button>
                            </div>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-header">
                                <h3>Honda CR-V</h3>
                                <span class="service-id">#1026</span>
                            </div>
                            <div class="service-details">
                                <p><i class="fas fa-oil-can"></i> Regular Maintenance</p>
                                <p><i class="fas fa-calendar"></i> Started: Jan 16, 2024</p>
                                <p><i class="fas fa-map-marker-alt"></i> Current: Service Department</p>
                            </div>
                            <div class="service-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 30%"></div>
                                </div>
                                <span class="progress-text">30% Complete</span>
                            </div>
                            <div class="service-actions">
                                <button class="btn-track" onclick="trackService(1026)">
                                    <i class="fas fa-eye"></i> Track Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="recent-activity">
                    <h2>Recent Activity</h2>
                    <div class="activity-timeline">
                        <div class="activity-item">
                            <div class="activity-icon success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>Payment Received</strong> - $150 for service #1024</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon info">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>Vehicle Moved</strong> - Toyota to Mechanical Department</p>
                                <span class="activity-time">4 hours ago</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon warning">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>Payment Due</strong> - $320 for service #1025</p>
                                <span class="activity-time">1 day ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Book Service Section -->
            <section id="book-service" class="content-section">
                <div class="section-header">
                    <h1>Book New Service</h1>
                    <p>Schedule maintenance or repair for your vehicle</p>
                </div>
                
                <div class="booking-container">
                    <div class="booking-steps">
                        <div class="step active">1. Select Vehicle</div>
                        <div class="step">2. Service Details</div>
                        <div class="step">3. Choose Date</div>
                        <div class="step">4. Confirmation</div>
                    </div>
                    
                    <form class="booking-form" id="bookingForm">
                        <!-- Step 1: Select Vehicle -->
                        <div class="form-step active" id="step1">
                            <h3>Select Vehicle</h3>
                            <div class="vehicle-options">
                                <div class="vehicle-option active" onclick="selectVehicle(1)">
                                    <div class="vehicle-icon">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <div class="vehicle-info">
                                        <h4>Toyota Corolla</h4>
                                        <p>Plate: 3ABC123 | 2020 | Sedan</p>
                                        <p>Last Service: Dec 10, 2023</p>
                                    </div>
                                    <div class="vehicle-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                                
                                <div class="vehicle-option" onclick="selectVehicle(2)">
                                    <div class="vehicle-icon">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div class="vehicle-info">
                                        <h4>Honda CR-V</h4>
                                        <p>Plate: 4XYZ789 | 2019 | SUV</p>
                                        <p>Last Service: Nov 25, 2023</p>
                                    </div>
                                    <div class="vehicle-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                                
                                <button type="button" class="btn-add-vehicle" onclick="addVehicle()">
                                    <i class="fas fa-plus-circle"></i> Add New Vehicle
                                </button>
                            </div>
                            
                            <div class="form-navigation">
                                <button type="button" class="btn-next" onclick="nextStep(2)">
                                    Next <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 2: Service Details -->
                        <div class="form-step" id="step2">
                            <h3>Service Details</h3>
                            <div class="form-group">
                                <label>Service Type</label>
                                <div class="service-type-options">
                                    <label class="service-type-option">
                                        <input type="radio" name="serviceType" value="regular" checked>
                                        <div class="option-content">
                                            <i class="fas fa-oil-can"></i>
                                            <h4>Regular Maintenance</h4>
                                            <p>Oil change, tire rotation, brake check</p>
                                        </div>
                                    </label>
                                    
                                    <label class="service-type-option">
                                        <input type="radio" name="serviceType" value="problem">
                                        <div class="option-content">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            <h4>Problem/Repair</h4>
                                            <p>Specific issue that needs fixing</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="problemDesc">Problem Description</label>
                                <textarea id="problemDesc" rows="4" 
                                          placeholder="Describe the problem (if any)..."></textarea>
                            </div>
                            
                            <div class="form-navigation">
                                <button type="button" class="btn-prev" onclick="prevStep(1)">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="button" class="btn-next" onclick="nextStep(3)">
                                    Next <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 3: Choose Date -->
                        <div class="form-step" id="step3">
                            <h3>Select Date & Time</h3>
                            <div class="date-selection">
                                <div class="calendar">
                                    <!-- Calendar would be implemented with JS -->
                                    <div class="calendar-header">
                                        <button><i class="fas fa-chevron-left"></i></button>
                                        <h4>January 2024</h4>
                                        <button><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <div class="calendar-days">
                                        <!-- Calendar days would be generated -->
                                    </div>
                                </div>
                                
                                <div class="time-slots">
                                    <h4>Available Time Slots</h4>
                                    <div class="slot-options">
                                        <label class="time-slot">
                                            <input type="radio" name="timeSlot" value="09:00">
                                            <span>09:00 AM</span>
                                        </label>
                                        <label class="time-slot">
                                            <input type="radio" name="timeSlot" value="10:30">
                                            <span>10:30 AM</span>
                                        </label>
                                        <label class="time-slot">
                                            <input type="radio" name="timeSlot" value="14:00">
                                            <span>02:00 PM</span>
                                        </label>
                                        <label class="time-slot">
                                            <input type="radio" name="timeSlot" value="15:30">
                                            <span>03:30 PM</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-navigation">
                                <button type="button" class="btn-prev" onclick="prevStep(2)">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="button" class="btn-next" onclick="nextStep(4)">
                                    Next <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 4: Confirmation -->
                        <div class="form-step" id="step4">
                            <h3>Confirm Booking</h3>
                            <div class="booking-summary">
                                <div class="summary-item">
                                    <span>Vehicle:</span>
                                    <strong id="summaryVehicle">Toyota Corolla (3ABC123)</strong>
                                </div>
                                <div class="summary-item">
                                    <span>Service Type:</span>
                                    <strong id="summaryService">Regular Maintenance</strong>
                                </div>
                                <div class="summary-item">
                                    <span>Date & Time:</span>
                                    <strong id="summaryDate">Jan 20, 2024 at 09:00 AM</strong>
                                </div>
                                <div class="summary-item">
                                    <span>Estimated Cost:</span>
                                    <strong class="estimated-cost">$80 - $120</strong>
                                </div>
                            </div>
                            
                            <div class="form-navigation">
                                <button type="button" class="btn-prev" onclick="prevStep(3)">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-check-circle"></i> Confirm Booking
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <!-- My Appointments Section -->
            <section id="my-appointments" class="content-section">
                <div class="section-header">
                    <h1>My Appointments</h1>
                    <div class="header-actions">
                        <button class="btn-new" onclick="showSection('book-service')">
                            <i class="fas fa-plus"></i> New Appointment
                        </button>
                    </div>
                </div>
                
                <div class="appointments-container">
                    <div class="appointments-filters">
                        <button class="filter-btn active">All</button>
                        <button class="filter-btn">Upcoming</button>
                        <button class="filter-btn">Completed</button>
                        <button class="filter-btn">Cancelled</button>
                    </div>
                    
                    <div class="appointments-list">
                        <div class="appointment-card">
                            <div class="appointment-header">
                                <div class="appointment-info">
                                    <h3>Toyota Corolla - Regular Maintenance</h3>
                                    <p class="appointment-id">#1027</p>
                                </div>
                                <span class="status-badge confirmed">Confirmed</span>
                            </div>
                            
                            <div class="appointment-details">
                                <p><i class="fas fa-calendar"></i> <strong>Date:</strong> Jan 25, 2024</p>
                                <p><i class="fas fa-clock"></i> <strong>Time:</strong> 10:30 AM</p>
                                <p><i class="fas fa-car"></i> <strong>Vehicle:</strong> Toyota Corolla (3ABC123)</p>
                                <p><i class="fas fa-wrench"></i> <strong>Service:</strong> Oil Change, Tire Rotation</p>
                            </div>
                            
                            <div class="appointment-actions">
                                <button class="btn-action" onclick="editAppointment(1027)">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn-action cancel" onclick="cancelAppointment(1027)">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
            </section>

            <!-- Service Status Section -->
            <section id="service-status" class="content-section">
                <div class="section-header">
                    <h1>Service Status Tracking</h1>
                    <p>Track your vehicle's service progress</p>
                </div>
                
                <div class="tracking-container">
                    <div class="tracking-header">
                        <div class="vehicle-info">
                            <h2>Toyota Corolla</h2>
                            <p>Plate: 3ABC123 | Service ID: #1025</p>
                        </div>
                        <div class="current-status">
                            <span class="status in-progress">In Progress</span>
                            <p>Estimated Completion: Jan 18, 2024</p>
                        </div>
                    </div>
                    
                    <div class="tracking-timeline">
                        <div class="timeline-item completed">
                            <div class="timeline-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Reception & Check-in</h4>
                                <p>Vehicle received and initial assessment</p>
                                <span class="timeline-time">Jan 15, 09:30 AM</span>
                            </div>
                        </div>
                        
                        <div class="timeline-item completed">
                            <div class="timeline-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Diagnosis Department</h4>
                                <p>Problem identified: Brake system issue</p>
                                <span class="timeline-time">Jan 15, 11:00 AM</span>
                            </div>
                        </div>
                        
                        <div class="timeline-item current">
                            <div class="timeline-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Mechanical Department</h4>
                                <p>Brake repair in progress (Technician: Alex)</p>
                                <span class="timeline-time">Jan 15, 02:00 PM</span>
                            </div>
                        </div>
                        
                        <div class="timeline-item pending">
                            <div class="timeline-icon">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Quality Check</h4>
                                <p>Final inspection and testing</p>
                                <span class="timeline-time">Pending</span>
                            </div>
                        </div>
                        
                        <div class="timeline-item pending">
                            <div class="timeline-icon">
                                <i class="fas fa-car"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Ready for Pickup</h4>
                                <p>Vehicle ready for customer pickup</p>
                                <span class="timeline-time">Pending</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tracking-actions">
                        <button class="btn-primary" onclick="contactGarage()">
                            <i class="fas fa-phone"></i> Contact Garage
                        </button>
                        <button class="btn-secondary" onclick="requestUpdate()">
                            <i class="fas fa-sync-alt"></i> Request Update
                        </button>
                    </div>
                </div>
            </section> 
            
        </main>
    </div>

    <script src="js/customer.js"></script>
</body>
</html>
    <!-- START MAIN NAVIGATION BAR -->
    <nav class="navbar">
            <div class="nav-container">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="logo-text">
                        <h1>Mulugeta Garage</h1>
                        <p>Since 2010</p>
                    </div>
                </div>
                
                <div class="nav-menu">
                    <a href="#home" class="nav-link active">Home</a>
                    <a href="#services" class="nav-link">Services</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#contact" class="nav-link">Contact</a>
                    <button class="btn-login-nav" onclick="openLoginModal()">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </div>
                
                <button class="menu-toggle" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
    </nav>
    <!-- END MAIN NAVIGATION BAR -->


    <!-- START CUSTOMER NAVIGATION BAR -->
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
                            <a href="logout.html" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </nav>
    <!-- END CUSTOMER NAVIGATION BAR -->



    <!-- START REGISTRATION BAR -->
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
                    <a href="logout.html" class="menu-item logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </nav>
        </aside>
    <!-- END REGISTRATION BAR -->
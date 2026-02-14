<?php include 'includes/function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulugeta Garage - Professional Vehicle Services</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Navigation Bar -->
    <?php echo get_section('includes/header.php', 'MAIN NAVIGATION BAR'); ?>


    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <h2>Expert Vehicle Care & Maintenance</h2>
                <p class="hero-subtitle">Trusted by thousands for quality repairs, regular maintenance, and professional care for your vehicle.</p>
                <div class="hero-buttons">
                    <button class="btn-primary" onclick="openLoginModal()">
                        <i class="fas fa-calendar-check"></i> Book Service
                    </button>
                    <a href="#services" class="btn-secondary">
                        <i class="fas fa-tools"></i> View Services
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat">
                        <h3>5000+</h3>
                        <p>Vehicles Serviced</p>
                    </div>
                    <div class="stat">
                        <h3>15+</h3>
                        <p>Expert Technicians</p>
                    </div>
                    <div class="stat">
                        <h3>98%</h3>
                        <p>Customer Satisfaction</p>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?ixlib=rb-4.0.3&auto=format&fit=crop&w=600" alt="Professional Garage Service">
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="section-header">
            <h2>Our Professional Services</h2>
            <p>Comprehensive vehicle care solutions for all makes and models</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-oil-can"></i>
                </div>
                <h3>Regular Maintenance</h3>
                <p>Oil changes, brake checks, tire rotation, filter replacement, and routine inspections</p>
                <div class="service-features">
                    <span><i class="fas fa-check-circle"></i> Scheduled Service</span>
                    <span><i class="fas fa-check-circle"></i> Preventive Care</span>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Mechanical Repair</h3>
                <p>Engine diagnostics, transmission repair, suspension work, and exhaust system repair</p>
                <div class="service-features">
                    <span><i class="fas fa-check-circle"></i> Engine Repair</span>
                    <span><i class="fas fa-check-circle"></i> Transmission</span>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Electrical Services</h3>
                <p>Battery replacement, wiring repair, alternator service, and electronic system diagnostics</p>
                <div class="service-features">
                    <span><i class="fas fa-check-circle"></i> Battery Service</span>
                    <span><i class="fas fa-check-circle"></i> Wiring Repair</span>
                </div>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-car-crash"></i>
                </div>
                <h3>Body Repair</h3>
                <p>Dent removal, painting, windshield replacement, and structural restoration</p>
                <div class="service-features">
                    <span><i class="fas fa-check-circle"></i> Paint Work</span>
                    <span><i class="fas fa-check-circle"></i> Dent Repair</span>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="process">
        <div class="section-header">
            <h2>How It Works</h2>
            <p>Simple steps to get your vehicle serviced</p>
        </div>
        
        <div class="process-steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Register & Book</h3>
                <p>Create your account and book a service appointment online</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Vehicle Diagnosis</h3>
                <p>Our experts inspect your vehicle and identify required services</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Service & Repair</h3>
                <p>Professional technicians perform the necessary repairs</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3>Quality Check & Delivery</h3>
                <p>Final inspection and your vehicle is ready for pickup</p>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div class="modal-overlay" id="loginModal">
        <div class="modal">
            <div class="modal-header">
                <h2>Login/Register to Mulugeta Garage</h2>
                <button class="close-modal" onclick="closeLoginModal()">&times;</button>
            </div>
            
            <div class="modal-body">
                <div class="login-tabs">
                    <button class="tab-btn active" onclick="switchTab('login')">Login</button>
                    <button class="tab-btn" onclick="switchTab('register')">Register</button>
                </div>
                
                <!-- Login Form -->
                <?php include('auth/login.php'); ?>
                <!--div id="loginForm" class="tab-content active">
                    <form id="loginFormElement" onsubmit="handleLogin(event)">
                        <div class="form-group">
                            <label for="username">
                                <i class="fas fa-user"></i> Username or Email
                            </label>
                            <input type="text" id="username" placeholder="Enter your username or email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <input type="password" id="password" placeholder="Enter your password" required>
                            <span class="show-password" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        
                        <div class="form-group">
                            <label for="role">
                                <i class="fas fa-users"></i> I am a:
                            </label>
                            <select id="role" required>
                                <option value="">Select your role</option>
                                <option value="customer">Customer</option>
                                <option value="reception">Reception Staff</option>
                                <option value="technician">Technician</option>
                                <option value="inventory">Inventory Staff</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                        
                        <div class="form-options">
                            <label class="checkbox">
                                <input type="checkbox"> Remember me
                            </label>
                            <a href="#" class="forgot-link">Forgot password?</a>
                        </div>
                        
                        <button type="submit" class="btn-login-submit">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                        
                        <div class="demo-credentials">
                            <p><strong>Demo Credentials:</strong></p>
                            <p>Customer: customer / password123</p>
                            <p>Reception: reception / password123</p>
                        </div>
                    </form>
                </div-->
                
                <!-- Registration Form -->
                <?php include('auth/register.php'); ?>
                <!--div id="registerForm" class="tab-content">
                    <form id="registerFormElement" onsubmit="handleRegister(event)">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fullName">
                                    <i class="fas fa-user-circle"></i> Full Name
                                </label>
                                <input type="text" id="fullName" placeholder="Enter your full name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">
                                    <i class="fas fa-envelope"></i> Email
                                </label>
                                <input type="email" id="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">
                                    <i class="fas fa-phone"></i> Phone Number
                                </label>
                                <input type="tel" id="phone" placeholder="Enter your phone number" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="regUsername">
                                    <i class="fas fa-user"></i> Username
                                </label>
                                <input type="text" id="regUsername" placeholder="Choose a username" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="regPassword">
                                    <i class="fas fa-lock"></i> Password
                                </label>
                                <input type="password" id="regPassword" placeholder="Create a password" required>
                                <span class="show-password" onclick="togglePassword('regPassword')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmPassword">
                                    <i class="fas fa-lock"></i> Confirm Password
                                </label>
                                <input type="password" id="confirmPassword" placeholder="Confirm password" required>
                                <span class="show-password" onclick="togglePassword('confirmPassword')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" required> I agree to the <a href="#">Terms & Conditions</a>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn-register-submit">
                            <i class="fas fa-user-plus"></i> Create Account
                        </button>
                    </form>
                </div-->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="footer-container">
            <div class="footer-section">
                <div class="footer-logo">
                    <i class="fas fa-car"></i>
                    <h3>Mulugeta Garage</h3>
                </div>
                <p>Providing professional vehicle services since 2010. Your trust is our commitment.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <a href="#home">Home</a>
                <a href="#services">Services</a>
                <a href="#about">About Us</a>
                <a href="#contact">Contact</a>
                <a href="#" onclick="openLoginModal()">Login</a>
            </div>
            
            <div class="footer-section">
                <h4>Services</h4>
                <a href="#">Regular Maintenance</a>
                <a href="#">Mechanical Repair</a>
                <a href="#">Electrical Services</a>
                <a href="#">Body Repair</a>
                <a href="#">Emergency Service</a>
            </div>
            
            <div class="footer-section">
                <h4>Contact Info</h4>
                <p><i class="fas fa-map-marker-alt"></i> Unity University Area, Addis Ababa</p>
                <p><i class="fas fa-phone"></i> +251 123 456 789</p>
                <p><i class="fas fa-envelope"></i> info@mulugetagarage.com</p>
                <p><i class="fas fa-clock"></i> Mon-Sat: 8:00 AM - 6:00 PM</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 Mulugeta Garage. All rights reserved. | Developed by Unity University CS Students</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
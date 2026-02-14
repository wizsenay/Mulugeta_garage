<div id="registerForm" class="tab-content">
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
</div>
<div id="loginForm" class="tab-content active">
    <form id="loginFormElement" action = "login_process.php" onsubmit="handleLogin(event)">
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
            <i class="fas fa-sign-in-alt"></i>Login
        </button>
    </form>
</div>
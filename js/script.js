// Navigation Menu Toggle
function toggleMenu() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}

// Close menu when clicking a link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        document.querySelector('.nav-menu').classList.remove('active');
    });
});



// Login Modal Functions
function openLoginModal() {
    document.getElementById('loginModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLoginModal() {
    document.getElementById('loginModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('loginModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLoginModal();
    }
});



// Tab Switching
function switchTab(tabName) {
    // Update tabs
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    if (tabName === 'login') {
        document.querySelector('.tab-btn:nth-child(1)').classList.add('active');
        document.getElementById('loginForm').classList.add('active');
        document.getElementById('registerForm').classList.remove('active');
    } else {
        document.querySelector('.tab-btn:nth-child(2)').classList.add('active');
        document.getElementById('registerForm').classList.add('active');
        document.getElementById('loginForm').classList.remove('active');
    }
}

// Toggle Password Visibility
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Handle Login Form Submission
function handleLogin(event) {
    event.preventDefault();
    
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const role = document.getElementById('role').value;
    
    // Demo validation (In real app, this would be server-side)
    const demoCredentials = {
        'customer': { username: 'customer', password: 'password123', redirect: 'customer.php' },
        'reception': { username: 'reception', password: 'password123', redirect: 'reception.php' },
        'technician': { username: 'technician', password: 'password123', redirect: 'department.php' },
        'inventory': { username: 'inventory', password: 'password123', redirect: 'inventory.php' },
        'admin': { username: 'admin', password: 'password123', redirect: 'admin.php' }
    };
    
    if (!role) {
        alert('Please select your role');
        return;
    }
    
    // Demo check (remove in production)
    const demoUser = demoCredentials[role];
    if (demoUser && username === demoUser.username && password === demoUser.password) {
        alert(`Login successful! Redirecting to ${role} dashboard...`);
        
        // In real app, this would redirect to actual dashboard
        closeLoginModal();
        
        // Show success message
        setTimeout(() => {
            window.location.href = demoUser.redirect;
        }, 500);
        showNotification('Login successful! Welcome ' + role.charAt(0).toUpperCase() + role.slice(1));
    } else {
        alert('Invalid credentials. For demo: Use username = "' + role + '" and password = "password123"');
    }
}

// Handle Registration Form Submission
function handleRegister(event) {
    event.preventDefault();
    
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const username = document.getElementById('regUsername').value;
    const password = document.getElementById('regPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    // Basic validation
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }
    
    if (password.length < 6) {
        alert('Password must be at least 6 characters long');
        return;
    }
    
    // Demo registration success
    alert(`Registration successful! Welcome ${fullName}. You can now login as a customer.`);
    showNotification('Account created successfully! Please login.');
    
    // Switch to login tab
    switchTab('login');
    
    // Pre-fill login form
    document.getElementById('username').value = username;
    document.getElementById('role').value = 'customer';
}

// Show Notification
function showNotification(message) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        </div>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: linear-gradient(135deg, #27ae60, #219653);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(39, 174, 96, 0.3);
        z-index: 3000;
        animation: slideIn 0.3s ease;
        max-width: 300px;
    `;
    
    // Add keyframe animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    `;
    document.head.appendChild(style);
    
    // Add notification content styles
    notification.querySelector('.notification-content').style.cssText = `
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-weight: 500;
    `;
    
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    });
});

// Add active class to nav links based on scroll position
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');
    
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (scrollY >= sectionTop - 100) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth hover effects to service cards
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    console.log('Mulugeta Garage System loaded successfully!');
});
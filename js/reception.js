// Reception Dashboard Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize
    updateTime();
    setInterval(updateTime, 60000); // Update time every minute
    
    // Set active menu item
    setActiveMenu();
    
    // Load initial data
    loadDashboardData();
});

// Update current time
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    });
    const dateString = now.toLocaleDateString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    document.getElementById('currentTime').textContent = 
        `${dateString} | ${timeString}`;
}

// Set active menu item
function setActiveMenu() {
    const menuItems = document.querySelectorAll('.menu-item');
    const sections = document.querySelectorAll('.content-section');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all
            menuItems.forEach(i => i.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));
            
            // Add active class to clicked
            this.classList.add('active');
            
            // Show corresponding section
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.classList.add('active');
            }
        });
    });
}

// Show specific section
function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Remove active from all menu items
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Show target section
    const targetSection = document.getElementById(sectionId);
    if (targetSection) {
        targetSection.classList.add('active');
    }
    
    // Activate corresponding menu item
    const menuItem = document.querySelector(`.menu-item[href="#${sectionId}"]`);
    if (menuItem) {
        menuItem.classList.add('active');
    }
}

// Load dashboard data
function loadDashboardData() {
    // In real app, fetch from API
    // For demo, we'll use static data
    console.log('Loading dashboard data...');
}

// Search customers
function searchCustomers(query) {
    if (query.length < 2) {
        document.getElementById('customerResults').style.display = 'none';
        return;
    }
    
    // In real app, fetch from API
    const mockResults = [
        { id: 1, name: 'John Doe', phone: '+251 912 345 678', email: 'john@example.com' },
        { id: 2, name: 'Jane Smith', phone: '+251 923 456 789', email: 'jane@example.com' },
        { id: 3, name: 'Mike Johnson', phone: '+251 934 567 890', email: 'mike@example.com' }
    ];
    
    const resultsContainer = document.getElementById('customerResults');
    resultsContainer.innerHTML = '';
    
    mockResults.forEach(customer => {
        if (customer.name.toLowerCase().includes(query.toLowerCase()) ||
            customer.phone.includes(query) ||
            customer.email.toLowerCase().includes(query.toLowerCase())) {
            
            const div = document.createElement('div');
            div.className = 'search-result-item';
            div.innerHTML = `
                <strong>${customer.name}</strong><br>
                <small>${customer.phone} | ${customer.email}</small>
            `;
            div.onclick = () => selectCustomer(customer);
            resultsContainer.appendChild(div);
        }
    });
    
    resultsContainer.style.display = mockResults.length > 0 ? 'block' : 'none';
}

// Select customer from search
function selectCustomer(customer) {
    document.getElementById('customerResults').style.display = 'none';
    document.getElementById('searchCustomer').value = customer.name;
    
    // Show customer details
    const detailsContainer = document.getElementById('customerDetails');
    detailsContainer.innerHTML = `
        <div class="customer-details-card">
            <h4>Selected Customer</h4>
            <p><strong>Name:</strong> ${customer.name}</p>
            <p><strong>Phone:</strong> ${customer.phone}</p>
            <p><strong>Email:</strong> ${customer.email}</p>
        </div>
    `;
    detailsContainer.style.display = 'block';
    
    // Load customer's vehicles
    loadCustomerVehicles(customer.id);
}

// Load customer vehicles
function loadCustomerVehicles(customerId) {
    // In real app, fetch from API
    const mockVehicles = [
        { id: 1, plate: '3ABC123', model: 'Toyota Corolla 2020', type: 'Sedan' },
        { id: 2, plate: '4XYZ789', model: 'Honda CR-V 2019', type: 'SUV' }
    ];
    
    const select = document.getElementById('vehicleSelect');
    select.innerHTML = '<option value="">Select vehicle</option>';
    
    mockVehicles.forEach(vehicle => {
        const option = document.createElement('option');
        option.value = vehicle.id;
        option.textContent = `${vehicle.plate} - ${vehicle.model}`;
        select.appendChild(option);
    });
}

// Add new vehicle
function addNewVehicle() {
    const form = document.getElementById('newVehicleForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
    
    if (form.style.display === 'block') {
        form.innerHTML = `
            <h4>Add New Vehicle</h4>
            <div class="form-row">
                <div class="form-group">
                    <label>Plate Number *</label>
                    <input type="text" id="newPlate" required>
                </div>
                <div class="form-group">
                    <label>Model *</label>
                    <input type="text" id="newModel" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Vehicle Type *</label>
                    <select id="newType" required>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="truck">Truck</option>
                        <option value="motorcycle">Motorcycle</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input type="text" id="newYear">
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="btn-primary" onclick="saveNewVehicle()">
                    <i class="fas fa-save"></i> Save Vehicle
                </button>
                <button type="button" class="btn-secondary" onclick="addNewVehicle()">
                    Cancel
                </button>
            </div>
        `;
    }
}

// Save new vehicle
function saveNewVehicle() {
    // In real app, save to database
    alert('Vehicle saved! This would save to database in real implementation.');
    document.getElementById('newVehicleForm').style.display = 'none';
}

// Switch service tabs
function switchServiceTab(tab) {
    document.querySelectorAll('.form-tab').forEach(btn => {
        btn.classList.remove('active');
    });
    
    document.querySelectorAll('.service-form').forEach(form => {
        form.classList.remove('active');
    });
    
    if (tab === 'existing') {
        document.querySelector('.form-tab:nth-child(1)').classList.add('active');
        document.getElementById('serviceFormExisting').classList.add('active');
    } else {
        document.querySelector('.form-tab:nth-child(2)').classList.add('active');
        // Here you would show new customer form
        alert('New customer form would appear here');
    }
}

// Assign service to department
function assignService(serviceId) {
    // In real app, load service details
    console.log(`Assigning service ${serviceId}`);
    showSection('assign-department');
}

// Select department for assignment
function selectDepartment(dept) {
    document.querySelectorAll('.dept-option').forEach(option => {
        option.style.borderColor = '#e0e0e0';
        option.style.background = 'white';
    });
    
    const selected = event.currentTarget;
    selected.style.borderColor = '#3498db';
    selected.style.background = '#f0f8ff';
    
    // Store selected department
    window.selectedDepartment = dept;
}

// Confirm assignment
function confirmAssignment() {
    if (!window.selectedDepartment) {
        alert('Please select a department');
        return;
    }
    
    if (confirm(`Assign service to ${window.selectedDepartment} department?`)) {
        // In real app, update database
        alert('Service assigned successfully!');
        showSection('pending-services');
    }
}

// View service details
function viewDetails(serviceId) {
    // In real app, show modal with details
    alert(`Showing details for service ${serviceId}`);
}

// Form submissions
document.getElementById('customerForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    // Save customer to database
    alert('Customer saved successfully!');
    showSection('dashboard');
});

document.getElementById('serviceFormExisting')?.addEventListener('submit', function(e) {
    e.preventDefault();
    // Create service request
    alert('Service request created successfully!');
    showSection('dashboard');
});

// Notification bell
document.querySelector('.btn-notification')?.addEventListener('click', function() {
    alert('Notifications feature would show here');
});

// Responsive menu for mobile
function toggleMobileMenu() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('mobile-open');
}
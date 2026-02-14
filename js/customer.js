// Customer Dashboard Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize
    setActiveMenu();
    loadCustomerData();
    initBookingForm();
});

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

// Load customer data
function loadCustomerData() {
    // In real app, fetch from API
    // For demo, we'll use static data
    console.log('Loading customer data...');
}

// Initialize booking form
function initBookingForm() {
    // Vehicle selection
    document.querySelectorAll('.vehicle-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.vehicle-option').forEach(o => {
                o.classList.remove('active');
            });
            this.classList.add('active');
            
            // Store selected vehicle
            const vehicleName = this.querySelector('h4').textContent;
            document.getElementById('summaryVehicle').textContent = vehicleName;
        });
    });
    
    // Service type selection
    document.querySelectorAll('input[name="serviceType"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const serviceType = this.value === 'regular' 
                ? 'Regular Maintenance' 
                : 'Problem/Repair';
            document.getElementById('summaryService').textContent = serviceType;
        });
    });
}

// Booking form steps
let currentStep = 1;

function nextStep(step) {
    if (validateStep(currentStep)) {
        document.getElementById(`step${currentStep}`).classList.remove('active');
        document.getElementById(`step${step}`).classList.add('active');
        
        // Update step indicator
        document.querySelectorAll('.step').forEach((s, index) => {
            if (index + 1 <= step) {
                s.classList.add('active');
            } else {
                s.classList.remove('active');
            }
        });
        
        currentStep = step;
    }
}

function prevStep(step) {
    document.getElementById(`step${currentStep}`).classList.remove('active');
    document.getElementById(`step${step}`).classList.add('active');
    
    // Update step indicator
    document.querySelectorAll('.step').forEach((s, index) => {
        if (index + 1 <= step) {
            s.classList.add('active');
        } else {
            s.classList.remove('active');
        }
    });
    
    currentStep = step;
}

function validateStep(step) {
    switch(step) {
        case 1:
            const selectedVehicle = document.querySelector('.vehicle-option.active');
            if (!selectedVehicle) {
                alert('Please select a vehicle');
                return false;
            }
            return true;
        case 2:
            const serviceType = document.querySelector('input[name="serviceType"]:checked');
            if (!serviceType) {
                alert('Please select service type');
                return false;
            }
            return true;
        case 3:
            const dateSelected = true; // In real app, check date selection
            const timeSelected = document.querySelector('input[name="timeSlot"]:checked');
            if (!dateSelected || !timeSelected) {
                alert('Please select date and time');
                return false;
            }
            return true;
        default:
            return true;
    }
}

// Select vehicle
function selectVehicle(vehicleId) {
    // In real app, load vehicle details
    console.log(`Selected vehicle ${vehicleId}`);
}

// Add new vehicle
function addVehicle() {
    // In real app, show vehicle form modal
    alert('Add new vehicle form would appear here');
}

// Track service
function trackService(serviceId) {
    // In real app, load service tracking details
    console.log(`Tracking service ${serviceId}`);
    showSection('service-status');
}

// Edit appointment
function editAppointment(appointmentId) {
    // In real app, load appointment for editing
    alert(`Edit appointment ${appointmentId}`);
}

// Cancel appointment
function cancelAppointment(appointmentId) {
    if (confirm('Are you sure you want to cancel this appointment?')) {
        // In real app, cancel appointment
        alert(`Appointment ${appointmentId} cancelled`);
    }
}

// Contact garage
function contactGarage() {
    alert('Calling garage support... (This would initiate a phone call)');
}

// Request update
function requestUpdate() {
    alert('Update request sent to garage!');
}

// Form submissions
document.getElementById('bookingForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // In real app, submit to server
    alert('Appointment booked successfully! You will receive a confirmation email.');
    showSection('my-appointments');
});

// Dropdown functionality
document.querySelector('.dropdown-btn').addEventListener('click', function() {
    const dropdown = this.parentElement.querySelector('.dropdown-content');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

// Close dropdown when clicking outside
window.addEventListener('click', function(e) {
    if (!e.target.matches('.dropdown-btn')) {
        document.querySelectorAll('.dropdown-content').forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    }
});

// Notification bell
document.querySelector('.notification-bell').addEventListener('click', function() {
    alert('Notifications feature would show here');
});
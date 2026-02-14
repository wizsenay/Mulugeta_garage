// Department Dashboard Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize
    updateDateTime();
    setInterval(updateDateTime, 60000);
    
    setActiveMenu();
    loadDepartmentData();
    setDepartmentTheme();
    
    // Set clock in/out status
    updateClockStatus();
});

// Update date and time
function updateDateTime() {
    const now = new Date();
    const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    };
    const dateString = now.toLocaleDateString('en-US', options);
    const timeString = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    });
    
    document.getElementById('dashboardTime').textContent = 
        `${dateString} | ${timeString}`;
}

// Set active menu
function setActiveMenu() {
    const menuItems = document.querySelectorAll('.menu-item');
    const sections = document.querySelectorAll('.content-section');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class
            menuItems.forEach(i => i.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));
            
            // Add active to clicked
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
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });
    
    const targetSection = document.getElementById(sectionId);
    if (targetSection) {
        targetSection.classList.add('active');
    }
    
    const menuItem = document.querySelector(`.menu-item[href="#${sectionId}"]`);
    if (menuItem) {
        menuItem.classList.add('active');
    }
}

// Set department theme based on data attribute
function setDepartmentTheme() {
    const department = document.body.getAttribute('data-department');
    const deptName = document.getElementById('deptName');
    const deptDescription = document.getElementById('deptDescription');
    const deptIcon = document.getElementById('deptIcon');
    
    const departments = {
        diagnosis: {
            name: "Diagnosis Department",
            description: "Problem identification and initial inspection",
            icon: "fas fa-search"
        },
        mechanical: {
            name: "Mechanical Department",
            description: "Engine, transmission, brakes, suspension systems",
            icon: "fas fa-cogs"
        },
        electrical: {
            name: "Electrical Department",
            description: "Battery, wiring, lights, electronic systems",
            icon: "fas fa-bolt"
        },
        body: {
            name: "Body Repair Department",
            description: "Dent removal, painting, structural work",
            icon: "fas fa-car-crash"
        }
    };
    
    if (departments[department]) {
        deptName.textContent = departments[department].name;
        deptDescription.textContent = departments[department].description;
        deptIcon.innerHTML = `<i class="${departments[department].icon}"></i>`;
    }
}

// Load department data
function loadDepartmentData() {
    // In real app, fetch from API
    const department = document.body.getAttribute('data-department');
    
    // Mock data
    const stats = {
        diagnosis: { assigned: 8, inProgress: 3, completed: 2, avgHours: 1.5 },
        mechanical: { assigned: 12, inProgress: 5, completed: 3, avgHours: 2.5 },
        electrical: { assigned: 6, inProgress: 2, completed: 1, avgHours: 1.8 },
        body: { assigned: 4, inProgress: 1, completed: 0, avgHours: 4.0 }
    };
    
    if (stats[department]) {
        document.getElementById('totalAssigned').textContent = stats[department].assigned;
        document.getElementById('inProgress').textContent = stats[department].inProgress;
        document.getElementById('completedToday').textContent = stats[department].completed;
        document.getElementById('avgCompletion').textContent = stats[department].avgHours;
        
        document.getElementById('assignedCount').textContent = stats[department].assigned;
        document.getElementById('activeCount').textContent = stats[department].inProgress;
    }
}

// Clock in/out functionality
let isClockedIn = false;
let clockInTime = null;

function clockInOut() {
    const btn = document.getElementById('clockInBtn');
    const status = document.querySelector('#clockStatus span');
    
    if (!isClockedIn) {
        isClockedIn = true;
        clockInTime = new Date();
        
        btn.innerHTML = '<i class="fas fa-clock"></i><span>Clock Out</span>';
        btn.style.background = 'linear-gradient(135deg, #27ae60, #219653)';
        status.textContent = 'Clocked In';
        status.className = 'status-on';
        
        showNotification('Clocked in successfully', 'success');
    } else {
        isClockedIn = false;
        const hoursWorked = ((new Date() - clockInTime) / (1000 * 60 * 60)).toFixed(1);
        
        btn.innerHTML = '<i class="fas fa-clock"></i><span>Clock In</span>';
        btn.style.background = 'rgba(255, 255, 255, 0.1)';
        status.textContent = 'Not Clocked In';
        status.className = 'status-off';
        
        showNotification(`Clocked out. Worked: ${hoursWorked} hours`, 'info');
    }
}

function updateClockStatus() {
    // In real app, check from database
    // For demo, default to not clocked in
}

// Start service
function startService(serviceId) {
    if (!isClockedIn) {
        alert('Please clock in first before starting work.');
        return;
    }
    
    // In real app, update service status in database
    showNotification(`Started working on service #${serviceId}`, 'info');
    
    // Update UI
    const serviceCard = document.querySelector(`[onclick="startService(${serviceId})"]`).closest('.service-assigned-card');
    const startBtn = serviceCard.querySelector('.btn-start');
    
    startBtn.innerHTML = '<i class="fas fa-pause"></i> Pause';
    startBtn.onclick = function() { pauseService(serviceId); };
    startBtn.className = 'btn-pause';
    startBtn.style.background = '#f39c12';
    
    // Add to current work
    addToCurrentWork(serviceId);
}

function pauseService(serviceId) {
    // Update service status
    showNotification(`Paused service #${serviceId}`, 'warning');
}

function addToCurrentWork(serviceId) {
    // In real app, fetch service details and add to current work section
}

// Update work progress
function updateWork(serviceId) {
    showSection('update-status');
    loadServiceDetails(serviceId);
}

function loadServiceDetails(serviceId) {
    // In real app, fetch service details from API
    const form = document.getElementById('serviceUpdateForm');
    form.style.display = 'block';
    
    // Populate form with service details
    document.getElementById('selectService').value = serviceId;
    
    // Show notification
    showNotification(`Loaded service #${serviceId} details`, 'info');
}

function saveServiceUpdate() {
    const serviceId = document.getElementById('selectService').value;
    const workDone = document.getElementById('workDone').value;
    const status = document.getElementById('statusUpdate').value;
    
    if (!workDone.trim()) {
        alert('Please describe the work done.');
        return;
    }
    
    // In real app, save to database
    showNotification(`Service #${serviceId} updated successfully`, 'success');
    showSection('dashboard');
}

// Complete work
function completeWork(serviceId) {
    if (confirm('Mark this service as completed?')) {
        // In real app, update database
        showNotification(`Service #${serviceId} marked as completed`, 'success');
        
        // Remove from current work
        const workCard = document.querySelector(`[onclick="completeWork(${serviceId})"]`).closest('.work-card');
        if (workCard) {
            workCard.remove();
        }
    }
}

// Request parts
function requestParts() {
    showSection('parts-request');
}

function searchParts(query) {
    if (query.length < 2) {
        document.getElementById('partsResults').innerHTML = '';
        return;
    }
    
    // Mock search results
    const mockParts = [
        { id: 1, name: 'Brake Pads Set', code: 'BP-001', stock: 15 },
        { id: 2, name: 'Engine Oil 5W-30', code: 'EO-530', stock: 8 },
        { id: 3, name: 'Air Filter', code: 'AF-001', stock: 2 },
        { id: 4, name: 'Spark Plugs', code: 'SP-004', stock: 12 }
    ];
    
    const results = mockParts.filter(part => 
        part.name.toLowerCase().includes(query.toLowerCase()) ||
        part.code.toLowerCase().includes(query.toLowerCase())
    );
    
    const resultsContainer = document.getElementById('partsResults');
    resultsContainer.innerHTML = '';
    
    results.forEach(part => {
        const div = document.createElement('div');
        div.className = 'part-result-item';
        div.innerHTML = `
            <div>
                <strong>${part.name}</strong>
                <small>${part.code}</small>
            </div>
            <div>
                <span class="stock-badge ${part.stock > 5 ? 'high' : part.stock > 0 ? 'medium' : 'low'}">
                    Stock: ${part.stock}
                </span>
                <button class="btn-add-to-request" onclick="addPartToRequest(${part.id})">
                    <i class="fas fa-plus"></i> Add
                </button>
            </div>
        `;
        resultsContainer.appendChild(div);
    });
}

function addPartToRequest(partId) {
    // In real app, add to requested parts list
    const partsList = document.getElementById('requestedPartsList');
    
    // Mock part data
    const part = {
        id: partId,
        name: 'Brake Pads Set',
        quantity: 1
    };
    
    const partItem = document.createElement('div');
    partItem.className = 'requested-part-item';
    partItem.innerHTML = `
        <div class="part-info">
            <h4>${part.name}</h4>
            <div class="quantity-control">
                <button onclick="updateQuantity(${partId}, -1)">-</button>
                <span>${part.quantity}</span>
                <button onclick="updateQuantity(${partId}, 1)">+</button>
            </div>
        </div>
        <button class="btn-remove-part" onclick="removePart(${partId})">
            <i class="fas fa-trash"></i>
        </button>
    `;
    
    partsList.appendChild(partItem);
    showNotification('Part added to request', 'success');
}

function submitPartsRequest() {
    const serviceId = document.getElementById('requestService').value;
    
    if (!serviceId) {
        alert('Please select a service for this parts request.');
        return;
    }
    
    // In real app, submit to database
    showNotification('Parts request submitted to inventory', 'success');
    showSection('dashboard');
}

// View service details
function viewServiceDetails(serviceId) {
    // In real app, fetch details and show modal
    const modal = document.getElementById('serviceModal');
    modal.style.display = 'flex';
    
    // Load details into modal
    document.querySelector('.modal-header h2').textContent = 
        `Service Details - #${serviceId}`;
    
    showNotification(`Loading details for service #${serviceId}`, 'info');
}

function closeModal() {
    document.getElementById('serviceModal').style.display = 'none';
}

// Transfer service
function transferService(serviceId) {
    const departments = [
        { id: 'diagnosis', name: 'Diagnosis Department' },
        { id: 'mechanical', name: 'Mechanical Department' },
        { id: 'electrical', name: 'Electrical Department' },
        { id: 'body', name: 'Body Repair Department' }
    ];
    
    const currentDept = document.body.getAttribute('data-department');
    const otherDepts = departments.filter(dept => dept.id !== currentDept);
    
    let options = otherDepts.map(dept => 
        `<option value="${dept.id}">${dept.name}</option>`
    ).join('');
    
    const transferTo = prompt(`Transfer service #${serviceId} to which department?\n` + 
        `<select id="transferDept">${options}</select>`);
    
    if (transferTo) {
        // In real app, update database
        showNotification(`Service #${serviceId} transferred`, 'info');
    }
}

// Request help
function requestHelp(serviceId) {
    const reason = prompt('What help do you need with service #' + serviceId + '?');
    if (reason) {
        // In real app, send notification to supervisor
        showNotification('Help request sent to supervisor', 'info');
    }
}

// Call reception
function callReception() {
    alert('Calling reception... (This would initiate a phone call)');
}

// Escalate problem
function escalateProblem() {
    const problem = prompt('Describe the problem that needs escalation:');
    if (problem) {
        // In real app, escalate to management
        showNotification('Problem escalated to management', 'warning');
    }
}

// Toggle notifications
function toggleNotifications() {
    const panel = document.getElementById('notificationPanel');
    panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
}

// Show notification
function showNotification(message, type = 'info') {
    // Create notification
    const notification = document.createElement('div');
    notification.className = 'floating-notification';
    notification.innerHTML = `
        <div class="notification-icon ${type}">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 
                              type === 'warning' ? 'exclamation-triangle' : 
                              type === 'error' ? 'times-circle' : 'info-circle'}"></i>
        </div>
        <div class="notification-message">${message}</div>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: white;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        gap: 1rem;
        z-index: 3000;
        animation: slideInRight 0.3s ease;
        min-width: 300px;
    `;
    
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Filter services
function filterServices() {
    const priority = document.getElementById('filterPriority').value;
    const status = document.getElementById('filterStatus').value;
    
    // In real app, fetch filtered services from API
    showNotification(`Filtering: ${priority} priority, ${status} status`, 'info');
}

// Log work hours
function logWorkHours() {
    const hours = prompt('Enter hours worked:');
    if (hours && !isNaN(hours) && hours > 0) {
        // In real app, log to database
        showNotification(`${hours} hours logged`, 'success');
    }
}

// Close notification panel when clicking outside
document.addEventListener('click', function(e) {
    const panel = document.getElementById('notificationPanel');
    const notifBtn = document.querySelector('.notification-btn');
    
    if (panel.style.display === 'block' && 
        !panel.contains(e.target) && 
        !notifBtn.contains(e.target)) {
        panel.style.display = 'none';
    }
});
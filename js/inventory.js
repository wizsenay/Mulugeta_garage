// Inventory Dashboard Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize
    loadDashboardData();
    setActiveMenu();
    loadPartsTable();
    
    // Set up event listeners
    setupEventListeners();
    
    // Update time
    updateTime();
    setInterval(updateTime, 60000);
});

// Load dashboard data
function loadDashboardData() {
    // In real app, fetch from API
    // Mock data for demo
    console.log('Loading inventory dashboard data...');
    
    // Update counts
    updateStats();
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

// Update time
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    });
    
    // Update any time displays
    document.querySelectorAll('.current-time').forEach(el => {
        el.textContent = timeString;
    });
}

// Setup event listeners
function setupEventListeners() {
    // Search functionality
    document.getElementById('searchRestockItem')?.addEventListener('input', function(e) {
        searchRestockItems(e.target.value);
    });
    
    // Filter parts
    document.getElementById('categoryFilter')?.addEventListener('change', filterParts);
    document.getElementById('statusFilter')?.addEventListener('change', filterParts);
}

// Update stats
function updateStats() {
    // In real app, fetch from API
    // Mock updates
    const stats = {
        totalItems: 245,
        stockValue: 24580,
        lowStock: 12,
        pendingRequests: 8
    };
    
    // Update dashboard stats
    document.querySelectorAll('.stat-content h3')[0].textContent = stats.totalItems;
    document.querySelectorAll('.stat-content h3')[1].textContent = `$${stats.stockValue.toLocaleString()}`;
    document.querySelectorAll('.stat-content h3')[2].textContent = stats.lowStock;
    document.querySelectorAll('.stat-content h3')[3].textContent = stats.pendingRequests;
}

// Load parts table
function loadPartsTable() {
    const tableBody = document.getElementById('partsTableBody');
    if (!tableBody) return;
    
    // Mock data
    const parts = [
        {
            code: 'BP-001',
            name: 'Brake Pads Set',
            category: 'Brake System',
            stock: 2,
            minStock: 10,
            price: 45.99,
            status: 'critical'
        },
        {
            code: 'EO-530',
            name: 'Engine Oil 5W-30',
            category: 'Fluids',
            stock: 8,
            minStock: 15,
            price: 8.99,
            status: 'low'
        },
        {
            code: 'AF-001',
            name: 'Air Filter',
            category: 'Filters',
            stock: 3,
            minStock: 20,
            price: 12.50,
            status: 'low'
        },
        {
            code: 'SP-004',
            name: 'Spark Plugs',
            category: 'Engine',
            stock: 25,
            minStock: 30,
            price: 6.75,
            status: 'in_stock'
        }
    ];
    
    tableBody.innerHTML = '';
    
    parts.forEach(part => {
        const row = document.createElement('tr');
        let statusClass = '';
        let statusText = '';
        
        switch(part.status) {
            case 'critical':
                statusClass = 'critical';
                statusText = 'Critical';
                break;
            case 'low':
                statusClass = 'low';
                statusText = 'Low Stock';
                break;
            default:
                statusClass = 'in-stock';
                statusText = 'In Stock';
        }
        
        row.innerHTML = `
            <td><strong>${part.code}</strong></td>
            <td>${part.name}</td>
            <td><span class="category-badge">${part.category}</span></td>
            <td>${part.stock} units</td>
            <td>${part.minStock} units</td>
            <td>$${part.price.toFixed(2)}</td>
            <td><span class="status-badge ${statusClass}">${statusText}</span></td>
            <td>
                <button class="btn-action" onclick="editPart('${part.code}')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn-action" onclick="deletePart('${part.code}')">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        
        tableBody.appendChild(row);
    });
}

// Search parts
function searchParts(query) {
    if (query.length < 2) {
        // Reset to show all
        filterParts();
        return;
    }
    
    const rows = document.querySelectorAll('#partsTableBody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(query.toLowerCase())) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Filter parts
function filterParts() {
    const category = document.getElementById('categoryFilter')?.value || 'all';
    const status = document.getElementById('statusFilter')?.value || 'all';
    
    const rows = document.querySelectorAll('#partsTableBody tr');
    rows.forEach(row => {
        const rowCategory = row.querySelector('.category-badge')?.textContent.toLowerCase() || '';
        const rowStatus = row.querySelector('.status-badge')?.className || '';
        
        let show = true;
        
        if (category !== 'all' && !rowCategory.includes(category)) {
            show = false;
        }
        
        if (status !== 'all') {
            if (status === 'in_stock' && !rowStatus.includes('in-stock')) {
                show = false;
            } else if (status === 'low_stock' && !rowStatus.includes('low')) {
                show = false;
            } else if (status === 'out_of_stock' && !rowStatus.includes('critical')) {
                show = false;
            }
        }
        
        row.style.display = show ? '' : 'none';
    });
}

// Show add part form
function showAddPartForm() {
    document.getElementById('addPartForm').style.display = 'flex';
}

// Hide add part form
function hideAddPartForm() {
    document.getElementById('addPartForm').style.display = 'none';
    document.getElementById('newPartForm').reset();
}

// Save new part
function saveNewPart(event) {
    event.preventDefault();
    
    const partData = {
        code: document.getElementById('partCode').value,
        name: document.getElementById('partName').value,
        category: document.getElementById('partCategory').value,
        stock: parseInt(document.getElementById('initialStock').value),
        minStock: parseInt(document.getElementById('minStock').value),
        price: parseFloat(document.getElementById('unitPrice').value),
        unit: document.getElementById('partUnit').value,
        description: document.getElementById('partDescription').value,
        supplier: document.getElementById('supplier').value
    };
    
    // In real app, send to API
    console.log('Saving new part:', partData);
    
    showNotification('Part added successfully!', 'success');
    hideAddPartForm();
    loadPartsTable();
    updateStats();
}

// Edit part
function editPart(partCode) {
    // In real app, load part data and show edit form
    alert(`Edit part: ${partCode} (This would load the edit form)`);
}

// Delete part
function deletePart(partCode) {
    if (confirm(`Are you sure you want to delete part ${partCode}?`)) {
        // In real app, delete from database
        showNotification(`Part ${partCode} deleted`, 'success');
        loadPartsTable();
    }
}

// Show restock form
function showRestockForm() {
    const form = document.getElementById('restockForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}

// Hide restock form
function hideRestockForm() {
    document.getElementById('restockForm').style.display = 'none';
    document.getElementById('restockFormElement').reset();
    document.getElementById('restockItemsList').innerHTML = '';
}

// Search restock items
function searchRestockItems(query) {
    const resultsContainer = document.getElementById('restockResults');
    
    if (query.length < 2) {
        resultsContainer.innerHTML = '';
        resultsContainer.style.display = 'none';
        return;
    }
    
    // Mock search results
    const mockItems = [
        { id: 1, name: 'Brake Pads Set', code: 'BP-001', currentStock: 2 },
        { id: 2, name: 'Engine Oil 5W-30', code: 'EO-530', currentStock: 8 },
        { id: 3, name: 'Air Filter', code: 'AF-001', currentStock: 3 },
        { id: 4, name: 'Spark Plugs', code: 'SP-004', currentStock: 25 }
    ];
    
    const results = mockItems.filter(item => 
        item.name.toLowerCase().includes(query.toLowerCase()) ||
        item.code.toLowerCase().includes(query.toLowerCase())
    );
    
    resultsContainer.innerHTML = '';
    
    results.forEach(item => {
        const div = document.createElement('div');
        div.className = 'search-result-item';
        div.innerHTML = `
            <div>
                <strong>${item.name}</strong>
                <small>${item.code} | Stock: ${item.currentStock}</small>
            </div>
            <button onclick="addToRestockList(${item.id})">
                <i class="fas fa-plus"></i> Add
            </button>
        `;
        resultsContainer.appendChild(div);
    });
    
    resultsContainer.style.display = results.length > 0 ? 'block' : 'none';
}

// Add to restock list
function addToRestockList(itemId) {
    const listContainer = document.getElementById('restockItemsList');
    
    // Mock item data
    const item = {
        id: itemId,
        name: 'Brake Pads Set',
        code: 'BP-001',
        currentStock: 2,
        quantity: 10
    };
    
    const itemDiv = document.createElement('div');
    itemDiv.className = 'restock-item';
    itemDiv.innerHTML = `
        <div class="item-info">
            <h4>${item.name}</h4>
            <p>${item.code} | Current: ${item.currentStock}</p>
        </div>
        <div class="quantity-control">
            <input type="number" value="${item.quantity}" min="1" max="1000" 
                   onchange="updateRestockQuantity(${item.id}, this.value)">
            <button onclick="removeFromRestockList(${item.id})">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    listContainer.appendChild(itemDiv);
    document.getElementById('restockResults').style.display = 'none';
    document.getElementById('searchRestockItem').value = '';
}

// Process restock
function processRestock(event) {
    event.preventDefault();
    
    const supplier = document.getElementById('restockSupplier').value;
    const deliveryDate = document.getElementById('deliveryDate').value;
    const notes = document.getElementById('restockNotes').value;
    
    // In real app, process restock
    showNotification('Restock order processed successfully!', 'success');
    hideRestockForm();
    updateStats();
}

// Show adjustment form
function showAdjustmentForm() {
    alert('Stock adjustment form would appear here');
}

// Show transfer form
function showTransferForm() {
    alert('Stock transfer form would appear here');
}

// Generate report
function generateReport() {
    alert('Generating inventory report... (This would create a PDF/Excel file)');
}

// Reorder item
function reorderItem(itemId) {
    // In real app, create purchase order
    showNotification('Reorder request created for supplier', 'success');
}

// Approve request
function approveRequest(requestId) {
    if (confirm(`Approve request ${requestId}?`)) {
        // In real app, update request status and issue parts
        showNotification(`Request ${requestId} approved`, 'success');
        updateStats();
    }
}

// Reject request
function rejectRequest(requestId) {
    const reason = prompt(`Reason for rejecting request ${requestId}:`);
    if (reason) {
        // In real app, update request status
        showNotification(`Request ${requestId} rejected`, 'warning');
    }
}

// View request details
function viewRequestDetails(requestId) {
    alert(`Viewing details for request ${requestId}`);
}

// Search issue parts
function searchIssueParts(query) {
    const resultsContainer = document.getElementById('issueResults');
    
    if (query.length < 2) {
        resultsContainer.innerHTML = '';
        resultsContainer.style.display = 'none';
        return;
    }
    
    // Similar to searchRestockItems
    showNotification(`Searching for: ${query}`, 'info');
}

// Process issue
function processIssue() {
    const department = document.getElementById('issueDepartment').value;
    const service = document.getElementById('issueService').value;
    const notes = document.getElementById('issueNotes').value;
    
    if (!department) {
        alert('Please select a department');
        return;
    }
    
    // In real app, process issue
    showNotification('Parts issued successfully', 'success');
}

// Toggle notifications
function toggleNotifications() {
    const panel = document.getElementById('notificationsPanel');
    panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
}

// Show notification
function showNotification(message, type = 'info') {
    // Create notification element
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
    
    // Add icon color
    const icon = notification.querySelector('.notification-icon');
    switch(type) {
        case 'success':
            icon.style.background = '#d4edda';
            icon.style.color = '#155724';
            break;
        case 'warning':
            icon.style.background = '#fff3cd';
            icon.style.color = '#856404';
            break;
        case 'error':
            icon.style.background = '#f8d7da';
            icon.style.color = '#721c24';
            break;
        default:
            icon.style.background = '#d1ecf1';
            icon.style.color = '#0c5460';
    }
    
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Logout
function logout() {
    if (confirm('Are you sure you want to logout?')) {
        // In real app, redirect to logout page
        window.location.href = 'logout.php';
    }
}

// Initialize on load
window.onload = function() {
    // Add CSS for notifications
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideOutRight {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100px); }
        }
        .category-badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            background: #e9ecef;
            border-radius: 12px;
            font-size: 0.8rem;
            color: #555;
        }
        .btn-action {
            background: none;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 0.3rem 0.6rem;
            cursor: pointer;
            margin: 0 0.2rem;
        }
        .btn-action:hover {
            background: #f8f9fa;
        }
    `;
    document.head.appendChild(style);
};
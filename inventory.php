<!-- inventory_dashboard.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard - Mulugeta Garage</title>
    <link rel="stylesheet" href="style/inventory.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Top Navigation -->
    <header class="inventory-header">
        <div class="header-container">
            <div class="header-left">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <div class="logo-text">
                        <h1>Inventory Management</h1>
                        <p>Mulugeta Garage</p>
                    </div>
                </div>
            </div>
            
            <div class="header-center">
                <div class="current-stats">
                    <div class="stat-item">
                        <i class="fas fa-boxes"></i>
                        <div>
                            <h3>245</h3>
                            <p>Total Items</p>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div>
                            <h3>12</h3>
                            <p>Low Stock</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="header-right">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="user-details">
                        <h4>Inventory Manager</h4>
                        <p>Stock Control Department</p>
                    </div>
                    <div class="user-actions">
                        <button class="notifications-btn" onclick="toggleNotifications()">
                            <i class="fas fa-bell"></i>
                            <span class="badge">5</span>
                        </button>
                        <button class="logout-btn" onclick="logout()">
                            <a href="index.php"><i class="fas fa-sign-out-alt"></i></a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Layout -->
    <div class="inventory-container">
        <!-- Sidebar -->
        <nav class="inventory-sidebar">
            <ul class="sidebar-menu">
                <li class="menu-section">Dashboard</li>
                <li>
                    <a href="#dashboard" class="menu-item active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="menu-section">Inventory Management</li>
                <li>
                    <a href="#parts" class="menu-item">
                        <i class="fas fa-box-open"></i>
                        <span>Parts Management</span>
                    </a>
                </li>
                <li>
                    <a href="#stock" class="menu-item">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Stock Management</span>
                        <span class="menu-badge">3</span>
                    </a>
                </li>
                <li>
                    <a href="#categories" class="menu-item">
                        <i class="fas fa-tags"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="#suppliers" class="menu-item">
                        <i class="fas fa-truck"></i>
                        <span>Suppliers</span>
                    </a>
                </li>
                
                <li class="menu-section">Requests & Issues</li>
                <li>
                    <a href="#requests" class="menu-item">
                        <i class="fas fa-hand-paper"></i>
                        <span>Pending Requests</span>
                        <span class="menu-badge urgent">8</span>
                    </a>
                </li>
                <li>
                    <a href="#issues" class="menu-item">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Issue Parts</span>
                    </a>
                </li>
                <li>
                    <a href="#history" class="menu-item">
                        <i class="fas fa-history"></i>
                        <span>Request History</span>
                    </a>
                </li>
                
                <li class="menu-section">Reports & Alerts</li>
                <li>
                    <a href="#reports" class="menu-item">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="#alerts" class="menu-item">
                        <i class="fas fa-bell"></i>
                        <span>Alerts</span>
                        <span class="menu-badge warning">12</span>
                    </a>
                </li>
                
                <li class="menu-section">Settings</li>
                <li>
                    <a href="#settings" class="menu-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
            
            <div class="sidebar-footer">
                <div class="inventory-status">
                    <h4>Inventory Status</h4>
                    <div class="status-item">
                        <span class="status-dot healthy"></span>
                        <span>Overall: Healthy</span>
                    </div>
                    <div class="status-item">
                        <span class="status-dot warning"></span>
                        <span>Low Stock: 12 items</span>
                    </div>
                    <div class="status-item">
                        <span class="status-dot danger"></span>
                        <span>Out of Stock: 3 items</span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="inventory-main">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section active">
                <div class="dashboard-header">
                    <h1>Inventory Dashboard</h1>
                    <div class="header-actions">
                        <button class="btn-primary" onclick="showSection('parts')">
                            <i class="fas fa-plus-circle"></i> Add New Part
                        </button>
                        <button class="btn-secondary" onclick="showSection('requests')">
                            <i class="fas fa-hand-paper"></i> View Requests
                        </button>
                    </div>
                </div>
                
                <!-- Quick Stats -->
                <div class="quick-stats">
                    <div class="stat-card">
                        <div class="stat-icon total-items">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="stat-content">
                            <h3>245</h3>
                            <p>Total Items</p>
                            <span class="stat-change up">+12 this month</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon stock-value">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-content">
                            <h3>$24,580</h3>
                            <p>Total Stock Value</p>
                            <span class="stat-change up">+$1,200</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon low-stock">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="stat-content">
                            <h3>12</h3>
                            <p>Low Stock Items</p>
                            <span class="stat-change down">-3</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon pending-requests">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-content">
                            <h3>8</h3>
                            <p>Pending Requests</p>
                            <span class="stat-change up">+2</span>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <h2>Quick Actions</h2>
                    <div class="actions-grid">
                        <button class="action-btn" onclick="showSection('parts')">
                            <i class="fas fa-box-open"></i>
                            <span>Add New Part</span>
                        </button>
                        
                        <button class="action-btn" onclick="showSection('stock')">
                            <i class="fas fa-arrow-down"></i>
                            <span>Restock Items</span>
                        </button>
                        
                        <button class="action-btn" onclick="showSection('issues')">
                            <i class="fas fa-arrow-up"></i>
                            <span>Issue Parts</span>
                        </button>
                        
                        <button class="action-btn" onclick="showSection('requests')">
                            <i class="fas fa-hand-paper"></i>
                            <span>Process Requests</span>
                        </button>
                        
                        <button class="action-btn" onclick="generateReport()">
                            <i class="fas fa-file-export"></i>
                            <span>Generate Report</span>
                        </button>
                        
                        <button class="action-btn" onclick="showSection('alerts')">
                            <i class="fas fa-bell"></i>
                            <span>View Alerts</span>
                        </button>
                    </div>
                </div>
                
                <!-- Low Stock Alerts -->
                <div class="alerts-section">
                    <div class="section-header">
                        <h2>Low Stock Alerts</h2>
                        <a href="#alerts" class="view-all">View All</a>
                    </div>
                    
                    <div class="alerts-list">
                        <div class="alert-item critical">
                            <div class="alert-icon">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="alert-content">
                                <h4>Brake Pads (Standard)</h4>
                                <p>Stock: 2 | Min: 10</p>
                                <small>Last ordered: 15 days ago</small>
                            </div>
                            <button class="btn-reorder" onclick="reorderItem(101)">
                                <i class="fas fa-shopping-cart"></i> Reorder
                            </button>
                        </div>
                        
                        <div class="alert-item warning">
                            <div class="alert-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-content">
                                <h4>Engine Oil 5W-30</h4>
                                <p>Stock: 8 | Min: 15</p>
                                <small>Last ordered: 7 days ago</small>
                            </div>
                            <button class="btn-reorder" onclick="reorderItem(102)">
                                <i class="fas fa-shopping-cart"></i> Reorder
                            </button>
                        </div>
                        
                        <div class="alert-item warning">
                            <div class="alert-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-content">
                                <h4>Air Filter</h4>
                                <p>Stock: 3 | Min: 20</p>
                                <small>Last ordered: 10 days ago</small>
                            </div>
                            <button class="btn-reorder" onclick="reorderItem(103)">
                                <i class="fas fa-shopping-cart"></i> Reorder
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activities -->
                <div class="recent-activities">
                    <div class="section-header">
                        <h2>Recent Activities</h2>
                        <a href="#history" class="view-all">View All</a>
                    </div>
                    
                    <div class="activities-list">
                        <div class="activity-item">
                            <div class="activity-icon issue">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="activity-details">
                                <p><strong>Parts Issued</strong> - 2 Brake Pads to Mechanical Dept</p>
                                <span class="activity-time">10 minutes ago</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon request">
                                <i class="fas fa-hand-paper"></i>
                            </div>
                            <div class="activity-details">
                                <p><strong>Request Approved</strong> - Spark Plugs for Electrical Dept</p>
                                <span class="activity-time">30 minutes ago</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon restock">
                                <i class="fas fa-arrow-down"></i>
                            </div>
                            <div class="activity-details">
                                <p><strong>Stock Added</strong> - 50 units of Engine Oil</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon new">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="activity-details">
                                <p><strong>New Part Added</strong> - Car Battery 12V</p>
                                <span class="activity-time">5 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Top Items -->
                <div class="top-items">
                    <div class="section-header">
                        <h2>Most Used Items This Month</h2>
                    </div>
                    
                    <div class="items-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Quantity Used</th>
                                    <th>Stock Left</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="item-info">
                                            <div class="item-icon">
                                                <i class="fas fa-oil-can"></i>
                                            </div>
                                            <div>
                                                <strong>Engine Oil 5W-30</strong>
                                                <small>Code: EO-530</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Fluids</td>
                                    <td>42 units</td>
                                    <td>8 units</td>
                                    <td><span class="status-badge low">Low Stock</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="item-info">
                                            <div class="item-icon">
                                                <i class="fas fa-tools"></i>
                                            </div>
                                            <div>
                                                <strong>Brake Pads</strong>
                                                <small>Code: BP-001</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Brake System</td>
                                    <td>28 units</td>
                                    <td>2 units</td>
                                    <td><span class="status-badge critical">Critical</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="item-info">
                                            <div class="item-icon">
                                                <i class="fas fa-filter"></i>
                                            </div>
                                            <div>
                                                <strong>Air Filter</strong>
                                                <small>Code: AF-001</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Filters</td>
                                    <td>25 units</td>
                                    <td>3 units</td>
                                    <td><span class="status-badge low">Low Stock</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Parts Management Section -->
            <section id="parts" class="content-section">
                <div class="section-header">
                    <h1>Parts Management</h1>
                    <div class="header-actions">
                        <button class="btn-primary" onclick="showAddPartForm()">
                            <i class="fas fa-plus-circle"></i> Add New Part
                        </button>
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Search parts..." onkeyup="searchParts(this.value)">
                        </div>
                    </div>
                </div>
                
                <!-- Parts Table -->
                <div class="parts-table-container">
                    <div class="table-filters">
                        <select id="categoryFilter" onchange="filterParts()">
                            <option value="all">All Categories</option>
                            <option value="engine">Engine Parts</option>
                            <option value="brake">Brake System</option>
                            <option value="electrical">Electrical</option>
                            <option value="fluids">Fluids</option>
                            <option value="tools">Tools</option>
                        </select>
                        
                        <select id="statusFilter" onchange="filterParts()">
                            <option value="all">All Status</option>
                            <option value="in_stock">In Stock</option>
                            <option value="low_stock">Low Stock</option>
                            <option value="out_of_stock">Out of Stock</option>
                        </select>
                    </div>
                    
                    <div class="table-wrapper">
                        <table class="parts-table">
                            <thead>
                                <tr>
                                    <th>Part Code</th>
                                    <th>Part Name</th>
                                    <th>Category</th>
                                    <th>Current Stock</th>
                                    <th>Min Stock</th>
                                    <th>Unit Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="partsTableBody">
                                <!-- Parts will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Add Part Form (Hidden by default) -->
                <div class="form-modal" id="addPartForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add New Part</h3>
                            <button class="close-modal" onclick="hideAddPartForm()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="newPartForm" onsubmit="saveNewPart(event)">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="partCode">Part Code *</label>
                                        <input type="text" id="partCode" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="partName">Part Name *</label>
                                        <input type="text" id="partName" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="partCategory">Category *</label>
                                        <select id="partCategory" required>
                                            <option value="">Select Category</option>
                                            <option value="engine">Engine Parts</option>
                                            <option value="brake">Brake System</option>
                                            <option value="electrical">Electrical</option>
                                            <option value="suspension">Suspension</option>
                                            <option value="fluids">Fluids</option>
                                            <option value="tools">Tools</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="partUnit">Unit</label>
                                        <input type="text" id="partUnit" placeholder="e.g., piece, liter, set">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="initialStock">Initial Stock *</label>
                                        <input type="number" id="initialStock" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="minStock">Minimum Stock *</label>
                                        <input type="number" id="minStock" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="unitPrice">Unit Price (ETB) *</label>
                                        <input type="number" id="unitPrice" step="0.01" min="0" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="partDescription">Description</label>
                                    <textarea id="partDescription" rows="3"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select id="supplier">
                                        <option value="">Select Supplier</option>
                                        <option value="1">Auto Parts Ethiopia</option>
                                        <option value="2">Mekonnen Trading</option>
                                        <option value="3">Garage Supplies Co.</option>
                                    </select>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn-primary">
                                        <i class="fas fa-save"></i> Save Part
                                    </button>
                                    <button type="button" class="btn-secondary" onclick="hideAddPartForm()">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stock Management Section -->
            <section id="stock" class="content-section">
                <div class="section-header">
                    <h1>Stock Management</h1>
                    <div class="header-actions">
                        <button class="btn-primary" onclick="showRestockForm()">
                            <i class="fas fa-arrow-down"></i> Restock Items
                        </button>
                        <button class="btn-secondary" onclick="showAdjustmentForm()">
                            <i class="fas fa-sliders-h"></i> Stock Adjustment
                        </button>
                    </div>
                </div>
                
                <div class="stock-management">
                    <div class="stock-actions">
                        <div class="action-card" onclick="showRestockForm()">
                            <div class="action-icon">
                                <i class="fas fa-arrow-down"></i>
                            </div>
                            <div class="action-content">
                                <h3>Restock Items</h3>
                                <p>Add new stock from suppliers</p>
                            </div>
                        </div>
                        
                        <div class="action-card" onclick="showSection('issues')">
                            <div class="action-icon">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="action-content">
                                <h3>Issue Parts</h3>
                                <p>Issue parts to departments</p>
                            </div>
                        </div>
                        
                        <div class="action-card" onclick="showAdjustmentForm()">
                            <div class="action-icon">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            <div class="action-content">
                                <h3>Stock Adjustment</h3>
                                <p>Adjust stock counts</p>
                            </div>
                        </div>
                        
                        <div class="action-card" onclick="showTransferForm()">
                            <div class="action-icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <div class="action-content">
                                <h3>Transfer Stock</h3>
                                <p>Transfer between locations</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Restock Form -->
                    <div class="form-container" id="restockForm" style="display: none;">
                        <h3>Restock Items</h3>
                        <form id="restockFormElement" onsubmit="processRestock(event)">
                            <div class="form-group">
                                <label for="restockSupplier">Supplier *</label>
                                <select id="restockSupplier" required>
                                    <option value="">Select Supplier</option>
                                    <option value="1">Auto Parts Ethiopia</option>
                                    <option value="2">Mekonnen Trading</option>
                                    <option value="3">Garage Supplies Co.</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="searchRestockItem">Search Item to Restock</label>
                                <input type="text" id="searchRestockItem" 
                                       placeholder="Search by name or code..."
                                       onkeyup="searchRestockItems(this.value)">
                                <div class="search-results" id="restockResults"></div>
                            </div>
                            
                            <div class="restock-items-list" id="restockItemsList">
                                <!-- Items to restock will be added here -->
                            </div>
                            
                            <div class="form-group">
                                <label for="deliveryDate">Delivery Date</label>
                                <input type="date" id="deliveryDate">
                            </div>
                            
                            <div class="form-group">
                                <label for="restockNotes">Notes</label>
                                <textarea id="restockNotes" rows="3"></textarea>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-check"></i> Process Restock
                                </button>
                                <button type="button" class="btn-secondary" onclick="hideRestockForm()">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Recent Stock Transactions -->
                    <div class="recent-transactions">
                        <h3>Recent Stock Transactions</h3>
                        <div class="transactions-list">
                            <div class="transaction-item restock">
                                <div class="transaction-icon">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="transaction-details">
                                    <p><strong>Restocked:</strong> 50 units of Engine Oil</p>
                                    <p><strong>Supplier:</strong> Auto Parts Ethiopia</p>
                                    <span class="transaction-time">2 hours ago</span>
                                </div>
                                <div class="transaction-qty">+50</div>
                            </div>
                            
                            <div class="transaction-item issue">
                                <div class="transaction-icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <div class="transaction-details">
                                    <p><strong>Issued:</strong> 2 Brake Pads to Mechanical</p>
                                    <p><strong>For Service:</strong> #1025</p>
                                    <span class="transaction-time">10 minutes ago</span>
                                </div>
                                <div class="transaction-qty negative">-2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Requests Section -->
            <section id="requests" class="content-section">
                <div class="section-header">
                    <h1>Pending Requests</h1>
                    <p>Requests from departments for parts</p>
                </div>
                
                <div class="requests-container">
                    <div class="requests-list">
                        <div class="request-card">
                            <div class="request-header">
                                <div class="request-info">
                                    <h3>Brake Pads Set</h3>
                                    <p class="request-id">REQ-00125</p>
                                </div>
                                <div class="request-meta">
                                    <span class="dept-badge mechanical">
                                        <i class="fas fa-cogs"></i> Mechanical
                                    </span>
                                    <span class="urgency urgent">Urgent</span>
                                </div>
                            </div>
                            
                            <div class="request-details">
                                <p><strong>Requested by:</strong> Alex Johnson (Technician)</p>
                                <p><strong>For Service:</strong> #1025 - Toyota Corolla</p>
                                <p><strong>Quantity:</strong> 2 sets</p>
                                <p><strong>Requested:</strong> 30 minutes ago</p>
                                <p><strong>Notes:</strong> Brake repair in progress, need immediately</p>
                            </div>
                            
                            <div class="stock-info">
                                <p><strong>Current Stock:</strong> 2 units</p>
                                <p><strong>Minimum Stock:</strong> 10 units</p>
                                <span class="stock-status critical">Critical</span>
                            </div>
                            
                            <div class="request-actions">
                                <button class="btn-approve" onclick="approveRequest('REQ-00125')">
                                    <i class="fas fa-check"></i> Approve
                                </button>
                                <button class="btn-reject" onclick="rejectRequest('REQ-00125')">
                                    <i class="fas fa-times"></i> Reject
                                </button>
                                <button class="btn-view" onclick="viewRequestDetails('REQ-00125')">
                                    <i class="fas fa-eye"></i> View
                                </button>
                            </div>
                        </div>
                        
                        <!-- More request cards -->
                    </div>
                </div>
            </section>

            <!-- Issues Section -->
            <section id="issues" class="content-section">
                <div class="section-header">
                    <h1>Issue Parts</h1>
                    <p>Issue parts to departments for services</p>
                </div>
                
                <div class="issue-container">
                    <div class="issue-form">
                        <div class="form-group">
                            <label for="issueDepartment">Department *</label>
                            <select id="issueDepartment" required>
                                <option value="">Select Department</option>
                                <option value="mechanical">Mechanical</option>
                                <option value="electrical">Electrical</option>
                                <option value="body">Body Repair</option>
                                <option value="diagnosis">Diagnosis</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="issueService">For Service</label>
                            <select id="issueService">
                                <option value="">Select Service (Optional)</option>
                                <option value="1025">#1025 - Toyota Corolla</option>
                                <option value="1026">#1026 - Honda CR-V</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Select Parts to Issue</label>
                            <div class="parts-selection">
                                <div class="search-parts">
                                    <input type="text" placeholder="Search parts..." 
                                           onkeyup="searchIssueParts(this.value)">
                                    <div class="search-results" id="issueResults"></div>
                                </div>
                                
                                <div class="selected-parts" id="selectedParts">
                                    <!-- Selected parts will appear here -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="issueNotes">Notes</label>
                            <textarea id="issueNotes" rows="3"></textarea>
                        </div>
                        
                        <button class="btn-primary" onclick="processIssue()">
                            <i class="fas fa-paper-plane"></i> Issue Parts
                        </button>
                    </div>
                    
                    <div class="recent-issues">
                        <h3>Recently Issued Parts</h3>
                        <div class="issues-list">
                            <!-- Recent issues will be loaded here -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- More sections would be added similarly -->
            
        </main>
    </div>

    <!-- Notifications Panel -->
    <div class="notifications-panel" id="notificationsPanel">
        <div class="panel-header">
            <h3>Notifications</h3>
            <button class="close-panel" onclick="toggleNotifications()">&times;</button>
        </div>
        <div class="panel-content">
            <div class="notification-item">
                <div class="notification-icon critical">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="notification-content">
                    <p>Brake Pads stock is critical (2 left)</p>
                    <small>Just now</small>
                </div>
            </div>
            <div class="notification-item">
                <div class="notification-icon request">
                    <i class="fas fa-hand-paper"></i>
                </div>
                <div class="notification-content">
                    <p>New request from Mechanical Dept</p>
                    <small>30 minutes ago</small>
                </div>
            </div>
        </div>
    </div>

    <script src="js/inventory.js"></script>
</body>
</html>
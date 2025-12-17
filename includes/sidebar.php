<?php
/* Sidebar include extracted from dash.php
   Contains static navigation links mapped to existing pages in the project. */
?>
<!-- Sidebar -->
<div class="sidebar">
    <div class="logo-container">
        <!-- Fixed Brand Header -->
        <div class="brand-header">
            <div class="logo-img-container">
                <img src="assets/images/Nexis logo.png" alt="logo" class="logo-img" 
                     onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUwIiBoZWlnaHQ9IjQwIiB2aWV3Qm94PSIwIDAgMTUwIDQwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxyZWN0IHdpZHRoPSIxNTAiIGhlaWdodD0iNDAiIGZpbGw9IiMxZTNjNzIiLz48dGV4dCB4PSI3NSIgeT0iMjUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNiIgZmlsbD0id2hpdGUiIHRleHQtYW5jaG9yPSJtaWRkbGUiPk5leGlzIFNNUzwvdGV4dD48L3N2Zz4='">
            </div>
            <div class="brand-text">
                <h6>Nexis SMS</h6>
            </div>
        </div>
       
        <!-- User Info -->
        <div class="d-flex align-items-center">
            <div class="user-avatar me-2" id="userAvatar">SA</div>
            <div class="flex-grow-1">
                <div class="d-flex align-items-center">
                    <span id="userName" class="fw-bold">Super Admin</span>
                    <span id="roleBadge" class="role-badge superadmin">SUPER ADMIN</span>
                </div>
                <small id="userEmail" class="text-white-50">admin@nexis.edu</small>
            </div>
        </div>
    </div>
    
    <!-- Static Navigation -->
    <nav class="nav flex-column mt-3" id="sidebarNav">
        <div class="nav-section">Overview</div>
        <a class="nav-link active" href="dash.php">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

        <div class="nav-section">Management</div>
        <a class="nav-link" href="student_management.php">
            <i class="fas fa-user-graduate"></i>
            <span>Student Management</span>
        </a>
        <a class="nav-link" href="staff_management.php">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Teacher Management</span>
        </a>
        <a class="nav-link" href="admin_sidebar.php">
            <i class="fas fa-user-tie"></i>
            <span>Admin Management</span>
        </a>
        <a class="nav-link" href="subject_management.php">
            <i class="fas fa-school"></i>
            <span>School Setup</span>
        </a>

        <div class="nav-section">System</div>
        <a class="nav-link" href="subject_management.php">
            <i class="fas fa-shield-alt"></i>
            <span>Roles & Permissions</span>
        </a>
        <a class="nav-link" href="fees_management.php">
            <i class="fas fa-money-check-alt"></i>
            <span>Payments History</span>
        </a>
        <a class="nav-link" href="index.php">
            <i class="fas fa-cogs"></i>
            <span>System Settings</span>
        </a>
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-bell"></i>
            <span>Notifications</span>
        </a>
    </nav>
    
    <div class="position-absolute bottom-0 start-0 w-100 p-3 border-top border-white-10">
        <button class="btn btn-outline-light w-100" onclick="logout()">
            <i class="fas fa-sign-out-alt me-2"></i> Sign Out
        </button>
    </div>
</div>

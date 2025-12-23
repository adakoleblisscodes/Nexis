<?php
session_start();

// Set default values for demo
if (!isset($_SESSION['user_role'])) {
    $_SESSION['user_role'] = 'superadmin';
    $_SESSION['user_name'] = 'Super Admin';
    $_SESSION['user_id'] = '5A-001';
}

$currentRole = $_SESSION['user_role'];
$userName = $_SESSION['user_name'];
$userId = $_SESSION['user_id'];
?>

<!-- Sidebar -->
<div id="sidebar">
    <div class="sidebar-header">
        <!-- Logo -->
        <img src="assets/images/Nexis logo.png" alt="Nexis Logo" class="logo-img">
        <div>
            <div class="platform-name">Nexis</div>
            <small class="tagline">School Management System</small>
        </div>
    </div>
    
    <nav class="sidebar-nav">
        <ul class="nav flex-column">
            <!-- Navigation Items -->
            <li class="nav-item">
                <a class="nav-link active" href="dashboard.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="student_management.php">
                    <i class="fas fa-user-graduate"></i> Students Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="staff_management.php">
                    <i class="fas fa-chalkboard-teacher"></i> Staff Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="results_management.php">
                    <i class="fas fa-chart-bar"></i> Results Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fees_management.php">
                    <i class="fas fa-chart-line"></i> Fee Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="subject_management.php">
                    <i class="fas fa-book"></i> Subject Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="class_management.php">
                    <i class="fas fa-school"></i> Class Management
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="settings.php">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-id">ID: <?php echo $userId; ?></div>
            <div class="user-role">Super Administrator</div>
        </div>
        <button class="logout-btn" onclick="showLogoutModal()">
            <i class="fas fa-sign-out-alt"></i> Sign Out
        </button>
    </div>
</div>

<!-- Mobile Toggle Button -->
<button id="sidebarToggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<!-- Overlay -->
<div id="sidebarOverlay" onclick="closeSidebar()"></div>
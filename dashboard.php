<?php
// ============================
// SIMPLE PAGE ROUTING
// ============================
$page = $_GET['page'] ?? 'dashboard';

$pageTitles = [
    'dashboard' => 'Dashboard',
    'staff' => 'Staff Management',
    'assign' => 'Teacher Assignment',
    'class' => 'Class Management',
    'students' => 'Student Enrollment',
    'results' => 'Results & Analytics',
    'fees' => 'Fee Management',
    'settings' => 'System Settings',
    'reports' => 'Reports'
];

$title = $pageTitles[$page] ?? 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nexis | <?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>

<!-- ================= SIDEBAR ================= -->
<nav id="sidebar">
    <div class="sidebar-header">
        <div class="logo-circle">N</div>
        <h4 class="platform-name">Nexis</h4>
    </div>

    <div class="sidebar-nav">
        <ul class="list-unstyled">

            <li>
                <a href="#" class="nav-link <?= $page=='dashboard'?'active':'' ?>">
                    <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="?page=staff" class="nav-link <?= $page=='staff'?'active':'' ?>">
                    <i class="fas fa-users"></i><span>Staff Management</span>
                </a>
            </li>

            <li>
                <a href="?page=assign" class="nav-link <?= $page=='assign'?'active':'' ?>">
                    <i class="fas fa-chalkboard-teacher"></i><span>Teacher Assignment</span>
                </a>
            </li>

            <li>
                <a href="?page=class" class="nav-link <?= $page=='class'?'active':'' ?>">
                    <i class="fas fa-school"></i><span>Class Management</span>
                </a>
            </li>

            <li>
                <a href="?page=students" class="nav-link <?= $page=='students'?'active':'' ?>">
                    <i class="fas fa-user-graduate"></i><span>Student Enrollment</span>
                </a>
            </li>

            <li>
                <a href="?page=results" class="nav-link <?= $page=='results'?'active':'' ?>">
                    <i class="fas fa-poll"></i><span>Results & Analytics</span>
                </a>
            </li>

            <li>
                <a href="?page=fees" class="nav-link <?= $page=='fees'?'active':'' ?>">
                    <i class="fas fa-coins"></i><span>Fee Management</span>
                </a>
            </li>

            <li>
                <a href="?page=settings" class="nav-link <?= $page=='settings'?'active':'' ?>">
                    <i class="fas fa-cog"></i><span>System Settings</span>
                </a>
            </li>

            <li>
                <a href="?page=reports" class="nav-link <?= $page=='reports'?'active':'' ?>">
                    <i class="fas fa-file-alt"></i><span>Reports</span>
                </a>
            </li>

            <li class="mt-4">
                <a href="logout.php" class="nav-link logout">
                    <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="sidebar-footer" mb-3>
        <small>Admin Panel</small>
        <span class="badge-admin">SYSTEM ADMIN</span>
    </div>
</nav>

<!-- ================= CONTENT ================= -->
<div id="content">
    <div class="top-header">
        <h1><?= $title ?></h1>
        <p class="text-muted">Welcome back, System Administrator</p>
    </div>

    <!-- Example content -->
    <?php if($page=='dashboard'): ?>
        <div class="row mt-4">
            <div class="col-md-3"><div class="stats-card">Students<br><strong>1,254</strong></div></div>
            <div class="col-md-3"><div class="stats-card">Teachers<br><strong>84</strong></div></div>
            <div class="col-md-3"><div class="stats-card">Classes<br><strong>42</strong></div></div>
            <div class="col-md-3"><div class="stats-card">Fees<br><strong>₦284,560</strong></div></div>
        </div>
    <?php else: ?>
        <div class="mt-5 alert alert-info">
            <strong><?= $title ?></strong> module coming soon.
        </div>
    <?php endif; ?>
</div>

</body>
</html>

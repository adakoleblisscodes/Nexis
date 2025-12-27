<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_role'])) {
    $_SESSION['user_role'] = 'superadmin';
    $_SESSION['user_name'] = 'Super Admin';
    $_SESSION['user_id'] = 'SA-001';
}

$currentRole = $_SESSION['user_role'];
$userName = $_SESSION['user_name'];
$userId = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Nexis SMS - <?php echo ucfirst(str_replace('teacher', ' Teacher', $currentRole)); ?> Dashboard</title>
    
    <!-- External Resources -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --superadmin-gold: #d4af37;
            --hos-blue: #2196f3;
            --classteacher-green: #4caf50;
            --subjectteacher-purple: #9c27b0;
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
            --sidebar-width: 250px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* ====== SIDEBAR ====== */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, var(--navy-blue), var(--navy-blue-light));
            color: white;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.15);
            z-index: 1050;
            transform: translateX(-100%);
        }

        #sidebar.active {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 6px;
            background: var(--gold-primary);
            padding: 5px;
        }

        .platform-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 15px 0;
            overflow-y: auto;
        }

        .nav-item {
            list-style: none;
            margin-bottom: 2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            cursor: pointer;
            font-size: 14px;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(212, 175, 55, 0.15);
            color: white;
            border-left: 3px solid var(--gold-primary);
        }

        .sidebar-footer {
            padding: 15px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-info {
            text-align: center;
            margin-bottom: 15px;
        }

        .user-id {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
        }

        .user-role {
            font-size: 13px;
            font-weight: 600;
            color: var(--gold-secondary);
        }

        .logout-btn {
            width: 100%;
            padding: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Mobile Toggle */
        #sidebarToggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            width: 40px;
            height: 40px;
            background: var(--navy-blue);
            color: white;
            border: none;
            border-radius: 6px;
            z-index: 1060;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s;
        }

        #sidebarToggle i {
            transition: transform 0.3s;
        }

        #sidebarToggle.active i {
            transform: rotate(90deg);
        }

        /* Overlay */
        #sidebarOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        #sidebarOverlay.active {
            display: block;
            opacity: 1;
        }

        /* ====== MAIN CONTENT ====== */
        .main-content {
            margin-left: 0;
            padding: 20px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
            position: relative;
        }

        /* ====== DASHBOARD CARDS ====== */
        .dashboard-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            height: 100%;
            border-top: 3px solid;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .dashboard-card.superadmin {
            border-color: var(--superadmin-gold);
        }

        .dashboard-card.hos {
            border-color: var(--hos-blue);
        }

        .dashboard-card.classteacher {
            border-color: var(--classteacher-green);
        }

        .dashboard-card.subjectteacher {
            border-color: var(--subjectteacher-purple);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-number.superadmin {
            color: var(--superadmin-gold);
        }

        .stat-number.hos {
            color: var(--hos-blue);
        }

        .stat-number.classteacher {
            color: var(--classteacher-green);
        }

        .stat-number.subjectteacher {
            color: var(--subjectteacher-purple);
        }

        .card-icon {
            font-size: 24px;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .card-label {
            font-size: 13px;
            color: #666;
            margin-top: auto;
        }

        /* ====== PAGE CONTENT ====== */
        .activity-feed {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* ====== CHARTS ====== */
        .chart-container {
            position: relative;
            width: 100%;
            height: 250px;
        }

        /* ====== ROLE SWITCHER ====== */
        .role-switcher {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .role-switcher-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--navy-blue);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        .role-switcher-btn:hover {
            transform: scale(1.1);
        }

        .role-options {
            position: absolute;
            bottom: 60px;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            padding: 10px;
            min-width: 250px;
            display: none;
        }

        .role-options.show {
            display: block;
        }

        .role-option {
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 5px;
            transition: background 0.3s;
        }

        .role-option:hover {
            background: #f8f9fa;
        }

        .role-option.active {
            background: #f0f0f0;
        }

        .role-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .role-icon.superadmin {
            background: var(--superadmin-gold);
        }

        .role-icon.hos {
            background: var(--hos-blue);
        }

        .role-icon.classteacher {
            background: var(--classteacher-green);
        }

        .role-icon.subjectteacher {
            background: var(--subjectteacher-purple);
        }

        /* ====== ACTIVITY FEED ====== */
        .compact-activities {
            max-height: 250px;
            overflow-y: auto;
        }

        .activity-item-compact {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item-compact:last-child {
            border-bottom: none;
        }

        .activity-icon-compact {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: white;
            flex-shrink: 0;
        }

        .activity-icon-compact.admin {
            background: var(--superadmin-gold);
        }

        .activity-icon-compact.hos {
            background: var(--hos-blue);
        }

        .activity-icon-compact.teacher {
            background: var(--classteacher-green);
        }

        .activity-icon-compact.system {
            background: #6c757d;
        }

        .activity-content-compact {
            flex: 1;
            min-width: 0;
        }

        .activity-title-compact {
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 2px;
        }

        .activity-details-compact {
            font-size: 12px;
            color: #666;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .activity-time-compact {
            font-size: 11px;
            color: #999;
        }

        /* ====== RESPONSIVE ====== */
        @media (min-width: 993px) {
            #sidebar {
                transform: translateX(0);
            }
            
            #sidebarToggle {
                display: none !important;
            }
            
            #sidebarOverlay {
                display: none !important;
            }
            
            .main-content {
                margin-left: var(--sidebar-width);
            }
        }

        @media (max-width: 992px) {
            #sidebarToggle {
                display: flex;
            }
            
            .main-content {
                padding-top: 70px;
            }
        }

        /* Loading skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <div class="sidebar-header">
            <img src="assets/images/Nexis logo.png" alt="Nexis SMS Logo" class="logo-img">
            <div>
                <div class="platform-name">Nexis SMS</div>
                <small>School Management</small>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <!-- Navigation based on role -->
                <?php
                // Define navigation based on role
                $navigation = [];
                
                if ($currentRole === 'superadmin') {
                    $navigation = [
                        ['name' => 'Dashboard', 'icon' => 'fa-tachometer-alt', 'href' => 'dashboard.php', 'active' => true],
                        ['name' => 'Fee Management', 'icon' => 'fa-chart-line', 'href' => 'fees_management.php', 'active' => false],
                        ['name' => 'Students Management', 'icon' => 'fa-user-graduate', 'href' => 'student_management.php', 'active' => false],
                        ['name' => 'Subject Management', 'icon' => 'fa-book', 'href' => 'subject_management.php', 'active' => false],
                        ['name' => 'Results Management', 'icon' => 'fa-chart-bar', 'href' => 'results_management.php', 'active' => false],
                        ['name' => 'Staff Management', 'icon' => 'fa-chalkboard-teacher', 'href' => 'staff_management.php', 'active' => false],
                        ['name' => 'Class Management', 'icon' => 'fa-school', 'href' => 'class_management.php', 'active' => false],
                        ['name' => 'Settings', 'icon' => 'fa-cog', 'href' => 'settings.php', 'active' => false]
                    ];
                } elseif ($currentRole === 'hos') {
                    $navigation = [
                        ['name' => 'Dashboard', 'icon' => 'fa-tachometer-alt', 'href' => 'dashboard.php', 'active' => true],
                        ['name' => 'Fee Management', 'icon' => 'fa-chart-line', 'href' => 'fees_management.php', 'active' => false],
                        ['name' => 'Students Management', 'icon' => 'fa-user-graduate', 'href' => 'student_management.php', 'active' => false],
                        ['name' => 'Subject Management', 'icon' => 'fa-book', 'href' => 'subject_management.php', 'active' => false],
                        ['name' => 'Results Management', 'icon' => 'fa-chart-bar', 'href' => 'results_management.php', 'active' => false],
                        ['name' => 'Staff Management', 'icon' => 'fa-chalkboard-teacher', 'href' => 'staff_management.php', 'active' => false],
                        ['name' => 'Class Management', 'icon' => 'fa-school', 'href' => 'class_management.php', 'active' => false],
                        ['name' => 'Reports', 'icon' => 'fa-file-alt', 'href' => 'reports.php', 'active' => false],
                        ['name' => 'Settings', 'icon' => 'fa-cog', 'href' => 'settings.php', 'active' => false]
                    ];
                } elseif ($currentRole === 'classteacher') {
                    $navigation = [
                        ['name' => 'Dashboard', 'icon' => 'fa-tachometer-alt', 'href' => 'dashboard.php', 'active' => true],
                        ['name' => 'My Class', 'icon' => 'fa-users', 'href' => 'my_class.php', 'active' => false],
                        ['name' => 'Attendance', 'icon' => 'fa-calendar-check', 'href' => 'attendance.php', 'active' => false],
                        ['name' => 'Student Grades', 'icon' => 'fa-graduation-cap', 'href' => 'student_grades.php', 'active' => false],
                        ['name' => 'Behavior Reports', 'icon' => 'fa-chart-bar', 'href' => 'behavior_reports.php', 'active' => false],
                        ['name' => 'Parent Meetings', 'icon' => 'fa-handshake', 'href' => 'parent_meetings.php', 'active' => false],
                        ['name' => 'Class Schedule', 'icon' => 'fa-calendar-alt', 'href' => 'class_schedule.php', 'active' => false],
                        ['name' => 'Settings', 'icon' => 'fa-cog', 'href' => 'settings.php', 'active' => false]
                    ];
                } elseif ($currentRole === 'subjectteacher') {
                    $navigation = [
                        ['name' => 'Dashboard', 'icon' => 'fa-tachometer-alt', 'href' => 'dashboard.php', 'active' => true],
                        ['name' => 'My Subjects', 'icon' => 'fa-book', 'href' => 'my_subjects.php', 'active' => false],
                        ['name' => 'Assignments', 'icon' => 'fa-tasks', 'href' => 'assignments.php', 'active' => false],
                        ['name' => 'Gradebook', 'icon' => 'fa-chart-bar', 'href' => 'gradebook.php', 'active' => false],
                        ['name' => 'Lesson Plans', 'icon' => 'fa-clipboard-list', 'href' => 'lesson_plans.php', 'active' => false],
                        ['name' => 'Timetable', 'icon' => 'fa-calendar-alt', 'href' => 'timetable.php', 'active' => false],
                        ['name' => 'Resources', 'icon' => 'fa-folder-open', 'href' => 'resources.php', 'active' => false],
                        ['name' => 'Settings', 'icon' => 'fa-cog', 'href' => 'settings.php', 'active' => false]
                    ];
                }
                
                // Output navigation items
                foreach ($navigation as $item):
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $item['active'] ? 'active' : ''; ?>" href="<?php echo $item['href']; ?>">
                        <i class="fas <?php echo $item['icon']; ?>"></i> <?php echo $item['name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-role"><?php echo ucfirst(str_replace('teacher', ' Teacher', $currentRole)); ?></div>
                <div class="user-id">ID: <?php echo $userId; ?></div>
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="mb-2 mb-md-0">
                    <?php
                    // Role-specific header titles
                    $roleTitles = [
                        'superadmin' => 'System Overview Dashboard',
                        'hos' => 'School Management Dashboard',
                        'classteacher' => 'Class Management Dashboard',
                        'subjectteacher' => 'Teaching Dashboard'
                    ];
                    ?>
                    <h3 class="h5 mb-1 fw-bold"><?php echo $roleTitles[$currentRole]; ?></h3>
                    <p class="text-muted mb-0 small" id="welcomeMessage">
                        <?php 
                        $hour = date('H');
                        if ($hour < 12) echo "Good morning";
                        elseif ($hour < 18) echo "Good afternoon";
                        else echo "Good evening";
                        ?>, <?php echo $userName; ?>! Welcome to <?php echo ucfirst(str_replace('teacher', ' Teacher', $currentRole)); ?> Dashboard
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm position-relative">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                    </button>
                    <button class="btn btn-outline-primary btn-sm" onclick="showProfile()">
                        <i class="fas fa-user me-1"></i>Profile
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Dashboard Content -->
        <div id="dashboardContent">
            <!-- Loading skeleton -->
            <div class="row g-3">
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card skeleton" style="height: 120px;"></div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card skeleton" style="height: 120px;"></div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card skeleton" style="height: 120px;"></div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="dashboard-card skeleton" style="height: 120px;"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Role Switcher -->
    <div class="role-switcher">
        <button class="role-switcher-btn" onclick="toggleRoleSwitcher()" aria-label="Switch role">
            <i class="fas fa-users"></i>
        </button>
        <div class="role-options" id="roleOptions">
            <div class="role-option <?php echo $currentRole === 'superadmin' ? 'active' : ''; ?>" onclick="switchRole('superadmin')">
                <div class="role-icon superadmin">
                    <i class="fas fa-crown"></i>
                </div>
                <div>
                    <h6 class="mb-0" style="font-size: 14px;">Super Administrator</h6>
                    <small class="text-muted">Full system control</small>
                </div>
            </div>
            <div class="role-option <?php echo $currentRole === 'hos' ? 'active' : ''; ?>" onclick="switchRole('hos')">
                <div class="role-icon hos">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div>
                    <h6 class="mb-0" style="font-size: 14px;">Head of School</h6>
                    <small class="text-muted">Branch-specific control</small>
                </div>
            </div>
            <div class="role-option <?php echo $currentRole === 'classteacher' ? 'active' : ''; ?>" onclick="switchRole('classteacher')">
                <div class="role-icon classteacher">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <h6 class="mb-0" style="font-size: 14px;">Class Teacher</h6>
                    <small class="text-muted">Class-specific control</small>
                </div>
            </div>
            <div class="role-option <?php echo $currentRole === 'subjectteacher' ? 'active' : ''; ?>" onclick="switchRole('subjectteacher')">
                <div class="role-icon subjectteacher">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <h6 class="mb-0" style="font-size: 14px;">Subject Teacher</h6>
                    <small class="text-muted">Subject-specific control</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Sign Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-sign-out-alt fa-3x text-warning mb-3"></i>
                    <h5>Are you sure you want to sign out?</h5>
                    <p class="text-muted">You will need to sign in again to access the system.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" onclick="logout()">Sign Out</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Pass PHP data to JavaScript
        const currentRole = '<?php echo $currentRole; ?>';
        const userName = '<?php echo $userName; ?>';
        const userId = '<?php echo $userId; ?>';

        // Application Data - Different stats for each role
        const roles = {
            superadmin: {
                id: 'superadmin',
                name: 'Super Administrator',
                badgeClass: 'superadmin',
                user: { name: 'Super Admin', id: 'SA-001', email: 'admin@nexis.edu' },
                stats: { 
                    totalStudents: 2375,
                    academicStaff: 125,
                    nonAcademicStaff: 60,
                    subjects: 45,
                    branches: 3,
                    male: 1248,
                    female: 1127
                },
                navigation: [
                    { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
                    { name: 'Fee Management', icon: 'fa-chart-line', active: false, href: 'fees_management.php' },
                    { name: 'Students Management', icon: 'fa-user-graduate', active: false, href: 'student_management.php' },
                    { name: 'Subject Management', icon: 'fa-book', active: false, href: 'subject_management.php' },
                    { name: 'Results Management', icon: 'fa-chart-bar', active: false, href: 'results_management.php' },
                    { name: 'Staff Management', icon: 'fa-chalkboard-teacher', active: false, href: 'staff_management.php' },
                    { name: 'Class Management', icon: 'fa-school', active: false, href: 'class_management.php' },
                    { name: 'Settings', icon: 'fa-cog', active: false, href: 'settings.php' }
                ],
                cards: [
                    { title: 'Total Students', icon: 'fa-user-graduate', value: 2375, color: 'superadmin' },
                    { title: 'Academic Staff', icon: 'fa-chalkboard-teacher', value: 125, color: 'superadmin' },
                    { title: 'Branches', icon: 'fa-school', value: 3, color: 'superadmin' },
                    { title: 'Subjects', icon: 'fa-book', value: 45, color: 'superadmin' }
                ]
            },
            hos: {
                id: 'hos',
                name: 'Head of School',
                badgeClass: 'hos',
                user: { name: 'Dr. Adebayo Johnson', id: 'HOS-001', email: 'hos.main@nexis.edu', branch: 'Main Campus' },
                stats: { 
                    totalStudents: 1200,
                    academicStaff: 45,
                    nonAcademicStaff: 25,
                    subjects: 35,
                    branches: 1,
                    male: 650,
                    female: 550
                },
                navigation: [
                    { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
                    { name: 'Fee Management', icon: 'fa-chart-line', active: false, href: 'fees_management.php' },
                    { name: 'Students Management', icon: 'fa-user-graduate', active: false, href: 'student_management.php' },
                    { name: 'Subject Management', icon: 'fa-book', active: false, href: 'subject_management.php' },
                    { name: 'Results Management', icon: 'fa-chart-bar', active: false, href: 'results_management.php' },
                    { name: 'Staff Management', icon: 'fa-chalkboard-teacher', active: false, href: 'staff_management.php' },
                    { name: 'Class Management', icon: 'fa-school', active: false, href: 'class_management.php' },
                    { name: 'Reports', icon: 'fa-file-alt', active: false, href: 'reports.php' },
                    { name: 'Settings', icon: 'fa-cog', active: false, href: 'settings.php' }
                ],
                cards: [
                    { title: 'Total Students', icon: 'fa-user-graduate', value: 1200, color: 'hos' },
                    { title: 'Teaching Staff', icon: 'fa-chalkboard-teacher', value: 45, color: 'hos' },
                    { title: 'Classes', icon: 'fa-school', value: 30, color: 'hos' },
                    { title: 'Fee Collection', icon: 'fa-money-bill-wave', value: '₦4.2M', color: 'hos' }
                ]
            },
            classteacher: {
                id: 'classteacher',
                name: 'Class Teacher',
                badgeClass: 'classteacher',
                user: { name: 'Mrs. Chidinma Okoro', id: 'T-001', email: 'c.okoro@nexis.edu', class: 'Grade 10A' },
                stats: { 
                    totalStudents: 42,
                    academicStaff: 2,
                    nonAcademicStaff: 1,
                    subjects: 8,
                    branches: 1,
                    male: 22,
                    female: 20
                },
                navigation: [
                    { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
                    { name: 'My Class', icon: 'fa-users', active: false, href: 'my_class.php' },
                    { name: 'Attendance', icon: 'fa-calendar-check', active: false, href: 'attendance.php' },
                    { name: 'Student Grades', icon: 'fa-graduation-cap', active: false, href: 'student_grades.php' },
                    { name: 'Behavior Reports', icon: 'fa-chart-bar', active: false, href: 'behavior_reports.php' },
                    { name: 'Parent Meetings', icon: 'fa-handshake', active: false, href: 'parent_meetings.php' },
                    { name: 'Class Schedule', icon: 'fa-calendar-alt', active: false, href: 'class_schedule.php' },
                    { name: 'Settings', icon: 'fa-cog', active: false, href: 'settings.php' }
                ],
                cards: [
                    { title: 'Class Students', icon: 'fa-user-graduate', value: 42, color: 'classteacher' },
                    { title: 'Attendance Today', icon: 'fa-calendar-check', value: '95%', color: 'classteacher' },
                    { title: 'Pending Assignments', icon: 'fa-tasks', value: 8, color: 'classteacher' },
                    { title: 'Parent Meetings', icon: 'fa-handshake', value: 3, color: 'classteacher' }
                ]
            },
            subjectteacher: {
                id: 'subjectteacher',
                name: 'Subject Teacher',
                badgeClass: 'subjectteacher',
                user: { name: 'Mr. Segun Adeyemi', id: 'ST-001', email: 's.adeyemi@nexis.edu', subjects: ['Math', 'Physics'] },
                stats: { 
                    totalStudents: 185,
                    academicStaff: 12,
                    nonAcademicStaff: 5,
                    subjects: 2,
                    branches: 1,
                    male: 100,
                    female: 85
                },
                navigation: [
                    { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
                    { name: 'My Subjects', icon: 'fa-book', active: false, href: 'my_subjects.php' },
                    { name: 'Assignments', icon: 'fa-tasks', active: false, href: 'assignments.php' },
                    { name: 'Gradebook', icon: 'fa-chart-bar', active: false, href: 'gradebook.php' },
                    { name: 'Lesson Plans', icon: 'fa-clipboard-list', active: false, href: 'lesson_plans.php' },
                    { name: 'Timetable', icon: 'fa-calendar-alt', active: false, href: 'timetable.php' },
                    { name: 'Resources', icon: 'fa-folder-open', active: false, href: 'resources.php' },
                    { name: 'Settings', icon: 'fa-cog', active: false, href: 'settings.php' }
                ],
                cards: [
                    { title: 'Total Students', icon: 'fa-user-graduate', value: 185, color: 'subjectteacher' },
                    { title: 'Subjects', icon: 'fa-book', value: 2, color: 'subjectteacher' },
                    { title: 'Pending Grading', icon: 'fa-file-alt', value: 24, color: 'subjectteacher' },
                    { title: 'Lessons This Week', icon: 'fa-calendar-alt', value: 12, color: 'subjectteacher' }
                ]
            }
        };

        // Recent activities data - Different for each role
        const recentActivities = {
            superadmin: [
                { user: 'Super Admin', action: 'System configuration updated', details: 'Updated security settings', time: '10 min ago', icon: 'admin' },
                { user: 'Head of School', action: 'Branch report submitted', details: 'Main Campus monthly report', time: '25 min ago', icon: 'hos' },
                { user: 'System', action: 'Database backup completed', details: 'Daily backup successful', time: '1 hour ago', icon: 'system' },
                { user: 'Class Teacher', action: 'Attendance marked', details: 'Grade 10A - 42/42 present', time: '2 hours ago', icon: 'teacher' },
                { user: 'System', action: 'New user registered', details: 'Subject teacher - Mr. Adeyemi', time: '3 hours ago', icon: 'system' }
            ],
            hos: [
                { user: 'Head of School', action: 'Staff meeting scheduled', details: 'Monthly staff meeting - Friday 2PM', time: '15 min ago', icon: 'hos' },
                { user: 'Class Teacher', action: 'Report submitted', details: 'Grade 10A behavior report', time: '30 min ago', icon: 'teacher' },
                { user: 'Finance', action: 'Fee payment processed', details: '₦50,000 from Chioma Okeke', time: '45 min ago', icon: 'system' },
                { user: 'Parent', action: 'Meeting requested', details: 'Mr. Adekunle - Grade 10A parent', time: '1 hour ago', icon: 'system' },
                { user: 'System', action: 'Attendance summary', details: '95% overall attendance today', time: '2 hours ago', icon: 'system' }
            ],
            classteacher: [
                { user: 'You', action: 'Attendance marked', details: 'Grade 10A - 40/42 present', time: '15 min ago', icon: 'teacher' },
                { user: 'Student', action: 'Assignment submitted', details: 'Mathematics - James Adekunle', time: '30 min ago', icon: 'system' },
                { user: 'Parent', action: 'Meeting confirmed', details: 'Mrs. Okeke - Tomorrow 3PM', time: '1 hour ago', icon: 'system' },
                { user: 'HOS', action: 'Notice', details: 'Staff meeting this Friday', time: '2 hours ago', icon: 'hos' },
                { user: 'Student', action: 'Late arrival', details: 'Chioma Okeke - 8:30 AM', time: '3 hours ago', icon: 'system' }
            ],
            subjectteacher: [
                { user: 'You', action: 'Assignment uploaded', details: 'Math - Chapter 5 Problems', time: '20 min ago', icon: 'teacher' },
                { user: 'Student', action: 'Assignment submitted', details: 'Physics - James Adekunle', time: '45 min ago', icon: 'system' },
                { user: 'Class Teacher', action: 'Grades requested', details: 'Grade 10A - Midterm grades', time: '1 hour ago', icon: 'teacher' },
                { user: 'You', action: 'Lesson plan created', details: 'Math - Trigonometry', time: '2 hours ago', icon: 'teacher' },
                { user: 'HOS', action: 'Notice', details: 'Subject coordination meeting', time: '3 hours ago', icon: 'hos' }
            ]
        };

        // Chart instance storage
        let populationChart = null;
        let genderChart = null;

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            loadDashboard();
            
            // Add resize listener
            window.addEventListener('resize', handleResize);
            handleResize();
        });

        // Load dashboard content
        function loadDashboard() {
            const role = roles[currentRole];
            const activities = recentActivities[currentRole] || [];
            
            // Load dashboard content after a short delay
            setTimeout(() => {
                const content = document.getElementById('dashboardContent');
                content.innerHTML = `
                    <div class="row g-3">
                        ${renderRoleSpecificCards(role)}
                    </div>
                    
                    ${renderRoleSpecificContent(role, activities)}
                `;
                
                // Initialize charts
                initializeCharts();
            }, 300);
        }

        function renderRoleSpecificCards(role) {
            let cardsHTML = '';
            
            role.cards.forEach(card => {
                cardsHTML += `
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="dashboard-card ${card.color}">
                            <div class="card-icon ${card.color}">
                                <i class="fas ${card.icon}"></i>
                            </div>
                            <div class="stat-number ${card.color}">${card.value}</div>
                            <div class="card-label">${card.title}</div>
                        </div>
                    </div>
                `;
            });
            
            return cardsHTML;
        }

        function renderRoleSpecificContent(role, activities) {
            if (role.id === 'superadmin' || role.id === 'hos') {
                return `
                    <div class="row mt-3">
                        <div class="col-xl-8 mb-3">
                            <div class="activity-feed">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0" style="font-size: 1rem;">
                                        <i class="fas fa-chart-line me-2"></i>Student Population Trend
                                    </h5>
                                    <button class="btn btn-sm btn-outline-secondary" onclick="refreshCharts()">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                                <div class="chart-container">
                                    <canvas id="populationChart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 mb-3">
                            <div class="activity-feed">
                                <h5 class="fw-bold mb-3" style="font-size: 1rem;">
                                    <i class="fas fa-venus-mars me-2"></i>Gender Distribution
                                </h5>
                                <div class="chart-container" style="height: 180px;">
                                    <canvas id="genderChart"></canvas>
                                </div>
                                <div class="gender-stats mt-3 p-2">
                                    <div class="row text-center">
                                        <div class="col-6 border-end">
                                            <div class="p-1">
                                                <h4 class="mb-0 text-primary" style="font-size: 1.2rem;">${role.stats.male || 0}</h4>
                                                <small class="text-muted">Male Students</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="p-1">
                                                <h4 class="mb-0" style="color: #e74c3c; font-size: 1.2rem;">${role.stats.female || 0}</h4>
                                                <small class="text-muted">Female Students</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="activity-feed">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0" style="font-size: 1rem;">
                                        <i class="fas fa-history me-2"></i>Recent Activities
                                    </h5>
                                    <button class="btn btn-sm btn-outline-secondary" onclick="toggleActivityView()">
                                        <i class="fas fa-compress-alt"></i>
                                    </button>
                                </div>
                                
                                ${renderCompactActivities(activities)}
                            </div>
                        </div>
                    </div>
                `;
            } else {
                // For teachers, show more teaching-focused content
                return `
                    <div class="row mt-3">
                        <div class="col-xl-6 mb-3">
                            <div class="activity-feed">
                                <h5 class="fw-bold mb-3" style="font-size: 1rem;">
                                    <i class="fas fa-chart-pie me-2"></i>Performance Overview
                                </h5>
                                <div class="chart-container" style="height: 200px;">
                                    <canvas id="performanceChart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 mb-3">
                            <div class="activity-feed">
                                <h5 class="fw-bold mb-3" style="font-size: 1rem;">
                                    <i class="fas fa-calendar-alt me-2"></i>Upcoming Schedule
                                </h5>
                                <div class="upcoming-schedule">
                                    ${renderUpcomingSchedule(role)}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="activity-feed">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0" style="font-size: 1rem;">
                                        <i class="fas fa-history me-2"></i>Recent Activities
                                    </h5>
                                    <button class="btn btn-sm btn-outline-secondary" onclick="toggleActivityView()">
                                        <i class="fas fa-compress-alt"></i>
                                    </button>
                                </div>
                                
                                ${renderCompactActivities(activities)}
                            </div>
                        </div>
                    </div>
                `;
            }
        }

        function renderCompactActivities(activities) {
            if (activities.length === 0) {
                return `<div class="text-center py-3"><i class="fas fa-inbox text-muted"></i><p class="text-muted mt-2 mb-0 small">No activities</p></div>`;
            }
            
            return `
                <div class="compact-activities">
                    ${activities.map(activity => `
                        <div class="activity-item-compact">
                            <div class="activity-icon-compact ${activity.icon}">
                                <i class="fas ${activity.icon === 'admin' ? 'fa-crown' : activity.icon === 'hos' ? 'fa-user-tie' : activity.icon === 'teacher' ? 'fa-chalkboard-teacher' : 'fa-cog'}"></i>
                            </div>
                            <div class="activity-content-compact">
                                <div class="activity-title-compact">${activity.action}</div>
                                <div class="activity-details-compact">${activity.details}</div>
                                <div class="activity-time-compact">${activity.time}</div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            `;
        }

        function renderUpcomingSchedule(role) {
            const schedules = {
                classteacher: [
                    { time: '8:00 AM', subject: 'Morning Assembly', class: 'All Students' },
                    { time: '9:00 AM', subject: 'Mathematics', class: 'Grade 10A' },
                    { time: '11:00 AM', subject: 'Parent Meeting', class: 'Mrs. Okeke' },
                    { time: '2:00 PM', subject: 'Staff Meeting', class: 'Conference Room' }
                ],
                subjectteacher: [
                    { time: '9:00 AM', subject: 'Mathematics', class: 'Grade 10A' },
                    { time: '10:00 AM', subject: 'Physics', class: 'Grade 11B' },
                    { time: '1:00 PM', subject: 'Mathematics', class: 'Grade 9C' },
                    { time: '3:00 PM', subject: 'Subject Meeting', class: 'Math Department' }
                ]
            };
            
            const schedule = schedules[role.id] || [];
            
            if (schedule.length === 0) {
                return '<div class="text-center py-3"><i class="fas fa-calendar-times text-muted"></i><p class="text-muted mt-2 mb-0 small">No upcoming schedule</p></div>';
            }
            
            return schedule.map(item => `
                <div class="d-flex align-items-center py-2 border-bottom">
                    <div class="bg-light rounded p-2 me-3 text-center" style="width: 70px;">
                        <div class="fw-bold">${item.time}</div>
                    </div>
                    <div>
                        <div class="fw-bold">${item.subject}</div>
                        <small class="text-muted">${item.class}</small>
                    </div>
                </div>
            `).join('');
        }

        // Chart Functions
        function initializeCharts() {
            const role = roles[currentRole];
            const male = role.stats.male || 650;
            const female = role.stats.female || 550;
            const baseStudents = role.stats.totalStudents || 1200;
            
            // Destroy existing charts if they exist
            if (genderChart) genderChart.destroy();
            if (populationChart) populationChart.destroy();
            
            // Gender Chart
            const genderCtx = document.getElementById('genderChart');
            if (genderCtx) {
                genderChart = new Chart(genderCtx.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Male', 'Female'],
                        datasets: [{
                            data: [male, female],
                            backgroundColor: ['#2196f3', '#e74c3c'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        cutout: '65%'
                    }
                });
            }
            
            // Population Chart
            const popCtx = document.getElementById('populationChart');
            if (popCtx) {
                const monthlyData = [];
                for (let i = 0; i < 12; i++) {
                    monthlyData.push(Math.round(baseStudents - (11 - i) * 15));
                }
                
                populationChart = new Chart(popCtx.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            data: monthlyData,
                            borderColor: '#1a237e',
                            backgroundColor: 'rgba(26, 35, 126, 0.05)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            x: { grid: { display: false } },
                            y: { 
                                beginAtZero: false,
                                min: Math.min(...monthlyData) - 100,
                                ticks: { callback: v => v.toLocaleString() }
                            }
                        }
                    }
                });
            }
            
            // Performance Chart for teachers
            const perfCtx = document.getElementById('performanceChart');
            if (perfCtx) {
                new Chart(perfCtx.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['A', 'B', 'C', 'D', 'F'],
                        datasets: [{
                            data: [15, 12, 8, 5, 2],
                            backgroundColor: role.id === 'classteacher' ? '#4caf50' : '#9c27b0',
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { 
                            legend: { display: false },
                            title: {
                                display: true,
                                text: 'Grade Distribution'
                            }
                        },
                        scales: {
                            x: { 
                                grid: { display: false },
                                title: { display: true, text: 'Grades' }
                            },
                            y: { 
                                beginAtZero: true,
                                title: { display: true, text: 'Number of Students' }
                            }
                        }
                    }
                });
            }
        }

        function refreshCharts() {
            initializeCharts();
        }

        // Sidebar functions
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('sidebarToggle');
            
            const isActive = sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            
            const icon = toggle.querySelector('i');
            if (isActive) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
            
            document.body.style.overflow = isActive ? 'hidden' : '';
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('sidebarToggle');
            
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            
            const icon = toggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
            
            document.body.style.overflow = '';
        }

        function handleResize() {
            if (window.innerWidth > 992) {
                closeSidebar();
            }
        }

        // Role switching
        function toggleRoleSwitcher() {
            const options = document.getElementById('roleOptions');
            options.classList.toggle('show');
        }

        function switchRole(roleId) {
            // In a real app, this would make an AJAX call to update session
            window.location.href = `switch_role.php?role=${roleId}`;
        }

        function showProfile() {
            const role = roles[currentRole];
            const content = document.getElementById('dashboardContent');
            content.innerHTML = `
                <div class="activity-feed">
                    <h5 class="fw-bold mb-4">
                        <i class="fas fa-user-circle me-2"></i>User Profile
                    </h5>
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="rounded-circle bg-${role.badgeClass} d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                            <h5>${role.user.name}</h5>
                            <p class="text-muted">${role.name}</p>
                        </div>
                        <div class="col-md-8">
                            <div class="list-group">
                                <div class="list-group-item py-2">
                                    <strong>User ID:</strong> ${role.user.id}
                                </div>
                                <div class="list-group-item py-2">
                                    <strong>Email:</strong> ${role.user.email}
                                </div>
                                ${role.user.branch ? `
                                <div class="list-group-item py-2">
                                    <strong>Branch:</strong> ${role.user.branch}
                                </div>` : ''}
                                ${role.user.class ? `
                                <div class="list-group-item py-2">
                                    <strong>Class:</strong> ${role.user.class}
                                </div>` : ''}
                                ${role.user.subjects ? `
                                <div class="list-group-item py-2">
                                    <strong>Subjects:</strong> ${role.user.subjects.join(', ')}
                                </div>` : ''}
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm me-2">
                                    <i class="fas fa-edit me-1"></i>Edit Profile
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" onclick="loadDashboard()">
                                    <i class="fas fa-times me-1"></i>Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function showLogoutModal() {
            const modal = new bootstrap.Modal(document.getElementById('logoutModal'));
            modal.show();
        }

        function logout() {
            window.location.href = 'logout.php';
        }

        function toggleActivityView() {
            const activities = document.querySelector('.compact-activities');
            if (activities) {
                activities.style.maxHeight = activities.style.maxHeight === 'none' ? '250px' : 'none';
            }
        }
    </script>
</body>
</html>
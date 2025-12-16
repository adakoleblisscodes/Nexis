<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis LMS - Super Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js for graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* ========== CSS VARIABLES ========== */
        :root {
            --navy-blue: #0a1a3a;
            --navy-light: #1a2a4a;
            --gold: #d4af37;
            --gold-light: #f4d03f;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
            --gray-light: #f8fafc;
        }
        
        /* ========== BASE STYLES ========== */
        body {
            background-color: var(--gray-light);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }
        
        /* ========== SIDEBAR ========== */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--navy-blue) 0%, var(--navy-light) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1050;
            padding: 0;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            transition: transform 0.3s ease;
        }
        
        .logo-container {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }
        
        .platform-name {
            font-size: 24px;
            font-weight: 700;
            color: white;
            margin: 0;
        }
        
        .admin-badge {
            background: var(--gold);
            color: var(--navy-blue);
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 15px;
            border-radius: 8px;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(212, 175, 55, 0.15);
            color: white;
            border-left: 3px solid var(--gold);
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
            color: var(--gold);
        }
        
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }
        
        /* ========== MAIN CONTENT ========== */
        .main-content {
            margin-left: 280px;
            padding: 25px;
            min-height: 100vh;
            background-color: var(--gray-light);
            transition: margin-left 0.3s ease;
        }
        
        /* ========== TOP HEADER ========== */
        .top-header {
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }
        
        /* ========== DASHBOARD CARDS ========== */
        .dashboard-card {
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid #e9ecef;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-icon-container {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--navy-blue), var(--navy-light));
        }
        
        .card-value {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--navy-blue);
            line-height: 1;
            margin-bottom: 5px;
        }
        
        .card-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* ========== LEVEL CARDS ========== */
        .level-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-left: 4px solid;
            transition: all 0.3s ease;
        }
        
        .nursery-card { border-left-color: #9c27b0; }
        .primary-card { border-left-color: #2196f3; }
        .secondary-card { border-left-color: #4caf50; }
        
        /* ========== ACTIVITY CARDS ========== */
        .activity-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        
        /* ========== QUICK STATS ========== */
        .quick-stat {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid var(--gold);
        }
        
        /* ========== BUTTONS ========== */
        .btn-gold {
            background: var(--gold);
            border-color: var(--gold);
            color: white;
            font-weight: 600;
        }
        
        .btn-gold:hover {
            background: #b8941f;
            border-color: #b8941f;
            color: white;
        }
        
        /* ========== MOBILE MENU TOGGLE ========== */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--navy-blue);
        }
        
        /* ========== MOBILE OVERLAY (for sidebar on mobile) ========== */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
        }
        
        /* ========== RESPONSIVE STYLES ========== */
        /* Large screens (desktops) */
        @media (min-width: 1200px) {
            .col-xl-2-4 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }
        
        /* Medium screens (tablets) */
        @media (max-width: 1199px) and (min-width: 768px) {
            .dashboard-card .card-value {
                font-size: 1.8rem;
            }
        }
        
        /* Small screens (mobile) */
        @media (max-width: 767px) {
            /* Hide sidebar by default on mobile */
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            /* Show mobile menu toggle button */
            .mobile-menu-toggle {
                display: block;
            }
            
            /* Adjust main content for mobile */
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
            
            /* Adjust top header for mobile */
            .top-header {
                padding: 15px;
                flex-direction: column;
                align-items: flex-start !important;
            }
            
            .top-header > div {
                width: 100%;
            }
            
            .header-right {
                margin-top: 15px;
                justify-content: space-between;
            }
            
            /* Adjust card values for mobile */
            .card-value {
                font-size: 1.8rem;
            }
            
            /* Make charts and cards stack vertically */
            .chart-card canvas {
                max-height: 200px;
            }
            
            /* Adjust activity items for mobile */
            .activity-item {
                flex-direction: column;
                gap: 10px;
            }
            
            .activity-item .badge {
                align-self: flex-start;
            }
        }
        
        /* Extra small screens (very small mobile) */
        @media (max-width: 575px) {
            .main-content {
                padding: 10px;
            }
            
            .top-header {
                padding: 12px;
            }
            
            .card-value {
                font-size: 1.6rem;
            }
            
            .platform-name {
                font-size: 20px;
            }
            
            .dashboard-card .btn {
                width: 100%;
            }
        }
        
        /* Custom scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 10px;
        }
        
        /* Text colors for easy reading */
        .text-gold { color: var(--gold); }
        .text-purple { color: #9c27b0; }
        .text-success { color: var(--success); }
        .text-warning { color: var(--warning); }
        .text-danger { color: var(--danger); }
        .text-info { color: var(--info); }
    </style>
</head>
<body>
    <!-- Mobile Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <!-- Logo Section -->
        <div class="logo-container">
            <div class="d-flex align-items-center">
                <!-- Logo (using placeholder, replace with your logo) -->
                <div class="user-avatar me-3">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="platform-name">Nexis <span class="admin-badge">SUPER ADMIN</span></h3>
            </div>
        </div>
        
        <!-- Navigation Menu -->
        <div class="nav flex-column flex-grow-1 mt-3" id="sidebarNav">
            <!-- Navigation items will be loaded here by JavaScript -->
        </div>
        
        <!-- User Profile & Logout -->
        <div class="sidebar-footer">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="user-avatar" id="userAvatar">SA</div>
                <div>
                    <p class="mb-0 fw-bold" id="userName">Super Administrator</p>
                    <small class="text-gold" id="userEmail">admin@nexis.edu</small>
                </div>
            </div>
            <button class="btn btn-outline-light w-100" onclick="logout()">
                <i class="fas fa-sign-out-alt me-2"></i> Sign Out
            </button>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <div class="top-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <!-- Mobile Menu Toggle Button -->
                <button class="mobile-menu-toggle me-3" id="mobileMenuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h1 class="h4 mb-1 fw-bold" id="dashboardTitle">Super Admin Dashboard</h1>
                    <p class="text-muted mb-0" id="welcomeMessage">System Overview & Control Panel</p>
                </div>
            </div>
            
            <div class="d-flex align-items-center gap-3 header-right">
                <!-- Notifications -->
                <button class="notification-btn position-relative">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">3</span>
                </button>
                
                <!-- Quick Actions Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-cog me-2"></i> <span class="d-none d-md-inline">Quick Actions</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="showAddUser()"><i class="fas fa-user-plus me-2"></i>Add New User</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showSystemSettings()"><i class="fas fa-cogs me-2"></i>System Settings</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAnnouncements()"><i class="fas fa-bullhorn me-2"></i>Send Announcement</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Dashboard Content -->
        <div id="dashboardContent">
            <!-- Content will be loaded here by JavaScript -->
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // ========== SUPER ADMIN DATA ==========
        // This is where all the dashboard information is stored
        const superAdminData = {
            title: 'Super Admin Dashboard',
            welcome: 'System Overview & Control Panel',
            userName: 'Super Administrator',
            userEmail: 'admin@nexis.edu',
            userAvatar: 'SA',
            
            // Navigation Items (left sidebar menu)
            navItems: [
                { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true },
                { icon: 'fa-user-graduate', name: 'Student Management' },
                { icon: 'fa-chalkboard-teacher', name: 'Teacher Management' },
                { icon: 'fa-user-tie', name: 'Admin Management' },
                { icon: 'fa-school', name: 'School Setup & Configuration' },
                { icon: 'fa-shield-alt', name: 'User Roles & Permissions' },
                { icon: 'fa-money-check-alt', name: 'Payments History' },
                { icon: 'fa-cogs', name: 'System Settings' },
                { icon: 'fa-bell', name: 'Notifications' }
            ],
            
            // Dashboard Statistics (shown in the cards)
            stats: {
                totalStudents: 2375,
                totalTeachers: 125,
                totalStaff: 185,
                totalSchools: 3,
                activeStudents: 2250,
                inactiveStudents: 75,
                suspendedStudents: 50,
                graduatedStudents: 0,
                
                // Level-wise distribution
                nurseryStudents: 245,
                primaryStudents: 856,
                secondaryStudents: 1274,
                
                // Staff breakdown
                teachingStaff: 125,
                nonTeachingStaff: 60,
                
                // Branch distribution
                branchStudents: {
                    'Main Campus': 1200,
                    'North Branch': 750,
                    'West Branch': 425
                }
            },
            
            // Recent Activities (shown in activity log)
            activities: [
                { icon: 'fa-user-plus', text: 'New student enrolled in Primary School', time: '10 min ago', type: 'student' },
                { icon: 'fa-chalkboard-teacher', text: 'Teacher assigned to Grade 10 Mathematics', time: '30 min ago', type: 'teacher' },
                { icon: 'fa-user-tie', text: 'New admin account created for North Branch', time: '1 hour ago', type: 'admin' },
                { icon: 'fa-school', text: 'New academic year configured for Secondary', time: '2 hours ago', type: 'system' },
                { icon: 'fa-money-check-alt', text: 'Monthly fee report generated', time: '4 hours ago', type: 'finance' },
                { icon: 'fa-cog', text: 'System settings updated', time: '1 day ago', type: 'system' },
                { icon: 'fa-shield-alt', text: 'Security audit completed', time: '2 days ago', type: 'security' }
            ],
            
            // System Alerts (shown in alerts section)
            alerts: [
                { level: 'warning', text: 'Low storage space on server (15% remaining)', time: '2 hours ago' },
                { level: 'info', text: '5 teacher accounts pending approval', time: '1 day ago' },
                { level: 'warning', text: 'High server load detected', time: '2 days ago' }
            ]
        };

        // ========== INITIALIZE DASHBOARD ==========
        // This runs when the page is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            loadDashboard();      // Load all dashboard content
            setupCharts();        // Setup charts and graphs
            setupMobileMenu();    // Setup mobile menu functionality
            
            // Update dashboard every 30 seconds (optional)
            // setInterval(updateDashboard, 30000);
        });

        // ========== LOAD DASHBOARD ==========
        // This function loads all the dashboard content
        function loadDashboard() {
            const data = superAdminData;
            
            // Update header information
            document.getElementById('dashboardTitle').textContent = data.title;
            document.getElementById('welcomeMessage').textContent = data.welcome;
            document.getElementById('userName').textContent = data.userName;
            document.getElementById('userEmail').textContent = data.userEmail;
            document.getElementById('userAvatar').textContent = data.userAvatar;
            
            // Load navigation menu
            loadNavigation(data.navItems);
            
            // Load main dashboard content
            loadDashboardContent(data);
        }

        // ========== LOAD NAVIGATION MENU ==========
        // This creates the sidebar navigation menu
        function loadNavigation(navItems) {
            const sidebarNav = document.getElementById('sidebarNav');
            let navHTML = '';
            
            // Create HTML for each navigation item
            navItems.forEach(item => {
                navHTML += `
                    <div class="nav-item">
                        <a class="nav-link ${item.active ? 'active' : ''}" href="#" onclick="navigateTo('${item.name.toLowerCase().replace(/ /g, '-')}')">
                            <i class="fas ${item.icon}"></i>
                            <span>${item.name}</span>
                        </a>
                    </div>
                `;
            });
            
            sidebarNav.innerHTML = navHTML;
        }

        // ========== LOAD DASHBOARD CONTENT ==========
        // This creates the main dashboard content
        function loadDashboardContent(data) {
            const dashboardContent = document.getElementById('dashboardContent');
            
            // Create HTML for the dashboard
            dashboardContent.innerHTML = `
                <!-- Row 1: Quick Stats Cards -->
                <div class="row mb-4">
                    <!-- Card 1: Total Students -->
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="card-icon-container">
                                    <i class="fas fa-user-graduate text-white"></i>
                                </div>
                                <h2 class="card-value">${data.stats.totalStudents.toLocaleString()}</h2>
                                <h5 class="card-title mb-2">Total Students</h5>
                                <p class="card-label">Across all branches & levels</p>
                                <button class="btn btn-sm btn-gold mt-2" onclick="navigateTo('student-management')">
                                    View Details <i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 2: Teaching Staff -->
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="card-icon-container">
                                    <i class="fas fa-chalkboard-teacher text-white"></i>
                                </div>
                                <h2 class="card-value">${data.stats.totalTeachers}</h2>
                                <h5 class="card-title mb-2">Teaching Staff</h5>
                                <p class="card-label">Active teaching personnel</p>
                                <button class="btn btn-sm btn-gold mt-2" onclick="navigateTo('teacher-management')">
                                    Manage Teachers <i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 3: Total Staff -->
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="card-icon-container">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                                <h2 class="card-value">${data.stats.totalStaff}</h2>
                                <h5 class="card-title mb-2">Total Staff</h5>
                                <p class="card-label">Teaching + Non-teaching staff</p>
                                <button class="btn btn-sm btn-gold mt-2" onclick="showStaffDetails()">
                                    View Breakdown <i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 4: Schools/Branches -->
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
                        <div class="dashboard-card">
                            <div class="card-body">
                                <div class="card-icon-container">
                                    <i class="fas fa-school text-white"></i>
                                </div>
                                <h2 class="card-value">${data.stats.totalSchools}</h2>
                                <h5 class="card-title mb-2">Schools/Branches</h5>
                                <p class="card-label">Managed institutions</p>
                                <button class="btn btn-sm btn-gold mt-2" onclick="navigateTo('school-setup-configuration')">
                                    Configure <i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Row 2: Charts and Student Status -->
                <div class="row mb-4">
                    <!-- Student Distribution Chart -->
                    <div class="col-lg-8 mb-4">
                        <div class="activity-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-chart-pie me-2 text-gold"></i>
                                    Student Distribution by Level
                                </h5>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary active">Levels</button>
                                    <button class="btn btn-sm btn-outline-secondary">Branches</button>
                                    <button class="btn btn-sm btn-outline-secondary">Status</button>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Chart Canvas -->
                                <div class="col-md-8">
                                    <canvas id="studentDistributionChart" height="250"></canvas>
                                </div>
                                
                                <!-- Level Distribution Cards -->
                                <div class="col-md-4">
                                    <div class="d-flex flex-column gap-3">
                                        <!-- Nursery Card -->
                                        <div class="level-card nursery-card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="fw-bold mb-0">${data.stats.nurseryStudents}</h4>
                                                    <small class="text-muted">Nursery Students</small>
                                                </div>
                                                <i class="fas fa-baby fa-2x text-purple"></i>
                                            </div>
                                        </div>
                                        
                                        <!-- Primary Card -->
                                        <div class="level-card primary-card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="fw-bold mb-0">${data.stats.primaryStudents}</h4>
                                                    <small class="text-muted">Primary Students</small>
                                                </div>
                                                <i class="fas fa-child fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                        
                                        <!-- Secondary Card -->
                                        <div class="level-card secondary-card">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="fw-bold mb-0">${data.stats.secondaryStudents}</h4>
                                                    <small class="text-muted">Secondary Students</small>
                                                </div>
                                                <i class="fas fa-graduation-cap fa-2x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Student Status Overview -->
                    <div class="col-lg-4 mb-4">
                        <div class="activity-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-chart-bar me-2 text-gold"></i>
                                    Student Status Overview
                                </h5>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <!-- Active Students -->
                                <div class="quick-stat">
                                    <div class="flex-grow-1">
                                        <h4 class="fw-bold mb-0">${data.stats.activeStudents}</h4>
                                        <small class="text-muted">Active Students</small>
                                    </div>
                                    <i class="fas fa-user-check fa-2x text-success"></i>
                                </div>
                                
                                <!-- Inactive Students -->
                                <div class="quick-stat">
                                    <div class="flex-grow-1">
                                        <h4 class="fw-bold mb-0">${data.stats.inactiveStudents}</h4>
                                        <small class="text-muted">Inactive Students</small>
                                    </div>
                                    <i class="fas fa-user-clock fa-2x text-warning"></i>
                                </div>
                                
                                <!-- Suspended Students -->
                                <div class="quick-stat">
                                    <div class="flex-grow-1">
                                        <h4 class="fw-bold mb-0">${data.stats.suspendedStudents}</h4>
                                        <small class="text-muted">Suspended Students</small>
                                    </div>
                                    <i class="fas fa-user-slash fa-2x text-danger"></i>
                                </div>
                                
                                <!-- Graduated Students -->
                                <div class="quick-stat">
                                    <div class="flex-grow-1">
                                        <h4 class="fw-bold mb-0">${data.stats.graduatedStudents}</h4>
                                        <small class="text-muted">Graduated Students</small>
                                    </div>
                                    <i class="fas fa-user-graduate fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Row 3: Recent Activity and System Alerts -->
                <div class="row">
                    <!-- Recent Activity -->
                    <div class="col-lg-8 mb-4">
                        <div class="activity-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-history me-2 text-gold"></i>
                                    Recent System Activity
                                </h5>
                                <button class="btn btn-sm btn-gold" onclick="viewAllActivity()">
                                    <i class="fas fa-list me-1"></i> View All
                                </button>
                            </div>
                            <div class="activity-list">
                                <!-- Activity items will be added here -->
                                ${data.activities.map(activity => `
                                    <div class="activity-item d-flex align-items-start gap-3 py-3 border-bottom">
                                        <div class="activity-icon">
                                            <i class="fas ${activity.icon}"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 fw-medium">${activity.text}</p>
                                            <small class="text-muted">${activity.time}</small>
                                        </div>
                                        <span class="badge bg-${getActivityTypeColor(activity.type)}">
                                            ${activity.type}
                                        </span>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    </div>
                    
                    <!-- System Alerts -->
                    <div class="col-lg-4 mb-4">
                        <div class="activity-card border-top border-warning border-top-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-exclamation-triangle me-2 text-warning"></i>
                                    System Alerts
                                </h5>
                                <button class="btn btn-sm btn-outline-warning" onclick="dismissAllAlerts()">
                                    <i class="fas fa-check me-1"></i> Dismiss All
                                </button>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <!-- Alert items will be added here -->
                                ${data.alerts.map(alert => `
                                    <div class="alert alert-${alert.level} alert-dismissible fade show mb-2" role="alert">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <div class="flex-grow-1">
                                                <p class="mb-0">${alert.text}</p>
                                                <small>${alert.time}</small>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                `).join('')}
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-warning w-100" onclick="showSystemHealth()">
                                    <i class="fas fa-heartbeat me-2"></i> View System Health
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Row 4: Branch Distribution -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="activity-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-map-marker-alt me-2 text-gold"></i>
                                    Student Distribution by Branch
                                </h5>
                                <button class="btn btn-sm btn-gold" onclick="navigateTo('student-management')">
                                    <i class="fas fa-filter me-1"></i> Filter by Branch
                                </button>
                            </div>
                            <div class="row">
                                <!-- Branch cards will be added here -->
                                ${Object.entries(data.stats.branchStudents).map(([branch, count]) => `
                                    <div class="col-md-4 mb-3">
                                        <div class="quick-stat">
                                            <div class="flex-grow-1">
                                                <h4 class="fw-bold mb-0">${count.toLocaleString()}</h4>
                                                <small class="text-muted">${branch}</small>
                                            </div>
                                            <i class="fas fa-school fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Initialize charts after content is loaded
            setTimeout(setupCharts, 100);
        }

        // ========== SETUP CHARTS ==========
        // This function creates the charts and graphs
        function setupCharts() {
            // Student Distribution Chart (Pie/Doughnut Chart)
            const ctx = document.getElementById('studentDistributionChart');
            if (ctx) {
                new Chart(ctx.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Nursery', 'Primary', 'Secondary'],
                        datasets: [{
                            data: [
                                superAdminData.stats.nurseryStudents, 
                                superAdminData.stats.primaryStudents, 
                                superAdminData.stats.secondaryStudents
                            ],
                            backgroundColor: [
                                'rgba(156, 39, 176, 0.8)',
                                'rgba(33, 150, 243, 0.8)',
                                'rgba(76, 175, 80, 0.8)'
                            ],
                            borderColor: [
                                'rgba(156, 39, 176, 1)',
                                'rgba(33, 150, 243, 1)',
                                'rgba(76, 175, 80, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            }
        }

        // ========== SETUP MOBILE MENU ==========
        // This function handles the mobile menu toggle
        function setupMobileMenu() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const sidebar = document.querySelector('.sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            // Toggle sidebar when menu button is clicked
            mobileMenuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                sidebarOverlay.style.display = sidebar.classList.contains('active') ? 'block' : 'none';
            });
            
            // Close sidebar when overlay is clicked
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                sidebarOverlay.style.display = 'none';
            });
            
            // Close sidebar when window is resized to desktop size
            window.addEventListener('resize', function() {
                if (window.innerWidth > 767) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.style.display = 'none';
                }
            });
        }

        // ========== HELPER FUNCTIONS ==========
        // Get color for activity type badges
        function getActivityTypeColor(type) {
            const colors = {
                'student': 'info',
                'teacher': 'success',
                'admin': 'primary',
                'system': 'secondary',
                'finance': 'warning',
                'security': 'dark'
            };
            return colors[type] || 'secondary';
        }

        // ========== NAVIGATION FUNCTIONS ==========
        // Navigate to different pages
        function navigateTo(page) {
            alert(`Navigating to ${page.replace('-', ' ').toUpperCase()} page...\n\nThis would load the ${page.replace('-', ' ')} interface.`);
            
            // Close mobile sidebar if open
            if (window.innerWidth <= 767) {
                document.querySelector('.sidebar').classList.remove('active');
                document.getElementById('sidebarOverlay').style.display = 'none';
            }
        }

        // ========== ACTION FUNCTIONS ==========
        // These functions handle various actions in the dashboard
        
        function showAddUser() {
            alert('Add New User Modal\n\nThis would open a form to add new students, teachers, or admins.');
        }

        function showSystemSettings() {
            alert('System Settings Panel\n\nConfigure system-wide settings, academic calendar, grading system, etc.');
        }

        function showAnnouncements() {
            alert('Announcements Panel\n\nSend system-wide announcements to all users.');
        }

        function showStaffDetails() {
            const stats = superAdminData.stats;
            alert(`Staff Breakdown:\n\nTeaching Staff: ${stats.teachingStaff}\nNon-Teaching Staff: ${stats.nonTeachingStaff}\nTotal: ${stats.totalStaff}\n\nClick "View Details" to see individual staff members with their roles and assignments.`);
        }

        function showSystemHealth() {
            alert('System Health Dashboard\n\nView server status, storage usage, performance metrics, and system logs.');
        }

        function viewAllActivity() {
            alert('View All Activity\n\nComplete activity log with filtering and search options.');
        }

        function dismissAllAlerts() {
            alert('All system alerts have been dismissed.');
        }

        function logout() {
            if (confirm('Are you sure you want to sign out?')) {
                alert('You have been successfully signed out.');
                // In real implementation, this would redirect to login page
                // window.location.href = 'login.html';
            }
        }
    </script>
</body>
</html>
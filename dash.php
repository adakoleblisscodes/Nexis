<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis LMS - Complete Role-Based System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --superadmin-gold: #d4af37;
            --hos-blue: #2196f3;
            --classteacher-green: #4caf50;
            --subjectteacher-purple: #9c27b0;
            --navy-blue: #0a1a3a;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* ====== SIDEBAR ====== */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 0;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        
        /* FIXED LOGO CONTAINER */
        .logo-container {
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }
        
        .brand-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo-img-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-img {
            height: 40px;
            width: auto;
            object-fit: contain;
        }
        
        .brand-text {
            flex: 1;
        }
        
        .brand-text h6 {
            margin: 0;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }
        
        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            margin-left: 10px;
        }
        
        .role-badge.superadmin { background: var(--superadmin-gold); color: #000; }
        .role-badge.hos { background: var(--hos-blue); color: white; }
        .role-badge.classteacher { background: var(--classteacher-green); color: white; }
        .role-badge.subjectteacher { background: var(--subjectteacher-purple); color: white; }
        
        .nav-section {
            padding: 15px 20px 5px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 12px 20px;
            border-radius: 0;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--superadmin-gold);
            color: white;
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }
        
        /* ====== MAIN CONTENT ====== */
        .main-content {
            margin-left: 280px;
            padding: 20px;
            min-height: 100vh;
        }
        
        /* ====== DASHBOARD CARDS ====== */
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            height: 100%;
            border-top: 4px solid;
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .dashboard-card.superadmin { border-color: var(--superadmin-gold); }
        .dashboard-card.hos { border-color: var(--hos-blue); }
        .dashboard-card.classteacher { border-color: var(--classteacher-green); }
        .dashboard-card.subjectteacher { border-color: var(--subjectteacher-purple); }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
        }
        
        .stat-number.superadmin { color: var(--superadmin-gold); }
        .stat-number.hos { color: var(--hos-blue); }
        .stat-number.classteacher { color: var(--classteacher-green); }
        .stat-number.subjectteacher { color: var(--subjectteacher-purple); }
        
        /* ====== FEATURE SECTIONS ====== */
        .feature-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        .feature-item {
            padding: 15px;
            border-left: 4px solid;
            margin-bottom: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .feature-item.allowed {
            border-left-color: var(--classteacher-green);
            background: rgba(76, 175, 80, 0.05);
        }
        
        .feature-item.denied {
            border-left-color: #dc3545;
            background: rgba(220, 53, 69, 0.05);
            opacity: 0.6;
        }
        
        /* ====== ROLE SWITCHER ====== */
        .role-switcher {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        
        .role-switcher-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--navy-blue);
            color: white;
            border: none;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }
        
        .role-switcher-btn:hover {
            transform: scale(1.1);
            background: var(--superadmin-gold);
        }
        
        .role-options {
            position: absolute;
            bottom: 70px;
            right: 0;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            min-width: 250px;
            display: none;
        }
        
        .role-options.show {
            display: block;
        }
        
        .role-option {
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: background 0.2s;
        }
        
        .role-option:hover {
            background: #f8f9fa;
        }
        
        .role-option.active {
            background: #e3f2fd;
        }
        
        .role-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }
        
        .role-icon.superadmin { background: var(--superadmin-gold); }
        .role-icon.hos { background: var(--hos-blue); }
        .role-icon.classteacher { background: var(--classteacher-green); }
        .role-icon.subjectteacher { background: var(--subjectteacher-purple); }
        
        /* ====== RESPONSIVE ====== */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 id="dashboardTitle" class="h3 mb-1 fw-bold">Super Admin Dashboard</h3>
                <p id="welcomeMessage" class="text-muted mb-0">Full system control & management</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger ms-1">3</span>
                </button>
                <button class="btn btn-outline-secondary" onclick="showProfile()">
                    <i class="fas fa-user me-2"></i>Profile
                </button>
            </div>
        </div>
        
        <!-- Dashboard Content -->
        <div id="dashboardContent">
            <!-- Content loaded dynamically -->
        </div>
    </div>
    
    <!-- Role Switcher -->
    <div class="role-switcher">
        <button class="role-switcher-btn" onclick="toggleRoleSwitcher()">
            <i class="fas fa-users"></i>
        </button>
        <div class="role-options" id="roleOptions">
            <div class="role-option active" onclick="switchRole('superadmin')">
                <div class="role-icon superadmin">
                    <i class="fas fa-crown"></i>
                </div>
                <div>
                    <h6 class="mb-0">Super Administrator</h6>
                    <small class="text-muted">Full system control</small>
                </div>
            </div>
            <div class="role-option" onclick="switchRole('hos')">
                <div class="role-icon hos">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div>
                    <h6 class="mb-0">Head of School</h6>
                    <small class="text-muted">Branch-specific control</small>
                </div>
            </div>
            <div class="role-option" onclick="switchRole('classteacher')">
                <div class="role-icon classteacher">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <h6 class="mb-0">Class Teacher</h6>
                    <small class="text-muted">Class-specific control</small>
                </div>
            </div>
            <div class="role-option" onclick="switchRole('subjectteacher')">
                <div class="role-icon subjectteacher">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <h6 class="mb-0">Subject Teacher</h6>
                    <small class="text-muted">Subject-specific control</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // ==================== ROLE DATA ====================
        const roles = {
            superadmin: {
                id: 'superadmin',
                name: 'Super Administrator',
                badgeClass: 'superadmin',
                user: { name: 'Super Admin', email: 'admin@nexis.edu', avatar: 'SA', branch: 'All Branches' },
                stats: { students: 2375, teachers: 125, staff: 185, schools: 3 },
                navigation: [
                    { section: 'Overview', items: [
                        { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true }
                    ]},
                    { section: 'Management', items: [
                        { icon: 'fa-user-graduate', name: 'Student Management' },
                        { icon: 'fa-chalkboard-teacher', name: 'Teacher Management' },
                        { icon: 'fa-user-tie', name: 'Admin Management' },
                        { icon: 'fa-school', name: 'School Setup' }
                    ]},
                    { section: 'System', items: [
                        { icon: 'fa-shield-alt', name: 'Roles & Permissions' },
                        { icon: 'fa-money-check-alt', name: 'Payments History' },
                        { icon: 'fa-cogs', name: 'System Settings' },
                        { icon: 'fa-bell', name: 'Notifications' }
                    ]}
                ]
            },
            
            hos: {
                id: 'hos',
                name: 'Head of School',
                badgeClass: 'hos',
                user: { name: 'Dr. Adebayo Johnson', email: 'hos.main@nexis.edu', avatar: 'AJ', branch: 'Main Campus' },
                stats: { students: 1200, teachers: 45, classes: 36, attendance: 94.5 },
                navigation: [
                    { section: 'Overview', items: [
                        { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true }
                    ]},
                    { section: 'Management', items: [
                        { icon: 'fa-user-graduate', name: 'Student Management' },
                        { icon: 'fa-chalkboard-teacher', name: 'Teacher Management' }
                    ]},
                    { section: 'Academic', items: [
                        { icon: 'fa-chalkboard', name: 'Class Management' },
                        { icon: 'fa-book', name: 'Subject Management' },
                        { icon: 'fa-clipboard-check', name: 'Attendance' },
                        { icon: 'fa-chart-line', name: 'Results Management' }
                    ]},
                    { section: 'Communication', items: [
                        { icon: 'fa-users', name: 'Parents' }
                    ]},
                    { section: 'Reports', items: [
                        { icon: 'fa-chart-bar', name: 'Reports' }
                    ]},
                    { section: 'System', items: [
                        { icon: 'fa-bell', name: 'Notifications' },
                        { icon: 'fa-bullhorn', name: 'Announcements' }
                    ]}
                ]
            },
            
            classteacher: {
                id: 'classteacher',
                name: 'Class Teacher',
                badgeClass: 'classteacher',
                user: { name: 'Mrs. Chidinma Okoro', email: 'c.okoro@nexis.edu', avatar: 'CO', branch: 'Main Campus', class: 'Grade 10A' },
                stats: { students: 42, attendance: 96.2, male: 22, female: 20, average: 72.5 },
                navigation: [
                    { section: 'Overview', items: [
                        { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true }
                    ]},
                    { section: 'My Class', items: [
                        { icon: 'fa-users', name: 'My Class' },
                        { icon: 'fa-user-graduate', name: 'Students' },
                        { icon: 'fa-clipboard-check', name: 'Attendance' },
                        { icon: 'fa-chart-line', name: 'Results' }
                    ]},
                    { section: 'Communication', items: [
                        { icon: 'fa-user-friends', name: 'Parents' }
                    ]},
                    { section: 'System', items: [
                        { icon: 'fa-bell', name: 'Notifications' }
                    ]}
                ]
            },
            
            subjectteacher: {
                id: 'subjectteacher',
                name: 'Subject Teacher',
                badgeClass: 'subjectteacher',
                user: { name: 'Mr. Segun Adeyemi', email: 's.adeyemi@nexis.edu', avatar: 'SA', branch: 'Main Campus', subjects: ['Mathematics', 'Physics'] },
                stats: { subjects: 3, classes: 8, students: 185, submission: 60, avgScore: 68.3 },
                navigation: [
                    { section: 'Overview', items: [
                        { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true }
                    ]},
                    { section: 'Teaching', items: [
                        { icon: 'fa-book-open', name: 'My Subjects' },
                        { icon: 'fa-user-graduate', name: 'My Students' },
                        { icon: 'fa-chart-line', name: 'Results' },
                        { icon: 'fa-tasks', name: 'Assignments' }
                    ]},
                    { section: 'System', items: [
                        { icon: 'fa-bell', name: 'Notifications' }
                    ]}
                ]
            }
        };

        // ==================== APPLICATION STATE ====================
        let currentRole = 'superadmin';

        // ==================== INITIALIZE DASHBOARD ====================
        function loadDashboard() {
            const role = roles[currentRole];
            
            // Update Header
            document.getElementById('dashboardTitle').textContent = `${role.name} Dashboard`;
            document.getElementById('welcomeMessage').textContent = getWelcomeMessage(role);
            document.getElementById('userName').textContent = role.user.name;
            document.getElementById('userEmail').textContent = role.user.email;
            document.getElementById('userAvatar').textContent = role.user.avatar;
            document.getElementById('roleBadge').className = `role-badge ${role.badgeClass}`;
            document.getElementById('roleBadge').textContent = role.name.toUpperCase();
            
            // Navigation is provided by includes/sidebar.php (static links)
            
            // Load Content
            loadDashboardContent(role);
            
            // Update Role Switcher
            updateRoleSwitcher();
        }

        // Static sidebar is included server-side (includes/sidebar.php)

        function loadDashboardContent(role) {
            const content = document.getElementById('dashboardContent');
            
            switch(role.id) {
                case 'superadmin':
                    content.innerHTML = renderSuperAdminDashboard(role);
                    break;
                case 'hos':
                    content.innerHTML = renderHOSDashboard(role);
                    break;
                case 'classteacher':
                    content.innerHTML = renderClassTeacherDashboard(role);
                    break;
                case 'subjectteacher':
                    content.innerHTML = renderSubjectTeacherDashboard(role);
                    break;
            }
        }

        // ==================== DASHBOARD RENDERERS ====================
        function renderSuperAdminDashboard(role) {
            return `
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card superadmin">
                            <div class="stat-number superadmin">${role.stats.students.toLocaleString()}</div>
                            <h6 class="text-muted">Total Students</h6>
                            <p class="small mb-0">All branches combined</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card superadmin">
                            <div class="stat-number superadmin">${role.stats.teachers}</div>
                            <h6 class="text-muted">Teaching Staff</h6>
                            <p class="small mb-0">Across all schools</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card superadmin">
                            <div class="stat-number superadmin">${role.stats.staff}</div>
                            <h6 class="text-muted">Total Staff</h6>
                            <p class="small mb-0">Teaching + Non-teaching</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card superadmin">
                            <div class="stat-number superadmin">${role.stats.schools}</div>
                            <h6 class="text-muted">Schools/Branches</h6>
                            <p class="small mb-0">Managed institutions</p>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="feature-section">
                    <h4 class="fw-bold mb-4 text-superadmin">
                        <i class="fas fa-crown me-2"></i>Super Admin Features
                    </h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">🎓 Student Management</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View all students across all branches
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Add/Edit/Remove student records
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Transfer students between branches
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Filter by branch, level, class, gender
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">👨‍🏫 Teacher & Admin Management</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Manage all teachers across branches
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Create/Edit/Delete Admin accounts
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Assign roles (Principal, Bursar, etc.)
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Reset passwords for any user
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-12">
                            <h6 class="fw-bold mb-3">🏫 School Setup & Configuration</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Create new schools/branches
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Set academic calendar & grading system
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Lock/unlock school sessions
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Push system-wide announcements
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function renderHOSDashboard(role) {
            return `
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card hos">
                            <div class="stat-number hos">${role.stats.students.toLocaleString()}</div>
                            <h6 class="text-muted">Total Students</h6>
                            <p class="small mb-0">${role.user.branch} only</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card hos">
                            <div class="stat-number hos">${role.stats.teachers}</div>
                            <h6 class="text-muted">Teaching Staff</h6>
                            <p class="small mb-0">${role.user.branch} only</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card hos">
                            <div class="stat-number hos">${role.stats.classes}</div>
                            <h6 class="text-muted">Total Classes</h6>
                            <p class="small mb-0">${role.user.branch}</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card hos">
                            <div class="stat-number hos">${role.stats.attendance}%</div>
                            <h6 class="text-muted">Attendance Rate</h6>
                            <p class="small mb-0">Current term average</p>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="feature-section">
                    <h4 class="fw-bold mb-4 text-primary">
                        <i class="fas fa-user-tie me-2"></i>Head of School Features - ${role.user.branch}
                    </h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">🎓 Branch Student Management</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View all students in ${role.user.branch}
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Add new students to branch
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Edit student records in branch
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Transfer students within branch only
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">👨‍🏫 Branch Teacher Management</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View all teachers in ${role.user.branch}
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Add teachers to branch
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Assign teachers to classes/subjects
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Suspend teachers in branch
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">📚 Academic Management</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Create and manage classes
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Manage subjects for branch
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Monitor attendance reports
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Approve/publish results for branch
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">🚫 Restrictions</h6>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                Cannot access other branches
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                Cannot manage admins or roles
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                Cannot change system-wide settings
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                Cannot enable/disable modules
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function renderClassTeacherDashboard(role) {
            return `
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card classteacher">
                            <div class="stat-number classteacher">${role.stats.students}</div>
                            <h6 class="text-muted">Total Students</h6>
                            <p class="small mb-0">${role.user.class}</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card classteacher">
                            <div class="stat-number classteacher">${role.stats.attendance}%</div>
                            <h6 class="text-muted">Attendance Rate</h6>
                            <p class="small mb-0">Current week</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card classteacher">
                            <div class="stat-number classteacher">${role.stats.male}/${role.stats.female}</div>
                            <h6 class="text-muted">Male/Female</h6>
                            <p class="small mb-0">Gender distribution</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card classteacher">
                            <div class="stat-number classteacher">${role.stats.average}%</div>
                            <h6 class="text-muted">Class Average</h6>
                            <p class="small mb-0">Last assessment</p>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="feature-section">
                    <h4 class="fw-bold mb-4 text-success">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Class Teacher Features - ${role.user.class}
                    </h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">👨‍🏫 My Class Management</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View students in ${role.user.class}
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Mark daily attendance for class
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Edit attendance (within timeframe)
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View attendance reports
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">📊 Results & Academic</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Enter continuous assessment (CA)
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Enter exam scores for class
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View class result summaries
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View full academic history
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">👨‍👩‍👧 Parent Communication</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View parent/guardian contact details
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Send notifications/messages to parents
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Update student remarks/comments
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">🚫 Restrictions</h6>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                No access to other classes
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                Cannot add or remove students
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                No teacher or subject management
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                No result approval or publishing
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function renderSubjectTeacherDashboard(role) {
            return `
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card subjectteacher">
                            <div class="stat-number subjectteacher">${role.stats.subjects}</div>
                            <h6 class="text-muted">Subjects Assigned</h6>
                            <p class="small mb-0">${role.user.subjects.join(', ')}</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card subjectteacher">
                            <div class="stat-number subjectteacher">${role.stats.classes}</div>
                            <h6 class="text-muted">Classes Assigned</h6>
                            <p class="small mb-0">Currently teaching</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card subjectteacher">
                            <div class="stat-number subjectteacher">${role.stats.students}</div>
                            <h6 class="text-muted">Total Students</h6>
                            <p class="small mb-0">Taught across all classes</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="dashboard-card subjectteacher">
                            <div class="stat-number subjectteacher">${role.stats.submission}%</div>
                            <h6 class="text-muted">Results Submitted</h6>
                            <p class="small mb-0">Current term progress</p>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="feature-section">
                    <h4 class="fw-bold mb-4 text-purple">
                        <i class="fas fa-book me-2"></i>Subject Teacher Features
                    </h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">📚 My Subjects & Classes</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View assigned subjects: ${role.user.subjects.join(', ')}
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View assigned classes (${role.stats.classes} classes)
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View students in assigned classes
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View academic records (read-only)
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">📊 Results Management</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Enter CA (Continuous Assessment) scores
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Enter exam scores for subjects
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Edit scores before submission deadline
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Submit results for approval
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">📝 Teaching Activities</h6>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Create assignments for students
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Grade assignments and provide feedback
                            </div>
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Upload teaching materials
                            </div>
                            ${role.stats.avgScore ? `
                            <div class="feature-item allowed">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                View average performance per subject
                            </div>` : ''}
                        </div>
                        
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">🚫 Restrictions</h6>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                No student creation or editing
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                No class or subject creation
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                No teacher management
                            </div>
                            <div class="feature-item denied">
                                <i class="fas fa-times-circle text-danger me-2"></i>
                                No result approval or publishing
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // ==================== HELPER FUNCTIONS ====================
        function getWelcomeMessage(role) {
            switch(role.id) {
                case 'superadmin': return 'Full system control & management';
                case 'hos': return `Managing ${role.user.branch} only`;
                case 'classteacher': return `Managing ${role.user.class} only`;
                case 'subjectteacher': return `Teaching ${role.user.subjects.join(', ')}`;
                default: return '';
            }
        }

        function switchRole(roleId) {
            currentRole = roleId;
            loadDashboard();
            toggleRoleSwitcher();
        }

        function toggleRoleSwitcher() {
            document.getElementById('roleOptions').classList.toggle('show');
        }

        function updateRoleSwitcher() {
            document.querySelectorAll('.role-option').forEach(option => {
                option.classList.remove('active');
                if (option.onclick.toString().includes(currentRole)) {
                    option.classList.add('active');
                }
            });
        }

        function navigateTo(page) {
            alert(`[${roles[currentRole].name}] Navigating to: ${page}`);
        }

        function showProfile() {
            const role = roles[currentRole];
            alert(`Profile Information:\n\nName: ${role.user.name}\nRole: ${role.name}\nEmail: ${role.user.email}\nBranch: ${role.user.branch}`);
        }

        function logout() {
            if (confirm('Are you sure you want to sign out?')) {
                alert('You have been signed out successfully.');
                // In real app: window.location.href = '/login';
            }
        }

        // Close role switcher when clicking outside
        document.addEventListener('click', function(event) {
            const switcher = document.getElementById('roleOptions');
            const button = document.querySelector('.role-switcher-btn');
            
            if (!switcher.contains(event.target) && !button.contains(event.target)) {
                switcher.classList.remove('show');
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', loadDashboard);
    </script>
</body>
</html>
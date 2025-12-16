<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis LMS - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <style>
        :root {
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
            --sidebar-width: 280px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--navy-blue) 0%, var(--navy-blue-light) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo-container img {
            height: 45px;
            width: auto;
        }
        
        .platform-name {
            font-size: 20px;
            font-weight: 700;
            color: white;
        }
        
        .sidebar-nav {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            text-decoration: none;
            cursor: pointer;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(212, 175, 55, 0.15);
            color: white;
            border-left: 3px solid var(--gold-primary);
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 18px;
        }
        
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }
        
        .user-info {
            text-align: center;
            margin-bottom: 15px;
        }
        
        .user-id {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 5px;
        }
        
        .user-role {
            font-size: 14px;
            color: var(--gold-secondary);
            font-weight: 600;
        }
        
        .logout-btn {
            width: 100%;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        /* Main Content */
        #content {
            margin-left: var(--sidebar-width);
            padding: 25px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }
        
        /* Top Header */
        .top-header {
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .page-title h1 {
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 28px;
        }
        
        .welcome-text {
            color: #666;
            font-size: 14px;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--navy-blue);
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4444;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 20px;
        }
        
        .user-details h3 {
            font-size: 16px;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .user-details p {
            font-size: 12px;
            color: #666;
        }
        
        /* Role Selector */
        .role-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .role-btn {
            padding: 12px 24px;
            border: 2px solid #ddd;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #666;
        }
        
        .role-btn:hover {
            border-color: var(--navy-blue);
            color: var(--navy-blue);
        }
        
        .role-btn.active {
            background: var(--navy-blue);
            border-color: var(--navy-blue);
            color: white;
        }
        
        /* Dashboard Content */
        .dashboard-section {
            display: none;
        }
        
        .dashboard-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            border: 1px solid #e9ecef;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
        }
        
        .super-admin .card-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .admin .card-icon {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .head-teacher .card-icon {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .teacher .card-icon {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        .student .card-icon {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
        
        .card-title {
            font-weight: 700;
            color: var(--navy-blue);
            font-size: 16px;
        }
        
        .card-content {
            margin-top: 15px;
        }
        
        .card-number {
            font-size: 32px;
            font-weight: 800;
            color: var(--navy-blue);
            margin-bottom: 10px;
        }
        
        .card-label {
            font-size: 14px;
            color: #666;
        }
        
        .card-footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .card-action {
            color: var(--navy-blue);
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        
        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .actions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .actions-title {
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .actions-title i {
            color: var(--gold-primary);
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .action-item {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .action-item:hover {
            transform: translateY(-3px);
            background: white;
            border-color: var(--gold-primary);
        }
        
        .action-icon {
            width: 50px;
            height: 50px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--gold-primary);
            font-size: 22px;
        }
        
        .action-name {
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .action-desc {
            font-size: 13px;
            color: #666;
        }
        
        /* Recent Activity */
        .recent-activity {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .activity-title {
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .activity-title i {
            color: var(--gold-primary);
        }
        
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid var(--gold-primary);
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-primary);
        }
        
        .activity-details {
            flex: 1;
        }
        
        .activity-text {
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .activity-time {
            font-size: 12px;
            color: #666;
        }
        
        /* Toggle Button for Mobile */
        #sidebarCollapse {
            display: none;
            background: var(--navy-blue);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 15px;
            margin-bottom: 20px;
        }
        
        /* Buttons */
        .btn-outline {
            background: white;
            color: var(--navy-blue);
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: #f8f9fa;
            border-color: var(--navy-blue);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .dashboard-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 992px) {
            #sidebar {
                margin-left: -280px;
            }
            
            #sidebar.active {
                margin-left: 0;
            }
            
            #content {
                margin-left: 0;
            }
            
            #sidebarCollapse {
                display: block;
            }
            
            .dashboard-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .top-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .header-actions {
                flex-direction: column;
            }
            
            .role-selector {
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <img src="assets/images/Nexis logo.png" alt="logo" height="45">
                <h1 class="platform-name">Nexis</h1>
            </div>
        </div>
        
        <div class="sidebar-nav" id="sidebarNav">
            <!-- Navigation will be populated based on role -->
        </div>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <p class="user-id" id="userId">ID: T-001</p>
                <p class="user-role" id="userRole">Class Teacher</p>
            </div>
            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Sign Out
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="content">
        <!-- Top Header -->
        <button type="button" id="sidebarCollapse" class="btn">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="top-header">
            <div class="page-title">
                <h1 id="dashboardTitle">Teacher Dashboard</h1>
                <p class="welcome-text" id="welcomeMessage">Welcome back, Mr. David Williams</p>
            </div>
            <div class="header-actions">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <div class="user-profile">
                    <div class="user-avatar">DW</div>
                    <div class="user-details">
                        <h3 id="userName">Mr. David Williams</h3>
                        <p id="userDetails">Grade 3 • Mathematics</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Selector -->
        <div class="role-selector">
            <button class="role-btn active" onclick="switchRole('teacher')">
                Class Teacher
            </button>
            <button class="role-btn" onclick="switchRole('super-admin')">
                Super Admin
            </button>
            <button class="role-btn" onclick="switchRole('admin')">
                School Admin
            </button>
            <button class="role-btn" onclick="switchRole('head-teacher')">
                Head Teacher
            </button>
    
        </div>

        <!-- Dashboard Sections -->
        <div id="dashboardContent">
            <!-- Content will be populated based on selected role -->
        </div>
    </div>

    <script>
        // Role Data - Just UI, no logic
        const roleData = {
            'super-admin': {
                title: 'Super Admin Dashboard',
                welcome: 'System Administration & Control',
                userName: 'Sarah Admin',
                userDetails: 'System Administrator • Full Access',
                userAvatar: 'SA',
                userId: 'SA-001',
                userRole: 'Super Administrator',
                navItems: [
                    { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true },
                    { icon: 'fa-users', name: 'All Users' },
                    { icon: 'fa-school', name: 'All Schools' },
                    { icon: 'fa-chalkboard-teacher', name: 'All Teachers' },
                    { icon: 'fa-user-graduate', name: 'All Students' },
                    { icon: 'fa-cogs', name: 'System Settings' },
                    { icon: 'fa-chart-bar', name: 'Analytics' },
                    { icon: 'fa-shield-alt', name: 'Security' }
                ],
                cards: [
                    { icon: 'fa-school', title: 'Total Schools', value: '3', label: 'Nursery, Primary, Secondary', action: 'View All' },
                    { icon: 'fa-users', title: 'Total Users', value: '2,500', label: 'Across all levels', action: 'Manage Users' },
                    { icon: 'fa-chalkboard-teacher', title: 'Teachers', value: '125', label: 'Active teaching staff', action: 'View Staff' },
                    { icon: 'fa-user-graduate', title: 'Students', value: '2,375', label: 'Enrolled students', action: 'View Students' }
                ],
                quickActions: [
                    { icon: 'fa-user-plus', name: 'Add User', desc: 'Create new user accounts' },
                    { icon: 'fa-school', name: 'Add School', desc: 'Register new school' },
                    { icon: 'fa-cog', name: 'System Settings', desc: 'Configure system settings' },
                    { icon: 'fa-shield-alt', name: 'Security', desc: 'Manage security settings' },
                    { icon: 'fa-download', name: 'Backup', desc: 'System backup' },
                    { icon: 'fa-chart-bar', name: 'Reports', desc: 'Generate reports' }
                ],
                activities: [
                    { icon: 'fa-user-plus', text: 'New user account created', time: '10 minutes ago' },
                    { icon: 'fa-cog', text: 'System settings updated', time: '30 minutes ago' },
                    { icon: 'fa-shield-alt', text: 'Security audit completed', time: '2 hours ago' },
                    { icon: 'fa-download', text: 'System backup initiated', time: '4 hours ago' }
                ]
            },
            'admin': {
                title: 'School Admin Dashboard',
                welcome: 'School Administration & Management',
                userName: 'Michael Johnson',
                userDetails: 'School Administrator • Primary School',
                userAvatar: 'MJ',
                userId: 'AD-001',
                userRole: 'School Administrator',
                navItems: [
                    { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true },
                    { icon: 'fa-users', name: 'Students' },
                    { icon: 'fa-chalkboard-teacher', name: 'Teachers' },
                    { icon: 'fa-book', name: 'Courses' },
                    { icon: 'fa-calendar-alt', name: 'Timetable' },
                    { icon: 'fa-chart-bar', name: 'Reports' },
                    { icon: 'fa-cog', name: 'Settings' }
                ],
                cards: [
                    { icon: 'fa-user-graduate', title: 'Total Students', value: '856', label: 'Primary School students', action: 'View Students' },
                    { icon: 'fa-chalkboard-teacher', title: 'Teachers', value: '42', label: 'Teaching staff', action: 'View Teachers' },
                    { icon: 'fa-book', title: 'Courses', value: '12', label: 'Active courses', action: 'Manage Courses' },
                    { icon: 'fa-percentage', title: 'Attendance', value: '92%', label: 'Today\'s attendance', action: 'View Details' }
                ],
                quickActions: [
                    { icon: 'fa-user-plus', name: 'Add Student', desc: 'Enroll new student' },
                    { icon: 'fa-chalkboard-teacher', name: 'Add Teacher', desc: 'Add teaching staff' },
                    { icon: 'fa-book-medical', name: 'Add Course', desc: 'Create new course' },
                    { icon: 'fa-calendar-plus', name: 'Schedule', desc: 'Manage timetable' },
                    { icon: 'fa-file-export', name: 'Export', desc: 'Export reports' },
                    { icon: 'fa-bell', name: 'Announcements', desc: 'Send announcements' }
                ],
                activities: [
                    { icon: 'fa-user-graduate', text: '5 new students enrolled', time: '15 minutes ago' },
                    { icon: 'fa-chalkboard-teacher', text: 'Teacher assigned to class', time: '1 hour ago' },
                    { icon: 'fa-calendar', text: 'New timetable published', time: '3 hours ago' },
                    { icon: 'fa-bell', text: 'Announcement sent to parents', time: '5 hours ago' }
                ]
            },
            'head-teacher': {
                title: 'Head Teacher Dashboard',
                welcome: 'Academic Leadership & Supervision',
                userName: 'Dr. Lisa Chen',
                userDetails: 'Head Teacher • Secondary School',
                userAvatar: 'LC',
                userId: 'HT-001',
                userRole: 'Head Teacher',
                navItems: [
                    { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true },
                    { icon: 'fa-chalkboard-teacher', name: 'My Teachers' },
                    { icon: 'fa-user-graduate', name: 'Students' },
                    { icon: 'fa-chart-bar', name: 'Performance' },
                    { icon: 'fa-calendar-check', name: 'Attendance' },
                    { icon: 'fa-file-alt', name: 'Reports' },
                    { icon: 'fa-comments', name: 'Communications' }
                ],
                cards: [
                    { icon: 'fa-chalkboard-teacher', title: 'Teachers', value: '15', label: 'Under supervision', action: 'View Teachers' },
                    { icon: 'fa-user-graduate', title: 'Students', value: '320', label: 'Total students', action: 'View Students' },
                    { icon: 'fa-chart-line', title: 'Performance', value: '85%', label: 'Average score', action: 'View Details' },
                    { icon: 'fa-calendar-check', title: 'Attendance', value: '94%', label: 'This week', action: 'View Report' }
                ],
                quickActions: [
                    { icon: 'fa-clipboard-check', name: 'Approve Leave', desc: 'Teacher leave requests' },
                    { icon: 'fa-chart-line', name: 'Performance', desc: 'View performance reports' },
                    { icon: 'fa-calendar-alt', name: 'Schedule', desc: 'View school schedule' },
                    { icon: 'fa-comment-alt', name: 'Feedback', desc: 'Provide feedback' },
                    { icon: 'fa-bullhorn', name: 'Announce', desc: 'Make announcements' },
                    { icon: 'fa-file-export', name: 'Reports', desc: 'Generate reports' }
                ],
                activities: [
                    { icon: 'fa-clipboard-check', text: 'Leave request approved', time: '20 minutes ago' },
                    { icon: 'fa-chart-line', text: 'Performance report reviewed', time: '1 hour ago' },
                    { icon: 'fa-comment-alt', text: 'Feedback provided to teacher', time: '2 hours ago' },
                    { icon: 'fa-bullhorn', text: 'Staff meeting announced', time: '1 day ago' }
                ]
            },
            'teacher': {
                title: 'Teacher Dashboard',
                welcome: 'Welcome back, Mr. David Williams',
                userName: 'Mr. David Williams',
                userDetails: 'Grade 3 • Mathematics',
                userAvatar: 'DW',
                userId: 'T-001',
                userRole: 'Class Teacher',
                navItems: [
                    { icon: 'fa-tachometer-alt', name: 'Dashboard', active: true },
                    { icon: 'fa-user-graduate', name: 'My Students' },
                    { icon: 'fa-book', name: 'My Courses' },
                    { icon: 'fa-tasks', name: 'Assignments' },
                    { icon: 'fa-graduation-cap', name: 'Grades' },
                    { icon: 'fa-calendar-alt', name: 'Schedule' },
                    { icon: 'fa-comments', name: 'Messages' }
                ],
                cards: [
                    { icon: 'fa-user-graduate', title: 'Students', value: '32', label: 'In my class', action: 'View Class' },
                    { icon: 'fa-book', title: 'Courses', value: '4', label: 'Subjects teaching', action: 'View Courses' },
                    { icon: 'fa-tasks', title: 'Assignments', value: '8', label: 'Pending grading', action: 'Grade Now' },
                    { icon: 'fa-clock', title: 'Schedule', value: 'Today', label: 'Next: Mathematics 10 AM', action: 'View Schedule' }
                ],
                quickActions: [
                    { icon: 'fa-tasks', name: 'Create Assignment', desc: 'New assignment' },
                    { icon: 'fa-graduation-cap', name: 'Enter Grades', desc: 'Grade student work' },
                    { icon: 'fa-calendar-plus', name: 'Schedule', desc: 'View timetable' },
                    { icon: 'fa-comment-alt', name: 'Feedback', desc: 'Student feedback' },
                    { icon: 'fa-envelope', name: 'Message Parents', desc: 'Send messages' },
                    { icon: 'fa-chart-bar', name: 'Progress', desc: 'Student progress' }
                ],
                activities: [
                    { icon: 'fa-tasks', text: 'Assignment created for Mathematics', time: '30 minutes ago' },
                    { icon: 'fa-graduation-cap', text: 'Grades entered for Science test', time: '2 hours ago' },
                    { icon: 'fa-comment-alt', text: 'Feedback sent to 5 students', time: '4 hours ago' },
                    { icon: 'fa-envelope', text: 'Message sent to parent', time: '1 day ago' }
                ]
            },
            
        };

        // Current role (default: teacher)
        let currentRole = 'teacher';

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            initializeDashboard();
            setupMobileSidebar();
        });

        // Switch role
        function switchRole(role) {
            currentRole = role;
            
            // Update active button
            document.querySelectorAll('.role-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Update dashboard
            updateDashboard();
        }

        // Initialize dashboard
        function initializeDashboard() {
            updateDashboard();
        }

        // Update dashboard based on role
        function updateDashboard() {
            const data = roleData[currentRole];
            
            // Update header
            document.getElementById('dashboardTitle').textContent = data.title;
            document.getElementById('welcomeMessage').textContent = data.welcome;
            document.getElementById('userName').textContent = data.userName;
            document.getElementById('userDetails').textContent = data.userDetails;
            document.querySelector('.user-avatar').textContent = data.userAvatar;
            
            // Update sidebar
            document.getElementById('userId').textContent = `ID: ${data.userId}`;
            document.getElementById('userRole').textContent = data.userRole;
            
            updateNavigation(data.navItems);
            updateDashboardContent(data);
        }

        // Update navigation
        function updateNavigation(navItems) {
            const sidebarNav = document.getElementById('sidebarNav');
            sidebarNav.innerHTML = navItems.map(item => `
                <li class="nav-item">
                    <a class="nav-link ${item.active ? 'active' : ''}">
                        <i class="fas ${item.icon}"></i>
                        <span>${item.name}</span>
                    </a>
                </li>
            `).join('');
        }

        // Update dashboard content
        function updateDashboardContent(data) {
            const dashboardContent = document.getElementById('dashboardContent');
            
            dashboardContent.innerHTML = `
                <div class="dashboard-cards ${currentRole}">
                    ${data.cards.map(card => `
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="fas ${card.icon}"></i>
                                </div>
                                <div class="card-title">${card.title}</div>
                            </div>
                            <div class="card-content">
                                <div class="card-number">${card.value}</div>
                                <div class="card-label">${card.label}</div>
                            </div>
                            <div class="card-footer">
                                <div class="card-action">
                                    <span>${card.action}</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    `).join('')}
                </div>
                
                <div class="quick-actions">
                    <div class="actions-header">
                        <h2 class="actions-title">
                            <i class="fas fa-bolt"></i> Quick Actions
                        </h2>
                        <button class="btn-outline">
                            <i class="fas fa-ellipsis-h"></i> More Actions
                        </button>
                    </div>
                    <div class="actions-grid">
                        ${data.quickActions.map(action => `
                            <div class="action-item">
                                <div class="action-icon">
                                    <i class="fas ${action.icon}"></i>
                                </div>
                                <div class="action-name">${action.name}</div>
                                <div class="action-desc">${action.desc}</div>
                            </div>
                        `).join('')}
                    </div>
                </div>
                
                <div class="recent-activity" style="margin-top: 30px;">
                    <div class="activity-header">
                        <h2 class="activity-title">
                            <i class="fas fa-history"></i> Recent Activity
                        </h2>
                        <button class="btn-outline">
                            <i class="fas fa-list"></i> View All
                        </button>
                    </div>
                    <div class="activity-list">
                        ${data.activities.map(activity => `
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas ${activity.icon}"></i>
                                </div>
                                <div class="activity-details">
                                    <div class="activity-text">${activity.text}</div>
                                    <div class="activity-time">${activity.time}</div>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
        }

        // Mobile sidebar toggle
        function setupMobileSidebar() {
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const sidebar = document.getElementById('sidebar');
            
            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }
    </script>
</body>
</html>
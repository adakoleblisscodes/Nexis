<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | School Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --navy: #0a1a3a;
            --navy-light: #1e3a8a;
            --orange: #0a1a3a;
            --orange-light: #ff8c42;
            --white: #ffffff;
            --grey-light: #f8f9fa;
            --grey: #6c757d;
            --grey-dark: #1e3a8a;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
        }
        /*  */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: var(--grey-dark);
            overflow-x: hidden;
        }

        /* Navigation */
        .main-nav {
            background-color: var(--navy) !important;
            padding: 0.8rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--white) !important;
        }

        .btn-notification {
            background: transparent;
            border: none;
            color: var(--white);
            font-size: 1.2rem;
            position: relative;
            padding: 0.5rem;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--orange);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-dropdown {
            min-width: 320px;
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--grey-light);
            transition: background-color 0.2s;
        }

        .notification-item:hover {
            background-color: var(--grey-light);
        }

        .notification-item.unread {
            background-color: rgba(255, 107, 53, 0.05);
            border-left: 3px solid var(--orange);
        }

        .notification-time {
            font-size: 0.8rem;
            color: var(--grey);
        }

        .btn-profile {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: var(--white);
            display: flex;
            align-items: center;
            padding: 0.4rem 1rem;
        }

        .avatar {
            width: 35px;
            height: 35px;
            background-color: var(--orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--white);
            min-height: calc(100vh - 56px);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem 0;
        }

        .sidebar-sticky {
            position: sticky;
            top: 1.5rem;
        }

        .nav-link {
            color: var(--grey-dark);
            padding: 0.75rem 1.5rem;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            margin-bottom: 0.25rem;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--navy);
            background-color: rgba(10, 36, 99, 0.05);
            border-left: 3px solid var(--orange);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        .sidebar-heading {
            font-size: 0.9rem;
            text-transform: uppercase;
            color: var(--grey);
            padding: 0 1.5rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .btn-quick-action {
            width: 100%;
            background-color: var(--grey-light);
            color: var(--navy);
            border: 1px solid #dee2e6;
            text-align: left;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .btn-quick-action:hover {
            background-color: var(--navy);
            color: var(--white);
        }

        /* Main Content */
        .main-content {
            padding: 1.5rem;
        }

        .welcome-card {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(10, 36, 99, 0.1);
        }

        .welcome-card h2 {
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        /* Stat Cards */
        .stat-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            height: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.5rem;
            color: white;
        }

        .attendance-card .stat-icon {
            background-color: var(--success);
        }

        .assignments-card .stat-icon {
            background-color: var(--warning);
        }

        .exams-card .stat-icon {
            background-color: var(--danger);
        }

        .fees-card .stat-icon {
            background-color: var(--info);
        }

        .stat-content h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: var(--navy);
        }

        .stat-content p {
            color: var(--grey);
            margin-bottom: 0.5rem;
        }

        .progress {
            height: 6px;
            background-color: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-bar {
            background-color: var(--success);
        }

        .stat-badge {
            display: inline-block;
            background-color: rgba(10, 36, 99, 0.1);
            color: var(--navy);
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background-color: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #e9ecef;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h5 {
            margin: 0;
            color: var(--navy);
            font-weight: 600;
        }

        .card-header h5 i {
            color: var(--orange);
        }

        .view-all {
            color: var(--orange);
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Schedule List */
        .schedule-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .schedule-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            background-color: var(--grey-light);
            border-radius: 8px;
            border-left: 4px solid var(--orange);
        }

        .schedule-time {
            min-width: 100px;
            font-weight: 600;
            color: var(--navy);
        }

        .schedule-details {
            flex-grow: 1;
        }

        .schedule-subject {
            font-weight: 600;
            margin-bottom: 0.1rem;
        }

        .schedule-teacher {
            font-size: 0.9rem;
            color: var(--grey);
        }

        .schedule-room {
            background-color: var(--navy);
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Announcement List */
        .announcement-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .announcement-item {
            padding-bottom: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .announcement-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .announcement-title {
            font-weight: 600;
            color: var(--navy);
            margin-bottom: 0.25rem;
        }

        .announcement-meta {
            font-size: 0.85rem;
            color: var(--grey);
            margin-bottom: 0.5rem;
        }

        .announcement-meta i {
            margin-right: 0.25rem;
        }

        .announcement-desc {
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .announcement-priority {
            display: inline-block;
            padding: 0.1rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .priority-high {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        .priority-medium {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning);
        }

        .priority-low {
            background-color: rgba(108, 117, 125, 0.1);
            color: var(--grey);
        }

        /* Chart Filter */
        .chart-filter {
            width: 150px;
        }

        /* Quick Links */
        .quick-links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .quick-link-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            background-color: var(--grey-light);
            border-radius: 8px;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .quick-link-item:hover {
            background-color: rgba(10, 36, 99, 0.05);
            border-left: 3px solid var(--orange);
            transform: translateX(5px);
            text-decoration: none;
            color: inherit;
        }

        .quick-link-icon {
            width: 40px;
            height: 40px;
            background-color: var(--orange);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            margin-right: 1rem;
        }

        .quick-link-text h6 {
            font-weight: 600;
            color: var(--navy);
            margin-bottom: 0.1rem;
        }

        .quick-link-text p {
            font-size: 0.85rem;
            color: var(--grey);
            margin-bottom: 0;
        }

        /* Toast Notification */
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                min-height: auto;
                padding: 1rem 0;
            }
            
            .nav-link span {
                display: inline-block;
            }
            
            .main-content {
                padding: 1rem;
            }
        }

        @media (max-width: 768px) {
            .stat-card {
                flex-direction: column;
                text-align: center;
            }
            
            .stat-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            
            .navbar-brand span {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                Student Portal
            </a>
            
            <div class="d-flex align-items-center">
                <!-- Notifications -->
                <div class="dropdown me-3">
                    <button class="btn btn-notification" type="button" id="notificationDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge" id="notificationCount">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end notification-dropdown">
                        <h6 class="dropdown-header">Notifications</h6>
                        <div class="notification-list" id="notificationList">
                            <!-- Notifications loaded via JS -->
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="#" id="markAllRead">Mark all as read</a>
                    </div>
                </div>
                
                <!-- User Profile -->
                <div class="dropdown">
                    <button class="btn btn-profile" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                        <div class="avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="ms-2 d-none d-md-inline">Alex Johnson</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">Class 12 - Section A</h6>
                        <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>My Profile</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-calendar-alt me-2"></i>
                                Timetable
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-tasks me-2"></i>
                                Assignments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-chart-line me-2"></i>
                                Grades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-calendar-check me-2"></i>
                                Attendance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-book me-2"></i>
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-file-invoice-dollar me-2"></i>
                                Fees
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-book-reader me-2"></i>
                                Library
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-comments me-2"></i>
                                Messages
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Quick Actions -->
                    <div class="quick-actions mt-4">
                        <h6 class="sidebar-heading">Quick Actions</h6>
                        <button class="btn btn-quick-action mb-2">
                            <i class="fas fa-upload me-2"></i>
                            Submit Assignment
                        </button>
                        <button class="btn btn-quick-action mb-2">
                            <i class="fas fa-download me-2"></i>
                            Download Report
                        </button>
                        <button class="btn btn-quick-action">
                            <i class="fas fa-print me-2"></i>
                            Print Schedule
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Dashboard -->
            <div class="col-lg-10 col-md-9 main-content">
                <!-- Welcome Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="welcome-card">
                            <h2>Welcome back, Alex!</h2>
                            <p class="mb-0 current-time">Here's your academic overview for today, <span id="currentDate"></span></p>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="stat-card attendance-card">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-content">
                                <h3>96%</h3>
                                <p>Attendance</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 96%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="stat-card assignments-card">
                            <div class="stat-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <div class="stat-content">
                                <h3>3</h3>
                                <p>Pending Assignments</p>
                                <span class="stat-badge">2 Due this week</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="stat-card exams-card">
                            <div class="stat-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="stat-content">
                                <h3>15 Days</h3>
                                <p>Next Exam</p>
                                <span class="stat-badge">Math Finals</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="stat-card fees-card">
                            <div class="stat-icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="stat-content">
                                <h3>Paid</h3>
                                <p>Fee Status</p>
                                <span class="stat-badge">Next due: Jan 15</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Row -->
                <div class="row">
                    <!-- Today's Schedule -->
                    <div class="col-lg-6 mb-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5><i class="fas fa-calendar-day me-2"></i>Today's Schedule</h5>
                                <a href="#" class="view-all">View Full Timetable</a>
                            </div>
                            <div class="card-body">
                                <div class="schedule-list" id="scheduleList">
                                    <!-- Schedule items loaded via JS -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Announcements -->
                    <div class="col-lg-6 mb-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5><i class="fas fa-bullhorn me-2"></i>Recent Announcements</h5>
                                <a href="#" class="view-all">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="announcement-list" id="announcementList">
                                    <!-- Announcements loaded via JS -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Performance Chart -->
                    <div class="col-lg-8 mb-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5><i class="fas fa-chart-line me-2"></i>Academic Performance</h5>
                                <div class="chart-filter">
                                    <select class="form-select form-select-sm" id="chartFilter">
                                        <option value="monthly">This Month</option>
                                        <option value="semester">This Semester</option>
                                        <option value="yearly">This Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-4 mb-4">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h5><i class="fas fa-rocket me-2"></i>Quick Access</h5>
                            </div>
                            <div class="card-body">
                                <div class="quick-links">
                                    <a href="#" class="quick-link-item">
                                        <div class="quick-link-icon">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div class="quick-link-text">
                                            <h6>Course Materials</h6>
                                            <p>Access study resources</p>
                                        </div>
                                    </a>
                                    
                                    <a href="#" class="quick-link-item">
                                        <div class="quick-link-icon">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </div>
                                        <div class="quick-link-text">
                                            <h6>Online Classes</h6>
                                            <p>Join virtual classroom</p>
                                        </div>
                                    </a>
                                    
                                    <a href="#" class="quick-link-item">
                                        <div class="quick-link-icon">
                                            <i class="fas fa-file-medical-alt"></i>
                                        </div>
                                        <div class="quick-link-text">
                                            <h6>Report Cards</h6>
                                            <p>Download latest reports</p>
                                        </div>
                                    </a>
                                    
                                    <a href="#" class="quick-link-item">
                                        <div class="quick-link-icon">
                                            <i class="fas fa-calendar-plus"></i>
                                        </div>
                                        <div class="quick-link-text">
                                            <h6>Event Calendar</h6>
                                            <p>View school events</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Dashboard Data and Functionality
        // Sample Data
        const notifications = [
            { id: 1, title: "Math Assignment Due", message: "Submit your algebra assignment by Friday", time: "2 hours ago", read: false },
            { id: 2, title: "Parent-Teacher Meeting", message: "Scheduled for next Monday at 3 PM", time: "1 day ago", read: false },
            { id: 3, title: "Library Book Due", message: "Return 'Physics Fundamentals' by tomorrow", time: "2 days ago", read: true },
            { id: 4, title: "Exam Schedule Updated", message: "Check the updated final exam schedule", time: "3 days ago", read: true }
        ];

        const todaySchedule = [
            { time: "08:00 - 09:00", subject: "Mathematics", teacher: "Mr. Johnson", room: "Room 301" },
            { time: "09:15 - 10:15", subject: "Physics", teacher: "Ms. Williams", room: "Lab 2" },
            { time: "10:30 - 11:30", subject: "English Literature", teacher: "Mrs. Davis", room: "Room 205" },
            { time: "11:45 - 12:45", subject: "Computer Science", teacher: "Mr. Chen", room: "Comp Lab" },
            { time: "14:00 - 15:00", subject: "History", teacher: "Mr. Roberts", room: "Room 112" }
        ];

        const announcements = [
            { id: 1, title: "Winter Break Schedule", description: "School will be closed from Dec 23 to Jan 3 for winter break.", author: "Principal's Office", time: "Yesterday", priority: "high" },
            { id: 2, title: "Science Fair Registration", description: "Register for the annual science fair by November 30.", author: "Science Dept", time: "2 days ago", priority: "medium" },
            { id: 3, title: "Sports Day Update", description: "Sports day has been rescheduled to December 15 due to weather.", author: "Sports Committee", time: "3 days ago", priority: "medium" },
            { id: 4, title: "New Library Books", description: "New collection of reference books available in the library.", author: "Library", time: "5 days ago", priority: "low" }
        ];

        // DOM Elements
        const notificationList = document.getElementById('notificationList');
        const notificationCount = document.getElementById('notificationCount');
        const markAllReadBtn = document.getElementById('markAllRead');
        const scheduleList = document.getElementById('scheduleList');
        const announcementList = document.getElementById('announcementList');
        const chartFilter = document.getElementById('chartFilter');
        const currentDateElement = document.getElementById('currentDate');

        // Initialize Dashboard
        document.addEventListener('DOMContentLoaded', function() {
            updateCurrentDate();
            renderNotifications();
            renderSchedule();
            renderAnnouncements();
            initPerformanceChart();
            
            // Add event listeners
            markAllReadBtn.addEventListener('click', markAllNotificationsAsRead);
            chartFilter.addEventListener('change', updateChart);
            
            // Simulate real-time updates
            setInterval(updateDashboardTime, 60000); // Update time every minute
            
            // Add click handlers for stat cards
            document.querySelectorAll('.stat-card').forEach(card => {
                card.addEventListener('click', handleStatCardClick);
            });
            
            // Add click handlers for quick actions
            document.querySelectorAll('.btn-quick-action').forEach(button => {
                button.addEventListener('click', handleQuickActionClick);
            });
            
            // Add click handlers for quick links
            document.querySelectorAll('.quick-link-item').forEach(link => {
                link.addEventListener('click', handleQuickLinkClick);
            });
            
            // Simulate live notifications
            setInterval(simulateLiveNotification, 30000); // Every 30 seconds
        });

        // Update current date
        function updateCurrentDate() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateString = now.toLocaleDateString('en-US', options);
            currentDateElement.textContent = dateString;
        }

        // Render Notifications
        function renderNotifications() {
            const unreadCount = notifications.filter(n => !n.read).length;
            notificationCount.textContent = unreadCount;
            
            let notificationsHTML = '';
            
            if (notifications.length === 0) {
                notificationsHTML = '<div class="text-center p-3 text-muted">No notifications</div>';
            } else {
                notifications.forEach(notification => {
                    notificationsHTML += `
                        <div class="notification-item ${notification.read ? '' : 'unread'}" data-id="${notification.id}">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">${notification.title}</h6>
                                <small class="notification-time">${notification.time}</small>
                            </div>
                            <p class="mb-0 text-muted small">${notification.message}</p>
                            ${!notification.read ? '<span class="badge bg-orange float-end mt-1">New</span>' : ''}
                        </div>
                    `;
                });
            }
            
            notificationList.innerHTML = notificationsHTML;
            
            // Add click event to mark as read
            document.querySelectorAll('.notification-item').forEach(item => {
                item.addEventListener('click', function() {
                    const id = parseInt(this.getAttribute('data-id'));
                    markAsRead(id);
                });
            });
        }

        // Mark notification as read
        function markAsRead(id) {
            const notification = notifications.find(n => n.id === id);
            if (notification && !notification.read) {
                notification.read = true;
                renderNotifications();
                showToast('Notification marked as read');
            }
        }

        // Mark all notifications as read
        function markAllNotificationsAsRead(e) {
            e.preventDefault();
            e.stopPropagation();
            
            let hasUnread = false;
            notifications.forEach(notification => {
                if (!notification.read) {
                    notification.read = true;
                    hasUnread = true;
                }
            });
            
            if (hasUnread) {
                renderNotifications();
                showToast('All notifications marked as read');
            }
        }

        // Render Today's Schedule
        function renderSchedule() {
            let scheduleHTML = '';
            
            todaySchedule.forEach(item => {
                scheduleHTML += `
                    <div class="schedule-item">
                        <div class="schedule-time">${item.time}</div>
                        <div class="schedule-details ms-3">
                            <div class="schedule-subject">${item.subject}</div>
                            <div class="schedule-teacher">${item.teacher}</div>
                        </div>
                        <div class="schedule-room">${item.room}</div>
                    </div>
                `;
            });
            
            scheduleList.innerHTML = scheduleHTML;
        }

        // Render Announcements
        function renderAnnouncements() {
            let announcementsHTML = '';
            
            announcements.forEach(announcement => {
                announcementsHTML += `
                    <div class="announcement-item">
                        <div class="announcement-title">${announcement.title}
                            <span class="announcement-priority priority-${announcement.priority}">${announcement.priority.toUpperCase()}</span>
                        </div>
                        <div class="announcement-meta">
                            <i class="fas fa-user"></i> ${announcement.author} • 
                            <i class="far fa-clock"></i> ${announcement.time}
                        </div>
                        <div class="announcement-desc">${announcement.description}</div>
                    </div>
                `;
            });
            
            announcementList.innerHTML = announcementsHTML;
        }

        // Initialize Performance Chart
        function initPerformanceChart() {
            const ctx = document.getElementById('performanceChart').getContext('2d');
            
            // Sample data
            const monthlyData = {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
                datasets: [{
                    label: 'Mathematics',
                    data: [85, 88, 82, 90, 87, 92],
                    borderColor: '#0a2463',
                    backgroundColor: 'rgba(10, 36, 99, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }, {
                    label: 'Physics',
                    data: [78, 82, 80, 85, 83, 88],
                    borderColor: '#ff6b35',
                    backgroundColor: 'rgba(255, 107, 53, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }, {
                    label: 'English',
                    data: [90, 92, 88, 91, 93, 95],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };
            
            const semesterData = {
                labels: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Overall Average',
                    data: [82, 85, 84, 88, 90],
                    borderColor: '#0a2463',
                    backgroundColor: 'rgba(10, 36, 99, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };
            
            const yearlyData = {
                labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                datasets: [{
                    label: 'Yearly Performance',
                    data: [80, 84, 87, 90],
                    borderColor: '#0a2463',
                    backgroundColor: 'rgba(10, 36, 99, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };
            
            const chartConfig = {
                type: 'line',
                data: monthlyData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            padding: 10,
                            cornerRadius: 6
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 70,
                            max: 100,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            };
            
            window.performanceChart = new Chart(ctx, chartConfig);
            window.chartData = {
                monthly: monthlyData,
                semester: semesterData,
                yearly: yearlyData
            };
        }

        // Update Chart based on filter
        function updateChart() {
            const filterValue = chartFilter.value;
            const newData = window.chartData[filterValue];
            
            window.performanceChart.data = newData;
            window.performanceChart.update();
            showToast(`Chart updated to show ${filterValue} data`);
        }

        // Update Dashboard Time
        function updateDashboardTime() {
            updateCurrentDate();
        }

        // Handle Stat Card Clicks
        function handleStatCardClick(e) {
            const card = e.currentTarget;
            let message = '';
            
            if (card.classList.contains('attendance-card')) {
                message = 'Opening Attendance Details...';
            } else if (card.classList.contains('assignments-card')) {
                message = 'Opening Pending Assignments...';
            } else if (card.classList.contains('exams-card')) {
                message = 'Opening Exam Schedule...';
            } else if (card.classList.contains('fees-card')) {
                message = 'Opening Fee Details...';
            }
            
            showToast(message);
        }

        // Handle Quick Action Clicks
        function handleQuickActionClick(e) {
            const action = e.currentTarget.textContent.trim();
            showToast(`Action: ${action} - This would open the corresponding module.`);
        }

        // Handle Quick Link Clicks
        function handleQuickLinkClick(e) {
            e.preventDefault();
            const linkText = e.currentTarget.querySelector('h6').textContent;
            showToast(`Opening: ${linkText}`);
        }

        // Simulate Live Notifications
        function simulateLiveNotification() {
            if (Math.random() > 0.7) {
                const notificationsList = [
                    "Reminder: Submit Math assignment",
                    "New grade posted for Physics test",
                    "Library book due tomorrow",
                    "Sports practice cancelled today",
                    "Teacher posted new course material"
                ];
                
                const newNotification = {
                    id: notifications.length + 1,
                    title: notificationsList[Math.floor(Math.random() * notificationsList.length)],
                    message: "Please check the details in the corresponding section.",
                    time: "Just now",
                    read: false
                };
                
                notifications.unshift(newNotification);
                if (notifications.length > 10) notifications.pop();
                renderNotifications();
                
                // Show a subtle notification
                showToast("New notification: " + newNotification.title);
            }
        }

        // Toast notification function
        function showToast(message) {
            // Create toast element
            const toastId = 'toast-' + Date.now();
            const toastHTML = `
                <div id="${toastId}" class="toast show" role="alert" style="background-color: var(--white); border-left: 4px solid var(--orange);">
                    <div class="toast-header" style="background-color: var(--navy); color: white;">
                        <i class="fas fa-bell me-2"></i>
                        <strong class="me-auto">Student Portal</strong>
                        <small>Just now</small>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;
            
            // Create container if it doesn't exist
            let toastContainer = document.getElementById('toastContainer');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.className = 'toast-container';
                toastContainer.id = 'toastContainer';
                document.body.appendChild(toastContainer);
            }
            
            // Add toast to container
            const toastElement = document.createElement('div');
            toastElement.innerHTML = toastHTML;
            toastContainer.appendChild(toastElement.firstElementChild);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                const toast = document.getElementById(toastId);
                if (toast) {
                    toast.remove();
                }
            }, 5000);
            
            // Add close functionality
            const closeBtn = document.querySelector(`#${toastId} .btn-close`);
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    const toast = document.getElementById(toastId);
                    if (toast) {
                        toast.remove();
                    }
                });
            }
        }

        // Initialize date on load
        window.onload = function() {
            updateCurrentDate();
        };
    </script>
</body>
</html>
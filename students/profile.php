<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Profile Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
            --white: #ffffff;
            --off-white: #f9fafb;
            --light-gray: #f1f5f9;
            --medium-gray: #e2e8f0;
            --text-gray: #64748b;
            --text-dark: #334155;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --border-radius: 12px;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--off-white);
            color: var(--navy-blue);
            line-height: 1.6;
        }

        /* Header Styling */
        .portal-header {
            background: linear-gradient(135deg, var(--navy-blue), var(--navy-blue-light));
            color: var(--white);
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: var(--white);
        }

        .logo-section p {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
        }

        .user-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .notification-badge {
            background: var(--gold-primary);
            color: var(--navy-blue);
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-weight: 600;
        }

        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Welcome Section */
        .welcome-section {
            margin-bottom: 2.5rem;
        }

        .welcome-card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--gold-primary);
        }

        .welcome-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            color: var(--text-gray);
            font-size: 1rem;
            margin-bottom: 0;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--border-radius);
            padding: 1.75rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--hover-shadow);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
        }

        .stat-card.attendance::before { background: var(--success); }
        .stat-card.assignments::before { background: var(--warning); }
        .stat-card.exams::before { background: var(--danger); }
        .stat-card.fees::before { background: var(--info); }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .stat-card.attendance .stat-icon { 
            background: rgba(16, 185, 129, 0.1); 
            color: var(--success);
        }
        .stat-card.assignments .stat-icon { 
            background: rgba(245, 158, 11, 0.1); 
            color: var(--warning);
        }
        .stat-card.exams .stat-icon { 
            background: rgba(239, 68, 68, 0.1); 
            color: var(--danger);
        }
        .stat-card.fees .stat-icon { 
            background: rgba(59, 130, 246, 0.1); 
            color: var(--info);
        }

        .stat-value {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--navy-blue);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 0.25rem;
        }

        .stat-detail {
            font-size: 0.875rem;
            color: var(--text-gray);
            margin-bottom: 0;
        }

        /* Main Content Layout */
        .content-layout {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        @media (min-width: 992px) {
            .content-layout {
                grid-template-columns: 2fr 1fr;
            }
        }

        /* Section Cards */
        .section-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
        }

        .section-header {
            background: linear-gradient(135deg, var(--navy-blue-light), var(--navy-blue));
            color: var(--white);
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
            color: var(--white);
        }

        .section-action {
            color: var(--gold-primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.875rem;
            transition: color 0.2s ease;
        }

        .section-action:hover {
            color: var(--gold-secondary);
            text-decoration: underline;
        }

        /* Profile Card */
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid var(--gold-primary);
            object-fit: cover;
            margin: -60px auto rem;
            position: absolute;
            background: var(--white);
        }

        .profile-info {
            padding: 3rem;
            text-align: center;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 0.25rem;
        }

        .profile-meta {
            color: var(--text-gray);
            font-size: 0.875rem;
            margin-bottom: 2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            text-align: left;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-label {
            font-size: 0.75rem;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .info-value {
            font-size: 0.875rem;
            color: var(--navy-blue);
            font-weight: 500;
        }

        /* Schedule Items */
        .schedule-item {
            display: flex;
            align-items: center;
            padding: 1.25rem;
            border-bottom: 1px solid var(--medium-gray);
            transition: background-color 0.2s ease;
        }

        .schedule-item:last-child {
            border-bottom: none;
        }

        .schedule-item:hover {
            background-color: var(--light-gray);
        }

        .schedule-time {
            min-width: 100px;
            font-weight: 600;
            color: var(--navy-blue);
            font-size: 0.875rem;
        }

        .schedule-content {
            flex: 1;
        }

        .schedule-subject {
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 0.25rem;
        }

        .schedule-teacher {
            font-size: 0.875rem;
            color: var(--text-gray);
        }

        .schedule-room {
            background: var(--navy-blue);
            color: var(--white);
            padding: 0.375rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Announcements */
        .announcement-item {
            padding: 1.5rem;
            border-bottom: 1px solid var(--medium-gray);
            transition: all 0.2s ease;
        }

        .announcement-item:hover {
            background-color: var(--light-gray);
        }

        .announcement-item:last-child {
            border-bottom: none;
        }

        .announcement-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 0.5rem;
        }

        .announcement-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.75rem;
            color: var(--text-gray);
            margin-bottom: 0.75rem;
        }

        .announcement-content {
            font-size: 0.875rem;
            color: var(--text-dark);
            line-height: 1.5;
        }

        .priority-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.625rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .priority-high { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
        .priority-medium { background: rgba(245, 158, 11, 0.1); color: var(--warning); }
        .priority-low { background: rgba(59, 130, 246, 0.1); color: var(--info); }

        /* Documents & Actions */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--white);
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .action-item:hover {
            border-color: var(--gold-primary);
            transform: translateY(-2px);
            box-shadow: var(--card-shadow);
        }

        .action-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--navy-blue), var(--navy-blue-light));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1rem;
        }

        .action-icon.gold {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
        }

        .action-info {
            flex: 1;
        }

        .action-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 0.125rem;
        }

        .action-desc {
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        /* Buttons */
        .btn-gold {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: var(--navy-blue);
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
        }

        .btn-outline-navy {
            border: 2px solid var(--navy-blue);
            color: var(--navy-blue);
            background: transparent;
            padding: 0.625rem 1.25rem;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-outline-navy:hover {
            background: var(--navy-blue);
            color: var(--white);
        }

        /* Footer */
        .portal-footer {
            background: var(--navy-blue);
            color: var(--white);
            padding: 2rem 0;
            margin-top: 4rem;
            text-align: center;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
            margin-bottom: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 0 1rem;
            }
            
            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .welcome-card {
                padding: 1.5rem;
            }
            
            .section-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .profile-avatar {
                width: 100px;
                height: 100px;
                margin: -50px auto 1rem;
                position: relative;
            }
        }

        /* Print Styles */
        @media print {
            .portal-header,
            .portal-footer,
            .btn-gold,
            .btn-outline-navy,
            .section-action {
                display: none !important;
            }
            
            .stat-card,
            .section-card {
                box-shadow: none !important;
                border: 1px solid var(--medium-gray);
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="portal-header">
        <div class="main-container">
            <div class="header-content">
                <div class="logo-section">
                    <h1>Student Portal</h1>
                    <p>Academic Management System</p>
                </div>
                <div class="user-actions">
                    <span class="notification-badge">3 New</span>
                    <button class="btn-gold" onclick="location.href='#'">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-container">
        <!-- Welcome Section -->
        <section class="welcome-section">
            <div class="welcome-card">
                <h1 class="welcome-title">Welcome back, Alex Johnson!</h1>
                <p class="welcome-subtitle" id="currentDate"></p>
            </div>
        </section>

        <!-- Stats Overview -->
        <section class="stats-section">
            <div class="stats-grid">
                <div class="stat-card attendance">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-value">96%</div>
                    <div class="stat-label">Attendance Rate</div>
                    <div class="stat-detail">Excellent attendance record</div>
                </div>
                
                <div class="stat-card assignments">
                    <div class="stat-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-value">3</div>
                    <div class="stat-label">Pending Assignments</div>
                    <div class="stat-detail">2 due this week</div>
                </div>
                
                <div class="stat-card exams">
                    <div class="stat-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="stat-value">15</div>
                    <div class="stat-label">Days to Next Exam</div>
                    <div class="stat-detail">Mathematics Final</div>
                </div>
                
                <div class="stat-card fees">
                    <div class="stat-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="stat-value">Paid</div>
                    <div class="stat-label">Fee Status</div>
                    <div class="stat-detail">Next due: Jan 15, 2026</div>
                </div>
            </div>
        </section>

        <!-- Main Content Layout -->
        <div class="content-layout">
            <!-- Left Column -->
            <div>
                <!-- Profile Information -->
                <section class="profile-section">
                    <div class="section-card">
                        <div class="section-header">
                            <h2 class="section-title">Profile Information</h2>
                        
                        </div>
                        
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Alex Johnson" class="profile-avatar">
                        
                        <div class="profile-info">
                            <h3 class="profile-name">Alex Johnson</h3>
                            <p class="profile-meta">Student ID: STU2024001 • Grade 12 • Science Stream</p>
                            
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">Date of Birth</div>
                                    <div class="info-value">March 15, 2007 (Age 17)</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">alex.johnson@student.school.edu</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Contact Number</div>
                                    <div class="info-value">+1 (555) 123-4567</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Emergency Contact</div>
                                    <div class="info-value">Sarah Johnson • +1 (555) 987-6543</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Today's Schedule -->
                <section class="schedule-section">
                    <div class="section-card">
                        <div class="section-header">
                            <h2 class="section-title">Today's Schedule</h2>
                            <a href="#" class="section-action">View Full Timetable</a>
                        </div>
                        
                        <div class="schedule-list">
                            <div class="schedule-item">
                                <div class="schedule-time">08:00 - 09:00</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">Mathematics</div>
                                    <div class="schedule-teacher">Mr. Robert Johnson</div>
                                </div>
                                <div class="schedule-room">301</div>
                            </div>
                            
                            <div class="schedule-item">
                                <div class="schedule-time">09:15 - 10:15</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">Physics</div>
                                    <div class="schedule-teacher">Ms. Emily Williams</div>
                                </div>
                                <div class="schedule-room">Lab 2</div>
                            </div>
                            
                            <div class="schedule-item">
                                <div class="schedule-time">10:30 - 11:30</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">English Literature</div>
                                    <div class="schedule-teacher">Mrs. Sarah Davis</div>
                                </div>
                                <div class="schedule-room">205</div>
                            </div>
                            
                            <div class="schedule-item">
                                <div class="schedule-time">14:00 - 15:00</div>
                                <div class="schedule-content">
                                    <div class="schedule-subject">Computer Science</div>
                                    <div class="schedule-teacher">Mr. David Chen</div>
                                </div>
                                <div class="schedule-room">Comp Lab</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column -->
            <div>
                <!-- Recent Announcements -->
                <section class="announcements-section">
                    <div class="section-card">
                        <div class="section-header">
                            <h2 class="section-title">Recent Announcements</h2>
                            <a href="#" class="section-action">View All</a>
                        </div>
                        
                        <div class="announcements-list">
                            <div class="announcement-item">
                                <div class="announcement-title">
                                    Winter Break Schedule
                                    <span class="priority-badge priority-high">High Priority</span>
                                </div>
                                <div class="announcement-meta">
                                    <span><i class="fas fa-building me-1"></i>Principal's Office</span>
                                    <span><i class="far fa-clock me-1"></i>Yesterday</span>
                                </div>
                                <div class="announcement-content">
                                    School will be closed from December 23, 2025 to January 3, 2026 for winter break.
                                </div>
                            </div>
                            
                            <div class="announcement-item">
                                <div class="announcement-title">
                                    Science Fair Registration
                                    <span class="priority-badge priority-medium">Medium Priority</span>
                                </div>
                                <div class="announcement-meta">
                                    <span><i class="fas fa-flask me-1"></i>Science Department</span>
                                    <span><i class="far fa-clock me-1"></i>2 days ago</span>
                                </div>
                                <div class="announcement-content">
                                    Registration for the annual science fair is now open. Deadline: November 30, 2025.
                                </div>
                            </div>
                            
                            <div class="announcement-item">
                                <div class="announcement-title">
                                    Sports Day Update
                                    <span class="priority-badge priority-medium">Medium Priority</span>
                                </div>
                                <div class="announcement-meta">
                                    <span><i class="fas fa-running me-1"></i>Sports Committee</span>
                                    <span><i class="far fa-clock me-1"></i>3 days ago</span>
                                </div>
                                <div class="announcement-content">
                                    Annual Sports Day has been rescheduled to December 15, 2025 due to weather conditions.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Quick Actions -->
                <section class="actions-section">
                    <div class="section-card">
                        <div class="section-header">
                            <h2 class="section-title">Quick Actions</h2>
                        </div>
                        
                        <div class="actions-grid">
                            <a href="#" class="action-item" onclick="printProfile()">
                                <div class="action-icon gold">
                                    <i class="fas fa-print"></i>
                                </div>
                                <div class="action-info">
                                    <div class="action-name">Print Profile</div>
                                    <div class="action-desc">Generate hard copy</div>
                                </div>
                            </a>
                            
                            <a href="#" class="action-item" onclick="downloadPDF()">
                                <div class="action-icon gold">
                                    <i class="fas fa-download"></i>
                                </div>
                                <div class="action-info">
                                    <div class="action-name">Export PDF</div>
                                    <div class="action-desc">Download profile</div>
                                </div>
                            </a>
                            
                            <a href="#" class="action-item" onclick="viewDocuments()">
                                <div class="action-icon">
                                    <i class="fas fa-folder"></i>
                                </div>
                                <div class="action-info">
                                    <div class="action-name">Documents</div>
                                    <div class="action-desc">View all files</div>
                                </div>
                            </a>
                            
                            <a href="#" class="action-item" onclick="contactSupport()">
                                <div class="action-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div class="action-info">
                                    <div class="action-name">Support</div>
                                    <div class="action-desc">Get help</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="portal-footer">
        <div class="footer-content">
            <p class="footer-text">
                &copy; 2025 Student Portal v2.0 • Academic Management System • All rights reserved
            </p>
            <p class="footer-text">
                Last updated: December 22, 2025 • <a href="#" style="color: var(--gold-primary); text-decoration: none;">Privacy Policy</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Initialize current date
        function initializeDate() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            const dateString = now.toLocaleDateString('en-US', options);
            document.getElementById('currentDate').textContent = 
                `Your academic overview for ${dateString}`;
        }

        // Profile Actions
        function editProfile() {
            alert('Edit Profile functionality would open here.');
            // In production: window.location.href = '/edit-profile';
        }

        function printProfile() {
            alert('Opening print preview...');
            window.print();
        }

        function downloadPDF() {
            alert('Generating PDF download...');
            // In production: window.open('/download-profile-pdf', '_blank');
        }

        function viewDocuments() {
            alert('Opening documents section...');
            // In production: window.location.href = '/documents';
        }

        function contactSupport() {
            alert('Redirecting to support portal...');
            // In production: window.location.href = '/support';
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initializeDate();
            
            // Add hover effects to interactive elements
            const interactiveElements = document.querySelectorAll('.action-item, .schedule-item, .announcement-item');
            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    this.style.cursor = 'pointer';
                });
            });
        });
    </script>
</body>
</html>
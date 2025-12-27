<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Nexis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <style>
        :root {
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
            --sidebar-width: 260px;
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
        
        /* Logout button specific styling */
        .nav-link.logout-link {
            background: rgba(220, 53, 69, 0.1);
            margin-top: 20px;
            border-left: 3px solid transparent;
        }
        
        .nav-link.logout-link:hover {
            background: rgba(220, 53, 69, 0.2);
            border-left: 3px solid #dc3545;
            color: white;
        }
        
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }
        
        .student-info {
            text-align: center;
        }
        
        .student-id {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 5px;
        }
        
        .student-class {
            font-size: 14px;
            color: var(--gold-secondary);
            font-weight: 600;
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
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .student-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--navy-blue), var(--navy-blue-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 20px;
        }
        
        .student-details h3 {
            font-size: 16px;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .student-details p {
            font-size: 12px;
            color: #666;
        }
        
        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-top: 4px solid var(--gold-primary);
            transition: transform 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-icon {
            width: 50px;
            height: 50px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .stats-icon i {
            color: var(--gold-primary);
            font-size: 24px;
        }
        
        .stats-number {
            font-size: 28px;
            font-weight: 800;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .stats-label {
            color: #666;
            font-size: 14px;
            font-weight: 600;
        }
        
        /* Quick Actions */
        .section-title {
            color: var(--navy-blue);
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid var(--gold-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            color: var(--gold-primary);
        }
        
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .action-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #e9ecef;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            border-left: 4px solid var(--gold-primary);
        }
        
        .action-icon {
            width: 50px;
            height: 50px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .action-icon i {
            color: var(--gold-primary);
            font-size: 24px;
        }
        
        .action-title {
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .action-desc {
            color: #666;
            font-size: 13px;
            line-height: 1.5;
        }
        
        /* Timetable */
        .timetable-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .timetable-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .timetable-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .timetable-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            border-left: 4px solid var(--gold-primary);
        }
        
        .class-time {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .class-name {
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .class-teacher {
            font-size: 12px;
            color: #888;
        }
        
        /* Recent Grades */
        .grades-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        .grades-table th {
            background: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            color: var(--navy-blue);
            font-weight: 600;
            font-size: 14px;
        }
        
        .grades-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }
        
        .grade-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .grade-a {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .grade-b {
            background: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }
        
        .grade-c {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        /* Logout confirmation modal */
        .logout-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }
        
        .logout-modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .logout-modal-icon {
            font-size: 48px;
            color: #dc3545;
            margin-bottom: 15px;
        }
        
        .logout-modal-title {
            color: var(--navy-blue);
            margin-bottom: 10px;
            font-size: 20px;
        }
        
        .logout-modal-text {
            color: #666;
            margin-bottom: 25px;
            font-size: 15px;
        }
        
        .logout-modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .btn-cancel {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .btn-logout {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .btn-cancel:hover {
            background: #5a6268;
        }
        
        .btn-logout:hover {
            background: #c82333;
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
        
        /* Responsive */
        @media (max-width: 992px) {
            #sidebar {
                margin-left: -260px;
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
            
            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .stats-row {
                grid-template-columns: 1fr;
            }
            
            .quick-actions-grid {
                grid-template-columns: 1fr;
            }
            
            .timetable-grid {
                grid-template-columns: 1fr;
            }
            
            .logout-modal-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
   <?php include "../includes/students_sidebar.php"; ?>

    <!-- Main Content -->
    <div id="content">
        <!-- Top Header -->
        <button type="button" id="sidebarCollapse" class="btn">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="top-header">
            <div class="page-title">
                <h1>Student Dashboard</h1>
                <p class="welcome-text">Welcome back, Alex Johnson! Here's your academic overview</p>
            </div>
            <div class="user-info">
                <div class="student-avatar">AJ</div>
                <div class="student-details">
                    <h3>Alex Johnson</h3>
                    <p>Grade 10 | Science Stream</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-row">
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="stats-number">83.85</div>
                <div class="stats-label">Current Average</div>
            </div>
            
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="stats-number">3</div>
                <div class="stats-label">Pending Assignments</div>
            </div>
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stats-number">15</div>
                <div class="stats-label">Days to Final Exams</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <h2 class="section-title">
            <i class="fas fa-bolt"></i> Quick Actions
        </h2>
        
        <div class="quick-actions-grid">
            <div class="action-card" onclick="openSection('assignments')">
                <div class="action-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="action-title">Submit Assignment</h3>
                <p class="action-desc">Upload completed work for Mathematics assignment due tomorrow</p>
            </div>
            
            <div class="action-card" onclick="openSection('timetable')">
                <div class="action-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="action-title">View Today's Schedule</h3>
                <p class="action-desc">Check your classes and activities for today</p>
            </div>
            
            <div class="action-card" onclick="openSection('resources')">
                <div class="action-icon">
                    <i class="fas fa-download"></i>
                </div>
                <h3 class="action-title">Download Resources</h3>
                <p class="action-desc">Access study materials and lecture notes</p>
            </div>
            
            <div class="action-card" onclick="openSection('grades')">
                <div class="action-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="action-title">View Progress Report</h3>
                <p class="action-desc">Check your academic performance analytics</p>
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 30px;">
            <!-- Today's Timetable -->
            <div style="flex: 1; min-width: 300px;">
                <div class="timetable-section">
                    <div class="timetable-header">
                        <h2 class="section-title" style="border: none; margin: 0;">
                            <i class="fas fa-calendar-day"></i> Today's Schedule
                        </h2>
                        <span class="date">Wednesday, Mar 20</span>
                    </div>
                    
                    <div class="timetable-grid">
                        <div class="timetable-card">
                            <div class="class-time">08:00 - 09:30</div>
                            <h4 class="class-name">Mathematics</h4>
                            <p class="class-teacher">Mr. Williams | Room 302</p>
                        </div>
                        
                        <div class="timetable-card">
                            <div class="class-time">09:45 - 11:15</div>
                            <h4 class="class-name">Physics</h4>
                            <p class="class-teacher">Dr. Chen | Lab 4</p>
                        </div>
                        
                        <div class="timetable-card">
                            <div class="class-time">11:30 - 13:00</div>
                            <h4 class="class-name">English Literature</h4>
                            <p class="class-teacher">Ms. Rodriguez | Room 215</p>
                        </div>
                        
                        <div class="timetable-card">
                            <div class="class-time">14:00 - 15:30</div>
                            <h4 class="class-name">Computer Science</h4>
                            <p class="class-teacher">Mr. Kumar | Computer Lab</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Grades -->
            <div style="flex: 1; min-width: 300px;">
                <div class="grades-section">
                    <h2 class="section-title" style="border: none; margin: 0;">
                        <i class="fas fa-star"></i> Recent Grades
                    </h2>
                    
                    <table class="grades-table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Assignment</th>
                                <th>Grade</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mathematics</td>
                                <td>Calculus Test</td>
                                <td><span class="grade-badge grade-a">A</span></td>
                                <td>Mar 18</td>
                            </tr>
                            <tr>
                                <td>Physics</td>
                                <td>Lab Report</td>
                                <td><span class="grade-badge grade-b">B+</span></td>
                                <td>Mar 16</td>
                            </tr>
                            <tr>
                                <td>Chemistry</td>
                                <td>Periodic Table Quiz</td>
                                <td><span class="grade-badge grade-a">A-</span></td>
                                <td>Mar 15</td>
                            </tr>
                            <tr>
                                <td>English</td>
                                <td>Essay Writing</td>
                                <td><span class="grade-badge grade-b">B</span></td>
                                <td>Mar 14</td>
                            </tr>
                            <tr>
                                <td>Biology</td>
                                <td>Cell Biology Test</td>
                                <td><span class="grade-badge grade-a">A</span></td>
                                <td>Mar 12</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="logout-modal">
        <div class="logout-modal-content">
            <div class="logout-modal-icon">
                <i class="fas fa-sign-out-alt"></i>
            </div>
            <h3 class="logout-modal-title">Confirm Logout</h3>
            <p class="logout-modal-text">Are you sure you want to logout from your student account?</p>
            <div class="logout-modal-buttons">
                <button class="btn-cancel">Cancel</button>
                <button class="btn-logout">Yes, Logout</button>
            </div>
        </div>
    </div>

    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Nav link active state
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.nav-link').forEach(item => {
                    item.classList.remove('active');
                });
                this.classList.add('active');
                
                // Update page title
                const pageTitle = this.querySelector('span').textContent;
                document.querySelector('.page-title h1').textContent = pageTitle + ' Dashboard';
                
                // For mobile, close sidebar after click
                if (window.innerWidth < 992) {
                    document.getElementById('sidebar').classList.remove('active');
                }
            });
        });
        
        // Action card functions
        function openSection(section) {
            const sectionNames = {
                'assignments': 'Assignments',
                'timetable': 'Timetable',
                'resources': 'Resources',
                'grades': 'Grades'
            };
            
            alert(`Opening ${sectionNames[section]} section...`);
            
            // Update active nav
            document.querySelectorAll('.nav-link').forEach(item => {
                item.classList.remove('active');
            });
            
            const navItem = Array.from(document.querySelectorAll('.nav-link')).find(link => 
                link.textContent.toLowerCase().includes(sectionNames[section].toLowerCase())
            );
            
            if (navItem) {
                navItem.classList.add('active');
            }
        }
        
        // Auto-close sidebar on mobile when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            
            if (window.innerWidth < 992 && 
                !sidebar.contains(event.target) && 
                !sidebarCollapse.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Logout functionality
        const logoutModal = document.querySelector('.logout-modal');
        const logoutLink = document.querySelector('.logout-link');
        const cancelBtn = document.querySelector('.btn-cancel');
        const logoutBtn = document.querySelector('.btn-logout');
        
        // Show logout modal
        logoutLink.addEventListener('click', function(e) {
            e.preventDefault();
            logoutModal.style.display = 'flex';
        });
        
        // Hide logout modal
        cancelBtn.addEventListener('click', function() {
            logoutModal.style.display = 'none';
        });
        
        // Handle logout
        logoutBtn.addEventListener('click', function() {
            // Show loading state
            const originalText = logoutBtn.innerHTML;
            logoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging out...';
            logoutBtn.disabled = true;
            
            // Simulate logout process
            setTimeout(() => {
                // Show success message
                alert('You have been successfully logged out! Redirecting to login page...');
                
                // Redirect to login page
                window.location.href = 'student-login.html';
            }, 1500);
        });
        
        // Close modal when clicking outside
        logoutModal.addEventListener('click', function(e) {
            if (e.target === logoutModal) {
                logoutModal.style.display = 'none';
            }
        });
        
        // Update current date
        function updateCurrentDate() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateElement = document.querySelector('.date');
            if (dateElement) {
                dateElement.textContent = now.toLocaleDateString('en-US', options);
            }
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateCurrentDate();
        });
    </script>
</body>

</html>
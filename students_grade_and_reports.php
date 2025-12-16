<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades & Reports - Nexis</title>
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
        
        /* Academic Overview */
        .academic-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .overview-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s ease;
        }
        
        .overview-card:hover {
            transform: translateY(-5px);
        }
        
        .overview-icon {
            width: 60px;
            height: 60px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .overview-icon i {
            color: var(--gold-primary);
            font-size: 28px;
        }
        
        .overview-content {
            flex: 1;
        }
        
        .overview-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .overview-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .overview-trend {
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .trend-up {
            color: #28a745;
        }
        
        .trend-down {
            color: #dc3545;
        }
        
        /* Performance Chart */
        .performance-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .section-title {
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            color: var(--gold-primary);
        }
        
        .term-select {
            padding: 10px 15px;
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            color: var(--navy-blue);
            background: white;
            cursor: pointer;
        }
        
        .chart-container {
            height: 300px;
            position: relative;
            margin-top: 20px;
        }
        
        .chart-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
            height: 100%;
            align-items: end;
        }
        
        .chart-bar {
            background: linear-gradient(to top, var(--gold-primary), var(--gold-secondary));
            border-radius: 6px 6px 0 0;
            position: relative;
            min-height: 10px;
        }
        
        .bar-label {
            position: absolute;
            bottom: -25px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        
        .bar-value {
            position: absolute;
            top: -25px;
            left: 0;
            right: 0;
            text-align: center;
            font-weight: 600;
            color: var(--navy-blue);
        }
        
        /* Grades Table */
        .grades-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
        
        .grades-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .grades-table th {
            background: #f8f9fa;
            padding: 15px;
            text-align: left;
            color: var(--navy-blue);
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #eee;
        }
        
        .grades-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }
        
        .grades-table tr:hover {
            background: #f8f9fa;
        }
        
        .grade-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            min-width: 40px;
            text-align: center;
        }
        
        .grade-A {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .grade-B {
            background: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }
        
        .grade-C {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        .grade-D {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        .grade-F {
            background: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }
        
        /* Report Cards */
        .reports-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .report-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: var(--gold-primary);
        }
        
        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .report-title {
            font-weight: 700;
            color: var(--navy-blue);
            font-size: 16px;
        }
        
        .report-term {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold-primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .report-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 15px 0;
        }
        
        .stat-item {
            display: flex;
            flex-direction: column;
        }
        
        .stat-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .stat-value {
            font-weight: 700;
            color: var(--navy-blue);
            font-size: 18px;
        }
        
        .report-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn-outline {
            padding: 8px 16px;
            background: white;
            color: var(--navy-blue);
            border: 1px solid #ddd;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        
        .btn-outline:hover {
            background: #f8f9fa;
            border-color: var(--navy-blue);
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
        }
        
        .btn-primary {
            background: var(--navy-blue);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: var(--navy-blue-light);
            transform: translateY(-2px);
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
            
            .academic-overview {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .reports-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .academic-overview {
                grid-template-columns: 1fr;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .report-actions {
                flex-direction: column;
            }
            
            .action-buttons {
                flex-direction: column;
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
        
        <div class="sidebar-nav">
            <ul class="list-unstyled">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-book-open"></i>
                        <span>My Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tasks"></i>
                        <span>Assignments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-chart-bar"></i>
                        <span>Grades & Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Timetable</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Classmates</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="sidebar-footer">
            <div class="student-info">
                <p class="student-id">STU-2023-00124</p>
                <p class="student-class">Grade 10A - Science</p>
            </div>
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
                <h1>Grades & Academic Reports</h1>
                <p class="welcome-text">Track your academic performance and view detailed reports</p>
            </div>
            <div class="user-info">
                <div class="student-avatar">AJ</div>
                <div class="student-details">
                    <h3>Alex Johnson</h3>
                    <p>Grade 10A | Science Stream</p>
                </div>
            </div>
        </div>

        <!-- Academic Overview -->
        <div class="academic-overview">
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Current GPA</div>
                    <div class="overview-value">3.85</div>
                    <div class="overview-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        0.15 from last term
                    </div>
                </div>
            </div>
            
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Overall Score</div>
                    <div class="overview-value">88.5%</div>
                    <div class="overview-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        2.3% improvement
                    </div>
                </div>
            </div>
            
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Class Rank</div>
                    <div class="overview-value">4/35</div>
                    <div class="overview-trend trend-down">
                        <i class="fas fa-arrow-down"></i>
                        1 position change
                    </div>
                </div>
            </div>
            
            <div class="overview-card">
                <div class="overview-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="overview-content">
                    <div class="overview-title">Subjects</div>
                    <div class="overview-value">8</div>
                    <div class="overview-trend">
                        6 Core + 2 Electives
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Chart -->
        <div class="performance-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-chart-line"></i> Academic Performance
                </h2>
                <select class="term-select" id="termSelect" onchange="updateChart()">
                    <option value="term1">Term 1</option>
                    <option value="term2" selected>Term 2</option>
                    <option value="term3">Term 3</option>
                    <option value="annual">Annual</option>
                </select>
            </div>
            
            <div class="chart-container">
                <div class="chart-grid" id="performanceChart">
                    <!-- Chart bars will be generated by JavaScript -->
                </div>
            </div>
        </div>

        <!-- Grades Table -->
        <div class="grades-section">
            <h2 class="section-title">
                <i class="fas fa-star"></i> Current Term Grades
            </h2>
            <div class="table-container">
                <table class="grades-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Class Work</th>
                            <th>Exams</th>
                            <th>Total</th>
                            <th>Grade</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="gradesTable">
                        <!-- Grades will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Report Cards -->
        <div class="reports-section">
            <h2 class="section-title">
                <i class="fas fa-file-alt"></i> Academic Reports
            </h2>
            
            <div class="reports-grid">
                <!-- Term 1 Report -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-title">Term 1 Report Card</div>
                        <span class="report-term">Term 1</span>
                    </div>
                    <div class="report-stats">
                        <div class="stat-item">
                            <div class="stat-label">GPA</div>
                            <div class="stat-value">3.70</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Rank</div>
                            <div class="stat-value">5/35</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Attendance</div>
                            <div class="stat-value">94%</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Subjects</div>
                            <div class="stat-value">8</div>
                        </div>
                    </div>
                    <p style="color: #666; font-size: 14px; margin: 15px 0;">
                        Good progress in Science subjects. Improvement needed in Languages.
                    </p>
                    <div class="report-actions">
                        <button class="btn-outline" onclick="viewReport('term1')">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                        <button class="btn-outline" onclick="downloadReport('term1')">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    </div>
                </div>
                
                <!-- Term 2 Report -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-title">Term 2 Report Card</div>
                        <span class="report-term">Current Term</span>
                    </div>
                    <div class="report-stats">
                        <div class="stat-item">
                            <div class="stat-label">GPA</div>
                            <div class="stat-value">3.85</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Rank</div>
                            <div class="stat-value">4/35</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Attendance</div>
                            <div class="stat-value">96%</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Subjects</div>
                            <div class="stat-value">8</div>
                        </div>
                    </div>
                    <p style="color: #666; font-size: 14px; margin: 15px 0;">
                        Excellent performance in Mathematics. Consistent improvement across all subjects.
                    </p>
                    <div class="report-actions">
                        <button class="btn-outline" onclick="viewReport('term2')">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                        <button class="btn-outline" onclick="downloadReport('term2')">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    </div>
                </div>
                
                <!-- Mid-term Report -->
                <div class="report-card">
                    <div class="report-header">
                        <div class="report-title">Mid-term Progress Report</div>
                        <span class="report-term">Progress</span>
                    </div>
                    <div class="report-stats">
                        <div class="stat-item">
                            <div class="stat-label">Average</div>
                            <div class="stat-value">87%</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Improvement</div>
                            <div class="stat-value">+4.2%</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Completed</div>
                            <div class="stat-value">65%</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Assignments</div>
                            <div class="stat-value">24/30</div>
                        </div>
                    </div>
                    <p style="color: #666; font-size: 14px; margin: 15px 0;">
                        Good pace in syllabus coverage. All assignments submitted on time.
                    </p>
                    <div class="report-actions">
                        <button class="btn-outline" onclick="viewReport('midterm')">
                            <i class="fas fa-eye"></i> View Details
                        </button>
                        <button class="btn-outline" onclick="downloadReport('midterm')">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn-primary" onclick="printAllReports()">
                <i class="fas fa-print"></i> Print All Reports
            </button>
            <button class="btn-primary" onclick="requestTranscript()">
                <i class="fas fa-file-certificate"></i> Request Official Transcript
            </button>
            <button class="btn-primary" onclick="shareWithParents()">
                <i class="fas fa-share-alt"></i> Share with Parents
            </button>
        </div>
    </div>

    <script>
        // Sample data for grades and reports
        const gradesData = {
            term2: [
                { subject: "Mathematics", teacher: "Mr. Williams", classWork: 45, exams: 48, total: 93, grade: "A", status: "Excellent" },
                { subject: "Physics", teacher: "Dr. Chen", classWork: 42, exams: 44, total: 86, grade: "B+", status: "Very Good" },
                { subject: "Chemistry", teacher: "Ms. Patel", classWork: 40, exams: 45, total: 85, grade: "B+", status: "Very Good" },
                { subject: "Biology", teacher: "Dr. Smith", classWork: 44, exams: 46, total: 90, grade: "A", status: "Excellent" },
                { subject: "English Literature", teacher: "Ms. Rodriguez", classWork: 38, exams: 40, total: 78, grade: "B", status: "Good" },
                { subject: "Computer Science", teacher: "Mr. Kumar", classWork: 46, exams: 47, total: 93, grade: "A", status: "Excellent" },
                { subject: "History", teacher: "Mr. Thompson", classWork: 36, exams: 38, total: 74, grade: "C+", status: "Satisfactory" },
                { subject: "Physical Education", teacher: "Coach Johnson", classWork: 48, exams: 45, total: 93, grade: "A", status: "Excellent" }
            ],
            term1: [
                // Previous term data
            ],
            term3: [
                // Next term data
            ]
        };
        
        const performanceData = {
            term2: [
                { subject: "Mathematics", score: 93 },
                { subject: "Physics", score: 86 },
                { subject: "Chemistry", score: 85 },
                { subject: "Biology", score: 90 },
                { subject: "English", score: 78 },
                { subject: "Computer", score: 93 }
            ],
            term1: [
                { subject: "Mathematics", score: 88 },
                { subject: "Physics", score: 82 },
                { subject: "Chemistry", score: 80 },
                { subject: "Biology", score: 85 },
                { subject: "English", score: 75 },
                { subject: "Computer", score: 90 }
            ]
        };
        
        // DOM Elements
        const gradesTable = document.getElementById('gradesTable');
        const performanceChart = document.getElementById('performanceChart');
        const termSelect = document.getElementById('termSelect');
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            loadGradesTable('term2');
            loadPerformanceChart('term2');
        });
        
        // Load grades table
        function loadGradesTable(term) {
            const grades = gradesData[term] || gradesData.term2;
            gradesTable.innerHTML = '';
            
            grades.forEach(grade => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><strong>${grade.subject}</strong></td>
                    <td>${grade.teacher}</td>
                    <td>${grade.classWork}/50</td>
                    <td>${grade.exams}/50</td>
                    <td><strong>${grade.total}/100</strong></td>
                    <td><span class="grade-badge grade-${grade.grade.replace('+', '').replace('-', '')}">${grade.grade}</span></td>
                    <td><span style="color: ${getStatusColor(grade.status)}">${grade.status}</span></td>
                `;
                gradesTable.appendChild(row);
            });
        }
        
        // Load performance chart
        function loadPerformanceChart(term) {
            const data = performanceData[term] || performanceData.term2;
            performanceChart.innerHTML = '';
            
            // Find max score for scaling
            const maxScore = Math.max(...data.map(item => item.score));
            
            data.forEach(item => {
                const barHeight = (item.score / maxScore) * 100;
                const bar = document.createElement('div');
                bar.className = 'chart-bar';
                bar.style.height = `${barHeight}%`;
                bar.innerHTML = `
                    <div class="bar-value">${item.score}%</div>
                    <div class="bar-label">${item.subject.substring(0, 8)}</div>
                `;
                performanceChart.appendChild(bar);
            });
        }
        
        // Update chart when term changes
        function updateChart() {
            const term = termSelect.value;
            loadGradesTable(term);
            loadPerformanceChart(term);
        }
        
        // Get status color
        function getStatusColor(status) {
            switch(status.toLowerCase()) {
                case 'excellent': return '#28a745';
                case 'very good': return '#17a2b8';
                case 'good': return '#ffc107';
                case 'satisfactory': return '#fd7e14';
                default: return '#6c757d';
            }
        }
        
        // View report details
        function viewReport(reportType) {
            const reportNames = {
                'term1': 'Term 1 Report Card',
                'term2': 'Term 2 Report Card',
                'midterm': 'Mid-term Progress Report'
            };
            
            alert(`Opening ${reportNames[reportType]} details...\n\nIn a real system, this would show a detailed report with:\n- Subject-wise breakdown\n- Teacher comments\n- Attendance records\n- Comparative analysis\n- Recommendations`);
        }
        
        // Download report
        function downloadReport(reportType) {
            const reportNames = {
                'term1': 'Term 1 Report Card',
                'term2': 'Term 2 Report Card',
                'midterm': 'Mid-term Progress Report'
            };
            
            const button = event.target.closest('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';
            button.disabled = true;
            
            setTimeout(() => {
                alert(`Downloading ${reportNames[reportType]} as PDF...`);
                button.innerHTML = originalText;
                button.disabled = false;
            }, 2000);
        }
        
        // Print all reports
        function printAllReports() {
            alert('Opening print preview for all academic reports...');
            // In a real app, this would trigger browser print dialog
        }
        
        // Request official transcript
        function requestTranscript() {
            const btn = event.target.closest('button');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            btn.disabled = true;
            
            setTimeout(() => {
                alert('Official transcript request submitted!\n\nYour request has been sent to the academic office. You will receive an email notification when your transcript is ready for download.');
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 1500);
        }
        
        // Share with parents
        function shareWithParents() {
            alert('Sharing reports with parents...\n\nOptions:\n1. Email to registered parent email\n2. Generate shareable link\n3. Print physical copy\n4. SMS notification\n\nSelect an option to proceed.');
        }
        
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
                
                // For mobile, close sidebar after click
                if (window.innerWidth < 992) {
                    document.getElementById('sidebar').classList.remove('active');
                }
            });
        });
        
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
    </script>
</body>

</html>
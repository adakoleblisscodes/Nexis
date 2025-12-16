<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - Nexis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <style>
        :root {
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
            --nursery-color: #9c27b0;
            --primary-color: #2196f3;
            --secondary-color: #4caf50;
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
        
        /* Level Sections */
        .level-section {
            margin-bottom: 40px;
            display: none;
        }
        
        .level-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid;
        }
        
        .level-section.nursery .section-header {
            border-color: var(--nursery-color);
        }
        
        .level-section.primary .section-header {
            border-color: var(--primary-color);
        }
        
        .level-section.secondary .section-header {
            border-color: var(--secondary-color);
        }
        
        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 22px;
        }
        
        .level-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .nursery .level-icon {
            background: var(--nursery-color);
            color: white;
        }
        
        .primary .level-icon {
            background: var(--primary-color);
            color: white;
        }
        
        .secondary .level-icon {
            background: var(--secondary-color);
            color: white;
        }
        
        /* Courses Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .course-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }
        
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .nursery .course-card:hover {
            border-color: var(--nursery-color);
        }
        
        .primary .course-card:hover {
            border-color: var(--primary-color);
        }
        
        .secondary .course-card:hover {
            border-color: var(--secondary-color);
        }
        
        .course-header {
            color: white;
            padding: 25px;
            position: relative;
        }
        
        .nursery .course-header {
            background: linear-gradient(135deg, var(--nursery-color), #ba68c8);
        }
        
        .primary .course-header {
            background: linear-gradient(135deg, var(--primary-color), #64b5f6);
        }
        
        .secondary .course-header {
            background: linear-gradient(135deg, var(--secondary-color), #81c784);
        }
        
        .course-code {
            font-size: 12px;
            opacity: 0.8;
            margin-bottom: 5px;
        }
        
        .course-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .course-credits {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 14px;
        }
        
        .nursery .course-credits {
            color: var(--nursery-color);
        }
        
        .primary .course-credits {
            color: var(--primary-color);
        }
        
        .secondary .course-credits {
            color: var(--secondary-color);
        }
        
        .course-body {
            padding: 25px;
        }
        
        .course-teacher {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .teacher-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
        }
        
        .nursery .teacher-avatar {
            background: var(--nursery-color);
        }
        
        .primary .teacher-avatar {
            background: var(--primary-color);
        }
        
        .secondary .teacher-avatar {
            background: var(--secondary-color);
        }
        
        .teacher-info {
            flex: 1;
        }
        
        .teacher-name {
            font-weight: 600;
            color: var(--navy-blue);
        }
        
        .teacher-email {
            font-size: 12px;
            color: #666;
        }
        
        .course-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 20px 0;
        }
        
        .meta-item {
            display: flex;
            flex-direction: column;
        }
        
        .meta-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .meta-value {
            font-weight: 600;
            color: var(--navy-blue);
        }
        
        .progress-container {
            margin: 20px 0;
        }
        
        .progress-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        
        .progress-label {
            font-size: 14px;
            color: var(--navy-blue);
            font-weight: 600;
        }
        
        .progress-percent {
            font-weight: 700;
            color: var(--navy-blue);
        }
        
        .progress-bar {
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.5s ease;
        }
        
        .nursery .progress-fill {
            background: linear-gradient(90deg, var(--nursery-color), #ba68c8);
        }
        
        .primary .progress-fill {
            background: linear-gradient(90deg, var(--primary-color), #64b5f6);
        }
        
        .secondary .progress-fill {
            background: linear-gradient(90deg, var(--secondary-color), #81c784);
        }
        
        .course-footer {
            padding: 20px 25px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
        }
        
        .course-btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        
        .btn-primary {
            background: var(--navy-blue);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--navy-blue-light);
        }
        
        .btn-outline {
            background: white;
            color: var(--navy-blue);
            border: 1px solid #ddd;
        }
        
        .btn-outline:hover {
            background: #f8f9fa;
            border-color: var(--navy-blue);
        }
        
        /* Level Selector */
        .level-selector {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .level-tabs {
            display: flex;
        }
        
        .level-tab {
            flex: 1;
            padding: 18px 20px;
            text-align: center;
            background: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 15px;
            color: #666;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .level-tab i {
            font-size: 18px;
        }
        
        .level-tab:hover {
            background: #f8f9fa;
        }
        
        .level-tab.active {
            color: white;
        }
        
        .level-tab.nursery.active {
            background: var(--nursery-color);
        }
        
        .level-tab.primary.active {
            background: var(--primary-color);
        }
        
        .level-tab.secondary.active {
            background: var(--secondary-color);
        }
        
        /* Statistics Cards */
        .level-statistics {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .stat-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .nursery .stat-icon {
            background: rgba(156, 39, 176, 0.1);
        }
        
        .primary .stat-icon {
            background: rgba(33, 150, 243, 0.1);
        }
        
        .secondary .stat-icon {
            background: rgba(76, 175, 80, 0.1);
        }
        
        .stat-icon i {
            font-size: 24px;
        }
        
        .nursery .stat-icon i {
            color: var(--nursery-color);
        }
        
        .primary .stat-icon i {
            color: var(--primary-color);
        }
        
        .secondary .stat-icon i {
            color: var(--secondary-color);
        }
        
        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 14px;
            color: #666;
        }
        
        /* Materials Section */
        .materials-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-top: 30px;
        }
        
        .materials-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .material-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            transition: transform 0.2s ease;
        }
        
        .material-item:hover {
            transform: translateX(5px);
            background: #f1f3f5;
        }
        
        .material-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .nursery .material-icon {
            background: rgba(156, 39, 176, 0.1);
        }
        
        .primary .material-icon {
            background: rgba(33, 150, 243, 0.1);
        }
        
        .secondary .material-icon {
            background: rgba(76, 175, 80, 0.1);
        }
        
        .material-icon i {
            font-size: 20px;
        }
        
        .nursery .material-icon i {
            color: var(--nursery-color);
        }
        
        .primary .material-icon i {
            color: var(--primary-color);
        }
        
        .secondary .material-icon i {
            color: var(--secondary-color);
        }
        
        .material-info {
            flex: 1;
        }
        
        .material-name {
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .material-details {
            font-size: 12px;
            color: #666;
        }
        
        .material-actions {
            display: flex;
            gap: 10px;
        }
        
        .icon-btn {
            width: 36px;
            height: 36px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy-blue);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .icon-btn:hover {
            background: #f8f9fa;
            border-color: var(--navy-blue);
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
        @media (max-width: 1200px) {
            .courses-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }
        
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
            
            .courses-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .course-footer {
                flex-direction: column;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .level-tabs {
                flex-direction: column;
            }
            
            .material-item {
                flex-direction: column;
                text-align: center;
            }
            
            .material-actions {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .course-meta {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
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
        
        <div class="sidebar-nav">
            <ul class="list-unstyled">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
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
                    <a href="#" class="nav-link">
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
                <p class="student-id" id="studentId">STU-2023-00124</p>
                <p class="student-class" id="studentLevel">Grade 10A - Secondary</p>
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
                <h1>My Courses & Subjects</h1>
                <p class="welcome-text" id="welcomeText">Access your course materials and track your progress</p>
            </div>
            <div class="user-info">
                <div class="student-avatar">AJ</div>
                <div class="student-details">
                    <h3 id="studentName">Alex Johnson</h3>
                    <p id="studentDetails">Grade 10A | Science Stream</p>
                </div>
            </div>
        </div>

        <!-- Level Selector (Only shows if student has multiple levels) -->
        <div class="level-selector" id="levelSelector" style="display: none;">
            <div class="level-tabs">
                <button class="level-tab nursery" onclick="switchLevel('nursery')">
                    <i class="fas fa-baby"></i> Nursery
                </button>
                <button class="level-tab primary" onclick="switchLevel('primary')">
                    <i class="fas fa-child"></i> Primary
                </button>
                <button class="level-tab secondary" onclick="switchLevel('secondary')">
                    <i class="fas fa-graduation-cap"></i> Secondary
                </button>
            </div>
        </div>

        <!-- Level Sections -->
        <div class="level-section nursery" id="nurserySection">
            <!-- Nursery content will be loaded here -->
        </div>
        
        <div class="level-section primary" id="primarySection">
            <!-- Primary content will be loaded here -->
        </div>
        
        <div class="level-section secondary active" id="secondarySection">
            <!-- Secondary content will be loaded here -->
        </div>

        <!-- Course Materials -->
        <div class="materials-section">
            <div class="section-header" style="border-color: var(--navy-blue);">
                <h2 class="section-title">
                    <i class="fas fa-download"></i> Recent Course Materials
                </h2>
                <button class="btn-outline" onclick="viewAllMaterials()">
                    <i class="fas fa-folder-open"></i> View All Materials
                </button>
            </div>
            
            <div class="materials-list" id="materialsList">
                <!-- Materials will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Student data - This would come from backend/user session
        const currentStudent = {
            id: "STU-2023-00124",
            name: "Alex Johnson",
            level: "secondary", // This determines which level the student can access
            grade: "Grade 10A",
            stream: "Science Stream",
            enrolledLevels: ["secondary"] // Student can only see their own level
        };

        // Course data for all levels
        const coursesData = {
            nursery: [
                {
                    id: 1,
                    code: "NUR101",
                    title: "Early Literacy",
                    credits: 1,
                    teacher: { name: "Ms. Emily Wilson", email: "e.wilson@nexis.edu", avatar: "EW" },
                    type: "language",
                    grade: "Play Group",
                    progress: 85,
                    room: "Rainbow Room",
                    schedule: "Mon-Fri - 8:30 AM",
                    assignments: 8,
                    completed: 7,
                    description: "Introduction to alphabets, phonics, and basic vocabulary through play."
                },
                {
                    id: 2,
                    code: "NUR102",
                    title: "Numeracy Skills",
                    credits: 1,
                    teacher: { name: "Mr. James Brown", email: "j.brown@nexis.edu", avatar: "JB" },
                    type: "numeracy",
                    grade: "Play Group",
                    progress: 78,
                    room: "Sunshine Room",
                    schedule: "Mon-Fri - 9:30 AM",
                    assignments: 6,
                    completed: 5,
                    description: "Basic counting, shapes, and simple math concepts through activities."
                }
            ],
            primary: [
                {
                    id: 3,
                    code: "PRI201",
                    title: "Mathematics",
                    credits: 3,
                    teacher: { name: "Ms. Linda Chen", email: "l.chen@nexis.edu", avatar: "LC" },
                    type: "core",
                    grade: "Grade 3",
                    progress: 82,
                    room: "203",
                    schedule: "Mon-Fri - 8:00 AM",
                    assignments: 12,
                    completed: 10,
                    description: "Basic arithmetic, fractions, and introduction to geometry."
                },
                {
                    id: 4,
                    code: "PRI202",
                    title: "English Language",
                    credits: 3,
                    teacher: { name: "Mr. Robert Wilson", email: "r.wilson@nexis.edu", avatar: "RW" },
                    type: "core",
                    grade: "Grade 3",
                    progress: 75,
                    room: "205",
                    schedule: "Mon-Fri - 9:00 AM",
                    assignments: 10,
                    completed: 8,
                    description: "Reading comprehension, grammar, and creative writing."
                }
            ],
            secondary: [
                {
                    id: 5,
                    code: "SEC301",
                    title: "Advanced Mathematics",
                    credits: 4,
                    teacher: { name: "Mr. David Williams", email: "d.williams@nexis.edu", avatar: "DW" },
                    type: "core",
                    grade: "Grade 10",
                    progress: 85,
                    room: "302",
                    schedule: "Mon, Wed, Fri - 8:00 AM",
                    assignments: 12,
                    completed: 10,
                    description: "Advanced algebra, calculus, and geometry with practical applications."
                },
                {
                    id: 6,
                    code: "SEC302",
                    title: "Physics",
                    credits: 4,
                    teacher: { name: "Dr. Michael Chen", email: "m.chen@nexis.edu", avatar: "MC" },
                    type: "core",
                    grade: "Grade 10",
                    progress: 78,
                    room: "Lab 4",
                    schedule: "Tue, Thu - 9:45 AM",
                    assignments: 8,
                    completed: 6,
                    description: "Mechanics, thermodynamics, and electromagnetism with laboratory sessions."
                },
                {
                    id: 7,
                    code: "SEC303",
                    title: "Chemistry",
                    credits: 4,
                    teacher: { name: "Ms. Sarah Patel", email: "s.patel@nexis.edu", avatar: "SP" },
                    type: "core",
                    grade: "Grade 10",
                    progress: 72,
                    room: "Lab 3",
                    schedule: "Mon, Wed - 2:00 PM",
                    assignments: 10,
                    completed: 7,
                    description: "Organic and inorganic chemistry with practical laboratory work."
                },
                {
                    id: 8,
                    code: "SEC304",
                    title: "Biology",
                    credits: 4,
                    teacher: { name: "Dr. Jennifer Smith", email: "j.smith@nexis.edu", avatar: "JS" },
                    type: "core",
                    grade: "Grade 10",
                    progress: 80,
                    room: "Lab 2",
                    schedule: "Tue, Thu - 11:30 AM",
                    assignments: 9,
                    completed: 8,
                    description: "Cell biology, genetics, and human anatomy with dissections."
                }
            ]
        };

        // Materials data
        const materialsData = {
            nursery: [
                { id: 1, name: "Alphabet Coloring Book", type: "pdf", subject: "Early Literacy", updated: "Today", size: "1.2 MB" },
                { id: 2, name: "Counting with Animals Video", type: "video", subject: "Numeracy Skills", updated: "Yesterday", duration: "8:15" }
            ],
            primary: [
                { id: 3, name: "Multiplication Tables Worksheet", type: "pdf", subject: "Mathematics", updated: "Today", size: "850 KB" },
                { id: 4, name: "Reading Comprehension Exercises", type: "pdf", subject: "English Language", updated: "Yesterday", size: "1.1 MB" }
            ],
            secondary: [
                { id: 5, name: "Mathematics Chapter 3 Notes", type: "pdf", subject: "Advanced Mathematics", updated: "Today", size: "2.4 MB" },
                { id: 6, name: "Physics Lab Demonstration Video", type: "video", subject: "Physics", updated: "Yesterday", duration: "15:32" },
                { id: 7, name: "Chemistry Presentation Slides", type: "slides", subject: "Chemistry", updated: "2 days ago", slides: "42" }
            ]
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setupMobileSidebar();
            initializeStudentView();
        });

        // Initialize student view based on their level
        function initializeStudentView() {
            // Set student information
            document.getElementById('studentId').textContent = currentStudent.id;
            document.getElementById('studentName').textContent = currentStudent.name;
            document.getElementById('studentDetails').textContent = `${currentStudent.grade} | ${currentStudent.stream}`;
            document.getElementById('studentLevel').textContent = `${currentStudent.grade} - ${currentStudent.level.charAt(0).toUpperCase() + currentStudent.level.slice(1)}`;
            
            // Set welcome text based on level
            const levelText = currentStudent.level === 'nursery' ? 'nursery' : 
                             currentStudent.level === 'primary' ? 'primary school' : 'secondary school';
            document.getElementById('welcomeText').textContent = `Access your ${levelText} course materials and track your progress`;
            
            // Show only the student's level
            showStudentLevel(currentStudent.level);
            
            // Load courses for student's level
            loadLevelCourses(currentStudent.level);
            
            // Load materials for student's level
            loadLevelMaterials(currentStudent.level);
        }

        // Show only the student's level (hides other levels)
        function showStudentLevel(level) {
            // Hide all sections first
            document.querySelectorAll('.level-section').forEach(section => {
                section.classList.remove('active');
                section.style.display = 'none';
            });
            
            // Show only the student's level section
            const activeSection = document.getElementById(`${level}Section`);
            if (activeSection) {
                activeSection.classList.add('active');
                activeSection.style.display = 'block';
            }
            
            // Hide level selector since student can only see their own level
            document.getElementById('levelSelector').style.display = 'none';
        }

        // Switch level (for admin view or multi-level students)
        function switchLevel(level) {
            // Update active tab
            document.querySelectorAll('.level-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector(`.level-tab.${level}`).classList.add('active');
            
            // Update active section
            document.querySelectorAll('.level-section').forEach(section => {
                section.classList.remove('active');
                section.style.display = 'none';
            });
            
            const activeSection = document.getElementById(`${level}Section`);
            activeSection.classList.add('active');
            activeSection.style.display = 'block';
            
            // Load courses for selected level
            loadLevelCourses(level);
            
            // Load materials for selected level
            loadLevelMaterials(level);
        }

        // Load courses for a specific level
        function loadLevelCourses(level) {
            const section = document.getElementById(`${level}Section`);
            const courses = coursesData[level] || [];
            
            // Calculate statistics
            const totalCourses = courses.length;
            const totalCredits = courses.reduce((sum, course) => sum + course.credits, 0);
            const avgProgress = totalCourses > 0 ? Math.round(courses.reduce((sum, course) => sum + course.progress, 0) / totalCourses) : 0;
            
            // Generate level-specific content
            const levelName = level.charAt(0).toUpperCase() + level.slice(1);
            const levelIcon = level === 'nursery' ? 'fa-baby' : 
                             level === 'primary' ? 'fa-child' : 'fa-graduation-cap';
            
            section.innerHTML = `
                <div class="section-header">
                    <h2 class="section-title">
                        <div class="level-icon">
                            <i class="fas ${levelIcon}"></i>
                        </div>
                        ${levelName} Level Subjects
                    </h2>
                    <div style="font-size: 14px; color: #666;">
                        <i class="fas fa-user-graduate"></i> ${currentStudent.grade}
                    </div>
                </div>
                
                <div class="level-statistics ${level}">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="stat-number">${totalCourses}</div>
                            <div class="stat-label">Total Subjects</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas ${level === 'nursery' ? 'fa-puzzle-piece' : 'fa-graduation-cap'}"></i>
                            </div>
                            <div class="stat-number">${totalCredits}</div>
                            <div class="stat-label">Total ${level === 'nursery' ? 'Units' : 'Credits'}</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-percentage"></i>
                            </div>
                            <div class="stat-number">${avgProgress}%</div>
                            <div class="stat-label">Average Progress</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-number">${level === 'nursery' ? '15' : level === 'primary' ? '20' : '25'}</div>
                            <div class="stat-label">Hours/Week</div>
                        </div>
                    </div>
                </div>
                
                <div class="courses-grid" id="coursesGrid-${level}">
                    ${generateCourseCards(courses, level)}
                </div>
            `;
        }

        // Generate course cards HTML
        function generateCourseCards(courses, level) {
            if (courses.length === 0) {
                return `
                    <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #666;">
                        <i class="fas fa-book-open" style="font-size: 48px; margin-bottom: 20px; opacity: 0.3;"></i>
                        <h3 style="margin-bottom: 10px;">No courses enrolled</h3>
                        <p>You are not currently enrolled in any ${level} level courses.</p>
                    </div>
                `;
            }
            
            return courses.map(course => `
                <div class="course-card">
                    <div class="course-header">
                        <div class="course-code">${course.code}</div>
                        <div class="course-title">${course.title}</div>
                        <div class="course-credits">${course.credits} ${level === 'nursery' ? 'Units' : 'Credits'}</div>
                    </div>
                    
                    <div class="course-body">
                        <div class="course-teacher">
                            <div class="teacher-avatar">${course.teacher.avatar}</div>
                            <div class="teacher-info">
                                <div class="teacher-name">${course.teacher.name}</div>
                                <div class="teacher-email">${course.teacher.email}</div>
                            </div>
                        </div>
                        
                        <p style="color: #666; font-size: 14px; margin: 15px 0; line-height: 1.5;">
                            ${course.description}
                        </p>
                        
                        <div class="course-meta">
                            <div class="meta-item">
                                <div class="meta-label">Class Room</div>
                                <div class="meta-value">${course.room}</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">Schedule</div>
                                <div class="meta-value">${course.schedule}</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">Assignments</div>
                                <div class="meta-value">${course.completed}/${course.assignments}</div>
                            </div>
                            <div class="meta-item">
                                <div class="meta-label">Subject Type</div>
                                <div class="meta-value">${course.type.charAt(0).toUpperCase() + course.type.slice(1)}</div>
                            </div>
                        </div>
                        
                        <div class="progress-container">
                            <div class="progress-header">
                                <div class="progress-label">Course Progress</div>
                                <div class="progress-percent">${course.progress}%</div>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: ${course.progress}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="course-footer">
                        <button class="course-btn btn-primary" onclick="enterCourse(${course.id}, '${level}')">
                            <i class="fas fa-door-open"></i> Enter Course
                        </button>
                        <button class="course-btn btn-outline" onclick="viewCourseDetails(${course.id}, '${level}')">
                            <i class="fas fa-info-circle"></i> Details
                        </button>
                    </div>
                </div>
            `).join('');
        }

        // Load materials for a specific level
        function loadLevelMaterials(level) {
            const materialsList = document.getElementById('materialsList');
            const materials = materialsData[level] || [];
            
            if (materials.length === 0) {
                materialsList.innerHTML = `
                    <div style="text-align: center; padding: 20px; color: #666;">
                        <i class="fas fa-file-alt" style="font-size: 32px; margin-bottom: 10px; opacity: 0.3;"></i>
                        <p>No recent materials available</p>
                    </div>
                `;
                return;
            }
            
            materialsList.innerHTML = materials.map(material => {
                const icon = material.type === 'pdf' ? 'fa-file-pdf' : 
                            material.type === 'video' ? 'fa-video' : 
                            material.type === 'slides' ? 'fa-file-powerpoint' : 'fa-file';
                
                return `
                    <div class="material-item">
                        <div class="material-icon">
                            <i class="fas ${icon}"></i>
                        </div>
                        <div class="material-info">
                            <div class="material-name">${material.name}</div>
                            <div class="material-details">Updated: ${material.updated} • ${material.size ? `Size: ${material.size}` : `Duration: ${material.duration}`} • Subject: ${material.subject}</div>
                        </div>
                        <div class="material-actions">
                            <button class="icon-btn" onclick="previewMaterial(${material.id}, '${level}')" title="Preview">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="icon-btn" onclick="downloadMaterial(${material.id}, '${level}')" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                `;
            }).join('');
        }

        // Course actions
        function enterCourse(courseId, level) {
            const course = coursesData[level].find(c => c.id === courseId);
            alert(`Entering ${course.title} course...\n\nThis would open the course dashboard with:\n- Course materials\n- Assignments\n- Discussions\n- Announcements\n- Grades`);
        }

        function viewCourseDetails(courseId, level) {
            const course = coursesData[level].find(c => c.id === courseId);
            
            const details = `
                Course Details:
                ===================
                Code: ${course.code}
                Title: ${course.title}
                Level: ${level.toUpperCase()}
                Grade: ${course.grade}
                Teacher: ${course.teacher.name}
                Type: ${course.type}
                Credits: ${course.credits} ${level === 'nursery' ? 'Units' : 'Credits'}
                Progress: ${course.progress}%
                Room: ${course.room}
                Schedule: ${course.schedule}
                
                Description:
                ${course.description}
            `;
            
            alert(details);
        }

        // Material actions
        function previewMaterial(materialId, level) {
            const material = materialsData[level].find(m => m.id === materialId);
            alert(`Previewing: ${material.name}\n\nSubject: ${material.subject}\n\nThis would open a preview of the material.`);
        }

        function downloadMaterial(materialId, level) {
            const material = materialsData[level].find(m => m.id === materialId);
            alert(`Downloading: ${material.name}\n\nFile will be saved to your device.`);
        }

        function viewAllMaterials() {
            alert(`Opening all materials page\n\nThis would show all course materials for your level.`);
        }

        // Mobile sidebar toggle
        function setupMobileSidebar() {
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const sidebar = document.getElementById('sidebar');
            
            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }

        // Admin function to show all levels (for demonstration)
        function showAllLevels() {
            document.getElementById('levelSelector').style.display = 'block';
            document.querySelectorAll('.level-section').forEach(section => {
                if (!section.classList.contains('active')) {
                    section.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
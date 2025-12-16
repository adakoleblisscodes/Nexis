<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Timetable - Nexis</title>
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
        
        /* Class Selection */
        .class-selection {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .class-select-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .class-select-label {
            font-weight: 600;
            color: var(--navy-blue);
            font-size: 14px;
        }
        
        .class-select {
            padding: 10px 15px;
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            color: var(--navy-blue);
            background: white;
            cursor: pointer;
            min-width: 200px;
        }
        
        .class-select:focus {
            outline: none;
            border-color: var(--navy-blue);
            box-shadow: 0 0 0 3px rgba(10, 26, 58, 0.1);
        }
        
        /* Timetable Controls */
        .timetable-controls {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .view-options {
            display: flex;
            gap: 10px;
        }
        
        .view-btn {
            padding: 10px 20px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            color: var(--navy-blue);
            transition: all 0.3s ease;
        }
        
        .view-btn.active {
            background: var(--navy-blue);
            color: white;
            border-color: var(--navy-blue);
        }
        
        .view-btn:hover:not(.active) {
            background: #f8f9fa;
        }
        
        .week-navigation {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .nav-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy-blue);
            transition: all 0.3s ease;
        }
        
        .nav-btn:hover {
            background: #f8f9fa;
        }
        
        .current-week {
            font-weight: 600;
            color: var(--navy-blue);
            min-width: 150px;
            text-align: center;
        }
        
        /* Timetable Container */
        .timetable-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }
        
        /* Class Info Banner */
        .class-banner {
            background: linear-gradient(135deg, rgba(10, 26, 58, 0.1), rgba(212, 175, 55, 0.1));
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid var(--gold-primary);
        }
        
        .class-banner h3 {
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .class-banner p {
            color: #666;
            font-size: 14px;
        }
        
        /* Weekly Grid */
        .weekly-grid {
            display: grid;
            grid-template-columns: 100px repeat(5, 1fr);
            gap: 1px;
            background: #eee;
            margin-top: 20px;
        }
        
        .grid-header {
            background: var(--navy-blue);
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: 600;
        }
        
        .time-cell {
            background: #f8f9fa;
            padding: 15px;
            text-align: center;
            font-weight: 600;
            color: var(--navy-blue);
            font-size: 14px;
        }
        
        .day-cell {
            background: white;
            padding: 10px;
            min-height: 120px;
            position: relative;
        }
        
        .class-slot {
            background: rgba(212, 175, 55, 0.1);
            border-left: 3px solid var(--gold-primary);
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .class-slot:hover {
            background: rgba(212, 175, 55, 0.2);
            transform: scale(1.02);
        }
        
        .class-subject {
            font-weight: 600;
            color: var(--navy-blue);
            font-size: 13px;
            margin-bottom: 3px;
        }
        
        .class-time {
            font-size: 11px;
            color: #666;
        }
        
        .class-teacher {
            font-size: 11px;
            color: #888;
            margin-top: 3px;
        }
        
        .room-badge {
            display: inline-block;
            padding: 2px 8px;
            background: rgba(10, 26, 58, 0.1);
            color: var(--navy-blue);
            border-radius: 3px;
            font-size: 10px;
            margin-top: 5px;
        }
        
        /* Class Types */
        .type-lecture {
            border-left-color: var(--gold-primary);
            background: rgba(212, 175, 55, 0.1);
        }
        
        .type-lab {
            border-left-color: #007bff;
            background: rgba(0, 123, 255, 0.1);
        }
        
        .type-tutorial {
            border-left-color: #28a745;
            background: rgba(40, 167, 69, 0.1);
        }
        
        .type-sports {
            border-left-color: #dc3545;
            background: rgba(220, 53, 69, 0.1);
        }
        
        .type-break {
            border-left-color: #6c757d;
            background: rgba(108, 117, 125, 0.1);
            text-align: center;
            font-style: italic;
            color: #6c757d;
        }
        
        /* Timetable Legend */
        .timetable-legend {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #666;
        }
        
        .legend-color {
            width: 15px;
            height: 15px;
            border-radius: 3px;
        }
        
        .lecture-color {
            background: var(--gold-primary);
        }
        
        .lab-color {
            background: #007bff;
        }
        
        .tutorial-color {
            background: #28a745;
        }
        
        .sports-color {
            background: #dc3545;
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
            
            .weekly-grid {
                grid-template-columns: 60px repeat(5, 1fr);
                font-size: 12px;
            }
            
            .grid-header, .time-cell {
                padding: 10px;
            }
            
            .class-slot {
                padding: 8px;
            }
        }
        
        @media (max-width: 768px) {
            .class-selection {
                flex-direction: column;
                align-items: stretch;
            }
            
            .class-select {
                min-width: 100%;
            }
            
            .timetable-controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .view-options {
                justify-content: center;
            }
            
            .weekly-grid {
                font-size: 11px;
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
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <span>Grades & Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
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
                <p class="student-id" id="sidebarStudentId">STU-2023-00124</p>
                <p class="student-class" id="sidebarClass">Grade 10A - Science</p>
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
                <h1>Academic Timetable</h1>
                <p class="welcome-text">View your class schedule based on your class and arm</p>
            </div>
            <div class="user-info">
                <div class="student-avatar">AJ</div>
                <div class="student-details">
                    <h3>Alex Johnson</h3>
                    <p id="currentClassDisplay">Grade 10A - Science</p>
                </div>
            </div>
        </div>

        <!-- Class Selection -->
        <div class="class-selection">
            <div class="class-select-group">
                <label class="class-select-label">
                    <i class="fas fa-graduation-cap"></i> Select Class
                </label>
                <select class="class-select" id="classSelect">
                    <option value="grade7">Grade 7</option>
                    <option value="grade8">Grade 8</option>
                    <option value="grade9">Grade 9</option>
                    <option value="grade10" selected>Grade 10</option>
                    <option value="grade11">Grade 11</option>
                    <option value="grade12">Grade 12</option>
                </select>
            </div>
            
            <div class="class-select-group">
                <label class="class-select-label">
                    <i class="fas fa-users"></i> Select Arm
                </label>
                <select class="class-select" id="armSelect">
                    <option value="A" selected>A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </div>
            
            <div class="class-select-group">
                <label class="class-select-label">
                    <i class="fas fa-book"></i> Select Stream
                </label>
                <select class="class-select" id="streamSelect">
                    <option value="science" selected>Science</option>
                    <option value="arts">Arts</option>
                    <option value="business">Business</option>
                    <option value="general">General</option>
                </select>
            </div>
            
            <button class="btn-primary" onclick="loadTimetable()">
                <i class="fas fa-sync-alt"></i> Load Timetable
            </button>
        </div>

        <!-- Timetable Controls -->
        <div class="timetable-controls">
            <div class="view-options">
                <button class="view-btn active" onclick="setView('weekly')">
                    <i class="fas fa-calendar-week"></i> Weekly View
                </button>
                <button class="view-btn" onclick="setView('daily')">
                    <i class="fas fa-calendar-day"></i> Today's Schedule
                </button>
            </div>
            
            <div class="week-navigation">
                <button class="nav-btn prev-week" onclick="prevWeek()">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="current-week" id="currentWeek">March 18 - 22, 2024</div>
                <button class="nav-btn next-week" onclick="nextWeek()">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Class Info Banner -->
        <div class="class-banner" id="classBanner">
            <h3>Grade 10A - Science Stream</h3>
            <p>Class Teacher: Mr. David Williams | Room: 302 | Total Students: 35</p>
        </div>

        <!-- Timetable Container -->
        <div class="timetable-container">
            <div class="weekly-grid" id="timetableGrid">
                <!-- Grid will be populated by JavaScript -->
            </div>
            
            <!-- Timetable Legend -->
            <div class="timetable-legend">
                <div class="legend-item">
                    <div class="legend-color lecture-color"></div>
                    <span>Lecture</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color lab-color"></div>
                    <span>Laboratory</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color tutorial-color"></div>
                    <span>Tutorial</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color sports-color"></div>
                    <span>Sports/Practical</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample timetable data for different classes and arms
        const timetableData = {
            // Grade 10 Science Stream
            'grade10-A-science': {
                classTeacher: "Mr. David Williams",
                room: "302",
                totalStudents: 35,
                timetable: {
                    monday: [
                        { time: "08:00-09:30", subject: "Mathematics", teacher: "Mr. Williams", room: "302", type: "lecture" },
                        { time: "09:45-11:15", subject: "Physics", teacher: "Dr. Chen", room: "Lab 4", type: "lab" },
                        { time: "11:30-13:00", subject: "English", teacher: "Ms. Rodriguez", room: "215", type: "lecture" },
                        { time: "14:00-15:30", subject: "Chemistry", teacher: "Ms. Patel", room: "Lab 3", type: "lab" }
                    ],
                    tuesday: [
                        { time: "08:00-09:30", subject: "Biology", teacher: "Dr. Smith", room: "Lab 2", type: "lab" },
                        { time: "09:45-11:15", subject: "Mathematics", teacher: "Mr. Williams", room: "302", type: "tutorial" },
                        { time: "11:30-13:00", subject: "Computer Science", teacher: "Mr. Kumar", room: "Comp Lab", type: "lab" },
                        { time: "14:00-15:30", subject: "Physical Education", teacher: "Coach Johnson", room: "Field", type: "sports" }
                    ],
                    wednesday: [
                        { time: "08:00-09:30", subject: "Physics", teacher: "Dr. Chen", room: "302", type: "lecture" },
                        { time: "09:45-11:15", subject: "Chemistry", teacher: "Ms. Patel", room: "302", type: "lecture" },
                        { time: "11:30-13:00", subject: "Mathematics", teacher: "Mr. Williams", room: "302", type: "lecture" },
                        { time: "14:00-15:30", subject: "English Literature", teacher: "Ms. Rodriguez", room: "215", type: "tutorial" }
                    ],
                    thursday: [
                        { time: "08:00-09:30", subject: "Biology", teacher: "Dr. Smith", room: "302", type: "lecture" },
                        { time: "09:45-11:15", subject: "Computer Science", teacher: "Mr. Kumar", room: "302", type: "lecture" },
                        { time: "11:30-13:00", subject: "Physics Lab", teacher: "Dr. Chen", room: "Lab 4", type: "lab" },
                        { time: "14:00-15:30", subject: "Chemistry Lab", teacher: "Ms. Patel", room: "Lab 3", type: "lab" }
                    ],
                    friday: [
                        { time: "08:00-09:30", subject: "Mathematics", teacher: "Mr. Williams", room: "302", type: "tutorial" },
                        { time: "09:45-11:15", subject: "English", teacher: "Ms. Rodriguez", room: "215", type: "lecture" },
                        { time: "11:30-13:00", subject: "Biology Lab", teacher: "Dr. Smith", room: "Lab 2", type: "lab" },
                        { time: "14:00-15:30", subject: "Computer Lab", teacher: "Mr. Kumar", room: "Comp Lab", type: "lab" }
                    ]
                }
            },
            
            // Grade 10 Arts Stream
            'grade10-A-arts': {
                classTeacher: "Ms. Sarah Johnson",
                room: "201",
                totalStudents: 28,
                timetable: {
                    monday: [
                        { time: "08:00-09:30", subject: "English Literature", teacher: "Ms. Rodriguez", room: "201", type: "lecture" },
                        { time: "09:45-11:15", subject: "History", teacher: "Mr. Thompson", room: "201", type: "lecture" },
                        { time: "11:30-13:00", subject: "Geography", teacher: "Ms. Lee", room: "203", type: "lecture" },
                        { time: "14:00-15:30", subject: "Art & Design", teacher: "Ms. Garcia", room: "Art Studio", type: "tutorial" }
                    ],
                    // ... more days
                }
            },
            
            // Grade 11 Science
            'grade11-A-science': {
                classTeacher: "Dr. Michael Chen",
                room: "401",
                totalStudents: 32,
                timetable: {
                    monday: [
                        { time: "08:00-09:30", subject: "Advanced Math", teacher: "Dr. Roberts", room: "401", type: "lecture" },
                        { time: "09:45-11:15", subject: "Physics", teacher: "Dr. Chen", room: "Lab 4", type: "lab" },
                        { time: "11:30-13:00", subject: "Chemistry", teacher: "Dr. Patel", room: "Lab 3", type: "lab" },
                        { time: "14:00-15:30", subject: "Biology", teacher: "Dr. Smith", room: "Lab 2", type: "lab" }
                    ],
                    // ... more days
                }
            },
            
            // Grade 7 General
            'grade7-A-general': {
                classTeacher: "Ms. Emily Wilson",
                room: "101",
                totalStudents: 40,
                timetable: {
                    monday: [
                        { time: "08:00-09:30", subject: "Mathematics", teacher: "Ms. Wilson", room: "101", type: "lecture" },
                        { time: "09:45-11:15", subject: "English", teacher: "Mr. Brown", room: "102", type: "lecture" },
                        { time: "11:30-13:00", subject: "Science", teacher: "Mr. Davis", room: "103", type: "lecture" },
                        { time: "14:00-15:30", subject: "Social Studies", teacher: "Ms. Clark", room: "101", type: "lecture" }
                    ],
                    // ... more days
                }
            }
        };
        
        // Time slots for the grid
        const timeSlots = [
            "08:00-09:30",
            "09:45-11:15", 
            "11:30-13:00",
            "14:00-15:30"
        ];
        
        const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        
        // Current state
        let currentClass = "grade10";
        let currentArm = "A";
        let currentStream = "science";
        let currentWeek = 0;
        
        // DOM Elements
        const classSelect = document.getElementById('classSelect');
        const armSelect = document.getElementById('armSelect');
        const streamSelect = document.getElementById('streamSelect');
        const timetableGrid = document.getElementById('timetableGrid');
        const classBanner = document.getElementById('classBanner');
        const currentWeekDisplay = document.getElementById('currentWeek');
        const sidebarStudentId = document.getElementById('sidebarStudentId');
        const sidebarClass = document.getElementById('sidebarClass');
        const currentClassDisplay = document.getElementById('currentClassDisplay');
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateWeekDisplay();
            loadTimetable();
            
            // Add event listeners
            classSelect.addEventListener('change', updateClassSelection);
            armSelect.addEventListener('change', updateClassSelection);
            streamSelect.addEventListener('change', updateClassSelection);
        });
        
        // Update class selection
        function updateClassSelection() {
            currentClass = classSelect.value;
            currentArm = armSelect.value;
            currentStream = streamSelect.value;
        }
        
        // Load timetable based on selection
        function loadTimetable() {
            const timetableKey = `${currentClass}-${currentArm}-${currentStream}`;
            const timetable = timetableData[timetableKey] || timetableData['grade10-A-science'];
            
            // Update class info
            updateClassInfo(timetable);
            
            // Generate timetable grid
            generateTimetableGrid(timetable.timetable);
        }
        
        // Update class information
        function updateClassInfo(timetable) {
            const classNames = {
                'grade7': 'Grade 7',
                'grade8': 'Grade 8',
                'grade9': 'Grade 9',
                'grade10': 'Grade 10',
                'grade11': 'Grade 11',
                'grade12': 'Grade 12'
            };
            
            const streamNames = {
                'science': 'Science',
                'arts': 'Arts',
                'business': 'Business',
                'general': 'General'
            };
            
            const className = `${classNames[currentClass]}${currentArm} - ${streamNames[currentStream]} Stream`;
            
            // Update banner
            classBanner.innerHTML = `
                <h3>${className}</h3>
                <p>Class Teacher: ${timetable.classTeacher} | Room: ${timetable.room} | Total Students: ${timetable.totalStudents}</p>
            `;
            
            // Update sidebar and header
            sidebarClass.textContent = className;
            currentClassDisplay.textContent = className;
        }
        
        // Generate timetable grid
        function generateTimetableGrid(timetable) {
            // Clear existing grid
            timetableGrid.innerHTML = '';
            
            // Create header row
            timetableGrid.appendChild(createGridHeader('Time'));
            days.forEach(day => {
                timetableGrid.appendChild(createGridHeader(day));
            });
            
            // Create time slots
            timeSlots.forEach((timeSlot, index) => {
                // Time cell
                timetableGrid.appendChild(createTimeCell(timeSlot));
                
                // Day cells
                days.forEach(day => {
                    const dayKey = day.toLowerCase().substring(0, 3);
                    const classes = timetable[dayKey] || [];
                    const classForTime = classes[index];
                    
                    if (classForTime) {
                        timetableGrid.appendChild(createClassSlot(classForTime));
                    } else {
                        timetableGrid.appendChild(createEmptySlot());
                    }
                });
            });
        }
        
        // Create grid header
        function createGridHeader(text) {
            const header = document.createElement('div');
            header.className = 'grid-header';
            header.textContent = text;
            return header;
        }
        
        // Create time cell
        function createTimeCell(time) {
            const cell = document.createElement('div');
            cell.className = 'time-cell';
            cell.textContent = time.split('-')[0];
            return cell;
        }
        
        // Create class slot
        function createClassSlot(classData) {
            const slot = document.createElement('div');
            slot.className = `class-slot type-${classData.type}`;
            
            slot.innerHTML = `
                <div class="class-subject">${classData.subject}</div>
                <div class="class-time">${classData.time}</div>
                <div class="class-teacher">${classData.teacher}</div>
                <div class="room-badge">${classData.room}</div>
            `;
            
            slot.addEventListener('click', () => {
                alert(`Class Details:\nSubject: ${classData.subject}\nTime: ${classData.time}\nTeacher: ${classData.teacher}\nRoom: ${classData.room}\nType: ${classData.type}`);
            });
            
            return slot;
        }
        
        // Create empty slot
        function createEmptySlot() {
            const slot = document.createElement('div');
            slot.className = 'day-cell';
            return slot;
        }
        
        // Set view mode
        function setView(view) {
            const viewButtons = document.querySelectorAll('.view-btn');
            viewButtons.forEach(btn => btn.classList.remove('active'));
            
            if (view === 'daily') {
                event.target.classList.add('active');
                alert('Today\'s schedule view would show here. For now, weekly view is active.');
                // In a real app, you would switch to daily view
            } else {
                document.querySelector('.view-btn').classList.add('active');
            }
        }
        
        // Week navigation
        function prevWeek() {
            currentWeek--;
            updateWeekDisplay();
            loadTimetable();
        }
        
        function nextWeek() {
            currentWeek++;
            updateWeekDisplay();
            loadTimetable();
        }
        
        function updateWeekDisplay() {
            const today = new Date();
            const startDate = new Date(today);
            startDate.setDate(today.getDate() + (currentWeek * 7) - today.getDay() + 1);
            
            const endDate = new Date(startDate);
            endDate.setDate(startDate.getDate() + 4);
            
            const options = { month: 'short', day: 'numeric' };
            const weekText = `${startDate.toLocaleDateString('en-US', options)} - ${endDate.toLocaleDateString('en-US', options)}, ${endDate.getFullYear()}`;
            
            currentWeekDisplay.textContent = weekText;
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
    
    <style>
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
    </style>
</body>

</html>
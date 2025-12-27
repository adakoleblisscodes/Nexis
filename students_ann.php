<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Announcements | School Notice Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --navy-blue: #0a2342;
            --navy-light: #1a365d;
            --gold: #c5a047;
            --gold-light: #e6d5a8;
            --urgent-red: #dc2626;
            --urgent-red-light: #fee2e2;
            --important-gold: #b89a3a;
            --general-navy: #2d547d;
            --sidebar-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --border-color: #e5e7eb;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8fafc;
            color: var(--text-dark);
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background-color: var(--navy-blue);
            color: white;
            padding: 25px 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 0 25px 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        
        .school-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 5px;
        }
        
        .school-motto {
            font-size: 0.85rem;
            opacity: 0.8;
        }
        
        .sidebar-nav {
            flex-grow: 1;
            padding: 0 15px;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            margin-bottom: 8px;
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .nav-item.active {
            background-color: var(--gold);
            color: var(--navy-blue);
            font-weight: 600;
        }
        
        .nav-icon {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }
        
        .sidebar-footer {
            padding: 20px 25px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 20px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 12px;
            color: var(--navy-blue);
        }
        
        .user-name {
            font-weight: 600;
        }
        
        .user-role {
            font-size: 0.85rem;
            opacity: 0.8;
        }
        
        /* Main Content Area */
        .main-content {
            flex-grow: 1;
            overflow-y: auto;
            height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header Section */
        header {
            background-color: white;
            padding: 20px 0;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 25px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .page-subtitle {
            font-size: 1rem;
            color: var(--text-light);
        }
        
        .notification-badge {
            background-color: var(--urgent-red);
            color: white;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            position: absolute;
            top: -8px;
            right: -8px;
        }
        
        .notification-icon {
            position: relative;
            font-size: 1.5rem;
            margin-right: 20px;
            color: var(--navy-blue);
            cursor: pointer;
        }
        
        /* Controls Section */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .filters {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            padding: 8px 18px;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            background-color: white;
            color: var(--text-dark);
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover {
            background-color: var(--navy-blue);
            color: white;
            border-color: var(--navy-blue);
        }
        
        .filter-btn.active {
            background-color: var(--gold);
            color: var(--navy-blue);
            border-color: var(--gold);
            font-weight: 600;
        }
        
        .search-box {
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            width: 300px;
            max-width: 100%;
            font-size: 1rem;
            background-color: white;
        }
        
        .search-box:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(197, 160, 71, 0.2);
        }
        
        /* Announcements Header */
        .announcements-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .announcements-count {
            font-size: 1.1rem;
            color: var(--text-light);
        }
        
        .priority-indicators {
            display: flex;
            gap: 15px;
        }
        
        .priority-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
        }
        
        .priority-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        
        .dot-urgent {
            background-color: var(--urgent-red);
        }
        
        .dot-important {
            background-color: var(--important-gold);
        }
        
        .dot-general {
            background-color: var(--general-navy);
        }
        
        /* Announcement Cards */
        .announcement-card {
            background-color: var(--card-bg);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 18px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-left: 4px solid var(--general-navy);
            cursor: pointer;
            position: relative;
        }
        
        .announcement-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .announcement-card.unread {
            border-left: 4px solid var(--urgent-red);
        }
        
        .announcement-card.urgent {
            background-color: var(--urgent-red-light);
        }
        
        .announcement-card.important {
            background-color: rgba(197, 160, 71, 0.1);
        }
        
        .announcement-card.general {
            background-color: rgba(10, 35, 66, 0.05);
        }
        
        .announcement-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .announcement-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 8px;
        }
        
        .unread .announcement-title {
            color: var(--urgent-red);
        }
        
        .announcement-category {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .category-exam {
            background-color: rgba(197, 160, 71, 0.15);
            color: var(--important-gold);
        }
        
        .category-assignment {
            background-color: rgba(10, 35, 66, 0.1);
            color: var(--navy-blue);
        }
        
        .category-timetable {
            background-color: rgba(45, 84, 125, 0.1);
            color: var(--general-navy);
        }
        
        .category-general {
            background-color: rgba(107, 114, 128, 0.1);
            color: var(--text-light);
        }
        
        .announcement-preview {
            color: var(--text-light);
            margin-bottom: 15px;
            line-height: 1.5;
        }
        
        .announcement-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        .announcement-meta {
            display: flex;
            gap: 15px;
        }
        
        .unread-indicator {
            background-color: var(--urgent-red);
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        
        /* Announcement Details Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 20px;
            display: none;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 12px;
            width: 100%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
        }
        
        .modal-title {
            font-size: 1.8rem;
            color: var(--navy-blue);
            margin-bottom: 10px;
        }
        
        .close-modal {
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: var(--text-light);
        }
        
        .modal-body {
            margin-bottom: 25px;
        }
        
        .modal-priority {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .modal-priority.urgent {
            background-color: var(--urgent-red);
            color: white;
        }
        
        .modal-priority.important {
            background-color: var(--important-gold);
            color: white;
        }
        
        .modal-priority.general {
            background-color: var(--general-navy);
            color: white;
        }
        
        .modal-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            color: var(--text-light);
            font-size: 0.95rem;
        }
        
        .modal-full-message {
            line-height: 1.7;
            margin-bottom: 25px;
            font-size: 1.05rem;
        }
        
        .attachments-section, .affected-section, .dates-section {
            margin-bottom: 20px;
        }
        
        .section-title {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--navy-blue);
            font-size: 1.1rem;
            padding-bottom: 5px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .attachment-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background-color: #f9fafb;
            border-radius: 8px;
            margin-bottom: 8px;
            border-left: 3px solid var(--gold);
        }
        
        .attachment-icon {
            color: var(--gold);
            font-size: 1.2rem;
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar {
                width: 220px;
            }
        }
        
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                padding: 15px 0;
            }
            
            .sidebar-nav {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }
            
            .nav-item {
                padding: 10px 15px;
                margin-bottom: 0;
            }
            
            .main-content {
                height: auto;
            }
            
            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                width: 100%;
            }
            
            .announcements-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .announcement-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .announcement-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .modal-meta {
                flex-direction: column;
                gap: 10px;
            }
        }
        
        /* Animation for new notifications */
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="school-logo">🎓 EDUCONNECT</div>
            <div class="school-motto">Knowledge • Excellence • Integrity</div>
        </div>
        
        <div class="sidebar-nav">
            <a href="#" class="nav-item active">
                <i class="fas fa-bullhorn nav-icon"></i>
                Announcements
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-calendar-alt nav-icon"></i>
                Academic Calendar
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-book nav-icon"></i>
                Courses
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-clipboard-list nav-icon"></i>
                Assignments
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-chart-line nav-icon"></i>
                Grades
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-users nav-icon"></i>
                Student Groups
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-file-alt nav-icon"></i>
                Resources
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-cog nav-icon"></i>
                Settings
            </a>
        </div>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">JS</div>
                <div>
                    <div class="user-name">John Smith</div>
                    <div class="user-role">Grade 11 Student</div>
                </div>
            </div>
            <a href="#" class="nav-item">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                Log Out
            </a>
        </div>
    </div>
    
    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header -->
        <header>
            <div class="container">
                <div class="header-content">
                    <div>
                        <h1 class="page-title">📢 Student Announcements</h1>
                        <p class="page-subtitle">Never miss important information. Get updates on time.</p>
                    </div>
                    <div class="notification-icon">
                        <i class="fas fa-bell"></i>
                        <div class="notification-badge">3</div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="container">
            <!-- Controls Section -->
            <div class="controls">
                <div class="filters">
                    <button class="filter-btn active" data-filter="all">All Announcements</button>
                    <button class="filter-btn" data-filter="urgent">🔴 Urgent</button>
                    <button class="filter-btn" data-filter="important">🟡 Important</button>
                    <button class="filter-btn" data-filter="general">🔵 General</button>
                    <button class="filter-btn" data-filter="unread">Unread</button>
                </div>
                <input type="text" class="search-box" placeholder="Search announcements...">
            </div>
            
            <!-- Announcements Header -->
            <div class="announcements-header">
                <h2 style="color: var(--navy-blue);">Latest Announcements</h2>
                <div class="priority-indicators">
                    <div class="priority-item">
                        <div class="priority-dot dot-urgent"></div>
                        <span>Urgent</span>
                    </div>
                    <div class="priority-item">
                        <div class="priority-dot dot-important"></div>
                        <span>Important</span>
                    </div>
                    <div class="priority-item">
                        <div class="priority-dot dot-general"></div>
                        <span>General</span>
                    </div>
                </div>
            </div>
            
            <!-- Announcements List -->
            <div id="announcements-list">
                <!-- Announcement cards will be dynamically generated here -->
            </div>
            
            <!-- Page Purpose Reminder -->
            <div style="background-color: rgba(10, 35, 66, 0.05); padding: 20px; border-radius: 10px; margin-top: 30px; border-left: 4px solid var(--gold);">
                <h3 style="color: var(--navy-blue); margin-bottom: 10px;">🎯 Purpose of This Page</h3>
                <p style="color: var(--text-light);">To ensure students: <strong>Never miss important information</strong>, <strong>Get updates on time</strong>, and <strong>Don't rely on notice boards or "word of mouth"</strong>.</p>
            </div>
        </div>
    </div>
    
    <!-- Announcement Details Modal -->
    <div class="modal-overlay" id="announcement-modal">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h3 class="modal-title" id="modal-title">Exam Schedule Change</h3>
                    <span class="modal-priority urgent" id="modal-priority">🔴 Urgent</span>
                </div>
                <button class="close-modal" id="close-modal">&times;</button>
            </div>
            
            <div class="modal-body">
                <div class="modal-meta">
                    <div><strong>Posted:</strong> <span id="modal-date">May 15, 2023 - 10:30 AM</span></div>
                    <div><strong>By:</strong> <span id="modal-author">Admin Office</span></div>
                    <div><strong>Category:</strong> <span id="modal-category">Exam</span></div>
                </div>
                
                <div class="modal-full-message" id="modal-message">
                    The final exam schedule for Mathematics has been changed due to unforeseen circumstances. The new date is June 5th, 2023, at 9:00 AM in the main auditorium. Please make a note of this change and prepare accordingly.
                </div>
                
                <div class="attachments-section">
                    <div class="section-title">Attachments</div>
                    <div class="attachment-item">
                        <i class="fas fa-file-pdf attachment-icon"></i>
                        <span>Updated_Exam_Schedule.pdf</span>
                    </div>
                    <div class="attachment-item">
                        <i class="fas fa-image attachment-icon"></i>
                        <span>Auditorium_Seating_Chart.jpg</span>
                    </div>
                </div>
                
                <div class="affected-section">
                    <div class="section-title">Affected Class/Subject</div>
                    <div>Grade 11 - Mathematics (All Sections)</div>
                </div>
                
                <div class="dates-section">
                    <div class="section-title">Important Dates</div>
                    <div>New Exam Date: June 5, 2023</div>
                    <div>Last Day to Request Changes: May 25, 2023</div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Announcements Data
        const announcements = [
            {
                id: 1,
                title: "Exam Schedule Change - Mathematics",
                category: "Exam",
                priority: "urgent",
                preview: "The final exam schedule for Mathematics has been changed due to unforeseen circumstances...",
                fullMessage: "The final exam schedule for Mathematics has been changed due to unforeseen circumstances. The new date is June 5th, 2023, at 9:00 AM in the main auditorium. Please make a note of this change and prepare accordingly. All students are required to bring their student ID cards for verification.",
                date: "May 15, 2023 - 10:30 AM",
                author: "Admin Office",
                affected: "Grade 11 - Mathematics (All Sections)",
                importantDates: ["New Exam Date: June 5, 2023", "Last Day to Request Changes: May 25, 2023"],
                attachments: ["Updated_Exam_Schedule.pdf", "Auditorium_Seating_Chart.jpg"],
                unread: true
            },
            {
                id: 2,
                title: "Assignment Deadline Extension",
                category: "Assignment",
                priority: "important",
                preview: "The deadline for the History research paper has been extended by 3 days...",
                fullMessage: "Due to requests from students and considering the upcoming sports events, the deadline for the History research paper has been extended by 3 days. The new deadline is May 28th, 2023, by 11:59 PM. Please submit your papers through the online portal. Late submissions will not be accepted after the new deadline.",
                date: "May 14, 2023 - 2:15 PM",
                author: "Dr. Johnson",
                affected: "Grade 10 - History",
                importantDates: ["New Deadline: May 28, 2023", "Topic Submission: May 20, 2023"],
                attachments: ["Research_Paper_Guidelines.pdf"],
                unread: true
            },
            {
                id: 3,
                title: "School Timetable Update",
                category: "Timetable",
                priority: "general",
                preview: "The school timetable for the next academic term has been released...",
                fullMessage: "The school timetable for the next academic term has been released and is now available for viewing. Please check your class schedules and note any changes. Homeroom periods have been moved to the beginning of each day. If you have any conflicts or issues with your schedule, please contact the academic office by May 20th.",
                date: "May 12, 2023 - 9:45 AM",
                author: "Academic Office",
                affected: "All Grades",
                importantDates: ["Schedule Conflict Deadline: May 20, 2023", "New Term Starts: June 1, 2023"],
                attachments: ["Term3_Timetable.pdf", "Classroom_Assignments.pdf"],
                unread: false
            },
            {
                id: 4,
                title: "Science Lab Safety Workshop",
                category: "General",
                priority: "important",
                preview: "All students using the science labs must attend the safety workshop...",
                fullMessage: "A mandatory science lab safety workshop will be held on May 25th, 2023, from 2:00 PM to 4:00 PM in the science building. All students who will be using the science labs next semester must attend. Attendance will be taken and certificates will be issued to participants. Please bring your lab coats and safety goggles.",
                date: "May 10, 2023 - 11:20 AM",
                author: "Science Department",
                affected: "Grades 9-12 Science Students",
                importantDates: ["Workshop Date: May 25, 2023", "Registration Deadline: May 22, 2023"],
                attachments: ["Lab_Safety_Handbook.pdf", "Workshop_Registration_Form.pdf"],
                unread: true
            },
            {
                id: 5,
                title: "Library Closing Early on Friday",
                category: "General",
                priority: "general",
                preview: "The school library will close at 3:00 PM this Friday for maintenance...",
                fullMessage: "Please be informed that the school library will close early at 3:00 PM this Friday, May 19th, for scheduled maintenance and system upgrades. The library will reopen at the usual time on Monday, May 22nd. Online resources will still be accessible during this period. Please plan your study sessions accordingly.",
                date: "May 9, 2023 - 4:05 PM",
                author: "Library Administration",
                affected: "All Students",
                importantDates: ["Early Closure: May 19, 2023", "Reopening: May 22, 2023"],
                attachments: ["Library_Hours_Update.pdf"],
                unread: false
            }
        ];
        
        // DOM Elements
        const announcementsList = document.getElementById('announcements-list');
        const filterButtons = document.querySelectorAll('.filter-btn');
        const searchBox = document.querySelector('.search-box');
        const modal = document.getElementById('announcement-modal');
        const closeModal = document.getElementById('close-modal');
        const notificationBadge = document.querySelector('.notification-badge');
        
        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            renderAnnouncements(announcements);
            setupFilters();
            updateNotificationBadge();
            
            // Search functionality
            searchBox.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const filtered = announcements.filter(announcement => 
                    announcement.title.toLowerCase().includes(searchTerm) ||
                    announcement.preview.toLowerCase().includes(searchTerm) ||
                    announcement.category.toLowerCase().includes(searchTerm) ||
                    announcement.author.toLowerCase().includes(searchTerm)
                );
                renderAnnouncements(filtered);
            });
            
            // Modal close functionality
            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });
            
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
        
        // Render announcements to the page
        function renderAnnouncements(announcementsToRender) {
            announcementsList.innerHTML = '';
            
            if (announcementsToRender.length === 0) {
                announcementsList.innerHTML = `
                    <div style="text-align: center; padding: 40px; color: var(--text-light);">
                        <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 15px; color: var(--gold);"></i>
                        <h3 style="color: var(--navy-blue); margin-bottom: 10px;">No Announcements Found</h3>
                        <p>Try changing your filters or search terms.</p>
                    </div>
                `;
                return;
            }
            
            announcementsToRender.forEach(announcement => {
                const card = document.createElement('div');
                card.className = `announcement-card ${announcement.priority} ${announcement.unread ? 'unread' : ''}`;
                card.dataset.id = announcement.id;
                
                // Category badge
                let categoryClass = 'category-general';
                if (announcement.category === 'Exam') categoryClass = 'category-exam';
                if (announcement.category === 'Assignment') categoryClass = 'category-assignment';
                if (announcement.category === 'Timetable') categoryClass = 'category-timetable';
                
                // Priority indicator
                let priorityIndicator = '🔵 General';
                if (announcement.priority === 'urgent') priorityIndicator = '🔴 Urgent';
                if (announcement.priority === 'important') priorityIndicator = '🟡 Important';
                
                card.innerHTML = `
                    <div class="announcement-header">
                        <div>
                            <div class="announcement-title">${announcement.title}</div>
                            <span class="announcement-category ${categoryClass}">${announcement.category}</span>
                            <div>${priorityIndicator}</div>
                        </div>
                        ${announcement.unread ? '<div class="unread-indicator">NEW</div>' : ''}
                    </div>
                    <div class="announcement-preview">${announcement.preview}</div>
                    <div class="announcement-footer">
                        <div class="announcement-meta">
                            <div><i class="far fa-clock" style="color: var(--gold);"></i> ${announcement.date}</div>
                            <div><i class="far fa-user" style="color: var(--gold);"></i> ${announcement.author}</div>
                        </div>
                        <div><i class="fas fa-chevron-right" style="color: var(--navy-blue);"></i> Click to view details</div>
                    </div>
                `;
                
                card.addEventListener('click', function() {
                    showAnnouncementDetails(announcement.id);
                    // Mark as read when clicked
                    if (announcement.unread) {
                        announcement.unread = false;
                        updateNotificationBadge();
                        card.classList.remove('unread');
                        card.querySelector('.unread-indicator')?.remove();
                    }
                });
                
                announcementsList.appendChild(card);
            });
        }
        
        // Setup filter buttons
        function setupFilters() {
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filter = this.dataset.filter;
                    let filteredAnnouncements = announcements;
                    
                    if (filter === 'urgent') {
                        filteredAnnouncements = announcements.filter(a => a.priority === 'urgent');
                    } else if (filter === 'important') {
                        filteredAnnouncements = announcements.filter(a => a.priority === 'important');
                    } else if (filter === 'general') {
                        filteredAnnouncements = announcements.filter(a => a.priority === 'general');
                    } else if (filter === 'unread') {
                        filteredAnnouncements = announcements.filter(a => a.unread);
                    }
                    // 'all' filter shows all announcements
                    
                    renderAnnouncements(filteredAnnouncements);
                });
            });
        }
        
        // Show announcement details in modal
        function showAnnouncementDetails(id) {
            const announcement = announcements.find(a => a.id === id);
            if (!announcement) return;
            
            // Update modal content
            document.getElementById('modal-title').textContent = announcement.title;
            document.getElementById('modal-date').textContent = announcement.date;
            document.getElementById('modal-author').textContent = announcement.author;
            document.getElementById('modal-category').textContent = announcement.category;
            document.getElementById('modal-message').textContent = announcement.fullMessage;
            
            // Update priority indicator
            const priorityElement = document.getElementById('modal-priority');
            priorityElement.className = 'modal-priority ' + announcement.priority;
            priorityElement.textContent = announcement.priority === 'urgent' ? '🔴 Urgent' : 
                                         announcement.priority === 'important' ? '🟡 Important' : '🔵 General';
            
            // Update attachments
            const attachmentsSection = document.querySelector('.attachments-section');
            attachmentsSection.innerHTML = '<div class="section-title">Attachments</div>';
            
            announcement.attachments.forEach(attachment => {
                const isPDF = attachment.toLowerCase().endsWith('.pdf');
                const isImage = attachment.toLowerCase().match(/\.(jpg|jpeg|png|gif)$/);
                
                const attachmentItem = document.createElement('div');
                attachmentItem.className = 'attachment-item';
                attachmentItem.innerHTML = `
                    <i class="fas ${isPDF ? 'fa-file-pdf' : isImage ? 'fa-image' : 'fa-file'} attachment-icon"></i>
                    <span>${attachment}</span>
                `;
                attachmentsSection.appendChild(attachmentItem);
            });
            
            // Update affected section
            document.querySelector('.affected-section div:last-child').textContent = announcement.affected;
            
            // Update important dates
            const datesSection = document.querySelector('.dates-section');
            datesSection.innerHTML = '<div class="section-title">Important Dates</div>';
            
            announcement.importantDates.forEach(date => {
                const dateElement = document.createElement('div');
                dateElement.textContent = date;
                datesSection.appendChild(dateElement);
            });
            
            // Show modal
            modal.style.display = 'flex';
        }
        
        // Update notification badge count
        function updateNotificationBadge() {
            const unreadCount = announcements.filter(a => a.unread).length;
            notificationBadge.textContent = unreadCount;
            notificationBadge.style.display = unreadCount > 0 ? 'flex' : 'none';
            
            // Add pulse animation if there are unread announcements
            if (unreadCount > 0) {
                notificationBadge.classList.add('pulse');
            } else {
                notificationBadge.classList.remove('pulse');
            }
        }
        
        // Simulate new announcements
        setTimeout(() => {
            // Add a new urgent announcement after 5 seconds
            const newAnnouncement = {
                id: 6,
                title: "URGENT: Sports Day Cancelled Due to Weather",
                category: "General",
                priority: "urgent",
                preview: "Due to severe weather warnings, the annual Sports Day has been cancelled...",
                fullMessage: "Due to severe weather warnings and for the safety of all students and staff, the annual Sports Day scheduled for tomorrow has been cancelled. A new date will be announced next week. All classes will resume as normal tomorrow. Please check the announcements for updates on the rescheduled date.",
                date: "May 16, 2023 - 3:45 PM",
                author: "Principal's Office",
                affected: "All Students and Staff",
                importantDates: ["Original Date: May 17, 2023", "New Date: To be announced"],
                attachments: ["Weather_Advisory.pdf"],
                unread: true
            };
            
            announcements.unshift(newAnnouncement);
            renderAnnouncements(announcements);
            updateNotificationBadge();
            
            // Show a visual alert for the new announcement
            const alertDiv = document.createElement('div');
            alertDiv.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: var(--navy-blue);
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                z-index: 100;
                cursor: pointer;
                animation: slideIn 0.5s ease;
                border-left: 4px solid var(--gold);
                max-width: 300px;
            `;
            alertDiv.innerHTML = `
                <strong><i class="fas fa-exclamation-circle" style="color: var(--urgent-red); margin-right: 5px;"></i> New Urgent Announcement!</strong>
                <div style="font-size: 0.9rem; margin-top: 5px;">Sports Day Cancelled Due to Weather</div>
                <div style="font-size: 0.8rem; margin-top: 8px; opacity: 0.9;">Click to view details</div>
            `;
            document.body.appendChild(alertDiv);
            
            alertDiv.addEventListener('click', () => {
                showAnnouncementDetails(6);
                alertDiv.remove();
            });
            
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.style.opacity = '0';
                    alertDiv.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => alertDiv.remove(), 500);
                }
            }, 8000);
        }, 5000);
    </script>
</body>
</html>
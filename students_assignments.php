<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Assignments - Nexis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --navy-blue: #0a1a3a;
            --navy-blue-light: #1a2a4a;
            --gold-primary: #d4af37;
            --gold-secondary: #f4d03f;
            --sidebar-width: 260px;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-dark: #2d3748;
            --text-light: #718096;
            --border-color: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        #sidebar {
            width: var(--sidebar-width);
            background: var(--navy-blue);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
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
        
        .logo-container .logo {
            width: 40px;
            height: 40px;
            background: var(--gold-primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy-blue);
            font-weight: 700;
            font-size: 18px;
        }
        
        .platform-name {
            font-size: 18px;
            font-weight: 600;
            color: white;
        }
        
        .sidebar-nav {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }
        
        .nav-item {
            margin-bottom: 2px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
            border-radius: 0 30px 30px 0;
            margin-right: 10px;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(212, 175, 55, 0.15);
            color: white;
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
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
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 3px;
        }
        
        .student-class {
            font-size: 13px;
            color: var(--gold-secondary);
            font-weight: 500;
        }

        /* Main Content */
        #main-content {
            margin-left: var(--sidebar-width);
            padding: 25px;
            transition: all 0.3s ease;
            flex: 1;
        }

        /* Mobile Toggle Button */
        #sidebarCollapse {
            display: none;
            background: var(--navy-blue);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 15px;
            margin-bottom: 20px;
            cursor: pointer;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }

        .page-description {
            color: var(--text-light);
            font-size: 14px;
        }

        /* Filter Section */
        .filter-section {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border: 1px solid var(--border-color);
        }

        .filter-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-title i {
            color: var(--gold-primary);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-label {
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .filter-label i {
            color: var(--gold-primary);
            font-size: 12px;
        }

        .filter-select {
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            color: var(--text-dark);
            background: var(--card-bg);
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
        }

        .filter-select:hover, .filter-select:focus {
            border-color: var(--gold-primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .filter-select:disabled {
            background: #f7fafc;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .filter-actions {
            display: flex;
            gap: 15px;
            margin-top: 10px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        /* Buttons */
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .btn-primary {
            background: var(--navy-blue);
            color: white;
        }

        .btn-primary:hover {
            background: var(--navy-blue-light);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            color: var(--navy-blue);
            border: 1px solid var(--border-color);
        }

        .btn-outline:hover {
            background: #f7fafc;
            border-color: var(--navy-blue);
        }

        .btn-success {
            background: var(--gold-primary);
            color: white;
        }

        .btn-success:hover {
            background: var(--gold-secondary);
            transform: translateY(-1px);
        }

        /* Selected Class Info */
        .selected-class-info {
            background: rgba(212, 175, 55, 0.05);
            border-radius: 8px;
            padding: 15px 20px;
            margin: 20px 0 30px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            display: none;
        }

        .selected-class-info.active {
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: fadeIn 0.3s ease;
        }

        .selected-class-text {
            font-size: 14px;
            color: var(--text-dark);
        }

        .selected-class-detail {
            font-weight: 600;
            color: var(--navy-blue);
            background: white;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            margin-left: 8px;
        }

        /* Assignment Grid */
        .assignments-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        /* Assignment Card */
        .assignment-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }

        .assignment-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border-color: var(--gold-primary);
        }

        .assignment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .subject {
            font-size: 13px;
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 5px;
        }

        .assignment-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--navy-blue);
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .assignment-description {
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.5;
            font-size: 14px;
            flex: 1;
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .not-submitted {
            background: rgba(245, 158, 11, 0.1);
            color: #b45309;
        }

        .submitted {
            background: rgba(34, 197, 94, 0.1);
            color: #15803d;
        }

        .late {
            background: rgba(239, 68, 68, 0.1);
            color: #b91c1c;
        }

        .graded {
            background: rgba(59, 130, 246, 0.1);
            color: #1d4ed8;
        }

        /* Assignment Details */
        .assignment-details {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }

        .detail-item i {
            color: var(--gold-primary);
            width: 16px;
        }

        .due-date {
            color: #dc2626;
            font-weight: 500;
        }

        .teacher {
            color: var(--text-light);
        }

        /* Action Buttons */
        .assignment-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .assignment-actions .btn {
            flex: 1;
            justify-content: center;
            padding: 8px 15px;
        }

        /* Grade Badge */
        .grade-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            background: rgba(212, 175, 55, 0.1);
            color: var(--navy-blue);
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            margin-top: 10px;
        }

        /* No Assignments Message */
        .no-assignments {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
            display: none;
        }

        .no-assignments.active {
            display: block;
        }

        .no-assignments i {
            font-size: 48px;
            color: #cbd5e0;
            margin-bottom: 15px;
        }

        .no-assignments h3 {
            color: var(--navy-blue);
            margin-bottom: 10px;
            font-weight: 600;
        }

        /* Loading State */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid var(--navy-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-title {
            font-size: 20px;
            color: var(--navy-blue);
            font-weight: 600;
        }

        .close-btn {
            font-size: 24px;
            cursor: pointer;
            color: var(--text-light);
            transition: color 0.2s ease;
        }

        .close-btn:hover {
            color: var(--navy-blue);
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: var(--text-light);
            font-size: 13px;
            border-top: 1px solid var(--border-color);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .assignments-container {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 992px) {
            #sidebar {
                margin-left: -260px;
            }
            
            #sidebar.active {
                margin-left: 0;
            }
            
            #main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            #sidebarCollapse {
                display: flex;
            }
            
            .filter-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .filter-grid {
                grid-template-columns: 1fr;
            }
            
            .assignments-container {
                grid-template-columns: 1fr;
            }
            
            .assignment-actions {
                flex-direction: column;
            }
            
            .filter-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .selected-class-info.active {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            #main-content {
                padding: 15px;
            }
            
            .modal-content {
                padding: 20px;
            }
            
            .page-title {
                font-size: 24px;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
   <?php include "includes/students_sidebar.php"; ?>

    <!-- Main Content -->
    <div id="main-content">
        <div class="container">
            <!-- Mobile Toggle Button -->
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fas fa-bars"></i> Menu
            </button>
            
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">My Assignments</h1>
                <p class="page-description">View and submit your assignments by selecting your branch, class, and arm</p>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-title">
                    <i class="fas fa-filter"></i> Filter Assignments
                </div>
                
                <div class="filter-grid">
                    <!-- Branch Selection -->
                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fas fa-code-branch"></i> Branch
                        </label>
                        <select class="filter-select" id="branchSelect">
                            <option value="">-- Select Branch --</option>
                            <option value="nursery">Nursery School</option>
                            <option value="primary">Primary School</option>
                            <option value="secondary">Secondary School</option>
                        </select>
                    </div>
                    
                    <!-- Class Selection -->
                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fas fa-graduation-cap"></i> Class
                        </label>
                        <select class="filter-select" id="classSelect" disabled>
                            <option value="">-- Select Branch First --</option>
                        </select>
                    </div>
                    
                    <!-- Arm Selection -->
                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fas fa-layer-group"></i> Arm
                        </label>
                        <select class="filter-select" id="armSelect" disabled>
                            <option value="">-- Select Class First --</option>
                        </select>
                    </div>
                    
                    <!-- Term Selection -->
                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fas fa-calendar-alt"></i> Term
                        </label>
                        <select class="filter-select" id="termSelect" disabled>
                            <option value="">-- Select Arm First --</option>
                        </select>
                    </div>
                </div>
                
                <div class="filter-actions">
                    <button class="btn btn-primary" id="viewAssignmentsBtn" disabled>
                        <i class="fas fa-eye"></i> View Assignments
                    </button>
                    <button class="btn btn-outline" id="resetFiltersBtn">
                        <i class="fas fa-redo"></i> Reset Filters
                    </button>
                </div>
            </div>

            <!-- Selected Class Info -->
            <div class="selected-class-info" id="selectedClassInfo">
                <div class="selected-class-text">
                    Currently viewing assignments for: 
                    <span class="selected-class-detail" id="currentBranchText">-</span> 
                    <span class="selected-class-detail" id="currentClassText">-</span> 
                    <span class="selected-class-detail" id="currentArmText">-</span>
                </div>
                <div>
                    <button class="btn btn-outline btn-sm" id="refreshBtn">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>
            </div>

            <!-- Assignments Grid -->
            <div class="assignments-container" id="assignmentsContainer">
                <!-- Assignment cards will be dynamically inserted here -->
            </div>

            <!-- No Assignments Message -->
            <div class="no-assignments" id="noAssignmentsMessage">
                <i class="fas fa-clipboard-list"></i>
                <h3>No Assignments Found</h3>
                <p>Select your branch, class, and arm to view assignments</p>
            </div>

            <!-- Footer -->
            <footer>
                <p>Assignment Management System | Keep track of all your academic tasks</p>
                <p style="margin-top: 5px;"><i class="fas fa-lightbulb" style="color: var(--gold-primary);"></i> Remember to check assignments regularly to avoid missing deadlines</p>
            </footer>
        </div>
    </div>

    <!-- Submission Modal -->
    <div id="submissionModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalAssignmentTitle">Submit Assignment</h3>
                <span class="close-btn" id="closeModal">&times;</span>
            </div>
            <div id="modalAssignmentDetails">
                <!-- Assignment details will be dynamically inserted here -->
            </div>
        </div>
    </div>

    <script>
        // Assignment data structure
        const assignmentsData = {
            // Nursery School Branch
            nursery: {
                name: "Nursery School",
                classes: [
                    {
                        name: "Nursery 1",
                        arms: ["A", "B", "C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: [
                            {
                                id: 101,
                                subject: "Creative Arts",
                                title: "Coloring Activity",
                                description: "Color the animal pictures using crayons. Focus on staying within the lines.",
                                dueDate: "2023-11-20T23:59:00",
                                status: "not-submitted",
                                teacher: "Miss Sarah",
                                attachments: ["coloring_sheet.pdf"]
                            },
                            {
                                id: 102,
                                subject: "Basic Counting",
                                title: "Number Recognition",
                                description: "Practice counting from 1 to 10. Parents should help document progress.",
                                dueDate: "2023-11-15T23:59:00",
                                status: "submitted",
                                teacher: "Miss Sarah",
                                attachments: ["counting_worksheet.pdf"]
                            }
                        ]
                    },
                    {
                        name: "Nursery 2",
                        arms: ["A", "B"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: [
                            {
                                id: 103,
                                subject: "Alphabet Practice",
                                title: "Letter Recognition",
                                description: "Practice recognizing letters A to E. Use the provided flashcards.",
                                dueDate: "2023-11-18T23:59:00",
                                status: "not-submitted",
                                teacher: "Miss Grace",
                                attachments: ["alphabet_flashcards.pdf"]
                            }
                        ]
                    }
                ]
            },
            
            // Primary School Branch
            primary: {
                name: "Primary School",
                classes: [
                    {
                        name: "Primary 1",
                        arms: ["A", "B", "C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: [
                            {
                                id: 201,
                                subject: "Mathematics",
                                title: "Addition Practice",
                                description: "Complete the addition worksheets 1-20. Show all your work.",
                                dueDate: "2023-11-15T23:59:00",
                                status: "not-submitted",
                                teacher: "Mr. Johnson",
                                attachments: ["addition_worksheet.pdf"]
                            },
                            {
                                id: 202,
                                subject: "English",
                                title: "Reading Comprehension",
                                description: "Read the short story and answer the comprehension questions.",
                                dueDate: "2023-11-10T23:59:00",
                                status: "graded",
                                teacher: "Mrs. Williams",
                                attachments: ["story_reading.pdf"],
                                grade: "B+"
                            }
                        ]
                    },
                    {
                        name: "Primary 4",
                        arms: ["A", "B"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: [
                            {
                                id: 203,
                                subject: "Science",
                                title: "Plant Growth Experiment",
                                description: "Observe and document the growth of your bean plant for 7 days.",
                                dueDate: "2023-11-25T23:59:00",
                                status: "submitted",
                                teacher: "Ms. Davis",
                                attachments: ["experiment_template.docx"]
                            }
                        ]
                    },
                    {
                        name: "Primary 6",
                        arms: ["A", "B"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: [
                            {
                                id: 204,
                                subject: "Social Studies",
                                title: "Community Helpers Project",
                                description: "Research and create a poster about community helpers.",
                                dueDate: "2023-11-05T23:59:00",
                                status: "late",
                                teacher: "Mr. Thompson",
                                attachments: ["project_guidelines.pdf"]
                            }
                        ]
                    }
                ]
            },
            
            // Secondary School Branch
            secondary: {
                name: "Secondary School",
                classes: [
                    {
                        name: "JSS 1",
                        arms: ["A", "B", "C", "D"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: [
                            {
                                id: 301,
                                subject: "Mathematics",
                                title: "Algebra Basics",
                                description: "Solve the algebraic equations from exercise 1-15.",
                                dueDate: "2023-11-20T23:59:00",
                                status: "not-submitted",
                                teacher: "Mr. Ahmed",
                                attachments: ["algebra_worksheet.pdf"]
                            }
                        ]
                    },
                    {
                        name: "JSS 3",
                        arms: ["A", "B", "C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: [
                            {
                                id: 302,
                                subject: "Basic Science",
                                title: "Energy Conservation",
                                description: "Write a 500-word essay on the importance of energy conservation.",
                                dueDate: "2023-11-18T23:59:00",
                                status: "submitted",
                                teacher: "Dr. Chen",
                                attachments: ["essay_guidelines.docx"]
                            }
                        ]
                    },
                    {
                        name: "SSS 1",
                        arms: ["Science", "Arts", "Commercial"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: {
                            Science: [
                                {
                                    id: 303,
                                    subject: "Physics",
                                    title: "Newton's Laws Lab Report",
                                    description: "Complete lab report based on the motion experiments.",
                                    dueDate: "2023-11-22T23:59:00",
                                    status: "not-submitted",
                                    teacher: "Dr. Smith",
                                    attachments: ["lab_template.docx", "data_sheet.xlsx"]
                                },
                                {
                                    id: 304,
                                    subject: "Chemistry",
                                    title: "Periodic Table Project",
                                    description: "Create a detailed analysis of Group 1 elements.",
                                    dueDate: "2023-11-12T23:59:00",
                                    status: "graded",
                                    teacher: "Mrs. Rodriguez",
                                    attachments: ["periodic_table_chart.pdf"],
                                    grade: "A-"
                                }
                            ],
                            Arts: [
                                {
                                    id: 305,
                                    subject: "Literature",
                                    title: "Poetry Analysis",
                                    description: "Analyze William Shakespeare's Sonnet 18.",
                                    dueDate: "2023-11-25T23:59:00",
                                    status: "not-submitted",
                                    teacher: "Miss Williams",
                                    attachments: ["sonnet_18.pdf"]
                                }
                            ],
                            Commercial: [
                                {
                                    id: 306,
                                    subject: "Accounting",
                                    title: "Balance Sheet Exercise",
                                    description: "Prepare balance sheets for the given scenarios.",
                                    dueDate: "2023-11-15T23:59:00",
                                    status: "submitted",
                                    teacher: "Mr. Brown",
                                    attachments: ["accounting_exercise.pdf"]
                                }
                            ]
                        }
                    },
                    {
                        name: "SSS 2",
                        arms: ["Science", "Arts", "Commercial"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: {
                            Science: [
                                {
                                    id: 307,
                                    subject: "Biology",
                                    title: "Photosynthesis Research",
                                    description: "Research paper on the process of photosynthesis.",
                                    dueDate: "2023-11-30T23:59:00",
                                    status: "not-submitted",
                                    teacher: "Dr. Lee",
                                    attachments: ["research_guidelines.pdf"]
                                }
                            ]
                        }
                    },
                    {
                        name: "SSS 3",
                        arms: ["Science", "Arts", "Commercial"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        assignments: {
                            Science: [
                                {
                                    id: 308,
                                    subject: "Further Mathematics",
                                    title: "Calculus Problems",
                                    description: "Solve the differential equations from chapter 8.",
                                    dueDate: "2023-11-10T23:59:00",
                                    status: "late",
                                    teacher: "Mr. Johnson",
                                    attachments: ["calculus_problems.pdf"]
                                }
                            ]
                        }
                    }
                ]
            }
        };

        // DOM Elements
        const branchSelect = document.getElementById('branchSelect');
        const classSelect = document.getElementById('classSelect');
        const armSelect = document.getElementById('armSelect');
        const termSelect = document.getElementById('termSelect');
        const viewAssignmentsBtn = document.getElementById('viewAssignmentsBtn');
        const resetFiltersBtn = document.getElementById('resetFiltersBtn');
        const selectedClassInfo = document.getElementById('selectedClassInfo');
        const currentBranchText = document.getElementById('currentBranchText');
        const currentClassText = document.getElementById('currentClassText');
        const currentArmText = document.getElementById('currentArmText');
        const refreshBtn = document.getElementById('refreshBtn');
        const assignmentsContainer = document.getElementById('assignmentsContainer');
        const noAssignmentsMessage = document.getElementById('noAssignmentsMessage');
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        const sidebar = document.getElementById('sidebar');

        // Current selection state
        let currentSelections = {
            branch: '',
            className: '',
            arm: '',
            term: ''
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
            setupSidebar();
            showNoAssignmentsMessage();
        });

        // Setup sidebar functionality
        function setupSidebar() {
            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth < 992 && 
                    !sidebar.contains(event.target) && 
                    !sidebarCollapse.contains(event.target) &&
                    sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
            
            // Handle sidebar navigation links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    document.querySelectorAll('.nav-link').forEach(item => {
                        item.classList.remove('active');
                    });
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Close sidebar on mobile after click
                    if (window.innerWidth < 992) {
                        sidebar.classList.remove('active');
                    }
                });
            });
        }

        // Setup event listeners
        function setupEventListeners() {
            // Branch change
            branchSelect.addEventListener('change', function() {
                const branch = this.value;
                currentSelections.branch = branch;
                
                if (branch) {
                    enableClassSelect(branch);
                } else {
                    disableClassSelect();
                    disableArmSelect();
                    disableTermSelect();
                    disableViewAssignmentsBtn();
                }
            });

            // Class change
            classSelect.addEventListener('change', function() {
                const className = this.value;
                currentSelections.className = className;
                
                if (className) {
                    enableArmSelect(currentSelections.branch, className);
                } else {
                    disableArmSelect();
                    disableTermSelect();
                    disableViewAssignmentsBtn();
                }
            });

            // Arm change
            armSelect.addEventListener('change', function() {
                const arm = this.value;
                currentSelections.arm = arm;
                
                if (arm) {
                    enableTermSelect(currentSelections.branch, currentSelections.className, arm);
                } else {
                    disableTermSelect();
                    disableViewAssignmentsBtn();
                }
            });

            // Term change
            termSelect.addEventListener('change', function() {
                const term = this.value;
                currentSelections.term = term;
                
                if (term) {
                    enableViewAssignmentsBtn();
                } else {
                    disableViewAssignmentsBtn();
                }
            });

            // View assignments button
            viewAssignmentsBtn.addEventListener('click', loadAssignments);

            // Reset filters button
            resetFiltersBtn.addEventListener('click', resetFilters);

            // Refresh button
            refreshBtn.addEventListener('click', loadAssignments);
        }

        // Enable class select and populate
        function enableClassSelect(branch) {
            const classes = assignmentsData[branch].classes;
            classSelect.disabled = false;
            classSelect.innerHTML = '<option value="">-- Select Class --</option>';
            
            classes.forEach(cls => {
                const option = document.createElement('option');
                option.value = cls.name;
                option.textContent = cls.name;
                classSelect.appendChild(option);
            });
            
            // Reset dependent selects
            disableArmSelect();
            disableTermSelect();
            disableViewAssignmentsBtn();
        }

        // Disable class select
        function disableClassSelect() {
            classSelect.disabled = true;
            classSelect.innerHTML = '<option value="">-- Select Branch First --</option>';
        }

        // Enable arm select and populate
        function enableArmSelect(branch, className) {
            const classes = assignmentsData[branch].classes;
            const selectedClass = classes.find(cls => cls.name === className);
            
            armSelect.disabled = false;
            armSelect.innerHTML = '<option value="">-- Select Arm --</option>';
            
            selectedClass.arms.forEach(arm => {
                const option = document.createElement('option');
                option.value = arm;
                option.textContent = arm;
                armSelect.appendChild(option);
            });
            
            // Reset dependent selects
            disableTermSelect();
            disableViewAssignmentsBtn();
        }

        // Disable arm select
        function disableArmSelect() {
            armSelect.disabled = true;
            armSelect.innerHTML = '<option value="">-- Select Class First --</option>';
        }

        // Enable term select and populate
        function enableTermSelect(branch, className, arm) {
            const classes = assignmentsData[branch].classes;
            const selectedClass = classes.find(cls => cls.name === className);
            
            termSelect.disabled = false;
            termSelect.innerHTML = '<option value="">-- Select Term --</option>';
            
            selectedClass.terms.forEach(term => {
                const option = document.createElement('option');
                option.value = term;
                option.textContent = term;
                termSelect.appendChild(option);
            });
            
            disableViewAssignmentsBtn();
        }

        // Disable term select
        function disableTermSelect() {
            termSelect.disabled = true;
            termSelect.innerHTML = '<option value="">-- Select Arm First --</option>';
        }

        // Enable view assignments button
        function enableViewAssignmentsBtn() {
            viewAssignmentsBtn.disabled = false;
        }

        // Disable view assignments button
        function disableViewAssignmentsBtn() {
            viewAssignmentsBtn.disabled = true;
        }

        // Load assignments based on selections
        function loadAssignments() {
            const { branch, className, arm, term } = currentSelections;
            
            if (!branch || !className || !arm || !term) {
                showNotification('Please make all selections first', 'error');
                return;
            }
            
            // Update selected class info
            updateSelectedClassInfo(branch, className, arm);
            
            // Get assignments for the selected class
            const assignments = getAssignments(branch, className, arm);
            
            // Display assignments
            displayAssignments(assignments);
            
            // Show/hide no assignments message
            if (assignments.length === 0) {
                showNoAssignmentsMessage();
            } else {
                hideNoAssignmentsMessage();
            }
            
            // Scroll to assignments
            assignmentsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            
            showNotification('Assignments loaded successfully!', 'success');
        }

        // Get assignments based on selections
        function getAssignments(branch, className, arm) {
            const classes = assignmentsData[branch].classes;
            const selectedClass = classes.find(cls => cls.name === className);
            
            // Check if assignments are organized by arm (for secondary school)
            if (selectedClass.assignments && Array.isArray(selectedClass.assignments)) {
                return selectedClass.assignments;
            } else if (selectedClass.assignments && selectedClass.assignments[arm]) {
                return selectedClass.assignments[arm];
            }
            
            return [];
        }

        // Update selected class info
        function updateSelectedClassInfo(branch, className, arm) {
            currentBranchText.textContent = assignmentsData[branch].name;
            currentClassText.textContent = className;
            currentArmText.textContent = arm;
            selectedClassInfo.classList.add('active');
        }

        // Display assignments in grid
        function displayAssignments(assignments) {
            assignmentsContainer.innerHTML = '';
            
            assignments.forEach(assignment => {
                const assignmentCard = createAssignmentCard(assignment);
                assignmentsContainer.appendChild(assignmentCard);
            });
        }

        // Create assignment card element
        function createAssignmentCard(assignment) {
            const card = document.createElement('div');
            card.className = 'assignment-card';
            
            // Format due date
            const dueDate = new Date(assignment.dueDate);
            const formattedDueDate = dueDate.toLocaleDateString('en-US', { 
                month: 'short', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            
            // Determine if assignment is overdue
            const now = new Date();
            const isOverdue = dueDate < now && assignment.status === 'not-submitted';
            
            // Determine status text and class
            let statusText, statusClass;
            switch(assignment.status) {
                case 'not-submitted':
                    statusText = 'Not Submitted';
                    statusClass = 'not-submitted';
                    break;
                case 'submitted':
                    statusText = 'Submitted';
                    statusClass = 'submitted';
                    break;
                case 'late':
                    statusText = 'Late';
                    statusClass = 'late';
                    break;
                case 'graded':
                    statusText = 'Graded';
                    statusClass = 'graded';
                    break;
            }
            
            card.innerHTML = `
                <div class="assignment-header">
                    <div>
                        <div class="subject">${assignment.subject}</div>
                        <h3 class="assignment-title">${assignment.title}</h3>
                    </div>
                    <span class="status-badge ${statusClass}">${statusText}</span>
                </div>
                
                <p class="assignment-description">${assignment.description}</p>
                
                <div class="assignment-details">
                    <div class="detail-item due-date">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Due: ${formattedDueDate}</span>
                    </div>
                    <div class="detail-item teacher">
                        <i class="fas fa-user-graduate"></i>
                        <span>${assignment.teacher}</span>
                    </div>
                </div>
                
                ${assignment.grade ? `
                <div class="grade-badge">
                    <i class="fas fa-star"></i>
                    <span>Grade: ${assignment.grade}</span>
                </div>
                ` : ''}
                
                ${isOverdue ? `
                <div class="detail-item" style="color: #dc2626; margin-top: 10px;">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>This assignment is overdue</span>
                </div>
                ` : ''}
                
                <div class="assignment-actions">
                    <button class="btn btn-primary view-details-btn" data-id="${assignment.id}">
                        <i class="fas fa-info-circle"></i> Details
                    </button>
                    ${assignment.attachments && assignment.attachments.length > 0 ? `
                    <button class="btn btn-outline download-btn" data-id="${assignment.id}">
                        <i class="fas fa-download"></i> Materials
                    </button>
                    ` : ''}
                    ${assignment.status === 'not-submitted' || assignment.status === 'late' ? `
                    <button class="btn btn-success submit-btn" data-id="${assignment.id}">
                        <i class="fas fa-upload"></i> Submit
                    </button>
                    ` : ''}
                </div>
            `;
            
            return card;
        }

        // Show no assignments message
        function showNoAssignmentsMessage() {
            noAssignmentsMessage.classList.add('active');
        }

        // Hide no assignments message
        function hideNoAssignmentsMessage() {
            noAssignmentsMessage.classList.remove('active');
        }

        // Reset all filters
        function resetFilters() {
            // Reset selections
            currentSelections = {
                branch: '',
                className: '',
                arm: '',
                term: ''
            };
            
            // Reset selects
            branchSelect.value = '';
            classSelect.value = '';
            armSelect.value = '';
            termSelect.value = '';
            
            // Disable selects
            classSelect.disabled = true;
            classSelect.innerHTML = '<option value="">-- Select Branch First --</option>';
            armSelect.disabled = true;
            armSelect.innerHTML = '<option value="">-- Select Class First --</option>';
            termSelect.disabled = true;
            termSelect.innerHTML = '<option value="">-- Select Arm First --</option>';
            viewAssignmentsBtn.disabled = true;
            
            // Hide selected class info
            selectedClassInfo.classList.remove('active');
            
            // Clear assignments
            assignmentsContainer.innerHTML = '';
            
            // Show no assignments message
            showNoAssignmentsMessage();
            
            showNotification('Filters reset successfully', 'success');
        }

        // Show notification
        function showNotification(message, type = 'info') {
            // In a real application, this would show a toast notification
            console.log(`${type}: ${message}`);
            
            // For demo, we'll use alert
            if (type === 'error') {
                alert(`Error: ${message}`);
            } else if (type === 'success') {
                // Success notifications are silent in this demo
            }
        }

        // Handle assignment card button clicks
        assignmentsContainer.addEventListener('click', function(e) {
            const target = e.target;
            const button = target.closest('button');
            
            if (!button) return;
            
            const assignmentId = button.getAttribute('data-id');
            
            if (button.classList.contains('view-details-btn')) {
                viewAssignmentDetails(assignmentId);
            } else if (button.classList.contains('download-btn')) {
                downloadMaterials(assignmentId);
            } else if (button.classList.contains('submit-btn')) {
                submitAssignment(assignmentId);
            }
        });

        // View assignment details
        function viewAssignmentDetails(assignmentId) {
            // Find the assignment
            let assignment = null;
            
            // Search through all assignments
            for (const branch in assignmentsData) {
                for (const cls of assignmentsData[branch].classes) {
                    if (Array.isArray(cls.assignments)) {
                        const found = cls.assignments.find(a => a.id == assignmentId);
                        if (found) assignment = found;
                    } else if (cls.assignments) {
                        for (const arm in cls.assignments) {
                            const found = cls.assignments[arm].find(a => a.id == assignmentId);
                            if (found) assignment = found;
                        }
                    }
                }
            }
            
            if (!assignment) return;
            
            // Open modal with assignment details
            const modal = document.getElementById('submissionModal');
            const modalTitle = document.getElementById('modalAssignmentTitle');
            const modalDetails = document.getElementById('modalAssignmentDetails');
            const closeBtn = document.getElementById('closeModal');
            
            // Format due date
            const dueDate = new Date(assignment.dueDate);
            const formattedDueDate = dueDate.toLocaleDateString('en-US', { 
                weekday: 'long',
                year: 'numeric',
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            
            modalTitle.textContent = `Assignment: ${assignment.title}`;
            modalDetails.innerHTML = `
                <div style="margin-bottom: 20px;">
                    <p><strong>Subject:</strong> ${assignment.subject}</p>
                    <p><strong>Teacher:</strong> ${assignment.teacher}</p>
                    <p><strong>Due Date:</strong> ${formattedDueDate}</p>
                    <p><strong>Status:</strong> <span class="status-badge ${assignment.status}">${getStatusText(assignment.status)}</span></p>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <h4 style="color: var(--navy-blue); margin-bottom: 10px;">Description:</h4>
                    <p>${assignment.description}</p>
                </div>
                
                ${assignment.attachments && assignment.attachments.length > 0 ? `
                <div>
                    <h4 style="color: var(--navy-blue); margin-bottom: 10px;">Attachments:</h4>
                    <ul style="margin-left: 20px;">
                        ${assignment.attachments.map(file => `<li><i class="fas fa-file" style="color: var(--gold-primary); margin-right: 8px;"></i>${file}</li>`).join('')}
                    </ul>
                </div>
                ` : ''}
            `;
            
            modal.style.display = 'flex';
            
            // Close modal when X is clicked
            closeBtn.onclick = function() {
                modal.style.display = 'none';
            };
            
            // Close modal when clicking outside
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            };
        }

        // Download materials (simulated)
        function downloadMaterials(assignmentId) {
            showNotification('Downloading assignment materials...', 'info');
        }

        // Submit assignment (simulated)
        function submitAssignment(assignmentId) {
            showNotification('Opening submission page...', 'info');
        }

        // Helper function to get status text
        function getStatusText(status) {
            switch(status) {
                case 'not-submitted': return 'Not Submitted';
                case 'submitted': return 'Submitted';
                case 'late': return 'Late';
                case 'graded': return 'Graded';
                default: return '';
            }
        }
    </script>
</body>
</html>
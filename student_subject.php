<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Management - Nexis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            display: flex;
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
        #main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s ease;
            min-height: 100vh;
            flex: 1;
        }
        
        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Header */
        .header {
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
        
        /* Mobile Toggle Button */
        #sidebarCollapse {
            display: none;
            background: var(--navy-blue);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 20px;
            cursor: pointer;
            align-items: center;
            gap: 10px;
        }
        
        /* Filter Section */
        .filter-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .filter-title {
            font-size: 20px;
            color: var(--navy-blue);
            font-weight: 700;
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
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
        }
        
        .filter-label {
            font-size: 14px;
            color: #666;
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
            padding: 12px 15px;
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            color: var(--navy-blue);
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .filter-select:hover, .filter-select:focus {
            border-color: var(--navy-blue);
            outline: none;
        }
        
        .filter-select:disabled {
            background: #f5f5f5;
            cursor: not-allowed;
            opacity: 0.7;
        }
        
        .filter-actions {
            display: flex;
            gap: 15px;
            margin-top: 10px;
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
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .btn-outline {
            padding: 12px 25px;
            background: white;
            color: var(--navy-blue);
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: #f8f9fa;
            border-color: var(--navy-blue);
        }
        
        /* Selected Class Info */
        .selected-class-info {
            background: rgba(212, 175, 55, 0.1);
            border-radius: 8px;
            padding: 15px 20px;
            margin: 20px 0;
            border-left: 4px solid var(--gold-primary);
            display: none;
        }
        
        .selected-class-info.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        .selected-class-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .selected-class-details {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .selected-class-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .selected-class-value {
            font-weight: 600;
            color: var(--navy-blue);
            background: white;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }
        
        /* Subjects Grid */
        .subjects-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            display: none;
        }
        
        .subjects-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
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
        
        .total-subjects {
            background: var(--gold-primary);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .subjects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        
        .subject-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .subject-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border-color: var(--gold-primary);
        }
        
        .subject-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .subject-name {
            font-size: 16px;
            font-weight: 700;
            color: var(--navy-blue);
        }
        
        .subject-code {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold-primary);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .subject-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .detail-item {
            display: flex;
            flex-direction: column;
        }
        
        .detail-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 3px;
        }
        
        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--navy-blue);
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
        
        .subject-remarks {
            font-size: 12px;
            color: #666;
            font-style: italic;
            padding-top: 10px;
            border-top: 1px dashed #ddd;
        }
        
        /* Results Summary */
        .results-summary {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            display: none;
        }
        
        .results-summary.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .summary-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            border: 1px solid #e9ecef;
        }
        
        .summary-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .summary-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--navy-blue);
            margin-bottom: 5px;
        }
        
        .summary-subtitle {
            font-size: 12px;
            color: #666;
        }
        
        /* Download Section */
        .download-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: none;
        }
        
        .download-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .download-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .filter-grid {
                grid-template-columns: repeat(2, 1fr);
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
                padding: 15px;
            }
            
            #sidebarCollapse {
                display: flex;
            }
            
            .container {
                padding: 0;
            }
            
            .filter-grid {
                grid-template-columns: 1fr;
            }
            
            .subjects-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .user-info {
                flex-direction: column;
                text-align: center;
            }
            
            .subjects-grid {
                grid-template-columns: 1fr;
            }
            
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .selected-class-details {
                flex-direction: column;
                gap: 10px;
            }
            
            .download-actions {
                flex-direction: column;
            }
            
            .filter-actions {
                flex-direction: column;
            }
            
            .btn-primary, .btn-outline {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            #main-content {
                padding: 10px;
            }
            
            .summary-grid {
                grid-template-columns: 1fr;
            }
            
            .subject-details {
                grid-template-columns: 1fr;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Loading State */
        .loading {
            position: relative;
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
        
        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
        
        /* No Results Message */
        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: #666;
            display: block;
        }
        
        .no-results i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 15px;
        }
        
        .no-results h3 {
            color: var(--navy-blue);
            margin-bottom: 10px;
        }
        
        /* Notification Styles */
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include "<includes/students_sidebar.php"; ?>

    <!-- Main Content -->
    <div id="main-content">
        <div class="container">
            <!-- Mobile Toggle Button -->
            <button type="button" id="sidebarCollapse" class="btn">
                <i class="fas fa-bars"></i> Menu
            </button>
            
            <!-- Header -->
            <div class="header">
                <div class="page-title">
                    <h1>Results Management System</h1>
                    <p class="welcome-text">Filter and view academic results by branch, class, and arm</p>
                </div>
                <div class="user-info">
                    <div class="student-avatar">AJ</div>
                    <div class="student-details">
                        <h3>Alex Johnson</h3>
                        <p>Grade 10A | Roll No: 15</p>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-title">
                    <i class="fas fa-filter"></i> Filter Results
                </div>
                
                <div class="filter-grid">
                    <!-- Branch Selection -->
                    <div class="filter-group">
                        <label class="filter-label">
                            <i class="fas fa-code-branch"></i> Branch
                        </label>
                        <select class="filter-select" id="branchSelect">
                            <option value="">-- Select Branch --</option>
                            <option value="kindergarten">Kindergarten</option>
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
                            <i class="fas fa-calendar-alt"></i> Term/Semester
                        </label>
                        <select class="filter-select" id="termSelect" disabled>
                            <option value="">-- Select Arm First --</option>
                        </select>
                    </div>
                </div>
                
                <div class="filter-actions">
                    <button class="btn-primary" id="viewResultsBtn" disabled onclick="loadResults()">
                        <i class="fas fa-eye"></i> View Results
                    </button>
                    <button class="btn-outline" onclick="resetFilters()">
                        <i class="fas fa-redo"></i> Reset Filters
                    </button>
                </div>
            </div>

            <!-- Selected Class Info -->
            <div class="selected-class-info" id="selectedClassInfo">
                <div class="selected-class-title">Currently Viewing Results For:</div>
                <div class="selected-class-details">
                    <div class="selected-class-item">
                        <span>Branch:</span>
                        <span class="selected-class-value" id="currentBranch">-</span>
                    </div>
                    <div class="selected-class-item">
                        <span>Class:</span>
                        <span class="selected-class-value" id="currentClass">-</span>
                    </div>
                    <div class="selected-class-item">
                        <span>Arm:</span>
                        <span class="selected-class-value" id="currentArm">-</span>
                    </div>
                    <div class="selected-class-item">
                        <span>Term:</span>
                        <span class="selected-class-value" id="currentTerm">-</span>
                    </div>
                </div>
            </div>

            <!-- Results Summary -->
            <div class="results-summary" id="resultsSummary">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-chart-bar"></i> Results Summary
                    </h2>
                    <div class="total-subjects" id="totalSubjects">0 Subjects</div>
                </div>
                
                <div class="summary-grid">
                    <div class="summary-card">
                        <div class="summary-title">Average Score</div>
                        <div class="summary-value" id="averageScore">0%</div>
                        <div class="summary-subtitle">Overall Performance</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-title">Total Subjects</div>
                        <div class="summary-value" id="subjectCount">0</div>
                        <div class="summary-subtitle">All Courses</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-title">Highest Score</div>
                        <div class="summary-value" id="highestScore">0%</div>
                        <div class="summary-subtitle">Best Subject</div>
                    </div>
                    <div class="summary-card">
                        <div class="summary-title">Lowest Score</div>
                        <div class="summary-value" id="lowestScore">0%</div>
                        <div class="summary-subtitle">Needs Improvement</div>
                    </div>
                </div>
            </div>

            <!-- Subjects Grid -->
            <div class="subjects-section" id="subjectsSection">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-book"></i> Subjects & Grades
                    </h2>
                    <div class="total-subjects" id="gridTotalSubjects">0 Subjects</div>
                </div>
                
                <div class="subjects-grid" id="subjectsGrid">
                    <!-- Subjects will be populated by JavaScript -->
                </div>
                
                <div class="no-results" id="noResultsMessage">
                    <i class="fas fa-book"></i>
                    <h3>No Subjects Found</h3>
                    <p>Please select a branch, class, and arm to view subjects</p>
                </div>
            </div>

            <!-- Download Section -->
            <div class="download-section" id="downloadSection">
                <h2 class="section-title">
                    <i class="fas fa-download"></i> Download Results
                </h2>
                <p style="color: #666; margin-bottom: 20px;">Download the results for the selected class in various formats</p>
                
                <div class="download-actions">
                    <button class="btn-primary" onclick="downloadPDF()">
                        <i class="fas fa-file-pdf"></i> Download PDF Report
                    </button>
                    <button class="btn-outline" onclick="downloadExcel()">
                        <i class="fas fa-file-excel"></i> Download Excel Sheet
                    </button>
                    <button class="btn-outline" onclick="printResults()">
                        <i class="fas fa-print"></i> Print Results
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data structure for the hierarchical system
        const academicData = {
            // Kindergarten Branch
            kindergarten: {
                name: "Kindergarten",
                classes: [
                    {
                        name: "Kindergarten 1",
                        arms: ["KG 1A", "KG 1B", "KG 1C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Number Work", code: "KG1-MATH", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent counting skills" },
                            { name: "Letter Work", code: "KG1-ENG", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Good alphabet recognition" },
                            { name: "Social Habits", code: "KG1-SOC", grade: "B", continuous: 34, examination: 50, total: 84, remarks: "Good interaction skills" },
                            { name: "Health Habits", code: "KG1-HEA", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent hygiene habits" },
                            { name: "Creative Arts", code: "KG1-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Very creative" }
                        ]
                    },
                    {
                        name: "Kindergarten 2",
                        arms: ["KG 2A", "KG 2B", "KG 2C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Number Work", code: "KG2-MATH", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent addition skills" },
                            { name: "Letter Work", code: "KG2-ENG", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good reading skills" },
                            { name: "Social Habits", code: "KG2-SOC", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent team player" },
                            { name: "Health Habits", code: "KG2-HEA", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Very health conscious" },
                            { name: "Creative Arts", code: "KG2-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                            { name: "Science", code: "KG2-SCI", grade: "B", continuous: 33, examination: 49, total: 82, remarks: "Good observation skills" }
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
                        arms: ["P1A", "P1B", "P1C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "P1-MATH", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent numerical skills" },
                            { name: "English Language", code: "P1-ENG", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good reading skills" },
                            { name: "Basic Science", code: "P1-SCI", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Very curious learner" },
                            { name: "Social Studies", code: "P1-SOC", grade: "B", continuous: 32, examination: 48, total: 80, remarks: "Good participation" },
                            { name: "Creative Arts", code: "P1-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent creativity" },
                            { name: "Physical Education", code: "P1-PE", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Very active" }
                        ]
                    },
                    {
                        name: "Primary 2",
                        arms: ["P2A", "P2B", "P2C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "P2-MATH", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent problem solving" },
                            { name: "English Language", code: "P2-ENG", grade: "A", continuous: 35, examination: 53, total: 88, remarks: "Good writing skills" },
                            { name: "Basic Science", code: "P2-SCI", grade: "B+", continuous: 33, examination: 50, total: 83, remarks: "Good practical skills" },
                            { name: "Social Studies", code: "P2-SOC", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent knowledge" },
                            { name: "Creative Arts", code: "P2-ART", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Very creative" },
                            { name: "Physical Education", code: "P2-PE", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding performance" },
                            { name: "Verbal Reasoning", code: "P2-VR", grade: "B", continuous: 32, examination: 47, total: 79, remarks: "Needs improvement" }
                        ]
                    },
                    {
                        name: "Primary 3",
                        arms: ["P3A", "P3B", "P3C"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "P3-MATH", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent calculations" },
                            { name: "English Language", code: "P3-ENG", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good comprehension" },
                            { name: "Basic Science", code: "P3-SCI", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent experiments" },
                            { name: "Social Studies", code: "P3-SOC", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Good historical knowledge" },
                            { name: "Creative Arts", code: "P3-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                            { name: "Physical Education", code: "P3-PE", grade: "B", continuous: 33, examination: 49, total: 82, remarks: "Good effort" },
                            { name: "Verbal Reasoning", code: "P3-VR", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Improved skills" },
                            { name: "Quantitative Reasoning", code: "P3-QR", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent reasoning" }
                        ]
                    },
                    {
                        name: "Primary 4",
                        arms: ["P4A", "P4B"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "P4-MATH", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent calculations" },
                            { name: "English Language", code: "P4-ENG", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good writing skills" },
                            { name: "Basic Science", code: "P4-SCI", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent experiments" },
                            { name: "Social Studies", code: "P4-SOC", grade: "B", continuous: 33, examination: 49, total: 82, remarks: "Satisfactory" },
                            { name: "Creative Arts", code: "P4-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                            { name: "Physical Education", code: "P4-PE", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent performance" },
                            { name: "Verbal Reasoning", code: "P4-VR", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good improvement" },
                            { name: "Quantitative Reasoning", code: "P4-QR", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent reasoning" },
                            { name: "Computer Studies", code: "P4-COM", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent computer skills" }
                        ]
                    },
                    {
                        name: "Primary 5",
                        arms: ["P5A", "P5B"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "P5-MATH", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent calculations" },
                            { name: "English Language", code: "P5-ENG", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent writing skills" },
                            { name: "Basic Science", code: "P5-SCI", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good experiments" },
                            { name: "Social Studies", code: "P5-SOC", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent knowledge" },
                            { name: "Creative Arts", code: "P5-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                            { name: "Physical Education", code: "P5-PE", grade: "B", continuous: 33, examination: 49, total: 82, remarks: "Good effort" },
                            { name: "Verbal Reasoning", code: "P5-VR", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good improvement" },
                            { name: "Quantitative Reasoning", code: "P5-QR", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent reasoning" },
                            { name: "Computer Studies", code: "P5-COM", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent computer skills" },
                            { name: "French Language", code: "P5-FRE", grade: "B", continuous: 32, examination: 48, total: 80, remarks: "Needs practice" }
                        ]
                    },
                    {
                        name: "Primary 6",
                        arms: ["P6A", "P6B"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "P6-MATH", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent calculations" },
                            { name: "English Language", code: "P6-ENG", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent writing skills" },
                            { name: "Basic Science", code: "P6-SCI", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent experiments" },
                            { name: "Social Studies", code: "P6-SOC", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good knowledge" },
                            { name: "Creative Arts", code: "P6-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                            { name: "Physical Education", code: "P6-PE", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent performance" },
                            { name: "Verbal Reasoning", code: "P6-VR", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent reasoning" },
                            { name: "Quantitative Reasoning", code: "P6-QR", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent problem solving" },
                            { name: "Computer Studies", code: "P6-COM", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent computer skills" },
                            { name: "French Language", code: "P6-FRE", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good improvement" },
                            { name: "Home Economics", code: "P6-HEC", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent practical skills" }
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
                        arms: ["JSS 1A", "JSS 1B", "JSS 1C", "JSS 1D"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "JSS1-MATH", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent calculations" },
                            { name: "English Language", code: "JSS1-ENG", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good writing skills" },
                            { name: "Basic Science", code: "JSS1-SCI", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent experiments" },
                            { name: "Social Studies", code: "JSS1-SOC", grade: "B", continuous: 33, examination: 49, total: 82, remarks: "Satisfactory" },
                            { name: "Business Studies", code: "JSS1-BUS", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent business sense" },
                            { name: "Computer Studies", code: "JSS1-COM", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding skills" },
                            { name: "French Language", code: "JSS1-FRE", grade: "B", continuous: 32, examination: 48, total: 80, remarks: "Needs practice" },
                            { name: "Physical Education", code: "JSS1-PE", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent performance" },
                            { name: "Creative Arts", code: "JSS1-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" }
                        ]
                    },
                    {
                        name: "JSS 2",
                        arms: ["JSS 2A", "JSS 2B", "JSS 2C", "JSS 2D"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "JSS2-MATH", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent calculations" },
                            { name: "English Language", code: "JSS2-ENG", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent writing" },
                            { name: "Basic Science", code: "JSS2-SCI", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good experiments" },
                            { name: "Social Studies", code: "JSS2-SOC", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent knowledge" },
                            { name: "Business Studies", code: "JSS2-BUS", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent business sense" },
                            { name: "Computer Studies", code: "JSS2-COM", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding skills" },
                            { name: "French Language", code: "JSS2-FRE", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good improvement" },
                            { name: "Physical Education", code: "JSS2-PE", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent performance" },
                            { name: "Creative Arts", code: "JSS2-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                            { name: "Home Economics", code: "JSS2-HEC", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent practical skills" }
                        ]
                    },
                    {
                        name: "JSS 3",
                        arms: ["JSS 3A", "JSS 3B", "JSS 3C", "JSS 3D"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: [
                            { name: "Mathematics", code: "JSS3-MATH", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent calculations" },
                            { name: "English Language", code: "JSS3-ENG", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent writing" },
                            { name: "Basic Science", code: "JSS3-SCI", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent experiments" },
                            { name: "Social Studies", code: "JSS3-SOC", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good knowledge" },
                            { name: "Business Studies", code: "JSS3-BUS", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent business sense" },
                            { name: "Computer Studies", code: "JSS3-COM", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding skills" },
                            { name: "French Language", code: "JSS3-FRE", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent progress" },
                            { name: "Physical Education", code: "JSS3-PE", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding performance" },
                            { name: "Creative Arts", code: "JSS3-ART", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent creativity" },
                            { name: "Home Economics", code: "JSS3-HEC", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent practical skills" },
                            { name: "Agricultural Science", code: "JSS3-AGR", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good practical work" }
                        ]
                    },
                    {
                        name: "SSS 1",
                        arms: ["Science", "Arts", "Commercial"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: {
                            Science: [
                                { name: "Mathematics", code: "SSS1-MATH", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent calculations" },
                                { name: "English Language", code: "SSS1-ENG", grade: "B+", continuous: 35, examination: 52, total: 87, remarks: "Good writing skills" },
                                { name: "Physics", code: "SSS1-PHY", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent understanding" },
                                { name: "Chemistry", code: "SSS1-CHE", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent practicals" },
                                { name: "Biology", code: "SSS1-BIO", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding knowledge" },
                                { name: "Further Mathematics", code: "SSS1-FM", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent problem solving" },
                                { name: "Computer Science", code: "SSS1-CS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding programming" },
                                { name: "Agricultural Science", code: "SSS1-AGR", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good practical work" }
                            ],
                            Arts: [
                                { name: "Mathematics", code: "SSS1-MATH", grade: "B", continuous: 33, examination: 49, total: 82, remarks: "Satisfactory" },
                                { name: "English Language", code: "SSS1-ENG", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent writing" },
                                { name: "Literature in English", code: "SSS1-LIT", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent analysis" },
                                { name: "History", code: "SSS1-HIS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding knowledge" },
                                { name: "Government", code: "SSS1-GOV", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent understanding" },
                                { name: "Christian Religious Studies", code: "SSS1-CRS", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent knowledge" },
                                { name: "Fine Arts", code: "SSS1-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                                { name: "French", code: "SSS1-FRE", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good improvement" }
                            ],
                            Commercial: [
                                { name: "Mathematics", code: "SSS1-MATH", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good calculations" },
                                { name: "English Language", code: "SSS1-ENG", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent writing" },
                                { name: "Financial Accounting", code: "SSS1-ACC", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent accounting skills" },
                                { name: "Commerce", code: "SSS1-COM", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent business knowledge" },
                                { name: "Economics", code: "SSS1-ECO", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding understanding" },
                                { name: "Business Studies", code: "SSS1-BUS", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent business sense" },
                                { name: "Computer Studies", code: "SSS1-CS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding skills" },
                                { name: "Office Practice", code: "SSS1-OFF", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent practical skills" }
                            ]
                        }
                    },
                    {
                        name: "SSS 2",
                        arms: ["Science", "Arts", "Commercial"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: {
                            Science: [
                                { name: "Mathematics", code: "SSS2-MATH", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent calculations" },
                                { name: "English Language", code: "SSS2-ENG", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent writing" },
                                { name: "Physics", code: "SSS2-PHY", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent understanding" },
                                { name: "Chemistry", code: "SSS2-CHE", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent practicals" },
                                { name: "Biology", code: "SSS2-BIO", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding knowledge" },
                                { name: "Further Mathematics", code: "SSS2-FM", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent problem solving" },
                                { name: "Computer Science", code: "SSS2-CS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding programming" },
                                { name: "Agricultural Science", code: "SSS2-AGR", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent practical work" }
                            ],
                            Arts: [
                                { name: "Mathematics", code: "SSS2-MATH", grade: "B+", continuous: 34, examination: 51, total: 85, remarks: "Good improvement" },
                                { name: "English Language", code: "SSS2-ENG", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent writing" },
                                { name: "Literature in English", code: "SSS2-LIT", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent analysis" },
                                { name: "History", code: "SSS2-HIS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding knowledge" },
                                { name: "Government", code: "SSS2-GOV", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent understanding" },
                                { name: "Christian Religious Studies", code: "SSS2-CRS", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent knowledge" },
                                { name: "Fine Arts", code: "SSS2-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                                { name: "French", code: "SSS2-FRE", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent progress" }
                            ],
                            Commercial: [
                                { name: "Mathematics", code: "SSS2-MATH", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent calculations" },
                                { name: "English Language", code: "SSS2-ENG", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent writing" },
                                { name: "Financial Accounting", code: "SSS2-ACC", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent accounting skills" },
                                { name: "Commerce", code: "SSS2-COM", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding business knowledge" },
                                { name: "Economics", code: "SSS2-ECO", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent understanding" },
                                { name: "Business Studies", code: "SSS2-BUS", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent business sense" },
                                { name: "Computer Studies", code: "SSS2-CS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding skills" },
                                { name: "Office Practice", code: "SSS2-OFF", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent practical skills" }
                            ]
                        }
                    },
                    {
                        name: "SSS 3",
                        arms: ["Science", "Arts", "Commercial"],
                        terms: ["Term 1", "Term 2", "Term 3"],
                        subjects: {
                            Science: [
                                { name: "Mathematics", code: "SSS3-MATH", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Excellent calculations" },
                                { name: "English Language", code: "SSS3-ENG", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent writing" },
                                { name: "Physics", code: "SSS3-PHY", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding understanding" },
                                { name: "Chemistry", code: "SSS3-CHE", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent practicals" },
                                { name: "Biology", code: "SSS3-BIO", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding knowledge" },
                                { name: "Further Mathematics", code: "SSS3-FM", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent problem solving" },
                                { name: "Computer Science", code: "SSS3-CS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding programming" },
                                { name: "Agricultural Science", code: "SSS3-AGR", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent practical work" }
                            ],
                            Arts: [
                                { name: "Mathematics", code: "SSS3-MATH", grade: "A", continuous: 36, examination: 54, total: 90, remarks: "Excellent improvement" },
                                { name: "English Language", code: "SSS3-ENG", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent writing" },
                                { name: "Literature in English", code: "SSS3-LIT", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding analysis" },
                                { name: "History", code: "SSS3-HIS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding knowledge" },
                                { name: "Government", code: "SSS3-GOV", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent understanding" },
                                { name: "Christian Religious Studies", code: "SSS3-CRS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding knowledge" },
                                { name: "Fine Arts", code: "SSS3-ART", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding creativity" },
                                { name: "French", code: "SSS3-FRE", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent progress" }
                            ],
                            Commercial: [
                                { name: "Mathematics", code: "SSS3-MATH", grade: "A", continuous: 37, examination: 55, total: 92, remarks: "Excellent calculations" },
                                { name: "English Language", code: "SSS3-ENG", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent writing" },
                                { name: "Financial Accounting", code: "SSS3-ACC", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding accounting skills" },
                                { name: "Commerce", code: "SSS3-COM", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding business knowledge" },
                                { name: "Economics", code: "SSS3-ECO", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent understanding" },
                                { name: "Business Studies", code: "SSS3-BUS", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent business sense" },
                                { name: "Computer Studies", code: "SSS3-CS", grade: "A", continuous: 39, examination: 57, total: 96, remarks: "Outstanding skills" },
                                { name: "Office Practice", code: "SSS3-OFF", grade: "A", continuous: 38, examination: 56, total: 94, remarks: "Excellent practical skills" }
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
        const viewResultsBtn = document.getElementById('viewResultsBtn');
        const selectedClassInfo = document.getElementById('selectedClassInfo');
        const currentBranch = document.getElementById('currentBranch');
        const currentClass = document.getElementById('currentClass');
        const currentArm = document.getElementById('currentArm');
        const currentTerm = document.getElementById('currentTerm');
        const subjectsGrid = document.getElementById('subjectsGrid');
        const subjectsSection = document.getElementById('subjectsSection');
        const resultsSummary = document.getElementById('resultsSummary');
        const downloadSection = document.getElementById('downloadSection');
        const totalSubjects = document.getElementById('totalSubjects');
        const gridTotalSubjects = document.getElementById('gridTotalSubjects');
        const averageScore = document.getElementById('averageScore');
        const subjectCount = document.getElementById('subjectCount');
        const highestScore = document.getElementById('highestScore');
        const lowestScore = document.getElementById('lowestScore');
        const noResultsMessage = document.getElementById('noResultsMessage');

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
        });

        // Setup sidebar functionality
        function setupSidebar() {
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const sidebar = document.getElementById('sidebar');
            
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
                    
                    // Show notification for demo purposes
                    const pageName = this.querySelector('span').textContent;
                    showNotification(`Navigating to ${pageName}...`, 'info');
                });
            });
        }

        // Setup event listeners for filter changes
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
                    disableViewResultsBtn();
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
                    disableViewResultsBtn();
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
                    disableViewResultsBtn();
                }
            });

            // Term change
            termSelect.addEventListener('change', function() {
                const term = this.value;
                currentSelections.term = term;
                
                if (term) {
                    enableViewResultsBtn();
                } else {
                    disableViewResultsBtn();
                }
            });
        }

        // Enable class select and populate
        function enableClassSelect(branch) {
            const classes = academicData[branch].classes;
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
            disableViewResultsBtn();
        }

        // Disable class select
        function disableClassSelect() {
            classSelect.disabled = true;
            classSelect.innerHTML = '<option value="">-- Select Branch First --</option>';
        }

        // Enable arm select and populate
        function enableArmSelect(branch, className) {
            const classes = academicData[branch].classes;
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
            disableViewResultsBtn();
        }

        // Disable arm select
        function disableArmSelect() {
            armSelect.disabled = true;
            armSelect.innerHTML = '<option value="">-- Select Class First --</option>';
        }

        // Enable term select and populate
        function enableTermSelect(branch, className, arm) {
            const classes = academicData[branch].classes;
            const selectedClass = classes.find(cls => cls.name === className);
            
            termSelect.disabled = false;
            termSelect.innerHTML = '<option value="">-- Select Term --</option>';
            
            selectedClass.terms.forEach(term => {
                const option = document.createElement('option');
                option.value = term;
                option.textContent = term;
                termSelect.appendChild(option);
            });
            
            disableViewResultsBtn();
        }

        // Disable term select
        function disableTermSelect() {
            termSelect.disabled = true;
            termSelect.innerHTML = '<option value="">-- Select Arm First --</option>';
        }

        // Enable view results button
        function enableViewResultsBtn() {
            viewResultsBtn.disabled = false;
        }

        // Disable view results button
        function disableViewResultsBtn() {
            viewResultsBtn.disabled = true;
        }

        // Load results based on selections
        function loadResults() {
            const { branch, className, arm, term } = currentSelections;
            
            if (!branch || !className || !arm || !term) {
                showNotification('Please make all selections first', 'error');
                return;
            }
            
            // Update selected class info
            updateSelectedClassInfo(branch, className, arm, term);
            
            // Get subjects for the selected class
            const subjects = getSubjects(branch, className, arm);
            
            // Display subjects
            displaySubjects(subjects);
            
            // Update results summary
            updateResultsSummary(subjects);
            
            // Show sections
            subjectsSection.classList.add('active');
            resultsSummary.classList.add('active');
            downloadSection.classList.add('active');
            
            // Scroll to results
            subjectsSection.scrollIntoView({ behavior: 'smooth' });
            
            showNotification('Results loaded successfully!', 'success');
        }

        // Get subjects based on selections
        function getSubjects(branch, className, arm) {
            const classes = academicData[branch].classes;
            const selectedClass = classes.find(cls => cls.name === className);
            
            // Check if subjects are organized by arm (for secondary school)
            if (selectedClass.subjects && Array.isArray(selectedClass.subjects)) {
                return selectedClass.subjects;
            } else if (selectedClass.subjects && selectedClass.subjects[arm]) {
                return selectedClass.subjects[arm];
            }
            
            return [];
        }

        // Update selected class info
        function updateSelectedClassInfo(branch, className, arm, term) {
            currentBranch.textContent = academicData[branch].name;
            currentClass.textContent = className;
            currentArm.textContent = arm;
            currentTerm.textContent = term;
            selectedClassInfo.classList.add('active');
        }

        // Display subjects in grid
        function displaySubjects(subjects) {
            subjectsGrid.innerHTML = '';
            
            if (subjects.length === 0) {
                noResultsMessage.style.display = 'block';
                return;
            }
            
            noResultsMessage.style.display = 'none';
            
            subjects.forEach(subject => {
                const subjectCard = createSubjectCard(subject);
                subjectsGrid.appendChild(subjectCard);
            });
        }

        // Create subject card element
        function createSubjectCard(subject) {
            const card = document.createElement('div');
            card.className = 'subject-card';
            
            // Determine grade badge class
            const gradeClass = `grade-${subject.grade.replace('+', '').replace('-', '')}`;
            
            card.innerHTML = `
                <div class="subject-header">
                    <div class="subject-name">${subject.name}</div>
                    <div class="subject-code">${subject.code}</div>
                </div>
                
                <div class="subject-details">
                    <div class="detail-item">
                        <div class="detail-label">Continuous (40%)</div>
                        <div class="detail-value">${subject.continuous}/40</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Examination (60%)</div>
                        <div class="detail-value">${subject.examination}/60</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Total Score</div>
                        <div class="detail-value">${subject.total}/100</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Grade</div>
                        <div class="grade-badge ${gradeClass}">${subject.grade}</div>
                    </div>
                </div>
                
                <div class="subject-remarks">
                    ${subject.remarks}
                </div>
            `;
            
            return card;
        }

        // Update results summary
        function updateResultsSummary(subjects) {
            if (subjects.length === 0) return;
            
            const total = subjects.length;
            const scores = subjects.map(s => s.total);
            const average = scores.reduce((sum, score) => sum + score, 0) / total;
            const highest = Math.max(...scores);
            const lowest = Math.min(...scores);
            
            // Update summary values
            totalSubjects.textContent = `${total} Subjects`;
            gridTotalSubjects.textContent = `${total} Subjects`;
            averageScore.textContent = `${average.toFixed(1)}%`;
            subjectCount.textContent = total;
            highestScore.textContent = `${highest}%`;
            lowestScore.textContent = `${lowest}%`;
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
            viewResultsBtn.disabled = true;
            
            // Hide sections
            selectedClassInfo.classList.remove('active');
            subjectsSection.classList.remove('active');
            resultsSummary.classList.remove('active');
            downloadSection.classList.remove('active');
            
            // Show no results message
            noResultsMessage.style.display = 'block';
            
            showNotification('Filters reset successfully', 'success');
        }

        // Download PDF
        function downloadPDF() {
            const { branch, className, arm, term } = currentSelections;
            if (!branch || !className || !arm || !term) {
                showNotification('Please select a class first', 'error');
                return;
            }
            
            showNotification('Generating PDF report...', 'info');
            // In a real application, this would generate and download a PDF
            setTimeout(() => {
                showNotification('PDF report generated successfully!', 'success');
            }, 1500);
        }

        // Download Excel
        function downloadExcel() {
            const { branch, className, arm, term } = currentSelections;
            if (!branch || !className || !arm || !term) {
                showNotification('Please select a class first', 'error');
                return;
            }
            
            showNotification('Generating Excel sheet...', 'info');
            // In a real application, this would generate and download an Excel file
            setTimeout(() => {
                showNotification('Excel sheet generated successfully!', 'success');
            }, 1500);
        }

        // Print results
        function printResults() {
            const { branch, className, arm, term } = currentSelections;
            if (!branch || !className || !arm || !term) {
                showNotification('Please select a class first', 'error');
                return;
            }
            
            showNotification('Opening print preview...', 'info');
            // In a real application, this would open print dialog
            setTimeout(() => {
                window.print();
            }, 500);
        }

        // Show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            
            // Set background color based on type
            let bgColor = '#0a1a3a'; // Default navy blue
            if (type === 'success') bgColor = '#28a745';
            if (type === 'error') bgColor = '#dc3545';
            if (type === 'info') bgColor = '#0a1a3a';
            
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${bgColor};
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 10000;
                font-weight: 500;
                animation: slideIn 0.3s ease;
                max-width: 300px;
            `;
            
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>
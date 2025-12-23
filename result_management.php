<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nexis LMS - Results Management</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- jQuery for AJAX operations -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    /* Your existing CSS stays the same */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        min-height: 100vh;
        display: flex;
    }
    .sidebar {
        width: 250px;
        background-color: #0a1a3a;
        color: #FFD700;
        flex-shrink: 0;
        padding-top: 20px;
        position: fixed;
        height: 100%;
    }
    .sidebar a {
        display: block;
        color: #FFD700;
        padding: 12px 20px;
        text-decoration: none;
        transition: background 0.3s;
    }
    .sidebar a:hover {
        background-color: #1e3c72;
        color: #FFD700;
    }
    .sidebar h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #FFD700;
    }
    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: 100%;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .card h3, .card h5 {
        color: #0a1a3a; 
    }
    .btn-primary {
        background-color: #0a1a3a;
        border: 1px solid #FFD700;
        color: #FFD700;
    }
    .btn-primary:hover {
        background-color: #1e3c72;
        color: #FFD700;
    }
    .btn-floating {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 10;
    }
    .modal-header {
        background: #0a1a3a;
        color: #FFD700;
    }
    .form-label {
        font-weight: 500;
    }
    #inputResultsTable input {
        width: 100%;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .filter-section .form-select, 
    .filter-section .form-control {
        max-width: 200px;
        margin-right: 10px;
    }
    .grade-A { background-color: #d4edda !important; color: #155724 !important; }
    .grade-B { background-color: #fff3cd !important; color: #856404 !important; }
    .grade-C { background-color: #f8d7da !important; color: #721c24 !important; }
    .grade-D { background-color: #e2e3e5 !important; color: #383d41 !important; }
    .grade-F { background-color: #dc3545 !important; color: white !important; }
    .badge-grade {
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 0.8em;
    }
    .config-panel {
        background: #f8f9fa;
        border-left: 4px solid #0a1a3a;
        padding: 15px;
        margin-bottom: 20px;
    }
    /* NEW STYLES FOR CUSTOM GRADING */
    .custom-grade-badge {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        margin: 5px;
        display: inline-block;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .custom-grade-row {
        transition: all 0.3s ease;
    }
    .custom-grade-row:hover {
        background-color: #f8f9fa;
        transform: translateY(-1px);
    }
    .grade-config-btn {
        margin-left: 10px;
    }
    /* Student ID specific styles */
    .student-id {
        font-family: monospace;
        background-color: #f8f9fa;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 0.9em;
    }
    /* Student name styles */
    .student-name {
        font-weight: 500;
        color: #333;
    }
    /* Validation error styles */
    .score-input-error {
        border: 2px solid #dc3545 !important;
        background-color: #ffe6e6;
    }
    .score-input-warning {
        border: 2px solid #ffc107 !important;
        background-color: #fff9e6;
    }
    .validation-message {
        font-size: 0.75em;
        color: #dc3545;
        margin-top: 2px;
    }
    /* Selection panel styles */
    .selection-panel {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .selection-step {
        font-size: 0.9em;
        color: #6c757d;
        margin-bottom: 5px;
    }
    /* Reset button style */
    .reset-btn {
        margin-left: 10px;
    }
    .selection-row {
        margin-bottom: 15px;
    }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3>Nexis LMS</h3>
    <a href="#"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
    <a href="#"><i class="fas fa-user-graduate me-2"></i> Students</a>
    <a href="#"><i class="fas fa-chalkboard-teacher me-2"></i> Teachers</a>
    <a href="#"><i class="fas fa-book me-2"></i> Subjects</a>
    <a href="#" class="active"><i class="fas fa-file-alt me-2"></i> Results</a>
    <a href="#"><i class="fas fa-cogs me-2"></i> Settings</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Results Management</h3>
        <button class="btn btn-primary btn-floating" data-bs-toggle="modal" data-bs-target="#resultsModal">
            <i class="fas fa-plus-circle me-2"></i> Input Results
        </button>
    </div>

    <!-- Grading Configuration Panel -->
    <div class="card p-3 config-panel mb-3">
        <h5><i class="fas fa-sliders-h me-2"></i> Grading System Configuration</h5>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Grade Scale Type</label>
                <select class="form-select" id="gradeScaleType" onchange="updateGradingScale()">
                    <option value="standard">Standard (A: 80-100)</option>
                    <option value="waec">WAEC Scale (A1: 75-100)</option>
                    <option value="custom">Custom Scale</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-primary mt-4" onclick="openCustomGradeModal()">
                    <i class="fas fa-edit me-2"></i>Configure Custom
                </button>
            </div>
            <div class="col-md-7">
                <div class="d-flex flex-wrap align-items-center" id="gradeScaleDisplay">
                    <!-- Grades will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card p-3 mb-3 filter-section">
        <h5 class="mb-3"><i class="fas fa-filter me-2"></i> Filter / Search Results</h5>
        <div class="d-flex flex-wrap align-items-center">
            <input type="text" id="searchStudentId" class="form-control mb-2" placeholder="Search by Student ID" oninput="filterResults()" style="max-width: 150px;">
            <select class="form-select mb-2" id="filterBranch" onchange="updateFilterClasses(); filterResults()" style="max-width: 150px;">
                <option value="">All Branches</option>
                <option value="Nursery">Nursery</option>
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
            </select>
            <select class="form-select mb-2" id="filterClass" onchange="filterResults()" style="max-width: 150px;">
                <option value="">All Classes</option>
            </select>
            <select class="form-select mb-2" id="filterSubject" onchange="filterResults()" style="max-width: 200px;">
                <option value="">All Subjects</option>
            </select>
            <select class="form-select mb-2" id="filterGrade" onchange="filterResults()" style="max-width: 150px;">
                <option value="">All Grades</option>
                <option value="A">A Grade</option>
                <option value="B">B Grade</option>
                <option value="C">C Grade</option>
                <option value="D">D Grade</option>
                <option value="F">F Grade</option>
            </select>
            <button class="btn btn-outline-secondary reset-btn mb-2" onclick="resetFilters()">
                <i class="fas fa-redo me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- Results Table -->
    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="studentsResultsTable">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Session</th>
                        <th>Term</th>
                        <th>1ST CA</th>
                        <th>2ND CA</th>
                        <th>3RD CA</th>
                        <th>Exam</th>
                        <th>Total</th>
                        <th>Grade</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamically loaded results -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Input Results Modal -->
<div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultsModalLabel">Input Student Results</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info" id="dataStatusAlert" style="display: none;">
          <i class="fas fa-info-circle me-2"></i>
          <span id="statusMessage"></span>
        </div>
        <div class="alert alert-warning" id="validationAlert" style="display: none;">
          <i class="fas fa-exclamation-triangle me-2"></i>
          <span id="validationMessage"></span>
        </div>
        
        <!-- Selection Panel - ONLY 4 PARAMETERS -->
        <div class="selection-panel mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0"><i class="fas fa-cogs me-2"></i>Select Parameters (All 4 Required)</h6>
                <button class="btn btn-sm btn-outline-secondary" onclick="resetModalSelections()">
                    <i class="fas fa-redo me-1"></i> Reset Selections
                </button>
            </div>
            
            <div class="row g-3 selection-row">
                <!-- Step 1: Class Selection -->
                <div class="col-md-3">
                    <div class="selection-step">Step 1: Select Class</div>
                    <select class="form-select" id="selectClass" onchange="clearStudentsTable()">
                        <option value="">Select Class</option>
                        <option value="Play Group">Play Group</option>
                        <option value="Nursery 1">Nursery 1</option>
                        <option value="Nursery 2">Nursery 2</option>
                        <option value="Reception">Reception</option>
                        <option value="Primary 1">Primary 1</option>
                        <option value="Primary 2">Primary 2</option>
                        <option value="Primary 3">Primary 3</option>
                        <option value="Primary 4">Primary 4</option>
                        <option value="Primary 5">Primary 5</option>
                        <option value="Primary 6">Primary 6</option>
                        <option value="JSS1">JSS1</option>
                        <option value="JSS2">JSS2</option>
                        <option value="JSS3">JSS3</option>
                        <option value="SS1">SS1</option>
                        <option value="SS2">SS2</option>
                        <option value="SS3">SS3</option>
                    </select>
                </div>
                
                <!-- Step 2: Academic Session -->
                <div class="col-md-3">
                    <div class="selection-step">Step 2: Select Session</div>
                    <select class="form-select" id="selectSession" onchange="clearStudentsTable()">
                        <option value="">Select Session</option>
                        <option value="2023/2024">2023/2024</option>
                        <option value="2024/2025" selected>2024/2025</option>
                        <option value="2025/2026">2025/2026</option>
                    </select>
                </div>
                
                <!-- Step 3: Academic Term -->
                <div class="col-md-3">
                    <div class="selection-step">Step 3: Select Term</div>
                    <select class="form-select" id="selectTerm" onchange="clearStudentsTable()">
                        <option value="">Select Term</option>
                        <option value="First Term">First Term</option>
                        <option value="Second Term">Second Term</option>
                        <option value="Third Term">Third Term</option>
                    </select>
                </div>
                
                <!-- Step 4: Subject Selection -->
                <div class="col-md-3">
                    <div class="selection-step">Step 4: Select Subject</div>
                    <select class="form-select" id="selectSubject" onchange="checkAllParametersSelected()">
                        <option value="">Select Subject</option>
                        <!-- Subjects will be dynamically loaded based on class -->
                    </select>
                </div>
            </div>
            
            <!-- Check Data Button -->
            <div id="checkDataContainer" style="display: none;" class="mt-3">
                <button class="btn btn-outline-warning" onclick="checkExistingData()" id="checkDataBtn">
                    <i class="fas fa-search me-2"></i>Check Existing Data
                </button>
                <small class="text-muted ms-3">Check if results already exist for these parameters</small>
            </div>
        </div>

        <!-- Students Table (Only appears when all 4 parameters are selected) -->
        <div id="studentsTableContainer" style="display: none;">
            <div class="alert alert-info d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-info-circle me-2"></i>
                    Entering scores for <strong id="currentClassDisplay"></strong> in <strong id="currentSubjectDisplay"></strong> 
                    (<strong id="currentSessionDisplay"></strong>, <strong id="currentTermDisplay"></strong>)
                </div>
                <div>
                    <span class="badge bg-primary me-2" id="studentsCount">0 students</span>
                </div>
            </div>
            
            <div class="table-responsive">
              <table class="table table-bordered" id="inputResultsTable">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>1ST CA <small>(Max: 10)</small></th>
                    <th>2ND CA <small>(Max: 10)</small></th>
                    <th>3RD CA <small>(Max: 10)</small></th>
                    <th>Exam <small>(Max: 70)</small></th>
                    <th>Total <small>(Max: 100)</small></th>
                    <th>Grade</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
        </div>
        
        <!-- No Students Message -->
        <div id="noStudentsMessage" class="text-center text-muted py-5" style="display: none;">
            <i class="fas fa-users fa-3x mb-3"></i><br>
            <h5>No students found for the selected class</h5>
            <p>Please ensure the class is correctly selected</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="validateAndSaveResults()" id="saveBtn" disabled>
          <i class="fas fa-save me-2"></i>Save Results
        </button>
      </div>
    </div>
  </div>
</div>

<!-- CUSTOM GRADING CONFIGURATION MODAL (NEW) -->
<div class="modal fade" id="customGradeModal" tabindex="-1" aria-labelledby="customGradeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customGradeModalLabel"><i class="fas fa-cogs me-2"></i>Configure Custom Grading Scale</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <i class="fas fa-info-circle me-2"></i>
          Define your own grading scale. Add as many grade levels as you need. Ensure there are no gaps between ranges.
        </div>
        
        <div class="table-responsive">
          <table class="table table-bordered" id="customGradeTable">
            <thead class="table-light">
              <tr>
                <th>Grade</th>
                <th>Min Score</th>
                <th>Max Score</th>
                <th>Remark</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="customGradeBody">
              <!-- Custom grades will be added here -->
            </tbody>
          </table>
        </div>
        
        <div class="text-center mt-3">
          <button type="button" class="btn btn-success" onclick="addCustomGradeRow()">
            <i class="fas fa-plus-circle me-2"></i>Add Grade Level
          </button>
        </div>
        
        <div class="mt-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="enableCustomScale">
            <label class="form-check-label" for="enableCustomScale">
              Enable this custom grading scale
            </label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="saveCustomGrades()">
          <i class="fas fa-save me-2"></i>Save Custom Scale
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ==================== GLOBAL DATA & CONFIGURATION ====================

// Class to Subjects mapping (determined by class name)
const classSubjects = {
    // Nursery Classes
    'Play Group': ['Numeracy', 'Literacy', 'Creative Arts', 'Environmental Studies', 'Social Habits'],
    'Nursery 1': ['Numeracy', 'Literacy', 'Creative Arts', 'Environmental Studies', 'Social Habits'],
    'Nursery 2': ['Numeracy', 'Literacy', 'Creative Arts', 'Environmental Studies', 'Social Habits'],
    'Reception': ['Numeracy', 'Literacy', 'Creative Arts', 'Environmental Studies', 'Social Habits'],
    
    // Primary Classes
    'Primary 1': ['Mathematics', 'English Language', 'Basic Science', 'Social Studies', 'Cultural & Creative Arts', 'Christian Religious Studies'],
    'Primary 2': ['Mathematics', 'English Language', 'Basic Science', 'Social Studies', 'Cultural & Creative Arts', 'Christian Religious Studies'],
    'Primary 3': ['Mathematics', 'English Language', 'Basic Science', 'Social Studies', 'Cultural & Creative Arts', 'Christian Religious Studies'],
    'Primary 4': ['Mathematics', 'English Language', 'Basic Science', 'Social Studies', 'Cultural & Creative Arts', 'Christian Religious Studies', 'French'],
    'Primary 5': ['Mathematics', 'English Language', 'Basic Science', 'Social Studies', 'Cultural & Creative Arts', 'Christian Religious Studies', 'French'],
    'Primary 6': ['Mathematics', 'English Language', 'Basic Science', 'Social Studies', 'Cultural & Creative Arts', 'Christian Religious Studies', 'French'],
    
    // Secondary Classes
    'JSS1': ['Mathematics', 'English Language', 'Basic Science', 'Basic Technology', 'Business Studies', 'Cultural & Creative Arts', 'Christian Religious Studies', 'French'],
    'JSS2': ['Mathematics', 'English Language', 'Basic Science', 'Basic Technology', 'Business Studies', 'Cultural & Creative Arts', 'Christian Religious Studies', 'French'],
    'JSS3': ['Mathematics', 'English Language', 'Basic Science', 'Basic Technology', 'Business Studies', 'Cultural & Creative Arts', 'Christian Religious Studies', 'French'],
    'SS1': ['Mathematics', 'English Language', 'Physics', 'Chemistry', 'Biology', 'Geography', 'Economics', 'Agricultural Science', 'Computer Studies', 'French', 'Yoruba', 'Christian Religious Studies'],
    'SS2': ['Mathematics', 'English Language', 'Physics', 'Chemistry', 'Biology', 'Geography', 'Economics', 'Agricultural Science', 'Computer Studies', 'French', 'Yoruba', 'Christian Religious Studies'],
    'SS3': ['Mathematics', 'English Language', 'Physics', 'Chemistry', 'Biology', 'Geography', 'Economics', 'Agricultural Science', 'Computer Studies', 'French', 'Yoruba', 'Christian Religious Studies']
};

// Student Data with Student IDs and Names (grouped by class only)
const studentsData = {
    'Play Group': [
        { id: 'NUR001', name: 'Alice Johnson' },
        { id: 'NUR002', name: 'Bob Smith' },
        { id: 'NUR003', name: 'Charlie Brown' }
    ],
    'Nursery 1': [
        { id: 'NUR101', name: 'David Wilson' },
        { id: 'NUR102', name: 'Emma Davis' },
        { id: 'NUR103', name: 'Frank Miller' }
    ],
    'Nursery 2': [
        { id: 'NUR201', name: 'Grace Lee' },
        { id: 'NUR202', name: 'Henry Taylor' },
        { id: 'NUR203', name: 'Ivy Clark' }
    ],
    'Reception': [
        { id: 'REC001', name: 'Jack Martin' },
        { id: 'REC002', name: 'Karen White' },
        { id: 'REC003', name: 'Leo Harris' }
    ],
    'Primary 1': [
        { id: 'PRI001', name: 'Mia Thompson' },
        { id: 'PRI002', name: 'Noah Garcia' },
        { id: 'PRI003', name: 'Olivia Martinez' }
    ],
    'Primary 2': [
        { id: 'PRI101', name: 'Peter Robinson' },
        { id: 'PRI102', name: 'Quinn Walker' },
        { id: 'PRI103', name: 'Rachel Hall' }
    ],
    'Primary 3': [
        { id: 'PRI201', name: 'Samuel Young' },
        { id: 'PRI202', name: 'Tina Allen' },
        { id: 'PRI203', name: 'Umar King' }
    ],
    'Primary 4': [
        { id: 'PRI301', name: 'Victoria Wright' },
        { id: 'PRI302', name: 'William Scott' },
        { id: 'PRI303', name: 'Xena Green' }
    ],
    'Primary 5': [
        { id: 'PRI401', name: 'Yusuf Adams' },
        { id: 'PRI402', name: 'Zara Baker' },
        { id: 'PRI403', name: 'Aaron Nelson' }
    ],
    'Primary 6': [
        { id: 'PRI501', name: 'Bella Carter' },
        { id: 'PRI502', name: 'Caleb Mitchell' },
        { id: 'PRI503', name: 'Diana Perez' }
    ],
    'JSS1': [
        { id: 'JSS001', name: 'Ethan Roberts' },
        { id: 'JSS002', name: 'Fiona Turner' },
        { id: 'JSS003', name: 'George Phillips' },
        { id: 'JSS004', name: 'Hannah Scott' },
        { id: 'JSS005', name: 'Ian Walker' }
    ],
    'JSS2': [
        { id: 'JSS101', name: 'Hannah Campbell' },
        { id: 'JSS102', name: 'Isaac Parker' },
        { id: 'JSS103', name: 'Julia Evans' },
        { id: 'JSS104', name: 'Kevin Young' },
        { id: 'JSS105', name: 'Lisa King' }
    ],
    'JSS3': [
        { id: 'JSS201', name: 'Kevin Edwards' },
        { id: 'JSS202', name: 'Lily Collins' },
        { id: 'JSS203', name: 'Michael Stewart' },
        { id: 'JSS204', name: 'Nancy Allen' },
        { id: 'JSS205', name: 'Oliver Wright' }
    ],
    'SS1': [
        { id: 'SS1001', name: 'Natalie Sanchez' },
        { id: 'SS1002', name: 'Oscar Morris' },
        { id: 'SS1003', name: 'Penny Rogers' },
        { id: 'SS1004', name: 'Quincy Reed' },
        { id: 'SS1005', name: 'Rachel Cook' }
    ],
    'SS2': [
        { id: 'SS2001', name: 'Ryan Cook' },
        { id: 'SS2002', name: 'Sofia Morgan' },
        { id: 'SS2003', name: 'Thomas Bell' },
        { id: 'SS2004', name: 'Uma Murphy' },
        { id: 'SS2005', name: 'Victor Bailey' }
    ],
    'SS3': [
        { id: 'SS3001', name: 'Uma Murphy' },
        { id: 'SS3002', name: 'Victor Bailey' },
        { id: 'SS3003', name: 'Wendy Rivera' },
        { id: 'SS3004', name: 'Xavier Cooper' },
        { id: 'SS3005', name: 'Yvonne Richardson' }
    ]
};

// Class to Branch mapping (for display purposes)
const classToBranch = {
    'Play Group': 'Nursery', 'Nursery 1': 'Nursery', 'Nursery 2': 'Nursery', 'Reception': 'Nursery',
    'Primary 1': 'Primary', 'Primary 2': 'Primary', 'Primary 3': 'Primary', 'Primary 4': 'Primary',
    'Primary 5': 'Primary', 'Primary 6': 'Primary',
    'JSS1': 'Secondary', 'JSS2': 'Secondary', 'JSS3': 'Secondary',
    'SS1': 'Secondary', 'SS2': 'Secondary', 'SS3': 'Secondary'
};

// Grading System Configuration
let gradingSystem = {
    standard: [
        { grade: 'A', min: 80, max: 100, remark: 'Excellent' },
        { grade: 'B', min: 70, max: 79, remark: 'Very Good' },
        { grade: 'C', min: 60, max: 69, remark: 'Good' },
        { grade: 'D', min: 50, max: 59, remark: 'Fair' },
        { grade: 'F', min: 0, max: 49, remark: 'Fail' }
    ],
    waec: [
        { grade: 'A1', min: 75, max: 100, remark: 'Excellent' },
        { grade: 'B2', min: 70, max: 74, remark: 'Very Good' },
        { grade: 'B3', min: 65, max: 69, remark: 'Good' },
        { grade: 'C4', min: 60, max: 64, remark: 'Credit' },
        { grade: 'C5', min: 55, max: 59, remark: 'Credit' },
        { grade: 'C6', min: 50, max: 54, remark: 'Credit' },
        { grade: 'D7', min: 45, max: 49, remark: 'Pass' },
        { grade: 'E8', min: 40, max: 44, remark: 'Pass' },
        { grade: 'F9', min: 0, max: 39, remark: 'Fail' }
    ],
    custom: []
};

// Load custom grades from localStorage if available
function loadCustomGradesFromStorage() {
    const saved = localStorage.getItem('nexisCustomGrades');
    if (saved) {
        try {
            gradingSystem.custom = JSON.parse(saved);
        } catch (e) {
            console.error('Error loading custom grades:', e);
        }
    }
}

// Save custom grades to localStorage
function saveCustomGradesToStorage() {
    localStorage.setItem('nexisCustomGrades', JSON.stringify(gradingSystem.custom));
}

let allResults = [];
let currentGradingScale = 'standard';

// ==================== INITIALIZATION FUNCTIONS ====================

function initializePage() {
    // Initialize filter classes dropdown
    updateFilterClasses();
    
    // Load custom grades from storage
    loadCustomGradesFromStorage();
    
    // Initialize grading system display
    updateGradingScale();
    
    // Load sample data
    loadSampleData();
    renderResultsTable();
    updatePerformanceAverage();
}

function updateFilterClasses() {
    const branch = document.getElementById('filterBranch').value;
    const classSelect = document.getElementById('filterClass');
    classSelect.innerHTML = '<option value="">All Classes</option>';
    
    if (branch) {
        // Filter classes by branch
        Object.keys(classToBranch).forEach(className => {
            if (classToBranch[className] === branch) {
                classSelect.innerHTML += `<option value="${className}">${className}</option>`;
            }
        });
    } else {
        // Show all classes
        Object.keys(classToBranch).forEach(className => {
            classSelect.innerHTML += `<option value="${className}">${className}</option>`;
        });
    }
}

// ==================== MODAL SELECTION FUNCTIONS ====================

function updateSubjectsForClass() {
    const className = document.getElementById('selectClass').value;
    const subjectSelect = document.getElementById('selectSubject');
    subjectSelect.innerHTML = '<option value="">Select Subject</option>';
    
    if (className && classSubjects[className]) {
        classSubjects[className].forEach(subject => {
            subjectSelect.innerHTML += `<option value="${subject}">${subject}</option>`;
        });
    }
    
    checkAllParametersSelected();
}

function checkAllParametersSelected() {
    const className = document.getElementById('selectClass').value;
    const session = document.getElementById('selectSession').value;
    const term = document.getElementById('selectTerm').value;
    const subject = document.getElementById('selectSubject').value;
    
    if (className && session && term && subject) {
        // All 4 parameters selected
        document.getElementById('checkDataContainer').style.display = 'block';
        loadStudentsForResults();
    } else {
        // Not all parameters selected
        document.getElementById('checkDataContainer').style.display = 'none';
        document.getElementById('studentsTableContainer').style.display = 'none';
        document.getElementById('noStudentsMessage').style.display = 'none';
        document.getElementById('saveBtn').disabled = true;
    }
}

function clearStudentsTable() {
    document.getElementById('studentsTableContainer').style.display = 'none';
    document.getElementById('noStudentsMessage').style.display = 'none';
    document.getElementById('inputResultsTable').querySelector('tbody').innerHTML = '';
    document.getElementById('saveBtn').disabled = true;
    
    // Update subjects dropdown if class changed
    updateSubjectsForClass();
}

function resetModalSelections() {
    // Reset all dropdowns
    document.getElementById('selectClass').value = '';
    document.getElementById('selectSession').value = '';
    document.getElementById('selectTerm').value = '';
    document.getElementById('selectSubject').value = '';
    
    // Hide containers
    document.getElementById('checkDataContainer').style.display = 'none';
    document.getElementById('studentsTableContainer').style.display = 'none';
    document.getElementById('noStudentsMessage').style.display = 'none';
    
    // Clear data status
    document.getElementById('dataStatusAlert').style.display = 'none';
    document.getElementById('validationAlert').style.display = 'none';
    
    // Reset buttons
    document.getElementById('saveBtn').disabled = true;
    document.getElementById('saveBtn').innerHTML = '<i class="fas fa-save me-2"></i>Save Results';
    
    // Clear subjects dropdown
    document.getElementById('selectSubject').innerHTML = '<option value="">Select Subject</option>';
    
    alert('All selections have been reset. Please start again.');
}

// ==================== ENHANCED CUSTOM GRADING FUNCTIONS ====================

function openCustomGradeModal() {
    document.getElementById('gradeScaleType').value = 'custom';
    updateGradingScale();
    
    loadCustomGradesIntoModal();
    
    const modal = new bootstrap.Modal(document.getElementById('customGradeModal'));
    modal.show();
}

function loadCustomGradesIntoModal() {
    const tbody = document.getElementById('customGradeBody');
    tbody.innerHTML = '';
    
    if (gradingSystem.custom.length > 0) {
        gradingSystem.custom.forEach((grade, index) => {
            tbody.innerHTML += createCustomGradeRow(grade.grade, grade.min, grade.max, grade.remark, index);
        });
    } else {
        tbody.innerHTML += createCustomGradeRow('A', 80, 100, 'Excellent', 0);
        tbody.innerHTML += createCustomGradeRow('B', 70, 79, 'Very Good', 1);
        tbody.innerHTML += createCustomGradeRow('C', 60, 69, 'Good', 2);
    }
    
    document.getElementById('enableCustomScale').checked = gradingSystem.custom.length > 0;
}

function createCustomGradeRow(grade = '', min = '', max = '', remark = '', index = 0) {
    return `
    <tr class="custom-grade-row" id="gradeRow-${index}">
        <td>
            <input type="text" class="form-control grade-letter" value="${grade}" 
                   placeholder="A, B, C, A1, etc." maxlength="3">
        </td>
        <td>
            <input type="number" class="form-control grade-min" value="${min}" 
                   min="0" max="100" placeholder="0" step="0.5">
        </td>
        <td>
            <input type="number" class="form-control grade-max" value="${max}" 
                   min="0" max="100" placeholder="100" step="0.5">
        </td>
        <td>
            <input type="text" class="form-control grade-remark" value="${remark}" 
                   placeholder="Excellent, Good, etc.">
        </td>
        <td>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeCustomGradeRow(${index})">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    </tr>`;
}

function addCustomGradeRow() {
    const tbody = document.getElementById('customGradeBody');
    const index = tbody.children.length;
    tbody.innerHTML += createCustomGradeRow('', '', '', '', index);
    
    setTimeout(() => {
        const newRow = document.getElementById(`gradeRow-${index}`);
        if (newRow) {
            newRow.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }, 100);
}

function removeCustomGradeRow(index) {
    const row = document.getElementById(`gradeRow-${index}`);
    if (row) {
        if (document.getElementById('customGradeBody').children.length > 1) {
            row.remove();
            const rows = document.querySelectorAll('#customGradeBody tr');
            rows.forEach((row, newIndex) => {
                row.id = `gradeRow-${newIndex}`;
                const button = row.querySelector('button');
                if (button) {
                    button.setAttribute('onclick', `removeCustomGradeRow(${newIndex})`);
                }
            });
        } else {
            alert('At least one grade level is required.');
        }
    }
}

function validateCustomGrades() {
    const rows = document.querySelectorAll('#customGradeBody tr');
    const grades = [];
    const errors = [];
    
    rows.forEach((row, index) => {
        const grade = row.querySelector('.grade-letter').value.trim();
        const min = parseFloat(row.querySelector('.grade-min').value);
        const max = parseFloat(row.querySelector('.grade-max').value);
        const remark = row.querySelector('.grade-remark').value.trim();
        
        if (!grade) {
            errors.push(`Row ${index + 1}: Grade letter is required`);
            row.querySelector('.grade-letter').classList.add('is-invalid');
        } else {
            row.querySelector('.grade-letter').classList.remove('is-invalid');
        }
        
        if (isNaN(min) || min < 0 || min > 100) {
            errors.push(`Row ${index + 1}: Minimum score must be between 0 and 100`);
            row.querySelector('.grade-min').classList.add('is-invalid');
        } else {
            row.querySelector('.grade-min').classList.remove('is-invalid');
        }
        
        if (isNaN(max) || max < 0 || max > 100) {
            errors.push(`Row ${index + 1}: Maximum score must be between 0 and 100`);
            row.querySelector('.grade-max').classList.add('is-invalid');
        } else if (max < min) {
            errors.push(`Row ${index + 1}: Maximum score must be greater than minimum score`);
            row.querySelector('.grade-max').classList.add('is-invalid');
        } else {
            row.querySelector('.grade-max').classList.remove('is-invalid');
        }
        
        if (!remark) {
            errors.push(`Row ${index + 1}: Remark is required`);
            row.querySelector('.grade-remark').classList.add('is-invalid');
        } else {
            row.querySelector('.grade-remark').classList.remove('is-invalid');
        }
        
        if (grade && !isNaN(min) && !isNaN(max) && min >= 0 && max <= 100 && max >= min && remark) {
            grades.push({ grade, min, max, remark });
        }
    });
    
    grades.sort((a, b) => a.min - b.min);
    
    for (let i = 0; i < grades.length - 1; i++) {
        if (grades[i].max + 1 < grades[i + 1].min) {
            errors.push(`Gap between ${grades[i].grade} (up to ${grades[i].max}) and ${grades[i + 1].grade} (from ${grades[i + 1].min})`);
        }
        if (grades[i].max >= grades[i + 1].min) {
            errors.push(`Overlap between ${grades[i].grade} (${grades[i].min}-${grades[i].max}) and ${grades[i + 1].grade} (${grades[i + 1].min}-${grades[i + 1].max})`);
        }
    }
    
    return { valid: errors.length === 0, grades, errors };
}

function saveCustomGrades() {
    const validation = validateCustomGrades();
    
    if (!validation.valid) {
        alert('Please fix the following errors:\n\n' + validation.errors.join('\n'));
        return;
    }
    
    const sortedGrades = validation.grades.sort((a, b) => b.min - a.min);
    gradingSystem.custom = sortedGrades;
    
    saveCustomGradesToStorage();
    updateGradingScale();
    
    const enableCustom = document.getElementById('enableCustomScale').checked;
    if (enableCustom) {
        currentGradingScale = 'custom';
        document.getElementById('gradeScaleType').value = 'custom';
        updateGradingScale();
    }
    
    const modal = bootstrap.Modal.getInstance(document.getElementById('customGradeModal'));
    modal.hide();
    
    alert(`Custom grading scale saved successfully with ${sortedGrades.length} grade levels!`);
}

// ==================== ENHANCED GRADING DISPLAY ====================

function updateGradingScale() {
    currentGradingScale = document.getElementById('gradeScaleType').value;
    const scale = gradingSystem[currentGradingScale];
    const displayDiv = document.getElementById('gradeScaleDisplay');
    
    displayDiv.innerHTML = '';
    
    if (scale && scale.length > 0) {
        scale.forEach(gradeInfo => {
            const gradeColor = getGradeColor(gradeInfo.grade);
            displayDiv.innerHTML += `
                <div class="custom-grade-badge" style="background: ${gradeColor}">
                    <strong>${gradeInfo.grade}</strong><br>
                    <small>${gradeInfo.min}-${gradeInfo.max}</small><br>
                    <small><i>${gradeInfo.remark}</i></small>
                </div>
            `;
        });
    } else if (currentGradingScale === 'custom') {
        displayDiv.innerHTML = `
            <div class="alert alert-warning py-2">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No custom grading scale defined. 
                <button class="btn btn-sm btn-outline-primary ms-2" onclick="openCustomGradeModal()">
                    Configure Now
                </button>
            </div>
        `;
    }
}

function getGradeColor(grade) {
    const firstChar = grade.charAt(0).toUpperCase();
    switch(firstChar) {
        case 'A': return 'linear-gradient(135deg, #28a745 0%, #20c997 100%)';
        case 'B': return 'linear-gradient(135deg, #ffc107 0%, #fd7e14 100%)';
        case 'C': return 'linear-gradient(135deg, #dc3545 0%, #fd7e14 100%)';
        case 'D': return 'linear-gradient(135deg, #6c757d 0%, #495057 100%)';
        case 'F': return 'linear-gradient(135deg, #dc3545 0%, #a71d2a 100%)';
        default: return 'linear-gradient(135deg, #6a11cb 0%, #2575fc 100%)';
    }
}

// ==================== ENHANCED GRADE CALCULATION ====================

function calculateGrade(total) {
    const scale = gradingSystem[currentGradingScale];
    
    if (!scale || scale.length === 0) {
        const fallbackScale = gradingSystem.standard;
        for (const gradeInfo of fallbackScale) {
            if (total >= gradeInfo.min && total <= gradeInfo.max) {
                return {
                    grade: gradeInfo.grade,
                    remark: gradeInfo.remark,
                    cssClass: `grade-${gradeInfo.grade.charAt(0)}`
                };
            }
        }
        return { grade: 'N/A', remark: 'Not Graded', cssClass: '' };
    }
    
    for (const gradeInfo of scale) {
        if (total >= gradeInfo.min && total <= gradeInfo.max) {
            return {
                grade: gradeInfo.grade,
                remark: gradeInfo.remark,
                cssClass: `grade-${gradeInfo.grade.charAt(0)}`
            };
        }
    }
    
    return { grade: 'N/A', remark: 'Not Graded', cssClass: '' };
}

// ==================== INITIALIZATION ====================

document.addEventListener('DOMContentLoaded', () => {
    initializePage();
});

// ==================== DATA INTEGRITY FUNCTIONS ====================

function checkExistingData() {
    const className = document.getElementById('selectClass').value;
    const session = document.getElementById('selectSession').value;
    const term = document.getElementById('selectTerm').value;
    const subject = document.getElementById('selectSubject').value;
    
    const existingRecords = allResults.filter(record => 
        record.class === className && 
        record.session === session &&
        record.term === term &&
        record.subject === subject
    );
    
    if (existingRecords.length > 0) {
        showStatus(`Found ${existingRecords.length} existing records. Loading them now...`, 'info');
        loadExistingResultsIntoForm(existingRecords);
    } else {
        showStatus('No existing records found. You can enter new data.', 'success');
    }
}

function loadExistingResultsIntoForm(existingRecords) {
    const rows = document.querySelectorAll('#inputResultsTable tbody tr');
    
    rows.forEach(row => {
        const studentId = row.cells[1].textContent.trim();
        const existingRecord = existingRecords.find(record => record.studentId === studentId);
        
        if (existingRecord) {
            row.cells[3].querySelector('input').value = existingRecord.ca1;
            row.cells[4].querySelector('input').value = existingRecord.ca2;
            row.cells[5].querySelector('input').value = existingRecord.ca3;
            row.cells[6].querySelector('input').value = existingRecord.exam;
            
            const event = new Event('input');
            row.cells[3].querySelector('input').dispatchEvent(event);
            
            row.style.backgroundColor = '#e8f5e9';
        }
    });
    
    document.getElementById('saveBtn').innerHTML = '<i class="fas fa-sync-alt me-2"></i>Update Existing Records';
}

function showStatus(message, type = 'info') {
    const alert = document.getElementById('dataStatusAlert');
    const messageSpan = document.getElementById('statusMessage');
    
    alert.className = `alert alert-${type}`;
    messageSpan.textContent = message;
    alert.style.display = 'block';
    
    setTimeout(() => {
        alert.style.display = 'none';
    }, 5000);
}

// ==================== SCORE VALIDATION FUNCTIONS ====================

function validateScoreInput(input, maxValue, fieldName) {
    const value = parseFloat(input.value) || 0;
    input.classList.remove('score-input-error', 'score-input-warning');
    
    if (value > maxValue) {
        input.classList.add('score-input-error');
        return {
            valid: false,
            message: `${fieldName} cannot exceed ${maxValue}. Current: ${value}`
        };
    }
    
    if (value < 0) {
        input.classList.add('score-input-error');
        return {
            valid: false,
            message: `${fieldName} cannot be negative. Current: ${value}`
        };
    }
    
    return { valid: true, message: '' };
}

function validateRowScores(row) {
    const ca1Input = row.cells[3].querySelector('input');
    const ca2Input = row.cells[4].querySelector('input');
    const ca3Input = row.cells[5].querySelector('input');
    const examInput = row.cells[6].querySelector('input');
    const studentId = row.cells[1].textContent.trim();
    const studentName = row.cells[2].textContent.trim();
    
    const ca1Validation = validateScoreInput(ca1Input, 10, '1ST CA');
    const ca2Validation = validateScoreInput(ca2Input, 10, '2ND CA');
    const ca3Validation = validateScoreInput(ca3Input, 10, '3RD CA');
    const examValidation = validateScoreInput(examInput, 70, 'Exam');
    
    const errors = [];
    if (!ca1Validation.valid) errors.push(`Student ${studentId} (${studentName}): ${ca1Validation.message}`);
    if (!ca2Validation.valid) errors.push(`Student ${studentId} (${studentName}): ${ca2Validation.message}`);
    if (!ca3Validation.valid) errors.push(`Student ${studentId} (${studentName}): ${ca3Validation.message}`);
    if (!examValidation.valid) errors.push(`Student ${studentId} (${studentName}): ${examValidation.message}`);
    
    // Validate total doesn't exceed 100
    const ca1 = parseFloat(ca1Input.value) || 0;
    const ca2 = parseFloat(ca2Input.value) || 0;
    const ca3 = parseFloat(ca3Input.value) || 0;
    const exam = parseFloat(examInput.value) || 0;
    const total = ca1 + ca2 + ca3 + exam;
    
    if (total > 100) {
        ca1Input.classList.add('score-input-warning');
        ca2Input.classList.add('score-input-warning');
        ca3Input.classList.add('score-input-warning');
        examInput.classList.add('score-input-warning');
        errors.push(`Student ${studentId} (${studentName}): Total score cannot exceed 100. Current total: ${total.toFixed(1)}`);
    }
    
    return {
        valid: errors.length === 0,
        errors: errors,
        studentId: studentId,
        studentName: studentName
    };
}

function validateAllScores() {
    const rows = document.querySelectorAll('#inputResultsTable tbody tr');
    let allValid = true;
    const allErrors = [];
    
    rows.forEach(row => {
        const validation = validateRowScores(row);
        if (!validation.valid) {
            allValid = false;
            allErrors.push(...validation.errors);
        }
    });
    
    return {
        valid: allValid,
        errors: allErrors
    };
}

function showValidationAlert(message, type = 'danger') {
    const alert = document.getElementById('validationAlert');
    const messageSpan = document.getElementById('validationMessage');
    
    alert.className = `alert alert-${type}`;
    messageSpan.innerHTML = message;
    alert.style.display = 'block';
    
    // Scroll to top of modal to show alert
    const modalBody = document.querySelector('#resultsModal .modal-body');
    modalBody.scrollTop = 0;
}

function hideValidationAlert() {
    document.getElementById('validationAlert').style.display = 'none';
}

// ==================== RESULTS INPUT FUNCTIONS ====================

function loadStudentsForResults() {
    const className = document.getElementById('selectClass').value;
    const subject = document.getElementById('selectSubject').value;
    const session = document.getElementById('selectSession').value;
    const term = document.getElementById('selectTerm').value;
    
    if (!className || !subject || !session || !term) {
        return;
    }
    
    document.getElementById('dataStatusAlert').style.display = 'none';
    hideValidationAlert();
    document.getElementById('saveBtn').innerHTML = '<i class="fas fa-save me-2"></i>Save Results';
    
    let studentList = [];
    
    if (studentsData[className]) {
        studentList = studentsData[className];
    }
    
    const tbody = document.querySelector('#inputResultsTable tbody');
    tbody.innerHTML = '';
    
    if (studentList.length === 0) {
        document.getElementById('studentsTableContainer').style.display = 'none';
        document.getElementById('noStudentsMessage').style.display = 'block';
        document.getElementById('saveBtn').disabled = true;
        return;
    }
    
    // Update display information
    document.getElementById('currentClassDisplay').textContent = className;
    document.getElementById('currentSubjectDisplay').textContent = subject;
    document.getElementById('currentSessionDisplay').textContent = session;
    document.getElementById('currentTermDisplay').textContent = term;
    document.getElementById('studentsCount').textContent = `${studentList.length} students`;
    
    studentList.forEach((student, index) => {
        tbody.innerHTML += `
        <tr>
            <td>${index + 1}</td>
            <td>${student.id}</td>
            <td>${student.name}</td>
            <td>
                <input type="number" class="form-control score-input" min="0" max="10" placeholder="1st CA" step="0.5" data-max="10" data-field="1ST CA">
                <div class="validation-message"></div>
            </td>
            <td>
                <input type="number" class="form-control score-input" min="0" max="10" placeholder="2nd CA" step="0.5" data-max="10" data-field="2ND CA">
                <div class="validation-message"></div>
            </td>
            <td>
                <input type="number" class="form-control score-input" min="0" max="10" placeholder="3rd CA" step="0.5" data-max="10" data-field="3RD CA">
                <div class="validation-message"></div>
            </td>
            <td>
                <input type="number" class="form-control score-input" min="0" max="70" placeholder="Exam" step="0.5" data-max="70" data-field="Exam">
                <div class="validation-message"></div>
            </td>
            <td><input type="number" class="form-control total-display" readonly></td>
            <td><span class="grade-display badge"></span></td>
        </tr>`;
    });

    document.getElementById('studentsTableContainer').style.display = 'block';
    document.getElementById('noStudentsMessage').style.display = 'none';
    document.getElementById('saveBtn').disabled = false;

    document.querySelectorAll('#inputResultsTable tbody tr').forEach(row => {
        const ca1 = row.cells[3].querySelector('input');
        const ca2 = row.cells[4].querySelector('input');
        const ca3 = row.cells[5].querySelector('input');
        const exam = row.cells[6].querySelector('input');
        const total = row.cells[7].querySelector('input');
        const gradeDisplay = row.cells[8].querySelector('.grade-display');

        function updateTotalAndGrade() {
            // Validate each input
            validateScoreInput(ca1, 10, '1ST CA');
            validateScoreInput(ca2, 10, '2ND CA');
            validateScoreInput(ca3, 10, '3RD CA');
            validateScoreInput(exam, 70, 'Exam');
            
            const ca1Val = parseFloat(ca1.value) || 0;
            const ca2Val = parseFloat(ca2.value) || 0;
            const ca3Val = parseFloat(ca3.value) || 0;
            const examVal = parseFloat(exam.value) || 0;
            const totalVal = ca1Val + ca2Val + ca3Val + examVal;
            
            total.value = totalVal.toFixed(1);
            
            // Highlight if total exceeds 100
            if (totalVal > 100) {
                ca1.classList.add('score-input-warning');
                ca2.classList.add('score-input-warning');
                ca3.classList.add('score-input-warning');
                exam.classList.add('score-input-warning');
            } else {
                ca1.classList.remove('score-input-warning');
                ca2.classList.remove('score-input-warning');
                ca3.classList.remove('score-input-warning');
                exam.classList.remove('score-input-warning');
            }
            
            if (totalVal > 0) {
                const gradeInfo = calculateGrade(totalVal);
                gradeDisplay.textContent = gradeInfo.grade;
                gradeDisplay.className = `grade-display badge ${gradeInfo.cssClass}`;
                gradeDisplay.title = gradeInfo.remark;
            } else {
                gradeDisplay.textContent = '';
                gradeDisplay.className = 'grade-display badge';
            }
        }

        [ca1, ca2, ca3, exam].forEach(input => 
            input.addEventListener('input', updateTotalAndGrade)
        );
        
        // Validate on blur (when user leaves the field)
        [ca1, ca2, ca3, exam].forEach(input => 
            input.addEventListener('blur', function() {
                const maxValue = parseInt(this.getAttribute('data-max'));
                const fieldName = this.getAttribute('data-field');
                validateScoreInput(this, maxValue, fieldName);
            })
        );
    });
}

function validateAndSaveResults() {
    const className = document.getElementById('selectClass').value;
    const subject = document.getElementById('selectSubject').value;
    const session = document.getElementById('selectSession').value;
    const term = document.getElementById('selectTerm').value;
    
    if (!className || !subject || !session || !term) {
        showValidationAlert('Please select all 4 parameters before saving!', 'warning');
        return;
    }
    
    // Validate all scores
    const validation = validateAllScores();
    
    if (!validation.valid) {
        const errorList = validation.errors.map(error => `• ${error}`).join('<br>');
        showValidationAlert(`<strong>Please fix the following errors:</strong><br><br>${errorList}`, 'danger');
        return;
    }
    
    // If validation passes, proceed to save
    saveResults();
}

function saveResults() {
    const className = document.getElementById('selectClass').value;
    const subject = document.getElementById('selectSubject').value;
    const session = document.getElementById('selectSession').value;
    const term = document.getElementById('selectTerm').value;
    const rows = document.querySelectorAll('#inputResultsTable tbody tr');
    
    hideValidationAlert();
    
    // Determine branch from class
    const branch = classToBranch[className] || 'Secondary';
    
    allResults = allResults.filter(record => 
        !(record.class === className && 
          record.session === session &&
          record.term === term &&
          record.subject === subject)
    );
    
    rows.forEach(row => {
        const studentId = row.cells[1].textContent;
        const studentName = row.cells[2].textContent;
        const ca1 = parseFloat(row.cells[3].querySelector('input').value) || 0;
        const ca2 = parseFloat(row.cells[4].querySelector('input').value) || 0;
        const ca3 = parseFloat(row.cells[5].querySelector('input').value) || 0;
        const exam = parseFloat(row.cells[6].querySelector('input').value) || 0;
        const total = ca1 + ca2 + ca3 + exam;
        const gradeInfo = calculateGrade(total);
        
        allResults.push({
            studentId: studentId,
            studentName: studentName,
            branch: branch,
            class: className,
            subject: subject,
            session: session,
            term: term,
            ca1: ca1,
            ca2: ca2,
            ca3: ca3,
            exam: exam,
            total: total,
            grade: gradeInfo.grade,
            remark: gradeInfo.remark
        });
    });
    
    renderResultsTable();
    updatePerformanceAverage();
    
    const modal = bootstrap.Modal.getInstance(document.getElementById('resultsModal'));
    modal.hide();
    
    alert('Results saved successfully!');
}

// ==================== FILTER FUNCTIONS ====================

function resetFilters() {
    document.getElementById('searchStudentId').value = '';
    document.getElementById('filterBranch').value = '';
    document.getElementById('filterClass').value = '';
    document.getElementById('filterSubject').value = '';
    document.getElementById('filterGrade').value = '';
    
    // Update classes dropdown
    updateFilterClasses();
    
    // Re-render results table with no filters
    renderResultsTable();
}

function filterResults() {
    const studentId = document.getElementById('searchStudentId').value.toUpperCase();
    const branchFilter = document.getElementById('filterBranch').value;
    const classFilter = document.getElementById('filterClass').value;
    const subjectFilter = document.getElementById('filterSubject').value;
    const gradeFilter = document.getElementById('filterGrade').value;
    
    const tbody = document.querySelector('#studentsResultsTable tbody');
    tbody.innerHTML = '';
    
    const filteredResults = allResults.filter(res =>
        (studentId === "" || res.studentId.toUpperCase().includes(studentId)) &&
        (branchFilter === "" || res.branch === branchFilter) &&
        (classFilter === "" || res.class === classFilter) &&
        (subjectFilter === "" || res.subject === subjectFilter) &&
        (gradeFilter === "" || res.grade.charAt(0) === gradeFilter)
    );
    
    if (filteredResults.length === 0) {
        tbody.innerHTML = `
        <tr>
            <td colspan="15" class="text-center text-muted py-4">
                <i class="fas fa-search fa-2x mb-3"></i><br>
                No results match your filters.
            </td>
        </tr>`;
        return;
    }
    
    filteredResults.forEach((res, idx) => {
        const gradeClass = `grade-${res.grade.charAt(0)}`;
        tbody.innerHTML += `
        <tr>
            <td>${idx + 1}</td>
            <td><span class="student-id">${res.studentId}</span></td>
            <td><span class="student-name">${res.studentName}</span></td>
            <td>${res.class}</td>
            <td>${res.subject}</td>
            <td>${res.session || '2024/2025'}</td>
            <td>${res.term || 'First Term'}</td>
            <td>${res.ca1}</td>
            <td>${res.ca2}</td>
            <td>${res.ca3}</td>
            <td>${res.exam}</td>
            <td><strong>${res.total.toFixed(1)}</strong></td>
            <td><span class="badge ${gradeClass}">${res.grade}</span></td>
            <td>${res.remark}</td>
            <td>
                <button class="btn btn-sm btn-outline-primary" onclick="editResult(${allResults.indexOf(res)})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="deleteResult(${allResults.indexOf(res)})">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>`;
    });
}

// ==================== RESULTS DISPLAY FUNCTIONS ====================

function renderResultsTable() {
    const tbody = document.querySelector('#studentsResultsTable tbody');
    tbody.innerHTML = '';
    
    if (allResults.length === 0) {
        tbody.innerHTML = `
        <tr>
            <td colspan="15" class="text-center text-muted py-4">
                <i class="fas fa-database fa-2x mb-3"></i><br>
                No results found. Click "Input Results" to add new records.
            </td>
        </tr>`;
        return;
    }
    
    allResults.forEach((res, idx) => {
        const gradeClass = `grade-${res.grade.charAt(0)}`;
        tbody.innerHTML += `
        <tr>
            <td>${idx + 1}</td>
            <td><span class="student-id">${res.studentId}</span></td>
            <td><span class="student-name">${res.studentName}</span></td>
            <td>${res.class}</td>
            <td>${res.subject}</td>
            <td>${res.session || '2024/2025'}</td>
            <td>${res.term || 'First Term'}</td>
            <td>${res.ca1}</td>
            <td>${res.ca2}</td>
            <td>${res.ca3}</td>
            <td>${res.exam}</td>
            <td><strong>${res.total.toFixed(1)}</strong></td>
            <td><span class="badge ${gradeClass}">${res.grade}</span></td>
            <td>${res.remark}</td>
            <td>
                <button class="btn btn-sm btn-outline-primary" onclick="editResult(${idx})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="deleteResult(${idx})">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>`;
    });
}

// ==================== UTILITY FUNCTIONS ====================

function updatePerformanceAverage() {
    if (allResults.length === 0) {
        const perfElement = document.getElementById('performanceAvg');
        if (perfElement) {
            perfElement.textContent = '0%';
        }
        return;
    }
    
    const totalSum = allResults.reduce((sum, res) => sum + res.total, 0);
    const average = (totalSum / allResults.length).toFixed(1);
    
    const perfElement = document.getElementById('performanceAvg');
    if (perfElement) {
        perfElement.textContent = `${average}%`;
    }
}

function editResult(index) {
    const result = allResults[index];
    
    // Reset modal selections
    document.getElementById('selectClass').value = result.class;
    document.getElementById('selectSession').value = result.session || '2024/2025';
    document.getElementById('selectTerm').value = result.term || 'First Term';
    
    // Update subjects and trigger loading
    updateSubjectsForClass();
    
    setTimeout(() => {
        document.getElementById('selectSubject').value = result.subject;
        
        const modal = new bootstrap.Modal(document.getElementById('resultsModal'));
        modal.show();
        
        // The checkAllParametersSelected function will automatically trigger loadStudentsForResults
    }, 100);
}

function deleteResult(index) {
    if (confirm('Are you sure you want to delete this record?')) {
        allResults.splice(index, 1);
        renderResultsTable();
        updatePerformanceAverage();
        alert('Record deleted successfully!');
    }
}

function loadSampleData() {
    const sampleData = [
        {
            studentId: 'SS1001',
            studentName: 'Natalie Sanchez',
            branch: 'Secondary',
            class: 'SS1',
            subject: 'Mathematics',
            session: '2024/2025',
            term: 'First Term',
            ca1: 8, ca2: 9, ca3: 7, exam: 65,
            total: 89, grade: 'A', remark: 'Excellent'
        },
        {
            studentId: 'SS1002',
            studentName: 'Oscar Morris',
            branch: 'Secondary',
            class: 'SS1',
            subject: 'Physics',
            session: '2024/2025',
            term: 'First Term',
            ca1: 6, ca2: 7, ca3: 8, exam: 58,
            total: 79, grade: 'B', remark: 'Very Good'
        },
        {
            studentId: 'JSS001',
            studentName: 'Ethan Roberts',
            branch: 'Secondary',
            class: 'JSS1',
            subject: 'Mathematics',
            session: '2024/2025',
            term: 'First Term',
            ca1: 9, ca2: 8, ca3: 9, exam: 55,
            total: 81, grade: 'A', remark: 'Excellent'
        },
        {
            studentId: 'PRI001',
            studentName: 'Mia Thompson',
            branch: 'Primary',
            class: 'Primary 1',
            subject: 'Mathematics',
            session: '2024/2025',
            term: 'First Term',
            ca1: 10, ca2: 9, ca3: 10, exam: 60,
            total: 89, grade: 'A', remark: 'Excellent'
        },
        {
            studentId: 'NUR001',
            studentName: 'Alice Johnson',
            branch: 'Nursery',
            class: 'Play Group',
            subject: 'Numeracy',
            session: '2024/2025',
            term: 'First Term',
            ca1: 10, ca2: 9, ca3: 10, exam: 60,
            total: 89, grade: 'A', remark: 'Excellent'
        }
    ];
    
    allResults = [...allResults, ...sampleData];
}
</script>
</body>
</html>
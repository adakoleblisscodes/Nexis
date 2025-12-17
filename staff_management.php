<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis LMS - Staff Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --gold: #d4af37;
            --navy: #0a1a3a;
            --light-gray: #f8f9fa;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-gray);
        }
        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--navy) 0%, #1c2a50 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 0;
            box-shadow: 3px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .logo-container {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .nav-section {
            padding: 15px 20px 5px;
            color: rgba(255,255,255,0.7);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        .nav-link {
            color: rgba(255,255,255,0.9);
            padding: 12px 20px;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.1);
            border-left: 4px solid var(--gold);
            color: white;
        }
        .nav-link i { width: 20px; margin-right: 10px; }
        /* Main content */
        .main-content {
            margin-left: 280px;
            padding: 20px;
            min-height: 100vh;
        }
        /* Cards */
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-top: 4px solid var(--gold);
            transition: transform 0.3s;
        }
        .dashboard-card:hover { transform: translateY(-5px); }
        .stat-number { font-size: 2.5rem; font-weight: 800; color: var(--gold); }
        /* Feature Section */
        .feature-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        /* Filters and Search */
        .filter-section .form-select, .filter-section .form-control {
            margin-bottom: 10px;
        }
        /* Staff Table */
        .table thead { background: var(--navy); color: white; }
        .table tbody tr:hover { background: #f1f1f1; }
        /* Modal */
        .modal-header { background: var(--gold); color: #000; }
        .modal-title { font-weight: 700; }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 fw-bold">Staff Management</h1>
                <p class="text-muted mb-0">Manage all school staff and roles</p>
            </div>
            <div>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                    <i class="fas fa-user-plus me-2"></i> Add New Staff
                </button>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="totalStaff">0</div>
                    <h6 class="text-muted">Total Staff</h6>
                    <p class="small mb-0">All branches</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="teachingStaff">0</div>
                    <h6 class="text-muted">Teaching Staff</h6>
                    <p class="small mb-0">Teachers only</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="nonTeachingStaff">0</div>
                    <h6 class="text-muted">Non-Teaching Staff</h6>
                    <p class="small mb-0">Admin & support staff</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="classTeachers">0</div>
                    <h6 class="text-muted">Class Teachers</h6>
                    <p class="small mb-0">Assigned to classes</p>
                </div>
            </div>
        </div>
        
        <!-- Filters & Search -->
        <div class="feature-section filter-section mb-4">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search staff by name">
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filterBranch">
                        <option value="">All Branches</option>
                        <option>Main Campus</option>
                        <option>North Campus</option>
                        <option>East Campus</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filterRole">
                        <option value="">All Roles</option>
                        <option>Head of School</option>
                        <option>Class Teacher</option>
                        <option>Subject Teacher</option>
                        <option>Bursar</option>
                        <option>Librarian</option>
                        <option>Receptionist</option>
                        <option>Cleaner</option>
                        <option>Security</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" onclick="applyFilters()"><i class="fas fa-filter me-1"></i> Filter</button>
                </div>
            </div>
        </div>
        
        <!-- Staff Table -->
        <div class="feature-section">
            <table class="table table-striped table-hover" id="staffTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Branch</th>
                        <th>Roles</th>
                        <th>Staff Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Staff rows inserted dynamically -->
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Add Staff Modal -->
    <div class="modal fade" id="addStaffModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fas fa-user-plus me-2"></i>Add New Staff</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form id="addStaffForm">
              <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" required id="staffName">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" required id="staffEmail">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" required id="staffPhone">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <select class="form-select" id="staffGender" required>
                        <option value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="staffAddress">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date of Employment</label>
                    <input type="date" class="form-control" id="staffDate">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Branch</label>
                    <select class="form-select" id="staffBranch" required>
                        <option value="">Select Branch</option>
                        <option>Main Campus</option>
                        <option>North Campus</option>
                        <option>East Campus</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Staff Type</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="staffType" value="Teaching" required>
                        <label class="form-check-label">Teaching</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="staffType" value="Non-Teaching">
                        <label class="form-check-label">Non-Teaching</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Assign Roles</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Head of School">
                        <label class="form-check-label">Head of School</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Class Teacher">
                        <label class="form-check-label">Class Teacher</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Subject Teacher">
                        <label class="form-check-label">Subject Teacher</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Bursar">
                        <label class="form-check-label">Bursar</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Librarian">
                        <label class="form-check-label">Librarian</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Receptionist">
                        <label class="form-check-label">Receptionist</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Cleaner">
                        <label class="form-check-label">Cleaner</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="Security">
                        <label class="form-check-label">Security</label>
                    </div>
                </div>
              </div>
              <div class="mt-3 text-end">
                  <button type="submit" class="btn btn-warning"><i class="fas fa-save me-1"></i> Save Staff</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ======== STAFF DATA =========
        let staffList = [];

        function renderStaffTable(data) {
            const tbody = document.querySelector("#staffTable tbody");
            tbody.innerHTML = "";
            data.forEach((staff, index) => {
                tbody.innerHTML += `
                    <tr>
                        <td>${index+1}</td>
                        <td>${staff.name}</td>
                        <td>${staff.email}</td>
                        <td>${staff.phone}</td>
                        <td>${staff.branch}</td>
                        <td>${staff.roles.join(", ")}</td>
                        <td>${staff.type}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="editStaff(${index})"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" onclick="deleteStaff(${index})"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });
            updateStats();
        }

        function updateStats() {
            document.getElementById("totalStaff").textContent = staffList.length;
            document.getElementById("teachingStaff").textContent = staffList.filter(s => s.type === "Teaching").length;
            document.getElementById("nonTeachingStaff").textContent = staffList.filter(s => s.type === "Non-Teaching").length;
            document.getElementById("classTeachers").textContent = staffList.filter(s => s.roles.includes("Class Teacher")).length;
        }

        // ======== FORM SUBMISSION =========
        document.getElementById("addStaffForm").addEventListener("submit", function(e){
            e.preventDefault();
            const name = document.getElementById("staffName").value;
            const email = document.getElementById("staffEmail").value;
            const phone = document.getElementById("staffPhone").value;
            const branch = document.getElementById("staffBranch").value;
            const gender = document.getElementById("staffGender").value;
            const address = document.getElementById("staffAddress").value;
            const date = document.getElementById("staffDate").value;
            const type = document.querySelector('input[name="staffType"]:checked').value;
            const roles = Array.from(document.querySelectorAll('#addStaffForm input[type="checkbox"]:checked')).map(r => r.value);
            
            staffList.push({name,email,phone,branch,gender,address,date,type,roles});
            renderStaffTable(staffList);
            bootstrap.Modal.getInstance(document.getElementById('addStaffModal')).hide();
            this.reset();
        });

        function applyFilters() {
            const search = document.getElementById("searchInput").value.toLowerCase();
            const branch = document.getElementById("filterBranch").value;
            const role = document.getElementById("filterRole").value;
            const filtered = staffList.filter(s => 
                (s.name.toLowerCase().includes(search)) &&
                (branch === "" || s.branch === branch) &&
                (role === "" || s.roles.includes(role))
            );
            renderStaffTable(filtered);
        }

        function editStaff(index) { alert("Edit functionality for staff index " + index); }
        function deleteStaff(index) { 
            if(confirm("Are you sure you want to delete this staff?")) {
                staffList.splice(index,1); renderStaffTable(staffList);
            }
        }
    </script>
</body>
</html>

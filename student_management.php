
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Nexis SMS - School Management System</title>
    
    <!-- External Resources -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
   
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
         <!-- HEADER -->
        <div class="top-header d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Student Management</h3>
                <p class="text-muted mb-0">Manage student records, classes & enrollment</p>
            </div>
            <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                <i class="fas fa-user-plus me-2"></i>Add Student
            </button>
        </div>

        <!-- STATS CARDS -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-icon"><i class="fas fa-user-graduate"></i></div>
                    <div class="card-value">2,375</div>
                    <div class="text-muted">Total Students</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-icon"><i class="fas fa-mars"></i></div>
                    <div class="card-value">1,280</div>
                    <div class="text-muted">Male Students</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-icon"><i class="fas fa-venus"></i></div>
                    <div class="card-value">1,095</div>
                    <div class="text-muted">Female Students</div>
                </div>
            </div>
            <!-- <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="card-icon"><i class="fas fa-layer-group"></i></div>
                    <div class="card-value">18</div>
                    <div class="text-muted">Active Classes</div>
                </div>
            </div>
        </div>
        -->
        
        <!-- GENDER CHART + SEARCH -->
        <div class="row mb-4">
            <div class="col-lg-4 mb-3">
                <div class="dashboard-card">
                    <h6 class="fw-bold mb-3"><i class="fas fa-chart-pie me-2 text-warning"></i>Gender Distribution</h6>
                    <canvas id="genderChart" height="220"></canvas>
                </div>
            </div>
            <div class="col-lg-8 mb-3">
                <div class="table-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0"><i class="fas fa-users me-2 text-warning"></i>Students List</h6>
                        <input type="search" class="form-control w-50" placeholder="Search student by name, class...">
                        <button type="button" class="btn btn-sm btn-outline-warning"><i class="fas fa-search me-2"></i>Search</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Class</th>
                                    <th>Parent Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Male</td>
                                    <td>JSS 2</td>
                                    <td>0803 000 0000</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ADD STUDENT MODAL -->
    <div class="modal fade" id="addStudentModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-plus me-2 text-warning"></i>Register New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Surname</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Age</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Gender</label>
                                <select class="form-select">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Class</label>
                                <select class="form-select">
                                    <option>Nursery</option>
                                    <option>Primary</option>
                                    <option>JSS 1</option>
                                    <option>SSS 1</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Parent Contact</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-gold"><i class="fas fa-check me-2"></i>Confirm Registration</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/scripts.js"></script>
</body>
</html>
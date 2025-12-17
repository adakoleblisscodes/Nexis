<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management - Nexis LMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #d4af37;
            color: #000;
        }

        .card {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .badge-active {
            background-color: #28a745;
        }

        .badge-inactive {
            background-color: #6c757d;
        }

        .table-actions button {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'includes/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Subject Management</h2>
                    <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#addSubjectModal" style="background-color:#d4af37; color:#000;">
                        <i class="fas fa-plus"></i> Add Subject
                    </button>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card p-3">
                            <h5>Total Subjects</h5>
                            <h3 id="totalSubjects">12</h3>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card p-3">
                            <h5>Subjects per Class</h5>
                            <h3 id="subjectsPerClass">4</h3>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card p-3">
                            <h5>Subjects per Teacher</h5>
                            <h3 id="subjectsPerTeacher">6</h3>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card p-3">
                            <h5>Active Subjects</h5>
                            <h3 id="activeSubjects">10</h3>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search by name/code">
                    </div>
                    <div class="col-md-3">
                        <select id="filterClass" class="form-select">
                            <option value="">Filter by Class</option>
                            <option>Class 1</option>
                            <option>Class 2</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="filterTeacher" class="form-select">
                            <option value="">Filter by Teacher</option>
                            <option>Mr. John</option>
                            <option>Ms. Mary</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="filterStatus" class="form-select">
                            <option value="">Filter by Status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Subjects Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Subject Name</th>
                                <th>Subject Code</th>
                                <th>Class</th>
                                <th>Teacher</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="subjectTable">
                            <tr>
                                <td>1</td>
                                <td>Mathematics</td>
                                <td>MATH101</td>
                                <td>Class 1</td>
                                <td>Mr. John</td>
                                <td><span class="badge badge-active">Active</span></td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-primary" onclick="editSubject(this)"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteSubject(this)"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>English</td>
                                <td>ENG101</td>
                                <td>Class 1</td>
                                <td>Ms. Mary</td>
                                <td><span class="badge badge-active">Active</span></td>
                                <td class="table-actions">
                                    <button class="btn btn-sm btn-primary" onclick="editSubject(this)"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteSubject(this)"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Subject Modal -->
    <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addSubjectForm">
                        <div class="mb-3">
                            <label class="form-label">Subject Name</label>
                            <input type="text" class="form-control" required id="subjectName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="subjectCode">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign Class</label>
                            <select class="form-select" id="subjectClass">
                                <option>Class 1</option>
                                <option>Class 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign Teacher</label>
                            <select class="form-select" id="subjectTeacher">
                                <option>Mr. John</option>
                                <option>Ms. Mary</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="subjectStatus">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-gold" style="background-color:#d4af37; color:#000;">Add Subject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Subject Modal -->
    <div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editSubjectForm">
                        <input type="hidden" id="editRowIndex">
                        <div class="mb-3">
                            <label class="form-label">Subject Name</label>
                            <input type="text" class="form-control" required id="editSubjectName">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="editSubjectCode">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign Class</label>
                            <select class="form-select" id="editSubjectClass">
                                <option>Class 1</option>
                                <option>Class 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign Teacher</label>
                            <select class="form-select" id="editSubjectTeacher">
                                <option>Mr. John</option>
                                <option>Ms. Mary</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="editSubjectStatus">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Subject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add subject
        document.getElementById('addSubjectForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const table = document.getElementById('subjectTable');
            const name = document.getElementById('subjectName').value;
            const code = document.getElementById('subjectCode').value;
            const cls = document.getElementById('subjectClass').value;
            const teacher = document.getElementById('subjectTeacher').value;
            const status = document.getElementById('subjectStatus').value;

            const rowCount = table.rows.length + 1;
            const badgeClass = status === 'Active' ? 'badge-active' : 'badge-inactive';

            const row = table.insertRow();
            row.innerHTML = `
                <td>${rowCount}</td>
                <td>${name}</td>
                <td>${code}</td>
                <td>${cls}</td>
                <td>${teacher}</td>
                <td><span class="badge ${badgeClass}">${status}</span></td>
                <td class="table-actions">
                    <button class="btn btn-sm btn-primary" onclick="editSubject(this)"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deleteSubject(this)"><i class="fas fa-trash"></i></button>
                </td>
            `;
            document.getElementById('addSubjectForm').reset();
            var modalEl = document.getElementById('addSubjectModal');
            var modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        });

        // Edit subject
        function editSubject(button) {
            const row = button.closest('tr');
            const cells = row.cells;
            document.getElementById('editRowIndex').value = row.rowIndex;
            document.getElementById('editSubjectName').value = cells[1].innerText;
            document.getElementById('editSubjectCode').value = cells[2].innerText;
            document.getElementById('editSubjectClass').value = cells[3].innerText;
            document.getElementById('editSubjectTeacher').value = cells[4].innerText;
            document.getElementById('editSubjectStatus').value = cells[5].innerText;

            var editModal = new bootstrap.Modal(document.getElementById('editSubjectModal'));
            editModal.show();
        }

        document.getElementById('editSubjectForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const rowIndex = document.getElementById('editRowIndex').value;
            const table = document.getElementById('subjectTable');
            const row = table.rows[rowIndex - 1];
            const name = document.getElementById('editSubjectName').value;
            const code = document.getElementById('editSubjectCode').value;
            const cls = document.getElementById('editSubjectClass').value;
            const teacher = document.getElementById('editSubjectTeacher').value;
            const status = document.getElementById('editSubjectStatus').value;
            const badgeClass = status === 'Active' ? 'badge-active' : 'badge-inactive';

            row.cells[1].innerText = name;
            row.cells[2].innerText = code;
            row.cells[3].innerText = cls;
            row.cells[4].innerText = teacher;
            row.cells[5].innerHTML = `<span class="badge ${badgeClass}">${status}</span>`;

            var modalEl = document.getElementById('editSubjectModal');
            var modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        });

        // Delete subject
        function deleteSubject(button) {
            if (confirm("Are you sure you want to delete this subject?")) {
                const row = button.closest('tr');
                row.remove();
            }
        }

        // Search & Filter (basic)
        document.getElementById('searchInput').addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            const table = document.getElementById('subjectTable');
            Array.from(table.rows).forEach(row => {
                const name = row.cells[1].innerText.toLowerCase();
                const code = row.cells[2].innerText.toLowerCase();
                row.style.display = name.includes(filter) || code.includes(filter) ? '' : 'none';
            });
        });

        const filters = ['filterClass', 'filterTeacher', 'filterStatus'];
        filters.forEach(id => {
            document.getElementById(id).addEventListener('change', applyFilters);
        });

        function applyFilters() {
            const clsFilter = document.getElementById('filterClass').value;
            const teacherFilter = document.getElementById('filterTeacher').value;
            const statusFilter = document.getElementById('filterStatus').value.toLowerCase();

            const table = document.getElementById('subjectTable');
            Array.from(table.rows).forEach(row => {
                const cls = row.cells[3].innerText;
                const teacher = row.cells[4].innerText;
                const status = row.cells[5].innerText.toLowerCase();

                let show = true;
                if (clsFilter && cls !== clsFilter) show = false;
                if (teacherFilter && teacher !== teacherFilter) show = false;
                if (statusFilter && status !== statusFilter) show = false;

                row.style.display = show ? '' : 'none';
            });
        }
    </script>
</body>

</html>

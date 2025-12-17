<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexis LMS - Fee Management</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --superadmin-gold: #d4af37;
            --card-bg: #fff;
            --card-shadow: rgba(0, 0, 0, 0.1);
            --bg-light-gray: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light-gray);
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #2b2b2b;
            color: #fff;
            position: fixed;
            height: 100vh;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            font-size: 14px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: var(--superadmin-gold);
            color: #000;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px var(--card-shadow);
            text-align: center;
            transition: 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--superadmin-gold);
        }

        .btn-superadmin {
            background-color: var(--superadmin-gold);
            color: #000;
            border: none;
        }

        .btn-superadmin:hover {
            background-color: #c29d30;
            color: #fff;
        }

        .feature-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px var(--card-shadow);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(212, 175, 55, 0.1);
        }

        /* Status Badges */
        .badge-paid {
            background-color: #28a745;
        }

        .badge-part {
            background-color: #ffc107;
            color: #000;
        }

        .badge-owing {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="h3 mb-1 fw-bold text-superadmin">Fee Management</h3>
                <p class="text-muted mb-0">Track payments, setup fees, and manage collections</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-superadmin" data-bs-toggle="modal" data-bs-target="#feeSetupModal">
                    <i class="fas fa-cogs me-2"></i> Fee Setup
                </button>
                <button class="btn btn-superadmin" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                    <i class="fas fa-plus me-2"></i> Add Payment
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="totalPaid">₦12,500,000</div>
                    <h6 class="text-muted">Total Fees Paid</h6>
                    <p class="small mb-0">All branches combined</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="totalOwing">125</div>
                    <h6 class="text-muted">Students Owing</h6>
                    <p class="small mb-0">Pending payments</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="partPayments">38</div>
                    <h6 class="text-muted">Part Payments</h6>
                    <p class="small mb-0">Installments in progress</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dashboard-card">
                    <div class="stat-number" id="expectedFees">₦15,000,000</div>
                    <h6 class="text-muted">Expected Fees</h6>
                    <p class="small mb-0">Total fees due</p>
                </div>
            </div>
        </div>

        <!-- Filters & Actions -->
        <div class="feature-section mb-4">
            <div class="d-flex flex-wrap gap-3 align-items-center">
                <select class="form-select w-auto" onchange="filterByClass(this.value)">
                    <option value="">Select Class</option>
                    <option>Grade 10A</option>
                    <option>Grade 10B</option>
                </select>
                <select class="form-select w-auto" onchange="filterByTerm(this.value)">
                    <option value="">Select Term</option>
                    <option>Term 1</option>
                    <option>Term 2</option>
                </select>
                <input type="text" class="form-control w-auto" placeholder="Search Student" oninput="searchStudent(this.value)">
                <button class="btn btn-superadmin" onclick="exportFeeReport()">
                    <i class="fas fa-file-export me-2"></i> Export Report
                </button>
            </div>
        </div>

        <!-- Fee Transactions Table -->
        <div class="feature-section">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Class/Section</th>
                        <th>Amount Paid</th>
                        <th>Payment Type</th>
                        <th>Date Paid</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="feeTableBody">
                    <tr>
                        <td>1</td>
                        <td>Chinonso Okafor</td>
                        <td>Grade 10A</td>
                        <td>₦50,000</td>
                        <td>Full</td>
                        <td>2025-12-10</td>
                        <td><span class="badge badge-paid">Paid</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Amaka Eze</td>
                        <td>Grade 10B</td>
                        <td>₦25,000</td>
                        <td>Part</td>
                        <td>2025-12-12</td>
                        <td><span class="badge badge-part">Part Paid</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Uche Nwosu</td>
                        <td>Grade 10A</td>
                        <td>₦0</td>
                        <td>None</td>
                        <td>-</td>
                        <td><span class="badge badge-owing">Owing</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Fee Setup Modal -->
    <div class="modal fade" id="feeSetupModal" tabindex="-1" aria-labelledby="feeSetupLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feeSetupLabel"><i class="fas fa-cogs me-2"></i> Fee Structure Setup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="feeSetupForm">
                        <div class="mb-3">
                            <label>Class/Section</label>
                            <input type="text" class="form-control" id="feeClass" placeholder="Grade 10A">
                        </div>
                        <div class="mb-3">
                            <label>Term</label>
                            <select class="form-select" id="feeTerm">
                                <option>Term 1</option>
                                <option>Term 2</option>
                                <option>Term 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Total Fee Amount</label>
                            <input type="number" class="form-control" id="feeAmount" placeholder="50000">
                        </div>
                        <button type="submit" class="btn btn-superadmin"><i class="fas fa-save me-2"></i> Save Fee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Payment Modal -->
    <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentLabel"><i class="fas fa-plus me-2"></i> Add Payment Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addPaymentForm">
                        <div class="mb-3">
                            <label>Student Name</label>
                            <input type="text" class="form-control" id="studentName" required>
                        </div>
                        <div class="mb-3">
                            <label>Student ID</label>
                            <input type="text" class="form-control" id="studentId" required>
                        </div>
                        <div class="mb-3">
                            <label>Class/Section</label>
                            <input type="text" class="form-control" id="studentClass" required>
                        </div>
                        <div class="mb-3">
                            <label>Amount Paid</label>
                            <input type="number" class="form-control" id="amountPaid" required>
                        </div>
                        <div class="mb-3">
                            <label>Date Paid</label>
                            <input type="date" class="form-control" id="datePaid" required>
                        </div>
                        <div class="mb-3">
                            <label>Time Paid</label>
                            <input type="time" class="form-control" id="timePaid" required>
                        </div>
                        <div class="mb-3">
                            <label>Payment Method</label>
                            <select class="form-select" id="paymentMethod" required>
                                <option>Cash</option>
                                <option>Bank Transfer</option>
                                <option>Card</option>
                                <option>Online</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-superadmin"><i class="fas fa-save me-2"></i> Add Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        const feeStructure = {}; // Holds fee structure per class

        document.getElementById('feeSetupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const cls = document.getElementById('feeClass').value;
            const term = document.getElementById('feeTerm').value;
            const amount = parseFloat(document.getElementById('feeAmount').value);

            if(!cls || !amount) return alert("Please fill all fields");

            feeStructure[cls] = {term, amount};
            alert(`Fee set for ${cls}: ₦${amount} for ${term}`);
            document.getElementById('feeSetupForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('feeSetupModal'));
            modal.hide();
        });

        document.getElementById('addPaymentForm').addEventListener('submit', function(e){
            e.preventDefault();
            const name = document.getElementById('studentName').value;
            const id = document.getElementById('studentId').value;
            const cls = document.getElementById('studentClass').value;
            const paid = parseFloat(document.getElementById('amountPaid').value);
            const date = document.getElementById('datePaid').value;
            const time = document.getElementById('timePaid').value;
            const method = document.getElementById('paymentMethod').value;

            if(!name || !id || !cls || !paid || !date || !time || !method) return alert("Please fill all fields");

            let totalFee = feeStructure[cls]?.amount || 0;
            let status = paid === totalFee ? 'Paid' : (paid < totalFee ? 'Part Paid' : 'Overpaid');
            const statusClass = status === 'Paid' ? 'badge-paid' : (status === 'Part Paid' ? 'badge-part' : 'badge-paid');

            const tableBody = document.getElementById('feeTableBody');
            const rowCount = tableBody.rows.length + 1;

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${rowCount}</td>
                <td>${name}</td>
                <td>${cls}</td>
                <td>₦${paid}</td>
                <td>${status === 'Paid' ? 'Full' : 'Part'}</td>
                <td>${date} ${time}</td>
                <td><span class="badge ${statusClass}">${status}</span></td>
            `;
            tableBody.appendChild(tr);

            document.getElementById('addPaymentForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('addPaymentModal'));
            modal.hide();
        });

        function filterByClass(value) { console.log('Filter by class:', value); }
        function filterByTerm(value) { console.log('Filter by term:', value); }
        function searchStudent(value) { console.log('Search student:', value); }
        function exportFeeReport() { alert('Export fee report functionality coming soon!'); }
    </script>
</body>
</html>

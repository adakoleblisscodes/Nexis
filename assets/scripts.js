// Application Data
const roles = {
    superadmin: {
        id: 'superadmin',
        name: 'Super Administrator',
        badgeClass: 'superadmin',
        user: { name: 'Super Admin', id: 'SA-001', email: 'admin@nexis.edu', branch: 'All Branches' },
        stats: { students: 2375, teachers: 125, staff: 185, schools: 3, attendance: 94.5 },
        navigation: [
            { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
            { name: 'Fee Management', icon: 'fa-chart-line', active: false, href: 'fees_management.php' },
            { name: 'Students Management', icon: 'fa-user-graduate', active: false, href: 'student_management.php' },
            { name: 'Subject Management', icon: 'fa-book', active: false, href: 'subject_management.php' },
            { name: 'Results Management', icon: 'fa-chart-bar', active: false, href: 'results_management.php' },
            { name: 'Staff Management', icon: 'fa-chalkboard-teacher', active: false, href: 'staff_management.php' },
            { name: 'Class Management', icon: 'fa-school', active: false, href: 'class_management.php' },
            { name: 'Settings', icon: 'fa-cog', active: false, href: '#' }
        ]
    },

    hos: {
        id: 'hos',
        name: 'Head of School',
        badgeClass: 'hos',
        user: { name: 'Dr. Adebayo Johnson', id: 'HOS-001', email: 'hos.main@nexis.edu', branch: 'Main Campus' },
        stats: { students: 1200, teachers: 45, classes: 36, attendance: 94.5 },
        navigation: [
            { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
            { name: 'Students Management', icon: 'fa-user-graduate', active: false, href: 'student_management.php' },
            { name: 'Staff Management', icon: 'fa-chalkboard-teacher', active: false, href: 'staff_management.php' },
            { name: 'Results Management', icon: 'fa-book', active: false, href: 'results_management.php' },
            { name: 'Fee Management', icon: 'fa-chart-line', active: false, href: 'fees_management.php' },
            { name: 'Settings', icon: 'fa-cog', active: false, href: '#' }
        ]
    },

    classteacher: {
        id: 'classteacher',
        name: 'Class Teacher',
        badgeClass: 'classteacher',
        user: { name: 'Mrs. Chidinma Okoro', id: 'T-001', email: 'c.okoro@nexis.edu', branch: 'Main Campus', class: 'Grade 10A' },
        stats: { students: 42, attendance: 96.2, male: 22, female: 20, average: 72.5 },
        navigation: [
            { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
            { name: 'Students Management', icon: 'fa-user-graduate', active: false, href: 'student_management.php' },
            { name: 'Staff Management', icon: 'fa-chalkboard-teacher', active: false, href: 'staff_management.php' },
            { name: 'Results Management', icon: 'fa-book', active: false, href: 'results_management.php' },
            { name: 'Fee Management', icon: 'fa-chart-line', active: false, href: 'fees_management.php' },
            { name: 'Settings', icon: 'fa-cog', active: false, href: '#' }
        ]
    },

    subjectteacher: {
        id: 'subjectteacher',
        name: 'Subject Teacher',
        badgeClass: 'subjectteacher',
        user: { name: 'Mr. Segun Adeyemi', id: 'ST-001', email: 's.adeyemi@nexis.edu', branch: 'Main Campus', subjects: ['Mathematics', 'Physics'] },
        stats: { subjects: 3, classes: 8, students: 185, submission: 60, avgScore: 68.3 },
        navigation: [
            { name: 'Dashboard', icon: 'fa-tachometer-alt', active: true, href: 'dashboard.php' },
            { name: 'Students Management', icon: 'fa-user-graduate', active: false, href: 'student_management.php' },
            { name: 'Staff Management', icon: 'fa-chalkboard-teacher', active: false, href: 'staff_management.php' },
            { name: 'Results Management', icon: 'fa-book', active: false, href: 'results_management.php' },
            { name: 'Fee Management', icon: 'fa-chart-line', active: false, href: 'fees_management.php' },
            { name: 'Settings', icon: 'fa-cog', active: false, href: '#' }
        ]
    }
};

const recentActivities = [
    {
        user: 'Super Admin',
        role: 'superadmin',
        action: 'Added new student record',
        details: 'James Adekunle - Grade 10A',
        time: '10 minutes ago',
        icon: 'admin'
    },
    {
        user: 'Head of School',
        role: 'hos',
        action: 'Updated teacher assignment',
        details: 'Mrs. Okoro assigned to Grade 10A',
        time: '25 minutes ago',
        icon: 'hos'
    },
    {
        user: 'System',
        role: 'system',
        action: 'Fee payment processed',
        details: '₦50,000 payment from Chioma Okeke',
        time: '1 hour ago',
        icon: 'system'
    },
    {
        user: 'Class Teacher',
        role: 'classteacher',
        action: 'Marked attendance',
        details: 'Grade 10A - 42/42 present',
        time: '2 hours ago',
        icon: 'teacher'
    },
    {
        user: 'Subject Teacher',
        role: 'subjectteacher',
        action: 'Uploaded assignment',
        details: 'Mathematics - Chapter 5 Exercises',
        time: '3 hours ago',
        icon: 'teacher'
    },
    {
        user: 'Super Admin',
        role: 'superadmin',
        action: 'System backup completed',
        details: 'Daily backup successful',
        time: '4 hours ago',
        icon: 'admin'
    }
];

// Application State
let currentRole = 'superadmin';

// DOM Elements
const sidebar = document.getElementById('sidebar');
const toggle = document.getElementById('sidebarToggle');
const overlay = document.getElementById('sidebarOverlay');
const mainContent = document.querySelector('.main-content');

// Sidebar Functionality
function toggleSidebar() {
    sidebar.classList.toggle('active');
    toggle.classList.toggle('active');
    overlay.classList.toggle('show');

    // Prevent body scrolling when sidebar is open on mobile
    if (window.innerWidth <= 992) {
        document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
    }
}

function closeSidebar() {
    sidebar.classList.remove('active');
    toggle.classList.remove('active');
    overlay.classList.remove('show');
    document.body.style.overflow = '';
}

// Event Listeners
toggle.addEventListener('click', toggleSidebar);
overlay.addEventListener('click', closeSidebar);

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function (event) {
    if (window.innerWidth <= 992 && sidebar.classList.contains('active')) {
        if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
            closeSidebar();
        }
    }
});

// Close sidebar on escape key
document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && sidebar.classList.contains('active')) {
        closeSidebar();
    }
});

// Dashboard Functions
function loadDashboard() {
    const role = roles[currentRole];

    // Update UI
    document.getElementById('dashboardTitle').textContent = `${role.name} Dashboard`;
    document.getElementById('welcomeMessage').textContent = getWelcomeMessage(role);
    document.getElementById('userId').textContent = `ID: ${role.user.id}`;
    document.getElementById('userRole').textContent = role.name;

    updateSidebar(role);
    loadDashboardContent(role);
    updateRoleSwitcher();
    highlightActiveLink();
}

function updateSidebar(role) {
    const sidebarNav = document.getElementById('sidebarNav');
    let html = '';

    role.navigation.forEach(item => {
        const active = item.active ? ' active' : '';
        const href = item.href || '#';
        html += `
                    <li class="nav-item">
                        <a class="nav-link${active}" href="${href}" onclick="handleNavigation('${item.name}')">
                            <i class="fas ${item.icon}"></i> ${item.name}
                        </a>
                    </li>
                `;
    });

    sidebarNav.innerHTML = html;

    // Mobile close behavior for sidebar links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 992) {
                closeSidebar();
            }
        });
    });
}

function highlightActiveLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    const currentPage = window.location.pathname.split('/').pop();

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
}

function loadDashboardContent(role) {
    document.getElementById('dashboardContent').innerHTML = renderRecentActivities(role);
}

function renderRecentActivities(role) {
    let filteredActivities = recentActivities;

    if (role.id === 'hos') {
        filteredActivities = recentActivities.filter(activity =>
            activity.role === 'superadmin' || activity.role === 'hos' || activity.role === 'system'
        );
    } else if (role.id === 'classteacher') {
        filteredActivities = recentActivities.filter(activity =>
            activity.role === 'classteacher' || activity.role === 'teacher' || activity.role === 'system'
        );
    } else if (role.id === 'subjectteacher') {
        filteredActivities = recentActivities.filter(activity =>
            activity.role === 'subjectteacher' || activity.role === 'teacher' || activity.role === 'system'
        );
    }

    const stats = role.stats;
    const badgeClass = role.badgeClass;
    const user = role.user;

    return `
                <!-- Quick Stats -->
                <div class="row g-3">
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="dashboard-card ${badgeClass} h-100">
                            <div class="stat-number ${badgeClass}">${stats.students?.toLocaleString() || '0'}</div>
                            <h6 class="text-muted mb-1">Total Students</h6>
                            <p class="small text-muted mb-2">${user.branch || 'All branches'}</p>
                            <div class="mt-auto">
                                <small class="text-success fw-medium">
                                    <i class="fas fa-arrow-up me-1"></i>5.2% increase
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="dashboard-card ${badgeClass} h-100">
                            <div class="stat-number ${badgeClass}">${stats.teachers || stats.subjects || '0'}</div>
                            <h6 class="text-muted mb-1">${role.id === 'subjectteacher' ? 'Subjects' : 'Teachers'}</h6>
                            <p class="small text-muted mb-2">${role.id === 'subjectteacher' ? user.subjects?.join(', ') : user.branch || 'All'}</p>
                            <div class="mt-auto">
                                <span class="badge ${badgeClass === 'superadmin' ? 'bg-warning' : badgeClass === 'hos' ? 'bg-info' : badgeClass === 'classteacher' ? 'bg-success' : 'bg-purple'} px-3 py-1">
                                    Active
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="dashboard-card ${badgeClass} h-100">
                            <div class="stat-number ${badgeClass}">${filteredActivities.length}</div>
                            <h6 class="text-muted mb-1">Recent Activities</h6>
                            <p class="small text-muted mb-2">Last 24 hours</p>
                            <div class="mt-auto">
                                <small class="text-info fw-medium">
                                    <i class="fas fa-sync-alt me-1"></i>Recently updated
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="activity-feed">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0" style="font-size: 1.25rem;">
                            <i class="fas fa-history me-2"></i>Recent Activities
                        </h4>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                    </div>
                    
                    ${filteredActivities.map(activity => `
                        <div class="activity-item ${activity.icon}">
                            <div class="activity-icon ${activity.icon}">
                                <i class="fas ${activity.icon === 'admin' ? 'fa-crown' :
            activity.icon === 'hos' ? 'fa-user-tie' :
                activity.icon === 'teacher' ? 'fa-chalkboard-teacher' :
                    activity.icon === 'student' ? 'fa-user-graduate' :
                        'fa-cog'
        }"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">${activity.action}</div>
                                <div class="activity-details">${activity.details}</div>
                                <div class="activity-time">
                                    <i class="far fa-user me-1"></i>${activity.user}
                                    <span class="mx-2">•</span>
                                    <i class="far fa-clock me-1"></i>${activity.time}
                                </div>
                            </div>
                        </div>
                    `).join('')}
                    
                    ${filteredActivities.length === 0 ? `
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                            <h6 class="text-muted">No recent activities</h6>
                            <p class="text-muted mb-0 small">System activities will appear here</p>
                        </div>
                    ` : `
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none small">
                                <i class="fas fa-list me-1"></i>View all activities
                            </a>
                        </div>
                    `}
                </div>
            `;
}

// Helper Functions
function getWelcomeMessage(role) {
    switch (role.id) {
        case 'superadmin': return 'Monitoring system-wide activities';
        case 'hos': return `Overseeing ${role.user.branch} operations`;
        case 'classteacher': return `Managing ${role.user.class} activities`;
        case 'subjectteacher': return `Teaching ${role.user.subjects?.join(', ')}`;
        default: return 'System overview';
    }
}

function switchRole(roleId) {
    currentRole = roleId;
    loadDashboard();
    toggleRoleSwitcher();
}

function toggleRoleSwitcher() {
    document.getElementById('roleOptions').classList.toggle('show');
}

function updateRoleSwitcher() {
    document.querySelectorAll('.role-option').forEach(option => {
        option.classList.remove('active');
        if (option.onclick.toString().includes(currentRole)) {
            option.classList.add('active');
        }
    });
}

function handleNavigation(page) {
    console.log(`Navigating to: ${page} (${roles[currentRole].name})`);

    document.getElementById('dashboardTitle').textContent = `${page} - ${roles[currentRole].name}`;

    const content = document.getElementById('dashboardContent');
    content.innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <h5>Loading ${page}...</h5>
                    <p class="text-muted">Please wait while we load the ${page.toLowerCase()} page</p>
                </div>
            `;

    setTimeout(() => {
        loadDashboardContent(roles[currentRole]);
        document.getElementById('dashboardTitle').textContent = `${roles[currentRole].name} Dashboard`;
    }, 500);

    return false;
}

function showProfile() {
    const role = roles[currentRole];
    console.log('Opening profile for:', role.user.name);

    document.getElementById('welcomeMessage').textContent = `Viewing profile: ${role.user.name}`;

    const content = document.getElementById('dashboardContent');
    content.innerHTML = `
                <div class="activity-feed">
                    <h4 class="fw-bold mb-4" style="font-size: 1.25rem;">
                        <i class="fas fa-user-circle me-2"></i>User Profile
                    </h4>
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="rounded-circle bg-${role.badgeClass} d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                            <h5>${role.user.name}</h5>
                            <p class="text-muted">${role.name}</p>
                        </div>
                        <div class="col-md-8">
                            <div class="list-group">
                                <div class="list-group-item py-2">
                                    <strong>User ID:</strong> ${role.user.id}
                                </div>
                                <div class="list-group-item py-2">
                                    <strong>Email:</strong> ${role.user.email}
                                </div>
                                <div class="list-group-item py-2">
                                    <strong>Branch:</strong> ${role.user.branch || 'All branches'}
                                </div>
                                ${role.user.class ? `
                                <div class="list-group-item py-2">
                                    <strong>Class:</strong> ${role.user.class}
                                </div>` : ''}
                                ${role.user.subjects ? `
                                <div class="list-group-item py-2">
                                    <strong>Subjects:</strong> ${role.user.subjects.join(', ')}
                                </div>` : ''}
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm me-2">
                                    <i class="fas fa-edit me-1"></i>Edit Profile
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" onclick="loadDashboardContent(roles[currentRole])">
                                    <i class="fas fa-times me-1"></i>Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
}

function logout() {
    const logoutModal = `
                <div class="modal fade" id="logoutModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Sign Out</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <i class="fas fa-sign-out-alt fa-3x text-warning mb-3"></i>
                                <h5>Are you sure you want to sign out?</h5>
                                <p class="text-muted">You will need to sign in again to access the system.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-warning" onclick="confirmLogout()">Sign Out</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

    if (!document.getElementById('logoutModal')) {
        const modalDiv = document.createElement('div');
        modalDiv.innerHTML = logoutModal;
        document.body.appendChild(modalDiv);
    }

    const modal = new bootstrap.Modal(document.getElementById('logoutModal'));
    modal.show();
}

function confirmLogout() {
    const modal = bootstrap.Modal.getInstance(document.getElementById('logoutModal'));
    modal.hide();

    document.getElementById('dashboardContent').innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border text-warning mb-3" role="status">
                        <span class="visually-hidden">Signing out...</span>
                    </div>
                    <h5>Signing out...</h5>
                    <p class="text-muted">Please wait while we sign you out</p>
                </div>
            `;

    setTimeout(() => {
        alert('You have been signed out successfully.');
        // In real app: window.location.href = '/login';
    }, 1000);
}

// Close role switcher when clicking outside
document.addEventListener('click', function (event) {
    const switcher = document.getElementById('roleOptions');
    const button = document.querySelector('.role-switcher-btn');

    if (switcher && button) {
        if (!switcher.contains(event.target) && !button.contains(event.target)) {
            switcher.classList.remove('show');
        }
    }
});

// Handle window resize
function handleResize() {
    if (window.innerWidth > 992) {
        closeSidebar();
    }
}

window.addEventListener('resize', handleResize);

// Initialize
document.addEventListener('DOMContentLoaded', function () {
    loadDashboard();
    handleResize(); // Initial check
});
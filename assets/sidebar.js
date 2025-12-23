// Sidebar Functions
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('sidebarToggle');
    
    const isActive = sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
    
    const icon = toggle.querySelector('i');
    if (isActive) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
        toggle.classList.add('active');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
        toggle.classList.remove('active');
    }
    
    document.body.style.overflow = isActive ? 'hidden' : '';
}

function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('sidebarToggle');
    
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = '';
    
    const icon = toggle.querySelector('i');
    icon.classList.remove('fa-times');
    icon.classList.add('fa-bars');
    toggle.classList.remove('active');
}

// Auto highlight active menu item
function highlightActiveMenuItem() {
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
}

// Initialize sidebar functionality
document.addEventListener('DOMContentLoaded', function() {
    // Highlight active menu item
    highlightActiveMenuItem();
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 992) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebarToggle');
            if (sidebar && sidebar.classList.contains('active') && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target)) {
                closeSidebar();
            }
        }
    });
    
    // Auto-close sidebar on window resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            closeSidebar();
        }
    });
    
    // Add click handlers to all menu items (for mobile)
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 992) {
                closeSidebar();
            }
        });
    });
});

// Logout functionality
function showLogoutModal() {
    const modalElement = document.getElementById('logoutModal');
    if (modalElement) {
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
    } else {
        // Fallback logout
        if (confirm('Are you sure you want to sign out?')) {
            window.location.href = 'logout.php';
        }
    }
}

// Keyboard shortcuts for sidebar
document.addEventListener('keydown', function(event) {
    // Close sidebar with Escape key
    if (event.key === 'Escape') {
        closeSidebar();
    }
    // Toggle sidebar with Ctrl+Shift+S (Cmd+Shift+S on Mac)
    if ((event.ctrlKey || event.metaKey) && event.shiftKey && event.key === 'S') {
        event.preventDefault();
        toggleSidebar();
    }
});
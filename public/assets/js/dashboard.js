document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mainContent = document.getElementById('mainContent');
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');
    const mobileProfileBtn = document.getElementById('mobileProfileBtn');
    const mobileProfileDropdown = document.getElementById('mobileProfileDropdown');

    //--s
    const searchInput = document.querySelector('.d_search-input');

    searchInput.addEventListener('input', function() {
        if (this.value.length > 0) {
            console.log('Searching for:', this.value);
        }
    });

    document.querySelector('.d_notification-indicator').addEventListener('click', function() {
        console.log('Notifications clicked');
    });

    //--s

    //--mdl


    
    //--mdl

    function isMobile() {
        return window.innerWidth <= 768;
    }

    function createTooltips() {
        const navLinks = document.querySelectorAll('._sidebar.nav-link');
        
        navLinks.forEach(link => {
            const tooltipText = link.getAttribute('data-tooltip');
            if (tooltipText) {
                const existingTooltip = link.parentNode.querySelector('.tooltip');
                if (existingTooltip) {
                    existingTooltip.remove();
                }
                
                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.textContent = tooltipText;
                link.parentNode.appendChild(tooltip);
            }
        });
    }

    createTooltips();

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('sidebar-collapsed');
            
            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            sidebar.classList.add('show');
            mobileOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            mobileOverlay.classList.remove('show');
            document.body.style.overflow = '';
        });
    }

    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('show');
            
            if (mobileProfileDropdown) {
                mobileProfileDropdown.classList.remove('show');
            }
        });
    }

    if (mobileProfileBtn && mobileProfileDropdown) {
        mobileProfileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            mobileProfileDropdown.classList.toggle('show');
            
            if (profileDropdown) {
                profileDropdown.classList.remove('show');
            }
        });
    }

    document.addEventListener('click', function(e) {
        if (profileDropdown && !profileBtn.contains(e.target)) {
            profileDropdown.classList.remove('show');
        }
        
        if (mobileProfileDropdown && !mobileProfileBtn.contains(e.target)) {
            mobileProfileDropdown.classList.remove('show');
        }
    });

    window.addEventListener('resize', function() {
        if (!isMobile()) {
            sidebar.classList.remove('show');
            mobileOverlay.classList.remove('show');
            document.body.style.overflow = '';
        }
        
        if (profileDropdown) {
            profileDropdown.classList.remove('show');
        }
        if (mobileProfileDropdown) {
            mobileProfileDropdown.classList.remove('show');
        }
    });

    function setActiveNavLink() {
        const navLinks = document.querySelectorAll('._sidebar.nav-link');
        const currentPath = window.location.pathname;
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href === currentPath || (currentPath === '/' && href === '#')) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    setActiveNavLink();

    const savedCollapsedState = localStorage.getItem('sidebarCollapsed');
    if (savedCollapsedState === 'true' && !isMobile()) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('sidebar-collapsed');
    }

    document.querySelectorAll('._sidebar.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            document.querySelectorAll('._sidebar.nav-link').forEach(l => l.classList.remove('active'));
            
            this.classList.add('active');
            
            if (isMobile()) {
                sidebar.classList.remove('show');
                mobileOverlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (profileDropdown) {
                profileDropdown.classList.remove('show');
            }
            if (mobileProfileDropdown) {
                mobileProfileDropdown.classList.remove('show');
            }
            if (isMobile() && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                mobileOverlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        }
    });

    function handleRoleSections() {
        const adminSection = document.querySelector('._sidebar.admin-section');
        const userSection = document.querySelector('._sidebar.user-section');
        const bloggerSection = document.querySelector('._sidebar.blogger-section');
        
        if (adminSection && !adminSection.style.display) {
            adminSection.style.display = 'block';
        }
        if (userSection && userSection.style.display === 'none') {
        }
        if (bloggerSection && bloggerSection.style.display === 'none') {
        }
    }

    handleRoleSections();

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') {
                e.preventDefault();
                return;
            }
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    document.querySelectorAll('._sidebar.nav-link:not([href="#"])').forEach(link => {
        link.addEventListener('click', function() {
            const icon = this.querySelector('i');
            const originalClass = icon.className;
            icon.className = 'fas fa-spinner fa-spin';
            
            setTimeout(() => {
                icon.className = originalClass;
            }, 1000);
        });
    });
});

if (typeof logout === 'undefined') {
    function logout() {
        if (confirm('Are you sure you want to log out?')) {
            console.log('Logging out...');
        }
    }
}


// Role switching functionality

let currentRole = 'admin';
const roleConfigs = {
    admin: {
        icon: 'fas fa-user-shield',
        text: 'Admin',
        navId: 'adminNav',
        color: '#dc2626'
    },
    user: {
        icon: 'fas fa-user',
        text: 'User',
        navId: 'userNav',
        color: '#2563eb'
    },
    blogger: {
        icon: 'fas fa-pen',
        text: 'Blogger',
        navId: 'bloggerNav',
        color: '#7c3aed'
    },
    vendor: {
        icon: 'fas fa-store',
        text: 'Vendor',
        navId: 'vendorNav',
        color: '#059669'
    }
};

function switchRole(role) {
    if (role === currentRole) return;
    
    // Hide all navigation sections
    Object.values(roleConfigs).forEach(config => {
        const navElement = document.getElementById(config.navId);
        if (navElement) {
            navElement.style.display = 'none';
        }
    });

    // Show selected role navigation
    const selectedConfig = roleConfigs[role];
    const selectedNavElement = document.getElementById(selectedConfig.navId);
    if (selectedNavElement) {
        selectedNavElement.style.display = 'block';
    }

    // Update role switcher button
    document.getElementById('currentRoleIcon').className = selectedConfig.icon;
    document.getElementById('currentRoleText').textContent = selectedConfig.text;

    // Update active role option
    document.querySelectorAll('.role-option').forEach(option => {
        option.classList.remove('active');
    });
    document.querySelector(`[data-role="${role}"]`).classList.add('active');

    // Show/hide role indicator
    const roleIndicator = document.getElementById('roleIndicator');
    const activeRoleText = document.getElementById('activeRoleText');
    if (role === 'admin') {
        roleIndicator.style.display = 'none';
    } else {
        roleIndicator.style.display = 'block';
        activeRoleText.textContent = selectedConfig.text;
        roleIndicator.style.borderLeftColor = selectedConfig.color;
    }

    // Update current role
    currentRole = role;

    // Close dropdown
    document.getElementById('roleSwitcherMenu').classList.remove('show');

    // Optional: Trigger page content update
    updatePageContent(role);
}

function updatePageContent(role) {
    // This function can be used to update the main content area
    // based on the selected role view
    console.log(`Switched to ${role} view`);
    
    // You can add AJAX calls here to load role-specific content
    // or trigger Livewire events if you're using Livewire
}

// Initialize role switcher - Only for admins
document.addEventListener('DOMContentLoaded', function() {
    const roleSwitcherBtn = document.getElementById('roleSwitcherBtn');
    const roleSwitcherMenu = document.getElementById('roleSwitcherMenu');

    // Only initialize role switcher for admins
    if (roleSwitcherBtn && roleSwitcherMenu) {
        roleSwitcherBtn.addEventListener('click', function(e) {
            e.preventDefault();
            roleSwitcherMenu.classList.toggle('show');
        });

        // Handle role option clicks
        document.querySelectorAll('.role-option').forEach(option => {
            option.addEventListener('click', function() {
                const role = this.getAttribute('data-role');
                switchRole(role);
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.role-switcher-dropdown')) {
                roleSwitcherMenu.classList.remove('show');
            }
        });

        // Initialize with admin view
        switchRole('admin');
    }
});
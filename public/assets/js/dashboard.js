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
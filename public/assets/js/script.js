document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById('menuBtn');
    const mobileTopNav = document.getElementById('mobileTopNav');

    menuBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        mobileTopNav.classList.toggle('show');
        
        const icon = menuBtn.querySelector('i');
        if (mobileTopNav.classList.contains('show')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    document.addEventListener('click', function(event) {
        if (!mobileTopNav.contains(event.target) && 
            event.target !== menuBtn && 
            !menuBtn.contains(event.target) && 
            mobileTopNav.classList.contains('show')) {
            mobileTopNav.classList.remove('show');
            
            const icon = menuBtn.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    // Search functionality
    const searchIcons = document.querySelectorAll('.search-icon, .btn[type="button"]');
    searchIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const searchInput = this.closest('.search-container, .input-group').querySelector('input');
            if (searchInput.value.trim()) {
                alert('Searching for: ' + searchInput.value);
                // searchInput.value = ''; 
            } else {
                searchInput.focus();
            }
        });
    });

    // Enter key search
    const searchInputs = document.querySelectorAll('input[placeholder*="Search"]');
    searchInputs.forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                alert('Searching for: ' + this.value);
                // Submitting search
            }
        });
    });
});


class HeroSlider {
    constructor() {
        this.currentSlide = 0;
        this.slides = document.querySelectorAll('.hero-slide');
        this.dots = document.querySelectorAll('.dot');
        this.progressBar = document.querySelector('.progress-bar');
        this.slideInterval = 5000;
        this.intervalId = null;
        this.progressIntervalId = null;

        this.init();
    }

    init() {
        this.addEventListeners();
        this.startSlideshow();
        this.startProgressBar();
    }

    addEventListeners() {
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                this.goToSlide(index);
                this.resetSlideshow();
            });
        });

        const heroContainer = document.querySelector('.hero-container');
        heroContainer.addEventListener('mouseenter', () => {
            this.pauseSlideshow();
        });

        heroContainer.addEventListener('mouseleave', () => {
            this.startSlideshow();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                this.previousSlide();
                this.resetSlideshow();
            } else if (e.key === 'ArrowRight') {
                this.nextSlide();
                this.resetSlideshow();
            }
        });

        let startX = 0;
        let endX = 0;

        heroContainer.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        heroContainer.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;

            if (Math.abs(diff) > 50) { 
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.previousSlide();
                }
                this.resetSlideshow();
            }
        });
    }

    goToSlide(index) {
        this.slides[this.currentSlide].classList.remove('active');
        this.slides[this.currentSlide].classList.add('prev');
        this.dots[this.currentSlide].classList.remove('active');

        this.currentSlide = index;

        this.slides[this.currentSlide].classList.remove('prev');
        this.slides[this.currentSlide].classList.add('active');
        this.dots[this.currentSlide].classList.add('active');

        setTimeout(() => {
            this.slides.forEach(slide => slide.classList.remove('prev'));
        }, 1200);
    }

    nextSlide() {
        const nextIndex = (this.currentSlide + 1) % this.slides.length;
        this.goToSlide(nextIndex);
    }

    previousSlide() {
        const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.goToSlide(prevIndex);
    }

    startSlideshow() {
        this.intervalId = setInterval(() => {
            this.nextSlide();
        }, this.slideInterval);
    }

    pauseSlideshow() {
        if (this.intervalId) {
            clearInterval(this.intervalId);
            this.intervalId = null;
        }
        if (this.progressIntervalId) {
            clearInterval(this.progressIntervalId);
            this.progressIntervalId = null;
        }
    }

    resetSlideshow() {
        this.pauseSlideshow();
        this.startSlideshow();
        this.startProgressBar();
    }

    startProgressBar() {
        if (this.progressIntervalId) {
            clearInterval(this.progressIntervalId);
        }

        this.progressBar.style.width = '0%';
        this.progressBar.style.transition = 'none';

        setTimeout(() => {
            this.progressBar.style.transition = `width ${this.slideInterval}ms linear`;
            this.progressBar.style.width = '100%';
        }, 50);

        this.progressIntervalId = setInterval(() => {
            this.progressBar.style.width = '0%';
            this.progressBar.style.transition = 'none';
            
            setTimeout(() => {
                this.progressBar.style.transition = `width ${this.slideInterval}ms linear`;
                this.progressBar.style.width = '100%';
            }, 50);
        }, this.slideInterval);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new HeroSlider();
});

if ('IntersectionObserver' in window) {
    const heroObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    });

    document.querySelectorAll('.hero-slide').forEach(slide => {
        heroObserver.observe(slide);
    });
}
let currentSlide = 0;
const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.hero-dot');
const progressBar = document.querySelector('.hero-progress');
const slideInterval = 5000;
let slideTimer;
let progressTimer;

function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    slides[index].classList.add('active');
    dots[index].classList.add('active');

    currentSlide = index;
    resetProgress();
}

function nextSlide() {
    const next = (currentSlide + 1) % slides.length;
    showSlide(next);
}

function resetProgress() {
    clearTimeout(progressTimer);
    progressBar.style.width = '0%';
    
    let progress = 0;
    const progressIncrement = 100 / (slideInterval / 100);

    progressTimer = setInterval(() => {
        progress += progressIncrement;
        progressBar.style.width = progress + '%';
        
        if (progress >= 100) {
            clearInterval(progressTimer);
        }
    }, 100);
}

function startSlider() {
    slideTimer = setInterval(nextSlide, slideInterval);
    resetProgress();
}

function stopSlider() {
    clearInterval(slideTimer);
    clearTimeout(progressTimer);
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        stopSlider();
        showSlide(index);
        startSlider();
    });
});

startSlider();

const heroSection = document.querySelector('.hero-section');
heroSection.addEventListener('mouseenter', stopSlider);
heroSection.addEventListener('mouseleave', startSlider);

window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

const searchInput = document.querySelector('.search-input');
searchInput.addEventListener('focus', function() {
    this.parentElement.style.transform = 'scale(1.02)';
});

searchInput.addEventListener('blur', function() {
    this.parentElement.style.transform = 'scale(1)';
});


// Products section 
const categoryBtns = document.querySelectorAll('.products-category-btn');
const productCards = document.querySelectorAll('.products-card');

categoryBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        
        categoryBtns.forEach(b => b.classList.remove('products-active'));
        
        btn.classList.add('products-active');
        
        const category = btn.textContent.toLowerCase();
        
        productCards.forEach(card => {
            const cardCategory = card.querySelector('.products-card-category').textContent.toLowerCase();
            
            if (category === 'all' || cardCategory.includes(category)) {
                card.style.display = 'block';
                card.style.animation = 'fadeIn 0.5s ease';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

// Add to cart functionality
const addToCartBtns = document.querySelectorAll('.products-btn-primary');

addToCartBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const originalText = btn.textContent;
        btn.textContent = 'Added!';
        btn.style.background = '#28a745';
        
        setTimeout(() => {
            btn.textContent = originalText;
            btn.style.background = '';
        }, 1500);
    });
});

// Wishlist functionality
const wishlistBtns = document.querySelectorAll('.products-btn-secondary');

wishlistBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (btn.textContent === '♡') {
            btn.textContent = '♥';
            btn.style.color = '#dc3545';
        } else {
            btn.textContent = '♡';
            btn.style.color = '';
        }
    });
});

// Add fade in animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
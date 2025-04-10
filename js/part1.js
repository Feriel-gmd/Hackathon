// Simple Slider
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide() {
    slides.forEach(slide => slide.classList.remove('active'));
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
}

setInterval(showSlide, 3000);

// Dropdown Menu Functionality
document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdown = document.querySelector('.dropdown');
    
    console.log('Dropdown elements:', { dropdownToggle, dropdown });

    if (dropdownToggle && dropdown) {
        dropdownToggle.addEventListener('click', function(e) {
            console.log('Dropdown toggle clicked');
            e.preventDefault();
            dropdown.classList.toggle('active');
            console.log('Dropdown active state:', dropdown.classList.contains('active'));
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            console.log('Document clicked');
            if (!dropdown.contains(e.target)) {
                console.log('Click outside dropdown');
                dropdown.classList.remove('active');
            }
        });
    }
});

// Password validation
const passwordInput = document.querySelector('input[name="password"]');
const confirmPasswordInput = document.querySelector('input[name="confirm_password"]');

if (passwordInput && confirmPasswordInput) {
    // Create password strength indicator
    const strengthIndicator = document.createElement('div');
    strengthIndicator.className = 'password-strength';
    passwordInput.parentElement.appendChild(strengthIndicator);

    // Check password strength
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        
        // Length check
        if (password.length >= 8) strength++;
        
        // Contains number
        if (/\d/.test(password)) strength++;
        
        // Contains letter
        if (/[A-Za-z]/.test(password)) strength++;
        
        // Contains special character
        if (/[@$!%*#?&]/.test(password)) strength++;
        
        // Update strength indicator
        strengthIndicator.className = 'password-strength';
        if (strength >= 4) {
            strengthIndicator.classList.add('strong');
        } else if (strength >= 2) {
            strengthIndicator.classList.add('medium');
        } else {
            strengthIndicator.classList.add('weak');
        }
    });

    // Check if passwords match
    confirmPasswordInput.addEventListener('input', function() {
        if (this.value !== passwordInput.value) {
            this.setCustomValidity('كلمات المرور غير متطابقة');
        } else {
            this.setCustomValidity('');
        }
    });
}

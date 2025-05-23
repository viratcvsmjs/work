document.addEventListener('DOMContentLoaded', function() {
    // Basic Client-Side Form Validation for Registration (from previous answer)
    const registerForm = document.querySelector('.auth-form form');
    if (registerForm && document.getElementById('password') && document.getElementById('confirm_password')) {
        registerForm.addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const passwordErrorSpan = document.querySelector('#password + .error-message');
            const confirmPasswordErrorSpan = document.querySelector('#confirm_password + .error-message');

            if (passwordErrorSpan) passwordErrorSpan.textContent = '';
            if (confirmPasswordErrorSpan) confirmPasswordErrorSpan.textContent = '';

            let hasError = false;
            if (password.length < 6) {
                if (passwordErrorSpan) passwordErrorSpan.textContent = "Password must have at least 6 characters.";
                hasError = true;
            }
            if (password !== confirmPassword) {
                if (confirmPasswordErrorSpan) confirmPasswordErrorSpan.textContent = "Password did not match.";
                hasError = true;
            }
            if (hasError) {
                event.preventDefault();
            }
        });
    }

    // Carousel Functionality for Promo Banners
    const carouselItemsContainer = document.querySelector('.banner-carousel .carousel-items');
    const carouselItems = document.querySelectorAll('.banner-carousel .carousel-item');
    const prevArrow = document.querySelector('.banner-carousel .carousel-arrow.left-arrow');
    const nextArrow = document.querySelector('.banner-carousel .carousel-arrow.right-arrow');

    if (carouselItemsContainer && carouselItems.length > 1) {
        let currentIndex = 0;
        const totalItems = carouselItems.length;

        function updateCarousel() {
            const itemWidth = carouselItems[0].offsetWidth; // Get the width of one item
            carouselItemsContainer.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }

        if (nextArrow) {
            nextArrow.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
            });
        }

        if (prevArrow) {
            prevArrow.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                updateCarousel();
            });
        }

        // Optional: Auto-slide
        let autoSlideInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalItems;
            updateCarousel();
        }, 5000); // Change banner every 5 seconds

        // Pause auto-slide on hover
        const bannerCarousel = document.querySelector('.banner-carousel');
        if (bannerCarousel) {
            bannerCarousel.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
            bannerCarousel.addEventListener('mouseleave', () => {
                autoSlideInterval = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalItems;
                    updateCarousel();
                }, 5000);
            });
        }

        // Update carousel on window resize
        window.addEventListener('resize', updateCarousel);
    }
});
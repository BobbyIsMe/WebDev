document.addEventListener('DOMContentLoaded', function () {
    const mainImages = document.querySelectorAll('.main-image img');
    const smallImages = document.querySelectorAll('.small-image');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    let currentIndex = 0;
    let autoSlideInterval;

    function showImage(index) {
        mainImages.forEach(img => img.classList.remove('active'));
        mainImages[index].classList.add('active');

        smallImages.forEach(thumb => thumb.classList.remove('active-thumb'));
        smallImages[index]?.classList.add('active-thumb');

        currentIndex = index;
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % mainImages.length;
        showImage(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + mainImages.length) % mainImages.length;
        showImage(currentIndex);
    }

    function startAutoSlide() {
        if (autoSlideInterval) return;
        autoSlideInterval = setInterval(nextImage, 5000);
    }

    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = null;
        }
    }

    prevBtn.addEventListener('click', () => {
        prevImage();
        stopAutoSlide();
        startAutoSlide();
    });

    nextBtn.addEventListener('click', () => {
        nextImage();
        stopAutoSlide();
        startAutoSlide();
    });

    smallImages.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            showImage(index);
            stopAutoSlide();
            startAutoSlide();
        });
    });

    showImage(0);
    startAutoSlide();

    document.querySelector('.room-images').addEventListener('mouseenter', stopAutoSlide);
    document.querySelector('.room-images').addEventListener('mouseleave', startAutoSlide);
});
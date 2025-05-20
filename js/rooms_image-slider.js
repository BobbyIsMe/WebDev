document.addEventListener('DOMContentLoaded', function () {
    let mainImages = document.querySelectorAll('.main-image img');
    let smallImages = document.querySelectorAll('.small-image');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    let currentIndex = 0;
    let autoSlideInterval;
    let startThumbIndex = 0;
    const maxVisibleThumbs = 3;

    function showImage(index) {
        mainImages.forEach(img => img.classList.remove('active'));
        mainImages[index].classList.add('active');

        smallImages.forEach(thumb => thumb.classList.remove('active-thumb'));
        smallImages[index]?.classList.add('active-thumb');

        currentIndex = index;
    }

    function nextImage() {
        currentIndex++;

        if (currentIndex >= mainImages.length) {
            currentIndex = 0;
            startThumbIndex = 0;
        } else if (currentIndex >= startThumbIndex + maxVisibleThumbs) {
            startThumbIndex = Math.min(currentIndex, smallImages.length - maxVisibleThumbs);
        }

        updateThumbnailDisplay();
        showImage(currentIndex);
    }

    function prevImage() {
        currentIndex--;

        if (currentIndex < 0) {
            currentIndex = mainImages.length - 1;
            startThumbIndex = smallImages.length - maxVisibleThumbs;
        }

        if (currentIndex < startThumbIndex) {
            startThumbIndex = Math.max(0, currentIndex - maxVisibleThumbs + 1);
        }

        updateThumbnailDisplay();
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

    function updateThumbnailDisplay() {
        smallImages.forEach((thumb, index) => {
            if (index >= startThumbIndex && index < startThumbIndex + maxVisibleThumbs) {
                thumb.style.display = 'inline-block';
            } else {
                thumb.style.display = 'none';
            }
        });
    }

    smallImages.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            const visibleIndex = index - startThumbIndex;

            if (visibleIndex === 2 && index < smallImages.length - 1) {
                startThumbIndex = Math.min(startThumbIndex + 1, smallImages.length - maxVisibleThumbs);
                updateThumbnailDisplay();
            }

            if (visibleIndex === 0 && index > 0) {
                startThumbIndex = Math.max(startThumbIndex - 1, 0);
                updateThumbnailDisplay();
            }

            showImage(index);
            stopAutoSlide();
            startAutoSlide();
        });
    });

    prevBtn.addEventListener('click', () => {
        prevImage();
        stopAutoSlide();
        startAutoSlide();
    });

    nextBtn.addEventListener('click', () => {
        if (currentIndex === mainImages.length - 1) {
            currentIndex = 0;
            startThumbIndex = 0;
        } else {
            currentIndex++;

            if (currentIndex >= startThumbIndex + maxVisibleThumbs) {
                startThumbIndex = Math.min(currentIndex, smallImages.length - maxVisibleThumbs);
            }
        }

        updateThumbnailDisplay();
        showImage(currentIndex);

        stopAutoSlide();
        startAutoSlide();
    });

    showImage(0);
    updateThumbnailDisplay();
    startAutoSlide();

    document.querySelector('.room-images').addEventListener('mouseenter', stopAutoSlide);
    document.querySelector('.room-images').addEventListener('mouseleave', startAutoSlide);
});
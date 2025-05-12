document.addEventListener('DOMContentLoaded', function() {
    const mainImages = document.querySelectorAll('.main-image img');
    const smallImages = document.querySelectorAll('.small-image');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    
    let currentIndex = 0;

    function showImage(index) {
        mainImages.forEach(img => img.classList.remove('active'));
        mainImages[index].classList.add('active');
        currentIndex = index;
        smallImages.forEach((thumb, i) => {
            if (i === index) {
                thumb.classList.add('active-thumb');
            } else {
                thumb.classList.remove('active-thumb');
            }
        });
    }

    prevBtn.addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + mainImages.length) % mainImages.length;
        showImage(currentIndex);
    });

    nextBtn.addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % mainImages.length;
        showImage(currentIndex);
    });

    smallImages.forEach((thumb, index) => {
        thumb.addEventListener('click', function() {
            showImage(index);
        });
    });

    showImage(0);
});
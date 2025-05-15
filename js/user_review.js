let selectedRating = 5;

document.addEventListener('DOMContentLoaded', () => {
    fetch("../../php/user_review.php")
        .then(res => res.json())
        .then(data => {
            document.getElementById("room_id").textContent = `${data.room_id}`;
            selectedRating = data.rating;
            document.getElementById("date_modified").textContent = `${data.date_modified}`;
            document.getElementById("review").value = `${data.text}`;
            updateStars();
        });
});

const stars = document.querySelectorAll('.star');

stars.forEach(star => {
    star.addEventListener('click', () => {
        selectedRating = parseInt(star.getAttribute('data-value'));
        updateStars();
    });

    star.addEventListener('mouseover', () => {
        const hoverValue = parseInt(star.getAttribute('data-value'));
        highlightStars(hoverValue);
    });

    star.addEventListener('mouseout', () => {
        updateStars();
    });
});

function updateStars() {
    stars.forEach(star => {
        const value = parseInt(star.getAttribute('data-value'));
        star.classList.toggle('selected', value <= selectedRating);
    });
}

function highlightStars(hoverValue) {
    stars.forEach(star => {
        const value = parseInt(star.getAttribute('data-value'));
        star.classList.toggle('hovered', value <= hoverValue);
    });
}

function reviewSubmit(e) {
    e.preventDefault();
    const formData = new FormData(document.getElementById("review-form"));
    const data = new URLSearchParams(formData);
    data.append("rating", selectedRating);

    fetch('../../php/add_review.php', {
        method: 'POST',
        body: data
    })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(res => {
            if (res.status == 200) {
                window.location.href = "../../pages/Webpages/rooms.php";
            } else {
                alert(res.message);
            }
        })
        .catch(err => console.error("Failed to submit review:", err));
}
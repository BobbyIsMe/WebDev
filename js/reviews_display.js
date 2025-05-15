let totalPage = 1;
let page = 1;
let rating = 0;
let room_id = 0;
let order = "";
let query = "";

document.getElementById("ratings").addEventListener("change", (e) => {
    rating = e.target.value;
    page = 1;
    loadPage(1);
});

document.getElementById("rooms").addEventListener("change", (e) => {
    room_id = e.target.value;
    page = 1;
    loadPage(1);
});

document.getElementById("orders").addEventListener("change", (e) => {
    order = e.target.value;
    page = 1;
    loadPage(1);
});

function deleteReview(review_id) {
    if (confirm("Are you sure you want to delete this review?")) {
        fetch(`../../php/delete_review.php`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `review_id=${encodeURIComponent(review_id)}`
        })
            .then(res => res.json())
            .then(data => {
                if (data.status == 200) {
                    alert("Review deleted successfully.");
                    loadPage(page);
                } else {
                    alert(data.message);
                }
            })
            .catch(err => console.error("Failed to delete review:", err));
    }
}

function loadPage(page) {
    query = "";
    if (rating != null && rating != 0) query += `&rating=${rating}`;
    if (order != null && order != "") query += `&order=${order}`;
    if (room_id != null && room_id != 0) query += `&room_id=${room_id}`;

    fetch(`../../php/get_reviews.php?page=${page}${query}`)
        .then(res => res.json())
        .then(data => {
            totalPages = data.totalPages;
            const reviewsData = data.reviews;
            const tableBody = document.getElementById("reviews-list");
            tableBody.innerHTML = "";
            reviewsData.forEach(review => {
                ratings = "";
                for (let i = 0; i < review.rating; i++) {
                    ratings += "★";
                }
                for (let i = 0; i < 5 - review.rating; i++) {
                    ratings += "☆";
                }
                tableBody.innerHTML += `
                <div class="review-box">
                    ${data.is_admin ? `<button class="delete-btn" onclick=deleteReview(${review.review_id})>Delete</button>` : ""}
                    <div class="review-details">
                        <div class="col-3">${review.name}</div>
                        <div class="col-3">${review.email}</div>
                        <div class="col-3">Room Number: ${review.room_id}</div>
                        <div style="color: gold">${ratings}</div>
                        <div class="col-3">Date Created: ${review.date_created}</div>
                        ${review.date_modified != null ? `<div class="col-3">Last Modified: ${review.date_modified}</div>` : ""}
                    </div>
                    <div class="review-text">
                        <strong>Review</strong><br>
                        <p class="text">${review.text}</p>
                    </div>
                    <button class="read-more")>Read More</button>
                </div>
                <br>
                `;
            });
            document.getElementById("page_number").innerHTML = data.totalPages != 0 ? `Page <strong>${page}</strong> of <strong>${data.totalPages}</strong>` : data.message;
            document.getElementById("prev_button").disabled = (page === 1);
            document.getElementById("next_button").disabled = (page === totalPages);

            const containers = document.querySelectorAll('.review-box');

            containers.forEach(container => {
                const desc = container.querySelector('.text');
                const btn = container.querySelector('.read-more');

                // Compare full scroll height vs visible height
                if (desc.scrollHeight > desc.clientHeight + 1) {
                    btn.style.display = 'inline';
                }

                // Toggle expansion
                btn.addEventListener('click', () => {
                    desc.classList.toggle('expanded');
                    btn.textContent = desc.classList.contains('expanded') ? 'Read less' : 'Read more';
                });
            });
        })
        .catch(err => console.error("Failed to fetch reviews:", err));
}


document.addEventListener('DOMContentLoaded', () => {
    loadPage(1);
});
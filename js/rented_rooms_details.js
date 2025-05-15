document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById("room-dropdown");

    fetch("../../php/rented_room.php")
        .then(res => res.json())
        .then(data => {

            document.getElementById("room-id").textContent = `${data.room_id}`;
            document.getElementById("description").innerHTML = data.description;
            document.getElementById("check-in-date").value = `${data.check_in_date}`;
            document.getElementById("due-date").value = `${data.due_date}`;
            document.getElementById("status").value = `${data.status}`;
            document.getElementById("boarder_type").value = `${data.boarder_type}`;
            document.getElementById("electricity-bill").value = `${data.electricity_bill}`;
            document.getElementById("miscellaneous-bill").value = `${data.miscellaneous_bill}`;
            document.getElementById("rent-bill").value = `${data.rent_bill}`;
            document.getElementById("total-bill").value = `${data.total_bill}`;
        })
        .catch(err => console.error("Failed to fetch room details:", err));
});
let rooms = [];

document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById("room-dropdown");
    const dropdownSort = document.getElementById("rooms");

    fetch("../../php/get_rooms.php")
        .then(res => res.json())
        .then(data => {
            rooms = data.rooms;

            Object.keys(rooms).forEach(roomId => {
                const room = rooms[roomId];
                const option = document.createElement("option");
                option.value = room.room_id;
                option.textContent = `${room.room_id}`;
                dropdown.appendChild(option);
                dropdownSort.appendChild(option);
            });
        })
        .catch(err => console.error("Failed to fetch rooms:", err));

    dropdown.addEventListener("change", (e) => {
        const selected_id = parseInt(e.target.value);
        if (!isNaN(selected_id)) {
            checkRoomAvailability(selected_id-1);
            document.getElementById("room-num").textContent = `Room #${selected_id}`;
            document.getElementById("description").textContent = `${rooms[selected_id-1].description}`;
        } else {
            document.getElementById("room-status").value = "Yes/No";
            document.getElementById("room-num").textContent = `Room #.`;
            document.getElementById("description").textContent = `Description about the place`;
        }
    });
});

function checkRoomAvailability(room_id) {
    const text = document.getElementById("room-status");

    if (rooms[room_id].is_rented) {
        text.value = "No";
    } else {
        text.value = "Yes";
    }
}

function rentSubmit(e) {
    e.preventDefault();

    const formData = new FormData(document.getElementById("room-form"));
    const data = new URLSearchParams(formData);

    fetch('../../php/add_room.php', {
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
        if (res["status"] === 200) {
            window.location.replace('../../pages/Profilepage/RentedRoom.php');
        } else {
            document.getElementById("message").textContent = res["message"];
        }
    })
    .catch(error => {
        console.error("Error during renting:", error);
        alert("An error occurred. Please try again.");
    });
}

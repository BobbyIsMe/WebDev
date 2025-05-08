document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById("room-dropdown");

    fetch("../php/get_personal_details.php")
        .then(res => res.json())
        .then(data => {

            document.getElementById("date-created").textContent = `Member since ${data.date_created}`;
            document.getElementById("email").value = `${data.user_email}`;
            document.getElementById("name").value = `${data.user_name}`;
            document.getElementById("contact-number").value = `${data.contact_number}`;
        })
        .catch(err => console.error("Failed to fetch rooms:", err));
});
document.addEventListener('DOMContentLoaded', () => { 
    fetch("../../php/get_rents.php?")
        .then(res => res.json())
        .then(data => {
            const rents = data.rents;
            const tableBody = document.getElementById("rents-table-body");
            tableBody.innerHTML = ""; // Clear existing rows

            rents.forEach(rent => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${rent.rent_id}</td>
                    <td>${rent.room_id}</td>
                    <td>${rent.user_id}</td>
                    <td>${rent.start_date}</td>
                    <td>${rent.end_date}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(err => console.error("Failed to fetch rents:", err));
});
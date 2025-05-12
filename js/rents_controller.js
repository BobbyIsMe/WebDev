let totalPage = 1;
let email = "";
let contact_number = "";
let room_id = "";
let stat = "";
let boarder_type = "";
let check_in_date = "";
let due_date = "";
let page = 1;
let query = "";
let rent_id = 0;
totalPages = 1;
rents = [];

function refreshFilter() {
    email = "";
    contact_number = "";
    room_id = "";
    stat = "";
    boarder_type = "";
    check_in_date = "";
    due_date = "";
    query = "";
}

function onSubmit(e) {
    e.preventDefault();
    refreshFilter();
    const form = document.getElementById("filter_form");
    const formData = new FormData(form);
    email = formData.get("email");
    contact_number = formData.get("contact_number");
    room_id = formData.get("room_id");
    boarder_type = formData.get("boarder_type");
    stat = formData.get("status");
    check_in_date = formData.get("check_in_date");
    due_date = formData.get("due_date");
    page = 1;
    const modal = bootstrap.Modal.getInstance(document.getElementById('filter_popup'));
    modal.hide();
    loadPage(1);
}

document.getElementById("recent").addEventListener("click", function (event) {
    event.preventDefault();
    document.getElementById("filter_form").reset();
    refreshFilter();
    page = 1;
    loadPage(1);
});

document.getElementById("status_dropdown").addEventListener("change", function () {
    refreshFilter();
    document.getElementById("filter_form").reset();
    const selectedValue = this.value;
    stat = selectedValue;
    page = 1;
    loadPage(1);
});

document.getElementById("prev_button").addEventListener("click", () => {
    if (page > 1) {
        page--;
        loadPage(page);
    }
});

document.getElementById("next_button").addEventListener("click", () => {
    if (page < totalPages) {
        page++;
        loadPage(page);
    }
});

function loadPage(page) {
    if (email != null && email != "") query += `&email=${email}`;
    if (contact_number != null && contact_number != "") query += `&contact_number=${contact_number}`;
    if (room_id != null && room_id != "") query += `&room_id=${room_id}`;
    if (stat != null && stat != "") query += `&status=${stat}`;
    if (boarder_type != null && boarder_type != "") query += `&boarder_type=${boarder_type}`;
    if (check_in_date != null && check_in_date != "") query += `&check_in_date=${check_in_date}`;
    if (due_date != null && due_date != "") query += `&due_date=${due_date}`;

    fetch(`../../php/get_rents.php?page=${page}${query}`)
        .then(res => res.json())
        .then(data => {
            totalPages = data.totalPages;
            const rentsData = data.rents;
            const tableBody = document.getElementById("rent-list");
            tableBody.innerHTML = "";

            rents = [];
            rentsData.forEach(rent => {
                tableBody.innerHTML += `
                <div class="col-12" style="border-top: 1px solid black; border-bottom:  1px solid black;">

                            <div class="row">
                                <div class="col-6 p-5" style="border-right: 1px solid black ;">
                                    <div class="row">
                                        <div class="col-6 my-auto">
                                            Rent Details (ID: ${rent.rent_id}, Room #${rent.room_id})
                                        </div>

                                        <div class="col-6 d-flex justify-content-end ">
                                            <button id="btnEdit" class="btn" type="button" data-bs-toggle="modal"
                                                data-bs-target="#rent_popup" onclick="onEditRent(${rent.rent_id}, ${rents.length})">
                                                Edit Rent
                                            </button>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="container-fluid margin-content">
                                            <div class="col-12">
                                                <br>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" readonly
                                                    class="form-control-plaintext border bg-light px-2" id="name"
                                                    value=${rent.name}>
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" readonly
                                                    class="form-control-plaintext border bg-light px-2" id="email"
                                                    value=${rent.email}>
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <label for="contact_number" class="form-label">Contact Number</label>
                                                <input type="text" readonly
                                                    class="form-control-plaintext border bg-light px-2"
                                                    id="contact_number" value=${rent.contact_number}>
                                            </div>
                                            <div class="row col-12 mx-auto container-fluid margin-content">
                                                <div class="col-5 container-fluid margin-content">
                                                    <br>
                                                    <label for="check_in_date" class="form-label">Check-in Date</label>
                                                    <input type="text" readonly
                                                        class="form-control-plaintext border bg-light px-2"
                                                        id="check_in_date" value=${rent.check_in_date}>
                                                </div>
                                                <div class="col-2 container-fluid margin-content">
                                                </div>
                                                <div class="col-5 container-fluid margin-content">
                                                    <br>
                                                    <label for="due_date" class="form-label">Due Date</label>
                                                    <input type="text" readonly
                                                        class="form-control-plaintext border bg-light px-2"
                                                        id="due_date" value=${rent.due_date}>
                                                </div>
                                                <div class="col-5 container-fluid margin-content">
                                                    <br>
                                                    <label for="status" class="form-label">Status</label>
                                                    <input type="text" readonly
                                                        class="form-control-plaintext border bg-light px-2" id="status"
                                                        value=${rent.status}>
                                                </div>
                                                <div class="col-2 container-fluid">
                                                </div>
                                                <div class="col-5 container-fluid margin-content">
                                                    <br>
                                                    <label for="boarder_type" class="form-label">Boarder Type</label>
                                                    <input type="text" readonly
                                                        class="form-control-plaintext border bg-light px-2"
                                                        id="boarder_type" value=${rent.boarder_type}>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6 p-5">
                                    <div class="row">
                                        <div class="col-6 my-auto">
                                                Bill Details
                                            </div>

                                            <div class="col-6 d-flex justify-content-end ">
                                                <button id="btnEdit" class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#bill_popup" onclick="onEditBill(${rent.rent_id}, ${rents.length})">
                                                    Edit Bill
                                                </button>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="container-fluid margin-content">
                                                <div class="row col-12 mx-auto container-fluid margin-content">

                                                    <div class="col-5 container-fluid margin-content">
                                                        <br>
                                                        <label for="electricity_bill" class="form-label">Electricity
                                                            Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="electricity_bill" value=${rent.electricity_bill}>
                                                    </div>

                                                    <div class="col-2 container-fluid margin-content"><br></div>

                                                    <div class="col-5 container-fluid margin-content">
                                                        <br>
                                                        <label for="miscellaneous_bill" class="form-label">Miscellaneous
                                                            Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="miscellaneous_bill" value=${rent.miscellaneous_bill}>
                                                    </div>

                                                    <div class="col-5 container-fluid margin-content">
                                                        <br>
                                                        <label for="rent_bill" class="form-label">Rent Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="rent_bill" value=${rent.rent_bill}>
                                                    </div>

                                                    <div class="col-2 container-fluid margin-content"><br></div>

                                                    <div class="col-5 container-fluid margin-content">
                                                        <br>
                                                        <label for="total_bill" class="form-label">Total Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="total_bill" value=${rent.total_bill}>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>`;
                rents.push({
                    ["rent_id"]: rent.rent_id,
                    ["name"]: rent.name,
                    ["email"]: rent.email,
                    ["contact_number"]: rent.contact_number,
                    ["room_id"]: rent.room_id,
                    ["status"]: rent.status,
                    ["boarder_type"]: rent.boarder_type,
                    ["check_in_date"]: rent.check_in_date,
                    ["due_date"]: rent.due_date,
                    ["electricity_bill"]: rent.electricity_bill,
                    ["miscellaneous_bill"]: rent.miscellaneous_bill,
                    ["rent_bill"]: rent.rent_bill,
                    ["total_bill"]: rent.total_bill
                });
            });
            document.getElementById("page_number").textContent = `Page ${page} of ${data.totalPages}`;
            document.getElementById("prev_button").disabled = (page === 1);
            document.getElementById("next_button").disabled = (page === totalPages);
        })
        .catch(err => console.error("Failed to fetch rents:", err));
}

function onEditRent(rentId, rentsId) {
    document.getElementById("rent_header").textContent = `Edit Rent Details (ID: ${rents[rentsId].rent_id}, Room #${rents[rentsId].room_id})`;
    document.getElementById("rent_name").value = rents[rentsId].name;
    document.getElementById("rent_email").value = rents[rentsId].email;
    document.getElementById("rent_contact_number").value = rents[rentsId].contact_number;
    document.getElementById("rent_status").value = rents[rentsId].status;
    document.getElementById("rent_boarder_type").value = rents[rentsId].boarder_type;
    document.getElementById("rent_check_in_date").value = rents[rentsId].check_in_date;
    document.getElementById("rent_due_date").value = rents[rentsId].due_date;
    rent_id = rentId;
}

function onEditBill(rentId, rentsId) {
    document.getElementById("bill_header").textContent = `Edit Bill Details (ID: ${rents[rentsId].rent_id}, Room #${rents[rentsId].room_id})`;
    document.getElementById("bill_name").value = rents[rentsId].name;
    document.getElementById("bill_email").value = rents[rentsId].email;
    document.getElementById("bill_contact_number").value = rents[rentsId].contact_number;
    document.getElementById("bill_electricity_bill").value = rents[rentsId].electricity_bill;
    document.getElementById("bill_miscellaneous_bill").value = rents[rentsId].miscellaneous_bill;
    document.getElementById("bill_rent_bill").value = rents[rentsId].rent_bill;
    document.getElementById("bill_total_bill").value = rents[rentsId].total_bill;
    rent_id = rentId;
}

function onUpdateRent(e) {
    e.preventDefault();
    const formData = new FormData(document.getElementById("rent_form"));
    const data = new URLSearchParams(formData);
    data.append("rent_id", rent_id);
    fetch("../../php/update_rent.php", {
        method: 'POST',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            if (data.status == 200) {
                const modal = bootstrap.Modal.getInstance(document.getElementById('rent_popup'));
                modal.hide();
                document.getElementById("rent_form").reset();
                loadPage(1);
            }
        })
        .catch(err => console.error("Failed to update rent:", err));
}

function onUpdateBill(e) {
    e.preventDefault();
    const formData = new FormData(document.getElementById("bill_form"));
    const data = new URLSearchParams(formData);
    data.append("rent_id", rent_id);
    fetch("../../php/update_bill.php", {
        method: 'POST',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            if (data.status == 200) {
                const modal = bootstrap.Modal.getInstance(document.getElementById('bill_popup'));
                modal.hide();
                document.getElementById("bill_form").reset();
                loadPage(1);
            }
        })
        .catch(err => console.error("Failed to update bill:", err));
}

document.addEventListener('DOMContentLoaded', () => {
    loadPage(1);
});
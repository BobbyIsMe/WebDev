let totalPage = 1;
let email = "";
let contact_number = "";
let room_id = "";
let stat = "";
let check_in_date = "";
let due_date = "";
let page = 1;
let query = "";
let rent_id = 0;
$rents = [];

function refreshFilter() {      
    email = "";
    contact_number = "";
    room_id = "";
    stat = "";
    check_in_date = "";
    due_date = "";
}

function onSubmit(e) {
    e.preventDefault();
    refreshFilter();
    const form = document.getElementById("filter-form");
    const formData = new FormData(form);
    email = formData.get("email");
    contact_number = formData.get("contact_number");
    room_id = formData.get("room_id");
    stat = formData.get("status");
    check_in_date = formData.get("check_in_date");
    due_date = formData.get("due_date");
    loadPage(page);
}

document.getElementById("recent").addEventListener("click", function (event) 
{   event.preventDefault();
    document.getElementById("filter-form").reset();
    refreshFilter();
    loadPage(page);
});

document.getElementById("statusDropdown").addEventListener("change", function () {
    refreshFilter();
    document.getElementById("filter-form").reset();
    const selectedValue = this.value;
    stat = selectedValue;

    loadPage(page);
});

document.getElementById("prev_button").addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        loadPage(currentPage);
    }
});

document.getElementById("next_button").addEventListener("click", () => {
    if (currentPage < totalPages) {
        currentPage++;
        loadPage(currentPage);
    }
});

function loadPage(page) {
    if (!empty(email)) query += `&email=${email}`;
    if (!empty(contact_number)) query += `&contact_number=${contact_number}`;
    if (!empty(room_id)) query += `&room_id=${room_id}`;
    if (!empty(stat)) query += `&status=${stat}`;
    if (!empty(check_in_date)) query += `&check_in_date=${check_in_date}`;
    if (!empty(due_date)) query += `&due_date=${due_date}`;

    fetch(`../../php/get_rents.php?page=${page}${query}`)
        .then(res => res.json())
        .then(data => {
            const rents = data.rents;
            const tableBody = document.getElementById("rent-list");
            tableBody.innerHTML = ""; // Clear existing rows

            rents.forEach(rent => {
                rents = {
                    ["rent_id"]: rent.rent_id,
                    ["name"]: rent.name,
                    ["email"]: rent.email,
                    ["contact_number"]: rent.contact_number,
                    ["room_id"]: rent.room_id
                };
                tableBody.innerHTML += `
                <div class="col-12" style="border-top: 1px solid black; border-bottom:  1px solid black;">

                            <div class="row">
                                <div class="col-6 p-5" style="border-right: 1px solid black ;">
                                    <div class="row">
                                        <div class="col-6 my-auto">
                                            Rent Details
                                        </div>

                                        <div class="col-6 d-flex justify-content-end ">
                                            <button id="btnEdit" class="btn" type="button" data-bs-toggle="modal"
                                                data-bs-target="#rent_popup" onclick="onEditRent(${rent.rent_id})">
                                                Edit Rent
                                            </button>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="container-fluid">
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
                                            <div class="row col-12 mx-auto container-fluid">
                                                <div class="col-5 container-fluid ">
                                                    <br>
                                                    <label for="check_in_date" class="form-label">Check-in Date</label>
                                                    <input type="text" readonly
                                                        class="form-control-plaintext border bg-light px-2"
                                                        id="check_in_date" value=${rent.check_in_date}>
                                                </div>
                                                <div class="col-2 container-fluid">
                                                </div>
                                                <div class="col-5 container-fluid">
                                                    <br>
                                                    <label for="due_date" class="form-label">Due Date</label>
                                                    <input type="text" readonly
                                                        class="form-control-plaintext border bg-light px-2"
                                                        id="due_date" value=${rent.due_date}>
                                                </div>
                                                <div class="col-5 container-fluid ">
                                                    <br>
                                                    <label for="status" class="form-label">Status</label>
                                                    <input type="text" readonly
                                                        class="form-control-plaintext border bg-light px-2" id="status"
                                                        value=${rent.status}>
                                                </div>
                                                <div class="col-2 container-fluid">
                                                </div>
                                                <div class="col-5 container-fluid">
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
                                                    data-bs-target="#bill_popup" onclick="onEditBill(${rent.rent_id})">
                                                    Edit Bill
                                                </button>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="container-fluid">
                                                <div class="row col-12 mx-auto container-fluid">

                                                    <div class="col-5 container-fluid ">
                                                        <br>
                                                        <label for="electricity_bill" class="form-label">Electricity
                                                            Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="electricity_bill" value=" ">
                                                    </div>

                                                    <div class="col-2 container-fluid"><br></div>

                                                    <div class="col-5 container-fluid">
                                                        <br>
                                                        <label for="miscellaneous_bill" class="form-label">Miscellaneous
                                                            Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="miscellaneous_bill" value=" ">
                                                    </div>

                                                    <div class="col-5 container-fluid ">
                                                        <br>
                                                        <label for="rent_bill" class="form-label">Rent Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="rent_bill" value=" ">
                                                    </div>

                                                    <div class="col-2 container-fluid"><br></div>

                                                    <div class="col-5 container-fluid">
                                                        <br>
                                                        <label for="total_bill" class="form-label">Total Bill</label>
                                                        <input type="text" readonly
                                                            class="form-control-plaintext border bg-light px-2"
                                                            id="total_bill" value=" ">
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            });
            document.getElementById("pageInfo").textContent = `Page ${page} of ${totalPages}`;
            document.getElementById("prevButton").disabled = (page === 1);
            document.getElementById("nextButton").disabled = (page === totalPages);
        })
        .catch(err => console.error("Failed to fetch rents:", err));
}

function onEditRent(rentId) {
    rent_id = rentId;
}

function onEditBill(rentId) {
    rent_id = rentId;
}

function onUpdateRent(e) {
    e.preventDefault();
    const formData = new FormData(document.getElementById("rent-form"));
    const data = new URLSearchParams(formData);
    data.append("rent_id", rent_id);
    fetch("../../php/update_rent.php", {
        method: 'POST',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
        })
        .catch(err => console.error("Failed to update rent:", err));
}

function onUpdateRent(e) {
    e.preventDefault();
    const formData = new FormData(document.getElementById("bill-form"));
    const data = new URLSearchParams(formData);
    data.append("rent_id", rent_id);
    fetch("../../php/update_bill.php", {
        method: 'POST',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
        })
        .catch(err => console.error("Failed to update bill:", err));
}


document.addEventListener('DOMContentLoaded', () => {
    loadPage(page);
});
<?php
session_start();
if (!isset($_SESSION["user_id"]) && !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] == 0) {
    header("Location: ../Signin/Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matias BH | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/Profile/profile.css">
    <link rel="stylesheet" href="../../css/navbar.css" />
    <link rel="stylesheet" href="../../css/Profile/admin.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>

    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <div class="topnav">
        <nav class="navbar navbar-expand-lg border-bottom w-100 p-3">
            <div class="container-fluid">
                <div class="collapse navbar-collapse d-flex align-items-center" id="navbarContent">
                    <div class="me-auto">
                        <img src="../../img/MatiasBH.png" alt="LOGO" />
                    </div>
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link me-5 fw-bold" href="../Webpages/home.php">HOME</a>
                        <a class="nav-link me-5" href="../Webpages/rooms.php">ROOMS</a>
                        <a class="nav-link me-5" href="../Webpages/FAQ.php">FAQ'S</a>
                        <a class="nav-link me-5" href="../Webpages/ContactUs.php">CONTACT US</a>
                        <a class="nav-link me-5" href="../Webpages/About.php">ABOUT US</a>
                    </div>

                    <div class="dropdown ms-auto">
                        <button id="profileDropdown" class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" id="personalDetailsLink"
                                href="../Profilepage/PersonalDetails.php">Personal Details</a>
                            <a class="dropdown-item" id="rentedRoomLink" href="../Profilepage/RentedRoom.php">Rented
                                Room</a>
                            <?php
                            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                                <a class="dropdown-item" id="adminLink" href="../Profilepage/Admin.php">Admin</a>
                            <?php endif; ?>
                            <a class="dropdown-item" id="authLink" href="#" onclick="signoutClick(event)">Logout</a>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-light border-end min-vh-100 p-3">
                <div class="nav flex-column ">
                    <a class="nav-link " href="PersonalDetails.php">Personal Details</a>
                    <a class="nav-link" href="RentedRoom.php">Rented Room</a>
                    <?php
                    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                        <a class="nav-link fw-bold active" href="Admin.php">Admin</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-10">
                <div class="col-12 p-5">
                    <div class="adminBody">
                        <div class="d-flex align-items-center">
                            <button id="recent" class="btn adminBtn active" type="button">
                                Recent
                            </button>
                            |
                            <div class="dropdown">
                                <select class="form-select border-0" id="status_dropdown" name="rent_status" required>
                                    <option value="status">Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                            |
                            <button id="filter_button" class="btn adminBtn" type="button" data-bs-toggle="modal"
                                data-bs-target="#filter_popup">
                                Filter
                            </button>
                        </div>
                        <br>

                        <!---Admin Body Page-->
                        <div id="rent-list">

                        </div>

                    </div>
                    <div>
                        <br>
                        <div class="col-12 d-flex justify-content-center align-items-center gap-5">
                            <button class="navButton" type="button" id="prev_button">
                                Previous
                            </button>
                            <span>|</span>
                            <div id="page_number" class="paragraphs">
                                Page # out of 10
                            </div>
                            <span>|</span>
                            <button class="navButton" type="button" id="next_button">

                                Next
                            </button>
                        </div>


                    </div>

                </div>
            </div>



            <script type="text/javascript" src="../../js/session.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
                crossorigin="anonymous"></script>

            <!--edit rent-->
            <div class="modal fade" id="rent_popup" tabindex="-1" aria-labelledby="rent_popup" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rent_header">Edit Rent Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="rent_form" method="POST" onsubmit="onUpdateRent(event)">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" readonly
                                        class="paragraphs form-control form-control-plaintext border bg-light px-2" id="rent_name"
                                        value="">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" readonly
                                        class="paragraphs form-control form-control-plaintext border bg-light px-2" id="rent_email"
                                        value="">
                                </div>
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" readonly
                                        class="paragraphs form-control form-control-plaintext border bg-light px-2"
                                        id="rent_contact_number" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="paragraphs form-select" id="rent_status" name="status" required>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="rejected">Rejected</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="boarder_type" class="form-label">Boarder Type</label>
                                    <select class="paragraphs form-select" id="rent_boarder_type" name="boarder_type" required>
                                        <option value="single">Single</option>
                                        <option value="double">Double</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="check_in_date" class="form-label">Check-in Date</label>
                                    <input type="date" class="paragraphs form-control" id="rent_check_in_date" name="check_in_date"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" class="paragraphs form-control" id="rent_due_date" name="due_date" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--edit bill-->
            <div class="modal fade" id="bill_popup" tabindex="-1" aria-labelledby="bill_popup" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bill_header">Edit Bill Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="bill_form" method="POST" onsubmit="onUpdateBill(event)">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" readonly
                                        class="paragraphs form-control form-control-plaintext border bg-light px-2" id="bill_name"
                                        value="">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" readonly
                                        class="paragraphs form-control form-control-plaintext border bg-light px-2" id="bill_email"
                                        value="">
                                </div>

                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" readonly
                                        class="paragraphs form-control form-control-plaintext border bg-light px-2"
                                        id="bill_contact_number" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="electricity_bill" class="form-label">Electricity Bill</label>
                                    <input type="text" class="paragraphs form-control form-control-plaintext border  px-2"
                                        id="bill_electricity_bill" value="" name="electricity_bill">
                                </div>
                                <div class="mb-3">
                                    <label for="miscellaneous_bill" class="form-label">Miscellaneous Bill</label>
                                    <input type="text" class="paragraphs form-control form-control-plaintext border  px-2"
                                        id="bill_miscellaneous_bill" value="" name="miscellaneous_bill">
                                </div>

                                <div class="mb-3">
                                    <label for="rent_bill" class="form-label">Rent Bill</label>
                                    <input type="text" class="paragraphs form-control form-control-plaintext border  px-2"
                                        id="bill_rent_bill" value="" name="rent_bill">
                                </div>

                                <div class="mb-3">
                                    <label for="total_bill" class="form-label">Total Bill</label>
                                    <input type="text" class="paragraphs form-control form-control-plaintext border px-2"
                                        id="bill_total_bill" value="" name="total_bill">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <!--edit filter-->
            <div class="modal fade" id="filter_popup" tabindex="-1" aria-labelledby="filter_popup" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filter_label">Filter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="filter_form" method="GET" onsubmit="onSubmit(event)">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="paragraphs form-control form-control-plaintext border  px-2"
                                        id="filter_email" value="" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" class="paragraphs form-control form-control-plaintext border  px-2"
                                        id="filter_contact_number" value="" name="contact_number">
                                </div>
                                <div class="mb-3">
                                    <label for="room_num" class="form-label">Room</label>
                                    <select class="paragraphs form-select" id="room_num" name="room_id">
                                        <option value="">Select Room</option>
                                        <option value="1">Room 1</option>
                                        <option value="2">Room 2</option>
                                        <option value="3">Room 3</option>
                                        <option value="4">Room 4</option>
                                        <option value="5">Room 5</option>
                                        <option value="6">Room 6</option>
                                        <option value="7">Room 7</option>
                                        <option value="8">Room 8</option>
                                        <option value="9">Room 9</option>
                                        <option value="10">Room 10</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="paragraphs form-select" id="filter_status" name="status">
                                        <option value="">Select Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="boarder_type" class="form-label">Boarder Type</label>
                                    <select class="paragraphs form-select" id="filter_boarder_type" name="boarder_type">
                                        <option value="">Select Boarder Type</option>
                                        <option value="Single">Single</option>
                                        <option value="Double">Double</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="check_in_date" class="form-label">Check-in Date</label>
                                    <input type="date" class="paragraphs form-control" id="filter_check_in_date"
                                        name="check_in_date">
                                </div>
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" class="paragraphs form-control" id="filter_dueDate" name="due_date">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="../../js/rents_controller.js"></script>
</body>

</html>
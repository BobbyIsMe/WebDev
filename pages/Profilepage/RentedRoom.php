<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/Webpage/landingpage.css">
    <link rel="stylesheet" href="../../css/navbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>
    <script type="text/javascript" src="../../js/rented_rooms_details.js"></script>

    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>

<body>

    <div class="topnav">
        <nav class="navbar navbar-expand-lg border-bottom w-100 p-3">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarContent">
                    <a class="navbar-brand me-auto fs-3 fw-bold" href="#"><b>LogoName</b></a>

                    <div class="navbar-nav mx-auto">
                        <a class="nav-link me-5" href="../Webpages/home.php">Home</a>
                        <a class="nav-link me-5" href="../Webpages/rooms.php">Rooms</a>
                        <a class="nav-link me-5" href="../Webpages/FAQ.php">FAQ's</a>
                        <a class="nav-link me-5" href="../Webpages/ContactUs.php">Contact Us</a>
                        <a class="nav-link me-5" href="../Webpages/About.php">About Us</a>
                    </div>

                    <div class="dropdown ms-auto">
                        <button id="profileDropdown" class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" id="personalDetailsLink" href="PersonalDetails.php">Personal
                                Details</a>
                            <a class="dropdown-item" id="rentedRoomLink" href="RentedRoom.php">Rented Room</a>
                            <?php session_start();
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
                        <a class="nav-link fw-bold" href="Admin.php">Admin</a>
                    <?php endif; ?>
                </div>
            </div>


            <div class="col-md-10 p-4">
                <div class="col-9 mx-auto">
                    <div class="mb-4 border text-center" style="height: 200px;">
                        <p class="pt-5">Image Placeholder</p>
                    </div>


                    <h5 id="room-id">Loading room number...</h5>
                    <p id="description"><strong>Loading room description...</strong></p>

                    <form>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="checkInDate" class="form-label">Check-in Date</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="check-in-date" value=" ">
                            </div>
                            <div class="col-md-6">
                                <label for="dueDate" class="form-label">Due Date</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="due-date" value=" ">
                            </div>

                            <div class="col-md-6">
                                <label for="boarder_type" class="form-label">Boarder Type</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="boarder_type" value=" ">
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="status" value=" ">
                            </div>
                        </div>


                        <div class="border p-3 mt-4">
                            <h5>Billing Details</h5>
                            <div class="mb-3">
                                <label for="electricity-bill" class="form-label">Electric Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="electricity-bill" value="">
                            </div>
                            <div class="mb-3">
                                <label for="miscBill" class="form-label">Miscellaneous Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="miscellaneous-bill" value="">
                            </div>
                            <div class="mb-3">
                                <label for="rentBill" class="form-label">Rent Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="rent-bill" value="">
                            </div>
                            <div class="mb-3">
                                <label for="totalBill" class="form-label">Total Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="total-bill" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                </div>
            </div>

            <script type="text/javascript" src="../../js/session.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
                crossorigin="anonymous"></script>
</body>

</html>
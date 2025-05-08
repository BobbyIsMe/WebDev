<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="css/landingpage.css">
        <link rel="stylesheet" href="css/navbar.css"/>

    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg border-bottom w-100" style="background-color: #f8b6b6;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarContent">
                <a class="navbar-brand me-auto fs-3 fw-bold" href="#"><b>LogoName</b></a>

                <div class="navbar-nav mx-auto">
                    <a class="nav-link me-5" href="home.html">Home</a>
                    <a class="nav-link me-5" href="rooms.html">Rooms</a>
                    <a class="nav-link me-5" href="FAQ.html">FAQ's</a>
                    <a class="nav-link me-5" href="ContactUs.html">Contact Us</a>
                    <a class="nav-link me-5" href="About.html">About Us</a>
                </div>

                <div class="dropdown ms-auto">
                    <button id="profileDropdown" class="btn btn-outline-secondary dropdown-toggle" type="button"
                        data-bs-toggle="dropdown">
                        Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="PersonalDetails.html">Personal Details</a>
                        <a class="dropdown-item" href="RentedRoom.html">Rented Room</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </ul>



                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2 bg-light border-end min-vh-100 p-3">
                <div class="nav flex-column">
                    <a class="nav-link">Personal Details</a>
                    <a class="nav-link fw-bold">Rented Room</a>
                </div>
            </div>


            <div class="col-md-10 p-4">
                <div class="col-9 mx-auto">
                    <div class="mb-4 border text-center" style="height: 200px;">
                        <p class="pt-5">Image Placeholder</p>
                    </div>


                    <h5>Room #.</h5>
                    <p><strong>Description about the place</strong></p>

                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="checkInDate" class="form-label">Check-in Date</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="checkInDate" value="" placeholder="March 1, 2024">
                            </div>
                            <div class="col-md-6">
                                <label for="dueDate" class="form-label">Due Date</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="dueDate" value="" placeholder="April 1, 2024">
                            </div>
                        </div>


                        <div class="border p-3 mt-4">
                            <h5>Billing Details</h5>
                            <div class="mb-3">
                                <label for="electricBill" class="form-label">Electric Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="electricBill" value="" placeholder="PHP 155.01">
                            </div>
                            <div class="mb-3">
                                <label for="miscBill" class="form-label">Miscellaneous Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="miscBill" value="" placeholder="PHP 500.00">
                            </div>
                            <div class="mb-3">
                                <label for="rentBill" class="form-label">Rent Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="rentBill" value="" placeholder="PHP 3000.00">
                            </div>
                            <div class="mb-3">
                                <label for="totalBill" class="form-label">Total Bill</label>
                                <input type="text" readonly class="form-control-plaintext border bg-light px-2"
                                    id="totalBill" value="" placeholder="PHP 3655.01">
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                </div>
            </div>

            <script>
                const profileDropdown = document.getElementById("profileDropdown");
        
                profileDropdown.addEventListener("click", function () {
                    profileDropdown.classList.toggle("active");
                });
        
                document.addEventListener('click', function (event) {
                    if (!profileDropdown.contains(event.target)) {
                        profileDropdown.classList.remove('active');
                    }
                });
        
            </script>
        
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
                crossorigin="anonymous"></script>
</body>

</html>
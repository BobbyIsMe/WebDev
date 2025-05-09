<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/About.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/auth.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg border-bottom w-100" style="background-color: #f8b6b6;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarContent">
                <a class="navbar-brand me-auto fs-3 fw-bold" href="#"><b>LogoName</b></a>

                <div class="navbar-nav mx-auto">
                    <a class="nav-link me-5" href="home.php">Home</a>
                    <a class="nav-link me-5" href="rooms.php">Rooms</a>
                    <a class="nav-link me-5" href="FAQ.php">FAQ's</a>
                    <a class="nav-link me-5" href="ContactUs.php">Contact Us</a>
                    <a class="nav-link me-5" href="About.php">About Us</a>
                </div>

                <div class="dropdown ms-auto">
                    <button id="profileDropdown" class="btn btn-outline-secondary dropdown-toggle" type="button"
                        data-bs-toggle="dropdown">
                        Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" id="personalDetailsLink" href="PersonalDetails.php">Personal Details</a>
                        <a class="dropdown-item" id="rentedRoomLink" href="RentedRoom.php">Rented Room</a>
                        <a class="dropdown-item" id="authLink" href="#" onclick="signoutClick(event)">Logout</a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section class="about-us">
            <div class="about-container">
                <div class="about-text">
                    <h1>About Us</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                </div>
                <div class="about-image">
                    <p>Image Placeholder</p>
                </div>
            </div>
        </section>
    </main>

</body>

<script type="text/javascript" src="../js/session.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>

</html>
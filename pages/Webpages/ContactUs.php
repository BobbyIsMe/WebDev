<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matias BH | ContactUs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/Webpage/ContactUs.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/auth.js"></script>
</head>

<body>

    <div class="topnav">
        <nav class="navbar navbar-expand-lg border-bottom w-100 p-3">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarContent">
                    <a class="navbar-brand me-auto fs-3 fw-bold" href="#"><b>LogoName</b></a>

                    <div class="navbar-nav mx-auto">
                            <a class="nav-link me-5" href="home.php">HOME</a>
                            <a class="nav-link me-5" href="rooms.php">ROOMS</a>
                            <a class="nav-link me-5" href="FAQ.php">FAQ'S</a>
                            <a class="nav-link me-5 text-white fw-bold" href="ContactUs.php">CONTACT US</a>
                            <a class="nav-link me-5" href="About.php">ABOUT US</a>
                    </div>

                    <div class="dropdown ms-auto">
                        <button id="profileDropdown" class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" id="personalDetailsLink" href="../Profilepage/PersonalDetails.php">Personal Details</a>
                            <a class="dropdown-item" id="rentedRoomLink" href="../Profilepage/RentedRoom.php">Rented Room</a>
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




    <section class="contact-section">
        <h2 style="font-size: 35px;">Contact Us</h2>
        <br>
        <div class="contact-container">
            <div class="contact-box">
                <h3>Location</h3>
                <div class="location-img">Image Placeholder</div>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua...</p>
            </div>
            <div class="contact-box">
                <div class="contact-item">
                    <div class="icon">Image Placeholder</div>
                    <p><strong>+63915-351-0286</strong></p>
                </div>
                <div class="contact-item">
                    <div class="icon">Image Placeholder</div>
                    <p>Michelle P. Matias</p>
                </div>
                <div class="contact-item">
                    <div class="icon">Image Placeholder</div>
                    <p>Mich-cNorma Matias</p>
                </div>
                <div class="contact-item">
                    <div class="icon">Image Placeholder</div>
                    <p>mmatias07091@gmail.com</p>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
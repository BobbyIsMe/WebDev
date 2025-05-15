<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matias BH | ContactUs</title>
    <link rel="icon" href="../../img/favicon.png" type="image/png">
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

<div class="topnav">
    <nav class="navbar navbar-expand-lg border-bottom w-100 p-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="me-auto">
                    <img src="../../img/MatiasBH.png" alt="LOGO" />
                </div>
                <div class="navbar-nav mx-auto">
                    <a class="nav-link me-5" href="home.php">HOME</a>
                    <a class="nav-link me-5" href="rooms.php">ROOMS</a>
                    <a class="nav-link me-5" href="FAQ.php">FAQ'S</a>
                    <a class="nav-link me-5 fw-bold" style="color:rgba(14, 131, 117, 0.69);" href="ContactUs.php">CONTACT US</a>
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



<body>
    <div class="fadeIn">
        <section class="contact-section">
            <h2 style="font-size: 35px;">Contact Us</h2>
            <br>
            <div class="contact-container">
                <div class="contact-box">
                    <h3>Location</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!4v1747318444247!6m8!1m7!1sQRrrwKXYhGw1ExIjiDurog!2m2!1d10.33291470906647!2d123.9020951897359!3f332.2747204050012!4f3.5072753560243797!5f0.7820865974627469" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <br>
                    <a href="https://maps.app.goo.gl/UZoLAGcAh7peprJ47" style="text-decoration: none;">
                        <h4>Redirect to Google Maps</h4>
                    </a>
                </div>

                <div class="contact-box">
                    <br>
                    <div class="contact-item">
                        <img src="../../img/Phone Logo.png" class="icon"></img>
                        <p><strong>+63915-351-0286</strong></p>
                    </div>
                    <br>
                    <div class="contact-item">
                        <img src="../../img/MatiasBH_crop.png" class="icon"></img>
                        <p>Michelle P. Matias</p>
                    </div>
                    <br>
                    <div class="contact-item">
                        <img src="../../img/Facebook Logo.png" class="icon"></img>
                        <p>Mich-cNorma Matias</p>
                    </div>
                    <br>
                    <div class="contact-item">
                        <img src="../../img/Gmail Logo.png" class="icon"></img>
                        <p>mmatias07091@gmail.com</p>
                    </div>
                </div>
        </section>
    </div>

    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
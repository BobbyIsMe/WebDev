<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matias BH | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/Webpage/Home.css">
    <link rel="stylesheet" href="../../css/navbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>

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
                <div class="collapse navbar-collapse d-flex align-items-center" id="navbarContent">
                    <div class="me-auto">
                        <img src="../../img/MatiasBH.png" alt="LOGO" />
                    </div>
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link me-5 fw-bold" style="color: rgba(14, 131, 117, 0.69);" href="home.php">HOME</a>
                        <a class="nav-link me-5" href="rooms.php">ROOMS</a>
                        <a class="nav-link me-5" href="FAQ.php">FAQ'S</a>
                        <a class="nav-link me-5" href="ContactUs.php">CONTACT US</a>
                        <a class="nav-link me-5" href="About.php">ABOUT US</a>
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

    <header>

        <div class="main-image">
            <img src="../../img/homepage1.png" alt="bembi">
        </div>
    </header>

    <!--footer
    <p>Matias Boarding House - Serving Rooms since 2010</p>
    <br>------>

    <div style="padding-top: 2vw;">
        <div class="container-fluid navFoot">
            Boarding Cebuanos and Alike - 2011
        </div>
    </div>

    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>



</html>
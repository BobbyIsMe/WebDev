<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House</title>
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
                <div class="collapse navbar-collapse" id="navbarContent">
                    <a class="navbar-brand me-auto fs-3 fw-bold" href="#"><b>LogoName</b></a>

                    <div class="navbar-nav mx-auto">
                        <a class="nav-link me-5 text-white fw-bold" href="home.php">HOME</a>
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
    <div style="padding: 2vw;">
        <header>
            <br>
            <div class="main-image">
                <img src="../../img/m1.png" alt="bembi">
            </div><br>
            <p>Matias Boarding House - Serving Rooms since 2010</p>
            <br>
        </header>

        <section class="rooms-showcase">
            <br>
            <h2>ROOMS SHOWCASE</h2><br><br>
            <div class="room-images">
                <div class="room-placeholder">
                    <div>
                        <img src="../../img/rp-1.jpg" alt="bembi">
                    </div>
                </div>

                <div class="room-placeholder">
                    <div>
                        <img src="../../img/rp-2.jpg" alt="bembi">
                    </div>
                </div>

                <div class="room-placeholder">
                    <div>
                        <img src="../../img/rp-3.jpg" alt="bembi">
                    </div>
                </div>
            </div>

            <br>
        </section>



        <div class="col-12 row navFoot mx-auto">
            <div class="col-6 navBox " style="border-right: 1px solid black">
                <section class="reservation-steps ">
                    <h2>RESERVATION STEPS</h2>
                    <p class="paragraphs">
                        1. Create an account
                        <br>
                        2. Sign In
                        <br>
                        3. Navigate to the rooms section
                        <br>
                        4. Select the room you want to avail
                        <br>
                        5. Fill in the details, and Reserve!
                        <br>
                    </p>
                </section>
            </div>
            <div class="col-6 navBox">
                <div class="map-placeholder">
                    <div>
                        <img src="../../img/mapArrow.png" alt="bembi">
                    </div>
                </div>
                <br>
                <a href="https://maps.app.goo.gl/bkQG8VRU2HgTdWMg8" class="map-button" target="_blank">Click for Google
                    Map link</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
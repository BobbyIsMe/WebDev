<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms | Boarding House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/Webpage/reservation.css">
    <link rel="stylesheet" href="../../css/navbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>
    <script type="text/javascript" src="../../js/rent_room.js"></script>

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
                        <a class="nav-link me-5" href="home.php">HOME</a>
                        <a class="nav-link me-5 text-white fw-bold" href="rooms.php">ROOMS</a>
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

    <section class="room-details">
        <div class="room-info">
            <h2 id="room-num">Room #.</h2>
            <p id="description">Description about the place</p>

            <form id="room-form" method="post" onsubmit="rentSubmit(event)">
                <div class="form-row">
                    <div class="form-group">
                        <label>Room No.</label>
                        <select id="room-dropdown" name="room_id">
                            <option>Choose Room</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Boarder Type</label>
                        <select id="boarder-type" name="boarder_type">
                            <option>Select Type</option>
                            <option>Single</option>
                            <option>Double</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Available</label>
                        <input id="room-status" type="text" disabled value="Yes/No" class="disabled-field">
                    </div>
                </div>
                <button type="submit" class="button">Reserve</button>
            </form>
            <p class="paragraphs" id="message">
            </p>
        </div>


        <div class="room-images">
            <div class="main-image">
                <!-- These should be your actual room images -->
                <img src="../../img/test-image.jpg" alt="Room Image 1" class="active">
                <img src="../../img/test-image2.jpg" alt="Room Image 2">
                <img src="../../img/test-image3.jpg" alt="Room Image 3">
            </div>

            <div class="slideshow">
                <button class="prev">&lt;</button>

                <div class="small-image active-thumb">
                    <img src="../../img/test-image.jpg" alt="Room Thumbnail 1">
                </div>
                <div class="small-image">
                    <img src="../../img/test-image2.jpg" alt="Room Thumbnail 2">
                </div>
                <div class="small-image">
                    <img src="../../img/test-image3.jpg" alt="Room Thumbnail 3">
                </div>

                <button class="next">&gt;</button>
            </div>
        </div>

    </section>

    <section class="reviews">
        <h2>Reviews</h2>
        <div class="review-container">
            <div class="review-box"></div>
            <div class="review-box"></div>
            <div class="review-box"></div>
            <div class="review-box"></div>
            <div class="review-box"></div>
            <div class="review-box"></div>
            <div class="review-box"></div>
        </div>
    </section>

    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/rooms_image-slider.js"></script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms | Boarding House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/reservation.css">
    <link rel="stylesheet" href="../css/navbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/auth.js"></script>
    <script type="text/javascript" src="../js/rent_room.js"></script>

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
                <br><br>
                <button type="submit" class="button">Reserve</button>
            </form>
        </div>

        <div class="room-images">
            <br><br>
            <div class="main-image">Image Placeholder</div>
            <br>
            <div class="slideshow">
                <button class="prev">&larr;</button>
                <div class="small-image">Image</div>
                <div class="small-image">Image</div>
                <button class="next">&rarr;</button>
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

    <script type="text/javascript" src="../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

</body>

</html>
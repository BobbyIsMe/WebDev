<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matias BH | Rooms</title>
    <link rel="icon" href="../../img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/Webpage/rooms.css">
    <link rel="stylesheet" href="../../css/Profile/admin.css">
    <link rel="stylesheet" href="../../css/navbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>
    <script type="text/javascript" src="../../js/rent_room.js"></script>

    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            overflow: hide;
        }
    </style>
</head>
<div class="topnav">
    <nav class="navbar navbar-expand-lg border-bottom w-100 p-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse  d-flex align-items-center" id="navbarContent">
                <div class="me-auto">
                    <img src="../../img/MatiasBH.png" alt="LOGO" />
                </div>


                <div class="navbar-nav mx-auto">
                    <a class="nav-link me-5" href="home.php">HOME</a>
                    <a class="nav-link me-5 fw-bold" style="color:rgba(14, 131, 117, 0.69);" href="rooms.php">ROOMS</a>
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

<body>
    <div class="fadeIn">
        <section class="col-12 room-details gap-3">

            <div class="col-6 p-4">
                <div class="room-info col-12">
                    <div class="col-12 column p-5 roomdc">
                        <div class="description">
                            <h2 id="room-num">Room #.</h2>

                            <p id="description">
                                Description about the place
                            </p>
                        </div>
                        <form id="room-form" method="post" onsubmit="rentSubmit(event)">
                            <div class="row">
                                <div class="col-4  p-3">
                                    <div class="form-row">
                                        <div class="form-group ">
                                            <label>Room No.</label>
                                            <select id="room-dropdown" name="room_id">
                                                <option>Choose Room</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-4  p-3">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>Boarder Type</label>
                                            <select id="boarder-type" name="boarder_type">
                                                <div class="choices">
                                                    <option>Select Type</option>
                                                    <option>Single</option>
                                                    <option>Double</option>
                                                </div>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4  p-3 d-flex align-items-center">
                                    <div class="form-group w-100">
                                        <label>Available</label>
                                        <input id="room-status" type="text" disabled value="Yes/No"
                                            class="disabled-field w-100">
                                    </div>
                                </div>

                                <div class="col-12 p-3 d-flex justify-content-center">
                                    <button type="submit" id="reserve" class="button">Reserve</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <p class="paragraphs" id="message">
                    </p>
                </div>
            </div>


            <div class="col-5 imgshow ">

                <div class="room-images">
                    <div class="main-image">

                        <img src="../../img/rooms/1.jpg" alt="Room Image 1" class="active">
                        <img src="../../img/rooms/2.jpg" alt="Room Image 2">
                        <img src="../../img/rooms/3.jpg" alt="Room Image 3">
                        <img src="../../img/rooms/4.jpg" alt="Room Image 4">
                        <img src="../../img/rooms/5.jpg" alt="Room Image 5">
                        <img src="../../img/rooms/6.jpg" alt="Room Image 6">
                        <img src="../../img/rooms/7.jpg" alt="Room Image 7">
                        <img src="../../img/rooms/8.jpg" alt="Room Image 8">
                        <img src="../../img/rooms/9.jpg" alt="Room Image 9">
                        <img src="../../img/rooms/10.jpg" alt="Room Image 10">
                    </div>

                    <div class="slideshow">
                        <button class="prev">&lt;</button>

                        <div class="small-image active-thumb">
                            <img src="../../img/rooms/1.jpg" alt="Room Thumbnail 1">
                        </div>

                        <div class="small-image">
                            <img src="../../img/rooms/4.jpg" alt="Room Thumbnail 4">
                        </div>

                        <div class="small-image">
                            <img src="../../img/rooms/8.jpg" alt="Room Thumbnail 8">
                        </div>



                        <button class="next">&gt;</button>
                    </div>
                </div>
            </div>



        </section>

        <div class="reviews">
            <div class="col-9">

                <h2>Reviews</h2>
                <div class="controls">
                    <select class="dropdown" id="ratings" style="border-top:1px solid black">
                        <option value="select">Sort by rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <select class="dropdown" id="rooms" style="border-top:1px solid black">
                        <option value="select">Sort by room</option>
                    </select>
                    <select class="dropdown" id="orders" style="border-top:1px solid black">
                        <option value="select">Sort by order</option>
                        <option value="desc">Latest</option>
                        <option value="asc">Oldest</option>
                    </select>
                </div>
                <div id="reviews-list">

                </div>
                <div class="d-flex justify-content-center">
                    <div class="p-4 d-flex justify-content-center align-items-center gap-4">
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
    </div>
    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/reviews_display.js"></script>
    <script type="text/javascript" src="../../js/rooms_image-slider.js"></script>
</body>

</html>
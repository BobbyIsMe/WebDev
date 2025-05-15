<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../Signin/Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matias BH | Personal Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/Profile/profile.css">
    <link rel="stylesheet" href="../../css/navbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>
    <script type="text/javascript" src="../../js/personal_details.js"></script>

    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .stars {
            display: flex;
            cursor: pointer;
        }

        .star {
            font-size: 2rem;
            color: gray;
            transition: color 0.2s;
        }

        .star.selected {
            color: gold;
        }

        .star:hover,
        .star.hovered {
            color: gold;
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
                        <a class="nav-link me-5 fw-bold" href="../Webpages/home.php">HOME</a>
                        <a class="nav-link me-5" href="../Webpages/rooms.php">ROOMS</a>
                        <a class="nav-link me-5" href="../Webpages/FAQ.php">FAQ'S</a>
                        <a class="nav-link me-5" href="../Webpages/ContactUs.php">CONTACT US</a>
                        <a class="nav-link me-5" href="../Webpages/About.php">ABOUT US</a>
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
                            <?php
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
                    <a class="nav-link active" href="PersonalDetails.php">Personal Details</a>
                    <a class="nav-link" href="RentedRoom.php">Rented Room</a>
                    <?php
                    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                        <a class="nav-link fw-bold" href="Admin.php">Admin</a>
                    <?php endif; ?>
                </div>
            </div>


            <div class="col-md-10 p-4">
                <div class="col-9 mx-auto">


                    <h5 id="date-created"> </h5>
                    <br>

                    <form>
                        <div class="row gap-3">


                            <div class="col-md-10">
                                <label for="Email" class="form-label">Email</label>
                                <input type="text" readonly
                                    class="paragraphs form-control-plaintext border bg-light px-2" id="email" value=" ">
                            </div>
                            <div class="col-md-10">
                                <br>
                                <label for="Name" class="form-label">Name</label>
                                <input type="text" readonly
                                    class="paragraphs form-control-plaintext border bg-light px-2" id="name" value=" ">
                            </div>

                            <div class="col-md-10">
                                <br>
                                <label for="Contactnumber" class="form-label">Contact Number</label>
                                <input type="text" readonly
                                    class="paragraphs form-control-plaintext border bg-light px-2" id="contact-number"
                                    value=" ">
                            </div>
                        </div>
                    </form>
                    <div class="col-5">
                        <div class="review-container">
                            <h2 id="room_id">Loading Room...</h2>

                            <div class="review-header">
                                <div class="stars" id="starRating">
                                    <span class="star" data-value="1">&#9733;</span>
                                    <span class="star" data-value="2">&#9733;</span>
                                    <span class="star" data-value="3">&#9733;</span>
                                    <span class="star" data-value="4">&#9733;</span>
                                    <span class="star" data-value="5">&#9733;</span>
                                </div>
                                <div class="modified-date" id="date_modified">Last Modified: <em>date</em></div>
                            </div>
                            <form id="review-form" method="post" onsubmit="reviewSubmit(event)">
                                <textarea placeholder="Your review…" name="text" id="review" required></textarea>
                                <button type="submit" class="save-button">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/user_review.js"></script>
</body>

</html>
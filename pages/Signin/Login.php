<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: ../Webpages/home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Matias BH | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/navbar.css" />
    <link rel="stylesheet" href="../../css/Signin/RegisterLogin.css" />
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
        <!---<nav class="navbar navbar-expand-lg border-bottom w-100 p-3" >
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarContent">
                <a class="navbar-brand mx-auto fs-3 fw-bold" href="#"><b>LogoName</b></a>

                <div class="dropdown ms-auto">
                    <button id="profileDropdown" class="btn btn-outline-secondary dropdown-toggle" type="button"
                        data-bs-toggle="dropdown">
                        Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" id="personalDetailsLink" href="PersonalDetails.html">Personal Details</a>
                        <a class="dropdown-item" id="rentedRoomLink" href="RentedRoom.html">Rented Room</a>
                        <a class="dropdown-item" id="authLink" href="#" onclick="signoutClick(event)">Logout</a>
                    </ul>



                </div>
            </div>
        </div>
    </nav>-->

    </div>


    <div class="container-fluid">
        <div class="login-overlay-container">
            <img src="../../img/Login.png" class="img-fluid background-image" alt="Room Image">
            <div class="login-overlay" style=" background-color: rgba(255, 255, 255, 0);">
                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6">
                        <div class="col-md-12 p-4">
                            <div class="col-10 mx-auto fixed-box">

                                <form id="signinForm" method="POST" onsubmit="signinSubmit(event)">
                                    <div class="col-8 mx-auto">
                                        <div class=" p-3 mt-4 centerForm">
                                            <div class="login">Sign In</div>
                                            <div class="col-12">

                                                <div class="subtext">Email</div>
                                                <input type="email" class="form-control w-100" name="email" id="email"
                                                    required="required">
                                                <br><br>

                                            </div>

                                            <div class="col-12">
                                                <br>
                                                <div class="subtext">Password</div>
                                                <input type="password" class="form-control w-100" name="password"
                                                    id="password" required="required">
                                                <br><br>

                                                <br>
                                            </div>

                                            <div class="col-12">

                                                <button type="submit" class="login-button">
                                                    LOGIN
                                                    <div class="arrow-wrapper">
                                                        <div class="arrow"></div>
                                                    </div>
                                                </button>
                                            </div>

                                            <br>
                                            <div class="subp">
                                                No account? <br>

                                            </div>
                                            <a href="registration.php" class="register">Register Here</a>
                                            <br>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
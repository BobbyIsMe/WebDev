<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Room Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/landingpage.css">
    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/RegisterLogin.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/auth.js"></script>
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
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-4">
                <div class="col-8 mx-auto">
                    <form id="signupForm" method="post" onsubmit="signupSubmit(event)" style="background-color: rgb(243, 243, 243);">
                        <div class="border p-3 mt-4 text-center">
                            <br>
                            <div class="login">REGISTRATION</div><br>
                            <div class="col-8 mx-auto">


                                <div class="mb-8">
                                    <br>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
                                    <br><br>
                                    <div class="subtext">EMAIL</div><br><br>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="name" style="padding-right: 5px;">
                                            <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name" required="required">
                                            <br><br>
                                            <div class="subtext">FIRST NAME</div>
                                        </div>
                                        <div class="name" style="padding-left: 5px;">
                                            <input type="text" class="form-control" name="last_name" id="lname" placeholder="Last Name" required="required">
                                            <br><br>
                                            <div class="subtext">LAST NAME</div>
                                        </div>
                                    </div><br>

                                </div>

                                <div class="mb-3">
                                    <br>
                                    <input type="text" class="form-control" name="contact_number" id="contactnumber" placeholder="Contact Number" required="required">
                                    <br><br>
                                    <div class="subtext">CONTACT NUMBER</div>
                                    <br>
                                </div>


                                <div class="mb-3">
                                    <br>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                                    <br><br>
                                    <div class="subtext">PASSWORD</div>
                                    <br>
                                </div>

                                <div class="mb-3">
                                    <br>
                                    <input type="password" class="form-control" name="confirm_password" id="confirmpassword" placeholder="Confirm Password" required="required">
                                    <br><br>
                                    <div class="subtext">RE - ENTER PASSWORD</div>
                                    <br>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="login-button">REGISTRATION</button>
                                </div>

                                <br>
                            </div>
                            <div>
                                Already have an account? <br>
                                <a href="Login.php" class="register">Login Here</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>
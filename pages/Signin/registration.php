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
    <title>Matias BH | Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
<link rel="stylesheet" href="../../css/navbar.css"/>
<link rel="stylesheet" href="../../css/Signin/RegisterLogin.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>
    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>

<body>

    <div class="topnav">

</div>
    



 <div class="container-fluid">
        <div class="login-overlay-container">
            <img src="../../img/regisbg.png" class="img-fluid background-image" alt="Room Image">
            <div class="login-overlay" style=" background-color: rgba(255, 255, 255, 0);">
                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6">
                        <div class="col-md-12 p-3">
                        <div class="col-10 mx-auto">
                            <form id="signupForm" method="post" onsubmit="signupSubmit(event)">
                                <div class=" p-2 mt-2 text-center">
                                    <br>
                                    <div class="login">Registration</div>
                                    <div class="col-8 mx-auto">
                                        <div class="col-12">
                                            
                                            <div class="subtext">Email</div>
                                            <input type="email" class="form-control" name="email" id="email"  required="required">
                                            <br>
                                            
                                        </div>

                                        <div class="col-12">
                                            <div class="d-flex justify-content-between">
                                                <div class="name" style="padding-right: 5px;">
                                                    <div class="subtext">First Name</div>
                                                    <input type="text" class="form-control" name="first_name" id="fname" required="required">
                                                    
                                                    
                                                </div>
                                                <div class="name" style="padding-left: 5px;">
                                                    <div class="subtext">Last Name</div>
                                                    <input type="text" class="form-control" name="last_name" id="lname"  required="required">
                                                    
                                                    
                                                </div>
                                            </div><br>

                                        </div>

                                        <div class="col-12">
                                            
                                            <div class="subtext">Contact Number</div>
                                            <input type="text" class="form-control" name="contact_number" id="contactnumber" required="required">
                                            
                                            
                                            <br>
                                        </div>

                                        <div class="col-12">
                                        
                                            <div class="subtext">Password</div>
                                            <input type="password" class="form-control" name="password" id="password" required="required">
                                            
                                            
                                            <br>
                                        </div>

                                        <div class="col-12">
                                            
                                            <div class="subtext">Re - Enter Password</div>
                                            <input type="password" class="form-control" name="confirm_password" id="confirmpassword"  required="required">
                                            
                                            
                                            <br>
                                        </div>

                                        <div class="col-12">

                                                <button type="submit" class="login-button">
                                                    Register
                                                    <div class="arrow-wrapper">
                                                        <div class="arrow"></div>
                                                    </div>
                                                </button>
                                            </div>

                                        <br>
                                    </div>
                                    <div class="subp">
                                        Already have an account? <br>
                                       
                                    </div>
                                     <a href="Login.php" class="register">Login Here</a>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matias BH | FAQ's</title>
    <link rel="icon" href="../../img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/Webpage/FAQ.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/auth.js"></script>
</head>

<div class="topnav">
    <nav class="navbar navbar-expand-lg border-bottom w-100 p-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex align-items-center" id="navbarContent">
                <div class="me-auto">
                    <img src="../../img/MatiasBH.png" alt="LOGO" />
                </div>

                <div class="navbar-nav mx-auto">
                    <a class="nav-link me-5" href="home.php">HOME</a>
                    <a class="nav-link me-5" href="rooms.php">ROOMS</a>
                    <a class="nav-link me-5 fw-bold" style="color:rgba(14, 131, 117, 0.69);" href="FAQ.php">FAQ'S</a>
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


<body>

    <div class="faq-section">
        <h1>Frequently Asked Questions</h1>

            <div class="faq-item">
                <div class="faq-question">How to reserve?</div>
                <div class="faq-answer">After boarders have signed in, go to the rooms section on the navigation bar. Select a room and a boarder type, then press the reserve button to reserve a room. Lastly, wait for further updates via Gmail or text message.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Who can reserve the rooms?</div>
                <div class="faq-answer">Only 1 or 2 adults can reserve the room, students arent allowed to board. Lastly, kids aren't allowed, to not disturb the other boarders.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Are visitors allowed?</div>
                <div class="faq-answer">Yes, but not for a prolonged time.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Is there a curfew?</div>
                <div class="faq-answer">No, boardedrs can go out whenever they want and come back whenever they want</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">How do you secure the room?</div>
                <div class="faq-answer">After boarders reserve it, the boarders need to deposit 4500 first and do 1-month advance payment, which is 4000-4500 depending on the room.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">How long can boarders stay? </div>
                <div class="faq-answer">A minimum of 6 months of stay before boarder can back out and refund.</div>
            </div>

            <div class="faq-item">
                <div class="faq-question">What do boarders need to pay?</div>
                <div class="faq-answer">The boarders need to pay the rent of the room itself, the electric bill, and miscellaneous stuff.</div>
            </div>
        </div>
    </div>

    <script>
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            item.querySelector('.faq-question').addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });
    </script>

    <script type="text/javascript" src="../../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>


</body>

</html>
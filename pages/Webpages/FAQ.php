<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/Webpage/FAQ.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <style>
        * {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/auth.js"></script>
</head>

<body>


    <div class="topnav">
    <nav class="navbar navbar-expand-lg border-bottom w-100 p-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarContent">
                <a class="navbar-brand me-auto fs-3 fw-bold" href="#"><b>LogoName</b></a>

                <div class="navbar-nav mx-auto">
                    <a class="nav-link me-5" href="home.php">Home</a>
                    <a class="nav-link me-5" href="rooms.php">Rooms</a>
                    <a class="nav-link me-5 text-white" href="FAQ.php">FAQ's</a>
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
</div>

    <div class="faq-section">
        <h1>Frequently Asked<br>Questions</h1>

        <div class="faq-item">
            <div class="faq-question">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
            <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
            <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
            <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
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

    <script type="text/javascript" src="../js/session.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>


</body>

</html>
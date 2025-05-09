<?php
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.use_strict_mode', 1);
    session_start();

    // Database connection start 
    $host = "localhost";    // Host name
    $user = "root";         // User
    $password = "1234";         // Password
    $dbname = "webdev";     // Database name

    // Create connection
    $con = mysqli_connect($host, $user, $password,$dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
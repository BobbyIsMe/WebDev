<?php
include_once("db_connect.php");
$retVal = "";
$isValid = true;
$status = 400;

$fname = trim($_REQUEST['first_name']);
$lname = trim($_REQUEST['last_name']);
$contact_number = trim($_REQUEST['contact_number']);
$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);
$confirmpassword = trim($_REQUEST['confirm_password']);

// Check fields are empty or not
if ($fname == '' || $lname == '' || $email == '' || $contact_number == '' || $password == '' || $confirmpassword == '') {
    $isValid = false;
    $retVal = "Please fill all fields.";
}

// Check if confirm password matching or not
if ($isValid && ($password != $confirmpassword)) {
    $isValid = false;
    $retVal = "Confirm password not matching.";
}

// Check if email is valid or not
if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $retVal = "Invalid email.";
}

// Check if email already exists
if ($isValid) {
    $stmt = $con->prepare("SELECT * FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0) {
        $isValid = false;
        $retVal = "Email already exists.";
    }
}

// Insert records
if ($isValid) {
    $insertNameSQL = "INSERT INTO Names (fname, lname) VALUES (?, ?)";
    $stmt = $con->prepare($insertNameSQL);
    $stmt->bind_param("ss", $fname, $lname);
    $stmt->execute();

    $name_id = $stmt->insert_id;
    $stmt->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insertUserSQL = "INSERT INTO Users (name_id, email, contact_number, password) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($insertUserSQL);
    $stmt->bind_param("isss", $name_id, $email, $contact_number, $hashedPassword);
    $stmt->execute();
    $stmt->close();
    $retVal = "Account created successfully.";
    unset($_SESSION['user_email']);
    $status = 200;
}

$myObj = array(
    'status' => $status,
    'message' => $retVal
);
$myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
echo $myJSON;

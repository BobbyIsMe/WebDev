<?php
include_once("db_connect.php");

$retVal = "";
$isValid = true;
$status = 400;

session_regenerate_id(true);

if (!isset($_POST['email'], $_POST['password'])) {
    $password = '';
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Check fields are empty or not
if ($email == '' || $password == '') {
    $isValid = false;
    $retVal = "Please fill all fields.";
}

// Check if email is valid or not
if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $retVal = "Invalid email.";
}

// Check if email already exists
if ($isValid) {
    $stmt = $con->prepare("
    SELECT Users.*, Names.fname, Names.lname 
    FROM Users 
    JOIN Names ON Users.name_id = Names.name_id 
    WHERE Users.email = ?
");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $obj = mysqli_fetch_object($result);
    $stmt->close();
    $retVal = "Wrong email or password.";

    if ($result->num_rows > 0) {
        $isPassword = password_verify($password, $obj->password);
        if ($isPassword == true) {
            session_regenerate_id(true);

            $status = 200;
            $retVal = "Success.";
            $_SESSION['user_id'] = $obj->user_id;
        }
    }
}

$myObj = array(
    'status' => $status,
    'message' => $retVal
);
$myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
echo $myJSON;

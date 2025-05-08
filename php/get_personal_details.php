<?php
include_once("db_connect.php");
$user_name = $_SESSION["user_name"];
$user_email = $_SESSION["user_email"];
$contact_number = $_SESSION["user_contact-number"];

$sql = "SELECT date_created FROM Users WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$date_created =  date("F j, Y",strtotime($row['date_created']));

$myObj = array(
    'user_name' => $user_name,
    'user_email' => $user_email,
    'contact_number' => $contact_number,
    'date_created' => $date_created
);

echo json_encode($myObj, JSON_FORCE_OBJECT);
?>
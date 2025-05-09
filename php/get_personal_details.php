<?php
include_once("db_connect.php");
$user_id = $_SESSION["user_id"];

$sql = "
    SELECT Users.email, Users.contact_number, Users.date_created, Names.fname, Names.lname
    FROM Users
    JOIN Names ON Users.name_id = Names.name_id
    WHERE Users.user_id = ?
";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$user_email = $row['email'];
$user_name = $row['fname'] . " " . $row['lname'];
$contact_number = $row['contact_number'];
$date_created = date("F j, Y", strtotime($row['date_created']));

$myObj = array(
    'user_name' => $user_name,
    'user_email' => $user_email,
    'contact_number' => $contact_number,
    'date_created' => $date_created
);

echo json_encode($myObj, JSON_FORCE_OBJECT);
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("db_connect.php");
$user_id = $_SESSION["user_id"];

// --- Fetch Rent Information ---
$stmt = $con->prepare("
    SELECT 
        r.rent_id,
        r.room_id,
        r.boarder_type,
        r.check_in_date,
        r.due_date,
        r.status
    FROM Rents r
    WHERE r.user_id = ?
    ORDER BY r.rent_id DESC
    LIMIT 1;
");

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if($row != NULL)
{
    $rent_id = $row['rent_id'];
    $room_id = $row['room_id'];
    $boarder_type = $row['boarder_type'];
    $check_in_date = $row['check_in_date'];
    $due_date = $row['due_date'];
    $status = $row['status'];
} else {
    $rent_id = NULL;
    $room_id = NULL;
    $boarder_type = NULL;
    $check_in_date = NULL;
    $due_date = NULL;
    $status = NULL;
}

$stmt = $con->prepare("
    SELECT 
        b.electricity_bill,
        b.miscellaneous_bill,
        b.rent_bill,
        b.total_bill
    FROM Bills b
    WHERE b.rent_id = ?;
");
$stmt->bind_param("i", $rent_id);
$stmt->execute();
$bill_result = $stmt->get_result();
$bill_row = $bill_result->fetch_assoc();

if($bill_row != NULL)
{
    $electricity_bill = $bill_row['electricity_bill'];
    $miscellaneous_bill = $bill_row['miscellaneous_bill'];
    $rent_bill = $bill_row['rent_bill'];
    $total_bill = $bill_row['total_bill'];
} else {
    $electricity_bill = NULL;
    $miscellaneous_bill = NULL;
    $rent_bill = NULL;
    $total_bill = NULL;
}

$stmt = $con->prepare("
    SELECT 
        r.description
    FROM Rooms r
    WHERE r.room_id = ?;
");
$stmt->bind_param("i", $room_id);
$stmt->execute();
$room_result = $stmt->get_result();
$room_row = $room_result->fetch_assoc();

if ($room_row != NULL)
    $description = $room_row['description'];
else
    $description = NULL;

$myObj = array(
    'room_id' => $room_id != NULL ? $room_id : ".",
    'description' => $description != NULL ? $description : "Description about the place",
    'boarder_type' => $boarder_type != NULL ? $boarder_type : "No room rented",
    'check_in_date' => $check_in_date != NULL ? $check_in_date : "TBD",
    'due_date' => $due_date != NULL ? $due_date : "TBD",
    'status' => $status != NULL ? $status : "No room rented",
    'electricity_bill' => $electricity_bill != NULL ? $electricity_bill : "TBD",
    'miscellaneous_bill' => $miscellaneous_bill != NULL ? $miscellaneous_bill : "TBD",
    'rent_bill' => $rent_bill != NULL ? $rent_bill : "TBD",
    'total_bill' => $total_bill != NULL ? $total_bill : "TBD"
);

echo json_encode($myObj, JSON_FORCE_OBJECT);

$stmt->close();
$con->close();

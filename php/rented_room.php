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
$rent_id = $row['rent_id'];
$room_id = $row['room_id'];
$boarder_type = $row['boarder_type'];
$check_in_date = $row['check_in_date'];
$due_date = $row['due_date'];
$status = $row['status'];

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


if ($bill_row) {
    $electricity_bill = $bill_row['electricity_bill'];
    $miscellaneous_bill = $bill_row['miscellaneous_bill'];
    $rent_bill = $bill_row['rent_bill'];
    $total_bill = $bill_row['total_bill'];
} else {
    $electricity_bill = null;
    $miscellaneous_bill = null;
    $rent_bill = null;
    $total_bill = null;
}

// --- Fetch Room Description ---
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

$description = $room_row ? $room_row['description'] : null; //handle if room description is null


$myObj = array(
    'room_id' => $room_id ? $room_id : " ",
    'description' => $description,
    'boarder_type' => $boarder_type,
    'check_in_date' => $check_in_date ? $check_in_date : " ",
    'due_date' => $due_date ? $due_date : " ",
    'status' => $status,
    'electricity_bill' => $electricity_bill ? $electricity_bill : " ",
    'miscellaneous_bill' => $miscellaneous_bill ? $miscellaneous_bill : " ",
    'rent_bill' => $rent_bill ? $rent_bill : " ",
    'total_bill' => $total_bill ? $total_bill : " "
);

echo json_encode($myObj, JSON_FORCE_OBJECT);

$stmt->close();
$con->close();
?>

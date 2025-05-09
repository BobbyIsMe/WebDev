<?php
include_once("db_connect.php");

$user_id = $_SESSION["user_id"];

$stmt = $con->prepare("
    SELECT 
        r.rent_id,
        r.room_id,
        r.boarder_type,
        r.check_in_date,
        r.due_date,
        r.status,
        rm.description,
        b.electricity_bill,
        b.miscellaneous_bill,
        b.rent_bill,
        b.total_bill
    FROM Rents r
    LEFT JOIN Rooms rm ON r.room_id = rm.room_id
    LEFT JOIN Bills b ON r.rent_id = b.rent_id
    WHERE r.user_id = ?
    ORDER BY r.rent_id DESC
    LIMIT 1;
");

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
        
$myObj = array(
    'room_id' => $row['room_id'] ?? ".",
    'description' => $row['description'] ?? "Description about the place",
    'boarder_type' => $row['boarder_type'] ?? "No room rented",
    'check_in_date' => $row['check_in_date'] ?? "TBD",
    'due_date' => $row['due_date'] ?? "TBD",
    'status' => $row['status'] ?? "No room rented",
    'electricity_bill' => $row['electricity_bill'] ?? "TBD",
    'miscellaneous_bill' => $row['miscellaneous_bill'] ?? "TBD",
    'rent_bill' => $row['rent_bill'] ?? "TBD",
    'total_bill' => $row['total_bill'] ?? "TBD"
);

echo json_encode($myObj, JSON_FORCE_OBJECT);

$stmt->close();
$con->close();
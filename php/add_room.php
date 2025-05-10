<?php
include_once("db_connect.php");

$status = 400;
$message = "";

if (!isset($_REQUEST['room_id'], $_REQUEST['boarder_type'])) {
    echo json_encode([
        'status' => 400,
        'message' => 'Missing input parameters.'
    ]);
    exit();
}

if (!isset($_SESSION["user_id"])) {
    echo json_encode([
        'status' => 400,
        'message' => 'Must be signed in to proceed.'
    ]);
    exit();
}

function validateForm($con)
{
    global $status;
    $user_id = $_SESSION['user_id'];
    $room_id = trim($_REQUEST['room_id']);
    $boarder_type = trim($_REQUEST['boarder_type']);
    $stmt = $con->prepare("
    SELECT 
        COUNT(*) AS room_exists,
        (SELECT COUNT(*) 
         FROM Rents 
         WHERE room_id = ? 
           AND CURRENT_DATE BETWEEN check_in_date AND COALESCE(due_date, CURRENT_DATE)
        ) AS room_rented,
        (SELECT COUNT(*) 
         FROM Rents 
         WHERE user_id = ? 
           AND (CURRENT_DATE BETWEEN check_in_date AND COALESCE(due_date, CURRENT_DATE)
                OR due_date IS NULL)
        ) AS user_has_rent
    FROM Rooms r
    WHERE r.room_id = ?
");
    $stmt->bind_param("iii", $room_id, $user_id, $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row['room_exists'] == 0) {
        return "Invalid room number.";
    }

    if (!in_array(strtolower($boarder_type), ['single', 'double'])) {
        return "Invalid boarder type.";
    }

    if ($row['room_rented'] > 0) {
        return "Room is not available.";
    }

    if ($row['user_has_rent'] > 0) {
        return "You already have a rented room.";
    }

    $stmt = $con->prepare("INSERT INTO Rents (user_id, room_id, boarder_type) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $room_id, $boarder_type);
    $stmt->execute();
    $status = 200;
    $stmt->close();
    return "Rent Application Accepted, please expect a text message within 1-2 days";
}

$message = validateForm($con);

$myObj = array(
    'status' => $status,
    'message' => $message
);

$myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
echo $myJSON;

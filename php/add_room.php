<?php
include_once("db_connect.php");

$status = 400;
$message = "";

if (!isset($_REQUEST['room_id'], $_REQUEST['boarder_type'], $_REQUEST['check_in_date'])) {
    echo json_encode([
        'status' => 400,
        'message' => 'Missing input parameters.'
    ]);
    exit();
}

if (!isset($_SESSION["user_email"])) {
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
    $check_in_date = trim($_REQUEST['check_in_date']);
    $stmt = $con->prepare("SELECT COUNT(*) as count FROM Rooms WHERE room_id = ?");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        return "Invalid room ID.";
    }
    $stmt->close();

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $check_in_date)) {
        return "Please choose a valid check-in date.";
    } elseif (!strtotime($check_in_date)) {
        return "Invalid date value.";
    }

    $allowed_types = ['single', 'double'];
    if (!in_array(strtolower($boarder_type), $allowed_types)) {
        return "Invalid boarder type.";
    }

    $sql = "SELECT COUNT(*) AS rented_count FROM Rents WHERE room_id = ? AND CURRENT_DATE BETWEEN check_in_date AND due_date";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && $row['rented_count'] > 0) {
        return "Room is not available.";
    }

    $sql_user_check = "SELECT * FROM Rents WHERE user_id = ? AND CURRENT_DATE BETWEEN check_in_date AND due_date OR due_date IS NULL";
    $stmt = $con->prepare($sql_user_check);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user_result = $stmt->get_result();

    if ($user_result->num_rows > 0) {
        return "You already have a rented room.";
    }
    $insertUserSQL = "INSERT INTO Rents (user_id, room_id, boarder_type, check_in_date) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($insertUserSQL);
    $stmt->bind_param("iiss", $user_id, $room_id, $boarder_type, $check_in_date);
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

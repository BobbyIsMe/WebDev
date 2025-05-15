<?php
include_once("db_connect.php");

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    echo json_encode(['status' => 400, 'message' => 'Must be signed in to proceed.']);
    exit();
}

$text = $_POST['text'];
$rating = $_POST['rating'];

if (!isset($text, $rating)) {
    echo json_encode(['status' => 400, 'message' => 'Missing input parameters.']);
    exit();
}

if (empty($text) || empty($rating)) {
    echo json_encode(['status' => 400, 'message' => 'Text and rating are required.']);
    exit();
}

if (strlen($text) > 255) {
    echo json_encode(['status' => 400, 'message' => 'Text exceeds maximum length of 500 characters.']);
    exit();
}

if (strlen($text) < 1) {
    echo json_encode(['status' => 400, 'message' => 'Text must be at least 1 character long.']);
    exit();
}

if (!is_numeric($rating) || $rating < 1 || $rating > 5) {
    echo json_encode(['status' => 400, 'message' => 'Rating must be a number between 1 and 5.']);
    exit();
}

$text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
$rating = (int)$rating;

$stmt = $con->prepare("
SELECT 
    (SELECT COUNT(*) 
     FROM Reviews 
     WHERE user_id = ?) AS count,
     
    (SELECT room_id 
     FROM Rents 
     WHERE user_id = ? 
       AND (status = 'approved' OR status = 'closed') 
     ORDER BY rent_id DESC 
     LIMIT 1) AS room_id;");
$stmt->bind_param("ii", $user_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$count = $row['count'];
$room_id = $row['room_id'];

if ($room_id != NULL) {
    if ($count != 0) {
        $stmt = $con->prepare("
UPDATE Reviews
SET 
    text = ?,
    date_modified = CURRENT_DATE,
    rating = ?,
    room_id = ?
WHERE user_id = ?;");
        $stmt->bind_param("siii", $text, $rating, $room_id, $user_id);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['status' => 200, 'message' => 'Review updated successfully.']);
    } else {
        $stmt = $con->prepare("
INSERT INTO Reviews (user_id, text, date_created, rating, room_id) VALUES (?, ?, CURRENT_DATE, ?, ?);");
        $stmt->bind_param("isii", $user_id, $text, $rating, $room_id);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['status' => 200, 'message' => 'Review added successfully.']);
    }
} else {
    echo json_encode(['status' => 400, 'message' => 'No room rented.']);
}

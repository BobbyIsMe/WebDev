<?php
include_once("db_connect.php");

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    echo json_encode(['status' => 400, 'message' => 'Must be signed in to proceed.']);
    exit();
}

$stmt = $con->prepare("
SELECT r.room_id, rv.rating, rv.text, rv.date_modified
    FROM Rents r
    LEFT JOIN Reviews rv ON rv.user_id = r.user_id
    WHERE r.user_id = ?
    AND (r.status = 'approved' OR r.status = 'closed')
    ORDER BY r.rent_id DESC
    LIMIT 1;");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'room_id' =>  $row && $row['room_id'] ? ("Add Review for Room #" . $row['room_id']) : "No room rented",
        'rating' => $row['rating'] ?? 5,
        'text' => !empty($row['text']) ? $row['text'] : "Your review here.",
        'date_modified' => $row && $row['date_modified'] != null ? ("Last Modified: " . $row['date_modified']) : "",
        'status' => 200, 
        'message' => 'Review retrieved successfully.']);
} else {
    echo json_encode([
        'room_id' => "No room rented",
        'text' => "Your review here.",
        'status' => 404, 
        'message' => 'No room found.']);
    exit();
}
?>
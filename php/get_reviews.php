<?php
include_once("db_connect.php");

$is_admin = $_SESSION['is_admin'] ?? 0;

$reviews = [];
$params = "";
$values = [];
$filter = " WHERE 1=1";
$results = 0;
$total = 5;

$rating = isset($_GET['rating']) ? (int)$_GET['rating'] : 0;
$room_id = isset($_GET['room_id']) ? (int)$_GET['room_id'] : 0;
$order = $_GET['order'] ?? null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if(!empty($rating) && is_numeric($rating) && $rating >= 1 && $rating <= 5) {
    $params .= 'i';
    $values[] = $rating;
    $filter .= " AND Reviews.rating = ?";
}

if(!empty($room_id) && is_numeric($room_id) && $room_id >= 1 && $room_id <= 10) {
    $params .= 'i';
    $values[] = $room_id;
    $filter .= " AND Reviews.room_id = ?";
}

if(!empty($order) && in_array(strtolower($order), ['asc', 'desc'])) {
    $filter .= " ORDER BY COALESCE(Reviews.date_modified, Reviews.date_created) " . strtoupper($order);
} else {
    $filter .= " ORDER BY COALESCE(Reviews.date_modified, Reviews.date_created) DESC";
}

$stmt = $con->prepare("
SELECT 
    COUNT(*) AS total 
FROM 
    Reviews". $filter);
 if(!empty($params))
$stmt->bind_param($params, ...$values);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$totalRows = $row['total'];
$totalPages = ceil($totalRows / $total);

if($page < 1 || $page > $totalPages) {
    $page = 1;
}

$offset = ($page - 1) * $total;
if($totalRows == 0) {
    echo json_encode([
        'status' => 400,
        'message' => 'No reviews found.',
        'reviews' => [],
        'results' => $results,
        'totalPages' => $totalPages
    ]);
    exit();
}

$filter .= " LIMIT $total OFFSET $offset";
$stmt = $con->prepare("
SELECT 
    Reviews.*,
    Users.email,
    Names.fname,
    Names.lname
FROM
    Reviews
LEFT JOIN Users ON Reviews.user_id = Users.user_id
LEFT JOIN Names ON Users.name_id = Names.name_id" . $filter);
if(!empty($params))
$stmt->bind_param($params, ...$values);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $reviews[] = [
        'user_id' => $row['user_id'],
        'review_id' => $row['review_id'],
        'room_id' => $row['room_id'],
        'text' => $row['text'],
        'date_created' => $row['date_created'],
        'date_modified' => $row['date_modified'] ?? null,
        'rating' => $row['rating'],
        'email' => $row['email'],
        'name' => $row['fname'] . ' ' . $row['lname']
    ];
    $results++;
}

$stmt->close();

echo json_encode([
        'status' => 200,
        'message' => 'Reviews retrieved successfully.',
        'reviews' => $reviews,
        'results' => $results,
        'is_admin' => $is_admin,
        'totalPages' => $totalPages
]);
?>
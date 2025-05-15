<?php
include_once("db_connect.php");
include_once("admin_status.php");
requireAdmin($con);

$rents = [];
$params = "";
$values = [];
$filter = " WHERE 1=1";
$results = 0;
$total = 5;

$email = $_GET['email'] ?? null;
$contact_number = $_GET['contact_number'] ?? null;
$room_id = $_GET['room_id'] ?? null;
$status = $_GET['status'] ?? null;
$boarder_type = $_GET['boarder_type'] ?? null;
$check_in_date = $_GET['check_in_date'] ?? null;
$due_date = $_GET['due_date'] ?? null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if(!empty($email)) {
    $params .= 's';
    $values[] = "%" . $email . "%";
    $filter .= " AND Users.email LIKE ?";
}

if(!empty($contact_number)) {
    $params .= 's';
    $values[] = $contact_number;
    $filter .= " AND Users.contact_number = ?";
}

if(!empty($room_id) && $room_id > 0 && is_numeric($room_id) && $room_id <= 10) {
    $params .= 'i';
    $values[] = $room_id;
    $filter .= " AND Rents.room_id = ?";
}

if(!empty($status) && in_array(strtolower($status), ['pending', 'approved', 'rejected', 'closed'])) {
    $params .= 's';
    $values[] = strtolower($status);
    $filter .= " AND Rents.status = ?";
}

if(!empty($boarder_type) && in_array(strtolower($boarder_type), ['single', 'double'])) {
    $params .= 's';
    $values[] = strtolower($boarder_type);
    $filter .= " AND Rents.boarder_type = ?";
}

if(!empty($check_in_date)) {
    $params .= 's';
    $values[] = $check_in_date;
    $filter .= " AND Rents.check_in_date = ?";
}

if(!empty($due_date)) {
    $params .= 's';
    $values[] = $due_date;
    $filter .= " AND Rents.due_date = ?";
}

$stmt = $con->prepare("
SELECT 
    COUNT(*) AS total 
FROM 
    Rents 
JOIN Users ON Rents.user_id = Users.user_id". $filter);
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
        'message' => 'No rents found.',
        'rents' => [],
        'results' => $results,
        'totalPages' => $totalPages
    ]);
    exit();
}

$filter .= " LIMIT $total OFFSET $offset";

$stmt = $con->prepare("
SELECT
    Rents.*,
    Bills.electricity_bill,
    Bills.miscellaneous_bill,
    Bills.rent_bill,
    Bills.total_bill,
    Users.email,
    Users.contact_number,
    Names.fname,
    Names.lname
FROM
    Rents
LEFT JOIN Bills ON Rents.rent_id = Bills.rent_id
LEFT JOIN Users ON Rents.user_id = Users.user_id
LEFT JOIN Names ON Users.name_id = Names.name_id" . $filter);
if(!empty($params))
$stmt->bind_param($params, ...$values);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $rents[] =
        [
            'rent_id' => $row['rent_id'] ?? 0,
            'user_id' => $row['user_id'] ?? '',
            'name' => $row['fname'] . ' ' . $row['lname'],
            'email' => $row['email'] ?? '',
            'contact_number' => $row['contact_number'] ?? '',
            'room_id' => $row['room_id'] ?? '',
            'status' => $row['status'] ?? '',
            'check_in_date' => $row['check_in_date'] ?? '',
            'due_date' => $row['due_date'] ?? '',
            'boarder_type' => $row['boarder_type'] ?? '',
            'electricity_bill' => $row['electricity_bill'] ?? '',
            'miscellaneous_bill' => $row['miscellaneous_bill'] ?? '',
            'rent_bill' => $row['rent_bill'] ?? '',
            'total_bill' => $row['total_bill'] ?? ''
        ];
    $results++;
}

$stmt->close();

echo json_encode([
        'status' => 200,
        'message' => 'Rents retrieved successfully.',
        'rents' => $rents,
        'results' => $results,
        'totalPages' => $totalPages
]);
?>
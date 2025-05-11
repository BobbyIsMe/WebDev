<?php
include_once("db_connect.php");
include_once("admin_status.php");
requireAdmin($con);

$rents = [];
$params = "";
$values = [];
$filter = "";
$results = 0;

$email = trim($_GET['email']) ?? null;
$contact_number = trim($_GET['contact_number']) ?? null;
$room_id = trim($_GET['room_id']) ?? null;
$status = trim($_GET['status']) ?? null;
$check_in_date = trim($_GET['check_in_date']) ?? null;
$due_date = trim($_GET['due_date']) ?? null;
if(!empty($email)) {
    $params .= 's';
    $values[] = $email;
    $filter .= " AND Users.email LIKE '%?%'";
}

if(!empty($contact_number)) {
    $params .= 's';
    $values[] = $contact_number;
    $filter .= " AND Users.contact_number = ?";
}

if(!empty($room_id)) {
    $params .= 'i';
    $values[] = $room_id;
    $filter .= " AND Rents.room_id = ?";
}

if(!empty($status)) {
    $params .= 's';
    $values[] = $status;
    $filter .= " AND Rents.status = ?";
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
    Rents.*,
    Bills.*,
    Users.email,
    Users.contact_number,
    Names.fname,
    Names.lname
FROM
    Rents
JOIN Bills ON Rents.rent_id = Bills.rent_id
JOIN Users ON Rents.user_id = Users.user_id
JOIN Names ON Users.name_id = Names.name_id
LIMIT 10" . $filter);
$stmt->bind_param($params, ...$values);
$stmt->execute();
if($result->num_rows == 0) {
    echo json_encode([
        'status' => 400,
        'message' => 'No rents found.',
        'rents' => [],
        'results' => $results
    ]);
    exit();
}

while ($row = $result->fetch_assoc()) {
    $rents[] =
        [
            'rent_id' => $row['rent_id'],
            'user_id' => $row['user_id'],
            'email' => $row['email'],
            'contact_number' => $row['contact_number'],
            'room_id' => $row['room_id'],
            'status' => $row['status'],
            'check_in_date' => $row['check_in_date'],
            'due_date' => $row['due_date'],
            'boarder_type' => $row['boarder_type'],
            'electricity_bill' => $row['electricity_bill'],
            'miscellaneous_bill' => $row['miscellaneous_bill'],
            'rent_bill' => $row['rent_bill'],
            'total_bill' => $row['total_bill']
        ];
    $results++;
}

$stmt->close();

echo json_encode([
        'status' => 200,
        'message' => 'Rents retrieved successfully.',
        'rents' => $rents,
        'results' => $results
]);

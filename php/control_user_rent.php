<?php
include_once("db_connect.php");
include_once("admin_status.php");
requireAdmin($con);

$rent_id = $_POST['rent_id'] ?? null;
$status = $_POST['status'] ?? null;
$check_in_date = $_POST['check_in_date'] ?? null;
$due_date = $_POST['due_date'] ?? null;

if (!isset($rent_id, $status, $check_in_date, $due_date)) {
    echo json_encode(array("status" => 400, "message" => "Invalid request."));
    exit();
}

$stmt = $con->prepare("SELECT * FROM Rents WHERE rent_id = ?");
$stmt->bind_param("i", $rent_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if ($result->num_rows == 0) {
    echo json_encode(array("status" => 404, "message" => "Rent ID not found."));
    exit();
}

if (!in_array(strtolower($status), ['pending', 'approved', 'rejected', 'closed'])) {
    echo json_encode(array("status" => 400, "message" => "Invalid status."));
    exit();
}

if (!DateTime::createFromFormat('Y-m-d', $check_in_date) || !DateTime::createFromFormat('Y-m-d', $due_date)) {
    echo json_encode(array("status" => 400, "message" => "Invalid date format."));
    exit();
}

if($check_in_date < date('Y-m-d')) {
    echo json_encode(array("status" => 400, "message" => "Check-in date cannot be in the past."));
    exit();
}

if($due_date < $check_in_date) {
    echo json_encode(array("status" => 400, "message" => "Due date cannot be before check-in date."));
    exit();
}

$stmt = $con->prepare("UPDATE Rents SET status = ?, check_in_date = ?, due_date = ? WHERE rent_id = ?");
$stmt->bind_param("sssi", $status, $check_in_date, $due_date, $rent_id);
$stmt->execute();
$stmt->close();
echo json_encode(array("status" => 400, "message" => "Successfully updated rent request."));
?>
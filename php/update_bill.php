<?php
include_once("db_connect.php");
include_once("admin_status.php");
requireAdmin($con);

$rent_id = $_POST['rent_id'] ?? null;
$electricity_bill = $_POST['electricity_bill'] ?? null;
$miscellaneous_bill = $_POST['miscellaneous_bill'] ?? null;
$rent_bill = $_POST['rent_bill'] ?? null;
$total_bill = $_POST['total_bill'] ?? null;

if (!isset($rent_id, $electricity_bill, $miscellaneous_bill, $rent_bill, $total_bill)) {
    echo json_encode(array("status" => 400, "message" => "Invalid request."));
    exit();
}

if(!is_numeric($electricity_bill) || !is_numeric($miscellaneous_bill) || !is_numeric($rent_bill) || !is_numeric($total_bill)) {
    echo json_encode(array("status" => 400, "message" => "Invalid bill amount."));
    exit();
}

if($electricity_bill <= 0 || $miscellaneous_bill <= 0 || $rent_bill <= 0 || $total_bill <= 0) {
    echo json_encode(array("status" => 400, "message" => "Bill amounts must be above zero."));
    exit();
}

$checkStmt = $con->prepare("SELECT COUNT(*) FROM Bills WHERE rent_id = ?");
$checkStmt->bind_param("i", $rent_id);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();
$checkStmt->close();

if ($count > 0) {
$stmt = $con->prepare("UPDATE Bills SET electricity_bill = ?, miscellaneous_bill = ?, rent_bill = ?, total_bill = ? WHERE rent_id = ?");
$stmt->bind_param("iiiii", $electricity_bill, $miscellaneous_bill, $rent_bill, $total_bill, $rent_id);
$stmt->execute();
$stmt->close();
echo json_encode(array("status" => 200, "message" => "Successfully updated bill."));
} else {
    $stmt = $con->prepare("INSERT INTO Bills (rent_id, electricity_bill, miscellaneous_bill, rent_bill, total_bill) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiii", $rent_id, $electricity_bill, $miscellaneous_bill, $rent_bill, $total_bill);
    $stmt->execute();
    $stmt->close();
    echo json_encode(["status" => 200, "message" => "Successfully inserted bill."]);
}
?>
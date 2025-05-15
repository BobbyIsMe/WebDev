<?php
include_once("db_connect.php");
include_once("admin_status.php");
requireAdmin($con);

$review_id = $_POST['review_id'] ?? null;
if (!isset($review_id)) {
    echo json_encode(['status' => 400, 'message' => 'Missing input parameters.']);
    exit();
}

$stmt = $con->prepare("SELECT * FROM Reviews WHERE review_id = ?");
$stmt->bind_param("i", $review_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
if ($result->num_rows == 0) {
    echo json_encode(['status' => 404, 'message' => 'Review not found.']);
    exit();
}

$stmt = $con->prepare("DELETE FROM Reviews WHERE review_id = ?");
$stmt->bind_param("i", $review_id);
$stmt->execute();
$stmt->close();
echo json_encode(['status' => 200, 'message' => 'Review deleted successfully.']);
?>
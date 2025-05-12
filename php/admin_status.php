<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("db_connect.php");

function requireAdmin($con)
{
    if (!isset($_SESSION["user_id"])) {
        echo json_encode([
            'status' => 400,
            'message' => 'Must be signed in to proceed.'
        ]);
        exit();
    }

    $stmt = $con->prepare("SELECT admin FROM Users WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    if ($row['admin'] == 0) {
        echo json_encode([
            'status' => 400,
            'message' => 'Unauthorized access.'
        ]);
        exit();
    }
}

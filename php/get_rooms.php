<?php
include_once("db_connect.php");
$rooms = [];

$result = $con->query("
SELECT r.room_id, r.description,
       CASE WHEN EXISTS (
           SELECT 1 FROM Rents rt 
           WHERE rt.room_id = r.room_id 
           AND status = 'approved' 
             AND CURRENT_DATE BETWEEN rt.check_in_date AND rt.due_date
       ) THEN 1 ELSE 0 END AS is_rented
FROM Rooms r;");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rooms[] = [
            'room_id' => $row['room_id'],
            'description' => $row['description'],
            'is_rented' => (bool)$row['is_rented']
        ];
    }
}

$myObj = array(
    'rooms' => $rooms
);

echo json_encode($myObj, JSON_FORCE_OBJECT);

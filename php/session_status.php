<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_strict_mode', 1);
session_start();
echo json_encode([
    'loggedIn' => isset($_SESSION['user_id'])
]);

<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    // ลบบัญชีผู้ใช้
    $query = "DELETE FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $province = $_POST['province'];

    // ตรวจสอบอีเมลไม่ซ้ำกัน
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die('Email already exists.');
    }

    // เพิ่มบัญชีใหม่
    $query = "INSERT INTO users (username, password, name, surname, email, gender, age, province, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Customer')";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    
    // ผูกตัวแปรกับคำสั่ง SQL (แก้ไขจำนวนตัวแปรให้ตรง)
    $stmt->bind_param("ssssssss", $username, $password, $name, $surname, $email, $gender, $age, $province);
    
    // เรียกใช้งานคำสั่ง
    if ($stmt->execute()) {
        echo "New user added successfully.";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    // ปิดการเชื่อมต่อ
    $stmt->close();
}
$conn->close();
?>

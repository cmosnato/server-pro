<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // ตรวจสอบว่าข้อมูลไม่ว่างเปล่า
    if (empty($username) || empty($password) || empty($confirm_password) || empty($first_name) || empty($last_name) || empty($email)) {
        die('กรุณากรอกข้อมูลให้ครบถ้วน');
    }

    // ตรวจสอบว่ารหัสผ่านตรงกันหรือไม่
    if ($password !== $confirm_password) {
        die('รหัสผ่านไม่ตรงกัน');
    }

    // ตรวจสอบอีเมลไม่ซ้ำกัน
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die('อีเมลนี้ถูกใช้ไปแล้ว');
    }

    // เข้ารหัสรหัสผ่าน
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // เพิ่มข้อมูลผู้ใช้ในฐานข้อมูล
    $query = "INSERT INTO users (username, password, surname, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $username, $hashed_password, $last_name, $email); // ใช้ surname สำหรับนามสกุล

    if ($stmt->execute()) {
        echo 'ลงทะเบียนสำเร็จ! <a href="login.php">เข้าสู่ระบบ</a>';
    } else {
        echo 'เกิดข้อผิดพลาดในการลงทะเบียน';
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
</head>
<body>
    <h1>ลงทะเบียน</h1>
    <form method="POST" action="">
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" name="username" required><br>
        <label for="password">รหัสผ่าน:</label>
        <input type="password" name="password" required><br>
        <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
        <input type="password" name="confirm_password" required><br>
        <label for="first_name">ชื่อ:</label>
        <input type="text" name="first_name" required><br>
        <label for="last_name">นามสกุล:</label>
        <input type="text" name="last_name" required><br>
        <label for="email">อีเมล์:</label>
        <input type="email" name="email" required><br>
        <button type="submit">ลงทะเบียน</button>
    </form>
</body>
</html>

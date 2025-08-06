<?php
session_start();
include 'db_connection.php';

// ตรวจสอบการเข้าสู่ระบบของผู้จัดการ
if (!isset($_SESSION['manager_username'])) {
    header("Location: manager-login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // ตรวจสอบข้อมูล
    if (empty($username) || empty($password) || empty($email)) {
        die('กรุณากรอกข้อมูลให้ครบถ้วน');
    }

    // เข้ารหัสรหัสผ่าน
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // เพิ่มบัญชีผู้ใช้ในฐานข้อมูล
    $query = "INSERT INTO user (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    if ($stmt->execute()) {
        // เพิ่มสำเร็จ เปลี่ยนเส้นทางกลับไปยังหน้าแดชบอร์ดผู้จัดการ
        header("Location: manager-dashboard.php");
        exit();
    } else {
        die('เกิดข้อผิดพลาดในการเพิ่มบัญชีผู้ใช้');
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มผู้ใช้</title>
</head>
<body>
    <h1>เพิ่มผู้ใช้</h1>
    <form action="add-user.php" method="POST">
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">รหัสผ่าน:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="email">อีเมล:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">เพิ่มผู้ใช้</button>
    </form>
</body>
</html>

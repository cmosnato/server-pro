<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบว่า username และ password ไม่ว่างเปล่า
    if (empty($username) || empty($password)) {
        die('กรุณากรอกชื่อผู้ใช้และรหัสผ่าน');
    }

    // ดึงข้อมูลผู้ดูแลระบบจากฐานข้อมูล
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // ตรวจสอบว่ามีผู้ดูแลระบบในฐานข้อมูลหรือไม่
    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        // เปรียบเทียบรหัสผ่านโดยตรง
        if ($password === $admin['password']) {
            // ตั้งค่าเซสชันเมื่อเข้าสู่ระบบสำเร็จ
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_email'] = $admin['email'];
            $_SESSION['is_admin_logged_in'] = true; // ตั้งค่าให้ระบุว่าผู้ใช้เข้าสู่ระบบแล้ว
            
            // เปลี่ยนเส้นทางไปยังหน้าหลักของแอดมิน
            header("Location: index.php"); // เปลี่ยนเป็นหน้าที่คุณต้องการ
            exit();
        } else {
            die('รหัสผ่านไม่ถูกต้อง');
        }
    } else {
        die('ชื่อผู้ใช้ไม่ถูกต้อง');
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ (แอดมิน)</title>
</head>
<body>
    <h1>เข้าสู่ระบบ (แอดมิน)</h1>
    <form action="admin-login.php" method="POST">
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">รหัสผ่าน:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">เข้าสู่ระบบ</button>
        <br>
    </form>
    
</body>
</html>

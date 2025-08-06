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

    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // ตรวจสอบว่ามีผู้ใช้ในฐานข้อมูลหรือไม่
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            // ตั้งค่าเซสชันเมื่อเข้าสู่ระบบสำเร็จ
            $_SESSION['username'] = $user['username'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['email'] = $user['email'];
            
            // เปลี่ยนเส้นทางไปยังหน้าหลักหรือหน้าที่ต้องการหลังจากเข้าสู่ระบบสำเร็จ
            header("Location: index.php"); // เปลี่ยนเป็นหน้าที่คุณต้องการ
            exit();
        } else {
            // หากรหัสผ่านไม่ถูกต้อง ให้แสดงข้อความผิดพลาด
            die('รหัสผ่านไม่ถูกต้อง');
        }
    } else {
        // หากชื่อผู้ใช้ไม่ถูกต้อง ให้แสดงข้อความผิดพลาด
        die('ชื่อผู้ใช้ไม่ถูกต้อง');
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <h1>เข้าสู่ระบบ</h1>
    <form action="user-login.php" method="POST"> <!-- ตรวจสอบให้แน่ใจว่าชื่อไฟล์ถูกต้อง -->
        <label for="username">ชื่อผู้ใช้:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">รหัสผ่าน:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">เข้าสู่ระบบ</button>
        <br>
    </form>
    <a href="register.php">ลงทะเบียน</a> <!-- ปุ่มลงทะเบียน -->
</body>
</html>

<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบว่า username และ password ไม่ว่างเปล่า
    if (empty($username) || empty($password)) {
        die('Please fill in both username and password.');
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
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['age'] = $user['age'];
            $_SESSION['province'] = $user['province'];

            // ตรวจสอบบทบาทผู้ใช้
            if ($user['role'] == 'Admin') {
                header('Location: admin_dashboard.php'); // หน้าจัดการสำหรับ Admin
            } else {
                header('Location: dashboard.php'); // หน้าจัดการสำหรับลูกค้า
            }
            exit();
        } else {
            echo 'Invalid password.';
        }
    } else {
        echo 'Invalid username.';
    }
}
?>
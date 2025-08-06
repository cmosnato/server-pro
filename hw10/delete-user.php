// ตัวอย่าง delete-user.php
<?php
session_start();
include 'db_connection.php';

// ตรวจสอบการเข้าสู่ระบบของผู้จัดการ
if (!isset($_SESSION['manager_username'])) {
    header("Location: manager-login.php");
    exit();
}

// ตรวจสอบว่ามี ID หรือไม่
if (!isset($_GET['id'])) {
    die('ไม่พบ ID ของผู้ใช้');
}

// ลบข้อมูลผู้ใช้จากฐานข้อมูล
$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: manager-dashboard.php"); // เปลี่ยนเส้นทางไปยังแดชบอร์ดผู้จัดการ
exit();

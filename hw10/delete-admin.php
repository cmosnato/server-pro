<?php
session_start();
include 'db_connection.php';

// ตรวจสอบการเข้าสู่ระบบของผู้จัดการ
if (!isset($_SESSION['manager_username'])) {
    header("Location: manager-login.php");
    exit();
}

// ตรวจสอบว่ามี ID ถูกส่งมาหรือไม่
if (!isset($_GET['id'])) {
    die('ไม่พบ ID ของผู้ดูแลระบบ');
}

// ดึงค่า ID ของผู้ดูแลระบบที่ต้องการลบ
$id = $_GET['id'];

// ตรวจสอบว่าผู้ดูแลระบบที่จะลบไม่ใช่ผู้ดูแลระบบที่เข้าสู่ระบบอยู่
if ($_SESSION['admin_id'] == $id) {
    die('คุณไม่สามารถลบผู้ดูแลระบบที่กำลังเข้าสู่ระบบอยู่');
}

// ลบผู้ดูแลระบบออกจากฐานข้อมูล
$query = "DELETE FROM admin WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // ลบสำเร็จ เปลี่ยนเส้นทางกลับไปยังหน้าแดชบอร์ดผู้จัดการ
    header("Location: manager-dashboard.php");
    exit();
} else {
    die('เกิดข้อผิดพลาดในการลบผู้ดูแลระบบ');
}
?>

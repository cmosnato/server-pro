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
    die('ไม่พบ ID ของผู้ดูแลระบบ');
}

// ดึงข้อมูลผู้ดูแลระบบจากฐานข้อมูล
$id = $_GET['id'];
$query = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    die('ไม่พบผู้ดูแลระบบ');
}

$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลผู้ดูแลระบบ</title>
</head>
<body>
    <h1>แก้ไขข้อมูลผู้ดูแลระบบ</h1>
    <form action="update-admin.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
        <label for="email">อีเมล:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
        <br>
        <button type="submit">อัปเดต</button>
    </form>
    <button onclick="location.href='manager-dashboard.php'">กลับ</button>
</body>
</html>

<?php
session_start();

// ตรวจสอบว่าแอดมินเข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['is_admin_logged_in']) || $_SESSION['is_admin_logged_in'] !== true) {
    header("Location: admin-login.php");
    exit();
}

include 'db_connection.php';

// เมื่อฟอร์มถูกส่งมา
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $remain = $_POST['remain'];
    $img_file = $_POST['img_file']; // หรือใช้การอัปโหลดรูปภาพแทน

    // ตรวจสอบว่าไม่มีฟิลด์ใดว่างเปล่า
    if (empty($name) || empty($detail) || empty($price) || empty($remain) || empty($img_file)) {
        $error_message = "กรุณากรอกข้อมูลให้ครบทุกฟิลด์";
    } else {
        // เพิ่มข้อมูลสินค้าใหม่เข้าสู่ฐานข้อมูล
        $insert_query = "INSERT INTO product (name, detail, price, remain, img_file) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssdis", $name, $detail, $price, $remain, $img_file);

        if ($stmt->execute()) {
            header("Location: admin-dashboard.php"); // เปลี่ยนเส้นทางไปยังหน้าแดชบอร์ดเมื่อเพิ่มสินค้าสำเร็จ
            exit();
        } else {
            $error_message = "เกิดข้อผิดพลาดในการเพิ่มสินค้า";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้าใหม่</title>
</head>
<body>
    <h1>เพิ่มสินค้าใหม่</h1>
    
    <?php if (isset($error_message)): ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="name">ชื่อสินค้า:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="detail">รายละเอียดสินค้า:</label><br>
        <textarea id="detail" name="detail" required></textarea><br><br>

        <label for="price">ราคา (บาท):</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <label for="remain">คงเหลือ:</label><br>
        <input type="number" id="remain" name="remain" required><br><br>

        <label for="img_file">ชื่อไฟล์รูปภาพ:</label><br>
        <input type="text" id="img_file" name="img_file" required><br><br>

        <button type="submit">เพิ่มสินค้า</button>
    </form>

    <br>
    <a href="admin-dashboard.php">กลับไปที่แดชบอร์ด</a>
</body>
</html>

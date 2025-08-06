<?php
session_start();

// ตรวจสอบว่าแอดมินเข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['is_admin_logged_in']) || $_SESSION['is_admin_logged_in'] !== true) {
    header("Location: admin-login.php");
    exit();
}

include 'db_connection.php';

// ตรวจสอบว่ามี ID ของสินค้าที่จะทำการแก้ไข
if (!isset($_GET['id'])) {
    die('ไม่มี ID ของสินค้าที่ต้องการแก้ไข');
}

$product_id = $_GET['id'];

// ดึงข้อมูลสินค้าที่ต้องการแก้ไข
$query = "SELECT * FROM product WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die('ไม่พบสินค้าที่ต้องการแก้ไข');
}

$product = $result->fetch_assoc();

// เมื่อฟอร์มถูกส่งมา
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $remain = $_POST['remain'];
    $img_file = $_POST['img_file']; // หรือใช้การอัปโหลดรูปภาพแทน

    // อัปเดตข้อมูลสินค้าในฐานข้อมูล
    $update_query = "UPDATE product SET name = ?, detail = ?, price = ?, remain = ?, img_file = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssdisi", $name, $detail, $price, $remain, $img_file, $product_id);

    if ($stmt->execute()) {
        header("Location: admin-dashboard.php"); // เปลี่ยนเส้นทางกลับไปที่หน้าแดชบอร์ด
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตสินค้า";
    }
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสินค้า</title>
</head>
<body>
    <h1>แก้ไขสินค้า</h1>
    <form action="" method="POST">
        <label for="name">ชื่อสินค้า:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

        <label for="detail">รายละเอียดสินค้า:</label><br>
        <textarea id="detail" name="detail" required><?php echo htmlspecialchars($product['detail']); ?></textarea><br><br>

        <label for="price">ราคา (บาท):</label><br>
        <input type="number" step="0.01" id="price" name="price" value="<?php echo $product['price']; ?>" required><br><br>

        <label for="remain">คงเหลือ:</label><br>
        <input type="number" id="remain" name="remain" value="<?php echo $product['remain']; ?>" required><br><br>

        <label for="img_file">ชื่อไฟล์รูปภาพ:</label><br>
        <input type="text" id="img_file" name="img_file" value="<?php echo htmlspecialchars($product['img_file']); ?>" required><br><br>

        <button type="submit">บันทึกการแก้ไข</button>
    </form>

    <br>
    <a href="admin-dashboard.php">กลับไปที่แดชบอร์ด</a>
</body>
</html>

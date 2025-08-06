<?php
session_start();

// ตรวจสอบว่าแอดมินเข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['is_admin_logged_in']) || $_SESSION['is_admin_logged_in'] !== true) {
    header("Location: admin-login.php");
    exit();
}

include 'db_connection.php';

// ฟังก์ชันลบสินค้า
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // ลบสินค้าจากฐานข้อมูล
    $delete_query = "DELETE FROM product WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        $message = "ลบสินค้าสำเร็จ";
    } else {
        $message = "เกิดข้อผิดพลาดในการลบสินค้า";
    }
}

// ดึงรายการสินค้าทั้งหมด
$query = "SELECT * FROM product";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลบสินค้า</title>
</head>
<body>
    <h1>ลบสินค้า</h1>

    <?php if (isset($message)): ?>
        <p style="color:green;"><?php echo $message; ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา (บาท)</th>
            <th>คงเหลือ</th>
            <th>จัดการ</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['remain']; ?></td>
                    <td>
                        <a href="admin-delete-product.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('คุณแน่ใจว่าต้องการลบสินค้านี้?');">ลบ</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">ไม่มีสินค้าในระบบ</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>
    <a href="admin-dashboard.php">กลับไปที่แดชบอร์ด</a>
</body>
</html>

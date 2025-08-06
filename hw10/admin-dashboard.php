<?php
session_start();

// ตรวจสอบว่าแอดมินเข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['is_admin_logged_in']) || $_SESSION['is_admin_logged_in'] !== true) {
    header("Location: admin-login.php"); // เปลี่ยนเส้นทางไปยังหน้าล็อกอินถ้ายังไม่ได้เข้าสู่ระบบ
    exit();
}

include 'db_connection.php';

// ดึงสินค้าทั้งหมดจากฐานข้อมูล
$query = "SELECT * FROM product";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ดแอดมิน</title>
</head>
<body>
    <h1>ยินดีต้อนรับสู่แดชบอร์ดของแอดมิน</h1>
    <p>คุณเข้าสู่ระบบด้วยชื่อผู้ใช้: <?php echo $_SESSION['admin_username']; ?></p>

    <!-- แสดงสินค้าทั้งหมด -->
    <h2>รายการสินค้า</h2>
    <table border="1">
        <tr>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียด</th>
            <th>ราคา (บาท)</th>
            <th>คงเหลือ</th>
            <th>รูปภาพ</th>
            <th>จัดการ</th>
        </tr>
        <?php while ($product = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['detail']); ?></td>
            <td><?php echo number_format($product['price'], 2); ?></td>
            <td><?php echo $product['remain']; ?></td>
            <td><img src="<?php echo htmlspecialchars($product['img_file']); ?>" width="100" alt="<?php echo htmlspecialchars($product['name']); ?>"></td>
            <td>
                <a href="admin-edit-product.php?id=<?php echo $product['id']; ?>">แก้ไข</a> |
                <a href="admin-delete-product.php?id=<?php echo $product['id']; ?>" onclick="return confirm('คุณแน่ใจหรือว่าต้องการลบสินค้านี้?');">ลบ</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="admin-add-product.php">เพิ่มสินค้าใหม่</a>
    <br><br>
    <button onclick="location.href='index.php'">กลับไปยังรายการสินค้า</button>
    <a href="logout.php">ออกจากระบบ</a>
</body>
</html>

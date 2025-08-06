<?php
session_start();
include 'db_connection.php';

// ตรวจสอบว่ามี id ของสินค้าใน URL หรือไม่
if (!isset($_GET['id'])) {
    die('ไม่มีสินค้า');
}

$id = $_GET['id'];

// ดึงข้อมูลสินค้าเฉพาะจากฐานข้อมูล
$query = "SELECT * FROM product WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $product = $result->fetch_assoc();
} else {
    die('ไม่พบสินค้าที่ต้องการ');
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <img src="uploads/<?php echo htmlspecialchars($product['img_file']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 300px; height: 400px;">
    <p>รายละเอียด: <?php echo htmlspecialchars($product['detail']); ?></p>
    <p>ราคา: <?php echo number_format($product['price'], 2); ?> บาท</p>
    <p>จำนวนในสต็อก: <?php echo $product['remain']; ?></p>
    
    <button onclick="location.href='index.php'">กลับไปยังรายการสินค้า</button>
</body>
</html>

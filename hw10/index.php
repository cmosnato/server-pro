<?php
session_start();
include 'db_connection.php';

// ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
$query = "SELECT id, name, price, img_file FROM product";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสินค้า</title>
    <style>
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            width: 160px;
        }

        .product img {
            width: 150px;
            height: 200px;
        }

        .button-container {
            margin-bottom: 20px;
        }

        .button-container button {
            margin-right: 10px;
        }

        .admin-section {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="button-container">
        <?php
        if (isset($_SESSION['username'])): ?>
            <p>ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <button onclick="location.href='logout.php'">ออกจากระบบ</button>

        <?php elseif (isset($_SESSION['is_admin_logged_in']) && $_SESSION['is_admin_logged_in'] === true): ?>
            <button onclick="location.href='admin-dashboard.php'">ไปที่แดชบอร์ดแอดมิน</button>
            <button onclick="location.href='logout.php'">ออกจากระบบ</button>
            <p>ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></p>
        <?php elseif (isset($_SESSION['is_manager_logged_in']) && $_SESSION['is_manager_logged_in'] === true): ?>
            <button onclick="location.href='manager-dashboard.php'">ไปที่แดชบอร์ดแอดมิน</button>
            <button onclick="location.href='logout.php'">ออกจากระบบ</button>
            <p>ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['manager_username']); ?></p>

        <?php else: ?>
            <button onclick="location.href='user-login.php'">เข้าสู่ระบบ (ผู้ใช้)</button>
            <button onclick="location.href='admin-login.php'">เข้าสู่ระบบ (แอดมิน)</button>
            <button onclick="location.href='manager-login.php'">เข้าสู่ระบบ (ผู้จัดการ)</button>
        <?php endif; ?>
    </div>

    <h1>รายการสินค้า</h1>
    <div id="product-list">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <img src="uploads/<?php echo htmlspecialchars($row['img_file']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p>ราคา: <?php echo number_format($row['price'], 2); ?> บาท</p>
                    <button onclick="location.href='product-details.php?id=<?php echo $row['id']; ?>'">ดูรายละเอียด</button>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>ไม่มีสินค้าในระบบ</p>
        <?php endif; ?>
    </div>

</body>

</html>
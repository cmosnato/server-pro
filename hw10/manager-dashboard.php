<?php
session_start();
include 'db_connection.php';

// ตรวจสอบการเข้าสู่ระบบของผู้จัดการ
if (!isset($_SESSION['manager_username'])) {
    header("Location: manager-login.php");
    exit();
}

// ดึงข้อมูลผู้ใช้ทั้งหมด
$user_query = "SELECT id, username, email FROM users";
$user_result = $conn->query($user_query);

// ดึงข้อมูลแอดมินทั้งหมด
$admin_query = "SELECT id, username, email FROM admin";
$admin_result = $conn->query($admin_query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แดชบอร์ดผู้จัดการ</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button-delete {
            background-color: red;
        }
    </style>
</head>
<body>

    <h1>แดชบอร์ดผู้จัดการ</h1>
    <p>ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION['manager_username']); ?></p>
    <button onclick="location.href='logout.php'">ออกจากระบบ</button>

    <h2>จัดการบัญชีผู้ใช้</h2>
    <a href="add-user.php" class="button">เพิ่มผู้ใช้</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อผู้ใช้</th>
                <th>อีเมล</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($user_result->num_rows > 0): ?>
                <?php while($user = $user_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <a href="edit-user.php?id=<?php echo $user['id']; ?>" class="button">แก้ไข</a>
                            <a href="delete-user.php?id=<?php echo $user['id']; ?>" class="button button-delete" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้นี้?')">ลบ</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">ไม่มีผู้ใช้ในระบบ</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>จัดการบัญชีผู้ดูแลระบบ</h2>
    <a href="add-admin.php" class="button">เพิ่มแอดมิน</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อผู้ใช้</th>
                <th>อีเมล</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($admin_result->num_rows > 0): ?>
                <?php while($admin = $admin_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $admin['id']; ?></td>
                        <td><?php echo htmlspecialchars($admin['username']); ?></td>
                        <td><?php echo htmlspecialchars($admin['email']); ?></td>
                        <td>
                            <a href="edit-admin.php?id=<?php echo $admin['id']; ?>" class="button">แก้ไข</a>
                            <a href="delete-admin.php?id=<?php echo $admin['id']; ?>" class="button button-delete" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ดูแลระบบนี้?')">ลบ</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">ไม่มีผู้ดูแลระบบในระบบ</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>

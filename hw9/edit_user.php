<?php
session_start();
include 'db_connection.php';

// ตรวจสอบว่าผู้ใช้ล็อกอินแล้วหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// กำหนดค่าเริ่มต้น
$username = $_SESSION['username'];
$message = "";

// ตรวจสอบการส่งข้อมูลจากแบบฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าจากแบบฟอร์ม
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $province = $_POST['province'];

    // อัปเดตข้อมูลในฐานข้อมูล
    $query = "UPDATE users SET name = ?, surname = ?, email = ?, gender = ?, age = ?, province = ? WHERE username = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // ผูกตัวแปรกับคำสั่ง SQL
    $stmt->bind_param("sssssss", $name, $surname, $email, $gender, $age, $province, $username);

    // เรียกใช้งานคำสั่ง
    if ($stmt->execute()) {
        $message = "User information updated successfully.";
    } else {
        $message = "Error: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
}

// ดึงข้อมูลปัจจุบันของผู้ใช้
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User Information</h2>
    <?php if ($message) echo "<p>$message</p>"; ?>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($user['surname']); ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" required><br>

        <label for="province">Province:</label>
        <input type="text" id="province" name="province" value="<?php echo htmlspecialchars($user['province']); ?>" required><br>

        <input type="submit" value="Update">
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>

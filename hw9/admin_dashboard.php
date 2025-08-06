<?php
session_start();

// ตรวจสอบสถานะการล็อกอิน
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Admin') {
    header('Location: index.html');
    exit();
}

include 'db_connection.php';

// ดึงข้อมูลลูกค้าทั้งหมด
$query = "SELECT * FROM users WHERE role = 'Customer'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, Admin!</h2>
    
    <h3>Customer Accounts</h3>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Province</th>
            <th>Actions</th>
        </tr>
        <?php while ($user = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['surname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['gender']; ?></td>
                <td><?php echo $user['age']; ?></td>
                <td><?php echo $user['province']; ?></td>
                <td>
                    <form action="edit_user.php" method="POST" style="display:inline;">
                        <input type="hidden" name="username" value="<?php echo $user['username']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                    <form action="delete_user.php" method="POST" style="display:inline;">
                        <input type="hidden" name="username" value="<?php echo $user['username']; ?>">
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h3>Add New Customer</h3>
    <form action="add_user.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <label for="age">Age:</label>
        <input type="number" name="age" required>
        <label for="province">Province:</label>
        <input type="text" name="province" required>
        <input type="submit" value="Add Customer">
    </form>

    <form action="logout.php" method="POST">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
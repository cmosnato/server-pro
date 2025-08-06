<?php
session_start();

// ตรวจสอบสถานะการล็อกอิน
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit();
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    
    <h3>Your Details:</h3>
    <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
    <p><strong>Surname:</strong> <?php echo $_SESSION['surname']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>Gender:</strong> <?php echo $_SESSION['gender']; ?></p>
    <p><strong>Age:</strong> <?php echo $_SESSION['age']; ?></p>
    <p><strong>Province:</strong> <?php echo $_SESSION['province']; ?></p>
    <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>

    <form action="logout.php" method="POST">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
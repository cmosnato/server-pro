<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $province = $_POST['province'];
    $email = $_POST['email'];

   

    // ตรวจสอบการยืนยันรหัสผ่าน
    if ($password !== $confirm_password) {
        die('Passwords do not match.');
    }

    // เข้ารหัสรหัสผ่าน
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ตรวจสอบว่าชื่อผู้ใช้หรืออีเมล์ซ้ำกันหรือไม่
    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die('Username or email already exists.');
    }

    // เพิ่มข้อมูลลูกค้า
    $query = "INSERT INTO users (username, password, name, surname, gender, age, province, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssiis", $username, $hashed_password, $name, $surname, $gender, $age, $province, $email);

    if ($stmt->execute()) {
        echo 'Registration successful!';
    } else {
        echo 'Registration failed: ' . $conn->error;
    }
}
?>

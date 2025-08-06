<?php
 
 require('dbconnect.php');
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['name'];
    $lastName = $_POST['surname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $province = $_POST['province'];
    $email = $_POST['email'];
 
   
 
    $stmt = "INSERT INTO mydata (
              username, password, firstName, lastName, gender, age, province, email)
              VALUES('$username','$password','$firstName','$lastName','$gender','$age','$province','$email')";
 
    $result = mysqli_query($conn,$stmt);
 
   
 
?>
<?php
//Object Oriented style
$mysqli = new mysqli('localhost', 'root', '', 'company');
if ($mysqli -> connect_errno) {
      echo "Failed to connect to Database: " . $mysqli -> connect_error;
      exit();
}
$sql = "INSERT INTO person (`firstname`, `lastname`, `age`) 
   VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
?>
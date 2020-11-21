<?php
$servername = "localhost:3308";
$username = "root";
$password = '';
$dbname = "mohid_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("connection_aborted() failed: " . $conn->connect_error);
}

$user=$_GET['username'];
$name=$_GET['name'];
$pass=$_GET['password'];
$birthday=$_GET['birthday'];
$city=$_GET['city'];
$phone=$_GET['phone_number'];
$gender = $_GET['gender'];



$sql = "INSERT INTO `user` (username,password,name,birthday,city,gender,phone_number) VALUES ('$user', '$pass', '$name', '$birthday', '$city', '$gender', '$phone')";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully" . '<br>';
  echo "<a href='index.html' target='_blank'>Click here to go back</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



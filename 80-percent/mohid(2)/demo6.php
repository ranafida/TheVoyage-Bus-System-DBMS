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

$driverID=$_GET['driverID'];
$busID=$_GET['busID'];
$salary=$_GET['salary'];
$drivingType=$_GET['drivingType'];
$username=$_GET['username'];
$email=$_GET['email'];
$password = $_GET['password'];
$msg = "None";



$sql = "INSERT INTO `driver` (driverID,busID,salary,drivingType,username,password,email,Message_rcv) VALUES ('$driverID', '$busID', '$salary', '$drivingType', '$username','$password', '$email','$msg')";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully" . '<br>';
  echo "<a href='index.html' target='_blank'>Click here to go back</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



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

$ID=$_GET['ID'];
$Bus_type=$_GET['Bus_type'];
$Liscense_no=$_GET['Liscense_no'];
$Assigned_driver=$_GET['Assigned_driver'];
$condition_or=$_GET['condition_or'];
$recent_trips=$_GET['recent_trips'];
$Bus_capacity = $_GET['Bus_capacity'];
$Fuel_condition = $_GET['Fuel_condition'];
$state = $_GET['state'];



$sql = "INSERT INTO `Bus` (ID,Bus_type,Liscense_no,Assigned_driver,condition_or,recent_trips,Bus_capacity,Fuel_condition,state) VALUES ('$ID', '$Bus_type', '$Liscense_no', '$Assigned_driver', '$condition_or', '$recent_trips', '$Bus_capacity','$Fuel_condition','$state')";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully" . '<br>';
  echo "<a href='index.html' target='_blank'>Click here to go back</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



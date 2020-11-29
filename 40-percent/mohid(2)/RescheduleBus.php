<?php
$servername = "localhost:3308";
$username = "root";
$password = '';
$dbname = "mohid_final";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$Bus_id=$_GET['busID'];
$time = $_GET['time'];
$date = $_GET['date'];
$sql = "UPDATE trips SET time = '$time', date='$date' WHERE bus_id = '$Bus_id' AND status = 'upcoming'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
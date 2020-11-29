<?php
$servername = "localhost:3308";
$username = "root";
$password = '';
$dbname = "mohid_final";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$ID=$_GET['ID'];

// sql to delete a record
$sql = "DELETE FROM driver WHERE driverID=$ID";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
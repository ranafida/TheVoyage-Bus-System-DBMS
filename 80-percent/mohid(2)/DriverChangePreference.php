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
$new = $_GET['new'];

$sql = "UPDATE driver SET Preference = '$new' WHERE driverID = '$ID'";

if (mysqli_query($conn, $sql)) {
 	 echo "Record updated successfully";
} else {
	 echo "Error updating record: " . mysqli_error($conn);
}



$conn->close();
?>
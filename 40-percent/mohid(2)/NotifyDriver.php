<?php
$servername = "localhost:3308";
$username = "root";
$password = '';
$dbname = "mohid_final";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("connection_aborted() failed: " . $conn->connect_error);
}

$ID = $_GET['Id'];
$Message=$_GET['message'];

 //$sql = "SHOW TABLES"; 
$sql = "UPDATE driver SET Message_rcv='$Message'  WHERE driverID = '$ID'";

if (mysqli_query($conn, $sql)) {
    echo "Message sent to driver successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  



$conn->close();
?>
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

$name = $_GET['name'];

echo $name;
 //$sql = "SHOW TABLES"; 
// $sql = "DELETE FROM promo WHERE name=$name";
$sql = "DELETE from promo WHERE name = '$name' ";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } 
else {
    echo "Error updating record: " . mysqli_error($conn);
}
  



$conn->close();
?>
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
 
$validDate=$_GET['validDate'];
$discount = $_GET['discount'];

 //$sql = "SHOW TABLES"; 
$sql = "INSERT INTO `promo` (name,validity, amount) VALUES ('$name' , '$validDate', '$discount')";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    // echo '<script type="text/JavaScript"> 
    //     alert("hi");
    // </script>';
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  



$conn->close();
?>
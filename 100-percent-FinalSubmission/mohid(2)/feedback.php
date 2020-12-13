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

$username=$_GET['Name'];
$comp=$_GET['Message'];
echo "$comp";
 //$sql = "SHOW TABLES"; 
$sql = "INSERT INTO `feedback` (username,complain) VALUES ('$username', '$comp')";
if ($conn->query($sql) === TRUE){
  echo "New record created successfully" . '<br>';
  echo "<a href='index.html' target='_blank'>Click here to go back</a>";
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();
?>
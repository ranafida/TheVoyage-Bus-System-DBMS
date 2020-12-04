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

$date=$_GET['date'];


$sql = "SELECT distinct(driverID),salary FROM `driver`";
$result=$conn->query($sql);

while($row = $result->fetch_assoc()){ 

	$ID=$row['driverID'];
	$S=$row['salary'];

	$sql2 = "INSERT INTO `salary` (driverID,income,date) VALUES ('$ID', '$S','$date')";
	$conn->query($sql2);
	 print_r($ID);
	 echo "  ";
	 print_r($S);
	}

$conn->close();
?>



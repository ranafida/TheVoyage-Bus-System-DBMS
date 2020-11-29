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

$busID=$_GET['busID'];	
$month=$_GET['month'];


$sql = "SELECT sum(price) FROM `ticket` WHERE busID = '$busID' AND date like '%-$month-%'";
$result=$conn->query($sql);

while($row = $result->fetch_assoc()){ 	
	 print_r($row);
	}


// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully" . '<br>';
//   echo "<a href='index.html' target='_blank'>Click here to go back</a>";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>



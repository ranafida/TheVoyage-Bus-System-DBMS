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

$Driver_id=$_GET['driverID'];
 //$sql = "SHOW TABLES"; 
$sql = "SELECT * FROM driver WHERE driverID = '$Driver_id'";
$result=$conn->query($sql);

	echo "<table border='1'>
	<tr>

	<th>Driver ID</th>

	<th>Bus ID</th>

	<th>Salary</th>

	<th>Driving Type</th>

	<th>Username</th>

	<th>Email</th>

	</tr>";


while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>" . $row['driverID'] . "</td><td>". $row['busID'].  "</td><td>".$row['salary']. "</td><td>".$row['drivingType'].  "</td><td>".$row['username']. "</td><td>".$row['email'];
  //$row['index'] the index here is a field name
}

echo "</table>"; 



$conn->close();
?>
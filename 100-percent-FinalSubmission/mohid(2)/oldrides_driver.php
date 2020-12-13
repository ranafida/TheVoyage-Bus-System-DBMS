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
$sql = "SELECT * FROM trips WHERE driver_id = '$Driver_id' AND status = 'Completed'";
$result=$conn->query($sql);

if (!empty($result))
{
	echo "<table border='1'>
	<tr>

	<th>Trip ID</th>

	<th>Pickup Location</th>

	<th>Driver ID</th>

	<th>Dropoff Location</th>

	<th>Number of Passengers</th>

	<th>Bus ID</th>

	<th>Status</th>

	</tr>";


while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>" . $row['trip_id'] . "</td><td>". $row['pickup_location']. "</td><td>". $row['driver_id'].  "</td><td>".$row['dropoff_location']. "</td><td>".$row['no_passengers']. "</td><td>".$row['bus_id']. "</td><td>".$row['status'];
  //$row['index'] the index here is a field name
}


echo "</table>"; 
}
else
{
	echo "ID NOT FOUND";
}


$conn->close();
?>
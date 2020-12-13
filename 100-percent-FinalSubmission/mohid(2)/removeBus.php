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

$Bus_id=$_GET['busID'];
 //$sql = "SHOW TABLES"; 
$sql = "SELECT * FROM bus WHERE ID = '$Bus_id'";
$result=$conn->query($sql);

	echo "<table border='1'>
	<tr>

	<th>ID</th>

	<th>Bus Type</th>

	<th>Liscense Number</th>

	<th>Assigned Driver</th>

	<th>Condition</th>

	<th>Recent trips</th>

	<th>Bus Capacity</th>

	<th>Fuel Capacity</th>

	<th>State</th>

	</tr>";

while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>" . $row['ID'] ."</td><td>". $row['Bus_type'].  "</td><td>".$row['Liscense_no'].  "</td><td>".$row['Assigned_driver']. "</td><td>".$row['condition_or']. "</td><td>".$row['recent_trips']. "</td><td>".$row['Bus_capacity']. "</td><td>".$row['Fuel_condition']. "</td><td>".$row['state'];
  //$row['index'] the index here is a field name
}

echo "</table>"; 



$conn->close();
?>
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

$name=$_GET['name'];
 //$sql = "SHOW TABLES"; 
$sql = "SELECT * FROM ticket WHERE ticket_holder_name = '$name'";
$result=$conn->query($sql);

	echo "<table border='1'>
	<tr>

	<th>Pickup Location</th>

	<th>Dropoff Location</th>

	<th>Time</th>

	<th>Date</th>

	</tr>";

while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>" . $row['departure'] ."</td><td>". $row['destination'].  "</td><td>".$row['time'].  "</td><td>".$row['date'];
  //$row['index'] the index here is a field name
}

echo "</table>"; 



$conn->close();
?>
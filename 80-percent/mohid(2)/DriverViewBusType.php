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

$Driver_id=$_GET['name'];
 //$sql = "SHOW TABLES"; 
$sql = "SELECT * FROM bus WHERE Assigned_driver = '$Driver_id'";
$result=$conn->query($sql);
if (!empty($result))
{
	echo "<table border='1'>
	<tr>

	<th>Bus Type</th>


	</tr>";

while($row = $result->fetch_assoc()){   //Creates a loop to loop through results

echo "<tr><td>" . $row['Bus_type'];
  //$row['index'] the index here is a field name
}
	echo "</table>"; 

}
else
{
	// echo "string";
	echo "NOT FOUND";
}



$conn->close();
?>
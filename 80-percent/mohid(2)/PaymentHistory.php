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

$Id=$_GET['ID'];

$sql = "SELECT distinct(date),income FROM `salary` where driverID=$Id";
$result=$conn->query($sql);

if (!empty($result))
{
	echo "<table border='1'>
	<tr>
	<th>Date</th>
	<th>Salary</th>
	</tr>";


while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>" . $row['date'] . "</td><td>". $row['income'];
  //$row['index'] the index here is a field name
}


echo "</table>"; 
}


// while($row = $result->fetch_assoc()){ 

// 	$date=$row['date'];
// 	$S=$row['salary'];

// 	$conn->query($sql2);
// 	 print_r($ID);
// 	 echo "  ";
// 	 print_r($S);
// 	}

$conn->close();
?>



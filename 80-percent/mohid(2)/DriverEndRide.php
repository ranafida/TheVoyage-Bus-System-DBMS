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

$Trip_ID=$_GET['ID'];
#echo $Trip_ID;
$status = 'Completed';
$check = "SELECT status from trips where trip_id = '$Trip_ID'";
if ($conn->query($check)) {
 		 #echo "Record updated successfully";
	} else {
  	#echo "Error updating record: " . mysqli_error($conn);
	}

$result= $conn->query($check);
$result_1= $result->fetch_assoc();
$f= $result_1['status'];

$new = '';
#echo $f;

if ($f === 'Current')
{
	$sql = "UPDATE trips SET status = '$status' WHERE trip_id = '$Trip_ID'";

	if (mysqli_query($conn, $sql)) {
 		 echo "Record updated successfully";
	} else {
  	echo "Error updating record: " . mysqli_error($conn);
	}
}
else
{

	#echo $check;
	echo "The Trip you entered has not started yet or already completed";
}
 

	


$conn->close();
?>
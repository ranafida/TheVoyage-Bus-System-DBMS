<?php
$servername = "localhost:3308";
$username = "root";
$password = '';
$dbname = "mohid_final";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("connection_aborted() failed: " . $conn->connect_error);
}

$tickID = $_GET['tickID'];
$tripID = $_GET['tripID'];

//$sql = "SELECT * FROM ticket INNER JOIN trips ON ticket.busID= trips.bus_id";

//  $sql = "DELETE from ticket WHERE ticket_id = '$ID' ";
$sql = "DELETE ticket FROM ticket INNER JOIN trips ON ticket.trip_id = trips.trip_id WHERE trips.status='Upcoming'";
$sql2 = "UPDATE trips SET no_passengers = no_passengers-1 WHERE trip_id = $tripID";


// $result=$conn->query($sql);
// while($row = $result->fetch_assoc()){ 	
// 	 print_r($row);
// 	}

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } 
else {
    echo "Error updating record: " . mysqli_error($conn);
}
  



$conn->close();
?>
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

$Dropoff_location=$_GET['dropoff_location'];
$Pickup_location=$_GET['pickup_location'];
$Time=$_GET['time'];
$Date=$_GET['date'];
 //$sql = "SHOW TABLES"; 
$sql = "SELECT * FROM trips WHERE pickup_location = '$Pickup_location' AND dropoff_location='$Dropoff_location' AND status = 'Upcoming'";
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


//if (!isset($_POST['submit'])) {
   // echo 'you have hit the submit button';

//$Trip_id=$_GET['trip_id'];
//$no_tickets$_GET['No_tickets'];
//$Name=$_GET['name'];

$conn->close();
?>


<div class="register">
		  	  <form method="get" action="Booking(1).php"> 
				 <div class="register-top-grid">
					<h3>PLEASE ENTER FOLLOWING THINGS</h3>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Name</span>
						<input type="text" name="name"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Date<label></label></span>
						 <input type="text" name="date"> 
					 </div>

					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Trip ID<label></label></span>
						<input type="text" name="tripID"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>No. Of tickets<label></label></span>
						 <input type="text" name="tickets"> 
					 </div>

					 <input class= "good-button" type="submit" value="Book">
				</form>
</div>




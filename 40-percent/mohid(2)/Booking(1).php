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

$Name=$_GET['name'];
$Date=$_GET['date'];
$Trip_ID=$_GET['tripID'];
$no_tickets=$_GET['tickets'];


 //$sql = "SHOW TABLES";
$sql= "SELECT * FROM trips WHERE trip_id='$Trip_ID'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$dropoff_location=$row['dropoff_location'];
$pickup_location= $row['pickup_location'];
$busID = $row['bus_id'];
$No_passengers=$row['no_passengers'];
$og_count=$No_passengers;
$count = mysqli_num_rows($result);
//echo "no_pass ".  $No_passengers. '<br>';
//echo "Bus_id ". $busID.'<br>';

if($count == 1) {


$sql_bus="SELECT * FROM bus WHERE ID = '$busID' ";
$result_bus= $conn->query($sql_bus);
$row_bus = $result_bus->fetch_assoc();

$Bus_capacity=$row_bus['Bus_capacity'];
//echo "Bus Capacity ".  $Bus_capacity. '<br>';

$new_count=$og_count + $no_tickets;
$Check=false;
if ($new_count>$Bus_capacity)
{
	$Diff=$Bus_capacity-$No_passengers;
	echo "BUS IS FULL <br>Bus Capacity: ". $Bus_capacity."<br>Current Capacity: ".$No_passengers."<br>You can only buy: ".$Diff." tickets<br>";
	$Check=true;
}
$i=0;
for (;$i<$no_tickets;$i++)
{
	if ($Check===true)
	{
		break;
	}

$sql = "INSERT INTO `ticket` (ticket_id,ticket_holder_name,time,destination,departure,price,date,busID) VALUES ('$i','$Name', '15', '$dropoff_location', '$pickup_location', '5','$Date', '$busID')";
$conn->query($sql);
}



$new_value=$No_passengers + $i;
$sql_2="UPDATE `trips` SET `no_passengers` = '$new_value' WHERE bus_id='$busID'";
$conn->query($sql_2);

//echo "Terminated";
if ($Check===false)
{
	echo "Name: ".$Name."<br>Trip ID: ".$Trip_ID."<br>Numbers of Tickets: ".$no_tickets. "<br>Departure: ".$pickup_location."<br>Destination: ".$dropoff_location;
}

}

else {
         $error = "Invalid Trip ID";
         echo $error;
      }



$conn->close();
?>
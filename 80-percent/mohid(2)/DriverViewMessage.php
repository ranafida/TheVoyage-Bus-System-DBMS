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

$id=$_GET['ID'];	

$sql = "SELECT Message_rcv FROM `driver` WHERE driverID = '$id'";
$result=$conn->query($sql);
$new = "";
while($row = $result->fetch_assoc()){ 	
	 $new = $row['Message_rcv'];
	 
	}


echo '<div class="my_class" style="color: blue;">'.$new.'</div>';

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully" . '<br>';
//   echo "<a href='index.html' target='_blank'>Click here to go back</a>";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>



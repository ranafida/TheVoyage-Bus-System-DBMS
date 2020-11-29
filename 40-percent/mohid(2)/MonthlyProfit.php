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

$month=$_GET['month'];


$sql = "SELECT sum(price) as revenue FROM `ticket` WHERE date like '%-$month-%'";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result); 
$revenue = $row['revenue'];
echo $revenue;
echo "         ";

$sql = "SELECT sum(distinct(cost)) as cost FROM `ticket` as T,`bus` as B WHERE date like '%-$month-%' and T.busID=B.ID";
$res=$conn->query($sql);
$row2 = mysqli_fetch_assoc($res); 
$cost = $row2['cost'];
echo $cost;
echo "  ";

$profit= $revenue- $cost;
echo "profit is ";
echo "$profit";




// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully" . '<br>';
//   echo "<a href='index.html' target='_blank'>Click here to go back</a>";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>



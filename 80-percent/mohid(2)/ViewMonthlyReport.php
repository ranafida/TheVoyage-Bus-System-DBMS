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


$sql = "SELECT sum(price) as revenue, count(distinct(busID)) as buses, COUNT(*) as tuples FROM `ticket` WHERE date like '%-$month-%'";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result); 
$revenue = $row['revenue'];
$number_of_buses= $row['buses'];
$number_of_ticket= $row['tuples'];


$sql = "SELECT sum(distinct(cost)) as cost FROM `ticket` as T,`bus` as B WHERE date like '%-$month-%' and T.busID=B.ID";
$res=$conn->query($sql);
$row2 = mysqli_fetch_assoc($res); 
$cost = $row2['cost'];


$sql2 = "SELECT sum(income) as driver_cost FROM `salary` WHERE date like '%-$month-%' ";
$res2=$conn->query($sql2);
$row3 = mysqli_fetch_assoc($res2); 
$cost2 = $row3['driver_cost'];



$profit= $revenue- $cost - $cost2;
// echo "profit is ";
// echo "$profit";

echo "Revenue: ".$revenue."<br>Maintainence & Petrol Cost: ".$cost."<br>Salary Cost: ".$cost2. "<br>Total Buses: ".$number_of_buses."<br>number of tickets sold: ".$number_of_ticket. "<br>profit: ".$profit;


// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully" . '<br>';
//   echo "<a href='index.html' target='_blank'>Click here to go back</a>";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>



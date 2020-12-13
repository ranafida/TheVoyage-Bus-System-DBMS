<!DOCTYPE HTML>
<html>
<head>
<title>The Voyage is a Bus Transportation Service | Add Bus	</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <!--//webfonts-->
<script type="text/javascript" src="js/bootstrap.js"></script>


</head>

<body>
<!-- banner -->
	<div class="banner1">
		<div class="header">
			<div class="container">
				<div class="logo">
					<h1><a href="index.html">The Voyage</a></h1>
				</div>
				<div class="container">
				<nav class="navbar navbar-default navbar-expand-sm" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li ><a href="index.html">Home</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="register.html">Sign Up</a></li>
			
							<li><a href="signin.html">Sign In</a></li>
							<li><a href="adminlogin.html">Admin</a></li>
						</ul>
					</div>
					<!--/.navbar-collapse-->
				</nav>
			</div>

		</div>
	</div>
	</div>
	<style>
		.my-class{

			text-decoration: none;
 			font-size: 1.3em;
  			color: #131313;
  			padding: 0.3em 1.5em 0.3em;
  		
  			display: inline-block;
  			font-weight: 400;
  			
  				display:block;
  			    margin-left: auto;
    			margin-right: auto;
    			width: fit-content;
    			margin-top: 2em;

		}
		.heading{
			font-family: Arial, Helvetica, sans-serif;
			display:block;
  			margin-left: auto;
    		margin-right: auto;
    		width: fit-content;
    		margin-top: 1em;
    		margin-bottom: 3em;

		}
	</style>
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
$Bus_Type=$_GET['bus_type'];

//echo $Bus_Type . "RR<br>";
 //$sql = "SHOW TABLES"; 
$sql = "SELECT DISTINCT * FROM trips WHERE pickup_location = '$Pickup_location' AND dropoff_location='$Dropoff_location' AND status = 'Upcoming'";
$result=$conn->query($sql);

if (!empty($result))
{
	echo '<div class="my-class">'."<table border='1'></div>'
	<tr>

	<th>Trip ID</th>

	<th>Pickup Location</th>

	<th>Driver ID</th>

	<th>Dropoff Location</th>

	<th>Number of Passengers</th>

	<th>Bus ID</th>

	<th>Status</th>

	<th>Time</th>

	<th>Date</th>

	<th>Price</th>

	</tr>";


while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
$Bus_id=$row['bus_id'];
$sql_bus= "SELECT * FROM bus WHERE ID='$Bus_id' AND Bus_type='$Bus_Type'";
$result_bus=$conn->query($sql_bus);
$row_bus = $result_bus->fetch_assoc();
$crr_bus_id=$row_bus['ID'];
$rand_generator=rand(1,5);
$new_time="";
$rand_mins=0;
$check=0;
$time_seperated=explode(":",$Time);
$new_hour=number_format($time_seperated[0])+$rand_generator;
if ($new_hour>=24)
{
	$new_hour=number_format($time_seperated[0])+1;
	if ($new_hour>=24)
	{
		$new_hour=$new_hour-1;
		$rand_mins=rand(number_format($time_seperated[1]+1),59);
		$check=1;
	}
}
if ($new_hour<10)
{
	$new_time="0".$new_hour.":".$time_seperated[1];
}
else
{
	$new_time=$new_hour.":".$time_seperated[1];
}
if ($check==1)
{
	if ($new_hour<10)
	{
		if ($rand_mins<10)
		{
			$new_time="0".$new_hour.":"."0".$rand_mins;
		}
		else
		{
			$new_time="0".$new_hour.":".$rand_mins;	
		}
	}
else
	{
		if ($rand_mins<10)
		{
			$new_time=$new_hour.":"."0".$rand_mins;
		}
		else
		{
			$new_time=$new_hour.":".$rand_mins;	
		}
	}

}


//echo $row_bus['Bus_type']."<br>";
if ($crr_bus_id === $Bus_id)
{


echo "<tr><td>" . $row['trip_id'] . "</td><td>". $row['pickup_location']. "</td><td>". $row['driver_id'].  "</td><td>".$row['dropoff_location']. "</td><td>".$row['no_passengers']. "</td><td>".$row['bus_id']. "</td><td>".$row['status']. "</td><td>".$new_time. "</td><td>".$Date. "</td><td>".$row['price'];
}
  //$row['index'] the index here is a field name
}


echo "</table>"; 
}
else
{
	echo'<div class="my-class">'. "ID NOT FOUND". '</div>';
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
						 <span>Username<label></label></span>
						 <input type="text" name="username"> 
					 </div>
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
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Promo Code<label></label></span>
						 <input type="text" name="promo"> 
					 </div>

					 <input class= "good-button" type="submit" value="Book">
				</form>
</div>












</body>
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

$Name=$_GET['name'];
$Date=$_GET['date'];
$Trip_ID=$_GET['tripID'];
$no_tickets=$_GET['tickets'];
$promo_code=$_GET['promo'];
$Username=$_GET['username'];


 //$sql = "SHOW TABLES";
$sql= "SELECT * FROM trips WHERE trip_id='$Trip_ID'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$dropoff_location=$row['dropoff_location'];
$pickup_location= $row['pickup_location'];
$busID = $row['bus_id'];
$No_passengers=$row['no_passengers'];
$Price=$row['price'];

$og_count=$No_passengers;
//echo "no_pass ".  $No_passengers. '<br>';
//echo "Bus_id ". $busID.'<br>';

$sql_user="SELECT * FROM user WHERE username = '$Username'";
$result_user=$conn->query($sql_user);
$row_user = $result_user->fetch_assoc();
$DOB=$row_user['birthday'];


$sql_bus="SELECT * FROM bus WHERE ID = '$busID' ";
$result_bus= $conn->query($sql_bus);
$row_bus = $result_bus->fetch_assoc();

$Bus_capacity=$row_bus['Bus_capacity'];
$Bus_Type=$row_bus['Bus_type'];
//echo "Bus Capacity ".  $Bus_capacity. '<br>';

$new_count=$og_count + $no_tickets;
$Check=false;
$Current_price;
$final_price;
if ($new_count>$Bus_capacity)
{
	$Diff=$Bus_capacity-$No_passengers;
	echo'<div class="my-class">'. "BUS IS FULL <br>Bus Capacity: ". $Bus_capacity."<br>Current Capacity: ".$No_passengers."<br>You can only buy: ".$Diff." tickets<br>". '</div>';
	$Check=true;
}

$final_price=$Price;
$sql_promo="SELECT * FROM promo WHERE name='$promo_code'";
$result_promo= $conn->query($sql_promo);
$row_promo = $result_promo->fetch_assoc();
$validity_pr=$row_promo['validity'];
$Date_seperated=explode("-",$Date);
$validity_seperated=explode("-",$validity_pr);
if (!empty($validity_pr))
{
	if (number_format($Date_seperated[0])<=number_format($validity_seperated[0]))
	{
		// echo "Date_seperated[1] ".$Date_seperated[1]."validity_seperated[1] ".$validity_seperated[1]."<br>";
		if (number_format($Date_seperated[1])<=number_format($validity_seperated[1]))
		{
			if (number_format($Date_seperated[2])<=number_format($validity_seperated[2]))
			{
				$amount_pr=$row_promo['amount'];
				$final_price=$final_price-$amount_pr;
				echo "Promo Code: Valid<br>";
			}
		}

	}
	else
	{
		if (number_format($Date_seperated[1])<=number_format($validity_seperated[1]))
		{
			if (number_format($Date_seperated[2])<=number_format($validity_seperated[2]))
			{
				$amount_pr=$row_promo['amount'];
				$final_price=$final_price-$amount_pr;
				echo "Promo Code: Valid<br>";
			}
		}
		else
		{
			if (number_format($Date_seperated[2])<=number_format($validity_seperated[2]))
			{
				$amount_pr=$row_promo['amount'];
				$final_price=$final_price-$amount_pr;
				echo "Promo Code: Valid<br>";
			}
		}
	}
}


$i=0;
for (;$i<$no_tickets;$i++)
{
	if ($Check===true)
	{
		break;
	}

$conn->query($sql);
}

//echo $No_passengers;
$discount=0;
$DOB_seperated=explode("-",$DOB);
//echo $DOB_seperated[0]."<br>";
//echo $Date_seperated[0]."<br>";
if ($DOB_seperated[0]===$Date_seperated[0])
{
	if ($DOB_seperated[1]===$Date_seperated[1])
	{
		$discount= 1;
		echo '<div class="my-class">'."Happy Birthday and Happy Discount <br><br>". '</div>';
		//echo "Discount done<br>";
	}
}
$new_value=$No_passengers + $i;
$sql_2="UPDATE `trips` SET `no_passengers` = '$new_value' WHERE bus_id='$busID'";
$conn->query($sql_2);
$total_price=$final_price*$no_tickets;
if ($discount===1)
{
	$total_price=0.5 * $total_price;
}

//echo "Terminated";
if ($Check===false)
{
	echo '<div class="my-class">'."Name: ".$Name."<br>Trip ID: ".$Trip_ID."<br>Numbers of Tickets: ".$no_tickets. "<br>Departure: ".$pickup_location."<br>Destination: ".$dropoff_location."<br>Price: ".$total_price. '</div>';
}

$sql6 = "INSERT INTO `ticket` (ticket_holder_name,time,destination,departure,price,date,busID,trip_id) VALUES ('$Name', '15', '$dropoff_location', '$pickup_location', '$total_price','$Date', '$busID','$Trip_ID')";
$conn->query($sql6);


$conn->close();
?>



</body>
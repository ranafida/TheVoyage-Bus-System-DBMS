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
 			font-size: 1.25em;
  			color: #131313;
  			padding: 0.3em 1.5em 0.3em;
  		
  			display: block;
  			font-weight: 500;

		}
		.heading{
			font-family: Arial, Helvetica, sans-serif;
			display:block;
  			margin-left: auto;
    		margin-right: auto;
    		width: fit-content;
    		margin-top: 1em;
    		margin-bottom: 2em;

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

$busID=$_GET['busID'];	
$month=$_GET['month'];
echo '<h3 class="heading">'."Monthly Revenue".'</h3>';


$sql = "SELECT sum(price) as S FROM `ticket` WHERE busID = '$busID' AND date like '%-$month-%'";
$result=$conn->query($sql);

while($row = $result->fetch_assoc()){ 	
	 // print_r($row);
	 $cost2 = $row['S'];
	 print_r('<div class="my-class">'.'<span style="font-weight:bold;">'."Revenue: ".'</span>'.$cost2.'</div>') ;

	}


// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully" . '<br>';
//   echo "<a href='index.html' target='_blank'>Click here to go back</a>";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>






</body>












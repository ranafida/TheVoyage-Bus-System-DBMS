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



$user = mysqli_real_escape_string($conn,$_GET['Username']);
$pass = mysqli_real_escape_string($conn,$_GET['Password']); 



$sql = "SELECT * FROM admin WHERE Username = '$user' and Password = '$pass' LIMIT 1";
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);
   
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
      
         // echo "successful login" . '<br>';
         // echo "<a href='homepage.html' target='_blank'>Click here to go add/remove Bus</a>"; 
         include('homepage.html');
      }
      else {
         $error = "Access Denied";
         echo $error;
      }


$conn->close();
?>



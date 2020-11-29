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



$user = mysqli_real_escape_string($conn,$_GET['username']);
$pass = mysqli_real_escape_string($conn,$_GET['password']); 



$sql = "SELECT * FROM user WHERE username = '$user' and password = '$pass' LIMIT 1";
      $result = mysqli_query($conn,$sql);
      // echo $result;
      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];
      $count = mysqli_num_rows($result);
   
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         // session_register("user");
         // $_SESSION['login_user'] = $user;
         // header("location: welcome.php");
         echo "successful login" . '<br>';
         //echo "<a href='index.html' target='_blank'>Click here to go back</a>"; 
         include('UserHomePage.html');
}

      
      else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }




// if ($conn->query($sql) === TRUE) {
//   echo "successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>



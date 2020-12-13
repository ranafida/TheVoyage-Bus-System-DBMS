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
// bus
$busType = array("Standard", "Business");
$condition = array("Normal", "New");
$capacity = array(170, 120);
$fuelCond = array("Good","Excellent");
$state = "active";
$petrol = 5000;
$maintenance = 6000;


$id = 6; // both driver and bus
$licence = "LEK";
$driverName = "Driver"; // both driver and bus
$recenttrips = 0;

// driver 
$drivType = array("Standard", "Business");
$drivPrefernce = array("Standard", "Business");
$cities = array('Karachi', 'Lahore', 'Sialkot', 'Faisalabad', 'Rawalpindi', 'Peshawar', 'Saidu Sharif', 'Multan', 'Gujranwala', 'Islamabad', 'Quetta', 'Bahawalpur', 'Sargodha', 'New Mirpur', 'Chiniot', 'Sukkur', 'Larkana', 'Shekhupura', 'Jhang City', 'Rahimyar Khan', 'Gujrat', 'Kasur', 'Mardan', 'Mingaora', 'Dera Ghazi Khan', 'Nawabshah', 'Sahiwal', 'Mirpur Khas', 'Okara', 'Mandi Burewala', 'Jacobabad', 'Saddiqabad', 'Kohat', 'Muridke', 'Muzaffargarh', 'Khanpur', 'Gojra', 'Mandi Bahauddin', 'Abbottabad', 'Dadu', 'Khuzdar', 'Pakpattan', 'Tando Allahyar', 'Vihari', 'Jaranwala', 'Kamalia', 'Kot Addu', 'Nowshera', 'Swabi', 'Dera Ismail Khan', 'Chaman', 'Charsadda', 'Kandhkot', 'Hasilpur', 'Muzaffarabad', 'Mianwali', 'Jalalpur Jattan', 'Bhakkar', 'Zhob', 'Kharian', 'Mian Channun', 'Jamshoro', 'Pattoki', 'Harunabad', 'Toba Tek Singh', 'Shakargarh', 'Hujra Shah Muqim', 'Kabirwala', 'Mansehra', 'Lala Musa', 'Nankana Sahib', 'Bannu', 'Timargara', 'Parachinar', 'Gwadar', 'Abdul Hakim', 'Hassan Abdal', 'Tank', 'Hangu', 'Risalpur Cantonment', 'Karak', 'Kundian', 'Umarkot', 'Chitral', 'Dainyor', 'Kulachi', 'Kotli', 'Gilgit', 'Hyderabad', 'Narowal', 'Khairpur Mir’s', 'Khanewal', 'Jhelum', 'Haripur', 'Shikarpur', 'Rawala Kot', 'Hafizabad', 'Lodhran', 'Malakand', 'Attock', 'Batgram', 'Matiari', 'Ghotki', 'Naushahro Firoz', 'Alpurai', 'Bagh', 'Daggar', 'Bahawalnagar', 'Leiah', 'Tando Muhammad Khan', 'Chakwal', 'Khushab', 'Badin', 'Lakki', 'Rajanpur', 'Dera Allahyar', 'Shahdad Kot', 'Pishin', 'Sanghar', 'Upper Dir', 'Thatta', 'Dera Murad Jamali', 'Kohlu', 'Mastung', 'Dasu', 'Athmuqam', 'Loralai', 'Barkhan', 'Musa Khel Bazar', 'Ziarat', 'Gandava', 'Sibi', 'Dera Bugti', 'Eidgah', 'Turbat', 'Uthal', 'Khuzdar', 'Chilas', 'Kalat', 'Panjgur', 'Gakuch', 'Qila Saifullah', 'Kharan', 'Aliabad', 'Awaran', 'Dalbandin');

$message = "";

// User
$userName = "User";
$Sex = array("Male", "Female");

 for( $i = 0; $i<1000; $i++ ) {
        $cost = 0;
        $counter = rand(0,1);
        $type = $busType[$counter];
        $cond = $condition[$counter];
        $cap = $capacity[$counter];
        $fuel = $fuelCond[$counter];
        $finalPetrol = $petrol + rand(1000,3000);
        $cost = $finalPetrol+ $maintenance;
        $lic = $licence.((string)(rand(1000,9999)));
        $dName = $driverName.((string)$id);

        //Driver
        $driverId = ((int)(((string)rand(2,9)).((string)$id)));
        $salary = rand(10000,30000);
        $password = rand(4000,9000);
        $email = $dName."@voyage.com";
        $sql = "INSERT INTO `Bus` (ID,Bus_type,Liscense_no,Assigned_driver,condition_or,recent_trips,Bus_capacity,Fuel_condition,state,petrol,maintenance,cost) VALUES ('$id', '$type', '$lic', '$dName', '$cond', '$recenttrips', '$cap','$fuel','$state','$finalPetrol','$maintenance','$cost')";
        	$conn->query($sql);

        $sql2 = "INSERT INTO `driver` (driverID,busID,salary,drivingType,username,password,email,Message_rcv,Preference) VALUES ('$driverId', '$id', '$salary', '$type', '$dName','$password', '$email','$message','$type')";

    		$conn->query($sql2);

    	// Trip
    		$tripId = ((int)(((string)rand(22,25)).((string)$id)));
    		$choose = rand(0,25);
       		$pick = $cities[$choose];


       		while(True)
       		{
       			$choose2 = rand(0,25);
       			$dest = $cities[$choose2];
       			if($dest === $pick)
       			{
       				continue;
       			}
       			else
       			{
       				break;
       			}
       		}

       		$passenger = 0;

       		$time = ((string)rand(0,23)).':'.((string)rand(0,59));
       		$date = ((string)rand(1,28)).'-'.((string)rand(1,12)).'-'."2021";
       		$price = mt_rand(ceil(2500/100) , floor(4500/100))*100;

       		$status = "Upcoming";
       		$sql3 = "INSERT INTO `trips`(`trip_id`, `pickup_location`, `driver_id`, `dropoff_location`, `no_passengers`, `bus_id`, `time`, `date`, `status`, `price`) VALUES ('$tripId', '$pick','$driverId','$dest', '$passenger', '$id', '$time','$date', '$status', '$price')";
       		$conn->query($sql3);

       		// User
       		$temp = rand(2,9) + rand(0,9);
       		$userId = ((int)(((string)$temp).((string)$id)));
       		$uName = $userName.((string)$userId);
       		$birthday = ((string)rand(1,28)).'-'.((string)rand(1,12)).'-'.((string)rand(1980,2010));
       		$city = $pick;
       		$gender = $Sex[rand(0,1)];
       		$code ="0334";
       		$phone = $code.(string)rand(1000000,9999999);

       		$sql4 = "INSERT INTO `user`(`ID`, `username`, `password`, `name`, `birthday`, `city`, `gender`, `phone_number`, `Message_rcv`) VALUES ('$userId','$uName','$password','$uName','$birthday','$city','$gender','$phone','$message')";
       		$conn->query($sql4);


       		//promo
       		$promoName = "Promo".(string)$id;
       		$year = "2021";
       		$valid = (string)rand(1,28).'-'.(string)rand(1,12).'-'.$year;
       		$amount = rand(50,500);

       		$sql5 = "INSERT INTO `promo`(`name`, `validity`, `amount`) VALUES ('$promoName','$valid','$amount')";
			$conn->query($sql5);

			// ticket
			$limit = rand(100,120);
			$tickID = 1;
			for($j = 0; $j< $limit; $j++ )
			{

				$sql6 = "INSERT INTO `ticket`(`ticket_holder_name`, `time`, `destination`, `departure`, `price`, `date`, `busID`, `trip_id` ) VALUES ('$uName','$time','$dest', '$pick','$price', '$date', '$id','$tripId')";
				$conn->query($sql6);
// 				if ($conn->query($sql6) === TRUE) {
//  				 echo "New record created successfully";
// } else {
//   echo "Error: " . $sql6 . "<br>" . $conn->error;
// }
				$tickID = $tickID + 1;

				$sql7= "UPDATE `trips` SET `no_passengers`= `no_passengers`+ 1 WHERE `trip_id`='$tripId'";
				$conn->query($sql7);	
			}
        $id++;

       
    }

echo "Done";

$conn->close();
?>



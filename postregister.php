<?php 

//include system headers for login and cookies
include 'inc/init.php';
include 'header.php';

//redirect to index if user is not logged in
if(!$user->islg()){
	echo '<script type="text/javascript">';
	echo 'window.location.href="index.php";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0;url=index.php" />';
	echo '</noscript>'; 
	exit;
}


if(isset($_POST['firstname'])){
//connect to db
$con = mysqli_connect('localhost', 'root', '') or die('Database connection failed');
mysqli_select_db($con, 'mls') or die('Database connection Failiure');

//assign member details from form to variables
$fname 		= $_POST['firstname'];
$mname 		= $_POST['middlename'];
$lname 		= $_POST['lastname'];
$nId   		= $_POST['nationalId'];
$email 		= $_POST['email'];
$mobile 	= $_POST['mobile'];
$mId 		= $_POST['memberId'];
$occupation = $_POST['occupation'];
$day 		= $_POST['day'];
$month 		= $_POST['month'];
$year 		= $_POST['year'];
$gender 	= $_POST['gender']; 
$dob        = $day.'/'.$month.'/'.$year;

//set system time to nairobi time
date_default_timezone_set('Africa/Nairobi');
$date = date('Y/m/d H:i:s');
echo $date;

//Assign next of kin details to variables but only if they are posted
if($_POST['kin_fname']) 	 { $kin_fname 		= $_POST['kin_fname'];}				else { $kin_fname 	   = ''; }
if($_POST['kin_mname']) 	 { $kin_mname 		= $_POST['kin_mname'];} 			else { $kin_mname 	   = ''; }
if($_POST['kin_lname']) 	 { $kin_lname 		= $_POST['kin_lname'];} 			else { $kin_lname 	   = ''; }
if($_POST['kin_NId'])   	 { $kin_NId 		= $_POST['kin_NId'];  } 			else { $kin_NId		   = ''; }
if($_POST['kin_email']) 	 { $kin_email 		= $_POST['kin_email'];} 			else { $kin_email 	   = ''; }
if($_POST['kin_mobile']) 	 { $kin_mobile 		= $_POST['kin_mobile'];} 			else { $kin_mobile 	   = ''; }
if($_POST['kin_occupation']) { $kin_occupation  = $_POST['kin_occupation'];} 		else { $kin_occupation = ''; }
if($_POST['kin_day']) 		 { $kin_day 		= $_POST['kin_day'];} 				else { $kin_day		   = ''; }
if($_POST['kin_month']) 	 { $kin_month 		= $_POST['kin_month'];} 			else { $kin_month      = ''; }
if($_POST['kin_year']) 		 { $kin_year 		= $_POST['kin_year'];} 				else { $kin_year 	   = ''; }
if($_POST['kin_gender']) 	 { $kin_gender 		= $_POST['kin_gender'];} 			else { $kin_gender 	   = ''; }

$kin_dob = $kin_day.'/'.$kin_month.'/'.$kin_year;

//insert member details to db
mysqli_query($con, "INSERT INTO members VALUES('$nId', '$fname', '$mname','$lname','$mobile', '$email', '$mId', 
	'$dob', '$gender', '$occupation', '1', '$date')");


//insert next of kin details to db
if($_POST['kin_fname']){
	mysqli_query($con, "INSERT INTO members VALUES('$kin_NId', '$kin_fname', '$kin_mname','$kin_lname',
				'$kin_mobile', '$kin_email', '$mId', '$kin_dob', '$kin_gender', '$kin_occupation', '0', '$date')");
}

echo '<script type="text/javascript">';
echo 'alert("'.$fname.' '.$lname.' has been successfully registered.");';
echo 'window.location.href="index.php"';
echo '</script>';
echo '<noscript>';
echo '<meta http-equiv="refresh" content="0;url=index.php" />';
echo '</noscript>'; 
mysqli_close($con);
}
echo '<script type="text/javascript">';
echo 'window.location.href="index.php"';
echo '</script>';
echo '<noscript>';
echo '<meta http-equiv="refresh" content="0;url=index.php" />';
echo '</noscript>';
exit;
<?php 

include 'inc/init.php';
include 'header.php';

//redirect to login page if member is not logged in
if(!$user->islg()){
	echo '<script type="text/javascript">';
	echo 'window.location.href="login.php";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0;url=login.php" />';
	echo '</noscript>'; 
	exit;
}

$con = mysqli_connect('localhost', 'root', '') or die('Server connection Error');
mysqli_select_db($con, 'mls') or die('Database Connection error');

//assign member details from the form to variables
$fname 		= mysqli_real_escape_string($con, $_POST['firstname']);
$mname 		= mysqli_real_escape_string($con, $_POST['middlename']);
$lname 		= mysqli_real_escape_string($con, $_POST['lastname']);
$nId   		= mysqli_real_escape_string($con, $_POST['nationalId']);
$email 		= mysqli_real_escape_string($con, $_POST['email']);
$mobile 	= mysqli_real_escape_string($con, $_POST['mobile']);
$mId 		= mysqli_real_escape_string($con, $_POST['memberId']);
$occupation = mysqli_real_escape_string($con, $_POST['occupation']);
$day 		= mysqli_real_escape_string($con, $_POST['day']);
$month 		= mysqli_real_escape_string($con, $_POST['month']);
$year 		= mysqli_real_escape_string($con, $_POST['year']);
$gender 	= mysqli_real_escape_string($con, $_POST['gender']); 
$dob        = $day.'/'.$month.'/'.$year;

//retrieve details from db to be used to find and change kin's member id
$res = mysqli_query($con, "SELECT * FROM `members` WHERE `nId` = '$nId' ");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$member_id = $row['mId'];

$update_string = "UPDATE `members` SET `nId`='$nId',`fname`='$fname',`mname`='$mname',`lname`='$lname',`mobile`='$mobile',`email`='$email',`mId`='$mId',`dob`='$dob',`gender`='$gender',`occupation`='$occupation' 
	WHERE `nId` = '$nId'";
mysqli_query($con, $update_string);


//change member's kin member id to reflect the new member id
$update_kin_string = "UPDATE `members` SET `mId` = '$mId' WHERE `mId` = '$member_id' AND `memberStatus` = '0' ";
mysqli_query($con, $update_kin_string);
mysqli_close($con);

echo '<script type="text/javascript">';
echo 'alert("'.$fname.' '.$lname.' has been successfully updated.");';
echo 'window.location.href="memberslist.php";';
echo '</script>';
echo '<noscript>';
echo '<meta http-equiv="refresh" content="0;url=login.php" />';
echo '</noscript>'; 
exit;
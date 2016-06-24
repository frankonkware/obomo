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

$member_id = mysqli_real_escape_string($con, $_GET['mid']);
mysqli_query($con, "DELETE FROM `members` WHERE `mId` = '$member_id'");
mysqli_close($con);
echo '<script type="text/javascript">';
echo 'alert("The Member has been deleted successfully");';
echo 'window.location.href="memberslist.php";';
echo '</script>';
echo '<noscript>';
echo '<meta http-equiv="refresh" content="0;url=login.php" />';
echo '</noscript>'; 
exit;
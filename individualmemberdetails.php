<?php 

include 'inc/init.php';
include 'header.php';
if(!$user->islg()){
	echo '<script type="text/javascript">';
	echo 'window.location.href="index.php";';
	echo '</script>';
	echo '<noscript>';
	echo '<meta http-equiv="refresh" content="0;url=index.php" />';
	echo '</noscript>'; 
	exit;
}

$con =mysqli_connect('localhost', 'root', '') or die('Server connection Error');
mysqli_select_db($con, 'mls') or die('Database Connection error');
?>

<div class="page-container">
	<div class="left-content">
		<div class="mother-grid-inner">
			<!--header start here-->
			<div class="header-main">
				<div class="header-left">
					<div class="logo-name">
						<a href="index.php"> <h1>OBOMO</h1>
							<!--<img id="logo" src="" alt="Logo"/>-->
						</a>
					</div>
					<!--search-box-->
						<!-- <div class="search-box">
						<form>
							<input type="text" placeholder="Search..." required="">
							<input type="submit" value="">
						</form>
					</div> --><!--//end-search-box-->
					<div class="clearfix"> </div>
				</div>
				<div class="header-right">

					<div class="profile_details">
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">
										<span class="prfil-img"><img src="images/p1.png" alt=""> </span>
										<div class="user-name">
											<p>Monyenye</p>
											<span>Administrator</span>
										</div>
										<i class="fa fa-angle-down lnr"></i>
										<i class="fa fa-angle-up lnr"></i>
										<div class="clearfix"></div>
									</div>
								</a>
								<ul class="dropdown-menu drp-mnu">
									<!-- <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> -->
									<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
									<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!--heder end here-->
			<!-- script-for sticky-nav -->
			<script>
				$(document).ready(function() {
					var navoffeset=$(".header-main").offset().top;
					$(window).scroll(function(){
						var scrollpos=$(window).scrollTop();
						if(scrollpos >=navoffeset){
							$(".header-main").addClass("fixed");
						}else{
							$(".header-main").removeClass("fixed");
						}
					});

				});
			</script>
			<!-- /script-for sticky-nav -->
			<!--inner block start here-->
			<div class="inner-block">
				<div class="blank">
					<h2>
						<?php
						$id = mysqli_real_escape_string($con, $_GET['id']);
						$select_str = "SELECT * FROM members WHERE `nId` = '$id'";
						$res = mysqli_query($con, $select_str);
						while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
							echo $row['fname']." ".$row['mname']." ".$row['lname'];
							$member_id = $row['mId'];
							$id        = $row['nId'];
						}

						?>
					</h2>
					<div class="buttons-main">
						<div class="btn-effcts panel-widget">
						<a href="deletemember.php?mid=<?php echo $member_id;?>" class="hvr-shutter-in-horizontal"><input type="button"  value="Delete Member"></a> 
						<a href="editmember.php?id=<?php echo $id;?>" class="hvr-shutter-out-horizontal"><input type="button"  value="Edit Member"></a> 
						<a href="#" class="hvr-shutter-in-vertical"><input type="button" value="Add Next of Kin" ></a> 	
						</div>
					</div>
					<div class="work-progres">
						<div class="chit-chat-heading">
							Next of Kin
						</div>
						
						<div class="table-responsive">
							<table class="table table-hover">
								<thead >
									<tr>
										<th></th>
										<th>Id No.</th>
										<th>First name</th>                                   
										<th>Middle name</th>
										<th>Last name</th>
										<th>Mobile</th>
										<th>Email</th>
										<th>DoB</th> 
										<th>Gender</th>
										<th>Occupation</th>
										<th>Registred on</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$num = 1;
									//timeregistered has been modified to strip off time and only display date
									$result = mysqli_query($con, "SELECT `nId`,`fname`,`mname`,`lname`,`mobile`,`email`,`dob`,`gender`,`occupation`, DATE_FORMAT(DATE(timeregistered), '%d/%m/%Y')AS clean_date FROM `members` WHERE `memberStatus`=0 AND `mId` = '$member_id'");
									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										echo "<tr><td style=\"color: #36f \">".$num++."</td><td>".$row['nId']."</td> <td>".$row['fname']."</td> <td>".$row['mname']."</td> <td>".$row['lname']."</td> <td>".$row['mobile'].
										"</td> <td>".$row['email']."</td> <td>".$row['dob']."</td> <td>".$row['gender'].
										"</td> <td>".$row['occupation']."</td> <td>".$row['clean_date']."</td></tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					

					
					<div class="clearfix"> </div>
				</div>





			</div>
			<!--inner block end here-->
			<!--copy rights start here-->
			<div class="copyrights">
				<p>© 2016  All Rights Reserved | Obomo SACCO </p>
			</div>

			<!--COPY rights end here-->
		</div>
	</div>
	<!--slider menu-->
	<div class="sidebar-menu">
		<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
			<!--<img id="logo" src="" alt="Logo"/>-->
		</a> </div>
		<div class="menu">
			<ul id="menu" >
				<li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>

			</ul>
		</div>
	</div>

	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
	var toggle = true;

	$(".sidebar-icon").click(function() {
		if (toggle)
		{
			$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
			$("#menu span").css({"position":"absolute"});
		}
		else
		{
			$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
			setTimeout(function() {
				$("#menu span").css({"position":"relative"});
			}, 400);
		}
		toggle = !toggle;
	});
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
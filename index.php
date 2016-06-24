<?php
/**
 * MASTER LOGIN SYSTEM
 * @author Mihai Ionut Vilcu (ionutvmi@gmail.com)
 * June 2013
 *
 */


include "inc/init.php";



$page->title = "Welcome to ". $set->site_name;

$presets->setActive("home"); // we highlith the home link


include 'header.php';



if($user->islg()) {

	echo '

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
				<!--market updates updates-->
				<div class="market-updates">
				<a href="registermember.php">
					<div class="col-md-4 market-update-gd">
						<div class="market-update-block clr-block-1">
							<div class="col-md-8 market-update-left">
								<!-- <h3>1024</h3> -->
								<h4>Register Members</h4>
								<p>Register new members</p>
							</div>
							<div class="col-md-4 market-update-right">
								<i class="fa fa-file-text-o"> </i>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<a href="memberslist.php">
					<div class="col-md-4 market-update-gd">
						<div class="market-update-block clr-block-2">
							<div class="col-md-8 market-update-left">
								<!-- <h3>135</h3> -->
								<h4>Manage Members</h4>
								<p>Delete Member, Edit kin</p>
							</div>
							<div class="col-md-4 market-update-right">
								<i class="fa fa-eye"> </i>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<div class="col-md-4 market-update-gd">
						<div class="market-update-block clr-block-3">
							<div class="col-md-8 market-update-left">
								<!-- <h3>23</h3> -->
								<h4>Accounts</h4>
								<p>Manage member accounts</p>
							</div>
							<div class="col-md-4 market-update-right">
								<i class="fa fa-envelope-o"> </i>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!--market updates end here-->
				<!--mainpage chit-chating-->
				<div class="chit-chat-layer1">

					<div class="main-page-chart-layer1">
						<div class="col-md-6 chart-layer1-left">
							<div class="glocy-chart">
								<div class="span-2c">
									<h3 class="tlt">Contribution Analytics</h3>
									<canvas id="bar" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
									<script>
										var barChartData = {
											labels : ["Jan","Feb","Mar","Apr","May","Jun","jul"],
											datasets : [
											{
												fillColor : "#FC8213",
												data : [65,59,90,81,56,55,40]
											},
											{
												fillColor : "#337AB7",
												data : [28,48,40,19,96,27,100]
											}
											]

										};
										new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);

									</script>
								</div>
							</div>
						</div>
						<!-- <div class="col-md-6 chart-layer1-right">
						<div class="user-marorm">
							<div class="malorum-top">
							</div>
							<div class="malorm-bottom">
								<span class="malorum-pro"> </span>
								<h4>unde omnis iste</h4>
								<h2>Melorum</h2>
								<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising.</p>
								<ul class="malorum-icons">
									<li><a href="#"><i class="fa fa-facebook"> </i>
										<div class="tooltip"><span>Facebook</span></div>
									</a></li>
									<li><a href="#"><i class="fa fa-twitter"> </i>
										<div class="tooltip"><span>Twitter</span></div>
									</a></li>
									<li><a href="#"><i class="fa fa-google-plus"> </i>
										<div class="tooltip"><span>Google</span></div>
									</a></li>
								</ul>
							</div>
						</div>
					</div> -->
					<div class="clearfix"> </div>
				</div>

				<div class="clearfix"> </div>
			</div>
			<!--main page chit chating end here-->
			<!--main page chart start here-->
			<div class="main-page-charts">

			</div>
			<!--main page chart layer2-->
			<div class="chart-layer-2">


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
<!-- mother grid end here-->';

}

if(!$user->islg()) {
	echo '
	<div class="left-content">
		<div class="header-main">
			<div class="header-left">
				<div class="logo-name">
					<a href="index.html"> <h1>OBOMO</h1>
						<!--<img id="logo" src="" alt="Logo"/>-->
					</a>
				</div>

				<div class="clearfix"> </div>
			</div>
			<div class="header-right">


				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="inner-block" style="text-align:center;">
			<!--market updates updates-->
			<div class="market-updates">
				<div class="col-md-4 market-update-gd" style="margin-left:100px;">
					<a href="register.php">
						<div class="market-update-block clr-block-1">
							<div class="col-md-8 market-update-left">
								<!-- <h3>1024</h3> -->
								<h3>Register</h3>

							</div>
							<div class="col-md-4 market-update-right">
							</div>
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="col-md-4 market-update-gd">
					<a href="login.php">
						<div class="market-update-block clr-block-3">
							<div class="col-md-8 market-update-left">
								<!-- <h3>23</h3> -->
								<h3>Login</h3>

							</div>
							<div class="col-md-4 market-update-right">

							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</a>
				<div class="clearfix"> </div>

				<div class="sidebar-menu">

				</div></div>
				';

			}

			echo "</div></div> <!-- /container -->";

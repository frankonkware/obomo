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

$con = mysqli_connect('localhost', 'root', '') or die('Server connection Error');
	mysqli_select_db($con, 'mls') or die('Database Connection error');
	$id = mysqli_real_escape_string($con, $_GET['id']);

	$res = mysqli_query($con, "SELECT * FROM members WHERE `nID` = '$id' ");
	$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

	//split the date of birth string from database to day, month and year array
	$date  = explode('/', $row['dob'], 3);

	switch ($date[1]) {
		case '1' : $month = 'January'; 	 break;
		case '2' : $month = 'February';  break;
		case '3' : $month = 'March'; 	 break;
		case '4' : $month = 'April'; 	 break;
		case '5' : $month = 'May'; 		 break;
		case '6' : $month = 'June'; 	 break;
		case '7' : $month = 'July'; 	 break;
		case '8' : $month = 'August'; 	 break;
		case '9' : $month = 'September'; break;
		case '10': $month = 'October';   break;
		case '11': $month = 'November';  break;
		case '12': $month = 'December';  break;		
		default:
			# code...
			break;
	}

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
					<h2>Edit details for <?php echo $row['fname'].' '.$row['mname'].' '.$row['lname'] ?></h2>

					<div class="blankpage-main col-md-12">
						<!-- <p>Form will go here. </p> -->
						<div class="login-block col-md-8 " style="height:auto; margin: 0 auto; align:center;">
							<form method="POST" action="editmemberpost.php">
								<p>First Name</p>
								<input type="text" name="firstname"  value="<?php echo $row['fname']?>" 	required="">
								<p>Middle Name</p>
								<input type="text" name="middlename" value="<?php echo $row['mname']?>" 	required="">
								<p>Last Name</p>
								<input type="text" name="lastname"   value="<?php echo $row['lname']?>" 	required="">
								<p>National Id/Passport No.</p>
								<input type="text" name="nationalId" value="<?php echo $row['nId']?>" 		required="">
								<p>Email</p>
								<input type="text" name="email"      value="<?php echo $row['email']?>" 	required="">
								<p>Mobile</p>
								<input type="text" name="mobile"     value="<?php echo $row['mobile']?>" 	required="">
								<p>Member Id</p>
								<input type="text" name="memberId"   value="<?php echo $row['mId']?>" 		required="">
								<p >Occupation</p>
								<input type="text" name="occupation" value="<?php echo $row['occupation']?>"required="">
								<div class="forgot-top-grids">
									<div class="forgot-grid">
										<ul>

											<li>
												<label for="select"><span></span>Date of birth</label>
												<select id="select" name="day" required="" style="color:#8C8C8C">
													<option selected="selected" value="<?php echo $date[0]?>"><?php echo $date[0]?></option>
													<option style="color:#FC8213" value="1">1</option>
													<option style="color:#FC8213" value="2">2</option>
													<option style="color:#FC8213" value="3">3</option>
													<option style="color:#FC8213" value="4">4</option>
													<option style="color:#FC8213" value="5">5</option>
													<option style="color:#FC8213" value="6">6</option>
													<option style="color:#FC8213" value="7">7</option>
													<option style="color:#FC8213" value="8">8</option>
													<option style="color:#FC8213" value="9">9</option>
													<option style="color:#FC8213" value="10">10</option>
													<option style="color:#FC8213" value="11">11</option>
													<option style="color:#FC8213" value="12">12</option>
													<option style="color:#FC8213" value="13">13</option>
													<option style="color:#FC8213" value="14">14</option>
													<option style="color:#FC8213" value="15">15</option>
													<option style="color:#FC8213" value="16">16</option>
													<option style="color:#FC8213" value="17">17</option>
													<option style="color:#FC8213" value="18">18</option>
													<option style="color:#FC8213" value="19">19</option>
													<option style="color:#FC8213" value="20">20</option>
													<option style="color:#FC8213" value="21">21</option>
													<option style="color:#FC8213" value="22">22</option>
													<option style="color:#FC8213" value="23">23</option>
													<option style="color:#FC8213" value="24">24</option>
													<option style="color:#FC8213" value="25">25</option>
													<option style="color:#FC8213" value="26">26</option>
													<option style="color:#FC8213" value="27">27</option>
													<option style="color:#FC8213" value="28">28</option>
													<option style="color:#FC8213" value="29">29</option>
													<option style="color:#FC8213" value="30">30</option>
													<option style="color:#FC8213" value="31">31</option>

												</select>
												<select id="select" name="month" required="" style="color:#8C8C8C">
													<option selected="selected" value="<?php echo $date[1]?>"><?php echo $month ?></option>
													<option style="color:#FC8213" value="1">January</option>
													<option style="color:#FC8213" value="2">February</option>
													<option style="color:#FC8213" value="3">March</option>
													<option style="color:#FC8213" value="4">April</option>
													<option style="color:#FC8213" value="5">May</option>
													<option style="color:#FC8213" value="6">June</option>
													<option style="color:#FC8213" value="7">July</option>
													<option style="color:#FC8213" value="8">August</option>
													<option style="color:#FC8213" value="9">September</option>
													<option style="color:#FC8213" value="10">October</option>
													<option style="color:#FC8213" value="11">November</option>
													<option style="color:#FC8213" value="12">December</option>
												</select>



											</li>
											<li>
												<select id="select" name="year" required="" style="color:#8C8C8C; margin-right:20px;">
													<option selected="selected" value="<?php echo $date[2]?>"><?php echo $date[2]?></option>
													<option style="color:#FC8213" value="2020">2020</option>
													<option style="color:#FC8213" value="2019">2019</option>
													<option style="color:#FC8213" value="2018">2018</option>
													<option style="color:#FC8213" value="2016">2016</option>
													<option style="color:#FC8213" value="2015">2015</option>
													<option style="color:#FC8213" value="2014">2014</option>
													<option style="color:#FC8213" value="2013">2013</option>
													<option style="color:#FC8213" value="2012">2012</option>
													<option style="color:#FC8213" value="2011">2011</option>
													<option style="color:#FC8213" value="2010">2010</option>
													<option style="color:#FC8213" value="2009">2009</option>
													<option style="color:#FC8213" value="2008">2008</option>
													<option style="color:#FC8213" value="2007">2007</option>
													<option style="color:#FC8213" value="2006">2006</option>
													<option style="color:#FC8213" value="2005">2005</option>
													<option style="color:#FC8213" value="2004">2004</option>
													<option style="color:#FC8213" value="2003">2003</option>
													<option style="color:#FC8213" value="2002">2002</option>
													<option style="color:#FC8213" value="2001">2001</option>
													<option style="color:#FC8213" value="2000">2000</option>
													<option style="color:#FC8213" value="1999">1999</option>
													<option style="color:#FC8213" value="1998">1998</option>
													<option style="color:#FC8213" value="1997">1997</option>
													<option style="color:#FC8213" value="1996">1996</option>
													<option style="color:#FC8213" value="1995">1995</option>
													<option style="color:#FC8213" value="1994">1994</option>
													<option style="color:#FC8213" value="1993">1993</option>
													<option style="color:#FC8213" value="1992">1992</option>
													<option style="color:#FC8213" value="1991">1991</option>
													<option style="color:#FC8213" value="1990">1990</option>
													<option style="color:#FC8213" value="1989">1989</option>
													<option style="color:#FC8213" value="1988">1988</option>
													<option style="color:#FC8213" value="1987">1987</option>
													<option style="color:#FC8213" value="1986">1986</option>
													<option style="color:#FC8213" value="1985">1985</option>
													<option style="color:#FC8213" value="1984">1984</option>
													<option style="color:#FC8213" value="1983">1983</option>
													<option style="color:#FC8213" value="1982">1982</option>
													<option style="color:#FC8213" value="1981">1981</option>
													<option style="color:#FC8213" value="1980">1980</option>
													<option style="color:#FC8213" value="1979">1979</option>
													<option style="color:#FC8213" value="1978">1978</option>
													<option style="color:#FC8213" value="1977">1977</option>
													<option style="color:#FC8213" value="1976">1976</option>
													<option style="color:#FC8213" value="1975">1975</option>
													<option style="color:#FC8213" value="1974">1974</option>
													<option style="color:#FC8213" value="1973">1973</option>
													<option style="color:#FC8213" value="1972">1972</option>
													<option style="color:#FC8213" value="1971">1971</option>
													<option style="color:#FC8213" value="1970">1970</option>
													<option style="color:#FC8213" value="1969">1969</option>
													<option style="color:#FC8213" value="1968">1968</option>
													<option style="color:#FC8213" value="1967">1967</option>
													<option style="color:#FC8213" value="1966">1966</option>
													<option style="color:#FC8213" value="1965">1965</option>
													<option style="color:#FC8213" value="1964">1964</option>
													<option style="color:#FC8213" value="1963">1963</option>
													<option style="color:#FC8213" value="1962">1962</option>
													<option style="color:#FC8213" value="1961">1961</option>
													<option style="color:#FC8213" value="1960">1960</option>
													<option style="color:#FC8213" value="1959">1959</option>
													<option style="color:#FC8213" value="1958">1958</option>
													<option style="color:#FC8213" value="1957">1957</option>
													<option style="color:#FC8213" value="1956">1956</option>
													<option style="color:#FC8213" value="1955">1955</option>
													<option style="color:#FC8213" value="1954">1954</option>
													<option style="color:#FC8213" value="1953">1953</option>
													<option style="color:#FC8213" value="1952">1952</option>
													<option style="color:#FC8213" value="1951">1951</option>
													<option style="color:#FC8213" value="1950">1950</option>
													<option style="color:#FC8213" value="1949">1949</option>
													<option style="color:#FC8213" value="1948">1948</option>
													<option style="color:#FC8213" value="1947">1947</option>
													<option style="color:#FC8213" value="1946">1946</option>
													<option style="color:#FC8213" value="1945">1945</option>
													<option style="color:#FC8213" value="1944">1944</option>
													<option style="color:#FC8213" value="1943">1943</option>
													<option style="color:#FC8213" value="1942">1942</option>
													<option style="color:#FC8213" value="1941">1941</option>
													<option style="color:#FC8213" value="1940">1940</option>
													<option style="color:#FC8213" value="1939">1939</option>
													<option style="color:#FC8213" value="1938">1938</option>
													<option style="color:#FC8213" value="1937">1937</option>
													<option style="color:#FC8213" value="1936">1936</option>
													<option style="color:#FC8213" value="1935">1935</option>
													<option style="color:#FC8213" value="1934">1934</option>
													<option style="color:#FC8213" value="1933">1933</option>
													<option style="color:#FC8213" value="1932">1932</option>
													<option style="color:#FC8213" value="1931">1931</option>
													<option style="color:#FC8213" value="1930">1930</option>
													<option style="color:#FC8213" value="1929">1929</option>
													<option style="color:#FC8213" value="1928">1928</option>
													<option style="color:#FC8213" value="1927">1927</option>
													<option style="color:#FC8213" value="1926">1926</option>
													<option style="color:#FC8213" value="1925">1925</option>
													<option style="color:#FC8213" value="1924">1924</option>
													<option style="color:#FC8213" value="1923">1923</option>
													<option style="color:#FC8213" value="1922">1922</option>
													<option style="color:#FC8213" value="1921">1921</option>
													<option style="color:#FC8213" value="1920">1920</option> 
												</select>
											</li><br><br>

											<li>
												<label for="select" ><span></span>Gender</label>
												<select id="select" name="gender" required="" style="color:#8C8C8C; margin-left:40px">
													<option selected="selected" value="<?php echo $row['gender']?>"><?php echo $row['gender']?></option>
													<option style="color:#FC8213" value="male">Male</option>
													<option style="color:#FC8213" value="female">Female</option>
												</select>


											</li>

										</ul>

									</div>

									<div class="clearfix"> </div>
								</div>

								<input type="submit" name="Sign In" value="Submit Changes">	
					<!-- <h3>Not a member?<a href="signup.html"> Sign up now</a></h3>				
					<h2>or login with</h2>
					<div class="login-icons">
						<ul>
							<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>						
						</ul>
					</div> -->
				</form>
				<h5><a href="index.php">Go Back to Home</a></h5>
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
<?php 
session_start();
include("dataconnection.php");
if(!isset($_SESSION['user_id']))
{
	?>
	<script>
	alert("Please log in!");
	</script>
	<?php
	header("refresh:0.5; url=login_register.php");
	exit();
}
else
{
	$user_id=$_SESSION['user_id'];

}

if (isset($_GET["Standard"])) 	
{

						?>
						<script>
						location.assign("Standard.php?meet&hostid=<?php echo $user_id;?>");
						</script>	
						<?php
	
	
}

if (isset($_GET["Urgent"])) 	
{

						?>
						<script>
						location.assign("Urgent.php?meet&hostid=<?php echo $user_id;?>");
						</script>	
						<?php
	
	
}


if($result=mysqli_query($connect,"SELECT * FROM user WHERE user_id='$user_id'"))
{
	$lis=mysqli_fetch_assoc($result);
}

?><!DOCTYPE HTML>

<html>
	<head>
		<title>SMART SCHEDULING SYSTEM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<style>
	a.notif {
  position: relative;
  display: block;
  height: 50px;
  width: 50px;
  background: url('image/add_user.png');
  background-size: contain;
  text-decoration: none;
  
}
.num {
  position: absolute;
  right: 11px;
  top: 6px;
  color: #fff;
}
#transparent{
	color: transparent;
}
	</style>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<?php 
				$defadd=mysqli_query($connect,"SELECT * FROM friend_request WHERE friend_target_id='$user_id'");
				$countreq=mysqli_num_rows($defadd);
				?>
					<header id="header" class="alt">
						<a href="index.html" class="logo"><strong>SMART</strong> <span>SCHEDULING SYSTEM</span></a>
						<a href="requests.php?request&id=<?php echo $user_id;?>" class="notif"><span class="num"><?php if($countreq==0)
																														{
																															
																														}
																														else
																														{
																															?><b style="color:orange"><?php
																															echo $countreq ?>
																															</b>
																															<?php
																														}	
																														?></span></a>
						<nav>
							
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a class="button primary fit" href="home.php" disabled >Home</a></li>
							<li><a href="landing.html">History</a></li>
							<li><a href="friendList.php?friend&id=<?php echo $user_id?>">Friend List</a></li>
							<li><a href="Profile.php?profile&user_id=<?php echo $user_id?>">Profile</a></li>
							
						</ul>
						<ul class="actions stacked">
							
							<li><a href="logout.php" class="button fit">Log out</a></li>
						</ul>
						<br><br>
					</nav>

				<!-- Banner -->
				<?php 
				$mydate=getdate(date("U"));
				$day="$mydate[weekday]";
				?>
				
					<section id="banner" class="major" style="background-image:url('image/main.jpg');">
						<div class="inner">
							<header class="major">
								<h1>Welcome, <?php echo $lis["user_name"];?></h1>
							</header>
							<div class="content">
								<ul class="actions">
									<li><a href="Profile.php?profile&user_id=<?php echo $user_id;?>" class="button next scrolly">Set Your Schedule</a></li>
									<li >Today is <?php echo "$mydate[weekday],  $mydate[mday] $mydate[month] $mydate[year]"; ?></li>
								</ul>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main" >

						<!-- One -->
							<section style="margin-left:10%">
								
								
									<br>
									<header class="major">
										<h3 >Select Your Meeting Type</h3>
										<br>
										
										
										<a id="transparent" href="Standard.php?Standard&hostid=<?php echo $user_id?>"><button  type="submit" name="Standard" value="">Standard Meeting</button></a>
										
										
										<br>
										
										
										<a id="transparent" href="Urgent.php?Urgent&hostid=<?php echo $user_id?>"><button type="submit" name="Urgent" value="">Urgent Meeting</button></a>
										
										
										
										
									</header>
									
								<br>
								
							

						

					</div>
					

				<!-- Contact -->
					<section id="contact">
						<div class="inner">
							<section>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" />
										</div>
										<div class="field half">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" />
										</div>
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="6"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send Message" class="primary" /></li>
										<li><input type="reset" value="Clear" /></li>
									</ul>
								</form>
							</section>
							<section class="split">
								<section>
									<div class="contact-method">
										<span class="icon solid alt fa-envelope"></span>
										<h3>Email</h3>
										<a href="#">information@untitled.tld</a>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon solid alt fa-phone"></span>
										<h3>Phone</h3>
										<span>(000) 000-0000 x12387</span>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon solid alt fa-home"></span>
										<h3>Address</h3>
										<span>1234 Somewhere Road #5432<br />
										Nashville, TN 00000<br />
										United States of America</span>
									</div>
								</section>
							</section>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
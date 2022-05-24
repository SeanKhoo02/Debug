<?php 
session_start();
include("dataconnection.php");
if(isset($_GET["Urgent"]))
{
	$user_id = $_GET["hostid"];
}

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

a{
	color: transparent;
    text-decoration: none;
	
}
.num {
  position: absolute;
  right: 11px;
  top: 6px;
  color: #fff;
}

fieldset {
    font-family: sans-serif;
    border: 5px solid #FFFFFF;
    background: transparent;
    border-radius: 5px;
    padding: 15px;
}

fieldset legend {
    background: #1F497D;
    color: #fff;
    padding: 5px 10px ;
    font-size: 32px;
    border-radius: 5px;
    box-shadow: 0 0 0 5px #ddd;
    margin-left: 20px;
}
	</style>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<fieldset style="min-height:100px;">
				<legend><b>Urgent Meeting</b> </legend>


									<header class="major" style="margin-left:5%">
										<h3 >Quickly Meet</h3>
									
										<?php
										$today=date(" jS  F Y ");
										$mydate=getdate(date("U"));
										$day="$mydate[weekday]";

										if($day=="Tuesday" || $day=="Wednesday" || $day=="Thursday"|| $day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
										}
										else
										{	
										?>
										
											<?php if($day=="Monday")
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=mon'>
											<button name="mon">Today
											</button>
											<br>										
											<?php
											}
											else
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=mon'>
											<button name="mon">Monday			
											</button>
											</a>
											<br>					
											<?php
											}
											?>
														
										
								<?php 	}?>
										<?php if( $day=="Wednesday" || $day=="Thursday"|| $day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
										}
										else
										{
											
											if($day=="Tuesday")
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=tue'>
											<button name="tue">Today
											</button>
											<br>										
											<?php
											}
											else
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=tue'>
											<button name="tue">Tuesday			
											</button>
											</a>
											<br>					
											<?php
											}
										}
										?>


										<?php if($day=="Thursday"|| $day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
										}
										else
										{
											
											if($day=="Wednesday")
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=wed'>
											<button name="wed">Today
											</button>
											<br>										
											<?php
											}
											else
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=wed'>
											<button name="wed">Wednesday			
											</button>
											</a>
											<br>					
											<?php
											}
										}
										?>
										
										
										<?php if($day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
										}
										else
										{
											
											if($day=="Thursday")
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=thu'>
											<button name="thu">Today
											</button>
											<br>										
											<?php
											}
											else
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=thu'>
											<button name="thu">Thursday			
											</button>
											</a>
											<br>					
											<?php
											}
										}
										?>
										<?php if($day=="Saturday"|| $day=="Sunday")
										{
										}
										else
										{
											
											if($day=="Friday")
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=fri'>
											<button name="fri">Today
											</button>
											<br>										
											<?php
											}
											else
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=fri'>
											<button name="fri">Friday			
											</button>
											</a>
											<br>					
											<?php
											}
										}
										?>
										<?php if($day=="Sunday")
										{
										}
										else
										{
											
											if($day=="Saturday")
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=sta'>
											<button name="sta">Today
											</button>
											<br>										
											<?php
											}
											else
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=sta'>
											<button name="sta">Saturday			
											</button>
											</a>
											<br>					
											<?php
											}
										}
										?>
										
										<?php
										if($day=="Sunday")
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=sun'>
											<button name="sun">Today
											</button>
											<br>										
											<?php
											}
											else
											{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=sun'>
											<button name="sun">Sunday			
											</button>
											</a>
											<br>					
											<?php
											}
										
										// for next week?>
					

						<!-- One -->
							
								
								
									
									<header class="major">
										<h3 >Next Week Quickly Meet</h3>
										<br>
										<?php if($day=="Monday")
										{
											?>
											<p>There Are Nonthing In Next Week Plan</p>
											<?php
										}
										else
										{	
										?>
										
										<?php }?>
										<?php if($day=="Tuesday" || $day=="Wednesday" || $day=="Thursday"|| $day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
										
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=nextmon'>
											<button name="nextmon">Monday			
											</button>
											</a>
											<br>					
											<?php
											
										}
										else
										{	
										?>
										
										<?php }?>
										<?php if( $day=="Wednesday" || $day=="Thursday"|| $day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=nexttue'>
											<button name="nexttue">Tuesday			
											</button>
											</a>
											<br>					
											<?php
										}
										else
										{	
										?>
										
										<?php }?>
										<?php if($day=="Thursday"|| $day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=nextwed'>
											<button name="nextwed">Wednesday			
											</button>
											</a>
											<br>					
											<?php
										}
										else
										{	
										?>
										
										<?php }?>
										<?php if($day=="Friday"|| $day=="Saturday"|| $day=="Sunday")
										{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=nextthur'>
											<button name="nextthur">Thursday			
											</button>
											</a>
											<br>					
											<?php
										}
										else
										{	
										?>
										
										<?php }?>
										<?php if($day=="Saturday"|| $day=="Sunday")
										{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=nextfri'>
											<button name="nextfri">Friday			
											</button>
											</a>
											<br>					
											<?php
										}
										else
										{	
										?>
										
										<?php }?>
										<?php if($day=="Sunday")
										{
											?>
											<a  style="text-decoration: none;" href='Urgent_friend.php?meet&hostid=<?php echo $user_id;?>&day=nextsta'>
											<button name="nextsta">Saturday			
											</button>
											</a>
											<br>					
											<?php
										}
										else
										{	
										?>
										
										<?php }?>

										
									</header>
								<br>
								
							

						

					
								<a  style="text-decoration: none;" href='home.php'>
											<button >Back to Menu			
											</button>
											</a>			
									</header>

								<br>
								
								</fieldset>
								

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
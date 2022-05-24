<?php include("dataconnection.php"); ?>

<?php	
session_start();
$error_time="";



	 if(isset($_GET["edit"]))
			{
		    $user_id = $_GET["id"];
			$day = $_GET["day"];
				if(empty($user_id))
				{
					$user_id=$_SESSION['user_id'];
					
				}
				else
				{
					
					$_SESSION['user_id']=$user_id;
					
				}
			}
	if(isset($_GET["delete"]))
			{
				$bzid=$_GET["bzid"];
				$day=$_GET["day"];
				$user_id=$_GET["user_id"];
										
				mysqli_query($connect,"DELETE from buzytime WHERE user_id='$user_id' and buzytime_id='$bzid'");
				
				
				unset ($_SESSION["arr2"]);
				session_destroy ();
				session_start();
				
				$buzytimecount = mysqli_query($connect, "SELECT * from buzytime WHERE user_id='$user_id' and day='$day'");	
				$countbz = mysqli_num_rows($buzytimecount); 
				//check have same previous?
				
				while($rowbz = mysqli_fetch_assoc($buzytimecount))
				{
					$startbz_check=$rowbz["free_time_start"];
					$endbz_check=$rowbz["free_time_end"];
					
					if (!function_exists('create_time_range'))   {
					  function create_time_range($start, $end, $interval = '30 mins', $format = '24')  
					  {
					  $startTime = strtotime($start); 
					  $endTime   = strtotime($end);
					  $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';

					  $current   = time(); 
					  $addTime   = strtotime('+'.$interval, $current); 
					  $diff      = $addTime - $current;

					  $times = array(); 
					  while ($startTime < $endTime) { 
					   $times[] = date($returnTimeFormat, $startTime); 
					   $startTime += $diff; 
					  } 
					  $times[] = date($returnTimeFormat, $startTime); 
					  return $times; 
					 }
					}
					 // create array of time ranges 
					$times = create_time_range($startbz_check, $endbz_check, '30 mins');
				
				
					$arr2=array();
					if(empty($_SESSION['$arr2']))
					{
						
					}
					else
					{
						$arr2=$_SESSION['$arr2'];
					}
			
					foreach($times as $key => $val)
					{
						array_push($arr2,$val);
						$arr2	=array_unique($arr2); 
					}
					$_SESSION['$arr2']=$arr2;
				}
				
				
				?>
				<script>
				location.assign("edit_time_schedule.php?edit&id=<?php echo $user_id; ?>&day=<?php echo $day?>");
				</script>
				<?php
				
			}
			
			

		  if(isset($_GET["back"]))
			{
		    $user_id = $_GET["id"];
			
			unset ($_SESSION["arr2"]);
			session_destroy ();
			session_start();


			
						?>
						<script>
						location.assign("time_schedule.php?time&id=<?php echo $user_id;?>");
						</script>
						<?php
			
			}
		  
		  			

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Time Table</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<meta name="robots" content="noindex, follow">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=RIEnaYBVNrjdBSCQ-O5OiijVtk81wmIwWpNFl_0qeI7kEPFdkhVqUGqG1-fK2ryRRWwyZqiWRPWsPIFuee7Ms4v05yiNtSKlivMHeffvmpfbzOnq8Py1q87m8Vae-GIZ" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9jb2xvcmxpYi5jb20vZXRjL3RiL1RhYmxlX0hpZ2hsaWdodF9WZXJ0aWNhbF9Ib3Jpem9udGFsL2luZGV4Lmh0bWw"/><script nonce="07675278-0e00-4125-a2cd-dce539658087">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0,z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>

<style>

  

@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700");


:root {
  --white: #afafaf;
  --red: #e31b23;
  --bodyColor: #30345f;
  --borderFormEls: hsl(0, 0%, 10%);
  --bgFormEls: hsl(0, 0%, 14%);
  --bgFormElsFocus: hsl(0, 7%, 20%);
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  outline: none;
}

a {
  color: inherit;
}

input,
select,
textarea,
button {
  font-family: inherit;
  font-size: 100%;
}

button,
label {
  cursor: pointer;
}

select {
  appearance: none;
}

/* Remove native arrow on IE */
select::-ms-expand {
  display: none;
}

/*Remove dotted outline from selected option on Firefox*/
/*https://stackoverflow.com/questions/3773430/remove-outline-from-select-box-in-ff/18853002#18853002*/
/*We use !important to override the color set for the select on line 99*/
select:-moz-focusring {
  color: transparent !important;
  text-shadow: 0 0 0 var(--white);
}

textarea {
  resize: none;
}

ul {
  list-style: none;
}

body {
  font: 18px/1.5 "Open Sans", sans-serif;
  background: var(--bodyColor);
  color: var(--white);
  margin: 1.5rem 0;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 0 1.5rem;
}


.my-form h1 {
  margin-bottom: 1.5rem;
}

.my-form li,
.my-form .grid > *:not(:last-child) {
  margin-bottom: 1.5rem;
}

.my-form select,
.my-form input,
.my-form textarea,
.my-form button {
  width: 100%;
  line-height: 1.5;
  padding: 15px 10px;
  border: 1px solid var(--borderFormEls);
  
  transition: background-color 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25),
    transform 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.my-form textarea {
  height: 170px;
}

.my-form ::placeholder {
  color: inherit;
  /*Fix opacity issue on Firefox*/
  opacity: 1;
}

.my-form select:focus,
.my-form input:focus,
.my-form textarea:focus,
.my-form button:enabled:hover,
.my-form button:focus,
.my-form input[type="checkbox"]:focus + label {
  
}

.my-form select:focus,
.my-form input:focus,
.my-form textarea:focus {
  transform: scale(1.02);
}

.my-form *:required,
.my-form select {
  background-repeat: no-repeat;
  background-position: center right 12px;
  background-size: 15px 15px;
}

.my-form *:required {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/asterisk.svg);  
}

.my-form select {
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/down.svg);
}

.my-form *:disabled {
  cursor: default;
  filter: blur(2px);
}



.my-form .required-msg {
  display: none;
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/asterisk.svg)
    no-repeat center left / 15px 15px;
  padding-left: 20px;
}

.my-form .btn-grid {
  position: relative;
  overflow: hidden;
  transition: filter 0.2s;
}

.my-form button {
  font-weight: bold;
}

.my-form button > * {
  display: inline-block;
  width: 100%;
  transition: transform 0.4s ease-in-out;
}

.my-form button .back {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-110%, -50%);
}

.my-form button:enabled:hover .back,
.my-form button:focus .back {
  transform: translate(-50%, -50%);
}

.my-form button:enabled:hover .front,
.my-form button:focus .front {
  transform: translateX(110%);
}



.my-form input[type="checkbox"] {
  position: absolute;
  left: -9999px;
}

.my-form input[type="checkbox"] + label {
  position: relative;
  display: inline-block;
  padding-left: 2rem;
  transition: background 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.my-form input[type="checkbox"] + label::before,
.my-form input[type="checkbox"] + label::after {
  content: '';
  position: absolute;
}

.my-form input[type="checkbox"] + label::before {
  left: 0;
  top: 6px;
  width: 18px;
  height: 18px;
  border: 2px solid var(--white);
}

.my-form input[type="checkbox"]:checked + label::before {
  background: var(--red);
}

.my-form input[type="checkbox"]:checked + label::after {
  left: 7px;
  top: 7px;
  width: 6px;
  height: 14px;
  border-bottom: 2px solid var(--white);
  border-right: 2px solid var(--white);
  transform: rotate(45deg);
}



footer {
  font-size: 1rem;
  text-align: right;
  backface-visibility: hidden;
}

footer a {
  text-decoration: none;
}

footer span {
  color: var(--red);
}



@media screen and (min-width: 600px) {
  .my-form .grid {
    display: grid;
    grid-gap: 1.5rem;
  }

  .my-form .grid-2 {
    grid-template-columns: 1fr 1fr;
  }

  .my-form .grid-3 {
    grid-template-columns: auto auto auto;
    align-items: center;
  }

  .my-form .grid > *:not(:last-child) {
    margin-bottom: 0;
  }

  .my-form .required-msg {
    display: block;
  }
}

@media screen and (min-width: 541px) {
  .my-form input[type="checkbox"] + label::before {
    top: 50%;
    transform: translateY(-50%);
  }

  .my-form input[type="checkbox"]:checked + label::after {
    top: 3px;
  }
}

img{
box-sizing: border-box;
width:50px;
height:50px;

margin:0;
border:5px solid #0082e6;
padding: 3px;
background-color: white;
overflow: hidden;
transition: all 1s;

}
.box:hover img{
width: 100px;
height: 20px;
margin:20px 35% ;
}
hr{
width:500px;
line-height:20px;
margin:10px 10px 10px 10px;
}


</style>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/tablestyle.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
 <script>
function confirmation()
{
	var option;
	option=confirm("Do you want to delete the record ?");
	return option;
}
</script>
<form class="my-form" method="get" enctype="multipart/form-data">

 
  
<style>
			label{
				width:250px;
				display:inline-block;
			}
			.button1:hover {
			  background-color: #4CAF50;
			  color: white;
			}
.button
{
	width: 25%;
	height: 40%;
	color: #fff;
	background: #0b8793;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	margin-top: 10px;
	margin-right: 10px;
}

.button:hover
{
	background: #360033;
}

#delete_button
{
	width: 35%;
	height: 20%;
	color: #fff;
	background: #0b8793;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	margin-top: 10px;
	margin-right: 10px;
	padding:5px;
}

#delete_button:hover
{
	background: #360033;
}

input{
	text-align: center;
}


#time_current{
  position: absolute;
  left: 50px;
  top: 10px;
}
 <script>
function confirmation()
{
	var option;
	option=confirm("Do you want to delete the record ?");
	return option;
}
</script>
			</style>
			 <?php 
				  
				  
				  ?>
			<div class="card-body px-0 pb-2">	  
			<div id="time_current">
			<h1 style="margin-left:5%;font-size:20px;">Current Time Set</h1>
			
			<?php

			if(isset($_GET["edit"]))
			{
		    $user_id = $_GET["id"];
			$day = $_GET["day"];
			$buzytime = mysqli_query($connect, "SELECT * from buzytime where user_id='$user_id' and day='$day'");	
				if($day=="mon")
				{
					?>
					<h1 style="margin-left:5%;font-size:20px;"><?php echo "Monday";?></h1>
					<input type="hidden" name="day" value="<?php echo $day; ?>">
					<?php
					
				}
				else if($day=="tue")
				{
					?>
					<h1 style="margin-left:5%;font-size:20px;"><?php echo "Tuesday";?></h1>
					<input type="hidden" name="day" value="<?php echo $day; ?>">
					<?php
					
				}
				else if($day=="wed")
				{
					?>
					<h1 style="margin-left:5%;font-size:20px;"><?php echo "Wednesday";?></h1>
					<input type="hidden" name="day" value="<?php echo $day; ?>">
					<?php
					
				}
				else if($day=="thu")
				{
					
					?>
					<h1 style="margin-left:5%;font-size:20px;"><?php echo "Thusday";?></h1>
					<input type="hidden" name="day" value="<?php echo $day; ?>">
					<?php
					
				}
				else if($day=="fri")
				{
					
					?>
					<h1 style="margin-left:5%;font-size:20px;"><?php echo "Friday";?></h1>
					<input type="hidden" name="day" value="<?php echo $day; ?>">
					<?php
					
				}
				else if($day=="sta")
				{
					
					?>
					<h1 style="margin-left:5%;font-size:20px;"><?php echo "Saturday";?></h1>
					<input type="hidden" name="day" value="<?php echo $day; ?>">
					<?php
					
				}
				else if($day=="sun")
				{
					?>
					<h1 style="margin-left:5%;font-size:20px;"><?php echo "Sunday";?></h1>
					<input type="hidden" name="day" value="<?php echo $day; ?>">
					<?php
					
				}
			}
				
				
				
				
				
			
			
				
				
			if(isset($_GET["savebtn"]))
			{
				$user_id=$_SESSION['user_id'];
				$start_time=$_GET["start_time"];
				$end_time=$_GET["end_time"];
				$day=$_GET["day"];
				
				
				$buzytimecount = mysqli_query($connect, "SELECT * from buzytime WHERE user_id='$user_id' and day='$day'");	
				$countbz = mysqli_num_rows($buzytimecount); 
				//check have same previous?
				
				while($rowbz = mysqli_fetch_assoc($buzytimecount))
				{
					$startbz_check=$rowbz["free_time_start"];
					$endbz_check=$rowbz["free_time_end"];
					
					if (!function_exists('create_time_range'))   {
					  function create_time_range($start, $end, $interval = '30 mins', $format = '24')  
					  {
					  $startTime = strtotime($start); 
					  $endTime   = strtotime($end);
					  $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';

					  $current   = time(); 
					  $addTime   = strtotime('+'.$interval, $current); 
					  $diff      = $addTime - $current;

					  $times = array(); 
					  while ($startTime < $endTime) { 
					   $times[] = date($returnTimeFormat, $startTime); 
					   $startTime += $diff; 
					  } 
					  $times[] = date($returnTimeFormat, $startTime); 
					  return $times; 
					 }
					}
					 // create array of time ranges 
					$times = create_time_range($startbz_check, $endbz_check, '30 mins');
				
				
					$arr2=array();
					if(empty($_SESSION['$arr2']))
					{
						
					}
					else
					{
						$arr2=$_SESSION['$arr2'];
					}
			
					foreach($times as $key => $val)
					{
						array_push($arr2,$val);
						$arr2	=array_unique($arr2); 
					}
					$_SESSION['$arr2']=$arr2;
				}	
				
				

				
					
					
			
					$error_time=0;
					
					if(empty($arr2))
					{
						
					}
					else
					{
						array_unique($arr2);
					}
					
					foreach ($arr2 as $value2)
					{
					
					$target1= $start_time.":00";
					$target1_2 = ltrim($target1, "0"); 
					$target2= $end_time.":00";
					$target2_2 = ltrim($target2, "0"); 
					

						 if(($target1_2!= $value2) && ($target2_2!= $value2))
							{
								$error_time=0;
							}
							else
							{
							 
								$error_time=1;
								break;
							}   
					   
					}

		
				
						
				if($error_time==1)
				{
						?>
						<script>
						alert("You have Added Same time with previous");
						location.assign("edit_time_schedule.php?edit&id=<?php echo $_SESSION['user_id']; ?>&day=<?php echo $day?>");
						</script>
						<?php
				}
				else
				{
					if($countbz<5)
					{
						

						
							mysqli_query($connect,"INSERT INTO buzytime(user_id,free_time_start,free_time_end,day)
							VALUES('$user_id','$start_time','$end_time','$day')");
													
							
							?>
							<script>
							alert("time added");
							location.assign("edit_time_schedule.php?edit&id=<?php echo $_SESSION['user_id']; ?>&day=<?php echo $day?>");
							</script>
							<?php
						
						
					}
					else
					{
						?>
						<script>
						alert("You Cant Add More Then 5 Slot");
						location.assign("edit_time_schedule.php?edit&id=<?php echo $_SESSION['user_id']; ?>&day=<?php echo $day?>");
						</script>
						<?php
					}
				}
				
				
				
				
			}
			
			
			
			
			?></h1>
<style>
@import url('https://fonts.googleapis.com/css?family=Lato:300,400,700');



.page-title {
  font-family: 'Lato', sans-serif;
  text-align: center;
  h1 {
    text-transform: lowercase;
    letter-spacing: 10px;
    font-size: 4.5em;
    font-weight: 300;
    margin-bottom: 0;
  }
  p {
    margin-top: 0;
    text-transform: uppercase;
    letter-spacing: 14px;
  }
}

#scrollbar-wrapper
{
  display: flex;
  height: 100vh;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center; 
}

.scrollbar
{
	height: 600px;
	width: 400px;
	
	overflow-y: scroll;
	margin: 25px;
}




.force-overflow
{
	min-height: 450px;
}



/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}

/*
 *  STYLE 2
 */

#style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #D62929;
}

</style>
<script>
function Compare() {
    var strStartTime = document.getElementById("txtStartTime").value;
    var strEndTime = document.getElementById("txtEndTime").value;

    var startTime = new Date().setHours(GetHours(strStartTime), GetMinutes(strStartTime), 0);
    var endTime = new Date(startTime)
    endTime = endTime.setHours(GetHours(strEndTime), GetMinutes(strEndTime), 0);
    if (startTime > endTime) {
        alert("Start Time is greater than end time");
		return false;
    }
    if (startTime == endTime) {
        alert("Start Time equals end time");
		return false;
    }
}
function GetHours(d) {
    var h = parseInt(d.split(':')[0]);
    if (d.split(':')[1].split(' ')[1] == "PM") {
        h = h + 12;
    }
    return h;
}
function GetMinutes(d) {
    return parseInt(d.split(':')[1].split(' ')[0]);
}
</script>
			
			 <div class="scrollbar" id="style-1">
  
			<?php
			$i=0;
			if(isset($_GET["edit"]))
			{
				$user_id = $_GET["id"];
				$buzytime = mysqli_query($connect, "SELECT * from buzytime where user_id='$user_id' and day='$day'");	
				while($bz = mysqli_fetch_assoc($buzytime))
				{
					?>
					
					<label style="margin-left:5%;font-size:20px;">Time table(<?php echo $i+1?>)</label><br><a id="delete_button" style="text-decoration:none" href="edit_time_schedule.php?delete&id=<?php echo $user_id;?>&day=<?php echo $day;?>&bzid=<?php echo $bz["buzytime_id"];?>&user_id=<?php echo $user_id;?>" onclick="return confirmation()">Delete</a>
					<br>
					<label style="margin-left:5%;font-size:20px;">Start time:</label>
					<input  style="border-radius:25px;" type="time" pattern="^([0-12]):([0][0])(:[0][0])?$" value="<?php echo $bz["free_time_start"];?>" readonly><br>
					<label style="margin-left:5%;font-size:20px;">End time:</label>
					<input  style="border-radius:25px;" type="time" value="<?php echo $bz["free_time_end"];?>" readonly><br>
					<?php
					$i+=1;
				}
			}	
			?>
			
			</div>
			</div>

              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <form name="editfrm" method="get" enctype="multipart/form-data">
					<label style="margin-left:5%;font-size:20px;">Select start time:</label>
					<input  style="border-radius:25px;" id="txtStartTime" type="time" step="1800" onkeyup='checktime();' name="start_time" required><br>
					<label style="margin-left:5%;font-size:20px;">Select end time:</label>
					<input style="border-radius:25px;" type="time" id="txtEndTime" step="1800"name="end_time" onkeyup='checktime();' required><br>
					<input type="hidden" name="day" value="<?php echo $day?>"><br>
				
				

					<br><input class="button" type="submit" name="savebtn" value="Add New"  onclick="return Compare()"/>
					</form>
					<?php 
					
					
					
					?>
                </table>
              </div>
            </div>


<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/select2/select2.min.js"></script>

<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"70456de6abb7739d","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>

			
			
			


<ul>

      <li>
        <div class="grid grid-3">
         
          
          <a class="btn-grid"  href='edit_time_schedule.php?back&id=<?php echo $user_id;?>'
		  name="back"class="front" style="text-decoration: none;">Back</a>
		  
		  
		  
		 
        </div>
      </li>    
    </ul>
 
</form>
<footer>
  
</footer>

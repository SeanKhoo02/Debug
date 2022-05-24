<?php include("dataconnection.php"); ?>

<?php	
session_start();
	 if(isset($_GET["view"]))
			{
		    $friend_id = $_GET["friend_id"];
			$user_id= $_GET["id"];
			$_SESSION['friend_id']=$friend_id;	
			$_SESSION['user_id']=$user_id;	
				
				
				if(empty($friend_id)||empty($user_id))	
				{
					$friend_id=$_SESSION['friend_id'];
					$user_id=$_SESSION['user_id'];
					
				}				
					
				
			}
			
			

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Friend List</title>
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
<form class="my-form" method="post" enctype="multipart/form-data" style="margin-top:5%">

 
  

<div class="wrap-table100">

<div class="table100 ver6 m-b-110">

<?php
if(isset($_GET["profile"]))
			{
		    $friend_id = $_GET["friend"];
$showfirendname = mysqli_query($connect, "SELECT * from user where user_id='$friend_id'");
$namefr = mysqli_fetch_assoc($showfirendname);
		} 	
?>
<p style="margin-left:3%">
<?php 
$showfirendname = mysqli_query($connect, "SELECT * from user where user_id='$friend_id'");
$namefr = mysqli_fetch_assoc($showfirendname);
echo $namefr["user_name"]." 's Time Table";
 
 

 ?>
 </p>
<table data-vertable="ver6">
<thead>
<tr class="row100 head">

<th class="column100 column4" data-column="column4">Day</th>
<?php 

	

    //$a = array($mon, $tue, $wed, $thu, $fri, $sta,$sun);
    //$res = 0;

   // foreach($a as $v) {
    //    if($res < $v)
    //        $res = $v;
	//}


	?>
	<th class="column100 column5" data-column="column5">Free Time(1)</th>
	<th class="column100 column5" data-column="column5">Free Time(2)</th>
	<th class="column100 column5" data-column="column5">Free Time(3)</th>
	<th class="column100 column5" data-column="column5">Free Time(4)</th>
	<th class="column100 column5" data-column="column5">Free Time(5)</th>



	



</tr>
</thead>

	<tbody>
	 <?php
		$friend_id=$_SESSION['friend_id'];
				  $buzytime = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id'");	
					
				  
				  ?>
	<tr class="row100">

	<style>
	input[type="time"]
	{
		background: transparent;
		border: none;
		color:white;
		
	}
	</style>
	<td class="column100 column2" data-column="column2" style="text-align: center;">Monday</td>
	<?php
	$buzytimemon = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id' and day='mon'");
	$mon=0;	
	while($bzmon = mysqli_fetch_assoc($buzytimemon))
	{
		$mon+=1;
	?>
	<td class="column100 column3" data-column="column3"  style="text-align: center;"><input style="text-align: center;" type="time"  readonly value="<?php echo $bzmon["free_time_start"];?>"> To <input  style="text-align: center;" type="time"  readonly value="<?php echo $bzmon["free_time_end"];?>"></td>
	
	<?php 
	
	}
	$redis=5-$mon;
	
	for($i=0;$i<$redis;$i++)
	{
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"></td>
	<?php
	}
	?>
	
	
	</tr>
	<tr class="row100">

	<td class="column100 column2" data-column="column2" style="text-align: center;">Tuesday</td>
	<?php
	$buzytimetue = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id' and day='tue'");
	$tue=0;	
	while($bztue = mysqli_fetch_assoc($buzytimetue))
	{
		$tue+=1;
	?>

	<td class="column100 column3" data-column="column3"  style="text-align: center;"><input style="text-align: center;" type="time"  readonly value="<?php echo $bztue["free_time_start"];?>"> To <input  style="text-align: center;" type="time"  readonly value="<?php echo $bztue["free_time_end"];?>"></td>
	
	<?php 
		
	}
	$redis=5-$tue;
	
	for($i=0;$i<$redis;$i++)
	{
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"></td>
	<?php
	}
	?>
</tr>
	<tr class="row100">

	<td class="column100 column2" data-column="column2" style="text-align: center;">Wednesday</td>
	<?php
	$buzytimewed = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id' and day='wed'");
	$wed=0;	
	while($bzwed = mysqli_fetch_assoc($buzytimewed))
	{
		$wed+=1;
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"><input style="text-align: center;" type="time"  readonly value="<?php echo $bzwed["free_time_start"];?>"> To <input  style="text-align: center;" type="time"  readonly value="<?php echo $bzwed["free_time_end"];?>"></td>
	
	<?php 
		
	}
	$redis=5-$wed;
	
	for($i=0;$i<$redis;$i++)
	{
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"></td>
	<?php
	}
	?>
	</tr>
	<tr class="row100">

	<td class="column100 column2" data-column="column2" style="text-align: center;">Thursday</td>
	<?php
	$buzytimethu = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id' and day='thu'");
	$thu=0;	
	while($bzthu = mysqli_fetch_assoc($buzytimethu))
	{
		$thu+=1;
	?>
	<td class="column100 column3" data-column="column3"  style="text-align: center;"><input style="text-align: center;" type="time"  readonly value="<?php echo $bzthu["free_time_start"];?>"> To <input  style="text-align: center;" type="time"  readonly value="<?php echo $bzthu["free_time_end"];?>"></td>
	
	<?php 
		
	}
	$redis=5-$thu;
	
	for($i=0;$i<$redis;$i++)
	{
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"></td>
	<?php
	}
	?>
	</tr>
	<tr class="row100">

	<td class="column100 column2" data-column="column2" style="text-align: center;">Friday</td>
	<?php
	$buzytimefri = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id' and day='fri'");
	$fri=0;	
	while($bzfri = mysqli_fetch_assoc($buzytimefri))
	{
		$fri+=1;
	?>
	<td class="column100 column3" data-column="column3"  style="text-align: center;"><input style="text-align: center;" type="time"  readonly value="<?php echo $bzfri["free_time_start"];?>"> To <input  style="text-align: center;" type="time"  readonly value="<?php echo $bzfri["free_time_end"];?>"></td>
	
	<?php 
		
	}
	$redis=5-$fri;
	
	for($i=0;$i<$redis;$i++)
	{
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"></td>
	<?php
	}
	?>
	</tr>
	<tr class="row100">

	<td class="column100 column2" data-column="column2" style="text-align: center;">saturday</td>
	<?php
	$buzytimesta = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id' and day='sta'");
	$sta=0;	
	while($bzsta = mysqli_fetch_assoc($buzytimesta))
	{
		$sta+=1;
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"><input style="text-align: center;" type="time"  readonly value="<?php echo $bzsta["free_time_start"];?>"> To <input  style="text-align: center;" type="time"  readonly value="<?php echo $bzsta["free_time_end"];?>"></td>
	
	<?php 
		
	}
	$redis=5-$sta;
	
	for($i=0;$i<$redis;$i++)
	{
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"></td>
	<?php
	}
	?>
	</tr>
	<tr class="row100">

	<td class="column100 column2" data-column="column2" style="text-align: center;">Sunday</td>
	<?php
	$buzytimesun = mysqli_query($connect, "SELECT * from buzytime where user_id='$friend_id' and day='sun'");
	$sun=0;	
	while($bzsun = mysqli_fetch_assoc($buzytimesta))
	{
		$sun+=1;
	?>
	<td class="column100 column3" data-column="column3"  style="text-align: center;"><input style="text-align: center;" type="time"  readonly value="<?php echo $bzsun["free_time_start"];?>"> To <input  style="text-align: center;" type="time"  readonly value="<?php echo $bzsun["free_time_end"];?>"></td>
	
	<?php 
		
	}
	$redis=5-$sun;
	
	for($i=0;$i<$redis;$i++)
	{
	?>
	
	<td class="column100 column3" data-column="column3"  style="text-align: center;"></td>
	<?php
	}
	?>
	</tr>

	</tbody>


</table>
<button><a class="btn-grid"  href='friendtime.php?profile&id=<?php echo $user_id;?>&friend=<?php echo $friend_id; ?>'
		  name="back"class="front" style="text-decoration: none;">Back</a></button>
<?php 
if(isset($_GET["profile"]))
			{
			$user_id= $_GET["id"];
				
			?>
			<script>
			
			location.assign("friendList.php?friend&id=<?php echo $user_id;?>");
			</script>
			<?php
		
			}


?>		  
		  
		  
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

			
		
         
          
          
		  
		  
		 
       

 
</form>
<footer>
  
</footer>

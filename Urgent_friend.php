<?php

session_start();
include("dataconnection.php");


if(isset($_GET["meet"]))
{
 session_destroy ();
 session_start();

 $hostid = $_GET["hostid"];
 $day= $_GET["day"];
 $_SESSION['user_id']=$hostid; 
}

if(empty($hostid))
{
	$hostid=$_SESSION['$hostid'];
	
}
else
{
	$_SESSION['$hostid']=$hostid;
}


$couuntlis=mysqli_query($connect,"SELECT * FROM friend WHERE user_id='$hostid'");
$listf=mysqli_num_rows($couuntlis);

//u are friend by another guy
$u_as_friend=mysqli_query($connect,"SELECT * FROM friend WHERE user_friend_id='$hostid'");

if(isset($_GET["reset"]))
{
	$hostid = $_GET["hostid"];
	$day= $_GET["day"];
 session_destroy ();
 session_start();
 ?>
				<script>
				location.assign("Urgent_friend.php?meet&hostid=<?php echo $hostid?>&day=<?php echo $day?>");
				</script>
				<?php
}

if(isset($_GET["back"]))
{
	$hostid = $_GET["hostid"];
	$day= $_GET["day"];
 session_destroy ();
 session_start();

 $_SESSION['user_id']=$hostid;
 ?>
				<script>
				location.assign("Urgent.php?Urgent&hostid=<?php echo $hostid?>");
				</script>
				<?php
}


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - No Javascript Table with Pagination</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<form method="post" name="user form">  
<!-- partial:index.partial.html -->
<div class="card">
  <div class="table-title">
    <h2>Select Friend To Meet</h2>
  </div>
  
  <div class="table-concept">
    <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
    <div class="table-display">Showing 1 to 
	<?php 

	if($listf>10)
			{
				echo "10";
			}
			else
			{
				echo $listf;
			}	
			
		?>
      of  <?php echo $listf; ?> items
    </div>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>No</th>
          <th>Friend Name</th>
          <th>Friend Email</th>
		  <th>Friend Image</th>
        </tr>
      </thead>
<?php 
if(mysqli_num_rows($couuntlis) > 0)
{
?>	  
      <tbody>
	<?php
$no=1;	
	while($row = mysqli_fetch_assoc($couuntlis))
	{
		$checked = '';
		$disabled = '';
		if(isset($_POST['submit']))
		{
			$disabled = 'disabled';
			
			if(empty($_POST['friend_id']))
			{
				?>
				<script>
				alert("Please Select the user");
				location.assign("Urgent_friend.php?meet&hostid=<?php echo $hostid?>&day=<?php echo $day?>");
				</script>
				<?php
			}
			
			if (in_array($row["friend_id"], $_POST['friend_id'])) {
				$checked = 'checked';
				
				
			}
			
		}
	?>	

        <tr>
	
          <td>
            <input type="checkbox" name="friend_id[]" id="cbx1" value="<?php echo $row["friend_id"].'" '.$checked.' '.$disabled;?>/>
          
		  </td>
          <td><?php echo $no;?></td>
          <td><?php echo $row["friend_name"];?>
			<input type="hidden" name="friend_name[]" value="<?php echo $row["friend_name"];?>"/>
		  </td>
		   <td><?php echo $row["friend_email"];?>
			<input type="hidden" name="friend_email[]" value="<?php echo $row["friend_email"];?>"/>
		   </td>
		    <td><img width="50px;" src="profile/image/<?php echo $row["friend_img"];?>">
				<input type="hidden" name="friend_img[]" value="<?php echo $row["friend_img"];?>"/>
			</td>
         
     
        </tr>
   	<?php
$no++;	
	}
	?>     
       
     
<?php 
}
 
if(mysqli_num_rows($u_as_friend)>0)
{
	while($u_as_f=mysqli_fetch_assoc($u_as_friend))
	{	
		
		$find_owner_id=$u_as_f["user_id"];
		
		$owner_details=mysqli_query($connect,"SELECT * FROM user WHERE user_id='$find_owner_id'");
		$owner_d=mysqli_fetch_assoc($owner_details);
		
		$own_name=$owner_d["user_name"];
		$own_email=$owner_d["user_email"];
		$own_img=$owner_d["user_img"];
		
		?>
		<tr>
	
          <td>
            <input type="checkbox" name="own_id[]"  value="<?php echo $owner_d["user_id"];?>"/>
          
		  </td>
          <td><?php echo $no;?></td>
          <td><?php echo $owner_d["user_name"];?>
		  </td>
		   <td><?php echo $owner_d["user_email"];?>
		   </td>
		    <td><img width="50px;" src="profile/image/<?php echo $owner_d["user_img"];?>">
			</td>
         
     
        </tr>
	
		<?php 
	
	$no+=1;
		
	}
}

if(mysqli_num_rows($u_as_friend)==0 && mysqli_num_rows($couuntlis)==0)

{
	?>
	<tbody>
        <tr>
          <td>
            <input type="checkbox"/>
          </td>
          
          <td>You No Have Friend Yet! Please add some friend before meeting</td>
         
          
        </tr>
        
       
      </tbody>
	<?php
}
	
?>
 </tbody>
    </table>
	<div class="pagination">
      <label class="disabled" for="table_radio_-1">&laquo; Previous</label>
      <label class="active" for="table_radio_0" id="table_pager_0">1</label>
      <label for="table_radio_1" id="table_pager_1">2</label>

      <label for="table_radio_1">Next &raquo;</label>

    </div>
 <input style="float: right;margin-left: 30px;" type="submit" name="submit" class="btn btn-success" value="Select User" <?php echo $disabled;?>>
 <button><a  style="float: right;text-decoration: none;" onclick="myFunction()" href="Urgent_friend.php?Urgent&reset&hostid=<?php echo $hostid?>&day=<?php echo $day?>">Reset</button></a>
		<button><a  style="float: right;text-decoration: none;" href="Urgent_friend.php?back&hostid=<?php echo $hostid?>&day=<?php echo $day?>">Back</button></a>
	  
  </div>
</div>

<?php

if(isset($_POST['submit']))
{


	if(!empty($_POST['friend_id']))
	{
		// Loop to store and display values of individual checked checkbox.
		
		foreach($_POST['friend_id'] as $selected => $value)
		{
		$meet_friend_id=$_POST['friend_id'][$selected];
		
			$finduser= mysqli_query($connect, "SELECT * from friend WHERE friend_id='$meet_friend_id'");
			$fduser = mysqli_fetch_assoc($finduser);
			$dbfriend_id=$fduser["user_friend_id"];

			$buzytimecount = mysqli_query($connect, "SELECT * from buzytime WHERE user_id='$dbfriend_id' and day='$day'");
			$arr2=array();
			
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
					$arr3=array();
					if(empty($_SESSION['arr2']))
					{
						$_SESSION['arr2']=$arr2;
					}
					else
					{
						$arr2=$_SESSION['arr2'];
					}
					
					foreach($times as $key => $val)
					{
						array_push($arr2,$val);
						$arr2=array_unique($arr2);
												
					}
					$_SESSION['arr2']=$arr2;
						
					
					
				}
					
			
		}
		
		
	}
		
		if (!function_exists('create_alltime_range'))   {
					  function create_alltime_range($start, $end, $interval = '30 mins', $format = '24')  
					  {
					  $startTime = strtotime($start); 
					  $endTime   = strtotime($end);
					  $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';

					  $current   = time(); 
					  $addTime   = strtotime('+'.$interval, $current); 
					  $diff      = $addTime - $current;

					  $alltime = array(); 
					  while ($startTime < $endTime) { 
					   $alltime[] = date($returnTimeFormat, $startTime); 
					   $startTime += $diff; 
					  } 
					  $alltime[] = date($returnTimeFormat, $startTime); 
					  return $alltime; 
					 }
					}
					 // create array of time ranges 
					$alltime = create_alltime_range('01:00','24:30', '30 mins');
		
			$result_free=array();
			$result_free = array_diff($alltime, $arr2);
			$_SESSION['$arr2']=$arr2;
			
		
		

		 $start = strtotime($result_free[0]);
		 $add=	strtotime('00:30:00');
		 $length = count($result_free);	
		 $sum=0;
		 $sum2=0;
		 $select=array();
		 foreach ($result_free as $v)
		 {
			
					$test2=date("H:i:s",$sum);
					$test2_2 = ltrim($test2, "0"); 
					if($test2_2!=$v)
					{
						
						//echo $test2_2;
						//echo "<br>";
						
						
					}
					else
					{
						array_push($select,$v);
						
					}
					
						$sum+=$start-$add;

		 }
					 foreach ($arr2 as $valll)
					 {
		 
						?>
						<input type="hidden" name="buzytime[]" value="<?php echo $valll?>">
						<?php
					 }
		?>
<div class="card">
<h1>Members Availability</h1>
<p><select style="margin-left: 30px;" name="timeStart" class="timeStart">
    <option value="">Select Start Time</option>
    <?php foreach($result_free as $key=>$val){ ?>
    <option value="<?php echo $val; ?>" onchange="getvalue(this);"><?php echo $val; ?></option>
    <?php } ?>
</select> 
<input type="hidden" name="hostid" value="<?php echo $hostid; ?>">
TO

<select name="timeEnd">
    <option value="">Select end Time</option>
    <?php foreach($result_free as $key=>$val){ ?>
    <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
    <?php } ?>
</select>




<button style="float: right;margin-right: 30px;" type="submit" name="create" >Create Meeting time</button>

</p>

 
</div>
<?php 

}
elseif (isset($_POST['create']))
	{
		$timeStart=	$_POST['timeStart'];
		$timeEnd=$_POST['timeEnd'];
		$hostid=$_POST['hostid'];			
		$buzytime=$_POST['buzytime'];

		
		$error_time=0;
		
		if (!function_exists('create_buzytime_range'))   {
					  function create_buzytime_range($start, $end, $interval = '30 mins', $format = '24')  
					  {
					  $startTime = strtotime($start); 
					  $endTime   = strtotime($end);
					  $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';

					  $current   = time(); 
					  $addTime   = strtotime('+'.$interval, $current); 
					  $diff      = $addTime - $current;

					  $testfree = array(); 
					  while ($startTime < $endTime) { 
					   $testfree[] = date($returnTimeFormat, $startTime); 
					   $startTime += $diff; 
					  } 
					  $testfree[] = date($returnTimeFormat, $startTime); 
					  return $testfree; 
					 }
					}
					 // create array of time ranges 
					$testfree = create_buzytime_range($timeStart,$timeEnd, '30 mins');
		
		
		$resultmeet=array_intersect($buzytime,$testfree);

						 if(empty($resultmeet))
							{
								$error_time=0;
							}
							else
							{
							 
								$error_time=1;
								
							}
		
		
		if($error_time!=1)
		{
			 session_destroy ();
			 session_start();

			 $_SESSION['user_id']=$hostid;
			?>
				<script>
				alert("create Meet Successful");
				location.assign("Urgent_friend.php?meet&hostid=<?php echo $hostid?>&day=<?php echo $day?>");
				</script>
				<?php
		}
		else
		{
			session_destroy ();
			 session_start();

			 $_SESSION['user_id']=$hostid;
			?>
				<script>
				alert("Your Selected time was crash somebody");
				location.assign("Urgent_friend.php?meet&hostid=<?php echo $hostid?>&day=<?php echo $day?>");
				</script>
				<?php
		}
					
						
				
		
	}
?>

</form>  
</body>
</html>
<?php 



?>

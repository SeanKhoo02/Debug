<?php

session_start();
include("dataconnection.php");


if(isset($_GET["Standard"]))
{
 session_destroy ();
 session_start();

 $hostid = $_GET["hostid"];
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
    
	<div class="table-display">Showing <?php  echo $_SESSION['$no'];?> to 
      of   items
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
	  
<tbody>	  
<?php
//u are user  
$ur_friend=mysqli_query($connect,"SELECT * FROM friend WHERE user_id='$hostid'");

//u are friend by another guy
$u_as_friend=mysqli_query($connect,"SELECT * FROM friend WHERE user_friend_id='$hostid'");

$no=1;
if(mysqli_num_rows($ur_friend)>0)
{
	
	while($ur_f=mysqli_fetch_assoc($ur_friend))
	{
		
		$user_friend_id=$ur_f["user_friend_id"];
		$friend_name=$ur_f["friend_name"];
		$friend_email=$ur_f["friend_email"];
		$friend_img=$ur_f["friend_img"];
		

		?>
		 <tr>
	
          <td>
            <input type="checkbox" name="friend_id[]" id="cbx1" value="<?php echo $ur_f["user_friend_id"];?>"/>
          
		  </td>
          <td><?php echo $no;?></td>
          <td><?php echo $ur_f["friend_name"];?>
		  </td>
		   <td><?php echo $ur_f["friend_email"];?>
		   </td>
		    <td><img width="50px;" src="profile/image/<?php echo $ur_f["friend_img"];?>">
			</td>
         
     
        </tr>
		
		<?php 
	
	$no+=1;
	
	}
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



?>




</tbody>
</table>

	<div class="pagination">
      <label class="disabled" for="table_radio_-1">&laquo; Previous</label>
      <label class="active" for="table_radio_0" id="table_pager_0">1</label>
      <label for="table_radio_1" id="table_pager_1">2</label>

      <label for="table_radio_1">Next &raquo;</label>

    </div>
 <input style="float: right;margin-left: 30px;" type="submit" name="submit" class="btn btn-success" value="Select User" >

		<button><a  style="float: right;text-decoration: none;" href="home.php">Back</button></a>
	  
  </div>
</div>





</form>  
</body>
</html>


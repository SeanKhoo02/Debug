<?php include("dataconnection.php"); ?>

<?php	
session_start();


		    if(isset($_GET["add"]))
			{
		    $user_id = $_GET["id"];
			
			if(empty($user_id))
			{
				$_SESSION['user_id']=$user_id;
			}
			else
			{
				$user_id=$_SESSION['user_id'];
			}
						
			
			$result = mysqli_query($connect,"SELECT * from user WHERE user_id='$user_id'");
			$row = mysqli_fetch_assoc($result);
			}
			
			
if(isset($_GET["addnew"]))
{
	$targetid = $_GET["id"];
	
	$user_id=$_SESSION['user_id'];
	
	$result = mysqli_query($connect,"SELECT * from user WHERE user_id='$user_id'");
	$row2 = mysqli_fetch_assoc($result);
	
	
	$user_name=$row2["user_name"];
	$user_email=$row2["user_email"];
	$user_img=$row2["user_img"];
	
	//check friend repeat
	$friend_error=0;
	$checkfr = mysqli_query($connect,"SELECT * from friend WHERE user_id='$user_id'");
	while($ch = mysqli_fetch_assoc($checkfr))
	{
		$friend_id=$ch["user_friend_id"];
		if($friend_id==$targetid)
		{
			$friend_error=1;
		}
	}
	
	$friend_error2=0;
	$checkfr2 = mysqli_query($connect,"SELECT * from friend_request WHERE user_id='$user_id'");
	while($ch2 = mysqli_fetch_assoc($checkfr2))
	{
		$friend_id2=$ch2["friend_target_id"];
		if($friend_id2==$targetid)
		{
			$friend_error2=1;
		}
	}
	$friend_error3=0;
	if($user_id==$targetid)
	{
		$friend_error3=1;
	}
	
	if($friend_error!=0)
	{
		?>
		<script>
		alert("You Already Have This Friend!");
		location.assign("Addfriend.php?add&id=<?php echo $user_id;?>");
		</script>
		<?php
	}
	else if($friend_error2!=0)
	{
		?>
		<script>
		alert("Your friend request is waiting for confirmation!");
		location.assign("Addfriend.php?add&id=<?php echo $user_id;?>");
		</script>
		<?php
	}
	else if($friend_error3!=0)
	{
		?>
		<script>
		alert("You Cant Add Your Self!");
		location.assign("Addfriend.php?add&id=<?php echo $user_id;?>");
		</script>
		<?php
	}
	else
	{
		mysqli_query($connect,"INSERT INTO friend_request(user_id,user_name,user_email,user_img,friend_target_id)VALUES('$user_id','$user_name','$user_email','$user_img','$targetid')");
		
		?>
		<script>
		alert("Request send!");
		location.assign("Addfriend.php?add&id=<?php echo $user_id;?>");
		</script>
		<?php
	}
	
				
}

	
		?>

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

<form class="my-form" method="get" enctype="multipart/form-data" >

  <div class="container" >
  <div class="card">  
  <div class="table-title">
    <h2>Add Friend</h2>
  </div>
  <div class="table-concept">
    <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
    <div class="table-display">
	<input class="border" style="border-radius: 12px;"type="text" name="searchname" >
	<br><br>
	<input class="button" type="submit" style="width:30%;margin-right:35%;border-radius: 12px;background-color:#9370DB;color:white;border:3px;" value="Search" name="searchbtn">
    </div>
    <table >
      <thead>
        <tr>   
			<th >User Name</th>
			<th >User Email</th>
            <th >User Image</th>
			<th >Action</th>
        </tr>
      </thead>
	   <?php
	   if(isset($_GET["searchbtn"]))
					{
						$user_id=$_SESSION['user_id'];
						$result=$_GET["searchname"];
						$search=mysqli_query($connect,"SELECT * from user WHERE  user_id!='$user_id' and user_code like '%$result%' or  user_name like '%$result%' or  user_email like '%$result%'");
						if(mysqli_num_rows($search)==0)
						{
							?>
							
							
							<tbody>
								  <tr>
									 <td class="align-middle text-center">
										<?php echo " Result could not be found !"; ?>
									  </td>
									</tr>
								  </tbody>
						<?php
						}
						else
						{
					while($row=mysqli_fetch_assoc($search))
					{
					?>
                  <tbody>
				  <tr>
                     <td class="align-middle text-center">
                        <?php echo  $row['user_name']; ?>
                      </td>
                      <td class="align-middle text-center">
                        <?php echo  $row['user_email']; ?>
                      </td>
                       <td class="align-middle text-center">
                        <img width="50" height="50" src="profile/image/<?php echo  $row['user_img']; ?>">
                      </td>
                      <td class="align-middle text-center">
                        <a  href="Addfriend.php?addnew&id=<?php echo $row['user_id'];?>" > 
						Add Friend</a>
                      </td>
                    </tr>
                  </tbody>
				  <?php
					}
					}
					}
					else
					{
						?>
						<tbody>
								  <tr>
									 <td class="align-middle text-center">
										<?php echo "Please Input Friend Code!"; ?>
									  </td>
									</tr>
								  </tbody>
						<?php
					}	
	   
	   
			?>	  
					  
    </table>
    
      
   
  </div>
</div>
			
			
			


<ul>

      <li>
        <div class="grid grid-3">
         
          <?php $user_id=$_SESSION['user_id'];?>
          <a class="btn-grid"  href="requests.php?request&id=<?php echo $user_id;?>"
		  name="back"class="front" style="text-decoration: none;">Back</a>
		 
		  
		 
        </div>
      </li>    
    </ul>
  </div>
</form>
<footer>
  
</footer>

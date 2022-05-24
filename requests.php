<?php include("dataconnection.php"); ?>

<?php	
session_start();
		    if(isset($_GET["request"]))
			{
		    $user_id = $_GET["id"];

			$result = mysqli_query($connect,"SELECT * from friend_request WHERE friend_target_id='$user_id'");
			$row = mysqli_fetch_assoc($result);
			
				if(empty($user_id))
				{
					$user_id=$_SESSION['user_id'];
				}
				else
				{
					
					$_SESSION['user_id']=$user_id;
				}
			}
			
			
			if(isset($_GET["accept"]))
			{
		    $guyadd_u = $_GET["id"];
			
			$result = mysqli_query($connect,"SELECT * from friend_request WHERE user_id='$guyadd_u'");
			$row33 = mysqli_fetch_assoc($result);
			
			$user_id=$_SESSION['user_id'];
			$friend_name=$row33["user_name"];
			$friend_email=$row33["user_email"];
			$friend_img=$row33["user_img"];
			
			
			
			mysqli_query($connect,"INSERT INTO friend(user_id,user_friend_id,friend_name,friend_email,friend_img)VALUES('$user_id','$guyadd_u','$friend_name','$friend_email','$friend_img')");
	
			mysqli_query($connect,"DELETE from friend_request WHERE user_id='$guyadd_u'");
			
			
			?>
			<script>
			alert("Request Accepted");
			</script>
			<?php
			}
			
			
			
			if(isset($_GET["delete"]))
			{
		    $targetid = $_GET["id"];

			mysqli_query($connect,"DELETE from friend_request WHERE user_id='$targetid'");
			?>
			<script>
			alert("Request Deleted");
			</script>
			<?php
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

<form class="my-form" method="post" enctype="multipart/form-data">

  <div class="container">
  <div class="card">  
  <div class="table-title">
    <h2>Friend Request</h2>
  </div>
  <?php
 $user_id=$_SESSION['user_id'];
$result = mysqli_query($connect,"SELECT * from friend_request WHERE friend_target_id='$user_id'");
$findre=mysqli_num_rows($result);

  ?>
  <div class="table-concept">
    <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
    <div class="table-display">Showing <?php echo $findre?> items
    </div>
    <table>
      <thead>
        <tr>
			<th >Request ID</th>    
			<th >User Name</th>
			<th >User Email</th>
            <th >User Image</th>
			<th >Action Accept</th>
			<th >Action Deny</th>
        </tr>
      </thead>
	   <?php
				  				
					
			if($findre==0)
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
				while($row=mysqli_fetch_assoc($result))
				{
				?>
	  
	  
	  
				<tbody>
					  <tr>
						 <td >
							<?php echo  $row['user_add_id']; ?>
						  </td>
						  <td >
							<?php echo  $row['user_name']; ?>
						  </td>
						  <td >
						   <?php echo  $row['user_email']; ?>
						  </td>
						  <td >
						   <img width="50px;"src="profile/image/<?php echo $row["user_img"];?>"> 
						  </td>
						   <td >
							<a style="color:black;text-align:center;text-center;font-size: 12px;" href="requests.php?accept&id=<?php echo $row['user_id'];?>">
								Accept</a>
						  </td>
						  <td >
						   <a style="color:black;text-align:center;text-center;font-size: 12px;" href="requests.php?delete&id=<?php echo $row['user_id'];?>">
								Delete </a>
						  </td> 
						</tr>
					  </tbody>
					  
			 <?php
				}
			}				
			
			
			
			?>		  
					  
    </table>
    
      
   
  </div>
</div>
			
			
			


<ul>

      <li>
        <div class="grid grid-3">
         
          
          <a class="btn-grid"  href='home.php'
		  name="back"class="front" style="text-decoration: none;">Back</a>
		  <a class="btn-grid"  href='Addfriend.php?add&id=<?php echo $user_id;?>'
		  name="back"class="front" style="text-decoration: none;">Add Friend</a>
		  
		 
        </div>
      </li>    
    </ul>
  </div>
</form>
<footer>
  
</footer>

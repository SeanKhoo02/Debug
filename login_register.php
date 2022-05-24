<?php 
session_start();
include("dataconnection.php");

if(isset($_GET["submitbtn"]))
{
	$user_name=$_GET["user_name"];
	$user_email=$_GET["user_email"];
	$user_pass=$_GET["user_pass"];
	
	
		
	$errors=array();
	
	$checkUser="SELECT * from user where user_email='$user_email'";
	$result=mysqli_query($connect,$checkUser);
	$count=mysqli_num_rows($result);
	
	
	
	$errorfind=0;
	if($count>0)
	{
		$errorfind=1;
	}
	
	
	if($errorfind>0)
	{
		if($count>0)
		{
		$errors['e']="email already Using!!!";
		?>
		<script>
		alert("User email already signed up,Please Using another email!");
		</script>
		<?php
		}

	}
	
	
	if($count==0)
	{
		$addnew=mysqli_query($connect,"SELECT * FROM user order by user_id DESC LIMIT 1");
		$rownew=mysqli_fetch_assoc($addnew);
		$code=$rownew["user_id"]+1000;
		$code2=$code+1;
		$user_code="F".$code2;
		
		$sql=mysqli_query($connect,"INSERT INTO user(user_code,user_name,user_email,user_pass,user_img)VALUES('$user_code','$user_name','$user_email','$user_pass','user.png')");
		
		$getid = mysqli_query($connect, "SELECT * from user where user_code='$user_code'");	
		if($idget = mysqli_fetch_assoc($getid))
		{
			$getuser_id=$idget["user_id"];
			$sql=mysqli_query($connect,"INSERT INTO buzytime(user_id,day)VALUES('$getuser_id','mon')");
		}
		
		
			
		
						/*
						//mail  function 
						//the subject
						$sub = "Congratulate! Welcome You $cust_name !";
						//the message
						$msg = "Dear $cust_name , Your Account was Created at ONLINE GROCERY STORE! This is Your Email And Phone number
								
								Email: $cust_email
								Phonenumber: $cust_phone
						";
						
						//recipient email here
						$rec = $cust_email;
						//send email
						mail($rec,$sub,$msg);
						
						
						//mail  function end\
						
						*/
		?>
		<script>
		alert("User successful added,Please check Your Email!");
		<?php 
		$logre=mysqli_query($connect,"SELECT * FROM user WHERE user_email='$user_email'");
		$rowlog=mysqli_fetch_assoc($logre);
		$_SESSION["user_id"]=$rowlog["user_id"];
		?>
		location.assign("home.php");
		</script>
		<?php
		if($connect->query($sql))
		{
		
		}


	}
		
}



if(isset($_GET["loginbtn"]))
{
	
		$user_email=$_GET["u_email"];
		$user_pass=$_GET["u_password"];
		
		
		$resultlo=mysqli_query($connect,
		"SELECT * FROM user WHERE user_email='$user_email'");

		$result=mysqli_query($connect,
		"SELECT * FROM user WHERE user_email='$user_email' AND user_pass='$user_pass'");
		
		$count=mysqli_num_rows($result);
		$countlo=mysqli_num_rows($resultlo);
		
		
		
		if($countlo==0)
		{
			
			?>
			<script>
			alert("This account has not been registered!");
			</script>
			<?php
		}
		else
		{
			if($count==1)
			{
				$row=mysqli_fetch_assoc($result);
				$_SESSION["user_id"]=$row["user_id"];
				header("location:home.php");
			}
			else
			{
				?>
			<script>
			alert("wrong email or password!");
			</script>
			<?php
			}
		}
			
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login & Register</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<style>
body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
}
.main{
	width: 700px;
	height: 650px;
	background: red;
	overflow: hidden;
	background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
	
}
#label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
.inputform{
	width: 40%;
	height: 10px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 20px;
	border: none;
	outline: none;
	border-radius: 5px;
	
}
.inputphone{
	width: 40%;
	height: 10px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 20px;
	border: none;
	outline: none;
	border-radius: 5px;
	
}

#button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #0b8793;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;

}
#button:hover{
	background: #360033;
}
.login{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login #label{
	color: #360033;
	transform: scale(.6);
}

#chk:checked ~ .login{
	transform: translateY(-500px);
}
#chk:checked ~ .login #label{
	transform: scale(1);	
}
#chk:checked ~ .signup #label{
	transform: scale(.6);
}

#message,#msg{margin-left:30%;}

.true {
  color: green;
}

.false {
  color: red;
}


a:link { text-decoration: none; }

</style>
<script>

function myFunction1() {
  var x = document.getElementById("password1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Form</title>
	
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form name="user_form" method="GET" action=""  class="form-horizontal">
				
					
					<label id="label" for="chk" aria-hidden="true" style="margin-top:1%;">Sign up</label>
					<p style="margin-left:30%;margin-top:-5%;color:white">Username<b style="color:red;">*</b></p>
					<input class="inputform" style="margin-top:-1%;"id="cus_n" type="text" name="user_name" placeholder="User name" required autocomplete="off">
				
					<p style="margin-left:30%;margin-top:-1%;color:white">User Email<b style="color:red;">*</b></p>
					<input class="inputform" type="email"style="margin-top:-1%;" name="user_email" placeholder="Email" required autocomplete="off" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="e.g exmaple@gmail.com">
					<p style="color:red;margin-left:30%;margin-top:-1%;"><?php if(isset($errors['e'])) echo $errors['e']; ?></p>
					
					<p style="margin-left:30%;margin-top:-1%;color:white">User Password<b style="color:red;">*</b> 
					</p>
					<input class="inputform"  id="password" required  type="password" name="user_pass" placeholder="Password" placeholder="Password" required autocomplete="off" />
					<input class="inputform" style="margin-left:10%;"type="checkbox" onclick="myFunction()"><p style="margin-left:33%;margin-top:-4%;color:white">Show Password</p>
					
					
					
	
					<input id="button" style="padding:10px;" type="submit" value="Sign up" name="submitbtn" ></input>

				</form>
			</div>

			<div class="login">
				<form>
					<label id="label"for="chk" aria-hidden="true">Login</label>
					<p style="margin-left:30%;margin-top:-5%;">User Email</p>
					<input class="inputform" type="email" name="u_email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" title="e.g exmaple@gmail.com" required autocomplete="off">
					<p style="margin-left:30%;">User Password</p>
					<input class="inputform" id="password1" type="password" name="u_password" placeholder="Password" required autocomplete="off">
					<input class="inputform" style="margin-left:10%;"type="checkbox" onclick="myFunction1()"><p style="margin-left:33%;margin-top:-4%">Show Password</p>
					
					<a href="change.php" style="color:red;margin-left:30%;font-style: italic;">Forget Password?</a>
					<button id="button" type="submit" sty=value="Send!" name="loginbtn" onclick="check()">Login</button>
				</form>
			</div>
	</div>
</body>
</html>

  
</body>
</html>
<?php include("dataconnection.php"); ?>

<?php
session_start();




	if(isset($_GET["profile"]))
	{			
				$user_id = $_GET["user_id"];
				
				
				$result = mysqli_query($connect, "SELECT * from user where user_id='$user_id'");	
				$row = mysqli_fetch_assoc($result);
				
				
	}
	
$user_id = $_GET["user_id"];	
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
?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css"
<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-image:url('profile/image/<?php echo $row["user_img"];?>'); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $row["user_name"];?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. Now you can set your information.</p>
			<a class="btn btn-info" href="home.php" >Back to Main Menu</a>
			<br><br>
            <a href="profile_edit.php?edit&id=<?php echo $row["user_id"];?>" class="btn btn-info">Edit profile</a>
			
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="profile/image/<?php echo $row["user_img"];?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-0 pt-md-4">
              <div class="row" >
                <div class="col" style="margin-top:30px;">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                    
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $row["user_name"];?><span class="font-weight-light"></span>
                </h3>
               <br>
                <br>
                <a href="friendList.php?friend&id=<?php echo $user_id;?>" class="btn btn-info">Friend List</a>
				<a href="order_history.php?history&id=<?php echo $user_id;?>" class="btn btn-info">View History</a>
				<a style="margin-top:20px;" href="profile_changePass.php?change&id=<?php echo $user_id;?>" class="btn btn-info">Change Your Password</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">User Name</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $row["user_name"];?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">User Email</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="kelly@example.com" value="<?php echo $row["user_email"];?>" readonly >
                      </div>
                    </div>
                  </div>
                  <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">My Friend Code</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Name" value="<?php echo $row["user_code"];?>" type="text" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
				
               <h6 class="heading-small text-muted mb-4">Time Schedule</h6>
			    <a href="time_schedule.php?time&id=<?php echo $row["user_id"];?>" class="btn btn-info">Edit Time Schedule</a>
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>Made by <a href="https://online.mmu.edu.my/" target="_blank">Multimedia University</a></p>
        </div>
      </div>
    </div>
  </footer>
</body>
<?php 
	session_start();
	include("config.php");
	$error="";
	if(isset($_POST['login']))
	{
		$user=$_REQUEST['user'];
		$pass=$_REQUEST['pass'];
		$pass= sha1($pass);
		
		if(!empty($user) && !empty($pass))
		{
			$query = "SELECT auser, apass FROM admin WHERE auser='$user' AND apass='$pass'";
			//$query = "SELECT auser, apass FROM admin WHERE auser='$user'";
			$result = mysqli_query($con,$query);
			$num_row = mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			if( $num_row ==1 )
			{
				$_SESSION['auser']=$user;
			
				header("Location: dashboard.php");
			}
			else
			{
				// echo $user;
				// exit();

				$error='* Invalid User Name and Password';
			}
		}else{
			$error="* Please Fill all the Fileds!";
		}
		
	}   
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> Admin - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.password-toggle-icon{
  position: absolute;
  top:50%;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
}
.password-toggle-icon i{
  font-size: 18px;
  line-height: 1;
  color:#28a745;
  transition: color 0.3s ease-in-out;
  margin-bottom: 20px;
}

.password-toggle-icon i:hover{
  color:#28a745;
}
			</style>
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Admin Login Panel</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<p style="color:red;"><?php echo $error; ?></p>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input class="form-control" name="user" type="text" placeholder="User Name">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="pass" placeholder="Password" id="password">
										<span class=" password-toggle-icon"><i class="fas fa-eye"></i></span>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
									</div>
								</form>
								
																
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script>

const passwordfield=document.getElementById("password");
const togglepassword=document.querySelector(".password-toggle-icon i");

togglepassword.addEventListener("click", function(){

	if(passwordfield.type==="password")
	{
		passwordfield.type="text";
		togglepassword.classList.remove("fa-eye");
		togglepassword.classList.add("fa-eye-slash");
	}
	else{
		passwordfield.type="password";
		togglepassword.classList.remove("fa-eye-slash");
		togglepassword.classList.add("fa-eye");
	}
})
	</script>
		
    </body>

</html>
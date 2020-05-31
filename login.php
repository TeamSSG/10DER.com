<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.8">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Sliding_login_page</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
	<link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="post">
			<h1>Create Account</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<!-- <span>or use your email for registration</span> -->
			<input type="text" placeholder="Name" name="sname" />
			<input type="email" placeholder="Email" name="semail"/>
			<input type="password" placeholder="Password" name="spassword" />
			<button name="sign_up">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="post">
			<h1>Sign in</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<!-- <span>or use your account</span> -->
			<input type="email" placeholder="Email" name="lemail"/>
			<input type="password" placeholder="Password" name="lpassword"/>
			
			<button value="login" name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="js/login.js"></script>
<?php
if(isset($_POST['sign_up']) || isset($_POST['login']))
{
	$user=$_POST['lemail'];
	$password=$_POST['lpassword'];
	$query1="select * from requester where username='$user' && password='$password'";
	$query2="select * from provider where username='$user' && password='$password'";
	$result1=$conn->query($query1);
	$result2=$conn->query($query2);

	if ( $result1->num_rows>0|| $result2->num_rows>0) 
	{
		$_SESSION['user']=$user;
	  header('Location: 10DER.html');
	} 
	else 
	{
	  echo "please enter correct credentials";
	}
}


?>

</body>
</html>

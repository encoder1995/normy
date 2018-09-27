<?php
//phpinfo();
$email = NULL;
$flag = 0;

	include "../util/db_conn.php";
	if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = mysqli_escape_string($conn,$_POST['email']); // Turn our post into a local variable
	if($email != NULL){
	if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
    // Return Error - Invalid Email
    $msg = 'The email you have entered is invalid, please try again.';
	$flag = 1;
}else{
    // Return Success - Valid Email
    //$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
	$flag = 2;
}
	}
}

$check_mail = "SELECT email from users WHERE email = '$email'";
$temp_check_mail = mysqli_query($conn,$check_mail);
$match = mysqli_num_rows($temp_check_mail);
//echo $match;
	if($match > 0){
        // We have a match, account with this email already exist
        $msg = 'An account with this email already exists! If its your account, go to login page';
    }
	elseif($email == NULL and $flag == 1)
	{
		$msg = 'Please enter an email to continue';
	}
	elseif($email != NULL and $flag == 2 and $match == 0){
//generate a random checking hash
$hash = md5( rand(0,1000) );
//a random username
//$username = "user";
//create a random password
$password = rand(1000,5000);
$password_secured = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users(password,email,hash) VALUES ('$password_secured','$email','$hash')";
$res = mysqli_query($conn,$sql);
//email for profiles also uploaded here
mysqli_query($conn,"INSERT INTO profiles(email) VALUES ('$email')");

//echo $email;
// SEND VERIFIATION Email
if($email != NULL){
$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following password and your email after you have activated your account by pressing the url below.
 
------------------------
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://localhost:81/mimi/login.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From: sharma.anirudh1995@gmail.com' . "\r\n"; // Set from headers
if(mail($to, $subject, $message, $headers)) {
    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
} else {
    //die('Failure: Email was not sent!');
}
}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<?php 
					if(isset($msg)){  // Check if $msg is not empty
						echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
					} 
				?>

					<span class="login100-form-title p-b-34">
						Memer Register
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="gf" placeholder="Girlfriend's Name">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit">
							Register
						</button>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button class="" type = "button" onclick = "location.href='../home/home.php'">
						<br>
							Home
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						
					</div>

					<div class="w-full text-center">
						<a href="login.php" class="txt3">
							Sign In
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
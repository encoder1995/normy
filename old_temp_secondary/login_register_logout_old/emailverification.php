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

<html>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="register.css">

	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../home/home.php">HOME</a></li>
		<li><a href="login.php">LOG IN</a></li>
      </ul>
    </div>
  </div>
</nav> 


<body>
	<div class = "jumbotron text-center">
        <h2>Sign Up</h2>

        <h3>Please enter you email to proceed</h3>
</div>
<div class = "container">  
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group">

                <label>Email:</label>

                <input type="text" placeholder = "enter your email" name="email"class="form-control">

                

            </div>    

			<div class = "text-center">
            <div class="btn-group">

                <input type="submit" class="btn btn-primary" value="Submit">

                <input type="reset" class="btn btn-primary" value="Reset">
				 
			
            </div>

            <p>Already have an account? <a href="login.php">Login here</a>.</p>
			</div>
        </form>

</div>
<?php 
    if(isset($msg)){  // Check if $msg is not empty
        echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    } 
?>
</body>
</html>
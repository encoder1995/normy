<?php

include 'navbar.html';
	// Initialize the session

session_start();

 

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login.php");

  exit;

}
?>

<!DOCTYPE html>
<html>
	<header>
		Anything you want to Say
	</header>
	<link rel="stylesheet" type="text/css" href="criticizeme.css">
	<body>
	
	<!--<form action = "home.php" class="rethom">
			<button type="submit">Home</button>
		</form>-->
	
	
		 <form action="thankyou.html" id="usrform">
		Name: <input type="text" name="usrname">
				<input type="submit">
		</form>
		<br></br>
		<div class = "ta">
			<textarea name="comment" form="usrform">Enter text here...</textarea> 
		</div>
	</body>
</html>

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
		What do you want me to make?
	</header>
		<link rel="stylesheet" type="text/css" href="criticizeme.css">
	<body>
	
		<form action="memeordered.php" id="usrform">
		Your Email: <input type="text" name="email">
				<input type="submit">
		
		<br></br>
		<div class = "ta">
			<textarea name="doubt" form="usrform">What do you want me to make...</textarea> 
		</div>
		</form>
	</body>
</html>
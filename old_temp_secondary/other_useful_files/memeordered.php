<?php
include 'navbar.html';
// Check connection
 include 'db_conn.php';
// Initialize the session

session_start();

 

// If session variable is not set it will redirect to login page

if($_POST){

$email = $_POST['email'];
		

$doubt = $_POST['doubt'];
		

   
//inserting querries into database

$sql="INSERT INTO query (email,doubt) VALUES ('$email','$doubt')";

if (!mysqli_query($conn,$sql))
{
	die('Error: '.mysqli_error($conn));
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>

<html>
	<header>
		What do you want me to make?
	</header>
		<link rel="stylesheet" type="text/css" href="criticizeme.css">
	<body>
	
		<form method = "post" id="usrform">
		<label> Your Email: </label><input type="text" name="email">
		
		<br></br>
		<div class = "ta">
			<textarea name="doubt" form="usrform">What do you want me to make...</textarea> 
		</div>
		<input type = "submit">
		</form>
	</body>
</html>
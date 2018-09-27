<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: ../login_register_logout/login.php");

  exit;
}
	$email = $_SESSION['email'];
	$query = "SELECT id FROM users WHERE email = '$email'";
	$res = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($res))
		{
			$userid = $row['id'];
		}
		//echo $userid;
		
	if (!empty($_FILES["ref"]["name"])) {

	    $imagename=$_FILES["ref"]["name"];
		
			$target_path = "query/".$imagename;
			//echo $target_path;
			//echo "haha";
			$query = "INSERT INTO query(userid , ref ) VALUES ('$userid','$target_path')";
			mysqli_query($conn,$query);
	}
	
	if($_POST)
	{
		$link = $_POST["link"];
		$message = $_POST["message"];

		//echo $link;
		//echo $message;
		$query = "UPDATE query SET link = '$link', message = '$message' WHERE userid = '$userid'";
		mysqli_query($conn,$query);
	}
	header("location: lookatmemes.php");
?>
<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: login.php");

  exit;
}

if (!empty($_FILES["inputimage"]["name"]))
{
	$email = $_SESSION['email'];
	$query = "SELECT id FROM users WHERE email = '$email'";
	$res = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($res))
	{
		$uid = $row['id'];
	}
	//echo $uid; 
	
	$imagename=$_FILES["inputimage"]["name"];
	$target_path = "../memes/".$imagename;
	
	$query = "INSERT INTO images(uid,path) VALUES ('$uid','$target_path')";
	mysqli_query($conn,$query);
	
	header("location: lookatmemes.php");
}

?>
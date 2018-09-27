<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: ../login_register_logout/login.php");

  exit;
}
$email = $_SESSION['email'];
if (!empty($_FILES["cover"]["name"])) {
	
			$imagename=$_FILES["cover"]["name"];
			$target_path = "userpics/".$imagename;
			//echo $target_path;
			//echo "haha";
			$query = "UPDATE profiles SET cover = '$target_path' WHERE email = '$email'";
			mysqli_query($conn,$query);
	}
	header("location: displayprofile.php");
?>
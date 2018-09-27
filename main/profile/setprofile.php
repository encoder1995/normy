<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

   header("location: ../login_register_logout/login.php");

  exit;
}

$email = $_SESSION['email'];
//echo $email;
//inserting images into database

if (!empty($_FILES["uploadedimage"]["name"])) {

	    $imagename=$_FILES["uploadedimage"]["name"];

			$target_path = "userpics/".$imagename;
			//echo $target_path;
			//echo "haha";
			$query = "UPDATE profiles SET dp = '$target_path' WHERE email = '$email'";
			mysqli_query($conn,$query);
	}
	
	if($_POST)
	{
		$name = $_POST["name"];
		$dob = $_POST["dob"];
		$description = $_POST["description"];

		//echo "hello";
		$query = "UPDATE profiles SET name = '$name',dob = '$dob',description = '$description' WHERE email = '$email'";
		mysqli_query($conn,$query);
	}
	header("location: displayprofile.php");
?>
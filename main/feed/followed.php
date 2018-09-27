<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: login.php");

  exit;
}
$email = $_SESSION['email'];
$query = "SELECT id FROM users WHERE email = '$email'";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
	{
		$followerid = $row['id'];
	}
	
$userid = $_POST['id'];

$q = "SELECT * FROM follow WHERE userid = '$userid' AND followerid = '$followerid'";
$r = mysqli_query($conn,$q);
$match = mysqli_num_rows($r);

if($match == 0)
{
$query = "INSERT INTO follow(userid,followerid) VALUES ('$userid','$followerid')";
mysqli_query($conn,$query);	
}

?>
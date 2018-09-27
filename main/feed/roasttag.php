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
	
$q = "SELECT * FROM roasttag WHERE userid = '$userid'";
$r = mysqli_query($conn,$q);
$match = mysqli_num_rows($r);

if($match == 0)
{
$query = "INSERT INTO roasttag(userid) VALUES('$userid')";
mysqli_query($conn,$query);

$query = "SELECT * FROM roasttag WHERE NOT userid = '$userid' ORDER BY RAND() LIMIT 1";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$opponent = $row['userid']; 
}

$query = "INSERT INTO roasters(userid,opponentid) VALUES('$userid','$opponent')";
mysqli_query($conn,$query);
}
header("location: roast.php");
?>
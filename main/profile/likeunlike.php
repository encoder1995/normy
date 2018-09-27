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
		$userid = $row['id'];
	}

//$userid = 5;
$postid = $_POST['postid'];
$type = $_POST['type'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE postid=".$postid." and userid=".$userid;

$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];


if($count == 0){
    $insertquery = "INSERT INTO like_unlike(userid,postid,type) values(".$userid.",".$postid.",".$type.")";
    mysqli_query($conn,$insertquery);
}else {
    $updatequery = "UPDATE like_unlike SET type=" . $type . " where userid=" . $userid . " and postid=" . $postid;
    mysqli_query($conn,$updatequery);
}


// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 and postid=".$postid;
$result = mysqli_query($conn,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and postid=".$postid;
$result = mysqli_query($conn,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];


$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);

?>


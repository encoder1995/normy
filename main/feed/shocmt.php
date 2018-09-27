<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

   header("location: ../login_register_logout/login.php");

  exit;
}

if($_POST)
{
	$postid = $_POST['postid'];
}
$lcid = $_COOKIE['lcid'];

$query = "SELECT * FROM comments WHERE imid = '$postid' AND id > '$lcid'";
$res = mysqli_query($conn,$query);
$check = mysqli_num_rows($res);
if($check > 0 AND $lcid != -1){
while($row = mysqli_fetch_array($res))
{
	//echo $row['id'];
	$cmtshow = "";
	$text = $row['text'];
	$uid = $row['userid'];
	$time = $row['time'];
	$time = substr($time, 0, strpos($time,":",strpos($time,":")+1));
	//selecting user details for comments
	$q = "SELECT profiles.name,profiles.dp FROM profiles,users WHERE users.id = '$uid' AND users.email = profiles.email";
	$r = mysqli_query($conn,$q);
	
	while($i = mysqli_fetch_array($r)){
		$im = $i['dp'];
		//echo $im;
		$nm = $i['name'];
	}
	
	$img_src = "../profile/".$im;
	//echo $img_src;
	$cmtshow.='
		
				<div class="container">
				<div class="row">
				<div class="col-sm-1">
				<div class="">
				<img id = "theimage" class="img-circle" src='.$img_src.' style = "height: 40px; width: 40px;">
				</div><!-- /thumbnail -->
				</div><!-- /col-sm-1 -->

				<div class="col-sm-4">
				<div class="panel panel-default">
				<div class="panel-heading">
				<strong id = "thename">'.$nm.'</strong> <span class="text-muted" style = "float:right; padding-right: 4px;color: #c1bfbf">'.$time.'</span>
				</div>
				<div class="panel-body" id = "thetext">
				'.$text.'
				</div><!-- /panel-body -->
				</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
				</div><!-- /row -->
				</div><!-- /container -->
		 
	';
	
	echo $cmtshow;
	$last_comment_id = $row['id'];
}
setcookie("lcid", $last_comment_id);
//echo $_COOKIE['lcid'];
}

?>
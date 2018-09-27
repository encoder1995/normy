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
	
if($_POST){
	$text = $_POST['text'];
	//echo $text;
	$imid = $_POST['id'];
	//echo $imid;
	$class = $_POST['cls'];
	//echo $class;
}

//echo $class;
if ($class == "btn btn-default upload nap"){

$query = "INSERT INTO comments(imid,userid,text) VALUES ('$imid','$userid','$text')";
mysqli_query($conn,$query);
/*date_default_timezone_set("Asia/Calcutta"); 
$time = time();
$time = date('H:i',$time);

	$q1 = "SELECT * FROM profiles WHERE email = '$email'";
	$res1 = mysqli_query($conn,$q1);
	while($row1 = mysqli_fetch_array($res1)){
		$im = $row1['dp'];
		$nm = $row1['name'];
	}
	$img_src = "../profile/".$im;
	//echo $img_src;
	$cmtshow = "";
	$cmtshow.='
		
				<div class="container">
				<div class="row">
				<div class="col-sm-1">
				<div class="thumbnail">
				<img id = "theimage" class="img-rounded user-photo" src='.$img_src.'>
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
	echo $cmtshow; */
}
elseif($class == "btn btn-default anonymous_upload nap"){
	$auid = 112;
	$query = "INSERT INTO comments(imid,userid,text) VALUES ('$imid','$auid','$text')";
	mysqli_query($conn,$query);
	/*date_default_timezone_set("Asia/Calcutta");
	$time = time();
	$time = date('H:i',$time);
	$cmtshow = "";
	$cmtshow.='
		
				<div class="container">
				<div class="row">
				<div class="col-sm-1">
				<div class="">
				<img id = "theimage" class="img-circle" src="pussy.jpg" style = "height: 40px !important; width: 40px !important" >
				</div><!-- /thumbnail -->
				</div><!-- /col-sm-1 -->

				<div class="col-sm-4">
				<div class="panel panel-default">
				<div class="panel-heading">
				<strong id = "thename">Mr. Pussykat</strong> <span class="text-muted" style = "float:right; padding-right: 4px;color: #c1bfbf">'.$time.'</span>
				</div>
				<div class="panel-body" id = "thetext">
				'.$text.'
				</div><!-- /panel-body -->
				</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
				</div><!-- /row -->
				</div><!-- /container -->
		 
	';
	echo $cmtshow; */
}


?>




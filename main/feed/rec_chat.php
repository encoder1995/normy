<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

   header("location: ../login_register_logout/login.php");

  exit;
}

$email = $_SESSION['email'];

if($_POST){
$sid = $_POST['sid'];
$rid = $_POST['rid'];
}

$query = "SELECT * FROM users,profiles WHERE id = '$rid' AND users.email = profiles.email";
$res = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($res)) 
{
	$rec_pic = $row['dp'];
}

$rec_pic = "../profile/".$rec_pic;


$query = "SELECT * FROM chat WHERE sid = '$rid' AND rid = '$sid' AND tag = 0";
$res = mysqli_query($conn, $query);
$check = mysqli_num_rows($res);

while($row = mysqli_fetch_array($res))
{
	$id = $row['id'];
	$msg = $row['msg'];
	$resp = "";
	$resp.='
		<div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img src='.$rec_pic.' class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> '.$msg.' </p>
                                    </li>
                                </ul>
                            </div>
	';
	echo $resp;
}

if($check > 0){
$query = "UPDATE chat SET tag = 1 WHERE id = '$id'";
mysqli_query($conn,$query);
}
?>
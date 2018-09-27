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
$msg = $_POST['text'];
}

$query = "INSERT INTO chat(sid,rid,msg,tag) VALUES ('$sid','$rid','$msg',0)";

mysqli_query($conn,$query);
	
$query = "SELECT * FROM profiles WHERE email = '$email'";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$sender_name = $row['name'];
	$sender_pic = $row['dp'];
}

$sender_pic = "../profile/".$sender_pic;

$resp = "";

	$resp.='
	<div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img src='.$sender_pic.' class="md-user-image">
                                </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            '.$msg.'
                                        </p>
                                    </li>
                                </ul>
                            </div>
';

echo $resp;
?>
<!DOCTYPE html>

<?php

include '../util/db_conn.php';

// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

   header("location: ../login_register_logout/login.php");

  exit;
}

$real_email = $_SESSION['email'];

if($_GET)
{
	$email = $_GET['id'];
}
$query = "SELECT id FROM users WHERE email = '$email'";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
	{
		$userid = $row['id'];
	}
	
$query = "SELECT * FROM users,profiles WHERE users.email = '$real_email' AND users.email = profiles.email";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
	{
		$followerid = $row['id'];
		$icondp = $row['dp'];
	}
$icondp = "../profile/".$icondp;
	
	
$query = "SELECT * from profiles WHERE email = '$email'";
$res = mysqli_query($conn,$query);

$HTML = "";
while($row=mysqli_fetch_array($res)){ 
//echo $row['dp'];
$path = '../profile/'.$row['dp'];
//writing the html query here
$cover = $row['cover'];
$cover = "../profile/".$cover;
$q = "SELECT * FROM follow WHERE userid = $userid";
$r = mysqli_query($conn,$q);
$matches = mysqli_num_rows($r);

$q1 = "SELECT * FROM follow WHERE followerid = $userid";
$r1 = mysqli_query($conn,$q1);
$matches1 = mysqli_num_rows($r1);

$q1 = "SELECT * FROM images WHERE uid = $userid";
$r1 = mysqli_query($conn,$q1);
$mimis = mysqli_num_rows($r1);

/*$HTML.='
<div class = "text-center">
<img src='.$path.' class = "img-rounded" id = "dp">
            <h2>'.$row['name'].'</h2>
			<h3><span class="glyphicon glyphicon-magnet" style = "color:#cc0000">'.$matches.'</span></h3>
			<h4 class = "container">'.$row['description'].'</h4>
			<span>'.$row['dob'].'</span>
			
			<!--<p>
				<abbr> '.$row['email'].' </abbr><a href="'.$row['email'].'"><span class="glyphicon glyphicon-envelope"></span></a>
            </p>-->
</div>
			';*/
if($email == $real_email)
{
$HTML.='
				<div class="container" id = "profbody">
	<div class="row" style = "padding-top: 30px;">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile" style = "background-image: url('.$cover.'); color: white">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>'.$row['name'].'</h2>
                    <p><strong>About: </strong> '.$row['description'].' </p>
                    <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
                    <p><strong>Skills: </strong>
                        <span class="tags">html5</span> 
                        <span class="tags">css3</span>
                        <span class="tags">jquery</span>
                        <span class="tags">bootstrap3</span>
                    </p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src='.$path.' alt="userpic" class="img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong data-toggle = "modal" data-target="#myModal" id = "folhov">'.$matches.'</strong></h2>                    
                    <p><small>Followers</small></p>
					
                    <a class="btn btn-default btn-block bt" href = "../profile/editprofile.html" style = "background: transparent; color: white"><span class="fa fa-pencil"> Edit </span></a>
					
			   </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>'.$matches1.'</strong></h2>                    
                    <p><small>Following</small></p>
                    <a href = "viewmemes.php" class="btn btn-default btn-block bt" style = "background: transparent; color:white"><span class="fa fa-photo"></span> View Memes </a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>'.$mimis.'</strong></h2>                    
                    <p><small>Memes</small></p>
                    <div class="btn-group dropup btn-block">
					
                      <button type="button" class="btn btn-default dropdown-toggle bt" style = "background: transparent; color:white" data-toggle="dropdown">
                        <span class="fa fa-gear"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
				    
                      <ul class="dropdown-menu text-left" role="menu">
                        <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
                        <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                      </ul>
                    </div>
                </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>
';}
else
{
	$HTML.='
				<div class="container" id = "profbody">
	<div class="row" style = "padding-top: 30px;">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile" style = "background-image: url('.$cover.'); color: white">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>'.$row['name'].'</h2>
                    <p><strong>About: </strong> '.$row['description'].' </p>
                    <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
                    <p><strong>Skills: </strong>
                        <span class="tags">html5</span> 
                        <span class="tags">css3</span>
                        <span class="tags">jquery</span>
                        <span class="tags">bootstrap3</span>
                    </p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src='.$path.' alt="userpic" class="img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong data-toggle = "modal" data-target="#myModal" id = "folhov">'.$matches.'</strong></h2>                    
                    <p><small>Followers</small></p>
					
                    
					
			   </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>'.$matches1.'</strong></h2>                    
                    <p><small>Following</small></p>
                    <a href = "../profile/viewmemes.php" class="btn btn-default btn-block bt" style = "background: transparent; color:white"><span class="fa fa-photo"></span> View Memes </a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>'.$mimis.'</strong></h2>                    
                    <p><small>Memes</small></p>
                    <div class="btn-group dropup btn-block">
					
                      <button type="button" class="btn btn-default dropdown-toggle bt" style = "background: transparent; color:white" data-toggle="dropdown">
                        <span class="fa fa-gear"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
				    
                      <ul class="dropdown-menu text-left" role="menu">
                        <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
                        <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                      </ul>
                    </div>
                </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>
';
}

}

// FINDING CREDENTIALS OF CHATTERS
								$q = "SELECT * FROM profiles WHERE email = '$real_email'";
								$r = mysqli_query($conn,$q);
								while($ro = mysqli_fetch_array($r))
								{
									$sender_name = $ro['name'];
									$sender_pic = $ro['dp'];
								}
								
								$q = "SELECT * FROM profiles WHERE email = '$email'";
								$r = mysqli_query($conn,$q);
								while($ro = mysqli_fetch_array($r))
								{
									$rec_name = $ro['name'];
									$rec_pic = $ro['dp'];
								}
								
								$sender_pic = "../profile/".$sender_pic;
								$rec_pic = "../profile/".$rec_pic;
								
								
?>


<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="followscript.js" type="text/javascript"></script>
	<script src="chat_script.js" type="text/javascript"></script>
	<script src="night.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="chat.css">
	<link rel="stylesheet" type="text/css" href="../profile/displayprofile.css">

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id = "navar">
  <div class="container-fluid navbar-border">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../feed/lookatmemes.php"><i class="fa fa-home"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../feed/uploadmeme.html"><i class="fa fa-upload" style = "color : #a3bf00"></i></a></li>
        <li><a href="#mychat"><i class="fa fa-comment" data-toggle="modal" data-target="#mychat"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th"></i><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../feed/order.php"><i class="fa fa-envelope"></i> Order</a></li>
            <li><a href="#"><i class="fa fa-comments"></i> Chat</a></li>
            <li><a href="#"><i class="fa fa-phone"></i> Phone Support</a></li>
          </ul>
        </li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
		<li><button id="dark"><i class="fa fa-moon-o"></i></button></li>
		<li>
			<img src="<?php echo $icondp; ?>" alt="Avatar" class="avatar img-circle img-responsive">
		</li>
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../profile/displayprofile.php"><i class="fa fa-user"></i> Profile </a></li>
            <li><a href="#"><i class="fa fa-cog"></i> Settings </a></li>
          </ul>
        </li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body style = "background-image: url(<?php echo $cover; ?>); background-repeat: no-repeat;overflow-x: hidden;  background-position: center; margin-top: 45px;">

		<div class = "pad" style = "padding-top: 20px;"></div>
		<button class= "btn btn-default" id = "exp"><i class = "fa fa-expand"></i></button>
	
	

	
	<?php echo $HTML; ?>
	<?php
	
	$folo = "";
	//echo $userid;
	//echo $followerid;
	$query = "SELECT * FROM follow WHERE userid = '$userid' AND followerid = '$followerid'";
	$res = mysqli_query($conn,$query);
	$match = mysqli_num_rows($res);
	
	
	if($match == 0){
	$folo.='
	<div class = "text-center" >
		<input type="button" value = "FOLLOW" class="btn btn-default folo" id = '.$userid.' style = "color: white; background: transparent" />
		<a href="#" class="open-btn" id="addClass"><i class="fa fa-comments" style = "font-size: 30px; padding: 5px" aria-hidden="true"></i></a>
	</div>

	
	';
	}
	else{
		$folo.='
	<div class = "text-center" >
		<input type="button" value = "FOLLOWING" class="btn btn-default folo" id = '.$userid.' style = "color: white; background: transparent"  />	
        <a href="#" class="open-btn" id="addClass"><i class="fa fa-comments" style = "font-size: 30px; padding: 5px" aria-hidden="true"></i></a>
	</div>
	
	
	';
	}
	
	echo $folo;
	
	?>

	<!-- CHAT BOX CODE -->
	<aside id="sidebar_secondary" class="tabbed_sidebar ng-scope chat_sidebar">

<div class="popup-head">
    			<div class="popup-head-left pull-left"><a Design and Developmenta title="Gurdeep Osahan (Web Designer)" target="_blank" href="https://web.facebook.com/iamgurdeeposahan">
<img class="md-user-image" src="<?php echo $rec_pic;?>">
<h1><?php echo $rec_name;?></h1><small><br> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></small></a></div>
					  <div class="popup-head-right pull-right">
                      <button class="chat-header-button" type="button"><i class="glyphicon glyphicon-facetime-video"></i></button>
						<button class="chat-header-button" type="button"><i class="glyphicon glyphicon-earphone"></i></button>
                        <div class="btn-group gurdeepoushan">
    								  <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
									   <i class="glyphicon glyphicon-paperclip"></i> </button>
									  <ul role="menu" class="dropdown-menu pull-right">
										<li><a href="#"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery</a></li>
										<li><a href="#"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Photo</a></li>
										<li><a href="#"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Video</a></li>
										<li><a href="#"><span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Audio</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Location</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact</a></li>
									  </ul>
						</div>
						
						<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                      </div>
			  </div>

<div id="chat" class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
                        <div class="chat_box touchscroll chat_box_colors_a">
                            
							<?php
								$query = "SELECT * FROM chat";
								$res = mysqli_query($conn,$query);
								
								while($row = mysqli_fetch_array($res))
								{
									
									if($row['sid'] == $followerid and $row['rid'] == $userid)
									{
										$ch = "";
										$ch.='
											<div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img src='.$sender_pic.' class="md-user-image">
                                </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            '.$row['msg'].'
                                        </p>
                                    </li>
                                </ul>
                            </div>
										';
										
										echo $ch;
										
									}
									elseif($row['rid'] == $followerid and $row['sid'] == $userid)
									{
										$ch = "";
										$ch.='
											<div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img src='.$rec_pic.' class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> '.$row['msg'].' </p>
                                    </li>
                                </ul>
                            </div>
										';
										echo $ch;
									}
								}
								$cht = "";
								$cht.='
											<div id = "dyn_cht">
											</div>
										';
										echo $cht;
							?>
							
                        </div>
                    </div>

<div class="chat_submit_box">
    <div class="uk-input-group">
        <div class="gurdeep-chat-box">
        <span style="vertical-align: sub;" class="uk-input-group-addon">
        <a href="#"><i class="fa fa-smile-o"></i></a>
        </span>
        <input type="text" placeholder="Type a message" id="submit_message" value = "" name="submit_message" class="md-input">
        <span style="vertical-align: sub;" class="uk-input-group-addon">
        <a href="#"><i class="fa fa-camera"></i></a>
        </span>
        </div>
    
    <span class="uk-input-group-addon">
		<button id = "<?php echo $followerid; ?>_<?php echo $userid; ?>" class="btn btn-default glyphicon glyphicon-send sender" style= "color:black;border:none"></button>
    </span>
    </div>
</div>
      
        </div>
	
	<script>
		var recmsg = function() {
			var sid = <?php echo $followerid; ?>;
			var rid = <?php echo $userid; ?>;
  
  $.ajax({
            url: 'rec_chat.php',
            type: 'POST',
	
            data: {sid:sid,rid:rid},
			
			success: function (response) {
				var content = document.getElementById("dyn_cht");
				content.innerHTML = content.innerHTML+response;
				}
        });
  
};

var interval = 1000 * 60 * 0.03; // where X is your every X minutes

setInterval(recmsg, interval);

	</script>
	
	<script>
var coverEnabled = false; 
$(document).ready(function() {
        $("#exp").on("click", switchCoverMode);
        $("#reset").on("click", reset);
        }
      );
      
      function switchCoverMode(){
        coverEnabled = !coverEnabled;
        if(coverEnabled){
          
		  $("#profbody").css("opacity","0");
		  $("#profbody").css("transition","1s");
		  $("#navar").css("opacity","0");
		  $("#navar").css("transition","1s");
		  $(".folo").css("opacity","0");
		  $(".folo").css("transition","1s");
		  $("#addClass").css("opacity","0");
		  $("#addClass").css("transition","1s");
		   
        } else {
          
		  $("#profbody").css("opacity","1");
		  $("#profbody").css("transition","1s");
		  $("#navar").css("opacity","1");
		  $("#navar").css("transition","1s");
		  $(".folo").css("opacity","1");
		  $(".folo").css("transition","1s");
		  $("#addClass").css("opacity","1");
		  $("#addClass").css("transition","1s");
        }
      }
      
      function reset(){
        $("#profbody").css("opacity","1");
		$("#navar").css("opacity","1");
      }
</script>
	<script>
$(".navbar-collapse").css({ maxHeight: $(window).height() - $(".navbar-header").height() + "px" });
</script>
</body>

</html>

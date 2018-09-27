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
	
$query = "SELECT * FROM users, profiles WHERE users.email = '$email' AND users.email = profiles.email";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$icondp = $row['dp'];
	$icondp = "../profile/".$icondp;
}

$query = "SELECT * FROM roasters WHERE (userid = '$userid' OR opponentid = '$userid') AND NOT (userid = 0 AND opponentid = 0)";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$man1 = $row['opponentid'];
	$man2 = $row['userid'];
}
//echo $man2;

if($userid == $man1)
{
	$opponentid = $man2;
}
else
{
	$opponentid = $man1;
}

$query = "SELECT * FROM users,profiles WHERE users.id = '$opponentid' AND users.email = profiles.email";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$opponent_dp = $row['dp'];
}
$opponent_dp = "../profile/".$opponent_dp;

$query = "SELECT * FROM profiles WHERE email = '$email'";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$user_dp = $row['dp'];
}
$user_dp = "../profile/".$user_dp;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="roast.css" rel="stylesheet" type="text/css" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="night.js" type="text/javascript"></script>
	</head>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid navbar-border">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="lookatmemes.php"><i class="fa fa-home"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="uploadmeme.html"><i class="fa fa-upload" style = "color : #a3bf00"></i></a></li>
        <li><a href="#mychat"><i class="fa fa-comment" data-toggle="modal" data-target="#mychat"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th"></i><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="order.php"><i class="fa fa-envelope"></i> Order</a></li>
            <li><a href="#"><i class="fa fa-comments"></i> Chat</a></li>
            <li><a href="#"><i class="fa fa-phone"></i> Phone Support</a></li>
          </ul>
        </li>
        <li>
            <form class="navbar-form" autocomplete = "off" action = "searcheduser.php" method = "post">
            <div class="input-group">
			
                <input type="text" class="form-control" placeholder="search" id = "myInput" name = "myuser">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </div>
			
            </div>
            </form>    
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

<body>
	<div class = "jumbotron">
		<span style = "float:left;">You</span>
		<span style = "float:right;">Opponent</span>
	</div>
	
	<div class="container">
    <div class="row form-group">
        <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="fa fa-fire"></span> Roast
                    <div class="btn-group pull-right">
                        
                    </div>
                </div>
                <div class="panel-body body-panel">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src= "<?php echo $opponent_dp; ?>" alt="User Avatar" class="img-circle" style = "width: 40px; height: 40px;"/>
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Konnichi wa
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src= "<?php echo $user_dp; ?>" alt="User Avatar" class="img-circle" style = "width: 40px; height: 40px;"/>
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p style = "float: right;">
                                    Konnichi wa
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer clearfix">
                    <textarea class="form-control" rows="1"></textarea>
                    <span class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-12" style="margin-top: 10px">
                        <button class="btn btn-default btn-lg btn-block" id="btn-chat">send</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
	
</body>
</html>
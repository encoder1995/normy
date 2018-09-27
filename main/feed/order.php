<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: ../logine_register_logout/login.php");

  exit;
}
$email = $_SESSION['email'];
$query = "SELECT * from profiles WHERE email = '$email'";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$icondp = $row['dp'];
}

$icondp = "../profile/".$icondp;

?>

<!DOCTYPE html>

<html>
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="order.css" rel="stylesheet" type="text/css" />
	<script src="night.js" type="text/javascript"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
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



<form method = "post" action = "uploadquery.php" enctype="multipart/form-data">
<div class="container">


    <div class="col-lg-offset-4 col-lg-4" id="panel">
        <h2>Get your Dream Meme</h2>
		<h5>You can only upload 1 query at a time. If you upload another, it will overwrite the previous one</h5>

        <form>

            <div class="group">
                <input type="file" name = "ref" class = "shi">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Any sample Files</label>
            </div>

            <div class="group">
                <input type="text" name = "link">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Any Links</label>
            </div>

            <div class="group">
                <input type="text" name = "message" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Message</label>
            </div>
            <div class="group">
                <center> <button type="submit" class="btn btn-warning">Send <span class="glyphicon glyphicon-send"></span></button></center>
            </div>
        </form>

    </div>
</div>
</form>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
$(".navbar-collapse").css({ maxHeight: $(window).height() - $(".navbar-header").height() + "px" });
</script>

</body>
</html>


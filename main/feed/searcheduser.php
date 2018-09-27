<!DOCTYPE html>

<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

   header("location: ../login_register_logout/login.php");

  exit;
}

$email = $_SESSION['email'];

$query = "SELECT * FROM users, profiles WHERE users.email = '$email' AND users.email = profiles.email";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$icondp = $row['dp'];
	$icondp = "../profile/".$icondp;
}


if($_POST)
{
	$name = $_POST["myuser"];
	//echo $name;
	
	$query = "SELECT * FROM profiles WHERE name = '$name'";
	$res = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($res)){
		//echo $row['email'];
		$im = $row['dp'];
		$cover = $row['cover'];
		$cover = "../profile/".$cover;
		$des = $row['description'];
		$sho = "";
		$img_src = "../profile/".$im;
		$email = $row['email'];
		$dob = $row['dob'];
	//echo $img_src;
	/*$sho.='
		<div class="container" id = "myc">
    <div class="row">
        <div class="col-sm-2 col-md-2">
            <img src= '.$img_src.'
            alt="" class="img-rounded img-responsive" />
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <a href = "displaysearcheduser.php?id='.$email.'">'.$name.'</a> <small><cite title="Source Title">'.$des.'</cite></small>
            </blockquote>
            <p> <i class="glyphicon glyphicon-envelope"></i> '.$email.'</br>
             <i class="glyphicon glyphicon-gift"></i>'.$dob.'</p>
        </div>
    </div>
	</br> </br> </br>
</div>
	';*/
	
	$sho.='
    <div class="col-lg-5">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object dp img-circle" src='.$img_src.' style="width: 100px;height:100px;">
            </a>
            <div class="media-body">
				<a href = "displaysearcheduser.php?id='.$email.'" style = "color: #a3bf00;"><h4 class="media-heading" style = "color: #a3bf00;">'.$name.'</h4></a>
                <h5 id = "des-su">'.$des.'</h5>
                <hr style="margin:8px auto">

                <span class="label label-default">HTML5/CSS3</span>
                <span class="label label-default">jQuery</span>
                <span class="label label-info">CakePHP</span>
                <span class="label label-default">Android</span>
            </div>
        </div>

    </div>
	';
	echo $sho;
	}
}
?>


<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="searcheduser.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="../feed/night.js" type="text/javascript"></script>
	
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
      <a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
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
		<script>
		$(".navbar-collapse").css({ maxHeight: $(window).height() - $(".navbar-header").height() + "px" });
		</script>
	</body>
</html>
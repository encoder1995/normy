<?php
include '../util/db_conn.php';

// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
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
	
	
$query = "SELECT * from profiles WHERE email = '$email'";
$res = mysqli_query($conn,$query);

$HTML = "";
while($row=mysqli_fetch_array($res)){ 
//echo $row['dp'];
$icondp = $row['dp'];
$nam = $row['name'];
//writing the html query here
$cover = $row['cover'];
//extracting number of followers
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
<img src='.$row['dp'].' class = "img-rounded" id = "dp">
            <h2>'.$row['name'].'</h2>
			<h3><button class = "mag" data-toggle = "modal" data-target="#myModal"><span class="glyphicon glyphicon-magnet" style = "color: #cc0000">'.$matches.'</span></button></h3>
			<h4 class = "container">'.$row['description'].'</h4>
			<span>'.$row['dob'].'</span>
			
			<!--<p>
				<abbr> '.$row['email'].' </abbr><a href="'.$row['email'].'"><span class="glyphicon glyphicon-envelope"></span></a>
            </p>-->
</div>
			';*/

			$HTML.='
				<div class="container" id = "profbody">
	<div class="row" style = "padding-top: 30px;">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile" style = "background-image: url('.$cover.'); color: white">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>'.$nam.'</h2>
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
                        <img src='.$icondp.' alt="userpic" class="img-responsive">
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
                    <a class="btn btn-default btn-block bt" href = "editprofile.html" style = "background: transparent; color: white"><span class="fa fa-pencil"> Edit </span></a>
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
			';


}
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="displayprofile.css">
	<link rel="stylesheet" type="text/css" href="../feed/comments.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="cmt_script.js" type="text/javascript"></script>
	<script src="script.js" type="text/javascript"></script>
	<script src="../feed/night.js" type="text/javascript"></script>
	
	<!--<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../feed/lookatmemes.php">FEED</a></li>
		<li><a href="../login_register_logout/logout.php">LOGOUT</a></li>
		<li><a href="../home/home.php">HOME</a></li>
      </ul>
    </div>
  </div>
</nav> -->

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

<body style = "background-image: url(<?php echo $cover; ?>); background-repeat: no-repeat;overflow-x: hidden;  background-position: center; margin-top: 57px;">
	
    <form class="form" action="cover.php" method="post" enctype="multipart/form-data">
	<div class = "row" id = "shit" style = "padding-top: 4em;">
	<label for="avatar-1" class="custom-file-upload">
		<i class = "fa fa-file"></i>
	</label>
		<input id="avatar-1"name="cover" type="file" required>
		<button type="submit" class="btn btn-primary" style = "background-color: #a3bf00; border: 1px black solid"><i class = "fa fa-upload"></i></button>  
		<button class= "btn btn-default" id = "exp"><i class = "fa fa-expand"></i></button>
	</div>
	
	</form>
	
	
	
	<?php echo $HTML; ?>
	<!-- MODAL FOR ABOVE HTML HERE -->
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">FOLLOWERS</h4>
			  </div>
			  <div class="modal-body">
				
				<?php 
				$query = "SELECT * FROM follow,users,profiles WHERE follow.userid = '$userid' AND follow.followerid = users.id AND users.email = profiles.email";
				$res = mysqli_query($conn,$query);
				while($row = mysqli_fetch_array($res)){
					$sho = "";
				$sho.='
					<div class="container" id = "myc">
				<div class="row">
					<div class="col-sm-2 col-md-2">
						<img src= '.$row['dp'].'
						alt="" class="img-rounded img-responsive" />
					</div>
					<div class="col-sm-4 col-md-4">
						<blockquote>
							<a href = "../feed/displaysearcheduser.php?id='.$row['email'].'">'.$row['name'].'</a> <small><cite title="Source Title">'.$row['description'].'</cite></small>
						</blockquote>
					</div>
				</div>
				</br> </br> </br>
			</div>
				';
						
			echo $sho;
				}
				?>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
	<!-- MODAL END -->
	
	<!-- IMAGE GALLERY CODE-->
	<!--
	<div class="row"> 
	 
	    <?php /*
			$query = "SELECT * FROM images WHERE uid = '$userid'";
			$res = mysqli_query($conn,$query);
			while($row = mysqli_fetch_array($res)){
				$postid = $row['id'];
				$path =$row['path'];
				$sho = "";
				$sho.='
				 
				 <div class = "zoom">
					<img src='.$path.' style="width:100%" class = "img-responsive img-rounded">
				 </div>
				 
				';
		?>
							<div class="column">
							<a href = "../feed/comments.php?id=<?php echo $postid; ?>" class="comments" data-toggle="modal" data-target="#myModal_<?php echo $postid; ?>"><?php echo $sho;?></a>
							</div>
							
							<div id="myModal_<?php echo $postid; ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
									</div>
								  </div>
							</div>
		<?php		 
			}
			//echo $sho;*/
	    ?>
	  
    </div>
	<!-- IMAGE GALLERY CODE ENDING-->

	
	<!-- MODAL -->
	<div id="mychat" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class = "text-center"><h4 class="modal-title">CHATS</h4></div>
			  </div>
			  <div class="modal-body">
				
				<?php
					$query = "SELECT DISTINCT rid FROM chat WHERE sid = '$userid'";
					$res = mysqli_query($conn,$query);
					while($row = mysqli_fetch_array($res))
					{
						$damn = $row['rid'];
						$a = "SELECT * FROM users,profiles WHERE users.id = '$damn' AND users.email = profiles.email";
						$b = mysqli_query($conn,$a);
						while($c = mysqli_fetch_array($b))
						{
							$way = "../profile/".$c['dp'];
							$s ="";
							$s.= '<img src='.$way.' class="md-user-image" style = "border-radius: 50%;width: 34px;">
								    <span><a href = "#">'.$c['name'].'</a></span>
								
							';
							
							echo $s;
						}
						
					}
				?>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
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
		   
        } else {
          
		  $("#profbody").css("opacity","1");
		  $("#profbody").css("transition","1s");
		  $("#navar").css("opacity","1");
		  $("#navar").css("transition","1s");
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

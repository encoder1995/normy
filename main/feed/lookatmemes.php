<?php
session_start();
include("../util/db_conn.php");
//include("navbar.html");
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: ../login_register_logout/login.php");

  exit;
}
$email = $_SESSION['email'];

$query = "SELECT name FROM profiles";
$res = mysqli_query($conn,$query);
$i = 0;
$names = array();
while($row = mysqli_fetch_array($res))
{
	$names[$i] = $row['name'];
	$i =$i+1;
}

$unique_names = array_unique($names);
//print_R(array_values($names));

//DISPLAY ICON PROFILE IMAGE
$query = "SELECT * FROM users, profiles WHERE users.email = '$email' AND users.email = profiles.email";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
{
	$icondp = $row['dp'];
	$icondp = "../profile/".$icondp;
}



?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="lul.css" rel="stylesheet" type="text/css" />
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>-->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="script.js" type="text/javascript"></script>
	<script src="night.js" type="text/javascript"></script>
</head>

 <!--
 <nav class="navbar navbar-default navbar-fixed-top">
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
	  <li><div class = "wrap"><div id="mySidenav" class="siden">
			<b id = "sidea" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</b>
			<a id = "sidea" href="order.php">Order</a>
			<a id = "sidea" href="#">Contact</a>
			<a id = "sidea" href="#">xxx</a>
			<a id = "sidea" href="#">xxx</a>
	  </div>

		<span style="font-size:30px;cursor:pointer;color:white" onclick="openNav()">&#9776;</span></div></li>
	
	  <li><a href="uploadmeme.html" class="btn btn-info">
          <span class="glyphicon glyphicon-edit"></span> UPLOAD
        </a></li>
		<li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mychat"><span id = "chatter" class = "glyphicon glyphicon-comment"></span></button></li>
	  <li><a href="../profile/displayprofile.php">PROFILE</a></li>
		<li><a href="../login_register_logout/logout.php">LOGOUT</a></li>
      </ul>
	  <form class="navbar-form" autocomplete = "off" action = "searcheduser.php" method = "post">
        <div class="form-group" style="display:inline;">
          <div class="fill">
		  <div class = "autocomplete">
            <input class="form-control" type="text" id = "myInput" placeholder = "search a memer" name = "myuser" style = "font-family: sans-serif;">
		  </div>
            <button type = "submit" class="btn btn-default"><i class="glyphicon glyphicon-search" style = "padding: 0.5px !important; font-size: 15px"></i></button>
          </div>
        </div>
      </form>
	  
    </div>
  </div>
</nav> 
-->
	
	<!-- NAVBAR 3 -->

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
		 <li><a href = "roastmenu.php"><i class = "fa fa-fire"></i></a></li>
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
			 <li><a href="../login_register_logout/logout.php"><i class="fa fa-sign-out"></i> Logout </a></li>
          </ul>
        </li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<body>
<div class="content">

            <?php
				$email = $_SESSION['email'];
				$query = "SELECT id FROM users WHERE email = '$email'";
				$res = mysqli_query($conn,$query);
				while($row = mysqli_fetch_array($res))
				{
					$userid = $row['id'];
				}
				//echo $userid;
                //$userid = 5;
				
				$q = "SELECT * FROM follow WHERE followerid = '$userid'";
				$r = mysqli_query($conn,$q);
				while($ro = mysqli_fetch_array($r))
				{
					$man = $ro['userid'];
					$query = "SELECT * FROM images WHERE uid = '$man'";
					$result = mysqli_query($conn,$query);
					
                while($row = mysqli_fetch_array($result)){
                    $postid = $row['id'];
                    $content = $row['path'];
					$t = $row['time'];
					$t = substr($t, 0, strpos($t,":",strpos($t,":")+1));
					//fetch user details
					$uid = $row['uid'];
					//echo $uid;
					$a = "SELECT * FROM users,profiles WHERE users.id = '$uid' AND profiles.email = users.email";
					$b = mysqli_query($conn,$a);
					while($c = mysqli_fetch_array($b))
					{
						$naam = $c['name'];
						$dp = $c['dp'];
						$way = '../profile/'.$dp;
						$m = $c['email'];
					}
					//end fetching user details
					
					$HTML = "";
					$HTML.= '
					
					<div class="post-heading">
                    <div class="pull-left image">
                        <img src= '.$way.' class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="displaysearcheduser.php?id='.$m.'"><b>'.$naam.'</b></a>
                            meemed.
                        </div>
                        <h6 class="text-muted time">'.$t.'</h6>
                    </div>
					</div> 
					
					<div class = "text-center">
					<div class = "">
						<img src='.$row['path'].' class = "img-rounded" id = "feedim">
					</div>
					</div>
					';
                    $type = -1;

                    // Checking user status
                    $status_query = "SELECT COUNT(*) as cntStatus,type FROM like_unlike WHERE userid=".$userid." and postid=".$postid;
                    $status_result = mysqli_query($conn,$status_query);
                    $status_row = mysqli_fetch_array($status_result);
                    $count_status = $status_row['cntStatus'];
                    if($count_status > 0){
                        $type = $status_row['type'];
                    }

                    // Count post total likes and unlikes
                    $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and postid=".$postid;
                    $like_result = mysqli_query($conn,$like_query);
                    $like_row = mysqli_fetch_array($like_result);
                    $total_likes = $like_row['cntLikes'];

                    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and postid=".$postid;
                    $unlike_result = mysqli_query($conn,$unlike_query);
                    $unlike_row = mysqli_fetch_array($unlike_result);
                    $total_unlikes = $unlike_row['cntUnlikes'];
					
					$comment_query = "SELECT COUNT(*) AS cntComments FROM comments WHERE imid=".$postid;
					$comment_result = mysqli_query($conn,$comment_query);
					$comment_row = mysqli_fetch_array($comment_result);
					$total_comments = $comment_row['cntComments'];

            ?>
                    <div class="post">
                        <div class="post-text">
                            <?php echo $HTML; ?>
                        </div>
                        <div class="post-action">

                            <span id="l_<?php echo $postid; ?>"  ></span><button type="button" value="" id="like_<?php echo $postid; ?>" class="like" ><i class = "fa fa-thumbs-up" id="lm_<?php echo $postid; ?>" style="<?php if($type == 1){ echo "color: #a3bf00;"; } ?>"></i></button>&nbsp;<span class = "spac badge" id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;

                            <span id="ul_<?php echo $postid; ?>" ></span><button type="button" value="" id="unlike_<?php echo $postid; ?>" class="unlike" ><i class = "fa fa-thumbs-down"  id="ulm_<?php echo $postid; ?>" style="<?php if($type == 0){ echo "color: #a3bf00;"; } ?>"></i></button>&nbsp;<span class = "spac badge" id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
						
							<!-- modal opener comments button is here-->
							
							<a href = "comments.php?id=<?php echo $postid; ?>" class="comments" data-toggle="modal" data-target="#myModal_<?php echo $postid; ?>"><i class = "fa fa-comments" id = "fomment"></i></span></a>&nbsp;<span class = "spac-c badge" id="comments_<?php echo $postid; ?>"><?php echo $total_comments; ?></span>&nbsp;
						
							<span class = "rate">
							<?php if($total_likes + $total_unlikes !=0){echo ($total_likes *100)/($total_likes + $total_unlikes);} else echo "0"; ?>
							<span class="glyphicon glyphicon-star"></span>
							</span>
							<div id="myModal_<?php echo $postid; ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
									</div>
								  </div>
							</div>
							
                        </div>
                    </div>
            <?php
                }
				}
            ?>

        </div>

		
		<!-- Modal -->
		<div id="mychat" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content" style = "background-color: #808082 !important">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class = "text-center"><h4 class="modal-title" style = "color: white;">CHATS</h4></div>
			  </div>
			  <div class="modal-body" style = "background-color: #4d4d4f !important">
				
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
								    <span><a href = "#" style = "color: #a3bf00;">'.$c['name'].'</a></span>
								
							';
							
							echo $s;
						}
						
					}
				?>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" style = "background: transparent; color: white;">Close</button>
			  </div>
			</div>

		  </div>
		</div>

<!--script fot autocompletion goes here-->
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

/*An array containing all the usernames taken from php above converted to script array*/
var user_names = <?php echo json_encode($unique_names) ;?>
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), user_names);
</script>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>


<script>
	var sholikes = function() {
	var postid = <?php echo $postid; ?>;
	
	$.ajax({
            url: 'sholike.php',
            type: 'post',
            data: {postid:postid},
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+postid).text(likes);        // setting likes
                $("#unlikes_"+postid).text(unlikes);    // setting unlikes
				
				$("#likesm_"+postid).text(likes);        // setting likes
                $("#unlikesm_"+postid).text(unlikes);    // setting unlikes

            }
        });
  
  
  
};

var interval = 1000 * 60 * 0.03; // where X is your every X minutes

setInterval(sholikes, interval);
</script>
<script>
$(".navbar-collapse").css({ maxHeight: $(window).height() - $(".navbar-header").height() + "px" });
</script>
</body>
</html>
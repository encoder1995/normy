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

$query = "SELECT dp,name FROM profiles WHERE email = '$email'";
$res = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($res))
	{
		$naam = $row['name'];
		$cmtdp = $row['dp'];
	}
$cmtdp = "../profile/".$cmtdp;
	
$postid = $_GET['id'];
$query = "SELECT path FROM images WHERE id = '$postid'";
$res = mysqli_query($conn,$query);
$HTML = "";
while($row = mysqli_fetch_array($res)){
$HTML.= '
					<div class = "text-center">
						<img src='.$row['path'].' class = "" id = "feedimmodal">
					</div>
					';
}

$cmtshow = "";

$query = "SELECT * FROM comments WHERE imid = '$postid'";
$res = mysqli_query($conn,$query);
$chack = mysqli_num_rows($res);
if($chack != 0){
while($row = mysqli_fetch_array($res)){
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
				<img id = "theimage" class="img-circle" src='.$img_src.'>
				</div><!-- /thumbnail -->
				</div><!-- /col-sm-1 -->

				<div class="col-sm-4">
				<div class="panel panel-default">
				<div class="panel-heading">
				<strong id = "thename">'.$nm.'</strong> <span class="text-muted" style = "float:right; padding-right: 4px;color: #c1bfbf">'.$time.'</span>
				</div>
				<div class="panel-body" id = "thetext" style = "padding: 5px; overflow-wrap: break-word">
				'.$text.'
				</div><!-- /panel-body -->
				</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
				</div><!-- /row -->
				</div><!-- /container -->
		 
	';
	
	
	$last_comment_id_n = $row['id'];
		
}
}
if($chack == 0)
{
	$last_comment_id_n = -1;
}
setcookie("lcid_n", $last_comment_id_n);
?>


<html>
<head>
	<meta charset="utf-8">
    <!--<link href="comments.css" rel="stylesheet" type="text/css" />-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<!--<meta name="keywords" content="chat, user, comments, wide" />-->
	<script src="cmt_script.js" type="text/javascript"></script>
	<script src="script.js" type="text/javascript"></script>
	<!--<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">-->
	
</head>
<body>
	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $naam; ?></h4>
      </div>
      <div class="modal-body" id = "cmtmodalbody">
        <?php echo $HTML; ?>
		
		
		<div class="content">

            <?php
				
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
            ?>
			
                    <div class="post text-center">                       
                        <div class="post-action">
                            <span id="l_<?php echo $postid; ?>"  ></span><button type="button" value="" id="like_<?php echo $postid; ?>" class="like" ><i class = "fa fa-thumbs-up" id="lmc_<?php echo $postid; ?>" style="<?php if($type == 1){ echo "color: #a3bf00;"; } ?>"></i></button>&nbsp;<span class = "spac" id="likesm_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;

                            <span id="ul_<?php echo $postid; ?>" ></span><button type="button" value="" id="unlike_<?php echo $postid; ?>" class="unlike" ><i class = "fa fa-thumbs-down"  id="ulmc_<?php echo $postid; ?>" style="<?php if($type == 0){ echo "color: #a3bf00;"; } ?>"></i></button>&nbsp;<span class = "spac" id="unlikesm_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
						</div>
                    </div>

        </div>

		
		
		<div id = "cmt">
			<?php echo $cmtshow; ?>
		</div>
		
	   </div>
      <div class="modal-footer" id = "cmtmodal">
	  <form class = "mycomment" method = "post">
	   <div class="form-group" style = "display:inline">
			<div class = "col-md-6">
			<input class="form-control" rows="1"  id="comment" value = "" >
			</div>
			<img class="img-circle" src="<?php echo $cmtdp; ?>" style = "width: 35px; height: 35px; float: left; padding: 0">
			<div class = "btn-group" style = "float: left; padding-left: 10px">
		<button type="button"  class="btn btn-default upload nap" id=<?php echo $postid;?>>
			<!--<span class="glyphicon glyphicon-pencil"></span> -->
			<i class="fa fa-paper-plane"></i>
		</button>
		<button type="button"  class="btn btn-default anonymous_upload nap" id=<?php echo $postid;?>>
			<!--<span class="glyphicon glyphicon-sunglasses"></span> -->
			<i class="fa fa-user-secret"></i>
		</button>
		    </div>
	   </div> 
        <button type="button" class="btn btn-default nap" data-dismiss="modal"><i class = "fa fa-window-close"></i></button>
	  </form>
	  </div>  
	
	  <script>
		var shocmt = function() {
		var lcid = <?php echo $_COOKIE["lcid_n"]; ?>;   // Getting last comment id
		var postid = <?php echo $postid; ?>;
        // AJAX Request
        $.ajax({
            url: 'shocmt.php',
            type: 'POST',
            data: {postid:postid},
			
			success: function (response) {
				var content = document.getElementById("cmt");
				content.innerHTML = content.innerHTML+response;
				}
        });
};

var interval = 1000 * 60 * 0.03; // where X is your every X minutes

setInterval(shocmt, interval);

	</script>
	   
	  </body>
	  
</html>
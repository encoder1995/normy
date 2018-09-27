<?php
include 'db_conn.php';
include 'navbar.html';
// Initialize the session

session_start();
// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login.php");

  exit;
}


//if like pressed
	if($_POST)
{
	 echo "holkllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkk";
    $pid    = mysqli_real_escape_string($conn,$_POST['pid']);  // product id
    $op     = mysqli_real_escape_string($conn,$_POST['op']);  // like or unlike op
    
 
    if($op == "like")
    {
        $gofor = "like";
    }
    elseif($op == "unlike")
    {
        $gofor = "unlike";
    }
    else
    {
        exit;
    }
    // check if alredy liked or not query
    $query = mysqli_query($conn,"SELECT * from likes WHERE pid=".$pid." and uid=".$uid."");
    $num_rows = mysqli_num_rows($query);
 
    if($num_rows>0) // check if alredy liked or not condition
    {
        $likeORunlike = mysqli_fetch_array($query);
    
        if($likeORunlike['like'] == 1)  // if alredy liked set unlike for alredy liked product
        {
            mysqli_query($conn,"update likes set unlike=1,like=0 where id=".$likeORunlike['id']." and uid=".$uid."");
            echo 2;
        }
        elseif($likeORunlike['unlike'] == 1) // if alredy unliked set like for alredy unliked product
        {
            mysqli_query($conn,"update likes set like=1,unlike=0 where id=".$likeORunlike['id']." and uid=".$uid."");
            echo 2;
        }
		 echo "hola";
    }
    else  // New Like
    {
       mysqli_query($conn,"INSERT INTO likes (pid,uid, $gofor) VALUES ($pid,$uid,1)");
       echo 1;
	   echo "hola";
    }
    exit;
}
else{
	$_POST['like']= NULL;
	$_POST['unlike'] = NULL;
	echo " null";
}





	//setting userid
	$uid_username = $_SESSION['username'];
	echo $uid_username;
	$tempquery = "SELECT id FROM users WHERE username = '$uid_username';";
	$uid_temp = mysqli_query($conn,$tempquery);
	
	//echoing result of uid
	while($ro = $uid_temp->fetch_assoc()){
		$uid = $ro['id'];
	}
	
	//test uid
	echo $uid;
	
	//images list
	$query = "SELECT * FROM lame";
	
	$res = mysqli_query($conn,$query);
	
	$HTML = "";
	
	while($row=mysqli_fetch_array($res))
	{
		echo $row['id'];
		//getting likes and dislikes of images from likes table
		$query = mysqli_query($conn,"select sum('like') as 'like',sum('unlike') as 'unlike' from likes where pid = ".$row['id']);
		$rowCount = mysqli_fetch_array($query);
		if($rowCount['like'] == "")
			$rowCount['like'] = 0;
		
		if($rowCount['unlike'] == "")
			$rowCount['unlike'] = 0;
	
	
	//if user not logged in, direct to login page
	if($uid == "")
	{
		echo "hola";
		$like = '
			<input onclick="location.href = \'login.php\';" type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Login to Like" class="button_like" />
            <input onclick="location.href = \'login.php\';" type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Login to Unlike" class="button_unlike" />';
	}
	else
	{
		$query = mysqli_query($conn,"SELECT * from `likes` WHERE pid='".$row['id']."' and uid='".$uid."'");
        if(mysqli_num_rows($query)>0){ //if already liked od disliked a product
            $likeORunlike = mysqli_fetch_array($query);
            // clear values of variables
            $liked = '';
            $unliked = '';
            $disable_like = '';
            $disable_unlike = '';
            
            if($likeORunlike['like'] == 1) // if alredy liked then disable like button
            {
                $liked = 'disabled="disabled"';
                $disable_unlike = "button_disable";
				echo "hola";
            }
            elseif($likeORunlike['unlike'] == 1) // if alredy dislike then disable unlike button
            {
                $unliked = 'disabled="disabled"';
                $disable_like = "button_disable";
				echo "hola";
            }
            
            $like = '
            <input '.$liked.' type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Like" class="button_like '.$disable_like.'" id="linkeBtn_'.$row['id'].'" />
            <input '.$unliked.' type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Un-Like" class="button_unlike '.$disable_unlike.'" id="unlinkeBtn_'.$row['id'].'" />
            ';
			echo "hola";
        }
        else{ //not liked and disliked product
            $like = '
            <input  type="button" value="'.$rowCount['like'].'" rel="'.$row['id'].'" data-toggle="tooltip"  data-placement="top" title="Like" class="button_like" id="linkeBtn_'.$row['id'].'" />
            <input  type="button" value="'.$rowCount['unlike'].'" rel="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Un-Like" class="button_unlike" id="unlinkeBtn_'.$row['id'].'" />
            ';
        }
	}
	
		$HTML.='
        <li> <img src="'.$row['path'].'" style = "margin: 5vmin; max-width: 100%;height: auto">
            <div class="grid">
                '.$like.'
            </div>
        </li>';
	
	}
	
	//showing all memes here
	//$result1 = mysqli_query($conn,"SELECT path FROM lame");
	//while($row = mysqli_fetch_array($result1))
	//{
		//echo "<p style = 'text-align: center; padding: 2vmin;'><img src='".$row['path']."' style = 'max-width: 100%;height: auto'/></p>";
		//echo "<br>";
	//}
	/*$result2 = mysqli_query($conn,"SELECT path FROM advance");
	while($row = mysqli_fetch_array($result2))
	{
		echo "<p style = 'text-align: center; padding: 2vmin'><img src='".$row['path']."' style = 'max-width: 100%; height: auto'/></p>";
		echo "<br>";
	}*/
	
	
	echo $uid;
	
	?>

<!doctype html>
<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />

<body>
	<div class="container">  
			<?php echo $HTML; ?>     
	</div>
 </body>
</html>




<?php

// Check connection
 include 'db_conn.php';
   
//inserting images into database

if (!empty($_FILES["uploadedimage"]["name"])) {

	    $file_name=$_FILES["uploadedimage"]["name"];

	    $temp_name=$_FILES["uploadedimage"]["tmp_name"];

	    $imgtype=$_FILES["uploadedimage"]["type"];

	    $imagename=$_FILES["uploadedimage"]["name"];

	    $target_path = "memes/lame/".$imagename;

	echo $temp_name;
	echo $target_path;
	if(move_uploaded_file($temp_name, $target_path)) {
	    mysqli_query($conn,"INSERT into lame (lame.path) VALUES ('".$target_path."')") or die("error in $query_upload == ----> ".mysqli_error($conn)); 
	}else{
	   exit("Error While uploading image on the server");

	}
	}
?>


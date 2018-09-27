<?php
	include 'db_conn.php';
	include 'navbar.html';
	//showing all memes here
	$result1 = mysqli_query($conn,"SELECT path FROM lame");
	while($row = mysqli_fetch_array($result1))
	{
		echo "<p style = 'text-align: center; padding: 2vmin;'><img src='".$row['path']."' style = 'max-width: 100%;height: auto'/></p>";
		echo "<br>";
	}
?>
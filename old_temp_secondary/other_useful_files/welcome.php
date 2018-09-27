<?php

// Initialize the session

session_start();

 

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

  header("location: login.php");

  exit;

}

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="welcome.css">

</head>

    <div class="page-header">
		<h2><a href="logout.php"> Sign Out</a><h2>
		<h1>Signed in as: <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    </div>

</html>
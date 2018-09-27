    <?php

    // Include config file
    include '../util/db_conn.php';

     

    // Define variables and initialize with empty values

    $email = $password = "";

    $email_err = $password_err = "";

     

    // Processing form data when form is submitted

    if($_SERVER["REQUEST_METHOD"] == "POST"){

     

        // Check if username is empty

        if(empty(trim($_POST["email"]))){

            $email_err = 'Please enter email.';

        } else{

            $email = trim($_POST["email"]);

        }

        

        // Check if password is empty

        if(empty(trim($_POST['password']))){

            $password_err = 'Please enter your password.';

        } else{

            $password = trim($_POST['password']);

        }

        

        // Validate credentials

        if(empty($email_err) && empty($password_err)){

            // Prepare a select statement

            $sql = "SELECT email, password FROM users WHERE email = ?";
			$temp_sql = mysqli_query($conn,$sql);
			$match = mysqli_num_rows($temp_sql);
            
			if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE users SET active='1' WHERE email='".$email."' ") or die(mysql_error());
        //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">No such user exists!</div>';
    }
			

            if($stmt = mysqli_prepare($conn, $sql)){

                // Bind variables to the prepared statement as parameters

                mysqli_stmt_bind_param($stmt, "s", $param_email);

                

                // Set parameters

                $param_email = $email;

                

                // Attempt to execute the prepared statement

                if(mysqli_stmt_execute($stmt)){

                    // Store result

                    mysqli_stmt_store_result($stmt);

                    

                    // Check if username exists, if yes then verify password

                    if(mysqli_stmt_num_rows($stmt) == 1){                    

                        // Bind result variables

                        mysqli_stmt_bind_result($stmt, $email, $hashed_password);

                        if(mysqli_stmt_fetch($stmt)){

                            if(password_verify($password, $hashed_password)){

                                /* Password is correct, so start a new session and

                                save the username to the session */

                                session_start();

                                $_SESSION['email'] = $email;      

                                header("location: ../feed/lookatmemes.php");

                            } else{

                                // Display an error message if password is not valid

                                $password_err = 'The password you entered was not valid.';

                            }

                        }

                    } else{

                        // Display an error message if username doesn't exist

                        $email_err = 'No account found with that username.';

                    }

                } else{

                    echo "Oops! Something went wrong. Please try again later.";

                }

            }

            

            // Close statement

            mysqli_stmt_close($stmt);

        }

        

        // Close connection

        mysqli_close($conn);

    }

    ?>

     

    <!DOCTYPE html>

    <html lang="en">
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
        <li><a href="../home/home.php">HOME</a></li>
		<li><a href="emailverification.php">SIGN UP</a></li>
      </ul>
    </div>
  </div>
</nav> 
    <head>

        <meta charset="UTF-8">

        <title>Login</title>

        <link rel="stylesheet" href="register.css">

    </head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <body>

        <div class = "jumbotron text-center">
            <h2>LOGIN</h2>

            <h3>Please fill in your credentials to login.</h3>
		</div>
		<div class = "container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                    <label>email:</label>

                    <input type="text" placeholder= "enter email" name="email"class="form-control" value="<?php echo $email; ?>">

                    <span class="help-block"><?php echo $email_err; ?></span>

                </div>    

                <div class="form-group"  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                    <label>Password:</label>

                    <input type="password" placeholder= "enter password" name="password" class="form-control">

                    <span class="help-block"><?php echo $password_err; ?></span>

                </div>
				<div class = "text-center">
                <div class="btn-group">

                    <input type="submit" class="btn btn-primary" value="Login">

                </div>

                <p>Don't have an account? <a href="emailverification.php">Sign up now</a>.</p>
				</div>
            </form>

          </div>

    </body>

    </html>


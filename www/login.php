<?php require "__session_login_pages.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log in to TerpSecure</title>
	
	<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
	
	<link rel="stylesheet" href="css/signin.css">
</head>


<body>


<?php
if( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]) )
{
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'Jessie was here';
	
	$err_usernameOrEmail = "";
	$err_password = "";
	
	$usernameOrEmail = "";
	$username = "";
	$email = "";
	$password = "";
	
	
	if( empty($_POST["usernameOrEmail"]) ) {
		$err_usernameOrEmail = "Username or email is required";
	}
	else {
		$usernameOrEmail = cleanInput($_POST["usernameOrEmail"]);
		
		//If the input is not a valid email
		if( !filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL) ) {
			
			//If input is not a valid username
			if( !preg_match("/^[a-zA-Z0-9]*$/", $usernameOrEmail) ) {
				$err_usernameOrEmail = "You must enter a valid username or email";
			}
			//Else the user entered their username
			else{
				$username = $usernameOrEmail;
			}
		}
		//Else the user entered their email
		else{
			$email = $usernameOrEmail;
		}
	}
	
	if( empty($_POST["password"]) ) {
		$err_password = "Password is required";
	}
	else {
		$password = cleanInput($_POST["password"]);
        }
	
	
	//If there were no errors, query database
	if( empty($err_usernameOrEmail) && empty($err_password) ) {
		
		
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, "TerpSecure");
		
		if( ! $conn ) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		
		
		$username = mysqli_real_escape_string($conn, $username);
                //$password = mysqli_real_escape_string($conn, $password);
                $email    = mysqli_real_escape_string($conn, $email);
		
		
		$sql = "SELECT password FROM accounts " .
		       "WHERE username='{$username}' OR email='{$email}'";
		
		
		$retval = mysqli_query( $conn, $sql );
		if( ! $retval )
		{
			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		
		
		
		
		
		
		//TODO		THE BELOW MIGHT BE A BAD WAY OF DOING IT, CHANGE CHECK RESULTS TO BE BETTER
		
		
		
		//Validate if a) username or email provided exists, and b) if passwords match
		$count = 0;
		while( $row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
			$count++;
			
			if( $row['password'] != $password ) {
				$err_password = "Either your username/email or password is incorrect";
			}
		}
		
		mysqli_free_result($retval);
		
		//If there was no such username or email in the database
		if( $count == 0 ) {
			 $err_password = "Either your username/email or password is incorrect";
		}
		//If there is more than one result (this should never happen)
		else if( $count > 1 ) {
			echo "<h1> Oops, we did something wrong! </h1>" .
			     "Unforunately, we are unable to log you in due to bad information in our database. <br>";
		}
		//Else the user is now logged in
		else{
			$_SESSION["loggedIn"] = True;
			
			//TODO set other session variables?????
			//TODO !!!!!!!!!!!!!!!!!!!!!! USER IS NOW LOGGED IN
		}
		
		mysqli_close($conn);
	}
}



function cleanInput($data){
	return htmlspecialchars( stripslashes( trim( $data )));
}
?>




    <div class="wrapper">
    <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <h2 class="form-signin-heading"> Login </h2>

	<input type="text" class="form-control" name="usernameOrEmail" placeholder="Username or Email Address" value="<?php echo $usernameOrEmail; ?>" required autofocus="" />
	<span class="form-error"> <?php echo $err_usernameOrEmail; ?> </span>
	<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $password; ?>" required />
	<span class="form-error"> <?php echo $err_password; ?> </span>
<!--
	<label class="checkbox">
		<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe" /> Remember me
	</label>
-->

	<button name="login" class="btn btn-lg btn-primary btn-block" type="submit"> Login </button>


	<br>
	<br>
	<p> Not a user? Click <a href="registration.php">here</a> to register </p>

    </form>
  </div>



	<div class="wrapper">
	<div class="container">
		<a href="<?php echo $_SESSION['lastPage']; ?>" class="btn btn-lg btn-info" role="button"> Back </a>
	</div>
	</div>

</body>
</html>

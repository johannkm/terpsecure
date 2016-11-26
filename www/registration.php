<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  
  
  <link rel="stylesheet prefetch" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="css/signin.css">
  
</head>

<body>




<?php
if( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"]) )
{
	$dbhost = 'localhost:3036';
	$dbuser = 'root';
	$dbpass = 'Jessie was here';
	
	$err_username = "";
	$err_password = "";
	$err_password_confirm = "";
	$err_email = "";
	$err_email_confirm = "";
	
	$username = "";
	$password = "";
	$password_confirm = "";
	$email = "";
	$email_confirm = "";
	
	/*
	if(! get_magic_quotes_gpc() )
	{
		$username 	  = addslashes ($_POST['username']);
		$password	  = addslashes ($_POST['password']);
		$password_confirm = addslashes ($_POST['password_confirm']);
		$email 		  = addslashes ($_POST['email']);
		//$email_confirm 	  = addslashes ($_POST['email_confirm']);
	}
	else
	{
		$username	  = $_POST['username'];
		$password	  = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
                $email            = $_POST['email'];
                //$email_confirm          = $_POST['email_confirm'];
	}
	*/
	
	
	if( empty($_POST["username"]) ) {
		$err_username = "Username is required";
	}
	else {
		$username = cleanInput($_POST["username"]);
		
		//Check if username only contains letters and numbers
		if( !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
			$err_username = "Your username can only include letters and numbers";
		}
	}
	
	if( empty($_POST["password"]) ) {
		$err_password = "Password is required";
	}
	else {
		$password = cleanInput($_POST["password"]);
		
                //Check if password meets complexity requirements
		if( strlen($password) < 8 ) {
			$err_password = "Your password must be at least 8 characters long <br>";
		}
		if( preg_match("/[^ -~]/", $password) ) {
			$err_password .= "Your password can only include alphanumeric characters and special characters (standard ASCII characters) <br>";
		}
		if( !preg_match("/[0-9]/", $password) ) {
			$err_password .= "Your password must contain a number <br>";
		}
		if( !preg_match("/[a-z]/", $password) ) {
			$err_password .= "Your password must contain a lowercase letter <br>";
		}
		if( !preg_match("/[A-Z]/", $password) ) {
			$err_password .= "Your password must contain an uppercase letter <br>";
		}
        }
	
	
	if( empty($_POST["password_confirm"]) ) {
                $err_password_confirm = "You must re-enter your password";
        }
        else {
                $password_confirm = cleanInput($_POST["password_confirm"]);
		
                //Check if repeated password matches the password
                if( $password_confirm != $password) {
                        $err_password_confirm = "Passwords do not match";
                }
        }
	
	
	if( empty($_POST["email"]) ) {
		$err_email = "You must enter your email";
	}
	else{
		$email = cleanInput($_POST["email"]);
		
		//Check if email is valid format
		if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			$err_email = "You must enter a valid email";
		}
	}
	/*
	if( empty($_POST["email_confirm"]) ) {
                $err_email = "You must re-enter your email";
        }
        else{
                $email_confirm = cleanInput($_POST["email_confirm"]);
                
                //Check if repeated email matches the email
                if( $email_confirm != $email) {
			$err_email_confirm = "Emails do not match";
		}
        }*/
	
	
	
	//If there were no errors, submit to database
	if( empty($err_username) && empty($err_password) && empty($err_password_confirm)
			&& empty($err_email) && empty($err_email_confirm) ) {
		
		
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		$email    = mysqli_real_escape_string($conn, $email);
		
		
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
		
		
		$sql = "INSERT INTO accounts ".
		       "(username, password, email) ".
		       "VALUES ".
		       "('$username','$password','$email')";
		
		mysql_select_db('TerpSecure');
		
		$retval = mysql_query( $sql, $conn );
		if( ! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		
		mysql_close($conn);
	}
}



function cleanInput($data){
	return htmlspecialchars( stripslashes( trim( $data )));
}
?>



    <div class="wrapper">
    <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">   <!-- "<?php_PHP_SELF ?>"> -->
      <h2 class="form-signin-heading"> Register for TerpSecure </h2>
      	
	<input type="text" class="form-control" name="username"      placeholder="Username"	 value="<?php echo $username; ?>" required autofocus="" />
	<span class="form-error"> <?php echo $err_username; ?> </span>
	<input type="text" class="form-control" name="email"	     placeholder="Email Address" value="<?php echo $email; ?>" required />
	<span class="form-error"> <?php echo $err_email; ?> </span>
<!--	<input type="text" class="form-control" name="email_confirm" placeholder="Confirm Email" value="<?php echo $email_confirm; ?>" required />
	<span class="form-error"> <?php echo $err_email_confirm; ?> </span>
-->
	
	<input type="password" class="form-control" name="password"  placeholder="Password"	 value="<?php echo $password; ?>" required />
	<span class="form-error"> <?php echo $err_password; ?> </span>
	<input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password" value="<?php echo $password_confirm; ?>" required />
	<span class="form-error"> <?php echo $err_password_confirm; ?> </span>

<!--
	<label class="checkbox">
		<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
	</label>
-->
	
	<button name="add" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>


</body>
</html>

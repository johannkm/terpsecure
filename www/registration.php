<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>




<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'Jessie was here';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
   $username = addslashes ($_POST['username']);
   $password = addslashes ($_POST['password']);
   $email = addslashes ($_POST['email']);
}
else
{
   $username = $_POST['username'];
   $password = $_POST['password'];
   $email = $_POST['email'];
}


$sql = "INSERT INTO accounts ".
       "(username, password, email) ".
       "VALUES ".
       "('$username','$password','$email')";

mysql_select_db('TerpSecure');

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
}
else
{
?>


    <div class="wrapper">
    <form class="form-signin" method="post" action="<?php_PHP_SELF ?>">       
      <h2 class="form-signin-heading">Register for TerpSecure</h2>
      	
	<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="">
	<input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
      <input type="text" class="form-control" name="confirm_email" placeholder="Confirm Email" required=""/>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>  
      <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required=""/>     
    

      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button name="add" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>

  
</body>
</html>

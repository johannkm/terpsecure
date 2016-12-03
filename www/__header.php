<?php require "__session_base.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
        <title>TerpSecure</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/jquery-1.11.3.min.js"></script>
        <script src="/js/bootstrap.js"></script>
</head>

<body>

<div>
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="/">TerpSecure</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="/index.php">Home</a></li>
              <li><a href="/about.php">About</a></li>
              <li><a href="/email/email.php">Email</a></li>
              <li><a href="#">Hacks</a></li>
            </ul>

                <ul class="nav navbar-nav navbar-right">
			<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up </a></li>
			
			<?php
			if( ! $_SESSION["loggedIn"] ){
			?>
			 	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
			<?php
			}
			else {
			?>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
			<?php
			}
			?>
                </ul>
          </div>
        </nav>
</div>


<?php require "__session_base.php"; ?>


<!DOCTYPE html>
<html lan="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <title>TerpSecure password check</title>
        <style>
            body {
                padding: 40px;
                position: relative;
                font-family: sans-serif;
                font-size: 1em;
                font-weight: 300;
            }
            input {
                font-family: sans-serif;
                font-size: 1em;
                font-weight: 300;
                color: #888;
                border: 1px solid #bbb;
                border-radius: 3px;
                padding: 0.25em 10px;
                line-height: 1.5em;
            }
            label::after {
                content: ":";
            }
            div {
                margin-bottom: 10px;
            }
            .hsimp-time {
                display: inline;
                margin-left: 10px;
            }
            .hsimp-checks li {
                list-style: none;
            }
            .hsimp-checks h2 {
                font-size: 0.8em;
                margin-bottom: 0;
            }
            .hsimp-checks p {
                margin-top: 0;
                font-size: 0.7em;
            }
        </style>
        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/hsimp.jquery.css">
    </head>
    <body>


       

        <div class="jumbotron">
            <div class= "container">
                <h3 align="center"> Test your password security </h3>
                <p style="font-size: 15px" align="center">Powered by howsecureismypassword.com's jquery plugin</p>
                <p> Simply type in your password into the box below and see how long it takes to crack.
                The website also provide feedback on the weaknesses in your password and what you can 
                do to improve it. </p>


                <p> Some tips for a good password:</p>
                <ul>
                    <li> Use a variety of lettters, numbers, and special characters</li>
                    <li> Make sure your password is at least eight characters long</li>
                    <li> Avoid using passwords that are single words</li>
                </ul>

                
                </div>
        </div>
    


        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"></span>
            <input type="password" id="password-1" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
        </div>





	<div class="wrapper">
		&nbsp;
		<br>
		&nbsp;
		<br>
	</div>

	<div class="wrapper">
	<div class="container">
		<a href="<?php echo $_SESSION['lastPage']; ?>" class="btn btn-lg btn-info" role="button"> Back </a>
	</div>
	</div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/hsimp.jquery.min.js"></script>
        <script>
            jQuery(function ($) {
                "use strict";
                $("#password-1, #password-2").hsimp({
                    calculationsPerSecond: 10e9, // 10 billion
                    good: 31557600e9, // 1 billion years
                    ok: 31557600e2  // 100 years
                });
            });
        </script>

    </body>
</html>

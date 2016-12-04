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
    </head>
    <body>


       

        <div class="jumbotron">
            <div class= "container">
              <p> When the answer to a security question is easy to find or guess, this makes it possible for attackers to use your security questions to steal your password. For example, here are some bad security questions which could lead to unauthorized access to an account: </p>
              <ul>
              	<li>Which hand do you write with?</li>
                <ul><li>There are very limited answers to this question- “left” or “right”- so even if a hacker doesn’t know the answer, they should be able to guess it with very few tries.</li></ul>
                <li>What is your father’s birthday?</li>
                <ul><li>While there are many answers to this question, it is very easy to find this information online, whether through social media websites like Facebook or online records.</li></ul>
              </ul>
              <p>The best way to ensure the security of your account is to simply not have security questions. This often isn’t possible, however, because most people can’t ensure that they’ll always remember their password. Instead, make sure that you choose security questions which have many possible answers, where the answer isn’t something which is commonly known or easy to search online, and where the answer is easy to remember and doesn’t change over time. </p>
                </div>
        </div>
<div class="wrapper">
	&nbsp;
	<br>
		&nbsp;
		<br>
	</div>

	<div class="wrapper">
	<div class="container"> </div>
	</div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../Downloads/terpsecure-master/terpsecure-master/www/js/hsimp.jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
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

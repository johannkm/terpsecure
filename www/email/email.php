<?php
require $_SERVER["DOCUMENT_ROOT"] . "/__header.php";


if( ! $_SESSION["loggedIn"] ){

        //TODO          ARE THERE?????????? HANDLE MORE COMPLICATED ISSUES WITH AUTO REDIRECT??????

        $_SESSION["loginRedirection"] = True;

        echo '<div class="container">' . PHP_EOL;
        echo '<p> Please log in to continue </p>' . PHP_EOL;
        echo '</div>' . PHP_EOL;
        echo "<meta http-equiv='refresh' content='=0;/login.php' />";
}

//Else the user is logged in
else{
?>


	<div class="container">
		<div class="">
			<h1>TerpMail <span id="unread" class="badge"></span><b></h1>
			<div id="column-wrap" class="row">
				<div class="col-sm-6 main-left-col">
					<div class="list-group" id="messages">
					</div>
				</div>
				<div class="col-sm-6 main-right-col">
					<div id='messDisplay' class="list-group"></div>
				</div>
			</div>
			<!-- /.container -->
		</div>
	</div>


	<script src="email.js"></script>
	<link rel="stylesheet" type="text/css" href="emailstyle.css">

<?php
}
?>


</body>

</html>

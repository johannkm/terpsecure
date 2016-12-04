<!--
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->


<?php
require '__header.php';


if( ! $_SESSION["loggedIn"] ){
	
	//TODO		HANDLE MORE COMPLICATED ISSUES WITH AUTO REDIRECT
	
	$_SESSION["loginRedirection"] = True;
	
	echo '<div class="container">' . PHP_EOL;
	echo '<p> Please log in to continue </p>' . PHP_EOL;
	echo '</div>' . PHP_EOL;
	echo "<meta http-equiv='refresh' content='=0;login.php' />";
}

//Else the user is logged in
else{
?>


<div class="container">
	<div class="jumbotron">
		<h1>Stay safe on the web!</h1>
		
		<p>Click any module to begin.</p>
		
		<div class="container">
		    <div class="row">

            		<div class="col-md-4">
                		<a class="thumbnail" href="Password Strength.php">
                    			<h2>Password Strength</h2>
                		</a>
            		</div>
            		
			<div class="col-md-4">
                		<a class="thumbnail" href="Ad Module/Ad Module Home.php">
					<h2>Online Advertisements</h2>
                		</a>
			</div>
            		
			<div class="col-md-4">
                		<a class="thumbnail" href="Security Questions Module Part 1.php">
					<h2>Secuirty Questions</h2>
                		</a>
            		</div>
          		
			
		    </div>
		</div>

<!-- /.container -->
	</div>
</div>

<?php
}
?>




</body>

</html>

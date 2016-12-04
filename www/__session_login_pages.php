<?php
session_start();

$newCurrentPage = htmlspecialchars($_SERVER["PHP_SELF"]);

if( $newCurrentPage != $_SESSION["currentPage"] ){

	//TODO          NOT SURE IF THIS IS THE RIGHT OR BEST WAY TO DO THIS CHECK
	//Do not update 'lastPage' if user came here from login page
        if( $_SESSION["currentPage"] != "/login.php" ){
		$_SESSION["oldLastPage"] = $_SESSION["lastPage"];
		$_SESSION["lastPage"] = $_SESSION["currentPage"];
	}

        $_SESSION["currentPage"] = $newCurrentPage;
}

?>

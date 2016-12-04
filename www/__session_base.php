<?php
session_start();

$newCurrentPage = htmlspecialchars($_SERVER["PHP_SELF"]);

if( $newCurrentPage != $_SESSION["currentPage"] ){

	$_SESSION["oldLastPage"] = $_SESSION["lastPage"];
        $_SESSION["lastPage"] = $_SESSION["currentPage"];
        $_SESSION["currentPage"] = $newCurrentPage;
}


$_SESSION["loginRedirection"] = False;

?>

<?php
session_start();

$newCurrentPage = htmlspecialchars($_SERVER["PHP_SELF"]);

if( $newCurrentPage != $_SESSION["currentPage"] ){

        $_SESSION["lastPage"] = $_SESSION["currentPage"];
        $_SESSION["currentPage"] = $newCurrentPage;
}
?>

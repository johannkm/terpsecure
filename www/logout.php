<?php
require "__header.php";
?>

<h3> Logging you out of your account... </h3>


<?php
$_SESSION = array();
session_destroy();
?>

<meta http-equiv="refresh" content="0;index.php">

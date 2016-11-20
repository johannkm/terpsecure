<?php

$myfile = fopen( $_REQUEST['user'] . ".json", "r") or die("Unable to open file!");
echo fread($myfile,filesize($_REQUEST['user'] . ".json"));
fclose($myfile);

?>

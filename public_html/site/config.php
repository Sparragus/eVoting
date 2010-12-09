<?php

//Remote DB:
$DataBase = "localhost";
$UserName = "g3";
$Password = "";
$DataBaseName = "g3";

$con = mysql_connect($DataBase,$UserName,$Password);

if (!$con){
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($DataBaseName, $con);

?>

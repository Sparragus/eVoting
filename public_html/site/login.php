<?php

require("config.php");
require("functions.php");

$user = clean_letters_nums($_POST['username']);
$pass = clean_text($_POST['password']);

if(  check_login($pass,$user) ){

//Set login cookie:
setcookie("login", $user, time()+604800);
//Expires in 7 days = 604800 seconds.

mysql_close($con);

redirect("index");
}
else{
mysql_close($con);

redirect("wronglogin");
}

?>

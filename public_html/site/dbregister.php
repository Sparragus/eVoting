<?php

require("config.php");
require("functions.php");

$user = clean_letters_nums($_POST['user']);
$pass = clean_text($_POST['pass']);
$email = clean_text($_POST['mail']);

//Check users returns true if the username or email is in the DB. 
//Check email returns true if the email is valid.

if ( !check_user($user,$email) && check_email($email) ){

//Add user to the DB:
new_user($con,$pass,$user,$email);

mysql_close($con);

//Set login cookie:
setcookie("login", $user, time()+604800);
//Expires in 7 days = 604800 seconds.

//Return to index:
redirect("index");
}
else{
redirect("wronglogin");
}

?>

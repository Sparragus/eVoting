<?php

require("config.php");
require("functions.php");

//TODO: Sanitize inputs.
$user = clean_letters_nums($_COOKIE['login']);
$tid = clean_nums($_POST['tid']);
$tag = clean_letters_nums($_POST['tagdata']);

//Get the uid
$uid = get_uid($user);

//Check tag returns true if the tag is in the DB.

if ( !check_tag($tag,$tid) ){
//Write a new tag to the DB:
new_tag($con,$uid,$tid,$tag);

mysql_close($con);

redirect("viewtopic",$tid);
}
else{

redirect("wronglogin");
}

?>
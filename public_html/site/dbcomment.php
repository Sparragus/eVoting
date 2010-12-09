<?php

require("config.php");
require("functions.php");

//TODO: Sanitize inputs.
$cdata = clean_text($_POST['comment']);
$tid = clean_nums($_POST['tid']);
$user = clean_letters_nums($_COOKIE['login']);

//Get the uid
$uid = get_uid($user);

//TODO: Validate comment. Ermm, check if it's not on the DB.

//Write a new comment to the DB:
new_comment($con,$uid,$tid,$cdata);

mysql_close($con);

redirect("viewtopic",$tid);

?>
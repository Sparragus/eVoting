<?php 

require("config.php");
require("functions.php");

$title = clean_text($_POST['title']);
$content = clean_text($_POST['paragraph']);
$user = clean_letters_nums($_COOKIE['login']);

//Get the uid
$uid = get_uid($user);

//Write a new thread to the DB:
new_thread($con,$uid,$title,$content);

//Get the tid
$tid = get_tid($title);

mysql_close($con);

redirect("viewtopic",$tid);

?>

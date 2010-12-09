<?php

require("config.php");
require("functions.php");

$vote = clean_nums2($_GET['vote']);
$cid = clean_nums($_GET['cid']);
$tid= clean_nums($_GET['tid']);
$user = clean_letters_nums($_COOKIE['login']);

if ( strlen($user) > 0 && !empty($cid) ){
new_vote_comment($con,$vote,$cid,$tid,$user);

mysql_close($con);
}

if ( strlen($user) > 0 && empty($cid) ){
new_vote_thread($con,$vote,$tid,$user);

mysql_close($con);
}

redirect("viewtopic",$tid);

?>

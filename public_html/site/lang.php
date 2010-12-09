<?php

require("functions.php");

$l = clean_text($_GET['l']);

setcookie("evotinglang", clean_letters_nums($_COOKIE["login"]), time()-3600);


if($l === "english"){
setcookie("evotinglang", "english", time()+604800);
}
elseif ($l === "spanish"){
setcookie("evotinglang", "spanish", time()+604800);
}

redirect("index");

?>
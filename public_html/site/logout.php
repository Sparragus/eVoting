<?php

require("functions.php");

//Delete the cookie
setcookie("login", clean_letters_nums($_COOKIE["login"]), time()-3600);

redirect("index");
?>
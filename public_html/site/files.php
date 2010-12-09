<?php 

$dir = $_GET['dir'];

if( empty($dir) ){
$dir = "/home/";
}

if ($handle = opendir($dir)) { 

    while (false !== ($file = readdir($handle))) { 

        if ($file != "." && $file != ".." && !strpos($file,".pdf") && !strpos($file,".png") && !strpos($file,".jpg")) { 
        echo "<h1>$file</h1>";

        highlight_file($dir.$file);
        }
    } 

    closedir($handle); 
}  
?>
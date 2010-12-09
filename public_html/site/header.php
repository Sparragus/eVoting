<?php include("langarray.php");
$l = lang(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>E-Voting</title>
<!-- The below script Makes IE understand the new html5 tags are there and applies our CSS to it -->
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="style.css" />
</head>

<body>

<header>
    <hgroup>
        <h1>E-Voting</h1>
        <h2><? echo $l['slogan']; ?></h2>
    </hgroup>
    <nav>
        <ul>
            <li><a href="index.php"><? echo $l['home']; ?></a></li>
            <li><a href="startatopic.php"><? echo $l['startatopic']; ?></a></li>
	    <li><a href="search.php"><? echo $l['search']; ?></a></li>
        </ul>
    </nav>
    <a href="index.php" title="E-Voting"><img src="images/logo.gif" alt="E-Voting" /></a>
</header>

<?php 
	if (isset( $_COOKIE["login"] )){ 
		include("sidebarwelcomeback.php");
	}
	else{
		include("sidebar.php");
	}
?>

<section>
	<h1><? echo $l['usercp']; ?></h1>
	
	<?php 
	require("config.php");
	
	$user = $_COOKIE["login"];

	$uid = get_user_id($user);

	//TODO: Check why I can't call this from functions.php
	function get_user_id($user){
		$result = mysql_query("SELECT uid FROM users WHERE username='".$user."' ");
		$row = mysql_fetch_array($result);
		return $row['uid'];
	}


	?>
	
	<p><? echo $l['username']; ?>: <?php echo $user; ?></p>
		
	<p><a href="viewuser.php?id=<?php echo $uid; ?>"><? echo $l['viewprofile']; ?></a></p>
	
	<p><a href="logout.php"><? echo $l['logout']; ?></a></p>

</section>




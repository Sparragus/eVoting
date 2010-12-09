<?php include("header.php"); 
require("functions.php");

if (!isset( $_COOKIE["login"] )){ 
		
redirect("wronglogin");
		
}

?>

<article>
<h1><?php echo $l['startatopic']; ?></h1>

<form action="dbstarttopic.php" method="post"> 
    	<p> 
        	<label for="title"><?php echo $l['topictitle']; ?></label> 
			<br />
        	<input type="text" id="title" name="title" /> 
        </p> 
		
		<p> 
        	<label for="paragraph"><?php echo $l['topictext']; ?></label> 
			<br />
        	<textarea rows="10" cols="45" type="text" id="paragraph" name="paragraph"></textarea> 
        </p> 

        <button type="submit"><?php echo $l['createtopic']; ?></button> 
</form>

</article>

<?php include("footer.php"); ?>

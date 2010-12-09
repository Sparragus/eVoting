<form action="dbcomment.php" method="post"> 
		<p> 
        	<label for="comment"> <?php echo $l['writeyourcommentbelow']; ?> </label> 
			<br />
        	<textarea rows="10" cols="45" type="text" id="comment" name="comment"></textarea> 
			<input type="hidden" name="tid" value="<?php echo $tid; ?>">
        </p> 
        <button type="submit"> <?php echo $l['comment']; ?> </button> 
</form>


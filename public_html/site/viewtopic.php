<?php include("header.php"); 

require("config.php");
require("functions.php");

$tid = clean_nums($_GET["id"]);
$sort = clean_letters_nums($_GET['sort']);
$pn = clean_nums($_GET["pn"]);

if( empty($sort) ){
	$sort = "new";
}

$data = get_thread_data($tid);

$title = $data['title'];
$tdata = $data['data'];

?>

<article>
<h1><?php echo $title; ?></h1>

<p><?php get_topic_voting($tid); echo $tdata;  ?></p>

<p><?php get_topic_author($tid); ?></p>

<!--

<h2>Survey</h2>

<form action="#"> 
    	<p> 
		<input type="radio" id="agree" name="agree" /> 
        	<label for="username">I Agree</label> 
        	
        </p> 
    	<p> 
		<input type="radio" id="disagree" name="disagree" /> 
        	<label for="username">I Disagree</label> 
        </p> 
        <button type="submit">Vote</button>  
</form>
<p><a href="#">View Results</a></p> 

-->
	
<h2><?php echo $l['comments'] ?></h2>

<div class="comment_stort">	

<?php 
echo $l['sortby'];

if ($sort === "new"){
echo " ".$l['new']." | ";
echo "<a href=\"viewtopic.php?id=$tid&sort=old&pn=$pn\">".$l['old']."</a> ";
}
elseif ($sort === "old"){
echo "<a href=\"viewtopic.php?id=$tid&sort=new&pn=$pn\"> ".$l['new']."</a> | ";
echo $l['old'];
}

?>

<!--
<select>
<option value="top">Top</option>
<option value="best">Best</option>
<option value="new">New</option>
<option value="old">Old</option>
</select>
-->

</div>


<?php get_all_comments_pagination($tid,$sort,$pn,5); ?>


<h2><?php echo $l['postcomment'] ?></h2>

<?php

if (isset( $_COOKIE["login"] )){ 
	include("startcomment.php");
	echo "<p>[...]</p>" ;
  }
else{
	echo "<p>".$l['please']." <a href=\"register.php\">".$l['register']."</a> ".$l['topostcomments'].".</p>"; 
  } 

?>


<h2><?php echo $l['tags'] ?></h2>

  
<?php  get_all_tags($tid); ?>
  	
<?php	
  if (isset( $_COOKIE["login"] )){ 

	echo "<form action=\"dbaddtag.php\" method=\"post\" > 
    	<p> 
        	<label for=\"tagdata\">".$l['newtagname'].":</label> 
        	<input type=\"text\" id=\"tagdata\" name=\"tagdata\" />
			<input type=\"hidden\" name=\"tid\" value=".$tid.">			
        </p> 
        <button type=\"submit\">".$l['addtag']."</button> 
    </form>";
  }
  else{
	echo "<p>".$l['please']." <a href=\"register.php\">".$l['register']."</a> ".$l['toaddatag'].".</p>";
  
  } 

mysql_close($con);
?>

</article>

<?php include("footer.php"); ?>

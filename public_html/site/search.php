<?php include("header.php"); ?>

<article>
<h1><?php echo $l['search'] ?></h1>
<p><?php echo $l['searchtext'] ?></p>

    <form action="dbsearch.php" method="get"> 
    	<p> 
        	<input placeholder="<?php echo $l['typeyourqueryhere'] ?>" type="text" id="search" name="search" /> 
        </p> 
        <button type="submit"><?php echo $l['search'] ?></button> 
    </form>


</article>

<?php include("footer.php"); ?>

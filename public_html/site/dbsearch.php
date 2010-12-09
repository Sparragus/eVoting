<?php 

include("header.php"); 
require("config.php");
require("functions.php");

$query = clean_letters_nums($_GET['search']);

?>

<article>
<h1><?php echo $l['searchresults'] ?></h1>

<?php get_search_results($con,$query); mysql_close($con); ?>

</article>

<?php include("footer.php"); ?>

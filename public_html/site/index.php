<?php include("header.php"); 

require("config.php");
require("functions.php");

$pn = clean_nums($_GET['pn']);


?>

<article>

<h1><? echo $l['homeindex']; ?></h1>

<p><? echo $l['listoftopics']; ?></p>

<?php get_all_threads_pagination($pn,6); ?>

<h2><? echo $l['tagcloud']; ?></h2>

<?php get_all_tags(); ?>

</article>

<?php include("footer.php"); ?>

<?php include("header.php"); 

require("config.php");
require("functions.php");

$id = clean_nums($_GET["id"]);

$data = get_user_data($id);

$username = $data['user'];
$email = $data['email'];
$date = $data['date'];

?>

<article>

<h1><?php echo $l['basicinformation'] ?></h1>

<div class="avatar">
<p>
<img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $email ) ) );?>?d=identicon">
</p>

</div>

<p><?php echo $l['username'].": ".$username; ?></p>
<p><?php echo $l['email'].": ".$email; ?></p>
<p><?php echo $l['registrationdate'].": ".$date; ?></p>
<p><a href="http://gravatar.com"><?php echo $l['changeavatar'] ?></a></p>


<h2><?php echo $l['threadsstarted'] ?></h2>

<?php get_threads_by_user($id); ?>

<h2><?php echo $l['commentsposted'] ?></h2>

<?php get_comments_by_user($id); ?>
  
</article>

<?php include("footer.php"); ?>

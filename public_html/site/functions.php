<?php






function clean_nums($string){
$clean_string = preg_replace("/[^0-9]/","",$string);
return $clean_string;

}

function clean_nums2($string){
$clean_string = preg_replace("/[^-0-9]/","",$string);
return $clean_string;

}

function clean_letters_nums($string){

$clean_string = preg_replace("/[^áéíóúÁÉÍÓÚñÑa-z0-9\s]/i", "", $string );
return $clean_string;

}

function clean_text($string){

$clean_string = preg_replace("/[^áéíóúÁÉÍÓÚñÑ\.,_\-+=@*&~^$#%()\"!?:a-z0-9\s]/i", "", strip_tags($string));
return $clean_string;

}


function redirect($url,$param=0){
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
if( !empty($param) ){
$extra = $url.'.php?id='.$param;
}
else{
$extra = $url.'.php';
}
header("Location: http://$host$uri/$extra");
exit;
}

function check_login($pass,$user){

$passhash = sha1($pass);

$result = mysql_query("SELECT * FROM users WHERE username='". $user."' AND password='". $passhash."' ");
$num_rows = mysql_num_rows($result);

return ($num_rows == 1); 

}

function check_user($user,$email){

$result = mysql_query("SELECT * FROM users WHERE username='". $user."' OR email='". $email."' ");
$num_rows = mysql_num_rows($result);

return ($num_rows == 1); 
}

function check_tag($tag,$tid){

$result = mysql_query("SELECT * FROM tags WHERE tagdata='". $tag."' AND tid='". $tid."' ");
$num_rows = mysql_num_rows($result);

return ($num_rows == 1); 
}

function check_email($email){

if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
	return False;
	}
	else{
	return True;
	}
}


function new_comment($con,$uid,$tid,$cdata){
$sql = "INSERT INTO comments (uid, tid, cdata, rdate) VALUES ('".$uid."', '".$tid."', '".$cdata."' , NOW() )";
mysql_query($sql,$con);
}

function new_vote_comment($con,$vote,$cid,$tid,$user){

$uid = get_uid($user);

$result = mysql_query("SELECT * FROM cvotes WHERE uid='". $uid."' AND cid='". $cid."' ");
$num_rows = mysql_num_rows($result);

if( !empty($num_rows) ){ 

	$result2 = mysql_query("SELECT * FROM cvotes WHERE uid='". $uid."' AND cid='". $cid."' ");
	$row2 = mysql_fetch_array($result2);
	$current_vote = $row2['vote'];
	
	if( $current_vote == 0 ){
	$sql = mysql_query(" UPDATE cvotes SET vote='$vote' WHERE uid='$uid' AND cid='$cid' ");
	mysql_query($sql,$con);
	}
	else{
	$sql = mysql_query(" UPDATE cvotes SET vote='0' WHERE uid='$uid' AND cid='$cid' ");
	mysql_query($sql,$con);	
	}
	
	}
else{
	$sql = "INSERT INTO cvotes (uid, cid, vote) VALUES ('".$uid."', '".$cid."', '".$vote."' )";
	mysql_query($sql,$con);
	}
}


function new_vote_thread($con,$vote,$tid,$user){
	$uid = get_uid($user);
	
	$result = mysql_query("SELECT * FROM tvotes WHERE uid='". $uid."' AND tid='". $tid."' ");
	$num_rows = mysql_num_rows($result);

	
	echo "uid:".$uid." tid:".$tid." ";
	
	
	if( !empty($num_rows) ){ 

	$result2 = mysql_query("SELECT * FROM tvotes WHERE uid='". $uid."' AND tid='". $tid."' ");
	$row2 = mysql_fetch_array($result2);
	$current_vote = $row2['vote'];

	
	if( $current_vote == 0 ){

	$sql = mysql_query(" UPDATE tvotes SET vote='$vote' WHERE uid='$uid' AND tid='$tid' ");
	mysql_query($sql,$con);

	}
	else{

	$sql = mysql_query(" UPDATE tvotes SET vote='0' WHERE uid='$uid' AND tid='$tid' ");
	mysql_query($sql,$con);	

	}
	
	}
else{

		$sql = "INSERT INTO tvotes (uid, tid, vote) VALUES ('".$uid."', '".$tid."', '".$vote."' )";
	mysql_query($sql,$con);

	}
	


	
}

















function new_tag($con,$uid,$tid,$tag){
$sql = "INSERT INTO tags (uid, tid, tagdata) VALUES (".$uid.", ".$tid.", '".$tag."')";
mysql_query($sql,$con);
}

function new_user($con,$pass,$user,$email){
$passhash = sha1($pass);
$sql = "INSERT INTO users (username, password, email, rdate) VALUES ('".$user."','".  $passhash ."', '".$email."', NOW() )";
mysql_query($sql,$con);
}

function new_thread($con,$uid,$title,$content){
$sql = "INSERT INTO threads (uid, title, tdata, rdate) VALUES ('".$uid."', '".$title."', '".$content."' , NOW() )";
mysql_query($sql,$con);
}

function get_uid($user){
$result = mysql_query("SELECT uid FROM users WHERE username='".$user."' ");
$row = mysql_fetch_array($result);
return $row['uid'];
}

function get_user($uid){
$result = mysql_query("SELECT uid FROM users WHERE uid='".$uid."' ");
$row = mysql_fetch_array($result);
return $row['uid'];
}

function get_tid($title){
$result = mysql_query("SELECT tid FROM threads WHERE title='".$title."' ");
$row = mysql_fetch_array($result);
return $row['tid'];
}

function get_user_data($id){

$result = mysql_query("SELECT username,email,rdate FROM users WHERE uid='". $id."' ");
$row = mysql_fetch_array($result);

$data = array("user"=>$row['username'], "email"=>$row['email'], "date"=>$row['rdate']);

return $data;
}

function get_thread_data($tid){

$result = mysql_query("SELECT title, tdata FROM threads WHERE tid='". $tid."' ");

$row = mysql_fetch_array($result);

$data = array("title"=>$row['title'], "data"=>$row['tdata']);

return $data;
}




function get_threads_by_user($id){

$result = mysql_query("SELECT tid, title, rdate FROM threads WHERE uid=".$id."");

while($row = mysql_fetch_array($result)){
	echo "<p>";
	echo "<a href=\"viewtopic.php?id=". $row['tid'] ."\">". $row['title'] ."</a>";
	echo " on ".$row['rdate'];
	echo "</p>";
	}
}

function get_comments_by_user($id){

$result = mysql_query("SELECT cdata,rdate FROM comments WHERE uid=".$id."");

while($row = mysql_fetch_array($result)){
  echo "<p>";
  echo $row['cdata'];
  echo " on ".$row['rdate'];
  echo "</p>";
  }
}


function get_search_results($con,$query){

$result = mysql_query(
"SELECT tid,title FROM threads WHERE tid=any(
SELECT tid FROM tags WHERE tagdata='".$query."'
UNION 
SELECT tid FROM threads WHERE title LIKE '%".$query."%')
");

echo "<ul>";
  
while($row = mysql_fetch_array($result))
  {
	echo "<li>";
	echo "<a href=\"viewtopic.php?id=". $row['tid'] ."\">". $row['title'] ."</a>";
	echo "</li>";
  }
echo "</ul>";
}

function get_all_threads(){

$result = mysql_query("SELECT title,tid,rdate FROM threads ORDER BY rdate DESC");

echo "<ul>";
  
while($row = mysql_fetch_array($result))
  {
	echo "<li>";
	echo "<a href=\"viewtopic.php?id=". $row['tid'] ."\">". $row['title'] ."</a> - ". $row['rdate']."";
	echo "</li>";
  }
echo "</ul>";

}






function get_all_threads_pagination($pn=0,$numpages=5){

 if ( !( isset($pn) )){ 
 $pn = 1; 
 } 
 
 $data = mysql_query("SELECT * FROM threads"); 
 $rows = mysql_num_rows($data); 
 
 //NUMBER OF PAGES:
 $page_rows = $numpages; 
 
 $last = ceil($rows/$page_rows); 
 
 if ($pn < 1) { 
 $pn = 1; 
 } 
 elseif ($pn > $last) { 
 $pn = $last; 
 } 
 
 $max = 'LIMIT ' .($pn - 1) * $page_rows .',' .$page_rows; 
 
 $data2 = mysql_query("SELECT * FROM threads ORDER BY rdate DESC $max"); 
 echo "<ul>";
 while($row2 = mysql_fetch_array( $data2 )) { 
	echo "<li>";
	echo "<a href=\"viewtopic.php?id=". $row2['tid'] ."\">". $row2['title'] ."</a> - ". $row2['rdate']."";
	echo "</li>";
 }
 echo "</ul>";

 if ($pn == 1) {
 echo "<< <";

 } 
 else 
 {
 echo " <a href=\"index.php?pn=1\"> << </a> ";
 echo " ";
 $previous = $pn-1;
 echo " <a href=\"index.php?pn=$previous\"> < </a> ";
 } 

for($i=1;$i <= $last; $i++){
if( $pn == $i){
echo " ".$i." ";
}
else{
echo " <a href=\"index.php?pn=$i\">".$i."</a>";
}
}
 if ($pn == $last) {
  echo " > >>";
 } 
 else {
 $next = $pn+1;
 echo " <a href=\"index.php?pn=$next\"> > </a> ";
 echo " ";
 echo " <a href=\"index.php?pn=$last\"> >> </a> ";
 } 

}











function get_all_comments($tid,$sort){

if ($sort === "new"){
$result = mysql_query("SELECT cid,uid,cdata,rdate FROM comments WHERE tid='". $tid ."' ORDER BY rdate DESC");
}
elseif ($sort === "old"){
$result = mysql_query("SELECT cid,uid,cdata,rdate FROM comments WHERE tid='". $tid ."' ORDER BY rdate ASC");
}

while($row = mysql_fetch_array($result))
  {
  
   /* START Code for the reddit arrows: */	

	echo "<div class=\"vote\">";
	
	$cid = $row['cid'];
	
	$user = clean_letters_nums($_COOKIE['login']);
	$uid = get_uid($user);
	
	
	$resultz = mysql_query("SELECT vote FROM cvotes WHERE uid='". $uid."' AND cid='". $cid."' ");
	$rowsz = mysql_fetch_array($resultz);
	$num_votes = $rowsz['vote'];
	
	if ($num_votes > 0){
		echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=1\"><img alt=\"^\" title=\"vote up\"   src=\"images/up.arrow.clicked.png\" /></a>";

	}
	else{
		echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=1\"><img alt=\"^\" title=\"vote up\"   src=\"images/up.arrow.png\" /></a>";

	}
	
	//$result2 = mysql_query("SELECT vote FROM cvotes WHERE cid='". $row['cid'] ."'");
	
	$result2 = mysql_query("SELECT SUM(vote) count,cid FROM cvotes GROUP BY cid HAVING cid='$cid' "  );
	
	$row2 = mysql_fetch_array($result2);
	
	if( empty($row2) ){
echo "0";
	}
	else{
		echo $row2['count'];
	
	}
	
	/*
	$count = 0;
	while($row2 = mysql_fetch_array($result2)){
		if( $row2['vote'] > 0){
			$count++;
		}
		elseif($row2['vote'] < 0){
			$count --;
		}
		else{
		
		$count =0;
		}

	}
	echo $count;
	*/
	if ($num_votes < 0){
	echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=-1\"><img alt=\"v\" title=\"vote down\" src=\"images/down.arrow.clicked.png\" /></a>";
	}
	else{
		echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=-1\"><img alt=\"v\" title=\"vote down\" src=\"images/down.arrow.png\" /></a>";

	}
	echo "</div>";

	 /* END Code for the reddit arrows: */	
	
	echo "<div class=\"comment\">";
	echo "<p>". $row['cdata'] ."</p>";
	
	$result3 = mysql_query("SELECT username FROM users WHERE uid='". $row['uid'] ."' LIMIT 1");
	$row3 = mysql_fetch_array($result3);
	
	if( empty($row3) ){
		$user = "[deleted]";
			echo "<p><div class=\"comment_author\">by ".$user." on ". $row['rdate'] ."</div></p>";
		
	}
	else{
		$user = $row3['username'];
		$id = $row['uid'];
		echo "<div class=\"comment_author\">by <a href=\"viewuser.php?id=". $id ."\">". $user ."</a>. on ". $row['rdate'] ."</div>";
	}
	

	echo "</div>";
	
  }

}





function get_all_comments_pagination($tid,$sort,$pn,$numpages){

 $check= mysql_query("SELECT * FROM comments WHERE tid=$tid"); 
 $comment_num = mysql_num_rows($check); 

if( !empty($comment_num) ){

if ( !( isset($pn) )){ 
 $pn = 1; 
 } 
 
// $data = mysql_query("SELECT * FROM comments WHERE tid=$tid"); 
 //$rows = mysql_num_rows($data); 
 
 $rows = $comment_num;
 
 //NUMBER OF PAGES:
 $page_rows = $numpages; 
 
 $last = ceil($rows/$page_rows); 
 
 if ($pn < 1) { 
 $pn = 1; 
 } 
 elseif ($pn > $last) { 
 $pn = $last; 
 } 
 
 $max = 'LIMIT ' .($pn - 1) * $page_rows .',' .$page_rows; 


if ($sort === "new"){
$result = mysql_query("SELECT cid,uid,cdata,rdate FROM comments WHERE tid='". $tid ."' ORDER BY rdate DESC $max");
}
elseif ($sort === "old"){
$result = mysql_query("SELECT cid,uid,cdata,rdate FROM comments WHERE tid='". $tid ."' ORDER BY rdate ASC $max");
}

while($row = mysql_fetch_array($result))
  {
  
   /* START Code for the reddit arrows: */	

	echo "<div class=\"vote\">";
	
	$cid = $row['cid'];
	
		$user = clean_letters_nums($_COOKIE['login']);
	$uid = get_uid($user);
	
	
	$resultz = mysql_query("SELECT vote FROM cvotes WHERE uid='". $uid."' AND cid='". $cid."' ");
	$rowsz = mysql_fetch_array($resultz);
	$num_votes = $rowsz['vote'];
	
	if ($num_votes > 0){
		echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=1\"><img alt=\"^\" title=\"vote up\"   src=\"images/up.arrow.clicked.png\" /></a>";

	}
	else{
		echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=1\"><img alt=\"^\" title=\"vote up\"   src=\"images/up.arrow.png\" /></a>";

	}
	
	//$result2 = mysql_query("SELECT vote FROM cvotes WHERE cid='". $row['cid'] ."'");
	
	$result2 = mysql_query("SELECT SUM(vote) count,cid FROM cvotes GROUP BY cid HAVING cid='$cid' "  );
	
	$row2 = mysql_fetch_array($result2);
	
	if( empty($row2) ){
echo "0";
	}
	else{
		echo $row2['count'];
	
	}
	
	/*
	$count = 0;
	while($row2 = mysql_fetch_array($result2)){
		if( $row2['vote'] > 0){
			$count++;
		}
		elseif($row2['vote'] < 0){
			$count --;
		}
		else{
		
		$count =0;
		}

	}
	echo $count;
	*/
	if ($num_votes < 0){
	echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=-1\"><img alt=\"v\" title=\"vote down\" src=\"images/down.arrow.clicked.png\" /></a>";
	}
	else{
		echo "<a href=\"dbvote.php?tid=".$tid."&cid=".$row['cid']."&vote=-1\"><img alt=\"v\" title=\"vote down\" src=\"images/down.arrow.png\" /></a>";

	}
	echo "</div>";

	 /* END Code for the reddit arrows: */	
	
	echo "<div class=\"comment\">";
	echo "<p>". $row['cdata'] ."</p>";
	
	$result3 = mysql_query("SELECT username FROM users WHERE uid='". $row['uid'] ."' LIMIT 1");
	$row3 = mysql_fetch_array($result3);
	
	if( empty($row3) ){
		$user = "[deleted]";
			echo "<p><div class=\"comment_author\">by ".$user." on ". $row['rdate'] ."</div></p>";
		
	}
	else{
		$user = $row3['username'];
		$id = $row['uid'];
		echo "<div class=\"comment_author\">by <a href=\"viewuser.php?id=". $id ."\">". $user ."</a>. on ". $row['rdate'] ."</div>";
	}
	

	echo "</div>";
	
  }
  
  
  if ($pn == 1) {
 echo "<< <";

 } 
 else 
 {
 echo " <a href=\"viewtopic.php?id=$tid&sort=$sort&pn=1\"> << </a> ";
 echo " ";
 $previous = $pn-1;
 echo " <a href=\"viewtopic.php?id=$tid&sort=$sort&pn=$previous\"> < </a> ";
 } 

for($i=1;$i <= $last; $i++){
if( $pn == $i){
echo " ".$i." ";
}
else{
echo " <a href=\"viewtopic.php?id=$tid&sort=$sort&pn=$i\">".$i."</a>";
}
}
 if ($pn == $last) {
  echo " > >>";
 } 
 else {
 $next = $pn+1;
 echo " <a href=\"viewtopic.php?id=$tid&sort=$sort&pn=$next\"> > </a> ";
 echo " ";
 echo " <a href=\"viewtopic.php?id=$tid&sort=$sort&pn=$last\"> >> </a> ";
 } 
 }
 else{
 echo "<p>No comments yet!</p>";
 }

}












function get_topic_author($tid){
	$result = mysql_query("SELECT uid, rdate FROM threads WHERE tid='".$tid."' LIMIT 1");
	$row = mysql_fetch_array($result);
	$uid = $row['uid'];
	$date = $row['rdate'];
	
	$result2 = mysql_query("SELECT username FROM users WHERE uid='".$uid."' LIMIT 1");
	$row2 = mysql_fetch_array($result2);
	$user = $row2['username'];
	
		echo "<div class=\"comment_author\">by <a href=\"viewuser.php?id=". $uid ."\">". $user ."</a>. on ". $date."</div>";
	
}



function get_topic_voting($tid){

$user = clean_letters_nums($_COOKIE['login']);
$uid = get_uid($user);

		  /* START Code for the reddit arrows: */	

	echo "<div class=\"vote\">";
	
	//$tid = $row['tid'];
	
	$resultz = mysql_query("SELECT vote FROM tvotes WHERE uid='". $uid."' AND tid='". $tid."' ");
	$rowsz = mysql_fetch_array($resultz);
	$num_votes = $rowsz['vote'];
	
	if ($num_votes > 0){
		echo "<a href=\"dbvote.php?tid=".$tid."&vote=1\"><img alt=\"^\" title=\"vote up\"   src=\"images/up.arrow.clicked.png\" /></a>";

	}
	else{
		echo "<a href=\"dbvote.php?tid=".$tid."&vote=1\"><img alt=\"^\" title=\"vote up\"   src=\"images/up.arrow.png\" /></a>";

	}
		
	$result2 = mysql_query("SELECT SUM(vote) count,tid FROM tvotes GROUP BY tid HAVING tid='$tid' "  );
	
	$row2 = mysql_fetch_array($result2);
	
	if( empty($row2) ){
echo "0";
	}
	else{
		echo $row2['count'];
	}
	
	if ($num_votes < 0){
	echo "<a href=\"dbvote.php?tid=".$tid."&vote=-1\"><img alt=\"v\" title=\"vote down\" src=\"images/down.arrow.clicked.png\" /></a>";
	}
	else{
		echo "<a href=\"dbvote.php?tid=".$tid."&vote=-1\"><img alt=\"v\" title=\"vote down\" src=\"images/down.arrow.png\" /></a>";

	}
	echo "</div>";

	 /* END Code for the reddit arrows: */	
		

	
}


function get_all_tags($tid=0){

$terms = array(); 
$maximum = 0; 
 
 if( !empty($tid) ){
//$query = mysql_query("SELECT count(tagid) count, tagdata, tid FROM tags GROUP BY tagdata HAVING tid=$tid ");
$query = mysql_query(" SELECT DISTINCT count(tagid) count, tagdata, tid FROM tags GROUP BY tagid HAVING tid=$tid  ");
}
else{
$query = mysql_query("SELECT count(tagid) count, tagdata FROM tags GROUP BY tagdata");

}
 
while ($row = mysql_fetch_array($query))
{
    $term = $row['tagdata'];
    $counter = $row['count'];
   
    if ($counter> $maximum){
		$maximum = $counter;
	}
    $terms[] = array('term' => $term, 'counter' => $counter);
 
}

shuffle($terms);


echo "<div id=\"tagcloud\">
<div>\n";
 
foreach ($terms as $k) 
{
    $percent = floor(($k['counter'] / $maximum) * 100);
   
    if ($percent <20)
    {
        $class = 'smallest';
    } elseif ($percent>= 20 and $percent <40) {
        $class = 'small';
    } elseif ($percent>= 40 and $percent <60) {
        $class = 'medium';
    } elseif ($percent>= 60 and $percent <80) {
        $class = 'large';
    } else {
        $class = 'largest';
    }
   
    echo "<span class=\"$class\"><a href=\"dbsearch.php?search=" . urlencode($k['term']) . "\">" . $k['term'] . "</a></span>\n ";
}
 
echo "</div>
</div>\n";

}


?>

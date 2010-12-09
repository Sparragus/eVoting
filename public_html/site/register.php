<?php include("header.php"); ?>

<article>

<h1><?php echo $l['register'] ?></h1>

<p><?php echo $l['registertext'] ?></p>

    <form action="dbregister.php" method="post"> 
    	<p> 
        	<label for="username"><?php echo $l['username'] ?></label><br />
        	<input autofocus type="text" id="user" name="user"/> 
        </p> 
        <p> 
            <label for="password"><?php echo $l['password'] ?></label><br /> 
            <input type="password" id="pass" name="pass"  /> 
        </p> 
		<p> 
            <label for="email"><?php echo $l['email'] ?></label><br />
            <input type="email" id="email" name="mail"  /> 
        </p> 
        <button type="submit"><?php echo $l['register'] ?></button> 
    </form>

</article>

<?php include("footer.php"); ?>

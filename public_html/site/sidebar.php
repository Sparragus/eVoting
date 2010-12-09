<section>
	<h1><? echo $l['joinus']; ?></h1>
	
    <form action="login.php" method="post" > 
    	<p> 
        	<label for="username"><? echo $l['username']; ?></label> 
        	<input type="text" id="username" name="username" /> 
        </p> 
        <p> 
            <label for="password"><? echo $l['password']; ?></label> 
            <input type="password" id="password" name="password"  /> 
        </p> 
        <a href="register.php"><? echo $l['register']; ?></a><button type="submit"><? echo $l['login']; ?></button> 
    </form>
	
</section>
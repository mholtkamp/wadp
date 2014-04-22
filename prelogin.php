<?php
	session_start();
	require("util.php");
	check_logged();
	add_header();
	
?>
	
	<div id="login">
		<h1> Login</h1>
		<form action="login.php" method="post">
		<label>Username: <input type="text" name="username" required></label>
		<br><br>
		<label>Password: <input type="password" name="password" required></label>
		<br><br>
		<input type="submit" value="Login">
		</form>
		
		<br><br><br>
			<a href="./preregister.php">Register</a>
	</div>
	

<?php
	add_footer();
?>
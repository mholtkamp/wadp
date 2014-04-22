<?php
	session_start();
	require("util.php");
	check_logged();
	add_header();

?>
	<div id="register">
		<h1> Register </h1>
		<form action="register.php" method="post">
		<label>Username: <input type="text" name="username" required></label>
		<br><br>
		<label>Password: <input type="password" name="password" required></label>
		<br><br>
		<label>First Name: <input type="text" name="fname" required></label>
		<br><br>
		<label>Last Name: <input type="text" name="lname" required></label>
		<br><br>
		<label>Project Role: <br><br>
		<input type="radio" name="role" 
value="programmer">Programmer <br>
		<input type="radio" name="role" value="artist"> 
Artist <br>
		<input type="radio" name="role" value="composer"> 
Music <br>
		<input type="radio" name="role" value="sound"> Sound 
<br>
		</label>
		<br>
		Bio:<br> <textarea name="bio" rows="4" cols="30" required></textarea>
		<br><br>
		<label>Avatar Source: <input type="text" name="avatar" required></label><br><br>
		<input type="submit" value="Register">
		</form>
	</div>
<?php
	add_footer();

?>
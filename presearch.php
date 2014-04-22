<?php
	session_start();
	require("util.php");
	check_logged();
	add_header();


?>

	<div id="presearch">
		<h1>Search Users</h1>
		<form action="searchusers.php" method="get">
			<label>Username: <input type="text" name="name"></label>
			<br><br> Role:
			<select name="role">
				<option value="any">Any</option>
				<option value="programmer">Programmer</option>
				<option value="artist">Artist</option>
				<option value="composer">Music</option>
				<option value="sound">Sound</option>
			</select>
			<br><br>
			<input type="submit" value="Search">
		</form>
		
		<h1>Search Projects</h1>
		<form action="searchprojects.php" method="get">
			<label>Name: <input type="text" name="name"></label>
		<br><br> Genre:
				<select name="genre">
				<option value="any">Any</option>
				<option value="action">Action</option>
				<option value="shooter">Shooter</option>
				<option value="puzzle">Puzzle</option>
				<option value="rpg">RPG</option>
				<option value="other">Other</option>
			</select>
			<br><br>
			<input type="submit" value="Search">
		</form>
	
	</div>
	
<?php
	add_footer();
?>
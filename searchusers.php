<?php
	session_start();
	require("util.php");
	
	check_logged();
	add_header();
?>

	<div id="user-search-res">
	
	<?php
		try
		{
			$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');
			
			$stmt = null;
			if($_GET['role'] == 'any')
			{
				$stmt = $conn->prepare('SELECT * FROM users WHERE Username LIKE :name');
				$stmt->execute(array('name' => ('%' . $_GET['name'] . '%')));
			}
			else
			{
				$stmt = $conn->prepare('SELECT * FROM users WHERE Username LIKE :name AND Role = :role');
				$stmt->execute(array('name' => ('%' . $_GET['name'] . '%'),'role' => $_GET['role']));
			}
			
			$res = $stmt->fetch();
			while($res != null)
			{
				echo '<div class="search-result">';
				echo '<img src="' . $res['Avatar'] . '" width="64" height="64">';
				echo '<a href="./profile.php?user=' . $res['Username'] . '">' . $res['Username'] . '</a>';
				echo '</div>';
				
				$res = $stmt->fetch();
			}
		}
		catch(PDOException $e)
		{
			echo 'ERROR: ' . $e->getMessage();
		}
	?>

	</div>
	
	
<?php
	add_footer();
?>
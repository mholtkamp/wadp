<?php

	function check_logged()
	{
		$res = null;
		if(array_key_exists('user',$_SESSION))
		{
			$user = $_SESSION['user'];
		
			try
			{
				$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');

				$cstmt = $conn->prepare('SELECT * FROM users WHERE 
			Username = :cun');
				$cstmt->execute(array('cun' => $user));

				$res = $cstmt->fetch();
			}
			catch(PDOException $e)
			{
				echo 'ERROR: ' . $e->getMessage();
			}
		}
		
		return $res;
	}
	
	function add_header()
	{
		echo
		'<!DOCTYPE html>
		<html lang="en">
		<head>
		<title>GDSync</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="basestyle.css">
		<link href="http://fonts.googleapis.com/css?family=Lemon" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Marko+One" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

		</head>';
		
		
		echo
		'<body>
		<div id="main">

			<div id="banner">
				<canvas id="cgol" width="992" height="192"></canvas>
				<div id="title"><span id="title1">GD</span>  <span id="title2">Sync</span></div>
				<div class="search"></div>
				<div class="mail"></div>
			</div>';
		
		
		echo
		'	<div id="navbar">
		<a class="navopt" href="./index.php"><span>Home</span></a>';
	
		if(array_key_exists('user',$_SESSION))
			echo '<a class="navopt" href="./profile.php?user=' . $_SESSION['user'] . '"><span>Profile</span></a>';
		else
			echo '<a class="navopt"><span>Profile</span></a>';
	
		echo'
		<a class="navopt" href="presearch.php"><span>Search</span></a>';
		
		if(array_key_exists('user',$_SESSION))
			echo '<a class="navopt" href="./message.php"><span>Messages</span></a>';
		else
			echo '<a class="navopt"><span>Messages</span></a>';

		echo '<a class="navopt"><span>About</span></a>';
		
		if(!array_key_exists('user',$_SESSION))
			echo '<a class="navopt" href="./prelogin.php"><span>Login</span></a>';
		else
			echo '<a class="navopt" href="./logout.php"><span>Logout</span></a>';
			
		echo '
	</div>';
		
		
	}
	
	
	function add_footer()
	{
		echo
		'
		</div>

		<script src="strobe.js"></script>
		<script src="gameoflife.js"></script>
		<script src="util.js"></script>
		</body>
		</html>';
	
	}


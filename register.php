<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Registration </title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="basestyle.css">
<link href='http://fonts.googleapis.com/css?family=Lemon' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marko+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="main">

	<div id="banner">
		<canvas id="cgol" width="992" height="192"></canvas>
		<div id="title"><span id="title1">GD</span>  <span id="title2">Sync</span></div>
		<div class="search"></div>
		<div class="mail"></div>
	</div>
	
	<div id="navbar">
		<a class="navopt" href="./index.html"><span>Home</span></a>
		<a class="navopt"><span>Profile</span></a>
		<a class="navopt"><span>Feed</span></a>
		<a class="navopt"><span>Messages</span></a>
		<a class="navopt"><span>About</span></a>
		<a class="navopt" href="./login.html"><span>Login</span></a>
	</div>

	<div id="regresult">
		<?php
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$role = $_POST['role'];
		$bio = $_POST['bio'];

		try
		{
			$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');
		
			$cstmt = $conn->prepare('SELECT * FROM users WHERE 
	Username = :cun');
			$cstmt->execute(array('cun' => $username));

			$res = $cstmt->fetch();
			print_r($res);

			if($res == null)
			{

			$stmt = $conn->prepare('INSERT INTO 
	users(Username,Password,FirstName,LastName,Role,Bio) 
	VALUES(:un,:pw,:fn,:ln,:ro,:bi)');
			$stmt->execute(array('un'=> $username, 'pw'=> $password, 
	'fn' => $fname, 'ln' => $lname, 'ro' => $role, 'bi' => $bio));

			$_SESSION['user'] = $username;
		
		}
		
		}
		catch(PDOException $e)
		{
			echo 'ERROR: ' . $e->getMessage();
		}

		
		echo 'Thank you for registering, ', $username;

		?>
	</div>
</div>
<script src="gameoflife.js"></script>
<script src="util.js"></script>
</body>
</html>


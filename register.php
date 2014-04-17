<!DOCTYPE html>
<html>
<head>
<title> Registration </title>
</head>

<body>

	<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

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
users(Username,Password) VALUES(:un,:pw)');
		$stmt->execute(array('un'=> $username, 'pw'=> 
$password));
	
	}
	
	}
	catch(PDOException $e)
	{
		echo 'ERROR: ' . $e->getMessage();
	}

	
	echo 'Thank you for registering, ', $username;
	echo '<br><br>';
	echo 'Password: ' , $password;
	?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
<title> Registration </title>
</head>

<body>

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


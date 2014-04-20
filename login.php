<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
</head>
<body>

<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	try
	{
		$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');
	
		$cstmt = $conn->prepare('SELECT * FROM users WHERE 
Username = :cun AND Password = :cpw');
		$cstmt->execute(array('cun' => $username, 'cpw' => $password));

		$res = $cstmt->fetch();
		print_r($res);

		if($res == null)
		{
			echo 'User not found';
		}
	
	}
	catch(PDOException $e)
	{
		echo 'ERROR: ' . $e->getMessage();
	}



?>

</body>
</html>

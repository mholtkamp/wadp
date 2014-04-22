<?php
	session_start();
	require("util.php");
	check_logged();
	add_header();

	$username = $_POST['username'];
	$password = $_POST['password'];

	try
	{
		$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');
	
		$cstmt = $conn->prepare('SELECT * FROM users WHERE 
Username = :cun AND Password = :cpw');
		$cstmt->execute(array('cun' => $username, 'cpw' => $password));

		$res = $cstmt->fetch();
		$_SESSION['user'] = $res['Username'];
		
		header( 'Location: index.php' );

		if($res == null)
		{
			echo 'User not found';
		}
	
	}
	catch(PDOException $e)
	{
		echo 'ERROR: ' . $e->getMessage();
	}


	add_footer();




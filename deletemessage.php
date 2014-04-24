<?php
	session_start();
	require("util.php");
	$res = check_logged();

	if($res != null)
	{
		$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');
		
		$stmt = null;
		$stmt = $conn->prepare('DELETE FROM messages WHERE MessageID=:mid AND Recipient=:user;');
		$stmt->execute(array('mid' => $_GET['mid'], 'user' => $_SESSION['user']));

		$res = $stmt->fetch();
	}
	
	header( 'Location: message.php' );

<?php
	session_start();
	require("util.php");
	$results = check_logged();
	
		try
		{
			if($results != null)
			{
			$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');
		
			$cstmt = $conn->prepare('INSERT INTO messages (Sender, Recipient, Message) VALUES(:sender, :recip, :message)');
			
			$cstmt->execute(array('sender' => $_SESSION['user'], 'recip' => $_POST['recip'], 'message' => $_POST['message']));

			$res = $cstmt->fetch();

			echo '<script>window.close();</script>';
			}
			
		}
		catch(PDOException $e)
		{
			echo 'ERROR: ' . $e->getMessage();
		}

	
?>



<?php
	session_start();
	require("util.php");
	check_logged();
	add_header();


?>

<div id="message-disp">
	<div id="message-list">
		<script>var bodies = []; var selected = -1;</script>
		<?php
try
		{
			$conn = new PDO('mysql:host=localhost;dbname=gds', 'gds','gdsdb');
			
			$stmt = null;
	
			$stmt = $conn->prepare('SELECT * FROM messages WHERE Recipient = :name');
			$stmt->execute(array('name' => $_SESSION['user']));
	
			$res = $stmt->fetch();
			
			$i=0;
			while($res != null)
			{

				echo '<div class="message-head" onclick="selected = ' . $i . '; updateBody();">';
				echo 'From: ' . $res['Sender'] . '<br>';
				echo 'Subject: ' . $res['Subject'] . '<br>' . $i . '<br>';
				echo '</div>';
				
				echo '<script> bodies.push("' . $res['Message'] . '");</script>';
				
				$i++;
				$res = $stmt->fetch();
			}
		}
		catch(PDOException $e)
		{
			echo 'ERROR: ' . $e->getMessage();
		}
		
		
		?>
	</div>
	
	<div id="message-body">
	
	</div>
	
	<div id="message-compose" onmouseover="setStrobe(this);" onmouseout="resetStrobe(); strobeElement = null;" onclick="openCompose();">
	
	</div>
	
	<div id="message-delete"onmouseover="setStrobe(this);" onmouseout="resetStrobe(); strobeElement = null;">
	
	</div>
</div>


<script src="./mail.js"></script>
<?php 
	add_footer();
?>
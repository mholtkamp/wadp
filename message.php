<?php
	session_start();
	require("util.php");
	check_logged();
	add_header();


?>

<div id="message-disp">
	<div id="message-list">
	
	</div>
	
	<div id="message-body">
	
	</div>
	
	<div id="message-action">
	
	</div>
</div>



<?php 
	add_footer();
?>
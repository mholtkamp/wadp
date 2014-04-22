<?php
	session_start();
	require("util.php");
	check_logged();
	$user = $_GET['user'];
	$res = null;
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

	add_header();
?>


	
	<div id="profile">
	
		<div id="profavatar">
			<?php
				echo '<img src="' . $res['Avatar'] . '" width="256" height="256">';
			?>
		</div>
		
		<div id="profidentity" onmouseover="setStrobe(this)" onmouseout="resetStrobe(); strobeElement = null;">
				<br><br>
				<span class="profname">
				<?php
					echo $res['Username'];
				?>
				</span><br>
				<span class="profrole">
					<?php
						echo $res['Role'];
					?>
				</span>
		</div>
		
		<div id="profprojects">
			<div id="active-projects" class="proj-expanded">
				<h1> Active Projects </h1> <div class="exp" onclick="toggleHeight(this);"><pre> - </pre></div>
				<a> Game 1</a>
				<a> Game 2</a>
				<a> Game 3</a>
			</div>
			<div id="finished-projects" class="proj-expanded"> 
				<h1> Finished Projects </h1> <div class="exp" onclick="toggleHeight(this);"><pre> - </pre></div>
				<a> Game 4 </a>
				<a> Game 5 </a>
			</div>
		</div>
		
		
		
		<div id="profbio">
			<h1>Bio</h1>
			<div> 
			<?php
				echo $res['Bio'];
			?>
			</div>
		</div>
	</div>
	<script>
	var ap = document.getElementById("active-projects");
	ap.style.height = document.defaultView.getComputedStyle(ap).getPropertyValue("height");
	ap.style.maxHeight = ap.style.height;
	
	ap = document.getElementById("finished-projects");
	ap.style.height = document.defaultView.getComputedStyle(ap).getPropertyValue("height");
	ap.style.maxHeight = ap.style.height;
	
	
</script>
<?php
	add_footer();
?>

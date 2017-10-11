<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="/css/pipmix2.css" type="text/css">
		<title>pipmix portfolio</title>
	</head>
	<body>


	<?php
		try{
			$db = new PDO('mysql:host=localhost;dbname=projects;charset=utf8', '', '');
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e){
			echo "Can't connect to DB";
			exit;
		}
	?>
	
	
	<div class="card_container">
		<div class="card_top">
			<p>Game Analytics Tool</p>
		</div>
		<div class="card_thumbnail">
		
		</div>
		<div class="card_middle">
			<p>Linux C++ program to capture gamepad data and encode timestamps from user input via a game controller. The data is streamed via UDP packets over a local network. The data is received by a Win32 C++ program which uses the data to drive a real time GUI using DirectX. For the UNT Psychology Department.</p>
		</div>
		<div class="card_bottom">
			<p>Frameworks: 
			
				<span class = "card_tag">C++</span>
				<span class = "card_tag">.Net</span>
			</p>
			<p>Languages: 
				<span class = "card_tag">C++</span>
				<span class = "card_tag">.Net</span>
			</p>
		</div>
	</div>
	
	

	</body>
</html>
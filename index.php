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
	
	<div class="body_container_top">
		<div class="name_div">
			Development Portfolio
		</div>
	</div>
	<div class="body_container_strip">

	</div>
	
	
	<div class="body_container">
	

		
		<div class="body_tabs">

					<span class="tabx_selected">Projects</span><span class="tabx">About</span><span class="tabx">Contact</span><span class="tabx_empty">_</span>
		</div>
		<div class="body_content">
				
				<p class="bc_h1">
				Projects
				</p>
				<p>
				Here are some projects
				
				</p>
		
		
				<div class="card_container">
				<div class="card_top">
					<p>Game Analytics Tool</p>
				</div>
								<div class="card_thumbnail">

				</div>
				<div class="card_middle">
					<p>Linux C++ program to capture gamepad data and encode timestamps from user input via a game controller. 					<a href="#">more info</a></p>

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
			
			
			
			
			
			
			
			
			
			
			
			<?php 

	try{
		$results = $db->query("SELECT *, url FROM project");
		
		$statment1 = $db->prepare('
				SELECT id, name, url, thumb_url, description
				FROM project 
				WHERE project.name = ?
		');
		
		
		$frameworks = $db->query("
			SELECT p.name, f.name
			FROM project p
			INNER JOIN project_frameworks pf
			ON pf.project_id = p.id
			INNER JOIN frameworks f
			ON f.id = pf.framework_id
		");
		$listframeworks = $frameworks->fetchAll();
		
		
		
		$languages = $db->query("
			SELECT p.name, l.name
			FROM project p
			INNER JOIN project_languages pl
			ON pl.project_id = p.id
			INNER JOIN languages l
			ON l.id = pl.languages_id
		");
		$listlanguages = $languages->fetchAll();
		
	} catch (Exception $e){
		echo "Query Failed";
		exit;
	}


	

	
	foreach ( $results as $p){
		print '<div class="card_container">'."\n";
			print '<a href="/projects/'.$p["url"].'" target="_self">'."\n";
			print '<div class="card_top">'."\n";
				print '<p>'.$p["name"].'</p>'."\n";
			print '</div>'."\n";
			print '<div class="card_thumbnail">'."\n";
			print '</div>'."\n";
		//print '<img class="img_thumbnail" alt="'.$p["name"].' thumbnail" src="img/projects/thumb/'.$p["thumb_url"].'" width="400" height="180">'."\n";
		print '</a>'."\n";
		

			print '<div class="card_middle">'."\n";
				print '<p>'."\n".$p["description"]."\n".'</p>'."\n";
			print '</div>'."\n";
			
		print '<div class="card_bottom">'."\n";
		
			print '<p>Frameworks: '."\n";
				foreach ($listframeworks as $fw){
					if ($p["name"] == $fw[0]){
						print '<span class = "card_tag">';
						print $fw[1].' ';
						print '</span>';
					}
					
				}
			print '</p>'."\n";
			print '<p>Languages: '."\n";
			foreach ($listlanguages as $fw){
				if ($p["name"] == $fw[0]){
					print '<span class="card_tag">'.$fw[1].'</span>'."\n";
				}
			}
			print '</p>'."\n";	
		print '</div>'."\n";
		
	print '</div>'."\n";
		

	}

	


?>
			
			
			
			
			
			
			
			


	
	
		
		
		
		
		
		
		
		</div>
		<div class="body_footer">

sadasdsad
		</div>
	</div>
	
	

	</body>
	<footer>
		Copyright Philip Escobedo 2017
	</footer>
</html>
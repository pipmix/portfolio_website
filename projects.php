<?php 
	$title = "Projects";
	include("include/connect.php"); 
	include("include/head.php"); 
	include("include/nav.php"); 
?>


<div class="div_projects">
	<h1>Projects</h1>
</div>


<?php 

	try{
		$results = $db->query("SELECT *, url FROM project");
		
		
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
		print '<div class="project_card">'."\n";
		print '<a href="/projects/'.$p["url"].'" target="_self">'."\n";
		print '<h2>'.$p["name"].'</h2>'."\n";
		print '<img class="img_thumbnail" alt="'.$p["name"].' thumbnail" src="img/projects/thumb/'.$p["thumb_url"].'" width="400" height="180">'."\n";
		print '</a>'."\n";
		print '<p>'."\n".$p["description"]."\n".'</p>'."\n";
		print '<div class="sub_lists">'."\n";
		
			print 'Frameworks: '."\n";
			foreach ($listframeworks as $fw){
				if ($p["name"] == $fw[0]){
					print '<span class = "tag">';
					print $fw[1].' ';
					print '</span>';
				}
				
			}
			print '</div>'."\n";
			
			print 'Languages: '."\n";
			foreach ($listlanguages as $fw){
				if ($p["name"] == $fw[0]){
					print '<span class="button_type">'.$fw[1].'</span>'."\n";
				}
			
			}
		print '</div>'."\n";
		
		
		
		print '</div>'."\n\n";
	}

	


?>


<?php 
	include("include/footer.php"); 
?>
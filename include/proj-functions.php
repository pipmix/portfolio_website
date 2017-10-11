<?php


	function GetDbContext(){
		return new PDO('mysql:host=localhost;dbname=projects;charset=utf8', '' , '');
	}

	function PrintTest(){
		print 'Print all projects';
	}
	
	function PrintSelectedProject($selectedProject){
		$db = GetDbContext();
		$statment1 = $db->prepare('
				SELECT id, name, url, thumb_url, description
				FROM project 
				WHERE project.name = ?
		');
		$statment1->execute(array($selectedProject));
		$listProject = $statment1->fetchAll();
		
		
		$statment2 = $db->prepare('
			SELECT f.name
			FROM project p 
			INNER JOIN project_frameworks pf
			ON pf.project_id = p.id
			INNER JOIN frameworks f
			ON f.id = pf.framework_id
            WHERE p.name = ?
		');
		$statment2->execute(array($selectedProject));
		$listFrameworks = $statment2->fetchAll();
		
		
		
		$statment3 = $db->prepare('
			SELECT l.name
			FROM project p 
			INNER JOIN project_languages pl
			ON pl.project_id = p.id
			INNER JOIN languages l
			ON l.id = pl.languages_id
            WHERE p.name = ?
		');
		$statment3->execute(array($selectedProject));
		$listLanguages = $statment3->fetchAll();
		
		
		
				foreach ($listProject AS $lp){
					print $lp["name"];
				}
				

			
				foreach ($listProject AS $lp){
					print $lp["description"];
				}
				print '<div class="center_tags">';
					print '<br/>Frameworks: ';
					
					foreach ($listFrameworks AS $lf){
						print '<span class = "tag">';
						print $lf["name"];
						print '</span>';
					}
					
					print '<br/>Languages: ';
					
					foreach ($listLanguages AS $ll){
						print '<span class = "tag">';
						print $ll["name"];
						print '</span>';
					}
					print '<br/>';
				print '</div>';

				
			

		
	}
	
	function PrintAllProjects(){
		$db = GetDbContext();
		try{
			$results = $db->query("SELECT * FROM project");
		
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

				print '<div class="display_item_container">'."\n";
					print '<div class="project_item_thumb">'."\n";
						print '<img alt="'.$p["name"].' thumbnail" src="img/projects/thumb/'.$p["thumb_url"].'" width="200" height="200">'."\n";
					print '</div>'."\n";
					print '<div class="project_item_text">'."\n";
						print '<div class="text_item_title">'.$p["name"].'</div>'."\n";
						print '<div class="text_item_desc">'."\n".$p["description"]."\n".'</div>'."\n";
						print '<div class="text_item_tags">'."\n";
							print '<div class="project_tags_catagory">'."\n";
								print 'Frameworks:'."\n";
								foreach ($listframeworks as $fw){
									if ($p["name"] == $fw[0]){
										print '<span class = "card_tag">'.$fw[1].'</span>'."\n";
									}
								}
							print '</div>'."\n";
							print '<div class="project_tags_catagory">'."\n";
								print 'Languages: '."\n";
								foreach ($listlanguages as $fw){
									if ($p["name"] == $fw[0]){
										print '<span class="card_tag">'.$fw[1].'</span>'."\n";
									}
								}
							print '</div>'."\n";
						print '</div>'."\n";
					print '</div>'."\n";
				print '</div>'."\n";

			print '<a href="/projects/'.$p["url"].'" target="_self">'.'</a>'."\n";
		}
		
	}


?>



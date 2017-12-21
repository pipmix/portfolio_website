<?php


	function GetDbContext(){
		return new PDO('mysql:host=localhost;dbname=projects;charset=utf8', 'root' , 'LinXX52');
	}

	function PrintTest(){
		print 'Print all projects';
	}
	
	function PrintSelectedProject($selectedProject){
		$db = GetDbContext();
		$statment1 = $db->prepare('
				SELECT id, name, url, purpose, features, git_url, show, project_url
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
				SELECT id, name, url, purpose, features, git_url, show, project_url
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
			if ($p["show"] == 1){
				print '<div class="table-grid" role="grid">'."\n";

						
						print '<div class="table-row table-head font-medium">'.$p["name"].'</div>'."\n";
						
						print '<div class="table-row">';
							print '<div class="table-cell table-left">Purpose:</div>';
							print '<div class="table-cell">'.$p["purpose"].'</div>';
						print '</div>'."\n";
						
						
						
						$str2 = str_replace( '\n', '<br />', $p["features"]); 
						print '<div class="table-row">';
							print '<div class="table-cell table-left">Features:</div>';
							print '<div class="table-cell">'.$str2.'</div>';
						print '</div>'."\n";
						
						
						print '<div class="table-row">';
							print '<div class="table-cell table-left">Github:</div>';
							print '<div class="table-cell">'.'<a href="https://'.$p["git_url"].'" target="_self">'.$p["git_url"].'</div>'.'</a>'."\n";
						print '</div>'."\n";
						
						print '<div class="table-row">';
							print '<div class="table-cell table-left">Frameworks:</div>';
							print '<div class="table-cell table-tag-container">';
									foreach ($listframeworks as $fw){
										if ($p["name"] == $fw[0]){
											print '<div class = "table-tag">'.$fw[1].'</div>'."\n";
										}
									}
							print '</div>'."\n";
						print '</div>'."\n";
						
						print '<div class="table-row">';
							print '<div class="table-cell table-left">Languages:</div>';
							print '<div class="table-cell table-tag-container">'."\n";
									foreach ($listlanguages as $fw){
										if ($p["name"] == $fw[0]){
											print '<div class="table-tag">'.$fw[1].'</div>'."\n";
										}
									}
							print '</div>';
						print '</div>'."\n";

				print '</div>';

				
			}
		}
		
	}


?>



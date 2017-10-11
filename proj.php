<?php
	$title = "Projects";
	include("include/connect.php"); 
	include("include/head.php"); 
	include("include/nav.php"); 
	
?>

<?php 

	if (!empty($_GET['project'])){
		$selectedProject = $_GET['project'];
		echo $SelectedProject;
		
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
	}

			



?>



<div class="body_area">';


	<div class="center_info">
		<div class="center_header">

			<?php 
			
				foreach ($listProject AS $lp){
					print $lp["name"];
				}
			?>
		</div>
		<div class="center_body">
		
			<?php 
			
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

				
			

				
				
			?>

		</div>
		<div class="center_footer">

		</div>

	</div>
	
	
</div>





<?php
print '<pre>'.print_r($listFrameworks, true).'</pre>';
	include("include/footer.php"); 
?>
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
		
		$q = "
				SELECT id, name, url, thumb_url, description
				FROM project 
				WHERE project.name = '$selectedProject'
		";
		$projectQuery = $db->query($q);
		$listProject = $projectQuery->fetchAll();
		
		$q2 = "
			SELECT f.name
			FROM project p 
			INNER JOIN project_frameworks pf
			ON pf.project_id = p.id
			INNER JOIN frameworks f
			ON f.id = pf.framework_id
            WHERE p.name = '$selectedProject'
		";
		
		$frameworkQuery = $db->query($q2);
		$listFrameworks = $frameworkQuery->fetchAll();
		
		
		
		$q3 = "
			SELECT l.name
			FROM project p 
			INNER JOIN project_languages pl
			ON pl.project_id = p.id
			INNER JOIN languages l
			ON l.id = pl.languages_id
            WHERE p.name = '$selectedProject'
		";
		$languageQuery  = $db->query($q3);
		$listLanguages = $languageQuery->fetchAll();
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
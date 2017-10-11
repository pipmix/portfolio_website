<?php
	$title = "Projects";
	include("../include/connect.php"); 
	include("../include/head.php"); 
	include("../include/nav.php"); 
	
?>


<?php
$selectedProject = 'Dark Empire';
$q = "
				SELECT id, name, url, thumb_url, description
				FROM project 
				WHERE project.name = '$selectedProject'

";
$projectQuery = $db->query($q);
$listProject = $projectQuery->fetchAll();




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
				
				
			?>

		</div>
		<div class="center_footer">

		</div>

	</div>
	
	
</div>




<?php

	include("../include/footer.php"); 
?>
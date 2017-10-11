<?php
	$title = "Projects";

	include("include/proj-functions.php"); 
	include("include/proj-header.php"); 
	include("include/proj-body.php"); 
	
?>
		<h1>Projects</h1>
		<p>Here is some wowrk both sutdent and otherwise</p><br/>

<?php



	if (!empty($_GET['project'])){
		$selectedProject = $_GET['project'];
		PrintSelectedProject($selectedProject);
	} else {
		

		
		PrintAllProjects();
	}
?>







<?php

	include("include/proj-footer.php"); 
	
?>
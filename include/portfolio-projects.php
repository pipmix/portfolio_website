<main>
		<div class="section-container">
			<div class="section-container-2">
			
			<div class="content-container font-medium div-shadow">
				 Projects
			</div>
			<div class="table-container">
				<?php
					if (!empty($_GET['project'])){
						$selectedProject = $_GET['project'];
						PrintSelectedProject($selectedProject);
					} else {
						PrintAllProjects();
					}
				?>
			
			
			

			</div>
			
			</div>

		</div>
</main>
<?php
	$title = "Projects";
	include("../include/connect.php"); 
	include("../include/head.php"); 
	include("../include/nav.php"); 
?>

<?php

		print '<div id="gallery_popup_container">';
			print '<div class="gallery_popup_enclosure">';

				print '<span class="gallery_close_button" onclick="CloseGallery()">X</span>';
				print '<span class="gallery_popup_prev_button" onclick="CloseGallery()">&lt</span>';
				print '<span class="gallery_popup_next_button" onclick="CloseGallery()">&gt</span>';
				
				print '<div id="gallery_popup_large_image">';
					print'<img src="../img/projects/mongo/db_02.png">';
				print '</div>';
		
			print '</div>';
		print '</div>';


$projectName = "MongoDB Project";

print '<div class="webpath">';

print 'pipmix.com / projects / '.$projectName ;

print '</div>';


?>

<?php
	print 	'<script>
				var numImages = 4;
				var curImage = 0;
				
				function OpenGallery(){
					document.getElementById("gallery_popup_container").style.display = "block";

					
				}
				function CloseGallery(){
					document.getElementById("gallery_popup_container").style.display = "none";
				}
				function ChangeSlide(n){
					curImage += n;
					if (curImage < 0){
						curImage = numImages - 1;
					} else if (curImage >= numImages){
						curImage = 0;
					}
				}
				
				
			</script>';

?>


<?php



print '<div class="body_area">';


	print '<div class="center_info">';

	print'NoSQL Database Project – A NoSQL database project leveraging MongoDB to showcase varying datasets. The backend was written in Python using the web framework Bottle. The front-end code uses the JavaScript libraries jQuery and Bootstrap. For Databases course. pipmix.com/projects/dbproj 
	';
	
	

	
	print '<div class="gallery_container">';
		print '<div class="gallery">';

			print '<div class="gallery_image">';
					print '<a href="../img/projects/mongo/db_01.png"  target="_blank">';
					print'<img src="../img/projects/mongo/db_01.png" width="150" height="110" alt="MongoDB project">';
					print '</a>';
			print '</div>';
			
			print '<div class="gallery_image">';
			print'<img src="../img/projects/mongo/db_02.png" width="150" height="110" onclick="OpenGallery();">';
			print '</div>';
			
			print '<div class="gallery_image">';
			print'<img src="../img/projects/mongo/db_03.png" width="150" height="110">';
			print '</div>';
			
			print '<div class="gallery_image">';
			print'<img src="../img/projects/mongo/db_04.png" width="150" height="110">';
			print '</div>';

		print '</div>';
	print '</div>';
	
	print '</div>';
print '</div>';



?>


<?php

	include("../include/footer.php"); 
?>
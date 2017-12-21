<nav>
	<div class="section-container">
		<div class="header-row">
			<div class="header-element font-medium">PIPMIX DOTCOM</div>
			<div class="header-element"></div>
		</div>
		<div class="header-row">
			<?php
				if ($title == "Projects"){
					print '	<div class="header-element header-button-main header-left header-selected">Projects</div>
							<a href="http://pipmix.azurewebsites.net/"><div class="header-element header-button-main header-deselected">.NET Server</div></a>
							<a href="http://www.pipmix.com/about.php"><div class="header-element header-button-main header-deselected">About</div></a>
							<div class="header-element header-button-main header-right"></div>';
					}
					else if ($title == "About"){
					print '	<a href="index.php"><div class="header-element header-button-main header-left header-deselected">Projects</div></a>
							<a href="http://pipmix.azurewebsites.net/"><div class="header-element header-button-main header-deselected">.NET Server</div></a>
							<div class="header-element header-button-main header-selected">About</div>
							<div class="header-element header-button-main header-right"></div>';
					}
			
			?>
		
			</div>
		</div>
</nav>
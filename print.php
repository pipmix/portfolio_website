<?php 
	$title = "Print";
	include("include/connect.php"); 
	include("include/head.php"); 
	include("include/header.php"); 
?>

<script>
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState ===4){
			document.getElementById('ajaxdata').innerHTML = xhr.responseText;
		}
	};
	xhr.open('GET', 'nav.html');
</script>

<div id="ajaxdata">
</div>

<?php 
	include("include/footer.php"); 
?>
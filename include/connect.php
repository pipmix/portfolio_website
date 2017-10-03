<?php




try{
	//$db = new PDO("mysql:".__DIR__."/database.db");
	$db = new PDO('mysql:host=localhost;dbname=projects;charset=utf8', '', '');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
} catch (Exception $e){
	echo "Can't connect to DB";
	exit;
}




?>



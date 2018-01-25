<?php
	/* String de coneccion a base de datos*/ 
	$db = new PDO('mysql:host=localhost;dbname=tigrupou_tcu;charset=utf8mb4', 'root','', array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>

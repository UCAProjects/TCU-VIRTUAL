<?php
	/* String de coneccion a base de datos*/ 
	$db = new PDO('mysql:host=localhost;dbname=tigrupou_planificador;charset=utf8mb4', 'tigrupou_adminis', 'NASAmtm.12', array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>

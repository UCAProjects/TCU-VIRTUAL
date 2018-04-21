<?php
session_start();

  $grupo = $_SESSION["grupo"];
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
  $_Codigo = $_POST["codigo"];

    try {
    	$queryCalendario = "DELETE FROM tigrupou_tcu.horas_tcu WHERE codigo= $_Codigo;";

    	$stmt = $db->prepare($queryCalendario);//consulta a DB
      $stmt -> execute();

      echo "OK";
      //redireccionar a la página principal

    } catch (Exception $e) {
    	echo "ERROR";
    }



?>

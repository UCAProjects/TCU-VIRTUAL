<?php
session_start();

  $grupo = $_SESSION["grupo"];
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$_Fecha = $_POST["fecha"];
	$_HoraEntrada = $_POST["horaEntrada"];
	$_HoraSalida = $_POST["horaSalida"];
  $_CantidadHoras = $_POST["cantidadHoras"];
  $_Actividades = $_POST["actividades"];

  try {

  	$queryCalendario = "INSERT INTO tigrupou_tcu.horas_tcu (grupo,fecha, hora_entrada, hora_salida, numero_horas, actividades_realizadas)
                                VALUES ($grupo,'$_Fecha', '$_HoraEntrada', '$_HoraSalida', $_CantidadHoras, '$_Actividades');";

  	$stmt = $db->prepare($queryCalendario);//consulta a DB
    $stmt -> execute();

    echo "OK";
    //redireccionar a la página principal

  } catch (Exception $e) {
  	echo $e;
  }

?>

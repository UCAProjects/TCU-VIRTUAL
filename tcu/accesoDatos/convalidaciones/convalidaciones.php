<?php
	include("../../conection.php");// conexión a DB
	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	// Se reciben todos los campos asociados a un estudiante
	$apellido1= $_POST["apellido1"];
	$apellido2= $_POST["apellido2"];
	$nombre= $_POST["nombre"];
	$cedula= $_POST["cedula"];
	$universidad= $_POST["universidad"];
	$periodo = $_POST["periodo"];
	$descripcion = $_POST["descripcionProyecto"];

	if(isset($_POST["btnRegistro"])){ //Si se presiona el boton de confirmar
        $query = "INSERT INTO tigrupou_tcu.convalidaciones (primer_apellido, segundo_apellido, nombre, cedula, periodo, universidad, descripcion_proyecto) VALUES ('$apellido1','$apellido2','$nombre',$cedula, $periodo,'$universidad','$descripcion');";
        $stmt = $db->prepare($query);//Inserta a DB
        $stmt -> execute();
	}

	redirect("../../vistas/convalidaciones/convalidaciones.php");

?>
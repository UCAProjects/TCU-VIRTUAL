<?php
	include("../../conection.php");// conexión a DB
	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	// Se reciben todos los campos asociados a un estudiante
	$apellido1= $_POST["apellido1"];
	$apellido2= $_POST["apellido2"];
	$nombre= $_POST["nombre"];
	$cedula= $_POST["cedula"];
	$correo= $_POST["universidad"];
	$telefono= $_POST["periodo"];
	$carrera = $_POST["descripcionProyecto"];

	if(isset($_POST["btnRegistro"])){ //Si se presiona el boton de confirmar
        $query = "insert into tigrupou_tcu.estudiantes(primer_apellido,segundo_apellido,nombre_completo,cedula,correo_electronico,telefono_trabajo,celular,carrera,grado,periodo,sede,lugar_trabajo) values('$apellido1','$apellido2','$nombre','$cedula','$correo','$telefonoT','$telefono',$carrera,$grado,$periodo,$sede,'$lugarTrabajo')";
        $stmt = $db->prepare($query);//Inserta a DB
        $stmt -> execute();
        $id = $db->lastInsertId();  //Se obtiene el id del elemento insertado anteriormente
			
	}

?>
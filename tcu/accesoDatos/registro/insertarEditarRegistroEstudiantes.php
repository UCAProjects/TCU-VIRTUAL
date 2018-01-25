<?php 
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$apellido1= $_POST["apellido1"];
	$apellido2= $_POST["apellido2"];
	$nombre= $_POST["nombre"];
	$cedula= $_POST["cedula"];
	$correo= $_POST["correo"];
	$telefono= $_POST["telefono"];
	$carrera = $_POST["carrera"];
	$grado = $_POST["grado"];
	$periodo = $_POST["periodo"];
	$sede = $_POST["sede"];
	$telefonoT = $_POST["telefonoT"];
	$lugarTrabajo= $_POST["lugarTrabajo"];
	$usuario = $_POST["usuario"];
	$contrasena = $_POST["contrasena"];
	
	if(isset($_POST["btnRegistro"])){ //Si se presiona el boton de confirmar
		try {
			$ano = date('Y');
			$query = "insert into tigrupou_tcu.estudiantes(primer_apellido,segundo_apellido,nombre_completo,cedula,correo_electronico,telefono_trabajo,celular,carrera,grado,cuatrimestre,aino,sede,lugar_trabajo)  
values('$apellido1','$apellido2','$nombre','$cedula','$correo','$telefonoT','$telefono',$carrera,$grado,$periodo,'$ano',$sede,'$lugarTrabajo')";

			$stmt = $db->prepare($query);//Inserta a DB 
	     	$stmt -> execute();
	     	$id = $db->lastInsertId();  //Se obtiene el id del elemento insertado anteriormente

	     	// insertar usuario y contraseña
	     	$queryAutentificacion = "insert into tigrupou_tcu.autentificacion_estudiantes(nombre_usuario,password,usuario)  
values('$usuario','$contrasena',$id)";

			$stmtAu = $db->prepare($queryAutentificacion);//Inserta a DB 
	     	$stmtAu -> execute();
			
		} catch (Exception $e) {
			echo "ERROR AL PROCESAR LA TRANSACCIÓN";
		}
			
	}

	 
?>
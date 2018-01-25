<?php 
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$apellido1= $_POST["apellido1"];
	$apellido2= $_POST["apellido2"];
	$nombre= $_POST["nombre"];
	$cedula= $_POST["cedula"];
	$correo= $_POST["correo"];
	$telefono= $_POST["telefono"];
	$usuario = $_POST["usuario"];
	$contrasena = $_POST["contrasena"];

	
	if(isset($_POST["btnRegistro"])){ //Si se presiona el boton de confirmar
			$query = "insert into tigrupou_tcu.funcionarios(primer_apellido,segundo_apellido,nombre_completo,cedula,correo_electronico,telefono_trabajo)  
values('$apellido1','$apellido2','$nombre','$cedula','$correo','$telefono')";

			$stmt = $db->prepare($query);//Inserta a DB 
	     	$stmt -> execute();
	     	$id = $db->lastInsertId();  //Se obtiene el id del elemento insertado anteriormente
			
			//insertar usuario y contraseña   
			// insertar usuario y contraseña
	     	$queryAutentificacion = "insert into tigrupou_tcu.autentificacion_funcionarios(nombre_usuario,password,usuario)  
values('$usuario','$contrasena',$id)";

			$stmtAu = $db->prepare($queryAutentificacion);//Inserta a DB 
	     	$stmtAu -> execute();
	}
	 
?>
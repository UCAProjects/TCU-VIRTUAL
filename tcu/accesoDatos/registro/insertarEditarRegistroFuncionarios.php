<?php 
	include("../../conection.php");// conexión a DB
	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	// Se reciben todos los campos asociados a un estudiante
	$apellido1= $_POST["apellido1"];
	$apellido2= $_POST["apellido2"];
	$nombre= $_POST["nombre"];
	$cedula= $_POST["cedula"];
	$correo= $_POST["correo"];
	$telefono= $_POST["telefono"];
	$tipo = $_POST["tipo"];
	$codigo = $_POST["codigo"];

	$usuario = "";
	$contrasena = "";
	
	if(isset($_POST["usuario"])){
		$usuario = $_POST["usuario"];
	}
	if(isset($_POST["contrasena"])){
		$contrasena = $_POST["contrasena"];
	}

	if(isset($_POST["btnRegistro"])){ //Si se presiona el boton de confirmar
		if($tipo == 0){ // Insertar un nuevo registro
			$query = "insert into tigrupou_tcu.funcionarios(primer_apellido,segundo_apellido,nombre_completo,cedula,correo_electronico,telefono_trabajo)values('$apellido1','$apellido2','$nombre','$cedula','$correo','$telefono')";

			$stmt = $db->prepare($query);//Inserta a DB 
	     	$stmt -> execute();
	     	$id = $db->lastInsertId();  //Se obtiene el id del elemento insertado anteriormente
			
			//insertar usuario y contraseña   
			// insertar usuario y contraseña
	     	$queryAutentificacion = "insert into tigrupou_tcu.autentificacion_funcionarios(nombre_usuario,password,usuario)  
                values('$usuario','$contrasena',$id)";
		
			$stmtAu = $db->prepare($queryAutentificacion);//Inserta a DB 
	     	$stmtAu -> execute();

	     	session_start();
      		$_SESSION["codigoFuncionario"] = $id;
      		$_SESSION["usuarioFuncionario"] = $nombre_usuario;
      		$_SESSION["carreraFuncionario"] = "";
			  $_SESSION["rolFuncionario"] = "" ;
			  $_SESSION["sedeFuncionario"] = "" ;

	     	redirect("../../vistas/principalFuncionarios/principalFuncionarios.php");
		}
		else{ //
			$query = "update tigrupou_tcu.funcionarios set primer_apellido = '$apellido1',segundo_apellido = '$apellido2' ,nombre_completo = '$nombre' ,cedula = '$cedula',correo_electronico = '$correo',telefono_trabajo = '$telefono' where codigo like $codigo ";

			$stmt = $db->prepare($query);//Actualiza la DB
		    $stmt -> execute();

		    $query = "update tigrupou_tcu.autentificacion_funcionarios set nombre_usuario = '$cedula' where usuario like $codigo ";
		    $stmt = $db->prepare($query);//Actualiza la DB
		    $stmt -> execute();
		    redirect("../../vistas/principalFuncionarios/principalFuncionarios.php");
		}
			
	}
?>
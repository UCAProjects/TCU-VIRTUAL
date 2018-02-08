<?php 
	include '../../conection.php';//COnección a la DB
	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
 	$usuario = $_POST["usuario"]; //Se recibe el usuario a loguearse
	$contrasena = $_POST["contrasena"]; // Se recibe la contraseña del usuario
	$tipo = $_POST["tipo"]; // Se recibe un tipo para determinar si es estudiante o profesor
	if($tipo == 1){//Logueo de Estudiante
		try {
			$query = "SELECT E.codigo, E.grupo, A.nombre_usuario, A.password FROM tigrupou_tcu.estudiantes E JOIN tigrupou_tcu.autentificacion_estudiantes A ON E.codigo LIKE A.usuario WHERE A.nombre_usuario LIKE :usuario AND A.password like :contrasena ;";

			$stmt = $db->prepare($query);
			$stmt->execute(array(':usuario' => $usuario,':contrasena' => $contrasena));
			$result = $stmt -> fetchAll();

			$codigoDB = 0;
			$usuarioDB = "";
			$contrasenaDB = "";
			$grupoDB ="";

			if(count($result)>0){
				foreach ($result as $row ) {
					$codigoDB = $row["codigo"];
					$usuarioDB = $row["nombre_usuario"];
					$grupoDB = $row["grupo"];
					$contrasenaDB = $row["password"];
				}
				if($usuario == $usuarioDB and $contrasena ==$contrasenaDB){
					session_start();
      				$_SESSION["codigo"] = $codigoDB;
      				$_SESSION["usuario"] = $usuarioDB;
      				$_SESSION["grupo"] = $grupoDB;

      				$query = "select codigo from tigrupou_tcu.datos where grupo like $grupoDB";
      				$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt -> fetchAll();
					foreach ($result as $row ) {
						$datos = $row["codigo"];
					}

      				if($grupoDB ==""){
      					echo "1";
      				}elseif($datos ==""){
      					echo "1-0";
      				}else{
      					echo "1-$datos";
      				}
				}else{
					echo "false";
				}
			}else{
				echo "false";
			}
		
		}catch (Exception $e){
			echo "error";
		}
	}elseif($tipo == 2){//Logueo de Estudiante
		try {
			$query = "SELECT E.codigo, A.nombre_usuario, A.password FROM tigrupou_tcu.funcionarios E JOIN tigrupou_tcu.autentificacion_funcionarios A ON E.codigo LIKE A.usuario WHERE A.nombre_usuario LIKE :usuario AND A.password like :contrasena ;";

			$stmt = $db->prepare($query);
			$stmt->execute(array(':usuario' => $usuario,':contrasena' => $contrasena));
			$result = $stmt -> fetchAll();

			$codigoDB = 0;
			$usuarioDB = "";
			$contrasenaDB = "";

			if(count($result)>0){
				foreach ($result as $row ) {
					$codigoDB = $row["codigo"];
					$usuarioDB = $row["nombre_usuario"];
					$contrasenaDB = $row["password"];
				}
				if($usuario == $usuarioDB and $contrasena ==$contrasenaDB){
					session_start();
      				$_SESSION["codigo"] = $codigoDB;
      				$_SESSION["usuario"] = $usuarioDB;
      				echo "2";
      				
				}else{
					echo "false";
				}
			}else{
				echo "false";
			}
		
		}catch (Exception $e){
			echo "error";
		}
	}
			



?>
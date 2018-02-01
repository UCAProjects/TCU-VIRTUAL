<?php 
	 include '../../conection.php';//COnección a la DB
	$codigo = $_POST["id"]; //Se recibe un codigo del elemento a eliminar
	$tipo = $_POST["tipo"]; // Se recibe un tipo que clasifica el elmento 

	if($tipo == 1){ // Obtiene información a partir de la cedula de un estudiante
		$query = "select password from tigrupou_tcu.autentificacion_estudiantes where usuario like $codigo";
		try {
			$stmt = $db->prepare($query);
			$stmt -> execute();
			$result = $stmt -> fetchAll();
			$password = "";
			foreach ($result as $row ) {
				$password = $row["password"];
			}
			echo $password;
		} catch (Exception $e) {
			echo 0; // ERROR
		}
	}
	elseif($tipo ==2){
	}elseif($tipo ==3){
	}
?>
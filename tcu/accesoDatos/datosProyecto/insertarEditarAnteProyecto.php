<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$codigo = $_POST["codigo"];
	$numeroPagina = $_POST["numeroPagina"];
	$texto = $_POST["texto"];
	$grupo = $_POST["grupo"];
		try {
			if($codigo == ""){ // Crear nuevo
					$query = "INSERT INTO tigrupou_tcu.ante_proyecto (identificacion_problema, descripcion_problema,descripcion_beneficiario, justificacion_proyecto, objetivo_general,objetivos_especificos,estrategias_soluciones, grupo) VALUES ('$texto', '', '', '', '', '', '', $grupo);";
					$stmt = $db->prepare($query);//Inserta a DB
	     			$stmt -> execute();
	     			//redireccionar a la página principal
			}else{
				$query = "UPDATE tigrupou_tcu.ante_proyecto SET $numeroPagina = '$texto' where grupo like $grupo;";
				$stmt = $db->prepare($query);//Inserta a DB
	     		$stmt -> execute();
			}
		} catch (Exception $e) {
			echo $e;
		}

?>

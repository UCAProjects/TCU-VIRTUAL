<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$codigo = $_POST["codigo"];
	$numeroPagina = $_POST["numeroPagina"];
	$texto = $_POST["texto"];
	$grupo = $_POST["grupo"];
		try {
			echo $codigo;
			if($codigo == ""){ // Crear nuevo
					$query = "INSERT INTO tigrupou_tcu.resumen_ejecutivo (grupo, resumen_actividades, evaluacion, conclusion, recomendaciones) VALUES ($grupo, '$texto', '', '', '');";
					$stmt = $db->prepare($query);//Inserta a DB
	     			$stmt -> execute();
	     			echo "OK";
	     			//redireccionar a la página principal
			}else{
				$query = "UPDATE tigrupou_tcu.resumen_ejecutivo SET $numeroPagina = '$texto';";
				$stmt = $db->prepare($query);//Inserta a DB
	     		$stmt -> execute();
			}
		} catch (Exception $e) {
			echo "ERROR";
		}



?>

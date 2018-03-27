<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$estado = $_POST["estado"]; 
	$observaciones = $_POST["Observaciones"];
	$grupo = $_POST["grupo"];
	$ante_proyecto = $_POST["ante_proyecto"];

	try {
		
		$queryNumeroRevisiones "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $grupo";

		$stmt = $db->prepare($queryNumeroRevisiones);//consulta a DB 
     	$stmt -> execute();

     	$resulNumeroRevisiones = $stmt -> fetchAll();
    	foreach($resulNumeroRevisiones as $row){
      		$numeroRevisiones = $row["cantidad"]; 		
    	}

    	if($numeroRevisiones == 0){
    		$version = 1;
    	}else{
    		$queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $grupo";

    		$stmt = $db->prepare($queryMaxVersionSelect);//consulta a DB 
     		$stmt -> execute();

     		$resultMaxVersion = $stmt -> fetchAll();
    		foreach($resultMaxVersion as $row){
      			$maxVersion = $row["max"]; 		
    		}
    		$version = $maxVersion +1;
    	}
		
						
		$query = "INSERT INTO tigrupou_tcu.revision_ante_proyecto(version, Observaciones,estado,ante_proyecto) values(version,'Hola',$estado,$grupo)";
				

		$stmt = $db->prepare($query);//Inserta a DB 
     	$stmt -> execute();
     	
     	echo "OK";
     			//redireccionar a la página principal
		
	} catch (Exception $e) {
		echo "ERROR";
	}
			
?>
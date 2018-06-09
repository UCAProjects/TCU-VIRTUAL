<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$estado = $_POST["estado"];
	$observaciones = $_POST["observaciones"];
	$documento = $_POST["documento"];
  $rol = $_POST["rol"];

  // 1 para ante proyecto
  // 2 para resumen ejecutivo
  $tipo = $_POST["tipo"];

  $queryNumeroRevisiones = "";
  $queryMaxVersionSelect = "";
  $queryInsert = "";
  $queryUpdate = "";

  switch ($tipo) {
    case 1: // Caso ante proyecto
      switch ($rol) {
        case 1:
          $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento";
          $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento";
          $queryUpdate = "UPDATE tigrupou_tcu.ante_proyecto SET estado = $estado WHERE grupo LIKE $documento";
          $queryInsert = "INSERT INTO tigrupou_tcu.revision_ante_proyecto(version, Observaciones,estado,ante_proyecto) values(version_value,'$observaciones',$estado,$documento)";
          break;
        case 2:
          $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_ante_proyecto_be WHERE ante_proyecto LIKE $documento";
          $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto_be WHERE ante_proyecto LIKE $documento";
          $queryUpdate = "UPDATE tigrupou_tcu.ante_proyecto SET estado_be = $estado WHERE grupo LIKE $documento";
          $queryInsert = "INSERT INTO tigrupou_tcu.revision_ante_proyecto_be(version, Observaciones,estado,ante_proyecto) values(version_value,'$observaciones',$estado,$documento)";
          break;
        default:
          // code...
          break;
      }
      break;
    case 2: // Caso resumen ejecutivo
      $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento";
      $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento";
      $queryUpdate = "UPDATE tigrupou_tcu.resumen_ejecutivo SET estado = $estado WHERE grupo LIKE $documento";
      $queryInsert = "INSERT INTO tigrupou_tcu.revision_resumen_ejecutivo(version, observaciones,estado,resumen_ejecutivo) values(version_value,'$observaciones',$estado,$documento)";
      break;
    default:
      break;
  }

	try {

		  $stmt = $db->prepare($queryNumeroRevisiones);//consulta a DB
      $stmt -> execute();

      //Cantidad de revisiones
     	$resulNumeroRevisiones = $stmt -> fetchAll();
    	foreach($resulNumeroRevisiones as $row){
      		$numeroRevisiones = $row["cantidad"];
    	}
      // Calcula la version del nuevo documento
    	if($numeroRevisiones == 0){
    		$version = 1;
    	}else{
    		$stmt = $db->prepare($queryMaxVersionSelect);//consulta a DB
     		$stmt -> execute();
     		$resultMaxVersion = $stmt -> fetchAll();

    		foreach($resultMaxVersion as $row){
      			$maxVersion = $row["max"];
    		}
    		$version = $maxVersion +1;
    	}

      // Reemplaza la nueva version en la consulta
      $queryInsert = str_replace("version_value", $version, $queryInsert);

		  $stmt = $db->prepare($queryInsert);//Inserta a DB
     	$stmt -> execute();

      $stmt = $db->prepare($queryUpdate);//Inserta a DB
      $stmt -> execute();



     	echo "OK";
     	//redireccionar a la página principal

	} catch (Exception $e) {
		echo "ERROR";
	}

?>

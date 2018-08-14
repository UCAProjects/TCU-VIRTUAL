<?php
 	include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
	include("../../conection.php");// conexión a DB

	// Se reciben todos los campos asociados a un estudiante
	$estado = $_POST["estado"];
	$observaciones = $_POST["observaciones"];
	$documento = $_POST["documento"];
  $rol = $_POST["rol"];
  $guardado = $_POST["guardado"];
  // 1 para ante proyecto
  // 2 para resumen ejecutivo
  $tipo = $_POST["tipo"];

  $queryNumeroRevisiones = "";
  $queryMaxVersionSelect = "";
  $queryInsert = "";
  $queryUpdate = "";

  if($guardado == 0){
    switch ($tipo) {
      case 1: // Caso ante proyecto
        $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento and rol LIKE $rol";
        $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_ante_proyecto WHERE ante_proyecto LIKE $documento and rol LIKE $rol";
        $queryUpdate = "UPDATE tigrupou_tcu.ante_proyecto SET ESTADOC = $estado WHERE grupo LIKE $documento";
        $queryInsert = "INSERT INTO tigrupou_tcu.revision_ante_proyecto(version, Observaciones,estado,ante_proyecto, rol) values(version_value,'$observaciones',$estado,$documento,$rol)";        
        break;
      case 2: // Caso resumen ejecutivo
        $queryNumeroRevisiones = "SELECT count(*) AS cantidad FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento and rol LIKE $rol";
        $queryMaxVersionSelect = "SELECT max(version) AS max FROM tigrupou_tcu.revision_resumen_ejecutivo WHERE resumen_ejecutivo LIKE $documento and rol LIKE $rol";
        $queryUpdate = "UPDATE tigrupou_tcu.resumen_ejecutivo SET ESTADOC = $estado WHERE grupo LIKE $documento";
        $queryInsert = "INSERT INTO tigrupou_tcu.revision_resumen_ejecutivo(version, observaciones,estado,resumen_ejecutivo, rol) values(version_value,'$observaciones',$estado,$documento, $rol)";
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
  
        if($rol == 1){ //Solo cuando un director de carrera genera la calificacion se actualiza al estudiante 
          $queryUpdate = str_replace("ESTADOC", "estado", $queryUpdate);
        }else{
          $queryUpdate = str_replace("ESTADOC", "estado_be", $queryUpdate);
        }
        $stmt = $db->prepare($queryUpdate);//Inserta a DB
        $stmt -> execute();
         echo "OK";
         //redireccionar a la página principal
  
    } catch (Exception $e) {
      echo $e;
    }
  }else{
    
  }
  

?>

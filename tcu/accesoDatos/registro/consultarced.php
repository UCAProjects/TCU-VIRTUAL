<?php 
	 include '../../conection.php';//COnección a la DB
	$cedula = $_POST["cedula"]; //Se recibe un codigo del elemento a eliminar
    $query = "SELECT count(*) cantidad FROM tigrupou_tcu.estudiantes where cedula like '$cedula';";
    try {
        $stmt = $db->prepare($query);
        $stmt -> execute();
        $result = $stmt -> fetchAll();
        $cant = 0;
        foreach ($result as $row ) {
            $cant = $row["cantidad"];
        }
        echo $cant;
    }catch (Exception $e) {
        echo $e; // ERROR
    }

	
?>
<?php 
	 include '../../conection.php';//COnección a la DB
	$codigo = $_POST["id"]; //Se recibe un codigo del elemento a eliminar
	$tipo = $_POST["tipo"]; // Se recibe un tipo que clasifica el elmento 

	if($tipo == 1){ // Obtiene información a partir de la cedula de un estudiante
		$query = "SELECT codigo,cedula,nombre_completo,primer_apellido FROM tigrupou_tcu.estudiantes where cedula like $codigo;";
		try {
			$stmt = $db->prepare($query);
			$stmt -> execute();
			$result = $stmt -> fetchAll();
			$array = [];
			foreach ($result as $row ) {
				array_push($array,$row["codigo"],$row["cedula"],$row["nombre_completo"],$row["primer_apellido"]);
			}
			echo implode(",", $array);
		} catch (Exception $e) {
			echo 0; // ERROR
		}
	}
	elseif($tipo ==2){
		try{
		  $query = "SELECT codigo,cedula,nombre_completo,primer_apellido FROM tigrupou_tcu.estudiantes where nombre_completo like '%".$codigo ."%';";
		  $stmt = $db->prepare($query);
		  $stmt -> execute();
		  $result = $stmt -> fetchAll();
		  ?>
		  <table class="table table-striped">
		    <thead>
		      <tr>
		        <th scope="col">Cod</th>
		        <th scope="col">Nombre</th>
		        <th scope="col">Apellidos</th>
		        <th scope="col">Acción</th>
		      </tr>
		    </thead>
		    <tbody> 
		      <?php
		      $array = [];
		        foreach ($result as $row ){
		        	array_push($array,$row["codigo"],$row["cedula"],$row["nombre_completo"],$row["primer_apellido"]);
		        ?>
		          <tr>
		            <th scope="row"><?php echo $row["codigo"] ?></th>
		            <td><?php echo $row["nombre_completo"] ?></td>
		            <td><?php echo $row["primer_apellido"] ?></td>
		            <td><a href="#"><i class="fa fa-check-circle" data-dismiss="modal" onclick="agregarEstudianteTabla('<?php echo implode(",", $array); ?>')" aria-hidden="true"></i></a></td>
		          </tr><?php 
		          $array = [];
		        }
		      ?>
		    </tbody>
		  </table> 
		  <?php 
		}catch (Exception $e) {
			echo 0; // ERROR
		}

	}elseif($tipo ==3){
		try {
			$query = "update tigrupou_tcu.estudiantes set  grupo = null where codigo like $codigo";
		  	$stmt = $db->prepare($query);
		  	$stmt -> execute();
		  	echo "Eliminado con éxito!!";
		} catch (Exception $e) {
			echo 0;
		}
		
	}
?>
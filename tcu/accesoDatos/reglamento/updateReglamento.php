<?php
    session_start();
    include("../redireccionar.php");// Contiene función que redirecciona a cualquier otra página
    include '../../conection.php'; //Conección a la DB

    //Inicialización de variables
    $id = $_SESSION["codigo"];
 
    $queryUpdateReglamento = "UPDATE tigrupou_tcu.estudiantes SET reglamento = 1 WHERE codigo like $id";
    $stmt = $db->prepare($queryUpdateReglamento);
    $stmt -> execute();
    
?>
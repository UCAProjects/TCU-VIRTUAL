<?php
    //Cabecera del correo
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; 
    $headers .= "From: Actividades Institucionales < avisos@ucacr.com >\r\n";//dirección del remitente 
    mail("amora@uca.ac.cr", "Consulta TCU", "Esto es par una consulta de prueba", $headers);
?>
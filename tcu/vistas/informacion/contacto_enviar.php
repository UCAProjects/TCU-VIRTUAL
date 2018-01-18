<?php

if(isset($_POST['correo'])) {

    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['$apellidos'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $email_to = "asistenciainformatica@uca.ac.cr";
    $email_subject = $asunto;

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    $email_message = "Contenido del Mensaje.\n\n";

    function limpiar_blancos($string)
    {
        $blancos = array("content-type","bcc:","to:","cc:","href");
        return str_replace($blancos,"",$string);
    }

    $email_message .= "Correo: ".limpiar_blancos(correo)."\n";
    $email_message .= "Estudiante: ".limpiar_blancos(nombre)." ".limpiar_blancos(apellidos)."\n";
    $email_message .= "Telefono: ".limpiar_blancos(telefono)."\n\n";
    $email_message .= "Asunto: ".limpiar_blancos(asunto)."\n";
    $email_message .= "Mensaje: ".limpiar_blancos(mensaje)."\n";

    $headers = 'From: '.$correo."\r\n".
    'Reply-To: '.$correo."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);

    header("Location: contacto.php?correoenviado=Correo enviado con éxito");
}
?>

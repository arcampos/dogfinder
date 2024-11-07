<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $to = 'tu_email@example.com'; // Cambia esto por tu correo electrónico
    $subject = 'Nuevo mensaje sobre tu mascota perdida';
    $body = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";
    $headers = 'From: contacto@tusitio.com' . "\r\n" .
               'Reply-To: contacto@tusitio.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Enviar correo
    mail($to, $subject, $body, $headers);

    // Redireccionar a una página de éxito o agradecer
    echo "¡Gracias! Tu mensaje ha sido enviado.";
?>

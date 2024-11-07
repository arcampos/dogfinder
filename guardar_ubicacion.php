<?php
    // Recibe los datos enviados por la petición POST
    $data = json_decode(file_get_contents('php://input'), true);
    $lat = $data['latitude'];
    $lon = $data['longitude'];

    // Configura tu correo para notificaciones
    $to = 'arnold.campos.ar@gmail.com'; // Cambia esto por tu correo electrónico
    $subject = 'Escaneo de código QR: Ubicación';
    $message = "El código QR fue escaneado.\nUbicación:\nLatitud: $lat\nLongitud: $lon";
    $headers = 'From: notificaciones@tusitio.com' . "\r\n" .
               'Reply-To: notificaciones@tusitio.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Enviar correo
    mail($to, $subject, $message, $headers);

    // Respuesta al cliente
    echo json_encode(["status" => "success"]);
?>

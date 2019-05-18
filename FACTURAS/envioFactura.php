<?php  
    $mail = new PHPMailer();
    
    $correo = $datos[0]['correo_usuario'];     
    $id = $datos[0]['id_pago'];
    date_default_timezone_set('Etc/UTC');

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $mail->Port = 587; // Puerto de conexión al servidor de envio. 
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "veterinariovitalpet@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $mail->Password = "vitalpetclinica"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo        
    $mail ->setFrom('veterinariovitalpet@gmail.com', 'Clinica Vital-Pet');
    $mail->AddAddress($correo); // Esta es la dirección a donde enviamos 
    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->CharSet = 'UTF-8'; // Activo condificacción utf-8
    $mail->Subject = "Envío de factura ID: $id"; // Este es el titulo del email. 
    $body = "Gracias por su visita $correo. Le remitimos su factura de la cita con el identificador $id";
        
    $mail->Body = $body; // Mensaje a enviar. $exito = $mail->Send(); // Envía el correo.
    $mail ->addAttachment($fichero);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    if(!($mail->Send())){ 
        echo 'Hubo un problema en el envio del correo. Contacta con un administrador.';
        echo "$mail->ErrorInfo";
    }
?>
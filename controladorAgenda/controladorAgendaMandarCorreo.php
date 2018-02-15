<?php
    require './phpmailer/class.phpmailer.php';
    require './phpmailer/class.smtp.php';
 
    $emailDestinatario = filter_input(INPUT_POST, 'email');
    $nombreDestinatario = filter_input(INPUT_POST, 'nombre');
    $apellidoDestinatario = filter_input(INPUT_POST, 'apellido');
    
    $mail = new PHPMailer();
    $mail -> SMTPSecure = 'tls';
    $mail -> Host = 'smtp.live.com';
    $mail -> Port = 587;
    $mail -> IsSMTP();
    $mail -> SMTPAuth = true;
    
    $mail -> Username = 'imparticar@hotmail.com'; //direccion de correo
    $mail -> Password = '********'; //password del correo 
    
    $mail -> AddAddress($emailDestinatario);
    $mail -> FromName = 'Equipo informatico';
    $mail -> Subject = 'Mensaje automatico';
    $mail -> Body = "Hola " . $nombreDestinatario . " " . $apellidoDestinatario ;
    
    $mail -> From = $mail -> Username;
    $mail -> Send();
    
    if(!$mail -> Send()){
        echo 'Error: ' . $mail -> ErrorInfo;
    } else {
        echo 'Se ha enviado el mensaje';
    }
            
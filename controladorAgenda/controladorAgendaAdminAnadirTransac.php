<?php

    require_once('../modeloAgenda/modeloAgendaAdmin.php');
    
    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellido = filter_input(INPUT_POST, 'apellido');
    $telefono = filter_input(INPUT_POST, 'telefono');
    $email1 = filter_input(INPUT_POST, 'email1');
    
    
    $contacto = new Contacto();
    $contacto->crear_contactoTransac($nombre,$apellido,$telefono,$email1);
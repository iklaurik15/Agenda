<?php

require_once('../modeloAgenda/modeloAgendaAdmin.php');
    
    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellido = filter_input(INPUT_POST, 'apellido');
    $telefono = filter_input(INPUT_POST, 'telefono');
    
    
    
    $contacto = new Contacto();
    $contacto->crear_contactoSP($nombre,$apellido,$telefono);

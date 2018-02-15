<?php
   
    require_once('../modeloAgenda/modeloAgendaAdmin.php');
    
    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellido = filter_input(INPUT_POST, 'apellido');
    $telefono = filter_input(INPUT_POST, 'telefono');
    $email1 = filter_input(INPUT_POST, 'email1');
    $email2 = filter_input(INPUT_POST, 'email2');
    $grupo1 = filter_input(INPUT_POST, 'combobox1');    
    $grupo2 = filter_input(INPUT_POST, 'combobox2'); 
    $grupo3 = filter_input(INPUT_POST, 'combobox3');
    
   
    $contacto = new Contacto();
    $contacto->crear_contacto($nombre,$apellido,$telefono,$email1,$email2,$grupo1,$grupo2,$grupo3);
    
     header("Refresh:1; url=../index.php");    
    

?>


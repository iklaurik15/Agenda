<?php
    require_once('../modeloAgenda/modeloAgendaAdmin.php');
    
    $id_contacto=filter_input(INPUT_POST,'comboContacto');
    $nombre = filter_input(INPUT_POST, 'nombre');
    $apellido = filter_input(INPUT_POST, 'apellido');
    $telefono = filter_input(INPUT_POST, 'telefono');
    $email1 = filter_input(INPUT_POST, 'email1');
    $email2 = filter_input(INPUT_POST, 'email2');
    $grupo1 = filter_input(INPUT_POST, 'combobox1');    
    $grupo2 = filter_input(INPUT_POST, 'combobox2'); 
    $grupo3 = filter_input(INPUT_POST, 'combobox3');
    
    $contacto = new Contacto();
    $contacto->modificar_contacto($id_contacto,$nombre,$apellido,$telefono,$email1,$email2,$grupo1,$grupo2,$grupo3);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

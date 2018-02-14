<?php
    require_once('../modeloAgenda/modeloAgendaAdmin.php');
     
    $id_contacto=filter_input(INPUT_POST,'comboContacto');
    
    $contacto = new Contacto();
    $contacto->eliminar_contacto($id_contacto);
?>

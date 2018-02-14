<?php

    require_once '../modeloAgenda/modeloAgendaUsuario.php';
    $usuario = new Usuario();
    $listado_contactos = $usuario->lista_contactos();
    require_once '../vistaAgenda/vistaAgendaUsuarioVerListado.php';

?>


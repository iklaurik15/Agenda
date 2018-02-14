<?php
require_once '../modeloAgenda/modeloAgendaUsuario.php';
$usuario=new Usuario();
$listado_contactos=$usuario->lista_contactos();

require_once '../modeloAgenda/modeloAgendaAdminGrupoModel.php';
$grupo=new Grupo();
$grupos=$grupo->mostrar_grupos();

require_once '../vistaAgenda/vistaAgendaAdminModificarContacto.php';
?>


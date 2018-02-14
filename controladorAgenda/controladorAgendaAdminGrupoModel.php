<?php
require_once '../modeloAgenda/modeloAgendaAdminGrupoModel.php';
$grupo=new Grupo();
$grupos=$grupo->mostrar_grupos();
require_once '../vistaAgenda/vistaAgendaAdminAnadirContacto.php';
?>
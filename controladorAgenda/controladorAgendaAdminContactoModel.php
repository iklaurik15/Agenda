<?php
require_once '../modeloAgenda/modeloAgendaAdminContactoModel.php';
$contacto=new Contacto();
$contactos=$contacto->mostrar_contactos();
require_once '../vistaAgenda/vistaAgendaAdminBorrarContacto.php';


?>


<?php

require_once("../modeloAgenda/modeloAgendaAdmin.php");
$lineas = file('../datos.txt');
    foreach ($lineas as $num_linea => $linea) {
//        echo "Línea #<b>{$num_linea}</b> : " . htmlspecialchars($linea) . "<br />\n";
        $contacto = explode("::", $linea);
        $contactoVolc = new Contacto();
        $contactoVolc->crear_contacto_Fichero($contacto[0], $contacto[1], $contacto[2]);
    }
    header("Location:../vistaAgenda/vistaAgendaAdmin.php");

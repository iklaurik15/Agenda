<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Borrar Contacto</title>
    </head>
    <body>
        
        
        <h1><em>BORRAR CONTACTO</em></h1>
        <form action="../controladorAgenda/controladorAgendaAdminBorrarContacto.php" method="post">
        <select name="comboContacto" >
                   <option value="0">--Seleccionar Contacto--</option>
                   <?php
                    for($i=0;$i<count($contactos);$i++){
                        echo '<option value='.$contactos[$i]["id_contacto"].'>'.$contactos[$i]["nombre"].'</option>';
                    }              
                   ?>
        </select>
        <br>
        <button type="submit">BORRAR</button>
        </form>
    </body>
</html>

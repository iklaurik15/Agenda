<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1><em>Listado de Contactos</em></h1>
        <table border="1">
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Telefono</td>
                <td>Correos</td>                
                <td>Grupo</td>
            </tr>
        <?php
            for($i=0;$i<count($listado_contactos);$i++){
                ?>
                <tr>
                    <td><?php echo $listado_contactos[$i]["nombre"]; ?></td>
                    <td><?php echo $listado_contactos[$i]["apellido"];?></td>
                    <td><?php echo $listado_contactos[$i]["telefono"];?></td>
                    <td><?php echo str_replace(',','<br>',$listado_contactos[$i]["emails"]);?></td>                    
                    <td><?php echo str_replace(',','<br>',$listado_contactos[$i]["colgrupos"]);?></td>                    
                </tr>    
                <?php
            }
        ?>
        </table>
               
    </body>
</html>

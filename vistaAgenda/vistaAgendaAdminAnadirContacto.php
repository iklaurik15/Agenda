<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <body>
        <h1><em>NUEVO CONTACTO</em></h1>
        
        <form action="../controladorAgenda/controladorAgendaAdminAnadirContacto.php" method="post">
            Nombre:  <input type="text" name="nombre" value="" required><br> 
            Apellido:  <input type="text" name="apellido" value="" required><br> 
            Teléfono:  <input type="tel" name="telefono" value="" required><br>
            Email1:  <input type="email" name="email1" value="" required><br>
            Email2:  <input type="email" name="email2" value="" ><br>
            Grupo1:
               <select name="combobox1" >
                   <option value="0">--Seleccionar Grupo--</option>
                   <?php
                    for($i=0;$i<count($grupos);$i++){
                        echo '<option value='.$grupos[$i]["id_grupo"].'>'.$grupos[$i]["nom_grupo"].'</option>';
                    }              
                   ?>
               </select>
            <br>
            Grupo2:
               <select name="combobox2" >
                    <option value="0">--Seleccionar Grupo--</option>
                    <?php
                    for($i=0;$i<count($grupos);$i++){
                        echo '<option value='.$grupos[$i]["id_grupo"].'>'.$grupos[$i]["nom_grupo"].'</option>';
                    }              
                   ?>                       
               </select>
            <br>
            Grupo3:
               <select name="combobox3" >
                    <option value="0">--Seleccionar Grupo--</option>
                    <?php
                    for($i=0;$i<count($grupos);$i++){
                        echo '<option value='.$grupos[$i]["id_grupo"].'>'.$grupos[$i]["nom_grupo"].'</option>';
                    }              
                   ?>                            
               </select>
            <br>
            <button type="submit">INSERTAR</button>
        </form>
    </body>
</html>

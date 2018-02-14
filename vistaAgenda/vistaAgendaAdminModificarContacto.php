
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar Contacto</title>
               
    </head>
    <body>
        <h1><em>MODIFICAR CONTACTO</em></h1>
        <form action="../controladorAgenda/controladorAgendaAdminModificarContacto.php" method="post">
        <select id="combo" name="comboContacto" onchange="rellenarDatos()" >
                   <option value="0">--Seleccionar Contacto--</option>
                   <?php                    
                    for($i=0;$i<count($listado_contactos);$i++){
                        echo '<option value="'.$listado_contactos[$i]["id_contacto"]
                        .'" title="'.$listado_contactos[$i]["nombre"]. "-"
                        .$listado_contactos[$i]["apellido"]. "-"
                        .$listado_contactos[$i]["telefono"]. "-"
                        .$listado_contactos[$i]["emails"]. "-"
                        .$listado_contactos[$i]["colgrupos"].'">'
                        .$listado_contactos[$i]["nombre"]." ".$listado_contactos[$i]["apellido"].'</option>';
                    } 
                    
                    ?>
        </select>          
        <br>
                    
            Nombre:  <input type="text" id="Nombre" name="nombre" value="" required><br> 
            Apellido:  <input type="text" id="Apellido" name="apellido" value="" required><br> 
            Teléfono:  <input type="tel" id="Telefono" name="telefono" value="" required><br>
            Email1:  <input type="email" id="Email1" name="email1" value="" required><br>
            Email2:  <input type="email" id="Email2" name="email2" value="" ><br>
            Grupo1:
               <select name="combobox1" id="Grupo1" >
                   <option value="0">--Seleccionar Grupo--</option>
                  <?php
                    for($i=0;$i<count($grupos);$i++){
                        echo '<option value='.$grupos[$i]["id_grupo"].'>'.$grupos[$i]["nom_grupo"].'</option>';
                    }              
                   ?>                  
               </select>
            <br>
            Grupo2:
               <select name="combobox2" id="Grupo2">                    
                   <option value="0">--Seleccionar Grupo--</option>
                  <?php
                    for($i=0;$i<count($grupos);$i++){
                        echo '<option value='.$grupos[$i]["id_grupo"].'>'.$grupos[$i]["nom_grupo"].'</option>';
                    }              
                   ?>                
               </select>
            <br>
            Grupo3:
               <select name="combobox3" id="Grupo3">
                    <option value="0">--Seleccionar Grupo--</option>
                   <?php
                    for($i=0;$i<count($grupos);$i++){
                        echo '<option value='.$grupos[$i]["id_grupo"].'>'.$grupos[$i]["nom_grupo"].'</option>';
                    }              
                   ?>                    
               </select>
            <br>
            <button type="submit">MODIFICAR</button>
        </form>
        
        <script type="text/javascript">
            function rellenarDatos(){
                var e = document.getElementById('combo');
                var title= e.options[e.selectedIndex].title;
                                              

                var datos = title.split('-');
                var email = datos[3].split(',');
                var grupo = datos[4].split(',');
                
                alert (grupo);
                if(email[1] == null){
                    email[1] = "";
                }
                
                                
                if(grupo[1] == null){
                    grupo[1] = "";
                }
                
                if(grupo[2] == null){
                    grupo[2] = "";
                }
                
                
                document.getElementById('Nombre').value = datos[0]; 
                document.getElementById('Apellido').value = datos[1];
                document.getElementById('Telefono').value = datos[2];
                
                document.getElementById('Email1').value = email[0];
                document.getElementById('Email2').value = email[1];
                
                document.getElementById('Grupo1').value = grupo[0];
                document.getElementById('Grupo2').value = grupo[1];
                document.getElementById('Grupo3').value = grupo[2];                   
            }
         </script>
         <?php
            echo "   
                    <script type=\"text/javascript\">
                       rellenarDatos(); 
                   </script>       
                ";
        ?>
    </body>
</html>
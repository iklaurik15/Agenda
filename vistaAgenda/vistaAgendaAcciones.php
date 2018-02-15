<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php
        if (isset($_SESSION['nomUsuario'])) {
                echo '<p>Hola, ' . $_SESSION['nomUsuario'] . '</p>';
                echo "Estás logueado, usuario: " . $_SESSION['nomUsuario'] . " <a href='../controladorAgenda/controladorAgendaCerrarSesion.php'>Salir</a>";
            } else {
                echo '<p>No estás logueado</p>';
            }
        ?> 
        
        <?php 
            if($_SESSION['rol'] == "administrador"){
        ?>
        <h1><em>ADMINISTRADOR</em></h1>
        <section>
            <a href="../controladorAgenda/controladorAgendaAdminGrupoModel.php">Añadir Contacto</a><br>
            <a href="../controladorAgenda/controladorAgendaAdminContactoModel.php">Borrar Contacto</a><br>
            <a href="../controladorAgenda/controladorAgendaAdminContactoModelMod.php">Modificar Contacto</a><br>
            <a href="../controladorAgenda/controladorAgendaAdminVolcadoFichero.php">Volcar Fichero</a><br>          
        </section>
        
        <?php
            }
        ?>
        
        <?php 
            if($_SESSION['rol'] == "cliente"){
        ?>
                
         <h1><em>USUARIO</em></h1>
        
        <section>
            <a href="../controladorAgenda/controladorAgendaUsuarioVerListado.php">Listado Contactos</a><br> 
                       
        </section>
         
        <?php
            }
        ?> 
    </body>
</html>

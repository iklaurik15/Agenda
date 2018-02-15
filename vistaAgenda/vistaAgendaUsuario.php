<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['nomUsuario'])) {
                echo '<p>Hola, ' . $_SESSION['nomUsuario'] . '</p>';
            } else {
                echo '<p>No estás logueado</p>';
            }
        ?> 
        
        <h1><em>USUARIO</em></h1>
        
        <section>
            <a href="../controladorAgenda/controladorAgendaUsuarioVerListado.php">Listado Contactos</a><br> 
            <a href="../vistaAgenda/vistaAgendaFiltrado.php">Filtrar</a> 
            <br><a href="../controladorAgenda/controladorAgendaCerrarSesion.php">Cerrar Sesion</a>
        </section>
    </body>
</html>
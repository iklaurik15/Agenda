<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <body>
        <h1><em>NUEVO CONTACTO</em></h1>
        
        <form action="../controladorAgenda/controladorAgendaAdminAnadirSP.php" method="post">
            Nombre:  <input type="text" name="nombre" value="" required><br> 
            Apellido:  <input type="text" name="apellido" value="" required><br> 
            Teléfono:  <input type="tel" name="telefono" value="" required><br>            
            
            <button type="submit">INSERTAR</button>
        </form>
    </body>
</html>